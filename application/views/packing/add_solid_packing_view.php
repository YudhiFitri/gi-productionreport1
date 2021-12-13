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
	<!-- <link href="<//?php echo base_url('plugins/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet">	 -->
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<!-- <link href="<//?php echo base_url('plugins/datatables/datatables.min.css'); ?>" rel="stylesheet"> -->
	<!-- <link href="<//?php echo base_url('plugins/DataTables-checkboxes/css/dataTables.checkboxes.css'); ?>" rel="stylesheet"> -->
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>" rel="stylesheet">

	<style rel="stylesheet">
		table.tableCursor tr:hover {
			cursor: pointer;
		}

		/* only for this one*/
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
							<h1 class="m-0 text-dark">Solid Packing <strong>List</strong> </h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-8">
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Data Solid Packing List <span id="mode" class="badge <?php echo ($mode == "Add New" ? "badge-success" : "badge-danger"); ?>"><?php echo ($mode == "Add New" ? "Add New Data" : "Edit Data"); ?></span></h3>
								</div>
								<form id='frmPackingList' method="POST">
									<div class="card-body">
										<div class="form-group row">
											<div class="col-sm-3 text-right">
												<label for="" class="col-form-label col-form-label-sm">ORC:</label>
											</div>
											<div class="col-sm-7">
												<input type="hidden" id="id_packing_list" name="id_packing_member">
												<input type="text" id="orc" name="orc" class="form-control form-control-sm">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3 text-right">
												<label for="" class="col-form-label col-form-label-sm">Color:</label>
											</div>
											<div class="col-sm-7">
												<input type="text" id="color" name="color" class="form-control form-control-sm" disabled>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3 text-right">
												<label for="" class="col-form-label col-form-label-sm">Style:</label>
											</div>
											<div class="col-sm-7">
												<input type="text" id="style" name="style" class="form-control form-control-sm" disabled>
											</div>
										</div>

										<hr>
										<table id="solidPackingTable" class="table">
											<thead>
												<tr>
													<th>ID</th>
													<th width="15%">Size</th>
													<th width="25%">Qty Size</th>
													<th width="15%">PCS</th>
													<th width="15%">Jumlah Box</th>
													<th width="25%"></th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
										</table>

										<!-- Modal -->
										<div class="modal fade" id="editQtySolidPackingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header bg-warning">
														<h5 class="modal-title">Edit Qty Solid Packing</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<!-- <form id='frmDataPackingMember' method="POST"> -->
													<div class="modal-body">
														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Qty:</label>
															</div>
															<div class="col-sm-4">
																<input type="number" id="qty" name="qty" class="form-control form-control-sm">
															</div>
														</div>

													</div>
													<div class="modal-footer bg-warning">
														<button type="button" class="btn btn-outline-secondary shadow" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
														<button type="button" class="btn btn-outline-success shadow" id="btnOK"><i class="fa fa-check"></i>&nbsp;OK</button>
													</div>
													<!-- </form> -->
												</div>
											</div>
										</div>

									</div>

									<div class="card-footer bg-warning">
										<a href="<?php echo site_url('packing/packing_solid'); ?>" class="btn btn-outline-secondary shadow"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
										<button type="button" class="btn btn-outline-success shadow" id="btnUpdate"><i class="fa fa-upload"></i>&nbsp;Update</button>
									</div>
								</form>

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
	<!-- <script src="<//?php echo base_url('plugins/datatables/datatables.min.js'); ?>"></script> -->
	<!-- <script src="<//?php echo base_url('plugins/DataTables-checkboxes/js/dataTables.checkboxes.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>

	<script src="<?php echo base_url('plugins/select2/select2.min.js'); ?>"></script>

	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/toastr/toastr.min.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			var table = $('#solidPackingTable').DataTable({
				// "dom": 'lfr<"toolbar">tip',
				"footerCallback": function(row, data, start, end, display) {
					var api = this.api(),
						data;
					var intVal = function(i) {
						return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === "number" ? i : 0;
					};

					var totalPcs = api.column(3).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);

					var totalBox = api.column(4).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);

					// var pageTotal = api.column(2, {
					// 	page: 'current'
					// }).data().reduce(function(a, b) {
					// 	return intVal(a) + intVal(b);
					// }, 0);

					// $(api.column(2).footer()).html(
					// 	pageTotal + '(' + total + ' total)'
					// );
					$(api.column(2).footer()).html('Total:');
					$(api.column(3).footer()).html(totalPcs);
					$(api.column(4).footer()).html(totalBox);

				},

				// "footerCallback": function(row, data, start, end, display) {
				// 	var api = this.api();

				// 	api.columns('.sum', {
				// 		page: 'current'
				// 	}).every(function() {
				// 		var sum = this
				// 			.data()
				// 			.reduce(function(a, b) {
				// 				var x = parseFloat(a) || 0;
				// 				var y = parseFloat(b) || 0;
				// 				return x + y;
				// 			}, 0);
				// 		console.log(sum); //alert(sum);
				// 		$(this.footer()).html(sum);
				// 	});
				// },

				"lengthMenu": [
					[10, 15, 20, 25, 50, 100],
					[10, 15, 20, 25, 50, 100]
				],
				"select": {
					"style": "single"
				},
				"columnDefs": [{
					"targets": [1, 2, 3, 4, 5],
					"className": "text-center"
				}, {
					"targets": [0],
					"visible": false
				}]
			});

			// var toolbar = "<div class='form-group row'>" +
			// 	"<div class='btn-group btn-group-sm' role='toolbar'>" +
			// 	// "<a href='<//?php echo site_url("packing/add_packing_member"); ?>' id='btnAddNew' class='btn btn-outline-secondary'><i class='fa fa-plus'></i> Add New</a>" +
			// 	"<button type='button' id='btnSelectAll' class='btn btn-outline-success'><i class='fa fa-plus'></i> Select All</button>" +
			// 	"<button type='button' id='btnDeselectAll' class='btn btn-outline-warning'><i class='fa fa-close'></i> Select None</button>" +
			// 	"</div>" +
			// 	"</div>";

			// $("div.toolbar").html(toolbar);

			// $('#btnSelectAll').click(function() {
			// 	table.rows().select()
			// });

			// $('#btnDeselectAll').click(function() {
			// 	table.rows().deselect()
			// })

			$('#orc').keypress(function(e) {
				if (e.keyCode == 13) {
					var orcVal = $(this).val();

					//cek di solid packing list
					$.ajax({
						type: 'GET',
						url: '<?= site_url("Packing/ajax_check_solid_packing_list_by_orc"); ?>/' + orcVal,
						dataType: 'json',
					}).done(function(rowCount) {
						if (rowCount > 0) {
							Swal.fire({
								type: 'warning',
								title: 'Peringatan',
								html: '<h3 style="color: red;"><strong>ORC sudah diinput!!</strong></h3>',
								showConfirmButton: false,
								timer: 2500,
								onAfterClose: () => {
									$('#orc').val('');
									$('#orc').trigger('focus')
								}
							});
						} else {
							$.ajax({
								type: "GET",
								url: "<?= site_url('Packing/ajax_get_cutting_orc'); ?>/" + orcVal,
								dataType: 'json',
							}).done(function(dt) {
								if (dt == null) {
									Swal.fire({
										type: 'warning',
										title: 'Peringatan',
										html: '<h3 style="color: red;"><strong>ORC tidak ditemukan!!</strong></h3>',
										showConfirmButton: false,
										timer: 2500,
										onAfterClose: () => {
											$('#orc').val('');
											$('#orc').trigger('focus')
										}
									});
								} else {
									$('#color').val(dt[0].color);
									$('#style').val(dt[0].style);
									$.ajax({
										type: 'POST',
										url: '<?= site_url("Packing/ajax_get_kapasitas_karton_by_style"); ?>',
										data: {
											'style': $('#style').val()
										},
										dataType: 'json'
									}).done(function(rows) {
										if (rows != null) {
											$.each(rows, function(i, item) {
												table.row.add([
													0,
													item.size,
													item.kapasitas_karton,
													0, 0,
													'<button type="button" class="btn btn-outline-info shadow btn-sm btnEditQty"><i class="fa fa-pencil"></i> Edit pcs</button>'
												]).draw();
											})
										}
									})

								}
							});
						}
					})



					// $.ajax({
					// 	type: "GET",
					// 	url: '<//?php echo site_url("packing/ajax_get_packing_list"); ?>/' + orcVal,
					// 	dataType: 'json'
					// }).done(function(rows) {
					// 	console.log('rows: ', rows);
					// 	if (rows == null) {
					// 		Swal.fire({
					// 			type: 'warning',
					// 			title: 'Peringatan',
					// 			html: '<h3 style="color: red;"><strong>ORC tidak ditemukan!!</strong></h3>',
					// 			showConfirmButton: false,
					// 			timer: 2500,
					// 			onAfterClose: () => {
					// 				$('#orc').val('');
					// 				$('#orc').trigger('focus')
					// 			}
					// 		});
					// 		// return false;
					// 	} else {
					// 		$('#color').val(rows[0].color);
					// 		$('#style').val(rows[0].style);
					// 		$.each(rows, function(i, item) {
					// 			table.row.add([
					// 				item.id_packing_list,
					// 				item.size,
					// 				item.qty,
					// 				item.box_capacity,
					// 				Math.ceil(item.qty / item.box_capacity),
					// 				'<button type="button" class="btn btn-outline-info shadow btn-sm btnEditQty"><i class="fa fa-pencil"></i> Edit QTY</button>'
					// 				// itm.size, itm.qty_detail, row.kapasitas_karton, Math.round(itm.qty_detail / row.kapasitas_karton)
					// 			]).draw();

					// 		});
					// 		// $('#size').focus();
					// 		// loadSize(rows);

					// 	}
					// })
				}
			});

			$('#solidPackingTable tbody').on('click', 'button.btnEditQty', function() {
				var data = table.row($(this).parents('tr')).data();
				console.log('data[3]: ', data[3]);
				$('#qty').val(data[3]);
				$('#editQtySolidPackingModal').modal('show');
			})

			$('#btnOK').click(function() {
				if ($('#qty').val() != '') {
					table.rows({
						selected: true
					}).every(function(rowIdx, tableLoop, rowLoop) {
						table.cell(rowIdx, 3).data($('#qty').val());
						let qtySize = table.cell(rowIdx, 2).data();
						let pcs = table.cell(rowIdx, 3).data();
						let box = Math.ceil(pcs / qtySize);
						table.cell(rowIdx, 4).data(box);
					}).draw();
				}
				$('#editQtySolidPackingModal').modal('hide');

				// hitungJmlBox();

			});

			// function hitungJmlBox() {
			// 	table.rows({
			// 		selected: true
			// 	}).every(function(rowIdx, tableLoop, rowLoop) {
			// 		let qtySize = table.cell(rowIdx, 2).data();
			// 		let qty = table.cell(rowIdx, 3).data();
			// 		let jmlBox = Math.ceil(qty / qtySize);

			// 		table.cell(rowIdx, 4).data(jmlBox);
			// 	})
			// }

			$('#editQtySolidPackingModal').on('shown.modal.bs', function() {
				$('#qty').focus();
			});

			$('#editQtySolidPackingModal').on('hidden.modal.bs', function() {
				$('#qty').val('');
				table.rows().deselect();
			});

			$('#btnUpdate').click(function() {
				let rows = table.rows().data();
				let orc = $('#orc').val();
				let style = $('#style').val();
				let color = $('#color').val();

				let arrPackingList = [];
				$.each(rows, function(i, item) {
					if (parseInt(item[3]) != 0) {
						let objPackingList = {
							// "id_packing_list": item[0],
							"orc": orc,
							"color": color,
							"style": style,
							"size": item[1],
							"qty": parseInt(item[3]),
							"box_capacity": parseInt(item[2]),
							"total_box": parseInt(item[4])
						};
						arrPackingList.push(objPackingList);
					}
				});
				console.log('arrPackingList: ', arrPackingList);

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_update_batch_solid_packing_list"); ?>',
					data: {
						"arrPackingList": arrPackingList
					},
					dataType: 'json'
				}).done(function(rst) {
					if (rst > 0) {
						$.ajax({
							type: 'GET',
							url: '<?= site_url("Packing/ajax_get_packing_orc"); ?>/' + $('#orc').val(),
							dataType: 'json'
						}).done(function(retData) {
							if (retData != null) {
								let noBox = 0;
								let arrSolidPackingBarcode = [];
								let zero = "0";

								$.each(retData, function(i, item) {
									let sisa = (item.qty % item.box_capacity);
									for (let x = 1; x <= item.total_box; x++) {
										noBox++;
										let objSolidPackingBarcode = {
											"id_packing_list": item.id_packing_list,
											"no_box": noBox,
											"qty": (x == item.total_box && sisa > 0 ? sisa : parseInt(item.box_capacity)),
											"barcode": item.orc + "-" + zero.repeat(4 - noBox.toString().length) + noBox.toString()
										}
										arrSolidPackingBarcode.push(objSolidPackingBarcode);
									}
								});

								$.ajax({
									type: 'POST',
									url: '<?= site_url("Packing/ajax_insert_solid_packing_barcode_batch"); ?>',
									data: {
										'arrSolidPackingBarcode': arrSolidPackingBarcode
									},
									dataType: 'json'
								}).done(function(val) {
									if (val > 0) {
										Swal.fire({
											type: 'success',
											title: 'Berhasil',
											html: '<h3 style="color: red;"><strong>Update data solid packing list berhasil</strong></h3>',
											showConfirmButton: false,
											timer: 2500,
											onAfterClose: () => {
												table.clear().draw();
												$('#orc').val('');
												$('#color').val('');
												$('#style').val('');
												$('#orc').focus();
											}
										});
									}
								});

							}
						})

					}
				});
				// }

			});


		});
	</script>
</body>

</html>
