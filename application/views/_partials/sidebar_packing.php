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
													)  echo 'menu-open'; ?>">
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
							<a href="<?php echo site_url('packing/box_capacity'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'packing/box_capacity') echo 'active'; ?>">
								<i class="fa fa-inbox nav-icon"></i>
								<p>Solid Packing Box Capacity</p>
							</a>
						</li>

					</ul>
				</li>

				<li class="nav-item has-treeview <?php if (
														$this->uri->uri_string() == 'packing/packing_solid'
													)  echo 'menu-open'; ?>">
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
					</ul>
				</li>

				<li class="nav-item has-treeview <?php if (
														$this->uri->uri_string() == 'InputPacking' || 
														$this->uri->uri_string() == 'packing'
													)  echo 'menu-open'; ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-dropbox"></i>
						<p>
							Packing Process
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('InputPacking'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'InputPacking') echo 'active'; ?>">
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
					<!-- <ul class="nav nav-treeview">
						<li class="nav-item">
							<a href='<//?= site_url("PackingDataAnalytic/packingListWIP"); ?>' class="nav-link <?php if ($this->uri->uri_string() == 'packing') echo 'active'; ?>">
								<i class="fa fa-upload nav-icon"></i>
								<p>WIP</p>
							</a>
						</li>
					</ul> -->
				</li>

				<li class="nav-item has-treeview ">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-dropbox"></i>
						<p>
							VF Packing Process
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('PackingListVF'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'PackingListVF') echo 'active'; ?>">
								<!-- <i class="fa fa-arrow-circle-right nav-icon"></i> -->
								<i class="fa fa-circle nav-icon"></i>
								<p>Import VF Packing List</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('OutputPackingVF'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'OutputPackingVF') echo 'active'; ?>">
								<i class="fa fa-circle nav-icon"></i>
								<p>VF Output Packing</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('PackingDataAnalytic/packingListVFWIP'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'OutputPackingVF') echo 'active'; ?>">
								<i class="fa fa-circle nav-icon"></i>
								<p>WIP</p>
							</a>
						</li>

					</ul>
				</li>

				<li class="nav-item has-treeview <?php if (
														$this->uri->uri_string() == 'TransferArea/transferAreaInput' ||
														$this->uri->uri_string() == 'TransferArea/transferAreaOutput' ||
														$this->uri->uri_string() == 'TransferArea/cekPosisiORC'
													)  echo 'menu-open'; ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-ship"></i>
						<p>
							Pre Shipments
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item <?php if (
												$this->uri->uri_string() == 'TransferArea/transferAreaInput' ||
												$this->uri->uri_string() == 'TransferArea/transferAreaOutput' ||
												$this->uri->uri_string() == 'TransferArea/cekPosisiORC'
											) echo 'menu-open'; ?>">
							<a href="#" class="nav-link">
								<i class="fa fa-arrow-right nav-icon"></i>
								<p>
									Finish Good
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url(); ?>/TransferArea/cekPosisiORC" class="nav-link <?php if ($this->uri->uri_string() == 'TransferArea/cekPosisiORC') echo 'active'; ?>">
										<i class="fa fa-circle nav-icon"></i>
										<p>
											Cari Posisi ORC
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url(); ?>/TransferArea/transferAreaInput" class="nav-link <?php if ($this->uri->uri_string() == 'TransferArea/transferAreaInput') echo 'active'; ?>">
										<i class="fa fa-circle nav-icon"></i>
										<p>
											IN
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('TransferArea/transferAreaOutput'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'TransferArea/transferAreaOutput') echo 'active'; ?>">
										<i class="fa fa-circle nav-icon"></i>
										<p>
											OUT
										</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-arrow-right nav-icon"></i>
								<p>
									Finish Good Zona
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<//?= site_url('FinishGoodZone/FGZonaInput'); ?>" class="nav-link <//?php if ($this->uri->uri_string() == 'PackingSAR/FGZonaInput') echo 'active'; ?>">
										<i class="fa fa-circle nav-icon"></i>
										<p>
											Scan Input
										</p>
									</a>
								</li>
							</ul>
						</li> -->

						<!-- <li class="nav-item <//?php if ($this->uri->uri_string() == 'LoadingDock/inputLoadingDock') echo 'menu-open'; ?>">
							<a href="#" class="nav-link">
								<i class="fa fa-arrow-right nav-icon"></i>
								<p>
									Loading Dock
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<//?= site_url(); ?>/LoadingDock/inputLoadingDock" class="nav-link <?php if ($this->uri->uri_string() == 'LoadingDock/inputLoadingDock') echo 'active'; ?>">
										<i class="fa fa-circle nav-icon"></i>
										<p>
											Input
										</p>
									</a>
								</li> -->
						<!-- <li class="nav-item">
									<a href="<//?= site_url(); ?>/OutputLoadingDock/outputLoadingDock" class="nav-link <//?php if ($this->uri->uri_string() == 'OutputLoadingDock/outputLoadingDock') echo 'active'; ?>">
										<i class="fa fa-circle nav-icon"></i>
										<p>
											Scan Output
										</p>
									</a>
								</li> -->
						<!-- </ul>
						</li> -->

					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
