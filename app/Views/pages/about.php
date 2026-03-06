<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>About Us</strong></h1>

    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white pt-4 pb-0 border-0">
                    <h5 class="card-title mb-0" style="font-size: 1.25rem;">Discover Our Story</h5>
                </div>
                
                <div class="card-body">
                    <p class="lead text-muted mb-4">
                        We are a passionate team dedicated to delivering outstanding digital solutions. Our goal is to bridge the gap between complex problems and elegant, user-friendly experiences.
                    </p>
                    
                    <hr>
                    
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="mb-3">Our Mission</h4>
                            <p>
                                To empower businesses and individuals by providing top-tier, innovative services. We believe in building sustainable, scalable solutions that drive real-world impact and foster long-term growth for our clients.
                            </p>
                            <a href="<?= base_url('contact'); ?>" class="btn btn-primary mt-2">Get in Touch</a>
                        </div>
                        
                        <div class="col-md-6">
                            <h4 class="mb-3">Our Core Values</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 bg-transparent border-0 pb-2">
                                    💡 <strong>Innovation:</strong> Constantly pushing boundaries to find better ways of doing things.
                                </li>
                                <li class="list-group-item px-0 bg-transparent border-0 pb-2">
                                    🤝 <strong>Integrity:</strong> Operating with transparency, honesty, and respect in everything we do.
                                </li>
                                <li class="list-group-item px-0 bg-transparent border-0">
                                    ⭐ <strong>Excellence:</strong> Delivering the highest quality results without compromise.
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>

</div>

<?= $this->endSection(); ?>