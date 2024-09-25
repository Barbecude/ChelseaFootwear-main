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
                    <div class="box-header">
                        <a href="<?php echo base_url().$link_tambah?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive" id="table1" width="100%">
                            <thead class="primary">
                                <th>No</th>
                                <th>Pegawai</th>
                                <th>Minggu 1</th>
                                <th>Minggu 2</th>
                                <th>Minggu 3</th>
                                <th>Minggu 4</th>
                                <th>Status</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($pegawaishift as $pgsft) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $pgsft['nama_pegawai']; ?></td>
                                        <td><?php echo $pgsft['minggu_1']; ?></td>
                                        <td><?php echo $pgsft['minggu_2']; ?></td>
                                        <td><?php echo $pgsft['minggu_3']; ?></td>
                                        <td><?php echo $pgsft['minggu_4']; ?></td>
                                        <td><?php echo $pgsft['aktif']=='t'?'Aktif':'Non Aktif'; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Controlpanel/pegawaishift_edit/<?php echo $pgsft['id_pegshift']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <?php if($pgsft['aktif']=='t'){?>
                                                <a href="<?php echo base_url()?>Controlpanel/pegawaishift_aktif/<?php echo $pgsft['id_pegshift']?>" class="btn btn-success" style="background-color: green;" title="Non Aktifkan"><i class="fa fa-check-square"></i></a>
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url()?>Controlpanel/pegawaishift_aktif/<?php echo $pgsft['id_pegshift']?>" class="btn btn-danger" title="Aktifkan"><i class="fa fa-remove"></i></a>
                                            <?php } ?>                                    
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