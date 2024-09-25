<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Profile</title>
    </head>

<body>
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
                    <span class="material-symbols-outlined cursor-pointer hover:bg-black-200 p-2" id="profile-button">
                        account_circle
                    </span>
                    <div id="profile-dropdown"
                        class="absolute right-0 mt-2 w-40 bg-white border border-black-200 rounded-md shadow-lg hidden z-50 transition">
                        <a class="block px-4 py-2 font-medium text-sm hover:bg-black-100 flex items-center"
                            href="<?php echo site_url('dashboard'); ?>">
                            <span class="material-symbols-outlined me-2" id="profile-button">
                                account_circle
                            </span>
                            <?php echo $this->session->userdata('nama') ?>
                        </a>

                        <hr>
                        <a class="block px-4 py-2 text-red-500 font-medium text-sm hover:bg-black-100 flex items-center"
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

        <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4">
            <a class="block" href="#">
                <span class="sr-only">Home</span>
                <img src="<?php echo base_url()?>assets/assets_web/img/icon/logo.png" class="logo-img" alt="LOGO"
                    style="width: 32px">
            </a>

            <div class="flex flex-1 items-center justify-end md:justify-between">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="text-black-500 transition hover:text-black-500/75" href="#"> About </a>
                        </li>

                        <li>
                            <a class="text-black-500 transition hover:text-black-500/75" href="#"> Careers </a>
                        </li>

                        <li>
                            <a class="text-black-500 transition hover:text-black-500/75" href="#"> History </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="hidden md:flex sm:gap-4">
                        <a class="" href="#">
                            <img src="<?php echo base_url()?>assets/assets_web/img/icon/favorite.svg"
                                class="rounded-md hover:bg-black-100 p-2.5">
                        </a>

                        <div class="hidden sm:flex">
                            <a class="" href="#">
                                <img src="<?php echo base_url()?>assets/assets_web/img/icon/cart.svg"
                                    class="rounded-md hover:bg-black-100 p-2.5">
                            </a>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <button class="rounded bg-black-100 p-2 text-black-600 transition hover:text-black-600/75">
                            <img src="assets/images/icon/menu.svg" class="text-black">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-screen-xl px-4 min-h-lvh">
        <h1 class="text-5xl font-semibold mb-8">Profile</h1>
        <?php
                    $koneksi = mysqli_connect("localhost","root",'',"website_pandawa");
                    $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
                    $data = mysqli_fetch_array($query_mysql);
                        ?>

        <form action="/update-profile" method="POST">
            <div class="mb-6">
                <label for="email" class="block text-black-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900" value="<?php echo $data('nama') ?>"
                    required>
            </div>


            <div class="mb-6">
                <label for="nama" class="block text-black-700 font-medium mb-2">Nama</label>
                <input type="text" id="nama" name="nama"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900"
                    required value="<?php echo $this->session->userdata('nama') ?>">
            </div>
            <div class="mb-6">
                <label for="username" class="block text-black-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900"
                    required value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>">
            </div>


            <div class=" mb-6">
                <label for="kelamin" class="block text-black-700 font-medium mb-2">Kelamin</label>
                <select id="kelamin" name="kelamin"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900"
                    required>
                    <option value="l">Laki-laki</option>
                    <option value="p">Perempuan</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="alamat" class="block text-black-700 font-medium mb-2">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900"
                    required>
            </div>
            <div class="mb-6">
                <label for="hp" class="block text-black-700 font-medium mb-2">Nomor HP</label>
                <input type="text" id="hp" name="hp"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900"
                    required>
            </div>
            <div class="mb-6">
                <label for="tgl_lahir" class="block text-black-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900"
                    required>
            </div>
            <button type="submit"
                class="bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Save</button>
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