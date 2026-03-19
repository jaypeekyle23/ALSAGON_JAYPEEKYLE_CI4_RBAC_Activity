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
        text-decoration: none; margin-bottom: 20px; transition: color .13s;
    }
    .back-link:hover { color: var(--indigo); }
    .back-link svg { width: 15px; height: 15px; stroke-width: 2; }

    /* Card */
    .content-card {
        background: #fff; border-radius: var(--radius);
        box-shadow: var(--shadow-sm); border: 1px solid rgba(0,0,0,.045);
        overflow: hidden;
    }
    .content-card-header { padding: 20px 24px; border-bottom: 1px solid var(--slate-100); }
    .content-card-title  { font-size: 14px; font-weight: 700; color: var(--slate-900); margin: 0; }
    .content-card-body   { padding: 24px; }

    /* Flash */
    .flash-alert {
        display: flex; align-items: flex-start; gap: 10px;
        padding: 13px 16px; border-radius: var(--radius-sm);
        font-size: 13.5px; font-weight: 500; margin-bottom: 20px;
    }
    .flash-alert svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; stroke-width: 2; }
    .flash-error { background: var(--red-light); color: var(--red); }

    /* Info box */
    .info-box {
        display: flex; align-items: flex-start; gap: 10px;
        background: var(--indigo-light); color: #3730A3;
        border: 1px solid rgba(79,70,229,.15);
        border-radius: var(--radius-sm); padding: 13px 16px;
        font-size: 13px; line-height: 1.6; margin-bottom: 24px;
    }
    .info-box svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; stroke-width: 2; }

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
    .form-hint  { font-size: 12px; color: var(--slate-500); margin-top: 6px; }
    .form-group { margin-bottom: 18px; }

    /* Field pair divider */
    .field-section-label {
        font-size: 10px; font-weight: 700; letter-spacing: .1em;
        text-transform: uppercase; color: var(--slate-400);
        border-bottom: 1px solid var(--slate-100);
        padding-bottom: 8px; margin-bottom: 16px; margin-top: 4px;
    }

    /* Buttons */
    .btn-wrap { display: flex; align-items: center; gap: 10px; margin-top: 8px; }
    .btn-save {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 22px; border-radius: 999px;
        background: var(--indigo); color: #fff;
        font-size: 13.5px; font-weight: 600; border: none;
        cursor: pointer; text-decoration: none; transition: opacity .15s;
        box-shadow: 0 2px 8px rgba(79,70,229,.25);
    }
    .btn-save:hover { opacity: .88; color: #fff; }
    .btn-save svg { width: 15px; height: 15px; stroke-width: 2; }

    .btn-cancel {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 18px; border-radius: 999px;
        background: none; color: var(--slate-500);
        font-size: 13.5px; font-weight: 600;
        border: 1.5px solid var(--slate-200); cursor: pointer;
        text-decoration: none; transition: background .13s, color .13s, border-color .13s;
    }
    .btn-cancel:hover { background: var(--slate-100); color: var(--slate-700); border-color: var(--slate-300); }
    .btn-cancel svg { width: 15px; height: 15px; stroke-width: 2; }
</style>

<!-- Back -->
<a href="<?= base_url('admin/roles') ?>" class="back-link">
    <i data-lucide="arrow-left"></i> Back to Roles
</a>

<!-- Header -->
<div class="mb-4">
    <p class="page-eyebrow">Administration</p>
    <h1 class="page-title">Create <span>New Role</span></h1>
</div>

<div class="row">
    <div class="col-12 col-md-7 col-lg-5">
        <div class="content-card">
            <div class="content-card-header">
                <h2 class="content-card-title">Role Details</h2>
            </div>
            <div class="content-card-body">

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="flash-alert flash-error">
                        <i data-lucide="alert-circle"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="info-box">
                    <i data-lucide="info"></i>
                    The <strong>slug</strong> is used internally by route filters for access control. The <strong>label</strong> is what users see on the dashboard.
                </div>

                <form action="<?= base_url('admin/roles/store') ?>" method="POST">

                    <p class="field-section-label">System Identifier</p>

                    <div class="form-group">
                        <label class="form-label-custom" for="name">Role Slug</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="e.g. coordinator" required>
                        <p class="form-hint">Lowercase letters only, no spaces. Used by the route filters.</p>
                    </div>

                    <p class="field-section-label">Display Information</p>

                    <div class="form-group">
                        <label class="form-label-custom" for="label">Role Label</label>
                        <input type="text" class="form-control" id="label" name="label"
                               placeholder="e.g. Program Coordinator" required>
                        <p class="form-hint">Human-readable name shown across the dashboard.</p>
                    </div>

                    <div class="btn-wrap">
                        <button type="submit" class="btn-save">
                            <i data-lucide="save"></i> Save Role
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