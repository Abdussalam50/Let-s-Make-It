<?php
if(!isset($_COOKIE['kodene'])){
    ?>
    <script>
        window.location.href='index.php';
    </script>
<?php
}
?>
<div class="container m-5">
    <div class="container shadow p-5">
        <table class="table rounded">
        <thead>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Program Latihan</th>
            <th>Tipe Latihan</th>
        </thead>
        <tbody>
            <?php
            $user=decrypt($_COOKIE['kodene']);
            $limit=10;
            $page=isset($_GET['page'])?$_GET['page']:1;
            $offset=($page-1)*$limit;
            $query_riwayat=mysql_query("SELECT * FROM data_riwayat_latihan WHERE id_user='$user' ORDER BY tanggal DESC LIMIT $offset,$limit");
            $query_page="SELECT COUNT(*) AS total FROM data_riwayat_latihan WHERE id_user='$user'";
            if(mysql_num_rows($query_riwayat)>0){
                while($data=mysql_fetch_array($query_riwayat)){
                    ?>
                <tr>
                    <td><?php echo format_indo($data['tanggal'])?></td>
                    <td><?php echo $data['jam']?></td>
                    <td><?php echo baca_database("","nama_program","select *from data_program_latihan where id_program_latihan='{$data['id_program_latihan']}'")?></td>
                    <td><?php echo baca_database("","tipe_latihan","select * from data_tipe_latihan where id_tipe_latihan='{$data['id_tipe_latihan']}'")?></td>
                </tr>
            <?php
                }
            }else{
                ?>
                <td colspan='4'>Tidak Ada Data Yang Ditemukan</td>
            <?php
            }
            ?>
        </tbody>
        </table>
        <center>
            <?php
                Pagination($page,$limit,$query_page);
            ?>            
        </center>

    </div>
</div>