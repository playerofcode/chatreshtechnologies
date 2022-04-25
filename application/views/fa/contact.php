    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Contact Mgmt</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Contact Mgmt
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
                    <h4 class="card-title">All Contact <button class="btn btn-primary"  data-toggle="modal" data-target="#myModal">+ Add Contact</button></h4>
                </div>
                <div style="float: right;">
                    <form action="<?php echo base_url('admin/importCSV');?>" method="POST" enctype="multipart/form-data">
                <div class="form-inline">
                    <label for="">Import From CSV</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-inline m-1">
                    <center><input type="submit" value="Import" class="btn btn-success"></center>
                </div>
                </form>
                </div>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($contact as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $key->name;?></td>
                                <td><?php echo $key->mobno;?></td>
                                <td><a href="<?php echo base_url('admin/editContact/'.$key->id);?>" class="btn btn-warning btn-sm">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure?');"href="<?php echo base_url('admin/deleteContact/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
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