<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jenis_latihan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_jenis_latihan = xss($_POST['id_jenis_latihan']);
$jenis_latihan = xss($_POST['jenis_latihan']);


$query = mysql_query("update data_jenis_latihan set 
jenis_latihan='$jenis_latihan'

where id_jenis_latihan='$id_jenis_latihan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
