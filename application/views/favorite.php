<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Items</title>
    <!-- Include your CSS files here -->
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Your Favorite Items</h1>
        <ul class="product-container-list grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <?php if (!empty($favorites)) : ?>
                <?php foreach ($favorites as $favorite) : ?>
                    <li class="border p-4 rounded-lg">
                        <a href="#" class="group block overflow-hidden">
                            <img src="<?php echo base_url()?>assets/img/produk/<?php echo $favorite['gambar_satu']; ?>" alt="<?php echo $favorite['name']; ?>">
                            <div class="flex justify-between mt-3">
                                <div class="">
                                    <h3 class="text-gray-700"><?php echo $favorite['name']; ?></h3>
                                    <span class="tracking-wider text-gray-900 font-medium">Rp <?php echo number_format($favorite['price'], 0, ',', '.'); ?></span>
                                </div>
                                <button href="#" class="hover:bg-gray-200 p-2 rounded-lg"><span class="material-symbols-outlined">remove_circle</span></button>
                            </div>
                        </a>   
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No items in your favorites list.</p>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
