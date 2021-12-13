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
													<input type="number" id="actual_qty" class="form-control form-control-sm barcode-detail" disabled>
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
											<th></th>
												<th>ORC</th>
												<th>Style</th>
												<th>Color</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
											<th></th>
												<th>ORC</th>
												<th>Style</th>
												<th>Color</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="card-footer">

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
	<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


	<script>
		$(document).ready(function() {
			var table;
			var kode;

			table = $('#inputPackingTable').DataTable({
				// "dom": '<"toolbar">lfrtip',
				"autoWidth": true,
				// "processing": true,
				// "serverSide": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				// "order": [],
				"ajax": {
					"url": "<?php echo site_url('packing/ajax_list_input_packing'); ?>",
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
						"data": 'orc',
					},
					{
						"data": 'style',
					},
					{
						"data": 'color',
					},
				],
				// "columnDefs": [{
				// 	"targets": [0],
				// 	"visible": false
				// }]
			});

			$('#inputPackingTable tbody').on('click', 'td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);

				if (row.child.isShown()) {
					$('div.slider', row.child()).slideUp(function() {
						row.child.hide();
						tr.removeClass('shown');
					})
				} else {
					row.child(format(row.data(), 'no-padding')).show();
					tr.addClass('shown');
					$('div.slider', row.child()).slideDown();

				}
			});

			function format(d) {
				var div = $('<div/>').addClass('loading slider').text('Loading...');
				var style = d['style'];
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("Packing/ajax_get_input_packing_by_orc"); ?>',
					data: {
						"orc": d['orc']
					},
					dataType: 'json'
				}).done(function(result) {
					var htmlDetailTable = "";
					// var htmlDetail = "";

					$.each(result, function(i, item) {
						htmlDetailTable +=
							'<table id="inputPackingDetail" class="table table-striped table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
							'<tr>' +
							// '<td>ID' + 
							// '<td>' + item.id_packing_karton + '</td>' +
							'<td>Size:</td>' +
							'<td><strong style="color: red;">' + item.size + '</strong></td>' +
							'<td>Qty:</td>' +
							'<td><strong style="color: red;">' + item.qty + '</strong></td>' +
							'<td>No.Bundle:</td>' +
							'<td><strong style="color: red;">' + item.no_bundle + '</strong></td>' +
							// '<td><a href="#" onclick="showRemarks(' + item.id_packing_karton + ')" class="btn btn-outline-warning shadow btn-sm no-padding"><i class="fa fa-pencil"></i> Edit</a></td>'
							// '<td><button class="btn btn-outline-warning shodow btn-sm no-padding" id="' + item.id_packing_karton + '"><i class="fa fa-pencil"></i> Edit</button>' +
							'</tr>'
					});

					div.html(htmlDetailTable).removeClass('loading');
				});
				return div;
			}			

			$('#btnSave').prop('disabled', true);
			$('#btnCancel').prop('disabled', true);

			// var toolbar = "<div class='form-group row'>" +
			// 	"<label>Scan Barcode Here:</label>" +
			// 	"<input type='text' id='kode_barcode' class='form-control'>" +
			// 	"</div>";
			// $("div.toolbar").html(toolbar);

			$('#kode_barcode').focus();

			$('#kode_barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					var barcode = $(this).val();
					const conditionArr = ["cp", "bw", "cu", "as", "pa"];
					if (!conditionArr.includes(barcode.substr(0, 2))) {
						Swal.fire({
							type: 'warning',
							title: 'Warning',
							html: '<h1><strong>Bukan barcode sewing!!</strong></h1>',
							showConfirmButton: false,
							timer: 3000
						});
						$(this).val('');
						$(this).focus();
					} else {
						kode = barcode.split('_');
						//cari di input_packing
						$.ajax({
							type: 'GET',
							url: '<?php echo site_url("packing/ajax_check_input_packing"); ?>/' + kode[1],
							dataType: 'json'
						}).done(function(retVal) {
							if (retVal == 0) {
								//cari di solid_packing_barcode
								// $.ajax({
								// 	type: 'GET',
								// 	url: '<//?= site_url("packing/ajax_check_solid_packing_barcode"); ?>/' + kode[1],
								// 	dataType: 'json'
								// }).done(function(numRows) {
								// 	if (numRows == 0) {
								// 		Swal.fire({
								// 			type: 'warning',
								// 			title: 'Warning',
								// 			html: '<strong>Barcode not found (at solid packing barcode)!!</strong>',
								// 			showConfirmButton: false,
								// 			timer: 2000,
								// 			onAfterClose: () => {
								// 				$('#kode_barcode').val('');
								// 				$('#kode_barcode').trigger('focus');
								// 			}
								// 		});
								// 	} else {

								// 	}
								// })

								//cari di output_sewing_detail
								// $.ajax({
								// 	type: "GET",
								// 	url: '<//?php echo site_url("packing/ajax_get_sewing_detail"); ?>/' + kode[1],
								// 	dataType: 'json',
								// }).done(function(data) {
								// 	if (data == null) {
								// 		Swal.fire({
								// 			type: 'warning',
								// 			title: 'Warning',
								// 			html: '<strong>Barcode belum scan di Sewing!!!!</strong>',
								// 			showConfirmButton: false,
								// 			timer: 3000,
								// 			onAfterClose: () => {
								// 				$('#kode_barcode').val('');
								// 				$('#kode_barcode').trigger('focus');
								// 			}
								// 		});

								// 	} else {
								// 		// saveData();
								// 		showBarcodeDetail();
								// 	}
								// });
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

			function showBarcodeDetail() {
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_get_cutting_detail"); ?>/' + kode[1],
					dataType: 'json'
				}).done(function(d) {
					if (d != null) {
						$('#orc').val(d.orc);
						$('#style').val(d.style);
						$('#color').val(d.color);
						$('#size').val(d.size);
						$('#no_bundle').val(d.no_bundle);
						$('#qty').val(d.qty_pcs);
						$('#actual_qty').val(d.qty_pcs);

						$('#actual_qty').prop('disabled', false);
						$('#actual_qty').prop('max', d.qty_pcs);
						$('#actual_qty').prop('min', 1);
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
					url: '<?php echo site_url("packing/ajax_save_input_packing"); ?>',
					data: {
						'dataStr': dataStr
					},
					dataType: 'json'
				}).done(function(r) {
					if (r > 0) {
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<strong>Simpan Data Input Packing Berhasil</strong>',
							showConfirmButton: false,
							timer: 2000,
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

		})
	</script>
</body>

</html>
