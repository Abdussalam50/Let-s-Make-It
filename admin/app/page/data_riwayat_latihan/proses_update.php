<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_riwayat_latihan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_riwayat_latihan = xss($_POST['id_riwayat_latihan']);
$tanggal = xss($_POST['tanggal']);
$jam = xss($_POST['jam']);
$id_program_latihan = xss($_POST['id_program_latihan']);
$id_tipe_latihan = xss($_POST['id_tipe_latihan']);


$query = mysql_query("update data_riwayat_latihan set 
tanggal='$tanggal',
jam='$jam',
id_program_latihan='$id_program_latihan',
id_tipe_latihan='$id_tipe_latihan'

where id_riwayat_latihan='$id_riwayat_latihan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
