<?php
function daftar(){
	
?>
<br>
<center><h2> DAFTAR  </h2></center>
<br>

<div class="container">
<div class="col-md-12 d-flex justify-content-center">
<div class="col-md-8 ">
<center>
Sudah Memiliki akun Silahkan login 
<br><a href="index.php?p=login" class="btn btn-danger">Halaman Login</a>
</center>
<br>
<?php 

//KODE OTOMATIS	 	
// function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
// 	$kode = substr($id_terakhir, 0, $panjang_kode);
// 	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
// 	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
// 	$id_baru = $kode.$angka_baru;
// 	return $id_baru;
// }
// global $con_mysqli;
// $cek = mysqli_query($con_mysqli,"SELECT * FROM data_pasien");
// $rowcek = mysqli_num_rows($cek);
// if ($rowcek > 0) {
// 	$id_pasien = mysqli_query($con_mysqli,"SELECT max(id_pasien) as id_pasien FROM data_pasien");
// 	$data_pasien = mysqli_fetch_array($id_pasien);
// 	$id_pasien_akhir = $data_pasien['id_pasien'];
// 	$id_pasien_otomatis = autonumber($id_pasien_akhir, 3, 3); 
// 	}else{
// 	$kodedepan = strtoupper('data_pasien');
// 	$kodedepan = str_replace("DATA_","",$kodedepan);
// 	$kodedepan = str_replace("DATA","",$kodedepan);
// 	$kodedepan = str_replace("TABEL_","",$kodedepan);
// 	$kodedepan = str_replace("TABEL","",$kodedepan);
// 	$kodedepan = str_replace("TABLE_","",$kodedepan);
// 	$kodedepan = strtoupper(substr($kodedepan,0,3));
// 	$id_pasien_otomatis = $kodedepan."001";	
// }

?>

<form method="post" action="index.php?p=login&action=simpan_daftar">
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >ID&nbsp;User <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" class="form-control" readonly value="<?php echo id_otomatis('data_user','id_user','10');?>" name="id_user" placeholder="id_pasien" id="id_pasien" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text"  class="form-control" name="nama" id="nama" placeholder="nama&nbsp;" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal Lahir <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='form-control' type="date" name="tanggal_lahir" id="tanggal_lahir">
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Berat Badan (Kg)<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='form-control' type="number" name="berat_badan" id="berat_badan" min="30" >
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tinggi Badan (cm)<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='form-control' type="number" name="tinggi_badan" id="tinggi_badan" min="100" >
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jenis&nbsp;Kelamin <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
				<select  type="enum" name="jenis_kelamin"  class="form-control" id="jenis_kelamin" placeholder="jenis&nbsp;kelamin" required="required">
					<option>laki-laki</option>
					<option>perempuan</option>
				</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >username <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text"  class="form-control" name="username" id="username" placeholder="username" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >password <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="password"   class="form-control" name="password" id="password" placeholder="password" required="required">

		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
	
<center>
<?php btn_simpan(' DAFTAR'); ?>
</center>
</div>		
</form>
</div>
</div>
</div>
<br><br><br><br>
<?php 
}
function simpan_daftar()
{
	global $key;
	if (!isset($_POST['id_user']))
{
	?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 
$id_pasien=$_POST['id_user'];
$nama_pasien=$_POST['nama'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$berat_badan=$_POST['berat_badan'];
$tinggi_badan=$_POST['tinggi_badan'];
$username=$_POST['username'];
$password= md5($_POST['password']);

$query=mysql_query("insert into data_user values (
'$id_pasien'
 ,'$nama_pasien'
 ,'$tanggal_lahir'
 ,'$berat_badan'
 ,'$tinggi_badan'
 ,'$jenis_kelamin'
 ,'$username'
 ,'$password'

)");

if($query){
					$kodene = encrypt($id_pasien);
					setcookie('kodene', $kodene, time() + (6000 * 6000), '/');
					$ip = $_SERVER['REMOTE_ADDR'];
					$useragent = $_SERVER['HTTP_USER_AGENT'];
					$token = sha1($ip . $useragent . $key);
					$token = crypt($token, $key);
					setcookie('token_user', $token, time() + (6000 * 6000), '/');
					$mess="SELAMAT PENDAFTARAN BERHASIL, SILAHKAN MENGERJAKAN QUIZ";
					header("Location:index.php?p=quiz personalisasi&notif=$mess");
}
else
{
	echo mysql_error();
}
}
?>