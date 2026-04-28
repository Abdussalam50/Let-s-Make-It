<?php
include 'admin/include/koneksi/koneksi.php';
$request=json_decode(file_get_contents("php://input"),true);
$data=$request['request'];
$query=mysql_query("SELECT * FROM data_detail_latihan WHERE id_detail_latihan='$data'");
$data_waktu=mysql_fetch_array($query);
$waktu=$data_waktu['durasi'];
$waktu1=str_replace(" ","",$waktu);
if(strpos($waktu1,"menit")!==false){
    $num_time=str_replace("menit","",$waktu1);
    $detik=60*$num_time;
    echo json_encode($detik);
}else{
    $num_time=str_replace("detik","",$waktu1);
    echo json_encode($num_time);
}