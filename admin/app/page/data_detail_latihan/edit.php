
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KE HALAMAN SEBELUMNYA'); ?>
</a>

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Edit Data Detail Latihan </strong>
        <hr class="message-inner-separator">
            <p>Silahkan Update Data Detail Latihan  dibawah ini.</p>
        </div>
    </div>


<div class="content-box">
    <form action="proses_update.php"  enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
                <table <?php tabel_in(100, '%', 0, 'center'); ?>>	
                    <tbody>
                        <?php
                        if (!isset($_GET['proses'])) {
                                
                            ?>
                        <script>
                            alert("AKSES DITOLAK");
                            location.href = "index.php";
                        </script>
                        <?php
                        die();
                    }
                    $proses = decrypt(mysql_real_escape_string($_GET['proses']));
                    $sql = mysql_query("SELECT * FROM data_detail_latihan where id_detail_latihan = '$proses'");
                    $data = mysql_fetch_array($sql);
                    ?>
                    <!--h
                    <tr>
                        <td width="25%" class="leftrowcms">					
                            <label >Id Detail Latihan  <font color="red">*</font></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                           <?php echo $data['id_detail_latihan']; ?>	
                        </td>
                    </tr>
                    h-->
                    <input type="hidden" class="form-control" name="id_detail_latihan" value="<?php echo $data['id_detail_latihan']; ?>" readonly  id="id_detail_latihan" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jenis Latihan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_jenis_latihan" id="id_jenis_latihan" placeholder="Id Jenis Latihan " required="required">
                                <option value="<?php echo ($data['id_jenis_latihan']); ?>">- <?php echo baca_database("","jenis_latihan","select * from data_jenis_latihan where id_jenis_latihan='$data[id_jenis_latihan]'"); ?> -</option><?php combo_database_v2('data_jenis_latihan','id_jenis_latihan','jenis_latihan',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Tipe Latihan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_tipe_latihan" id="id_tipe_latihan" placeholder="Id Tipe Latihan " required="required">
                                <option value="<?php echo ($data['id_tipe_latihan']); ?>">- <?php echo baca_database("","tipe_latihan","select * from data_tipe_latihan where id_tipe_latihan='$data[id_tipe_latihan]'"); ?> -</option><?php combo_database_v2('data_tipe_latihan','id_tipe_latihan','tipe_latihan',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Gerakkan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="gerakkan" id="gerakkan" placeholder="Gerakkan " required="required" value="<?php echo ($data['gerakkan']); ?>">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Set  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="set" id="set" placeholder="Set " required="required">
                                <option value="<?php echo ($data['set']); ?>">- <?php echo ($data['set']); ?> -</option><?php combo_enum('data_detail_latihan','set',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Repetisi  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="repetisi" id="repetisi" placeholder="Repetisi " required="required">
                                <option value="<?php echo ($data['repetisi']); ?>">- <?php echo ($data['repetisi']); ?> -</option><?php combo_enum('data_detail_latihan','repetisi',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Durasi  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="durasi" id="durasi" placeholder="Durasi " required="required" value="<?php echo ($data['durasi']); ?>">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Link Video  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                 <a href="../../../../admin/upload/<?php echo $data['link_video']; ?>"><img onerror="this.src='../../../data/image/error/file.png'" width="100"  src="../../../../admin/upload/<?php echo $data['link_video']; ?>"></a>
                                 <input value="<?php echo ($data['link_video']); ?>" class="form-control" style="width:50%" type="hidden" name="link_video1" id="link_video1" placeholder="Link Video  ">
                                 <input value="<?php echo ($data['link_video']); ?>" class="form-control" style="width:50%" type="text" name="link_video" id="link_video" placeholder="Link Video  ">

                            </td>
                        </tr>

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Level Latihan<span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="level_latihan" id="level_latihan" placeholder="Level Latihan" required="required">
                                <option value="<?php echo ($data['level_latihan']); ?>">- <?php echo ($data['level_latihan']); ?> -</option><?php combo_enum('data_detail_latihan','level_latihan',''); ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_update(' PROSES UPDATE DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>
