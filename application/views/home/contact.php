  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Contact</li>
        </ol>
        <h2>Contact</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p> <strong>Lucknow Office:</strong><?php echo ADDRESS;?></p>
              <p> <strong>Noida Office:</strong><?php echo ADDRESS1;?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><?php echo EMAIL;?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p><?php echo MOBNO;?></p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.279120773409!2d80.9994541150439!3d26.86287168314904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be3fb20a63c0b%3A0x99bcf1358c365fdc!2sChatresh%20Technologies%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1651311667083!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <?php if($this->session->flashdata('msg')): ?>
             <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
            <?php endif;?>
            <form action="<?php echo base_url('home/enquiry');?>" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo set_value('name');?>"/>
                  <span><?php echo form_error('name');?></span>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo set_value('email');?>"/>
                   <span><?php echo form_error('email');?></span>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo set_value('subject');?>" />
                 <span><?php echo form_error('subject');?></span>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Write Your Message Here..."><?php echo set_value('message');?></textarea>
                 <span><?php echo form_error('message');?></span>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->