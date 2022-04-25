<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Player Of Code">
    <title><?php echo APP_NAME;?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/home/images/ic_launcher.png');?>">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-warning text-center"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="">
                        <h2>Franchise Agent</h2>
                        <!-- <img src="<?php echo base_url('assets/img/camssuccess2.png');?>" alt="branding logo" height="100"> --></div>
                </div>
               <!--  <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Registration</span></h6> -->
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" action="<?php echo base_url('mfa/registration');?>" method="post">
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="name" class="form-control form-control-lg input-lg" id="user-name" placeholder="Enter Name" value="<?php echo set_value('name');?>">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                            <span><?php echo form_error('name');?></span>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="mobno" class="form-control form-control-lg input-lg" id="user-name" placeholder="Enter Mobile Number" value="<?php echo set_value('mobno');?>">
                            <div class="form-control-position">
                                <i class="icon-phone"></i>
                            </div>
                            <span><?php echo form_error('mobno');?></span>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="Enter Email" value="<?php echo set_value('email');?>" >
                            <div class="form-control-position">
                                <i class="icon-email"></i>
                            </div>
                            <span><?php echo form_error('email');?></span>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="address" class="form-control form-control-lg input-lg" id="user-name" placeholder="Enter Address" value="<?php echo set_value('address');?>">
                            <div class="form-control-position">
                                <i class="icon-map-marker"></i>
                            </div>
                            <span><?php echo form_error('address');?></span>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Create Password" value="<?php echo set_value('password');?>" >
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                            <span><?php echo form_error('password');?></span>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="cpassword" class="form-control form-control-lg input-lg" id="user-password" placeholder="Confirm Password" value="<?php echo set_value('cpassword');?>">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                            <span><?php echo form_error('cpassword');?></span>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <!-- <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset> -->
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="<?php echo base_url('mfa/index');?>" class="card-link">Login</a></div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Create Account </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/admincss/'); ?>js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
