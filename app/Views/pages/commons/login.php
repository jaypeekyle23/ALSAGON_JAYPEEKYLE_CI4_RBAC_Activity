<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Gilang Heavy">
    <meta name="keywords" content="Gilang Heavy, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <title>Sign In — CodeIgniter 4 Starter Panel</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/app.js') ?>"></script>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --indigo:       #4F46E5;
            --indigo-dark:  #3730A3;
            --indigo-light: #EEF2FF;
            --indigo-mid:   #6366F1;
            --slate-900:    #0F172A;
            --slate-700:    #334155;
            --slate-500:    #64748B;
            --slate-300:    #CBD5E1;
            --slate-200:    #E2E8F0;
            --slate-100:    #F1F5F9;
            --red:          #DC2626;
            --red-light:    #FEE2E2;
            --radius:       12px;
            --radius-sm:    8px;
        }

        html, body { height: 100%; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #F8F9FA;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px 16px;
        }

        /* ── Auth Card ───────────────────────────────── */
        .auth-card {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: 0 4px 24px rgba(0,0,0,.08), 0 1px 4px rgba(0,0,0,.04);
            border: 1px solid rgba(0,0,0,.06);
            width: 100%;
            max-width: 420px;
            padding: 44px 40px;
        }
        @media (max-width: 480px) { .auth-card { padding: 32px 24px; } }

        /* ── Brand ───────────────────────────────────── */
        .auth-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 32px;
        }
        .auth-brand-icon {
            width: 36px; height: 36px;
            background: var(--indigo);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 14px rgba(99,102,241,.35);
            flex-shrink: 0;
        }
        .auth-brand-icon svg { width: 18px; height: 18px; stroke: #fff; stroke-width: 2.2; }
        .auth-brand-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--slate-900);
        }
        .auth-brand-name em {
            font-style: normal;
            font-size: 11px;
            font-weight: 500;
            color: var(--slate-500);
            display: block;
            margin-top: 1px;
        }

        /* ── Heading ─────────────────────────────────── */
        .auth-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--slate-900);
            margin-bottom: 6px;
            line-height: 1.2;
        }
        .auth-subtitle {
            font-size: 13.5px;
            color: var(--slate-500);
            margin-bottom: 28px;
        }

        /* ── Alerts (CI4 flashdata) ───────────────────── */
        .alert-area { margin-bottom: 20px; }
        .alert-area:empty { display: none; }

        /* ── Form Labels ─────────────────────────────── */
        .form-label-custom {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: var(--slate-500);
            margin-bottom: 6px;
            display: block;
        }

        /* ── Inputs ──────────────────────────────────── */
        .form-control {
            font-size: 13.5px;
            color: var(--slate-900);
            border: 1.5px solid var(--slate-200);
            border-radius: var(--radius-sm);
            padding: 10px 13px;
            background: #fff;
            width: 100%;
            transition: border-color .15s, box-shadow .15s;
            outline: none;
            box-shadow: none;
            -webkit-appearance: none;
        }
        .form-control::placeholder { color: var(--slate-300); }
        .form-control:focus {
            border-color: var(--indigo);
            box-shadow: 0 0 0 3px rgba(79,70,229,.12);
        }
        .form-group { margin-bottom: 18px; }

        /* ── Input with icon ─────────────────────────── */
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute;
            left: 12px; top: 50%; transform: translateY(-50%);
            pointer-events: none;
        }
        .input-icon svg { width: 16px; height: 16px; stroke: var(--slate-300); stroke-width: 2; }
        .input-wrap .form-control { padding-left: 38px; }

        /* ── Helper link ─────────────────────────────── */
        .form-helper {
            display: block;
            margin-top: 6px;
            font-size: 12px;
            color: var(--slate-500);
        }
        .form-helper a {
            color: var(--indigo);
            text-decoration: none;
            font-weight: 600;
        }
        .form-helper a:hover { text-decoration: underline; }

        /* ── Divider ─────────────────────────────────── */
        .auth-divider {
            border: none;
            border-top: 1px solid var(--slate-100);
            margin: 24px 0;
        }

        /* ── Submit Button ───────────────────────────── */
        .btn-auth {
            width: 100%;
            padding: 11px;
            border-radius: 999px;
            background: var(--indigo);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: opacity .15s, box-shadow .15s;
            box-shadow: 0 2px 8px rgba(79,70,229,.28);
            text-decoration: none;
        }
        .btn-auth:hover { opacity: .88; }
        .btn-auth svg { width: 16px; height: 16px; stroke-width: 2; }

        /* ── Footer link ─────────────────────────────── */
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--slate-500);
        }
        .auth-footer a {
            color: var(--indigo);
            font-weight: 600;
            text-decoration: none;
        }
        .auth-footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="auth-card">

        <!-- Brand -->
        <div class="auth-brand">
            <div class="auth-brand-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
            </div>
            <div class="auth-brand-name">
                Starter Panel
                <em>Student Management System</em>
            </div>
        </div>

        <!-- Heading -->
        <h1 class="auth-title">Welcome back</h1>
        <p class="auth-subtitle">Sign in to your account to continue.</p>

        <!-- CI4 Alerts -->
        <div class="alert-area">
            <?= $this->include('components/alerts'); ?>
        </div>

        <!-- Form -->
        <form action="<?= base_url('login'); ?>" method="POST">

            <div class="form-group">
                <label class="form-label-custom" for="inputEmail">Email Address</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                    </span>
                    <input class="form-control" type="email" id="inputEmail" name="inputEmail" placeholder="name@school.edu.ph" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label-custom" for="inputPassword">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </span>
                    <input class="form-control" type="password" id="inputPassword" name="inputPassword" placeholder="Enter your password" required>
                </div>
            </div>

            <hr class="auth-divider">

            <button type="submit" class="btn-auth">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Sign In
            </button>

        </form>

        <p class="auth-footer">
            Don't have an account? <a href="<?= base_url('register') ?>">Create one</a>
        </p>

    </div>

</body>
</html>