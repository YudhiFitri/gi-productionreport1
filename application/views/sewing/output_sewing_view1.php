<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Output Sewing</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<!-- <link href="<//?php echo base_url('plugins/smart_wizard/css/smart_wizard.min.css'); ?>" rel="stylesheet">
	<link href="<//?php echo base_url('plugins/smart_wizard/css/smart_wizard_theme_arrows.min.css'); ?>" rel="stylesheet"> -->
	<style rel="stylesheet">
		td.highlight {
			font-weight: bold;
			color: red;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar_sewing.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_sewing.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Output Sewing </h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">

						<!-- smart wizard modal-->
						<!-- Modal -->
						<!-- <div class="modal fade" id="qtyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header bg-success">
										<h5 class="modal-title">QTY Output Sewing Per Bundle</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="">QTY Pass:</label>
											<input type="number" id="qtyPass" class="form-control">
										</div>
										<div class="form-group">
											<label for="">QTY Repair:</label>
											<input type="number" id="qtyRepair" class="form-control">
										</div>
										<div class="form-group">
											<label for="">QTY Reject:</label>
											<input type="number" id="qtyReject" class="form-control">
										</div>
									</div>
									<div class="modal-footer bg-success">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div> -->

						<!-- </div> -->
						<div class="col-12">
							<div class="card card-info">
								<div class="card-header text-center">
									<h3 class="card-title">Data Output Sewing - Line <?php echo $this->session->userdata['username']; ?></h3>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label>Scan Barcode Here (Untuk Calling Mechanic SCAN BARCODE MESIN TERLEBIH DAHULU):</label>
										<input type="text" id="bundle_barcode" class="form-control" maxlength="25">
									</div>
									<hr>
									<table id="outputTable" class="table table-striped table-bordered" width="100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>ORC Number</th>
												<th>Bundle #</th>
												<!-- <th>Center Panel</th> -->
												<!-- <th>Back Wings</th> -->
												<!-- <th>Cups</th> -->
												<th class="text-center">Size</th>
												<th>Output Date</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>ID</th>
												<th>ORC Number</th>
												<th>Bundle #</th>
												<!-- <th>Center Panel</th> -->
												<!-- <th>Back Wings</th> -->
												<!-- <th>Cups</th> -->
												<th class="text-center">Size</th>
												<th>Output Date</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Action</th>
											</tr>
										</tfoot>
									</table>

								</div>
								<div class="card-footer">
									<!-- <button class="btn btn-success" id="btnCreateMP"><i class="fa fa-male"></i> Add Man Power </button> -->
								</div>
							</div>
						</div>

						<div class="col-12">
							<div class="card card-danger" id="machinesBreakdown">
								<div class="card-header text-center">
									<h3 class="card-title">Machines Breakdown at Line <?php echo $this->session->userdata['username']; ?></h3>
								</div>
								<div class="card-body">
									<table id="machinesBreakdownTable" class="table table-striped" width="100%">
										<thead>
											<tr>
												<th>MACHINE TYPE</th>
												<th>MACHINE SN</th>
												<th>SYMPTON</th>
												<th>STATUS</th>
												<th>DURATION</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>MACHINE TYPE</th>
												<th>MACHINE SN</th>
												<th>SYMPTON</th>
												<th>STATUS</th>
												<th>DURATION</th>
											</tr>
										</tfoot>
									</table>

								</div>
								<div class="card-footer">
									<!-- <button class="btn btn-success" id="btnCreateMP"><i class="fa fa-male"></i> Add Man Power </button> -->
								</div>
							</div>
						</div>

					</div>
				</div><!-- /.container-fluid -->
				<?php $this->load->view('_partials/modal.php'); ?>
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
	<script src="<?php echo base_url('plugins/scanner-detection/jquery.scannerdetection.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/easytimer/easytimer.min.js'); ?>"></script>
	<!-- <script src="<//?php echo base_url('my_js/scanningBarcode.js'); ?>"></script> -->
	<!-- <script src="<//?php echo base_url('dist/js/stopwatch.js'); ?>"></script> -->
	<!-- <script src="<//?php echo base_url('plugins/smart_wizard/js/jquery.smartWizard.min.js'); ?>"></script> -->
	<!-- <script src="<//?php echo base_url('js/barcodeScanning.js'); ?>"></script> -->
	<!-- <script type="module" defer src="<//?php echo base_url('myJS/myControllers/appscanningbarcode.js'); ?>"></script> -->
	<!-- <script src="<//?php echo base_url('myJS/myControllers/appscanningbarcode.js'); ?>"></script> -->

	<script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>


	<script>
		// import AppScanningBarcode from '<?php echo base_url("myJS/myControllers/appscanningbarcode.js"); ?>';

		var table;
		var tableMachinesBreakdown;
		var dataBarang;

		var dataForOutputSewing;
		var qtyPcsMax;
		var idOutputSewing;

		// const regBarcodeBundle = /(cp|bw|cu|as|pa)+_g\d{1}-\d{2}\w{1}\d{3}\w{1}?(-\d{1}|\d{1}\w{1})?-\d{4}/i; //regex untuk barcode Sewing
		const regBarcodeBundle = /(cp|bw|cu|as|pa)+_g\d{1}-/i;
		const regBarcodeMekanik = /MK-\d{6}/; //regex barcode mekanik member
		const regBarcodeMesin = /\d{10}/ //regex barcode mesin
		const regMasalahMesin = /MM-\d{3}/ //regex masalah mesin
		const groupLocation = '<?= $this->session->userdata("group_location"); ?>';

		$(document).ready(function() {
			console.log('groupLocation: ', groupLocation);
			var code = "";
			var codeSplit;
			var userName = "<?php echo $this->session->userdata['username']; ?>";

			$.ajax({
				url: "<?php echo site_url('outputsewing/ajax_list1'); ?>",
				type: "GET",
				dataType: "json"
			}).done(function(dt) {
				console.log('dt: ', dt);
				if (dt == null) {
					$('#modal_man_power').modal({
						backdrop: 'static',
						keyboard: false,
						show: true
					});
					$('#modal_man_power').modal('show');
				} else {
					idOutputSewing = dt.id_output_sewing;
					console.log('idOutputSewing:', idOutputSewing);
				}
			});

			// const Scanning = require('./js/barcodeScanning');

			$('#bundle_barcode').focus();

			$('#qtyOutputSewing').val('1');

			$('#bundle_barcode').blur(function() {
				setTimeout(
					function() {
						$('#bundle_barcode').focus();
					}, 30000
				);
			});

			$('form[id="form-man-power"]').validate({
				rules: {
					// center_panel_op: 'required',
					// back_wings_op: 'required',
					// cups_op: 'required',
					assembly_op: 'required'
				},
				messages: {
					// center_panel_op: 'Center Panel Man Power harus diisi!',
					// back_wings_op: 'Back Wings Man Power harus diisi!',
					// cups_op: 'Cups Man Power harus diisi!',
					assembly_op: 'Assembly Man Power harus diisi!',
				},
				submitHandler: function(form) {
					$.ajax({
						url: '<?php echo site_url("OutputSewing/ajax_save"); ?>',
						type: 'POST',
						data: $(form).serialize(),
						dataType: 'json'
					}).done(function(id) {
						if (id > 0) {
							idOutputSewing = id;
							Swal.fire({
								type: 'info',
								title: 'success',
								text: 'Save data man power success!!',
								showCancelButton: false,
								timer: 500,
								onAfterClose: () => {
									$('#modal_man_power').modal('hide');
								}
							});
							// $('#btnCreateMP').attr('disabled', true);

						}
					});
				}
			});

			$('#modal_man_power').on('hidden.bs.modal', function(e) {
				$('#center_panel_op').val('');
				$('#back_wings_op').val('');
				$('#cups_op').val('');
				$('#assembly_op').val('');

				$('#bundle_barcode').focus();
			});

			table = $('#outputTable').DataTable({
				"autoWidth": true,
				"processing": true,
				"serverSide": true,
				"lengthMenu": [
					[5, 10, 15, 20, 25, 50, 75, 100],
					[5, 10, 15, 20, 25, 50, 75, 100]
				],
				"order": [],
				"ajax": {
					"url": "<?php echo site_url('OutputSewing/ajax_list'); ?>",
					"type": "POST",
					"dataType": "json",
				},
				columnDefs: [{
						targets: [0],
						visible: false
					},
					{
						targets: [3, 5, 6],
						className: 'text-center'
					}
				]
				// "createdRow": function(row, data, dataIndex) {
				// if (data[3] == '00:00:00') {
				// 	$('td', row).eq(3).css('color', 'red');
				// }
				// if (data[4] == '00:00:00') {
				// 	$('td', row).eq(4).css('color', 'red');
				// }
				// if (data[5] == '00:00:00') {
				// 	$('td', row).eq(5).css('color', 'red');
				// }
				// 	if (data[6] == '00:00:00') {
				// 		$('td', row).eq(6).css('color', 'red');
				// 	}
				// }
			});

			$('#machinesBreakdown').hide();

			$.ajax({
				url: "<?php echo site_url('OutputSewing/ajax_list1'); ?>",
				type: "GET",
				dataType: "json"
			}).done(function(dt) {
				if (dt == null) {
					$('#modal_man_power').modal({
						backdrop: 'static',
						keyboard: false,
						show: true
					});
					$('#modal_man_power').modal('show');
				}
			});

			$('#bundle_barcode').keypress(function(e) {
				if (e.keyCode == 13) {
					var kode = $(this).val();
					if (!regBarcodeBundle.test(kode) && !regBarcodeMekanik.test(kode) &&
						!regBarcodeMesin.test(kode) && !regMasalahMesin.test(kode)) {
						Swal.fire({
							type: 'warning',
							title: 'Warning',
							html: `<p><strong>Invalid barcode!!</strong></p>`,
							showConfirmButton: false,
							timer: 1800
						});
						$(this).val('');
						$(this).focus();
					} else {
						if (regBarcodeBundle.test(kode)) {
							var codeUpper = kode.toUpperCase();
							codeSplit = codeUpper.split("_");
							checkCode(codeSplit[1]);
						} else if (regBarcodeMesin.test(kode)) {
							showMekanik(kode);
							// getMachineAtBreakdown(kode);
						}
					}
				}
			})

			function showMekanik(code) {
				localStorage.removeItem('firstBarcode');
				localStorage.setItem('firstBarcode', code);

				window.open('<?php echo site_url("Mekanik"); ?>', '_self');
			}

			function checkCodeMesinOrSympton(code) {
				scanX++;
				if (scanX == 1) {
					if (code.length == 10) {
						// check barcode machine at mekanik_repairing
						getMachineAtRepairing(code);
					} else if (code.length == 6) {
						bolBarSympton = true;
						barcodeSympton = code;
						Swal.fire({
							type: 'info',
							title: 'Barcode masalah mesin sudah di-Scan, silahkan scan barcode mesin',
							showConfirmButton: true,
							timer: 3000
						});
					}
				} else if (scanX == 2) {
					if (code.length == 10) {
						let barcodeSplit2 = code.split("-");
						//jika scan yg kedua adalah barcode spv
						if (barcodeSplit2[0] == "SP") {
							barcodeSpv = code;
							bolSpv = true;
							if (bolBarMesin == false && bolSpv == true) {
								scanX--;
								Swal.fire({
									type: 'warning',
									title: 'Barcode mesin belum di-Scan!!',
									showConfirmButton: false,
									timer: 2500
								});
							}
						} else {
							bolBarMesin = true;
							barcodeMesin = code;
							//jika scan yg kedua adalah barcode mesin
							if (bolBarMesin == true && bolSpv == false && bolBarSympton == false) {
								scanX--;
								Swal.fire({
									type: 'warning',
									title: 'Barcode masalah mesin belum di-Scan!!',
									showConfirmButton: false,
									timer: 2500
								});
							}

						}
						//jika scan yg kedua adalah barcode sympton/keluhan mesin
					} else if (code.length == 6) {
						bolBarSympton = true;
						barcodeSympton = code;
						if (bolBarMesin == false && bolBarSympton == true) {
							scanX--;
							Swal.fire({
								type: 'warning',
								title: 'Barcode mesin belum di-Scan!!',
								showConfirmButton: false,
								timer: 2500
							});
						}
						//jika scan yg kedua adalah barcode mekanik
					} else if (code.length == 9) {
						var codeSplit = code.split("_");
						if (codeSplit[0] == "MK") {
							bolIdMekanik = true;
							$.ajax({
								type: 'GET',
								url: '<?php echo site_url("mekanik/ajax_get_mekanik_by_barcode"); ?>/' + code,
								dataType: 'json',
							}).done(function(ret) {
								if (ret != null) {
									var dataMekanikRepairing = {
										'barcode': barcodeMesin,
										'id_machine_breakdown': dataMachineWaiting.id_machine_breakdown,
										'id_mekanik_member': ret.id_mekanik_member,
									}
									console.log('dataMekanikRepairing: ', dataMekanikRepairing);
									addMekanikRepairing(dataMekanikRepairing);
								}
							})
						}
					} else if (code.length == 2) {
						barcodeDelayed = code;
						bolDelayed = true;
						Swal.fire({
							type: 'info',
							title: 'Barcode waktu penangguhan sudah discan. Silahkan scan barcode ID supervisor.',
							showConfirmButton: false,
							timer: 2500
						});
					}
					if (bolBarMesin == true && bolBarSympton == true) {
						addMachinesBreakdown(barcodeMesin, barcodeSympton);
						scanX = 0;
						bolBarMesin = false;
						bolBarSympton = false;
					}
					if (bolBarMesin == true && bolIdMekanik == true) {
						scanX = 0;
						bolBarMesin = false;
						bolIdMekanik = false;
					}
					if (bolBarMesin == true && bolSpv == true) {
						$.ajax({
							type: 'GET',
							url: '<?php echo site_url("Mekanik/ajax_get_spv_by_barcode"); ?>/' + code,
							dataType: 'json',
						}).done(function(retVal) {
							if (retVal != null) {
								console.log('dataMachineRepairing ', dataMachineRepairing);
								var dataMachineState = {
									'id_mekanik_repairing': dataMachineRepairing.id_mekanik_repairing,
									'id_machine_breakdown': dataMachineRepairing.id_machine_breakdown,
									'id_mekanik_member': dataMachineRepairing.id_mekanik_member,
									'line': dataMachineRepairing.line,
									'spv_name': retVal.name,
									'status': 'settled',
									'barcode_machine': dataMachineRepairing.barcode
								}
								$.ajax({
									type: 'POST',
									url: '<?php echo site_url("Mekanik/ajax_add_machine_settled"); ?>',
									data: {
										'dataMachineState': dataMachineState
									},
									dataType: 'json'
								}).done(function(id) {
									console.log('id: ', id);
									if (id > 0) {
										Swal.fire({
											type: 'success',
											title: 'Data machine settled success added!',
											showConfirmButton: false,
											timer: 2000
										});

										let rowIndex = tableMachinesBreakdown.rows().eq(0).filter(function(rowIdx) {
											return tableMachinesBreakdown.cell(rowIdx, 0).data() == dataMachineRepairing.id_machine_breakdown;
										});

										tableMachinesBreakdown.row(rowIndex).remove().draw();

										$('#bundle_barcode').val('');
										$('#bundle_barcode').focus();

										scanX = 0;
										bolBarMesin = false;
										bolSpv = false;
									}
								});
							}
						});

					}
				} else if (scanX == 3) {
					var codeSplitSpv = code.split("_");
					if (codeSplitSpv[0] == "SP") {
						barcodeSpv = code;
						bolSpv = true;
						if (bolDelayed == true && bolBarMesin == true & bolSpv == true) {
							var dataForSettlement = [];
							$.ajax({
								type: 'GET',
								url: '<?php echo site_url("Mekanik/ajax_get_spv_by_barcode"); ?>/' + barcodeSpv,
								dataType: 'json',
							}).done(function(retVal) {
								console.log('retVal: ', retVal);
								if (retVal != null) {
									dataForSettlement.push({
										"id_machine_breakdown": dataMachineRepairing.id_machine_breakdown,
										"id_mekanik_repairing": dataMachineRepairing.id_mekanik_repairing,
										"spv_name": retVal.name,
										"barcode_settlement": barcodeDelayed
									});
									console.log('dataForSettlement: ', dataForSettlement);

									$.ajax({
										type: 'POST',
										url: '<?php echo site_url("Mekanik/ajax_add_settlement"); ?>',
										data: {
											'dataForSettlement': dataForSettlement
										},
										dataType: 'json'
									}).done(function(insertedId) {
										console.log('insertedId: ', insertedId);
										if (insertedId > 0) {
											Swal.fire({
												type: 'success',
												title: 'Success',
												text: 'Save data settlement success.',
												showConfirmButton: false,
												timer: 1750
											});

										} else {
											Swal.fire({
												type: 'warning',
												title: 'Warning',
												text: 'Save data settlement fail. Something wrong happened',
												showConfirmButton: false,
												timer: 1750
											});
										}
										bolBarMesin = false;
										bolSpv = false;
										bolDelayed = false;
										scanX = 0;

										$('#bundle_barcode').val('');
										$('#bundle_barcode').focus();
									});

								}
							});

						}
					}
				}
				$('#bundle_barcode').val('');
				$('#bundle_barcode').focus();

			}

			function checkCodeSettledOrDelayed(barcode) {

				$('#bundle_barcode').val('');
				$('#bundle_barcode').focus();
			}

			function addMachineSettled(data) {
				var strDataSettledMachine = data;
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("Mekanik/ajax_add_settled_machine"); ?>',
					data: {
						'dataSettledMachine': strDataSettledMachine
					},
					dataType: 'json'
				}).done(function(id) {
					if (id <= 0) {
						Swal.fire({
							type: 'warning',
							title: 'Save data settled machine failed!',
							showConfirmButton: false,
							timer: 1750
						});
					} else {
						Swal.fire({
							type: 'success',
							title: 'Save data settled machine success!',
							showConfirmButton: false,
							timer: 1750
						});
					}
					$('#bundle_barcode').val('');
					$('#bundle_barcode').focus();
				})
			}

			function getMachineAtRepairing(cd) {
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("Mekanik/ajax_get_machine_repairing"); ?>/' + cd,
					dataType: 'json'
				}).done(function(rstMachineRepairing) {
					console.log('rstMachineRepairing: ', rstMachineRepairing);
					if (rstMachineRepairing == null) {
						getMachineAtBreakdown(cd);
					} else {
						dataMachineRepairing = rstMachineRepairing
						bolBarMesin = true;
						barcodeMesin = cd;
						Swal.fire({
							type: 'info',
							title: 'Barcode mesin sudah di-Scan.<br> Silahkan scan barcode ID supervisor atau barcode durasi penangguhan.',
							showConfirmButton: true,
							timer: 5000
						});

					}
				});

				// return $.ajax({
				//     type: 'GET',
				//     url: '<//?php echo site_url("Mekanik/ajax_get_machine_repairing"); ?>/' + cd,
				//     dataType: 'json'
				// });

			}

			function getMachineAtBreakdown(c) {
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url("Mekanik/ajax_check_machine_breakdown_by_barcode"); ?>/' + c,
					dataType: 'json'
				}).done(function(retVal) {
					if (retVal == null) {
						bolBarMesin = true;
						barcodeMesin = c;
						Swal.fire({
							type: 'info',
							title: 'Barcode mesin sudah discan, silahkan scan barcode masalah mesin',
							showConfirmButton: false,
							timer: 2500,
							onAfterClose: () => {
								$('#bundle_barcode').val('');
								$('#bundle_barcode').focus();
							}
						});
					} else {
						dataMachineWaiting = retVal;
						console.log("dataMachineWaiting: ", dataMachineWaiting);
						bolBarMesin = true;
						barcodeMesin = c;
						Swal.fire({
							type: 'info',
							title: 'Barcode mesin sudah di-Scan, silahkan scan barcode ID mekanik Anda!',
							showConfirmButton: true,
							timer: 3000
						});
					}
				})
			}

			function addMekanikRepairing(dataMR) {
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("mekanik/ajax_add_mekanik_repairing"); ?>/',
					data: {
						'dataMekanikRepairing': dataMR
					},
					dataType: 'json'
				}).done(function(val) {
					console.log('val: ', val);
					if (val != null) {
						showMekanikRepairing();
					}
				})
			}

			function showMekanikRepairing() {
				window.open('<?php echo site_url("Mekanik"); ?>', '_self');
			}

			function addMachinesBreakdown(barcodeMesin, barcodeSympton) {
				var dataMachineBreakdown = {
					'codeMesin': barcodeMesin,
					'codeSympton': barcodeSympton
				};

				console.log('dataMachineBreakdown: ', dataMachineBreakdown);

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("Mekanik/ajax_add_machine_breakdown"); ?>',
					data: {
						'dataBarcode': dataMachineBreakdown
					},
					dataType: 'json'
				}).done(function(id) {
					console.log('id: ', id);
					if (id > 0) {
						window.open('<?php echo site_url("Mekanik"); ?>', '_self');
					} else {
						Swal.fire({
							type: 'error',
							title: 'Add data failed!, something wrong happened!!',
							showConfirmButton: true,
						});
					}
				});
			}

			function checkCode(barcode) {
				//cek apakah barcode sudah ada di inputsewing
				var ajaxCheckBarcodeFromInputSewing = $.ajax({
					url: "<?php echo site_url('InputSewing/ajax_check_barcode'); ?>/" + barcode,
					type: "GET",
					dataType: "json"
				});

				ajaxCheckBarcodeFromInputSewing.done(function(dt) {
					if (dt == null) {
						Swal.fire({
							type: 'warning',
							title: 'Warning!',
							text: 'Barcode belum di-SCAN di input sewing!!',
							showConfirmButton: false,
							timer: 2000
						});
						$('#bundle_barcode').val('');
						$('#bundle_barcode').focus();
					} else {
						//cek di output sewing detail
						// checkBarcodeForTheLine(barcode);
						checkBarcodeForTheGroupLine(barcode);

					}
				});
			}

			function checkBarcodeForTheGroupLine(code) {
				var ajaxcheckBarcodeForTheGroupLine = $.ajax({
					type: 'GET',
					url: '<?= site_url("OutputSewing/ajax_get_group_line_by_barcode") ?>/' + code,
					dataType: 'json'
				});

				ajaxcheckBarcodeForTheGroupLine.done(function(data) {
					if (data != null) {
						console.log('data: ', data);
						console.log('groupLocation: ', groupLocation);
						if (data.groupLine != groupLocation) {
							Swal.fire({
								type: 'warning',
								title: 'Warning',
								html: `<p><strong>Barcode ini bukan untuk zona ${groupLocation}</strong></p>`,
								showConfirmButton: false,
								timer: 1750
							});
							$('#bundle_barcode').val('');
							$('#bundle_barcode').focus();
						} else {
							$.ajax({
								type: 'GET',
								url: '<?= site_url("OutputSewing/ajax_get_output_sewing_detail_by_barcode"); ?>/' + code,
								dataType: 'json'
							}).done(function(retData) {
								var totQtyOutputSewingDetail = 0;

								$.each(retData, function(i, item) {
									totQtyOutputSewingDetail += parseInt(item.qty);
								});

								console.log('totQtyOutputSewingDetail: ', totQtyOutputSewingDetail);
								console.log('data.row.qty_pcs: ', data.row.qty_pcs);

								if (totQtyOutputSewingDetail > 0 && totQtyOutputSewingDetail >= parseInt(data.row.qty_pcs)) {
									Swal.fire({
										type: 'warning',
										title: 'Warning',
										html: `<p><strong>Barcode ini sudah di scan!!</strong></p>`,
										showConfirmButton: true,
										// timer: 750,
										onAfterClose: () => {
											$('#modal_edit_qty').modal('hide');
											$('#bundle_barcode').val('');
											$('#bundle_barcode').focus();
										}
									});
								} else if (totQtyOutputSewingDetail > 0 && totQtyOutputSewingDetail < parseInt(data.row.qty_pcs)) {
									qtyMax = parseInt(data.row.qty_pcs) - totQtyOutputSewingDetail;
								} else if (totQtyOutputSewingDetail <= 0) {
									qtyMax = parseInt(data.row.qty_pcs);
								}
								data.row.qtyPcsMax = qtyMax;
								showOutputSewingModal(data.row);
							});
						}
					}
				})
			}

			function checkBarcodeForTheLine(kode) {
				//cek apakah barkode untuk line ini
				var ajaxCheckBarcodeForTheLine = $.ajax({
					url: "<?php echo site_url('OutputSewing/ajax_get_by_barcode'); ?>/" + kode,
					type: "GET",
					dataType: "json",
				});

				ajaxCheckBarcodeForTheLine.done(function(d) {
					console.log('d: ', d);
					if (d != null) {
						if (d.line != userName) {
							Swal.fire({
								type: 'warning',
								title: 'Warning',
								html: `<p><strong>Barcode ini bukan untuk line ${userName}</strong></p>`,
								showConfirmButton: false,
								timer: 1750
							});
							$('#bundle_barcode').val('');
							$('#bundle_barcode').focus();
						} else {
							//cek di output sewing detail
							$.ajax({
								type: 'GET',
								url: '<?= site_url("OutputSewing/ajax_get_output_sewing_detail_by_barcode"); ?>/' + d.kode_barcode,
								dataType: 'json'
							}).done(function(retData) {
								// console.log('retData: ', retData);
								// if (retData != null && parseInt(retData.qty) == parseInt(d.qty_pcs)) {
								// 	Swal.fire({
								// 		type: 'warning',
								// 		title: 'Warning',
								// 		html: `<p><strong>Barcode ini sudah di scan!!</strong></p>`,
								// 		showConfirmButton: false,
								// 		timer: 1750,
								// 		onAfterClose: () => {
								// 			$('#modal_edit_qty').modal('hide');
								// 			$('#bundle_barcode').val('');
								// 			$('#bundle_barcode').focus();
								// 		}
								// 	});
								// } else if (retData != null && parseInt(retData.qty) < parseInt(d.qty_pcs)) {
								// 	qtyPcsMax = parseInt(d.qty_pcs) - parseInt(retData.qty);
								// } else if (retData == null) {
								// 	qtyPcsMax = parseInt(d.qty_pcs);
								// }
								// d.qtyPcsMax = qtyPcsMax;
								// console.log('qtyPcsMax: ',d.qtyPcsMax);
								// console.log('d.qty_pcs: ',d.qty_pcs);
								// showOutputSewingModal(d);

								var totQtyOutputSewingDetail = 0;

								$.each(retData, function(i, item) {
									totQtyOutputSewingDetail += parseInt(item.qty);
								});

								console.log('totQtyOutputSewingDetail: ', totQtyOutputSewingDetail);
								console.log('d.qty_pcs: ', d.qty_pcs);

								if (totQtyOutputSewingDetail > 0 && totQtyOutputSewingDetail >= parseInt(d.qty_pcs)) {
									Swal.fire({
										type: 'warning',
										title: 'Warning',
										html: `<p><strong>Barcode ini sudah di scan!!</strong></p>`,
										showConfirmButton: true,
										// timer: 750,
										onAfterClose: () => {
											$('#modal_edit_qty').modal('hide');
											$('#bundle_barcode').val('');
											$('#bundle_barcode').focus();
										}
									});
								} else if (totQtyOutputSewingDetail > 0 && totQtyOutputSewingDetail < parseInt(d.qty_pcs)) {
									qtyMax = parseInt(d.qty_pcs) - totQtyOutputSewingDetail;
								} else if (totQtyOutputSewingDetail <= 0) {
									qtyMax = parseInt(d.qty_pcs);
								}
								d.qtyPcsMax = qtyMax;
								showOutputSewingModal(d);
							});
						}
					}
				});
			}

			function saveDetail(data) {
				$.ajax({
					url: "<?php echo site_url('OutputSewing/ajax_get_by_barcode1'); ?>/" + codeSplit[1],
					type: 'GET',
					dataType: 'json',
					success: function(r) {
						console.log('data: ', data);
						if (r == null) {
							insertOutputSewing(data);
						} else {
							if (codeSplit[0] == "PA") {
								Swal.fire({
									type: 'warning',
									title: 'Warning!!',
									text: 'Bundel ini sudah di scan!!',
									showCancelButton: false,
									timer: 2000
								});
								$('#bundle_barcode').val('');
								$('#bundle_barcode').focus();
							} else {
								// $('#qtyModal').modal('show');
								updateOutputSewing(data);
							}
						}
					}
				})

			}

			function insertOutputSewing(dtInsert) {
				console.log('dtInsert: ', dtInsert);
				var dateNow = new Date();
				var timeStr = dateNow.getHours() + ":" + dateNow.getMinutes() + ":" + dateNow.getSeconds();
				$.ajax({
					url: "<?php echo site_url('OutputSewing/ajax_get_by_line_date_now1'); ?>",
					type: 'GET',
					dataType: "json"
				}).done(function(dt) {
					if (dt != null) {
						idOutputSewing = dt.id_output_sewing;

						let dataStr = {
							'id_output_sewing': idOutputSewing,
							'orc': dtInsert.orc,
							'no_bundle': dtInsert.no_bundle,
							'center_panel': "00:00:00",
							'back_wings': "00:00:00",
							'cups': "00:00:00",
							'assembly': timeStr,
							'qty': dtInsert.qty_pcs,
							'size': dtInsert.size,
							'center_panel_sam_result': 0.000,
							'back_wings_sam_result': 0.000,
							'cups_sam_result': 0.000,
							'assembly_sam_result': dtInsert.qty_pcs * dtInsert.assembly_sam,
							'kode_barcode': codeSplit[1]
						}
						saveInsertOutputSewing(dataStr);
					}
				});
			}

			function showOutputSewingModal(dtI) {
				$('#modal_edit_qty').modal('show');
				// $('#modal_edit_qty').modal({
				// 	backdrop: 'static',
				// 	keyboard: false,
				// 	show: true
				// });
				console.log('dtI: ', dtI);
				$('#modal_edit_qty').on('shown.bs.modal', function(e) {
					$('#qtyOutputSewing').attr('min', '1');
					$('#qtyOutputSewing').attr('max', dtI.qtyPcsMax);
					$('#qtyOutputSewing').val(dtI.qtyPcsMax);
					$('#qtyOutputSewing').focus();
					dataForOutputSewing = {
						...dtI
					};
					console.log('#qtyOutputSewing.max: ', $('#qtyOutputSewing').attr('max'));
					// console.log('dataForOutputSewing: ', dataForOutputSewing);
				});
			}

			$('#modal_edit_qty').on('hidden.bs.modal', function() {
				$('#qtyOutputSewing').val('1');
				$('#bundle_barcode').val('');
				$('#bundle_barcode').focus();
			});

			$('#btnSaveQtyOutputSewing').click(function(e) {
				e.preventDefault();

				let qtyPcsActual = $('#qtyOutputSewing').val();

				console.log(qtyPcsActual);
				if (qtyPcsActual != "") {
					dataForOutputSewing.qtyPcsActual = qtyPcsActual;
					dataForOutputSewing.id_output_sewing = idOutputSewing;
					dataForOutputSewing.assembly_sam_result = dataForOutputSewing.assembly_sam * dataForOutputSewing.qtyPcsActual;

					console.log('dataForOutputSewing: ', dataForOutputSewing);

					saveInsertOutputSewing(dataForOutputSewing);
				}
			});

			function saveInsertOutputSewing(data) {
				$.ajax({
					type: 'POST',
					url: '<?= site_url("OutputSewing/ajax_save_detail"); ?>',
					data: {
						'dataStr': dataForOutputSewing
					},
					dataType: 'json'
				}).done(function(rowsAffected) {
					// console.log('rowsAffected: ', rowsAffected);
					if (rowsAffected > 0) {
						Swal.fire({
							type: 'success',
							title: 'success',
							text: 'Save data success!!',
							showConfirmButton: false,
							timer: 500,
							onAfterClose: () => {
								reloadTable();
								$('#bundle_barcode').val('');
								$('#bundle_barcode').focus();
								$('#modal_edit_qty').modal('hide');
							}
						});
					} else {
						Swal.fire({
							type: 'warning',
							title: 'Peringatan',
							html: '<h3><b>Save data gagal!! Ulangi SCAN!!</b></h3>',
							showConfirmButton: true,
							onAfterClose: () => {
								$('#bundle_barcode').val('');
								$('#bundle_barcode').focus();
								$('#modal_edit_qty').modal('hide');
							}
						});
					}
				})
			}


			function refreshTable(b) {
				$.ajax({
					url: "<?php echo site_url('OutputSewing/ajax_get_by_barcode2'); ?>/" + b,
					type: "GET",
					dataType: "json"
				}).done(function(row) {
					table.clear();
					table.row.add([
						row.id_output_sewing_detail,
						row.orc,
						row.no_bundle,
						row.center_panel,
						row.back_wings,
						row.cups,
						row.assembly,
						row.qty,
						// '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit Qty" onclick="editQty(' + "'" + row.id_output_sewing_detail + "'" + ')"><i class="fa fa-pencil"></i> Edit Qty</a>'
						'<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete this Bundle" onclick="deleteBundle(' + "'" + row.id_output_sewing_detail + "'" + ')"><i class="fa fa-pencil"></i> Delete</a>'
					]).draw();
				});

				$('#bundle_barcode').val('');
				$('#bundle_barcode').focus();
			}

			$('#qtyOutputSewing').change(function() {
				let maxQty = parseInt($('#qtyOutputSewing').attr('max'));
				let qtyNow = parseInt($('#qtyOutputSewing').val());
				console.log('maxQty: ', maxQty);
				if (qtyNow > maxQty) {
					Swal.fire({
						type: 'warning',
						title: 'Peringatan',
						text: 'Qty terlalu banyak!',
						showCancelButton: false,
						timer: 1750,
						onAfterClose: () => {
							$('#qtyOutputSewing').val(maxQty);
							$(this).focus();
						}
					});
				}

				let qtyVal = $('#qtyOutputSewing').val();
				if (qtyVal == 0 || qtyVal == "") {
					Swal.fire({
						type: 'warning',
						title: 'Peringatan',
						text: 'Qty tidak boleh 0 atau dikosongkan!',
						showCancelButton: false,
						timer: 1750,
						onAfterClose: () => {
							$(this).focus();
						}
					});
				}
			});
		});

		function reloadTable() {
			table.ajax.reload(null, false);
		}

		function deleteBundle(id) {
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
					$.ajax({
						url: '<?php echo site_url("OutputSewing/ajax_delete_bundle"); ?>/' + id,
						dataType: 'json',
					}).done(function(rv) {
						if (rv > 0) {
							swalWithBootstrapButtons.fire(
								'Dihapus!',
								'Data sudah dihapus.',
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
						'Data tidak dihapus :)',
						'error'
					)
				}
			})
		}
	</script>
</body>

</html>
