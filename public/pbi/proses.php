<?php
require_once "../_config/config.php";
require "../_asset/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisFiedDependencyException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
//$uuid4 = Uuid::uuid4()->toString();
//echo $uuid4->toString();
if(isset($_POST['add'])){
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($con, $_POST['id']));
    $noka = trim(mysqli_real_escape_string($con, $_POST['noka']));
    $sql_cek_identitas=mysqli_query($con,"SELECT * FROM tb_peralihan WHERE id_usulan = '$identitas'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas)>0){
        echo "<script>alert('Nomor Identitas Sudah Terdaftar!');window.location='add.php';</script>";
    }else{
        mysqli_query($con, "INSERT INTO tb_peralihan (id_peralihan,noka,id_usulan)
                        VALUES ('$uuid','$noka','$identitas')") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
}else if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql_cek_identitas=mysqli_query($con,"SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas' AND id_pasien !='$id'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas)>0){
        echo "<script>alert('Nomor Identitas Sudah Terdaftar!');window.location='add.php';</script>";
    }else{
        mysqli_query($con, "UPDATE tb_pasien SET nomor_identitas='$identitas',nama_pasien='$nama',jenis_kelamin='$jk',alamat='$alamat',no_telp='$telp' WHERE id_pasien='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
}else if(isset($_POST['import'])){
//    $file=$_FILES['file']['name'];
//    $ekstensi=explode(".",$file);
//    $file_name="file-".round(microtime(true)).".".end($ekstensi);
//    $sumber=$_FILES['file']['tmp_name'];
//    $target_dir="../_file/";
//    $target_file=$target_dir.$file_name;
//    move_uploaded_file($sumber,$target_file);
//    $obj = PHPExcel_IOFactory::load($target_file);
//    $all_data= $obj->getActiveSheet()->toArray(null,true,true,true);
//    echo $all_data[3]['A'];
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $uuid = Uuid::uuid4()->toString();
        $nama = $sheetData[$i]['0'];
        $nik = $sheetData[$i]['1'];
        $noka = $sheetData[$i]['2'];
        $ket = $sheetData[$i]['3'];
        $bln = $sheetData[$i]['4'];
        $thn = $sheetData[$i]['5'];
        mysqli_query($con,"INSERT INTO pbi (id_pbi,nama,nik,noka,ket,bulan,tahun) values ('$uuid','$nama','$nik','$noka','$ket','$bln','$thn')");
    }
    echo "<script>window.location='data.php';</script>";
}
  

}
?> 