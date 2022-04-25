    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Raise Ticket</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Raise Ticket
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body">
<!-- Responsive tables start -->
<div class="row">
    <div class="col-xs-12">
       <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-success text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
        <div class="card">
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Reply</th>
                                <th>Created At</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($raise_ticket as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><button class="btn btn-sm <?php if($key->type == 'mfa'):echo 'btn-success';else:echo 'btn-primary';endif;?>"><?php echo $key->type;?></button></td>
                                <td><?php echo $key->email;?></td>
                                <td><?php echo $key->subject;?></td>
                                <td><?php echo $key->description;?></td>
                                <td><?php  if(!empty($key->reply)):echo $key->reply;else:?>
                                <a href="<?php echo base_url('admin/replyRaiseTicket/'.$key->id);?>"><i class='icon-reply'></i></a>
                                <?php endif;?></td>
                                <td><?php echo $key->created_at;?></td>
                                <td><a onclick="return confirm('Are you sure want to delete?');"href="<?php echo base_url('admin/deleteRaisedTicket/'.$key->id);?>" class="btn btn-danger btn-sm"><i class="fa icon-trash"></i></a></td>
                            </tr>
                            <?php $i++;endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->
        </div>
      </div>
    </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Contact</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addContact');?>" method="post">
            <div class="form-group">
               <input type="text" name="name" class="form-control" placeholder="Enter Contact Name" required="">
            </div>
            <div class="form-group">
               <input type="tel" name="mobno" class="form-control" placeholder="Enter Contact Number" required="">
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add Contact" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>