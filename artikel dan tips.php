<?php
if(!isset($_COOKIE['kodene'])){
    ?>
    <script>
        window.location.href='index.php';
    </script>
<?php
}
?>

<div class="container">

    <div class="row">
        <div class="col-7">
            <?php
                $id_artikel=$_GET['id_artikel'];
                $query_artikel=mysql_query("SELECT * FROM data_artikel_tips WHERE id_artikel_tips='$id_artikel'");
                if(mysql_num_rows($query_artikel)>0){
                    $data=mysql_fetch_array($query_artikel);
            ?>
                <div class="container d-flex flex-column">
                    <h1 class="text-start"><?php echo $data['judul']?></h1>
                    <img src="admin/upload/<?php echo $data['gambar']?>" width="60%" alt="" srcset="">
                    <p class="text-justify py-3"><?php echo $data['artikel']?>
                    </p>
                </div>
            <?php
                    
                }else{
            ?>
              <h1 class="text-warning text-center">Tidak Ada Data</h1>  
            <?php
                }    
            ?>
        </div>
        <div class="col-5 shadow rounded my-3" >
            <?php
                $page=isset($_GET['pg'])?$_GET['pg']:1;
                $limit=5;
                $offset=($page-1)*$limit;
                $querys=mysql_query("SELECT * FROM data_artikel_tips LIMIT $offset,$limit");
                $queryPagination="SELECT COUNT(*) AS total FROM data_artikel_tips";
                if(mysql_num_rows($querys)>0){
                    while($data=mysql_fetch_array($querys)){
                        ?>
                    <div class="row rounded p-3 mt-3" style='background-color:#fffaf6'>
                        <div class="col-4">
                            <img src="<?php echo 'admin/upload/'.$data['gambar']?>" class=''width="100"alt="" srcset="">
                            
                        </div>
                        
                        <div class="col-8">
                            <h4 class="text-justify"><?php echo $data['judul']?></h4>
                            <p class="text-justify">
                                <?php echo substr($data['artikel'],0,100)?>...
                            </p>
                            <a href="index.php?p=artikel dan tips&id_artikel=<?php echo $data['id_artikel_tips']?>" class='btn btn-sm' style='background-color:#fcb46b;color:#fff'>Selengkapnya</a>
                        </div>
                    </div>
                    <?php
                    }   
                } ?>
              
            <center><?php    Pagination($page,$limit,$queryPagination); 
            ?></center>
        </div>
    </div>
</div>