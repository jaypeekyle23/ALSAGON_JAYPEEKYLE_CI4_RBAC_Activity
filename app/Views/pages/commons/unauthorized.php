<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    :root {
        --indigo:       #4F46E5;
        --indigo-light: #EEF2FF;
        --red:          #DC2626;
        --red-light:    #FEE2E2;
        --red-mid:      #EF4444;
        --slate-900:    #0F172A;
        --slate-700:    #334155;
        --slate-500:    #64748B;
        --slate-200:    #E2E8F0;
        --slate-100:    #F1F5F9;
        --radius:       12px;
        --shadow-sm:    0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
        --shadow-md:    0 4px 16px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.04);
    }
    body { background: #F8F9FA; font-family: 'Inter', system-ui, sans-serif; }

    /* ── Fullscreen center ───────────────────────── */
    .error-wrap {
        min-height: calc(100vh - 60px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
    }

    /* ── Card ────────────────────────────────────── */
    .error-card {
        background: #fff;
        border-radius: var(--radius);
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(0,0,0,.045);
        padding: 52px 48px;
        max-width: 520px;
        width: 100%;
        text-align: center;
    }
    @media (max-width: 575px) { .error-card { padding: 36px 24px; } }

    /* ── Icon bubble ─────────────────────────────── */
    .error-icon-wrap {
        width: 80px; height: 80px;
        border-radius: 50%;
        background: var(--red-light);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 28px;
        box-shadow: 0 0 0 10px rgba(220,38,38,.07);
    }
    .error-icon-wrap svg {
        width: 36px; height: 36px;
        stroke: var(--red);
        stroke-width: 2;
    }

    /* ── Code ────────────────────────────────────── */
    .error-code {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--red);
        margin-bottom: 8px;
    }

    /* ── Heading ─────────────────────────────────── */
    .error-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--slate-900);
        margin-bottom: 12px;
        line-height: 1.2;
    }

    /* ── Body text ───────────────────────────────── */
    .error-body {
        font-size: 14px;
        color: var(--slate-500);
        line-height: 1.7;
        margin-bottom: 28px;
    }

    /* ── Divider ─────────────────────────────────── */
    .error-divider {
        border: none;
        border-top: 1px solid var(--slate-100);
        margin: 0 0 24px;
    }

    /* ── Role row ────────────────────────────────── */
    .role-row {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--slate-100);
        border-radius: 999px;
        padding: 7px 16px;
        margin-bottom: 28px;
    }
    .role-row-label {
        font-size: 12.5px;
        color: var(--slate-500);
        font-weight: 500;
    }
    .role-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: var(--indigo-light);
        color: var(--indigo);
        border-radius: 999px;
        padding: 3px 11px;
        font-size: 12px;
        font-weight: 700;
    }
    .role-chip svg { width: 12px; height: 12px; stroke-width: 2.2; }

    /* ── Button ──────────────────────────────────── */
    .btn-return {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 26px;
        border-radius: 999px;
        background: var(--indigo);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        transition: opacity .15s, box-shadow .15s;
        box-shadow: 0 2px 8px rgba(79,70,229,.25);
    }
    .btn-return:hover { opacity: .88; color: #fff; }
    .btn-return svg { width: 16px; height: 16px; stroke-width: 2; }
</style>

<div class="error-wrap">
    <div class="error-card">

        <!-- Icon -->
        <div class="error-icon-wrap">
            <i data-lucide="shield-off"></i>
        </div>

        <!-- Code + Title -->
        <p class="error-code">Error 403 &mdash; Forbidden</p>
        <h1 class="error-title">Access Denied</h1>

        <!-- Description -->
        <p class="error-body">
            You don't have the required permissions to view this page.
            If you believe this is an error, please contact your system administrator.
        </p>

        <hr class="error-divider">

        <!-- Role indicator -->
        <div class="role-row">
            <span class="role-row-label">Signed in as</span>
            <span class="role-chip">
                <i data-lucide="user"></i>
                <?= ucfirst(session('user')['role'] ?? session()->get('role') ?? 'Unknown'); ?>
            </span>
        </div>

        <!-- Return button -->
        <?php
            $currentRole = session('user')['role'] ?? session()->get('role');
        ?>
        <?php if ($currentRole === 'student' || $currentRole == 3): ?>
            <a href="<?= base_url('student/dashboard') ?>" class="btn-return">
                <i data-lucide="arrow-left"></i> Return to Dashboard
            </a>
        <?php else: ?>
            <a href="<?= base_url('dashboard') ?>" class="btn-return">
                <i data-lucide="arrow-left"></i> Return to Dashboard
            </a>
        <?php endif; ?>

    </div>
</div>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<?= $this->endSection() ?>