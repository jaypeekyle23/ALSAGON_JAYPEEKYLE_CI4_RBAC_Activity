<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Contact Us</strong></h1>

    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white pt-4 pb-0 border-0">
                    <h5 class="card-title mb-0" style="font-size: 1.25rem;">We'd Love to Hear From You</h5>
                </div>
                
                <div class="card-body">
                    <p class="lead text-muted mb-4">
                        Have a question, feedback, or want to work together? Fill out the form below or reach out to us directly using our contact details.
                    </p>
                    
                    <hr>
                    
                    <div class="row mt-4">
                        
                        <div class="col-md-7 mb-4 mb-md-0 border-end pe-md-4">
                            <h4 class="mb-3">Send a Message</h4>
                            
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="John Doe">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="How can we help you?">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="4" placeholder="Write your message here..."></textarea>
                                </div>
                                <button type="button" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                        
                        <div class="col-md-5 ps-md-4">
                            <h4 class="mb-3">Contact Details</h4>
                            
                            <div class="d-flex mb-3 mt-3">
                                <div class="me-3">
                                    <i class="align-middle text-primary" data-feather="map-pin" style="width: 24px; height: 24px;"></i>
                                </div>
                                <div>
                                    <strong>Headquarters</strong><br>
                                    Manila, Philippines<br>
                                    Manila, Philippines
                                </div>
                            </div>
                            
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <i class="align-middle text-primary" data-feather="phone" style="width: 24px; height: 24px;"></i>
                                </div>
                                <div>
                                    <strong>Phone</strong><br>
                                    +639692255443<br>
                                    <small class="text-muted">Mon-Fri, 9am - 5pm</small>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-4">
                                <div class="me-3">
                                    <i class="align-middle text-primary" data-feather="mail" style="width: 24px; height: 24px;"></i>
                                </div>
                                <div>
                                    <strong>Email</strong><br>
                                    support@ourcompany.com<br>
                                    sales@ourcompany.com
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

<?= $this->endSection(); ?>