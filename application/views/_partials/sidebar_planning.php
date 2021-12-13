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
                <img src="<?php echo base_url('img/adminppic.png'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin Planning</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-sliders"></i>
                        <p>
                            Planning Process
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('order'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'order') echo 'active'; ?>">
                                <i class="fa fa-arrow-circle-right nav-icon"></i>
                                <p>Planning</p>
                                <!-- <//?php echo ($this->uri->segment(1)); ?> -->
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