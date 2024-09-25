<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            Data User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
            <li class="active">Masterdata User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url()?>masterdata/user_add" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive" id="table1" width="100%">
                            <thead class="primary">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($user as $bg) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $bg['nama']; ?></td>
                                        <td><?php echo $bg['u_name']; ?></td>
                                        <td><?php echo $bg['role']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Masterdata/user_group/<?php echo $bg['id']?>" class="btn btn-primary" title="User Group"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <a href="<?php echo base_url()?>Masterdata/user_edit/<?php echo $bg['id']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <a href="<?php echo base_url()?>Masterdata/user_delete/<?php echo $bg['id']?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash-o"></i></a>
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