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
	<link href="<?php echo base_url('plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">
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

		table.tableCursor tr:hover {
			cursor: pointer;
		}

		table.dataTable tbody th,
		table.dataTable tbody td {
			padding: 2px 6px;
		}

		table.dataTable th {
			padding: .5rem;
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
								<div class="card-header">
									<h3 class="card-title">Transfer Area (OUT)</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="form-group">
											<!-- <label class="my-0">Lokasi:</label>
											<select class="form-control form-control-sm select2" id="lokasi" style="width:100%;"></select> -->
											<label class="my-0">ORC:</label>
											<select class="form-control form-control-sm select2" id="orc" style="width:100%;"></select>
										</div>
									</div>
									<div class="responsive">
										<table class="table table-bordered table-striped table-hover tableCursor" id="tableTransferAreaIn" style="width:100%;">
											<thead>
												<tr>
													<th>ID</th>
													<th>#</th>
													<th>PO</th>
													<th>ORC</th>
													<th>Style</th>
													<th>Color</th>
													<th>Size</th>
													<th>No.Box</th>
													<th>Pcs</th>
													<!-- <th>Barcode</th> -->
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th colspan="8" style="text-align:right">Total: </th>
													<!-- <th></th> -->
													<th></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="card card-success card-outline">
									<div class="card-header">
										<h3 class="card-title">List of Transfer Area (OUT)</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
												<i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<table class="table table-hover table-striped" style="width:100%" id="tableTransferAreaOut">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>PO</th>
													<th>Style</th>
													<th>Color</th>
													<th>ORC</th>
													<th>Jml Box</th>
													<th>Total Pcs</th>
													<th></th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>PO</th>
													<th>Style</th>
													<th>Color</th>
													<th>ORC</th>
													<th>Jml Box</th>
													<th>Total Pcs</th>
													<th></th>
												</tr>
											</tfoot>
										</table>

									</div>
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
	<script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/moment/moment.min.js'); ?>"></script>

	<script>
		$(function() {
			$('#barcodeOperator').focus();
			$('#orc').select2({
				placeholder: 'Pilih ORC...'
			});

		});

		$(document).ready(function() {
			var barcodeOp, barcodePacking, noUrut = 0,
				selectedTAInRows = null;

			$('#tglOut').val(new Date().toJSON().slice(0, 10));

			var tableTransferAreaIn = $('#tableTransferAreaIn').DataTable({
				destroy: true,
				select: {
					style: 'multi'
				}
			})

			var listORC = $.ajax({
				type: 'GET',
				url: '<?= site_url("TransferArea/ajax_get_distinct_orc_packing"); ?>',
				dataType: 'json'
			});

			listORC.done(function(rst) {
				$.each(rst, function(i, itm) {
					$('#orc').append($('<option>', {
						value: itm.orc,
						text: itm.orc
					}));
				});
				$('#orc').select2('open').trigger('change');
			});

			$('#orc').change(function() {
				let orc = $(this).val();
				loadTableTAIn(orc);
			});

			function loadTableTAIn(o) {
				tableTransferAreaIn = $('#tableTransferAreaIn').DataTable({
					// scrollX: true,
					destroy: true,
					dom: 'lfBrtip',
					select: {
						style: 'multi'
					},
					buttons: [{
							text: 'Select All',
							action: function() {
								tableTransferAreaIn.rows({
									page: 'all'
								}).select();
								getSelectedTAIn();

							}
						},
						{
							text: 'Select All On Page',
							action: function() {
								tableTransferAreaIn.rows({
									page: 'current'
								}).select();
								getSelectedTAIn()
							}
						},
						{
							text: 'Deselect All',
							action: function() {
								tableTransferAreaIn.rows({
									page: 'all'
								}).deselect();
								getSelectedTAIn();
							}
						},
						{
							text: 'Deselect All On Page',
							action: function() {
								tableTransferAreaIn.rows({
									page: 'current'
								}).deselect();
								getSelectedTAIn();
							}
						},
						{
							text: 'Keluarkan',
							action: () => {
								if (selectedTAInRows == null) {
									Swal.fire({
										type: 'warning',
										text: 'Peringatan!',
										title: 'Pilih data yang akan dikeluarkan terlebih dahulu!',
										showConfirmButton: true
									});
									return false;
								}

								let dataForTransferAreaOut = [];

								$.each(selectedTAInRows, function(i, itm) {
									dataForTransferAreaOut.push({
										'id_transfer_area': itm.id_transfer_area,
										// 'tgl_out': dateSelected + ` ${time}`,
										'status': 'out'
									});
								});

								$.ajax({
									type: 'POST',
									url: '<?= site_url("TransferArea/ajax_update_batch_transfer_area"); ?>',
									data: {
										'dataForTransferAreaOut': dataForTransferAreaOut
									},
									dataType: 'json'
								}).done(function(rowAff) {
									if (rowAff > 0) {
										Swal.fire({
											type: 'success',
											title: 'Berhasil',
											text: 'Data berhasil diUpdate',
											timer: 750,
											showCancelButton: false,
											onAfterClose: () => {
												tableTransferAreaIn.rows({
													page: 'all'
												}).deselect();
												// tableTransferAreaIn.clear();
												$('#orc').select2('open');
												loadTableOut();
												tableTransferAreaIn.ajax.reload(null, false);
											}
										})
									}
								})
							}
						}
					],
					scrollY: '200px',
					scrollCollapse: true,
					ajax: {
						type: 'POST',
						url: '<?= site_url("TransferArea/ajax_get_by_orc_in"); ?>/' + o,
						dataType: 'json'
					},
					columns: [{
							'data': 'id_transfer_area'
						},
						{
							'data': null
						},
						{
							'data': 'po'
						},
						{
							'data': 'orc'
						},
						{
							'data': 'style'
						},
						{
							'data': 'color'
						},
						{
							'data': 'size'
						},
						{
							'data': 'carton_no'
						},
						{
							'data': 'qty_box'
						},
						// {
						// 	'data': 'barcode'
						// },
					],
					columnDefs: [{
						'targets': [0],
						visible: false
					}],
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
							.column(8)
							.data()
							.reduce(function(a, b) {
								return intVal(a) + intVal(b);
							}, 0);

						// Total over this page
						pageTotal = api
							.column(8, {
								page: 'current'
							})
							.data()
							.reduce(function(a, b) {
								return intVal(a) + intVal(b);
							}, 0);

						// Update footer
						$(api.column(8).footer()).html(
							pageTotal + ' (' + total + ')'
						);
					}
				});

				tableTransferAreaIn.on('order.dt search.dt', function() {
					tableTransferAreaIn.column(1, {
						search: 'applied',
						order: 'applied'
					}).nodes().each(function(cell, i) {
						cell.innerHTML = i + 1;
					});
				}).draw();

			}

			$('#tableTransferAreaIn tbody').on('click', 'tr', function() {
				$(this).toggleClass('selected');
				getSelectedTAIn();
			})

			function getSelectedTAIn() {
				selectedTAInRows = tableTransferAreaIn.rows('.selected').data();
				console.log(selectedTAInRows.length);

			}

			var tableTransferAreaOut = $('#tableTransferAreaOut').DataTable({
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
					"url": "<?php echo site_url('TransferArea/ajax_get_all_out'); ?>",
					"type": "GET",
					"dataType": "json",
				},
				"columns": [{
						"data": null,
					},
					{
						"data": 'tgl'
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
						"data": null
					},

				],
				"columnDefs": [{
						"targets": [0],
						"visible": false
					},
					{
						"targets": [1],
						"render": function(data, type, row, meta) {
							return new Date(data).toISOString().slice(0, 10);
						}
					},
					{
						"targets": [8],
						"render": function(data, type, row, meta) {
							return '<button class="btn btn-info btn-sm btnShowDetailTransferAreaOut">Detail</button>';
						}
					},
				]
			});

			tableTransferAreaOut.on('order.dt search.dt', function() {
				tableTransferAreaOut.column(0, {
					search: 'applied',
					order: 'applied'
				}).nodes().each(function(cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();

			$('#tableTransferAreaOut tbody').on('click', 'button.btnShowDetailTransferAreaOut', function() {
				let selectedRow = tableTransferAreaOut.row($(this).parents('tr')).data();
				console.log('selectedRow: ', selectedRow);
				open(`<?= site_url("TransferArea/ajax_show_detail_out_by_orc"); ?>/${selectedRow.orc}`, '_self');

			});

			function loadTableOut() {
				tableTransferAreaOut.ajax.reload(null, false);
			}

		})
	</script>
</body>

</html>
