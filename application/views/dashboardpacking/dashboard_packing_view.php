<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Admin Packing Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet">

	<style>
		table.dataTable tbody th,
		table.dataTable tbody td {
			padding: 2px 6px;
		}

		table.dataTable th {
			padding: .5rem;
		}

		.progress-bar {
			border-top-right-radius: 40px !important;
			border-bottom-right-radius: 40px !important;
			-webkit-box-shadow: inset 0 0 0 10px #28a745 !important;
			-moz-box-shadow: inset 0 0 0 10px #28a745 !important;
			box-shadow: none !important;
		}

		.progress {
			border-radius: 40px !important;
			background-color: white !important;
			-webkit-box-shadow: inset 0 0 0 10px #28a745 !important;
			-moz-box-shadow: inset 0 0 0 10px #28a745 !important;
			box-shadow: inset 0 0 0 10px #28a745 !important;
			border: none;
		}

        span.small {
            font-size: 15px;
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
							<h1 class="m-0 text-dark">Admin Packing Dashboard </h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- <div class="form-group">
						<label>Date Range:</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
							<input type="text" class="form-control col-md-4 float-right active" id="dateRange">
						</div>
					</div> -->
					<div class="row">
						<div class="col-12">
							<div class="card card-success card-outline">
								<div class="card-header">
									<h3 class="card-title">
										<i class="fa fa-bar-chart"></i>&nbsp;Recap Finish Good Result
									</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-4">
											<div class="small-box bg-success">
												<div class="inner">
													<h3 id="countCartonsAll">0</h3>
													<h3 id="sumPCSAll">0</h3>

													<h4>Total</h4>
												</div>
												<div class="icon">
													<i class="ion ion-bag"></i>
												</div>
												<a href="<?= site_url('TransferArea/ajax_all_filter_by_line'); ?>" class="small-box-footer">
													Show Detail
													<i class="fa fa-arrow-circle-right"></i>
												</a>
											</div>
										</div>
										<div class="col-4">
											<div class="small-box bg-warning">
												<div class="inner">
													<h3 id="countCartonsOut">0</h3>
													<h3 id="sumPCSOut">0</h3>
													<h4>Out</h4>
												</div>
												<div class="icon">
													<i class="ion ion-bag"></i>
												</div>
												<a href="<?= site_url('TransferArea/ajax_out_filter_by_line'); ?>" class="small-box-footer">
													Show Detail
													<i class="fa fa-arrow-circle-right"></i>
												</a>
											</div>
										</div>
										<div class="col-4">
											<div class="small-box bg-danger">
												<div class="inner">
													<h3 id="countCartonsStock">0</h3>
													<h3 id="sumPCSStock">0</h3>
													<h4>STOCK</h4>
												</div>
												<div class="icon">
													<i class="ion ion-bag"></i>
												</div>
												<a href="<?= site_url('TransferArea/ajax_in_filter_by_line'); ?>" class="small-box-footer">
													Show Detail
													<i class="fa fa-arrow-circle-right"></i>
												</a>
											</div>
										</div>

									</div>

								</div>
							</div>
						</div>


						<div class="col-12">
							<div class="card card-warning card-outline">
								<div class="card-header">
									<h3 class="card-title">
										<i class="fa fa-bar-chart"></i>&nbsp;Finish Good Line Capacity
									</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- <div class="row"> -->
									<div class="col-12">
										<div id="showCapacityLine">
											<table class="table" id="tableCapacityLine" style="width: 100%">
												<thead>
													<tr>
														<th>ID</th>
														<th></th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
									<!-- </div> -->

								</div>
							</div>
						</div>



						<!-- </div> -->
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
	<!-- <script src="<//?php echo base_url('plugins/moment/moment.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('plugins/daterangepicker/moment.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			var startDate, endDate;

			const getFGResults = () => {
				$.ajax({
					type: "GET",
					url: '<?= site_url("TransferArea/ajax_get_fg_results"); ?>',
					dataType: 'json'
				}).done(function(data) {
					$('#countCartonsAll').html(parseInt(data.count_cartons_all.count_cartons_all).toLocaleString('id-ID') + " <span class='small'>cartons</span>");
					$('#sumPCSAll').html(parseInt(data.sum_pcs_all.sum_pcs_all).toLocaleString('id-ID') + " <span class='small'>pcs</span>");

					$('#countCartonsOut').html(parseInt(data.count_cartons_out.count_cartons_out).toLocaleString('id-ID') + " <span class='small'>cartons</span>");
					$('#sumPCSOut').html(parseInt(data.sum_pcs_out.sum_pcs_out).toLocaleString('id-ID') + " <span class='small'>pcs</span>");

					$('#countCartonsStock').html(parseInt(data.count_cartons_in.count_cartons_in).toLocaleString('id-ID') + " <span class='small'>cartons</span>");
					$('#sumPCSStock').html(parseInt(data.sum_pcs_in.sum_pcs_in).toLocaleString('id-ID') + " <span class='small'>pcs</span>");
				})
			}
			getFGResults();

			var tableCapacityLine = $('#tableCapacityLine').DataTable({
				lengthMenu: [
					[5, 10, 25, 50, 75, 100, -1],
					[5, 10, 25, 50, 75, 100, "all"]
				],
				columnDefs: [{
					targets: [0],
					visible: false
				}]
			});

			var getAllLines = $.ajax({
				type: 'GET',
				url: '<?= site_url("TransferArea/ajax_get_all_lines"); ?>',
				dataType: 'json'
			});

			var getCountStatusIn = $.ajax({
				type: 'GET',
				url: '<?= site_url("TransferArea/ajax_get_count_status_in"); ?>',
				dataType: 'json'
			});

			$.when(getAllLines, getCountStatusIn).done(function(allLinesRst, countStatusInRst) {
				allLinesRst[0].splice(allLinesRst[0].length - 2, 2);
				allLinesRst[0].every(lines => {
					let falseCount = 0;
					countStatusInRst[0].every(statusIn => {
						if (lines.line == statusIn.lokasi) {
							lines['count_status_in'] = statusIn.jmlKarton;
							return false;
						} else {
							falseCount++;
						}
						// console.log(falseCount);
						return true;
					});
					if (falseCount == countStatusInRst[0].length) {
						lines['count_status_in'] = '0';
						falseCount = 0;
						return true
					}
					return true;
				});

                // console.log('allLinesRst[0]: ', allLinesRst[0]);

				$.each(allLinesRst[0], function(i, item) {
					var width = (item.count_status_in == '0' ? 0 : (parseInt(item.count_status_in) / parseInt(item.max_box_capacity)) * 100);

                    var available = 0;
                    if(item.count_status_in == '0'){
                        available = 100;
                    }else if(parseInt(item.count_status_in) < parseInt(item.max_box_capacity)){
                        available = 100 - ((parseInt(item.count_status_in) / parseInt(item.max_box_capacity)) * 100);
                    }
					// let available = (item.count_status_in == '0' ? 100 : 100 - ((item.count_status_in / item.max_box_capacity) * 100));


					var pcsAvailable = parseInt(item.max_box_capacity) - parseInt(item.count_status_in);
					tableCapacityLine.row.add([
						item.id_line,
						item.line + `<div class="progress" id=${item.id_line} style="max-width: 100%; height: 30px">
							<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: ${Math.round(width)}%">
								<a href="<?= site_url("TransferArea/ajax_show_detail_fg_by_lokasi_in"); ?>/${item.line}">${Math.round(width)}% (${item.count_status_in}) </a>
							</div>
							<div class="progress-bar bg-success" role="progressbar" style="width: ${Math.round(available)}%">${Math.round(available)}% (${pcsAvailable})</div>
						</div>`
					]).draw();
				});

				var emptyLines = allLinesRst[0].filter(el => el.count_status_in == '0');
				console.log('emptyLines: ', emptyLines);				

			});

		})
	</script>
</body>

</html>
