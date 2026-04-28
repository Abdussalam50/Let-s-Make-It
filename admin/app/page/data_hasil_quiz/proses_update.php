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

$id_hasil_quiz = xss($_POST['id_hasil_quiz']);
$id_user = xss($_POST['id_user']);
$nilai = xss($_POST['nilai']);
$level_latihan = xss($_POST['level_latihan']);


$query = mysql_query("update data_hasil_quiz set 
id_user='$id_user',
nilai='$nilai',
level_latihan='$level_latihan'

where id_hasil_quiz='$id_hasil_quiz' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
