<!DOCTYPE html>
<html>
<section class="content-header">
    <h1>
        <?php echo $breadcum; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Peminjaman </a></li>
        <li class="active"></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?php echo base_url().$link_tambah?>" class="btn btn-primary">Tambah Peminjaman</a>
                </div>
                <div class="box-body">
                    <table class="table table-responsive" id="table1" width="100%">
                        <thead class="primary">
                            <th>Tanggal</th>
                            <th>Karyawan</th>
                            <th>Pinjaman Ke-</th>
                            <th>Tipe Pinjaman</th>
                            <th>Jenis Pinjaman</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Besar Cicilan</th>
                        </thead>
                        <tbody>
                            <?php 
                                    $i=1;
                                    foreach ($peminjaman as $pnjm) { ?>
                            <tr>
                                <td><?php echo $pnjm['tanggal_pnjm']; ?></td>
                                <td><?php echo $pnjm['karyawan']; ?></td>
                                <td><?php echo $pnjm['pinjaman_ke']; ?></td>
                                <td><?php echo $pnjm['tipe_pinjaman']; ?></td>
                                <td><?php echo $pnjm['jenis_pinjaman']; ?></td>
                                <td><?php echo $pnjm['jumlah_pinjaman']; ?></td>
                                <td><?php echo $pnjm['besar_cicilan']; ?></td>
                                <td>
                                    <a href="<?php echo base_url()?>Peminjaman/peminjaman_edit/<?php echo $pnjm['id_peminjaman']?>"
                                        class="btn btn-warning" title="Edit Data Peminjaman"><i
                                            class="fa fa-pencil"></i></a>&nbsp;
                                    <a onclick="return confirm('Yakin Menghapus Data Peminjaman')"
                                        href="<?php echo base_url()?>Peminjaman/pinjam_delete/<?php echo $pnjm['id_peminjaman']?>"
                                        class="btn btn-danger" title="Hapus Data Peminjaman"><i
                                            class="fa fa-trash-o"></i></a>
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
$(document).ready(function() {
    $(".preloader").fadeOut();
});
</script>