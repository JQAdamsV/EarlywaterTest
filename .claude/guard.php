<?php
/**
 * AI-Builder PreToolUse guard (runs INSIDE the jail).
 *
 * Claude Code invokes this before Write/Edit/MultiEdit/NotebookEdit and Bash.
 * It reads the hook event JSON on stdin and exits 2 (blocking the tool, feeding
 * the reason back to Claude) when the action targets a protected path.
 *
 * This is the *scope* guard. The hard security boundary is the bubblewrap jail —
 * billing-service, other tenants, and host secrets are not mounted at all, so they
 * cannot be touched regardless of this hook. This protects sensitive files that DO
 * live inside the instance (billing logic we still bill for, the dependency vendor
 * tree, and the guard/settings themselves so the customer can't disable protection).
 */

// Protected path patterns (PCRE, matched against the relative-ish target path).
// Generated instances may extend this list.
$PROTECTED = [
    '#(^|/)\.claude/#',                 // can't disable the guard or settings
    '#(^|/)vendor/#',                   // dependencies (also read-only in the jail)
    '#(^|/)\.git/hooks/#',              // no persistence via git hooks
    '#(^|/)conf/billing\.ini$#',        // billing config
    '#(^|/)conf/[^/]*\.example\.ini$#', // template configs
    '#(^|/)models/Model_Billing#i',     // billing data models
    '#(^|/)models/Model_(Payment|Subscription|Invoice)#i',
    '#(^|/)services/[^/]*[Bb]illing#',  // billing services
];

$raw = stream_get_contents(STDIN);
$evt = json_decode($raw, true);
if (!is_array($evt)) { exit(0); }       // can't parse -> don't block

$tool  = $evt['tool_name']  ?? '';
$input = $evt['tool_input'] ?? [];

// Collect the path(s) / command text this tool would act on.
$targets = [];
foreach (['file_path', 'notebook_path', 'path'] as $k) {
    if (!empty($input[$k])) { $targets[] = (string)$input[$k]; }
}
if (!empty($input['edits']) && is_array($input['edits'])) {
    // MultiEdit: file_path already captured above; nothing extra needed.
}

$denyReason = null;

// File-targeting tools: block if the path matches a protected pattern.
foreach ($targets as $t) {
    foreach ($PROTECTED as $re) {
        if (preg_match($re, $t)) {
            $denyReason = "Editing '$t' is not allowed — it is a protected area "
                        . "(billing/dependencies/guard). You may modify your own "
                        . "models, views, controls, and data, but not this.";
            break 2;
        }
    }
}

// Bash: best-effort scan of the command for writes to protected paths.
if ($denyReason === null && $tool === 'Bash') {
    $cmd = (string)($input['command'] ?? '');
    // Only worry about mutating commands.
    if (preg_match('/\b(rm|mv|cp|sed\s+-i|tee|dd|truncate|chmod|chown|ln|install)\b|>>?/', $cmd)) {
        foreach ($PROTECTED as $re) {
            // strip the leading anchor for substring scan of the command text
            $needle = preg_replace('#^\#\(\^\|/\)#', '#', $re);
            if (preg_match($needle, $cmd)) {
                $denyReason = "That command targets a protected area "
                            . "(billing/dependencies/guard) and was blocked. "
                            . "Work within your own models, views, controls, and data.";
                break;
            }
        }
    }
}

if ($denyReason !== null) {
    fwrite(STDERR, $denyReason . "\n");
    exit(2);   // exit 2 => block the tool call, return stderr to Claude
}
exit(0);
