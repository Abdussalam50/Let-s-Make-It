<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_detail_latihan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_detail_latihan = xss($_POST['id_detail_latihan']);
$id_jenis_latihan = xss($_POST['id_jenis_latihan']);
$id_tipe_latihan = xss($_POST['id_tipe_latihan']);
$gerakkan = xss($_POST['gerakkan']);
$set = xss($_POST['set']);
$repetisi = xss($_POST['repetisi']);
$durasi = xss($_POST['durasi']);
$link_video = xss($_POST['link_video']);
$level_latihan = xss($_POST['level_latihan']);
// $link_video=($_FILES['link_video']['name']); if (empty($link_video)){$link_video = $_POST['link_video1'];} else { $link_video = upload('link_video');};
$link_video=str_replace('560','360',$link_video);
$link_video=str_replace('315','200',$link_video);

$query = mysql_query("update data_detail_latihan set 
id_jenis_latihan='$id_jenis_latihan',
id_tipe_latihan='$id_tipe_latihan',
gerakkan='$gerakkan',
`set`='$set',
repetisi='$repetisi',
durasi='$durasi',
link_video='$link_video',
level_latihan='$level_latihan'

where id_detail_latihan='$id_detail_latihan'") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
