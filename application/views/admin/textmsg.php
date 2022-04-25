<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Send Bulk Message</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Send Bulk Message
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
                <h4 class="card-title">Send Bulk Message</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php  echo base_url('admin/sendTextMessage');?>" method="post" >
                  <div class="form-group">
                    <label>Message</label>
                    <textarea name="message"  class="form-control" placeholder="Your Message Here..."  required></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Send Bulk Message" class="btn btn-success">
                  </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>