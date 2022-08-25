  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Career</li>
        </ol>
        <h2>Career</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Career Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
          <?php if($this->session->flashdata('msg')): ?>
             <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
            <?php endif;?>
        <div class="row">
          <?php foreach ($career as $key): ?>
          <div class="col-md-12">
            <div class="card m-2">
              <div class="card-header bg-primary text-white">
                <?php echo $key->job_profile; ?>
              </div>
              <div class="card-body">
                <p><b>Job Type :</b> <?php echo $key->job_type; ?></p>
                <p><b>Location :</b> <?php echo $key->location; ?></p>
                <p><b>Salary :</b> <?php echo $key->salary; ?></p>
                <p style=""><b>Job Description :</b> <?php echo $key->job_description; ?></p>
                <center><a href="<?php echo base_url('home/apply_job/'.$key->id);?>" class="btn btn-warning font-weight-bold border-0" style="border-radius: 0;">Apply Now</a></center>
              </div>
            </div>
          </div>
           <?php endforeach ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->