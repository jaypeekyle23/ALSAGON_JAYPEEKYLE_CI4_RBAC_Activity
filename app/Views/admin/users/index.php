<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    :root {
        --indigo:       #4F46E5;
        --indigo-light: #EEF2FF;
        --green:        #16A34A;
        --green-light:  #DCFCE7;
        --red:          #DC2626;
        --red-light:    #FEE2E2;
        --amber:        #D97706;
        --amber-light:  #FEF3C7;
        --slate-900:    #0F172A;
        --slate-700:    #334155;
        --slate-500:    #64748B;
        --slate-300:    #CBD5E1;
        --slate-200:    #E2E8F0;
        --slate-100:    #F1F5F9;
        --radius:       12px;
        --radius-sm:    8px;
        --shadow-sm:    0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
        --shadow-md:    0 4px 16px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.04);
    }
    body { background: #F8F9FA; font-family: 'Inter', system-ui, sans-serif; }

    /* ── Page Header ─────────────────────────────── */
    .page-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--slate-500); margin-bottom: 2px; }
    .page-title   { font-size: 1.55rem; font-weight: 700; color: var(--slate-900); margin: 0; line-height: 1.2; }
    .page-title span { color: var(--indigo); }

    /* ── Flash Alerts ────────────────────────────── */
    .flash-alert {
        display: flex; align-items: flex-start; gap: 10px;
        padding: 13px 16px; border-radius: var(--radius-sm);
        font-size: 13.5px; font-weight: 500; margin-bottom: 16px;
    }
    .flash-alert svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; stroke-width: 2; }
    .flash-success { background: var(--green-light); color: var(--green); }
    .flash-error   { background: var(--red-light);   color: var(--red);   }

    /* ── Card ────────────────────────────────────── */
    .content-card {
        background: #fff; border-radius: var(--radius);
        box-shadow: var(--shadow-sm); border: 1px solid rgba(0,0,0,.045);
        overflow: visible;
    }
    .content-card-header {
        padding: 20px 24px; border-bottom: 1px solid var(--slate-100);
        display: flex; align-items: center; justify-content: space-between;
    }
    .content-card-title { font-size: 14px; font-weight: 700; color: var(--slate-900); margin: 0; }
    .content-card-body  { padding: 0; }

    /* ── Table ───────────────────────────────────── */
    .dash-table { width: 100%; border-collapse: collapse; }
    .dash-table thead th {
        font-size: 11px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: var(--slate-500);
        padding: 11px 20px; background: var(--slate-100);
        border-bottom: 1px solid var(--slate-200); white-space: nowrap;
    }
    .dash-table tbody td {
        font-size: 13.5px; color: var(--slate-700);
        padding: 14px 20px; border-bottom: 1px solid var(--slate-100);
        vertical-align: middle;
    }
    .dash-table tbody tr:last-child td { border-bottom: none; }
    .dash-table tbody tr:hover td { background: #FAFBFF; }

    /* ── User cell ───────────────────────────────── */
    .user-cell { display: flex; align-items: center; gap: 11px; }
    .user-avatar-init {
        width: 36px; height: 36px; border-radius: 50%;
        background: var(--indigo-light); color: var(--indigo);
        font-size: 13px; font-weight: 700;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; text-transform: uppercase;
    }
    .user-name  { font-size: 13.5px; font-weight: 600; color: var(--slate-900); margin-bottom: 1px; }
    .user-email { font-size: 12px; color: var(--slate-500); }

    /* ── Role chips ──────────────────────────────── */
    .role-chip {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 4px 11px; border-radius: 999px;
        font-size: 12px; font-weight: 700;
    }
    .role-chip .dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
    .rc-admin   { background: var(--red-light);    color: var(--red);    }
    .rc-admin   .dot { background: var(--red); }
    .rc-teacher { background: var(--green-light);  color: var(--green);  }
    .rc-teacher .dot { background: var(--green); }
    .rc-student { background: var(--amber-light);  color: var(--amber);  }
    .rc-student .dot { background: var(--amber); }
    .rc-default { background: var(--indigo-light); color: var(--indigo); }
    .rc-default .dot { background: var(--indigo); }

    /* ── Assign form ─────────────────────────────── */
    .assign-form { display: flex; align-items: center; gap: 8px; }

    .role-select {
        font-size: 13px; font-weight: 500;
        color: var(--slate-900);
        border: 1.5px solid var(--slate-200);
        border-radius: var(--radius-sm);
        padding: 7px 10px;
        background: #fff;
        min-width: 155px;
        transition: border-color .15s, box-shadow .15s;
        outline: none; cursor: pointer;
        -webkit-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394A3B8' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        padding-right: 30px;
    }
    .role-select:focus {
        border-color: var(--indigo);
        box-shadow: 0 0 0 3px rgba(79,70,229,.12);
    }

    .btn-update {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 15px; border-radius: 999px;
        background: var(--indigo); color: #fff;
        font-size: 12.5px; font-weight: 600; border: none;
        cursor: pointer; transition: opacity .15s;
        box-shadow: 0 1px 4px rgba(79,70,229,.22);
        white-space: nowrap;
    }
    .btn-update:hover { opacity: .88; }
    .btn-update svg { width: 13px; height: 13px; stroke-width: 2.2; }

    /* ── Empty state ─────────────────────────────── */
    .empty-state { padding: 48px 24px; text-align: center; }
    .empty-state p { font-size: 13.5px; color: var(--slate-500); margin: 0; }

    .table-scroll { overflow-x: auto; }
    .table-scroll table { min-width: 620px; }
</style>

<!-- Page Header -->
<div class="mb-4">
    <p class="page-eyebrow">Administration</p>
    <h1 class="page-title"><span>Assign</span> User Roles</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">System Users</h2>
                <?php if (isset($users) && is_array($users)): ?>
                    <span style="font-size:12px;font-weight:600;color:var(--slate-500);">
                        <?= count($users) ?> user<?= count($users) !== 1 ? 's' : '' ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="content-card-body">

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="flash-alert flash-success" style="margin: 16px 20px 0;">
                        <i data-lucide="check-circle"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="flash-alert flash-error" style="margin: 16px 20px 0;">
                        <i data-lucide="alert-circle"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Current Role</th>
                                <th>Assign New Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($users) && is_array($users)) : ?>
                                <?php foreach ($users as $user) : ?>
                                    <?php
                                        $fullname    = $user['fullname'] ?? $user['name'] ?? 'Unknown';
                                        $email       = $user['email'] ?? 'No Email';
                                        $userRoleId  = $user['role_id'] ?? $user['role'] ?? '';
                                        $initials    = strtoupper(substr($fullname, 0, 1));

                                        // Resolve current role name for chip
                                        $currentRoleName = 'Unknown';
                                        if (isset($roles) && is_array($roles)) {
                                            foreach ($roles as $r) {
                                                $rId = $r['role_id'] ?? $r['id'];
                                                if ($rId == $userRoleId) {
                                                    $currentRoleName = $r['role_name'] ?? $r['role'] ?? 'Unknown';
                                                    break;
                                                }
                                            }
                                        }
                                        $roleSlug  = strtolower($currentRoleName);
                                        $chipClass = match($roleSlug) {
                                            'admin'   => 'rc-admin',
                                            'teacher' => 'rc-teacher',
                                            'student' => 'rc-student',
                                            default   => 'rc-default',
                                        };
                                    ?>
                                    <tr>
                                        <!-- User -->
                                        <td>
                                            <div class="user-cell">
                                                <div class="user-avatar-init"><?= $initials ?></div>
                                                <div>
                                                    <div class="user-name"><?= esc($fullname) ?></div>
                                                    <div class="user-email"><?= esc($email) ?></div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Current Role -->
                                        <td>
                                            <span class="role-chip <?= $chipClass ?>">
                                                <span class="dot"></span>
                                                <?= esc(ucfirst($currentRoleName)) ?>
                                            </span>
                                        </td>

                                        <!-- Assign -->
                                        <td>
                                            <form action="<?= base_url('admin/users/assign-role/' . $user['id']) ?>" method="POST" class="assign-form">
                                                <select name="role_id" class="role-select">
                                                    <?php foreach ($roles as $r) : ?>
                                                        <?php
                                                            $rId   = $r['role_id'] ?? $r['id'];
                                                            $rName = $r['role_name'] ?? $r['role'];
                                                        ?>
                                                        <option value="<?= $rId ?>" <?= ($rId == $userRoleId) ? 'selected' : '' ?>>
                                                            <?= esc(ucfirst($rName)) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <button type="submit" class="btn-update">
                                                    <i data-lucide="check"></i> Update
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">
                                        <div class="empty-state">
                                            <p>No users found in the system.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
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