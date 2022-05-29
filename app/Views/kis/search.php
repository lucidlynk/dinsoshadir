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
                            <h6 class="m-0 font-weight-bold text-primary">Data Kepsertaan KIS APBD</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Kartu</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= ($apbd)?$apbd->noka:'Data Tidak Ditemukan'; ?></td>
                                            <td><?= ($apbd)?$apbd->nik:'-'; ?></td>
                                            <td><?= ($apbd)?$apbd->nama:'-'; ?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <a href="/kis/index"><button class="btn btn-warning">Kembali</button></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>