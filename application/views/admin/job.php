    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Post Job</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Post Job
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
                <h4 class="card-title">Post Job</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php  echo base_url('admin/postJob');?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Job Profile</label>
                    <input type="text" name="job_profile" class="form-control" value="<?php echo set_value('job_profile');?>" placeholder="Job Profile">
                    <?php echo form_error('job_profile');?>
                  </div>
                  <div class="form-group">
                     <label>Job Type</label>
                    <input type="text" name="job_type" class="form-control" value="<?php echo set_value('job_type');?>" placeholder="e.g. Intern, Full Time, Part Time ">
                    <?php echo form_error('job_type');?>
                  </div>
                  <div class="form-group">
                    <label>Salary</label>
                    <input type="text" name="salary" class="form-control" value="<?php echo set_value('salary');?>" placeholder="e.g. 10k-25k">
                    <?php echo form_error('salary');?>
                  </div>
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo set_value('location');?>" placeholder="e.g. Lucknow">
                    <?php echo form_error('location');?>
                  </div>
                  <div class="form-group">
                    <label>Job Description</label>
                    <textarea name="job_description" id="ckeditor" class="form-control"><?php echo set_value('job_description');?></textarea>
                      <?php echo form_error('job_description');?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Job" class="btn btn-success">
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