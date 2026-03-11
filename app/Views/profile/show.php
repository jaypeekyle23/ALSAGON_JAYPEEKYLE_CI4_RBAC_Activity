<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap');

    :root {
        --bg: #F5F3EE;
        --surface: #FFFFFF;
        --surface-2: #F0EDE6;
        --border: #E2DDD4;
        --border-strong: #C8C0B0;
        --text-primary: #1A1714;
        --text-secondary: #6B6560;
        --text-muted: #9D9690;
        --accent: #2D5BE3;
        --accent-light: #EEF2FD;
        --accent-hover: #1F47C7;
        --success: #059669;
        --success-light: #D1FAE5;
        --shadow-sm: 0 1px 3px rgba(26,23,20,0.06), 0 1px 2px rgba(26,23,20,0.04);
        --shadow-md: 0 4px 16px rgba(26,23,20,0.08), 0 2px 6px rgba(26,23,20,0.05);
        --radius: 12px;
        --radius-sm: 8px;
        --radius-xs: 6px;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        background-color: var(--bg);
        font-family: 'DM Sans', sans-serif;
        color: var(--text-primary);
        min-height: 100vh;
        -webkit-font-smoothing: antialiased;
    }

    .profile-wrapper {
        max-width: 900px;
        margin: 0 auto;
        padding: 48px 24px 80px;
        animation: fadeUp 0.45s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Header ── */
    .profile-page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1.5px solid var(--border);
    }

    .profile-eyebrow {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 6px;
    }

    .profile-page-title {
        font-family: 'Instrument Serif', serif;
        font-size: clamp(26px, 4vw, 36px);
        font-weight: 400;
        line-height: 1.1;
        color: var(--text-primary);
    }

    .profile-page-title em {
        font-style: italic;
        color: var(--text-secondary);
    }

    /* ── Alert ── */
    .alert-bar {
        margin-bottom: 24px;
        border-radius: var(--radius-sm);
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        font-weight: 500;
        background: var(--success-light);
        border: 1px solid #6EE7B7;
        color: #065F46;
        animation: fadeUp 0.3s ease both;
    }

    .alert-close {
        margin-left: auto;
        background: none;
        border: none;
        cursor: pointer;
        opacity: 0.5;
        font-size: 18px;
        line-height: 1;
        color: inherit;
        transition: opacity 0.15s;
    }

    .alert-close:hover { opacity: 1; }

    /* ── Layout ── */
    .profile-grid {
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 20px;
        align-items: start;
    }

    @media (max-width: 720px) {
        .profile-grid { grid-template-columns: 1fr; }
        .profile-page-header { flex-direction: column; align-items: flex-start; gap: 16px; }
    }

    /* ── Card base ── */
    .card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        overflow: visible;
        transition: box-shadow 0.2s ease;
    }

    .card-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        border-radius: var(--radius) var(--radius) 0 0;
        background: var(--surface-2);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-header-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--accent);
        flex-shrink: 0;
    }

    .card-header-title {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    /* ── Identity card (left) ── */
    .identity-card .card-body {
        padding: 28px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 0;
    }

    .avatar-wrap {
        position: relative;
        margin-bottom: 18px;
    }

    .avatar-img {
        width: 96px;
        height: 96px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--surface);
        box-shadow: 0 0 0 2px var(--border), var(--shadow-md);
        display: block;
    }

    .avatar-status {
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #10B981;
        border: 2.5px solid var(--surface);
    }

    .identity-name {
        font-family: 'Instrument Serif', serif;
        font-size: 22px;
        font-weight: 400;
        color: var(--text-primary);
        line-height: 1.2;
        margin-bottom: 4px;
    }

    .identity-email {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 20px;
        word-break: break-all;
    }

    .identity-divider {
        width: 100%;
        height: 1px;
        background: var(--border);
        margin-bottom: 20px;
    }

    .identity-meta {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 24px;
    }

    .identity-meta-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 12px;
    }

    .identity-meta-label {
        color: var(--text-muted);
        font-weight: 500;
        letter-spacing: 0.04em;
    }

    .identity-meta-value {
        font-weight: 600;
        color: var(--text-primary);
        text-align: right;
    }

    .identity-meta-value.not-set {
        color: var(--text-muted);
        font-weight: 400;
        font-style: italic;
    }

    .btn-edit-profile {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 16px;
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
        box-shadow: 0 2px 8px rgba(45, 91, 227, 0.22);
    }

    .btn-edit-profile:hover {
        background: var(--accent-hover);
        box-shadow: 0 4px 14px rgba(45, 91, 227, 0.32);
        transform: translateY(-1px);
        color: #fff;
    }

    /* ── Details card (right) ── */
    .details-card .card-body {
        padding: 0;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 140px 1fr;
        align-items: start;
        padding: 16px 24px;
        border-bottom: 1px solid var(--border);
        transition: background 0.12s;
        gap: 12px;
    }

    .detail-row:last-child { border-bottom: none; }
    .detail-row:hover { background: #FAFAF8; }

    .detail-label {
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--text-muted);
        padding-top: 1px;
        white-space: nowrap;
    }

    .detail-value {
        font-size: 14px;
        font-weight: 500;
        color: var(--text-primary);
        line-height: 1.45;
    }

    .detail-value.not-set {
        color: var(--text-muted);
        font-style: italic;
        font-weight: 400;
    }

    .detail-value.subtle {
        color: var(--text-secondary);
        font-weight: 400;
        font-size: 13px;
    }

    .detail-section-header {
        padding: 12px 24px 8px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--text-muted);
        background: var(--surface-2);
        border-bottom: 1px solid var(--border);
    }

    /* ── Year badge ── */
    .year-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 10px;
        border-radius: 100px;
        background: var(--accent-light);
        border: 1px solid #BFCFFA;
        font-size: 12px;
        font-weight: 600;
        color: var(--accent);
    }
</style>

<div class="profile-wrapper">

    <!-- Alert -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert-bar" id="alert-success">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><polyline points="20 6 9 17 4 12"/></svg>
            <?= session()->getFlashdata('success') ?>
            <button class="alert-close" onclick="document.getElementById('alert-success').remove()">×</button>
        </div>
    <?php endif; ?>

    <!-- Page Header -->
    <div class="profile-page-header">
        <div>
            <div class="profile-eyebrow">Account</div>
            <h1 class="profile-page-title">My <em>Profile</em></h1>
        </div>
    </div>

    <!-- Grid -->
    <div class="profile-grid">

        <!-- Left: Identity Card -->
        <div class="card identity-card">
            <div class="card-header">
                <div class="card-header-dot"></div>
                <span class="card-header-title">Identity</span>
            </div>
            <div class="card-body">
                <div class="avatar-wrap">
                    <?php if (!empty($user['profile_image'])): ?>
                        <img src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" alt="Profile Image" class="avatar-img">
                    <?php else: ?>
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['name'] ?? 'User') ?>&background=E2DDD4&color=6B6560&size=150&bold=true&font-size=0.4" alt="Avatar" class="avatar-img">
                    <?php endif; ?>
                    <div class="avatar-status" title="Active"></div>
                </div>

                <div class="identity-name"><?= esc($user['name'] ?? $user['fullname'] ?? 'Student') ?></div>
                <div class="identity-email"><?= esc($user['email'] ?? $user['username'] ?? '') ?></div>

                <div class="identity-divider"></div>

                <div class="identity-meta">
                    <div class="identity-meta-row">
                        <span class="identity-meta-label">Course</span>
                        <span class="identity-meta-value <?= empty($user['course']) ? 'not-set' : '' ?>">
                            <?= !empty($user['course']) ? esc($user['course']) : '—' ?>
                        </span>
                    </div>
                    <div class="identity-meta-row">
                        <span class="identity-meta-label">Year</span>
                        <span class="identity-meta-value <?= empty($user['year_level']) ? 'not-set' : '' ?>">
                            <?php if (!empty($user['year_level'])): ?>
                                <span class="year-badge">Year <?= esc($user['year_level']) ?></span>
                            <?php else: ?> — <?php endif; ?>
                        </span>
                    </div>
                    <div class="identity-meta-row">
                        <span class="identity-meta-label">Section</span>
                        <span class="identity-meta-value <?= empty($user['section']) ? 'not-set' : '' ?>">
                            <?= !empty($user['section']) ? esc($user['section']) : '—' ?>
                        </span>
                    </div>
                </div>

                <a href="<?= base_url('profile/edit') ?>" class="btn-edit-profile">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Right: Details Card -->
        <div class="card details-card">
            <div class="card-header">
                <div class="card-header-dot"></div>
                <span class="card-header-title">Student Details</span>
            </div>

            <div class="card-body">
                <div class="detail-section-header">Academic</div>

                <div class="detail-row">
                    <span class="detail-label">Student ID</span>
                    <?php if (!empty($user['student_id'])): ?>
                        <span class="detail-value"><?= esc($user['student_id']) ?></span>
                    <?php else: ?>
                        <span class="detail-value not-set">Not set</span>
                    <?php endif; ?>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Course</span>
                    <?php if (!empty($user['course'])): ?>
                        <span class="detail-value"><?= esc($user['course']) ?></span>
                    <?php else: ?>
                        <span class="detail-value not-set">Not set</span>
                    <?php endif; ?>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Year Level</span>
                    <?php if (!empty($user['year_level'])): ?>
                        <span class="detail-value"><span class="year-badge">Year <?= esc($user['year_level']) ?></span></span>
                    <?php else: ?>
                        <span class="detail-value not-set">Not set</span>
                    <?php endif; ?>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Section</span>
                    <?php if (!empty($user['section'])): ?>
                        <span class="detail-value"><?= esc($user['section']) ?></span>
                    <?php else: ?>
                        <span class="detail-value not-set">Not set</span>
                    <?php endif; ?>
                </div>

                <div class="detail-section-header">Contact</div>

                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <?php if (!empty($user['phone'])): ?>
                        <span class="detail-value"><?= esc($user['phone']) ?></span>
                    <?php else: ?>
                        <span class="detail-value not-set">Not set</span>
                    <?php endif; ?>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Address</span>
                    <?php if (!empty($user['address'])): ?>
                        <span class="detail-value"><?= esc($user['address']) ?></span>
                    <?php else: ?>
                        <span class="detail-value not-set">Not set</span>
                    <?php endif; ?>
                </div>

                <div class="detail-section-header">Account</div>

                <div class="detail-row">
                    <span class="detail-label">Member Since</span>
                    <span class="detail-value subtle"><?= esc($user['created_at'] ?? 'Unknown') ?></span>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>