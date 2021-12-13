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
	<link href="<?php echo base_url('plugins/animate/animate.min.css'); ?>" rel="stylesheet">

	<style>
		td.details-control {
			/* background: url('../img/details_open.png') no-repeat center center; */
			background: url('../../img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('../../img/details_close.png') no-repeat center center;
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
		<?php $this->load->view('_partials/navbar_packing.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_packing.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Edit Data Boxes Packing Capacities</h1>
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
							<div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Edit Data Boxes Packing Capacities</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<table id="editPackingDetailTable" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Style</th>
														<th>Size</th>
														<th>Kapsitas(pcs @box)</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>Style</th>
														<th>Size</th>
														<th>Kapasitas(pcs @box)</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<div class="col-6">
											<div class="card card-warning" id="cardEdit">
												<div class="card-header text-center">
													<h3 class="card-title">
														Selected Data
													</h3>
												</div>
												<div class="card-body">
													<div class="form-group">
														<!-- <input type="hidden" name="id_barang" id="id_barang"> -->
														<label class="col-md-4">Style: </label>
														<input type="hidden" id="id_packing_karton">
														<input type="text" id="style_edit" name="style_edit" class="form-control col-md-4" disabled>
													</div>

													<div class="form-group">
														<label class="col-md-4">Size: </label>
														<input type="text" id="size_edit" name="size-edit" class="form-control col-md-2">
													</div>
													<div class="form-group">
														<label class="col-md-4">Kapasitas: </label>
														<input type="number" id="box_capacity_edit" name="box_capacity_edit" class="form-control col-md-2">
													</div>

												</div>
												<div class="card-footer">
													<div class="form-group">
														<button id='btnUpdate' class="btn btn-outline-info btn-sm shadow"><i class="fa fa-upload"></i>&nbsp;Update</button>
													</div>
												</div>
											</div>


										</div>

									</div>
								</div>
								<div class="card-footer">
									<div class="form-group">
										<button class="btn btn-outline-secondary shadow" id="btnBack"><i class="fa fa-arrow-left"></i>&nbsp;Back</button>
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
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
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


	<script>
		$(document).ready(function() {
			var dataSelectedRow;
			var kapasitas_box = JSON.parse(localStorage.getItem('kapasitas_box'));

			var tablePackingSize = $('#editPackingDetailTable').DataTable({
				// "dom": "lrtip",
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				"columnDefs": [{
					"targets": [0],
					"visible": false
				}],
				"select": {
					"style": "single"
				},

			});

			$('#btnUpdate').prop('disabled', true);

			$.each(kapasitas_box, function(i, itm) {
				tablePackingSize.row.add([
					itm.id_packing_karton, itm.style, itm.size, itm.kapasitas_karton
				]).draw();
			})

			$('#editPackingDetailTable tbody').on('click', 'tr', function() {
				dataSelectedRow = tablePackingSize.row(this).data();

				$('#id_packing_karton').val(dataSelectedRow[0]);
				$('#style_edit').val(dataSelectedRow[1]);
				$('#size_edit').val(dataSelectedRow[2]);
				$('#box_capacity_edit').val(dataSelectedRow[3]);

				$('#btnUpdate').prop('disabled', false);
			});

			function addBoxCapacity(style) {
				$('#style').val(style);
				mode = "Add Style Size"

				$('#modal_add_kapasitas_box').modal('show');

			}

			$('#btnUpdate').click(function() {
				let dataKapasitasKarton = {
					'id_packing_karton': $('#id_packing_karton').val(),
					'style': $('#style_edit').val(),
					'size': $('#size_edit').val(),
					'kapasitas_karton': $('#box_capacity_edit').val()
				};

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_update_kapasitas_karton"); ?>',
					data: {
						'dataKapasitasKarton': dataKapasitasKarton
					},
					dataType: 'json'
				}).done(function(affectedRow) {
					if (affectedRow > 0) {
						// updateTable();
						Swal.fire({
							type: 'success',
							title: 'Update Berhasil',
							html: '<h3 style="color: blue;">Data kapasitas karton berhasil di Update.</h3>',
							showConfirmButton: false,
							timer: 1500,
							onAfterClose: () => {
								tablePackingSize.rows({
									selected: true
								}).every(function(rowIdx, tableLoop, rowLoop) {
									tablePackingSize.cell(rowIdx, 2).data($('#size_edit').val());
									tablePackingSize.cell(rowIdx, 3).data($('#box_capacity_edit').val());
								}).draw();
							}
						});
					}
				})
			});

			function clearText() {
				$('#cardEdit').find('input').val('').end();
			}

			$('#btnBack').click(function() {
				localStorage.removeItem('kapasitas_box');
				open('<?php echo site_url('packing/box_capacity'); ?>', '_self');
			});

		});
	</script>
</body>

</html>
