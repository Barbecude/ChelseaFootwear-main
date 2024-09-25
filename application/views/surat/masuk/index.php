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
                                <th>Tanggal Surat</th>
                                <th>Dari</th>         
                                <th>Nomor Surat</th> 
                                <th>Perihal</th>
                                <th>Kepada</th>   
                                <th>Fungsi</th>     
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($masuk as $sm) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $sm['tgl_surat'].', '.date('d M Y', strtotime($sm['tgl_surat'])); ?></td>
                                        <td><?php echo $sm['dari']; ?></td>
                                        <td><?php echo $sm['nomor']; ?></td>
                                        <td><?php echo $sm['perihal']; ?></td>
                                        <td><?php echo $sm['kepada']; ?></td>
                                        <td>
                                        <a href="<?php echo base_url()?>surat/masuk_edit/<?php echo $sm['id_surat']?>" class="" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                        <a href="<?php echo base_url()?>surat/masuk_show/<?php echo $sm['id_surat']?>" class="" title="Show Data"><i class="fa fa-eye"></i></a>                                            
                                        <a href="<?php echo base_url()?>surat/masuk_delete/<?php echo $sm['id_surat']?>" class="" title="Delete Data"><i class="fa fa-trash"></i></a>                                            
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