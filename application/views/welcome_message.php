<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="<?php echo base_url()?>assets/assets_web/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/assets_web/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- judul pada browser -->
    <title>Chelsea Footwear</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/assets_web/img/icon/logo.png">
</head>
<style>
.material-symbols-rounded {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
.material-symbols-rounded:hover {
    cursor: pointer;
}


.favActive { 
    font-variation-settings:
  'FILL' 1,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
body {
    font-family: "Poppins";
}
</style>
<body>
    <!-- header-top -->
    <header>
    <div id="sticky-banner" tabindex="-1" class="bg-yellow-300 bg-fixed py-2 top-0 start-0 z-50 flex justify-between w-full p-4 border-b border-gray-200">
    <div class="flex items-center mx-auto">
        <p class="flex items-center text-sm font-medium">
        Discount 50% apabila membeli lebih dari 3 item, hanya setipa hari Jumat! 🎉
        </p>
    </div>
    <div class="flex items-center">
        <button data-dismiss-target="#sticky-banner" type="button" class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center hover:bg-yellow-400 hover:text-gray-900 rounded-lg text-sm p-1.5" onclick="document.getElementById('sticky-banner').classList.add('hidden');"><span class="material-symbols-rounded">close</span></button>
    </div>
</div>

        <div class="mx-auto flex h-16 max-w-screen-xl items-center px-4">
            <a class="block" href="#">
                <img src="<?php echo base_url()?>assets/assets_web/img/icon/logo.png" class="logo-img" alt="LOGO"
                    style="width: 32px">
            </a>

        
            <nav aria-label="Global" class="flex flex-1 items-center justify-end md:justify-between">
                <div class="flex items-center">
                <span class="material-symbols-rounded hover:bg-gray-200 cursor-pointer p-2 rounded-full transition duration-300 relative left-10">search</span>
                <input type="search" placeholder="Search" class="pl-10 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-black bg-zinc-100">
                </div>
            </nav>

                <?php if (!$this->session->userdata('u_name')): ?>
                    <div class="flex gap-2">

                    <a class="text-md font-medium py-2 px-5 rounded-lg text-indigo-700 bg-white hover:bg-gray-100 border border-indigo-700 transition duration-300" href="<?php echo base_url('register')?>" target="_blank">
                        Sign Up
                    </a>

                    <a class="text-md font-medium py-2 px-5 rounded-lg bg-indigo-700 text-white hover:bg-indigo-800 transition duration-300" href="<?php echo base_url()?>Login" target="_blank">
                        Login
                    </a>
                </div>

                <?php endif; ?>
                <?php if ($this->session->userdata('u_name')): ?>
                    <div class="flex items-center gap-4">
                    <div class="hidden md:flex">
                        <a class="rounded-l-lg border-l border-y hover:bg-gray-50 p-2.5 " href="<?php echo site_url('favorite'); ?>">
                            <span class="absolute bg-black text-white text-xs py-0.5 px-1.5 whitespace-nowrap rounded-full favorite-count hidden"></span>
                            <img src="<?php echo base_url()?>assets/assets_web/img/icon/favorite.svg">
                        </a>
                        <div class="hidden sm:flex">
                        <a class="relative rounded-r-lg border hover:bg-gray-50 p-2.5 flex gap-2" href="<?php echo site_url('cart'); ?>">
                            <span class="bg-red-600 text-xs text-white font-medium px-1 rounded-full absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2">0 </span>
                            <img src="<?php echo base_url()?>assets/assets_web/img/icon/cart.svg">
                        </a>
                    </div>
                </div>
                    <div class="relative ">
                        <div class="border border-gray-200 hover:bg-gray-50 cursor-pointer font-medium p-2.5 rounded-lg flex items-center gap-2 transition" id="profile-button">
                            <span class="material-symbols-rounded">account_circle</span>
                            <span class="select-none"><?php echo $this->session->userdata('nama') ?></span>
                        </div>
                        <?php
                        $koneksi = mysqli_connect("localhost","root",'',"website_pandawa");
                        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
                        $data = mysqli_fetch_array($query_mysql);
                            ?>
                        
                        <div id="profile-dropdown"
                            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50 transition">
                            <a class="block px-4 py-2 font-medium text-sm hover:bg-gray-100 flex items-center"
                                href="<?php echo base_url('profile/'.$this->session->userdata('pid')); ?>">
                                <span class="material-symbols-rounded me-2" id="profile-button">
                                    account_circle
                                </span>
                                <?php echo $this->session->userdata('nama') ?>
                            </a>
                            <?php if ($this->session->userdata('role') == 'Admin') : ?>
                            <a class="block px-4 py-2  text-black font-medium text-sm hover:bg-gray-100 flex items-center"
                                href="<?php echo site_url('dashboard'); ?>">
                                <span class="material-symbols-rounded me-2">
                                    dashboard 
                                </span>
                                Dashboard
                            </a>
                            <?php endif; ?>
                            <hr>
                            <a class="block px-4 py-2 text-red-500 font-medium text-sm hover:bg-gray-100 flex items-center"
                                href="<?php echo site_url('dashboard/logout'); ?>">
                                <span class="material-symbols-rounded me-2" id="profile-button">
                                    logout
                                </span>
                                Logout
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                    <div class="block md:hidden">
                        <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <span class="material-symbols-rounded menu" id="profile-button">
                                menu
                            </span>
                            <div class="absolute right-0 me-3 mt-2 bg-white border border-gray-200 rounded-md shadow-lg z-10 dropdown-menu hidden">
                                <a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 flex items-center px-3">
                                        <span class="material-symbols-rounded me-2" id="profile-button">
                                        favorite
                                        </span>
                                Favorite
                                </a>
                                <a href="<?= base_url('keranjang') ?>" class="block py-2 text-gray-700 hover:bg-gray-100 flex items-center px-3">
                                    <span class="material-symbols-rounded me-2" id="profile-button">
                                        shopping_cart
                                    </span>
                                    Cart
                                </a>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Home -->
    <section>
        <div class="mx-auto max-w-screen-xl lg:px-4">
            <div class="swiper progress-slide-carousel swiper-container relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="flex justify-center items-center  mb-0">
                            <img src="<?php echo base_url()?>assets/img/home/<?php echo $home['gambar_1'] ?>"
                                alt="slide 1">
                                
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex justify-center items-center mb-0">
                            <img src="<?php echo base_url()?>assets/img/home/<?php echo $home['gambar_2'] ?>"
                                alt="slide 2">
                        </div>
                    </div>
                </div>

            </div>

            <h1 class="text-center text-8xl font-medium mt-5" style=" font-family: 'Bebas Neue';"><?php echo $home['judul'] ?></h1>
            <p class="text-center text-2xl"><?php echo $home['sub_judul'] ?></p>
        </div>
    </section>
    <!--  Start Produk-->
    <section class="service" id="produk">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12">
        <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Produk</h2>
        <p class="mt-4 max-w-md text-gray-500">
            Produk Chelsea Footwear
        </p>
        <ul class="product-container-list mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($produk as $produk_item): ?>
            <li class="border rounded-lg shadow-sm">
                <a href="<?php echo site_url('detail/' . $produk_item['id']); ?>" class="group block overflow-hidden">
                    <div class="m-0 p-0"> 
                        <img src="<?php echo base_url()?>assets/img/produk/<?php echo $produk_item['gambar_satu'] ?>" alt="First slide" class="w-full">
                    </div>
                    <div class="flex justify-between px-5 pt-5">
                        <div>
                            <h3 class="text-gray-700 hover:underline"><?php echo $produk_item['nama_produk'] ?></h3>
                            <span class="tracking-wider text-gray-900 font-medium">Rp <?php echo number_format($produk_item['harga'], 0, ',', '.'); ?></span>
                        </div>
                        <button>
                            <span class="material-symbols-rounded hover:bg-gray-200 cursor-pointer p-2 rounded-lg transition" id="profile-button">favorite</span>
                        </button>
                    </div>
                    <div class="p-5">
                        <?php echo form_open('cart/add_to_cart'); ?>
                            <?php echo form_hidden('product_id', $produk_item['id']); ?>
                            <button type="submit" class="bg-gray-100 hover:bg-gray-200 font-medium p-3 w-full rounded-lg transition">Tambah ke keranjang</button>
                        <?php echo form_close(); ?>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>

        </ul>
    </div>
</section>

<!-- START FEATURE -->
<div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]" aria-hidden="true">
      <defs>
        <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M100 200V.5M.5 .5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
        <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
    </svg>
  </div>
  <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4">
        <div class="lg:max-w-lg">
          <p class="text-base font-semibold leading-7 text-indigo-600">Sepatu formal yang kuat  </p>
          <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Chealsea Footwear</h1>
          <p class="mt-2 text-xl leading-8 text-gray-700">Remastered for style in formality use on every way</p>
        </div>
      </div>
    </div>
    <div class="-ml-12 -mt-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
      <img class="w-[48rem] max-w-none sm:w-[57rem]" src="<?php echo base_url()?>assets/img/layanan/<?php echo $layanan['gambar1'] ?>" alt="">
    </div>
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4">
        <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">
          <p>
          Dapatkan penampilan yang sempurna di setiap kesempatan dengan sepatu formal kami! Dirancang untuk memberikan kenyamanan dan gaya, sepatu ini siap menemani Anda dari pertemuan penting hingga acara resmi. Dengan pilihan model dan warna yang modern</p>
          <ul role="list" class="mt-8 space-y-8 text-gray-600">
            <li class="flex gap-x-3">
              <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z" clip-rule="evenodd" />
              </svg>
              <span><strong class="font-semibold text-gray-900">Terbuat dari kulit sapi asli.</strong> Kombinasi antara kulit sapi asli dan kualitas yang tinggi membuat daya tahannya luar biasa, sehingga sepatu ini tidak hanya terlihat mewah tetapi juga tahan lama. </span>
            </li>
            <li class="flex gap-x-3">
              <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z" />
                <path fill-rule="evenodd" d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z" clip-rule="evenodd" />
              </svg>
              <span><strong class="font-semibold text-gray-900">Terkena air? tidak masalah.</strong> Bahan kulit sapi ini sudah pasti tidak menyerap air dan pastinya mudah di bersihkan dari kotoran</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-white">
  <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
    <div>
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Spesifikasi teknis</h2>
      <p class="mt-4 text-gray-500">The walnut wood card tray is precision milled to perfectly fit a stack of Focus cards. The powder coated steel divider separates active cards from new ones, or can be used to archive important task lists.</p>

      <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Origin</dt>
          <dd class="mt-2 text-sm text-gray-500">Designed by Good Goods, Inc.</dd>
        </div>
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Material</dt>
          <dd class="mt-2 text-sm text-gray-500">Solid walnut base with rare earth magnets and powder coated steel card cover</dd>
        </div>
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Dimensions</dt>
          <dd class="mt-2 text-sm text-gray-500">6.25&quot; x 3.55&quot; x 1.15&quot;</dd>
        </div>
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Finish</dt>
          <dd class="mt-2 text-sm text-gray-500">Hand sanded and finished with natural oil</dd>
        </div>
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Includes</dt>
          <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
        </div>
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Considerations</dt>
          <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color vary with each item.</dd>
        </div>
      </dl>
    </div>
    <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
      <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-01.jpg" alt="Walnut card tray with white powder coated steel divider and 3 punchout holes." class="rounded-lg bg-gray-100">
      <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-02.jpg" alt="Top down view of walnut card tray with embedded magnets and card groove." class="rounded-lg bg-gray-100">
      <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-03.jpg" alt="Side of walnut card tray with card groove and recessed card area." class="rounded-lg bg-gray-100">
      <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-04.jpg" alt="Walnut card tray filled with cards and card angled in dedicated groove." class="rounded-lg bg-gray-100">
    </div>
  </div>
</div>

</main>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 pb-6 pt-16 sm:px-6">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex text-teal-600 sm:justify-start mt-2">
                    <img src="<?php echo base_url()?>assets/assets_web/img/icon/logo.png" class="logo-img" alt="LOGO"
                        style="width: 32px">
                </div>

                <p class="max-w-md text-start leading-relaxed text-gray-500 mt-2">
                    Feel 
                </p>
            </div>
            <div class="sm:text-left mt-2">
                <div class="mt-4 border-t border-gray-100 pt-6 sm:flex sm:items-center sm:justify-between"></div>
                <h5>
                    <p class="subheading-footer font-medium">Lokasi</p>
                </h5>

                <p class="subheading-footer"><?php echo $footer['lokasi'] ?></p>
            </div>
            <div class="mt-4 border-t border-gray-100 pt-6 sm:flex sm:items-center sm:justify-between">
                <p class="text-center text-sm text-gray-500 sm:text-left">
                    <?php echo $footer['copyright'] ?>
                </p>
                <ul class="mt-4 flex justify-center gap-6 sm:mt-0 sm:justify-start">
                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-black transition hover:text-teal-700/75">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-black transition hover:text-teal-700/75">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.975-.045 1.504-.207 1.857-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.054.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.975-.207-1.504-.344-1.857-.182-.466-.398-.8-.748-1.15-.35-.35-.683-.566-1.15-.748-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zm5.018 2.151a1.08 1.08 0 100 2.161 1.08 1.08 0 000-2.161zm-5.067 1.346a4.97 4.97 0 100 9.938 4.97 4.97 0 000-9.938zm0 1.802a3.168 3.168 0 110 6.336 3.168 3.168 0 010-6.336z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-black transition hover:text-teal-700/75">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.155 11.675-11.495 0-.175 0-.349-.012-.523A8.265 8.265 0 0022 5.92a8.209 8.209 0 01-2.357.631 4.088 4.088 0 001.804-2.252 8.18 8.18 0 01-2.605.981A4.105 4.105 0 0016.616 4c-2.266 0-4.104 1.819-4.104 4.063 0 .318.036.626.105.921-3.41-.17-6.437-1.779-8.457-4.217a4.026 4.026 0 00-.555 2.043c0 1.41.724 2.655 1.827 3.383a4.095 4.095 0 01-1.857-.51v.051c0 1.97 1.417 3.615 3.292 3.985a4.14 4.14 0 01-1.852.07c.522 1.609 2.037 2.779 3.833 2.813A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.813" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-black transition hover:text-teal-700/75">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2c-5.523 0-10 4.477-10 10 0 4.418 2.87 8.166 6.84 9.489.5.091.682-.216.682-.482 0-.237-.009-.866-.014-1.699-2.782.602-3.369-1.34-3.369-1.34-.454-1.152-1.11-1.46-1.11-1.46-.908-.62.069-.608.069-.608 1.004.07 1.532 1.008 1.532 1.008.892 1.525 2.341 1.085 2.91.83.091-.647.35-1.086.636-1.335-2.22-.253-4.555-1.11-4.555-4.935 0-1.09.39-1.982 1.029-2.68-.103-.253-.446-1.27.098-2.646 0 0 .84-.267 2.75 1.024A9.564 9.564 0 0112 6.84c.852.004 1.708.115 2.51.338 1.91-1.29 2.748-1.024 2.748-1.024.546 1.376.202 2.393.1 2.646.64.698 1.028 1.59 1.028 2.68 0 3.836-2.338 4.678-4.566 4.926.358.307.678.916.678 1.847 0 1.335-.012 2.415-.012 2.743 0 .267.18.577.688.48A10.015 10.015 0 0022 12c0-5.523-4.477-10-10-10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 3000
    });
    </script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/assets_web/js/main.js"></script>
    <!--JAVASCRIPT CODE-->
    <script>
function updateFavoriteCount() {
      const favoriteCount = document.querySelectorAll('.favorite.favActive').length;
      document.querySelector('.favorite-count').textContent = favoriteCount;
    }

document.querySelectorAll('.favorite').forEach(function(element) {
    element.addEventListener('click', function() {
      element.classList.toggle('favActive');
      document.querySelector('.favorite-count').classList.remove('hidden');
      updateFavoriteCount()

    });
  });
 

    document.addEventListener('DOMContentLoaded', (event) => {
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', function(e) {
            if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    });


    var swiper = new Swiper(".progress-slide-carousel", {
        loop: true,
        fraction: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".progress-slide-carousel .swiper-pagination",
            type: "progressbar",
        },
    });

    document.querySelector('.menu').addEventListener('click', () => {
        document.querySelector('.dropdown-menu').classList.toggle('hidden')
    })
    </script>
</body>

</html>