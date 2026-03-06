<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            
            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title mb-0">Edit Student</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('student/update/' . $student['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="<?= old('name', $student['name']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?= old('email', $student['email']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Course</label>
                            <input type="text" name="course" class="form-control" value="<?= old('course', $student['course']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Description / Notes</label>
                            <textarea name="description" class="form-control" rows="3" required><?= old('description', $student['description']) ?></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('students') ?>" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-warning">Update Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>