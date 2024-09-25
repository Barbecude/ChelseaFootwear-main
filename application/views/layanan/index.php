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
                        <a href="<?php echo base_url().$link_tambah?>" class="btn btn-primary">Tambah Data</a>
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
                                <th>Gambar1</th>
                                <th>Gambar2</th>
                                <th>Gambar3</th>
                                <th>Gambar4</th>
                                <th>heading</th>
                                <th>sub_heading</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($layanan as $lyn) { ?>
                                    <tr>
                                        <td><?php echo $lyn['judul_satu']; ?></td>
                                        <td><?php echo $lyn['judul_dua']; ?></td>
                                        <td><?php echo $lyn['judul_tiga']; ?></td>
                                        <td><?php echo $lyn['judul_empat']; ?></td>
                                        <td><?php echo $lyn['sub_judul1']; ?></td>
                                        <td><?php echo $lyn['sub_judul2']; ?></td>
                                        <td><?php echo $lyn['sub_judul3']; ?></td>
                                        <td><?php echo $lyn['sub_judul4']; ?></td>
                                        <td><img src="<?=base_url('assets/img/layanan/'.$lyn['gambar1'])?>" alt="" width="100%"></td>
                                        <td><img src="<?=base_url('assets/img/layanan/'.$lyn['gambar2'])?>" alt="" width="100%"></td>
                                        <td><img src="<?=base_url('assets/img/layanan/'.$lyn['gambar3'])?>" alt="" width="100%"></td>
                                        <td><img src="<?=base_url('assets/img/layanan/'.$lyn['gambar4'])?>" alt="" width="100%"></td>
                                        <td><?php echo $lyn['heading']; ?></td>
                                        <td><?php echo $lyn['sub_heading']; ?></td>

                                        <td>
                                            <a href="<?php echo base_url()?>Layanan/layanan_edit/<?php echo $lyn['id']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')" href="<?php echo base_url()?>Layanan/layanan_delete/<?php echo $lyn['id']?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash-o"></i></a>
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