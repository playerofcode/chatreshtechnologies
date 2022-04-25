  <style>
      .img_style
      {
        height: 100px;
        width: 120px;
        border:1px dashed orange;
        border-radius: 5px;
        box-shadow: 0 5px 10px  rgba(0, 0, 0, 0.4);
      }
  </style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">MFA KYC Request</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">MFA KYC Request
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
                                <th>Aadhar Card</th>
                                <th>Pan Card</th>
                                <th>Cancel Cheque</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($kyc_request as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $key->name;?></td>
                                <td><a href="<?php echo base_url($key->aadhar);?>" target="blank"><img src="<?php echo base_url($key->aadhar);?>" alt="Image not found" class="img_style"></a></td>
                                <td><a href="<?php echo base_url().$key->pan;?>" target="blank"><img src="<?php echo base_url().$key->pan;?>" alt="Image not found" class="img_style"></a></td>
                                <td><a href="<?php echo base_url().$key->cheque_bank;?>" target="blank"><img src="<?php echo base_url().$key->cheque_bank;?>" alt="Image not found" class="img_style"></a></td>
                                
                                <td>
                                    <form action="<?php echo base_url('admin/changeKYCStatus/'.$key->id);?>" method="post">
                                        <select name="status" class="">
                                            <option value="complete">Complete</option>
                                             <option value="reject">Reject</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-success">Go</button>
                                    </form>
                                </td>
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