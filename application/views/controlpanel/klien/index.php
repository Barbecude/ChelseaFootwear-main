<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> klien</a></li>
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
                                 <th>id</th>
                                <th>judul</th>
                                <th>subjudul 1</th>
                                <th>subjudul 2</th>
                                <th>subjudul 3</th>
                                <th>subjudul 4</th>
                                <th>text 1</th>
                                <th>text 2</th>
                                <th>text 3</th>
                                <th>text 4</th>
                                <th>gambar 1</th>
                                <th>gambar 2</th>
                                <th>gambar 3</th>
                                <th>gambar 4</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($klien as $kln) { ?>
                                    <tr>
                                         <td><?php echo $i++; ?></td>
                                        <td><?php echo $kln['judul']; ?></td>
                                        <td><?php echo $kln['subjudul_1']; ?></td>
                                        <td><?php echo $kln['subjudul_2']; ?></td>
                                        <td><?php echo $kln['subjudul_3']; ?></td>
                                        <td><?php echo $kln['subjudul_4']; ?></td>
                                        <td><?php echo $kln['teks_1']; ?></td>
                                        <td><?php echo $kln['teks_2']; ?></td>
                                        <td><?php echo $kln['teks_3']; ?></td>
                                        <td><?php echo $kln['teks_4']; ?></td>
                                        <td><img src="<?=base_url('assets/img/klien/'.$kln['gambar_1'])?>" alt=""></td>
                                        <td><img src="<?=base_url('assets/img/klien/'.$kln['gambar_2'])?>" alt=""></td>
                                        <td><img src="<?=base_url('assets/img/klien/'.$kln['gambar_3'])?>" alt=""></td>
                                        <td><img src="<?=base_url('assets/img/klien/'.$kln['gambar_4'])?>" alt=""></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Klien/klien_edit/<?php echo $kln['id']?>" class="btn btn-warning" title="edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
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