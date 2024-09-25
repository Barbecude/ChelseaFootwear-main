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
                            <div class="container">
                                <body>
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label" for="nomor"><p>Nomor </p></label>
                                        </div>
                                        <div class="col-md-2">:</div>
                                        <div class="col-md-8"><?php echo $masuk['nomor']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label" for="lampiran"><p>Lampiran </p></label>
                                        </div>
                                        <div class="col-md-2">:</div>
                                        <div class="col-md-8"><?php echo $masuk['lampiran']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label" for="perihal"><p>Perihal </p></label>
                                        </div>
                                        <div class="col-md-2">:</div>
                                        <div class="col-md-8"><?php echo $masuk['perihal']?></div>
                                    </div>

                                    <div class="row text-center">
                                        <p> <img src="<?php echo base_url()?>assets/img/<?php echo $masuk['foto_berkas']?>" width="500px" height="750px"> </p>
                                    </div>
                                    <a href="<?php echo base_url()?>surat/masuk/index" class="btn btn-warning">Kembali</a>
                                    
                                </body>
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
    });
</script>
