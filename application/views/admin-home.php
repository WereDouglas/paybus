<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pay bus Administration</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="<?= base_url(); ?>admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url(); ?>admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?= base_url(); ?>admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?= base_url(); ?>admin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?= base_url(); ?>admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?= base_url(); ?>admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?= base_url(); ?>admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?= base_url(); ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" style="padding: 5px;" class="logo">
                    <img alt="LOGO" class="center-block" height="40px" width="100px" src="<?= base_url(); ?>images/paybus.png">
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->


                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('image') ?>" class="user-image" alt="image" />
                                    <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('image') ?>" class="img-circle" alt="User Image" />
                                        <p>
                                           <?php echo $this->session->userdata('username'); ?>
                                            
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                  
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url() . "index.php/user/profile/" . $this->session->userdata('userID'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() . "index.php/welcome/logout"; ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                      
                         <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/company/"; ?>">
                                <i class="fa fa-gears"></i> <span>Companies</span>
                                <small class="label pull-right bg-red"><?php echo count($companies); ?></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/route/"; ?>">
                                <i class="fa fa-road"></i> <span>Routes</span>
                                <small class="label pull-right bg-red"><?php echo count($routes); ?></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/bus/"; ?>">
                                <i class="fa fa-bus"></i> <span>Buses</span>
                                <small class="label pull-right bg-red"><?php echo count($buses); ?></small>
                            </a>
                        </li>

                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/driver/"; ?>">
                                <i class="fa fa-user"></i> <span>Drivers</span> 
                            </a>
                        </li>                      
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/device/"; ?>">
                                <i class="fa fa-phone"></i> <span>Devices</span>
                                <small class="label pull-right bg-red"><?php echo count($devices); ?></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/payment/"; ?>">
                                <i class="fa fa-paypal"></i> <span>Payments</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/expense/"; ?>">
                                <i class="fa fa-cart-plus"></i> <span>Expenses</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/payment/daily"; ?>">
                                <i class="fa fa-calendar"></i> <span>Daily reports</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/payment/periodic"; ?>">
                                <i class="fa fa-table"></i> <span>Periodic selection</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/sessions/periodic"; ?>">
                                <i class="fa fa-table"></i> <span>Periodic reports</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                         <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/user/"; ?>">
                                <i class="fa fa-group"></i> <span> Company users</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                         <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/role/"; ?>">
                                <i class="fa fa-table"></i> <span>Roles</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>
                         <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/user/admin"; ?>">
                                <i class="fa fa-server"></i> <span>Administration users</span>
                                <small class="label pull-right bg-yellow"></small>
                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <script language="javascript" type="text/javascript">
                        function resizeIframe(obj) {
                            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                            // obj.style.width = obj.contentWindow.document.body.scrollHeight + 'px';
                        }
                    </script>
                    <iframe id="frame" name="frame" frameborder="no" border="0" onload="resizeIframe(this)" scrolling="no"  style="padding:10px; min-height:1000px;" width="100%"  src="<?php echo base_url() . "index.php/home/start"; ?>"> </iframe>         


                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                  
                </div>
                <strong>Copyright &copy;Pay Bus <?php echo date('Y') ?></strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url(); ?>admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script type="text/javascript">
                        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?= base_url(); ?>admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?= base_url(); ?>admin/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?= base_url(); ?>admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?= base_url(); ?>admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?= base_url(); ?>admin/plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?= base_url(); ?>admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?= base_url(); ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="<?= base_url(); ?>admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src=<?= base_url(); ?>admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>admin/dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?= base_url(); ?>admin/dist/js/pages/dashboard.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url(); ?>admin/dist/js/demo.js" type="text/javascript"></script>
    </body>
</html>
