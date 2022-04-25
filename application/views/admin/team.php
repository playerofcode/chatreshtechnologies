    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Add Team</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Team
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
                <h4 class="card-title">Add Team</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php  echo base_url('admin/addTeam');?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name');?>" placeholder="Enter Name">
                    <?php echo form_error('name');?>
                  </div>
                  <div class="form-group">
                    <input type="file" name="image" class="form-control" >
                    <?php if(isset($upload_error)){echo $upload_error; } ?>
                  </div>
                  <div class="form-group">
                    <input type="text" name="designation" class="form-control" value="<?php echo set_value('designation');?>" placeholder="Enter Designation">
                    <?php echo form_error('designation');?>
                  </div>
                  <div class="form-group">
                     <input type="text" name="fb" class="form-control" value="<?php echo set_value('fb');?>" placeholder="Facebook Link">
                    <?php echo form_error('fb');?>
                  </div>
                   <div class="form-group">
                     <input type="text" name="insta" class="form-control" value="<?php echo set_value('insta');?>" placeholder="Instagram Link">
                    <?php echo form_error('insta');?>
                  </div>
                  <div class="form-group">
                     <input type="text" name="linkedin" class="form-control" value="<?php echo set_value('linkedin');?>" placeholder="Linkedin Link">
                    <?php echo form_error('linkedin');?>
                  </div>
                  <div class="form-group">
                     <input type="text" name="twitter" class="form-control" value="<?php echo set_value('twitter');?>" placeholder="Twitter Link">
                    <?php echo form_error('twitter');?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Add Team" class="btn btn-success">
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
     <script>
         CKEDITOR.replace( 'ckeditor' );
    </script>