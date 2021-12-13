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
                            <h1 class="m-0 text-dark">Output Molding </h1>
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
                                    <h3 class="card-title">Data Output Molding Result</h3>
                                    <div class="card-tools">
                                        <h3 class="card-title" id="shift"></h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Please Scan Barcode Machine Number & Bundle Here</label>
                                        <input type="text" id="barcode_output" class="form-control">
                                    </div>
                                    <table id="outputMoldingTable" class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>SHIFT</th>
                                            <th>MACHINE</th>
                                            <th>DATE</th>
                                            <th>ORC</th>
                                            <th>STYLE</th>
                                            <th>COLOR</th>
                                            <th>SIZE</th>
                                            <th>BUNDLE</th>
                                            <!-- <th>PCS</th> -->
                                            <th>OUTER SAM RESULT</th>
                                            <th>MID SAM RESULT</th>
                                            <th>LINNING SAM RESULT</th>
                                        </thead>
                                        <tfoot>
                                            <th>ID</th>
                                            <th>SHIFT</th>
                                            <th>MACHINE</th>
                                            <th>DATE</th>
                                            <th>ORC</th>
                                            <th>STYLE</th>
                                            <th>COLOR</th>
                                            <th>SIZE</th>
                                            <th>BUNDLE</th>
                                            <!-- <th>PCS</th> -->
                                            <th>OUTER SAM RESULT</th>
                                            <th>MID SAM RESULT</th>
                                            <th>LINNING SAM RESULT</th>
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
    <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


    <script>
        var table;
        var idOutputMolding;
        var mesinMolding;
        var barcodeMolding;
        var barcodeNoMesin = "";

        $(document).ready(function() {
            showShift();

            $('.select2').select2();
            $('#barcode_output').focus()

            table = $('#outputMoldingTable').DataTable({
                "autoWidth": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('OutputMolding/ajax_list'); ?>",
                    "type": "POST",
                    "dataType": "json",
                }
            });

            function showShift(){
                $.ajax({
                    url: '<?php echo site_url("outputmolding/ajax_get_shift"); ?>',
                    type: 'GET',
                    dataType: 'json'
                }).done(function(data){
                    console.log('data: ', data);
                    $('#shift').text("Shift:" + (data == null ? "ketiga" : data.shift));
					//$('#shift').text("Shift:" + data.shift);
                    //var shiftLengkap = $('#shift').text();
                    //var shift = shiftLengkap.split(":");
                    //console.log('shift[1]: ', shift[1]);
                });
            }

            $('#barcode_output').keypress(function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault();

                    var barcode = $(this).val();

                    var barcodeUpper = barcode.toUpperCase();

                    if (barcodeUpper.length == 10) {
                        barcodeNoMesin = barcodeUpper;
                        $.ajax({
                            url: "<?php echo site_url('outputmolding/ajax_get_molding_mesin_by_barcode'); ?>/" + barcode,
                            type: "GET",
                            dataType: "json"
                        }).done(function(dt) {
                            if (dt != null) {
                                mesinMolding = dt.name;
                                Swal.fire({
                                    type: 'info',
                                    title: 'Mesin Molding ' + dt.name + " terdeteksi. Silahkan scan bundle",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                $('#barcode_output').val('');
                                $('#barcode_output').focus();
                            }
                        });
                    } else {
                        if (barcodeNoMesin == "") {
                            Swal.fire({
                                type: 'warning',
                                title: 'Scan barcode mesin molding terlebih dahulu!!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#barcode_output').val('');
                            $('#barcode_output').focus();
                        } else {
                            var brcode = $(this).val();

                            var brcodeUpper = brcode.toUpperCase();

                            var prfx = brcodeUpper.charAt(0);

                            switch (prfx) {
                                case "O":
                                    check_barcode_outer(brcodeUpper);
                                    break;
                                case "M":
                                    check_barcode_mid(brcodeUpper);
                                    break;
                                case "L":
                                    check_barcode_linning(brcodeUpper);
                                    break;
                            }
                        }
                    }
                }
            });

            function check_barcode_outer(code) {
                //check barcode di table input molding
                console.log('code outer: ', code);
                $.ajax({
                    url: "<?php echo site_url('outputmolding/ajax_get_by_outermold_barcode'); ?>/" + code,
                    // type: 'GET',
                    dataType: 'json'
                }).done(function(dt) {
                    console.log('dt OUTER: ', dt);
                    if (dt == null) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!!',
                            text: 'Barcode not found!!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#barcode_output').val('');
                        $('#barcode_output').focus();
                    } else {
                        // save_output_molding(dt);
                        check_barcode_outer1(code, dt);
                    }
                });
            }

            function check_barcode_outer1(c, d) {
                $.ajax({
                    url: '<?php echo site_url("outputmolding/ajax_check_by_barcode_outer"); ?>/' + c,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(retVal) {
                    if (retVal > 0) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!!',
                            text: 'Barcode already scanned!!',
                            showConfirmButton: false,
                            timer: 1750
                        });
                        $('#barcode_output').val('');
                        $('#barcode_output').focus();                        
                    } else {
                        save_output_molding(d);
                    }
                })
            }

//

            function check_barcode_mid(code) {
                //check barcode di table input molding

                $.ajax({
                    url: "<?php echo site_url('outputmolding/ajax_get_by_midmold_barcode'); ?>/" + code,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt == null) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!!',
                            text: 'Barcode not found!!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#barcode_output').val('');
                        $('#barcode_output').focus();
                    } else {
                        // save_output_molding(dt);
                        check_barcode_mid1(code, dt);
                    }
                });
            }

            function check_barcode_mid1(c, d) {
                $.ajax({
                    url: '<?php echo site_url("outputmolding/ajax_check_by_barcode_mid"); ?>/' + c,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(retVal) {
                    if (retVal > 0) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!!',
                            text: 'Barcode already scanned!!',
                            showConfirmButton: false,
                            timer: 1750
                        });
                        $('#barcode_output').val('');
                        $('#barcode_output').focus();                        
                    } else {
                        save_output_molding(d);
                    }
                })
            }

            function check_barcode_linning(code) {
                //check barcode di table input molding

                $.ajax({
                    url: "<?php echo site_url('outputmolding/ajax_get_by_linningmold_barcode'); ?>/" + code,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt == null) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!!',
                            text: 'Barcode not found!!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#barcode_output').val('');
                        $('#barcode_output').focus();
                    } else {
                        // save_output_molding(dt);
                        check_barcode_linning1(code, dt);
                    }
                });
            }

            function check_barcode_linning1(c, d) {
                $.ajax({
                    url: '<?php echo site_url("outputmolding/ajax_check_by_barcode_linning"); ?>/' + c,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(retVal) {
                    if (retVal > 0) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!!',
                            text: 'Barcode already scanned!!',
                            showConfirmButton: false,
                            timer: 1750
                        });
                        $('#barcode_output').val('');
                        $('#barcode_output').focus();                        
                    } else {
                        save_output_molding(d);
                    }
                })
            }            


            function save_output_molding(data) {
				showShift();
                var shiftLengkap = $('#shift').text();
                var shift = shiftLengkap.split(":");

                var dataStr = {
                    'shift': (shift[1] == undefined ? "ketiga" : shift[1]),
					//'shift': shift[1],
                    'no_mesin': mesinMolding,
                    'orc': data.orc,
                    'style': data.style,
                    'color': data.color,
                };

                console.log('dataStr: ', dataStr);

                $.ajax({
                    url: '<?php echo site_url("outputmolding/ajax_save"); ?>',
                    data: {
                        'dataStr': dataStr
                    },
                    method: 'post',
                    dataType: 'json',
                }).done(function(id) {
                    if (id > 0) {
                        var brcode = $('#barcode_output').val();
                        saveDetail(data, brcode, id);

                    }
                });
            }

            function saveDetail(dt, b, idOutputMolding) {
                var preffix = b.charAt(0);

                switch (preffix) {
                    case "O":
                        saveOuterMold(dt, b, idOutputMolding);
                        break;
                    case "M":
                        saveMidMold(dt, b, idOutputMolding);
                        break;
                    case "L":
                        saveLinningMold(dt, b, idOutputMolding);
                        break;
                }
            }

            function saveOuterMold(data, bar, idOutputMolding) {
                var dataOuterMold = {
                    'id_output_molding': idOutputMolding,
                    'no_bundle': data.no_bundle,
                    'size': data.size,
                    'group_size': data.group_size,
                    'qty_outermold': data.qty_pcs,
                    'outermold_barcode': bar,
                    'outermold_sam_result': data.qty_pcs * data.outermold_sam
                }

                $.ajax({
                    url: "<?php echo site_url('outputmolding/ajax_save_detail_outermold'); ?>",
                    type: "POST",
                    data: {'dataOuterMold': dataOuterMold},
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt > 0) {
                        Swal.fire({
                            type: 'info',
                            title: 'Save Data Success!!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#barcode_output').val('');
                        $('#barcode_output').focus();
                        reload_table();
                    }
                })
            }

            function saveMidMold(data, bar, idOutputMolding) {
                var dataMidMold = {
                    'id_output_molding': idOutputMolding,
                    'no_bundle': data.no_bundle,
                    'size': data.size,
                    'group_size': data.group_size,
                    'qty_midmold': data.qty_pcs,
                    'midmold_barcode': bar,
                    'midmold_sam_result': data.qty_pcs * data.mildmold_sam
                }

                console.log('dataMidMold: ', dataMidMold);

                $.ajax({
                    url: "<?php echo site_url('outputmolding/ajax_save_detail_midmold'); ?>",
                    type: "POST",
                    data: {'dataMidMold': dataMidMold},
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt > 0) {
                        Swal.fire({
                            type: 'info',
                            title: 'Save Data Success!!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#barcode_output').val('');
                        $('#barcode_output').focus();
                        reload_table();
                    }
                });
            }

            function saveLinningMold(data, bar, idOutputMolding) {
                var dataLinningMold = {
                    'id_output_molding': idOutputMolding,
                    'no_bundle': data.no_bundle,
                    'size': data.size,
                    'group_size': data.group_size,
                    'qty_linningmold': data.qty_pcs,
                    'linningmold_barcode': bar,
                    'linningmold_sam_result': data.qty_pcs * data.linningmold_sam
                }

                $.ajax({
                    url: "<?php echo site_url('outputmolding/ajax_save_detail_linningmold'); ?>",
                    type: "POST",
                    data: {'dataLinningMold': dataLinningMold},
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt > 0) {
                        Swal.fire({
                            type: 'info',
                            title: 'Save Data Success!!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#barcode_output').val('');
                        $('#barcode_output').focus();
                        reload_table();
                    }
                })
            }                        

            function reload_table() {
                table.ajax.reload(null, false);
            }


        });
    </script>
</body>

</html>