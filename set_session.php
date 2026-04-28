<?php
session_start();
if(isset($_GET['id_detail_latihan'])){
    if(!isset($_SESSION['set_latihan'])){
     $_SESSION['set_latihan']=[];    
    }
   
    $_SESSION['set_latihan'][]=$_GET['id_detail_latihan'];
    echo json_encode('true');
}