<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="bg-gray-800 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <section class="content-header">
    <ol class="flex items-center whitespace-nowrap mb-4">
        <li class="inline-flex items-center font-medium">
            <a href="<?php echo base_url(); ?>/dashboard" class="flex items-center text-sm text-gray-300 hover:text-gray-400 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
            Home
            </a>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
        </li>
        <li class="inline-flex items-center font-medium">
            <a href="<?php echo base_url(); ?>/produk" class="flex items-center text-sm text-gray-300 hover:text-gray-400 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
            Produk
            </a>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
        </li>
        <li class="inline-flex font-medium items-center text-sm font-semibold text-gray-600 truncate cursor-default" aria-current="page">
            Tambah data
        </li>
    </ol>
    </section>
    <section class="content mt-4">
            <form id="submit" enctype="multipart/form-data" class="grid grid-cols-2 gap-5">
                <div class="w-full p-4 border-2 border-dashed border-gray-600 rounded-lg text-center cursor-pointer transition relative flex flex-col justify-center gap-5" id="drop-area">
                    <div id="drag-text">
                        <svg class="mx-auto h-12 w-12 text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                        </svg>
                        <p class="pl-1 mt-4">Seret dan jatuhkan gambar disini atau <span class="text-indigo-500 font-medium cursor-pointer hover:text-indigo-500">klik di sini</span> untuk memilih gambar</p>
                        <p class="text-xs leading-5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                    </div>
                    <img id="preview" src="#" alt="Preview" class="mt-4 hidden" />
                    <div id="delete-overlay" class="absolute inset-0 bg-gray-700 bg-opacity-70 hidden flex items-center justify-center text-red-600 text-xl font-semibold">Hapus Gambar</div>
                    <input type="file" name="gambar_satu" id="gambar_satu" class="hidden">
                </div>
                
                <div class="bg-gray-800 rounded-xl border border-gray-600">
                    <div class="border-b border-gray-600 p-4">
                            <h4 class="text-xl font-medium">Informasi Produk</h4>
                    </div>
                    <div class="p-4">
                        <div>
                            <label for="nama_produk" class="block text-gray-300 mt-2">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" required autocomplete="off">
                        </div>
                        <div>
                            <label for="jenis" class="block text-gray-300 mt-2">Jenis</label>
                            <input type="text" name="jenis" id="jenis" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" required autocomplete="off">
                        </div>
                        

                        <div>
                            <label for="harga" class="block text-gray-300 mt-2">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full" required autocomplete="off">
                        </div>
                        <div>
                            <label for="deskripsi" class="block text-gray-300 mt-2">Deskripsi</label>
                            <textarea type="text" name="deskripsi" id="deskripsi" placeholder="Jelaskan detail produk disini" class="form-control bg-gray-900 mt-1 p-2 border border-gray-600 rounded-lg w-full max-h-40" required autocomplete="off"></textarea>
                            </div></div>
                </div>

                <div class="flex justify-end gap-3 col-span-2">
                        <a href="<?php echo base_url() ?>Produk/index" class="ml-4 font-medium text-red-600 hover:text-red-700 py-2 px-3 gap-2 flex items-center">Batal</span>
                        </a>
                        <button class="bg-indigo-600 hover:bg-indigo-800 active:ring-2 ring-indigo-800 font-medium text-white py-2 px-3 flex items-center gap-2 rounded" type="submit"><span class="material-symbols-rounded">save</span> Simpan
                        </button>
                </div>
            </form>
    </section>
    

    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <script type="text/javascript">
     const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('gambar_satu');
const imgElement = document.getElementById('preview');
const dragText = document.getElementById('drag-text');
const deleteOverlay = document.getElementById('delete-overlay');
let selectedFile; // Variable to hold the selected file

// Trigger input file on drop area click
dropArea.addEventListener('click', () => {
    fileInput.click();
});

// Handle file drop
dropArea.addEventListener('drop', (event) => {
    event.preventDefault();
    dropArea.classList.remove('bg-gray-600');

    const files = event.dataTransfer.files; // Get the dropped files
    if (files.length > 0) {
        selectedFile = files[0]; // Store the selected file
        displayImage(selectedFile);
    }
});

// Handle file input change
fileInput.addEventListener('change', (event) => {
    const files = event.target.files; // Get the selected files
    if (files.length > 0) {
        selectedFile = files[0]; // Store the selected file
        displayImage(selectedFile);
    }
});

// Function to display image
function displayImage(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        imgElement.src = e.target.result; // Set src for the image
        imgElement.classList.remove('hidden'); // Show the image
        dragText.classList.add('hidden'); // Hide the drag text
    }
    reader.readAsDataURL(file); // Read the file as a Data URL
}

// Show overlay on hover
dropArea.addEventListener('mouseenter', () => {
    if (!fileInput.files.length) return; // Check if there are no files
    deleteOverlay.classList.remove('hidden'); // Show overlay
});

dropArea.addEventListener('mouseleave', () => {
    deleteOverlay.classList.add('hidden'); // Hide overlay
});

// Remove image on overlay click
deleteOverlay.addEventListener('click', () => {
    imgElement.src = "#"; // Reset src
    imgElement.classList.add('hidden'); // Hide the image
    fileInput.value = ""; // Reset the file input
    selectedFile = null; // Reset the selected file
    deleteOverlay.classList.add('hidden'); // Hide overlay
});

// Prevent default behavior on drag over
dropArea.addEventListener('dragover', (event) => {
    event.preventDefault(); // Prevent default to allow drop
    dropArea.classList.add('bg-gray-600'); // Change background color
});

// Remove background color on drag leave
dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('bg-gray-600'); // Remove background color
});

// Handle form submission
$('#submit').submit(function(e) {
    e.preventDefault(); 

    const formData = new FormData(this); // Create FormData from the form
    if (selectedFile) {
        formData.append('gambar_satu', selectedFile); // Append the selected file
    }

    $.ajax({
        url: '<?php echo base_url(); ?>Produk/produk_create',
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            console.log(data);
            alert("Data Berhasil Disimpan");
            $(".preloader").fadeOut();
            window.location.replace("<?php echo base_url('Produk/index') ?>");
        }
    });
});


    </script>
</body>
</html>
