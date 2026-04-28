<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_hasil_quiz'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_hasil_quiz = id_otomatis("data_hasil_quiz", "id_hasil_quiz", "10");
              $id_user=xss($_POST['id_user']);
              $nilai=xss($_POST['nilai']);
              $level_latihan=xss($_POST['level_latihan']);


$query = mysql_query("insert into data_hasil_quiz values (
'$id_hasil_quiz'
 ,'$id_user'
 ,'$nilai'
 ,'$level_latihan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
