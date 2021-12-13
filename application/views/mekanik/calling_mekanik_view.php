<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Output Sewing</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/js.php'); ?>
    <?php $this->load->view('_partials/css.php'); ?>
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/smart_wizard/css/smart_wizard.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/smart_wizard/css/smart_wizard_theme_arrows.min.css'); ?>" rel="stylesheet">
    <style rel="stylesheet">
        td.highlight-waiting {
            font-weight: bold;
            color: red;
        }

        td.highlight-repairing {
            font-weight: bold;
            color: yellow;
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
                            <h1 class="m-0 text-dark">Machine Breakdown </h1>
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="tabs"></div>
                                    <!-- <div id="smartwizard"></div> -->
                                    <div class="card card-danger">
                                        <div class="card-header text-center">
                                            <h3 class="card-title">Machines Breakdown - Line <?php echo $this->session->userdata['username']; ?></h3>
                                        </div>
                                        <div class="card-body">
                                            <!-- <div class="form-group row">
                                                <label>Scan Barcode Here:</label>
                                                <input type="text" id="machine_barcode" class="form-control">
                                            </div>-->
                                            <hr>
                                            <table id="machinesBreakdownTable" class="table table-info table-bordered table-striped" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Barcode</th>
                                                        <th>Machine Brand</th>
                                                        <th>Machine Type</th>
                                                        <th>Machine SN</th>
                                                        <th>Symptom</th>
                                                        <th>Status</th>
                                                        <th>Duration</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Barcode</th>
                                                        <th>Machine Brand</th>
                                                        <th>Machine Type</th>
                                                        <th>Machine SN</th>
                                                        <th>Symptom</th>
                                                        <th>Status</th>
                                                        <th>Duration</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                        <div class="card-footer">
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

    <?php $this->load->view('_partials/modal.php'); ?>
    <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/scanner-detection/jquery.scannerdetection.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/easytimer/easytimer.min.js'); ?>"></script>
    <!-- <script src="<//?php echo base_url('dist/js/stopwatch.js'); ?>"></script> -->
    <script src="<?php echo base_url('plugins/validator/js/validator.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/smart_wizard/js/jquery.smartWizard.min.js'); ?>"></script>
    <!-- <script src="<//?php echo base_url("myJS/myControllers/appscanningbarcode.js"); ?>"></script> -->

    <script>
        (function() {
            var firstBarcode;
            var firstBarcodeLength;
            var secondBarcode;
            var thirdBarcode;

            $(document).ready(function() {
                firstBarcode = localStorage.getItem('firstBarcode');
                firstBarcodeLength = firstBarcode.length;

                var tableMachinesBreakdown = $('#machinesBreakdownTable').DataTable({
                    "destroy": true,
                    "createdRow": function(row, data, dataIndex) {
                        for (y = 0; y <= 7; y++) {
                            $('td', row).eq(y).css({
                                'color': (data[6] == "Waiting..." ? "red" : "yellow"),
                                'background-color': (data[6] == "Waiting..." ? "yellow" : "red")
                            });
                        }
                        // if (data[5] == "Waiting...") {
                        //     // $(row).addClass('red');
                        //     $('td', row).eq(0).css('color', 'red');
                        //     $('td', row).eq(0).css('background-color', 'yellow');

                        //     $('td', row).eq(1).css('color', 'red');
                        //     $('td', row).eq(1).css('background-color', 'yellow');

                        //     $('td', row).eq(1).css('color', 'red');
                        //     $('td', row).eq(1).css('background-color', 'yellow');

                        //     $('td', row).eq(2).css('color', 'red');
                        //     $('td', row).eq(2).css('background-color', 'yellow');

                        //     $('td', row).eq(3).css('color', 'red');
                        //     $('td', row).eq(3).css('background-color', 'yellow');

                        //     $('td', row).eq(4).css('color', 'red');
                        //     $('td', row).eq(4).css('background-color', 'yellow');

                        //     $('td', row).eq(5).css('color', 'red');
                        //     $('td', row).eq(5).css('background-color', 'yellow');

                        //     $('td', row).eq(6).addClass('highlight-waiting');
                        //     $('td', row).eq(6).css('background-color', 'yellow');

                        // } else if (data[5] == "Repairing...") {
                        //     $('td', row).eq(0).css('color', 'yellow');
                        //     $('td', row).eq(0).css('background-color', 'red');
                        //     $('td', row).eq(1).css('color', 'yellow');
                        //     $('td', row).eq(1).css('background-color', 'red');
                        //     $('td', row).eq(2).css('color', 'yellow');
                        //     $('td', row).eq(2).css('background-color', 'red');
                        //     $('td', row).eq(3).css('color', 'yellow');
                        //     $('td', row).eq(3).css('background-color', 'red');
                        //     $('td', row).eq(4).css('color', 'yellow');
                        //     $('td', row).eq(4).css('background-color', 'red');
                        //     $('td', row).eq(5).css('color', 'yellow');
                        //     $('td', row).eq(5).css('background-color', 'red');
                        //     $('td', row).eq(6).addClass('highlight-repairing');
                        //     $('td', row).eq(6).css('background-color', 'red');

                        // }
                    }
                });

                function showMachineBreakdownAndRepairing() {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("Mekanik/ajax_get_machines_breakdown_repairing"); ?>',
                        dataType: 'json',
                    }).done(function(dataReturn) {
                        if (dataReturn != null) {
                            $.each(dataReturn, function(i, item) {
                                tableMachinesBreakdown.row.add([
                                    item.id_machine_breakdown,
                                    item.barcode_machine,
                                    item.machine_brand,
                                    item.machine_type,
                                    item.machine_sn,
                                    item.sympton,
                                    item.status,
                                    "<div class='tmr' id='" + item.id_machine_breakdown + "'></div>"
                                ]).draw();

                                var timer = new easytimer.Timer();
                                timer.start({
                                    precision: 'seconds',
                                    startValues: {
                                        hours: parseInt(item.duration.substr(0, 2)),
                                        minutes: parseInt(item.duration.substr(3, 2)),
                                        seconds: parseInt(item.duration.substr(6, 2)),
                                    }
                                });
                                timer.addEventListener('secondsUpdated', function(e) {
                                    $("#" + item.id_machine_breakdown.toString()).html(timer.getTimeValues().toString());
                                });

                            });
                        }
                    });
                }

                showMachineBreakdownAndRepairing();

                showWizard();

                function showWizard() {
                    if (firstBarcodeLength == 10 || firstBarcodeLength == 12) {
                        checkMachineBreakdown(firstBarcode).done(function(rsp) {
                            console.log('rsp: ', rsp);
                            if (rsp == null) {
                                machineBreakdownWizard(firstBarcode);
                            } else {
                                // if(rsp.length > 0){
                                if (rsp.status == "Settled") {
                                    machineBreakdownWizard();
                                } else if (rsp.status == "Waiting...") {
                                    machineRepairingWizard(rsp);
                                } else if (rsp.status == "Repairing...") {
                                    machineSettledOrDelayedWizard();
                                } else if (rsp.status == "Delayed") {
                                    machineSettledWizard();
                                }
                                // }
                            }
                        });
                    }

                    function machineBreakdownWizard() {
                        var html = "";
                        html +=
                            '<div class="card-header d-flex p-0">' +
                            '<h3 class="card-title p-3">' +
                            '<i class="fa fa-flag mr-1"></i>' +
                            'Mechine Breakdown' +
                            '</h3>' +
                            '<ul class="nav nav-pills ml-auto p-2" role="tablist">' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" id="a-step-1" href="#step-1" data-toggle="tab">Barcode Machine</a>' +
                            '</li>' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" href="#step-2" id="a-step-2" data-toggle="tab">Barcode Symptom</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="tab-content p-0">' +
                            '<div class="tab-pane" role="tabpanel" id="step-1">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Machine:</label>' +
                            '<input type="text" class="form-control" id="barcodeMachine" value=' + firstBarcode + '>' +
                            '</div>' +
                            '</div>' +
                            '<div class="tab-pane" role="tabpanel" id="step-2">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Symptom:</label>' +
                            '<input type="text" id="barcodeSymptom" class="form-control" maxlength="10">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#tabs').html(html);
                        $('#a-step-2').addClass('active show');
                        $('#step-2').addClass('active show');
                        $('#barcodeSymptom').focus();

                        $('#barcodeSymptom').keypress(function(e) {
                            if (e.keyCode == 13) {
                                let kode = $(this).val();
                                // let barcodePrefix = $(this).val().substr(0,2);
                                let barcodePrefix = kode.substr(0, 2);
                                if (barcodePrefix.toUpperCase() != "MM") {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'Warning!',
                                        html: '<h3 style="color: red;"><strong>Invalid barcode symptom!!</strong></h3>',
                                        showConfirmButton: false,
                                        timer: 4000
                                    });
                                    $('#barcodeSymptom').val('');
                                    $('#barcodeSymptom').focus();
                                } else {
                                    e.preventDefault();
                                    // secondBarcode = $('#barcodeSymptom').val();
                                    secondBarcode = kode.toUpperCase();


                                    addMachineBreakdown(firstBarcode, secondBarcode);
                                }
                            }
                        });
                    }

                    function machineRepairingWizard(dataResponseMachine) {
                        var html = "";
                        html +=
                            '<div class="card-header d-flex p-0">' +
                            '<h3 class="card-title p-3">' +
                            '<i class="fa fa-gear mr-1"></i>' +
                            'Mechine Repairing' +
                            '</h3>' +
                            '<ul class="nav nav-pills ml-auto p-2" role="tablist">' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" id="a-step-1" href="#step-1" data-toggle="tab">Barcode Machine</a>' +
                            '</li>' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" href="#step-2" id="a-step-2" data-toggle="tab">Barcode Mechanic ID</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="tab-content p-0">' +
                            '<div class="tab-pane" role="tabpanel" id="step-1">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Machine:</label>' +
                            '<input type="text" class="form-control" id="barcodeMachine" value=' + firstBarcode + '>' +
                            '</div>' +
                            '</div>' +
                            '<div class="tab-pane" role="tabpanel" id="step-2">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Mechanic ID:</label>' +
                            '<input type="text" id="barcodeMechanic" class="form-control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#tabs').html(html);
                        $('#a-step-2').addClass('active show');
                        $('#step-2').addClass('active show');
                        $('#barcodeMechanic').focus();

                        $('#barcodeMechanic').keypress(function(e) {
                            if (e.keyCode == 13) {
                                let kode = $(this).val();
                                // let barcodePrefix = $(this).val().substr(0,2);
                                let barcodePrefix = kode.substr(0, 2);
                                if (barcodePrefix.toUpperCase() != "MK") {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'Warning',
                                        html: '<h3 style="color: red;"><strong>Invalid barcode mechanic!!</strong></h3>',
                                        showConfirmButton: false,
                                        timer: 4000
                                    });
                                    $(this).val('');
                                    $(this).focus();
                                } else {
                                    e.preventDefault();
                                    // secondBarcode = $('#barcodeMechanic').val();
                                    secondBarcode = kode.toUpperCase();
                                    console.log('secondBarcode: ', secondBarcode);

                                    $.ajax({
                                        type: 'GET',
                                        url: '<?php echo site_url("Mekanik/ajax_get_mekanik_by_barcode"); ?>/' + secondBarcode,
                                        dataType: 'json'
                                    }).done(function(rV) {
                                        console.log('rV: ', rV);
                                        if (rV != null) {
                                            var dataMachineRepairing = {
                                                'barcode': firstBarcode,
                                                'id_machine_breakdown': dataResponseMachine.id_machine_breakdown,
                                                'id_mekanik_member': rV.id_mekanik_member
                                            };
                                            addMachineRepairing(dataMachineRepairing);
                                        }
                                    });
                                }
                            }
                        });
                    }

                    function machineSettledWizard() {
                        var html = "";
                        html +=
                            '<div class="card-header d-flex p-0">' +
                            '<h3 class="card-title p-3">' +
                            '<i class="fa fa-check mr-1"></i>' +
                            'Machine Settled' +
                            '</h3>' +
                            '<ul class="nav nav-pills ml-auto p-2" role="tablist">' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" id="a-step-1" href="#step-1" data-toggle="tab">Barcode Machine</a>' +
                            '</li>' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" href="#step-2" id="a-step-2" data-toggle="tab">Barcode Supervisor ID</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="tab-content p-0">' +
                            '<div class="tab-pane" role="tabpanel" id="step-1">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Machine:</label>' +
                            '<input type="text" class="form-control" id="barcodeMachine" value=' + firstBarcode + '>' +
                            '</div>' +
                            '</div>' +
                            '<div class="tab-pane" role="tabpanel" id="step-2">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Symptom:</label>' +
                            '<input type="text" id="barcodeSupervisor" class="form-control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#tabs').html(html);
                        $('#a-step-2').addClass('active show');
                        $('#step-2').addClass('active show');
                        $('#barcodeSupervisor').focus();

                        $('#barcodeSupervisor').keypress(function(e) {
                            if (e.keyCode == 13) {
                                let kode = $(this).val();
                                // let barcodePrefix = $(this).val().substr(0,2);
                                let barcodePrefix = kode.substr(0, 2);
                                if (barcodePrefix.toUpperCase() != "SP") {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'Warning!',
                                        html: '<h3 style="color: red;"><strong>Invalid barcode supervisor!!</strong></h3>',
                                        showConfirmButton: false,
                                        timer: 4000
                                    });
                                    $(this).val('');
                                    $(this).focus();
                                } else {
                                    e.preventDefault();
                                    // secondBarcode = $('#barcodeSupervisor').val();
                                    secondBarcode = kode.toUpperCase();
                                    console.log('secondBarcode: ', secondBarcode);
                                    getDataForMachineSettled(firstBarcode, secondBarcode);
                                }
                            }
                        });
                    }

                    function getDataForMachineSettled(machineCode, spvCode) {
                        $.when(
                            $.ajax({
                                type: 'GET',
                                url: '<?php echo site_url("Mekanik/ajax_get_viewmachinebreakdown_by_barcode"); ?>/' + firstBarcode,
                                dataType: 'json'
                            }),
                            $.ajax({
                                type: 'GET',
                                url: '<?php echo site_url("Mekanik/ajax_get_spv_by_barcode"); ?>/' + secondBarcode,
                                dataType: 'json'
                            })
                        ).done(function(val1, val2) {
                            var dataMachineState = {
                                'id_mekanik_repairing': val1[0].id_mekanik_repairing,
                                'id_machine_breakdown': val1[0].id_machine_breakdown,
                                'id_mekanik_member': val1[0].id_mekanik_member,
                                'line': '<?php echo $this->session->userdata("username"); ?>',
                                'spv_name': val2[0].name,
                                'status': 'settled',
                                'barcode_machine': firstBarcode
                            }
                            console.log('dataMachineState: ', dataMachineState);

                            addMachineSettled(dataMachineState);
                        })
                    }

                    function machineSettledOrDelayedWizard() {
                        var html = "";
                        html +=
                            '<div class="card-header d-flex p-0">' +
                            '<h3 class="card-title p-3">' +
                            '<i class="fa fa-flag mr-1"></i>' +
                            'Mechine Settled/Delayed' +
                            '</h3>' +
                            '<ul class="nav nav-pills ml-auto p-2" role="tablist">' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" id="a-step-1" href="#step-1" data-toggle="tab">Barcode Machine</a>' +
                            '</li>' +
                            '<li class="nav-item">' +
                            '<a class="nav-link" href="#step-2" id="a-step-2" data-toggle="tab">Barcode Delayed/Settled</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="tab-content p-0">' +
                            '<div class="tab-pane" role="tabpanel" id="step-1">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Machine:</label>' +
                            '<input type="text" class="form-control" id="barcodeMachine" value=' + firstBarcode + '>' +
                            '</div>' +
                            '</div>' +
                            '<div class="tab-pane" role="tabpanel" id="step-2">' +
                            '<div class="form-group row">' +
                            '<label>Barcode Supervisor ID/Barcode Duration:</label>' +
                            '<input type="text" id="barcodeStep2" class="form-control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#tabs').html(html);
                        $('#a-step-2').addClass('active show');
                        $('#step-2').addClass('active show');
                        $('#barcodeStep2').focus();

                        $('#barcodeStep2').keypress(function(e) {
                            if (e.keyCode == 13) {
                                e.preventDefault();
                                let kode = $(this).val();
                                let barcodePrefix = kode.substr(0, 2);
                                // secondBarcode = $(this).val();
                                if (barcodePrefix.toUpperCase() == "SP") {
                                    secondBarcode = kode.toUpperCase();
                                    getDataForMachineSettled(firstBarcode, secondBarcode);
                                } else if (barcodePrefix.toUpperCase() == "D-") {
                                    secondBarcode = kode.toUpperCase();
                                    getDataForMachineDelayed(firstBarcode, secondBarcode);
                                } else if (barcodePrefix.toUpperCase() != "SP" || barcodePrefix.toUpperCase() != "D-") {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'Warning',
                                        html: '<b>Invalid barcode supervisor or invalid barcode duration!!',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    $(this).val('');
                                    $(this).focus();
                                }
                            }
                        });

                    }

                    function getDataForMachineDelayed(firstCode, secondCode) {
                        $.when(
                            $.ajax({
                                type: 'GET',
                                url: '<?php echo site_url("Mekanik/ajax_get_viewmachinebreakdown_by_barcode"); ?>/' + firstBarcode,
                                dataType: 'json',
                            }),
                            $.ajax({
                                type: 'GET',
                                url: '<?php echo site_url("Mekanik/ajax_get_spv_by_barcode"); ?>/' + thirdBarcode,
                                dataType: 'json'
                            }),
                        ).done(function(retVal1, retVal2) {
                            var dataForSettlement = {
                                "id_machine_breakdown": retVal1[0].id_machine_breakdown,
                                "id_mekanik_repairing": retVal1[0].id_mekanik_repairing,
                                "barcode_settlement": secondBarcode
                            };
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo site_url("Mekanik/ajax_add_settlement"); ?>',
                                data: {
                                    'dataForSettlement': dataForSettlement
                                },
                                dataType: 'json'
                            }).done(function(insertedId) {
                                if (insertedId > 0) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Success',
                                        text: 'Save data settlement success.',
                                        showConfirmButton: false,
                                        timer: 1800
                                    });
                                    setTimeout(backToSewing, 800);
                                } else {
                                    Swal.fire({
                                        type: 'warning',
                                        title: 'Warning',
                                        text: 'Save data settlement fail. Something wrong happened',
                                        showConfirmButton: false,
                                        timer: 2500
                                    });
                                }

                            });
                        })
                    }

                    function addMachineSettled(dataSettled) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("Mekanik/ajax_add_machine_settled"); ?>',
                            data: {
                                'dataMachineState': dataSettled
                            },
                            dataType: 'json'
                        }).done(function(id) {
                            if (id > 0) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Success',
                                    html: '<h3 style="color: green;"><strong>Machine settled success added!</strong></h3>',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    onAfterClose: () => {
                                        backToSewing();
                                    }
                                });
                                // setTimeout(backToSewing, 800);

                                // let rowIndex = tableMachinesBreakdown.rows().eq(0).filter(function(rowIdx) {
                                //         return tableMachinesBreakdown.cell(rowIdx, 0).data() == dataSettled.id_machine_breakdown;
                                // });

                                // tableMachinesBreakdown.row(rowIndex).remove().draw();
                            }
                        });
                    }

                    function addMachineBreakdown(machineBarcode, symptomBarcode) {
                        $('#barcodeSymptom').prop('disabled', true);
                        let dataMachineBreakdown = {
                            'codeMesin': machineBarcode,
                            'codeSympton': symptomBarcode
                        };
						
						console.log('dataMachineBreakdown: ', dataMachineBreakdown);

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("Mekanik/ajax_add_machine_breakdown"); ?>',
                            data: {
                                'dataBarcode': dataMachineBreakdown
                            },
                            dataType: 'json'
                        }).done(function(idMachineBreakdown) {
                            console.log('idMachineBreakdown: ', idMachineBreakdown);
                            if (idMachineBreakdown > 0) {
                                var dataNotif = {
                                    'title': 'New Order',
                                    'id': idMachineBreakdown
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo site_url("Mekanik/sendNotification"); ?>',
                                    data: {
                                        'dataNotif': dataNotif
                                    }
                                }).done(function(result) {
                                    console.log('result: ', result);
                                    if (result != null) {
                                        jsonResult = JSON.parse(result);
                                        console.log('jsonResult: ', jsonResult);
                                        if (jsonResult.success > 0) {
                                            Swal.fire({
                                                type: 'success',
                                                title: 'Success',
                                                html: '<h3 style="color: green;"></strong>Data machine breakdown added successfully</strong</h3>',
                                                showConfirmButton: false,
                                                timer: 4000,
                                                onAfterClose: () => {
                                                    backToSewing();
                                                }
                                            });

                                        }
                                    }
                                });
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Error!!',
                                    text: 'Add data failed!, something wrong happened!!',
                                    showConfirmButton: true,
                                });
                                // window.open('<//?php echo site_url("outputsewing"); ?>');
                            }
                            // window.open('<//?php echo site_url("outputsewing"); ?>');
                            // setTimeout(backToSewing, 800);
                        });
                    }

                    function addMachineRepairing(dataMR) {

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("Mekanik/ajax_add_mekanik_repairing"); ?>',
                            data: {
                                'dataMekanikRepairing': dataMR
                            },
                            dataType: 'json'
                        }).done(function(retVal) {
                            if (retVal != null) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Success',
                                    html: '<h3 style="color: green;"><strong>Save machine repairing data success!</strong></h3>',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    onAfterClose: () => {
                                        backToSewing();
                                    }
                                });
                                // setTimeout(backToSewing, 800);
                                //show at machine repairing table...
                                // showMachineRepairing(retVal);
                                // drawingTheTable();
                            }
                        });
                    }

                }

                function backToSewing() {
                    window.open('<?php echo site_url("outputsewing"); ?>', '_self');
                }


                // showMachineBreakdownAndRepairing();
                // checkMachineBreakdown(firstBarcode).done(function(resp){

                // })
            });

            function checkMachineBreakdown(c) {
                return $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url("Mekanik/ajax_check_machine_at_breakdown"); ?>/' + c,
                    dataType: 'json',
                    success: function(response) {}
                });
            }
        })();
    </script>


</body>

</html>
