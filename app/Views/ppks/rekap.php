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
                    <h6 class="m-0 font-weight-bold text-primary"> Data Pemerlu Pelayanan Kesejahteraan Sosial (PPKS)</h6>
                    </div>

                    <div class="card-body">
                    <!-- create button with boostrap float right -->
                    <a href="/ppks/export_excel" class="float-right">

                        <button class="btn btn-success mb-3"><i class="fas fa-download"></i> Download Data PPKS</button></a>
                    <div class="table-responsive">
                        <!-- <form  action="/kis/deleteall" method="post"> -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Jenis PPKS</th>
                                    <th>Jumlah</th>
                                    <th>Pria</th>
                                    <th>Wanita</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tampildata as $d ) :?>
                                <tr>
                                    <td><?= $d['nama_pmks']; ?></td>
                                    <td><?= $d['jumlah']; ?></td>
                                    <td><?= $d['Pria']; ?></td>
                                    <td><?= $d['Wanita']; ?></td>
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