<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
            <li class="active"></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url().$link_tambah?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive" id="table1" width="100%">
                            <thead class="primary">
                                <!-- <th>Id</th> -->
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Gambar1</th>
                                <th>Gambar2</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($home as $hm) { ?>
                                    <tr>
                                        <!-- <td><?php echo $hm['id']; ?></td> -->
                                        <td><?php echo $hm['judul']; ?></td>
                                        <td><?php echo $hm['sub_judul']; ?></td>
                                        <td><img src="<?=base_url('assets/img/home/'.$hm['gambar_1'])?>" alt=""></td>
                                        <td><img src="<?=base_url('assets/img/home/'.$hm['gambar_2'])?>" alt=""></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Controlpanel/home_edit/<?php echo $hm['id']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <a href="<?php echo base_url()?>Controlpanel/home_delete/<?php echo $hm['id']?>" class="btn btn-warning" title="delete Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            
                                            
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
</script>  