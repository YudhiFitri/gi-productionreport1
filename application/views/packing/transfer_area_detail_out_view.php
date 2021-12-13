<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Transfer Area Detail</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/animate/animate.min.css'); ?>" rel="stylesheet">

	<link href="<?php echo base_url('plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">

	<style>
		td.details-control {
			background: url('../img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('../img/details_close.png') no-repeat center center;
		}

		div.slider {
			display: none;
		}

		table.dataTable tbody td.no-padding {
			padding: 0;
		}

		p {
			margin-top: 0;
			margin-bottom: 0;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<!-- <//?php $this->load->view('_partials/navbar_packing.php'); ?> -->
		<!-- /.navbar -->

		<!-- Main Navbar & Sidebar Container -->
		<?php
		if ($this->session->userdata('username') == "Operator Packing") {
			$this->load->view('_partials/navbar_packing_operator.php');
			$this->load->view('_partials/sidebar_packing_operator.php');
		} else if ($this->session->userdata('username') == "Admin Packing") {
			$this->load->view('_partials/navbar_packing.php');
			$this->load->view('_partials/sidebar_packing.php');
		}
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Transfer Area </h1>
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
							<div class="card card-info card-outline">
								<div class="card-header">
									<h3 class="card-title">Detail Transfer Area (OUT)</h3>
								</div>
								<div class="card-body">
									<table class="table table-hover table-striped table-bordered" style="width:100%" id="tableTransferAreaDetailOut">
										<thead>
											<tr>
												<th>Tanggal</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th>Size</th>
												<th>No.Box</th>
												<th>Qty</th>
												<th>Barcode</th>
												<th>Lokasi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data as $d) : ?>
												<tr>
													<td><?= date('d-m-Y', strtotime($d->tgl_out)); ?></td>
													<td><?= $d->po; ?></td>
													<td><?= $d->style; ?></td>
													<td><?= $d->color; ?></td>
													<td><?= $d->orc; ?></td>
													<td><?= $d->size; ?></td>
													<td><?= $d->carton_no; ?></td>
													<td><?= $d->qty_box; ?></td>
													<td><?= $d->barcode; ?></td>
													<td><?= $d->lokasi; ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
											<tr>
												<th>Tanggal</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th>Size</th>
												<th>No.Box</th>
												<th>Qty</th>
												<th>Barcode</th>
												<th>Lokasi</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="card-footer">
									<a href="<?= site_url('TransferArea/transferAreaOutput') ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
								</div>
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


	<!-- Control Sidebar -->
	<!-- <aside class="control-sidebar control-sidebar-dark"> -->
	<!-- Control sidebar content goes here -->
	<!-- </aside> -->
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<?php $this->load->view('_partials/js.php'); ?>
	<?php $this->load->view('_partials/modal.php'); ?>
	<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>

	<script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/buttonshtml5/js/buttons.html5.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/jszip/js/jszip.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/buttonprint/js/buttons.print.min.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			$('#tableTransferAreaDetailOut').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'excel', 'print'
				]
			});
		})
	</script>
</body>

</html>
