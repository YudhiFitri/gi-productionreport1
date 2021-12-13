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
	<link href="<?php echo base_url('plugins/nprogress/css/nprogress.css'); ?>" rel="stylesheet">

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
							<h1 class="m-0 text-dark"><strong>VF </strong>Solid Packing List</h1>
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
							<div class="card card-success card-outline">
								<div class="card-header">
									<h3 class="card-title">
										Upload VF Packing List File Excel To Database
									</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<form enctype="multipart/form-data" id="importVFPackingList" method="post" class="float-center">
											<!-- <p><label>Pilih file excel(.xlsx)</label></p> -->
											<input type="file" name="file" id="file" required accept=".xlsx">
											<button type="submit" name="import" id="import" class="btn btn-default"><i class="fa fa-upload"></i> Upload</button>
											<!-- <button type="button" name="summary" id="summary" class="btn btn-info"><i class="fa fa-list-alt"></i> Summary</button> -->
										</form>
									</div>
									<table class="table table-striped table-hover" id="tablePackingList" style="width: 100%">
										<thead>
											<tr>
												<th>Tanggal</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th></th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Tanggal</th>												
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th></th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</div>
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
	<script src="<?php echo base_url('plugins/nprogress/js/nprogress.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			var tablePackingList = $('#tablePackingList').DataTable({
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
					// "url": "<//?php echo site_url('PackingListVF/ajax_list_today_vf'); ?>",
					"url": "<?php echo site_url('PackingListVF/ajax_list_all_vf'); ?>",
					"type": "GET",
					"dataType": "json",
				},
				"columns": [
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
						"data": null
					},

				],
				"columnDefs": [{
					"targets": [5],
					"render": function(data, type, row, meta) {
						return '<button class="btn btn-info btn-sm btnShowDetailPackingList">Detail</button>';
					}
				}, ]
			});

			$('#tablePackingList tbody').on('click', 'button.btnShowDetailPackingList', function() {
				let selectedRow = tablePackingList.row($(this).parents('tr')).data();
				console.log('selectedRow: ', selectedRow);
				open(`<?= site_url("PackingListVF/ajax_get_by_orc"); ?>/${selectedRow.orc}`, '_self');

			});			

			var alertType;
			var alertTitle;

			$('#summary').prop('disabled', true);

			$('#importVFPackingList').on('submit', function(event) {
				event.preventDefault();
				$('#import').prop('disabled', true);
				NProgress.start();
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("PackingListVF/importVFPackingList"); ?>',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
				}).done(function(konfirmasi) {
					NProgress.done();
					console.log(konfirmasi);
					Swal.fire({
						type: 'success',
						title: 'Berhasil',
						html: '<h3>Import Packing List dari file excel berhasil',
						showConfirmButton: true,
						onAfterClose: () => {
							$('#file').val('');
							$('#import').prop('disabled', false);
							reloadTable();
						}
					});

				})
			});

			function reloadTable() {
				tablePackingList.ajax.reload(null, false);
			}
		})
	</script>
</body>

</html>
