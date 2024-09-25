<!DOCTYPE html>
<html>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home </a></li>
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
                        <div class="row space">
                            <input type="hidden" name="id_surat_keluar" id="id_surat_keluar" class="form-control"
                                value="<?php echo $surat_keluar['id_surat_keluar']; ?>" required autocomplete="off">
                            <div class="col-md-2"><label class="control-label" for="nomor_surat"> Nomor Surat </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="nomor_surat" id="nomor_surat"
                                    value="<?php echo $surat_keluar['nomor_surat']; ?>" class="form-control" required
                                    autocomplete="off">
                            </div>
                            <div class="col-md-2"><label class="control-label" for="lampiran"> Lampiran Surat </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="lampiran" id="lampiran"
                                    value="<?php echo $surat_keluar['lampiran']; ?>" class="form-control" required
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="row space">
                            <div class="col-md-2"><label class="control-label" for="hal"> Perihal </label></div>
                            <div class="col-md-3">
                                <input type="text" name="hal" id="hal" value="<?php echo $surat_keluar['hal']; ?>"
                                    class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-2"><label class="control-label" for="kepada"> Kepada </label></div>
                            <div class="col-md-3">
                                <input type="text" name="kepada" id="kepada"
                                    value="<?php echo $surat_keluar['kepada']; ?>" class="form-control" required
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="row space">
                            <div class="col-md-2"><label class="control-label" for="lokasi"> Lokasi </label></div>
                            <div class="col-md-3">
                                <input type="text" name="lokasi" id="lokasi"
                                    value="<?php echo $surat_keluar['lokasi']; ?>" class="form-control" required
                                    autocomplete="off">
                            </div>
                            <div class="col-md-2"><label class="control-label" for="tanggal_surat"> Tanggal Surat
                                </label></div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_surat" id="tanggal_surat"
                                    value="<?php echo $surat_keluar['tanggal_surat']; ?>" class="form-control" required
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="row space">
                            <div class="col-md-2"><label class="control-label" for="penanda_tangan"> Penanda Tangan
                                </label></div>
                            <div class="col-md-3">
                                <input type="text" name="penanda_tangan" id="penanda_tangan"
                                    value="<?php echo $surat_keluar['penanda_tangan']; ?>" class="form-control" required
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="row space">
                            <div class="col-md-2"><label class="control-label" for="text_surat"> Text Surat </label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="text_surat" id="text_surat" cols="40" rows="20"
                                    value="<?php echo $surat_keluar['text_surat']; ?>" class="form-control" required
                                    autocomplete="off"></textarea>
                            </div>
                        </div>

                        <br />
                        <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo base_url()?>surat/keluar/index"
                            class="btn btn-warning">Kembali</a>
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
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url();?>surat/keluar_edit_simpan',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                console.log(data)
                alert("Surat Berhasil Disimpan");
                $(".preloader").fadeOut();
                window.location.replace("<?php echo base_url('surat/keluar')?>");
            }
        });
    });
});
</script>