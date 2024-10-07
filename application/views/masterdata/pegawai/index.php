<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-800 dark:text-gray-200">
    <section class="content-header px-4">
        <ol class="flex items-center whitespace-nowrap mb-4">
            <li class="inline-flex items-center font-medium">
                <a href="<?php echo base_url(); ?>/dashboard" class="flex items-center text-sm text-gray-300 hover:text-gray-400 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500">
                Home
                </a>
                <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex font-medium items-center text-sm font-semibold text-gray-600 truncate cursor-default" aria-current="page">
            <?php echo $breadcum; ?>
            </li>
        </ol>
    </section>
    <section class="content p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-lg font-semibold"><?php echo $breadcum; ?></h1>
                <p class="text-gray-300">Semua informasi tentang user anda termasuk nama, alamat, dan tempat tanggal lahir mereka.</p>
            </div>
            <a href="<?php echo base_url().$link_tambah?>" class="bg-indigo-600 hover:bg-indigo-700 ring-indigo-900 active:ring active:bg-indigo-200 flex items-center gap-2 font-medium text-white py-2 px-3 rounded"><span class="material-symbols-rounded">add</span>Tambah Data</a>
        </div>

            <table class="text-sm text-left w-full rounded-lg text-gray-400 overflow-hidden">
                <thead class="text-xs bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="px-5 py-5">No</th>
                        <th scope="col" class="px-5 ">Nama</th>
                        <th scope="col" class="px-5 ">Jenis Kelamin</th>
                        <th scope="col" class="px-5 ">Tempat, Tanggal Lahir</th>
                        <th scope="col" class="px-5 ">Alamat</th>
                        <th scope="col" class="px-5 ">No HP</th>
                  
                   
                        <th scope="col" class="px-5 ">Status</th>
                        <th scope="col" class="px-5 ">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($pegawai as $pgw) { ?>
                        <tr class="bg-gray-800 border-b border-gray-700 transition">
                            <td class="px-5 py-5"><?php echo $i++; ?></td>
                            <td class="px-5 py-5">
                                <div class="font-medium text-white"><?php echo $pgw['nama']; ?></div>
                                <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo $pgw['email']; ?></div>
                            </td>
                            <td class="px-5 py-5 text-gray-400"><?php echo $pgw['kelamin'] == 'l' ? 'Laki - Laki' : 'Perempuan'; ?></td>
                            <td class="px-5 py-5 text-gray-400"><?php echo $pgw['tempat_lahir'] . ', ' . date('d M Y', strtotime($pgw['tanggal_lahir'])); ?></td>
                            <td class="px-5 py-5 text-gray-400">
                                    <button onclick="openModal('<?php echo addslashes($pgw['alamat']); ?>')" class="text-blue-500 hover:underline">
                                        Lihat Alamat
                                    </button>
                            </td>

                              <!-- Modal -->
                            <div id="alamatModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                                <div class="bg-gray-800 p-6 rounded shadow-md max-w-xs w-full">
                                    <span class="block text-right cursor-pointer text-white" onclick="closeModal()">&times;</span>
                                    <p id="modalAlamat" class="mt-4 text-gray-300"></p>
                                </div>
                            </div>

                            <td class="px-5 py-5 text-gray-400"><?php echo '0' . $pgw['hp']; ?></td>
                           
                          
                            <td class="px-5 py-5">
                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium 
                                    <?php echo $pgw['aktif'] == 't' ? 'bg-green-800/30 text-green-500' : 'bg-red-800/30 text-red-500'; ?>">
                                    <span class="inline-block rounded-full 
                                        <?php echo $pgw['aktif'] == 't' ? 'bg-green-500' : 'bg-red-500'; ?>" style="width: 8px; height: 8px;"></span>
                                    <?php echo $pgw['aktif'] == 't' ? 'Active' : 'Non Active'; ?>
                                </span>
                            </td>
                            <td class="px-5 py-5 text-gray-400">
                                <a href="<?php echo base_url() ?>Masterdata/pegawai_edit/<?php echo $pgw['pid'] ?>" class="text-indigo-500 font-medium hover:text-indigo-600" title="Edit Data">Edit</a>
                                &nbsp;
                                <a href="<?php echo base_url() ?>Masterdata/pegawai_delete/<?php echo $pgw['pid'] ?>" class="<?php echo $pgw['aktif'] == 't' ? 'font-medium text-green-500 hover:text-green-600' : 'font-medium text-red-500 hover:text-red-600'; ?>" title="<?php echo $pgw['aktif'] == 't' ? 'Non Aktifkan' : 'Aktifkan'; ?>">
                                    <?php echo $pgw['aktif'] == 't' ? 'Non Aktifkan' : 'Aktif'; ?>
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')" href="<?php echo base_url() ?>Masterdata/pegawai_hapus/<?php echo $pgw['pid'] ?>" class="font-medium text-red-600 hover:text-red-700" title="Hapus Data">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </section>

    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".preloader").fadeOut();
        });
        function openModal(alamat) {
    document.getElementById('modalAlamat').innerText = alamat;
    document.getElementById('alamatModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('alamatModal').classList.add('hidden');
}
</script>
    </script>
    
</body>
</html>
