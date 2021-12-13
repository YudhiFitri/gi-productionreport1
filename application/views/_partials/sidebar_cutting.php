<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4 bg-default-gradient">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url('img/pr.jpg'); ?>" alt="App Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Production Report</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('img/admincutting.png'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin Cutting</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cut"></i>
            <p>
              Cutting Process
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
                <!-- <a href="<//?php echo site_url('cutting'); ?>" class="nav-link <//?php if($this->uri->segment(1) == 'cutting') echo 'active'; ?>"> -->
                <a href="<?php echo site_url('cutting'); ?>" class="nav-link <?php if($this->uri->uri_string() == 'cutting') { echo 'active';} ?>">
                  <i class="fa fa-arrow-circle-right nav-icon"></i>
                  <p>Create Bundle & Barcode</p>
                  <!-- <//?php echo ($this->uri->segment(1)); ?> -->
                </a>
            </li>            

            <li class="nav-item">
              <a href="<?php echo site_url('inputcutting'); ?>" class="nav-link <?php if($this->uri->uri_string() == 'inputcutting') {echo 'active';} ?>">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Scan Input Cutting</p>
              </a>
            </li>

            <li class="nav-item">
              <!-- <a href="<//?php echo site_url('outputcutting'); ?>" class="nav-link <//?php if ($this->uri->segment(1) == 'outputcutting') echo 'active'; ?>"> -->
              <a href="<?php echo site_url('outputcutting'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'outputcutting') { echo 'active';} ?>">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Scan Output Cutting</p>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a href="<?php echo site_url('outputcutting/change_line'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'outputcutting/change_line') {echo 'active';} ?>">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Change Line Production</p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/ajax_reprint_bundle'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'cutting/ajax_reprint_bundle') {echo 'active';} ?>">
                <!-- <i class="fa fa-arrow-circle-right nav-icon"></i> -->
                <i class="fa fa-print nav-icon"></i>
                <p>Print Cutting Bundle</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/ajax_reprint_molding_bundle'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'cutting/ajax_reprint_molding_bundle') {echo 'active';} ?>">
                <!-- <i class="fa fa-arrow-circle-right nav-icon"></i> -->
                <i class="fa fa-print nav-icon"></i>
                <p>Print Molding Bundle</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/ajax_reprint_panty_bundles'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'cutting/ajax_reprint_panty_bundles') {echo 'active';} ?>" class="nav-link">
                <!-- <i class="fa fa-arrow-circle-right nav-icon"></i> -->
                <i class="fa fa-print nav-icon"></i>
                <p>Print Panty Bundles</p>
              </a>
            </li>

          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>