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
	<style rel="stylesheet">
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
						<div class="col-12">
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Data Solid Packing List</h3>
								</div>
								<div class="card-body">
									<table id="packingListTable" class="table table-striped tableCursor" style="width: 100%">
										<thead>
											<tr>
												<!-- <th><input name="select_all" value="1" type="checkbox"></th> -->
												<th></th>
												<th>ORC</th>
												<th>Color</th>
												<th>Style</th>
												<th></th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<th>ORC</th>
												<th>Color</th>
												<th>Style</th>
												<th></th>
											</tr>
										</tfoot>
									</table>

									<!-- Modal -->
									<div class="modal fade" id="packingListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<h5 class="modal-title">Data Packing List <span id="mode" class="badge"></span></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form id='frmPackingList' method="POST">
													<div class="modal-body">
														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Type:</label>
															</div>
															<div class="col-sm-7">
																<input type="hidden" id="id_packing_list" name="id_packing_member">
																<select class="form-control" id="packingType" id="packingListType">
																	<option value="">--Please select a packing type--</option>
																	<option value="solid">Solid Packing Type</option>
																	<option value="assorted">Assorted Packing Type</option>
																</select>
															</div>
														</div>

														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">ORC:</label>
															</div>
															<div class="col-sm-7">
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

														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Qty:</label>
															</div>
															<div class="col-sm-5">
																<input type="number" id="qty" name="qty" class="form-control form-control-sm" disabled>
															</div>
														</div>


													</div>
													<div class="modal-footer bg-warning">
														<button type="button" class="btn btn-outline-secondary shadow" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
														<button type="submit" class="btn btn-outline-success shadow"><i class="fa fa-upload"></i>&nbsp;Update</button>
													</div>
												</form>
											</div>
										</div>
									</div>
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
	<!-- <script src="<//?php echo base_url('plugins/datatables/datatables.min.js'); ?>"></script> -->
	<!-- <script src="<//?php echo base_url('plugins/DataTables-checkboxes/js/dataTables.checkboxes.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			var mode = "";

			var table = $('#packingListTable').DataTable({
				"dom": '<"toolbar">lfrtip',
				"processing": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				"select": {
					"style": "single"
				},

				"order": [
					[0, "desc"]
				],
				"ajax": {
					"url": "<?php echo site_url('packing/ajax_get_solid_packing'); ?>",
					"type": "GET",
					"dataType": "json",
				},
				"columns": [{
						"className": "details-control",
						"orderable": false,
						"data": null,
						"defaultContent": ""
					},
					{
						"data": "orc"
					},
					{
						"data": "color"
					},
					{
						"data": "style"
					},
				],
				"columnDefs": [{
					"targets": 4,
					"data": null,
					"defaultContent": "<button class='btn btn-outline-primary mx-1 btn-sm btnGenerateBarcode'><i class='fa fa-barcode'></i> Barcode</button> " +
									  "<button class='btn btn-outline-secondary mx-1 btn-sm btnPrintPackingList'><i class='fa fa-print'></i> Print Packing List</button>" +
									  "<button class='btn btn-outline-danger mx-1 btn-sm btnDeletePackingList'><i class='fa fa-trash'></i> Delete</button>"
						/* "<button class='btn btn-outline-warning btn-sm btnEditSolidPackingList'><i class='fa fa-pencil'></i> Edit</button> " + */
				}]
			});

/* 			$('#packingListTable tbody').on('click', 'button.btnEditSolidPackingList', function() {
				var currData = table.row($(this).parents('tr')).data();
				console.log(currData.orc);
				open("<?php echo site_url('packing/edit_solid_packing'); ?>/" + currData.orc, '_self');
			}); */

			$('#packingListTable tbody').on('click', 'button.btnPrintPackingList', function() {
				var selectedRow = table.row($(this).parents('tr')).data();
				open("<?php echo site_url("packing/ajax_packing_list_print_preview"); ?>/" + selectedRow.orc, '_blank');
			});

			$('#packingListTable tbody').on('click', 'button.btnGenerateBarcode', function() {
				var selRow = table.row($(this).parents('tr')).data();
				open("<?php echo site_url("packing/ajax_barcode_print_preview"); ?>/" + selRow.orc, '_blank');
			});

			$('#packingListTable tbody').on('click', 'button.btnDeletePackingList', function() {
				let rowSelected = table.row($(this).parents('tr')).data();

				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
					title: 'Yakin akan dihapus?',
					text: "Data tidak bisa dikembalikan lagi!!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, hapus!',
					cancelButtonText: 'Tidak, batalkan!',
					reverseButtons: true
				}).then((result) => {
					if (result.value) {
						console.log('rowSelected.orc: ', rowSelected.orc);
						$.ajax({
							url: '<?php echo site_url("Packing/ajax_delete_packing_list"); ?>/' + rowSelected.orc,
							dataType: 'json',
						}).done(function(deleted) {
							if (deleted) {
								swalWithBootstrapButtons.fire(
									'Dihapus!',
									'Data sudah dihapus.',
									'success'
								);
								reloadTable();
							}
						});
					} else if (
						/* Read more about handling dismissals below */
						result.dismiss === Swal.DismissReason.cancel
					) {
						swalWithBootstrapButtons.fire(
							'Dibatalkan',
							'Data tidak jadi dihapus :)',
							'error'
						)
					}
				})
			});									

			var toolbar = "<div class='form-group row'>" +
			 	"<div class='btn-group btn-group-sm' role='toolbar'>" +
			 	"<a href='<?php echo site_url("packing/add_solid_packing"); ?>' id='btnAddNewPackingList' class='btn btn-outline-success'><i class='fa fa-plus'></i> Add New</a>" +
			 	"</div>" +
			 	"</div>";

			 $("div.toolbar").html(toolbar);

			$('#packingListTable tbody').on('click', 'td.details-control', function() {
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
				var dataPacking = {
					'orc': d['orc'],
					'style': d['style']
				}

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_get_solid_packing_detail"); ?>',
					data: {
						'dataPacking': dataPacking
					},
					dataType: 'json'
				}).done(function(result) {
					console.log('result: ', result);
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
							'<td>Qty:</td>' +
							'<td><strong style="color: red;">' + item.qty + '</strong></td>' +
							'<td>Kapasitas Box:</td>' +
							'<td><strong style="color: red;">' + item.box_capacity + '</strong></td>' +
							'<td>Total Box:</td>' +
							'<td><strong style="color: red;">' + item.total_box + '</strong></td>' +
							// '<td><a href="#" onclick="showRemarks(' + item.id_packing_karton + ')" class="btn btn-outline-warning shadow btn-sm no-padding"><i class="fa fa-pencil"></i> Edit</a></td>'
							// '<td><button class="btn btn-outline-warning shodow btn-sm no-padding" id="' + item.id_packing_karton + '"><i class="fa fa-pencil"></i> Edit</button>' +
							'</tr>'
					});

					div.html(htmlDetailTable).removeClass('loading');
				});
				return div;
			}

			// $('#btnEditPackingList').prop('disabled', true);
			// $('#btnDeletePackingList').prop('disabled', true);

			function reloadTable() {
				table.ajax.reload(null, false);
			}			

		});
	</script>
</body>

</html>
