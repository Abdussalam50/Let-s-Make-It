<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_program_latihan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_program_latihan = xss($_POST['id_program_latihan']);
$nama_program = xss($_POST['nama_program']);
$level_latihan = xss($_POST['level_latihan']);


$query = mysql_query("update data_program_latihan set 
nama_program='$nama_program',
level_latihan='$level_latihan'

where id_program_latihan='$id_program_latihan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
