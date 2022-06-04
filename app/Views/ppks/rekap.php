<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                                <?= $this->include('dashboard/topbar'); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Hasil Data Kepsertaan KIS APBD</h6>
                    </div>

                    <div class="card-body">
                    <div class="table-responsive">
                        <!-- <form  action="/kis/deleteall" method="post"> -->
                        <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Jenis PPKS</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tampildata as $d ) :?>
                                <tr>
                                    <td><?= $d['nama_pmks']; ?></td>
                                    <td><?= $d['jumlah']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- </form> -->
                            
                    </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>