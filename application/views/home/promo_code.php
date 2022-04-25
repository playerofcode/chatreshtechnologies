  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Apply Code</li>
        </ol>
        <h2>Apply Code</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <?php if($this->session->flashdata('msg')): ?>
             <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
            <?php endif;?>
            <form action="<?php echo base_url('home/apply_code');?>" method="post" role="form" class="php-email-form">
              <input type="hidden" name="sell_id" value="<?php echo $sell_id;?>">
              <div class="form-group">
                <input type="text"  name="code" placeholder="Enter Promo Code" class="form-control" />
              </div>

              <div class="text-center"><button type="submit" class="btn btn-success">Proceed</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>