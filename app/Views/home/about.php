<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('dashboard/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php if (!empty(session()->getFlashdata('error'))) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-1 px=0" role="alert">
                            <strong>Maaf!</strong> <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php } ?>
                    <!-- <?php if (!empty(session()->getFlashdata('sukses'))) {  ?>
                    <div class="alert alert-success alert-dismissible fade show mt-1 px=0" role="alert">
                        <strong>PESAN</strong><br> <?php echo session()->getFlashdata('sukses'); ?>
                    </div>
                    <?php } ?> -->
                    <?php if(session()->getFlashdata('pesan')): ?>
                        <?php $flash= session()->getFlashdata('pesan'); ?>    
                
                    <?php endif; ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Headline</h1>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Sub Judul</th>
                                    <th>Judul</th>
                                    <th>Narasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                <tr>
                                    <td><img src="/img/<?= $about->image; ?>" alt="" width="50"></td>
                                    <td><?= $about->sub_judul;?></td>
                                    <td><?= $about->judul; ?></td>
                                    <td><?= $about->narasi; ?></td>
                                    <td>
                                        <a href="/Menu/detail/<?= $about->id; ?>" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>