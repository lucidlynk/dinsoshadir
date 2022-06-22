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
                    <!-- <h1 class="h3 mb-4 text-gray-800">KIS APBD</h1> -->
                    <div class="card-body">
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kepsertaan <?= $tittle; ?></h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" action="/peserta/<?= $func; ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-2">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Masukkan NIK">
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="nama" placeholder="NIK">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Cari Data</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>