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

$id_user = xss($_POST['id_user']);
$nama = xss($_POST['nama']);
$tanggal_lahir = xss($_POST['tanggal_lahir']);
$berat_badan = xss($_POST['berat_badan']);
$tinggi_badan = xss($_POST['tinggi_badan']);
$username = xss($_POST['username']);
$password =$_POST['password']==null?md5($_POST['password']):'';

if($password!==null||$password!==''){
 $query = "update data_user set 
nama='$nama',
tanggal_lahir='$tanggal_lahir',
berat_badan='$berat_badan',
tinggi_badan='$tinggi_badan',
jenis_kelamin='$jenis_kelamin'
username='$username'

where id_user='$id_user' "; 
}else{
 $query = "update data_user set 
nama='$nama',
tanggal_lahir='$tanggal_lahir',
berat_badan='$berat_badan',
tinggi_badan='$tinggi_badan',
jenis_kelamin='$jenis_kelamin'
username='$username',
password='$password'

where id_user='$id_user' ";   
}
$result=mysql_query($query);

if ($result) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
