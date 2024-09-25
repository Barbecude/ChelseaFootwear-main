<!DOCTYPE html>
<html>
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> layanan</a></li>
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
                                <div class="col-md-2"><label class="control-label" for="judul_satu">Judul satu</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_satu" id="Judul_satu" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="judul_dua">Judul dua</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_dua" id="Judul_dua" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="judul_tiga">Judul tiga</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_tiga" id="Judul_tiga" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="judul_empat">Judul empat</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="judul_empat" id="Judul_empat" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="sub_judul1">Sub Judul 1</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul1" id="sub_judul1" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="sub_judul2">Sub Judul 2</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul2" id="sub_judul2" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="sub_judul3">Sub Judul 3</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul3" id="sub_judul3" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="sub_judul4">Sub Judul 4</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul4" id="sub_judul4" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="gambar1">Gambar Satu</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar1" id="gambar1" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="gambar2">Gambar Dua</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar2" id="gambar2" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="gambar3">Gambar Tiga</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar3" id="gambar3" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="gambar4">Gambar empat</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar4" id="gambar4" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="heading">heading</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="heading" id="heading" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="sub_heading">sub_heading</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_heading" id="sub_heading" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                            
                            <div class="row text-center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-download">&nbsp&nbsp</i>Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Layanan/index" class="btn btn-warning"><i class="fa fa-angle-left">&nbsp&nbsp</i>Kembali</a>
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
        var a = $('#password').val();
        var b = $('#confirm').val();

        if(a!=b){
            alert('Confirmasi Password Tidak Sesuai');
        }else{
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>Layanan/layanan_create',
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
                        window.location.replace("<?php echo base_url('Layanan/index')?>");
                    }
                });
        }
        
        
    });
    });
</script>    