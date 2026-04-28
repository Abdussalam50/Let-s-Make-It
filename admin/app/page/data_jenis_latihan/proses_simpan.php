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


$id_jenis_latihan = id_otomatis("data_jenis_latihan", "id_jenis_latihan", "10");
              $jenis_latihan=xss($_POST['jenis_latihan']);


$query = mysql_query("insert into data_jenis_latihan values (
'$id_jenis_latihan'
 ,'$jenis_latihan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
