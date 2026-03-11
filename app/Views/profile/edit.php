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
        --success-hover: #047857;
        --success-light: #D1FAE5;
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

    .edit-profile-wrapper {
        max-width: 960px;
        margin: 0 auto;
        padding: 48px 24px 80px;
        animation: fadeUp 0.45s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Page Header ── */
    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1.5px solid var(--border);
    }

    .page-eyebrow {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 6px;
    }

    .page-title {
        font-family: 'Instrument Serif', serif;
        font-size: clamp(26px, 4vw, 36px);
        font-weight: 400;
        line-height: 1.1;
    }

    .page-title em {
        font-style: italic;
        color: var(--text-secondary);
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-muted);
        text-decoration: none;
        transition: color 0.15s;
        margin-bottom: 4px;
    }

    .back-link:hover { color: var(--text-primary); }
    .back-link:hover svg { transform: translateX(-3px); }
    .back-link svg { transition: transform 0.15s; }

    /* ── Layout ── */
    .edit-grid {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 20px;
        align-items: start;
    }

    @media (max-width: 720px) {
        .edit-grid { grid-template-columns: 1fr; }
        .page-header { flex-direction: column; align-items: flex-start; gap: 16px; }
    }

    /* ── Card ── */
    .card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        overflow: visible;
        transition: box-shadow 0.2s;
    }

    .card-header {
        padding: 14px 20px;
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

    /* ── Avatar Panel ── */
    .avatar-panel .card-body {
        padding: 28px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .avatar-ring {
        position: relative;
        margin-bottom: 16px;
        cursor: pointer;
    }

    .avatar-ring img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--surface);
        box-shadow: 0 0 0 2px var(--border), var(--shadow-md);
        display: block;
        transition: filter 0.2s;
    }

    .avatar-ring:hover img { filter: brightness(0.82); }

    .avatar-overlay {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.2s;
        pointer-events: none;
    }

    .avatar-ring:hover .avatar-overlay { opacity: 1; }

    .avatar-overlay-inner {
        background: rgba(26,23,20,0.55);
        border-radius: 50%;
        width: 100px;
        height: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .avatar-overlay-inner svg { color: #fff; }

    .avatar-overlay-text {
        font-size: 10px;
        font-weight: 600;
        color: #fff;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .avatar-hint {
        font-size: 12px;
        color: var(--text-muted);
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .file-input-wrap {
        width: 100%;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        width: 100%;
        padding: 9px 14px;
        border: 1.5px dashed var(--border-strong);
        border-radius: var(--radius-xs);
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all 0.15s;
        background: var(--surface-2);
    }

    .file-input-label:hover {
        border-color: var(--accent);
        color: var(--accent);
        background: var(--accent-light);
    }

    #profile_image { display: none; }

    .file-error {
        font-size: 12px;
        color: var(--danger);
        margin-top: 6px;
        text-align: center;
    }

    /* ── Fields Panel ── */
    .fields-card .card-body { padding: 0; }

    .fields-section-label {
        padding: 11px 24px 9px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--text-muted);
        background: var(--surface-2);
        border-bottom: 1px solid var(--border);
    }

    .fields-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }

    .fields-grid.single { grid-template-columns: 1fr; }

    @media (max-width: 560px) { .fields-grid { grid-template-columns: 1fr; } }

    .field-cell {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        border-right: 1px solid var(--border);
    }

    .field-cell:nth-child(even) { border-right: none; }
    .field-cell.full { border-right: none; grid-column: 1 / -1; }

    .form-label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.07em;
        color: var(--text-muted);
        margin-bottom: 7px;
        text-transform: uppercase;
    }

    .form-control {
        width: 100%;
        padding: 10px 13px;
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
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(45, 91, 227, 0.12);
    }

    .form-control.is-invalid {
        border-color: var(--danger);
        box-shadow: none;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.12);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 88px;
        line-height: 1.55;
    }

    .field-error {
        font-size: 12px;
        color: var(--danger);
        margin-top: 5px;
    }

    /* ── Actions ── */
    .form-actions-bar {
        padding: 18px 24px;
        background: var(--surface-2);
        border-top: 1px solid var(--border);
        border-radius: 0 0 var(--radius) var(--radius);
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 18px;
        background: var(--surface);
        color: var(--text-secondary);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.15s;
    }

    .btn-cancel:hover {
        background: var(--border);
        color: var(--text-primary);
        border-color: var(--border-strong);
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        background: var(--success);
        color: #fff;
        border: none;
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
        box-shadow: 0 2px 8px rgba(5, 150, 105, 0.25);
    }

    .btn-save:hover {
        background: var(--success-hover);
        box-shadow: 0 4px 14px rgba(5, 150, 105, 0.35);
        transform: translateY(-1px);
    }

    .btn-save:active { transform: translateY(0); }

    /* ── Unsaved indicator ── */
    .unsaved-badge {
        display: none;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 600;
        color: var(--text-muted);
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-right: auto;
    }

    .unsaved-badge.visible { display: inline-flex; }

    .unsaved-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--success);
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }
</style>

<div class="edit-profile-wrapper">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <a href="<?= base_url('profile') ?>" class="back-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                Back to Profile
            </a>
            <div class="page-eyebrow">Account</div>
            <h1 class="page-title">Edit <em>Profile</em></h1>
        </div>
    </div>

    <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data" id="editProfileForm">
        <?= csrf_field() ?>

        <div class="edit-grid">

            <!-- Left: Avatar Panel -->
            <div class="card avatar-panel">
                <div class="card-header">
                    <div class="card-header-dot"></div>
                    <span class="card-header-title">Photo</span>
                </div>
                <div class="card-body">
                    <div class="avatar-ring" onclick="document.getElementById('profile_image').click()">
                        <?php if (!empty($user['profile_image'])): ?>
                            <img id="imagePreview" src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" alt="Profile">
                        <?php else: ?>
                            <img id="imagePreview" src="https://ui-avatars.com/api/?name=<?= urlencode($user['name'] ?? $user['fullname'] ?? 'User') ?>&background=E2DDD4&color=6B6560&size=150&bold=true&font-size=0.4" alt="Profile">
                        <?php endif; ?>
                        <div class="avatar-overlay">
                            <div class="avatar-overlay-inner">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                                <span class="avatar-overlay-text">Change</span>
                            </div>
                        </div>
                    </div>

                    <p class="avatar-hint">Click the photo to upload a new one. JPG, PNG, or GIF accepted.</p>

                    <div class="file-input-wrap">
                        <label class="file-input-label" for="profile_image">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            Choose Photo
                        </label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(event)">
                        <?php if(session('errors.profile_image')): ?>
                            <div class="field-error"><?= session('errors.profile_image') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Right: Fields Panel -->
            <div class="card fields-card">
                <div class="card-header">
                    <div class="card-header-dot"></div>
                    <span class="card-header-title">Student Information</span>
                </div>

                <!-- Personal -->
                <div class="fields-section-label">Personal</div>
                <div class="fields-grid">
                    <div class="field-cell">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" name="name" placeholder="e.g. Juan dela Cruz" value="<?= old('name', esc($user['name'] ?? $user['fullname'] ?? '')) ?>">
                        <?php if(session('errors.name')): ?><div class="field-error"><?= session('errors.name') ?></div><?php endif; ?>
                    </div>
                    <div class="field-cell">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" name="email" placeholder="e.g. juan@university.edu" value="<?= old('email', esc($user['email'] ?? $user['username'] ?? '')) ?>">
                        <?php if(session('errors.email')): ?><div class="field-error"><?= session('errors.email') ?></div><?php endif; ?>
                    </div>
                    <div class="field-cell full">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" name="phone" placeholder="e.g. +63 912 345 6789" value="<?= old('phone', esc($user['phone'] ?? '')) ?>">
                        <?php if(session('errors.phone')): ?><div class="field-error"><?= session('errors.phone') ?></div><?php endif; ?>
                    </div>
                </div>

                <!-- Academic -->
                <div class="fields-section-label">Academic</div>
                <div class="fields-grid">
                    <div class="field-cell">
                        <label class="form-label">Student ID</label>
                        <input type="text" class="form-control <?= session('errors.student_id') ? 'is-invalid' : '' ?>" name="student_id" placeholder="e.g. 2024-00001" value="<?= old('student_id', esc($user['student_id'] ?? '')) ?>">
                        <?php if(session('errors.student_id')): ?><div class="field-error"><?= session('errors.student_id') ?></div><?php endif; ?>
                    </div>
                    <div class="field-cell">
                        <label class="form-label">Course</label>
                        <input type="text" class="form-control <?= session('errors.course') ? 'is-invalid' : '' ?>" name="course" placeholder="e.g. BSIT, BSCS" value="<?= old('course', esc($user['course'] ?? '')) ?>">
                        <?php if(session('errors.course')): ?><div class="field-error"><?= session('errors.course') ?></div><?php endif; ?>
                    </div>
                    <div class="field-cell">
                        <label class="form-label">Year Level</label>
                        <input type="number" class="form-control <?= session('errors.year_level') ? 'is-invalid' : '' ?>" name="year_level" placeholder="e.g. 2" min="1" max="6" value="<?= old('year_level', esc($user['year_level'] ?? '')) ?>">
                        <?php if(session('errors.year_level')): ?><div class="field-error"><?= session('errors.year_level') ?></div><?php endif; ?>
                    </div>
                    <div class="field-cell">
                        <label class="form-label">Section</label>
                        <input type="text" class="form-control <?= session('errors.section') ? 'is-invalid' : '' ?>" name="section" placeholder="e.g. A, B, IT-3A" value="<?= old('section', esc($user['section'] ?? '')) ?>">
                        <?php if(session('errors.section')): ?><div class="field-error"><?= session('errors.section') ?></div><?php endif; ?>
                    </div>
                </div>

                <!-- Address -->
                <div class="fields-section-label">Address</div>
                <div class="fields-grid single">
                    <div class="field-cell full" style="border-bottom: none;">
                        <label class="form-label">Home Address</label>
                        <textarea class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" name="address" rows="3" placeholder="Street, Barangay, City, Province"><?= old('address', esc($user['address'] ?? '')) ?></textarea>
                        <?php if(session('errors.address')): ?><div class="field-error"><?= session('errors.address') ?></div><?php endif; ?>
                    </div>
                </div>

                <!-- Actions bar -->
                <div class="form-actions-bar">
                    <span class="unsaved-badge" id="unsavedBadge">
                        <span class="unsaved-dot"></span>
                        Unsaved changes
                    </span>
                    <a href="<?= base_url('profile') ?>" class="btn-cancel">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Cancel
                    </a>
                    <button type="submit" class="btn-save">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Save Changes
                    </button>
                </div>

            </div><!-- /fields-card -->
        </div><!-- /edit-grid -->
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('imagePreview').src = reader.result;
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
            document.getElementById('unsavedBadge').classList.add('visible');
        }
    }

    // Unsaved changes indicator
    document.getElementById('editProfileForm').addEventListener('input', function() {
        document.getElementById('unsavedBadge').classList.add('visible');
    });
</script>

<?= $this->endSection() ?>