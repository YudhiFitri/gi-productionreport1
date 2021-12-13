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
	<link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
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
							<h1 class="m-0 text-dark">Packing Member </h1>
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
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Add New Data Packing Member </h3>
								</div>
								<form id="packingMemberForm" method="POST">
									<div class="card-body">
										<div class="form-group row">
											<div class="col-sm-2 text-right">
												<label for="" class="col-form-label col-form-label-sm">NIK:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" id="nik" name="nik" class="form-control form-control-sm">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-2 text-right">
												<label for="" class="col-form-label col-form-label-sm">Nama Lengkap:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" id="nama" name="nama" class="form-control form-control-sm">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-2 text-right">
												<label for="" class="col-form-label col-form-label-sm">Email:</label>
											</div>
											<div class="col-sm-6">
												<input type="email" id="email" name="email" class="form-control form-control-sm">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-2 text-right">
												<label for="" class="col-form-label col-form-label-sm">Tgl Lahir:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-sm">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-2 text-right">
												<label for="" class="col-form-label col-form-label-sm">No.KTP:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" id="no_ktp" name="no_ktp" class="form-control form-control-sm">
											</div>
										</div>
									</div>
									<div class="card-footer row">
										<!-- <div class="form-group row"> -->
										<a href='<?php echo site_url("packing/packing_member"); ?>' class="btn btn-outline-secondary btn-sm shadow"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>&nbsp;&nbsp;
										<button type="submit" class="btn btn-outline-danger btn-sm shadow"><i class="fa fa-upload"></i>&nbsp;Save</button>
										<!-- </div> -->
									</div>
								</form>
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
	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>


	<script>
		$(document).ready(function() {
			var table;
			var kode;

			$('#tgl_lahir').datepicker({
				format: 'yyyy-mm-dd'
			});

			$('form[id="packingMemberForm"]').validate({
				rules: {
					nik: 'required',
					nama: 'required',
					email: {
						email: true
					},
					tgl_lahir: 'required',
					no_ktp: 'required'
				},
				messages: {
					nik: 'NIK harus diisi!',
					nama: 'Nama harus diisi!',
					email: 'Masukan alamat email yang valid!',
					tgl_lahir: 'Tgl Lahir harus diisi!',
					no_ktp: 'No.KTP harus diisi!'
				},
				submitHandler: function(form) {
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("packing/insert_packing_member"); ?>',
						data: $(form).serialize(),
						dataType: 'json'
					}).done(function(dt) {
						if (dt > 0) {
							clearForm();
							Swal.fire({
								type: 'success',
								title: 'Success',
								html: '<h3><strong>Tambah Data Member Packing Berhasil!</strong></h3>',
								showConfirmButton: false,
								timer: 2000,
								onAfterClose: () => {
									$('#nik').focus();
								}
							});
						}
					})
				}
			});

			function clearForm(){
				$('#packingMemberForm').find('input').val('').end();
			}

		});
	</script>
</body>

</html>
