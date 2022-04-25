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
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/home/images/ic_launcher.png'); ?>">
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admincss/'); ?>css/jquery.dataTables.min.css">
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item">
              <a href="#" class="navbar-brand nav-link">
               <img alt="branding logo" src="<?php echo base_url('assets/home/img/ctech_web.png');?>" data-expand="<?php echo base_url('assets/home/img/ctech_web.png');?>" data-collapse="<?php echo base_url('assets/home/img/ctech_web.png');?>" class="brand-logo" height="40"> 
              <!-- <h2 class="text-white"><?php echo APP_NAME;?></h2> -->
              </a>
            </li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?php echo base_url('assets/admincss/'); ?>images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">fa</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                 <!--  <a href="#" class="dropdown-item"><i class="icon-head"></i>Profile</a> -->
                 <!--  <a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a> -->
                 <!--  <a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a> -->
                  <a href="#" class="dropdown-item"><i class="icon-android-settings"></i>Edit Profile</a>
                  <a href="<?php echo base_url('fa/change_password');?>" class="dropdown-item"><i class="icon-android-settings"></i> Change Password</a>
                  <div class="dropdown-divider"></div><a href="<?php echo base_url('fa/logout');?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

