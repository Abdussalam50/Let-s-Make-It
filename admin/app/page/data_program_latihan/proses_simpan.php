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


$id_program_latihan = id_otomatis("data_program_latihan", "id_program_latihan", "10");
              $nama_program=xss($_POST['nama_program']);
              $level_latihan=xss($_POST['level_latihan']);


$query = mysql_query("insert into data_program_latihan values (
'$id_program_latihan'
 ,'$nama_program'
 ,'$level_latihan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
