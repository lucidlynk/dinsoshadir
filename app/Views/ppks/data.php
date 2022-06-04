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
                                    <strong>Maaf! </strong> <?php echo session()->getFlashdata('error'); ?>
                                </div>
                    <?php } ?>
                    <?php if(session()->getFlashdata('pesan')): ?>
                    <?php $flash= session()->getFlashdata('pesan'); ?>    
                        
                    <?php endif; ?>
                    <div class="flash-data" data-flashdata="<?= $flash??""; ?>"></div>
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">KIS APBD</h1> -->
                    <div class="card-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pemerlu Pelayanan Kesejahteraan Sosial(PPKS)</h6>
                        </div>
                        <div class="card-body">
                            <!-- <form class="row g-3" action="/kis/cek_usul" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                                <div class="col-2">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Masukkan Tanggal">
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="tanggal_awal" placeholder="tanggal awal">
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="tanggal_akhir" placeholder="tanggal akhir">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Cari Data</button>
                                </div>
                            </form> -->
                            <form id="myForm" class="row g-3" action="/ppks/tampil" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                                <div class="col-2">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Pilih Jenis PPKS ">
                                </div>
                                <div class="col-auto">
                                <select class="browser-default custom-select" name="ppks" id="ppks">
                                    <option selected="0">Semua PPKS</option>
                                    <?php foreach ($tampil as $h ) :?>
                                            <option value="<?= $h['id_pmks']; ?>"><?= $h['nama_pmks']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" id="btn-ppks" class="btn btn-primary mb-3">Tampilkan</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Hasil Data Pemerlu Pelayanan Kesejahteraan Sosial (PPKS)</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- <form  action="/kis/deleteall" method="post"> -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>
                                                <center>
                                                    <input type="checkbox" id="select_all" value="">
                                                </center>
                                            </th> -->
                                            <th>Nama PPKS</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat lahir</th>
                                            <th>Tgl Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>User</th>
                                            <th>Tahun</th>
                                            <th></th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($tampildata != ''): ?>
                                        <?php foreach ($tampildata as $d ) :?>
                                        <tr>
                                            <!-- <td>
                                                <center>
                                                <input type="checkbox" name="checked[]" class="check" value="<?= $d->id_ppks;?>">
                                                </center>
                                            </td> -->
                                            <td><?= $d->nama_pmks; ?></td>
                                            <td><?= $d->nik; ?></td>
                                            <td><?= $d->nama; ?></td>
                                            <td><?= $d->tmp_lahir; ?></td>
                                            <td><?= $d->tgl_lahir; ?></td>
                                            <td><?= $d->jk; ?></td>
                                            <td><?= $d->alamat; ?></td>
                                            <td><?= $d->kecamatan; ?></td>
                                            <td><?= $d->desa; ?></td>
                                            <td><?= $d->username; ?></td>
                                            <td><?= $d->tahun; ?><td>  
                                            <td>
                                               <button class="btn btn-warning" href="#" data-toggle="modal" data-target="#modal_form" 
                                               id="btn-ppks" data-id="<?= $d->id_ppks; ?>" 
                                               data-nik="<?= $d->nik; ?>"
                                               data-nama="<?= $d->nama; ?>"
                                               data-tmp_lahir="<?= $d->tmp_lahir; ?>"
                                               data-tgl_lahir="<?= $d->tgl_lahir; ?>"
                                               data-jk="<?= $d->jk; ?>"
                                               data-alamat="<?= $d->alamat; ?>"
                                               data-kecamatan="<?= $d->kecamatan; ?>"
                                               data-desa="<?= $d->desa; ?>"
                                               data-pmks="<?= $d->nama_pmks; ?>"
                                               ><i class="fa fa-edit"></i></button>
                                               <a href="/ppks/delete/<?= $d->id_ppks;?>" class="tombol-hapus"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <!-- </form> -->
                                    <a href="/ppks"><button class="btn btn-warning">Kembali</button></a>
                            </div>
                            <!-- Modal Edit Product-->
                            <form action="/ppks/update" method="post">
                            <?= csrf_field(); ?>
                                <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Usulan KIS</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <div class="form-group">
                                            <input type="hidden" class="form-control product_name" name="id" id="id">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama PPKS</label>
                                            <input type="text" class="form-control product_price" name="pmks" id="pmks" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control product_price" name="nik" id="nik">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control product_price" name="nama" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control product_price" name="tmp_lahir" id="tmp_lahir">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="text" class="form-control product_price" name="tgl_lahir" id="tgl_lahir">
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="product_id" class="product_id">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                            <!-- End Modal Edit Product-->

                            <!-- Modal Edit Prioritas-->
                            <?php 
                            echo form_open_multipart('kis/vip');
                            ?>
                            <?= csrf_field(); ?>
                                <div class="modal fade" id="modal_vip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> Pengajuan Prioritas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                            <input type="hidden" class="form-control product_name" name="id" id="id">
                                    </div>
                                    <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control product_price" name="nik" id="nik" disabled readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>nomor kk</label>
                                        <input type="text" class="form-control product_price" name="kk" id="kk" disabled readonly>
                                    </div>
                                    <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control product_price" name="nama" id="nama" disabled readonly>
                                    </div>
                                    <label>Jenis</label>
                                    <select class="browser-default custom-select" name="jenis" id="jenis">
                                    <option selected="">Open this select menu</option>
                                        <option value="sakit">Sakit atau Disabilitas</option>
                                        <option value="catatan">Catatan</option>
                                    </select>
                                    <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control product_price" name="ket" id="ket">
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="formFile" class="form-label">Lampiran Berkas</label>
                                        <input class="form-control" type="file" name="file" ">
                                    </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="product_id" class="product_id">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            <?php 
                            echo form_close();
                            ?>
                            <!-- End Modal Edit Product-->
                            
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?= $this->endSection(); ?>