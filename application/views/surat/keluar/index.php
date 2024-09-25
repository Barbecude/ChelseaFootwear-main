<!DOCTYPE html>
<html>
<section class="content-header">
    <h1>
        <?php echo $breadcum; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home </a></li>
        <li class="active"><?php echo $breadcum; ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?php echo base_url().$link_tambah?>" class="btn btn-primary">Tambah Data Surat Keluar</a>
                </div>
                <div class="box-body">
                    <table class="table table-responsive" id="table2" width="100%">
                        <thead class="primary">
                            <th style="text-align: center;">Nomor Surat</th>
                            <th style="text-align: center;">Lampiran Surat</th>
                            <th style="text-align: center;">Perihal</th>
                            <th style="text-align: center;">Kepada</th>
                            <th style="text-align: center;">Lokasi</th>
                            <th style="text-align: center;">Text Surat</th>
                            <th style="text-align: center;">Tanggal Surat</th>
                            <th style="text-align: center;">Penanda Tangan</th>
                            <th style="text-align: center;">Fungsi</th>
                        </thead>
                        <tbody>
                            <?php 
                                    $i=1;
                                    foreach ($surat_keluar as $sklr) { ?>
                            <tr>
                                <td><?php echo $sklr['nomor_surat']; ?></td>
                                <td><?php echo $sklr['lampiran']; ?></td>
                                <td><?php echo $sklr['hal']; ?></td>
                                <td><?php echo $sklr['kepada']; ?></td>
                                <td><?php echo $sklr['lokasi']; ?></td>
                                <td><?php echo $sklr['text_surat']; ?></td>
                                <td><?php echo $sklr['tanggal_surat'].', '.date('d M Y', strtotime($sklr['tanggal_surat'])); ?></td>
                                <td><?php echo $sklr['penanda_tangan']; ?></td>
                                <td class="col-md-3">
                                    <a href="<?php echo base_url()?>Surat/keluar_edit/<?php echo $sklr['id_surat_keluar']?>"
                                        class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url()?>Surat/keluar_print/<?php echo $sklr['id_surat_keluar']?>"
                                        class="btn btn-warning" title="Print"><i class="fa fa-print"></i></a>
                                    <a href="<?php echo base_url()?>Surat/keluar_delete/<?php echo $sklr['id_surat_keluar']?>"
                                        class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>
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
$(document).ready(function() {
    $(".preloader").fadeOut();
});
</script>