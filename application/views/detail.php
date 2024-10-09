<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Tee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="max-w-6xl mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div>
            <img src="<?php echo base_url()?>assets/img/produk/<?php echo $produk['gambar_satu']; ?>" alt="First slide" class="w-full rounded-lg">
            </div>

            <!-- Product Info -->
            <div>

            <div>
                <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-900"><?php echo $produk['nama_produk']; ?></h1>
                <span >
                    <p>RP:<?php echo $produk['harga']; ?></p>
                    </span>
                </div>
                
                <h1 class=" text-gray-900"><?php echo $produk['jenis']; ?></h1>
                <?php echo form_open('cart/add_to_cart'); ?>
                <?php echo form_hidden('product_id', $produk['id']); ?>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg text-sm font-semibold hover:bg-blue-700">Add to cart</button>
                <?php echo form_close(); ?>
                <!-- Product Description -->
                    <p class="text-sm font-bold text-gray-900"> <?php echo $produk['deskripsi']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>