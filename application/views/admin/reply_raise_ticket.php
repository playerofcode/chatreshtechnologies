    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Reply Raise Ticket"</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Reply Raise Ticket
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
                <h4 class="card-title">Reply Raise Ticket</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($raise_ticket as $key): ?> 
                <form action="<?php  echo base_url('admin/handleRaiseTicketReply');?>" method="post">
                  <div class="form-group">
                    <input type="text" name="email" class="form-control" value="<?php echo $key->email;?>" readonly>
                  </div>
                   <div class="form-group">
                    <input type="text" name="subject" class="form-control"  value="<?php echo $key->subject;?>" readonly>
                  </div>
                  <div class="form-group">
                    <textarea name="reply"  cols="30" rows="10" class="form-control" placeholder="Reply text goes here.."></textarea>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $key->id;?>">
                  <input type="hidden" name="type" value="<?php echo $key->type;?>">
                  <div class="form-group">
                    <input type="submit" value="Reply Now" class="btn btn-success">
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