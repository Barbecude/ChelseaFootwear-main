<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <section class="content-header px-4">
    <ol class="flex items-center whitespace-nowrap mb-4">
        <li class="inline-flex items-center font-medium">
            <a href="<?php echo base_url(); ?>/dashboard" class="flex items-center text-sm text-gray-300 hover:text-gray-400 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
            Home
            </a>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
        </li>
        <li class="inline-flex font-medium items-center text-sm font-semibold text-gray-600 truncate cursor-default" aria-current="page">
            Produk
        </li>
    </ol>
    </section>
    <!-- Main content -->
    <section class="content p-4">
                <div class="flex justify-between items-center mb-4">
                <div>
                <h1 class="text-lg font-semibold"><?php echo $breadcum; ?></h1>
                <p class="text-gray-300">Semua produk anda termasuk gambar, nama dan harganya.</p>
                </div>
                    <a href="<?php echo base_url().$link_tambah?>" class="bg-indigo-600 hover:bg-indigo-700 ring-indigo-900 active:ring active:bg-indigo-200 flex items-center gap-2 font-medium text-white py-2 px-3 rounded"><span class="material-symbols-rounded">add</span>Tambah Data</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full rounded-lg shadow-lg">
                        <thead>
                            <tr class="border-b mb-3 text-left">
                                <th class="font-medium">Gambar</th>
                                <th class="py-4 font-medium">Nama Produk</th>
                                <th class="font-medium">Jenis</th>
                                <th class="font-medium">Harga</th>
                                <th class="font-medium">Ditambahkan</th>
                                <th class="font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($produk as $prd) { ?>
                                <tr>
                                <td class="py-4">
                                        <img src="<?=base_url('assets/img/produk/'.$prd['gambar_satu'])?>" alt="" class="w-16">
                                    </td>
                                    <td class="font-medium"><?php echo $prd['nama_produk']; ?></td>
                                    <td class="text-gray-300"><?php echo $prd['jenis']; ?></td>
                                    <td class=" text-gray-300">Rp <?= number_format($prd['harga'], 0, ',', '.'); ?></td>
                                    <td class=" text-gray-300"><?php echo date('Y-m-d', strtotime($prd['created_at'])); ?></td>
                                    <td><span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-800/30 text-green-500"><span class="size-1.5 inline-block rounded-full bg-green-500"></span>Active</span></td>
                                    <td class="text-end">
                                        <a href="<?php echo base_url()?>Produk/produk_edit/<?php echo $prd['id']?>" class="text-indigo-600 hover:text-indigo-700" title="Edit Data">Edit</a>
                                        &nbsp;
                                        <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')" href="<?php echo base_url()?>Produk/produk_delete/<?php echo $prd['id']?>" class="text-red-600 hover:text-red-700" title="Hapus Data">Hapus</i></a>
                                    </td>
                                </tr>
                            <?php } ?>  
                        </tbody>
                    </table>
                </div>
    </section>

    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".preloader").fadeOut();
        });
    </script>
</body>
</html>
