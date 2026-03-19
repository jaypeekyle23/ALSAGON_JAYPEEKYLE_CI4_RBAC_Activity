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
        --slate-100:    #F1F5F9;
        --slate-200:    #E2E8F0;
        --radius:       12px;
        --radius-sm:    8px;
        --shadow-sm:    0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
        --shadow-md:    0 4px 16px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.04);
    }
    body { background: #F8F9FA; font-family: 'Inter', system-ui, sans-serif; }

    .page-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--slate-500); margin-bottom: 2px; }
    .page-title   { font-size: 1.55rem; font-weight: 700; color: var(--slate-900); margin: 0; line-height: 1.2; }
    .page-title span { color: var(--indigo); }

    /* Button */
    .btn-indigo {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 18px; border-radius: 999px;
        background: var(--indigo); color: #fff;
        font-size: 13px; font-weight: 600; text-decoration: none; border: none;
        cursor: pointer; transition: opacity .15s;
        box-shadow: 0 2px 8px rgba(79,70,229,.25);
    }
    .btn-indigo:hover { opacity: .88; color: #fff; }
    .btn-indigo svg  { width: 15px; height: 15px; stroke-width: 2; }

    /* Flash alerts */
    .flash-alert {
        display: flex; align-items: flex-start; gap: 10px;
        padding: 13px 16px; border-radius: var(--radius-sm);
        font-size: 13.5px; font-weight: 500; margin-bottom: 16px;
    }
    .flash-alert svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; stroke-width: 2; }
    .flash-success { background: var(--green-light); color: var(--green); }
    .flash-error   { background: var(--red-light);   color: var(--red);   }

    /* Card */
    .content-card {
        background: #fff; border-radius: var(--radius);
        box-shadow: var(--shadow-sm); border: 1px solid rgba(0,0,0,.045);
        overflow: visible;
    }
    .content-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--slate-100);
        display: flex; align-items: center; justify-content: space-between;
    }
    .content-card-title { font-size: 14px; font-weight: 700; color: var(--slate-900); margin: 0; }
    .content-card-body  { padding: 0; }

    /* Table */
    .dash-table { width: 100%; border-collapse: collapse; }
    .dash-table thead th {
        font-size: 11px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: var(--slate-500);
        padding: 11px 20px; background: var(--slate-100);
        border-bottom: 1px solid var(--slate-200);
        white-space: nowrap;
    }
    .dash-table thead th:first-child { border-radius: 0; }
    .dash-table tbody td {
        font-size: 13.5px; color: var(--slate-700);
        padding: 14px 20px; border-bottom: 1px solid var(--slate-100);
        vertical-align: middle;
    }
    .dash-table tbody tr:last-child td { border-bottom: none; }
    .dash-table tbody tr:hover td { background: #FAFBFF; }

    /* ID badge */
    .id-badge {
        display: inline-flex; align-items: center; justify-content: center;
        width: 28px; height: 28px; border-radius: 7px;
        background: var(--slate-100); color: var(--slate-500);
        font-size: 12px; font-weight: 700;
    }

    /* Role chip */
    .role-chip {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 13px; border-radius: 999px;
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

    /* Action buttons */
    .action-wrap { display: flex; align-items: center; gap: 6px; }

    .btn-action {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 6px 13px; border-radius: 999px;
        font-size: 12px; font-weight: 600; text-decoration: none;
        border: 1.5px solid transparent; cursor: pointer;
        transition: background .13s, color .13s, border-color .13s;
        background: none;
    }
    .btn-action svg { width: 13px; height: 13px; stroke-width: 2.2; }

    .btn-edit {
        border-color: var(--indigo); color: var(--indigo);
    }
    .btn-edit:hover { background: var(--indigo); color: #fff; }

    .btn-delete {
        border-color: var(--red); color: var(--red);
    }
    .btn-delete:hover { background: var(--red); color: #fff; }

    .locked-label {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 12px; font-weight: 600; color: var(--slate-500);
        padding: 6px 10px;
    }
    .locked-label svg { width: 13px; height: 13px; stroke-width: 2; }

    /* Empty state */
    .empty-state { padding: 48px 24px; text-align: center; }
    .empty-state p { font-size: 13.5px; color: var(--slate-500); margin: 0; }

    .table-scroll { overflow-x: auto; }
    .table-scroll table { min-width: 480px; }
</style>

<!-- Header -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <p class="page-eyebrow">Administration</p>
        <h1 class="page-title">Manage <span>Roles</span></h1>
    </div>
    <a href="<?= base_url('admin/roles/create') ?>" class="btn-indigo">
        <i data-lucide="plus"></i> Create New Role
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Registered Roles</h2>
                <?php if (isset($roles) && is_array($roles)): ?>
                    <span style="font-size:12px;font-weight:600;color:var(--slate-500);"><?= count($roles) ?> role<?= count($roles) !== 1 ? 's' : '' ?></span>
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
                                <th>ID</th>
                                <th>Role Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($roles) && is_array($roles)) : ?>
                                <?php foreach ($roles as $r) : ?>
                                    <?php
                                        $idToPass  = $r['role_id'] ?? $r['id'];
                                        $roleName  = $r['role'] ?? $r['role_name'] ?? 'Unknown';
                                        $roleSlug  = strtolower($roleName);
                                        $chipClass = match($roleSlug) {
                                            'admin'   => 'rc-admin',
                                            'teacher' => 'rc-teacher',
                                            'student' => 'rc-student',
                                            default   => 'rc-default',
                                        };
                                        $isCoreAdmin = ($roleSlug === 'admin' || $idToPass == 1);
                                    ?>
                                    <tr>
                                        <td><span class="id-badge"><?= esc($idToPass) ?></span></td>
                                        <td>
                                            <span class="role-chip <?= $chipClass ?>">
                                                <span class="dot"></span>
                                                <?= esc(ucfirst($roleName)) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-wrap">
                                                <a href="<?= base_url('admin/roles/edit/' . $idToPass) ?>" class="btn-action btn-edit">
                                                    <i data-lucide="pencil"></i> Edit
                                                </a>
                                                <?php if (!$isCoreAdmin) : ?>
                                                    <a href="<?= base_url('admin/roles/delete/' . $idToPass) ?>"
                                                       class="btn-action btn-delete"
                                                       onclick="return confirm('Are you sure you want to delete this role?')">
                                                        <i data-lucide="trash-2"></i> Delete
                                                    </a>
                                                <?php else: ?>
                                                    <span class="locked-label">
                                                        <i data-lucide="lock"></i> Protected
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">
                                        <div class="empty-state">
                                            <p>No roles found in the database.</p>
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