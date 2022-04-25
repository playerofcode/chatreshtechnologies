    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Change Password</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('fa/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Change Password
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
                <h4 class="card-title">Change Password</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php echo base_url('fa/check_password');?>" method="post">
                  <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>"class="form-control" placeholder="Enter Current Password" >
            <?php echo form_error('password'); ?>
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="newpassword" id="newpassword" value="<?php echo set_value('newpassword'); ?>"class="form-control" placeholder="Enter New Password" >
            <?php echo form_error('newpassword'); ?>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword'); ?>" class="form-control" placeholder="Enter Confirm Password" >
            <?php echo form_error('cpassword'); ?>
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-success">Change Password</button>
          </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>