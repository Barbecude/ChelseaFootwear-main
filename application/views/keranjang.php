<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="container mx-auto p-6">
<?php

if ($this->cart->total_items() == 0) {
    // Redirect to home page if cart is empty
    redirect(base_url());
} else {
    echo form_open('belanja/update'); 
?>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>
    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
    <?php 
    // Retrieve image from the database
    $product_id = $items['id'];
    $query = $this->db->get_where('produk', array('id' => $product_id));
    $product = $query->row();
    $image_url = base_url('assets/img/produk/' . $product->gambar_satu); 
    ?>

    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between">
        <div>
            <img src="<?php echo $image_url; ?>" alt="<?php echo $items['name']; ?>" class="w-full object-cover rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2"><?php echo $items['name']; ?></h2>
            <p class="text-right text-gray-700 mb-2">Price: Rp <?php echo number_format($items['price'], 0); ?></p>
            <p class="text-right text-gray-700 mb-4">Subtotal: Rp <?php echo number_format($items['subtotal'], 0); ?></p>
        </div>
        <p class="mb-2">Quantity</p>
        <div class="flex justify-between items-center">
                <?php echo form_input(array(
                    'id'        => 'qty-'.$i,
                    'type'      => 'number' ,
                    'name'      => $i.'[qty]', 
                    'value'     => $items['qty'],
                    'min'       => '0',
                    'maxlength' => '3', 
                    'size'      => '5',
                    'class'     => 'border rounded-md p-1 w-16'
                    )); 
                ?>
            <a class="font-medium bg-red-700 text-white p-2 rounded-lg transition hover:bg-red-800" href="<?= base_url('belanja/delete/'.$items['rowid'])?>">Delete from cart</a>
        </div>
    </div>

<?php $i++; ?>
<?php endforeach; ?>

</div>

<div class="mt-6 text-right">
    <p class="text-lg font-bold">Total: Rp <?php echo number_format($this->cart->total(), 0); ?></p>
    <button class="mt-2 font-medium bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Update your Cart</button>
    <button class="mt-2 font-medium bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Check Out</button>
    <button class="mt-2 font-medium bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" href="<?= base_url('belanja/clear')?>">Clear Cart</button>
</div>
<?php 
    echo form_close(); 
} // End of else block
?>
</div>

</body>
</html>
