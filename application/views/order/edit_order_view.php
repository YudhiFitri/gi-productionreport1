<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Admin PPIC</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">

	<style>
		.error-class {
			color: #FF0000;
			/* red */
		}

		.valid-class {
			color: #00CC00;
			/* green */
		}
	</style>

</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar_ppic.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_ppic.php'); ?>

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
							<div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Edit Data Order</h3>
								</div>
								<form id="edit-order" name="edit-order">
									<div class="card-body">
										<div class="row">

											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Buyer:</label>
													<input type="hidden" id="id_order" value="<?php echo $order->id_order; ?>">
													<div class="col-md-6">
														<input type="text" class="form-control" id="buyer_edit" name="buyer_edit" value="<?php echo $order->buyer; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Color:</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="color_edit" name="color_edit" value="<?php echo $order->color; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Shipment Plan:</label>
													<div class="col-md-6">
														<input type="text" class="form-control datepicker" id="shipment_plan_edit" name="shipment_plan" value="<?php echo $order->plan_export; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">ETD:</label>
													<div class="col-md-6">
														<input type="text" class="form-control datepicker" id="etd_edit" name="etd_edit" value="<?php echo $order->etd; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Cust PO No:</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="po_edit" name="po_edit" value="<?php echo $order->so; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">ORC:</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="orc_edit" name="orc_edit" maxlength="12" value="<?php echo $order->orc; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Comm:</label>
													<div class="col-md-2">
														<input type="text" class="form-control" id="comm_edit" name="comm_edit" maxlength="5" value="<?php echo $order->comm; ?>" />
													</div>
												</div>

											</div>

											<div class="col-md-6">

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Style:</label>
													<div class="col-md-6">
														<input type="text" id="style_edit" class="form-control" value="<?php echo $order->style; ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Style SAM:</label>
													<div class="col-md-6">
														<select id="style_sam_edit" class="form-control select2" width="100%" name="style_sam_edit">
															<option value="">Please select a style</option>
															<?php foreach ($styles as $s) : ?>
																<option value="<?php echo $s->style; ?>" <?php echo ($order->style_sam == $s->style ? "selected" : ""); ?>><?php echo $s->style; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Total QTY:</label>
													<div class="col-md-4">
														<input type="number" class="form-control" id="total_qty_edit" name="total_qty_edit" value="<?php echo $order->qty; ?>" />
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Line Allocation 1:</label>
													<div class="col-md-6">
														<select id="line_allocation1_edit" name="line_allocation1_edit" class="form-control select2" width="100%">
															<option value="">Please select a line</option>
															<?php foreach ($lines as $l) : ?>
																<option value="<?php echo $l->name; ?>" <?php echo ($l->name == $order->line_allocation1 ? "selected" : ""); ?>><?php echo $l->name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Line Allocation 2:</label>
													<div class="col-md-6">
														<select id="line_allocation2_edit" name="line_allocation2_edit" class="form-control select2" width="100%">
															<option value="">Please select a line</option>
															<?php foreach ($lines as $l) : ?>
																<option value="<?php echo $l->name; ?>" <?php echo ($l->name == $order->line_allocation2 ? "selected" : ""); ?>><?php echo $l->name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Line Allocation 3:</label>
													<div class="col-md-6">
														<select id="line_allocation3_edit" name="line_allocation3_edit" class="form-control select2" width="100%">
															<option value="">Please select a line</option>
															<?php foreach ($lines as $l) : ?>
																<option value="<?php echo $l->name; ?>" <?php echo ($l->name == $order->line_allocation3 ? "selected" : ""); ?>><?php echo $l->name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Exported Date:</label>
													<div class="col-md-6">
														<input type="text" id="exported_date_edit" class="form-control datepicker" value="<?php echo $order->exported_date; ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label text-right">Exported Qty:</label>
													<div class="col-md-2">
														<input type="number" id="exported_qty_edit" class="form-control" value="<?php echo $order->exported_qty; ?>">
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="card-footer">
										<button type="submit" id="btnUpdateOrder" name="btnUpdateOrder" class="btn btn-success"><i class="fa fa-upload"></i> Update</button>
										<!-- <button type="button" id="btnBack" name="btnBack" class="btn btn-default btn-lg float-right"><i class="fa fa-arrow-left"></i> Back</button> -->
										<a href="<?php echo site_url('order'); ?>" class="btn btn-default float-right"><i class="fa fa-arrow-left"></i> Back</a>
									</div>
								</form>
							</div>

						</div>

						<!--modal add order-->
						<!--end add bundle modal-->
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
	<!-- <//?php $this->load->view('_partials/modal.php'); ?> -->
	<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>

	<script>
		// function format ( d ) {
		//     return 'Size: ' + d.size + '<br>' + 'Qty: ' + d.qty_size+'<br>';
		// }
		$(document).ready(function() {
			var bolBuyer = false,
				bolColor = false,
				bolEtd = false,
				bolPo = false,
				bolStyle = false,
				bolOrc = false;
			var bolComm = false,
				bolTotQty = false;

			$('.datepicker').datepicker({
				format: "yyyy-mm-dd",
				todayBtn: "linked",
				language: "id",
				autoclose: true,
				todayHighlight: true
			});
			$('.select2').select2();

			// $(function(){
			$('form[name="edit-order"]').validate({
				focusCleanup: true,
				errorClass: 'error-class',
				validClass: 'success-class',
				rules: {
					buyer: 'required',
					color: 'required',
					etd: 'required',
					po: 'required',
					style: 'required',
					orc: 'required',
					comm: 'required',
					total_qty: 'required'
				},
				submitHandler: function(form) {
					// form.submit()
					// alert('kjaskdjksjd');
					var dataEditOrder = {
						'id_order': $('#id_order').val(),
						'buyer': $('#buyer_edit').val(),
						'color': $('#color_edit').val(),
						'shipment_plan': $('#shipment_plan_edit').val(),
						'etd': $('#etd_edit').val(),
						'po': $('#po_edit').val(),
						'orc': $('#orc_edit').val(),
						'style': $('#style_edit').val(),
						'style_sam': $('#style_sam_edit').val(),
						'comm': $('#comm_edit').val(),
						'total_qty': $('#total_qty_edit').val(),
						'line_allocation1': $('#line_allocation1_edit').val(),
						'line_allocation2': $('#line_allocation2_edit').val(),
						'line_allocation3': $('#line_allocation3_edit').val(),
						'exported_date': $('#exported_date_edit').val(),
						'exported_qty': $('#exported_qty_edit').val()
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("Order/ajax_update"); ?>',
						dataType: 'json',
						data: {
							'dataEditOrder': dataEditOrder
						},
					}).done(function(rst) {
						if (rst > 0) {
							Swal.fire({
								type: 'success',
								title: 'Berhasil',
								text: 'Data Order berhasil diupdate',
								showConfirmButton: false,
								timer: 2000
							});
							$('#edit-order')[0].reset();
							$('#buyer').focus();
						}
					})
				}
			});

			// $('#btnSaveOrder').prop('disabled', true);
		});
	</script>
</body>

</html>
