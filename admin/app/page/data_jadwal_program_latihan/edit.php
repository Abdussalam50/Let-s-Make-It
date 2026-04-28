
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KE HALAMAN SEBELUMNYA'); ?>
</a>

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Edit Data Detail Program </strong>
        <hr class="message-inner-separator">
            <p>Silahkan Update Data Detail Program  dibawah ini.</p>
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
                    $sql = mysql_query("SELECT * FROM data_detail_program where id_detail_program = '$proses'");
                    $data = mysql_fetch_array($sql);
                    ?>
                    <!--h
                    <tr>
                        <td width="25%" class="leftrowcms">					
                            <label >Id Detail Program  <font color="red">*</font></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                           <?php echo $data['id_detail_program']; ?>	
                        </td>
                    </tr>
                    h-->
                    <input type="hidden" class="form-control" name="id_detail_program" value="<?php echo $data['id_detail_program']; ?>" readonly  id="id_detail_program" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama Program  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_program_latihan" id="id_program_latihan" placeholder="Id Program Latihan " required="required">
                                <option value="<?php echo ($data['id_program_latihan']); ?>">- <?php echo baca_database("","nama_program","select * from data_program_latihan where id_program_latihan='$data[id_program_latihan]'"); ?> -</option><?php combo_database_v2('data_program_latihan','id_program_latihan','nama_program',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama User <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_user" id="id_user" placeholder="Id User " required="required">
                                <option value="<?php echo ($data['id_user']); ?>">- <?php echo baca_database("","nama","select * from data_user where id_user='$data[id_user]'"); ?> -</option><?php combo_database_v2('data_user','id_user','nama',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Id Jenis Latihan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_detail_latihan" id="id_detail_latihan" placeholder="Id Detail Latihan " required="required">
                                <option value="<?php echo ($data['id_detail_latihan']); ?>">- <?php echo baca_database("","id_jenis_latihan","select * from data_detail_latihan where id_detail_latihan='$data[id_detail_latihan]'"); ?> -</option><?php combo_database_v2('data_detail_latihan','id_detail_latihan','id_jenis_latihan',''); ?>
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
