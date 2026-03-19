<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
    $currentRole = strtolower(session('user')['role'] ?? session()->get('role') ?? 'guest');
?>

<style>
    /* ── Design Tokens ─────────────────────────────── */
    :root {
        --page-bg:       #F8F9FA;
        --card-bg:       #FFFFFF;
        --indigo:        #4F46E5;
        --indigo-light:  #EEF2FF;
        --indigo-mid:    #6366F1;
        --green:         #16A34A;
        --green-light:   #DCFCE7;
        --amber:         #D97706;
        --amber-light:   #FEF3C7;
        --red:           #DC2626;
        --red-light:     #FEE2E2;
        --slate-900:     #0F172A;
        --slate-700:     #334155;
        --slate-500:     #64748B;
        --slate-300:     #CBD5E1;
        --slate-100:     #F1F5F9;
        --radius:        12px;
        --radius-sm:     8px;
        --shadow-sm:     0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
        --shadow-md:     0 4px 16px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.04);
    }

    body { background: var(--page-bg); font-family: 'Inter', system-ui, sans-serif; }

    /* ── Page Header ───────────────────────────────── */
    .page-header-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
    }
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
        margin: 0;
        line-height: 1.2;
    }
    .page-title span { color: var(--indigo); }

    /* ── Role Chip ─────────────────────────────────── */
    .role-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .03em;
    }
    .role-chip-admin   { background: var(--indigo-light); color: var(--indigo); }
    .role-chip-teacher { background: var(--green-light);  color: var(--green);  }
    .role-chip-student { background: var(--amber-light);  color: var(--amber);  }
    .role-chip .dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
    .role-chip-admin   .dot { background: var(--indigo); }
    .role-chip-teacher .dot { background: var(--green);  }
    .role-chip-student .dot { background: var(--amber);  }

    /* ── Stat Cards ────────────────────────────────── */
    .stat-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        padding: 24px;
        border: 1px solid rgba(0,0,0,.045);
        transition: box-shadow .2s, transform .2s;
        height: 100%;
    }
    .stat-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }
    .stat-card-label {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: var(--slate-500);
        margin-bottom: 10px;
    }
    .stat-card-value {
        font-size: 2.1rem;
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1;
        margin-bottom: 12px;
    }
    .stat-card-meta {
        font-size: 12.5px;
        color: var(--slate-500);
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .stat-card-meta .tag-positive { color: var(--green);  font-weight: 600; }
    .stat-card-meta .tag-warning  { color: var(--amber);  font-weight: 600; }
    .stat-card-meta .tag-danger   { color: var(--red);    font-weight: 600; }

    /* Icon bubble */
    .stat-icon {
        width: 44px; height: 44px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .stat-icon svg { width: 20px; height: 20px; stroke-width: 2; }
    .si-indigo { background: var(--indigo-light); color: var(--indigo); }
    .si-green  { background: var(--green-light);  color: var(--green);  }
    .si-amber  { background: var(--amber-light);  color: var(--amber);  }
    .si-red    { background: var(--red-light);    color: var(--red);    }

    /* ── Content Cards ─────────────────────────────── */
    .content-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(0,0,0,.045);
        overflow: visible;
        height: 100%;
    }
    .content-card-header {
        padding: 20px 24px 0;
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

    /* ── Table ─────────────────────────────────────── */
    .dash-table { width: 100%; border-collapse: collapse; }
    .dash-table thead th {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        color: var(--slate-500);
        padding: 10px 14px;
        background: var(--slate-100);
        border-bottom: 1px solid var(--slate-300);
    }
    .dash-table thead th:first-child { border-radius: 8px 0 0 8px; }
    .dash-table thead th:last-child  { border-radius: 0 8px 8px 0; }
    .dash-table tbody td {
        font-size: 13.5px;
        color: var(--slate-700);
        padding: 13px 14px;
        border-bottom: 1px solid var(--slate-100);
        vertical-align: middle;
    }
    .dash-table tbody tr:last-child td { border-bottom: none; }
    .dash-table tbody tr:hover td { background: #FAFBFF; }

    /* ── Badges ────────────────────────────────────── */
    .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: .02em;
    }
    .badge-success   { background: var(--green-light);  color: var(--green); }
    .badge-danger    { background: var(--red-light);    color: var(--red);   }
    .badge-primary   { background: var(--indigo-light); color: var(--indigo);}
    .badge-secondary { background: var(--slate-100);    color: var(--slate-500); }
    .badge-warning   { background: var(--amber-light);  color: var(--amber); }

    /* ── Info Notices ──────────────────────────────── */
    .notice-box {
        border-radius: var(--radius-sm);
        padding: 14px 16px;
        font-size: 13px;
        margin-bottom: 12px;
        line-height: 1.55;
    }
    .notice-box:last-child { margin-bottom: 0; }
    .notice-indigo { background: var(--indigo-light); color: #3730A3; border-left: 3px solid var(--indigo); }
    .notice-green  { background: var(--green-light);  color: #166534; border-left: 3px solid var(--green);  }
    .notice-box strong { font-weight: 700; }

    /* ── Divider ───────────────────────────────────── */
    .section-gap { margin-bottom: 20px; }

    /* ── Table wrapper ─────────────────────────────── */
    .table-scroll { overflow-x: auto; }
    .table-scroll table { min-width: 520px; }
</style>

<!-- ═══════════════════════════════════════════════════════════ -->
<!-- ADMIN DASHBOARD                                            -->
<!-- ═══════════════════════════════════════════════════════════ -->
<?php if ($currentRole === 'admin' || $currentRole == 1): ?>

<div class="page-header-wrap">
    <div>
        <p class="page-eyebrow">Overview</p>
        <h1 class="page-title">System <span>Admin</span> Dashboard</h1>
    </div>
    <span class="role-chip role-chip-admin">
        <span class="dot"></span> Administrator
    </span>
</div>

<!-- Stat Row -->
<div class="row g-3 section-gap">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Total Users</p>
                <div class="stat-icon si-indigo">
                    <i data-lucide="users"></i>
                </div>
            </div>
            <div class="stat-card-value">24</div>
            <div class="stat-card-meta">
                <span class="tag-positive">↑ +5%</span> since last week
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">System Roles</p>
                <div class="stat-icon si-indigo">
                    <i data-lucide="shield"></i>
                </div>
            </div>
            <div class="stat-card-value">4</div>
            <div class="stat-card-meta">
                <span class="tag-positive">● Active</span> RBAC enabled
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Active Students</p>
                <div class="stat-icon si-green">
                    <i data-lucide="book-open"></i>
                </div>
            </div>
            <div class="stat-card-value">150</div>
            <div class="stat-card-meta">
                <span class="tag-positive">↑ +12</span> new enrollments
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">System Status</p>
                <div class="stat-icon si-green">
                    <i data-lucide="activity"></i>
                </div>
            </div>
            <div class="stat-card-value" style="font-size:1.65rem;">Online</div>
            <div class="stat-card-meta">
                <span class="tag-positive">● 0</span> errors reported
            </div>
        </div>
    </div>
</div>

<!-- Main + Sidebar -->
<div class="row g-3">
    <div class="col-12 col-lg-8">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Recent Activity</h2>
                <span class="badge-pill badge-secondary">3 events</span>
            </div>
            <div class="content-card-body">
                <p style="font-size:13px; color:var(--slate-500); margin-bottom:16px;">
                    Welcome to the administrative dashboard. Use the sidebar to manage roles, permissions, and system configurations.
                </p>
                <div class="table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th class="d-none d-xl-table-cell">Date</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>User Role Updated</td>
                                <td class="d-none d-xl-table-cell">Just now</td>
                                <td><span class="badge-pill badge-success">Success</span></td>
                                <td class="d-none d-md-table-cell">Admin User</td>
                            </tr>
                            <tr>
                                <td>New Role "Coordinator" Created</td>
                                <td class="d-none d-xl-table-cell">1 hour ago</td>
                                <td><span class="badge-pill badge-success">Success</span></td>
                                <td class="d-none d-md-table-cell">Admin User</td>
                            </tr>
                            <tr>
                                <td>Failed Login Attempt</td>
                                <td class="d-none d-xl-table-cell">3 hours ago</td>
                                <td><span class="badge-pill badge-danger">Blocked</span></td>
                                <td class="d-none d-md-table-cell">Unknown IP</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Quick Info</h2>
            </div>
            <div class="content-card-body">
                <div class="notice-box notice-indigo">
                    <strong>💡 Tip:</strong> The Admin role cannot be deleted to prevent locking out the system.
                </div>
                <div class="notice-box notice-green">
                    <strong>✓ RBAC Active:</strong> Your Role-Based Access Control filters are currently running perfectly.
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ═══════════════════════════════════════════════════════════ -->
<!-- TEACHER DASHBOARD                                          -->
<!-- ═══════════════════════════════════════════════════════════ -->
<?php elseif ($currentRole === 'teacher' || $currentRole == 2): ?>

<div class="page-header-wrap">
    <div>
        <p class="page-eyebrow">Overview</p>
        <h1 class="page-title"><span>Teacher</span> Dashboard</h1>
    </div>
    <span class="role-chip role-chip-teacher">
        <span class="dot"></span> Teacher
    </span>
</div>

<!-- Stat Row -->
<div class="row g-3 section-gap">
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">My Classes</p>
                <div class="stat-icon si-indigo">
                    <i data-lucide="book"></i>
                </div>
            </div>
            <div class="stat-card-value">4</div>
            <div class="stat-card-meta">Assigned for this semester</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Total Students</p>
                <div class="stat-icon si-green">
                    <i data-lucide="users"></i>
                </div>
            </div>
            <div class="stat-card-value">128</div>
            <div class="stat-card-meta">
                <span class="tag-positive">↑ +3</span> added this week
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Pending Grades</p>
                <div class="stat-icon si-amber">
                    <i data-lucide="edit-3"></i>
                </div>
            </div>
            <div class="stat-card-value">12</div>
            <div class="stat-card-meta">
                <span class="tag-warning">⚠ Needs Review</span>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Table -->
<div class="row g-3">
    <div class="col-12">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Upcoming Classes Overview</h2>
                <span class="badge-pill badge-secondary">Today</span>
            </div>
            <div class="content-card-body">
                <p style="font-size:13px; color:var(--slate-500); margin-bottom:16px;">
                    Welcome to the Teacher Portal. Here is your schedule for today.
                </p>
                <div class="table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Time</th>
                                <th>Room</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Web Development (IT-301)</td>
                                <td>08:00 AM – 10:00 AM</td>
                                <td>Lab 1</td>
                                <td><span class="badge-pill badge-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Database Systems (IT-302)</td>
                                <td>10:30 AM – 12:30 PM</td>
                                <td>Lab 3</td>
                                <td><span class="badge-pill badge-primary">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Software Engineering (IT-303)</td>
                                <td>02:00 PM – 04:00 PM</td>
                                <td>Room 402</td>
                                <td><span class="badge-pill badge-secondary">Upcoming</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ═══════════════════════════════════════════════════════════ -->
<!-- STUDENT DASHBOARD                                          -->
<!-- ═══════════════════════════════════════════════════════════ -->
<?php else: ?>

<div class="page-header-wrap">
    <div>
        <p class="page-eyebrow">Overview</p>
        <h1 class="page-title"><span>Student</span> Dashboard</h1>
    </div>
    <span class="role-chip role-chip-student">
        <span class="dot"></span> Student
    </span>
</div>

<!-- Stat Row -->
<div class="row g-3 section-gap">
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Enrolled Courses</p>
                <div class="stat-icon si-indigo">
                    <i data-lucide="book-open"></i>
                </div>
            </div>
            <div class="stat-card-value">6</div>
            <div class="stat-card-meta">Current semester</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Current GPA</p>
                <div class="stat-icon si-green">
                    <i data-lucide="award"></i>
                </div>
            </div>
            <div class="stat-card-value">1.25</div>
            <div class="stat-card-meta">
                <span class="tag-positive">★ Excellent</span> standing
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <p class="stat-card-label mb-0">Assignments Due</p>
                <div class="stat-icon si-red">
                    <i data-lucide="calendar"></i>
                </div>
            </div>
            <div class="stat-card-value">2</div>
            <div class="stat-card-meta">
                <span class="tag-danger">⚡ Action Required</span>
            </div>
        </div>
    </div>
</div>

<!-- Grades Table -->
<div class="row g-3">
    <div class="col-12">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">My Recent Grades</h2>
                <span class="badge-pill badge-success">2 records</span>
            </div>
            <div class="content-card-body">
                <div class="table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Assessment Type</th>
                                <th>Score</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Web Development</td>
                                <td>Midterm Exam</td>
                                <td><strong>95 / 100</strong></td>
                                <td><span class="badge-pill badge-success">Passed</span></td>
                            </tr>
                            <tr>
                                <td>Database Systems</td>
                                <td>Final Project</td>
                                <td><strong>88 / 100</strong></td>
                                <td><span class="badge-pill badge-success">Passed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- Lucide Icons init -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<?= $this->endSection() ?>