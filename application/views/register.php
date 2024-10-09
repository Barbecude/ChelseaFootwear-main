<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chelsea Footwear - Register</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/assets_web/img/logo.jpeg">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet">
    <style>
    .alert {
        margin-top: 10px;
    }
    </style>
</head>

<body class="register-page">
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">Register</p>
            <?php if (validation_errors() || $this->session->flashdata('result_register')) { ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong>
                <?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('result_register'); ?>
            </div>
            <?php } ?>
            <?php echo form_open('register/proses'); ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="nama" class="form-control" placeholder="Name" required />
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="u_name" class="form-control" placeholder="Username" required />
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="form-group has-feedback">
                <select name="kelamin" class="form-control" required>
                    <option value="">Pilih Kelamin</option>
                    <option value="l">Laki-laki</option>
                    <option value="p">Perempuan</option>
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required />
            </div>
            <div class="form-group has-feedback">
                <input type="number" name="hp" class="form-control" placeholder="Nomor HP" required />
            </div>
            <div class="form-group has-feedback">
                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required />
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="../login">Sudah Punya Akun?</a>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
    </script>
</body>

</html>
