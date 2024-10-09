<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <h1 class="text-center text-2xl font-bold mt-6">Keranjang Belanja Anda</h1>

    <div class="container mx-auto flex flex-col md:flex-row mt-8 px-4">
        <!-- Bagian Keranjang -->
        <div class="w-full md:w-2/3 bg-white p-6 rounded-lg shadow-lg">
            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                    <div class="flex items-start border-t border-gray-200 py-4">
                        <?php if ($item->product_details): ?>
                            <img src="<?= base_url('assets/img/produk/' . $item->product_details->gambar_satu); ?>" alt="<?= $item->product_details->nama_produk; ?>" class="w-24 h-auto mr-4" />
                            <div class="flex-grow">
                                <strong class="block text-lg"><?= $item->product_details->nama_produk; ?></strong>
                                <p class="text-gray-600"><?= $item->product_details->jenis; ?></p>
                                <span class="text-gray-600">Rp <?= number_format($item->product_details->harga), 0; ?></span>
                                <p><?= $item->product_details->deskripsi; ?></p>
                                <p><?= $item->product_details->stok; ?></p>
                            </div>
                        <?php else: ?>
                            <p class="text-red-600">Produk tidak ditemukan.</p>
                        <?php endif; ?>
                        <div class="ml-4 flex items-center">
                            <form action="<?= site_url('cart/update_qty/'.$item->id); ?>" method="POST" class="flex items-center">
                                <input type="number" name="qty" value="<?= $item->qty; ?>" min="1" onchange="this.form.submit()" class="w-16 border rounded-md mr-2 p-1" />
                            </form>
                            <a href="<?= site_url('cart/remove_from_cart/'.$item->id); ?>" class="text-red-500 ml-4">Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">Keranjang Anda kosong.</p>
            <?php endif; ?>
            <a href="<?= site_url('/'); ?>" class="text-blue-500 mt-4 inline-block">Kembali ke Produk</a>
        </div>

        <!-- Bagian Ringkasan Pesanan -->
        <div class="w-full md:w-1/3 h-fit bg-white p-6 rounded-lg shadow-lg md:ml-4 mt-6 md:mt-0">
            <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>
            <div class="flex justify-between mb-2">
                <span>Subtotal</span>
                <span>$<?= number_format($summary['subtotal'], 2); ?></span>
            </div>
            <div class="flex justify-between mb-2">
                <span>Estimasi Ongkir</span>
                <span>$<?= number_format($summary['estimasi_ongkir'], 2); ?></span>
            </div>
            <div class="flex justify-between mb-2">
                <span>Estimasi Pajak</span>
                <span>$<?= number_format($summary['estimasi_pajak'], 2); ?></span>
            </div>
            <div class="flex justify-between font-bold text-lg mt-2">
                <span>Total</span>
                <span>$<?= number_format($summary['total'], 2); ?></span>
            </div>
            <a href="#" class="bg-indigo-600 text-white text-center block mt-4 py-2 rounded-md hover:bg-indigo-700 transition duration-200">Checkout</a>
        </div>

    </div>
</body>
</html>
