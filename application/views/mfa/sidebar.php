
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
          <li class=" nav-item"><a href="<?php echo base_url('mfa/dashboard');?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
          </li>
           <li class="nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.page_layouts.main" class="menu-title">FA Mgmt</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo base_url('mfa/fa_list');?>" data-i18n="nav.page_layouts.1_column" class="menu-item">FA List </a>
              </li> 
            </ul>
          </li>
           <li class=" nav-item"><a href="<?php echo base_url('mfa/lead_list');?>"><i class="icon-folder"></i><span data-i18n="nav.dash.main" class="menu-title">Lead Mgmt</span></a>
          </li>
           <li class=" nav-item"><a href="<?php echo base_url('mfa/raise_ticket');?>"><i class="icon-folder"></i><span data-i18n="nav.dash.main" class="menu-title">Raise Ticket</span></a>
          </li>
        </ul>
      </div>
    </div>
