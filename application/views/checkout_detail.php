<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <h1 class="text-center text-2xl font-bold mt-6">Detail Checkout</h1>

    <div class="container mx-auto mt-8 px-4">
        <!-- Tampilkan item yang di-checkout -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4">Produk yang Anda Checkout:</h2>
            <?php if (!empty($checkout_items)): ?>
                <?php foreach ($checkout_items as $item): ?>
                    <div class="flex items-start border-t border-gray-200 py-4">
                        <img src="<?= base_url('assets/img/produk/' . $item->product_details->gambar_satu); ?>" alt="<?= $item->product_details->nama_produk; ?>" class="w-24 h-auto mr-4" />
                        <div>
                            <strong class="block text-lg"><?= $item->product_details->nama_produk; ?></strong>
                            <p class="text-gray-600"><?= $item->product_details->jenis; ?></p>
                            <span class="text-gray-600">Rp <?= number_format($item->product_details->harga, 0); ?></span>
                            <p><?= $item->qty; ?> x Rp <?= number_format($item->product_details->harga, 0); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada produk yang dipilih untuk checkout.</p>
            <?php endif; ?>
        </div>

        <a href="<?= site_url('cart'); ?>" class="text-blue-500 mt-4 inline-block">Kembali ke Keranjang</a>
    </div>
</body>
</html>
