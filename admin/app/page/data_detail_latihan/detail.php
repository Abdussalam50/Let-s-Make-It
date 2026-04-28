
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-content">
        <table <?php tabel_in(100, '%', 0, 'center'); ?>>		
            <tbody>
               
                <?php
                if (!isset($_GET['proses'])) {
                        
                    ?>
                <script>
                    alert("AKSES DITOLAK");
                    location.href = "index.php";
                </script>
                <?php
                die();
            }
            $proses = decrypt(mysql_real_escape_string($_GET['proses']));
            $sql = mysql_query("SELECT * FROM data_detail_latihan where id_detail_latihan = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
           <!--h
            <tr>
                <td class="clleft" width="25%">Id Detail Latihan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_detail_latihan']; ?></td>	
            </tr>
           h-->

            <tr>
                <td class="clleft" width="25%">Jenis Latihan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo baca_database("","jenis_latihan","select * from data_jenis_latihan where id_jenis_latihan='$data[id_jenis_latihan]'")  ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Tipe Latihan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo baca_database("","tipe_latihan","select * from data_tipe_latihan where id_tipe_latihan='$data[id_tipe_latihan]'")  ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Gerakkan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['gerakkan']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Set </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['set']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Repetisi </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['repetisi']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Durasi </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['durasi']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Link Video </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft">
                  <!-- <a href="../../../../admin/upload/<?php echo $data['link_video']; ?>"><img onerror="this.src='../../../data/image/error/file.png'" width="100"  src="../../../../admin/upload/<?php echo $data['link_video']; ?>"></a>
                    <br> -->
                  <?php echo $data['link_video']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Level Latihan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['level_latihan']; ?></td>
            </tr>



            </tbody>
        </table>
    </div>
</div>
