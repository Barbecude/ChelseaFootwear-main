<!DOCTYPE html>
<html>
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
            <li class="active">Masterdata User</li>
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
                                <!-- <div class="col-md-3"><label class="control-label" for="iduser">Nama User</label></div>
                                <div class="col-md-9">
                                    <select name="iduser" id="iduser" required class="form-control" required>
                                        <option value=""></option>
                                        <?php foreach($person as $ps){ ?>
                                            <option value="<?php echo $ps['pid']; ?>"><?php echo $ps['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <br/><br/> -->
                                <div class="col-md-3"><label class="control-label" for="iduser">Nama User</label></div>
                                <div class="col-md-9">
                                    <input type="text" name="iduser" id="iduser" class="form-control" required>
                                </div>
                                <br/><br/>
                                <div class="col-md-3"><label class="control-label" for="username">Username</label></div>
                                <div class="col-md-9">
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <br/><br/>
                                <div class="col-md-3"><label class="control-label" for="password">Password</label></div>
                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <br/><br/>
                                <div class="col-md-3"><label class="control-label" for="confirm">Confirm Password</label></div>
                                <div class="col-md-9">
                                    <input type="password" name="confirm" id="confirm" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Masterdata/user" class="btn btn-warning">Kembali</a>
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
        var a = $('#password').val();
        var b = $('#confirm').val();

        if(a!=b){
            alert('Confirmasi Password Tidak Sesuai');
        }else{
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>Masterdata/user_create',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        console.log(data)
                        alert("Data Berhasil Disimpan");
                        window.location.replace("<?php echo base_url('Masterdata/user')?>");
                    }
                });
        }
        
        
    });
    });
</script>