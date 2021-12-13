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
							<h1 class="m-0 text-dark"><strong>Create Barcode</strong> and <strong>Packing List</strong> </h1>
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
							<div class="card">
								<div class="card-body">
									<div class="form-group row">
										<input type="text" id="inputTextOrc" class="form-control col-md-5" placeholder="Input ORC here...">
									</div>
									<div class="form-group row">
										<button class='btn btn-outline-warning shadow mr-2' id='btnPrintPackingList'><i class='fa fa-print'></i> Print Packing List</button>
										<button class='btn btn-outline-info shadow mr-2' id='btnGenerateBarcode'><i class='fa fa-barcode'></i> Generate Barcode Packing</button>										
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
	<!-- <script src="<//?php echo base_url('plugins/DataTables-checkboxes/js/dataTables.checkboxes.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


	<script>
		$(document).ready(function() {


			$('#btnGenerateBarcode').click(function() {
				//print preview
				var orc = $('#inputTextOrc').val()
				if(orc == ""){
					Swal.fire({
						type: 'warning',
						title: 'Peringatan',
						html: '<h3 style="color: red;"><strong>ORC harus diisi!</strong></h3>',
						showConfirmButton: false,
						timer: 2500,
						onAfterClose: ()=>{
							$('#inputTextOrc').val('');
							$('#inputTextOrc').focus();
						}
					});
					return false;
				}
				open('<?php echo site_url("packing/ajax_barcode_print_preview"); ?>/' + $('#inputTextOrc').val());


				// var selRows = packingTable.rows({
				// 	selected: true
				// }).data();
				// var dataPackingList = [];
				// $.each(selRows, function(i, itm) {
				// 	dataPackingList.push({
				// 		'orc': itm[0],
				// 		'color': itm[1],
				// 		'style': itm[2],
				// 		'size': itm[3],
				// 		'qty': itm[4],
				// 		'box_capacity': itm[5],
				// 		'total_box': itm[6]
				// 	})
				// });

				// $.ajax({
				// 	type: 'POST',
				// 	url: '<//?php echo site_url("packing/packing_list"); ?>',
				// 	data: {
				// 		'dataPackingList': dataPackingList
				// 	},
				// 	dataType: 'json'
				// }).done(function(result) {
				// 	console.log('result: ', result);
				// 	if (result) {
				// 		// Swal.fire({
				// 		// 	type: 'info',
				// 		// 	title: 'Konfirmasi',
				// 		// 	text: 'Barcode packing list berhasil dibuat. Apakah akan ditampilkan sekarang?',
				// 		// 	showCancelButton: true,
				// 		// 	confirmButtonColor: '#3085d6',
				// 		// 	cancelButtonColor: '#d33',
				// 		// 	confirmButtonText: 'Ya, tampilkan sekarang!'
				// 		// }).then((result)=>{
				// 		// 	if(result.value){
				// 		// 		open('<//?php echo site_url("packing/ajax_show_packing_list"); ?>/' + $('#inputTextOrc').val(), '_self');
				// 		// 	}
				// 		// })



				// 		// open('<//?php echo site_url("packing/ajax_barcode_print_preview"); ?>');
				// 	}
				// })

			});

			$('#btnPrintPackingList').click(function(){
				var orc = $('#inputTextOrc').val()
				if(orc == ""){
					Swal.fire({
						type: 'warning',
						title: 'Peringatan',
						html: '<h3 style="color: red;"><strong>ORC harus diisi!</strong></h3>',
						showConfirmButton: false,
						timer: 2500,
						onAfterClose: ()=>{
							$('#inputTextOrc').val('');
							$('#inputTextOrc').focus();
						}
					});
					return false;
				}
				open('<?php echo site_url("packing/ajax_packing_list_print_preview"); ?>/' + $('#inputTextOrc').val());

			})

		});
	</script>
</body>

</html>
