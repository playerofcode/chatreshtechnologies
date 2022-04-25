    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Lead List</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('mfa/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Lead List
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
                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal">+ Add Lead</button>
                </div>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Concern Name</th>
                                <th>Company Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Address</th>
                                <th>By</th>
                                 <th>Status</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($lead_list as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $key->concern_name;?></td>
                                <td><?php echo $key->company_name;?></td>
                                <td><?php echo $key->mobno;?></td>
                                <td><?php echo $key->email;?></td>
                                <td><?php echo $key->city;?></td>
                                <td><?php echo $key->state;?></td>
                                <td><?php echo $key->address;?></td>
                                <td><?php echo $key->type;?></td>
                                <td>
                                <?php 
                                if($key->status == 'in_progress'):
                                    echo "Waiting For Reply";
                                elseif($key->status == 'interested'):
                                    echo "Ready to Meet";
                                    elseif($key->status == 'unreachable'):
                                    echo "Not Yet Contacted";
                                elseif($key->status == 'done'):
                                    echo "Converted to Client";
                                elseif($key->status == 'close'):
                                    echo "Not Interested";
                                else:
                                    echo "Other";
                                endif;
                                ?>
                                    
                                </td> 
                                <td>
                                    <form action="<?php echo base_url('mfa/changeLeadStatus');?>" method="post">
                                        <div class="form-group">
                <select name="status" class="form-control" required>
                    <option disabled selected>Choose State</option>
                    <option value="in_progress">Waiting For Reply</option>
                    <option value="interested">Ready to Meet</option>
                    <option value="unreachable">Not Yet Contacted</option>
                    <option value="done">Converted to Client</option>
                    <option value="close">Not Interested</option>
                    <option value="other">Other</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $key->id;?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-sm" value="Change Status">
            </div>
                                    </form>
                                </td>
                                
                                <!-- <td><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo base_url('admin/deleteCompany/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td> -->
                            </tr>
                            <?php $i++;endforeach; ?>
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
        <h4 class="modal-title">Add Lead</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('mfa/addLead');?>" method="post">
            <div class="form-group">
               <input type="text" name="concern_name" class="form-control" placeholder="Concern Name" required="">
            </div>
            <div class="form-group">
               <input type="text" name="company_name" class="form-control" placeholder="Company Name" required="">
            </div>
            <div class="form-group">
               <input type="tel" name="mobno" class="form-control" placeholder="Mobile Number" required="">
            </div>
            <div class="form-group">
               <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
               <input type="text" name="city" class="form-control" placeholder="City" required="">
            </div>
            <div class="form-group">
               <input type="text" name="state" class="form-control" placeholder="State" required="">
            </div>
            <div class="form-group">
               <input type="text" name="address" class="form-control" placeholder="Address" required="">
            </div>
            <div class="form-group">
                <select name="status" class="form-control">
                    <option disabled selected>Choose State</option>
                    <option value="in_progress">Waiting For Reply</option>
                    <option value="interested">Ready to Meet</option>
                    <option value="unreachable">Not Yet Contacted</option>
                    <option value="done">Converted to Client</option>
                    <option value="close">Not Interested</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="remark" class="form-control" placeholder="Remark">
            </div>
            <input type="hidden" name="type" value="mfa">
            
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add Lead" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>