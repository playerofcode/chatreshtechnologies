  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li>Payments</li>
        </ol>
        <h2>Payments</h2>

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
            <form action="<?php echo base_url('home/process_payment');?>" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 col-12 form-group">
                  <label>Choose Brand/Company</label>
                 <select name="company_id" id="company_id" class="form-control" required>
                   <option>Select Brand/Company</option>
                   <?php foreach ($company as $key): ?>
                     <option value="<?php echo $key->id;?>"><?php echo $key->company_name;?></option>
                   <?php endforeach ?>
                 </select>
                </div>
                <div class="col-md-6 col-12 form-group">
                <label>Program/Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                  <option>Select  Program/Product</option>
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                </div>
                <div class="col-md-6 col-12 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                </div>
              </div>
               <div class="row">
                <div class="col-md-6 col-12 form-group">
                  <input type="text" name="mobno" class="form-control" id="name" placeholder="Enter Mobile Number" required />
                </div>
               <!--  <div class="col-md-6 col-12 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                </div> -->
              </div>
              <div class="text-center"><button type="submit">Proceed</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
    <script>
    var company_id=document.getElementById('company_id');
    var product_id=document.getElementById('product_id');
        if(company_id){
      company_id.addEventListener('change',()=>{
        $.ajax({
          url:"<?php echo base_url('home/productFinder/')?>",
          method:"POST",
          data:{company_id:company_id.value},
          success:function(data)
          {
           product_id.innerHTML=data;
          }
        });
    });
    }
    
  </script>