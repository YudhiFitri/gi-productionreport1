<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">

	<link href="<?php echo base_url('plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">

	<style>
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

		<!-- Main Sidebar Container -->
		<?php if ($this->session->userdata('username') == 'Mover Packing') {
			$this->load->view('_partials/navbar_packing_mover.php');
			$this->load->view('_partials/sidebar_packing_mover.php');
		} elseif ($this->session->userdata('username') == 'Admin Packing') {
			$this->load->view('_partials/navbar_packing.php');
			$this->load->view('_partials/sidebar_packing.php');
		}
		?>
		<!-- <//?php $this->load->view('_partials/sidebar_packing.php'); ?> -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Input Packing </h1>
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
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Data Detail Input Packing</h3>
								</div>
								<div class="card-body">
									<table id="inputPackingDetailTable" class="table table-striped table-hover" style="width: 100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>ORC</th>
												<th>Tanggal</th>
												<th>Style</th>
												<th>Color</th>
												<th>Size</th>
												<th>Pcs</th>
												<th>No.Bundle</th>
											</tr>
										</thead>
                                        <tbody>
                                            <?php foreach($data as $d): ?>
                                                <tr>
                                                    <td><?= $d->id_input_packing; ?></td>
                                                    <td><?= $d->orc; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($d->tgl)); ?></td>
                                                    <td><?= $d->style; ?></td>
                                                    <td><?= $d->color; ?></td>
                                                    <td><?= $d->size; ?></td>
                                                    <td><?= $d->actual_qty; ?></td>
                                                    <td><?= $d->no_bundle; ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
										<tfoot>
											<tr>
												<th>ID</th>
												<th>ORC</th>
												<th>Tanggal</th>
												<th>Style</th>
												<th>Color</th>
												<th>Size</th>
												<th>Pcs</th>
												<th>No.Bundle</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>

					</div><!-- /.container-fluid -->

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php $this->load->view('_partials/footer.php'); ?>


		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<?php $this->load->view('_partials/js.php'); ?>
	<?php $this->load->view('_partials/modal.php'); ?>
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
            console.log(localStorage.getItem('inputPacking_barcode'));
			var inputPackingDetailTable = $('#inputPackingDetailTable').DataTable({

				dom: 'lBfrtip',
				buttons: [
					'excel', 'print',
					{
						text: 'Kembali',
						action: function() {
							history.back();
						}
					}
				],
				"autoWidth": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100, -1],
					[5, 10, 15, 20, 25, 75, 100, "all"]
				],

				"columnDefs": [{
					"targets": [0],
					"visible": false
				}]
			});

		});
	</script>
</body>

</html>
