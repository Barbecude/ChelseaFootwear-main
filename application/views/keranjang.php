<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php

if ($this->cart->total_items() == 0) {
    redirect(base_url());
} else {
    echo form_open('belanja/update'); 
?>
<div class="container mx-auto p-6">
<h1 class="text-4xl font-bold mb-10">Keranjang</h1>
<div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-24">
    <div>
        <?php $i = 1; ?>
        <?php foreach ($this->cart->contents() as $items): ?>
        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
        <?php 
        $product_id = $items['id'];
        $query = $this->db->get_where('produk', array('id' => $product_id));
        $product = $query->row();
        $image_url = base_url('assets/img/produk/' . $product->gambar_satu); 
        ?>
        <div class="border-t flex gap-10 p-5">
            <div class="flex gap-5">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $items['name']; ?>" class="w-full object-cover rounded-md mb-4 max-w-44    ">
                <div class="flex flex-col justify-between">
                    <div>
                        <h2 class="mb-2"><?php echo $items['name']; ?></h2>
                        <p class="text-gray-700 mb-2">Rp <?php echo number_format($items['price'], 0); ?></p>
                    </div>
                    <span class="items-center w-fit rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-800 ring-1 ring-inset ring-green-600/20">Ready stock</span>
                </div>
            </div>
            <div>
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
            </div>
            <div>
            <a class="font-medium text-red-600 transition hover:text-red-700" href="<?= base_url('belanja/delete/'.$items['rowid'])?>">Hapus</a>
            </div>

        </div>
        <?php $i++; ?>
        <?php endforeach; ?>
    </div>

    <div class="bg-gray-50 h-fit relative rounded-lg p-8 mt-6">
        <div class="flex items-center justify-between">
        <p class="font-medium text-lg">Ringkasan pesanan</p>
        <button class="mt-2 flex items-center gap-2 font-medium border bg-white px-4 py-3 rounded-lg hover:bg-gray-100"><span class="material-symbols-outlined">update</span> Perbarui</button>
            <?php 
                echo form_close(); 
            } 
            ?>
        </div>
        <?php foreach ($this->cart->contents() as $items): ?>
        <div class="flex justify-between border-b py-3 font-medium text-base text-gray-500">
            <div>Subtotal <span class="font-bold text-gray-700"> <?php echo $items['name']; ?> <?php echo $items['qty']; ?>x</span></div>
            <span class="text-black font-medium">Rp <?php echo number_format($items['subtotal'], 0); ?> </span>
        </div>
        <?php endforeach; ?>
        <div class="flex justify-between py-3 font-medium text-black text-lg">
                <div class="font-medium">Order total </div>
                <span>Rp <?php echo number_format($this->cart->total(), 0); ?></span>
        </div>

            <button class="mt-2 w-full font-medium bg-indigo-600 text-white px-4 py-3 rounded-lg hover:bg-indigo-600">Check Out</button>
        <h6 class="mt-3 text-xs">* Perbarui keranjang ketika sudah menambahkan jumlah produk</h6>
        <!-- <button class="mt-2 font-medium bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" href="<?= base_url('belanja/clear')?>">Clear Cart</button> -->
    </div>
    <div>
<div>

</body>
</html>
