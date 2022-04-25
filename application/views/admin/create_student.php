<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Student
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
    <div class="col-xs-12">
       <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-info text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Student</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php  echo base_url('admin/addStudent');?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo set_value('name');?>">
                    <span><?php echo form_error('name');?></span>
                  </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email');?>">
                    <span><?php echo form_error('email');?></span>
                  </div>
                  
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Create Password" value="<?php echo set_value('password');?>">
                    <span><?php echo form_error('password');?></span>
                  </div>
                  
                   <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('cpassword');?>">
                    <span><?php echo form_error('cpassword');?></span>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" value="Add Student" class="btn btn-success">
                  </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>