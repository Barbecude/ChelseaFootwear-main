<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="bg-gray-900">
    <section class="content-header">
        <ol class="flex items-center whitespace-nowrap mb-4">
            <li class="inline-flex items-center font-medium">
                <a href="<?php echo base_url(); ?>/dashboard" class="flex items-center text-sm text-gray-300 hover:text-gray-400">
                Home
                </a>
                <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex items-center font-medium">
                <a href="<?php echo base_url(); ?>/produk" class="flex items-center text-sm text-gray-300 hover:text-gray-400">
                Produk
                </a>
                <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex font-medium items-center text-sm font-semibold text-gray-600 truncate">
                Edit data
            </li>
        </ol>
    </section>

    <section class="content mt-4">
        <form id="submit" enctype="multipart/form-data">
            <div class="bg-gray-800 rounded-xl border border-gray-600">
                <div class="border-b border-gray-600 p-4">
                    <h4 class="text-xl font-medium">Informasi Produk</h4>
                </div>
                <div class="p-4">
                    <!-- ID Field -->
                    <div>
                        <label for="id" class="block text-gray-300 mt-2">ID</label>
                        <input type="text" name="id" id="id" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" value="<?php echo $produk['id']; ?>" required autocomplete="off">
                    </div>
                                        <!-- Gambar -->
                                        <div>
                        <label for="gambar_satu" class="block text-gray-300 mt-2">Gambar</label>
                        <input type="file" name="gambar_satu" id="gambar_satu" class="mt-1 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 bg-gray-900 border-gray-700 text-gray-400 file:me-4 file:py-3 file:px-4 file:bg-gray-700 file:text-gray-300 file:border-none">
                        <p class="mt-1 text-sm text-gray-500">SVG, PNG, JPG atau GIF</p>
                    </div>
                    <!-- Nama Produk -->
                    <div>
                        <label for="nama_produk" class="block text-gray-300 mt-2">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" value="<?php echo $produk['nama_produk']; ?>" required autocomplete="off">
                    </div>
                    <!-- Jenis -->
                    <div>
                        <label for="jenis" class="block text-gray-300 mt-2">Jenis</label>
                        <input type="text" name="jenis" id="jenis" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" value="<?php echo $produk['jenis']; ?>" required autocomplete="off">
                    </div>
                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-gray-300 mt-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" placeholder="Jelaskan detail produk disini" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full max-h-40" required autocomplete="off"><?php echo $produk['deskripsi']; ?></textarea>
                    </div>
                    <!-- Harga -->
                    <div>
                        <label for="harga" class="block text-gray-300 mt-2">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" value="<?php echo $produk['harga']; ?>" required autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-4">
                <a href="<?php echo base_url() ?>Produk/index" class="mr-4 font-medium text-red-600 hover:text-red-700 py-2 px-3 gap-2 flex items-center">Cancel</a>
                <button class="bg-indigo-600 hover:bg-indigo-800 active:ring-2 ring-indigo-800 font-medium text-white py-2 px-3 flex items-center gap-2 rounded" type="submit">
                    <span class="material-symbols-rounded">save</span> Simpan
                </button>
            </div>
        </form>
    </section>
</body>
</html>

<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".preloader").fadeOut();
    $('#submit').submit(function(e){
        $(".preloader").fadeIn();
        e.preventDefault(); 
        $.ajax({
            url: '<?php echo base_url();?>Produk/produk_update',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data){
                console.log(data)
                alert("Data Berhasil Disimpan");
                $(".preloader").fadeOut();
                window.location.replace("<?php echo base_url('Produk/index')?>");
            }
        });
    });
});
</script>
