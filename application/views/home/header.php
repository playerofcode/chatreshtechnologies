<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Chatresh Technologies Pvt. Ltd. || Software Company in Lucknow</title>
  <meta content="Chatresh Technologies Pvt. Ltd. is a technology consulting, system integration, managed business services, and digital transformation company. Our teams guide our clients throughout the whole digital transformation process and synchronize all stakeholders to bring their expectations to life. We match our tailor-made, coordinated expertise with a vibrant ecosystem of digital innovators to deliver the most sustainable outcomes. We go to great lengths for our customers and accelerate their digital transformation by enabling their Cloud, Mobility, Data Analytics, IoT, System Integration and Security journeys to address the dynamic requirements of a variety of industry verticals, predominantly Government & Public Sector, Large and Medium Businesses and many more." name="descriptison">
  <meta content="Chatresh, Chatresh technologies, Chatresh Technologies Pvt. Ltd., Chatresh Technologies Private Limited, Web Development Company in Lucknow,Software Company in Lucknow, Development Company in Lucknow" name="keywords">
  <!-- OG PAroperties -->
   <meta property="og:title" content="<?php if(!empty($og_title)):echo $og_title;else: echo "Chatresh Technologies Pvt. Ltd.";endif;?>">
    <meta property="og:url" content="<?php if(!empty($og_url)):echo $og_url;else: echo base_url();endif;?>">
    <meta property="og:image" content="<?php if(!empty($og_image)):echo $og_image;else:echo base_url('assets/home/img/logo.jpg');endif;?>">
     <meta property="og:site_name" content="Chatresh Technologies Pvt. Ltd.">
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="<?php if(!empty($og_description)):echo $og_description;else:echo "Chatresh Technologies Pvt. Ltd. is a technology consulting, system integration, managed business services, and digital transformation company. Our teams guide our clients throughout the whole digital transformation process and synchronize all stakeholders to bring their expectations to life. We match our tailor-made, coordinated expertise with a vibrant ecosystem of digital innovators to deliver the most sustainable outcomes. We go to great lengths for our customers and accelerate their digital transformation by enabling their Cloud, Mobility, Data Analytics, IoT, System Integration and Security journeys to address the dynamic requirements of a variety of industry verticals, predominantly Government & Public Sector, Large and Medium Businesses and many more.";endif;?>">
     
    <!-- Favicons -->
  <link href="<?php echo base_url('assets/home/')?>img/logo.jpg" rel="icon">
  <link href="<?php echo base_url('assets/home/')?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/home/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/home/')?>vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/home/')?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/home/')?>vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/home/vendor/owl.carousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/home/')?>vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/home/')?>css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block" style="background: #0f0c29;background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);background: linear-gradient(to right, #24243e, #302b63, #0f0c29);">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com"><?php echo EMAIL;?></a>
        <i class="icofont-phone"></i> <?php echo MOBNO;?>
      </div>
      <div class="social-links">
        <a href="https://twitter.com/ChatreshT" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/chatreshtechnologies" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/chatreshtechnologies/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
   <!--      <h1 class="text-light"><a href="<?php echo base_url();?>"><span>CTech</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/home/')?>img/ctech_web.png" alt="" class="img-fluid" style="width:100%;max-height: 60px;"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?php echo base_url();?>">Home</a></li>

          <li class="drop-down"><a href="#">About</a>
            <ul>
              <li><a href="<?php echo base_url('about-us');?>">About Us</a></li>
              <li><a href="<?php echo base_url('our-team');?>">Team</a></li>
              <!-- <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>

          <li><a href="<?php echo base_url('our-services');?>">Services</a></li>
          <li><a href="<?php echo base_url('portfolio');?>">Portfolio</a></li>
          <li><a href="<?php echo base_url('home/payment');?>">Payment</a></li>
          <!-- <li><a href="pricing.html">Pricing</a></li> -->
          <li><a href="<?php echo base_url('blog');?>">Blog</a></li>
          <li><a href="<?php echo base_url('contact-us');?>">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
