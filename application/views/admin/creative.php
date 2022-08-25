    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Creative List</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Creative List
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
                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal">+ Add Creative</button>
                </div>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($creative as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><img src="<?php echo base_url().$key->image;?>" style="height:100px;width:120px;border-radius:5px;border:1px dashed orange;box-shadow:0 5px 10px rgba(0, 0, 0, 0.4);"></td>
                                <td><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo base_url('admin/deleteCreative/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                            <?php $i++;endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Creative</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addCreative');?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <input type="file" name="image" class="form-control" required="">
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add Creative" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>