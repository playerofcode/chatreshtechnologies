    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Update Portfolio</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Update Portfolio
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
                <h4 class="card-title">Update Portfolio</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($portfolio as $key): ?>
                <form action="<?php  echo base_url('admin/updatePortfolio/'.$key->id);?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title',$key->title);?>" placeholder="Blog Title">
                    <?php echo form_error('title');?>
                  </div>
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
                     <input type="text" name="link" class="form-control" value="<?php echo set_value('link',$key->link);?>" placeholder="Portfolio Link">
                    <?php echo form_error('link');?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update Portfolio" class="btn btn-success">
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