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


$id_detail_program = id_otomatis("data_jadwal_program_latihan", "id_jadwal_program", 10);
              $id_program_latihan=xss($_POST['id_program_latihan']);
              $hari=xss($_POST['hari']);



$query = mysql_query("insert into data_jadwal_program_latihan values (
'$id_detail_program'
 ,'$id_program_latihan'
 ,'$hari'


)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
