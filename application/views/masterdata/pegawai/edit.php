<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-200">
    <section class="content-header p-4">
        <ol class="breadcrumb mb-4">
            <li>
                <a href="<?php echo base_url() ?>Dashboard" class="text-gray-300 hover:text-gray-400"><i class="fa fa-gears"></i> Home</a>
            </li>
            <li class="text-gray-400"><?php echo $breadcum; ?></li>
        </ol>
    </section>
    
    <hr class="border-gray-600">

    <!-- Main content -->
    <section class="content p-4">
        <div class="bg-gray-700 rounded-lg shadow-md p-6">
            <form class="space-y-4" id="submit" enctype="multipart/form-data">
                <input type="hidden" name="pid" id="pid" class="form-control" value="<?php echo $pegawai['pid']; ?>" required autocomplete="off">
                
                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" value="<?php echo $pegawai['nama']; ?>" required autocomplete="off">
                </div>

                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" value="<?php echo $pegawai['alamat']; ?>" required autocomplete="off">
                </div>

                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="hp">No HP</label>
                    <input type="text" name="hp" id="hp" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" value="<?php echo '0' . $pegawai['hp']; ?>" autocomplete="off">
                </div>

                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="kelamin">Jenis Kelamin</label>
                    <select name="kelamin" id="kelamin" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" required>
                        <option value=""></option>
                        <option value="l" <?php echo $pegawai['kelamin'] == 'l' ? 'selected' : ''; ?>>Laki - Laki</option>
                        <option value="p" <?php echo $pegawai['kelamin'] == 'p' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" value="<?php echo $pegawai['tempat_lahir']; ?>" required autocomplete="off">
                </div>

                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" value="<?php echo $pegawai['tanggal_lahir']; ?>" required autocomplete="off">
                </div>

                <div class="flex flex-col md:flex-row">
                    <label class="md:w-1/3 control-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="md:w-2/3 form-control bg-gray-800 border border-gray-600 rounded-lg p-2" value="<?php echo $pegawai['email']; ?>" autocomplete="off">
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg">Simpan</button>
                    <a href="<?php echo base_url() ?>Masterdata/pegawai" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg ml-4">Kembali</a>
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
                e.preventDefault(); 
                $.ajax({
                    url: '<?php echo base_url(); ?>Masterdata/pegawai_update',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data){
                        console.log(data);
                        alert("Data Berhasil Disimpan");
                        $(".preloader").fadeOut();
                        window.location.replace("<?php echo base_url('Masterdata/pegawai') ?>");
                    }
                });
            });
        });
    </script>
</body>
</html>
