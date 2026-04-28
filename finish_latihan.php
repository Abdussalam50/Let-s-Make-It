<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include "admin/include/koneksi/koneksi.php";
include "admin/include/function/all.php";
$decode=json_decode(file_get_contents("php://input"),true);
$id_program=$decode['idProgram'];
$id_tipe=$decode['idTipe'];
$id_user=$decode['idUser'];
$id=id_otomatis("data_riwayat_latihan","id_riwayat_latihan",10);
$tanggal=date('Y-m-d');
$jam=date("H:i:s");

$query=mysql_query("INSERT INTO data_riwayat_latihan VALUES('$id','$id_user','$tanggal','$jam','$id_program','$id_tipe')");
if($query){
    session_unset();
    echo json_encode('true');
}else{
    echo json_encode(mysql_error());
}