<?php

use PhpOffice\PhpSpreadsheet\Shared\Date;

 if(empty($p)) { header("Location: index.php?p=home"); die(); } ?>
<div
    id="about-us"
    class="container-fluid fh5co-about-us pl-0 pr-0 parallax-window">
    <div class="table-responsive">
        <table class="table">
            <?php 
                $id_user=decrypt($_COOKIE['kodene']);
                $query_profil=mysql_query("SELECT * FROM data_user WHERE id_user='$id_user'");
                $data=mysql_fetch_array($query_profil);
            ?>
            <tr>

                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $data['nama']?></td>
            </tr>
            <tr>

                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo format_indo($data['tanggal_lahir'])?></td>
            </tr>
            <tr>

                    <td>Usia</td>
                    <td>:</td>
                    <td><?php 
                    $today=new DateTime();
                    $tgl_lahir=new DateTime($data['tanggal_lahir']);
                    $usia =$today->diff($tgl_lahir)->y;
                    echo $usia?> Tahun</td>
            </tr>
            <tr>

                    <td>Berat Badan</td>
                    <td>:</td>
                    <td><?php echo $data['berat_badan']?> Kg</td>
            </tr>
            <tr>

                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td><?php echo $data['tinggi_badan']?> cm</td>
            </tr>
            <tr>

                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $data['jenis_kelamin']?> </td>
            </tr>

        </table>
    </div>
</div>