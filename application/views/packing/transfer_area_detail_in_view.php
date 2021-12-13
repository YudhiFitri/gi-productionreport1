<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Transfer Area Detail</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/animate/animate.min.css'); ?>" rel="stylesheet">

	<link href="<?php echo base_url('plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">

	<style>
		td.details-control {
			background: url('../img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('../img/details_close.png') no-repeat center center;
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

		table.tableCursor tr:hover {
			cursor: pointer;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<!-- <//?php $this->load->view('_partials/navbar_packing.php'); ?> -->
		<!-- /.navbar -->

		<!-- Main Navbar & Sidebar Container -->
		<?php
		if ($this->session->userdata('username') == "Operator Packing") {
			$this->load->view('_partials/navbar_packing_operator.php');
			$this->load->view('_partials/sidebar_packing_operator.php');
		} else if ($this->session->userdata('username') == "Admin Packing") {
			$this->load->view('_partials/navbar_packing.php');
			$this->load->view('_partials/sidebar_packing.php');
		}
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Transfer Area </h1>
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
							<div class="card card-info card-outline">
								<div class="card-header">
									<h3 class="card-title">Detail Transfer Area (IN)</h3>
								</div>
								<div class="card-body">
									<table class="table table-hover table-striped table-bordered tableCursor" style="width:100%" id="tableTransferAreaDetailIn">
										<thead>
											<tr>
												<th>ID</th>
												<th>Tanggal</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th>Size</th>
												<th>No.Box</th>
												<th>Qty</th>
												<th>Barcode</th>
												<th>Lokasi</th>
												<!-- <th></th> -->
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data as $d) : ?>
												<tr>
													<td><?= $d->id_transfer_area; ?></td>
													<td><?= date('d-m-Y', strtotime($d->tgl_in)); ?></td>
													<td><?= $d->po; ?></td>
													<td><?= $d->style; ?></td>
													<td><?= $d->color; ?></td>
													<td><?= $d->orc; ?></td>
													<td><?= $d->size; ?></td>
													<td><?= $d->carton_no; ?></td>
													<td><?= $d->qty_box; ?></td>
													<td><?= $d->barcode; ?></td>
													<td><?= $d->lokasi; ?></td>
													<!-- <td><button id="changeLine" class="btn btn-sm btn-success btnChangeLine"><i class="fa fa-edit"></i>&nbsp;Ubah Line </button></td> -->
												</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
											<tr>
												<th>ID</th>
												<th>Tanggal</th>
												<th>PO</th>
												<th>Style</th>
												<th>Color</th>
												<th>ORC</th>
												<th>Size</th>
												<th>No.Box</th>
												<th>Qty</th>
												<th>Barcode</th>
												<th>Lokasi</th>
												<!-- <th></th> -->
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>

						<div class="modal fade" id="modalEditLinePacking" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Ubah Line Packing</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times</span>
										</button>
									</div>
									<form method="post" id="form-edit-qty">
										<div class="modal-body">
											<div class="form-group row">
												<input type="hidden" id="id">
												<label class="col-md-2 col-form-label">Line Lama: </label>
												<div class="col-md-10">
													<input type="text" id="lineLama" class="form-control" disabled>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 col-form-label">Line Baru: </label>
												<div class="col-md-10">
													<select id="lineBaru" class="form-control" style="width:100%"></select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" id="btnSaveLineBaruPacking" class="btn btn-success"> <i class="fa fa-check"></i> OK</button>
											<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i> Cancel</button>
										</div>
									</form>
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

	<script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/buttonshtml5/js/buttons.html5.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/jszip/js/jszip.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datatables/extensions/buttonprint/js/buttons.print.min.js'); ?>"></script>
	
	<script>
		$(document).ready(function() {
			var selectedRows = null;
			var tableTransferAreaDetailIn = $('#tableTransferAreaDetailIn').DataTable({
				dom: 'B<"toolbar">frtip',
				buttons: [
					'excel', 'print',
					{
						text: 'Select All',
						action: function() {
							tableTransferAreaDetailIn.rows({
								page: 'all'
							}).select();
							getSelectedRows();

						}
					},
					{
						text: 'Select All On Page',
						action: function() {
							tableTransferAreaDetailIn.rows({
								page: 'current'
							}).select();
							getSelectedRows()
						}
					},
					{
						text: 'Deselect All',
						action: function() {
							tableTransferAreaDetailIn.rows({
								page: 'all'
							}).deselect();
							getSelectedRows();
						}
					},
					{
						text: 'Deselect All On Page',
						action: function() {
							tableTransferAreaDetailIn.rows({
								page: 'current'
							}).deselect();
							getSelectedRows();
						}
					},
					{
						text: 'Kembali',
						action: function() {
							open('<?= site_url("TransferArea/transferAreaInput"); ?>', '_self');
						}
					},					
				],
				columnDefs: [{
					targets: [0],
					visible: false
				}],
				select: {
					style: 'multi'
				}
			});

			var tableToolbar = '<div class="form-group row">' +
				'<select id="lineBaru" class="select2 form-control col-4 mx-2" style="width:25%" disabled></select>' +
				'<button id="btnUbahLine" class="btn btn-sm btn-outline-success mx-2" disabled>Ubah Line</button>'
			'</div>';
			$('div.toolbar').html(tableToolbar);

			$('#lineBaru').select2({
				placeholder: 'Pilih line baru disini...'
			});

			var listLokasi = $.ajax({
				type: 'GET',
				url: '<?= site_url("TransferArea/ajax_get_all_lokasi_packing"); ?>',
				dataType: 'json'
			});

			listLokasi.done(function(rst) {
				$('#lineBaru').append($('<option>', {
					value: "",
					text: 'Pilih line baru disini...'
				}));
				$.each(rst, function(i, itm) {
					$('#lineBaru').append($('<option>', {
						value: itm.line,
						text: itm.line
					}));
				})
			});

			$('#tableTransferAreaDetailIn tbody').on('click', 'tr', function() {
				$(this).toggleClass('selected');
				getSelectedRows();
			})

			function getSelectedRows() {
				selectedRows = tableTransferAreaDetailIn.rows('.selected');
				console.log('selectedRows.length: ', selectedRows.data().length);
				$('#lineBaru').prop('disabled', selectedRows.data().length == 0);
			}

			$('#lineBaru').change(function() {
				let lineBaru = $(this).val();
				$('#btnUbahLine').prop('disabled', lineBaru == "");
			});

			$('#btnUbahLine').click(function() {
				Swal.fire({
					title: 'Yakin akan mengubah line?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes'
				}).then((result) => {
					ubahLine();
				})
			});

			function ubahLine() {
				let arrDataForUbahLinePacking = [];
				$.each(selectedRows.data(), function(i, item) {
					arrDataForUbahLinePacking.push({
						'id_transfer_area': item[0],
						'lokasi': $('#lineBaru').val()
					});
				});

				console.log('arrDataForUbahLinePacking: ', arrDataForUbahLinePacking);

				$.ajax({
					type: 'POST',
					url: '<?= site_url("TransferArea/ajax_update_batch_lokasi"); ?>',
					data: {
						'dataForUbahLinePacking': arrDataForUbahLinePacking
					},
					dataType: 'json'
				}).done(function(affRow) {
					if (affRow > 0) {
						Swal.fire({
							type: 'success',
							title: 'Berhasil',
							html: '<h3><strong>Data line berhasil diubah</strong></h3>',
							onAfterClose: () => {
								tableTransferAreaDetailIn.rows({
									selected: true
								}).every(function(rowIdx, tableLoop, rowLoop) {
									tableTransferAreaDetailIn.cell(rowIdx, 10).data($('#lineBaru').val());
								}).draw();
								
								tableTransferAreaDetailIn.rows({
									selected: true
								}).deselect();
								selectedRows = null;
								$('#lineBaru').prop('disabled', true);
								$('#btnUbahLine').prop('disabled', true);
							}
						})
					}
				})

			}


		})
	</script>
</body>

</html>
