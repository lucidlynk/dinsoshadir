<?php
include_once('../_header.php');
//use Ramsey\Uuid\Uuid;
//use Ramsey\Uuid\Exception\UnsatisFiedDependencyException;
//$uuid4 = Uuid::uuid4();
//echo $uuid4->toString();
?>
    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Edit Data Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
                
            </div>
        </h4> 
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php 
                $id=@$_GET['id'];
                $sql_pasien= mysqli_query($con,"SELECT * FROM tb_pasien WHERE id_pasien='$id'") or die(mysqli_error($con));
                $data=mysqli_fetch_array($sql_pasien);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas" >Nomor Identitas</label>
                        <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                        <input type="number" name="identitas" id="identitas" value="<?=$data['nomor_identitas']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama" >Nama Pasien</label>
                        <input type="text" name="nama" id="nama" value="<?=$data['nama_pasien']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk" >Jenis Kelamin</label>
                        <div>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required <?=$data['jenis_kelamin']=="L" ? "checked": null ?>>Laki-Laki
                            </label>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" value="P" required <?=$data['jenis_kelamin']=="P" ? "checked": null ?>>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" >Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp" >No. Telephon</label>
                        <input type="text" name="telp" id="telp" value="<?=$data['no_telp']?>" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>  
    <?php include_once('../_footer.php');?>