<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Output Sewing</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/js.php'); ?>
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<!-- <link href="<//?php echo base_url('plugins/tooltipster/css/tooltipster.bundle.min.css'); ?>" rel="stylesheet"> -->

</head>

<!-- <body class="hold-transition sidebar-mini"> -->

<body class="layout-top-nav sidebar-collapse" style="height: auto">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar_mekanik.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<!-- <//?php $this->load->view('_partials/sidebar_mekanik.php'); ?> -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6 text-center">
							<h1 class="m-0 text-dark text-center">Mechanic Panel - Clearing Machine Breakdowns </h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card card-danger">
								<div class="card-header">
									<h3 class="card-title text-center">Machine Breakdowns And Repairings</h3>
								</div>
								<div class="card-body">
									<table id="machineBreakdownRepairingTable" class="table table-striped" style="width: 100%">
										<thead>
											<th>ID</th>
											<th>Tanggal</th>
											<th>Machine Type</th>
											<th>Brand</th>
											<th>Type</th>
											<th>Serial Number</th>
											<th>Sympthom</th>
											<th>Line</th>
											<th>Status</th>
											<th></th>
										</thead>
										<tfoot>
											<th>ID</th>
											<th>Tanggal</th>
											<th>Machine Type</th>
											<th>Brand</th>
											<th>Type</th>
											<th>Serial Number</th>
											<th>Sympthom</th>
											<th>Line</th>
											<th>Status</th>
											<th></th>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php $this->load->view('_partials/footer.php'); ?>
		<?php $this->load->view('_partials/modal.php'); ?>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->

	<?php $this->load->view('_partials/modal.php'); ?>
	<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>



	<script>
		var table;
		$(document).ready(function() {
			table = $('#machineBreakdownRepairingTable').DataTable({
				responsive: true,
				ajax: '<?= site_url("Mekanik/ajax_get_machines_breakdown_or_repairing"); ?>',
				columns: [{
						data: 'id_machine_breakdown'
					},
					{
						data: 'tgl_breakdown'
					},
					{
						data: 'machine_type'
					},
					{
						data: 'machine_brand'
					},
					{
						data: 'type'
					},
					{
						data: 'machine_sn'
					},
					{
						data: 'sympton'
					},
					{
						data: 'line'
					},
					{
						data: 'status'
					},
					{
						data: null,
						render: function(data) {
							return '<button class="btn btn-sm btn-outline-danger" onclick="clearing(' + "'" + data.id_machine_breakdown + "'" + ')"><i class="fa fa-trash">&nbsp;</i> Clear</button>';
						}
					}

				],
				columnDefs: [{
					targets: [0],
					visible: false
				}]
			})


		});

		function clearing(id) {
			$.ajax({
				type: 'POST',
				url: '<?= site_url("Mekanik/ajax_clear_machine_breakdown_or_repairing"); ?>/' + id,
				dataType: 'json'
			}).done(function(affRow) {
				console.log('affRow: ', affRow);
				if (affRow > 0) {
					Swal.fire({
						type: "success",
						title: "Berhasil",
						text: "Hapus data machine breakdown berhsil",
						showConfirmButton: false,
						timer: 1750,
						onAfterClose: () => {
							reloadTable();
						}
					});
				}
			});
		}

		function reloadTable() {
			table.ajax.reload();
		}
	</script>
</body>

</html>
