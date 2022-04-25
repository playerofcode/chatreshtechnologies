    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">API Configuration</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">API Configuration
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
    <div class="col-xs-12">
       <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-warning text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
        <div class="card">
            <div class="card-body collapse in p-2">
              <?php foreach ($chat_api as $key): ?>
                <form action="<?php  echo base_url('admin/updateAPI/'.$key->id);?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Instance</label>
                    <input type="text" name="instance" placeholder="Enter Instance" class="form-control" value="<?php echo set_value('instance',$key->instance); ?>" required>
                    <?php echo form_error('instance'); ?>
                  </div>
                  <div class="form-group">
                    <label>Token</label>
                    <input type="text" name="token" placeholder="Enter Token" class="form-control" value="<?php echo set_value('token',$key->token); ?>" required>
                    <?php echo form_error('token'); ?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update API" class="btn btn-success">
                  </div>
                </form>
                 <?php endforeach ?>
                
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>