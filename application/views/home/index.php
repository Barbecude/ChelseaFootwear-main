<!DOCTYPE html>
<html>
    <section class="content-header">
        <h1>
            <?php echo $breadcum; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
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
                            <th>No</th>
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Gambar1</th>
                                <th>Gambar2</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($home as $hm) { ?>
                                    <tr>
                                    <td><?php echo $i++; ?></td>
                                    
                                        <td><?php echo $hm['judul']; ?></td>
                                        <td><?php echo $hm['sub_judul']; ?></td>
                                        <td><img src="<?=base_url('assets/img/home/'.$hm['gambar_1'])?>" alt="" width="40px"></td>
                                        <td><img src="<?=base_url('assets/img/home/'.$hm['gambar_2'])?>" alt="" width="40px"></td>
                                        <td>
                                            <a href="<?php echo base_url()?>Home/home_edit/<?php echo $hm['id']?>" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;
                                            <a href="<?php echo base_url()?>Home/home_hapus/<?php echo $hm['id']?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash-o"></i></a>&nbsp;
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        





  <div class="relative overflow-x-auto shadow-md sm:rounded-lg text-lg">
    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Sub Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar 1
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar 2
                </th>
                <th scope="col" class="px-6 py-3">
                   Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $i++; ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $hm['judul']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $hm['sub_judul']; ?>
                </td>
                <td class="px-6 py-4">
                <img src="<?=base_url('assets/img/home/'.$hm['gambar_1'])?>" alt="" width="40px">
                </td><td class="px-6 py-4">
                <img src="<?=base_url('assets/img/home/'.$hm['gambar_2'])?>" alt="" width="40px">
                </td>
                <td class="px-6 py-4">
                <a href="<?php echo base_url()?>Home/home_edit/<?php echo $hm['id']?>" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700" title="Edit Data">Edit</a>&nbsp;
                <a href="<?php echo base_url()?>Home/home_hapus/<?php echo $hm['id']?>" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700" title="Edit Data">Remove</a>&nbsp;
                </td>
            </tr>
           
        </tbody>
    </table>
</div>



    </section>
</html>
<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".preloader").fadeOut();
    });
</script>