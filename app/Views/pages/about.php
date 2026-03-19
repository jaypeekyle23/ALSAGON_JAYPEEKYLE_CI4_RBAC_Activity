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
        --slate-100:    #F1F5F9;
        --slate-200:    #E2E8F0;
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
    .page-title { font-size: 1.55rem; font-weight: 700; color: var(--slate-900); margin: 0 0 4px; line-height: 1.2; }
    .page-title span { color: var(--indigo); }
    .page-subtitle { font-size: 13.5px; color: var(--slate-500); margin: 0; }

    /* ── Main Card ───────────────────── */
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
    .content-card-title {
        font-size: 15px; font-weight: 700; color: var(--slate-900); margin: 0;
    }
    .content-card-body { padding: 28px; }

    /* ── Lead Text ───────────────────── */
    .lead-text {
        font-size: 14.5px;
        color: var(--slate-500);
        line-height: 1.75;
        margin-bottom: 28px;
    }

    /* ── Section Divider ─────────────── */
    .section-divider {
        border: none; border-top: 1px solid var(--slate-200);
        margin: 0 0 28px;
    }

    /* ── Two-col layout ──────────────── */
    .about-cols { display: grid; grid-template-columns: 1fr 1px 1fr; gap: 0 32px; }
    @media (max-width: 767px) { .about-cols { grid-template-columns: 1fr; gap: 28px 0; } }
    .col-divider { background: var(--slate-200); }
    @media (max-width: 767px) { .col-divider { display: none; } }

    /* ── Section Heading ─────────────── */
    .section-heading {
        font-size: 13.5px; font-weight: 700; color: var(--slate-900);
        margin-bottom: 10px;
    }
    .section-body {
        font-size: 13.5px; color: var(--slate-500); line-height: 1.7; margin-bottom: 20px;
    }

    /* ── CTA Box ─────────────────────── */
    .cta-box {
        background: var(--indigo-light);
        border: 1px solid rgba(79,70,229,.15);
        border-radius: var(--radius-sm);
        padding: 18px 20px;
    }
    .cta-box-title { font-size: 13px; font-weight: 700; color: var(--indigo); margin-bottom: 4px; }
    .cta-box-body  { font-size: 12.5px; color: var(--slate-500); margin-bottom: 14px; }
    .btn-indigo {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 18px; border-radius: 999px;
        background: var(--indigo); color: #fff;
        font-size: 12.5px; font-weight: 600; text-decoration: none;
        border: none; cursor: pointer;
        transition: opacity .15s;
    }
    .btn-indigo:hover { opacity: .88; color: #fff; }
    .btn-indigo svg { width: 13px; height: 13px; }

    /* ── Pillars ─────────────────────── */
    .pillar {
        display: flex; align-items: flex-start; gap: 14px;
        margin-bottom: 22px;
    }
    .pillar:last-child { margin-bottom: 0; }
    .pillar-icon {
        width: 40px; height: 40px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .pillar-icon svg { width: 18px; height: 18px; stroke-width: 2; }
    .pi-green  { background: var(--green-light);  color: var(--green);  }
    .pi-indigo { background: var(--indigo-light); color: var(--indigo); }
    .pi-amber  { background: var(--amber-light);  color: var(--amber);  }
    .pillar-title { font-size: 13.5px; font-weight: 700; color: var(--slate-900); margin-bottom: 3px; }
    .pillar-body  { font-size: 13px; color: var(--slate-500); line-height: 1.6; margin: 0; }
</style>

<!-- Page Header -->
<div class="mb-4" style="max-width: 820px; margin-left: auto; margin-right: auto;">
    <p class="page-eyebrow">Information</p>
    <h1 class="page-title">About <span>The System</span></h1>
    <p class="page-subtitle">Learn more about the platform powering your academic journey.</p>
</div>

<div style="max-width: 820px; margin: 0 auto;">
    <div class="content-card">
        <div class="content-card-header">
            <h2 class="content-card-title">Empowering Education Through Technology</h2>
        </div>
        <div class="content-card-body">

            <p class="lead-text">
                Our Student Management System is a centralized platform dedicated to streamlining academic workflows. We aim to bridge the gap between complex administrative tasks and an elegant, user-friendly experience for students, teachers, and staff.
            </p>

            <hr class="section-divider">

            <div class="about-cols">

                <!-- Left: Mission + CTA -->
                <div>
                    <h3 class="section-heading">Our Mission</h3>
                    <p class="section-body">
                        To empower educational institutions by providing top-tier, secure, and innovative digital tools. We believe in building sustainable solutions that drive real-world impact, making enrollment, grading, and communication effortless.
                    </p>

                    <div class="cta-box">
                        <p class="cta-box-title">Need Technical Assistance?</p>
                        <p class="cta-box-body">Our IT department is always ready to help you navigate the system.</p>
                        <a href="<?= base_url('contact'); ?>" class="btn-indigo">
                            <i data-lucide="send"></i> Contact Support
                        </a>
                    </div>
                </div>

                <!-- Divider -->
                <div class="col-divider"></div>

                <!-- Right: Pillars -->
                <div>
                    <h3 class="section-heading">Core Pillars</h3>

                    <div class="pillar">
                        <div class="pillar-icon pi-green">
                            <i data-lucide="shield"></i>
                        </div>
                        <div>
                            <p class="pillar-title">Data Security</p>
                            <p class="pillar-body">Operating with strict role-based access to ensure student records remain private and secure.</p>
                        </div>
                    </div>

                    <div class="pillar">
                        <div class="pillar-icon pi-indigo">
                            <i data-lucide="monitor"></i>
                        </div>
                        <div>
                            <p class="pillar-title">Accessibility</p>
                            <p class="pillar-body">A fully responsive platform designed to work seamlessly across desktops, tablets, and mobile devices.</p>
                        </div>
                    </div>

                    <div class="pillar">
                        <div class="pillar-icon pi-amber">
                            <i data-lucide="award"></i>
                        </div>
                        <div>
                            <p class="pillar-title">Academic Excellence</p>
                            <p class="pillar-body">Delivering high-quality, real-time insights to help students track their performance and succeed.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>

<?= $this->endSection(); ?>