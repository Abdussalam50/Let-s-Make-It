<?php
include 'admin/include/koneksi/koneksi.php';
include 'admin/include/function/all.php';
include 'admin/include/function/enc.php';
$user=$_POST['id_user'];
$groupData=$_POST;
unset($groupData['submit_soal']);

$arrange=[];
//Algoritma Rules based On System
//proses bobot tiap jawaban menjadi skor user per soalnya
foreach($groupData as $data=>$value){
    if($data=='quiz_1'||$data=='quiz_10'){
        $arrange[]=$value[0]*(12/100);
    }elseif($data=='quiz_3'||$data=='quiz_5'||$data=='quiz_8'){
        $arrange[]=$value[0]*(9/100);
    }elseif($data=='quiz_4'||$data=='quiz_7'||$data=='quiz_9'){
        $arrange[]=$value[0]*(6/100);
    }elseif($data=='quiz_2'){
        $arrange[]=$value[0]*(16/100);
    }elseif($data=='quiz_6'){
        $arrange[]=$value[0]*(15/100);
    }

}
//jumlahkan skor user
$user_scores=(array_sum($arrange)/10)*100;

//konversi ke level yang direkomendasikan
if($user_scores<=39){
    $level_user="Pemula";
}elseif($user_scores>=40 && $user_scores<=74){
    $level_user="Menengah";
}elseif($user_scores>74){
    $level_user="Lanjutan";
}
///Ending Algoritma
// print_r($arrange);
$id_otomatis = id_otomatis("data_hasil_quiz", "id_hasil_quiz", 10);
$query = mysql_query("INSERT INTO data_hasil_quiz VALUES('$id_otomatis','$user','$user_scores','$level_user')");

if (!$query) {
    // Jika gagal insert hasil quiz
    header("Location: index.php?p=error_page&error=" . urlencode("Gagal menyimpan hasil quiz: " . mysql_error()));
    exit;
}

// Lanjut buat program
$id_detail_program = id_otomatis("data_detail_program", "id_detail_program", 10);
$id_program = baca_database("", "id_program_latihan", "SELECT * FROM data_program_latihan WHERE level_latihan LIKE '%$level_user%'");
$id_user = $user;

$query_select = mysql_query("SELECT * FROM data_detail_latihan WHERE level_latihan='$level_user'");

if (!$query_select) {
    header("Location: index.php?p=error_page&error=" . urlencode("Gagal mengambil data detail latihan: " . mysql_error()));
    exit;
}

$arr_jenis_latihan = [];
while ($row = mysql_fetch_array($query_select)) {
    if(!in_array($row['id_jenis_latihan'],$arr_jenis_latihan)){
    $arr_jenis_latihan[] = $row['id_jenis_latihan'];
    }
}

// Proses insert ke data_detail_program
$semua_berhasil = true;
foreach ($arr_jenis_latihan as $id_detail_latihan) {
    $query_program = mysql_query("INSERT INTO data_detail_program VALUES('$id_detail_program','$id_program','$id_user','$id_detail_latihan')");
    if (!$query_program) {
        $semua_berhasil = false;
        break;
    }
}

if ($semua_berhasil) {
    ?>
    <script>
        alert('Selamat! Quiz Personalisasi telah selesai.\nAnda akan mulai berlatih di level <?php echo $level_user; ?>');
        window.location.href = 'index.php?p=dashboard user';
    </script>
    <?php
} else {
    header("Location: index.php?p=error_page&error=" . urlencode("Gagal menyimpan program latihan: " . mysql_error()));
    exit;
}

