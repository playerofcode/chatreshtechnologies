 <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
         <!--  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
          <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">CLOSE &times;</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <img src="<?php echo base_url('assets/home/img/ctech5.jpg');?>" class="img-fluid">
        </div>
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(<?php echo base_url('assets/home/')?>img/slide/new3.jpg);background-size: 100% 100%;">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown text-white">Welcome to <span class="text-white">CTECH</span></h2>
                <p class="animate__animated animate__fadeInUp text-white"> Our vision is to be a global leader in innovation and technology segment and making affordable products and solution for the masses.</p>
                <a href="<?php echo base_url('about-us');?>" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(<?php echo base_url('assets/home/')?>img/slide/new4.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown text-white">Welcome to <span class="text-white">CTECH</span></h2>
                <p class="animate__animated animate__fadeInUp" style="font-weight: bold;color:#fff;"> Our vision is to be a global leader in innovation and technology segment and making affordable products and solution for the masses.</p>
                <a href="<?php echo base_url('about-us');?>" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(<?php echo base_url('assets/home/')?>img/slide/slider3.png)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to  <span>CTECH</span></h2>
                <p class="animate__animated animate__fadeInUp" style="color:#000;font-weight: bold;"> Our vision is to be a global leader in innovation and technology segment and making affordable products and solution for the masses.</p>
                <a href="<?php echo base_url('about-us');?>" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">
    <div class="container" style="background:#3084ac;">
      
    
    <center><img src="<?php echo base_url('assets/home/img/offer.png');?>" style="height: 150px;"></center>
 <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="<?php echo base_url('assets/home/img/slide/post1.jpg');?>" class="img-fluid"/>
        </div>
        <div class="swiper-slide">
          <img src="<?php echo base_url('assets/home/img/slide/post2.jpg');?>" class="img-fluid"/>
        </div>
        <div class="swiper-slide">
          <img src="<?php echo base_url('assets/home/img/slide/post3.jpg');?>" class="img-fluid"/>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
     
     </div>
     <div class="container">
       <div class="swiper mySwiper1" style="width: 100%;">
      <div class="swiper-wrapper">
        <?php foreach ($creative as $key): ?>
          <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url($key->image);?>" />
        </div>
        <?php endforeach ?>
        <!-- 
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post2.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post3.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post1.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post2.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post3.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post1.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post2.jpg');?>" />
        </div>
        <div class="swiper-slide" style=" width: 300px;height: 300px;">
          <img src="<?php echo base_url('assets/home/img/slide/post3.jpg');?>" />
        </div> -->
      </div>
      <div class="swiper-pagination"></div>
    </div>
     </div>
    </section><!-- End Featured Section -->
    <!-- Brand Section -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              <div class="section-title mb">
          <h2>Our Brands</h2></div>
        </div>
        <div class="row pb-4">
          <div class="col-md-4">
            <div class="card m-2" style="border-radius: 0;box-shadow: 0 5px 15px rgba(0, 0, 0,0.6);">
              <div class="card-header bg-white" style="">
                <h1><img src="<?php echo base_url('assets/home/')?>img/brand/eschool.png" alt="" style="height: 100px;margin:10px;box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);"></h1>
              </div>
              <div class="card-body" style="background: #3084ac;color:#fff;">
                <p class="card-title">ESCHOOL21 is a comprehensive Ed-Tech solution catering to School Automation, LMS and Hardware Solution.</p>
                <a href="https://eschool21.com/" style="float: right;height: 30px;width:100px;background:red;line-height: 30px;text-align: center;color:#fff;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);">Click here</a>
              </div>
            </div>
          </div>
            <div class="col-md-4">
            <div class="card m-2" style="border-radius: 0;box-shadow: 0 5px 15px rgba(0, 0, 0,0.6);">
                <div class="card-header bg-white" style="">
                <h1><img src="<?php echo base_url('assets/home/')?>img/brand/ctech.png" alt="" style="height: 100px;margin:10px;box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);"></h1>
              </div>
              <div class="card-body" style="background: #3084ac;color:#fff;">
                <p class="card-title">We connect smart devices to work in unison, delivering a truly intelligent smart home experience that makes life more convenient, safe, and enjoyable.</p>
                  <a href="https://chatreshtech.com/" style="float: right;height: 30px;width:100px;background:red;line-height: 30px;text-align: center;color:#fff;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);">Click here</a>
              </div>
            
            </div>
          </div>
            <div class="col-md-4">
            <div class="card m-2" style="border-radius: 0;box-shadow: 0 5px 15px rgba(0, 0, 0,0.6);">
              <div class="card-header bg-white" style="">
                <h1><img src="<?php echo base_url('assets/home/')?>img/brand/boxotsolution.jpg" alt="" style="height: 100px;margin:10px;box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);"></h1>
              </div>
              <div class="card-body" style="background: #3084ac;color:#fff;">
                <p class="card-title">We strive to
deliver the integrated software based solutions. Empower and enhance
the lives of Billions of users through Profound technology solutions.</p>
  <a href="https://boxoutsolution.com/" style="float: right;height: 30px;width:100px;background:red;line-height: 30px;text-align: center;color:#fff;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);">Click here</a>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>

  </main><!-- End #main -->
