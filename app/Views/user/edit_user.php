<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('dashboard/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Profile User</h1>
                    <form action="/user/update/<?= $user->userid; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="filelama" value="<?= $user->user_image; ?>">
                            <input type="hidden" name="id" value="<?= $user->userid; ?>">
                            <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ?
                                'is-invalid': ''; ?>" id="username" name="username" autofocus value="<?= (old('username'))? old('username'): $user->username ?>">
                                <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                            </div>
                            </div>
                            <div class="row mb-3">
                            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= (old('fullname'))? old('fullname'): $user->fullname; ?>">
                            </div>
                            </div>
                            <div class="row mb-3">
                            <label for="File" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= ($user->user_image)? $user->user_image:'default.png' ; ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('file')) ?
                                'is-invalid': ''; ?>" type="file" id="file" name="file" onchange="previewImg()">
                                <div class="invalid-feedback">
                                <?= $validation->getError('file'); ?>
                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                        </form>
                </div>          
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>