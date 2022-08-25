  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Apply Job</li>
        </ol>
        <h2>Apply Job</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">

          <div class="col-lg-6 mx-auto">
            <?php if($this->session->flashdata('msg')): ?>
             <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
            <?php endif;?>
            <form action="<?php echo base_url('home/submit_form');?>" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-12 form-group">
               <input type="text" class="form-control" name="job_title" id="job_title" value="<?php echo $job_title;?>" readonly/>
              </div>
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo set_value('name');?>" required/>
                  <span><?php echo form_error('name');?></span>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="mobno" id="mobno" placeholder="Mobile Number" value="<?php echo set_value('mobno');?>" required />
                 <span><?php echo form_error('mobno');?></span>
                  
                </div>
              </div>
              <div class="form-group">
               <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo set_value('email');?>" required/>
                   <span><?php echo form_error('email');?></span>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="address" placeholder="Address" required><?php echo set_value('address');?></textarea>
                 <span><?php echo form_error('address');?></span>
              </div>
              <div class="text-center"><button type="submit">Submit</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->