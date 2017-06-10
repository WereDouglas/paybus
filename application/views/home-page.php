<!DOCTYPE html>
<html class="no-js">

    <head>
        <title>Pay bus</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?php echo $this->session->userdata('company'); ?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php echo $this->session->userdata('username'); ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" target="frame" href="<?php echo base_url() . "index.php/user/profile/" . $this->session->userdata('userID'); ?>">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" target="frame" href="<?php echo base_url() . "index.php/company/profile/" . $this->session->userdata('companyID'); ?>">Company profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1"  href="<?php echo base_url() . "index.php/welcome/logout"; ?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a target="frame" href="<?php echo base_url() . "index.php/welcome/start"; ?>">Dashboard</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" target="frame" href="<?php echo base_url() . "index.php/user/"; ?>">User List</a>
                                    </li>

                                    <li>
                                        <a tabindex="-1" target="frame" href="<?php echo base_url() . "index.php/role/"; ?>">Permissions</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a  class="navbar-brand" href="#"><img alt="logo" height="50px" width="80px" src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('companyImage') ?>">

                            </a>
                        </li>
                        <li >
                            <a  class="navbar-brand" href="#"><img alt="user" height="50px" width="80px" src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('image') ?>">

                            </a>
                        </li>
                        <li class="active">
                            <a target="frame" href="<?php echo base_url() . "index.php/welcome/start"; ?>"><i class="fa fa-road"></i><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>

                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/route/"; ?>"><span class="badge badge-warning pull-right"><?php echo count($routes); ?></span><i class="fa fa-road"></i>Routes</a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/bus/"; ?>"><span class="badge badge-info pull-right"><?php echo count($buses); ?></span><i class="fa fa-bus "></i>Buses </a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/driver/"; ?>"><i class="fa fa-area-chart"></i>Drivers</a>
                        </li>

                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/device/"; ?>"><i class="fa fa-arrow-circle-o-up"></i>Devices</a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/sessions/"; ?>"><i class="fa fa-barcode"></i>Payment session</a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/payment/"; ?>"><i class="fa fa-barcode"></i>Payments</a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/expense/"; ?>"><span class="badge badge-important pull-right"><?php echo count($expenses_today); ?></span><i class="fa fa-barcode"></i>Expenses</a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/payment/daily"; ?>"><span class="badge badge-success pull-right"><?php echo count($payments_today); ?></span> <?php echo date('d-M-y') ?></a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/payment/periodic"; ?>"><span class="badge badge-info pull-right"></span> Generic reports</a>
                        </li>
                        <li>
                            <a target="frame" href="<?php echo base_url() . "index.php/sessions/periodic"; ?>"><span class="badge badge-info pull-right"></span> Daily reports</a>
                        </li>

                    </ul>
                </div>

                <!--/span-->
                <div class="span10" id="content">

                    <script language="javascript" type="text/javascript">
                        function resizeIframe(obj) {
                            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                            // obj.style.width = obj.contentWindow.document.body.scrollHeight + 'px';
                        }
                    </script>
                    <iframe id="frame" name="frame" frameborder="no" border="0" onload="resizeIframe(this)" scrolling="no"  style="padding:10px; min-height:1000px;" width="100%"  src="<?php echo base_url() . "index.php/home/start"; ?>"> </iframe>         


                </div>

            </div>
        </div>
        <hr>
        <footer>
            <p>&copy; Pay Bus <?php echo date('Y') ?></p>
        </footer>
    </div>
    <!--/.fluid-container-->
    <script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/scripts.js"></script>
    <script>
                        $(function () {
                            // Easy pie charts
                            $('.chart').easyPieChart({animate: 1000});
                        });
    </script>
</body>

</html>