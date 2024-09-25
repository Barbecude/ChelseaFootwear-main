<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i>Layanan</a></li>
            <li class="active"></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url().$link_edit?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive" id="table1" width="100%">
                            <thead class="primary">
                                <th>judul_satu</th>
                                <th>judul_dua</th>
                                <th>judul_tiga</th>
                                <th>judul_empat</th>
                                <th>sub_judul1</th>
                                <th>sub_judul2</th>
                                <th>sub_judul3</th>
                                <th>sub_judul4</th>
                                <th>Gambar 1</th>
                                <th>Gambar 2</th>
                                <th>Gambar 3</th>
                                <th>Gambar 4</th>
                                <th>heading</th>
                                <th>sub_heading</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($layanan as $lyn) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $lyn['judul_satu']; ?></td>
                                        <td><?php echo $lyn['judul_dua']; ?></td>
                                        <td><?php echo $lyn['judul_tiga']; ?></td>
                                        <td><?php echo $lyn['judul_empat']; ?></td>
                                        <td><?php echo $lyn['sub_judul1']; ?></td>
                                        <td><?php echo $lyn['sub_judul2']; ?></td>
                                        <td><?php echo $lyn['sub_judul3']; ?></td>
                                        <td><?php echo $lyn['sub_judul4']; ?></td>
                                        <td><?php echo $lyn['gambar1']; ?></td>
                                        <td><?php echo $lyn['gambar2']; ?></td>
                                        <td><?php echo $lyn['gambar3']; ?></td>
                                        <td><?php echo $lyn['gambar4']; ?></td>
                                        <td><?php echo $lyn['heading']; ?></td>
                                        <td><?php echo $lyn['sub_heading']; ?></td>

                                        <td>
                                            <a href="<?php echo base_url()?>Controlpanel/layanan_edit/<?php echo $lyn['pid']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <?php } ?>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
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
</script>s