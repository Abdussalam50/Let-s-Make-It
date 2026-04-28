<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_detail_program'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_detail_program = xss($_POST['id_detail_program']);
$id_user = xss($_POST['id_user']);
$id_program_latihan = xss($_POST['id_program_latihan']);
$id_detail_latihan = xss($_POST['id_detail_latihan']);


$query = mysql_query("update data_detail_program set 
id_user='$id_user',
id_program_latihan='$id_program_latihan',
id_detail_latihan='$id_detail_latihan'

where id_detail_program='$id_detail_program' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
