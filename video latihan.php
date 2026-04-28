<?php
if(isset($_GET['id_detail'])){
    $id_detail=$_GET['id_detail'];
    $gerak=$_GET['option'];
    
    $encode_back="";
    foreach($gerak as $g){
        $encode_back.=urlencode("option[]")."=".urlencode($g).'&';
    }
    $encode_back=$encode_back;
    $query=mysql_query("SELECT * FROM data_detail_latihan WHERE id_detail_latihan='$id_detail'"); 
    $data=mysql_fetch_array($query);
?>

<div class="container flex-column shadow mt-3" style='background-color:#fbe8dd'>
    <div class="container">
        <h2 class="text-center p-3">Gerakkan <?php echo $data['gerakkan']?></h2>
        <center>
        <?php 
function updateYoutubeIframe($iframe) {
    // Tangkap src, toleransi kutip tunggal/ganda
    if (preg_match('/src=[\'"]([^\'"]+)[\'"]/i', $iframe, $match)) {
        $src = $match[1];

        // Ambil video ID dari embed URL
        if (preg_match('%youtube\.com/embed/([a-zA-Z0-9_-]+)%', $src, $vidMatch)) {
            $video_id = $vidMatch[1];

            // Buat src baru dengan parameter
            $new_src = "https://www.youtube.com/embed/$video_id?autoplay=1&loop=1&playlist=$video_id&mute=1";

            // Ganti src di iframe dengan src baru
            $updated_iframe = preg_replace('/src=[\'"][^\'"]+[\'"]/', 'src="'.$new_src.'"', $iframe);

            return $updated_iframe;
        } else {
            return "⚠️ Video ID tidak ditemukan di URL.";
        }
    } else {
        return "⚠️ Atribut src tidak ditemukan dalam iframe.";
    }
}

        $link= str_replace('360','1000',updateYoutubeIframe(html_entity_decode($data['link_video'])));
        $link= str_replace('200','500',$link);
        echo html_entity_decode($link);
        ?>
        </center>
    </div>
    <div class="container p-3" style='color:#fcb46b'>
        
        <p class="text-center" style='font-size:16px'>Jumlah Set : <?php echo $data['set']?></p>
        <p class="text-center" style='font-size:16px'>Jumlah Repetisi : <?php echo $data['repetisi']?></p>
        <center>
          <h2>Waktu Anda Tersisa : <span id="time-stamp" style='color:#fcb46b'></span></h2>  
        </center>


    </div>
</div>
<script>
    
    function format_waktu(t){
        var menit=Math.floor(t/60);
        var detik=t%60;
        return (
            (menit<10?'0'+menit:menit)+
            ':'+(detik<10?'0'+detik:detik)
        );
    }
    let state=false;

    
    function mulai_latihan(id){
    if(state==true){
        alert('Tidak Dapat Memulai Latihan, Tunggu Hingga Latihan Sebelumnya Selesai');
        return;
    }
        const time_stamp=document.getElementById(`time-stamp`);
        fetch('start.php',{
            method:'POST',
            body:JSON.stringify({
                request:id
            })
        })
        .then(response=>response.json())
        .then(data=>{
            console.log(data);
            let time_latihan=data;
            time_stamp.innerHTML=format_waktu(time_latihan)
            const interval=setInterval(()=>{
                time_latihan--;
                time_stamp.innerHTML=format_waktu(time_latihan);
                state=true;
                if(time_latihan<0){
                    clearInterval(interval);
                    state=false;
                    set_session(id);
                    time_stamp.innerHTML=`<a class="rounded-pill btn" style="background-color:#fcb46b"href='index.php?p=latihan&<?php echo $encode_back?>'>SELESAI!</a>`;
                }
            },1000);
        }) 
        .catch(error=>{
            console.log(error);
            state=false;
        });
    }

    function set_session(id){
        fetch(`set_session.php?id_detail_latihan=${id}`,{
            method:'GET'

        })
        .then(response=>response.json())
        .then(data=>console.log(data))
        .catch(error=>error);
    }


document.addEventListener('DOMContentLoaded',()=>{
        mulai_latihan('<?php echo $_GET['id_detail']?>');
})

</script>
<?php
}?>
