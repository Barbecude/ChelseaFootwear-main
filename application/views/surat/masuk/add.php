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
                            <div class="container">
                                <div class="row space">
                                     <div class="col-md-2"><label class="control-label" for="dari">Dari</label></div>
                                         <div class="col-md-3">
                                            <input type="text" name="dari" id="dari" class="form-control" required autocomplete="off">
                                     </div>
                                     
                                     <div class="col-md-2"><label class="control-label" for="nomor">Nomor Surat</label></div>
                                        <div class="col-md-3">
                                            <input type="text" name="nomor" id="nomor" class="form-control" required autocomplete="off">
                                     </div>
                                </div>
                                
                                

                                <div class="row space">
                                     <div class="col-md-2"><label class="control-label" for="tgl_surat">Tanggal Surat</label></div>
                                        <div class="col-md-3">
                                            <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-md-2"><label class="control-label" for="lampiran">Lampiran</label></div>
                                        <div class="col-md-3">
                                            <input type="text" name="lampiran" id="lampiran" class="form-control" required autocomplete="off">
                                     </div>
                                                             
                                </div>

                                <div class="row space">
                                    <div class="col-md-2"><label class="control-label" for="kepada">Kepada</label></div>
                                        <div class="col-md-3">
                                            <input type="text" name="kepada" id="kepada" class="form-control" required autocomplete="off">
                                </div>

                                     <div class="col-md-2"><label class="control-label" for="perihal">Perihal</label></div>
                                         <div class="col-md-3">
                                             <input type="text" name="perihal" id="perihal" class="form-control" required autocomplete="off">
                                    </div>      
                                </div>

                                <div class="row space">
                                <div class="col-md-2"><label class="control-label" for="gambar1">Foto/Berkas</label></div>
                                <div class="col-md-3">
                                    <input type="file" name="gambar1" id="gambar1" class="form-control" autocomplete="off" size="20" width="20px">
                                    <img id="gambar1_prev" width="300px" src=""class="img-responsive img-thumbnail" alt="Preview Image">
                                </div>        
                            </div>
                                </div>
                                <br/>
                                
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>surat/masuk/index" class="btn btn-warning">Kembali</a>
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

    $('#gambar1').change(function(){
        readURL(this);
    });


   

    $('#submit').submit(function(e){
        $(".preloader").fadeIn();

       
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>surat/add_masuk_simpan',
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
                        window.location.replace("<?php echo base_url('surat/masuk')?>");
                    }
                });
        
        
        
    });
    });

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
                $('#gambar1_prev').attr('src',e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>    