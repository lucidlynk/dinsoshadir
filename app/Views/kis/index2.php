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
                    <h1 class="h3 mb-4 text-gray-800">KIS APBD</h1>
                    <form action="/kis/search" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Cari Data</button>
                            </div>
                            
                            
                        </form>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>