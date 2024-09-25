<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
            <li class="active"><?php echo $breadcum; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <form class="form-horizontal" id="submit" enctype="multipart/form-data">
            <div class="col-md-12"><label for="absen". for="absen">absensi</label>
               <div class="form-group"> 
                    <div class="box">
                        <input type="hidden" name="id_person" id="id_person" value="<?= $this->session->u_id; ?>">
                        <div class="box-body">
                            <div class="col-md-12">
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div><br><br><br>
                            <div class="col-md-12">
                                <input type="time" name="jam_masuk" id="jam_masuk" class="form-control">
                            </div><br><br><br>
                            <div class="col-md-12">
                                <input type="time" name="jam_keluar" id="jam_keluar" class="form-control">
                            </div><br><br><br>
                            <div class="col-md-12">
                                <input type="text" name="task_kerja" id="task_kerja" class="form-control">
                            </div><br><br><br>
                            <div class="col-md-12">
                                <select name="masuk" id="masuk" class="form-control">
                                    <option value="WFH">WFH</option>
                                    <option value="WFO">WFO</option>
                                    <option value="IZIN">IZIN</option>
                                </select>
                            </div><br><br><br>
                            <center><input type="submit" value="simpan"></center>  
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                        url:'<?php echo base_url();?>hrd/add_simpan',
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
                           // window.location.replace("<?php echo base_url('Hrd/masuk/index')?>");
                        }
                    });
            }  
        });
    });

</script>