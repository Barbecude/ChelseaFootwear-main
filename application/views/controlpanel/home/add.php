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
                                <div class="col-md-2"><label class="control-label" for="judul">Judul</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="judul" id="judul" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="sub_judul">Sub-Judul</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="sub_judul" id="sub_judul" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="nama_produk">Nama Produk</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="gambar1">Gambar 1</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar1" id="gambar1" class="form-control" autocomplete="off" size="20">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="gambar2">Gambar 2</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="gambar2" id="gambar2" class="form-control" autocomplete="off" size="20">
                                </div>
                                <br/><br/>
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Masterdata/mahasiswa" class="btn btn-warning">Kembali</a>
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
                    url:'<?php echo base_url();?>Controlpanel/home_create',
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
                        window.location.replace("<?php echo base_url('Controlpanel/home')?>");
                    }
                });
        }
        
        
    });
    });
</script>    