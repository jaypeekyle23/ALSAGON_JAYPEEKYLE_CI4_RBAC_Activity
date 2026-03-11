<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

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
        --warning: #D97706;
        --warning-light: #FEF3C7;
        --danger: #DC2626;
        --danger-light: #FEE2E2;
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

    .edit-wrapper {
        max-width: 620px;
        margin: 0 auto;
        padding: 48px 24px 80px;
        animation: fadeUp 0.45s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Back link ── */
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-muted);
        text-decoration: none;
        margin-bottom: 28px;
        transition: color 0.15s;
    }

    .back-link:hover { color: var(--text-primary); }

    .back-link svg { transition: transform 0.15s; }
    .back-link:hover svg { transform: translateX(-3px); }

    /* ── Header ── */
    .edit-header {
        margin-bottom: 28px;
        padding-bottom: 24px;
        border-bottom: 1.5px solid var(--border);
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .edit-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--warning-light);
        border: 2px solid #FDE68A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Instrument Serif', serif;
        font-size: 20px;
        color: var(--warning);
        flex-shrink: 0;
    }

    .edit-header-text {}

    .edit-eyebrow {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--warning);
        margin-bottom: 4px;
    }

    .edit-title {
        font-family: 'Instrument Serif', serif;
        font-size: 28px;
        font-weight: 400;
        line-height: 1.1;
        color: var(--text-primary);
    }

    .edit-title em {
        font-style: italic;
        color: var(--text-secondary);
    }

    /* ── Alert ── */
    .alert-bar {
        margin-bottom: 24px;
        border-radius: var(--radius-sm);
        padding: 14px 18px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        font-weight: 450;
        animation: fadeUp 0.3s ease both;
        background: var(--danger-light);
        border: 1px solid #FCA5A5;
        color: #991B1B;
    }

    .alert-bar .alert-close {
        margin-left: auto;
        background: none;
        border: none;
        cursor: pointer;
        opacity: 0.5;
        font-size: 18px;
        line-height: 1;
        color: inherit;
        transition: opacity 0.15s;
        flex-shrink: 0;
    }

    .alert-bar .alert-close:hover { opacity: 1; }
    .alert-bar ul { padding-left: 16px; margin: 0; }

    /* ── Card ── */
    .card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        overflow: visible;
    }

    .card-header {
        padding: 20px 24px 16px;
        border-bottom: 1px solid var(--border);
        border-radius: var(--radius) var(--radius) 0 0;
        background: var(--surface-2);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--warning);
        flex-shrink: 0;
    }

    .card-header-title {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
        letter-spacing: 0.04em;
    }

    .card-body { padding: 28px 24px; }

    /* ── Form ── */
    .form-group { margin-bottom: 20px; }

    .form-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.05em;
        color: var(--text-secondary);
        margin-bottom: 7px;
        text-transform: uppercase;
    }

    .form-control {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid var(--border);
        border-radius: var(--radius-xs);
        background: var(--surface);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        color: var(--text-primary);
        transition: border-color 0.15s, box-shadow 0.15s;
        outline: none;
        appearance: none;
    }

    .form-control::placeholder { color: var(--text-muted); }

    .form-control:focus {
        border-color: var(--warning);
        box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.12);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        line-height: 1.55;
    }

    .form-divider {
        height: 1px;
        background: var(--border);
        margin: 24px 0;
    }

    /* ── Actions row ── */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 11px 20px;
        background: var(--surface-2);
        color: var(--text-secondary);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s;
        text-decoration: none;
    }

    .btn-cancel:hover {
        background: var(--border);
        color: var(--text-primary);
        border-color: var(--border-strong);
    }

    .btn-update {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 20px;
        background: var(--warning);
        color: #fff;
        border: none;
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
        box-shadow: 0 2px 8px rgba(217, 119, 6, 0.28);
    }

    .btn-update:hover {
        background: #B45309;
        box-shadow: 0 4px 16px rgba(217, 119, 6, 0.38);
        transform: translateY(-1px);
    }

    .btn-update:active { transform: translateY(0); }

    /* ── Change indicator ── */
    .changed-badge {
        display: none;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 600;
        color: var(--warning);
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .changed-badge.visible { display: inline-flex; }

    .changed-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--warning);
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.35; }
    }
</style>

<div class="edit-wrapper">

    <!-- Back -->
    <a href="<?= base_url('students') ?>" class="back-link">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Students
    </a>

    <!-- Alert -->
    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert-bar" id="alert-errors">
            <span style="font-size:16px; flex-shrink:0; margin-top:1px;">!</span>
            <div>
                <ul>
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <button class="alert-close" onclick="document.getElementById('alert-errors').remove()">×</button>
        </div>
    <?php endif; ?>

    <!-- Page Header -->
    <div class="edit-header">
        <div class="edit-avatar" id="editAvatar">
            <?= strtoupper(mb_substr($student['name'], 0, 2)) ?>
        </div>
        <div class="edit-header-text">
            <div class="edit-eyebrow">Editing Record</div>
            <h1 class="edit-title"><?= esc($student['name']) ?></h1>
        </div>
    </div>

    <!-- Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-dot"></div>
            <span class="card-header-title">Student Information</span>
            <span class="changed-badge" id="changedBadge" style="margin-left: auto;">
                <span class="changed-dot"></span>
                Unsaved changes
            </span>
        </div>
        <div class="card-body">
            <form action="<?= base_url('student/update/' . $student['id']) ?>" method="post" id="editForm">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" id="fieldName" class="form-control" value="<?= old('name', $student['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?= old('email', $student['email']) ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Course</label>
                    <input type="text" name="course" class="form-control" value="<?= old('course', $student['course']) ?>" required>
                </div>

                <div class="form-divider"></div>

                <div class="form-group">
                    <label class="form-label">Notes / Description</label>
                    <textarea name="description" class="form-control" rows="4" required><?= old('description', $student['description']) ?></textarea>
                </div>

                <div class="form-actions">
                    <a href="<?= base_url('students') ?>" class="btn-cancel">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Cancel
                    </a>
                    <button type="submit" class="btn-update">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    // Show "Unsaved changes" badge when any field is modified
    const form = document.getElementById('editForm');
    const badge = document.getElementById('changedBadge');
    const nameField = document.getElementById('fieldName');
    const avatar = document.getElementById('editAvatar');

    form.addEventListener('input', () => {
        badge.classList.add('visible');
    });

    // Live-update avatar initials as name is typed
    nameField.addEventListener('input', function () {
        const val = this.value.trim();
        avatar.textContent = val.length >= 2
            ? val.slice(0, 2).toUpperCase()
            : val.slice(0, 1).toUpperCase() || '??';
    });
</script>

<?= $this->endSection(); ?>