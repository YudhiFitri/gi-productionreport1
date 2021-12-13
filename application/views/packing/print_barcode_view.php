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
	<!-- <link href="<//?php echo base_url('plugins/DataTables-checkboxes/css/dataTables.checkboxes.css'); ?>" rel="stylesheet"> -->
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">

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
							<h1 class="m-0 text-dark"><strong>Print Barcode</strong> Packing </h1>
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
								<div class="card-body">
									<div class="form-group row">
										<label for="" >ORC: </label>
										<input type="text" id="orc" value="<?php echo $packing_list_barcode[0]->orc; ?>">
									</div>
									<div class="form-group row">
										<label for="" >Style: </label>
										<input type="text" value="<?php echo $packing_list_barcode[0]->style; ?>">
									</div>
									<div class="form-group row">
										<label for="" >Color: </label>
										<input type="text" value="<?php echo $packing_list_barcode[0]->color; ?>">
									</div>
									<div class="form-group row">
										<label for="" >Qty: </label>
										<input type="text" value="<?php echo $packing_list_barcode[0]->qty; ?>">
									</div>																											
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="packingBarcodeTable" class="table table-striped tableCursor" width="100%">
										<thead>
											<tr>
												<th>Size</th>
												<th>#Box</th>
												<th>Barcode</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($packing_list_barcode as $list): ?>
											<tr>
												<td><?php echo $list->size; ?></td>
												<td><?php echo $list->no_box; ?></td>
												<td><img src="<?php echo base_url('assets/barcodes/' . $list->barcode . '.jpg'); ?>"</td>
											</tr>
											<?php endforeach ?>
										</tbody>
										<tfoot>
											<tr>
												<th>Size</th>
												<th>#Box</th>
												<th>Barcode</th>
											</tr>
										</tfoot>
									</table>
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
	<!-- <script src="<//?php echo base_url('plugins/DataTables-checkboxes/js/dataTables.checkboxes.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


	<script>
		$(document).ready(function() {
			var packingBarcodeTable = $('#packingBarcodeTable').DataTable({
				"dom": 'lfr<"toolbar">tip',
			});

			var orc = $('#orc').val();

			var toolbar = "<button id='btnPrintPreview' class='btn btn-outline-warning'><i class='fa fa-print'></i> Print</button>";

			$("div.toolbar").html(toolbar);

			$('#btnPrintPreview').click(function(){
				$.ajax({
					url: '<?php echo site_url("packing/ajax_barcode_print_preview"); ?>/' + orc
				})
			})

			// var packingBarcodeTable = $('#packingBarcodeTable').DataTable({
			// 	"autoWidth": true,
			// 	"processing": true,
			// 	"serverSide": true,
			// 	"lengthMenu": [
			// 		[5, 10, 15, 20, 25, 75, 100],
			// 		[5, 10, 15, 20, 25, 75, 100]
			// 	],
			// 	"select": {
			// 		"style": "multi"
			// 	},
			// 	"ajax": {
			// 		"url": "<//?php echo site_url('packing/ajax_list'); ?>",
			// 		"type": "POST",
			// 		"dataType": "json",
			// 	},
			// 	"columns": [{
			// 			"className": 'details-control',
			// 			"orderable": false,
			// 			"data": null,
			// 			"defaultContent": ''
			// 		},
			// 		{"data": [0]},{"data": [1]},
			// 		{"data": [2]},{"data": [3]},
			// 		{"data": [4]},{"data": [5]},
			// 		{"data": [6]},
			// 	]				

			// })
		});
	</script>
</body>

</html>
