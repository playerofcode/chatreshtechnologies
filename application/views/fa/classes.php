    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Classes</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Classes
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
                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal">+ Add Class</button>
                </div>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Class</th>
                                <th>Price</th>
                                <th>Partner Price</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($classes as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $key->class_name;?></td>
                                <td><?php echo $key->price;?></td>
                                <td><?php echo $key->partner_price;?></td>
                                <td><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo base_url('admin/deleteClass/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
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
        <h4 class="modal-title">Add Class</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addClass');?>" method="post">
            <div class="form-group">
               <input type="text" name="class_name" class="form-control" placeholder="Class Name" required="">
            </div>
            <div class="form-group">
               <input type="number" name="price" class="form-control" placeholder="Price" required="">
            </div>
            <div class="form-group">
               <input type="number" name="partner_price" class="form-control" placeholder="Partner Price" required="">
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add Class" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>