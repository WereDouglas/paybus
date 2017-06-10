<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Property management, estate manager, management, rent, Utility manager, land, solutions, estates">
        <link rel=icon href="<?= base_url(); ?>images/favicon.ico">
        <title>Pay bus</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>

            .panel-default {
                border-color: #58C68A;
            }
        </style>
    </head>

    <body>

        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <div id="page-wrapper" class="text-center" style=" padding-left:30%; padding-top: 10%;">

            <div class="row">
                <div class="text-center">

                    <div class="panel panel-default col-md-6">
                        <div class="panel-body ">
                            <img alt="avatar" class="center-block" height="80px" width="190px" src="<?= base_url(); ?>images/paybus.png">

                            <div class="form-group">
                                <form id="station-form" class="form-login" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/welcome/login'  method="post">

                                    <h2 class="form-login-heading">Sign in now</h2>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <div class="login-wrap">
                                        <input type="text" class="form-control" name="name" placeholder="User ID" autofocus>
                                        <br>
                                        <input type="password"  name="password" class="form-control" placeholder="Password">
                                        <label class="checkbox">
                                            <span class="pull-right">
                                                <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                                            </span>
                                        </label>
                                        <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                                        <hr>


                                    </div>

                                    <!-- Modal -->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Forgot Password ?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Enter your e-mail address below to reset your password.</p>
                                                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                                                </div>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                                    <button class="btn btn-theme" type="button">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal -->		
                                </form>	  	
                                <a  href="<?php echo base_url() . "index.php/administration/"; ?>">Manage</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?= base_url(); ?>assets/img/login-bg.jpg", {speed: 500});
    </script>


</body>
</html>
