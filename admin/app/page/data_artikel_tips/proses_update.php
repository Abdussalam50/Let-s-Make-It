<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_artikel_tips'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_artikel_tips = xss($_POST['id_artikel_tips']);
$judul = xss($_POST['judul']);
$artikel = xss($_POST['artikel']);


$query = mysql_query("update data_artikel_tips set 
judul='$judul',
artikel='$artikel'

where id_artikel_tips='$id_artikel_tips' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
