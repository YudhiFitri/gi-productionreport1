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
        <img src="<?php echo base_url('img/superadmin.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Super Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Charts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> -->
        <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                UI Elements
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
            </ul>
          </li> -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-gears"></i>
            <p>
              Settings
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('user/management'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Users Management</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Data Master
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Master Size</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Data Order</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Data Mesin Molding</p>
              </a>
            </li>

            <!-- <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li> -->
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-sliders"></i>
            <p>
              PPIC Process
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('cutting'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Create Bundle & Barcode</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/cutting_print'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Print Label & Barcode</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/ajax_reprint_bundle'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Reprint Cutting Bundle</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/ajax_reprint_molding_bundle'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Reprint Molding Bundle</p>
              </a>
            </li>

          </ul>

          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cut"></i>
            <p>
              Cutting Process
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('cutting'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Create Bundle & Barcode</p>
              </a>
            </li>

            <!-- <li class="nav-item">
                <a href="<?php echo site_url('cutting/cutting_done'); ?>" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p>Confirm Done Cutting</p>
                </a>
              </li> -->

            <li class="nav-item">
              <a href="<?php echo site_url('cutting/cutting_print'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Print Label & Barcode</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('inputcutting'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Inputing Cutting Result</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('outputcutting'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Cutting Bundle To Production</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-rebel"></i>
            <p>
              Molding Process
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('inputmolding'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Input Molding</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('outputmolding'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Output Molding</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-random"></i>
            <p>
              Sewing Process
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('outputsewing'); ?>" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Output Sewing</p>
              </a>
            </li>


          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-dropbox"></i>
            <p>
              Packing Process
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Output Packing</p>
              </a>
            </li>


          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-print"></i>
            <p>
              Cutting Report
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>Daily</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>By Style</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>By Orc</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-arrow-circle-right nav-icon"></i>
                <p>By Single Orc</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-header">EXAMPLES</li> -->
        <!-- <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Mailbox
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Pages
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o"></i>
              <p>
                Extras
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>