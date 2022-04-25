    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Edit Testimonial</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Testimonial
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
                <h4 class="card-title">Edit Testimonial</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($testimonial as $key): ?>
                <form action="<?php  echo base_url('admin/updateTestimonial/'.$key->id);?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$key->name);?>" placeholder="Name">
                    <?php echo form_error('name');?>
                  </div>
                  <div class="form-group">
                    <input type="text" name="designation" class="form-control" value="<?php echo set_value('designation',$key->designation);?>" placeholder="Designation">
                    <?php echo form_error('designation');?>
                  </div>
                  <center>
                    <img src="<?php echo base_url().$key->image;?>" style="height: 100px;width:120px;border:1px dashed orange;border-radius: 5px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);margin:10px;">
                  </center>
                  <div class="form-group">
                    <input type="file" name="image" class="form-control" >
                    <?php if(isset($upload_error)){echo $upload_error; } ?>
                  </div>
                  <div class="form-group">
                    <textarea name="description"  class="form-control" placeholder="Description goes here.."><?php echo $key->description;?></textarea>
                    <?php echo form_error('description');?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update Testimonial" class="btn btn-success">
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