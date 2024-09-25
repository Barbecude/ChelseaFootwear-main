<!DOCTYPE html>
<html>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Tambah Peminjaman </a></li>
        <li class="active"><?php echo $breadcum; ?></li>
    </ol>
</section>
<hr />
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form class="form-horizontal" id="submit" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="id_peminjaman" id="id_peminjaman"
                            value="<?= $this->session->u_id ?>">
                        <div class="row space">
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="tanggal_pnjm"> Tanggal </label>
                                </div>
                                <input type="date" name="tanggal_pnjm" id="tanggal_pnjm" class="form-control" required
                                    autocomplete="off">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="karyawan"> Karyawan </label>
                                </div>
                                <input type="text" name="karyawan" id="karyawan" class="form-control" required
                                    autocomplete="off">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="pinjaman_ke"> Pinjaman Ke-
                                    </label></div>
                                <input type="text" name="pinjaman_ke" id="pinjaman_ke" class="form-control" required
                                    autocomplete="off">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="tipe_pinjaman"> Tipe Pinjaman
                                    </label></div>
                                <input type="text" name="tipe_pinjaman" id="tipe_pinjaman" class="form-control" required
                                    autocomplete="off">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="jumlah_pinjaman"> Jumlah
                                        Pinjaman </label></div>
                                <input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control"
                                    required autocomplete="off">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="jenis_pinjaman"> Jenis Pinjaman
                                    </label></div>
                                <input type="text" name="jenis_pinjaman" id="jenis_pinjaman" class="form-control"
                                    required autocomplete="off">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2"><label class="control-label" for="besar_cicilan"> Besar Cicilan
                                    </label></div>
                                <input type="text" name="besar_cicilan" id="besar_cicilan" class="form-control" required
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="row text-center">
                            <button class="btn btn-success" type="submit"><i
                                    class="fa fa-download">&nbsp&nbsp</i>Simpan</button>&nbsp;&nbsp;&nbsp;<a
                                href="<?php echo base_url()?>peminjaman/index" class="btn btn-warning"><i
                                    class="fa fa-angle-left">&nbsp&nbsp</i>Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</html>

<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".preloader").fadeOut();
    $('#submit').submit(function(e) {
        $(".preloader").fadeIn();
        var a = $('#password').val();
        var b = $('#confirm').val();

        if (a != b) {
            alert('Confirmasi Password Tidak Sesuai');
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url();?>Peminjaman/add_peminjaman',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    console.log(data)
                    alert("Data Peminjaman Berhasil Disimpan");
                    $(".preloader").fadeOut();
                    window.location.replace("<?php echo base_url('peminjaman/index')?>");
                }
            });
        }


    });
});
</script>