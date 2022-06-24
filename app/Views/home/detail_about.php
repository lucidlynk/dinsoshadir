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
                    <h1 class="h3 mb-4 text-gray-800">Edit Headline</h1>
                    <form action="/menu/update/<?= $about->id; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="filelama" value="<?= $about->image; ?>">
                            <input type="hidden" name="id" value="<?= $about->id; ?>">
                            <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Sub Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subjudul" name="subjudul" autofocus value="<?= (old('subjudul'))? old('subjudul'): $about->sub_judul ?>">
                                <div class="invalid-feedback">
                            </div>
                            </div>
                            </div>
                            <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= (old('judul'))? old('judul'): $about->judul; ?>">
                            </div>
                            </div>
                            <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Narasi</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="narasi" name="narasi" cols="30" rows="10" >
                                <?= (old('narasi'))? old('narasi'): $about->narasi; ?>
                                </textarea>
                                <script>CKEDITOR.replace( 'narasi' );</script>
                            </div>
                            </div>
                            <div class="row mb-3">
                            <label for="File" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= ($about->image)? $about->image:'default.png' ; ?>" class="img-thumbnail img-preview">
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