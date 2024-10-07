<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
<body>

<h1><?php echo $produk->nama_produk; ?></h1>
<img src="<?php echo base_url()?>assets/img/produk/<?php echo $produk->gambar_satu; ?>" alt="First slide" class=""> <!-- Ganti 'nama' dengan nama kolom di tabel produk -->
<p>Harga: <?php echo $produk->harga; ?></p> <!-- Ganti 'harga' dengan nama kolom di tabel produk -->
<p>Deskripsi: <?php echo $produk->deskripsi; ?></p> <!-- Ganti 'deskripsi' dengan nama kolom di tabel produk -->

</body>
</html>
