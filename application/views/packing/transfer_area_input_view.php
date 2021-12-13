<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Transfer Area</title>
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

		table.dataTable tbody th,
		table.dataTable tbody td {
			padding: 2px 6px;
		}

		table.dataTable th {
			padding: .5rem;
		}

		label.error.fail-alert {
			border: 2px solid red;
			border-radius: 4px;
			line-height: 1;
			padding: 2px 0 6px 6px;
			background: #ffe6eb;
		}

		input.valid.success-alert {
			border: 2px solid #4CAF50;
			color: green;
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
								<div class="card-header d-flex p-0">
									<h3 class="card-title p-3">Finish Good (Scan Input)</h3>
									<ul class="nav nav-pills ml-auto p-1">
										<li class="nav-item">
											<a href="#tabFixedBox" class="nav-link active show" data-toggle="tab">Fixed Box</a>
										</li>
										<li class="nav-item">
											<a href="#tabPcsBox" class="nav-link" data-toggle="tab">Pcs Box</a>
										</li>
										<li class="nav-item">
											<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
												<i class="fa fa-minus"></i>
											</button>
										</li>
									</ul>
									<!-- <div class="card-tools">

									</div> -->
								</div>
								<div class="card-body">
									<div class="tab-content">
										<div class="tab-pane active show" id="tabFixedBox">
											<button type="button" class="btn btn-outline-info my-2" id="btnNewInputTA"><i class="fa fa-plus"></i>&nbsp;Add New</button>
											<div class="row">
												<div class="form-group col-6">
													<label class="my-0">Barcode Operator:</label>
													<input type="text" class="form-control form-control-sm" id="barcodeOperator" disabled>
												</div>
												<div class="form-group col-6">
													<label class="my-0">Barcode Packing:</label>
													<input type="text" class="form-control form-control-sm" id="barcodePacking" disabled>
												</div>
											</div>
											<table class="table table-bordered table-striped table-hover" id="tableInputTransferAreaTemp">
												<thead>
													<tr>
														<th>#</th>
														<th>ORC</th>
														<th>Style</th>
														<th>Color</th>
														<th>Size</th>
														<th>No.Box</th>
														<th>Pcs</th>
														<th>Barcode</th>
														<th>Lokasi</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th colspan="7" style="text-align:right">Total: </th>
														<th></th>
														<th></th>
													</tr>
												</tfoot>
											</table>
										</div>
										<div class="tab-pane" id="tabPcsBox">
											<div class="row">
												<div class="col-6">
													<div class="form-group row">
														<div class="col-sm-2 text-right">
															<label for="" class="col-form-label">Barcode:</label>
														</div>
														<div class="col-sm-6">
															<input type="text" id="barcodePackingPcs" class="form-control barcode-detail">
														</div>
													</div>

													<div class="form-group row">
														<div class="col-sm-2 text-right">
															<label for="" class="col-form-label">ORC:</label>
														</div>
														<div class="col-sm-6">
															<input type="text" id="orc" class="form-control barcode-detail" disabled>
														</div>
													</div>

													<div class="form-group row">
														<div class="col-sm-2 text-right">
															<label for="" class="col-form-label">Style:</label>
														</div>
														<div class="col-sm-6">
															<input type="text" id="style" class="form-control barcode-detail" disabled>
														</div>
													</div>

													<div class="form-group row">
														<div class="col-sm-2 text-right px-0">
															<label for="" class="col-form-label">Color:</label>
														</div>
														<div class="col-sm-6">
															<input type="text" id="color" class="form-control barcode-detail" disabled>
														</div>
													</div>
												</div>

												<div class="col-6">
													<div class="form-group row">
														<div class="col-sm-2 text-right px-0">
															<label for="" class="col-form-label">Size: </label>
														</div>
														<div class="col-sm-6">
															<input type="text" id="size" class="form-control barcode-detail" disabled>
														</div>

													</div>

													<div class="form-group row">
														<div class="col-sm-2 text-right px-0">
															<label for="" class="col-form-label">No.Bundle:</label>
														</div>
														<div class="col-sm-6">
															<input type="text" id="no_bundle" class="form-control barcode-detail" disabled>
														</div>

													</div>

													<div class="form-group row">
														<div class="col-sm-2 text-right px-0">
															<label for="" class="col-form-label">Pcs:</label>
														</div>
														<div class="col-sm-2">
															<input type="text" id="pcs" class="form-control barcode-detail" disabled>
														</div>

													</div>
													<div class="form-group row">
														<div class="col-sm-2 text-right px-0">
															<label class="col-form-label px-0 text-left">New Pcs:</label>
														</div>
														<div class="col-sm-2">
															<input type="number" id="new_pcs" class="form-control barcode-detail">
														</div>

													</div>
												</div>
											</div>
											<hr />
											<button type="button" id="btnInputManual" class="btn btn-info float-right"><i class="fa fa-user"></i>&nbsp;Input Manual</button>											
											<button type="button" id="btnUpdatePcsBox" class="btn btn-success" disabled><i class="fa fa-upload"></i>&nbsp;Update</button>
											<button type="button" id="btnCancelPcsBox" class="btn btn-warning"><i class="fa fa-close"></i>&nbsp;Cancel</button>
											<hr>
											<table class="table table-bordered table-striped table-hover" id="tableInputTransferAreaPcsTemp">
												<thead>
													<tr>
														<th>#</th>
														<th>ORC</th>
														<th>Style</th>
														<th>Color</th>
														<th>Size</th>
														<th>No.Box</th>
														<th>Pcs</th>
														<th>Barcode</th>
														<th>Lokasi</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th colspan="6" style="text-align:right">Total: </th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>

								</div>
							</div>

						</div>
						<div class="col-12">
							<div class="card card-success card-outline">
								<div class="card-header">
									<h3 class="card-title">List of Transfer Area - Summary And Detail</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<table class="table table-hover table-striped" style="width:100%" id="tableInputTransferArea">
										<thead>
											<tr>
												<th>#</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th>Jml Box</th>
												<th>Total Pcs</th>
												<th>Lokasi</th>
												<th></th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>#</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th>Jml Box</th>
												<th>Total Pcs</th>
												<th>Lokasi</th>
												<th></th>
											</tr>
										</tfoot>
									</table>

								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="modalInputFG" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Finish Good Input Manually</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times</span>
									</button>
								</div>
								<form id="formInputManual" name="formInputManual">
									<div class="modal-body">
										<div class="row">
											<div class="col-6">
												<div class="form-group row">
													<div class="col-sm-2 text-right">
														<label class="col-form-label">ORC:</label>
													</div>
													<div class="col-sm-6">
														<input type="text" id="orcManual" name="orcManual" class="form-control form-control-sm inputManual" minlength="10">
													</div>
												</div>

												<div class="form-group row">
													<div class="col-sm-2 text-right">
														<label for="" class="col-form-label">Style:</label>
													</div>
													<div class="col-sm-6">
														<input type="text" id="styleManual" name="styleManual" class="form-control form-control-sm inputManual">
													</div>
												</div>

												<div class="form-group row">
													<div class="col-sm-2 text-right px-0">
														<label for="" class="col-form-label">Color:</label>
													</div>
													<div class="col-sm-6">
														<input type="text" id="colorManual" name="colorManual" class="form-control form-control-sm inputManual">
													</div>
												</div>
											</div>

											<div class="col-6">
												<div class="form-group row">
													<div class="col-sm-2 text-right px-0">
														<label for="" class="col-form-label">Size: </label>
													</div>
													<div class="col-sm-4">
														<input type="text" id="sizeManual" name="sizeManual" class="form-control form-control-sm inputManual">
													</div>
												</div>

												<div class="form-group row">
													<div class="col-sm-2 text-right px-0">
														<label for="" class="col-form-label">No.Box: </label>
													</div>
													<div class="col-sm-4">
														<input type="text" id="noBoxManual" name="noBoxManual" class="form-control form-control-sm inputManual">
													</div>
												</div>

												<div class="form-group row">
													<div class="col-sm-2 text-right px-0">
														<label for="" class="col-form-label">Pcs:</label>
													</div>
													<div class="col-sm-4">
														<input type="number" id="pcsManual" name="pcsManual" class="form-control form-control-sm inputManual">
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-2 text-right px-0">
														<label class="col-form-label">Line:</label>
													</div>
													<div class="col-sm-4">
														<select id="lineManual" name="lineManual" class="form-control form-control-sm" style="width:100%"></select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" id="btnSaveManual" class="btn btn-success"><i class="fa fa-upload"></i>&nbsp;Save</button>
										<button type="button" id="btnCancelManual" class="btn btn-warning"><i class="fa fa-close"></i>&nbsp;Cancel</button>
									</div>
								</form>
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
	<script src="<?php echo base_url('plugins/moment/moment.min.js'); ?>"></script>

	<script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/buttonshtml5/js/buttons.html5.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/jszip/js/jszip.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/buttonprint/js/buttons.print.min.js'); ?>"></script>

	<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>	

	<script>
		$(document).ready(function() {
			const opCodeRegex = /\d{8}/;
			// const packingCodeRegex = /ctky/i;
			const packingCodeRegex = /g\d{1}-\d{2}\w{1}\d{1}\d{1}\d{1}\w{1}\-\d{1}?/i //regex untuk barcode packing

			var barcodeOp, barcodePacking, noUrut = 0,noUrutPcs = 0,
				findDoublePackingBarcode = false;

			$('#btnNewInputTA').click(function() {
				tableInputTransferAreaTemp.clear().draw();
				noUrut = 0;
				$('#barcodeOperator').val('');
				$('#barcodeOperator').prop('disabled', false);
				$('#barcodeOperator').focus();
			})

			var tableInputTransferAreaTemp = $('#tableInputTransferAreaTemp').DataTable({
				destroy: true,
				"footerCallback": function(row, data, start, end, display) {
					var api = this.api(),
						data;

					// Remove the formatting to get integer data for summation
					var intVal = function(i) {
						return typeof i === 'string' ?
							i.replace(/[\$,]/g, '') * 1 :
							typeof i === 'number' ?
							i : 0;
					};

					// Total over all pages
					total = api
						.column(7)
						.data()
						.reduce(function(a, b) {
							return intVal(a) + intVal(b);
						}, 0);

					// Total over this page
					pageTotal = api
						.column(7, {
							page: 'current'
						})
						.data()
						.reduce(function(a, b) {
							return intVal(a) + intVal(b);
						}, 0);

					// Update footer
					$(api.column(7).footer()).html(
						pageTotal + ' (' + total + ')'
					);
				}
			});

			var tableInputTransferAreaPcsTemp = $('#tableInputTransferAreaPcsTemp').DataTable({
				destroy: true,
				select: {
					style: 'single'
				},
				"footerCallback": function(row, data, start, end, display) {
					var api = this.api(),
						data;

					// Remove the formatting to get integer data for summation
					var intVal = function(i) {
						return typeof i === 'string' ?
							i.replace(/[\$,]/g, '') * 1 :
							typeof i === 'number' ?
							i : 0;
					};

					// Total over all pages
					total = api
						.column(6)
						.data()
						.reduce(function(a, b) {
							return intVal(a) + intVal(b);
						}, 0);

					// Total over this page
					pageTotal = api
						.column(6, {
							page: 'current'
						})
						.data()
						.reduce(function(a, b) {
							return intVal(a) + intVal(b);
						}, 0);

					// Update footer
					$(api.column(6).footer()).html(
						pageTotal + ' (' + total + ')'
					);
				}
			});			

			var tableInputTransferArea = $('#tableInputTransferArea').DataTable({
				dom: 'flBrtip',
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
					"url": "<?php echo site_url('TransferArea/ajax_get_all_in'); ?>",
					"type": "GET",
					"dataType": "json",
				},
				"columns": [{
						"data": null,
					},
					{
						"data": 'po'
					},
					{
						"data": 'style'
					},
					{
						"data": 'color'
					},
					{
						"data": 'orc'
					},
					{
						"data": 'jmlBox'
					},
					{
						"data": 'jmlPcs'
					},
					{
						"data": 'lokasi'
					},
					{
						"data": null
					},

				],
				"columnDefs": [{
						"targets": [0],
						"visible": false
					},
					{
						"targets": [8],
						"render": function(data, type, row, meta) {
							return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferArea">Summary</button>' +
								'<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea">Detail</button>';
						}
					},
				],
				buttons: [{
					text: 'Filter By Line',
					action: function() {
						console.log('Filter');
					}
				}]
			});


			$('#tableInputTransferArea tbody').on('click', 'button.btnShowDetailTransferArea', function() {
				let selectedRow = tableInputTransferArea.row($(this).parents('tr')).data();
				console.log('selectedRow: ', selectedRow);
				open(`<?= site_url("TransferArea/ajax_show_detail_in_by_orc"); ?>/${selectedRow.orc}`, '_self');

			})

			$('#tableInputTransferArea tbody').on('click', 'button.btnShowSummaryTransferArea', function() {
				let selectedRow = tableInputTransferArea.row($(this).parents('tr')).data();
				console.log('selectedRow: ', selectedRow);
				open(`<?= site_url("TransferArea/ajax_show_summary_in_by_orc"); ?>/${selectedRow.orc}`, '_self');

			})

			$('#barcodeOperator').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();

					barcodeOp = $(this).val().toString();
					let barcodeOpValidate = opCodeRegex.test(barcodeOp);
					switch (barcodeOpValidate) {
						case true:
							cekBarcodeOp(barcodeOp);
							break;
						case false:
							invalidBarcodeOp();
							break;
					}
				}
			});

			function invalidBarcodeOp() {
				Swal.fire({
					type: 'warning',
					title: 'Peringatan!',
					html: '<h3><b>Invalid barcode operator packing!</b></h3>',
					showConfirmButton: true,
					onAfterClose: () => {
						$('#barcodeOperator').val('');
						$('#barcodeOperator').focus();
					}
				})
			}

			function cekBarcodeOp(oc) {
				$.ajax({
					type: 'GET',
					url: `<?= site_url("PackingMember/ajax_get_by_barcode"); ?>/${oc}`,
					dataType: 'json'
				}).done(function(row) {
					console.log('rowPackingMember: ', row);
					if (row == null) {
						Swal.fire({
							type: 'warning',
							title: 'Peringatan!',
							html: '<h3><b>Barcode operator tidak ada di database!</b></h3>',
							onAfterClose: () => {
								$('#barcodeOperator').val('');
								$('#barcodeOperator').focus();
							}
						});
					} else {
						zona = row.fg_zone;
						$('#barcodeOperator').prop('disabled', true);
						$('#barcodePacking').prop('disabled', false);
						$('#barcodePacking').focus();
					}
				})
			}

			$('#barcodePacking').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					barcodePacking = $(this).val();
					let barcodePackingValidate = packingCodeRegex.test(barcodePacking);
					switch (barcodePackingValidate) {
						case true:
							cekBarcodePacking(barcodePacking);
							break;
						case false:
							invalidBarcodePacking();
							break;
					}

				}
			});

			function invalidBarcodePacking() {
				Swal.fire({
					type: 'warning',
					title: 'Peringatan!',
					html: '<h3><b>Invalid barcode packing!</b></h3>',
					showConfirmButton: true,
					onAfterClose: () => {
						$('#barcodePacking').val('');
						$('#barcodePacking').focus();
					}
				})
			}

			function cekBarcodePacking(pc) {
				var getOutputPackingDetail = $.ajax({
					type: 'GET',
					url: `<?= site_url("Packing/ajax_join_get_by_barcode"); ?>/${pc}`,
					dataType: 'json'
				});

				var checkInputTransferArea = $.ajax({
					type: 'GET',
					url: `<?= site_url("TransferArea/ajax_check_by_barcode"); ?>/${pc}`,
					dataType: 'json'
				});

				$.when(getOutputPackingDetail, checkInputTransferArea).done(function(outputPackingDetailRst, inputTransferAreaRst) {
					function cekAtTransferArea() {
						var transferAreaStatus = {
							get status() {
								let status = true;
								if (outputPackingDetailRst[0] == null || inputTransferAreaRst[0] > 0) {
									status = false;
								}
								return status;
							},

							get msg() {
								let message = '';
								if (outputPackingDetailRst[0] == null) {
									message = 'Barcode packing tidak ditemukan di database!';
								} else if (inputTransferAreaRst[0] > 0) {
									message = 'Barcode packing sudah di scan!!';
								}
								return message;
							}
						}

						if (!transferAreaStatus.status) {
							Swal.fire({
								type: 'warning',
								title: 'Peringatan!',
								html: `<h3><b>${transferAreaStatus.msg}</b></h3>`,
								showConfirmButton: true,
								onAfterClose: () => {
									$('#barcodePacking').val('');
									$('#barcodePacking').focus();
								}
							});
						} else {
							// addToTempTable();
							saveToTransferArea();
						}
					}
					cekAtTransferArea();

					function saveToTransferArea() {
						const dateFormat = 'YYYY-MM-DD HH:mm:ss';
						var date = new Date();
						var dateNow = moment(date).format(dateFormat);
						var dataForTransferArea = {
							'tgl_in': dateNow,
							'style': outputPackingDetailRst[0].style,
							'color': outputPackingDetailRst[0].color,
							'orc': outputPackingDetailRst[0].orc,
							'size': outputPackingDetailRst[0].size,
							'carton_no': parseInt(outputPackingDetailRst[0].no_box),
							'qty_box': parseInt(outputPackingDetailRst[0].qty),
							'barcode': outputPackingDetailRst[0].barcode,
							'barcode_operator': barcodeOp,
							'status': 'in'
						}

						//menentukan lokasi line
						$.ajax({
							type: 'GET',
							url: '<?= site_url("TransferArea/ajax_get_by_orc"); ?>/' + dataForTransferArea.orc,
							dataType: 'json',
						}).done(function(row) {
							console.log('row: ', row);
							if (row['data'] != null) {
								dataForTransferArea.lokasi = row['data']['lokasi']
							} else {
								dataForTransferArea.lokasi = 'sementara'
							}

							// simpan ke database
							$.ajax({
								type: 'POST',
								url: '<?= site_url("TransferArea/ajax_save_transfer_area"); ?>',
								data: {
									'dataForTransferArea': dataForTransferArea
								},
								dataType: 'json'
							}).done(function(id) {
								if (id > 0) {
									Swal.fire({
										type: 'success',
										title: 'Berhasil',
										html: '<h3><b>Data berhasil disimpan.</b></h3>',
										showConfirmButton: false,
										timer: 500,
										onAfterClose: () => {
											$('#barcodePacking').val('');
											$('#barcodePacking').focus();
											loadTable();

											//tambahkan ke table temp
											noUrut++;
											tableInputTransferAreaTemp.row.add([
												noUrut,
												dataForTransferArea.orc,
												dataForTransferArea.style,
												dataForTransferArea.color,
												dataForTransferArea.size,
												dataForTransferArea.carton_no,
												dataForTransferArea.qty_box,
												dataForTransferArea.barcode,
												dataForTransferArea.lokasi,
											]).draw();
										}
									})
								}
							})
						})
					}
				});

			}

			function loadTable() {
				tableInputTransferArea.ajax.reload(null, false);
			}

			$('#barcodePackingPcs').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					barcodePackingPcs = $(this).val();
					let barcodePackingPcsValidate = packingCodeRegex.test(barcodePackingPcs);

					switch (barcodePackingPcsValidate) {
						case true:
							cekBarcodePackingPcs(barcodePackingPcs);
							break;
						case false:
							invalidBarcodePacking();
							break;
					}

				}
			});

			function cekBarcodePackingPcs(pc) {
				var getOutputPackingDetail = $.ajax({
					type: 'GET',
					url: `<?= site_url("Packing/ajax_join_get_by_barcode"); ?>/${pc}`,
					dataType: 'json'
				});

				var checkInputTransferAreaPcs = $.ajax({
					type: 'GET',
					url: `<?= site_url("TransferAreaPcs/ajax_check_by_barcode"); ?>/${pc}`,
					dataType: 'json'
				});

				$.when(getOutputPackingDetail, checkInputTransferAreaPcs).done(function(outputPackingDetailRst, inputTransferAreaPcsRst) {
					function cekAtTransferAreaPcs() {
						var transferAreaPcsStatus = {
							get status() {
								let status = true;
								if (outputPackingDetailRst[0] == null || inputTransferAreaPcsRst[0] > 0) {
									status = false;
								}
								return status;
							},

							get msg() {
								let message = '';
								if (outputPackingDetailRst[0] == null) {
									message = 'Barcode packing tidak ditemukan di database!';
								} else if (inputTransferAreaPcsRst[0] > 0) {
									message = 'Barcode packing sudah di scan!!';
								}
								return message;
							}
						}

						if (!transferAreaPcsStatus.status) {
							Swal.fire({
								type: 'warning',
								title: 'Peringatan!',
								html: `<h3><b>${transferAreaPcsStatus.msg}</b></h3>`,
								showConfirmButton: true,
								onAfterClose: () => {
									$('#barcodePackingPcs').val('');
									$('#barcodePackingPcs').focus();
								}
							});
						} else {
							// addToTempTable();
							// saveToTransferAreaPcs();
							$('#btnUpdatePcsBox').prop('disabled', false);
							$('#orc').val(outputPackingDetailRst[0].orc);
							$('#style').val(outputPackingDetailRst[0].style);
							$('#color').val(outputPackingDetailRst[0].color);
							$('#size').val(outputPackingDetailRst[0].size);
							$('#no_bundle').val(outputPackingDetailRst[0].no_box);
							$('#pcs').val(outputPackingDetailRst[0].qty);
							$('#new_pcs').val(outputPackingDetailRst[0].qty);
							$('#new_pcs').attr({
								'max': outputPackingDetailRst[0].qty
							});
							$('#new_pcs').focus();

						}
					}
					cekAtTransferAreaPcs();


				});

			}

			$('#btnUpdatePcsBox').click(function() {
				saveToTransferAreaPcs();
			});

			function saveToTransferAreaPcs() {
				const dateFormat = 'YYYY-MM-DD HH:mm:ss';
				var date = new Date();
				var dateNow = moment(date).format(dateFormat);
				var dataForTransferAreaPcs = {
					'tgl_in': dateNow,
					'style': $('#style').val(),
					'color': $('#color').val(),
					'orc': $('#orc').val(),
					'size': $('#size').val(),
					'carton_no': $('#no_bundle').val(),
					'qty_box': parseInt($('#new_pcs').val()),
					'barcode': $('#barcodePackingPcs').val(),
					'lokasi': 'Line 1A',
					'status': 'in'
				}

				// simpan ke database
				$.ajax({
					type: 'POST',
					url: '<?= site_url("TransferAreaPcs/ajax_save_transfer_area_pcs"); ?>',
					data: {
						'dataForTransferAreaPcs': dataForTransferAreaPcs
					},
					dataType: 'json'
				}).done(function(id) {
					if (id > 0) {
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<h3><b>Data berhasil disimpan.</b></h3>',
							showConfirmButton: false,
							timer: 750,
							onAfterClose: () => {
								//tambahkan ke table temp
								noUrutPcs++;
								tableInputTransferAreaPcsTemp.row.add([
									noUrutPcs,
									dataForTransferAreaPcs.orc,
									dataForTransferAreaPcs.style,
									dataForTransferAreaPcs.color,
									dataForTransferAreaPcs.size,
									dataForTransferAreaPcs.carton_no,
									dataForTransferAreaPcs.qty_box,
									dataForTransferAreaPcs.barcode,
									dataForTransferAreaPcs.lokasi
								]).draw();
								clearControls();
								$('#barcodePackingPcs').focus();
								$('#btnUpdatePcsBox').prop('disabled', true);
								loadTable();



							}
						})
					}
				})
			}

			$('#btnCancelPcsBox').click(function() {
				clearControls();
				$('#barcodePackingPcs').focus();
			});

			function clearControls() {
				$('#style').val('');
				$('#color').val('');
				$('#orc').val('');
				$('#size').val('');
				$('#no_bundle').val('');
				$('#pcs').val('0');
				$('#new_pcs').val('0');
				$('#barcodePackingPcs').val('');
			}	

			$('#btnInputManual').click(function() {
				$('#modalInputFG').modal('show');
			});

			$('#modalInputFG').on('hidden.bs.modal', function() {
				clearInputManual();
			});

			$('#modalInputFG').on('shown.bs.modal', function() {
				$('#orcManual').focus();
			});

			const clearInputManual = () => {
				$('.inputManual').val('');
			}

			$('#btnCancelManual').click(function() {
				clearInputManual();
				$('#orcManual').focus();
			})

			$('#lineManual').select2();

			const getAllLines = () => {
				$.ajax({
					type: 'GET',
					url: '<?= site_url("TransferArea/ajax_get_all_lokasi_packing"); ?>',
					dataType: 'json'
				}).done(function(data) {
					$.each(data, function(i, item) {
						$('#lineManual').append($('<option>', {
							value: item.line,
							text: item.line
						})).trigger('change')
					})
				})
			}

			getAllLines();

			$('form[id="formInputManual"]').validate({
				rules: {
					orcManual: {
						'required': true,
						'minlength': 10
					},
					styleManual: {
						'required': true
					},
					colorManual: {
						'required': true
					},
					sizeManual: {
						'required': true
					},
					pcsManual: {
						'required': true
					},
					lineManual: {
						'required': true
					},
				},
				errorClass: 'error fail-alert',
				validClass: 'valid success-alert',
				messages: {
					orcManual: {
						required: 'ORC harus diisi!',
						minlength: 'ORC harus diisi lengkap!'
					},
					styleManual: {
						required: 'Style harus diisi!'
					},
					colorManual: {
						required: 'Color harus diisi!'
					},
					sizeManual: {
						required: 'Size harus diisi!'
					},
					pcsManual: {
						required: 'Pcs harus diisi!'
					},
					lineManual: {
						required: 'Line harus diisi!'
					},

				},
				submitHandler: function(form, e) {
					e.preventDefault();

					let data = $(form).serializeArray();
					console.log('data: ', data);
					let dataForFGPcs = {};
					const dateFormat = 'YYYY-MM-DD HH:mm:ss';
					var date = new Date();
					var dateNow = moment(date).format(dateFormat);

					dataForFGPcs.tgl_in = dateNow;
					dataForFGPcs.orc = data[0].value;
					dataForFGPcs.style = data[1].value;
					dataForFGPcs.color = data[2].value;
					dataForFGPcs.size = data[3].value;
					dataForFGPcs.carton_no = data[4].value;
					dataForFGPcs.qty_box = data[5].value;
					dataForFGPcs.barcode = " - "
					dataForFGPcs.lokasi = data[6].value;
					dataForFGPcs.status = "in";

					$.ajax({
						type: 'POST',
						url: '<?= site_url("TransferAreaPcs/ajax_save_transfer_area_pcs"); ?>',
						data: {
							'dataForTransferAreaPcs': dataForFGPcs
						},
						dataType: 'json'
					}).done(function(id) {
						if (id > 0) {
							Swal.fire({
								type: 'success',
								title: 'Berhasil',
								html: '<h3><b>Data berhasil disimpan.</b></h3>',
								showConfirmButton: false,
								timer: 750,
								onAfterClose: () => {
									//tambahkan ke table temp
									noUrutPcs++;
									tableInputTransferAreaPcsTemp.row.add([
										noUrutPcs,
										dataForFGPcs.orc,
										dataForFGPcs.style,
										dataForFGPcs.color,
										dataForFGPcs.size,
										dataForFGPcs.carton_no,
										dataForFGPcs.qty_box,
										'-',
										dataForFGPcs.lokasi
									]).draw();
									clearInputManual();
									$('#orcManual').focus();
								}
							})
						}
					})

					return false;

				}
			});					

		})
	</script>
</body>

</html>
