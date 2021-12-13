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
			background: url('../img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('../img/details_close.png') no-repeat center center;
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
						<div class="col-12 responsive">
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Entry Data Output Packing</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group row">
												<div class="col-sm-1 text-right">
													<label class="col-form-label col-form-label-sm">ORC:</label>
												</div>
												<input id="orc" class="col-sm-2 form-control form-control-sm" disabled>

												<div class="col-sm-1 text-right">
													<label class="col-form-label col-form-label-sm">Style:</label>
												</div>
												<input type="text" id="style" class="col-sm-2 form-control form-control-sm" disabled>

												<div class="col-sm-1 text-right">
													<label for="" class="col-form-label col-form-label-sm">Color:</label>
												</div>
												<input type="text" id="color" class="col-sm-2 form-control form-control-sm" disabled>

												<div class="col-sm-1 text-right">
													<label for="" class="col-form-label col-form-label-sm">Size:</label>
												</div>
												<input type="text" id="size" class="col-sm-1 form-control form-control-sm" disabled>
											</div>
											<div class="form-group row">
												<div class="col-sm-1 text-right">
													<label class="col-form-label col-form-label-sm">#Bundle:</label>
												</div>
												<input type="text" id="no_bundle" class="col-sm-2 form-control form-control-sm" disabled>

												<div class="col-sm-1 text-right">
													<label class="col-form-label col-form-label-sm">Qty:</label>
												</div>
												<input type="number" id="qty" class="col-sm-2 form-control form-control-sm" disabled>

												<div class="col-sm-1 text-right">
													<label for="" class="col-form-label col-form-label-sm">Actual:</label>
												</div>
												<input type="number" id="actual_qty" class="col-sm-1 form-control form-control-sm" oninput="actualQtyChange()">

											</div>
										</div>
									</div>

									<hr>
									<div class="row">
										<div class="col-12">
											<div class="form-group row">
												<div class="col-sm-2 text-right">
													<label class="col-form-label col-form-label-sm">Qty Remark:</label>
												</div>
												<input type="number" class="form-control form-control-sm col-sm-1 remark" id="qty_remark" min="0">

												<div class="col-sm-1 text-right">
													<label class="col-form-label col-form-label-sm">Remark:</label>
												</div>
												<!-- <input type="text" class="form-control col-sm-4" id="remark"> -->
												<select name="remarks" id="remarks" class="form-control  col-sm-3 remark">
													<option value="">Silahkan pilih remark</option>
													<option value="Campur Size">Campur Size</option>
													<option value="Dipinjam QC">Dipinjam QC</option>
													<option value="Reject">Reject</option>
													<option value="Aktual Kurang">Aktual Kurang</option>
													<option value="Lain-lain">Lain-lain</option>
												</select>
												<input type="text" name="lain-lain" id="lain-lain" class="form-control form-control-sm col-sm-3">
												<div class="col-sm-1 text-right">
													<button id="btnOK" class="btn btn-outline-success remark"><i class="fa fa-check"></i>&nbsp;OK</button>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<table id="packingRemarkTable" class="table table-bordered table-striped table-hover responsive" style="width: 100%">
										<thead>
											<tr>
												<th></th>
												<th>ORC</th>
												<th>Size</th>
												<th>#Bundle</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Actual Qty</th>
												<th class="text-center">Qty Remark</th>
												<th>Remark</th>
												<!-- <th></th> -->
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<th>ORC</th>
												<th>Size</th>
												<th>#Bundle</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Actual Qty</th>
												<th class="text-center">Qty Remark</th>
												<th>Remark</th>
												<!-- <th></th> -->
											</tr>
										</tfoot>
									</table>
								</div>
								<hr>
								<div class="card-footer">
									<div class="row">
										<div class="col-md-6">
											<!-- <button id="btnBack" class="btn btn-outline-warning float-left"><i class="fa fa-arrow-left"></i>&nbsp;Back</button> -->
											<a href="<?php echo site_url('packing'); ?>" class="btn btn-outline-warning float-left"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
										</div>
										<div class="col-md-6">
											<button id="btnCancel" class="btn btn-outline-default float-right m-1"><i class="fa fa-close"></i>&nbsp;Cancel</button>&nbsp;
											<button id="btnSave" class="btn btn-outline-primary float-right m-1"><i class="fa fa-upload"></i>&nbsp;Save</button>
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
		var totalSelisih = 0;
		var boxes;
		var qtyOrder;

		$(document).ready(function() {
			var table = $('#packingRemarkTable').DataTable({
				"dom": 'lf<"toolbar">rtip',
				columnDefs: [{
						targets: [2, 3, 4, 5, 6],
						width: "10%",
						className: "text-center"
					},
					{
						targets: [0],
						orderable: false,
						className: 'select-checkbox'
					}
				],
				select: {
					style: 'os',
					selector: 'td:first-child'
				}
			});

			var toolbar = "<div class='form-group row'>" +
				"<button id='btnRemoveRow' class='btn btn-danger btn-sm editable'><i class='fa fa-trash'></i>&nbsp;Remove</button>" +
				"</div>";
			$("div.toolbar").html(toolbar);

			var inputPackingData = JSON.parse(localStorage.getItem('inputPackingData'));

			$('#orc').val(inputPackingData.orc);
			$('#style').val(inputPackingData.style);
			$('#color').val(inputPackingData.color);
			$('#size').val(inputPackingData.size);
			$('#no_bundle').val(inputPackingData.no_bundle);
			$('#qty').val(inputPackingData.qty);

			$('#actual_qty').val(inputPackingData.qty);
			$('#actual_qty').focus();
			$('.remark').prop('disabled', true);
			$('.editable').prop('disabled', true);
			$('#qty_remark').val('0');

			$('#lain-lain').hide();
			// $('#btnSave').prop('disabled', true);

			$('#actual_qty').prop('max', inputPackingData.qty);

			$('#actual_qty').change(function() {
				if ($(this).val() > inputPackingData.qty) {
					Swal.fire({
						type: 'warning',
						title: 'Peringatan',
						html: '<h3 style="color: red;"><strong>Actual QTY melebihi QTY!!</strong></h3>',
						showConfirmButton: false,
						timer: 2500
					});
					$(this).val(inputPackingData.qty);
					$('#actual_qty').focus();
				}
			});

			$('#qty_remark').change(function() {
				let qty_remark = $(this).val();
				if (qty_remark > totalSelisih) {
					Swal.fire({
						type: 'warning',
						title: 'Peringatan',
						html: '<h3 style="color: red;"><strong>QTY Remark terlalu banyak!!</strong></h3>',
						showConfirmButton: false,
						timer: 2500
					});
					$(this).val(totalSelisih);
					$('#qty_remark').focus();
				}
			});

			$('#btnOK').click(function() {
				let qtyRemark = parseInt($('#qty_remark').val());

				totalSelisih -= qtyRemark;
				$('#qty_remark').prop('min', totalSelisih);

				table.row.add([
					'',
					$('#orc').val(),
					$('#size').val(),
					$('#no_bundle').val(),
					$('#qty').val(),
					$('#actual_qty').val(),
					$('#qty_remark').val(),
					($('#remarks').val() == "Lain-lain" ? $('#lain-lain').val() : $('#remarks').val()),
					// "<div class='form-group row'>" +
					// 	"<button class='btn btn-warning btn-sm' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fa fa-pencil'></i></button>&nbsp;" +
					// 	"<button id='btn'{$urut} class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Remove'><i class='fa fa-trash'></i></button>" + 
					// "</div>" 
				]).draw();
				$('#qty_remark').val(0);
				$('#remarks').val('');
				$('#qty_remark').focus();

				// $('.editable').prop('disabled', false);

				if (totalSelisih == 0) {
					$('.remark').prop('disabled', true);
					$('#btnSave').prop('disabled', false);
				}

				console.log(table.rows().count());
				$('#lain-lain').hide();
			});

			$('#remarks').change(function() {
				if ($(this).val() == "Lain-lain") {
					$('#lain-lain').show();
					$('#lain-lain').focus();
				} else {
					$('#lain-lain').hide();
				}
			});

			table.on('deselect', function(e, dt, type, indexes) {
				if (type === 'row') {
					// console.log('badala');
					$('#btnRemoveRow').prop('disabled', true);
				}
			});

			table.on('select', function(e, dt, type, indexes) {
				if (type === 'row') {
					// console.log('badala');
					$('#btnRemoveRow').prop('disabled', false);
				}
			});

			$('#btnRemoveRow').click(function() {
				let rowSelected = table.row('.selected').data();
				if (rowSelected.length > 0) {

					totalSelisih += parseInt(rowSelected[6]);
					table.row('.selected').remove().draw(false);
					$(this).prop('disabled', (rowSelected.length == 0 ? false : true));
					$('.remark').prop('disabled', false);
				}
			});

			$('#btnSave').click(function() {

				let dataOutputPacking = {
					'orc': $('#orc').val(),
					'actual_qty': $('#actual_qty').val(),
					'style': $('#style').val(),
					'color': $('#color').val(),
					'size': $('#size').val(),
					'no_bundle': $('#no_bundle').val(),
					'qty_pcs': $('#qty').val()
				}

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("packing/ajax_save_output_packing"); ?>',
					data: {
						'dataOutputPacking': dataOutputPacking
					},
					dataType: 'json',
				}).done(function(id) {
					if(id > 0 && table.rows().count() == 0){
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<h3 style="color: red;"><strong>Simpan Data Packing Berhasil.</strong></h3>',
							showConfirmButton: false,
							timer: 2000
						});

					}else if(id >0 && table.rows().count() > 0){
						let date_ob = new Date();
						let date = ("0" + date_ob.getDate()).slice(-2);
						let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
						let year = date_ob.getFullYear();
						let hours = date_ob.getHours();
						let minutes = date_ob.getMinutes();
						let seconds = date_ob.getSeconds();
						let dateTimeNow = year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;

						let dataOutputPackingRemarks = []
						$.each(table.rows().data(), function(i, item) {
							console.log(item[7]);
							dataOutputPackingRemarks.push({
								'id_output_packing_detail': id,
								'tgl': dateTimeNow,
								'qty_remark': item[6],
								'remark': item[7]
							});
						});

						$.ajax({
							type: 'POST',
							url: '<?php echo site_url("packing/ajax_save_output_packing_remark"); ?>/' + id,
							data: {
								'dataOutputPackingRemarks': dataOutputPackingRemarks
							},
							dataType: 'json'
						}).done(function(retVal) {
							if (retVal > 0) {
								Swal.fire({
									type: 'success',
									title: 'Berhasil',
									html: '<h3 style="color: red;"><strong>Data Output Packing dan data REMARK BERHASIL DISIMPAN.</strong></h3>',
									showConfirmButton: false,
									timer: 2000
								});
							}
						})
					}
					open("<?php echo site_url('packing'); ?>", "_self");
				})

			});

		});

		function actualQtyChange() {
			let qty = parseInt($('#qty').val());
			let actual_qty = parseInt($('#actual_qty').val());
			if (actual_qty < qty) {
				$('.remark').prop('disabled', false);
				totalSelisih = qty - actual_qty;
				console.log('totalSelisih2: ', totalSelisih);
				$('#qty_remark').prop('max', totalSelisih);
			} else {
				$('.remark').prop('disabled', true);
			}

		}
	</script>
</body>

</html>
