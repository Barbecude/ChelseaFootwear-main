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
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Jabatan</th>
                                <th>Gelar</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Tipe Pegawai</th>
                                <th>No Pegawai</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($pegawai as $pgw) { ?>
                                    <tr> 
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $pgw['nama']; ?></td>
                                        <td><?php echo $pgw['alamat']; ?></td>
                                        <td><?php echo '0'.$pgw['hp']; ?></td>
                                        <td><?php echo $pgw['nama_jabatan']; ?></td>
                                        <td><?php echo $pgw['nama_gelar']; ?></td>
                                        <td><?php echo $pgw['kelamin']=='l'?'Laki - Laki':'Perempuan'; ?></td>
                                        <td><?php echo $pgw['tempat_lahir'].', '.date('d M Y', strtotime($pgw['tanggal_lahir'])); ?></td>
                                        <td><?php echo $pgw['nama_agama']; ?></td>
                                        <td><?php echo $pgw['tipe_pegawai']; ?></td>
                                        <td><?php echo $pgw['nomor_pegawai']; ?></td>
                                        <td><?php echo $pgw['email']; ?></td>
                                        <td><?php echo $pgw['aktif']=='t'?'Aktif':'Non Aktif'; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Masterdata/pegawai_edit/<?php echo $pgw['pid']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <?php if($pgw['aktif']=='t'){?>
                                                <a href="<?php echo base_url()?>Masterdata/pegawai_delete/<?php echo $pgw['pid']?>" class="btn btn-success" style="background-color: green;" title="Non Aktifkan"><i class="fa fa-check-square"></i></a>
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url()?>Masterdata/pegawai_delete/<?php echo $pgw['pid']?>" class="btn btn-danger" title="Aktifkan"><i class="fa fa-remove"></i></a>
                                            <?php } ?>&nbsp;
                                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')" href="<?php echo base_url()?>Masterdata/pegawai_hapus/<?php echo $pgw['pid']?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash-o"></i></a>
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