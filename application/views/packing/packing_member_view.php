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
		table.tableCursor tr:hover {
			cursor: pointer;
		}

		table.dataTable tbody td {
			vertical-align: middle;
		}

		/* .table td,
		.table th {
			vertical-align: middle
		} */

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
						<div class="col-12">
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Data Packing Member</h3>
								</div>
								<div class="card-body">
									<table id="packingMemberTable" class="table table-striped tableCursor" style="width: 100%">
										<thead>
											<tr>
												<!-- <th><input name="select_all" value="1" type="checkbox"></th> -->
												<th>ID</th>
												<th>Foto</th>
												<th>NIK</th>
												<th>Nama Lengkap</th>
												<th>No.HP</th>
												<th>Shift</th>
												<!-- <th>Jns Kelamin</th> -->
												<!-- <th>No.KTP</th> -->
												<!-- <th>Alamat</th> -->
												<!-- <th>Email</th> -->
												<!-- <th>Tgl Lahir</th> -->
												<!-- <th>Zona Kerja</th>	 -->
												<!-- <th>Barcode</th> -->
											</tr>
										</thead>
										<tfoot>
											<tr>
												<!-- <th></th> -->
												<th>ID</th>
												<th>Foto</th>
												<th>NIK</th>
												<th>Nama Lengkap</th>
												<th>No.HP</th>
												<th>Shift</th>
												<!-- <th>Jns Kelamin</th> -->
												<!-- <th>No.KTP</th> -->
												<!-- <th>Alamat</th> -->
												<!-- <th>Email</th> -->
												<!-- <th>Tgl Lahir</th> -->
												<!-- <th>Zona Kerja</th>	 -->
												<!-- <th>Barcode</th> -->
											</tr>
										</tfoot>
									</table>

									<!-- Modal -->
									<div class="modal fade" id="packingMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<h5 class="modal-title">Data Packing Member <span id="mode" class="badge"></span></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form id='frmDataPackingMember' method="POST">
													<div class="modal-body box-profile">
														<!-- <div class="row"> -->
														<!-- <div class="text-center">
															<img src="#" alt="Operator Image" class="img-fluid img-thumbnail mb-4" id="imgOpPacking" height="25%" width="50%">
															<input type="file" accept=".jpg,.png" class="form-control-file text-center">
														</div> -->
														<!-- </div> -->
														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">NIK:</label>
															</div>
															<div class="col-sm-7">
																<input type="hidden" id="id_packing_member" name="id_packing_member">
																<input type="text" id="nik" name="nik" class="form-control form-control-sm">
															</div>
														</div>

														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label class="col-form-label col-form-label-sm">Nama:</label>
															</div>
															<div class="col-sm-7">
																<input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control form-control-sm">
															</div>
														</div>

														<!-- <div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Jenis Kelamin:</label>
															</div>
															<div class="col-sm-3">
																<select name="jnskelamin" id="jnskelamin" class="form-control form-control-sm">
																	<option value="Pria">Pria</option>
																	<option value="Wanita">Wanita</option>
																</select>
															</div>
														</div> -->

														<!-- <div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">No.KTP:</label>
															</div>
															<div class="col-sm-7">
																<input type="text" id="no_ktp" name="no_ktp" class="form-control form-control-sm">
															</div>
														</div> -->

														<!-- <div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Alamat:</label>
															</div>
															<div class="col-sm-7">
																<textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control form-control-sm"></textarea>
															</div>
														</div> -->

														<!-- <div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Email:</label>
															</div>
															<div class="col-sm-7">
																<input type="email" id="email" name="email" class="form-control form-control-sm">
															</div>
														</div> -->

														<!-- <div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Tgl Lahir:</label>
															</div>
															<div class="col-sm-4">
																<input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-sm">
															</div>
														</div> -->

														<!-- <div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Zona Kerja:</label>
															</div>
															<div class="col-sm-4">
																<input type="text" id="zona_kerja" name="zona_kerja" class="form-control form-control-sm">
															</div>
														</div> -->

														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">No.HP:</label>
															</div>
															<div class="col-sm-7">
																<input type="text" id="no_hp" name="no_hp" class="form-control form-control-sm">
															</div>
														</div>

														<div class="form-group row">
															<div class="col-sm-3 text-right">
																<label for="" class="col-form-label col-form-label-sm">Shift:</label>
															</div>
															<div class="col-sm-7">
																<select name="shift" id="shift" class="form-control" width="100%">
																	<option value="1">Pertama</option>
																	<option value="2">Kedua</option>
																</select>
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
			var table;
			var kode;
			var mode;
			var selectedRows = [];

			table = $('#packingMemberTable').DataTable({
				"dom": '<"toolbar">lfrtip',
				"destroy": true,
				"processing": true,
				"ajax": {
					"type": "GET",
					"url": "<?php echo site_url('packing/ajax_get_packing_members_all'); ?>"
				},
				"columns": [{
						"data": "id_packing_member"
					},
					{
						"data": "barcode",
					},
					{
						"data": "nik"
					},
					{
						"data": "nama_lengkap"
					},
					{
						"data": "no_hp"
					},
					{
						"data": "shift"
					},
				],
				"lengthMenu": [
					[5, 10, 15, 20, 25, 75, 100],
					[5, 10, 15, 20, 25, 75, 100]
				],
				"select": {
					"style": "multi"
				},
				"order": [
					[0, 'desc']
				],
				"columnDefs": [{
						"targets": [0],
						"visible": false
					},
					{
						"targets": [1],
						"render": function(data, type, row, meta) {
							let photoUrl = '<?= base_url("img/staf_karyawan"); ?>/' + data + ".jpg";

							var result = checkImgExist(photoUrl);
							if (result === true) {
								return '<img class="profile-user-img img-fluid img-circle" src="' + photoUrl + '">';
							} else {
								return '<img class="profile-user-img img-fluid img-circle" src="<?= base_url('img/noimage.jpg'); ?>">';
							}

						}
					},
					{
						"targets": [5],
						"render": function(data, type, row, meta) {
							return data == 1 ? "Pertama" : "Kedua";
						}
					}
				],
			});

			function checkImgExist(url) {
				var xhr = new XMLHttpRequest();
				xhr.open('HEAD', url, false);
				xhr.send();

				if (xhr.status == "404") {
					return false;
				} else {
					return true;
				}
			}

			// loadPackingMembers();

			// function loadPackingMembers() {
			// 	$.ajax({
			// 		type: 'GET',
			// 		url: '<//?php echo site_url('packing/ajax_get_packing_members_all'); ?>',
			// 		dataType: 'json'
			// 	}).done(function(result) {
			// 		console.log('result: ', result);
			// 		$.each(result, function(i, item) {
			// 			table.row.add([
			// 				item.id_packing_member,
			// 				item.nik,
			// 				item.nama_lengkap,
			// 				item.jnskelamin,
			// 				item.no_ktp,
			// 				item.alamat,
			// 				item.email,
			// 				item.tgl_lahir,
			// 				item.zona_kerja,
			// 				item.barcode
			// 			]).draw()
			// 		});
			// 	});
			// }

			$('#tgl_lahir').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});

			$('#btnSave').prop('disabled', true);
			$('#btnCancel').prop('disabled', true);

			var toolbar = "<div class='form-group row'>" +
				"<div class='btn-group btn-group-sm' role='toolbar'>" +
				// "<a href='<//?php echo site_url("packing/add_packing_member"); ?>' id='btnAddNew' class='btn btn-outline-secondary'><i class='fa fa-plus'></i> Add New</a>" +
				"<button type='button' id='btnAddNewPackingMember' class='btn btn-outline-success mx-1'><i class='fa fa-plus'></i> Add New</button>" +
				"<button type='button' id='btnEditPackingMember' class='btn btn-outline-warning mx-1'><i class='fa fa-pencil'></i> Edit Data</button>" +
				"<button type='button' id='btnDeletePackingMember' class='btn btn-outline-danger mx-1'><i class='fa fa-trash'></i> Delete Data</button>" +
				"<button type='button' id='btnPrintBarcodeAllData' class='btn btn-outline-secondary mx-1'><i class='fa fa-barcode'></i> Print Barcode All</button>" +
				"<button type='button' id='btnPrintBarcodeSelectedData' class='btn btn-outline-secondary mx-1'><i class='fa fa-barcode'></i> Print Barcode Selected Data</button>" +
				"</div>" +
				"</div>";

			$('#packingMemberTable tbody').on('click', 'tr', function() {
				$(this).toggleClass('selected');

				console.log('selectedRows: ', selectedRows);

				let rowsCount = table.rows('.selected').data().length;
				console.log('rowsCount: ', rowsCount);
				if (rowsCount == 0) {
					$('#btnEditPackingMember').prop('disabled', true);
					$('#btnDeletePackingMember').prop('disabled', true);
					$('#btnPrintBarcodeSelectedData').prop('disabled', true);
				} else if (rowsCount == 1) {
					$('#btnEditPackingMember').prop('disabled', false);
					$('#btnDeletePackingMember').prop('disabled', false);
					$('#btnPrintBarcodeSelectedData').prop('disabled', false);
				} else if (rowsCount > 1) {
					$('#btnEditPackingMember').prop('disabled', true);
					$('#btnDeletePackingMember').prop('disabled', true);
					$('#btnPrintBarcodeSelectedData').prop('disabled', false);
				}
			})

			$("div.toolbar").html(toolbar);
			$('#btnEditPackingMember').prop('disabled', true);
			$('#btnDeletePackingMember').prop('disabled', true);

			$('#btnPrintBarcodeSelectedData').prop('disabled', true);

			$('#btnEditPackingMember').click(function() {
				mode = "Edit Data"
				let selRow = table.rows({
					selected: true
				}).data();

				let photo = '<?= base_url("img/staf_karyawan"); ?>/' + selRow[0].nik + ".jpg";

				console.log('selRow: ', selRow);
				$('#id_packing_member').val(selRow[0].id_packing_member);
				$('#nik').val(selRow[0].nik);
				$('#nama_lengkap').val(selRow[0].nama_lengkap);
				$('#no_hp').val(selRow[0].no_hp);
				$('#shift').val(selRow[0].shift);
				// $('#imgOpPacking').attr('src', photo);
				// $('#jnskelamin').val(selRow[0][3]);
				// $('#no_ktp').val(selRow[0][4]);
				// $('#alamat').val(selRow[0][5]);
				// $('#email').val(selRow[0][6]);
				// $('#tgl_lahir').val(selRow[0][7]);
				// $('#zona_kerja').val(selRow[0][8]);

				$('#packingMemberModal').modal('show');
			});

			$('#btnDeletePackingMember').click(function() {
				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
					title: 'Yakin akan menghapus data ini?',
					text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya, hapus sekarang!',
					cancelButtonText: 'Tidak, jangan dihapus!',
					reverseButtons: true
				}).then((result) => {
					console.log('result: ', result);
					if (result.value == true) {
						let selRow = table.rows({
							selected: true
						}).data();
						let id = selRow[0].id_packing_member;
						console.log('id: ', id);
						$.ajax({
							url: '<?php echo site_url("packing/delete_packing_member"); ?>/' + id,
							dataType: 'json'
						}).done(function(rowAff) {
							if (rowAff > 0) {
								// reloadTable();
								table.rows('.selected').remove().draw();
								swalWithBootstrapButtons.fire(
									'Dihapus!',
									'Data berhasil dihapus.',
									'success'
								);
								reloadTable();
							}
						})
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
			})

			$("#frmDataPackingMember").validate({
				rules: {
					nik: 'required',
					nama_lengkap: 'required',
					// jnskelamin: 'required',
					// no_ktp: 'required',
					// alamat: 'required',
					// email: {
					// 	email: true
					// },
					// tgl_lahir: 'required',
					// zona_kerja: 'required'
				},
				messages: {
					nik: 'NIK harus diisi!',
					nama_lengkap: 'Nama harus diisi!',
					// jnskelamin: 'Jenis Kelamin harus diisi!',
					// no_ktp: 'No.KTP harus diisi!',
					// alamat: 'Alamat harus diisi!',
					// email: 'Masukan alamat email yang valid!',
					// tgl_lahir: 'Tgl Lahir harus diisi!',
					// zona_kerja: 'Zona Kerja harus diisi!'
				},
				submitHandler: function(form) {
					let urlString = '';
					if (mode == "Add New") {
						urlString = '<?php echo site_url("Packing/insert_packing_member"); ?>';
					} else {
						urlString = '<?php echo site_url("Packing/edit_packing_member"); ?>'
					}
					$.ajax({
						type: 'POST',
						url: urlString,
						data: $(form).serialize(),
						dataType: 'json'
					}).done(function(dt) {
						console.log('dt: ', dt);
						if (dt > 0) {
							// reloadTable()
							// table.clear().draw();
							// loadPackingMembers();
							Swal.fire({
								type: 'success',
								title: 'Success',
								html: '<h3><strong>Update Data Member Packing Berhasil!</strong></h3>',
								showConfirmButton: false,
								timer: 2000,
								onAfterClose: () => {
									// $('#nik').focus();
									if (mode == "Add New") {
										// table.row.add([
										// 	dt,
										// 	'<img class="profile-user-img img-fluid img-circle" src="<?= base_url('img/noimage.jpg'); ?>">',
										// 	$('#nik').val(),
										// 	$('#nama_lengkap').val(),
										// 	$('#no_hp').val(),
										// 	$('#shift').val(),
										// ]).draw();
										clearForm();
										$('#nik').trigger('focus');
									} else {
										// table.rows({
										// 	selected: true
										// }).every(function(rowIdx, tableLoop, rowLoop) {
										// 	table.cell(rowIdx, 2).data($('#nik').val());
										// 	table.cell(rowIdx, 3).data($('#nama_lengkap').val());
										// 	table.cell(rowIdx, 4).data($('#no_hp').val());
										// 	table.cell(rowIdx, 5).data($('#shift').val());
										// }).draw();
										$('#packingMemberModal').modal('hide');
									}
									reloadTable();
								}
							});
						}
					})
				}
			});

			function clearForm() {
				$('#frmDataPackingMember').find('input, textarea').val('').end();
			}

			$('#btnPrintBarcodeSelectedData').click(function() {
				let selRows = table.rows({
					selected: true
				}).data();

				console.log('selRows: ', selRows);

				// let dataSelectedRows = [];
				let dataId = [];
				// $.each(selRows, function(i, item) {
				// 	dataSelectedRows.push({
				// 		"nik": item[1],
				// 		"nama": item[2],
				// 		"jnskelamin": item[3],
				// 		"email": item[6],
				// 		"barcode": item[8]
				// 	});
				// });
				$.each(selRows, function(i, item) {
					// dataSelectedRows.push(parseInt(item[0]));
					dataId.push(item.id_packing_member);
				});


				// $.ajax({
				// 	type: 'POST',
				// 	url: '<//?php echo site_url("packing/print_selected_packing_member_barcode"); ?>',
				// 	// url: '<//?php echo site_url("packing/ajax_get_packing_members_by_ids"); ?>',
				// 	data: {'dataId': dataId},
				// 	dataType: 'json'
				// }).done(function(response){
				// 	open('<//?php echo site_url("packing/print_packing_members_view1"); ?>/' + response);
				// });

				let dataIdStr = dataId.toString();
				dataIdStr = dataIdStr.replace(/,/g, '-');

				console.log('dataIdStr: ', dataIdStr);

				open('<?php echo site_url("packing/print_selected_packing_member_barcode"); ?>/' + dataIdStr);
			});

			$('#btnAddNewPackingMember').click(function() {
				mode = 'Add New';
				$('#packingMemberModal').modal('show');
			});

			$('#packingMemberModal').on('shown.bs.modal', function(e) {
				if (mode == "Add New") {
					$('#mode').removeClass('badge-danger').addClass('badge-success').text('New Data');
				} else {
					$('#mode').removeClass('badge-success').addClass('badge-danger').text('Edit Data');
				}
				$('#nik').trigger('focus');

			});

			$('#packingMemberModal').on('hidden.bs.modal', function(e) {
				$('#frmDataPackingMember').find('input, textarea').val('').end();
			});

			$('#btnPrintBarcodeAllData').click(function() {
				open('<?php echo site_url("packing/print_all_packing_member_barcode"); ?>');
			})

			function reloadTable() {
				table.ajax.reload(null, false);
			}

		})
	</script>
</body>

</html>
