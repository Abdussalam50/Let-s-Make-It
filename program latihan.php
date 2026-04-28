<?php
if(isset($_GET['tipe'])){
$tipe=$_GET['tipe'];
$id_user=decrypt($_COOKIE['kodene']);
$level_user=baca_database("","level_latihan","select *from data_hasil_quiz where id_user='$id_user'");
$id_tipe=baca_database("","id_tipe_latihan","select * from data_tipe_latihan where tipe_latihan='$tipe' ");
$id_jenis_latihan=baca_database("","id_jenis_latihan","select * from data_detail_latihan where id_tipe_latihan='$id_tipe' and level_latihan='$level_user'");
$query=mysql_query("SELECT * FROM data_detail_latihan WHERE id_tipe_latihan='$id_tipe' and level_latihan='$level_user' and id_jenis_latihan='$id_jenis_latihan'");

// $program_latihan=baca_database("","id_program_latihan","select * from data_detail_program where id_user='$id_user'");

if(mysql_num_rows($query)>0){
?>
<div class="container">
    <div class="row py-5">

<div class="col-12 col-lg-3">
   
    <ul class="col-12">
        <?php
        $query_program = mysql_query("
            SELECT DISTINCT data_detail_program.id_detail_latihan, data_detail_latihan.id_jenis_latihan 
            FROM data_detail_program 
            JOIN data_detail_latihan ON data_detail_program.id_detail_latihan = data_detail_latihan.id_jenis_latihan 
            WHERE id_user='$id_user' AND  id_tipe_latihan='$id_tipe' AND level_latihan='$level_user'
        ");
        
        $validation = [];

        while ($data = mysql_fetch_array($query_program)) {
            $id_latihan = $data['id_jenis_latihan'];

            // Cek apakah ID sudah ditampilkan sebelumnya
            if (!in_array($id_latihan, $validation)) {
                $validation[] = $id_latihan;

                // Ambil nama jenis latihan
                $nama_latihan = baca_database("", "jenis_latihan", "SELECT * FROM data_jenis_latihan WHERE id_jenis_latihan='$id_latihan'");
                ?>
                <li class="my-2 row" style="cursor:pointer">
                    <button class="single_page_btn" style='width:100%' onclick='desc("<?php echo $id_latihan?>","<?php echo $level_user?>","<?php echo $id_tipe?>")'><?php echo htmlspecialchars($nama_latihan); ?></button>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>

        <div class="col-12 col-lg-9 rounded shadow" >
             <h3 class="text-start">Silahkan pilih gerakkan latihan yang diinginkan</h3>
            <form action="" method="get">
                <input type="hidden" name="p" value='latihan'>
                
                <div class="row px-3" id='description'>


                </div>
           
                <div class="row p-3" id="button_pilih">
                    
                </div>
             </form>
        </div>
    </div>
</div>
<script>
 const description=document.getElementById('description');
 const button_pilih=document.getElementById('button_pilih');
 let button='';
 function desc(id,level,tipe){
    fetch('find_latihan.php',{
        method:'POST',
        body:JSON.stringify({
            id_jenis_latihan:id,
            level_latihan:level,
            tipe_latihan:tipe
        })
    })
    .then(response=>response.json())
    .then(data=>{
        console.log(data);
        button=`<button class='single_page_btn'type='submit'>Lanjutkan</button>`
        description.innerHTML=data;
        button_pilih.innerHTML=button;
    })
    .catch(error=>console.log(error))
 }
</script>
<?php
}else{
    ?>
<div class="container p-5">
    <center>
<h2 class="text-center" style="color:#fcb46b">T_T Maaf Program Latihan Yang Anda Minta Saat Ini Tidak Tersedia</h2>
    </center>
</div>
<?php
}
}
?>
