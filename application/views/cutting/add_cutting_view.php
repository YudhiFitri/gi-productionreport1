<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Production Report | Admin Cutting</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $this->load->view('_partials/css.php'); ?>
	<link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar_cutting.php'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_cutting.php'); ?>

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
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Cutting</h3>
									<div class="card-tools">
										<a href="<?php echo site_url('cutting'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
									</div>
								</div>
								<div class="card-body">

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>ORC:</label>
												<select id="orc" name="orc" class="form-control select2">
													<option value=""></option>
													<!-- <option value="0">Please select a ORC</option> -->
												</select>
											</div>
											<div class="form-group">
												<label>STYLE:</label>
												<input type="text" id="style" name="style" class="form-control" disabled>
											</div>
											<div class="form-group">
												<label>COLOR:</label>
												<input type="text" id="color" name="color" class="form-control" disabled>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>BUYER:</label>
												<input type="text" id="buyer" name="buyer" class="form-control" disabled>
											</div>
											<div class="form-group">
												<label>COMM:</label>
												<!-- <input type="number" id="comm" name="comm" class="form-control" max="4" min="1"> -->
												<input type="text" id="comm" name="comm" class="form-control" maxlength="5">
											</div>
											<div class="form-group">
												<label>SO:</label>
												<input type="text" id="so" name="so" class="form-control">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>QUANTITY(PCS):</label>
												<input type="number" id="qty" name="qty" class="form-control" disabled>
											</div>

											<div class="form-group">
												<label>BUNDLES QTY(BOX):</label>
												<input type="number" id="boxes" name="boxes" class="form-control" disabled>
											</div>

											<div class="form-group">
												<label>PREPARE ON:</label>
												<input type="text" id="prepare_on" name="prepare_on" class="form-control theDate">
											</div>

										</div>
									</div>
									<button type="button" id="btnAddBundle" class="btn btn-success"><i class="fa fa-plus"></i> Add Bundle</button>
									<hr />
									<!-- <div class="row"> -->
									<table id="bundlingTable" class="table table-border table-striped">
										<thead>
											<th>Size</th>
											<th>QTY</th>
											<th>PCS EACH BUNDLE</th>
											<th>NO BUNDLE</th>
											<th class="th-barcode">KODE BARCODE</th>
										</thead>
										<tfoot>
											<th>Size</th>
											<th>QTY</th>
											<th>PCS EACH BUNDLE</th>
											<th>NO BUNDLE</th>
											<th class="th-barcode">KODE BARCODE</th>
										</tfoot>
									</table>
									<!-- </div> -->
								</div>
								<div class="card-footer">

									<!-- <button type="button" id="btnSaveBundle" class="btn btn-warning"><i class="fa fa-upload"></i> Save Bundle</button> -->
									<!-- <button type="button" id="btnPrintBarcode" class="btn btn-info"><i class="fa fa-print"></i> Print Barcode For Sewing</button> -->
									<!-- <button type="button" id="btnPrintBarcodeMolding" class="btn btn-info"><i class="fa fa-print"></i> Print Barcode For Molding</button> -->

									<!-- <button type="button" id="btnResetBundling" class="btn btn-default"><i class="fa fa-recycle"></i> Reset Bundling</button> -->
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
	<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
	<!-- <script src="<?php echo base_url('plugins/jquery-barcode/jquery-barcode.min.js'); ?>"></script> -->
	<!-- <script src="<?php echo base_url('plugins/JSBarcode/JsBarcode.all.min.js'); ?>"></script> -->

	<script>
		var idleTime = 0;
		var totalQtyModal = 0;
		var colorGroup;
		// const kompensasiQty = 0.03;

		// $(document).ready(function() {
		var idCutting;
		var dateNow = new Date();
		var orc = "";
		var qty;
		var qtyModal = 0;
		var sisaQty;
		var idx = 0;
		var boxCount = 0;
		var dataTable;
		var outerMoldChecked;
		var midMoldChecked;
		var linningMoldChecked;
		var pantyChecked;
		var noMoldChecked;
		var bundlingTable;

		var style;
		var color;
		var colorGroup;
		var size;
		var sizeGroup;

		var colorIncludes;

		var cuttingSam;

		// window.onload = (event) => {
		$(".select2").select2({
			placeholder: "Please select an ORC"
		});

		// $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		//   checkboxClass: 'icheckbox_flat-green',
		//   radioClass: 'iradio_flat-green'
		// });

		bundlingTable = $('#bundlingTable').DataTable();
		console.log("bundlingTable.rows.data :", bundlingTable.rows().data().length);
		// $('#btnSaveBundle').attr('disabled', true);
		// $('#btnPrintBarcode').attr('disabled', true);
		// $('#btnPrintBarcodeMolding').attr('disabled', true);

		$('.theDate').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			language: "id",
			autoclose: true,
			todayHighlight: true
		});

		loadOrc();

		function loadOrc() {
			$('#orc').empty();
			$.ajax({
				url: '<?php echo site_url("cutting/ajax_get_order_not_to_cutting"); ?>',
				type: 'GET',
				dataType: 'json'
			}).done(function(dt) {
				$.each(dt, function(i, item) {
					$('#orc').append($('<option>', {
						value: item.orc,
						text: item.orc
					})).trigger('change');
				});
			});
		}

		$('#orc').change(function() {
			orc = $(this).val();
			$.ajax({
				url: '<?php echo site_url("cutting/ajax_get_by_orc"); ?>/' + orc,
				type: 'GET',
				dataType: 'json'
			}).done(function(dt) {
				console.log('dt: ', dt);
				$('#style').val(dt.style_sam);
				style = dt.style_sam;

				$('#color').val(dt.color);
				color = dt.color;

				let blackRegex = /black/i;
				let whiteRegex = /white/i;

				if (blackRegex.test(color)) {
					colorGroup = 'Black';
				} else if (whiteRegex.test(color)) {
					colorGroup = 'White';
				} else {
					colorGroup = 'color'
				}

				// if (color.includes("BLACK")) {
				//   colorGroup = "Black";
				// } else if (color.includes("WHITE")) {
				//   colorGroup = "White";
				// } else {
				//   colorGroup = "color";
				// }

				$('#so').val(dt.so);

				$('#buyer').val(dt.buyer);

				var todayDate = new Date();
				var nowYear = todayDate.getFullYear();
				var nowMonth = todayDate.getMonth() + 1;
				var nowDay = todayDate.getDate();

				var strDateNow = nowYear.toString() + "-" + (nowMonth < 10 ? "0" + nowMonth.toString() : nowMonth.toString()) + "-" + (nowDay < 10 ? "0" + nowDay.toString() : nowDay.toString());

				// console.log(strDateNow);
				$('#prepare_on').val(strDateNow);

				$('#qty').val(dt.qty);
				// qty = parseInt(dt.qty) + Math.round((kompensasiQty * dt.qty));
				qty = dt.qty;
				$('#bundles_qty').val("0");
			})
		});

		$("#btnAddBundle").click(function() {
			console.log('orc val: ', orc);
			if (orc == "") {
				Swal.fire({
					type: "warning",
					title: "Warning!",
					text: "Please select an orc",
					showConfirmButton: false,
					timer: 1750
				});
			} else {
				addBundle();
			}

		})

		function addBundle() {

			$('#modal_add_bundle').modal('show');
			// var orc = $('#orc').val();
			var style = $('#style').val();
			$('#bundle_title').html('<label style="color: red;">ORC: ' + orc + '</label>' +
				'<br><label style="color: red; ">Style: ' + style + '</label>' +
				'<br><label style="color: red";>QTY: ' + $('#qty').val());
			$('#size').empty();
			loadSize();
		}

		function loadSize() {
			$('#size').val(null);
			$.ajax({
				type: 'GET',
				url: '<?php echo site_url("cutting/ajax_get_all_size"); ?>',
				dataType: 'json'
			}).done(function(dt) {
				$.each(dt, function(i, item) {
					$('#size').append($('<option>', {
						value: item.size,
						text: item.size
					}));
				})
			})
		}

		$('#size').change(function() {

			size = $(this).val();

			$.ajax({
				url: "<?php echo site_url('cutting/ajax_get_by_size'); ?>",
				type: "POST",
				data: {
					"dataSize": size
				},
				dataType: "json",
			}).done(function(dt) {
				if (dt != null) {
					getSAM(dt);
					// sizeGroup = dt.group;
				}
			});

		})

		function getSAM(d) {
			sizeGroup = d.group;

			var dataForSAM = {
				'style': style,
				'color': colorGroup,
				'grup_size': sizeGroup
			};

			console.log('dataForSAM: ', dataForSAM);

			$.ajax({
				url: "<?php echo site_url('cutting/ajax_get_sam'); ?>",
				type: "POST",
				data: {
					'dataForSAM': dataForSAM
				},
				dataType: "json",
			}).done(function(retVal) {
				console.log('retVal: ', retVal);
				if (retVal != null) {
					cuttingSam = retVal.sam_cutting;
					$('#outer_mold').prop('checked', (parseFloat(retVal.outer_sam) != 0.000 ? true : false));
					$('#mid_mold').prop('checked', (parseFloat(retVal.mid_sam) != 0.000 ? true : false));
					$('#linning_mold').prop('checked', (parseFloat(retVal.linning_sam) != 0.000 ? true : false));
				}
			})
		}

		$('#btnCreateBundle').click(function() {

			totalQtyModal += parseInt($('#qty_modal').val());

			// $('#btnSaveBundle').attr('disabled', false);

			if (qty < totalQtyModal) {
				Swal.fire({
					type: "warning",
					title: "Warning!",
					text: "QTY Overload!!",
					showConfirmButton: false,
					timer: 1750
				});
				totalQtyModal -= parseInt($('#qty_modal').val());
				var qtySisa = qty - totalQtyModal
				$('#qty_modal').val(qtySisa);
			}

			createBundle();

			if (qty == totalQtyModal) {
				// createBundle();
				totalQtyModal = 0;
				$('#modal_add_bundle').modal('hide');
			}

		});

		$('#modal_add_bundle').on('hidden.bs.modal', function(e) {
			// if(qty == totalQtyModal){
			// createBundle();
			$(this)
				.find('input,select')
				.val('')
				.end()
				.find('input[type=checkbox], input[type=radio]')
				.prop('checked', '')
				.end();
			// }      
		});

		function createBundle() {

			var selectedSize = $('#size').select2('data');

			//cek base on orc and size;
			var dataString = {
				'orc': orc,
				'size': size
			};

			$.ajax({
				type: 'POST',
				url: '<?php echo site_url("cutting/ajax_check_by_orc_size"); ?>',
				data: {
					'dataString': dataString
				},
				dataType: 'json',
			}).done(function(r) {
				console.log('r: ', r);
				if (r > 0) {
					// return false;
					Swal.fire({
						type: 'warning',
						title: 'Warning',
						text: 'This bundle for ORC ' + orc + ' already inputed!!'
					});
					$('#size').val('');
					$('#size').focus();
				} else {
					// return true;
					var pcs_each_bundle = $('#pcs_each_bundle').val();

					var qty = $('#qty_modal').val();

					var box = Math.floor(qty / pcs_each_bundle);

					var zero = "0";

					var bundleArr = [];

					var strIdx;

					var bundleNo;

					$('#total_bundle_qty').val(totalQtyModal);

					for (var x = 0; x < box; x++) {
						idx++;
						strIdx = idx.toString();
						bundleNo = zero.repeat(4 - strIdx.length) + strIdx + "(" + pcs_each_bundle.toString() + ")";

						bundleArr.push({
							'size': selectedSize[0].text,
							'qty': qty,
							'qty_pcs': pcs_each_bundle,
							'no': bundleNo,
							'barcode': orc + "-" + zero.repeat(4 - strIdx.length) + strIdx //+ "-" + pcs_each_bundle.toString()
						});

					}

					var sisa = Math.round(qty % pcs_each_bundle);

					if (sisa > 0) {
						idx++
						strIdx = idx.toString();
						bundleNo = zero.repeat(4 - strIdx.length) + idx.toString() + "(" + sisa.toString() + ")";
						bundleArr.push({
							'size': selectedSize[0].text,
							'qty': qty,
							'qty_pcs': sisa,
							'no': bundleNo,
							'barcode': orc + "-" + zero.repeat(4 - strIdx.length) + strIdx //+ "-" + sisa.toString()
						});
					}

					boxCount += bundleArr.length;
					$('#boxes').val(boxCount);

					$.each(bundleArr, function(i, item) {
						bundlingTable.row.add([
							item.size,
							item.qty,
							item.qty_pcs,
							item.no,
							// $('.th-barcode > $td').barcode(item.barcode, "code128"),
							item.barcode
						]).draw();
					});

					style = $('#style').val();
					var color = $('#color').val();
					var buyer = $('#buyer').val();
					var comm = $('#comm').val();
					var so = $('#so').val();
					var qty = $('#qty').val();
					var boxes = $('#boxes').val();
					var prepare_on = $('#prepare_on').val();
					outerMoldChecked = $('#outer_mold').is(':checked');
					midMoldChecked = $('#mid_mold').is(':checked');
					linningMoldChecked = $('#linning_mold').is(':checked');
					pantyChecked = $('#panty').is(':checked');
					noMoldChecked = $('#no_mold').is(':checked');

					var dataStrCutting = {
						'orc': orc,
						'style': style,
						'color': color,
						'grup_color': colorGroup,
						'buyer': buyer,
						'comm': comm,
						'so': so,
						'qty': qty,
						'boxes': boxes,
						'prepare_on': prepare_on
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("cutting/ajax_save_cutting"); ?>',
						data: {
							'dataStrCutting': dataStrCutting
						},
						dataType: 'json'
					}).done(function(data) {
						// console.log("data: ", data);
						if (data > 0) {
							idCutting = data;
							// updateOrder(orc);
							// saveDetail(idCutting, dataTable, outerMoldChecked, midMoldChecked, linningMoldChecked);

							saveDetail(idCutting, bundleArr, outerMoldChecked, midMoldChecked, linningMoldChecked, pantyChecked, noMoldChecked);
							// $.when(saveDetail(idCutting, bundleArr, outerMoldChecked, midMoldChecked, linningMoldChecked, pantyChecked, noMoldChecked)).done(function() {

							// loadOrc();
							// })

							// loadOrc();
						}
					});
				}
			})

		}

/* 		function createPackingList(dP) {
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url("packing/ajax_get_kapasitas_karton"); ?>',
				data: {
					'dataPacking': dP
				},
				dataType: 'json'
			}).done(function(row) {
				console.log('row: ', row);
				if (row == null) {
					dP.kapasitas_karton = 30;
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("packing/ajax_save_kapasitas_karton"); ?>',
						data: {
							"kapasitasKarton": dP
						},
						dataType: 'json'
					}).done(function(affRow) {
						if (affRow > 0) {
							dP.box_capacity = dP.kapasitas_karton;
							// dP.total_box = Math.round(parseInt(dP.qty / dP.kapasitas_karton));

							// dP.total_box = Math.ceil(parseInt(dP.qty) / parseInt(dP.kapasitas_karton));
							let totalBox = parseInt(dP.qty) / parseInt(dP.kapasitas_karton);
							console.log('totalBox: ', totalBox);

							// dP.total_box = Math.ceil(dP.qty / dP.kapasitas_karton);

							dP.total_box = Math.ceil(totalBox);

							console.log('dP.total_box: ', dP.total_box);

							console.log('dP: ', dP);

							savePacking(dP);
						}
					})
				} else {
					console.log('dP: ', dP);

					dP.box_capacity = row.kapasitas_karton;
					let totalBox = parseInt(dP.qty) / parseInt(row.kapasitas_karton);
					console.log('totalBox: ', totalBox);

					// dP.total_box = Math.round(parseInt(dP.qty / row.kapasitas_karton));

					dP.total_box = Math.ceil(totalBox);

					console.log('dP.total_box: ', dP.total_box);



					savePacking(dP);

				}

			});
		} */

/* 		function savePacking(dataPacking) {
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url("packing/ajax_save_solid_packing_list"); ?>',
				data: {
					'dataSolidPackingList': dataPacking
				},
				dataType: 'json'
			}).done(function(insertedId) {
				// console.log(insertId);
				if (insertedId > 0) {
					Swal.fire({
						type: 'success',
						title: 'Bundle Created and saved!',
						showConfirmButton: false,
						timer: 1500
					});
				}
			})
		} */


		// $('#btnPrintBarcode').click(function() {
		// 	// window.open("<//?php echo site_url('cutting/print_barcode'); ?>/" + idCutting, "_blank");

		// 	$.ajax({
		// 		url: "<//?php echo site_url('cutting/print_barcode'); ?>/" + idCutting,
		// 		type: 'GET',
		// 		dataType: 'json',
		// 	}).done(function(data) {
		// 		// localStorage.setItem("selectedRows", JSON.stringify(selRows));

		// 		// window.open("<//?php echo site_url('cutting/show_print_bundle'); ?>");

		// 		localStorage.removeItem('printBarcodeCutting');
		// 		localStorage.setItem('printBarcodeCutting', JSON.stringify(data));
		// 		window.open("<?php echo site_url('cutting/print_barcode_preview'); ?>");
		// 	})

		// 	// $('#bundlingTable').DataTable().clear().draw();
		// 	// clearForm();

		// 	$('#btnSaveBundle').attr('disabled', true);
		// 	// $('#btnPrintBarcode').attr('disabled', true);

		// });

		// $('#btnPrintBarcodeMolding').click(function() {
		// 	window.open("<//?php echo site_url('cutting/print_barcode_molding'); ?>/" + idCutting, "_blank");

		// 	$('#bundlingTable').DataTable().clear().draw();
		// 	// clearForm();

		// 	$('#btnSaveBundle').attr('disabled', true);
		// 	// $('#btnPrintBarcode').attr('disabled', true);

		// });

		// });

		// $('#btnResetBundling').click(function() {
		// 	$('#bundlingTable').DataTable().clear().draw();
		// })

		function saveDetail(idCut, dtTable, outer, mid, linning, panty, noMold) {

			var dataCuttingDetail;

			console.log('dtTable: ', dtTable);

			var arrDataCuttingDetail = [];

			$.each(dtTable, function(i, item) {
				// var noBundle = item.no;
				// var noBundle = item[3].substr(0, 4);

				// var size = item[0];
				// var size = item.size;
				// var dataForCuttingSAM = {};

				// ajaxGetGroupSize = $.ajax({
				//     url: '<//?php echo site_url('cutting/ajax_get_by_size'); ?>',
				//     type: 'POST',
				//     data: {
				//       'dataSize': size
				//     },
				//     dataType: 'json'
				//   }),
				//   ajaxGetCuttingSAM = ajaxGetGroupSize.then(function(dt) {
				//     groupSize = dt.group;

				//     dataForCuttingSAM = {
				//       'style': style,
				//       'color': colorGroup,
				//       'grup_size': groupSize
				//     };
				//     // console.log('dataForCuttingSAM: ', dataForCuttingSAM);
				//     return $.ajax({
				//       url: '<//?php echo site_url("cutting/ajax_get_cutting_sam"); ?>',
				//       type: 'POST',
				//       data: {
				//         'dataForCuttingSAM': dataForCuttingSAM
				//       },
				//       dataType: 'json'
				//     });

				//   });

				// ajaxGetCuttingSAM.done(function(d) {
				//   cuttingSam = d.sam_cutting;
				//   samResult = cuttingSam * item.qty_pcs;


				//   // console.log('dataCuttingDetail: ', dataCuttingDetail);
				//   // insertDetail(dataCuttingDetail);
				// });

				if (outer == true || mid == true || linning == true) {
					dataCuttingDetail = {
						'id_cutting': idCut,
						'size': item.size,
						'grup_size': sizeGroup,
						'cutting_sam': cuttingSam,
						'qty': item.qty,
						'qty_pcs': item.qty_pcs,
						'sam_result': cuttingSam * item.qty_pcs,
						'no_bundle': item.no,
						'kode_barcode': item.barcode,
						'outermold_barcode': (outer == true ? "O" + item.barcode : ""),
						'midmold_barcode': (mid == true ? "M" + item.barcode : ""),
						'linningmold_barcode': (linning == true ? "L" + item.barcode : ""),
						'panty_barcode': null
					};
				} else if (panty == true) {
					dataCuttingDetail = {
						'id_cutting': idCut,
						'size': item.size,
						'grup_size': sizeGroup,
						'cutting_sam': cuttingSam,
						'qty': item.qty,
						'qty_pcs': item.qty_pcs,
						'sam_result': cuttingSam * item.qty_pcs,
						'no_bundle': item.no,
						'kode_barcode': item.barcode,
						'outermold_barcode': null,
						'midmold_barcode': null,
						'linningmold_barcode': null,
						'panty_barcode': item.barcode
					};
				} else if (noMold == true) {
					dataCuttingDetail = {
						'id_cutting': idCut,
						'size': item.size,
						'grup_size': sizeGroup,
						'cutting_sam': cuttingSam,
						'qty': item.qty,
						'qty_pcs': item.qty_pcs,
						'sam_result': cuttingSam * item.qty_pcs,
						'no_bundle': item.no,
						'kode_barcode': item.barcode,
						'outermold_barcode': null,
						'midmold_barcode': null,
						'linningmold_barcode': null,
						'panty_barcode': null
					};
				}
				arrDataCuttingDetail.push(dataCuttingDetail);

				// insertDetail(dataCuttingDetail);

			});
			console.log('arrDataCuttingDetail: ', arrDataCuttingDetail);
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url("cutting/ajax_save_detail_cutting"); ?>',
				data: {
					'dataCuttingDetail': arrDataCuttingDetail
				},
				dataType: 'json'
			}).done(function(rst) {
				console.log(rst);
				if (rst == "OK") {
					let dataPacking = {
						'orc': $('#orc').val(),
						'color': $('#color').val(),
						'style': $('#style').val(),
						'size': $('#size').val(),
						'qty': $('#qty_modal').val(),
					}
					// createPackingList(dataPacking);
					// Swal.fire({
					// 	type: 'success',
					// 	title: 'Bundle Created and saved!',
					// 	showConfirmButton: false,
					// 	timer: 1500
					// });

					// $('#btnPrintBarcode').attr('disabled', false);
					// $('#btnPrintBarcodeMolding').attr('disabled', false);
					// $('#btnAddBundle').attr('disabled', false);


					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("cutting/ajax_get_kapasitas_karton"); ?>',
						data: {
							'dataPacking': dataPacking
						},
						dataType: 'json'
					}).done(function(row) {
						console.log('row: ', row);
						if (row == null) {
							// Swal.fire({
							// 	type: 'warning',
							// 	title: 'Peringatan',
							// 	html: '<h3><strong>Data untuk packing gagal disimpan!<br>Kemungkinan dikarenakan' +
							// 		'data master kapasitas karton untuk size ' + dP.size + ' dan style ' + dP.style +
							// 		'belum ada atau belum diinput.',
							// 	showConfirmButton: true
							// });
							// return false;
							dataPacking.kapasitas_karton = 30;
							$.ajax({
								type: 'POST',
								url: '<?php echo site_url("packing/ajax_save_kapasitas_karton"); ?>',
								data: {
									"kapasitasKarton": dataPacking
								},
								dataType: 'json'
							}).done(function(affRow) {
								if (affRow > 0) {
									dataPacking.box_capacity = dataPacking.kapasitas_karton;
									// dP.total_box = Math.round(parseInt(dP.qty / dP.kapasitas_karton));

									// dP.total_box = Math.ceil(parseInt(dP.qty) / parseInt(dP.kapasitas_karton));
									let totalBox = parseInt(dataPacking.qty) / parseInt(dataPacking.kapasitas_karton);
									console.log('totalBox: ', totalBox);

									// dP.total_box = Math.ceil(dP.qty / dP.kapasitas_karton);

									dataPacking.total_box = Math.ceil(totalBox);

									savePacking(dataPacking);
								}
							})
						} else {
							dataPacking.box_capacity = row.kapasitas_karton;
							// dataPacking.total_box = Math.round(parseFloat(dataPacking.qty / row.kapasitas_karton));
							let totalBox = parseInt(dataPacking.qty) / parseInt(row.kapasitas_karton);
							dataPacking.total_box = Math.ceil(totalBox);

							// $.ajax({
							// 	type: 'POST',
							// 	url: '<//?php echo site_url("cutting/ajax_save_packing"); ?>',
							// 	data: {
							// 		'dataPacking': dataPacking
							// 	},
							// 	dataType: 'json'
							// }).done(function(insertedId) {
							// 	console.log('insertedId: ', insertedId);
							// 	// console.log(insertId);
							// 	if (insertedId > 0) {
							// 		Swal.fire({
							// 			type: 'success',
							// 			title: 'Bundle Created and saved!',
							// 			showConfirmButton: false,
							// 			timer: 1500
							// 		});
							// 		$('#btnPrintBarcode').attr('disabled', false);
							// 		$('#btnPrintBarcodeMolding').attr('disabled', false);
							// 		$('#btnAddBundle').attr('disabled', false);
							// 		// loadOrc();									
							// 	}
							// })
							// savePacking(dataPacking);

						}

					});
				}
			});
			// insertDetail(dataCuttingDetail);
		}

		// function savePackingList(dp){
		// 	let dataPacking = {
		// 		'style': dp.style,
		// 		'size': dp.size
		// 	};

		// 	$.ajax({
		// 		type: 'POST',
		// 		url: '<//?php echo site_url("packing/ajax_get_kapasitas_karton"); ?>',
		// 		data: {'dataPacking': dataPacking},
		// 		dataType: 'json',
		// 	}).done(function(row){
		// 		if(row == null){

		// 		}
		// 	})
		// }

		// function insertDetail(dataDetail) {
		//   $.ajax({
		//     type: 'POST',
		//     url: '<//?php echo site_url("cutting/ajax_save_detail_cutting"); ?>',
		//     data: {
		//       'dataCuttingDetail': dataDetail
		//     },
		//     dataType: 'json'
		//   }).done(function(rst) {
		//     console.log(rst);
		//     if (rst == "OK") {
		//       Swal.fire({
		//         type: 'success',
		//         title: 'Bundle Created and saved!',
		//         showConfirmButton: false,
		//         timer: 1500
		//       });
		//       $('#btnPrintBarcode').attr('disabled', false);
		//       $('#btnPrintBarcodeMolding').attr('disabled', false);
		//       $('#btnAddBundle').attr('disabled', false);
		//       loadOrc();

		//     }
		//   });
		// }

		// function updateOrder(orc) {
		//   $.ajax({
		//     url: '<//?php echo site_url("cutting/ajax_update_order"); ?>/' + orc,
		//     type: 'POST',
		//     dataType: 'json'
		//   }).done(function(rdt){
		//     if (rdt >= 0) {
		//         // console.log('update order success');
		//         Swal.fire({
		//           type: 'success',
		//           title: 'Save data success!!',
		//           showConfirmButton: false,
		//           timer: 1500
		//         });  
		//         loadOrc();          
		//       }
		//   })
		// }

		function clearForm() {
			$('#style').val('');
			$('#color').val('');
			$('#buyer').val('');
			$('#comm').val('');
			$('#so').val('');
			$('#qty').val('');
			$('#boxes').val('');
			$('#prepare_on').val('');
		}

		$('#modal_add_bundle').on('hidden.bs.modal', function() {
			$('#size').val(null);
			$('#pcs_each_bundle').val("");
			$('#qty_modal').val();
			// $('#outer_mold').prop('checked', false);
			// $('#mid_mold').prop('checked', false);
			// $('#linning_mold').prop('checked', false);
			$('#total_bundle_qty').val("");

		})
	</script>
</body>

</html>
