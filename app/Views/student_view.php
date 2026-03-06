<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            <h2 class="m-0">Student Management System</h2>
        </div>

        <div class="col-12 mb-3">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

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
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Student</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('student/store') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?= old('name') ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?= old('email') ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="course" class="form-control" placeholder="Course (e.g., BSIT)" value="<?= old('course') ?>" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" placeholder="Description / Notes" rows="3" required><?= old('description') ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Students</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($students)): foreach ($students as $s): ?>
                                <tr>
                                    <td><?= esc($s['name']) ?></td>
                                    <td><?= esc($s['email']) ?></td>
                                    <td><?= esc($s['course']) ?></td>
                                    <td><?= esc($s['description']) ?></td>
                                    <td>
                                        <a href="<?= base_url('student/edit/' . $s['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        
                                        <form action="<?= base_url('student/delete/' . $s['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger btn-hover">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No students found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>