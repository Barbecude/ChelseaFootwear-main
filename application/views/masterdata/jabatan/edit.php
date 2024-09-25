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
                                <div class="col-md-2"><label class="control-label" for="iduser">Nama Jabatan</label></div>
                                <div class="col-md-10">
                                    <input type="hidden" name="jabatan_id" id="jabatan_id" class="form-control" value="<?php echo $jabatan['jabatan_id']; ?>" required autocomplete="off">
                                    <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" value="<?php echo $jabatan['nama_jabatan']; ?>" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="pokok">Pokok</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="pokok" id="pokok" value="<?php echo $jabatan['pokok']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="tunjangan">Tunjangan</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="tunjangan" id="tunjangan" value="<?php echo $jabatan['tunjangan']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="total_gaji">Total Gaji</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="total_gaji" id="total_gaji" value="<?php echo $jabatan['total_gaji']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                            </div>
                            
                            <div class="row text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Masterdata/jabatan" class="btn btn-warning">Kembali</a>
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
                    url:'<?php echo base_url();?>Masterdata/jabatan_update',
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
                        window.location.replace("<?php echo base_url('Masterdata/jabatan')?>");
                    }
                });  
        });
    });
</script>