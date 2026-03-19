<?php
// Get the current user's role safely
$currentRole = strtolower(session('user')['role'] ?? session()->get('role') ?? 'guest');
// Set default navbar and badge classes
$navBgClass = 'navbar-bg navbar-light';
$badgeClass = 'bg-secondary text-white';
// Determine the colors based on the role instructions
if ($currentRole === 'admin' || $currentRole == 1) {
    $navBgClass = 'bg-danger navbar-dark shadow-sm';
    $badgeClass = 'bg-light text-danger border border-danger';
} elseif ($currentRole === 'teacher' || $currentRole == 2) {
    $navBgClass = 'bg-success navbar-dark shadow-sm';
    $badgeClass = 'bg-light text-success border border-success';
} elseif ($currentRole === 'student' || $currentRole == 3) {
    $navBgClass = 'bg-primary navbar-dark shadow-sm';
    $badgeClass = 'bg-light text-primary border border-primary';
}
?>

<style>
    /* ── Navbar Shell ────────────────────────────── */
    .navbar {
        height: 60px;
        padding: 0 20px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid rgba(0,0,0,.08);
        position: sticky;
        top: 0;
        z-index: 1030;
    }

    /* ── Hamburger Toggle ────────────────────────── */
    .sidebar-toggle {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px; height: 36px;
        border-radius: 8px;
        cursor: pointer;
        transition: background .15s;
        margin-right: 4px;
        flex-shrink: 0;
        text-decoration: none;
    }
    .navbar-dark  .sidebar-toggle:hover { background: rgba(255,255,255,.12); }
    .navbar-light .sidebar-toggle:hover { background: rgba(0,0,0,.06); }

    .hamburger,
    .hamburger::before,
    .hamburger::after {
        display: block;
        width: 18px; height: 2px;
        border-radius: 2px;
        transition: transform .2s;
    }
    .navbar-dark  .hamburger,
    .navbar-dark  .hamburger::before,
    .navbar-dark  .hamburger::after { background: rgba(255,255,255,.85); }
    .navbar-light .hamburger,
    .navbar-light .hamburger::before,
    .navbar-light .hamburger::after { background: #334155; }
    .hamburger { position: relative; }
    .hamburger::before,
    .hamburger::after { content: ''; position: absolute; left: 0; }
    .hamburger::before { top: -5px; }
    .hamburger::after  { top:  5px; }

    /* ── Collapse + right-align ──────────────────── */
    .navbar-collapse { flex: 1; }
    .navbar-align    { margin-left: auto; display: flex; align-items: center; gap: 4px; }

    /* ── Icon buttons (bell, settings) ───────────── */
    .nav-icon-btn {
        width: 36px; height: 36px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; text-decoration: none;
        transition: background .15s;
        position: relative;
    }
    .navbar-dark  .nav-icon-btn:hover { background: rgba(255,255,255,.12); }
    .navbar-light .nav-icon-btn:hover { background: rgba(0,0,0,.06); }
    .nav-icon-btn svg { width: 18px; height: 18px; stroke-width: 2; }
    .navbar-dark  .nav-icon-btn svg { stroke: rgba(255,255,255,.85); }
    .navbar-light .nav-icon-btn svg { stroke: #334155; }

    /* ── Notification dropdown ───────────────────── */
    .notif-dropdown {
        min-width: 260px;
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,.10);
        overflow: hidden;
        padding: 0;
    }
    .notif-header {
        padding: 12px 16px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        color: #64748B;
        border-bottom: 1px solid #F1F5F9;
        background: #F8F9FA;
    }
    .notif-empty {
        padding: 24px 16px;
        text-align: center;
        font-size: 13px;
        color: #94A3B8;
    }
    .notif-footer {
        padding: 10px 16px;
        border-top: 1px solid #F1F5F9;
        background: #F8F9FA;
        text-align: center;
    }
    .notif-footer a {
        font-size: 12.5px;
        font-weight: 600;
        color: #4F46E5;
        text-decoration: none;
    }
    .notif-footer a:hover { text-decoration: underline; }

    /* ── User dropdown trigger ───────────────────── */
    .user-trigger {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 5px 10px 5px 6px;
        border-radius: 999px;
        cursor: pointer;
        text-decoration: none;
        transition: background .15s;
    }
    .navbar-dark  .user-trigger:hover { background: rgba(255,255,255,.12); }
    .navbar-light .user-trigger:hover { background: rgba(0,0,0,.06); }

    .user-avatar {
        width: 30px; height: 30px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255,255,255,.35);
        flex-shrink: 0;
    }
    .navbar-light .user-avatar { border-color: rgba(0,0,0,.12); }

    .user-name {
        font-size: 13.5px;
        font-weight: 600;
        line-height: 1;
    }
    .navbar-dark  .user-name { color: rgba(255,255,255,.92); }
    .navbar-light .user-name { color: #0F172A; }

    /* Role chip inside navbar */
    .nav-role-chip {
        display: inline-flex;
        align-items: center;
        padding: 3px 9px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .04em;
        line-height: 1;
    }
    /* Dark navbar: white pill */
    .navbar-dark  .nav-role-chip { background: rgba(255,255,255,.18); color: #fff; }
    /* Light navbar: fallback */
    .navbar-light .nav-role-chip { background: rgba(0,0,0,.07); color: #334155; }

    /* Caret override */
    .user-trigger::after { display: none !important; }
    .user-trigger-caret svg { width: 14px; height: 14px; opacity: .6; }
    .navbar-dark  .user-trigger-caret svg { stroke: #fff; }
    .navbar-light .user-trigger-caret svg { stroke: #334155; }

    /* ── User dropdown menu ──────────────────────── */
    .user-dropdown {
        min-width: 200px;
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,.10);
        padding: 6px;
        margin-top: 6px !important;
    }
    .user-dropdown-info {
        padding: 10px 12px 12px;
        border-bottom: 1px solid #F1F5F9;
        margin-bottom: 6px;
    }
    .user-dropdown-name {
        font-size: 13.5px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 1px;
    }
    .user-dropdown-role {
        font-size: 11.5px;
        color: #64748B;
        font-weight: 500;
    }
    .dropdown-item-custom {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 7px;
        font-size: 13.5px;
        font-weight: 500;
        color: #334155;
        text-decoration: none;
        transition: background .12s;
    }
    .dropdown-item-custom:hover { background: #F1F5F9; color: #0F172A; }
    .dropdown-item-custom.danger { color: #DC2626; }
    .dropdown-item-custom.danger:hover { background: #FEE2E2; }
    .dropdown-item-custom svg { width: 15px; height: 15px; stroke-width: 2; opacity: .7; }

    /* Mobile: hide name, keep avatar + chip */
    @media (max-width: 575px) {
        .user-name, .user-trigger-caret { display: none; }
        .nav-role-chip { display: none; }
    }
</style>

<nav class="navbar navbar-expand <?= $navBgClass ?>">

    <!-- Hamburger -->
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <!-- ── Bell / Notifications ─────────────── -->
            <li class="nav-item dropdown">
                <a class="nav-icon-btn dropdown-toggle"
                   href="#"
                   id="alertsDropdown"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i data-lucide="bell"></i>
                </a>
                <div class="dropdown-menu notif-dropdown dropdown-menu-end"
                     aria-labelledby="alertsDropdown">
                    <div class="notif-header">Notifications</div>
                    <div class="notif-empty">
                        <i data-lucide="inbox" style="width:28px;height:28px;stroke:#CBD5E1;display:block;margin:0 auto 8px;"></i>
                        No new notifications
                    </div>
                    <div class="notif-footer">
                        <a href="#">View all notifications</a>
                    </div>
                </div>
            </li>

            <!-- ── Settings icon (mobile only) ─────── -->
            <li class="nav-item dropdown d-inline-block d-sm-none">
                <a class="nav-icon-btn dropdown-toggle"
                   href="#"
                   data-bs-toggle="dropdown">
                    <i data-lucide="settings"></i>
                </a>
                <div class="dropdown-menu user-dropdown dropdown-menu-end">
                    <a class="dropdown-item-custom danger" href="<?= base_url('logout'); ?>">
                        <i data-lucide="log-out"></i> Log Out
                    </a>
                </div>
            </li>

            <!-- ── User Menu (sm+) ──────────────────── -->
            <li class="nav-item dropdown d-none d-sm-inline-flex align-items-center">
                <a class="user-trigger dropdown-toggle"
                   href="#"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">

                    <img src="<?= base_url('assets/images/avatar.png') ?>"
                         class="user-avatar"
                         alt="<?= session('user')['fullname'] ?? 'Guest'; ?>"
                         onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode(session('user')['fullname'] ?? 'G') ?>&background=e0e7ff&color=4f46e5&size=60'">

                    <span class="nav-role-chip"><?= ucfirst($currentRole) ?></span>

                    <span class="user-name d-none d-md-inline">
                        <?= session('user')['fullname'] ?? 'Guest'; ?>
                    </span>

                    <span class="user-trigger-caret">
                        <i data-lucide="chevron-down"></i>
                    </span>
                </a>

                <div class="dropdown-menu user-dropdown dropdown-menu-end">
                    <div class="user-dropdown-info">
                        <div class="user-dropdown-name"><?= session('user')['fullname'] ?? 'Guest'; ?></div>
                        <div class="user-dropdown-role"><?= ucfirst($currentRole) ?> Account</div>
                    </div>
                    <a class="dropdown-item-custom" href="<?= base_url('profile'); ?>">
                        <i data-lucide="user"></i> My Profile
                    </a>
                    <a class="dropdown-item-custom danger" href="<?= base_url('logout'); ?>">
                        <i data-lucide="log-out"></i> Log Out
                    </a>
                </div>
            </li>

        </ul>
    </div>
</nav>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>