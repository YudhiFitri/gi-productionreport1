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
		<?php $this->load->view('_partials/navbar_sewing.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_sewing.php'); ?>

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
								<div class="card-header bg-success">
									<h3 class="card-title">Input Sewing</h3>
									<div class="card-tools">
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label>Line:</label>
										<input type="text" id="line" class="form-control" width="100%" value="<?= $this->session->userdata('username'); ?>" disabled>
									</div>
									<div class="form-group">
										<label>Please Scan Bundle Record</label>
										<input type="text" id="barcode" class="form-control" width="100%" placeholder="Scan bundle barcode here...">
									</div>
									<div class="responsive">
										<table id="inputSewingTable" class="table table-border table-striped" style="width: 100%">
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

			$(".select2").select2();

			var table = $('#inputSewingTable').DataTable({
				"responsive": true,
				"ajax": {
					"url": "<?php echo site_url('InputSewing/getInputSewingByLine'); ?>",
				},
				columns: [{
						data: 'id_input_sewing',
					},
					{
						data: 'line'
					},
					{
						data: 'tgl'
					},
					{
						data: 'orc'
					},
					{
						data: 'style'
					},
					{
						data: 'color'
					},
					{
						data: 'no_bundle'
					},
					{
						data: 'size'
					},
					{
						data: 'qty_pcs'
					}
				],
				columnDefs: [{
					targets: [0],
					visible: false
				}]
			});

			$('#barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();

					var barcode = $('#barcode').val();
					var barcodeUpper = barcode.toUpperCase();

					barcodeSplit = barcodeUpper.split("_");

					check_barcode(barcodeSplit[1]);
				}
			});

			function check_barcode(bar) {
				$.ajax({
					url: '<?= site_url("InputSewing/checkCuttingDetail"); ?>/' + bar,
					type: 'GET',
					dataType: 'json'
				}).done(function(dt) {
					console.log('dt: ', dt);
					if (dt == null) {
						Swal.fire({
							type: "warning",
							title: "Warning!",
							text: "Barcode tidak ada di cutting!",
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

			function check_barcode1(d) {
				var dataStr = {
					'barcode': barcodeSplit[1],
					'line': $('#line').val()
				};

				console.log('dataStr: ', dataStr);
				var ajaxCheckBarcode = $.ajax({
					url: '<?php echo site_url("InputSewing/ajax_get_by_barcode"); ?>',
					type: 'POST',
					data: {
						'dataStr': dataStr
					},
					dataType: 'json'
				}).done(function(dataInputSewing) {
					console.log('data input sewing: ', dataInputSewing);
					if (dataInputSewing != null) {
						if (dataInputSewing.line == $('#line').val()) {
							Swal.fire({
								type: "warning",
								title: "Warning!",
								text: "Barcode sudah di scan sebelumnya!",
								showConfirmButton: false,
								timer: 1750
							});
							$('#barcode').val('');
							$('#barcode').focus();
						} else {
							if (dataInputSewing.outputed == "Yes") {
								Swal.fire({
									type: "warning",
									title: "Warning!",
									text: "Sudah menjadi output untuk line " + dataInputSewing.line,
									showConfirmButton: false,
									timer: 1750
								});
								$('#barcode').val('');
								$('#barcode').focus();
							} else {
								updateInputSewingChangeLine(dataInputSewing.id_input_sewing);
							}
						}
					} else {
						save_input_sewing(d);
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
						url: '<?php echo site_url('InputSewing/ajax_get_by_size'); ?>',
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
							url: '<?php echo site_url("InputSewing/ajax_get_sewing_sam"); ?>',
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
						'kode_barcode': barcodeSplit[1],
						'outputed': 'No'
					};

					// console.log('dataCuttingDetail: ', dataCuttingDetail);

					insertInputSewing(dataStr);
				});

				function insertInputSewing(data) {
					$.ajax({
						url: '<?php echo site_url("InputSewing/ajax_save"); ?>',
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
								timer: 1500
							});

						}

						$('#barcode').val('');
						$('#barcode').focus();
						reload_table();
					})
				}
			}

			function reload_table() {
				table.ajax.reload(null, false);
			}

			function updateInputSewingChangeLine(idInputSewing) {
				let dataUpdate = {
					'id_input_sewing': idInputSewing,
					'line': $('#line').val()
				};

				$.ajax({
					type: 'POST',
					url: '<?= site_url("InputSewing/ajax_update_change_line"); ?>',
					data: {
						'dataUpdate': dataUpdate
					},
					dataType: 'json'
				}).done(function(id) {
					if (id > 0) {
						Swal.fire({
							type: 'info',
							title: 'Update data berhasil!!',
							showConfirmButton: false,
							timer: 1500
						});
						$('#barcode').val('');
						$('#barcode').focus();
						reload_table();
					}
				})
			}

		});
	</script>
</body>

</html>
