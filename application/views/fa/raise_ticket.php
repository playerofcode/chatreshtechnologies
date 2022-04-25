    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Raise Ticket</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('fa/dashboard');?>">Home</a>
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
            <div class="card-header">
                <div style="float:left;">
                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal">+ Raise Ticket</button>
                </div>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
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
                                <td><?php echo $key->subject;?></td>
                                <td><?php echo $key->description;?></td>
                                <td><?php if(!empty($key->reply)):echo $key->reply;else:echo 'not seen yet'; endif;?></td>
                                <td><?php echo $key->created_at;?></td>
                                <td><a onclick="return confirm('Are you sure?');"href="<?php echo base_url('fa/deleteRaiseTicket/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
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
        <h4 class="modal-title">Raise Ticket</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('fa/createTicket');?>" method="post">
            <div class="form-group">
               <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required="">
            </div>
            <div class="form-group">
               <textarea name="description" class="form-control" placeholder="Enter Description" required></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Raise Ticket" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>