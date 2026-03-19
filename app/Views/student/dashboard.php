<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    /* ── Design Tokens (shared system) ──────────────────── */
    :root {
        --page-bg:      #F8F9FA;
        --card-bg:      #FFFFFF;
        --indigo:       #4F46E5;
        --indigo-light: #EEF2FF;
        --indigo-mid:   #6366F1;
        --green:        #16A34A;
        --green-light:  #DCFCE7;
        --amber:        #D97706;
        --amber-light:  #FEF3C7;
        --red:          #DC2626;
        --red-light:    #FEE2E2;
        --slate-900:    #0F172A;
        --slate-700:    #334155;
        --slate-500:    #64748B;
        --slate-300:    #CBD5E1;
        --slate-100:    #F1F5F9;
        --radius:       12px;
        --radius-sm:    8px;
        --shadow-sm:    0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
        --shadow-md:    0 4px 16px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.04);
    }

    body { background: var(--page-bg); font-family: 'Inter', system-ui, sans-serif; }

    /* ── Page Header ─────────────────────────────────────── */
    .page-eyebrow {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--slate-500);
        margin-bottom: 2px;
    }
    .page-title {
        font-size: 1.55rem;
        font-weight: 700;
        color: var(--slate-900);
        margin: 0 0 4px;
        line-height: 1.2;
    }
    .page-title span { color: var(--indigo); }
    .page-subtitle {
        font-size: 13.5px;
        color: var(--slate-500);
        margin: 0;
    }
    .page-subtitle strong { color: var(--slate-700); font-weight: 600; }

    /* ── Stat Cards ──────────────────────────────────────── */
    .stat-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(0,0,0,.045);
        padding: 24px;
        height: 100%;
        transition: box-shadow .2s, transform .2s;
    }
    .stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
    .stat-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        color: var(--slate-500);
        margin-bottom: 10px;
    }
    .stat-value {
        font-size: 2.1rem;
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1;
        margin-bottom: 0;
    }
    .stat-icon {
        width: 46px; height: 46px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .stat-icon svg { width: 20px; height: 20px; stroke-width: 2; }
    .si-indigo { background: var(--indigo-light); color: var(--indigo); }
    .si-green  { background: var(--green-light);  color: var(--green);  }
    .si-red    { background: var(--red-light);    color: var(--red);    }

    /* ── Content Cards ───────────────────────────────────── */
    .content-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(0,0,0,.045);
        height: 100%;
        overflow: visible;
    }
    .content-card-header {
        padding: 22px 24px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .content-card-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--slate-900);
        margin: 0;
    }
    .content-card-body { padding: 20px 24px 24px; }

    /* ── Profile Card ────────────────────────────────────── */
    .avatar-wrap {
        position: relative;
        display: inline-block;
        margin-bottom: 16px;
    }
    .avatar-img {
        width: 96px; height: 96px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--indigo-light);
        box-shadow: 0 0 0 4px #fff, var(--shadow-sm);
    }
    .avatar-status {
        position: absolute;
        bottom: 4px; right: 4px;
        width: 14px; height: 14px;
        background: var(--green);
        border-radius: 50%;
        border: 2px solid #fff;
    }
    .profile-name {
        font-size: 16px;
        font-weight: 700;
        color: var(--slate-900);
        margin-bottom: 2px;
    }
    .profile-email {
        font-size: 13px;
        color: var(--slate-500);
        margin-bottom: 14px;
    }
    .role-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 13px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: var(--indigo-light);
        color: var(--indigo);
        margin-bottom: 20px;
    }
    .role-chip svg { width: 13px; height: 13px; }

    .profile-divider {
        border: none;
        border-top: 1px solid var(--slate-100);
        margin: 0 0 16px;
    }
    .profile-meta-label {
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        color: var(--slate-500);
        margin-bottom: 5px;
    }
    .profile-meta-value {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--green);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .profile-meta-value svg { width: 15px; height: 15px; }

    /* ── Assessments Table ───────────────────────────────── */
    .btn-outline-indigo {
        font-size: 12px;
        font-weight: 600;
        padding: 5px 14px;
        border-radius: 999px;
        border: 1.5px solid var(--indigo);
        color: var(--indigo);
        background: transparent;
        transition: background .15s, color .15s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-outline-indigo:hover {
        background: var(--indigo);
        color: #fff;
    }

    .dash-table { width: 100%; border-collapse: collapse; }
    .dash-table thead th {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        color: var(--slate-500);
        padding: 10px 16px;
        background: var(--slate-100);
        border-bottom: 1px solid var(--slate-300);
        white-space: nowrap;
    }
    .dash-table thead th:first-child { border-radius: 8px 0 0 8px; }
    .dash-table thead th:last-child  { border-radius: 0 8px 8px 0; }
    .dash-table tbody td {
        font-size: 13.5px;
        color: var(--slate-700);
        padding: 14px 16px;
        border-bottom: 1px solid var(--slate-100);
        vertical-align: middle;
    }
    .dash-table tbody tr:last-child td { border-bottom: none; }
    .dash-table tbody tr:hover td { background: #FAFBFF; }

    .subject-name {
        font-weight: 600;
        color: var(--slate-900);
        margin-bottom: 2px;
        font-size: 13.5px;
    }
    .subject-code {
        font-size: 11.5px;
        color: var(--slate-500);
    }

    /* ── Grade Badges ────────────────────────────────────── */
    .grade-badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 11px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .02em;
    }
    .gb-success { background: var(--green-light);  color: var(--green);  }
    .gb-primary { background: var(--indigo-light); color: var(--indigo); }
    .gb-warning { background: var(--amber-light);  color: var(--amber);  }

    /* ── Table scroll ────────────────────────────────────── */
    .table-scroll { overflow-x: auto; }
    .table-scroll table { min-width: 480px; }
</style>

<!-- Page Header -->
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <p class="page-eyebrow">Overview</p>
        <h1 class="page-title"><span>Student</span> Dashboard</h1>
        <p class="page-subtitle">
            Welcome back, <strong><?= esc($user['fullname'] ?? 'Student'); ?></strong>! Here's what's happening today.
        </p>
    </div>
    <span class="role-chip">
        <i data-lucide="graduation-cap"></i>
        Student
    </span>
</div>

<!-- Stat Row -->
<div class="row g-3 mb-4">
    <div class="col-sm-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-label mb-0">Enrolled Courses</p>
                <div class="stat-icon si-indigo">
                    <i data-lucide="book-open"></i>
                </div>
            </div>
            <div class="stat-value">6</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-label mb-0">Current GPA</p>
                <div class="stat-icon si-green">
                    <i data-lucide="award"></i>
                </div>
            </div>
            <div class="stat-value">3.85</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-label mb-0">Pending Tasks</p>
                <div class="stat-icon si-red">
                    <i data-lucide="clock"></i>
                </div>
            </div>
            <div class="stat-value">3</div>
        </div>
    </div>
</div>

<!-- Profile + Assessments -->
<div class="row g-3">

    <!-- Profile Card -->
    <div class="col-md-4">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">My Profile</h2>
            </div>
            <div class="content-card-body text-center">
                <div class="avatar-wrap">
                    <img src="<?= base_url('assets/images/avatar.png') ?>"
                         alt="Avatar"
                         class="avatar-img"
                         onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($user['fullname'] ?? 'S') ?>&background=e0e7ff&color=4f46e5&size=110'">
                    <span class="avatar-status"></span>
                </div>

                <div class="profile-name"><?= esc($user['fullname'] ?? 'N/A'); ?></div>
                <div class="profile-email"><?= esc($user['email'] ?? 'N/A'); ?></div>

                <span class="role-chip">
                    <i data-lucide="user"></i>
                    <?= esc(ucfirst($user['role'] ?? 'Student')); ?> Account
                </span>

                <hr class="profile-divider">

                <div class="text-start">
                    <p class="profile-meta-label">Account Status</p>
                    <p class="profile-meta-value mb-0">
                        <i data-lucide="check-circle"></i> Active &amp; Enrolled
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Assessments Table -->
    <div class="col-md-8">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Recent Assessments</h2>
                <a href="#" class="btn-outline-indigo">View All</a>
            </div>
            <div class="content-card-body">
                <div class="table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Assessment</th>
                                <th class="d-none d-md-table-cell">Date</th>
                                <th style="text-align:right;">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="subject-name">Web Development</div>
                                    <div class="subject-code">IT-301</div>
                                </td>
                                <td>Midterm Exam</td>
                                <td class="d-none d-md-table-cell">Oct 12, 2023</td>
                                <td style="text-align:right;">
                                    <span class="grade-badge gb-success">95 / 100</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="subject-name">Database Systems</div>
                                    <div class="subject-code">IT-302</div>
                                </td>
                                <td>Final Project Phase 1</td>
                                <td class="d-none d-md-table-cell">Oct 10, 2023</td>
                                <td style="text-align:right;">
                                    <span class="grade-badge gb-primary">88 / 100</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="subject-name">Software Engineering</div>
                                    <div class="subject-code">IT-303</div>
                                </td>
                                <td>Quiz 2</td>
                                <td class="d-none d-md-table-cell">Oct 05, 2023</td>
                                <td style="text-align:right;">
                                    <span class="grade-badge gb-warning">Pending</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<?= $this->endSection() ?>