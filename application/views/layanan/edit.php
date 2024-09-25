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
                                <div class="col-md-2">
                                    <label class="control-label" for="judul_satu">judul_satu</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_satu" id="judul_satu" value="<?php echo $layanan['judul_satu']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="judul_dua">judul_dua</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_dua" id="judul_dua" value="<?php echo $layanan['judul_dua']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="judul_tiga">judul_tiga</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_tiga" id="judul_tiga" value="<?php echo $layanan['judul_tiga']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="judul_empat">judul_empat</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_empat" id="judul_empat" value="<?php echo $layanan['judul_empat']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="sub_judul1">Sub-Judul1</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul1" id="sub_judul1" value="<?php echo $layanan['sub_judul1']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="sub_judul2">Sub-Judul2</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul2" id="sub_judul2" value="<?php echo $layanan['sub_judul2']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="sub_judul3">Sub-Judul3</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul3" id="sub_judul3" value="<?php echo $layanan['sub_judul3']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="sub_judul4">Sub-Judul4</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul4" id="sub_judul4" value="<?php echo $layanan['sub_judul4']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="gambar1">Gambar 1</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar1" id="gambar1" value="<?php echo $layanan['gambar1']; ?>" class="form-control" autocomplete="off" size="20">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="gambar2">Gambar 2</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar2" id="gambar2" value="<?php echo $layanan['gambar2']; ?>" class="form-control" autocomplete="off" size="20">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="gambar3">Gambar 3</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar3" id="gambar3" value="<?php echo $layanan['gambar3']; ?>" class="form-control" autocomplete="off" size="20">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="gambar4">Gambar 4</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar4" id="gambar4" value="<?php echo $layanan['gambar4']; ?>" class="form-control" autocomplete="off" size="20">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="heading">Heading</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="heading" id="heading" value="<?php echo $layanan['heading']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2">
                                    <label class="control-label" for="sub_heading">Sub-heading</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_heading" id="sub_heading" value="<?php echo $layanan['sub_heading']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                            </div>
                            
                            <div class="row text-center">
                                <button type="submit" class="btn btn-success"><i class="fa fa-download">&nbsp</i>Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>layanan" class="btn btn-warning"><i class="fa fa-angle-left">&nbsp&nbsp</i>Kembali</a>
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
                    url:'<?php echo base_url();?>Layanan/layanan_update',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        console.log(data)
                        alert("Data Telah Berhasil Diubah");
                        $(".preloader").fadeOut();
                        window.location.replace("<?php echo base_url('Layanan/index')?>");
                    }
                });
        
        
    });
    });
</script>