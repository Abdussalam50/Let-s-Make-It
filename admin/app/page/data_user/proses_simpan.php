<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_user'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_user = id_otomatis("data_user", "id_user", "10");
              $nama=xss($_POST['nama']);
              $tanggal_lahir=xss($_POST['tanggal_lahir']);
              $berat_badan=xss($_POST['berat_badan']);
              $tinggi_badan=xss($_POST['tinggi_badan']);
              $jenis_kelamin=xss($_POST['jenis_kelamin']);
              $username=xss($_POST['username']);
              $password=md5($_POST['password']);


$query = mysql_query("insert into data_user values (
'$id_user'
 ,'$nama'
 ,'$tanggal_lahir'
 ,'$berat_badan'
 ,'$tinggi_badan'
 ,'$jenis_kelamin'
 ,'$username'
 ,'$password'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo mysql_error();
}
?>
