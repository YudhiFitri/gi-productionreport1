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

	<style>
		td.details-control {
			/* background: url('../img/details_open.png') no-repeat center center; */
			/* background: url('../../img/details_open.png') no-repeat center center; */
			background: url('<?= base_url("img/details_open.png"); ?>') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			/* background: url('../../img/details_close.png') no-repeat center center; */
			background: url('<?= base_url("img/details_close.png"); ?>') no-repeat center center;
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
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">
										Scan Barcode
									</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">Barcode:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" id="kode_barcode" class="form-control form-control-sm barcode-detail">
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">ORC:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" id="orc" class="form-control form-control-sm barcode-detail" disabled>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">Style:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" id="style" class="form-control form-control-sm barcode-detail" disabled>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">Color:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" id="color" class="form-control form-control-sm barcode-detail" disabled>
												</div>
											</div>
										</div>

										<div class="col-6">
											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">Size:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" id="size" class="form-control form-control-sm barcode-detail" disabled>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">#Bundle:</label>
												</div>
												<div class="col-sm-6">
													<input type="text" id="no_bundle" class="form-control form-control-sm barcode-detail" disabled>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">Qty:</label>
												</div>
												<div class="col-sm-2">
													<input type="text" id="qty" class="form-control form-control-sm barcode-detail" disabled>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label for="" class="col-form-label col-form-label-sm">Actual Qty:</label>
												</div>
												<div class="col-sm-2">
													<input type="number" id="actual_qty" class="form-control form-control-sm barcode-detail">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer row">
									<!-- <div class="col-sm-2 text-right"> -->
									<button id="btnSave" class="btn btn-outline-success"><i class="fa fa-upload"></i>&nbsp;Save</button>
									&nbsp;&nbsp;
									<!-- </div> -->
									<!-- <div class="col-sm-2 text-left"> -->
									<button id="btnCancel" class="btn btn-outline-warning"><i class="fa fa-close"></i>&nbsp;Cancel</button>
									<!-- </div> -->
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Data Input Packing</h3>
								</div>
								<div class="card-body">
									<table id="inputPackingTable" class="table table-striped table-hover" style="width: 100%">
										<thead>
											<tr>
												<!-- <th></th> -->
												<th>ORC</th>
												<th>Style</th>
												<th>Color</th>
												<th></th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<!-- <th></th> -->
												<th>ORC</th>
												<th>Style</th>
												<th>Color</th>
												<th></th>
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


	<script>
		$(document).ready(function() {
			const regBarcodeBundle = /(cp|bw|cu|as|pa)+_g\d{1}-/i; //regex untuk barcode Sewing

			var table;
			var tableDetail;
			var kode;
			var qty = 0;

			table = $('#inputPackingTable').DataTable({
				"autoWidth": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				"ajax": {
					"url": "<?php echo site_url('InputPacking/ajax_list'); ?>",
					"type": "POST",
					"dataType": "json",
				},
				"columns": [{
						"data": 'orc',
					},
					{
						"data": 'style',
					},
					{
						"data": 'color',
					},
					{
						"data": null,
					},
				],
				"columnDefs": [{
					"targets": [3],
					"render": function(data, type, row, meta) {
						return '<button type="button" class="btn btn-info btn-sm btnShowDetail">Show Detail</button>';
					}
				}]
			});

			$('#btnSave').prop('disabled', true);
			$('#btnCancel').prop('disabled', true);

			$('#kode_barcode').focus();

			$('#kode_barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					var barcode = $(this).val();

					if (!regBarcodeBundle.test(barcode)) {
						Swal.fire({
							type: 'warning',
							title: 'Warning',
							html: '<h1><strong>Invalid barcode!!</strong></h1>',
							showConfirmButton: false,
							timer: 1000,
							onAfterClose: () => {
								$(this).val('');
								$(this).focus();
							}
						});
					} else {
						kode = barcode.split('_');
						$.ajax({
							type: 'GET',
							url: '<?php echo site_url("packing/ajax_check_input_packing"); ?>/' + kode[1],
							dataType: 'json'
						}).done(function(retVal) {
							if (retVal == 0) {
								showBarcodeDetail();
							} else {
								Swal.fire({
									type: 'warning',
									title: 'Peringatan!',
									html: '<h1><strong>Barcode sudah di-SCAN!!</strong></h1>',
									showConfirmButton: false,
									timer: 2000
								});
								$('#kode_barcode').val('');
								$('#kode_barcode').focus('');
							}
						})
					}
				}
			});

			// });

			function showBarcodeDetail() {
				console.log(kode[1]);
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_get_cutting_detail"); ?>/' + kode[1],
					dataType: 'json'
				}).done(function(d) {
					console.log('d: ', d);
					if (d != null) {
						$('#orc').val(d.orc);
						$('#style').val(d.style);
						$('#color').val(d.color);
						$('#size').val(d.size);
						$('#no_bundle').val(d.no_bundle);
						$('#qty').val(d.qty_pcs);
						$('#actual_qty').val(d.qty_pcs);

						$('#actual_qty').prop('disabled', false);
						$('#actual_qty').attr('max', qty.toString());
						$('#actual_qty').attr('min', '1');
						$('#btnSave').prop('disabled', false);
						$('#btnCancel').prop('disabled', false);
						$('#actual_qty').focus();
					}
				})
			}

			$('#btnSave').click(function() {
				saveData();
			})

			function saveData() {
				var dataStr = {
					'kode_barcode': kode[1],
					'orc': $('#orc').val(),
					'style': $('#style').val(),
					'color': $('#color').val(),
					'qty': $('#qty').val(),
					'size': $('#size').val(),
					'no_bundle': $('#no_bundle').val(),
					'actual_qty': $('#actual_qty').val()
				}
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("InputPacking/ajax_save"); ?>',
					data: {
						'dataStr': dataStr
					},
					dataType: 'json'
				}).done(function(id) {
					if (id > 0) {
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<strong>Simpan Data Input Packing Berhasil</strong>',
							showConfirmButton: false,
							timer: 750,
							onAfterClose: () => {
								setDefaultInputs();
								reloadTable();
								$('#kode_barcode').trigger('focus');
							}
						});
					}
				});
			}

			$('#btnCancel').click(function() {
				setDefaultInputs();
				$('#kode_barcode').focus('');
			});

			function setDefaultInputs() {
				$('input.barcode-detail').val('');
				$('#actual_qty').prop('disabled', true);
				$('#btnSave').prop('disabled', true);
				$('#btnCancel').prop('disabled', true);

			}

			function reloadTable() {
				table.ajax.reload(null, false);
			}

			$('#inputPackingTable tbody').on('click', 'button.btnShowDetail', function() {
				var data = table.row($(this).parents('tr')).data();
				// showDetail(data.orc);
				// localStorage.setItem('inputPacking_barcode', data.orc);
				open(`<?= site_url("InputPacking/ajax_get_by_orc1"); ?>/${data.orc}`, '_self');
				// open(`<//?= site_url("InputPacking/ajax_show_input_packing_detail"); ?>`, '_self');

			});

		});
	</script>
</body>

</html>
