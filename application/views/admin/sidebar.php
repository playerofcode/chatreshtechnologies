
    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="<?php echo base_url('admin/dashboard');?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
          </li>
           <li class="nav-item"><a href="#"><i class="icon-bullhorn"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Announcement Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/mfa_announcement');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">MFA Announcement</a>
              </li> 
              <li><a href="<?php echo base_url('admin/fa_announcement');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">FA Announcement</a>
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Company Management</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/company_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Manage Company </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Product Management</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/product_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Manage Product</a>
              </li> 
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">MFA Management</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/mfa_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">MFA List</a>
              </li> 
              <li><a href="<?php echo base_url('admin/mfaKYCRequest');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">MFA KYC Request</a>
              </li> 
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">FA Management</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/fa_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">FA List</a>
              </li> 
              <li><a href="<?php echo base_url('admin/faKYCRequest');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">FA KYC Request</a>
              </li> 
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-ticket"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Ticket Raise</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/RaiseTicket');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">View Raised Ticket </a>
              </li> 
            </ul>
          </li>
       
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Blog Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/blog');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Add Blog</a>
              </li> 
              <li><a href="<?php echo base_url('admin/blog_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Added Blog</a>
            </ul>
          </li>
           <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Portfolio Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/portfolio');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Add Portfolio</a>
              </li> 
              <li><a href="<?php echo base_url('admin/portfolio_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Added Portfolio</a>
            </ul>
          </li>
            <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Team Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/team');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Add Team</a>
              </li> 
              <li><a href="<?php echo base_url('admin/team_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Added Team</a>
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">invoice Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/invoice');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Add invoice</a>
              </li> 
              <li><a href="<?php echo base_url('admin/invoice_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Added invoice</a>
            </ul>
          </li>
          <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quotation Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/quotation');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Add Quotation</a>
              </li> 
              <li><a href="<?php echo base_url('admin/quotation_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Added Quotation</a>
            </ul>
          </li>
            <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Career Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/job');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Post Job</a>
              </li> 
              <li><a href="<?php echo base_url('admin/job_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Posted Job</a>
            </ul>
          </li>
        <!--   <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Testimonial Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('admin/testimonial');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Add Testimonial</a>
              </li> 
              <li><a href="<?php echo base_url('admin/testimonial_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">All Added Testimonial</a>
            </ul>
          </li> -->
          <li class=" nav-item"><a href="<?php echo base_url('admin/enquiry');?>"><i class="icon-phone"></i><span data-i18n="nav.dash.main" class="menu-title">Enquiry</span></a></li>
          <li class=" nav-item"><a href="<?php echo base_url('admin/creative');?>"><i class="icon-phone"></i><span data-i18n="nav.dash.main" class="menu-title">Creative</span></a></li>
          <li class=" nav-item"><a href="<?php echo base_url('admin/boxoutsolution_enquiry');?>"><i class="icon-phone"></i><span data-i18n="nav.dash.main" class="menu-title">Boxoutsolution Enquiry</span></a>
          </li>
        </ul>
      </div>
    </div>
