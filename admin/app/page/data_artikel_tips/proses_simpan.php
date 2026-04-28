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


$id_artikel_tips = id_otomatis("data_artikel_tips", "id_artikel_tips", "10");
              $judul=xss($_POST['judul']);
              $artikel=xss($_POST['artikel']);
              $gambar=upload('gambar');


$query = mysql_query("insert into data_artikel_tips values (
'$id_artikel_tips'
 ,'$judul'
 ,'$artikel'
 ,'$gambar'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
