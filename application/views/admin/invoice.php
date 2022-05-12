    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Add Invoice</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Invoice
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
                <h4 class="card-title">Add Invoice</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php  echo base_url('admin/addInvoice');?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name');?>" placeholder="Client/Company Name">
                    <?php echo form_error('name');?>
                  </div>
                  <div class="form-group">
                    <input type="text" name="mobno" class="form-control" value="<?php echo set_value('mobno');?>" placeholder="Client Mobile Number">
                    <?php echo form_error('mobno');?>
                  </div>
                  <div class="form-group">
                    <input type="text" name="address" class="form-control" value="<?php echo set_value('address');?>" placeholder="Client Address">
                    <?php echo form_error('address');?>
                  </div>
                  <div class="form-group">
                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email');?>" placeholder="Client Email">
                    <?php echo form_error('email');?>
                  </div>
                  <table class="table table-bordered" id="show_item">
                    <tr>
                      <td>Product Description</td>
                      <td>Unit Price</td>
                      <td>Quantity</td>
                      <td>Price</td>
                      <td>Add/Remove</td>
                    </tr>
                    <tr>
                      <td><input type="text" name="product[]" class="form-control" required></td>
                      <td><input type="number" name="unit_price[]" min="1" class="form-control" required></td>
                      <td><input type="number" name="qty[]" min="1" class="form-control" required></td>
                      <td><input type="number" name="price[]" min="1" class="form-control" required></td>
                      <td><button class="btn btn-success add_item_btn">Add</button></td>
                    </tr>
                  </table>
                  <div class="form-group">
                    <input type="submit" value="Add Invoice" class="btn btn-success">
                  </div>
                </form>
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