<!DOCTYPE html>  <?php //echo $this->session->userdata('views'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pay bus</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME ICONS STYLES-->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
        <!--CUSTOM STYLES-->
        <link href="<?php echo base_url(); ?>assets/css/style.css?=new<?php echo date('d-m-Y'); ?>" rel="stylesheet" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel=icon href="<?= base_url(); ?>images/favicon.ico">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  class="navbar-brand" href="#"><img alt="avatar" height="50px" width="80px" src="<?= base_url(); ?>uploads/<?php echo $this->session->userdata('companyImage')?>">

                    </a>
                </div>

                <div class="notifications-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 1</strong>
                                                <span class="pull-right text-muted">60% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See Tasks List + </strong>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>

                                <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('image'); ?>" height="20px" width="20px" class="img-circle" />
                            </a>
                          
                            <ul class="dropdown-menu dropdown-user">
                                <li><a  target="frame"  href="<?php echo base_url() . "index.php/user/profile/" . $this->session->userdata('userID');?>"><i class="fa fa-user-plus"></i> My Profile</a>
                                </li>
                                  <?php if ($this->session->userdata('companyID') != "") { ?>
                                 <li><a target="frame"  href="<?php echo base_url() . "index.php/company/profile/" . $this->session->userdata('companyID');?>"><i class="fa fa-sign-out"></i> Company profile</a>
                                  <?php } ?>
                                <li class="divider"></li>
                                <li><a  href="<?php echo base_url() . "index.php/welcome/logout"; ?>"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>

                        </li>
                        <li class="dropdown">

                            <a target="frame" href="<?php echo base_url() . "index.php/payment/pay"; ?>">
                                Make payment  
                                <img src="<?php echo base_url(); ?>images/cash.png" height="20px" width="20px" class="img-circle" />
                            </a>

                        </li>
                    </ul>

                </div>
            </nav>
            <?php 
            if ($this->session->userdata('permission') != "Administrator") {
                
                $sidebar = "sidebar_admin";
            }
            
            ?>
            <!-- /. NAV TOP  -->
            <nav  class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                        <li>
                            <a  href="#"> <strong> Pay Bus </strong></a>

                        </li>


                        <li>
                            <a class="active-menu"  target="frame" href="<?php echo base_url() . "index.php/welcome/start"; ?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                        </li>
                        <?php if (strpos($this->session->userdata('views'), 'administrators') == true) { ?>
                        <li class="<?php echo  $sidebar;?>">
                                <a target="frame" href="<?php echo base_url() . "index.php/administrator/"; ?>"><i class="fa fa-connectdevelop"></i>Administrators</a>

                            </li>
                        <?php } ?>
                        <?php if (strpos($this->session->userdata('views'), 'users') == true) { ?>
                           <li class="<?php echo  $sidebar;?>">
                                <a target="frame" href="<?php echo base_url() . "index.php/user/"; ?>"><i class="fa fa-user "></i>System users</a>
                            </li>
                        <?php } ?>

                        <?php if (strpos($this->session->userdata('views'), 'company') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/company/"; ?>"><i class="fa fa-connectdevelop"></i>Company </a>

                            </li>
                        <?php } ?>
                        <?php if (strpos($this->session->userdata('views'), 'routes') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/route/"; ?>"><i class="fa fa-road"></i>Routes</a>

                            </li>
                        <?php } ?>
                        <?php if (strpos($this->session->userdata('views'), 'buses') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/bus/"; ?>"><i class="fa fa-bus "></i>Buses </a>

                            </li>
                        <?php } ?>
                        <?php if (strpos($this->session->userdata('views'), 'drivers') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/driver/"; ?>"><i class="fa fa-area-chart"></i>Drivers</a>
                            </li>
                        <?php } ?>

                        <?php if (strpos($this->session->userdata('views'), 'roles') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/role/"; ?>"><i class="fa fa-user "></i>Permissions & roles</a>
                            </li>
                        <?php } ?>
                        <?php if (strpos($this->session->userdata('views'), 'devices') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/device/"; ?>"><i class="fa fa-arrow-circle-o-up"></i>Devices</a>
                            </li>
                        <?php } ?>
                         <?php if (strpos($this->session->userdata('views'), 'sessions') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/sessions/"; ?>"><i class="fa fa-barcode"></i>Payment session</a>
                            </li>
                        <?php } ?>


                        <?php if (strpos($this->session->userdata('views'), 'payments') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/payment/"; ?>"><i class="fa fa-barcode"></i>Payments</a>
                            </li>
                        <?php } ?>
                        
                        <?php if (strpos($this->session->userdata('views'), 'expenses') == true) { ?>
                            <li>
                                <a target="frame" href="<?php echo base_url() . "index.php/expense/"; ?>"><i class="fa fa-barcode"></i>Expenses</a>
                            </li>
                        <?php } ?>
                        <?php if (strpos($this->session->userdata('views'), 'reports') == true) { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-area-chart"></i>  <i class="fa fa-caret-down"></i>
                                    Reports
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a target="frame" href="<?php echo base_url() . "index.php/payment/daily"; ?>"><i class="fa fa-calendar"></i> Generic</a>
                                    </li>
                                    <li class="divider"></li>
                                     <li><a target="frame" href="<?php echo base_url() . "index.php/payment/periodic"; ?>"><i class="fa fa-calendar"></i>Periodic</a>
                                    </li>
                                    <li class="divider"></li>
                                     <li><a target="frame" href="<?php echo base_url() . "index.php/sessions/periodic"; ?>"><i class="fa fa-calendar"></i>Sessional</a>
                                    </li>

                                </ul>
                            <?php } ?>

                        </li>


                    </ul>
                </div>

            </nav>