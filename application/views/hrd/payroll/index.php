<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Payroll</a></li>
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
                                <th>id payroll</th>
                                <th>id pegawai</th>
                                <th>id jabatan</th>
                                <th>pokok</th>
                                <th>potongan</th>
                                <th>bonus</th>
                                <th>total</th>
                                <th>create time</th>
                                <th>create id</th>
                                <th>modify time</th>
                                <th>modify id</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($payroll as $pay) { ?>
                                    <tr>
                                        <td><?php echo $pay['id_payroll']; ?></td>
                                        <td><?php echo $pay['id_pegawai']; ?></td>
                                        <td><?php echo $pay['id_jabatan']; ?></td>
                                        <td><?php echo $pay['pokok']; ?></td>
                                        <td><?php echo $pay['potongan']; ?></td>
                                        <td><?php echo $pay['bonus']; ?></td>
                                        <td><?php echo $pay['total']; ?></td>
                                        <td><?php echo $pay['create_time']; ?></td>
                                        <td><?php echo $pay['create_id']; ?></td>
                                        <td><?php echo $pay['modify_time']; ?></td>
                                        <td><?php echo $pay['modify_id']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Hrd/payroll_edit/<?php echo $pay['id_payroll']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')" href="<?php echo base_url()?>Hrd/payroll_delete/<?php echo $pay['id_payroll']?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash-o"></i></a>
                                             <?php } ?>  
                                        </td>
                                    </tr>
                                
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