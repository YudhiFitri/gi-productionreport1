<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar_molding.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_molding.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Inputing Molding Result </h1>
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
							<div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Data Input Molding Result</h3>
									<div class="card-tools">
										<button id="scanBundle_molding" class="btn btn-success" data-toggle="modal" data-target="#modal_show_scan_bundle_for_molding"><i class="fa fa-plus"></i> Scan Bundle Record</button>
									</div>

								</div>
								<div class="card-body">
									<table id="inputMoldingTable" class="table table-striped table-bordered" style="width: 100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>DATE</th>
												<th>ORC</th>
												<th>STYLE</th>
												<th>COLOR</th>
												<th>SIZE</th>
												<th>BUNDLE #</th>
												<th>QTY</th>
												<th>OUTER</th>
												<th>MID</th>
												<th>LINNING</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>ID</th>
												<th>DATE</th>
												<th>ORC</th>
												<th>STYLE</th>
												<th>COLOR</th>
												<th>SIZE</th>
												<th>BUNDLE #</th>
												<th>QTY</th>
												<th>OUTER</th>
												<th>MID</th>
												<th>LINNING</th>
											</tr>
										</tfoot>
									</table>
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
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>


	<script>
		var table;
		var idInputMolding

		$(document).ready(function() {
			table = $('#inputMoldingTable').DataTable({
				"autoWidth": true,
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?php echo site_url('inputmolding/ajax_list'); ?>",
					"type": "POST",
					"dataType": "json",
				},
				"drawCallback": function() {
					$('input[type="radio"].flat-red').iCheck({
						// checkboxClass: 'icheckbox_flat-green',
						radioClass: 'iradio_flat-green'
					});
				}
			});

			// $('#scanBundle_molding').click(function() {
			//     $('#modal_show_scan_bundle_for_molding').modal('show');
			// });

			$('#modal_show_scan_bundle_for_molding').on('shown.bs.modal', function() {
				$('#barcode_input_molding').trigger('focus');
			})

			$('#barcode_input_molding').keypress(function(e) {
				if (e.keyCode == 13) {

					e.preventDefault();

					var brcode = $(this).val();
					console.log('brcode: ', brcode);

					// var codeUpper = brcode.toUpperCase();

					// var prfx = brcode.charAt(0);
					// var prfx = codeUpper.charAt(0);
					// console.log('prfx: ', prfx);

					// switch (prfx) {
					// 	case "O":
					// 		saveBarcodeOuter(codeUpper)
					// 		break;
					// 	case "M":
					// 		check_barcode_mid(codeUpper);
					// 		break;
					// 	case "L":
					// 		check_barcode_linning(codeUpper);
					// 		break;
					// }
					saveData(brcode);
				}
			});

			function saveData(code){
				$.ajax({
					url: '<?php echo site_url("inputmolding/ajax_save_data"); ?>/' + code,
					type: 'POST',
					dataType: 'json',
					success: function(dt){
						console.log('dt: ', dt);
						Swal.fire({
							type: (dt.success == true ? 'success' : 'warning'),
							title: (dt.success == true ? 'Berhasil' : 'Peringatan'),
							text: dt.msg,
							showConfirmButton: false,
							timer: 1750
						});
						if(dt.success == true){
							reload_table();
						}
						$('#barcode_input_molding').val('');
						$('#barcode_input_molding').focus();
					}
				})
			}

		// 	function check_barcode_outer(code) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_check_outermold_at_detail_cutting'); ?>/" + code,
		// 			type: 'GET',
		// 			dataType: 'json',
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(retVal) {
		// 			console.log('retVal: ', retVal);
		// 			if (retVal == 0) {

		// 				Swal.fire({
		// 					type: 'warning',
		// 					title: 'Warning!',
		// 					text: 'This BARCODE not found!',
		// 					showConfirmButton: false,
		// 					timer: 1750
		// 				});
		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 			} else {
		// 				check_barcode_outer1(code);
		// 			}
		// 		});
		// 	}

		// 	function check_barcode_outer1(c) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_check_outermold_barcode'); ?>/" + c,
		// 			type: "GET",
		// 			dataType: "json",
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(dt) {
		// 			if (dt == 0) {
		// 				Swal.fire({
		// 					type: "warning",
		// 					title: "Warning",
		// 					text: "This barcode already scanned!",
		// 					showConfirmButton: false,
		// 					timer: 1750
		// 				});
		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 			} else {
		// 				// save_input_molding(dt);
		// 				checkOrc(dt);
		// 			}
		// 		})
		// 	}

		// 	function check_barcode_mid(code) {
		// 		console.log('code: ', code);
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_check_midmold_at_detail_cutting'); ?>/" + code,
		// 			type: 'GET',
		// 			dataType: 'json',
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(retVal) {

		// 			if (retVal == 0) {
		// 				console.log('retVal: ', retVal);
		// 				Swal.fire({
		// 					type: 'warning',
		// 					title: 'Warning!',
		// 					text: 'This BARCODE not found!',
		// 					showConfirmButton: false,
		// 					timer: 1750
		// 				});
		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 			} else {
		// 				check_barcode_mid1(code);
		// 			}
		// 		});
		// 	}

		// 	function check_barcode_mid1(c) {
		// 		console.log('c :', c);
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_check_midmold_barcode'); ?>/" + c,
		// 			type: "GET",
		// 			dataType: "json",
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(dt) {
		// 			if (dt == 0) {
		// 				Swal.fire({
		// 					type: "warning",
		// 					title: "Warning",
		// 					text: "This barcode already scanned!",
		// 					showConfirmButton: false,
		// 					timer: 1750
		// 				});
		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 			} else {
		// 				// save_input_molding(dt);
		// 				checkOrc(dt);
		// 			}
		// 		})
		// 	}

		// 	function check_barcode_linning(code) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_check_linningmold_at_detail_cutting'); ?>/" + code,
		// 			type: 'GET',
		// 			dataType: 'json',
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(retVal) {
		// 			if (retVal == 0) {
		// 				Swal.fire({
		// 					type: 'warning',
		// 					title: 'Warning!',
		// 					text: 'This BARCODE not found!',
		// 					showConfirmButton: false,
		// 					timer: 1750
		// 				});
		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 			} else {
		// 				check_barcode_linning1(code);
		// 			}
		// 		});
		// 	}

		// 	function check_barcode_linning1(c) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_check_linningmold_barcode'); ?>/" + c,
		// 			type: "GET",
		// 			dataType: "json",
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(dt) {
		// 			console.log('dt: ', dt);
		// 			if (dt == 0) {
		// 				Swal.fire({
		// 					type: "warning",
		// 					title: "Warning",
		// 					text: "This barcode already scanned!",
		// 					showConfirmButton: false,
		// 					timer: 1750
		// 				});
		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 			} else {
		// 				// save_input_molding(dt);
		// 				checkOrc(dt);
		// 			}
		// 		})
		// 	}

		// 	function checkOrc(data) {
		// 		var dt = {
		// 			'orc': data.orc,
		// 			'no_bundle': data.no_bundle
		// 		};

		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_cek_by_orc_nobundle'); ?>",
		// 			type: "POST",
		// 			data: {
		// 				'dataStr': dt
		// 			},
		// 			dataType: "json",
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(retVal) {
		// 			console.log('last query :', retVal);
		// 			if (retVal == 0) {
		// 				save_input_molding(data);
		// 			} else {
		// 				update_detail_input_molding(data);
		// 			}
		// 		})
		// 	}

		// 	function save_input_molding(data) {

		// 		var dataStr = {
		// 			'orc': data.orc,
		// 			'style': data.style,
		// 			'color': data.color,
		// 		};

		// 		$.ajax({
		// 			url: '<//?php echo site_url("inputmolding/ajax_save"); ?>',
		// 			data: {
		// 				'dataStr': dataStr
		// 			},
		// 			method: 'post',
		// 			dataType: 'json',
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(id_inserted) {
		// 			if (id_inserted > 0) {
		// 				var brcode = $('#barcode_input_molding').val()
		// 				saveDetail(data, brcode, id_inserted);
		// 			}
		// 		})
		// 	}

		// 	function update_detail_input_molding(dt) {
		// 		var dataStr = {
		// 			'orc': dt.orc,
		// 			'no_bundle': dt.no_bundle
		// 		};
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_get_by_orc_nobundle'); ?>",
		// 			type: "POST",
		// 			data: {
		// 				"dataStr": dataStr
		// 			},
		// 			dataType: "json",
		// 			timeout: 1000,
		// 			error: function(request, status, err) {
		// 				if (status == "timeout") {
		// 					$.ajax(this);
		// 				}
		// 			}
		// 		}).done(function(d) {
		// 			if (d != null) {
		// 				var kode = $('#barcode_input_molding').val();
		// 				updateDetail(d, kode);
		// 			}
		// 		});

		// 	}

		// 	function updateDetail(d, kode) {
		// 		var prfx = kode.charAt(0);

		// 		switch (prfx) {
		// 			case "O":
		// 				updateOuterMold(d, kode);
		// 				break;
		// 			case "M":
		// 				updateMidMold(d, kode);
		// 				break;
		// 			case "L":
		// 				updateLinningMold(d, kode);
		// 				break;
		// 		}
		// 	}

		// 	function updateOuterMold(data, code) {
		// 		var color = data.color;
		// 		var groupSize;

		// 		if (color.includes("BLACK") == true) {
		// 			colorGroup = "Black";
		// 		} else if (color.includes("WHITE") == true) {
		// 			colorGroup = "White";
		// 		} else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
		// 			colorGroup = "color"
		// 		}

		// 		var style = data.style;

		// 		var ajaxGetGroupSize;

		// 		var dataForOuterMoldSAM;

		// 		var ajaxGetOuterMoldSAM;

		// 		var outerMoldSAM;

		// 		ajaxGetGroupSize = $.ajax({
		// 				url: '<//?php echo site_url('inputmolding/ajax_get_by_size'); ?>',
		// 				type: 'POST',
		// 				data: {
		// 					'dataSize': data.size
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}

		// 			}),
		// 			ajaxGetOuterMoldSAM = ajaxGetGroupSize.then(function(dt) {
		// 				groupSize = dt.group;

		// 				dataForOuterMoldSAM = {
		// 					'style': style,
		// 					'color': colorGroup,
		// 					'grup_size': groupSize
		// 				};
		// 				return $.ajax({
		// 					url: '<//?php echo site_url("inputmolding/ajax_get_outermold_sam"); ?>',
		// 					type: 'POST',
		// 					data: {
		// 						'dataForOuterMoldSAM': dataForOuterMoldSAM
		// 					},
		// 					dataType: 'json',
		// 					timeout: 1000,
		// 					error: function(request, status, err) {
		// 						if (status == "timeout") {
		// 							$.ajax(this);
		// 						}
		// 					}
		// 				});

		// 			});

		// 		ajaxGetOuterMoldSAM.done(function(d) {
		// 			// outerMoldSAM = d.outer_sam;
		// 			outerMoldSAM = d.total_mold_sam;
		// 			var dataOuterMold = {
		// 				'id_input_molding': data.id_input_molding,
		// 				'no_bundle': data.no_bundle,
		// 				'size': data.size,
		// 				'group_size': groupSize,
		// 				'qty_pcs': data.qty_pcs,
		// 				'outermold_sam': outerMoldSAM,
		// 				'outermold_barcode': code
		// 			}
		// 			// insertOuterMold(dataOuterMold);
		// 			$.ajax({
		// 				url: "<//?php echo site_url('inputmolding/ajax_update_outer_mold'); ?>",
		// 				type: "POST",
		// 				data: {
		// 					'dataOuterMold': dataOuterMold
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}).done(function(dt) {
		// 				if (dt > 0) {
		// 					Swal.fire({
		// 						type: 'info',
		// 						title: 'Update Data Molding Success!!',
		// 						showConfirmButton: false,
		// 						timer: 1500
		// 					});

		// 					$('#barcode_input_molding').val('');
		// 					$('#barcode_input_molding').focus();
		// 					reload_table();
		// 				}
		// 			})
		// 		});
		// 	}

		// 	function updateMidMold(data, code) {
		// 		var color = data.color;
		// 		var groupSize;

		// 		if (color.includes("BLACK") == true) {
		// 			colorGroup = "Black";
		// 		} else if (color.includes("WHITE") == true) {
		// 			colorGroup = "White";
		// 		} else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
		// 			colorGroup = "color"
		// 		}

		// 		var style = data.style;

		// 		var ajaxGetGroupSize;

		// 		var dataForMidMoldSAM;

		// 		var ajaxGetMidMoldSAM;

		// 		var midMoldSAM;

		// 		ajaxGetGroupSize = $.ajax({
		// 				url: '<//?php echo site_url('inputmolding/ajax_get_by_size'); ?>',
		// 				type: 'POST',
		// 				data: {
		// 					'dataSize': data.size
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}),
		// 			ajaxGetMidMoldSAM = ajaxGetGroupSize.then(function(dt) {
		// 				groupSize = dt.group;

		// 				dataForMidMoldSAM = {
		// 					'style': style,
		// 					'color': colorGroup,
		// 					'grup_size': groupSize
		// 				};

		// 				return $.ajax({
		// 					url: '<//?php echo site_url("inputmolding/ajax_get_midmold_sam"); ?>',
		// 					type: 'POST',
		// 					data: {
		// 						'dataForMidMoldSAM': dataForMidMoldSAM
		// 					},
		// 					dataType: 'json',
		// 					timeout: 1000,
		// 					error: function(request, status, err) {
		// 						if (status == "timeout") {
		// 							$.ajax(this);
		// 						}
		// 					}
		// 				});

		// 			});

		// 		ajaxGetMidMoldSAM.done(function(d) {
		// 			midMoldSAM = d.mid_sam;
		// 			console.log('data.id_input_molding :', data.id_input_molding);
		// 			var dataMidMold = {
		// 				'id_input_molding': data.id_input_molding,
		// 				'no_bundle': data.no_bundle,
		// 				'size': data.size,
		// 				'group_size': groupSize,
		// 				'qty_pcs': data.qty_pcs,
		// 				'mildmold_sam': midMoldSAM,
		// 				'midmold_barcode': code
		// 			}
		// 			// insertOuterMold(dataOuterMold);
		// 			$.ajax({
		// 				url: "<//?php echo site_url('inputmolding/ajax_update_mid_mold'); ?>",
		// 				type: "POST",
		// 				data: {
		// 					'dataMidMold': dataMidMold
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}).done(function(dt) {
		// 				if (dt > 0) {
		// 					Swal.fire({
		// 						type: 'info',
		// 						title: 'Update Data Molding Success!!',
		// 						showConfirmButton: false,
		// 						timer: 1500
		// 					});

		// 					$('#barcode_input_molding').val('');
		// 					$('#barcode_input_molding').focus();
		// 					reload_table();
		// 				}
		// 			})
		// 		});
		// 	}

		// 	function updateLinningMold(data, code) {
		// 		var color = data.color;
		// 		var groupSize;

		// 		if (color.includes("BLACK") == true) {
		// 			colorGroup = "Black";
		// 		} else if (color.includes("WHITE") == true) {
		// 			colorGroup = "White";
		// 		} else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
		// 			colorGroup = "color"
		// 		}

		// 		var style = data.style;

		// 		var ajaxGetGroupSize;

		// 		var dataForLinningMoldSAM;

		// 		var ajaxGetLinningMoldSAM;

		// 		var linningMoldSAM;

		// 		ajaxGetGroupSize = $.ajax({
		// 				url: '<//?php echo site_url('inputmolding/ajax_get_by_size'); ?>',
		// 				type: 'POST',
		// 				data: {
		// 					'dataSize': data.size
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}),
		// 			ajaxGetLinningMoldSAM = ajaxGetGroupSize.then(function(dt) {
		// 				groupSize = dt.group;

		// 				dataForLinningMoldSAM = {
		// 					'style': style,
		// 					'color': colorGroup,
		// 					'grup_size': groupSize
		// 				};


		// 				return $.ajax({
		// 					url: '<//?php echo site_url("inputmolding/ajax_get_linningmold_sam"); ?>',
		// 					type: 'POST',
		// 					data: {
		// 						'dataForLinningMoldSAM': dataForLinningMoldSAM
		// 					},
		// 					dataType: 'json',
		// 					timeout: 1000,
		// 					error: function(request, status, err) {
		// 						if (status == "timeout") {
		// 							$.ajax(this);
		// 						}
		// 					}
		// 				});

		// 			});

		// 		ajaxGetLinningMoldSAM.done(function(d) {
		// 			linningMoldSAM = d.linning_sam;
		// 			var dataLinningMold = {
		// 				'id_input_molding': data.id_input_molding,
		// 				'no_bundle': data.no_bundle,
		// 				'size': data.size,
		// 				'group_size': groupSize,
		// 				'qty_pcs': data.qty_pcs,
		// 				'mildmold_sam': linningMoldSAM,
		// 				'linningmold_barcode': code
		// 			}
		// 			// insertOuterMold(dataOuterMold);
		// 			$.ajax({
		// 				url: "<//?php echo site_url('inputmolding/ajax_update_linning_mold'); ?>",
		// 				type: "POST",
		// 				data: {
		// 					'dataLinningMold': dataLinningMold
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}).done(function(dt) {
		// 				if (dt > 0) {
		// 					Swal.fire({
		// 						type: 'info',
		// 						title: 'Update Data Molding Success!!',
		// 						showConfirmButton: false,
		// 						timer: 1500
		// 					});

		// 					$('#barcode_input_molding').val('');
		// 					$('#barcode_input_molding').focus();
		// 					reload_table();
		// 				}
		// 			})
		// 		});
		// 	}

		// 	function saveDetail(dt, b, idInputMolding) {
		// 		var preffix = b.charAt(0);

		// 		switch (preffix) {
		// 			case "O":
		// 				saveOuterMold(dt, b, idInputMolding);
		// 				break;
		// 			case "M":
		// 				saveMidMold(dt, b, idInputMolding);
		// 				break;
		// 			case "L":
		// 				saveLinningMold(dt, b, idInputMolding);
		// 				break;
		// 		}
		// 	}

		// 	function saveOuterMold(data, bar, id) {
		// 		var color = data.color;
		// 		var groupSize;

		// 		if (color.includes("BLACK") == true) {
		// 			colorGroup = "Black";
		// 		} else if (color.includes("WHITE") == true) {
		// 			colorGroup = "White";
		// 		} else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
		// 			colorGroup = "color"
		// 		}

		// 		var style = data.style;

		// 		var ajaxGetGroupSize;

		// 		var dataForOuterMoldSAM;

		// 		var ajaxGetOuterMoldSAM;

		// 		var outerMoldSAM;

		// 		ajaxGetGroupSize = $.ajax({
		// 				url: '<//?php echo site_url('inputmolding/ajax_get_by_size'); ?>',
		// 				type: 'POST',
		// 				data: {
		// 					'dataSize': data.size
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}),
		// 			ajaxGetOuterMoldSAM = ajaxGetGroupSize.then(function(dt) {
		// 				groupSize = dt.group;

		// 				dataForOuterMoldSAM = {
		// 					'style': style,
		// 					'color': colorGroup,
		// 					'grup_size': groupSize
		// 				};
		// 				console.log('dataForOuterMoldSAM: ', dataForOuterMoldSAM);
		// 				return $.ajax({
		// 					url: '<//?php echo site_url("inputmolding/ajax_get_outermold_sam"); ?>',
		// 					type: 'POST',
		// 					data: {
		// 						'dataForOuterMoldSAM': dataForOuterMoldSAM
		// 					},
		// 					dataType: 'json',
		// 					timeout: 1000,
		// 					error: function(request, status, err) {
		// 						if (status == "timeout") {
		// 							$.ajax(this);
		// 						}
		// 					}
		// 				});

		// 			});

		// 		ajaxGetOuterMoldSAM.done(function(d) {
		// 			outerMoldSAM = d.outer_sam;
		// 			var dataOuterMold = {
		// 				'id_input_molding': id,
		// 				'no_bundle': data.no_bundle,
		// 				'size': data.size,
		// 				'group_size': groupSize,
		// 				'qty_pcs': data.qty_pcs,
		// 				'outermold_sam': outerMoldSAM,
		// 				'outermold_barcode': bar
		// 			}
		// 			insertOuterMold(dataOuterMold);
		// 		});
		// 	}

		// 	function saveMidMold(data, bar, id) {
		// 		var color = data.color;
		// 		var groupSize;

		// 		if (color.includes("BLACK") == true) {
		// 			colorGroup = "Black";
		// 		} else if (color.includes("WHITE") == true) {
		// 			colorGroup = "White";
		// 		} else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
		// 			colorGroup = "color"
		// 		}

		// 		var style = data.style;

		// 		var ajaxGetGroupSize;

		// 		var dataForMidMoldSAM;

		// 		var ajaxGetMidMoldSAM;

		// 		var midMoldSAM;

		// 		ajaxGetGroupSize = $.ajax({
		// 				url: '<//?php echo site_url('inputmolding/ajax_get_by_size'); ?>',
		// 				type: 'POST',
		// 				data: {
		// 					'dataSize': data.size
		// 				},
		// 				dataType: 'json',
		// 				timeout: 1000,
		// 				error: function(request, status, err) {
		// 					if (status == "timeout") {
		// 						$.ajax(this);
		// 					}
		// 				}
		// 			}),
		// 			ajaxGetMidMoldSAM = ajaxGetGroupSize.then(function(dt) {
		// 				groupSize = dt.group;

		// 				dataForMidMoldSAM = {
		// 					'style': style,
		// 					'color': colorGroup,
		// 					'grup_size': groupSize
		// 				};
		// 				console.log('dataForMidMoldSAM: ', dataForMidMoldSAM);
		// 				// console.log('dataForCuttingSAM: ', dataForCuttingSAM);
		// 				return $.ajax({
		// 					url: '<//?php echo site_url("inputmolding/ajax_get_midmold_sam"); ?>',
		// 					type: 'POST',
		// 					data: {
		// 						'dataForMidMoldSAM': dataForMidMoldSAM
		// 					},
		// 					dataType: 'json'
		// 				});

		// 			});

		// 		ajaxGetMidMoldSAM.done(function(d) {
		// 			midMoldSAM = d.mid_sam;
		// 			var dataMidMold = {
		// 				'id_input_molding': id,
		// 				'no_bundle': data.no_bundle,
		// 				'size': data.size,
		// 				'group_size': groupSize,
		// 				'qty_pcs': data.qty_pcs,
		// 				'midmold_sam': midMoldSAM,
		// 				'midmold_barcode': bar
		// 			}
		// 			// console.log('dataCuttingDetail: ', dataCuttingDetail);
		// 			insertMidMold(dataMidMold);
		// 		});
		// 	}

		// 	function saveLinningMold(data, bar, id) {
		// 		var color = data.color;
		// 		var groupSize;

		// 		if (color.includes("BLACK") == true) {
		// 			colorGroup = "Black";
		// 		} else if (color.includes("WHITE") == true) {
		// 			colorGroup = "White";
		// 		} else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
		// 			colorGroup = "color"
		// 		}

		// 		var style = data.style;

		// 		var ajaxGetGroupSize;

		// 		var dataForLinningMoldSAM;

		// 		var ajaxGetLinningMoldSAM;

		// 		var linningMoldSAM;

		// 		ajaxGetGroupSize = $.ajax({
		// 				url: '<//?php echo site_url('inputmolding/ajax_get_by_size'); ?>',
		// 				type: 'POST',
		// 				data: {
		// 					'dataSize': data.size
		// 				},
		// 				dataType: 'json'
		// 			}),
		// 			ajaxGetLinningMoldSAM = ajaxGetGroupSize.then(function(dt) {
		// 				groupSize = dt.group;

		// 				dataForLinningMoldSAM = {
		// 					'style': style,
		// 					'color': colorGroup,
		// 					'grup_size': groupSize
		// 				};
		// 				// console.log('dataForCuttingSAM: ', dataForCuttingSAM);
		// 				return $.ajax({
		// 					url: '<//?php echo site_url("inputmolding/ajax_get_Linningmold_sam"); ?>',
		// 					type: 'POST',
		// 					data: {
		// 						'dataForLinningMoldSAM': dataForLinningMoldSAM
		// 					},
		// 					dataType: 'json'
		// 				});

		// 			});

		// 		ajaxGetLinningMoldSAM.done(function(d) {
		// 			linningMoldSAM = d.linning_sam;
		// 			var dataLinningMold = {
		// 				'id_input_molding': id,
		// 				'no_bundle': data.no_bundle,
		// 				'size': data.size,
		// 				'group_size': groupSize,
		// 				'qty_pcs': data.qty_pcs,
		// 				'linningmold_sam': linningMoldSAM,
		// 				'linningmold_barcode': bar
		// 			}
		// 			// console.log('dataCuttingDetail: ', dataCuttingDetail);
		// 			insertLinningMold(dataLinningMold);
		// 		});
		// 	}

		// 	function insertOuterMold(data) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_save_outer_mold'); ?>",
		// 			type: "POST",
		// 			data: {
		// 				'dataOuterMold': data
		// 			},
		// 			dataType: 'json',
		// 		}).done(function(dt) {
		// 			if (dt > 0) {
		// 				Swal.fire({
		// 					type: 'info',
		// 					title: 'Save Data Success!!',
		// 					showConfirmButton: false,
		// 					timer: 1500
		// 				});

		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 				reload_table();
		// 			}
		// 		})
		// 	}

		// 	function insertMidMold(data) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_save_mid_mold'); ?>",
		// 			type: "POST",
		// 			data: {
		// 				'dataMidMold': data
		// 			},
		// 			dataType: 'json',
		// 		}).done(function(dt) {
		// 			if (dt > 0) {
		// 				Swal.fire({
		// 					type: 'info',
		// 					title: 'Save Data Success!!',
		// 					showConfirmButton: false,
		// 					timer: 1500
		// 				});

		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 				reload_table();
		// 			}
		// 		})
		// 	}

		// 	function insertLinningMold(data) {
		// 		$.ajax({
		// 			url: "<//?php echo site_url('inputmolding/ajax_save_linning_mold'); ?>",
		// 			type: "POST",
		// 			data: {
		// 				'dataLinningMold': data
		// 			},
		// 			dataType: 'json',
		// 		}).done(function(dt) {
		// 			if (dt > 0) {
		// 				Swal.fire({
		// 					type: 'info',
		// 					title: 'Save Data Success!!',
		// 					showConfirmButton: false,
		// 					timer: 1500
		// 				});

		// 				$('#barcode_input_molding').val('');
		// 				$('#barcode_input_molding').focus();
		// 				reload_table();
		// 			}
		// 		})
		// 	}

			function reload_table() {
				table.ajax.reload(null, false);
			}

		});

		function handleClick(cb) {
			console.log('cb: ', cb.checked);
		}
	</script>
</body>

</html>