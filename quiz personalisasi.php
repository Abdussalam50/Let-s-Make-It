<?php
if(isset($_GET['notif'])){
    ?>
    <script>
        alert('<?php echo $_GET['notif']?>')
    </script>
<?php
}
?>
<div class="container">
    <?php $id_user=decrypt($_COOKIE['kodene'])?>
    <h4 class="fw-bold p-3" style="font-weight:700;">Selamat Datang <?php echo baca_database("","nama","select * from data_user where id_user='$id_user'")?> Isilah quiz personalisasi dibawah ini dengan jujur demi mendapatkan program latihan terbaik.</h4>
    <form action="submit_soal.php" method="post">
        <input type="hidden" name="id_user" value="<?php echo decrypt($_COOKIE['kodene'])?>">
    <?php
        $query=mysql_query("SELECT * FROM data_quiz");
        if(mysql_num_rows($query)>0){
            $no=1;
            while($data=mysql_fetch_array($query)){
                $quiz=$data['quiz'];
                $no_quiz=$data['no_quiz'];
                $pilihan_a=$data['pilihan_a'];
                $pilihan_b=$data['pilihan_b'];
                $pilihan_c=$data['pilihan_c'];
                $pilihan_d=$data['pilihan_d'];
                $bobot_a=$data['bobot_a'];
                $bobot_b=$data['bobot_b'];
                $bobot_c=$data['bobot_c'];
                $bobot_d=$data['bobot_d'];
               ?>
                <div class='container'>
                    <table class='table'>
                        <tr>
                            <td><?php echo $no++ ?>.</td>
                            <td>
                                <p>
                                    <?php echo $quiz?>
                                </p>
                                <br>
                                <div class='container'>
                                    <ul class="row">
                                        <li class='col-3'><input type="radio" name="quiz_<?php echo $no_quiz?>[]" id="pilihan_a" value="<?php echo $bobot_a?>"><?php echo $pilihan_a?></li>
                                        <li class='col-3'><input type="radio" name="quiz_<?php echo $no_quiz?>[]" id="pilihan_b" value="<?php echo $bobot_b?>"><?php echo $pilihan_b?></li>
                                        <li class='col-3'><input type="radio" name="quiz_<?php echo $no_quiz?>[]" id="pilihan_c" value="<?php echo $bobot_c?>"><?php echo $pilihan_c?></li>
                                        <li class='col-3'><input type="radio" name="quiz_<?php echo $no_quiz?>[]" id="pilihan_d" value="<?php echo $bobot_d?>"><?php echo $pilihan_d?></li>
                                    </ul>
                            </div>
                        </td>
                        </tr>
                    </table>
                </div>
            <?php
            }
        }
    ?>
    <div class='p-3'><button class="single_page_btn" type="submit" name="submit_soal" style='width:100%'>Submit Respon Anda</button></div>
    </form>
</div>