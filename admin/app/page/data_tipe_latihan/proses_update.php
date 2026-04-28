<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_tipe_latihan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_tipe_latihan = xss($_POST['id_tipe_latihan']);
$tipe_latihan = xss($_POST['tipe_latihan']);


$query = mysql_query("update data_tipe_latihan set 
tipe_latihan='$tipe_latihan'

where id_tipe_latihan='$id_tipe_latihan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
