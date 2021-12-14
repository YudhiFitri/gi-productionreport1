<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Output Cutting</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar_cutting.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_cutting.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v2</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Output Cutting</h3>
									<div class="card-tools">
										<a href="#" class="nav-link" id="aUnscanned">
											<span id="spanUnscanned" data-toggle="tooltip" title="unscanned yet" class="badge bg-primary">
												0 yang belum di scan!
											</span>
										</a>
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label>Please Select Line identification</label>
										<select class="select2 form-control" id="line" width="100%"></select>
									</div>
									<div class="form-group">
										<label>Please Scan Bundle Record</label>
										<input type="text" id="barcode" class="form-control" width="100%">
									</div>
									<table id="outputCuttingTable" class="table table-border table-striped" style="width: 100%">
										<thead>
											<th>#</th>
											<th>LINE</th>
											<th>DATE</th>
											<th>ORC</th>
											<th>STYLE</th>
											<th>COLOR</th>
											<th>#BUNDLE</th>
											<th>SIZE</th>
											<th>QTY</th>
										</thead>
										<tfoot>
											<th>#</th>
											<th>LINE</th>
											<th>DATE</th>
											<th>ORC</th>
											<th>STYLE</th>
											<th>COLOR</th>
											<th>#BUNDLE</th>
											<th>SIZE</th>
											<th>QTY</th>
										</tfoot>
									</table>

									<div class="modal fade" id="inputSewingUnscannedModal" role="dialog">
										<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Bundel yang belum discan</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times</span>
													</button>
												</div>
												<div class="modal-body">
													<!-- <div class="form-group row">
                            <label class="col-md-2 col-form-label text-right">Scan Barcode: </label>
                            <div class="col-md-10">
                              <input type="text" id="unscannedBarcode" class="form-control">
                            </div>
                          </div> -->
													<table id="unscannedBarcodeTable" class="table table-border table-striped" style="width: 100%">
														<thead>
															<th>ORC</th>
															<th>STYLE</th>
															<th>SIZE</th>
															<th>BUNDLE</th>
															<th>BARCODE</th>
														</thead>
														<tfoot>
															<th>ORC</th>
															<th>STYLE</th>
															<th>SIZE</th>
															<th>BUNDLE</th>
															<th>BARCODE</th>
														</tfoot>
													</table>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default btn-sm shadow-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Exit</button>
													<!-- <button type="button" id="btnSavePacking" class="btn btn-warning btn-lg shadow-sm"><i class="fa fa-save"></i> Save</button> -->
												</div>
											</div>
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
	<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>

	<script>
		var barcodeSplit;
		var line;
		var orc;
		// var selisih;
		var unScannedData;

		$(document).ready(function() {

			var unscannedTable = $('#unscannedBarcodeTable').DataTable();

			$(".select2").select2();

			var table = $('#outputCuttingTable').DataTable({
				"autoWidth": true,
				"processing": true,
				"serverSide": true,
				"order": [],
				"distroy": true,
				"ajax": {
					"url": "<?php echo site_url('OutputCutting/ajax_list'); ?>",
					"type": "POST",
					"dataType": "json",
					// "dataSrc" : "",
				},
			});

			loadLine();

			function loadLine() {
				$('#line').empty();
				$.ajax({
					url: '<?php echo site_url("OutputCutting/ajax_get_all_line"); ?>',
					type: 'GET',
					dataType: 'json',
					success: function(dt) {
						$.each(dt, function(i, item) {
							$('#line').append($('<option>', {
								value: item.name,
								text: item.name
							})).trigger('change')
						})
					}
				});
			}

			$('#barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();

					var barcode = $('#barcode').val();
					var barcodeUpper = barcode.toUpperCase();

					barcodeSplit = barcodeUpper.split("_");

					check_barcode(barcodeSplit[1]);
				}
			});

			function check_barcode(barcode) {
				console.log('barcode: ', barcode);
				$.ajax({
					url: '<?php echo site_url("OutputCutting/ajax_check_by_barcode"); ?>/' + barcode,
					type: 'GET',
					dataType: 'json'
				}).done(function(dt) {
					// console.log('dt: ', dt);
					if (dt == null) {
						Swal.fire({
							type: "warning",
							title: "Warning!",
							text: "BARCODE Not Found!!",
							showConfirmButton: false,
							timer: 1750
						});
						$('#barcode').val('');
						$('#barcode').focus();
					} else {
						check_barcode1(dt);
					}
				});
			}

			function check_barcode1(dt) {
				console.log('dt: ', dt);
				$.ajax({
					url: '<?php echo site_url("InputSewing/ajax_check_barcode"); ?>/' + dt.kode_barcode,
					type: 'POST',
					dataType: 'json'
				}).done(function(dta) {
					console.log('dta: ', dta);
					if (dta != null) {
						Swal.fire({
							type: "warning",
							title: "Warning!",
							text: "This BARCODE already scanned!",
							showConfirmButton: false,
							timer: 750,
							onAfterClose: () => {
								$('#barcode').val('');
								$('#barcode').focus();
							}
						});
					} else {
						save_input_sewing(dt);
					}
				});
			}

			function save_input_sewing(data) {
				console.log('data: ', data);
				var color = data.color;
				if (color.includes("BLACK") == true) {
					var colorGroup = "Black";
				} else if (color.includes("WHITE") == true) {
					var colorGroup = "White";
				} else {
					var colorGroup = "color"
				}

				var style = data.style;
				var size = data.size;
				var groupSize;
				var cpSAM;
				var bwSAM;
				var cSAM;
				var aSAM;
				var ajaxGetGroupSize;
				var ajaxGetSewingSAM;
				var dataForSewingSAM;

				var dtInputCutting;
				var dtInputSewing;

				ajaxGetGroupSize = $.ajax({
						url: '<?php echo site_url('OutputCutting/ajax_get_by_size'); ?>',
						type: 'POST',
						data: {
							'dataSize': size
						},
						dataType: 'json'
					}),
					ajaxGetSewingSAM = ajaxGetGroupSize.then(function(dt) {
						groupSize = dt.group;

						dataForSewingSAM = {
							'style': style,
							'color': colorGroup,
							'grup_size': groupSize
						};
						// console.log('dataForCuttingSAM: ', dataForCuttingSAM);
						console.log('dataForSewingSAM: ', dataForSewingSAM);
						return $.ajax({
							url: '<?php echo site_url("OutputCutting/ajax_get_sewing_sam"); ?>',
							type: 'POST',
							data: {
								'dataForSewingSAM': dataForSewingSAM
							},
							dataType: 'json'
						});

					});

				ajaxGetSewingSAM.done(function(d) {
					console.log('d: ', d);
					cpSAM = d.center_panel_sam;
					bwSAM = d.back_wings_sam;
					cSAM = d.cups_sam;
					aSAM = d.assembly_sam;

					orc = data.orc;

					var dataStr = {
						'line': $('#line').val(),
						'orc': data.orc,
						'style': data.style,
						'color': data.color,
						'no_bundle': data.no_bundle,
						'size': data.size,
						'qty_pcs': data.qty_pcs,
						'center_panel_sam': cpSAM,
						'back_wings_sam': bwSAM,
						'cups_sam': cSAM,
						'assembly_sam': aSAM,
						'kode_barcode': barcodeSplit[1]
					};

					// console.log('dataCuttingDetail: ', dataCuttingDetail);
					insertInputSewing(dataStr);
				});

				function insertInputSewing(data) {
					$.ajax({
						url: '<?php echo site_url("OutputCutting/ajax_save"); ?>',
						data: {
							'dataStr': data
						},
						method: 'POST',
						dataType: 'json',
					}).done(function(dataReturn) {
						if (dataReturn != null) {
							Swal.fire({
								type: 'info',
								title: 'Save Data Success!!',
								showConfirmButton: false,
								timer: 750,
								onAfterClose: () => {
									console.log('orc: ', data.orc)
									comparingData(data.orc);
								}
							});

						}
						$('#barcode').val('');
						$('#barcode').focus();
						reload_table();
					})
				}
			}

			function comparingData(o) {
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("OutputCutting/ajax_comparing_inputcutting_inputsewing"); ?>/' + o,
					dataType: 'json',
				}).done(function(data) {
					unScannedData = data;
					console.log(unScannedData.count);
					if (data.count > 0) {
						$('#spanUnscanned').removeClass('bg-primary');
						$('#spanUnscanned').addClass('bg-danger');
						$('#spanUnscanned').html("Untuk ORC: " + o + " ada " + data.count.toString() + " bundel belum discan!");
					} else {
						$('#spanUnscanned').removeClass('bg-danger');
						$('#spanUnscanned').addClass('bg-primary');
						$('#spanUnscanned').html("Untuk ORC: " + o + "semua bundel sudah discan.");
					}
				});
			}

			$('#aUnscanned').click(function() {
				// console.log(unScannedData.rows);
				// console.table(unScannedData.rows);
				$('#inputSewingUnscannedModal').modal('show');
			});

			function reload_table() {
				table.ajax.reload(null, false);
			}

			$('#inputSewingUnscannedModal').on('shown.bs.modal', function() {
				// $('#barcode_input_molding').trigger('focus');
				$.each(unScannedData.rows, function(i, item) {
					unscannedTable.row.add([
						item.orc, item.style, item.size, item.no_bundle, item.kode_barcode
					]).draw();
				});
			});

			$('#inputSewingUnscannedModal').on('hidden.bs.modal', function() {
				unscannedTable.clear();
			})

		});
	</script>
</body>

</html>
