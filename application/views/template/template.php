<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PANDAWA YOGASWARA ABADI TEKNOLOGI</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.jpeg">

    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Ionicons (Jika diperlukan) -->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Custom styles -->
    <link href="<?php echo base_url('assets/assets_web/css/style.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<style>
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }
</style>

<body class="bg-gray-100">
    <!-- Preloader -->
    <div class="preloader flex items-center justify-center bg-white">
        <div class="loading">
            <i class="fa fa-circle-o-notch animate-spin text-gray-700"></i>
        </div>
    </div>

    <!-- Wrapper -->
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-blue-500 text-white p-4 hidden">
            <?php echo $_header; ?>
        </header>

        <!-- Sidebar dan Konten Utama -->
        <div class="flex flex-grow">
            <!-- Sidebar -->
            <aside class="w-64 bg-gray-800 text-white">
                <?php echo $_sidebar; ?>
            </aside>

            <!-- Content -->
            <main class="flex-grow bg-gray-900 text-white p-6">
                <h1 class="text-2xl font-bold mb-4"></h1>
                <?php echo $_content; ?>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white p-4">
            <div class="text-sm">
                <b>Version</b> 1.0
            </div>
            <div class="text-xs">
                <strong>&copy; 2022 DEDY</strong> All rights reserved.
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>

    <!-- DataTables dan Custom Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            // Menghilangkan preloader
            $(".preloader").fadeOut();

            // DataTable
            $('#tb-datatables').DataTable({
                "paging": true,
                "info": false,
                scrollX: true,
                scrollCollapse: true,
                "aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]
            });

            // Menambah kelas Tailwind pada input search
            $('.dataTables_filter input').addClass('p-2 border rounded').attr('placeholder', 'Search');

            // Datepicker (jika masih digunakan)
            $('#datepicker').datepicker();
        });
    </script>
</body>
</html>
