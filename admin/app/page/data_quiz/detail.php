
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
            $sql = mysql_query("SELECT * FROM data_quiz where id_quiz = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
           <!--h
            <tr>
                <td class="clleft" width="25%">Id Quiz </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_quiz']; ?></td>	
            </tr>
           h-->

            <tr>
                <td class="clleft" width="25%">No Quiz </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['no_quiz']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Quiz </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['quiz']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Pilihan A </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['pilihan_a']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Pilihan B </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['pilihan_b']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Pilihan C </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['pilihan_c']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Pilihan D </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['pilihan_d']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Bobot A </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['bobot_a']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Bobot B </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['bobot_b']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Bobot C </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['bobot_c']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Bobot D </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['bobot_d']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>
