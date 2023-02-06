<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SILSP (Sistem Informasi LSP)</title>

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/Favicon/favicon.ico">
    <!-- ========== COMMON STYLES ========== -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Theme/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Theme/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Theme/css/animate-css/animate.min.css" media="screen">

    <!-- ========== PAGE STYLES ========== -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Theme/css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->

    <!-- ========== THEME CSS ========== -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Theme/css/main.css" media="screen">

    <!-- ========== MODERNIZR ========== -->
    <script src="<?php echo base_url() ?>assets/Theme/js/modernizr/modernizr.min.js"></script>
</head>

<body class="">
    <div class="main-wrapper">
        <div class="">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <section class="section">
                        <div class="row mt-20">
                            <div class="col-md-50 col-md-offset-1 pt-50">

                                <div class="row mt-100 ">
                                    <div class="col-md-11 col-lg-12 col-sm-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title text-center">
                                                    <img src="<?= base_url('assets/img/logo.png') ?>" width="150px">
                                                    <h4>HALAMAN LOGIN</h4>
                                                    <p><strong>LSP P1 - SMKN 4 GARUT</strong></p>
                                                </div>
                                            </div>
                                            <div class=" panel-body p-20">
                                                <form class="form-horizontal" action="<?php echo site_url('clogin/cek_login'); ?>" method="post">
                                                    <div class="form-group">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="form-control btn btn-primary">MASUK</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                        <p class="text-muted text-center"><small>Development By &copy; 2023 <a href="https://smknegeri1garut.sch.id">TEFA-SMEA</a></small></p>
                                    </div>
                                    <!-- /.col-md-11 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </section>

                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4"></div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="<?php echo base_url() ?>assets/Theme/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Theme/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Theme/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Theme/js/pace/pace.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Theme/js/lobipanel/lobipanel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/Theme/js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->

    <!-- ========== THEME JS ========== -->
    <script src="<?php echo base_url() ?>assets/Theme/js/main.js"></script>
    <script>
        $(function() {

        });
    </script>

    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>