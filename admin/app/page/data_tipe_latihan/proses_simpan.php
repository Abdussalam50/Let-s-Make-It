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


$id_tipe_latihan = id_otomatis("data_tipe_latihan", "id_tipe_latihan", "10");
              $tipe_latihan=xss($_POST['tipe_latihan']);


$query = mysql_query("insert into data_tipe_latihan values (
'$id_tipe_latihan'
 ,'$tipe_latihan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
