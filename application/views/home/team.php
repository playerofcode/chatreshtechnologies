  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Team</li>
        </ol>
        <h2>Team</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <?php foreach ($team as $key): ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?php echo base_url( $key->image)?>" alt="" style="height: 150px;">
              <h4><?php echo $key->name;?></h4>
              <span><?php echo $key->designation;?></span>
              <div class="social">
                <a href="<?php echo $key->twitter;?>"><i class="icofont-twitter"></i></a>
                <a href="<?php echo $key->fb;?>"><i class="icofont-facebook"></i></a>
                <a href="<?php echo $key->insta;?>"><i class="icofont-instagram"></i></a>
                <a href="<?php echo $key->linkedin;?>"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->