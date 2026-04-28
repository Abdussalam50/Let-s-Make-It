<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_detail_program'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_detail_program = id_otomatis("data_detail_program", "id_detail_program", "10");
              $id_program_latihan=xss($_POST['id_program_latihan']);
              $id_user=xss($_POST['id_user']);
              $id_detail_latihan=xss($_POST['id_detail_latihan']);


$query = mysql_query("insert into data_detail_program values (
'$id_detail_program'
 ,'$id_program_latihan'
 ,'$id_user'
 ,'$id_detail_latihan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
