<?php
if(isset($_GET['error'])){
    $Warning=urldecode($_GET['error']);
}
?>

<div class="container p-5 border border-danger mt-5 " style="border-radius:10px">
    <h1 class="text-center text-danger">
        <i class="fa fa-exclamation-triangle"></i> Maaf Telah Terjadi Kesalahan : <?php echo $Warning?>
    </h1>
</div>