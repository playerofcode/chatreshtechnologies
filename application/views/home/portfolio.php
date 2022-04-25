  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Portfolio</li>
        </ol>
        <h2>Portfolio</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <!-- <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div> -->
        </div>

        <div class="row portfolio-container">
          <?php foreach ($portfolio as $key): ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url($key->image)?>" class="img-fluid" alt="" style="height: 220px;">
              <div class="portfolio-info">
                <h4><?php echo $key->title;?></h4>
               <!--  <p>Appf fgdgdg gdhgfdh</p> -->
                <div class="portfolio-links">
                  <a href="<?php echo base_url($key->image)?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $key->title;?>"><i class="bx bx-plus"></i></a>
                  <a href="<?php echo $key->link;?>" title="More Details" target="blank"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

   <!--        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url('assets/home/')?>img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url('assets/home/')?>img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> -->

       <!--    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url('assets/home/')?>img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url('assets/home/')?>img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
 -->
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Clients Section ======= --
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Clients</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-1.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-2.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-3.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-4.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-5.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-6.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-7.png" alt="">
          <img src="<?php echo base_url('assets/home/')?>img/clients/client-8.png" alt="">
        </div>

      </div>
    </section>- End Clients Section -->

  </main><!-- End #main -->