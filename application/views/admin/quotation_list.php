    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Quotation</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Quotation
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
                                <th>Name</th>
                                <th>Mobile No</th>
                                  <th>Email</th>
                                <th>Address</th>
                               <th>Sub Total</th>
                                <th>GST</th>
                                <th>Total</th>
                                <th>Created At</th>
                                <th>Invoice</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($quotation_list as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $key->name;?></td>
                                <td><?php echo $key->mobno;?></td>
                                <td><?php echo $key->email;?></td>
                                <td><?php echo $key->address;?></td>
                                <td><?php echo $key->total_price;?></td>
                                <td><?php echo $key->gst." %";?></td>
                                <td><?php echo $key->gst_inc_price;?></td>
                                <td><?php echo $key->created_at;?></td>
                                <td><a href="<?php echo base_url('admin/quotation_preview/'.$key->id);?>"><img style="height: 50px;" src="<?php echo base_url('assets/home/img/pdf.png');?>"/></a></td>
                                <td><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo base_url('admin/deleteQuotation/'.$key->id);?>" class="btn btn-danger btn-sm"><i class="fa icon-trash"></i></a></td>
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