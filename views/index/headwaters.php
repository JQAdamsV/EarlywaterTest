<?php
/**
 * Headwaters Union — standalone landing page.
 *
 * Rendered without the Tiknix header/footer layout (see Index::headwaters()).
 * Hero centers the Headwaters Union logo prominently; the color scheme is
 * pulled straight from the logo (deep forest green + muted sage). A simple
 * Name / Email contact form posts to Index::doheadwaters(), which saves the
 * visitor as a `lead` (viewable at /lead/admin) and returns here in a
 * thank-you state.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Headwaters Union') ?></title>
    <meta name="description" content="Headwaters Union — get in touch. Leave your name and email and we'll be in touch.">
    <meta name="theme-color" content="#1f4034">
    <style>
        :root {
            --forest:      #1f4034;  /* deep forest green from the logo */
            --forest-deep: #16302a;
            --sage:        #6f8c7f;  /* muted sage green from the logo */
            --sage-soft:   #a9bcb1;
            --cream:       #f5f7f4;
            --line:        #e2e9e3;
            --ink:         #1a2b25;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Soft green wash pulled from the logo palette */
            background:
                radial-gradient(900px 500px at 50% -10%, rgba(111,140,127,0.22), transparent 70%),
                radial-gradient(700px 500px at 100% 110%, rgba(31,64,52,0.10), transparent 70%),
                var(--cream);
            color: var(--ink);
            text-align: center;
            padding: 3rem 1.5rem;
            -webkit-font-smoothing: antialiased;
        }
        .wrap { width: 100%; max-width: 620px; }

        /* ---------- Hero: prominent centered logo ---------- */
        .logo-card {
            display: inline-block;
            background: #fff;
            padding: 2.5rem 2.75rem;
            border-radius: 28px;
            box-shadow: 0 30px 70px -24px rgba(22,48,42,0.38);
            border: 1px solid var(--line);
            margin-bottom: 2.5rem;
        }
        .logo-card img {
            display: block;
            width: 360px;
            max-width: 72vw;
            height: auto;
        }

        h1 {
            font-size: clamp(2rem, 6vw, 3.1rem);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -0.02em;
            color: var(--forest);
            margin-bottom: 1rem;
        }
        p.lede {
            font-size: clamp(1rem, 3vw, 1.2rem);
            line-height: 1.65;
            color: #4c5f57;
            max-width: 46ch;
            margin: 0 auto 2.25rem;
        }

        /* ---------- Contact form ---------- */
        .form-card {
            margin: 0 auto;
            max-width: 420px;
            padding: 1.75rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: 0 20px 50px -26px rgba(22,48,42,0.30);
            text-align: left;
        }
        .form-card h2 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--forest);
            margin-bottom: 1.1rem;
            text-align: center;
        }
        .form-card label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--sage);
            margin-bottom: 0.35rem;
            letter-spacing: 0.01em;
        }
        input {
            width: 100%;
            padding: 0.85rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--cream);
            color: var(--ink);
            font-size: 1rem;
            transition: border-color 0.15s ease, background 0.15s ease;
        }
        input::placeholder { color: #9aaaa1; }
        input:focus {
            outline: none;
            border-color: var(--sage);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(111,140,127,0.18);
        }
        button {
            width: 100%;
            padding: 0.95rem 1rem;
            border: none;
            border-radius: 10px;
            background: var(--forest);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.01em;
            cursor: pointer;
            transition: transform 0.1s ease, background 0.15s ease;
        }
        button:hover { background: var(--forest-deep); }
        button:active { transform: scale(0.985); }

        .flash-error {
            max-width: 420px;
            margin: 0 auto 1.25rem;
            padding: 0.85rem 1rem;
            border-radius: 12px;
            background: #fdecec;
            border: 1px solid #f4c9c9;
            color: #9b2c2c;
            font-size: 0.92rem;
        }
        .thank-you {
            margin: 0 auto;
            max-width: 420px;
            padding: 1.75rem;
            background: #fff;
            border: 1px solid var(--line);
            border-left: 4px solid var(--forest);
            border-radius: 16px;
            font-size: 1.05rem;
            color: var(--ink);
            box-shadow: 0 20px 50px -26px rgba(22,48,42,0.30);
        }
        .thank-you strong { color: var(--forest); }

        footer {
            margin-top: 2.25rem;
            font-size: 0.82rem;
            color: var(--sage);
        }
        @media (max-width: 480px) {
            .logo-card { padding: 1.75rem 1.75rem; border-radius: 22px; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <!-- Prominent centered logo -->
        <div class="logo-card">
            <img src="/img/headwaters-logo.jpg" alt="Headwaters Union">
        </div>

        <h1>Headwaters Union</h1>
        <p class="lede">Leave your name and email and we'll be in touch.</p>

        <?php if (!empty($error)): ?>
            <div class="flash-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($subscribed)): ?>
            <div class="thank-you">
                🎣 <strong>Thanks for reaching out!</strong> We'll be in touch soon.
            </div>
        <?php else: ?>
            <div class="form-card">
                <h2>Get in touch</h2>
                <form method="post" action="/index/doheadwaters">
                    <?= csrf_field() ?>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required maxlength="150">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required maxlength="255">

                    <button type="submit">Submit</button>
                </form>
            </div>
        <?php endif; ?>

        <footer>&copy; <?= date('Y') ?> Headwaters Union</footer>
    </div>
</body>
</html>
