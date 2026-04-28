<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_quiz'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_quiz = id_otomatis("data_quiz", "id_quiz", "10");
              $no_quiz=xss($_POST['no_quiz']);
              $quiz=xss($_POST['quiz']);
              $pilihan_a=xss($_POST['pilihan_a']);
              $pilihan_b=xss($_POST['pilihan_b']);
              $pilihan_c=xss($_POST['pilihan_c']);
              $pilihan_d=xss($_POST['pilihan_d']);
              $bobot_a=xss($_POST['bobot_a']);
              $bobot_b=xss($_POST['bobot_b']);
              $bobot_c=xss($_POST['bobot_c']);
              $bobot_d=xss($_POST['bobot_d']);


$query = mysql_query("insert into data_quiz values (
'$id_quiz'
 ,'$no_quiz'
 ,'$quiz'
 ,'$pilihan_a'
 ,'$pilihan_b'
 ,'$pilihan_c'
 ,'$pilihan_d'
 ,'$bobot_a'
 ,'$bobot_b'
 ,'$bobot_c'
 ,'$bobot_d'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
