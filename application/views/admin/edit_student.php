    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Update Student Info</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Update Student Info
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
    <div class="col-xs-12">
       <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-success text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Student Info</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($student as $key): ?>
                <form action="<?php  echo base_url('admin/studentUpdater/'.$key->id);?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  	<label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$key->name);?>" placeholder="Name">
                    <?php echo form_error('name');?>
                  </div>
                  <div class="form-group">
                  	<label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email',$key->email);?>" placeholder="Email">
                    <?php echo form_error('email');?>
                  </div>
                  <div class="form-group">
                  	<label>Mobile Number</label>
                    <input type="tel" name="mobno" class="form-control" value="<?php echo set_value('mobno',$key->mobno);?>" placeholder="Mobile Number">
                    <?php echo form_error('mobno');?>
                  </div>
                  <div class="form-group">
                  	<label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo set_value('address',$key->address);?>" placeholder="Address">
                    <?php echo form_error('address');?>
                  </div>
                  <div class="form-group">
                  	<label>City</label>
                    <input type="text" name="city" class="form-control" value="<?php echo set_value('city',$key->city);?>" placeholder="City">
                    <?php echo form_error('city');?>
                  </div>
                  <div class="form-group">
                  	<label>State</label>
                    <input type="text" name="state" class="form-control" value="<?php echo set_value('state',$key->state);?>" placeholder="State">
                    <?php echo form_error('state');?>
                  </div>
                  <div class="form-group">
                  	<label>Pincode</label>
                    <input type="text" name="pincode" class="form-control" value="<?php echo set_value('pincode',$key->pincode);?>" placeholder="Pincode">
                    <?php echo form_error('pincode');?>
                  </div>
                  <div class="form-group">
                  	<label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="<?php echo set_value('dob',$key->dob);?>">
                    <?php echo form_error('dob');?>
                  </div>
                  <div class="form-group">
                  	<label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo set_value('password',$key->password);?>" placeholder="Password">
                    <?php echo form_error('password');?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update Student" class="btn btn-success">
                  </div>
                </form>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>