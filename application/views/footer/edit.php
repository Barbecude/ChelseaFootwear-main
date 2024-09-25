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
                                <!-- <div class="col-md-2"><label class="control-label" for="gambar">Gambar</label></div> -->
                                <!-- <div class="col-md-10"> -->
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $footer['id']; ?>"  autocomplete="off">
                                    <!-- <input type="file" name="gambar" id="gambar" value="<?php echo $footer['gambar']; ?>" class="form-control"  autocomplete="off"> -->
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="sub_logo">Sub Logo</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="sub_logo" class="form-control"  autocomplete="off">
                                    <img src="<?php echo base_url() . '/assets/img/footer/' . $footer['sub_logo']; ?>" width="100px">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="lokasi">Lokasi</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="lokasi" id="lokasi" value="<?php echo $footer['lokasi']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="icon_1">Icon</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="icon_1" class="form-control"  autocomplete="off">
                                    <img src="<?php echo base_url() . '/assets/img/footer/' .$footer['icon_1'];?>" width="100px">
                                </div>
                                <br/><br/>
                                   <div class="col-md-2"><label class="control-label" for="icon_2">Icon 2</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="icon_2" class="form-control"  autocomplete="off">
                                    <img src="<?php echo base_url() . '/assets/img/footer/' .$footer['icon_2'];?>" width="100px">
                                </div>
                                <br/><br/>
                                   <div class="col-md-2"><label class="control-label" for="icon_3">Icon 3</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="icon_3" class="form-control"  autocomplete="off">
                                    <img src="<?php echo base_url() . '/assets/img/footer/' .$footer['icon_3'];?>" width="100px">
                                </div>
                                <br/><br/>
                                   <div class="col-md-2"><label class="control-label" for="icon_4">Icon 4</label></div>
                                <div class="col-md-10">
                                    <input type="file" name="icon_4" class="form-control"  autocomplete="off">
                                    <img src="<?php echo base_url() . '/assets/img/footer/' .$footer['icon_4'];?>" width="100px">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="feedback">Feed Back</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="feedback" id="feedback" value="<?php echo $footer['feedback']; ?>" class="form-control"  autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="email">Email</label></div>
                                <div class="col-md-10">
                                    <input type="email" name="email" id="email" value="<?php echo $footer['email']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="copyright">Copyright</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="copyright" id="copyright" value="<?php echo $footer['copyright']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/><br></br>
                            </div>
                            
                            <div class="row text-center">
                                <button type="submit" class="btn btn-success"><i class="fa fa-download">&nbsp</i>Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Footer" class="btn btn-warning"><i class="fa fa-angle-left">&nbsp&nbsp</i>Kembali</a>
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
                    url:'<?php echo base_url();?>Footer/footer_update',
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
                        window.location.replace("<?php echo base_url('Footer/index')?>");
                    }
                });
        
        
    });
    });
</script>