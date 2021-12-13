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
    <link href="<?php echo base_url('plugins/smart_wizard/css/smart_wizard.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/smart_wizard/css/smart_wizard_theme_arrows.min.css'); ?>" rel="stylesheet">
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
                        <div class="modal fade" id="scanningModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="scanningModalTitle"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Smart Wizard -->
                                        <div id="scanning">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- </div> -->
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header text-center">
                                    <h3 class="card-title">Data Output Sewing - Line <?php echo $this->session->userdata['username']; ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label>Scan Barcode Here (untuk Calling Mechanic SCAN BARCODE MESIN TERLEBIH DAHULU):</label>
                                        <input type="text" id="bundle_barcode" class="form-control" maxlength="20">
                                    </div>
                                    <hr>
                                    <table id="outputTable" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ORC Number</th>
                                                <th>Bundle #</th>
                                                <th>Center Panel</th>
                                                <th>Back Wings</th>
                                                <th>Cups</th>
                                                <th>Assembly</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>ORC Number</th>
                                                <th>Bundle #</th>
                                                <th>Center Panel</th>
                                                <th>Back Wings</th>
                                                <th>Cups</th>
                                                <th>Assembly</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" id="btnCreateMP"><i class="fa fa-male"></i> Add Man Power </button>
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
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('_partials/footer.php'); ?>
        <?php $this->load->view('_partials/modal.php'); ?>

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


    <script>
        // import AppScanningBarcode from '<?php echo base_url("myJS/myControllers/appscanningbarcode.js"); ?>';

        var table;
        var tableMachinesBreakdown;
        var dataBarang;

        var bolBarMesin = false;
        var bolBarSympton = false;
        var bolSettled = false;
        var bolDelayed = false;
        var bolSpv = false;
        var bolIdMekanik = false;
        var bolDelayed = false;

        var barcodeMesin;
        var barcodeSympton;
        var barcodeMachineState;
        var barcodeSpv;
        var barcodeDelayed;

        var scanX = 0;
        var dataMachineWaiting;
        var dataMachineRepairing;

        $(document).ready(function() {

            var idOutputSewing;
            var code = "";
            var codeSplit;
            var userName = "<?php echo $this->session->userdata['username']; ?>";

            // const Scanning = require('./js/barcodeScanning');

            $('#bundle_barcode').focus();

            $('#bundle_barcode').blur(function() {
                setTimeout(
                    function() {
                        $('#bundle_barcode').focus();
                    }, 30000
                );
            })

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
                    "url": "<?php echo site_url('outputsewing/ajax_list'); ?>",
                    "type": "POST",
                    "dataType": "json",
                },
                "createdRow": function(row, data, dataIndex) {
                    if (data[3] == '00:00:00') {
                        $('td', row).eq(3).css('color', 'red');
                    }
                    if (data[4] == '00:00:00') {
                        $('td', row).eq(4).css('color', 'red');
                    }
                    if (data[5] == '00:00:00') {
                        $('td', row).eq(5).css('color', 'red');
                    }
                    if (data[6] == '00:00:00') {
                        $('td', row).eq(6).css('color', 'red');
                    }
                }
            });

            $('#machinesBreakdown').hide();

            $.ajax({
                url: "<?php echo site_url('outputsewing/ajax_list1'); ?>",
                type: "GET",
                dataType: "json"
            }).done(function(dt) {
                if (dt == null) {
                    $('#btnCreateMP').attr('disabled', false);
                    Swal.fire({
                        title: 'Konfirmasi',
                        type: 'info',
                        text: 'Data man power sewing line ' + '<?php echo $this->session->userdata["username"]; ?>' + ' hari ini masih kosong, apakah akan diisi?',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya!'
                    }).then((result) => {
                        if (result.value) {
                            // console.log('Show operator modal');
                            $('#modal_man_power').modal('show');
                        }
                    })
                } else {
                    $('#btnCreateMP').attr('disabled', true);
                }
            });

            $('#btnSaveMP').click(function() {
                var line = "<?php echo $this->session->userdata['username']; ?>";
                var dataStr = {
                    'line': line,
                    'center_panel_op': $('#center_panel_op').val(),
                    'back_wings_op': $('#back_wings_op').val(),
                    'cups_op': $('#cups_op').val(),
                    'assembly_op': $('#assembly_op').val()
                }
                $.ajax({
                    url: '<?php echo site_url("outputsewing/ajax_save"); ?>',
                    type: 'POST',
                    data: {
                        'dataStr': dataStr
                    },
                    dataType: 'json'
                }).done(function(id) {
                    if (id > 0) {
                        // idOutputSewing = id;
                        // $('#modal_man_power').modal('close');
                        Swal.fire({
                            type: 'info',
                            title: 'success',
                            text: 'Save data man power success!!',
                            showCancelButton: false,
                            timer: 1500
                        });
                        $('#btnCreateMP').attr('disabled', true);
                        $('#center_panel_op').val('');
                        $('#back_wings_op').val('');
                        $('#cups_op').val('');
                        $('#assembly_op').val('');

                        $('#bundle_barcode').focus();
                    }
                });
            });

            $('#btnCreateMP').click(function() {
                $('#modal_man_power').modal('show');
            });

            $('#bundle_barcode').keypress(function(e) {
                if (e.keyCode == 13) {
                    var kode = $(this).val();
                    var kodePrefix = kode.substr(0,2);

                    if(kodePrefix.toUpperCase() == "MM" || kodePrefix.toUpperCase() == "MK" ||
                        kodePrefix.toUpperCase() == "SP" || kodePrefix.toUpperCase() == "D-"){
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning',
                            html: '<strong>Invalid barcode!!',
                            showConfirmButton: false,
                            timer: 1800
                        });
                        $(this).val('');
                        $(this).focus();                            
                    }else{
                        if(kode.length == 10 || kode.length == 12){
                            showMekanik(kode);
                        }else if(kode.length = 12){
                            var codeUpper = kode.toUpperCase();
                            codeSplit = codeUpper.split("_");
                            checkCode(codeSplit[1]);                        
                        }
                    }                    
                    // const appScanningBarcode = new AppScanningBarcode(kode);
                }
            })

            // $('#bundle_barcode').keypress(function(e) {
            //     if (e.keyCode == 13) {
            //         e.preventDefault();
            //         kode = $(this).val();

            //         if (kode.length == 10 || kode.length == 6 || kode.length == 9 || kode.length == 7 || kode.length == 2) {
            //             checkCodeMesinOrSympton(kode);
            //         } else if (kode.length > 10) {
            //             var codeUpper = kode.toUpperCase();
            //             codeSplit = codeUpper.split("_");
            //             checkCode(codeSplit[1]);
            //             // console.dir.apply()
            //         }
            //     }
            // });

            // $('#bundle_barcode').keypress(function(e){
            //     if(e.keyCode == 13){
            //         var kode = $(this).val();
            //         if(kode.length == 10 || kode.substring(0,2) == "MM" || kode.substring(0,2) == "MK" || 
            //             kode.substring(0,2) == "SP" || kode.substring(0,2) == "D-"){
            //             //show mechanic view
            //             showMekanik(kode);
            //         }
            //     }
            // });

            function showMekanik(code){
                localStorage.removeItem('firstBarcode');
                localStorage.setItem('firstBarcode', code);

                // const b = new ScanningBarcode(code);
                // b.getMechanic();
                window.open('<?php echo site_url("Mekanik"); ?>', '_self');                
            }

            function checkCodeMesinOrSympton(code) {
                scanX++;
                if (scanX == 1) {
                    if (code.length == 12 || code.length == 10) {
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
                    if (code.length == 12) {
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
                    url: '<?php echo site_url("mekanik/ajax_check_machine_breakdown_by_barcode"); ?>/' + c,
                    dataType: 'json'
                }).done(function(retVal) {
                    if (retVal == null) {
                        bolBarMesin = true;
                        barcodeMesin = c;
                        Swal.fire({
                            type: 'info',
                            title: 'Barcode mesin sudah discan, silahkan scan barcode masalah mesin',
                            showConfirmButton: false,
                            timer: 2500
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
                //cek apakah barcode sudah ada di inputcutting
                var ajaxCheckBarcodeFromInputCutting = $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_check_barcode'); ?>/" + barcode,
                    type: "GET",
                    dataType: "json"
                });

                ajaxCheckBarcodeFromInputCutting.done(function(dt) {
                    if (dt == null) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning!',
                            text: 'Barcode belum di-SCAN di trimstore!!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#bundle_barcode').val('');
                        $('#bundle_barcode').focus();
                    } else {
                        checkBarcodeForTheLine(barcode);
                    }
                })
            }

            function checkBarcodeForTheLine(kode) {
                //cek apakah barkode untuk line ini
                var ajaxCheckBarcodeForTheLine = $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_get_by_barcode'); ?>/" + kode,
                    type: "GET",
                    dataType: "json",
                });

                ajaxCheckBarcodeForTheLine.done(function(d) {
                    if (d != null) {
                        if (d.line != userName) {
                            Swal.fire({
                                type: 'warning',
                                title: 'Warning',
                                text: 'Barcode ini bukan untuk line ' + userName + "!!",
                                showConfirmButton: false,
                                timer: 1750
                            });
                            $('#bundle_barcode').val('');
                            $('#bundle_barcode').focus();
                        } else {
                            saveDetail(d);
                            // insertOutputSewing(d);
                        }
                    }
                });
            }

            function saveDetail(data) {
                $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_get_by_barcode1'); ?>/" + codeSplit[1],
                    type: 'GET',
                    dataType: 'json',
                    success: function(r) {
                        console.log('r: ', r);
                        if (r == null) {
                            insertOutputSewing(data);
                        } else {
                            if (codeSplit[0] == "PA" && codeSplit[0] == "AS") {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'Warning!!',
                                    text: 'This bundle already Scanned!',
                                    showCancelButton: false,
                                    timer: 1750
                                });
                                $('#bundle_barcode').val('');
                                $('#bundle_barcode').focus();
                            } else {
                                updateOutputSewing(data);
                            } 
                        }
                    }
                })

            }

            function insertOutputSewing(dtInsert) {
                var dateNow = new Date();
                var timeStr = dateNow.getHours() + ":" + dateNow.getMinutes() + ":" + dateNow.getSeconds();
                $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_get_by_line_date_now1'); ?>",
                    type: 'GET',
                    dataType: "json"
                }).done(function(dt) {
                    if (dt != null) {
                        idOutputSewing = dt.id_output_sewing;
                        if (codeSplit[0] == "AS") {
                            var dataStr = {
                                'id_output_sewing': idOutputSewing,
                                'orc': dtInsert.orc,
                                'no_bundle': dtInsert.no_bundle,
                                'center_panel': "00:00:00",
                                'back_wings': "00:00:00",
                                'cups': "00:00:00",
                                'assembly': timeStr,
                                'qty': dtInsert.qty_pcs,
                                'center_panel_sam_result': 0.000,
                                'back_wings_sam_result': 0.000,
                                'cups_sam_result': 0.000,
                                'assembly_sam_result': dtInsert.qty_pcs * dtInsert.assembly_sam,
                                'kode_barcode': codeSplit[1]
                            };
                            saveInsertOutputSewing(dataStr);
                        // } else if (codeSplit[0] == "BW") {
                        //     var dataStr = {
                        //         'id_output_sewing': idOutputSewing,
                        //         'orc': dtInsert.orc,
                        //         'no_bundle': dtInsert.no_bundle,
                        //         'center_panel': "00:00:00",
                        //         'back_wings': timeStr,
                        //         'cups': "00:00:00",
                        //         'assembly': "00:00:00",
                        //         'qty': dtInsert.qty_pcs,
                        //         'center_panel_sam_result': 0.000,
                        //         'back_wings_sam_result': dtInsert.qty_pcs * dtInsert.back_wings_sam,
                        //         'cups_sam_result': 0.000,
                        //         'assembly_sam_result': 0.000,
                        //         'kode_barcode': codeSplit[1]
                        //     };
                        //     saveInsertOutputSewing(dataStr);
                        // } else if (codeSplit[0] == "CU") {
                        //     var dataStr = {
                        //         'id_output_sewing': idOutputSewing,
                        //         'orc': dtInsert.orc,
                        //         'no_bundle': dtInsert.no_bundle,
                        //         'center_panel': "00:00:00",
                        //         'back_wings': "00:00:00",
                        //         'cups': timeStr,
                        //         'assembly': "00:00:00",
                        //         'qty': dtInsert.qty_pcs,
                        //         'center_panel_sam_result': 0.000,
                        //         'back_wings_sam_result': 0.000,
                        //         'cups_sam_result': dtInsert.qty_pcs * dtInsert.cups_sam,
                        //         'assembly_sam_result': 0.000,
                        //         'kode_barcode': codeSplit[1]
                        //     };
                        //     saveInsertOutputSewing(dataStr);
                        // } else if (codeSplit[0] == "AS") {
                        //     Swal.fire({
                        //         type: 'warning',
                        //         title: 'Warning',
                        //         text: 'Scanning Assembly bundle not allowed, because CENTER PANEL or BACK WINGS or CUPS not scanned yet!!',
                        //         showConfirmButton: false,
                        //         timer: 2000
                        //     });

                            $('#bundle_barcode').val('');
                            $('#bundle_barcode').focus();

                        } else if (codeSplit[0] == "PA") {
                            var dataStr = {
                                'id_output_sewing': idOutputSewing,
                                'orc': dtInsert.orc,
                                'no_bundle': dtInsert.no_bundle,
                                'center_panel': "00:00:00",
                                'back_wings': "00:00:00",
                                'cups': "00:00:00",
                                'assembly': timeStr,
                                'qty': dtInsert.qty_pcs,
                                'center_panel_sam_result': 0.000,
                                'back_wings_sam_result': 0.000,
                                'cups_sam_result': 0.000,
                                'assembly_sam_result': dtInsert.qty_pcs * dtInsert.assembly_sam,
                                'kode_barcode': codeSplit[1]
                            };
                            checkPantyBundle(dataStr);
                            // saveInsertOutputSewing(dataStr);                            
                        }
                    }
                });
            }

            function checkPantyBundle(dtStr) {
                var dataOrcBundle = {
                    'orc': dtStr.orc,
                    'no_bundle': dtStr.no_bundle
                };
                console.log('dataOrcBundle: ', dataOrcBundle);
                $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_get_by_line_date_now'); ?>",
                    type: 'POST',
                    data: {
                        'dataOrcBundle': dataOrcBundle
                    },
                    dataType: 'json',
                }).done(function(val) {
                    console.log('val :', val);
                    if (val == null) {
                        saveInsertOutputSewing(dtStr);
                    }
                });
            }

            function saveInsertOutputSewing(data) {
                $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_save_detail'); ?>",
                    type: "POST",
                    data: {
                        'dataStr': data
                    },
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt > 0) {
                        Swal.fire({
                            type: 'info',
                            title: 'success',
                            text: 'Save data success!!',
                            showCancelButton: false,
                            timer: 1500
                        });
                        // refreshTable(codeSplit[1]);
                        reloadTable();
                        $('#bundle_barcode').val('');
                        $('#bundle_barcode').focus();
                    }
                });
            }

            function updateOutputSewing(dt) {
                var dateNow = new Date();
                var timeStr = dateNow.getHours() + ":" + dateNow.getMinutes() + ":" + dateNow.getSeconds();
                var url;
                var dataStr;
                var nilai;
                var dataOrcBundle = {
                    'orc': dt.orc,
                    'no_bundle': dt.no_bundle
                };

                if (codeSplit[0] == "CP") {
                    $.ajax({
                        url: "<?php echo site_url('outputsewing/ajax_get_by_line_date_now'); ?>",
                        type: 'POST',
                        data: {
                            'dataOrcBundle': dataOrcBundle
                        },
                        dataType: 'json',
                    }).done(function(val) {
                        if (val != null) {
                            if (val.center_panel != "00:00:00") {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'Warning!!',
                                    text: 'Bundle CENTER PANEL ini sudah di-SCAN!!',
                                    showCancelButton: false,
                                    timer: 2000
                                });
                                // refreshTable(codeSplit[1]);
                                $('#bundle_barcode').val('');
                                $('#bundle_barcode').focus('');
                                // nilai = false;
                                // break;
                                // return false;
                            } else {
                                dataStr = {
                                    'center_panel': timeStr,
                                    'center_panel_sam_result': dt.qty_pcs * dt.center_panel_sam,
                                    'kode_barcode': codeSplit[1],
                                };
                                url = "<?php echo site_url('outputsewing/ajax_update_cp'); ?>";
                                saveUpdateOutputSewing(url, dataStr);
                            }
                        }
                    });
                } else if (codeSplit[0] == "BW") {
                    $.ajax({
                        url: "<?php echo site_url('outputsewing/ajax_get_by_line_date_now'); ?>",
                        type: 'POST',
                        data: {
                            'dataOrcBundle': dataOrcBundle
                        },
                        dataType: 'json',
                    }).done(function(val) {
                        if (val != null) {
                            if (val.back_wings != "00:00:00") {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'Warning!!',
                                    text: 'Bundle BACK WING ini sudah di-SCAN!!',
                                    showCancelButton: false,
                                    timer: 2000
                                });
                                refreshTable(codeSplit[1]);
                                $('#bundle_barcode').val('');
                                $('#bundle_barcode').focus('');
                                // break;
                                // return false;
                            } else {
                                dataStr = {
                                    'center_panel': timeStr,
                                    'back_wings_sam_result': dt.qty_pcs * dt.back_wings_sam,
                                    'kode_barcode': codeSplit[1],
                                };
                                url = "<?php echo site_url('outputsewing/ajax_update_bw'); ?>";
                                saveUpdateOutputSewing(url, dataStr);
                            }
                        }
                        // break;
                    });
                } else if (codeSplit[0] == "CU") {
                    $.ajax({
                        url: "<?php echo site_url('outputsewing/ajax_get_by_line_date_now'); ?>",
                        type: 'POST',
                        data: {
                            'dataOrcBundle': dataOrcBundle
                        },
                        dataType: 'json',
                    }).done(function(val) {
                        if (val != null) {
                            if (val.cups != "00:00:00") {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'Warning!!',
                                    text: 'Bundle CUPS ini sudah di-SCAN!!',
                                    showCancelButton: false,
                                    timer: 2000
                                });
                                refreshTable(codeSplit[1]);
                                $('#bundle_barcode').val('');
                                $('#bundle_barcode').focus('');
                            } else {
                                dataStr = {
                                    'center_panel': timeStr,
                                    'cups_sam_result': dt.qty_pcs * dt.cups_sam,
                                    'kode_barcode': codeSplit[1],
                                };
                                url = "<?php echo site_url('outputsewing/ajax_update_cu'); ?>";
                                saveUpdateOutputSewing(url, dataStr);
                            }
                        }
                        // break
                    });
                } else if (codeSplit[0] == "AS") {
                    $.ajax({
                        url: "<?php echo site_url('outputsewing/ajax_get_by_line_date_now'); ?>",
                        type: 'POST',
                        data: {
                            'dataOrcBundle': dataOrcBundle
                        },
                        dataType: 'json',
                    }).done(function(val) {
                        if (val != null) {
                            // if (val.center_panel == "00:00:00" || val.back_wings == "00:00:00" || val.cups == "00:00:00") {
                            //     Swal.fire({
                            //         type: "warning",
                            //         title: "Warning!!",
                            //         text: "Scan Bundle Assembly ini TIDAK DIPERBOLEHKAN karena ada bagian lain (CENTER PANEL/BACK WINGS/CUPS) yang belum di-Scan!!",
                            //         // showConfirmButton: false,
                            //         timer: 3500
                            //     });
                            //     $('#bundle_barcode').val('');
                            //     $('#bundle_barcode').focus('');
                            //     // reloadTable();
                            //     refreshTable(codeSplit[1]);
                            // } else
							 if (val.assembly != "00:00:00") {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'Warning!!',
                                    text: 'Bundle ASSEMBLY ini sudah di-SCAN!!',
                                    showCancelButton: false,
                                    timer: 1750
                                });
                                $('#bundle_barcode').val('');
                                $('#bundle_barcode').focus('');
                            } else {
                                dataStr = {
                                    'center_panel': timeStr,
                                    'assembly_sam_result': dt.qty_pcs * dt.assembly_sam,
                                    'kode_barcode': codeSplit[1],
                                };
                                url = "<?php echo site_url('outputsewing/ajax_update_as'); ?>";
                                saveUpdateOutputSewing(url, dataStr);
                            }
                        }
                    });
                }
            }

            function saveUpdateOutputSewing(u, data) {
                $.ajax({
                    url: u,
                    type: "POST",
                    data: {
                        'dataStr': data
                    },
                    dataType: 'json'
                }).done(function(dt) {
                    if (dt > 0) {
                        console.log('codeSplit: ', codeSplit[1]);
                        Swal.fire({
                            type: 'info',
                            title: 'success',
                            text: 'Save data success!!',
                            showCancelButton: false,
                            timer: 1750
                        });
                        // reloadTable();
                        // getLastRecord();
                        // refreshTable(codeSplit[1]);
                        reloadTable();

                        $('#bundle_barcode').val('');
                        $('#bundle_barcode').focus();
                    }
                });
            }

            function refreshTable(b) {
                $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_get_by_barcode2'); ?>/" + b,
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
                        '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit Qty" onclick="editQty(' + "'" + row.id_output_sewing_detail + "'" + ')"><i class="fa fa-pencil"></i> Edit Qty</a>'
                    ]).draw();
                });

                $('#bundle_barcode').val('');
                $('#bundle_barcode').focus();
            }
        });

        function reloadTable() {
            table.ajax.reload(null, false);
        }

        function editQty(id) {
            $('#modal_edit_qty').modal('show');

            $('#btnSaveQty').click(function() {
                // console.log('id', id);
                var qty = $('#qty').val();
                var dataStr = {
                    'qty': qty,
                    'idOutputSewingDetail': id
                };
                $.ajax({
                    url: "<?php echo site_url('outputsewing/ajax_update_qty'); ?>",
                    type: "POST",
                    data: {
                        'dataStr': dataStr
                    },
                    dataType: 'json',
                    success: function(d) {
                        if (d > 0) {
                            Swal.fire({
                                type: 'info',
                                title: 'success',
                                text: 'Update Qty success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        reloadTable();
                        $('#bundle_barcode').focus();
                    }
                })
            });
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
                        url: '<?php echo site_url("outputsewing/ajax_delete_bundle"); ?>/' + id,
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
