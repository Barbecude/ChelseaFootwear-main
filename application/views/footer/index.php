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
            <!-- <div class="box-header"> -->
                        <!-- <a href="<?php echo base_url().$link_tambah?>" class="btn btn-primary"><i class="fa fa-plus">&nbsp</i>Tambah</a> -->
                    <!-- </div> -->
                    <div class="box-body">
                        <table class="table table-responsive" id="table1" width="200%">
                            <thead class="primary">
                                <th>No</th>
                                <!-- <th>Gambar</th> -->
                                &nbsp&nbsp
                                <th>Sub Logo</th>
                                &nbsp&nbsp
                                <th>Lokasi</th>
                                &nbsp&nbsp
                                <th>Icons 1</th>
                                &nbsp&nbsp
                                <th>Icons 2</th>
                                &nbsp&nbsp
                                <th>Icons 3</th>
                                &nbsp&nbsp
                                <th>Icons 4</th>
                                &nbsp&nbsp
                                <th>Feed Back</th>
                                <th>Email</th>
                                <th>Copyright</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($footer as $ftr) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <!-- <td><img src="<?=base_url('assets/img/footer/'.$ftr['gambar'])?>" alt="" width="100px"></td> -->
                                        <td><img src="<?=base_url('assets/img/footer/'.$ftr['sub_logo'])?>" alt="" width="100px"></td>
                                        <td><?php echo $ftr['lokasi']; ?></td>  
                                        <td><img src="<?=base_url('assets/img/footer/'.$ftr['icon_1'])?>" alt="" width="50px"></td>
                                        <td><img src="<?=base_url('assets/img/footer/'.$ftr['icon_2'])?>" alt="" width="50px"></td>
                                        <td><img src="<?=base_url('assets/img/footer/'.$ftr['icon_3'])?>" alt="" width="50px"></td>
                                        <td><img src="<?=base_url('assets/img/footer/'.$ftr['icon_4'])?>" alt="" width="50px"></td>
                                        <td><?php echo $ftr['feedback']; ?></td>
                                        <td><?php echo $ftr['email']; ?></td>
                                        <td><?php echo $ftr['copyright']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Footer/footer_edit/<?php echo $ftr['id']?>" class="btn btn-warning"          title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;

                                            <?php } ?>                                    
                                        </td>
                                    </tr>
                        </tbody>
                        </table>
                            <!-- AKHIR CODING -->
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