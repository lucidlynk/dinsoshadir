<?php
require_once "../_config/config.php";
?>
        <table id="dokter" class="table table-bordered table-hover">
              <thead>
                    <tr>
                        <th>NOMOR KARTU</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $nik = trim(mysqli_real_escape_string($con, $_POST["user"]));
                    $no=1;                   
                    $sql_kk=mysqli_query($con,"SELECT * FROM pbi WHERE nik='$nik'") or die (mysqli_error($con));
                        while($data=mysqli_fetch_array($sql_kk)){?>
                        <tr>
                            <td><?=$data['noka']?></td>
                            <td><?=$data['nik']?></td>
                            <td><?=$data['nama']?></td>
                               
                        </tr>
                        <?php 
                        }
                        ?>
                </tbody>
        </table>    
