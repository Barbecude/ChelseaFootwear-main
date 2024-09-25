<!DOCTYPE html>
<html>
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-gears"></i> Home</a></li>
            <li class="active"><?php echo $breadcum; ?></li>
        </ol>
    </section>
    <hr/>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form class="form-horizontal" id="submit" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row space">
                                <div class="col-md-2"><label class="control-label" for="iduser">Nama</label></div>
                                <div class="col-md-10">
                                    <input type="hidden" name="pid" id="pid" class="form-control" value="<?php echo $pegawai['pid']; ?>" required autocomplete="off">
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $pegawai['nama']; ?>" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="alamat">Alamat</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="alamat" id="alamat" value="<?php echo $pegawai['alamat']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="hp">No HP</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="hp" id="hp" value="<?php echo '0'.$pegawai['hp']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="jabatan">Jabatan</label></div>
                                <div class="col-md-10">
                                    <select name="jabatan" id="jabatan" class="form-control" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                            <?php foreach($jabatan as $j){ 
                                                if($j['jabatan_id']==$pegawai['jabatan']){?>
                                                    <option value="<?php echo $j['jabatan_id']; ?>" selected><?php echo $j['nama_jabatan']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $j['jabatan_id']; ?>"><?php echo $j['nama_jabatan']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="gelar">Gelar</label></div>
                                <div class="col-md-10">
                                    <select name="gelar" id="gelar" class="form-control" required>
                                        <option value="">-- Pilih Gelar --</option>
                                         <?php foreach($gelar as $g){ 
                                            if($g['id_gelar']==$pegawai['gelar']){?>
                                                <option value="<?php echo $g['id_gelar']; ?>" selected><?php echo $g['nama_gelar']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $g['id_gelar']; ?>"><?php echo $g['nama_gelar']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="kelamin">Jenis Kelamin</label></div>
                                <div class="col-md-10">
                                    <select name="kelamin" id="kelamin" class="form-control" required>
                                        <option value=""></option>
                                        <?php if($pegawai['kelamin']=='l'){?>
                                            <option value="l" selected>Laki - Laki</option>
                                        <?php }elseif($pegawai['kelamin']=='p'){?>
                                            <option value="p" selected>Perempuan</option>
                                        <?php }else{ ?>
                                            <option value="l">Laki - Laki</option>
                                            <option value="p">Perempuan</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="tempat_lahir">Tempat Lahir</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $pegawai['tempat_lahir']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="tgl_lahir">Tanggal Lahir</label></div>
                                <div class="col-md-10">
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $pegawai['tanggal_lahir']; ?>" class="form-control" required autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="agama">Agama</label></div>
                                <div class="col-md-10">
                                    <select name="agama" id="agama" class="form-control" required>
                                        <option value="">-- Pilih Agama --</option>
                                         <?php foreach($agama as $ag){ 
                                            if($ag['id_agama']==$pegawai['agama']){?>
                                                <option value="<?php echo $ag['id_agama']; ?>" selected><?php echo $ag['nama_agama']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $ag['id_agama']; ?>"><?php echo $ag['nama_agama']; ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <br><br>
                                <div class="col-md-2"><label class="control-label" for="tipe_pegawai">Tipe Pegawai</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="tipe_pegawai" id="tipe_pegawai" value="<?php echo $pegawai['tipe_pegawai']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="no_pegawai">No Pegawai</label></div>
                                <div class="col-md-10">
                                    <input type="text" name="no_pegawai" id="no_pegawai" value="<?php echo $pegawai['nomor_pegawai']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/>
                                <div class="col-md-2"><label class="control-label" for="email">Email</label></div>
                                <div class="col-md-10">
                                    <input type="email" name="email" id="email" value="<?php echo $pegawai['email']; ?>" class="form-control" autocomplete="off">
                                </div>
                                <br/><br/>
                            </div>
                            
                            <div class="row text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>Masterdata/pegawai" class="btn btn-warning">Kembali</a>
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
$(document).ready(function(){
    $(".preloader").fadeOut();
    $('#submit').submit(function(e){
        $(".preloader").fadeIn();
        e.preventDefault(); 
                $.ajax({
                    url:'<?php echo base_url();?>Masterdata/pegawai_update',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        console.log(data)
                        alert("Data Berhasil Disimpan");
                        $(".preloader").fadeOut();
                        window.location.replace("<?php echo base_url('Masterdata/pegawai')?>");
                    }
                });
        
        
    });
    });
</script>