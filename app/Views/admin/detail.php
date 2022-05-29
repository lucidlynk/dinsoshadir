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
                    <h1 class="h3 mb-4 text-gray-800">User Detail</h1>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="/img/<?= $user->user_image; ?>" class="img-fluid rounded-start img-thumbnail img-preview m-3" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <?= $user->username; ?>
                                </li>
                                <?php if($user->fullname): ?>
                                <li class="list-group-item">
                                    <?= $user->fullname; ?>
                                </li>
                                <?php endif ?>
                                <li class="list-group-item"><?= $user->email; ?></li>
                                <li class="list-group-item">
                                    <span class="badge badge-<?= ($user->name== 'admin')? 'success' : 'warning'; ?>"><?= $user->name; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <a href="/adm/edit/<?= $user->userid; ?>"><button type="button" class="btn btn-primary">Edit</button></a> | <a href="/adm/delete/<?= $user->userid; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/adm">&laquo; back to user list</a>
                                </li>
                            </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>