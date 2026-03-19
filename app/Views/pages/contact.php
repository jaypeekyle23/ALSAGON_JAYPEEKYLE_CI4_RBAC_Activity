<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<style>
    :root {
        --page-bg:      #F8F9FA;
        --card-bg:      #FFFFFF;
        --indigo:       #4F46E5;
        --indigo-light: #EEF2FF;
        --green:        #16A34A;
        --green-light:  #DCFCE7;
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
    body { background: var(--page-bg); font-family: 'Inter', system-ui, sans-serif; }

    /* ── Page Header ─────────────────── */
    .page-eyebrow {
        font-size: 11px; font-weight: 700; letter-spacing: .08em;
        text-transform: uppercase; color: var(--slate-500); margin-bottom: 2px;
    }
    .page-title { font-size: 1.55rem; font-weight: 700; color: var(--slate-900); margin: 0 0 4px; }
    .page-title span { color: var(--indigo); }
    .page-subtitle { font-size: 13.5px; color: var(--slate-500); margin: 0; }

    /* ── Card ────────────────────────── */
    .content-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(0,0,0,.045);
        overflow: hidden;
    }
    .content-card-header {
        padding: 26px 28px 22px;
        border-bottom: 1px solid var(--slate-100);
    }
    .content-card-title { font-size: 15px; font-weight: 700; color: var(--slate-900); margin: 0; }
    .content-card-body { padding: 28px; }

    .section-divider { border: none; border-top: 1px solid var(--slate-200); margin: 0 0 28px; }

    /* ── Two-col ─────────────────────── */
    .contact-cols { display: grid; grid-template-columns: 1fr 1px 1fr; gap: 0 36px; }
    @media (max-width: 767px) { .contact-cols { grid-template-columns: 1fr; gap: 32px 0; } }
    .col-divider { background: var(--slate-200); }
    @media (max-width: 767px) { .col-divider { display: none; } }

    .section-heading { font-size: 13.5px; font-weight: 700; color: var(--slate-900); margin-bottom: 18px; }

    /* ── Form ────────────────────────── */
    .form-label-custom {
        font-size: 11px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: var(--slate-500);
        margin-bottom: 6px; display: block;
    }
    .form-control, .form-select {
        font-size: 13.5px;
        color: var(--slate-900);
        border: 1.5px solid var(--slate-200);
        border-radius: var(--radius-sm);
        padding: 9px 13px;
        background: #fff;
        transition: border-color .15s, box-shadow .15s;
        box-shadow: none;
    }
    .form-control::placeholder { color: var(--slate-300); }
    .form-control:focus, .form-select:focus {
        border-color: var(--indigo);
        box-shadow: 0 0 0 3px rgba(79,70,229,.12);
        outline: none;
    }
    .form-group { margin-bottom: 16px; }

    /* ── Submit Button ───────────────── */
    .btn-indigo {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 22px; border-radius: 999px;
        background: var(--indigo); color: #fff;
        font-size: 13.5px; font-weight: 600;
        border: none; cursor: pointer; text-decoration: none;
        transition: opacity .15s, box-shadow .15s;
        box-shadow: 0 2px 8px rgba(79,70,229,.25);
    }
    .btn-indigo:hover { opacity: .88; color: #fff; }
    .btn-indigo svg { width: 15px; height: 15px; }

    /* ── Directory Items ─────────────── */
    .dir-item {
        display: flex; align-items: flex-start; gap: 14px;
        margin-bottom: 22px;
    }
    .dir-item:last-child { margin-bottom: 0; }
    .dir-icon {
        width: 40px; height: 40px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .dir-icon svg { width: 18px; height: 18px; stroke-width: 2; }
    .di-indigo { background: var(--indigo-light); color: var(--indigo); }
    .di-green  { background: var(--green-light);  color: var(--green);  }
    .di-amber  { background: var(--amber-light);  color: var(--amber);  }
    .dir-title { font-size: 13.5px; font-weight: 700; color: var(--slate-900); margin-bottom: 4px; }
    .dir-body  { font-size: 13px; color: var(--slate-500); line-height: 1.65; margin: 0; }
    .dir-body a { color: var(--indigo); text-decoration: none; }
    .dir-body a:hover { text-decoration: underline; }
    .dir-body strong { color: var(--slate-700); font-weight: 600; }
    .dir-note { font-size: 12px; color: var(--slate-500); margin-top: 3px; display: block; }

    .intro-text { font-size: 13.5px; color: var(--slate-500); line-height: 1.7; margin-bottom: 28px; }
</style>

<!-- Page Header -->
<div class="mb-4" style="max-width: 900px; margin-left: auto; margin-right: auto;">
    <p class="page-eyebrow">Support</p>
    <h1 class="page-title">Contact <span>Support</span></h1>
    <p class="page-subtitle">Reach out to Administration or IT Support for assistance.</p>
</div>

<div style="max-width: 900px; margin: 0 auto;">
    <div class="content-card">
        <div class="content-card-header">
            <h2 class="content-card-title">Submit a Help Ticket</h2>
        </div>
        <div class="content-card-body">

            <p class="intro-text">
                Having trouble with your grades, enrollment, or account access? Fill out the form below or contact the respective department directly using the details provided.
            </p>

            <hr class="section-divider">

            <div class="contact-cols">

                <!-- Left: Form -->
                <div>
                    <h3 class="section-heading">Send a Message</h3>

                    <form action="#" method="post">
                        <div class="row g-3 mb-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label-custom">Full Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Juan Dela Cruz">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_id" class="form-label-custom">Student / Staff ID</label>
                                    <input type="text" class="form-control" id="student_id" placeholder="Optional">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label-custom">School Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@school.edu.ph">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department" class="form-label-custom">Department</label>
                                    <select class="form-select" id="department">
                                        <option value="">Select Department...</option>
                                        <option value="it">IT Support (Login Issues)</option>
                                        <option value="registrar">Registrar (Grades/Enrollment)</option>
                                        <option value="finance">Finance (Tuition/Fees)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subject" class="form-label-custom">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Brief description of the issue">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="message" class="form-label-custom">Message</label>
                                    <textarea class="form-control" id="message" rows="4" placeholder="Please provide as much detail as possible..."></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn-indigo">
                            <i data-lucide="send"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Divider -->
                <div class="col-divider"></div>

                <!-- Right: Directory -->
                <div>
                    <h3 class="section-heading">Directory</h3>

                    <div class="dir-item">
                        <div class="dir-icon di-indigo">
                            <i data-lucide="map-pin"></i>
                        </div>
                        <div>
                            <p class="dir-title">Administration Office</p>
                            <p class="dir-body">
                                Room 101, Main Building<br>
                                University Campus<br>
                                Manila, Philippines
                            </p>
                        </div>
                    </div>

                    <div class="dir-item">
                        <div class="dir-icon di-green">
                            <i data-lucide="phone"></i>
                        </div>
                        <div>
                            <p class="dir-title">Help Desk Hotlines</p>
                            <p class="dir-body">
                                <strong>IT Support:</strong> +63 969 225 5443<br>
                                <strong>Registrar:</strong> +63 2 8123 4567<br>
                                <span class="dir-note">Mon–Fri, 8:00 AM – 5:00 PM</span>
                            </p>
                        </div>
                    </div>

                    <div class="dir-item">
                        <div class="dir-icon di-amber">
                            <i data-lucide="mail"></i>
                        </div>
                        <div>
                            <p class="dir-title">Email Contacts</p>
                            <p class="dir-body">
                                <a href="mailto:support@schoolportal.edu">support@schoolportal.edu</a><br>
                                <a href="mailto:registrar@schoolportal.edu">registrar@schoolportal.edu</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
    lucide.createIcons();
</script>

<?= $this->endSection(); ?>