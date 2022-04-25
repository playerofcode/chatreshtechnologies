    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
            <div class="row">
                <div class="col-md-12">
                   <div class="card mb-1">
                       <div class="card-body p-2 text-xs-center">
                        <?php if($kyc_status == 'requested'):?>
                            <span class="text-danger font-weight-bold">Your KYC is under process.</span>
                            <?php elseif($kyc_status == 'pending'):?>
                           Complete Your KYC <a href="<?php echo base_url('mfa/kyc');?>" class="btn btn-sm btn-primary">Complete KYC</a>
                       <?php else: ?>
                             <?php endif; ?>
                       </div>
                 
                   </div>
                </div>
            </div>
            <?php if(!empty($announcement)): ?>
            <div class="row">
                <?php foreach ($announcement as $key): ?>
                <div class="col-md-12">
                    <div class="card m-0 ">
                        <div class="card-body p-2 font-weight-bold">
                            <i class="icon-bullhorn text-success"></i> &nbsp;<?php echo $key->announcement; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
<div class="row mt-1">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">0</h3>
                            <span>Total FA</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="teal">0</h3>
                            <span>Total Student</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="deep-orange">50</h3>
                            <span>Total Sale</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="cyan">423</h3>
                            <span>Support Tickets</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <b> Commission Chart</b> <p style="float: right;"><b>Promo Code : </b> <?php echo "MFA".$mfa_id; ?></p>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sale</th>
                        <th>Commission</th>
                    </tr>
                    <tr>
                        <td>Direct</td>
                        <td>50%</td>
                    </tr>
                    <tr>
                        <td>FA</td>
                        <td>10%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ stats -->
        </div>
      </div>
    </div>