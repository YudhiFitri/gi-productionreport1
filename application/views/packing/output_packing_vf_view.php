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
							<h1 class="m-0 text-dark"><strong>VF</strong> Output Packing </h1>
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
									<h3 class="card-title"><strong>VF</strong> Data Output Packing <strong>Today</strong></h3>
								</div>
								<div class="card-body">
									<div class='row'>
										<div class='col-6'>
											<div class='form-group'>
												<label>Line:</label>
												<select id='line' class='form-control' style='width: 100%;'></select>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label><strong>Scan Barcode Here:</strong></label>
												<input type='text' id='kode_barcode' class='form-control'>
											</div>
										</div>
									</div>
									<hr>
									<table id="vfPackingTable" class="table table-striped table-hover" style="width: 100%">
										<thead>
											<tr>
												<!-- <th>Tanggal</th> -->
												<th>Line</th>
												<th>ORC</th>
												<th>Style</th>
												<th>Color</th>
												<th>Size</th>
												<th>No.Box</th>
												<th class="text-center">Qty</th>
												<th>Barcode</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<!-- <th>Tanggal</th> -->
												<th>Line</th>
												<th>ORC</th>
												<th>Style</th>
												<th>Color</th>
												<th>Size</th>
												<th>No.Box</th>
												<th class="text-center">Qty</th>
												<th>Barcode</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="card-footer">

								</div>
							</div>
						</div>
					</div>

					<!--edit box_capacity modal-->
					<div class="modal" id="modalEditQty_vf" role="dialog" tabindex="-1">
						<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header bg-success">
									<h4 class="modal-title">Edit QTY</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-md-4 col-form-label text-right">QTY: </label>
										<div class="col-md-4">
											<input type="number" id="qty" class="form-control">
										</div>

									</div>
								</div>
								<div class="modal-footer bg-success">
									<button type="button" id="btnUpdateQty" class="btn btn-warning btn-sm shadow-sm"><i class="fa fa-check"></i> OK</button>
								</div>
							</div>
						</div>
					</div>

					<!--end of packing modal-->

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
			var barcodeOperator = "";
			var barcodePacking = "";

			var dataOutputPacking;

			$('#kode_barcode').prop('disabled', true);

			$('#line').select2({
				theme: 'classic',
			});


			var lines = $.ajax({
				type: 'GET',
				url: '<?= site_url("OutputPackingVF/ajax_get_all_lines"); ?>',
				dataType: 'json'
			})

			lines.done(function(rst) {
				if (rst != null) {
					$('#line').empty();
					$.each(rst, function(i, item) {
						$('#line').append($('<option>', {
							value: item.name,
							text: item.name
						}))
					});
					$('#line').select2('open').trigger('change');
				}
			});

			$('#line').change(function(){
				var selectedOption = $(this).val();
				if (selectedOption != null) {
					$('#kode_barcode').prop('disabled', false);
					// $('#kode_barcode_operator').focus();
				}				
			})

			var vfPackingTable = $('#vfPackingTable').DataTable({
				"autoWidth": true,
				"processing": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				"select": {
					"style": "single"
				},
				"ajax": {
					"url": "<?php echo site_url('OutputPackingVF/ajax_list_today_vf'); ?>",
					"type": "GET",
					"dataType": "json",
				},
				"columns": [{
						"data": 'line'
					},
					{
						"data": 'orc'
					},
					{
						"data": 'style'
					},
					{
						"data": 'color'
					},
					{
						"data": 'size'
					},
					{
						"data": 'no_box'
					},
					{
						"data": 'qty'
					},
					{
						"data": 'barcode'
					},					
				],
				"columnDefs": [{
					"targets": [6],
					"className": "text-center"
				}, ]
			});

			$('#line').on('select2:select', function(e) {
				var data = e.params.data;
				if (data.text != "") {
					$('#kode_barcode').prop('disabled', false);
					$('#kode_barcode').focus();
				}
			});

			$('#kode_barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					let barcode = $(this).val().toString();

					if (barcode.includes('CTKY')) {
						if (barcodeOperator == "") {
							Swal.fire({
								type: 'warning',
								text: 'Barcode operator packing harus di scan dulu!!',
								showConfirmButton: true,
								onAfterClose: () => {
									$(this).val('');
									$(this).focus()
								}
							})
						} else {
							checkBarcodePackingList(barcode);
						}
					} else {
						barcodeOperator = barcode;
						checkBarcodeOperatorPacking(barcode);
					}

				}
			});

			function checkBarcodeOperatorPacking(codeOp) {
				$.ajax({
					type: 'get',
					url: '<?php echo site_url("packing/ajax_check_packing_member"); ?>/' + codeOp,
					dataType: 'json',
				}).done(function(d) {
					if (d == 0) {
						Swal.fire({
							type: 'warning',
							title: 'Peringatan',
							html: '<h3><strong>Barcode Operator Packing not found!</strong></h3>',
							showConfirmButton: false,
							timer: 1000,
							onAfterClose: () => {
								$('#kode_barcode').val('');
								$('#kode_barcode').trigger('focus');
							}
						});
					} else {
						barcode1 = barcode;
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<h3><strong>Barcode ID Packing berhasil di Scan.<br>Silahkan Scan Barcode Packing</strong></h3>',
							showConfirmButton: false,
							timer: 3000,
							onAfterClose: () => {
								$('#kode_barcode').val("");
								$('#kode_barcode').trigger('focus');
								// reloadTable()

							}
						});
					}
				});
			}

			function checkBarcodePackingList(code) {
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("PackingListVF/ajax_get_barcode_packing_vf"); ?>/' + code,
					dataType: 'json'
				}).done(function(dt) {
					console.log('dt: ', dt);
					if (dt == null) {
						Swal.fire({
							type: 'warning',
							title: 'Peringatan!',
							html: '<h3><strong>Barcode not found!!</strong></h3>',
							showConfirmButton: false,
							timer: 750,
							onAfterClose: () => {
								$('#kode_barcode').val("");
								$('#kode_barcode').trigger('focus');
							}
						});
					} else {
						//check di output packing details-control
						$.ajax({
							type: 'GET',
							url: '<?= site_url("OutputPackingVF/ajax_check_by_barcode"); ?>/' + code,
							dataType: 'json'
						}).done(function(rowCount) {
							console.log('rowCount: ', rowCount);
							if (rowCount > 0) {
								Swal.fire({
									type: 'warning',
									title: 'Peringatan!',
									html: '<h3><strong>Barcode sudah di scan!!</strong></h3>',
									showConfirmButton: false,
									timer: 2500,
									onAfterClose: () => {
										$('#kode_barcode').val("");
										$('#kode_barcode').trigger('focus');
									}
								});
							} else {
								dataOutputPacking = {
									'line': $('#line').val(),
									'po': dt.po,
									'orc': dt.orc,
									'style': dt.style,
									'color': dt.color,
									'size': dt.size,
									'no_box': dt.carton_no,
									'qty': dt.qty_box,
									'barcode': code,
									'barcode_operator': barcodeOperator,
								}
								console.log('dataOutputPacking: ', dataOutputPacking);
								Swal.fire({
									title: 'Konfirmasi ubah qty',
									html: '<h2>Apakah akan mengubah qty?</h2>',
									type: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Ya',
									cancelButtonText: 'Tidak'
								}).then((result) => {
									console.log('result: ', result);
									if (result.value === true) {
										showModalEditQty(dataOutputPacking.qty);
									} else if (result.dismiss === 'cancel') {
										saveOutputPacking();
									}
								})

							}
						})
					}

				});
			}

			function showModalEditQty(qty) {
				$('#modalEditQty_vf').modal('show');
				$('#qty').attr('min', "1");
				$('#qty').attr('max', qty);
				$('#qty').val(qty);
				$('#qty').text(qty);
			}

			$('#modalEditQty_vf').on('shown.bs.modal', function() {
				$('#qty').trigger('focus');
			});

			$('#modalEditQty_vf').on('hidden.bs.modal', function() {
				$('#qty').val('');
			});

			$('#btnUpdateQty').click(function() {
				dataOutputPacking.qty = $('#qty').val();
				$('#modalEditQty_vf').modal('hide');
				saveOutputPacking();

			});

			function saveOutputPacking() {
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("OutputPackingVF/ajax_save"); ?>',
					data: {
						'dataOutputPacking': dataOutputPacking
					},
					dataType: 'json',
				}).done(function(id) {
					if (id > 0) {
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<h3><strong>Simpan Data Output Packing Berhasil.</strong></h3>',
							showConfirmButton: false,
							timer: 2000,
							onAfterClose: () => {
								$('#kode_barcode').val('');
								$('#kode_barcode').trigger('focus');
								reloadTable()
								// $('#modalEditQty').modal('hide');
							}
						});
					}
				});
			}

			function reloadTable() {
				vfPackingTable.ajax.reload(null, false);
			}

		});
	</script>
</body>

</html>
