<!DOCTYPE html>
<html>
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Payroll</a></li>
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
                                <div class="col-md-2"><label class="control-label" for="id_payroll">id payroll</label></div>
                                <div class="col-md-10">
                                    <input type="heading" name="id_payroll" id="id_payroll" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="id_pegawai">id pegawai</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="id_pegawai" id="id_pegawai" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="id_jabatan">id jabatan</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="id_jabatan" id="id_jabatan" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="pokok">pokok</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="pokok" id="pokok" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="potongan">potongan</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="potongan" id="potongan" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="bonus">Bonus</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="bonus" id="bonus" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="total">Total</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="total" id="total" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="create_time">Create time</label></div>
                                <div class="col-md-10">
                                    <input type="date" name="create_time" id="create_time" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="create_id">Create Id</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="create_id" id="create_id" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="modify_time">Modify time</label></div>
                                <div class="col-md-10">
                                    <input type="date" name="modify_time" id="modify_time" class="form-control" required autocomplete="off">
                                </div>
                                <div class="col-md-2"><label class="control-label" for="modify_id">Modify Id</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="modify_id" id="modify_id" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="row text-center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-download">&nbsp&nbsp</i>Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Hrd/payroll/index" class="btn btn-warning"><i class="fa fa-angle-left">&nbsp&nbsp</i>Kembali</a>
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
                    url:'<?php echo base_url();?>Hrd/payroll_update',
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
                        window.location.replace("<?php echo base_url('Hrd/payroll/index')?>");
                    }
                });
        
        
    });
    });
</script>