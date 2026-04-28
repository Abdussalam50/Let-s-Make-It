<?php
if(!isset($_COOKIE['kodene'])){
    ?>
    <script>
        window.location.href='index.php';
    </script>
<?php
}
?>
<div class="container my-5">
  <div class="row g-4">

    <!-- Kartu Jadwal -->
    <div class="col-lg-8">
      <div class="card border-0 shadow-lg" style="background-color: #fff3e8; border-radius: 16px;">
        <div class="card-body">
          <h5 class="card-title text-center text-dark mb-4">Riwayat Anda</h5>
          <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
              <thead class="table-light">
                <tr>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Program Latihan</th>
                  <th>Tipe Latihan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $id_user=decrypt($_COOKIE['kodene']);
                    $query_jadwal=mysql_query("SELECT * FROM data_riwayat_latihan WHERE id_user='$id_user'");
                    if(mysql_num_rows($query_jadwal)>0){
                        while($data=mysql_fetch_array($query_jadwal)){
                        ?>
                    <tr>
                        <td><?php echo format_indo($data['tanggal'])?></td>
                        <td><?php echo $data['jam']?></td>
                        <td><?php echo baca_database("","nama_program","select * from data_program_latihan where id_program_latihan='{$data['id_program_latihan']}'")?></td>
                        <td><?php echo baca_database("","tipe_latihan","select *from data_tipe_latihan where id_tipe_latihan='{$data['id_tipe_latihan']}'")?></td>
                    </tr>
                    <?php
                        }
                    }else{
                ?>
                <tr>
                  <td colspan="4" class="text-center text-muted">Tidak ada data</td>
                </tr>
                <?php
                }?>
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <button class="btn btn-warning rounded-pill px-4 mt-3" onclick='window.location.href="index.php?p=riwayat latihan"'>Lihat Detail</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Program Latihan -->
    <div class="col-lg-4 mt-3 mt-sm-0">
      <div class="card border-0 shadow" style="background-color: #fcb46b; border-radius: 16px;">
        <div class="card-body">
            <h5 class="text-white text-center mb-3">Program Latihan Anda</h5>
            <?php
                $query_program=mysql_query("SELECT * FROM data_detail_program WHERE id_user='$id_user'");
                if(mysql_num_rows($query_program)>0){
                    $data=mysql_fetch_array($query_program);
                   

                        ?>
                    <p class="text-white mb-1">Program Latihan: <strong><?php echo baca_database("","nama_program","select * from data_program_latihan where id_program_latihan='$data[id_program_latihan]'")?></strong></p>
                    <p class="text-white mb-1">Level: <strong><?php echo baca_database("","level_latihan","select * from data_program_latihan where id_program_latihan='$data[id_program_latihan]'")?></strong></p>
                    
                    <div class="row">
                      <div class="col-5 text-white">
                        Hari Latihan :
                      </div>
                      <div class="col-7">
                        <ul >
                      <?php
                        $query_jadwal=mysql_query("SELECT * FROM data_jadwal_program_latihan WHERE id_program_latihan='{$data['id_program_latihan']}'");
                        while($data=mysql_fetch_array($query_jadwal)){
                          ?>
                        <li style="color:#fff"><strong><?php echo $data['hari']?></strong></li>
                      <?php
                        }
                      ?>
                        </ul>
                      </div>
                    </div><!-- <p class="text-white mb-1">Frekuensi Latihan: <strong><?php ?></strong></p> -->
                    <br>     
                                      
                  <button class="btn btn-sm rounded-pill" onclick='mulai()' style='background-color:#fff3e8;color:#fcb46b'>Ingin Latihan</button> 
                <?php
                    
                }else{
            ?>
                <p class="text-white mb-1">Program Latihan: <strong>-</strong></p>
                <p class="text-white">Level: <strong>-</strong></p>
                <br>
                <button class="btn btn-sm rounded-pill" onclick='mulai()' style='background-color:#fff3e8;color:#fcb46b'>Ingin Latihan</button> 
          <?php
          }?>
        </div>
      </div>
    </div>

    <!-- Artikel dan Tips -->
    <div class="col-12 mt-3">
      <div class="card border-0 shadow" style="background-color: #fffaf6; border-radius: 16px;">
        <div class="card-body">
            <h5 class="card-title text-center text-dark">Artikel & Tips Latihan</h5>
            <?php
                $limit=4;
                
                $queryArtikel=mysql_query("SELECT * FROM data_artikel_tips ORDER BY id_artikel_tips DESC LIMIT $limit");
                if(mysql_num_rows($queryArtikel)>0){

                    while($data=mysql_fetch_array($queryArtikel)){
                    ?>
                    <div class="mt-4">
                        <div class="d-flex flex-column flex-md-row align-items-start gap-3">

                        <img src="admin/upload/<?php echo $data['gambar']?>" alt="Artikel" class="rounded" style="object-fit: cover; width:10%">
                        <div class='px-sm-3' style='width:76%'>
                            <h4 class="text-dark"><?php echo $data['judul']?></h4>
                            <p class="text-muted mb-0"><?php echo substr($data['artikel'],0,200)?>...</p>
                        </div>
                        <a href="index.php?p=artikel dan tips&id_artikel=<?php echo $data['id_artikel_tips']?>" class='btn_single_page rounded' >Baca Selengkapnya</a>
                        </div>
                    </div>
            <?php
                    }
                }else{
            ?>
                    <div class="container">
                        <h6 class="text-center">Tidak Ada Data</h6>
                    </div>
            <?php
                }
            ?>
          
        </div>
      </div>
    </div>

  </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="main.js"></script>


<!-- <script>
function mulai(){
  
  Swal.fire({
    title:'Silahkan pilih tempat latihan anda',
    html:`
    <button id='btn-gym'class='swal2-confirm swal2-styled' style='margin:8px' >Di Gym</button>
    <button id='btn-rumah'class='swal2-confirm swal2-styled' style='margin:8px' onclick='window.location.href="index.php?p=program latihan&tipe=rumah"'>Di Rumah</button>
    `,
    showConfirmButton:false,
    didOpen:()=>{
      document.getElementById('btn-gym').addEventListener('click',()=>{
        window.location.href="index.php?p=program latihan&tipe=gym"
      })
      document.getElementById('btn-rumah').addEventListener('click',()=>{
        window.location.href="index.php?p=program latihan&tipe=rumah"
      })
    }
  })
}
</script> -->
