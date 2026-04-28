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


$id_riwayat_latihan = id_otomatis("data_riwayat_latihan", "id_riwayat_latihan", "10");
              $tanggal=xss($_POST['tanggal']);
              $jam=xss($_POST['jam']);
              $id_program_latihan=xss($_POST['id_program_latihan']);
              $id_tipe_latihan=xss($_POST['id_tipe_latihan']);


$query = mysql_query("insert into data_riwayat_latihan values (
'$id_riwayat_latihan'
 ,'$tanggal'
 ,'$jam'
 ,'$id_program_latihan'
 ,'$id_tipe_latihan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
