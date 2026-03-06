<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>User</strong> Profile</h1>

    <div class="row">
        
        <div class="col-md-4 col-xl-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white pt-4 pb-0 border-0">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                
                <div class="card-body text-center">
                    <img src="<?= base_url('assets/img/avatars/avatar.jpg'); ?>" alt="User Avatar" class="img-fluid rounded-circle mb-2" width="128" height="128" onerror="this.src='https://ui-avatars.com/api/?name=Admin+User&background=random&size=128'" />
                    
                    <h5 class="card-title mb-0 mt-2">Jaypee Alsagon</h5>
                    <div class="text-muted mb-2">System Administrator</div>
                    
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm">Follow</button>
                        <button class="btn btn-outline-primary btn-sm">
                            <i data-feather="message-square" style="width: 16px; height: 16px;"></i> Message
                        </button>
                    </div>
                </div>
                
                <hr class="my-0" />
                
                <div class="card-body">
                    <h5 class="h6 card-title">About</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i data-feather="home" class="text-primary me-2" style="width: 16px; height: 16px;"></i> 
                            Lives in <a href="#">Manila, PH</a>
                        </li>
                        <li class="mb-2">
                            <i data-feather="briefcase" class="text-primary me-2" style="width: 16px; height: 16px;"></i> 
                            Works at <a href="#">Awesome Company</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white pt-4 pb-0 border-0">
                    <h5 class="card-title mb-0">Account Settings</h5>
                </div>
                
                <div class="card-body">
                    <form action="#" method="post">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="inputFirstName">First Name</label>
                                <input type="text" class="form-control" id="inputFirstName" placeholder="First name" value="Admin">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="inputLastName">Last Name</label>
                                <input type="text" class="form-control" id="inputLastName" placeholder="Last name" value="User">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="inputEmail">Email Address</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" value="admin@example.com">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="inputAddress">Home Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St, City, Country">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="inputPhone">Phone Number</label>
                                <input type="text" class="form-control" id="inputPhone" placeholder="+1 (555) 000-0000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="inputRole">Role / Permissions</label>
                                <input type="text" class="form-control bg-light" id="inputRole" value="System Administrator" disabled>
                            </div>
                        </div>
                        
                        <hr class="mt-4 mb-4">
                        
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
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