<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Profile</title>
    </head>

<body>
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
                        <a class="relative rounded-r-lg border hover:bg-gray-50 p-2.5 flex gap-2" href="<?php echo site_url('keranjang'); ?>">
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
                        <div id="profile-dropdown"
                            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg hidden z-50 transition">
                            <a class="block px-4 py-2 font-medium text-sm hover:bg-gray-100 flex items-center"
                                href="<?php echo base_url('profile/'.$this->session->userdata('pid')); ?>">
                                <span class="material-symbols-outlined me-2" id="profile-button">
                                    account_circle
                                </span>
                                <?php echo $this->session->userdata('nama') ?>
                            </a>
                            <?php if ($this->session->userdata('role') == 'Admin') : ?>
                            <a class="block px-4 py-2  text-black font-medium text-sm hover:bg-gray-100 flex items-center"
                                href="<?php echo site_url('dashboard'); ?>">
                                <span class="material-symbols-outlined me-2">
                                    dashboard 
                                </span>
                                Dashboard
                            </a>
                            <?php endif; ?>
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
                                <a href="<?= base_url('keranjang') ?>" class="block py-2 text-gray-700 hover:bg-gray-100 flex items-center px-3">
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




<!-- HALAMAN PROFILE MULAI -->
    <main class="mx-auto max-w-screen-xl px-4 min-h-lvh">
        <h1 class="text-5xl font-semibold mb-8">Profile</h1>
                        <form action="profile/update_profile" method="POST">
                    <div class="mb-6">
                        <label for="email" class="block text-black-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            value="<?php echo $profile['email']; ?>" required>
                    </div>

                    <div class="mb-6">
                        <label for="nama" class="block text-black-700 font-medium mb-2">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            required value="<?php echo $profile['nama']; ?>">
                    </div>

                    <div class="mb-6">
                        <label for="username" class="block text-black-700 font-medium mb-2">Username</label>
                        <input type="text" id="username" name="username"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            required value="<?php echo $profile['u_name']; ?>">
                    </div>

                    <div class=" mb-6">
                        <label for="kelamin" class="block text-black-700 font-medium mb-2">Kelamin</label>
                        <select id="kelamin" name="kelamin"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            required>
                            <option value="l" <?php echo $profile['kelamin'] == 'l' ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="p" <?php echo $profile['kelamin'] == 'p' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="alamat" class="block text-black-700 font-medium mb-2">Alamat</label>
                        <input type="text" id="alamat" name="alamat"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            required value="<?php echo $profile['alamat']; ?>">
                    </div>

                    <div class="mb-6">
                        <label for="hp" class="block text-black-700 font-medium mb-2">Nomor HP</label>
                        <input type="text" id="hp" name="hp"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            required value="<?php echo $profile['hp']; ?>">
                    </div>

                    <div class="mb-6">
                        <label for="tgl_lahir" class="block text-black-700 font-medium mb-2">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" 
                            required value="<?php echo $profile['tanggal_lahir']; ?>">
                    </div>

                    <button type="submit" class="bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Save</button>
                </form>

    </main>




























    <script>
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
    </script>
</body>

</html>