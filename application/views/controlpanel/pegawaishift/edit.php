<!DOCTYPE html>
<html>
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
            <li class="active"><?php echo $breadcum; ?></li>
        </ol>
    </section>
    <hr/>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form class="form-horizontal" id="submit" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row space">
                                <div class="col-md-2"><label class="control-label" for="nama_pegawai">Pegawai</label></div>
                                <div class="col-md-10">
                                    <input type="hidden" name="id_pegshift" id="id_pegshift" class="form-control" value="<?php echo $pegawaishift['id_pegshift']; ?>" required autocomplete="off">
                                    <select name="nama_pegawai" id="nama_pegawai" class="form-control" required>
                                        <option value="">-- Pilih Pegawai --</option>
                                            <?php foreach($pegawai as $p){ 
                                                if($p['pid']==$pegawaishift['nama_pegawai']){?>
                                                    <option value="<?php echo $p['nama']; ?>" selected><?php echo $p['nama']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $p['nama']; ?>"><?php echo $p['nama']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="minggu_1">Minggu 1</label></div>
                                <div class="col-md-10">
                                    <select name="minggu_1" id="minggu_1" class="form-control" required>
                                        <option value="">-- Pilih Shift Minggu 1 --</option>
                                            <?php foreach($shift as $sft1){ 
                                                if($sft1['id_shift']==$pegawaishift['minggu_1']){?>
                                                    <option value="<?php echo $sft1['nama_shift']; ?>" selected><?php echo $sft1['nama_shift']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $sft1['nama_shift']; ?>"><?php echo $sft1['nama_shift']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="minggu_2">Minggu 2</label></div>
                                <div class="col-md-10">
                                    <select name="minggu_2" id="minggu_2" class="form-control" required>
                                        <option value="">-- Pilih Shift Minggu 2 --</option>
                                            <?php foreach($shift as $sft2){ 
                                                if($sft2['id_shift']==$pegawaishift['minggu_2']){?>
                                                    <option value="<?php echo $sft2['nama_shift']; ?>" selected><?php echo $sft2['nama_shift']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $sft2['nama_shift']; ?>"><?php echo $sft2['nama_shift']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="minggu_3">Minggu 3</label></div>
                                <div class="col-md-10">
                                    <select name="minggu_3" id="minggu_3" class="form-control" required>
                                        <option value="">-- Pilih Shift Minggu 3 --</option>
                                            <?php foreach($shift as $sft3){ 
                                                if($sft3['id_shift']==$pegawaishift['minggu_3']){?>
                                                    <option value="<?php echo $sft3['nama_shift']; ?>" selected><?php echo $sft3['nama_shift']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $sft3['nama_shift']; ?>"><?php echo $sft3['nama_shift']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="minggu_4">Minggu 4</label></div>
                                <div class="col-md-10">
                                    <select name="minggu_4" id="minggu_4" class="form-control" required>
                                        <option value="">-- Pilih Shift Minggu 4 --</option>
                                            <?php foreach($shift as $sft4){ 
                                                if($sft4['id_shift']==$pegawaishift['minggu_4']){?>
                                                    <option value="<?php echo $sft4['nama_shift']; ?>" selected><?php echo $sft4['nama_shift']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $sft4['nama_shift']; ?>"><?php echo $sft4['nama_shift']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Controlpanel/pegawaishift" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</html>

<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".preloader").fadeOut();
    $('#submit').submit(function(e){
        $(".preloader").fadeIn();
        e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>Controlpanel/pegawaishift_update',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        console.log(data)
                        alert("Data Berhasil Disimpan");
                        $(".preloader").fadeOut();
                        window.location.replace("<?php echo base_url('Controlpanel/pegawaishift')?>");
                    }
                });  
        });
    });
</script>