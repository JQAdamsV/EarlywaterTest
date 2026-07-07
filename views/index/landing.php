<?php
/**
 * Earlywater — GTM (Go-To-Market) landing page.
 *
 * Standalone page (rendered without the Tiknix header/footer layout).
 * Branding matches www.earlywater.com: light/minimalist, navy text, and the
 * signature cyan -> blue -> navy "wave" gradient. Real photo accents are served
 * locally from /img/. Surge is promoted as the flagship product; Paid Search,
 * SEO, AI/LLM and Email/SMS are positioned as the engine that powers it.
 * Positioning line: "Audience Building = Revenue Generation".
 *
 * The primary "growth consultation" CTAs link out to Calendly for booking.
 */
$calendlyUrl = 'https://calendly.com/earlywater/30min';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Earlywater — Surge: Audience Building = Revenue Generation') ?></title>

    <!-- ===== SEO ===== -->
    <meta name="description" content="Surge by Earlywater — the go-to-market growth sprint that turns audience building into revenue across Paid Search, SEO, AI/LLM and Email/SMS. Book a 30-minute growth consultation.">
    <meta name="keywords" content="go-to-market, GTM strategy, audience building, revenue generation, growth sprint, Surge, paid search, SEO, AEO, AI marketing, LLM optimization, email marketing, SMS marketing, fractional CMO, growth agency, Earlywater">
    <meta name="author" content="Earlywater">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="https://pd.tiknix.com/">
    <meta name="theme-color" content="#212a86">

    <!-- Open Graph / Facebook / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Earlywater">
    <meta property="og:url" content="https://pd.tiknix.com/">
    <meta property="og:title" content="Surge by Earlywater — Audience Building = Revenue Generation">
    <meta property="og:description" content="Earlywater's flagship go-to-market growth sprint. Turn hidden profit leaks into scalable growth across Paid Search, SEO, AI/LLM and Email/SMS. Book a 30-minute growth consultation.">
    <meta property="og:image" content="https://pd.tiknix.com/img/surge.jpg">
    <meta property="og:image:width" content="1400">
    <meta property="og:image:height" content="933">
    <meta property="og:image:alt" content="Surge by Earlywater — high-velocity growth sprint">
    <meta property="og:locale" content="en_US">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Surge by Earlywater — Audience Building = Revenue Generation">
    <meta name="twitter:description" content="Earlywater's flagship go-to-market growth sprint. Turn audiences into revenue across Paid Search, SEO, AI/LLM and Email/SMS.">
    <meta name="twitter:image" content="https://pd.tiknix.com/img/surge.jpg">

    <!-- Structured data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "@id": "https://pd.tiknix.com/#organization",
          "name": "Earlywater",
          "url": "https://pd.tiknix.com/",
          "logo": "https://pd.tiknix.com/img/earlywater-logo.png",
          "image": "https://pd.tiknix.com/img/surge.jpg",
          "description": "Go-to-market growth agency. Audience Building = Revenue Generation.",
          "slogan": "Audience Building = Revenue Generation",
          "sameAs": ["https://www.earlywater.com"]
        },
        {
          "@type": "WebSite",
          "@id": "https://pd.tiknix.com/#website",
          "url": "https://pd.tiknix.com/",
          "name": "Earlywater",
          "publisher": { "@id": "https://pd.tiknix.com/#organization" },
          "inLanguage": "en-US"
        },
        {
          "@type": "Service",
          "@id": "https://pd.tiknix.com/#surge",
          "name": "Surge",
          "serviceType": "Go-to-market growth sprint",
          "provider": { "@id": "https://pd.tiknix.com/#organization" },
          "description": "A high-velocity growth sprint that concentrates Paid Search, SEO, AI/LLM and Email/SMS into one coordinated window to build audience and convert it into revenue.",
          "areaServed": "US",
          "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Marketing disciplines",
            "itemListElement": [
              { "@type": "OfferCatalog", "name": "Paid Search" },
              { "@type": "OfferCatalog", "name": "SEO" },
              { "@type": "OfferCatalog", "name": "AI / LLM" },
              { "@type": "OfferCatalog", "name": "Email / SMS" }
            ]
          }
        }
      ]
    }
    </script>

    <style>
        :root {
            --navy: #172554;
            --ink: #16233d;
            --muted: #5b7085;
            --line: #e3ecf3;
            --bg: #ffffff;
            --bg-alt: #f4f9fc;
            --cyan: #2ec6e0;
            --blue: #2f6fd0;
            --indigo: #212a86;
            --wave: linear-gradient(115deg, #2ec6e0 0%, #2f6fd0 52%, #212a86 100%);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--ink);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }
        .wrap { max-width: 1160px; margin: 0 auto; padding: 0 1.5rem; }
        .accent { background: var(--wave); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
            padding: 0.85rem 1.6rem; border-radius: 10px;
            font-weight: 700; font-size: 0.96rem; cursor: pointer; border: 1px solid transparent;
            transition: transform 0.12s ease, box-shadow 0.2s ease, background 0.2s ease, color 0.2s ease;
        }
        .btn-primary { background: var(--wave); color: #fff; box-shadow: 0 12px 26px -10px rgba(47,111,208,0.6); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 18px 36px -12px rgba(47,111,208,0.7); }
        .btn-ghost { background: #fff; border-color: var(--line); color: var(--ink); }
        .btn-ghost:hover { border-color: var(--blue); color: var(--blue); }

        /* ---------- Nav ---------- */
        header {
            position: sticky; top: 0; z-index: 50;
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.85);
            border-bottom: 1px solid var(--line);
        }
        .nav { display: flex; align-items: center; justify-content: space-between; height: 74px; }
        .nav .logo img { height: 34px; width: auto; }
        .nav-links { display: flex; gap: 1.9rem; align-items: center; }
        .nav-links a { color: var(--muted); font-size: 0.93rem; font-weight: 600; transition: color 0.15s; }
        .nav-links a:hover { color: var(--indigo); }
        .nav-cta { display: flex; align-items: center; gap: 0.9rem; }
        /* Hamburger (mobile only) */
        .nav-toggle {
            display: none; flex-direction: column; justify-content: center; gap: 5px;
            width: 42px; height: 42px; padding: 0 9px; border: 1px solid var(--line);
            border-radius: 10px; background: #fff; cursor: pointer;
        }
        .nav-toggle span { display: block; height: 2px; width: 100%; background: var(--ink); border-radius: 2px; transition: transform 0.2s ease, opacity 0.2s ease; }
        .nav-toggle[aria-expanded="true"] span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .nav-toggle[aria-expanded="true"] span:nth-child(2) { opacity: 0; }
        .nav-toggle[aria-expanded="true"] span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
        @media (max-width: 880px) {
            .nav-toggle { display: flex; }
            .nav-cta .btn-ghost { display: none; }
            .nav-links {
                display: none; position: absolute; top: 74px; left: 0; right: 0;
                flex-direction: column; align-items: stretch; gap: 0;
                background: rgba(255,255,255,0.98); backdrop-filter: blur(10px);
                border-bottom: 1px solid var(--line); padding: 0.5rem 1.5rem 1rem;
                box-shadow: 0 20px 30px -24px rgba(23,37,84,0.4);
            }
            .nav-links.open { display: flex; }
            .nav-links a { padding: 0.85rem 0; font-size: 1rem; border-bottom: 1px solid var(--line); }
            .nav-links a:last-child { border-bottom: none; }
        }

        /* ---------- Hero ---------- */
        .hero { position: relative; padding: 4.5rem 0 4rem; }
        .hero::before {
            content: ""; position: absolute; inset: 0; z-index: -1;
            background:
                radial-gradient(620px 340px at 12% 0%, rgba(46,198,224,0.12), transparent 70%),
                radial-gradient(600px 360px at 92% 30%, rgba(33,42,134,0.08), transparent 70%);
        }
        .hero-grid { display: grid; grid-template-columns: 1.05fr 0.95fr; gap: 3.5rem; align-items: center; }
        @media (max-width: 900px) { .hero-grid { grid-template-columns: 1fr; gap: 2.5rem; } }
        .eyebrow {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.4rem 0.9rem; border-radius: 999px;
            border: 1px solid var(--line); background: #fff;
            font-size: 0.78rem; letter-spacing: 0.06em; font-weight: 700;
            color: var(--blue); margin-bottom: 1.5rem;
        }
        .eyebrow .pill { background: var(--wave); color: #fff; padding: 0.12rem 0.5rem; border-radius: 999px; font-size: 0.68rem; letter-spacing: 0.08em; }
        .hero h1 {
            font-size: clamp(2.3rem, 5.2vw, 3.9rem);
            font-weight: 800; line-height: 1.06; letter-spacing: -0.03em; color: var(--navy);
            margin-bottom: 1.25rem;
        }
        .hero p.lede { font-size: clamp(1.05rem, 2vw, 1.25rem); color: var(--muted); max-width: 46ch; margin-bottom: 2rem; }
        .hero-cta { display: flex; gap: 1rem; flex-wrap: wrap; }
        .hero-note { margin-top: 1.3rem; font-size: 0.85rem; color: var(--muted); }
        .hero-note strong { color: var(--ink); }

        /* Hero media with floating stat card */
        .hero-media { position: relative; }
        .hero-media .shot { border-radius: 20px; overflow: hidden; box-shadow: 0 30px 60px -25px rgba(23,37,84,0.45); aspect-ratio: 4/3.4; }
        .hero-media .shot img { width: 100%; height: 100%; object-fit: cover; }
        .hero-media .shot::after { content: ""; position: absolute; inset: 0; border-radius: 20px; background: linear-gradient(160deg, rgba(46,198,224,0.18), rgba(33,42,134,0.35)); }
        .float-card {
            position: absolute; left: -1.5rem; bottom: -1.5rem;
            background: #fff; border: 1px solid var(--line); border-radius: 16px;
            padding: 1.1rem 1.3rem; box-shadow: 0 20px 40px -18px rgba(23,37,84,0.35);
            display: flex; align-items: center; gap: 0.9rem; max-width: 260px;
        }
        .float-card .spark { width: 42px; height: 42px; border-radius: 12px; background: var(--wave); display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0; }
        .float-card strong { display: block; font-size: 1.4rem; font-weight: 800; letter-spacing: -0.02em; color: var(--navy); line-height: 1.1; }
        .float-card span { font-size: 0.78rem; color: var(--muted); }
        @media (max-width: 900px) { .float-card { left: auto; right: 1rem; } }

        /* ---------- Trust bar (dark logo wall) ---------- */
        .trust { padding: 2.75rem 0; background: var(--navy); }
        .trust p { text-align: center; font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase; color: #9fb3d0; margin-bottom: 1.6rem; font-weight: 700; }
        .trust-logos { display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 3.25rem; }
        .trust-logos a.plogo {
            display: flex; flex-direction: column; align-items: center; gap: 0.55rem;
            opacity: 0.72; transition: opacity 0.18s ease;
        }
        .trust-logos a.plogo:hover { opacity: 1; }
        .trust-logos img {
            /* logos are pre-processed to uniform-height white silhouettes (see /img/partners) */
            height: 44px; width: auto; max-width: 180px; object-fit: contain;
        }
        .trust-logos .pname { color: #9fb3d0; font-size: 0.68rem; letter-spacing: 0.09em; text-transform: uppercase; font-weight: 700; }
        @media (max-width: 600px) { .trust-logos { gap: 2rem; } .trust-logos img { height: 32px; max-width: 130px; } }

        /* ---------- Sections ---------- */
        section.block { padding: 5.5rem 0; }
        .section-head { text-align: center; max-width: 640px; margin: 0 auto 3rem; }
        .section-head .kicker { color: var(--blue); font-weight: 800; font-size: 0.8rem; letter-spacing: 0.12em; text-transform: uppercase; }
        .section-head h2 { font-size: clamp(1.9rem, 4vw, 2.7rem); font-weight: 800; letter-spacing: -0.02em; margin: 0.55rem 0 0.85rem; line-height: 1.1; color: var(--navy); }
        .section-head p { color: var(--muted); font-size: 1.08rem; }

        /* ---------- Surge flagship ---------- */
        #surge { background: var(--bg-alt); }
        .surge-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3.5rem; align-items: center; }
        @media (max-width: 900px) { .surge-grid { grid-template-columns: 1fr; gap: 2.5rem; } }
        .surge-badge { display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.35rem 0.85rem; border-radius: 999px; background: var(--wave); color: #fff; font-size: 0.74rem; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 1.1rem; }
        .surge-grid h2 { font-size: clamp(2rem, 4.5vw, 3rem); font-weight: 800; letter-spacing: -0.02em; color: var(--navy); line-height: 1.08; margin-bottom: 1rem; }
        .surge-grid > div > p.sub { color: var(--muted); font-size: 1.1rem; margin-bottom: 1.5rem; }
        .surge-list { list-style: none; margin-bottom: 1.75rem; }
        .surge-list li { position: relative; padding-left: 1.8rem; margin-bottom: 0.7rem; font-size: 0.98rem; color: var(--ink); }
        .surge-list li::before { content: "✓"; position: absolute; left: 0; top: 0; width: 1.25rem; height: 1.25rem; background: var(--wave); color: #fff; border-radius: 50%; font-size: 0.72rem; display: flex; align-items: center; justify-content: center; margin-top: 0.28rem; }
        .surge-metrics { display: flex; gap: 2rem; flex-wrap: wrap; margin-top: 1.75rem; padding-top: 1.5rem; border-top: 1px solid var(--line); }
        .surge-metrics .m strong { display: block; font-size: 2rem; font-weight: 800; letter-spacing: -0.03em; line-height: 1; }
        .surge-metrics .m span { font-size: 0.8rem; color: var(--muted); }
        .surge-media { position: relative; border-radius: 20px; overflow: hidden; box-shadow: 0 30px 60px -28px rgba(23,37,84,0.5); aspect-ratio: 4/4.2; }
        .surge-media img { width: 100%; height: 100%; object-fit: cover; }
        .surge-media::after { content: ""; position: absolute; inset: 0; background: linear-gradient(160deg, rgba(46,198,224,0.1), rgba(33,42,134,0.34)); }
        .surge-media .tagover { position: absolute; left: 1.4rem; bottom: 1.4rem; z-index: 2; color: #fff; font-weight: 800; font-size: 1.15rem; letter-spacing: -0.01em; text-shadow: 0 2px 12px rgba(0,0,0,0.4); }

        /* ---------- Disciplines grid ---------- */
        .disc-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; }
        @media (max-width: 900px) { .disc-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 520px) { .disc-grid { grid-template-columns: 1fr; } }
        .disc {
            padding: 1.7rem; border-radius: 16px; border: 1px solid var(--line); background: #fff;
            transition: transform 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease;
        }
        .disc:hover { transform: translateY(-4px); border-color: rgba(47,111,208,0.4); box-shadow: 0 22px 40px -26px rgba(23,37,84,0.35); }
        .disc .ic { width: 46px; height: 46px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 1rem; background: linear-gradient(140deg, rgba(46,198,224,0.16), rgba(33,42,134,0.12)); }
        .disc h3 { font-size: 1.15rem; font-weight: 800; margin-bottom: 0.45rem; letter-spacing: -0.01em; color: var(--navy); }
        .disc p { color: var(--muted); font-size: 0.93rem; margin-bottom: 0.9rem; }
        .disc ul { list-style: none; }
        .disc ul li { font-size: 0.86rem; color: #43586c; padding-left: 1.2rem; position: relative; margin-bottom: 0.3rem; }
        .disc ul li::before { content: "→"; position: absolute; left: 0; color: var(--blue); }

        /* ---------- Results / stats ---------- */
        #results { background: var(--bg-alt); }
        .results-grid { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 3.5rem; align-items: center; }
        @media (max-width: 900px) { .results-grid { grid-template-columns: 1fr; gap: 2.5rem; } }
        .results-media { border-radius: 20px; overflow: hidden; box-shadow: 0 30px 60px -28px rgba(23,37,84,0.5); aspect-ratio: 4/3.2; }
        .results-media img { width: 100%; height: 100%; object-fit: cover; }
        .stats { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.1rem; }
        .stat { padding: 1.6rem 1.4rem; border-radius: 16px; border: 1px solid var(--line); background: #fff; }
        .stat strong { display: block; font-size: clamp(1.9rem, 3.5vw, 2.6rem); font-weight: 800; letter-spacing: -0.03em; line-height: 1; color: var(--navy); }
        .stat span { color: var(--muted); font-size: 0.88rem; }

        /* ---------- Process ---------- */
        .steps { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
        @media (max-width: 800px) { .steps { grid-template-columns: 1fr; } }
        .step { padding: 1.75rem; border-radius: 16px; border: 1px solid var(--line); background: #fff; }
        .step .num { display: inline-block; font-size: 0.82rem; font-weight: 800; color: #fff; background: var(--wave); padding: 0.2rem 0.6rem; border-radius: 8px; letter-spacing: 0.06em; }
        .step h4 { font-size: 1.15rem; margin: 0.7rem 0 0.5rem; color: var(--navy); }
        .step p { color: var(--muted); font-size: 0.93rem; }

        /* ---------- CTA / form ---------- */
        .cta { position: relative; margin: 1rem 0 4.5rem; padding: 3.5rem 2rem; border-radius: 26px; overflow: hidden; background: var(--navy); text-align: center; }
        .cta::before { content: ""; position: absolute; inset: 0; z-index: 0; background: radial-gradient(560px 300px at 50% -20%, rgba(46,198,224,0.35), transparent 70%), radial-gradient(500px 300px at 90% 120%, rgba(47,111,208,0.4), transparent 70%); }
        .cta > * { position: relative; z-index: 1; }
        .cta h2 { font-size: clamp(1.9rem, 4vw, 2.7rem); font-weight: 800; letter-spacing: -0.02em; margin-bottom: 0.8rem; color: #fff; }
        .cta p.sub { color: #b7c6e0; max-width: 48ch; margin: 0 auto 2rem; font-size: 1.05rem; }
        form.lead { max-width: 520px; margin: 0 auto; text-align: left; }
        .field-row { display: flex; gap: 0.75rem; margin-bottom: 0.75rem; }
        .field-row input { flex: 1; }
        form.lead input { width: 100%; padding: 0.9rem 1rem; border-radius: 10px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.08); color: #fff; font-size: 1rem; }
        form.lead input::placeholder { color: #9fb3d0; }
        form.lead input:focus { outline: none; border-color: var(--cyan); background: rgba(255,255,255,0.14); }
        form.lead button { width: 100%; margin-top: 0.3rem; }
        .cta-fineprint { margin-top: 1rem; font-size: 0.82rem; color: #9fb3d0; }
        .thank-you { max-width: 520px; margin: 0 auto; padding: 2rem; border-radius: 16px; background: rgba(46,198,224,0.14); border: 1px solid rgba(46,198,224,0.4); color: #eaf6fb; font-size: 1.1rem; }
        @media (max-width: 480px) { .field-row { flex-direction: column; gap: 0.75rem; } }

        /* ---------- Footer ---------- */
        footer.site { border-top: 1px solid var(--line); padding: 2.5rem 0; }
        .foot { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; }
        .foot img { height: 30px; width: auto; }
        .foot p { color: var(--muted); font-size: 0.85rem; }
        .foot-links { display: flex; gap: 1.5rem; }
        .foot-links a { color: var(--muted); font-size: 0.85rem; font-weight: 600; }
        .foot-links a:hover { color: var(--indigo); }

        /* ---------- Mobile refinements ---------- */
        @media (max-width: 700px) {
            section.block { padding: 3.5rem 0; }
            .hero { padding: 3rem 0 2.5rem; }
            .section-head { margin-bottom: 2.25rem; }
            .trust { padding: 2.25rem 0; }
            .surge-metrics { gap: 1.25rem 1.75rem; }
            .cta { padding: 2.75rem 1.4rem; margin-bottom: 3rem; border-radius: 20px; }
            /* Let the stat card sit under the hero image instead of overlapping */
            .hero-media .shot { aspect-ratio: 16/11; }
            .float-card { position: static; left: auto; right: auto; bottom: auto; margin-top: 1rem; max-width: none; }
            .foot { flex-direction: column; text-align: center; }
        }
        @media (max-width: 480px) {
            .wrap { padding: 0 1.15rem; }
            .hero-cta, .surge-grid .hero-cta { flex-direction: column; align-items: stretch; }
            .hero-cta .btn { width: 100%; }
            .cta .btn { width: 100%; }
        }
    </style>
</head>
<body>

    <!-- ===== Nav ===== -->
    <header>
        <div class="wrap nav">
            <a href="/" class="logo"><img src="/img/earlywater-logo.png" alt="Earlywater — Go-To-Market"></a>
            <nav class="nav-links" id="navLinks">
                <a href="#surge">Surge</a>
                <a href="#disciplines">Disciplines</a>
                <a href="#results">Results</a>
                <a href="#process">How it works</a>
            </nav>
            <div class="nav-cta">
                <a href="#surge" class="btn btn-ghost">Explore Surge</a>
                <a href="<?= htmlspecialchars($calendlyUrl) ?>" target="_blank" rel="noopener" class="btn btn-primary">Book a growth session</a>
                <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-controls="navLinks" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>

    <!-- ===== Hero (Surge-led) ===== -->
    <section class="hero">
        <div class="wrap hero-grid">
            <div>
                <span class="eyebrow"><span class="pill">NEW</span> Audience Building = Revenue Generation</span>
                <h1>Meet <span class="accent">Surge</span> — the growth sprint that turns audiences into revenue.</h1>
                <p class="lede">Earlywater's flagship go-to-market program concentrates every channel into one coordinated push — so hidden profit leaks become scalable growth systems, fast.</p>
                <div class="hero-cta">
                    <a href="<?= htmlspecialchars($calendlyUrl) ?>" target="_blank" rel="noopener" class="btn btn-primary">Book your 30-min growth session</a>
                    <a href="#surge" class="btn btn-ghost">See how Surge works</a>
                </div>
                <p class="hero-note"><strong>3.4x</strong> average revenue lift in-window · measurable impact in <strong>14 days</strong>.</p>
            </div>
            <div class="hero-media">
                <div class="shot"><img src="/img/hero-water.jpg" alt="Aerial ocean water — Earlywater"></div>
                <div class="float-card">
                    <div class="spark">⚡</div>
                    <div>
                        <strong>+212%</strong>
                        <span>Qualified pipeline, avg. year one</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Trust ===== -->
    <div class="trust">
        <div class="wrap">
            <p>Growth partners to modern brands</p>
            <div class="trust-logos">
                <a class="plogo" href="https://fluxdefense.com" target="_blank" rel="noopener">
                    <img src="/img/partners/fluxdefense.png" alt="Flux Defense" loading="lazy">
                </a>
                <a class="plogo" href="https://snakestaffsystems.com" target="_blank" rel="noopener">
                    <img src="/img/partners/snakestaff.png" alt="Snakestaff Systems" loading="lazy">
                    <span class="pname">Snakestaff Systems</span>
                </a>
                <a class="plogo" href="https://bioptimizers.com" target="_blank" rel="noopener">
                    <img src="/img/partners/bioptimizers.png" alt="BiOptimizers" loading="lazy">
                </a>
                <a class="plogo" href="https://www.crispiusa.com" target="_blank" rel="noopener">
                    <img src="/img/partners/crispi.png" alt="Crispi" loading="lazy">
                </a>
                <a class="plogo" href="https://hystreamyachts.com" target="_blank" rel="noopener">
                    <img src="/img/partners/hystream.png" alt="Hystream Yachts" loading="lazy">
                    <span class="pname">Hystream Yachts</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ===== Surge flagship ===== -->
    <section class="block" id="surge">
        <div class="wrap surge-grid">
            <div>
                <span class="surge-badge">⚡ Flagship Product</span>
                <h2>Surge</h2>
                <p class="sub">Our high-velocity growth sprint. When you need a launch, a season, or a number to move <em>now</em>, Surge fires creative, media, and lifecycle together — building the audience and converting it in one coordinated window.</p>
                <ul class="surge-list">
                    <li>Cross-channel campaign engineered around a fixed window</li>
                    <li>Daily optimization with a live revenue war-room</li>
                    <li>Full-funnel: demand capture, audience building &amp; conversion</li>
                    <li>Built for launches, promotions &amp; peak seasons</li>
                </ul>
                <div class="hero-cta">
                    <a href="<?= htmlspecialchars($calendlyUrl) ?>" target="_blank" rel="noopener" class="btn btn-primary">Start a Surge</a>
                    <a href="#disciplines" class="btn btn-ghost">What powers it</a>
                </div>
                <div class="surge-metrics">
                    <div class="m"><strong class="accent">3.4x</strong><span>Avg. revenue lift in-window</span></div>
                    <div class="m"><strong class="accent">14d</strong><span>To measurable impact</span></div>
                    <div class="m"><strong class="accent">1</strong><span>Team, fully aligned</span></div>
                </div>
            </div>
            <div class="surge-media">
                <img src="/img/surge.jpg" alt="Surge — high-velocity growth sprint">
                <div class="tagover">Every channel. One window. Real revenue.</div>
            </div>
        </div>
    </section>

    <!-- ===== Disciplines (the engine behind Surge) ===== -->
    <section class="block" id="disciplines">
        <div class="wrap">
            <div class="section-head">
                <span class="kicker">The engine behind Surge</span>
                <h2>Every discipline, working as one</h2>
                <p>Each channel builds audience. Together they build revenue. We run them as one integrated engine — not four disconnected vendors.</p>
            </div>
            <div class="disc-grid">
                <div class="disc">
                    <div class="ic">🎯</div>
                    <h3>Paid Search</h3>
                    <p>Capture in-market buyers the moment they're searching — with margins that hold as you scale.</p>
                    <ul>
                        <li>Google &amp; Bing, PMax &amp; Shopping</li>
                        <li>Profit-based bidding</li>
                        <li>Conversion-tuned landing pages</li>
                    </ul>
                </div>
                <div class="disc">
                    <div class="ic">🔍</div>
                    <h3>SEO</h3>
                    <p>Own the organic real estate your buyers trust — an audience asset that pays down CAC over time.</p>
                    <ul>
                        <li>Technical, content &amp; authority</li>
                        <li>Topic clusters mapped to intent</li>
                        <li>Durable, compounding traffic</li>
                    </ul>
                </div>
                <div class="disc">
                    <div class="ic">🤖</div>
                    <h3>AI / LLM</h3>
                    <p>Show up inside ChatGPT, Gemini &amp; AI Overviews — where discovery is moving next.</p>
                    <ul>
                        <li>Answer Engine Optimization</li>
                        <li>Structured data &amp; entities</li>
                        <li>Cited by the models buyers ask</li>
                    </ul>
                </div>
                <div class="disc">
                    <div class="ic">✉️</div>
                    <h3>Email / SMS</h3>
                    <p>Turn traffic into an audience you own — and monetize it with lifecycle flows that never sleep.</p>
                    <ul>
                        <li>Welcome, nurture &amp; win-back</li>
                        <li>Segmentation &amp; triggers</li>
                        <li>Revenue per subscriber, tracked</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Results ===== -->
    <section class="block" id="results">
        <div class="wrap results-grid">
            <div class="results-media">
                <img src="/img/analytics.jpg" alt="Revenue analytics dashboard">
            </div>
            <div>
                <div class="section-head" style="text-align:left; margin:0 0 1.75rem;">
                    <span class="kicker">Audience → Revenue</span>
                    <h2>The math works</h2>
                    <p>We report on pipeline and revenue, not impressions. Here's what building audience the Earlywater way looks like.</p>
                </div>
                <div class="stats">
                    <div class="stat"><strong class="accent">+212%</strong><span>Qualified pipeline, avg. year one</span></div>
                    <div class="stat"><strong class="accent">-38%</strong><span>Blended cost per acquisition</span></div>
                    <div class="stat"><strong class="accent">5.1x</strong><span>Return on ad spend</span></div>
                    <div class="stat"><strong class="accent">3.4x</strong><span>Revenue lift per Surge</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Process ===== -->
    <section class="block" id="process">
        <div class="wrap">
            <div class="section-head">
                <span class="kicker">How it works</span>
                <h2>From audience to revenue in three moves</h2>
            </div>
            <div class="steps">
                <div class="step">
                    <span class="num">01</span>
                    <h4>Map the audience</h4>
                    <p>We find where your best buyers search, scroll, and ask — across paid, organic, AI, and inbox — then size the revenue behind each.</p>
                </div>
                <div class="step">
                    <span class="num">02</span>
                    <h4>Build the engine</h4>
                    <p>We stand up the disciplines that matter most for you as one connected system, with a single view of what's driving revenue.</p>
                </div>
                <div class="step">
                    <span class="num">03</span>
                    <h4>Surge &amp; scale</h4>
                    <p>We deploy Surge sprints to hit the moments that move your number the most — then compound the winners.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA / Lead capture ===== -->
    <section class="block" id="start" style="padding-top:0;">
        <div class="wrap">
            <div class="cta">
                <h2>Book your 30-min growth consultation</h2>
                <p class="sub">Grab a time that works for you and we'll map a Surge to your funnel — free. No lock-in, just a plan to grow revenue.</p>
                <a href="<?= htmlspecialchars($calendlyUrl) ?>" target="_blank" rel="noopener" class="btn btn-primary" style="font-size:1.05rem; padding:1rem 2rem;">Book your growth consultation →</a>
                <p class="cta-fineprint">Opens Calendly · 30 minutes · free</p>
            </div>
        </div>
    </section>

    <!-- ===== Footer ===== -->
    <footer class="site">
        <div class="wrap foot">
            <a href="/" class="logo"><img src="/img/earlywater-logo.png" alt="Earlywater"></a>
            <p>Audience Building = Revenue Generation</p>
            <div class="foot-links">
                <a href="#surge">Surge</a>
                <a href="#disciplines">Disciplines</a>
                <a href="<?= htmlspecialchars($calendlyUrl) ?>" target="_blank" rel="noopener">Book a session</a>
            </div>
        </div>
        <div class="wrap" style="margin-top:1rem;">
            <p style="color:var(--muted);font-size:0.8rem;">&copy; <?= date('Y') ?> Earlywater. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile nav toggle
        (function () {
            var toggle = document.getElementById('navToggle');
            var links = document.getElementById('navLinks');
            if (!toggle || !links) return;
            function setOpen(open) {
                links.classList.toggle('open', open);
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            }
            toggle.addEventListener('click', function () {
                setOpen(!links.classList.contains('open'));
            });
            // Close after tapping a link
            links.querySelectorAll('a').forEach(function (a) {
                a.addEventListener('click', function () { setOpen(false); });
            });
        })();
    </script>

</body>
</html>
