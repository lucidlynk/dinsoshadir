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
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Info</h6>
                                </div>
                                <div class="card-body">
                                    <li>Pengajuan PPKS paling lambar bulan Oktober setiap tahunnya</li>
                                    <li>Import Data Excel sesuai format yang ada</li>
                                    <!-- <li>Lampiran berupa file PDF dengan ketentuan (Surat Keterangan Perbekel / Lurah, Pertanggung jawaban Perbekel / Lurah)</li> -->
                                    <li>Untuk mempercepat proses dan memiminalisir kegagalan proses unggah, pastikan file yang diunggah berisi max. 500 row perfilenya</li>
                                    <li>File yang sebelumnya pernah diunggah, jangan diunggah lagi kecuali file tidak valid yang sudah diperbaiki atau diganti datanya</li>
                                    <li>Dengan ini, maka usulan yang tidak memenuhi syarat tersebut akan direject dan Desa / Kelurahan diminta untuk memperbaiki dan mengupload ulang</li>
                                    <li>Download Template Usulan <a href="/asset/TEMPLATE USULAN PPKS V.1.xlsx"><button class="btn btn-warning">Template</button></a></li>

                                </div>
                        </div>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Import Data Pemerlu Pelayanan Kesejahteraan Sosial </h6>
                        </div>
                        <div class="card-body">
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
                            <div class="flash-data" data-flashdata="<?= $flash??""; ?>"></div>
                            <?php 
                            echo form_open_multipart('psks/import');
                            ?>
                            <?= csrf_field(); ?>
                            <!-- //creat combobox with boostra[select 3] -->
                            <div class="form-group row">
                                <label for="psks" class="col-sm-2 col-form-label">Pilih Jenis PSKS</label>
                                <div class="mb-3 col-6">
                                    <select class="form-control" name="psks" id="psks">
                                        <?php foreach($psks as $t): ?>
                                            <option value="<?= $t['id_psks']; ?>"><?= $t['nama_psks']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- creat combobox with boostrap [select year] -->
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                <div class="mb-3 col-3">
                                    <select class="form-control" name="tahun" id="tahun">
                                        <?php $tahun = date('Y'); ?>
                                        <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php for($i = $tahun - 1; $i >= $tahun - 10; $i--): ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="formFile" class="col-sm-2 col-form-label">Import File Excel</label>
                                <div class="mb-3 col-6">
                                <input class="form-control" type="file" name="file_excel" ">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Proses Import</button>
                            </div>
                            <?php 
                            echo form_close();
                            ?>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>