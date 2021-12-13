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
							<h1 class="m-0 text-dark">Boxes Packing Capacities</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Data Boxes Packing Capacities</h3>
								</div>
								<div class="card-body">
									<table id="boxPackingCapacityTable" class="table table-striped table-hover" style="width: 100%">
										<thead>
											<tr>
												<th></th>
												<!-- <th>Id</th> -->
												<th>Style</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<!-- <th>Id</th> -->
												<th>Style</th>
												<th></th>
												<th></th>
											</tr>
										</tfoot>
									</table>
									<div class="modal fade" id="modal_add_kapasitas_box" role="document">
										<div class="modal-dialog modal-dialog-centered modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="box_capacity_title">Add Box Capacity</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times</span>
													</button>
												</div>
												<!-- <form method="post" id="form_add_box_capacity"> -->
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group row">
																<!-- <input type="hidden" name="id_barang" id="id_barang"> -->
																<label class="col-md-2 text-right">Style: </label>
																<!-- <input type="text" id="style" name="style" class="form-control col-md-4"> -->
																<select name="style" id="style" class="form-control col-md-4 select2" width="100%"></select>
															</div>

															<div class="form-group row">
																<label class="col-md-2 text-right">Size: </label>
																<input type="text" id="size" name="size" class="form-control col-md-4">
															</div>

															<div class="form-group row">
																<label class="col-md-2 text-right">Kapasitas Box: </label>
																<input type="number" id="box_capacity" name="box_capacity" class="form-control col-md-4">
															</div>

															<div class="form-group row">
																<button id='btnOK' class="btn btn-outline-info btn-sm btn-block shadow"><i class="fa fa-check"></i>&nbsp;OK</button>
															</div>
															<hr>
															<table id="packingDetailTable" class="table table-striped">
																<thead>
																	<tr>
																		<th>Style</th>
																		<th>Size</th>
																		<th>Capacity(box)</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>Style</th>
																		<th>Size</th>
																		<th>Capacity(box)</th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
													<div class="modal-footer justify-content-between">
														<button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
														<button type="button" class="btn btn-outline-success" id="btnSave"><i class="fa fa-upload"></i>&nbsp;Save</button>
													</div>
												</div>
												<!-- </form> -->
											</div>
										</div>
									</div>

									<div class="modal fade" id="modal_edit_kapasitas_box" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="box_capacity_title">Edit Box Capacity</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times</span>
													</button>
												</div>
											</div>
											<div class="modal-footer">

											</div>
											<!-- </form> -->
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

			var mode = "";

			table = $('#boxPackingCapacityTable').DataTable({
				"dom": '<"toolbar">lfrtip',
				"autoWidth": true,
				"processing": true,
				// "serverSide": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				// "select": {
				// 	"style": "single"
				// },
				"order": [],
				"ajax": {
					"url": "<?php echo site_url('packing/ajax_get_kapasitas_karton_by_style_distinct'); ?>",
					"type": "GET",
					"dataType": "json",
				},
				"columns": [{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					// {"data": 'id_packing_karton'},
					{
						"data": 'style'
					},
					{
						"data": ""
					}
					// {
					// 	"data": [1]
					// },					
				],
				"columnDefs": [{
						"targets": [2],
						"render": function(data, type, row, meta) {
							return '<button class="btn btn-sm btn-outline-success shadow btnAdd"><i class="fa fa-plus"></i> Add</button>';
						}
					},
					{
						"targets": [3],
						"render": function(data, type, row, meta) {
							return '<button class="btn btn-sm btn-outline-warning shadow btnEdit"><i class="fa fa-pencil"></i> Edit</button>';
						}
					}
				]
			});

			$('.select2').select2({
				placeholder: "Select Style"
			});

			showStyles();

			function showStyles() {
				$('#style').empty();
				$.ajax({
					type: 'GET',
					url: '<?= site_url("Packing/ajax_get_styles"); ?>',
					dataType: 'json'
				}).done(function(dataStyles) {
					if (dataStyles != null) {
						$.each(dataStyles, function(i, item) {
							$('#style').append($("<option />").val(item.style).text(item.style));
						});
					}
				})
			}

			$('#btnSave').prop('disabled', true);
			$('#btnOK').attr('disabled', true);

			var toolbar = "<div class='form-group row'>" +
				"<button id='btnAddNew' class='btn btn-outline-danger btn-sm'><i class='fa fa-file'></i> Add New</button>" +
				"</div>";
			$("div.toolbar").html(toolbar);

			var tableDetail = $('#packingDetailTable').DataTable({
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
			});

			var tablePackingSize = $('#editPackingDetailTable').DataTable({
				"dom": "lrtip",
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
				// "columns": [
				// 	{
				// 		"data": "id_packing_karton"
				// 	},
				// 	{
				// 		"data": "style"
				// 	},
				// 	{
				// 		"data": "size"
				// 	},
				// 	{
				// 		"data": "kapasitas_karton"
				// 	}
				// ]
			});

			$('#boxPackingCapacityTable tbody').on('click', 'td.details-control', function() {
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

			$('#boxPackingCapacityTable tbody').on('click', 'button.btnAdd', function() {
				var data = table.row($(this).parents('tr')).data();

				addBoxCapacity(data['style']);
			});

			$('#boxPackingCapacityTable tbody').on('click', 'button.btnEdit', function() {
				var data = table.row($(this).parents('tr')).data();

				// console.log('Edit Data: ', data);

				editBoxCapacity(data['style']);
			});

			$('#packingSize tbody').on('click', 'button', function() {
				var data = tablePackingSize.row($(this).parents('tr')).data();

				console.log('data: ', data);
			});

			$('#editPackingDetailTable tbody').on('click', 'tr', function() {
				dataSelectedRow = tablePackingSize.row(this).data();

				$('#id_packing_karton').val(dataSelectedRow[0]);
				$('#style_edit').val(dataSelectedRow[1]);
				$('#size_edit').val(dataSelectedRow[2]);
				$('#box_capacity_edit').val(dataSelectedRow[3]);


			});

			function addBoxCapacity(style) {
				// showStyles();
				mode = "Add Style Size"
				// $('#style').val(style);
				// $('#box_capacity_title').text('Add Box Capacity');
				// $('#style').select2('val', '');
				$('#style').select2('val', style);
				// $('#style').val(style);
				// $('#style').prop('disabled', true);
				// $('#size').focus();
				$('#modal_add_kapasitas_box').modal('show');

			}

			function editBoxCapacity(style) {
				console.log('style: ', style);
				var dataStyle = {
					'style': style
				};

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_get_by_style"); ?>',
					data: {
						'dataStyle': dataStyle
					},
					dataType: 'json',
				}).done(function(dt) {
					if (dt != null) {
						localStorage.removeItem('kapasitas_box');
						localStorage.setItem('kapasitas_box', JSON.stringify(dt));
						open('<?php echo site_url("packing/edit_kapasitas_karton"); ?>', '_self');
					}
				})
			}

			$('#modal_add_kapasitas_box').on('shown.bs.modal', function() {

				switch (mode) {
					case "Add Style Size":
						$('#box_capacity_title').text('Add Box Capacity');
						// $('#style').select2('val', style);
						// $('#style').prop('disabled', true);
						$('#size').focus();
						break;
					case "Add New":
						$('#box_capacity_title').text('Add New Box Capacity');
						// $('#select').prop('disabled', false);
						// $('#style').select2('val', '');
						// $('#style').focus();
						break;
				}
			});

			$('#btnAddNew').click(function() {
				mode = "Add New";
				// showStyles();
				// $('#box_capacity_title').text('Add New Box Capacity');
				// $('#select').prop('disabled', false);
				$('#style').select2('val', '');
				// $('#style').val('');
				$('#style').focus();

				$('#modal_add_kapasitas_box').modal('show');
			});

			function format(d) {
				var div = $('<div/>').addClass('loading slider').text('Loading...');
				var style = d['style'];
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_get_kapasitas_karton_by_style"); ?>',
					data: {
						"style": d['style']
					},
					dataType: 'json'
				}).done(function(result) {
					var htmlDetailTable = "";
					// var htmlDetail = "";

					$.each(result, function(i, item) {
						htmlDetailTable +=
							'<table id="packingSize" class="table table-striped table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
							'<tr>' +
							// '<td>ID' + 
							// '<td>' + item.id_packing_karton + '</td>' +
							'<td>Size:</td>' +
							'<td><strong style="color: red;">' + item.size + '</strong></td>' +
							'<td>Kapasitas Box:</td>' +
							'<td><strong style="color: red;">' + item.kapasitas_karton + '</strong></td>' +
							// '<td><a href="#" onclick="showRemarks(' + item.id_packing_karton + ')" class="btn btn-outline-warning shadow btn-sm no-padding"><i class="fa fa-pencil"></i> Edit</a></td>'
							// '<td><button class="btn btn-outline-warning shodow btn-sm no-padding" id="' + item.id_packing_karton + '"><i class="fa fa-pencil"></i> Edit</button>' +
							'</tr>'
					});

					div.html(htmlDetailTable).removeClass('loading');
				});
				return div;
			}

			$('#btnOK').click(function() {
				tableDetail.row.add([
					$('#style').val(), $('#size').val(), $('#box_capacity').val()
				]).draw();
				$('#size').val('');
				$('#box_capacity').val('')
				$('#size').trigger('focus');
				$('#btnSave').prop('disabled', false);
			});

			$('#modal_add_kapasitas_box').on('hidden.bs.modal', function() {
				tableDetail.clear().draw();

				$(this)
					.find("input")
					.val('').prop('disabled', false)
					.end();

				// $('#style').select2('val', '');
			});

			$('#btnSave').click(function() {
				// if (mode == "Add New") {
				var dataTable = tableDetail.rows().data();

				console.log('dataTable: ', dataTable);

				var arrDataTable = [];

				$.each(dataTable, function(i, itm) {
					arrDataTable.push({
						'style': itm[0],
						'size': itm[1],
						'kapasitas_karton': itm[2]
					});
				});

				console.log('arrDataTable: ', arrDataTable);

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_save_kapasitas_karton"); ?>',
					data: {
						'kapasitasKarton': arrDataTable
					},
					dataType: 'json'
				}).done(function(affRow) {
					if (affRow > 0) {
						Swal.fire({
							type: 'success',
							title: 'Simpan Data Berhasil',
							html: '<h3 style="color: blue;"><strong>Simpan Data Kapasitas Box Berhasil.</strong></h3>',
							showConfirmButton: false,
							timer: 1500,
							onAfterClose: () => {
								reloadTable();
								$('#modal_add_kapasitas_box').modal('hide');
							}
						});
					}
				});
			});

			function reloadTable() {
				table.ajax.reload(null, false)
			}

			$('#box_capacity').change(function() {
				if ($('#size').val() != "" && $('#box_capacity').val() != "") {
					$('#btnOK').attr('disabled', false);
				} else {
					$('#btnOK').attr('disabled', true);
				}
			});

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
