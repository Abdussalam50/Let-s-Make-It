<?php
include 'admin/include/function/all.php';
include 'admin/include/koneksi/koneksi.php';
$data=json_decode(file_get_contents('php://input'),true);
$id_jenis_latihan=$data['id_jenis_latihan'];
$level=$data['level_latihan'];
$tipe=$data['tipe_latihan'];
$query=mysql_query("SELECT * FROM data_detail_latihan WHERE id_jenis_latihan='$id_jenis_latihan' AND level_latihan='$level' AND id_tipe_latihan='$tipe'");
if(mysql_num_rows($query)>0){
    $elements=[];
    while($packet=mysql_fetch_array($query)){
        $element='<div class="col-3 p-2" style="color:ff5318"><input type="checkbox" class"form-control" name="option[]" value='.$packet['id_detail_latihan'].' style="cursor:pointer;color:#ff5318"> '.$packet['gerakkan'].'</div>';
        $elements[]=$element;
    }
    
}else{
    $elements='<div class="container"><h2 class="text-center">Tidak Ada Data</h2></div>';
}

echo json_encode($elements);