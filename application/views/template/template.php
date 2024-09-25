<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PT PANDAWA YOGASWARA ABADI TEKNOLOGI</title>
        <link rel="icon" type="image/x-icon" href="assets/img/logo.jpeg">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url('assets/js/plugins/morris/morris.css'); ?>" rel="stylesheet" >
        <!-- jvectormap -->
        <link href="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- landingpage -->
        <link href="<?php echo base_url('assets/assets_web/css/style.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }
        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            font: 14px arial;
        }
    </style>
    
    <body class="skin-blue">
        <div class="preloader">
            <div class="loading">
                <i class="fa fa-circle-o-notch"></i><!--Disini Kasih Logo Lebih Bagus-->
            </div>
        </div>
        <div class="wrapper">
            <?php echo $_header; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $_sidebar; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php echo $_content; ?> 
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2022 DEDY</strong> All rights reserved.
            </footer>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.min.js'); ?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url('assets/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url('assets/js/plugins/chartjs/Chart.min.js'); ?>" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url('assets/js/AdminLTE/dashboard2.js'); ?>" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/js/AdminLTE/demo.js'); ?>"></script> 

        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
    </body>
</html>
<script>
        $(document).ready(function(){
            $(".preloader").fadeOut();
        })
</script>
<script>
    $(function () {
        $('#tb-datatables').dataTable({"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]});       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');

    }); 

    $(document).ready(function(){
        $('#datepicker').datepicker();
    });

    let table = new DataTable('#table1', {
    // options
        "paging": true,
        "info"  : false,
        scrollX: true,
        scrollCollapse: true
    });
</script>