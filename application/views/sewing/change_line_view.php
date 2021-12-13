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
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
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
									<h3 class="card-title">Change Line Production</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label class="col-sm-2 col-form-label">Input an ORC:</label>
										<!-- <select class="select2 form-control" id="orcs" width="100%"></select> -->
										<div class="input-group mb-3">
											<input type="text" id="orcs" class="form-control" placeholder="Input ORC disini...">
											<span class="input-group-append">
												<button type="button" id="btnSearch" class="btn btn-warning"><i class="fa fa-search"></i>&nbsp;Search</button>
											</span>
										</div>
									</div>

									<table id="inputSewingTable" class="table table-bordered table-hover">
										<thead>
											<th>#</th>
											<th>LINE</th>
											<th>STYLE</th>
											<th>SIZE</th>
											<th>COLOR</th>
											<th>BUNDLE#</th>
											<th>QTY</th>
										</thead>
										<tfoot>
											<th>#</th>
											<th>LINE</th>
											<th>STYLE</th>
											<th>SIZE</th>
											<th>COLOR</th>
											<th>BUNDLE#</th>
											<th>QTY</th>
										</tfoot>
									</table>
								</div>
								<div class="card-footer">
									<div class="form-group">
										<button type="button" class="btn btn-primary" id="btnSelectAll">Pilih Semua</button>
										<button type="button" class="btn btn-primary" id="btnDeselectAll">Tidak Pilih Semua</button>
									</div>
									<div class="form-group">
										<label>Move to line:</label>
										<select class="select2 form-control" id="lines" width="100%"></select>
									</div>

									<div class="form-group">
										<button type="button" class="btn btn-success" id="btnUpdate"><i class="fa fa-upload"></i>&nbsp;Update</button>
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
	<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			var tableInputSewing = $('#inputSewingTable').DataTable({
				"select": {
					"style": "multi"
				}
			});

			$('#lines').select2();

			loadLines();

			$('#btnSearch').click(function() {
				var orc = $('#orcs').val();
				if (orc != null) {
					loadChangeSelectedOrc(orc);
				}
			})

			function loadChangeSelectedOrc(o) {
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("InputSewing/ajax_get_by_orc1"); ?>/' + o,
					dataType: 'json'
				}).done(function(dt) {
					// console.log('dt: ', dt);
					tableInputSewing.clear().draw();
					if (dt.length > 0) {
						loadToTable(dt);
					} else {
						Swal.fire({
							type: 'warning',
							title: 'Warning',
							text: 'ORC tidak ada',
							showConfirmButton: false,
							timer: 2000
						});
					}
					$('#orcs').val('');
					$('#orcs').focus();
					// console.log('dt: ', dt);
				})
			}

			function loadToTable(data) {
				$.each(data, function(i, item) {
					if ($('#userName').text() == item.line) {
						tableInputSewing.row.add([
							item.id_input_sewing,
							item.line,
							item.style,
							item.size,
							item.color,
							item.no_bundle,
							item.qty_pcs
						]).draw();

					}
				});
			}

			function loadLines() {
				$.ajax({
					type: 'GET',
					url: '<?= site_url("InputSewing/ajax_get_all_line"); ?>',
					dataType: 'json',
				}).done(function(lines) {
					// console.log('lines: ', lines);
					if (lines != null) {
						$('#lines').append($('<option>', {
							value: "0",
							text: "Silahkan pilih Line tujuan"
						}));

						$.each(lines, function(i, itm) {
							$('#lines').append($('<option>', {
								value: itm.name,
								text: itm.name
							}))
						});
					}
				});
			}

			$('#btnSelectAll').click(function() {
				tableInputSewing.rows({
					search: 'applied'
				}).select();
			});

			$('#btnDeselectAll').click(function() {
				tableInputSewing.rows({
					search: 'applied'
				}).deselect();
			});

			$('#inputSewingTable tbody').on('click', 'tr', function() {
				$(this).toggleClass('selected');
			});

			$('#btnUpdate').click(function() {
				var selRows = tableInputSewing.rows({
					selected: true
				}).data();
				var selLine = $('#lines').val();
				console.log('selRows length: ', selRows.length);

				if (selRows.length <= 0 || selLine == "0") {
					Swal.fire({
						type: 'warning',
						title: 'Peringatan!',
						text: 'Silahkan pilih data yang akan dipindah terlebih dahulu!',
						showConfirmButton: true
					});

				} else {
					// console.log('selRows data: ', selRows);
					var arrData = [];
					$.each(selRows, function(x, itm) {
						arrData.push({
							'id_input_sewing': itm[0],
							'line': selLine
							// 'line': itm[1]
						});
					});
					// console.log('arrData: ', arrData);
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("InputSewing/ajax_update"); ?>',
						data: {
							'dataInputSewing': arrData
						},
						dataType: 'json'
					}).done(function(rv) {
						// console.log('rv: ', rv);
						if (rv > 0) {
							Swal.fire({
								type: 'success',
								title: 'Berhasil',
								text: 'Data line tujuan berhasil diubah',
								showConfirmButton: false,
								timer: 2000
							});

							// reloadTable();
							loadChangeSelectedOrc($('#orcs').val());
						}
					})
				}

			});

			function reloadTable() {
				tableInputSewing.ajax.reload();
			}
		});
	</script>
</body>

</html>
