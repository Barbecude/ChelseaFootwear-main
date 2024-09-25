<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Produk</a></li>
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
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Gambar Satu</th>
                                <th>Gambar Dua</th>
                                <th>Gambar Tiga</th>
                                <th>Harga</th>
                                <th>Type</th>
                                <th>Sub Gambar Tiga</th>
                                <th>Warna</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($produk as $prd) { ?>
                                    <tr>
                                        
                                        <td><?php echo $prd['id']; ?></td>
                                        <td><?php echo $prd['judul']; ?></td>
                                        <td><?php echo $prd['sub_judul']; ?></td>
                                        <td><?php echo $prd['nama_produk']; ?></td>
                                        <td><img src="<?=base_url('assets/img/produk/'.$prd['gambar_satu'])?>" alt="" width="80%"></td>
                                        <td><img src="<?=base_url('assets/img/produk/'.$prd['gambar_dua'])?>" alt="" width="80%"></td>
                                        <td><img src="<?=base_url('assets/img/produk/'.$prd['gambar_tiga'])?>" alt="" width="80%"></td>
                                        <td><?php echo $prd['harga']; ?></td>
                                        <td><?php echo $prd['type']; ?></td>
                                        <td><?php echo $prd['sub_gambar_tiga']; ?></td>
                                        <td><?php echo $prd['warna']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Produk/produk_edit/<?php echo $prd['id']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            
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