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
							<h1 class="m-0 text-dark">Output Packing </h1>
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
									<h3 class="card-title">Data Output Packing</h3>
									<!-- <div class="card-tools">
										<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Take Action</button>
										<ul class="dropdown-menu">
											<li class="dropdown-item"><a href="javascript:void(0)" title="Add New Packing" id="btnAddPacking">Add Packing</a></li>
											<li class="dropdown-item"><a href="javascript:void(0)" title="Update Data Packing" id="btnUpdatePacking">Update Packing</a></li>
											<li class="dropdown-divider"></li>
											<li class="dropdown-item"><a href="javascript:void(0)" title="Show Detail Packing" id="btnShowPacking">Show Summary</a></li>
										</ul>
									</div> -->
								</div>
								<div class="card-body">
									<table id="packingTable" class="table table-striped table-hover" style="width: 100%">
										<thead>
											<tr>
												<th></th>
												<th>ID</th>
												<th>Tanggal</th>
												<th>ORC</th>
												<th class="text-center">Qty Order</th>
												<th class="text-center">Boxes</th>
												<th class="text-center">Total Actual Boxes</th>
												<!-- <th>ACTIONS</th> -->
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<th>ID</th>
												<th>Tanggal</th>
												<th>ORC</th>
												<th class="text-center">Qty Order</th>
												<th class="text-center">Boxes</th>
												<th class="text-center">Total Actual Boxes</th>
												<!-- <th>ACTIONS</th> -->
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="card-footer">

								</div>
							</div>
						</div>
					</div>

					<!--Modal detail packing-->
					<!-- <div class="modal fade" id="modal_packing_detail" role="dialog">
						<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header bg-info">
									<h4 class="modal-title">Detail Packing</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-body">
													<table class="table table-bordered" id="tableDetailPacking" width="100%">
														<thead>
															<th>Size</th>
															<th>Color</th>
															<th>Style</th>
															<th>Qty per Box</th>
														</thead>
														<tfoot>
															<th>Size</th>
															<th>Color</th>
															<th>Style</th>
															<th>Qty per Box</th>
														</tfoot>
													</table>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer bg-info">
									<button type="button" class="btn btn-default btn-lg shadow" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
								</div>
							</div>
						</div>
					</div> -->
					<!--end modal detail packing-->

					<!--packing modal-->
					<!-- <div class="modal fade" id="modal_packing" role="dialog">
						<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header bg-success">
									<h4 class="modal-title">Add/Edit Data Packing</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times</span>
									</button>
								</div>
								<form method="post" id="form-modal-packing">
									<div class="modal-body">
										<div class="form-group">
											<label class="col-sm-2 col-form-label">ORC:</label>
											<div class="input-group mb-3">
												<input type="text" id="orcPacking" class="form-control">
												<span class="input-group-append">
													<button type="button" id="btnSearchPacking" class="btn btn-warning"><i class="fa fa-search"></i>&nbsp;Search</button>
												</span>
											</div>

										</div>

										<div class="form-group row">
											<label class="col-md-2 col-form-label text-right">Detail ORC: </label>
											<div class="col-md-10">
												<div class="card">
													<div class="card-body">
														<table class="table table-bordered" id="tableSize" width="100%">
															<thead>
																<th>Size</th>
																<th>Color</th>
																<th>Style</th>
																<th>Qty</th>
															</thead>
															<tfoot>
																<th>Size</th>
																<th>Color</th>
																<th>Style</th>
																<th>Qty</th>
															</tfoot>
														</table>
													</div>

												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-md-2 col-form-label text-right">Box capacity: </label>
											<div class="col-md-2">
												<input type="number" id="box_capacity" class="form-control" value="0">
											</div>

											<label class="col-md-2 col-form-label text-right">Total qty size: </label>
											<div class="col-md-2">
												<input type="number" id="total_qty_size" value="0" class="form-control" disabled>
											</div>

											<label class="col-md-2 col-form-label text-right">Total actual qty size: </label>
											<div class="col-md-2">
												<input type="number" id="actual_qty" class="form-control" value="0" disabled>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-md-2 col-form-label text-right">Total actual boxes size: </label>
											<div class="col-md-2">
												<input type="number" id="actual_boxes" class="form-control" value="0" disabled>
											</div>

											<label class="col-md-2 col-form-label text-right">Qty Output : </label>
											<div class="col-md-2">
												<input type="number" id="output_qty" class="form-control" value="0">
											</div>
										</div>
									</div>
									<div class="modal-footer bg-success">
										<button type="button" class="btn btn-default btn-sm shadow-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Exit</button>
										<button type="button" id="btnSavePacking" class="btn btn-warning btn-sm shadow-sm"><i class="fa fa-save"></i> Save</button>
									</div>
								</form>
							</div>
						</div>
					</div> -->

					<!--modal konfirmasi ubah qty-->

					<!--edit box_capacity modal-->
					<div class="modal" id="modalEditQty" role="dialog" tabindex="-1">
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
			var status = "";
			var table;
			var orc;
			var pcs;
			var tableSize;
			var tableDetailPacking;

			var orcVal;
			var selectedRow;
			var dataSelectedRow;
			var size;
			var style;
			var color;
			var totalQty;
			var idPacking;
			var id_packing;
			var boxes;
			var tableSelectedRow;

			var actualBoxes;
			var actualBoxes1;

			// const regexBarcodeOperator = /PK-+\d*/i; //regex untuk barcode ID Admin Packing
			const regexBarcodeOperator = /\d{8}/; //regex untuk barcode ID Admin Packing

			// const regexBarcode2 = /(cp|bw|cu|as|pa)+_g\d{1}-\d{2}\w{1}\d{3}\w{1}-?(\d{1}|)-\d{4}/i; //regex untuk barcode Sewing
			// const regexBarcode2 = /g\d{1}-\d{2}\w{1}\d{3}\w{1}?(\-\d{1})-(\d\w|\w|\d[\/]\d|\d[\/]\d\w|\d)-\d[0-9]/i;

			const regexBarcodePacking = /g\d{1}-\d{2}\w{1}\d{1}\d{1}\d{1}\w{1}\-\d{1}?/i //regex untuk barcode packing
			var barcodeOperator = "";
			var barcodePacking = "";

			var dataOutputPacking;

			table = $('#packingTable').DataTable({
				"dom": '<"toolbar">lfrtip',
				"autoWidth": true,
				"processing": true,
				"serverSide": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				"select": {
					"style": "single"
				},
				// "order": [],
				"ajax": {
					"url": "<?php echo site_url('packing/ajax_list'); ?>",
					"type": "POST",
					"dataType": "json",
				},
				"columns": [{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{
						"data": [0]
					}, {
						"data": [1]
					},
					{
						"data": [2]
					}, {
						"data": [3]
					},
					{
						"data": [4]
					}, {
						"data": [5]
					},
				],
				"columnDefs": [{
						// "width": "15%",
						"targets": [3, 4, 5, 6],
						"className": "text-center"
					},
					{
						"targets": [1],
						"visible": false
					}
				]
			});

			var toolbar = "<div class='form-group row'>" +
				"<label>Scan Barcode Here<span><strong style='color: red;'>(Scan Barcode ID Operator Packing TERLEBIH DAHULU)</strong></span>:</label>" +
				"<input type='text' id='kode_barcode' class='form-control'>" +
				"</div>";

			$("div.toolbar").html(toolbar);

			$('#packingTable tbody').on('click', 'td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);

				if (row.child.isShown()) {
					// This row is already open - close it
					// row.child.hide();
					// tr.removeClass('shown');
					$('div.slider', row.child()).slideUp(function() {
						row.child.hide();
						tr.removeClass('shown');
					})
				} else {
					// Open this row
					// row.child(format(row.data())).show();
					// tr.addClass('shown');

					// console.log('row.data(): ', row.data()[0]);

					// $.ajax({
					// 	type: 'GET',
					// 	url: '<//?php echo site_url("packing/ajax_get_output_packing_detail_by_id"); ?>/' + row.data()[0],
					// 	dataType: 'json'						
					// }).done(function(result){
					// 	// row.child(format(row.data()), 'no-padding').show();
					// 	row.child(format(result), 'no-padding').show();
					// 	tr.addClass('shown');
					// 	$('div.slider', row.child()).slideDown()
					// });
					row.child(format(row.data(), 'no-padding')).show();
					// row.child(format(result), 'no-padding').show();
					tr.addClass('shown');
					$('div.slider', row.child()).slideDown();

				}
			});

			function format(d) {
				var div = $('<div/>').addClass('loading slider').text('Loading...');


				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("packing/ajax_get_output_packing_detail_by_id"); ?>/' + d[0],
					dataType: 'json'
				}).done(function(result) {
					var htmlDetailTable = "";
					// var htmlDetail = "";

					$.each(result, function(i, item) {

						htmlDetailTable +=
							'<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
							'<tr>' +
							'<td>Style:</td>' +
							'<td><strong style="color: red;">' + item.style + '</strong></td>' +
							'<td>Color:</td>' +
							'<td><strong style="color: red;">' + item.color + '</strong></td>' +
							'<td>Size:</td>' +
							'<td><strong style="color: red;">' + item.size + '</strong></td>' +
							'<td>Box Number:</td>' +
							'<td><strong style="color: red;">' + item.no_box + '</strong></td>' +
							'<td>Qty:</td>' +
							'<td><strong style="color: red;">' + item.box_capacity + '</strong></td>' +
							// '<td>Actual:</td>' +
							// '<td><strong style="color: red;">' + item.actual_qty + '</strong></td>' +
							// '<td><button type="button" class="btn btn-outline-success shadow btn-sm no-padding">Show Remark</button></td>' +
							// '<td><a href="#" onclick="showRemarks(' + item.id_output_packing_detail + ')" class="btn btn-outline-success shadow btn-sm no-padding">Show Remark</a></td>'
							'</tr>'
					});
					// div.html(tableDetail).removeClass('loading');

					div.html(htmlDetailTable).removeClass('loading');

					// div.html(htmlDetail).removeClass('loading');

					// $('#tableOutputPackingDetail').append(htmlDetailTable);

				});
				return div;
			}

			$('#kode_barcode').trigger('focus');

			$('#kode_barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					let barcode = $(this).val();

					if (!regexBarcodeOperator.test(barcode) && !regexBarcodePacking.test(barcode)) {
						Swal.fire({
							type: 'error',
							title: 'Error',
							html: '<h3><strong>Invalid Barcode!!</strong></h3>',
							showConfirmButton: false,
							timer: 1500,
							onAfterClose: () => {
								$('#kode_barcode').val('');
								$('#kode_barcode').focus();
							}
						});
					} else if (!regexBarcodeOperator.test(barcode) && regexBarcodePacking.test(barcode)) {
						if (barcodeOperator == "") {
							Swal.fire({
								type: 'error',
								title: 'Error',
								html: '<h3><strong>Barcode Operator Packing harus di Scan terlebih dahulu!!</strong></h3>',
								showConfirmButton: false,
								timer: 2500,
								onAfterClose: () => {
									$('#kode_barcode').val('');
									$('#kode_barcode').focus();
								}
							})
						} else {
							//jika barcode operator sudah discan
							barcodePacking = barcode;
							checkBarcodePackingList(barcodePacking);
						}
					} else if (regexBarcodeOperator.test(barcode) && !regexBarcodePacking.test(barcode)) {
						barcodeOperator = barcode;
						checkBarcodeOperatorPacking(barcodeOperator);
					}

				}
			});

			function reloadTable() {
				table.ajax.reload(null, false);
			}

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
							timer: 2500,
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
					url: '<?php echo site_url("packing/ajax_get_barcode_packing"); ?>/' + code,
					dataType: 'json'
				}).done(function(dt) {
					if (dt == null) {
						Swal.fire({
							type: 'warning',
							title: 'Peringatan!',
							html: '<h3><strong>Barcode not found!!</strong></h3>',
							showConfirmButton: false,
							timer: 2500,
							onAfterClose: () => {
								$('#kode_barcode').val("");
								$('#kode_barcode').trigger('focus');
							}
						});
					} else {
						//check di output packing details-control
						$.ajax({
							type: 'GET',
							url: '<?= site_url("Packing/ajax_check_output_packing_detail"); ?>/' + code,
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
									'id_packing_list_barcode': dt.id_packing_list_barcode,
									'barcode_operator': barcodeOperator,
									'barcode': code,
									'orc': dt.orc,
									'style': dt.style,
									'color': dt.color,
									'size': dt.size,
									'no_box': dt.no_box,
									'qty': dt.pcs,
									'box_capacity': dt.box_capacity
								}
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


						// $.ajax({
						// 	type: 'GET',
						// 	url: '<//?= site_url("Packing/ajax_check_input_packing"); ?>/' + code,
						// 	dataType: 'json'
						// }).done(function(numRow) {
						// 	if (numRow == 0) {
						// 		Swal.fire({
						// 			type: 'warning',
						// 			title: 'Peringatan!',
						// 			html: '<h3><strong>Barcode not  found in INPUT PACKING!!</strong></h3>',
						// 			showConfirmButton: false,
						// 			timer: 2500,
						// 			onAfterClose: () => {
						// 				$('#kode_barcode').val("");
						// 				$('#kode_barcode').trigger('focus');
						// 			}
						// 		});
						// 	} else {
						//check at output packing detail

						// }
					}
					// console.log('dt: ', dt);



					// let dataForInputPacking = {
					// 	'orc': dataOutputPacking.orc,
					// 	'color': dataOutputPacking.color,
					// 	'style': dataOutputPacking.style,
					// 	'size': dataOutputPacking.size
					// };

					//check at input packing
					// $.ajax({
					// 	type: 'POST',
					// 	url: '<//?php echo site_url("packing/ajax_check_input_packing1"); ?>',
					// 	data: {
					// 		'dataForInputPacking': dataForInputPacking
					// 	},
					// 	dataType: 'json'
					// }).done(function(rowCount) {
					// 	if (rowCount <= 0) {
					// 		Swal.fire({
					// 			type: 'warning',
					// 			title: 'Warning',
					// 			html: '<h3><strong>Data not found on Input Packing!</strong></h3>',
					// 			showConfirmButton: false,
					// 			timer: 2500,
					// 			onAfterClose: () => {
					// 				$('#kode_barcode').val('');
					// 				$('#kode_barcode').trigger('focus');
					// 			}
					// 		});
					// 	} else {
					// 		//check at output packing detail
					// 		$.ajax({
					// 			type: 'GET',
					// 			url: '<//?php echo site_url("packing/ajax_check_output_packing_detail"); ?>/' + code,
					// 			dataType: 'json'
					// 		}).done(function(rCount) {
					// 			if (rCount > 0) {
					// 				Swal.fire({
					// 					type: 'warning',
					// 					title: 'Warning',
					// 					html: '<h3><strong>Barcode already scanned!</strong></h3>',
					// 					showConfirmButton: false,
					// 					timer: 2500,
					// 					onAfterClose: () => {
					// 						$('#kode_barcode').val('');
					// 						$('#kode_barcode').trigger('focus');
					// 					}
					// 				})
					// 			} else {
					// 				$.ajax({
					// 					type: 'POST',
					// 					url: '<//?php echo site_url("packing/ajax_save_output_packing"); ?>',
					// 					data: {
					// 						'dataOutputPacking': dataOutputPacking
					// 					},
					// 					dataType: 'json',
					// 				}).done(function(id) {
					// 					if (id > 0) {
					// 						Swal.fire({
					// 							type: 'success',
					// 							title: 'Berhasil',
					// 							html: '<h3 style="color: red;"><strong>Simpan Data Packing Berhasil.</strong></h3>',
					// 							showConfirmButton: false,
					// 							timer: 2000,
					// 							onAfterClose: () => {
					// 								reloadTable()
					// 								$('#kode_barcode').val('');
					// 								$('#kode_barcode').trigger('focus');
					// 							}
					// 						});
					// 					}
					// 				})

					// 			}
					// 		});
					// 	}
					// })
					// }
				});
			}

			function showModalEditQty(qty) {
				$('#modalEditQty').modal('show');
				$('#qty').val(qty);
				$('#qty').text(qty);
			}

			$('#modalEditQty').on('shown.bs.modal', function() {
				$('#qty').trigger('focus');
			})

			$('#btnUpdateQty').click(function() {
				let qty = $('#qty').val();
				let qtyText = $('#qty').text();
				console.log('qty value: ', qty);
				console.log('qty text: ', qtyText);

				let dataSolidPackingBarcode = {
					'id_packing_list_barcode': dataOutputPacking.id_packing_list_barcode,
					// 'qty': parseInt(qtyText)
					'qty': qty
				}

				$.ajax({
					type: "POST",
					url: '<?= site_url("Packing/ajax_update_qty_solid_packing_barcode"); ?>',
					data: {
						'dataSolidPackingBarcode': dataSolidPackingBarcode
					},
					dataType: 'json'
				}).done(function(rowAff) {
					console.log('rowAff: ', rowAff);
					if (rowAff > 0) {
						dataOutputPacking.qty = $('#qty').val();
						$('#modalEditQty').modal('hide');
						saveOutputPacking();
					}
				})
			});

			function saveOutputPacking() {
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("packing/ajax_check_output_packing_detail"); ?>/' + dataOutputPacking.barcode,
					dataType: 'json'
				}).done(function(rCount) {
					if (rCount > 0) {
						Swal.fire({
							type: 'warning',
							title: 'Warning',
							html: '<h3><strong>Barcode ini sudah di-Scan!</strong></h3>',
							showConfirmButton: false,
							timer: 2500,
							onAfterClose: () => {
								$('#kode_barcode').val('');
								$('#kode_barcode').trigger('focus');
							}
						})
					} else {
						$.ajax({
							type: 'POST',
							url: '<?php echo site_url("packing/ajax_save_output_packing"); ?>',
							data: {
								'dataOutputPacking': dataOutputPacking
							},
							dataType: 'json',
						}).done(function(id) {
							if (id > 0) {
								Swal.fire({
									type: 'success',
									title: 'Berhasil',
									html: '<h3 style="color: red;"><strong>Simpan Data Packing Berhasil.</strong></h3>',
									showConfirmButton: false,
									timer: 2000,
									onAfterClose: () => {
										reloadTable()
										$('#kode_barcode').val('');
										$('#kode_barcode').trigger('focus');
										// $('#modalEditQty').modal('hide');
									}
								});
							}
						});
					}
				});
			}

		});

		function showRemarks(id) {
			$.ajax({
				type: 'GET',
				url: '<?php echo site_url("packing/ajax_get_remarks_packing"); ?>/' + id,
				dataType: 'json'
			}).done(function(rows) {
				var $table = $('<table>').addClass('table');
				$table.append('<thead>').children('thead')
					.append('<tr/>').children('tr').append('<th>Qty</th><th>Remark</th><th>Tanggal</th>');

				var $tbody = $table.append('<tbody/>').children('tbody');

				$.each(rows, function(i, item) {
					$tbody.append('<tr/>').children('tr:last')
						.append('<td>' + item.qty_remark + '</td>')
						.append('<td>' + item.remark + '</td>')
						.append('<td>' + item.tgl + '</td>');
				});

				Swal.fire({
					// toast: true,
					type: 'info',
					title: 'Info Packing Remarks',
					html: $table,
					showConfirmButton: true,
					// showClass: {
					// 	popup: 'animate__animated animate__fadeInDown'
					// },
					// hideClass: {
					// 	popup: 'animate__animated animate__fadeOutUp'
					// }
				});
			})
		}
	</script>
</body>

</html>
