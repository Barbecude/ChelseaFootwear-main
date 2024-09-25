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
                                <th>Gelar</th>
                                <th>Status</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($gelar as $glr) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $glr['nama_gelar']; ?></td>
                                        <td><?php echo $glr['aktif']=='t'?'Aktif':'Non Aktif'; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Masterdata/gelar_edit/<?php echo $glr['id_gelar']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <?php if($glr['aktif']=='t'){?>
                                                <a href="<?php echo base_url()?>Masterdata/gelar_aktif/<?php echo $glr['id_gelar']?>" class="btn btn-success" style="background-color: green;" title="Non Aktifkan"><i class="fa fa-check-square"></i></a>
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url()?>Masterdata/gelar_aktif/<?php echo $glr['id_gelar']?>" class="btn btn-danger" title="Aktifkan"><i class="fa fa-remove"></i></a>
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