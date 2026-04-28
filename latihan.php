<?php
if(isset($_SESSION['set_latihan'])){
 $trainings=$_SESSION['set_latihan'];   
 print_r($trainings);
}

if(!isset($_COOKIE['kodene'])){
    ?>
    <script>
        window.location.href='index.php';
    </script>
<?php
}
$user=decrypt($_COOKIE['kodene']);

?>
<div class="container">
    <h2 class='text-start py-4'> Latihan Anda Hari Ini</h2>
    <div class="row g-4 shadow rounded d-flex p-4">
<?php
$level_latihan = baca_database("", "level_latihan", "SELECT * FROM data_hasil_quiz WHERE id_user='$user'");

$id_detail_latihan = [];
$proses_latihan = false;

if (isset($_GET['option']) && is_array($_GET['option'])) {
    // Escape tiap item agar diapit tanda kutip karena isinya varchar
    $escaped = array();
    foreach ($_GET['option'] as $opt) {
        $escaped[] = "'" . mysql_real_escape_string($opt) . "'";
    }

    $gerak = implode(",", $escaped); // hasil: 'ID1','ID2','ID3'
   
    //reform ke bentuk awalurl parameter
    $detail_latihan=$_GET['option'];
    $reform="";
    foreach($detail_latihan as $detail){
        $reform.=urlencode("option[]")."=".urlencode($detail)."&";
    }
    $reform=$reform;

    $query_latihan = "SELECT * FROM data_detail_latihan WHERE id_detail_latihan IN ($gerak)";
    $proses_latihan = mysql_query($query_latihan);
}

if ($proses_latihan && mysql_num_rows($proses_latihan) > 0) {
    $no = 1;
    $counter = -1;

    while ($data = mysql_fetch_array($proses_latihan)) {
        $id_detail_latihan[] = $data['id_detail_latihan'];
        $counter++;

        $link = str_replace("360", "210", $data['link_video']);
        $link = str_replace("200", "150", $link);
?>
        <div class="card mx-2 mt-2" style="border-radius:10px;background-color:#fbe8dd">
            <div class="card-body">
                <div><?php echo html_entity_decode($link); ?></div>

                <div class="col p-2">
                    <p class="text-start" style="color:#fcb46b">Tipe Latihan: 
                        <?php echo baca_database("", "tipe_latihan", "SELECT * FROM data_tipe_latihan WHERE id_tipe_latihan='{$data['id_tipe_latihan']}'"); ?>
                    </p>
                    <p class="text-start" style="color:#fcb46b">Gerakkan: <?php echo $data['gerakkan']; ?></p>
                    <p class="text-start" style="color:#fcb46b">Jumlah Set: <?php echo $data['set']; ?></p>
                    <p class="text-start" style="color:#fcb46b">Jumlah Repetisi: <?php echo $data['repetisi']; ?></p>
                    <p class="text-start" style="color:#fcb46b">Durasi: <?php echo $data['durasi']; ?></p>
                </div>

                
                    <?php
                    $latihan_selesai = isset($trainings) && isset($trainings[$counter]) && $trainings[$counter] == $data['id_detail_latihan'];

                    if ($latihan_selesai) {
                        echo '<button class="btn rounded-pill" style="color:#fcb46b" type="button">Sudah Selesai</button>';
                    } else {
                        $id_detail = $data['id_detail_latihan'];
                        $tipe = isset($_GET['tipe']) ? htmlspecialchars($_GET['tipe']) : '';
                        $url="index.php?p=video latihan&id_detail=$id_detail&tipe=$tipe&$reform";
                        $safe_url = htmlspecialchars($url, ENT_QUOTES);
                        echo "<center><button class='btn rounded-pill text-white' type='button' onclick=\"window.location.href='$safe_url'\" style='background-color:#fcb46b'>Mulai Latihan</button></center>";
                    }
                    ?>
                
            </div>
        </div>
<?php
    }

    // Tombol 'Selesaikan Latihan Hari Ini'
    if (isset($_SESSION['set_latihan']) && count($_SESSION['set_latihan']) == count($id_detail_latihan)) {
        $id_program_latihan = baca_database("", "id_program_latihan", "SELECT * FROM data_detail_latihan JOIN data_detail_program ON data_detail_latihan.id_jenis_latihan = data_detail_program.id_detail_latihan WHERE id_user='$user'");
        $program_latihan = baca_database("", "nama_program", "SELECT * FROM data_program_latihan WHERE id_program_latihan='$id_program_latihan'");
        $tipe_latihan = baca_database("", "id_tipe_latihan", "SELECT * FROM data_detail_latihan JOIN data_detail_program ON data_detail_latihan.id_jenis_latihan = data_detail_program.id_detail_latihan WHERE id_user='$user'");
?>
        <div class="container p-4 d-flex justify-content-center">
            <button class="single_page_btn justify-content-center" onclick='selesaikan("<?php echo $id_program_latihan ?>","<?php echo $tipe_latihan ?>","<?php echo $user ?>")'>
                Selesaikan Latihan Hari Ini
            </button>
        </div>
<?php
    }
} else {
?>
    <div class="container">
        <h1 class="text-center">T_T Tidak Ada Data</h1>
    </div>
<?php
}
?>


</div>
<script>
    function selesaikan(id_program,id_tipe_latihan,id_user){
        fetch('finish_latihan.php',{
            method:'POST',
            body:JSON.stringify({
                idProgram:id_program,
                idTipe:id_tipe_latihan,
                idUser:id_user
            })
        })
        .then(response=>response.json())
        .then(data=>{
            if(data=='true'){
                window.location.href='index.php?p=dashboard user'
            }else{
                console.log(data);
            }
        })
        .catch(error=>console.log(error));
    }
</script>
