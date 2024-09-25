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
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="<?php echo base_url()?>assets/assets_web/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
.material-symbols-outlined:hover {
    cursor: pointer;
}


.favActive { 
    font-variation-settings:
  'FILL' 1,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>
<body>
    <!-- header-top -->
    <header>
        <div class="bg-gray-100">
            <div class="mx-auto flex max-w-screen-xl items-center justify-end gap-4 h-10 px-4">
                <?php if (!$this->session->userdata('u_name')): ?>
                <a class="text-sm font-medium text-black" href="<?php echo base_url()?>Login" target="_blank">
                    Login
                </a>
                <span class="text-sm font-medium text-black">|</span>
                <a class="text-sm font-medium text-black" href="<?php echo base_url('register')?>" target="_blank">
                    Register
                </a>
                <?php endif; ?>
                <?php if ($this->session->userdata('u_name')): ?>
                <div class="relative">
                    <span class="material-symbols-outlined cursor-pointer hover:bg-gray-200 p-2" id="profile-button">
                        account_circle
                    </span>
                    <?php
                    $koneksi = mysqli_connect("localhost","root",'',"website_pandawa");
                    $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
                    $data = mysqli_fetch_array($query_mysql);
                        ?>
                    <div id="profile-dropdown"
                        class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50 transition">
                        <a class="block px-4 py-2 font-medium text-sm hover:bg-gray-100 flex items-center"
                            href="profile?u_id=<?= $data['u_id']; ?>">
                            <span class="material-symbols-outlined me-2" id="profile-button">
                                account_circle
                            </span>
                            <?php echo $this->session->userdata('nama') ?>
                        </a>

                        <hr>
                        <a class="block px-4 py-2 text-red-500 font-medium text-sm hover:bg-gray-100 flex items-center"
                            href="<?php echo site_url('dashboard/logout'); ?>">
                            <span class="material-symbols-outlined me-2" id="profile-button">
                                logout
                            </span>
                            Logout
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mx-auto flex h-16 max-w-screen-xl items-center px-4">
            <a class="block" href="#">
                <img src="<?php echo base_url()?>assets/assets_web/img/icon/logo.png" class="logo-img" alt="LOGO"
                    style="width: 32px">
            </a>

        
            <nav aria-label="Global" class="flex flex-1 items-center justify-end md:justify-between">
                <div class="flex items-center">
                <span class="material-symbols-outlined hover:bg-gray-200 cursor-pointer p-2 rounded-full transition duration-300 relative left-10">search</span>
                <input type="search" placeholder="Search" class="pl-10 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-black bg-zinc-100">
                </div>
            </nav>


                <div class="flex items-center gap-4">
                    <div class="hidden md:flex">
                        <a class="" href="<?php echo site_url('favorite'); ?>">
                        <span class="absolute bg-black text-white text-xs py-0.5 px-1.5 whitespace-nowrap rounded-full favorite-count hidden"></span>
                            <img src="<?php echo base_url()?>assets/assets_web/img/icon/favorite.svg"
                                class="rounded-md hover:bg-gray-100 p-2.5 ">
                        </a>
                       
                        <div class="hidden sm:flex">
                            <?php  
                            $keranjang = $this->cart->contents();
                            $jml_item = 0;
                            foreach ($keranjang as $key => $value){
                                $jml_item = $jml_item + $value['qty'];
                            }
                            ?>
                        <a class="rounded-md hover:bg-gray-100 p-2.5" href="<?php echo site_url('keranjang'); ?>">
                                <span class="absolute top-12 ms-4 bg-black text-xs text-white px-1 rounded"><?= $jml_item ?></span>
                                <img src="<?php echo base_url()?>assets/assets_web/img/icon/cart.svg">
                         </a>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                        <span class="material-symbols-outlined menu" id="profile-button">
                                menu
                            </span>
                            <div class="absolute right-0 me-3 mt-2 bg-white border border-gray-200 rounded-md shadow-lg z-10 dropdown-menu hidden">
                                <a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 flex items-center px-3">
                                        <span class="material-symbols-outlined me-2" id="profile-button">
                                        favorite
                                        </span>
                                Favorite
                                </a>
                                <a href="keranjang" class="block py-2 text-gray-700 hover:bg-gray-100 flex items-center px-3">
                                        <span class="material-symbols-outlined me-2" id="profile-button">
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
        <!--HTML CODE-->
        <div class="mx-auto max-w-screen-xl">
            <div class="swiper progress-slide-carousel swiper-container relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="rounded-2xl flex justify-center items-center  mb-0">
                            <img src="<?php echo base_url()?>assets/img/home/<?php echo $home['gambar_1'] ?>"
                                alt="First slide" class="rounded">
                                
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="rounded-2xl flex justify-center items-center mb-0">
                            <img src="<?php echo base_url()?>assets/img/home/<?php echo $home['gambar_2'] ?>"
                                alt="First slide" class="rounded">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>







    <!--  Start Produk-->
    <section class="service" id="produk">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Produk</h2>
            <p class="mt-4 max-w-md text-gray-500">
                Produk ChelseaFootwear
            </p>
            <ul class="product-container-list mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <?php

                    $query_mysql = mysqli_query(mysqli_connect("localhost","root",'',"website_pandawa"), "SELECT * FROM produk");
                    while($produk = mysqli_fetch_array($query_mysql)){ ?>
                <li>
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $produk['id']);
                    echo form_hidden('qty', 1);            
                    echo form_hidden('price',  $produk['harga']);
                    echo form_hidden('name', $produk['nama_produk']);
                    echo form_hidden('redirect_page', str_replace('index.php/','', current_url()));
                    ?>
                    
                    <a href="#" class="group block overflow-hidden">
                    <img src="<?php echo base_url()?>assets/img/produk/<?php echo $produk['gambar_satu'] ?>" alt="First slide">
                    <div class="flex justify-between mt-3">
                        <div class="">
                        <h3 class="text-gray-700"><?php echo $produk['nama_produk'] ?></h3>
                        <span class="tracking-wider text-gray-900 font-medium">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
                        </span>
                        </div>
                        <button href="favorite/add" class="hover:bg-gray-200 p-2 rounded-lg"><span class="material-symbols-outlined">favorite</span></button>
                        <button href="belanja/add" class="hover:bg-gray-200 p-2 rounded-lg"><span class="material-symbols-outlined">shopping_cart</span></button>
                    </div>
                    </a>   
                    <?php echo form_close()?>        
                </li>
                <?php } ?>
            </ul>

        </div>
    </section>
    </main>

    <!-- Footer -->
    <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.

  Plugins:
    - @tailwindcss/forms
-->

    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 pb-6 pt-16 sm:px-6 lg:px-8">
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