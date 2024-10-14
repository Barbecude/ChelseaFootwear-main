<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    

</head>

    <body class="bg-gray-100 p-6">
        <?php if (empty($cart_items)): ?>
            <div class="flex flex-col items-center justify-center h-screen">
                <img class="max-w-sm" src="<?= base_url('/assets/assets_web/img/ecommerce-icon-empty-yellow-shopping-cart-3d-illustration-free-png.webp') ?>" class="mb-4">
                <h1 class="text-2xl font-bold mb-2 text-center">Oops, Keranjang anda kosong :(</h1>
                <p>
                    <a href="<?= base_url() . '#produk' ?>" class="text-blue-500 cursor-pointer hover:underline">Klik disini</a> untuk mencari produk
                </p>
            </div>
        <?php else: ?>
        <h1 class="text-center text-2xl font-bold mt-6">Keranjang Belanja Anda</h1>
        <div class="grid lg:grid-cols-2 gap-6 md:grid-cols-1  mt-8">
            <!-- Bagian Keranjang -->
            <div class="w-full bg-white p-6 rounded-lg shadow-lg">
            <form id="cart-form" method="POST">
                <?php foreach ($cart_items as $item): ?>
                    
                    <div class="flex items-start border-t border-gray-200 py-4">
                        <input type="checkbox" name="checkout_items[]" value="<?= $item->id; ?>" class="mr-4 product-checkbox">
                        <img src="<?= base_url('assets/img/produk/' . $item->product_details->gambar_satu); ?>" alt="<?= $item->product_details->nama_produk; ?>" class="w-auto h-24 mr-4" />
                            <div class="grid gap-5 grid-cols-1 md:grid-cols-2">
                                <div class="flex flex-col justify-beetween">
                                    <div>
                                        <a class="text-sm font-medium text-gray-700 hover:underline cursor-pointer"><?= $item->product_details->nama_produk; ?></a>
                                        <div>
                                            <span class="text-gray-500"><?= $item->product_details->jenis; ?></span>
                                            <span class="mx-2 text-gray-300">|</span>
                                            <span class="text-gray-500">49 UK</span>
                                            <p class="font-medium text-gray-700">Rp <?= $item->product_details->harga; ?></p> 
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <span class="flex items-center gap-1 w-fit rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                            <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                            In stock
                                        </span>
                                    </div>
                                </div>

                                <div class="">
                                    <input type="number" name="qty[]" value="0" class="w-16 border rounded-md mr-2 p-1 qty-input" data-id="<?= $item->id; ?>" data-harga="<?= $item->product_details->harga; ?>" disabled    />
                                    <a href="<?= site_url('cart/remove_from_cart/'.$item->id); ?>" class="text-red-500 ml-4">Hapus</a>
                                </div>
                            </div>
                    </div>
                <?php endforeach; ?>
            </form>

            <a href="<?= site_url('/'); ?>" class="text-blue-500 mt-4 inline-block">Kembali ke Produk</a>
            </div>
            
            <!-- Bagian Ringkasan Pesanan -->
            <div class="w-fit h-fit bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>
            <!-- Potongan kode di atas tetap -->
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span id="subtotal">Rp 0</span> <!-- Menambahkan elemen subtotal -->
                    </div>
                    <div class="flex justify-between font-bold text-lg mt-2">
                        <span>Total</span>
                        <span id="total">Rp 0</span> <!-- Menambahkan elemen total -->
                    </div>
                    <a href="<?= base_url('/checkout_detail'); ?>" id="checkout-button" class="bg-indigo-600 text-white text-center block mt-4 py-2 rounded-md hover:bg-indigo-700 transition duration-200" onclick="submitCheckout()">Checkout</a>
            </div>

        </div>
        <?php endif; ?>

    <div>
    </body>


    </html>



   <script>
  document.addEventListener('DOMContentLoaded', function () {
    const checkboxProduk = document.querySelectorAll('.product-checkbox');
    const inputQty = document.querySelectorAll('.qty-input');
    const elemenSubtotal = document.getElementById('subtotal');
    const elemenTotal = document.getElementById('total');

    const hitungTotal = () => {
    let subtotal = 0;
    let jumlahItem = 0; // Menyimpan jumlah item yang dipilih

    checkboxProduk.forEach((checkbox, index) => {
        if (checkbox.checked) {
            const harga = parseInt(inputQty[index].dataset.harga) || 0;
            const qty = parseInt(inputQty[index].value) || 0;
            subtotal += harga * qty;
            jumlahItem += 1; // Hitung hanya jumlah item yang dipilih
        }
    });

    updateDisplayTotal(subtotal);
    console.log('Jumlah item di keranjang:', jumlahItem); // Menampilkan jumlah item yang dipilih
};


    const updateDisplayTotal = (subtotal) => {
        elemenSubtotal.innerText = 'Rp ' + subtotal.toLocaleString();
        elemenTotal.innerText = 'Rp ' + subtotal.toLocaleString();
    };

    const setInputQtyStatus = (index, checked) => {
        inputQty[index].disabled = !checked;
        if (checked) {
            inputQty[index].value = 1; // set qty to 1 jika checkbox dipilih
        } else {
            inputQty[index].value = 0; // reset qty jika checkbox tidak dipilih
        }
    };

    const initCheckboxListeners = () => {
        checkboxProduk.forEach((checkbox, index) => {
            checkbox.addEventListener('change', () => {
                setInputQtyStatus(index, checkbox.checked);
                hitungTotal();
            });
        });
    };

    const initQtyListeners = () => {
        inputQty.forEach(input => {
            input.addEventListener('input', hitungTotal);
        });
    };

    window.submitCheckout = () => {
    const form = document.getElementById('cart-form');
    const produkDipilih = Array.from(checkboxProduk)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    if (produkDipilih.length > 0) {
        // Kirim jumlah item ke form
        const jumlahItemInput = document.createElement('input'); // Membuat elemen input baru
        jumlahItemInput.type = 'hidden'; // Menetapkan tipe input sebagai hidden
        jumlahItemInput.name = 'jumlah_item'; // Nama input yang akan digunakan di controller
        jumlahItemInput.value = localStorage.getItem('jumlahItem'); // Mengambil nilai jumlah item dari localStorage
        form.appendChild(jumlahItemInput); // Menambahkan input ke dalam form

        form.action = "<?= base_url('/checkout_detail'); ?>"; // Menetapkan URL tujuan
        form.submit(); // Mengirimkan form
    } else {
        alert('Pilih minimal satu produk untuk melanjutkan checkout.');
    }
};

    

    initCheckboxListeners();
    initQtyListeners();
});


</script>



