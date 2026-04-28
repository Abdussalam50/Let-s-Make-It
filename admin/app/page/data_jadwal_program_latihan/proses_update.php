<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jadwal_program'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_jadwal_program = xss($_POST['id_jadwal_program']);
$id_program_latihan = xss($_POST['id_program_latihan']);
$hari = xss($_POST['hari']);


$query = mysql_query("update data_jadwal_program_latihan set 
id_program_latihan='$id_program_latihan',
hari='$hari'

where id_jadwal_program='$id_jadwal_program' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
