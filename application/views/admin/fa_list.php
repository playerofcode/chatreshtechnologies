    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Franchise Agent</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">FA List
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
                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal">+ Add FA</button>
                </div>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>MFA Code</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Code</th>
                                <th>Password</th>
                                <th>KYC Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($fa_list as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo "MFA".$key->mfa_id;?></td>
                                <td><?php echo $key->name;?></td>
                                <td><?php echo $key->mobno;?></td>
                                <td><?php echo $key->email;?></td>
                                <td><?php echo $key->address;?></td>
                                <td><?php echo "FA".$key->id;?></td>
                                 <td><?php echo $key->password;?></td>
                                 <td><a href="javascript:void(0);" class="btn btn-sm <?php if($key->kyc_status =='complete'):echo 'btn-success';elseif($key->kyc_status =='reject'):echo 'btn-danger';else:echo 'btn-warning';endif;?>"><?php echo $key->kyc_status;?></a></td>
                                <td><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo base_url('admin/deleteMFA/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
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
        <h4 class="modal-title">Franchise Agent</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addFA');?>" method="post">
            <div class="form-group">
                <select name="mfa_id" class="form-control">
                    <option disabled selected>Select MFA</option>
                    <?php foreach($mfa_list as $key):?>
                        <option value="<?php echo $key->id;?>"><?php echo $key->name; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
               <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
            </div>
            <div class="form-group">
               <input type="tel" name="mobno" class="form-control" placeholder="Enter Number" required="">
            </div>
            <div class="form-group">
               <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
            </div>
            <div class="form-group">
               <input type="text" name="address" class="form-control" placeholder="Enter Address" required="">
            </div>
            <div class="form-group">
               <input type="text" name="password" class="form-control" placeholder="Create Password" required="">
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add FA" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>