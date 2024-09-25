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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-responsive" id="table1" width="100%">
                            <thead class="primary">
                                <th>id absen</th>
                                <th>id person</th>
                                <th>tanggal</th>
                                <th>jam masuk</th>
                                <th>jam keluar</th>
                                <th>task kerja</th>                            
                                <th>edi&delete</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($masuk as $abs) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $abs['id_person']; ?></td>
                                        <td><?php echo $abs['tanggal']; ?></td>
                                        <td><?php echo $abs['jam_masuk']; ?></td>
                                        <td><?php echo $abs['jam_keluar']; ?></td>
                                        <td><?php echo $abs['task_kerja']; ?></td>               
                                        <td>
                                            <a href="<?php echo base_url('hrd/add_edit/') . $abs['id_absen'] ?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;      
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>
<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".preloader").fadeOut();
    });

    $(document).ready(function(){
    //$(".preloader").fadeOut();
    $('#submit').submit(function(e){
    //    $(".preloader").fadeIn();
        var a = $('#password').val();
        var b = $('#confirm').val();

        if(a!=b){
            alert('Confirmasi Password Tidak Sesuai');
            }else{
                e.preventDefault(); 
                    $.ajax({
                        url:'<?php echo base_url();?>hrd/add',
                        type:"post",
                        data:new FormData(this),
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success: function(data){
                            console.log(data)
                            alert("Data Berhasil Disimpan");
                            //$(".preloader").fadeOut();
                           // window.location.replace("<?php echo base_url('Produk/index')?>");
                        }
                    });
            }  
        });
    });

</script>