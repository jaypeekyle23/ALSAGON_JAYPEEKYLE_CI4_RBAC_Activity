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
        --success: #059669;
        --success-light: #D1FAE5;
        --shadow-sm: 0 1px 3px rgba(26,23,20,0.06), 0 1px 2px rgba(26,23,20,0.04);
        --shadow-md: 0 4px 16px rgba(26,23,20,0.08), 0 2px 6px rgba(26,23,20,0.05);
        --shadow-lg: 0 8px 32px rgba(26,23,20,0.10), 0 4px 12px rgba(26,23,20,0.06);
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

    .sms-wrapper {
        max-width: 1280px;
        margin: 0 auto;
        padding: 48px 32px 80px;
        animation: fadeUp 0.5s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Header ── */
    .sms-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 40px;
        padding-bottom: 28px;
        border-bottom: 1.5px solid var(--border);
    }

    .sms-header-left {}

    .sms-eyebrow {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 6px;
    }

    .sms-title {
        font-family: 'Instrument Serif', serif;
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 400;
        line-height: 1.1;
        color: var(--text-primary);
    }

    .sms-title em {
        font-style: italic;
        color: var(--text-secondary);
    }

    .sms-stats {
        display: flex;
        gap: 24px;
        align-items: flex-end;
    }

    .stat-pill {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .stat-pill .stat-num {
        font-family: 'Instrument Serif', serif;
        font-size: 28px;
        line-height: 1;
        color: var(--text-primary);
    }

    .stat-pill .stat-label {
        font-size: 11px;
        font-weight: 500;
        color: var(--text-muted);
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-top: 2px;
    }

    /* ── Alerts ── */
    .alert-bar {
        margin-bottom: 28px;
        border-radius: var(--radius-sm);
        padding: 14px 18px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        font-weight: 450;
        animation: fadeUp 0.3s ease both;
    }

    .alert-bar.success {
        background: var(--success-light);
        border: 1px solid #6EE7B7;
        color: #065F46;
    }

    .alert-bar.danger {
        background: var(--danger-light);
        border: 1px solid #FCA5A5;
        color: #991B1B;
    }

    .alert-bar .alert-icon {
        font-size: 16px;
        flex-shrink: 0;
        margin-top: 1px;
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

    /* ── Layout Grid ── */
    .sms-grid {
        display: grid;
        grid-template-columns: 340px 1fr;
        gap: 24px;
        align-items: start;
    }

    @media (max-width: 900px) {
        .sms-grid { grid-template-columns: 1fr; }
        .sms-header { flex-direction: column; align-items: flex-start; gap: 20px; }
        .sms-stats { align-self: flex-start; }
    }

    /* ── Card Base ── */
    .card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        overflow: visible;
        transition: box-shadow 0.2s ease;
    }

    .card:hover { box-shadow: var(--shadow-md); }

    .card-header {
        padding: 20px 24px 16px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: var(--radius) var(--radius) 0 0;
    }

    .card-header-label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 2px;
    }

    .card-header-title {
        font-size: 17px;
        font-weight: 600;
        color: var(--text-primary);
        letter-spacing: -0.02em;
    }

    .card-body { padding: 24px; }

    /* ── Form ── */
    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.05em;
        color: var(--text-secondary);
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
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

    textarea.form-control {
        resize: vertical;
        min-height: 90px;
        line-height: 1.5;
    }

    .btn-primary-custom {
        width: 100%;
        padding: 12px 20px;
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
        letter-spacing: 0.01em;
        box-shadow: 0 2px 8px rgba(45, 91, 227, 0.25);
        margin-top: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary-custom:hover {
        background: var(--accent-hover);
        box-shadow: 0 4px 16px rgba(45, 91, 227, 0.35);
        transform: translateY(-1px);
    }

    .btn-primary-custom:active { transform: translateY(0); }

    .form-divider {
        height: 1px;
        background: var(--border);
        margin: 20px 0;
    }

    /* ── Table ── */
    .table-card .card-body { padding: 0; }

    .search-bar-wrap {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-icon { color: var(--text-muted); font-size: 16px; flex-shrink: 0; }

    .search-input {
        border: none;
        outline: none;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        color: var(--text-primary);
        background: transparent;
        width: 100%;
    }

    .search-input::placeholder { color: var(--text-muted); }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    thead th {
        padding: 11px 16px;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        background: var(--surface-2);
        border-bottom: 1px solid var(--border);
        white-space: nowrap;
    }

    thead th:first-child { padding-left: 20px; }
    thead th:last-child { padding-right: 20px; }

    tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.12s;
    }

    tbody tr:last-child { border-bottom: none; }

    tbody tr:hover { background: var(--accent-light); }

    td {
        padding: 14px 16px;
        color: var(--text-primary);
        vertical-align: middle;
    }

    td:first-child { padding-left: 20px; }
    td:last-child { padding-right: 20px; }

    .td-name {
        font-weight: 500;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--accent-light);
        border: 1.5px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        color: var(--accent);
        flex-shrink: 0;
        letter-spacing: 0;
    }

    .td-email { color: var(--text-secondary); font-size: 13px; }

    .course-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 10px;
        border-radius: 100px;
        background: var(--surface-2);
        border: 1px solid var(--border);
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        letter-spacing: 0.03em;
    }

    .td-desc {
        color: var(--text-secondary);
        font-size: 13px;
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .action-group { display: flex; align-items: center; gap: 6px; }

    .btn-edit, .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 12px;
        border-radius: var(--radius-xs);
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s;
        text-decoration: none;
        border: 1.5px solid transparent;
    }

    .btn-edit {
        background: var(--warning-light);
        color: var(--warning);
        border-color: #FDE68A;
    }

    .btn-edit:hover {
        background: #FDE68A;
        color: #92400E;
    }

    .btn-delete {
        background: var(--danger-light);
        color: var(--danger);
        border-color: #FCA5A5;
    }

    .btn-delete:hover {
        background: #FCA5A5;
        color: #7F1D1D;
    }

    .empty-state {
        text-align: center;
        padding: 60px 24px;
    }

    .empty-icon {
        font-size: 40px;
        margin-bottom: 12px;
        opacity: 0.35;
    }

    .empty-text {
        font-size: 15px;
        color: var(--text-muted);
        font-weight: 400;
    }

    /* ── Table footer ── */
    .table-footer {
        padding: 12px 20px;
        border-top: 1px solid var(--border);
        background: var(--surface-2);
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 0 0 var(--radius) var(--radius);
    }

    /* ── Sticky form tip ── */
    .form-tip {
        margin-top: 12px;
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.5;
        padding: 10px 12px;
        background: var(--surface-2);
        border-radius: var(--radius-xs);
        border-left: 3px solid var(--border-strong);
    }
</style>

<div class="sms-wrapper">

    <!-- Alerts -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert-bar success" id="alert-success">
            <span class="alert-icon">✓</span>
            <span><?= session()->getFlashdata('success') ?></span>
            <button class="alert-close" onclick="document.getElementById('alert-success').remove()">×</button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert-bar danger" id="alert-errors">
            <span class="alert-icon">!</span>
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

    <!-- Header -->
    <div class="sms-header">
        <div class="sms-header-left">
            <div class="sms-eyebrow">Admin Panel</div>
            <h1 class="sms-title">Student <em>Management</em></h1>
        </div>
        <div class="sms-stats">
            <div class="stat-pill">
                <span class="stat-num"><?= !empty($students) ? count($students) : 0 ?></span>
                <span class="stat-label">Total Students</span>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="sms-grid">

        <!-- Add Student Form -->
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-header-label">New Entry</div>
                    <div class="card-header-title">Add Student</div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('student/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Juan dela Cruz" value="<?= old('name') ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="e.g. juan@university.edu" value="<?= old('email') ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Course</label>
                        <input type="text" name="course" class="form-control" placeholder="e.g. BSIT, BSCS, BSECE" value="<?= old('course') ?>" required>
                    </div>

                    <div class="form-divider"></div>

                    <div class="form-group">
                        <label class="form-label">Notes / Description</label>
                        <textarea name="description" class="form-control" placeholder="Any relevant notes about this student..." rows="3" required><?= old('description') ?></textarea>
                    </div>

                    <button type="submit" class="btn-primary-custom">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Add Student
                    </button>
                </form>

                <p class="form-tip">All fields are required. Double-check the email address before submitting.</p>
            </div>
        </div>

        <!-- Students Table -->
        <div class="card table-card">
            <div class="card-header">
                <div>
                    <div class="card-header-label">Directory</div>
                    <div class="card-header-title">All Students</div>
                </div>
            </div>

            <div class="search-bar-wrap">
                <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" class="search-input" id="tableSearch" placeholder="Search by name, email, or course…">
            </div>

            <div class="card-body" style="overflow-x: auto; padding: 0;">
                <table id="studentTable" style="min-width: 680px;">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <?php if(!empty($students)): foreach ($students as $s): ?>
                            <tr>
                                <td>
                                    <div class="td-name">
                                        <div class="avatar"><?= strtoupper(mb_substr($s['name'], 0, 2)) ?></div>
                                        <?= esc($s['name']) ?>
                                    </div>
                                </td>
                                <td class="td-email"><?= esc($s['email']) ?></td>
                                <td><span class="course-badge"><?= esc($s['course']) ?></span></td>
                                <td><span class="td-desc" title="<?= esc($s['description']) ?>"><?= esc($s['description']) ?></span></td>
                                <td>
                                    <div class="action-group">
                                        <a href="<?= base_url('student/edit/' . $s['id']) ?>" class="btn-edit">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            Edit
                                        </a>
                                        <form action="<?= base_url('student/delete/' . $s['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to remove this student?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn-delete">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-icon">🎓</div>
                                        <div class="empty-text">No students yet. Add your first student using the form.</div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if(!empty($students)): ?>
            <div class="table-footer">
                <span id="rowCount"><?= count($students) ?> student<?= count($students) !== 1 ? 's' : '' ?> total</span>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<script>
    // Live search filter
    document.getElementById('tableSearch')?.addEventListener('input', function() {
        const q = this.value.toLowerCase();
        const rows = document.querySelectorAll('#studentTableBody tr');
        let visible = 0;
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const show = text.includes(q);
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        const counter = document.getElementById('rowCount');
        if (counter) counter.textContent = visible + ' student' + (visible !== 1 ? 's' : '') + (q ? ' found' : ' total');
    });
</script>

<?= $this->endSection(); ?>