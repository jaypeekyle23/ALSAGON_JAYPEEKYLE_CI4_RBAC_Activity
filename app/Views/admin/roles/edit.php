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
    }
    body { background: #F8F9FA; font-family: 'Inter', system-ui, sans-serif; }

    .page-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--slate-500); margin-bottom: 2px; }
    .page-title   { font-size: 1.55rem; font-weight: 700; color: var(--slate-900); margin: 0; }
    .page-title span { color: var(--indigo); }

    /* Back link */
    .back-link {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 13px; font-weight: 600; color: var(--slate-500);
        text-decoration: none; margin-bottom: 20px;
        transition: color .13s;
    }
    .back-link:hover { color: var(--indigo); }
    .back-link svg { width: 15px; height: 15px; stroke-width: 2; }

    /* Card */
    .content-card {
        background: #fff; border-radius: var(--radius);
        box-shadow: var(--shadow-sm); border: 1px solid rgba(0,0,0,.045);
        overflow: hidden;
    }
    .content-card-header {
        padding: 20px 24px; border-bottom: 1px solid var(--slate-100);
        display: flex; align-items: center; gap: 12px;
    }
    .content-card-title { font-size: 14px; font-weight: 700; color: var(--slate-900); margin: 0; }
    .content-card-body  { padding: 24px; }

    /* Flash */
    .flash-alert {
        display: flex; align-items: flex-start; gap: 10px;
        padding: 13px 16px; border-radius: var(--radius-sm);
        font-size: 13.5px; font-weight: 500; margin-bottom: 20px;
    }
    .flash-alert svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; stroke-width: 2; }
    .flash-error { background: var(--red-light); color: var(--red); }

    /* Core role notice */
    .core-notice {
        display: flex; align-items: flex-start; gap: 10px;
        background: var(--amber-light); color: var(--amber);
        border: 1px solid rgba(217,119,6,.2);
        border-radius: var(--radius-sm); padding: 13px 16px;
        font-size: 13px; font-weight: 500; margin-bottom: 20px;
    }
    .core-notice svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; stroke-width: 2; }

    /* Form */
    .form-label-custom {
        font-size: 11px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: var(--slate-500);
        margin-bottom: 6px; display: block;
    }
    .form-control {
        font-size: 13.5px; color: var(--slate-900);
        border: 1.5px solid var(--slate-200); border-radius: var(--radius-sm);
        padding: 10px 13px; background: #fff; width: 100%;
        transition: border-color .15s, box-shadow .15s;
        outline: none; box-shadow: none; -webkit-appearance: none;
    }
    .form-control::placeholder { color: var(--slate-300); }
    .form-control:focus { border-color: var(--indigo); box-shadow: 0 0 0 3px rgba(79,70,229,.12); }
    .form-control[readonly] {
        background: var(--slate-100); color: var(--slate-500);
        cursor: not-allowed; border-color: var(--slate-200);
    }
    .form-hint { font-size: 12px; color: var(--slate-500); margin-top: 6px; }
    .form-hint-danger { color: var(--red); }
    .form-group { margin-bottom: 20px; }

    /* Buttons */
    .btn-wrap { display: flex; align-items: center; gap: 10px; margin-top: 8px; }
    .btn-save {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 22px; border-radius: 999px;
        background: var(--green); color: #fff;
        font-size: 13.5px; font-weight: 600; border: none;
        cursor: pointer; text-decoration: none;
        transition: opacity .15s;
        box-shadow: 0 2px 8px rgba(22,163,74,.22);
    }
    .btn-save:hover { opacity: .88; color: #fff; }
    .btn-save svg { width: 15px; height: 15px; stroke-width: 2; }

    .btn-cancel {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 18px; border-radius: 999px;
        background: none; color: var(--slate-500);
        font-size: 13.5px; font-weight: 600;
        border: 1.5px solid var(--slate-200);
        cursor: pointer; text-decoration: none;
        transition: background .13s, color .13s, border-color .13s;
    }
    .btn-cancel:hover { background: var(--slate-100); color: var(--slate-700); border-color: var(--slate-300); }
    .btn-cancel svg { width: 15px; height: 15px; stroke-width: 2; }

    /* Role chip header */
    .role-chip-header {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 4px 12px; border-radius: 999px;
        font-size: 12px; font-weight: 700;
        background: var(--indigo-light); color: var(--indigo);
    }
</style>

<?php
    $roleName   = $role['role'] ?? $role['role_name'] ?? '';
    $roleId     = $role['role_id'] ?? $role['id'] ?? '';
    $isCoreRole = in_array(strtolower($roleName), ['admin', 'teacher', 'student']);
?>

<!-- Back -->
<a href="<?= base_url('admin/roles') ?>" class="back-link">
    <i data-lucide="arrow-left"></i> Back to Roles
</a>

<!-- Header -->
<div class="mb-4">
    <p class="page-eyebrow">Administration</p>
    <h1 class="page-title"><span>Edit</span> Role</h1>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-5">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Update Role Details</h2>
                <span class="role-chip-header"><?= esc(ucfirst($roleName)) ?></span>
            </div>
            <div class="content-card-body">

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="flash-alert flash-error">
                        <i data-lucide="alert-circle"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if ($isCoreRole): ?>
                    <div class="core-notice">
                        <i data-lucide="alert-triangle"></i>
                        This is a core system role. Its slug is locked and cannot be modified.
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/roles/update/' . $roleId) ?>" method="POST">
                    <div class="form-group">
                        <label class="form-label-custom" for="name">Role Name (Slug)</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?= esc($roleName) ?>"
                               required
                               <?= $isCoreRole ? 'readonly' : '' ?>>
                        <?php if ($isCoreRole): ?>
                            <p class="form-hint form-hint-danger">Core role slug cannot be changed.</p>
                        <?php else: ?>
                            <p class="form-hint">Use lowercase letters only, no spaces (e.g. coordinator).</p>
                        <?php endif; ?>
                    </div>

                    <div class="btn-wrap">
                        <button type="submit" class="btn-save">
                            <i data-lucide="check"></i> Update Role
                        </button>
                        <a href="<?= base_url('admin/roles') ?>" class="btn-cancel">
                            <i data-lucide="x"></i> Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<?= $this->endSection() ?>