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
				<img src="<?php echo base_url('img/admin-packing.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Admin Packing</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview <?php if (
														$this->uri->uri_string() == 'packing/packing_member' ||
														$this->uri->uri_string() == 'packing/box_capacity'
													) echo 'menu-open'; ?> ">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-folder"></i>
						<p>Data Master Packing<i class="fa fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('packing/packing_member'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/packing_member') echo 'active'; ?>">
								<i class="fa fa-user nav-icon"></i>
								<p>Packing Member</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo site_url('packing/box_capacity'); ?>" class="nav-link <//?php if ($this->uri->uri_string() == 'packing/box_capacity') echo 'active'; ?>">
								<i class="fa fa-inbox nav-icon"></i>
								<p>Solid Packing Box Capacity</p>
							</a>
						</li>

					</ul>
				</li>

				<li class="nav-item has-treeview <?php if (
														$this->uri->uri_string() == 'packing/packing_solid' ||
														$this->uri->uri_string() == 'packing/create_barcode'
													) echo 'menu-open'; ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-list"></i>
						<p>
							Entry Packing
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						<li class="nav-item">
							<a href="<?php echo site_url('packing/packing_solid'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/packing_solid') echo 'active'; ?>">
								<!-- <i class="fa fa-arrow-circle-right nav-icon"></i> -->
								<i class="fa fa-circle nav-icon"></i>
								<p>Solid Packing</p>
							</a>
						</li>

						<!-- <li class="nav-item">
							<a href="<//?php echo site_url('packing/packing_assorted'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/packing_assorted') echo 'active'; ?>">
								<i class="fa fa-sort nav-icon"></i>
								<p>Assorted Packing</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<//?php echo site_url('packing/packing_combine'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/packing_combine') echo 'active'; ?>">
								<i class="fa fa-random nav-icon"></i>
								<p>Combine Packing</p>
							</a>
						</li> -->

						<!--<li class="nav-item">
							<a href="<//?php echo site_url('packing/create_barcode'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/create_barcode') echo 'active'; ?>">
								
								<i class="fa fa-barcode nav-icon"></i>
								<p>Generate Barcode</p>
							</a>
						</li> -->
						
					</ul>
				</li>

				<li class="nav-item has-treeview <?php if ($this->uri->uri_string() == 'packing/input_packing' || $this->uri->uri_string() == 'packing') echo 'menu-open'; ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-dropbox"></i>
						<p>
							Packing Process
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('packing/input_packing'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/input_packing') echo 'active'; ?>">
								<i class="fa fa-download nav-icon"></i>
								<p>Input Packing</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('packing'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing') echo 'active'; ?>">
								<i class="fa fa-upload nav-icon"></i>
								<p>Output Packing</p>
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