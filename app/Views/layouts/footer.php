<style>
    /* ── Footer ──────────────────────────────────── */
    .footer {
        padding: 16px 24px;
        border-top: 1px solid rgba(0,0,0,.06);
        background: #fff;
        margin-top: auto;
    }
    .footer-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    /* ── Left: brand + meta ──────────────────────── */
    .footer-left {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    .footer-brand {
        font-size: 12.5px;
        font-weight: 700;
        color: #334155;
        text-decoration: none;
        font-family: 'Inter', system-ui, sans-serif;
    }
    .footer-brand:hover { color: #4F46E5; }

    .footer-divider {
        width: 1px; height: 14px;
        background: #CBD5E1;
        flex-shrink: 0;
    }

    .footer-meta {
        font-size: 11.5px;
        color: #94A3B8;
        font-family: 'Inter', system-ui, sans-serif;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }
    .footer-meta-sep { color: #CBD5E1; }

    /* ── Env badge ───────────────────────────────── */
    .env-badge {
        display: inline-flex;
        align-items: center;
        padding: 2px 8px;
        border-radius: 999px;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .04em;
    }
    .env-badge-dev        { background: #FEF3C7; color: #D97706; }
    .env-badge-production { background: #DCFCE7; color: #16A34A; }
    .env-badge-testing    { background: #EEF2FF; color: #4F46E5; }

    /* ── Right: links ────────────────────────────── */
    .footer-links {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .footer-link {
        font-size: 12px;
        font-weight: 500;
        color: #94A3B8;
        text-decoration: none;
        padding: 4px 10px;
        border-radius: 6px;
        font-family: 'Inter', system-ui, sans-serif;
        transition: background .13s, color .13s;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .footer-link:hover { background: #F1F5F9; color: #334155; }
    .footer-link svg { width: 12px; height: 12px; stroke-width: 2; opacity: .7; }

    @media (max-width: 575px) {
        .footer-inner { justify-content: center; text-align: center; }
        .footer-links { justify-content: center; }
    }
</style>

<footer class="footer">
    <div class="footer-inner">

        <!-- Left -->
        <div class="footer-left">
            <a class="footer-brand" href="#" target="_blank">CI4 Starter Panel</a>
            <div class="footer-divider"></div>
            <div class="footer-meta">
                <span>&copy; Gilang Heavy <?= date('Y'); ?></span>
                <span class="footer-meta-sep">·</span>
                <span><?= '{elapsed_time}' ?> s</span>
                <span class="footer-meta-sep">·</span>
                <?php
                    $env = strtolower(ENVIRONMENT);
                    $envClass = match($env) {
                        'production' => 'env-badge-production',
                        'testing'    => 'env-badge-testing',
                        default      => 'env-badge-dev',
                    };
                ?>
                <span class="env-badge <?= $envClass ?>"><?= ucfirst(ENVIRONMENT) ?></span>
            </div>
        </div>

        <!-- Right -->
        <div class="footer-links">
            <a class="footer-link" href="https://github.com/gilangheavy/CI4-StarterPanel" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                Support
            </a>
            <a class="footer-link" href="https://github.com/gilangheavy/CI4-StarterPanel/issues" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Help Center
            </a>
        </div>

    </div>
</footer>