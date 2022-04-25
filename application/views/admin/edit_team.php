    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Update Team</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Update Team
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
                <h4 class="card-title">Update Team</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($team as $key): ?>
                <form action="<?php  echo base_url('admin/updateTeam/'.$key->id);?>" method="post" enctype="multipart/form-data">
                  <center>
                    <?php if(!empty($key->image)):?>
                      <img src="<?php echo base_url().$key->image;?>" style="height: 100px;width:120px;border:1px dashed orange;border-radius: 5px;box-shadow: 0 5px 10px rgba(0, 0, 0,0.3);margin:10px;">
                    <?php endif; ?>
                  </center>
                  <div class="form-group">
                    <input type="file" name="image" class="form-control" >
                    <?php if(isset($upload_error)){echo $upload_error; } ?>
                  </div>
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$key->name);?>" placeholder="Enter Name">
                    <?php echo form_error('name');?>
                  </div>
                    <div class="form-group">
                    <input type="text" name="designation" class="form-control" value="<?php echo set_value('designation',$key->designation);?>" placeholder="Enter Designation">
                    <?php echo form_error('designation');?>
                  </div>
                  <div class="form-group">
                     <input type="text" name="fb" class="form-control" value="<?php echo set_value('fb',$key->fb);?>" placeholder="Facebook Link">
                    <?php echo form_error('fb');?>
                  </div>
                   <div class="form-group">
                     <input type="text" name="insta" class="form-control" value="<?php echo set_value('insta',$key->insta);?>" placeholder="Instagram Link">
                    <?php echo form_error('insta');?>
                  </div>
                  <div class="form-group">
                     <input type="text" name="linkedin" class="form-control" value="<?php echo set_value('linkedin',$key->linkedin);?>" placeholder="Linkedin Link">
                    <?php echo form_error('linkedin');?>
                  </div>
                  <div class="form-group">
                     <input type="text" name="twitter" class="form-control" value="<?php echo set_value('twitter',$key->twitter);?>" placeholder="Twitter Link">
                    <?php echo form_error('twitter');?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update Team" class="btn btn-success">
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
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
     <script>
         CKEDITOR.replace( 'ckeditor' );
    </script>