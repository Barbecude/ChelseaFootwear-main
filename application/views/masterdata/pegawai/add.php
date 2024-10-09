<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Dark Mode</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-300">
    <section class="py-4 px-8 bg-gray-800">
        <nav class="text-sm text-gray-400">
            <ol class="list-none p-0 inline-flex">
                <li><a href="<?php echo base_url()?>Dashboard" class="text-blue-400 hover:underline"><i class="fa fa-gears"></i> Home</a></li>
                <li class="ml-2">/ <?php echo $breadcum; ?></li>
            </ol>
        </nav>
    </section>
    <hr class="my-4 border-gray-700"/>

    <!-- Main content -->
    <section class="content mx-auto max-w-4xl">
        <div class="bg-gray-800 shadow-md rounded p-6">
            <form class="space-y-6" id="submit" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label for="nama" class="self-center text-gray-300">Nama</label>
                    <input type="text" name="nama" id="nama" class="col-span-2 border border-gray-600 bg-gray-700 rounded-md p-2 text-gray-300" required autocomplete="off">
                    
                    <label for="alamat" class="self-center text-gray-300">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="col-span-2 border border-gray-600 bg-gray-700 rounded-md p-2 text-gray-300" required autocomplete="off">

                    <label for="hp" class="self-center text-gray-300">No. HP</label>
                    <input type="text" name="hp" id="hp" class="col-span-2 border border-gray-600 bg-gray-700 rounded-md p-2 text-gray-300" autocomplete="off">

                    <label for="kelamin" class="self-center text-gray-300">Jenis Kelamin</label>
                    <select name="kelamin" id="kelamin" class="col-span-2 border border-gray-600 bg-gray-700 rounded-md p-2 text-gray-300" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="l">Laki - Laki</option>
                        <option value="p">Perempuan</option>
                    </select>

                    <label for="tgl_lahir" class="self-center text-gray-300">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="col-span-2 border border-gray-600 bg-gray-700 rounded-md p-2 text-gray-300" required autocomplete="off">

                    <label for="email" class="self-center text-gray-300">Email</label>
                    <input type="email" name="email" id="email" class="col-span-2 border border-gray-600 bg-gray-700 rounded-md p-2 text-gray-300" autocomplete="off">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-green-600 text-white rounded-md px-4 py-2 hover:bg-green-700">Simpan</button>
                    <a href="<?php echo base_url()?>Masterdata/pegawai" class="bg-yellow-600 text-white rounded-md px-4 py-2 ml-4 hover:bg-yellow-700">Kembali</a>
                </div>
            </form>
        </div>
    </section>

    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".preloader").fadeOut();
        $('#submit').submit(function(e){
            $(".preloader").fadeIn();
            var a = $('#password').val();
            var b = $('#confirm').val();

            if(a != b){
                alert('Konfirmasi Password Tidak Sesuai');
            } else {
                e.preventDefault();
                $.ajax({
                    url: '<?php echo base_url();?>Masterdata/pegawai_create',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data){
                        console.log(data)
                        alert("Data Berhasil Disimpan");
                        $(".preloader").fadeOut();
                        window.location.replace("<?php echo base_url('Masterdata/pegawai')?>");
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
