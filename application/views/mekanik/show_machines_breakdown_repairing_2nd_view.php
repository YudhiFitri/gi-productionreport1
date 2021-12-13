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
    <link href="<?php echo base_url('plugins/tipped/css/tipped.css'); ?>" rel="stylesheet">
    <!-- <link href="<//?php echo base_url('plugins/tooltipster/css/tooltipster.bundle.min.css'); ?>" rel="stylesheet"> -->
</head>

<!-- <body class="hold-transition sidebar-mini"> -->

<body class="layout-top-nav sidebar-collapse" style="height: auto">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partials/navbar_mekanik.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- <//?php $this->load->view('_partials/sidebar_mekanik.php'); ?> -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-warning card-outline">
                                <div class="card-header">
                                    <h3 class="card-title text-center">
                                        Calling For Machine Breakdown - 2nd Floor
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div id="secondCol"></div>
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
    <script src="<?php echo base_url('plugins/tipped/js/tipped.min.js'); ?>"></script>

    <!-- <script src="<//?php echo base_url('plugins/tooltipster/js/tooltipster.bundle.min.js'); ?>"></script> -->
    <!-- <script src="<//?php echo base_url('dist/js/stopwatch.js'); ?>"></script> -->


    <script>
        var secondFloorColOld;
        var secondFloorColNew;
        var secondColTimer = [];
        var data2ndFloorOld;
        var rowTable;
        var data2ndFloor = "";
        
        show2ndFloorData();

        function show2ndFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_2ndfloor_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                secondFloorColOld = [];
                data2ndFloorOld = "";
                $.each(data, function(i, item) {
                    //add to secondFloorColOld array
                    secondFloorColOld.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'machine_brand': item.machine_brand,
                        'line': item.line,
                        'tgl': item.tgl,
                        'type': item.type,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
                        'floor': item.floor,
                        'sympton': item.sympton,
                        'status': item.status,
                        'inisial': item.inisial,
                        'duration': item.duration
                    });

                    //tampilkan
                    data2ndFloorOld +=
                        "<div class='col-md-4'>" +
                            // "<a href='#' id='tip" + item.id_machine_breakdown.toString() + "'>" +
                                "<div id='secondFloor" + item.id_machine_breakdown.toString() + "' class='" + (item.status == "Waiting..." ? "small-box bg-danger shadow" : "small-box bg-warning shadow") + "'>" +
                                    "<div class='inner'>" +
                                        "<h4 class='info-box-text' id='" + item.id_machine_breakdown + "' style='font-weight: bold;'></h4>" +
                                        "<p>" +
                                            "Machine Type: <b>" + item.machine_type + "</b>" +
                                            ";  Line: <b>" + item.line + "</b>" +
                                        "</p>" +
                                    "</div>" +
                                    "<div class='icon'><i class='" + (item.status == "Waiting..." ? "ion ion-flag" : "ion ion-wrench") + "'></i></div>" +
                                    "<a href='#' id='detail" + item.id_machine_breakdown.toString() + "' class='" + "small-box-footer" + "' data-toggle='modal' data-target='" + "#modalDetail" + item.id_machine_breakdown.toString() + "'>show detail " + 
                                        "<i class='fa fa-arrow-circle-right'></i>" + 
                                    "</a>" +
                                "</div>" +
                            // "</a>" +
                        "</div>" + 
                        "<div class='modal fade' id='" + "modalDetail" + item.id_machine_breakdown.toString() + "' tabindex='-1'"  + "role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +
                            "<div class='modal-dialog modal-dialog-centered' role='document'>" +
                                "<div class='modal-content bg-info'>" + 
                                    "<div class='modal-header'>" +
                                        "<h5 class='modal-title text-center' id='exampleModalLabel'>Machine Detail</h5>" +
                                        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
                                            "<span aria-hidden='true'>&times;</span>" +
                                        "</button>" +
                                    "</div>" +
                                    "<div class='modal-body'>" +
                                        "<p>Machine Brand: <b>" + item.machine_brand + "</b></p>" +
                                        "<p>Machine Type: <b>" + item.machine_type + "</b></p>" +
                                        "<p>Type: <b>" + item.type + "</b></p>" +
                                        "<p>Machine SN: <b>" + item.machine_sn + "</b></p>" +
                                        "<p>Sympthon: <b>" + item.sympton + "</b></p>" +
                                        "<p id='" + "status" + item.id_machine_breakdown + "'>Status: <b>" + (item.status == "Waiting..." ? "Waiting for mechanic" : "Repairing By " + item.inisial) + "</b></p>" +
                                    "</div>" +
                                    "<div class='modal-footer'>" +
                                        "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>";                        

                    secondColTimer[item.id_machine_breakdown] = new easytimer.Timer();

                    secondColTimer[item.id_machine_breakdown].start({
                        precision: 'seconds',
                        startValues: {
                            hours: parseInt(item.duration.substr(0, 2)),
                            minutes: parseInt(item.duration.substr(3, 2)),
                            seconds: parseInt(item.duration.substr(6, 2)),
                        }
                    });
                    secondColTimer[item.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                        $("#" + item.id_machine_breakdown.toString()).html(secondColTimer[item.id_machine_breakdown].getTimeValues().toString());
                    });

                });
                $("<div class='row' id='secondFloor'>" + data2ndFloorOld + "</div>").appendTo($('#secondCol'));
            });
        }

        setInterval("fetch2ndFloorData();", 10000);

        function fetch2ndFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_2ndfloor_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                secondFloorColNew = [];
                data2ndFloorOld = "";
                $.each(data, function(i, item) {
                    //add to secondFloorColOld array
                    secondFloorColNew.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'machine_brand': item.machine_brand,
                        'line': item.line,
                        'tgl': item.tgl,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
                        'type': item.type,
                        'floor': item.floor,
                        'sympton': item.sympton,
                        'status': item.status,
                        'inisial': item.inisial,
                        'duration': item.duration
                    });
                });

                comparing2ndFloorData();
            });
        }

        function comparing2ndFloorData() {
            if (secondFloorColOld.length < secondFloorColNew.length) {
                var onlyInNew = secondFloorColNew.filter(comparer(secondFloorColOld));
                var onlyInOld = secondFloorColOld.filter(comparer(secondFloorColNew));
                var result = onlyInNew.concat(onlyInOld);

                //add to secondFloorColOld array
                secondFloorColOld.push({
                    'id_machine_breakdown': result[0].id_machine_breakdown,
                    'line': result[0].line,
                    'tgl': result[0].tgl,
                    'machine_type': result[0].machine_type,
                    'machine_sn': result[0].machine_sn,
                    'type': result[0].type,
                    'floor': result[0].floor,
                    'sympton': result[0].sympton,
                    'status': result[0].status,
                    'inisial': result[0].inisial,
                    'duration': result[0].duration
                });

                //add the machine breakdown
                var data2ndFloorAdd = "";
                data2ndFloorAdd +=
                    "<div class='col-md-4'>" +
                        // "<a href='#' id='tip" + item.id_machine_breakdown.toString() + "'>" +
                        "<div id='secondFloor" + result[0].id_machine_breakdown.toString() + "' class='" + (result[0].status == "Waiting..." ? "small-box bg-danger shadow" : "small-box bg-warning shadow") + "'>" +
                            "<div class='inner'>" +
                                "<h4 class='info-box-text' id='" + result[0].id_machine_breakdown + "' style='font-weight: bold;'></h4>" +
                                "<p>" +
                                    "Machine Type: <b>" + result[0].machine_type + "</b>" +
                                    ";  Line: <b>" + result[0].line + "</b>" +
                                "</p>" +                                
                            "</div>" +
                            "<div class='icon'><i class='" + (result[0].status == "Waiting..." ? "ion ion-flag" : "ion ion-wrench") + "'></i></div>" +
                                "<a href='#' id='detail" + result[0].id_machine_breakdown.toString() + "' class='" + "small-box-footer" + "' data-toggle='modal' data-target='" + "#modalDetail" + result[0].id_machine_breakdown.toString() + "'>show detail " + 
                                    "<i class='fa fa-arrow-circle-right'></i>" + 
                                "</a>" +
                            "</div>" +
                            // "</a>" +
                        "</div>" + 
                        "<div class='modal fade' id='" + "modalDetail" + result[0].id_machine_breakdown.toString() + "' tabindex='-1'"  + "role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +
                            "<div class='modal-dialog modal-dialog-centered' role='document'>" +
                                "<div class='modal-content bg-info'>" + 
                                    "<div class='modal-header'>" +
                                        "<h5 class='modal-title text-center' id='exampleModalLabel'>Machine Detail</h5>" +
                                        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
                                            "<span aria-hidden='true'>&times;</span>" +
                                        "</button>" +
                                    "</div>" +
                                    "<div class='modal-body'>" +
                                        "<p>Machine Brand: <b>" + result[0].machine_brand + "</b></p>" +
                                        "<p>Machine Type: <b>" + result[0].machine_type + "</b></p>" +
                                        "<p>Type: <b>" + result[0].type + "</b></p>" +
                                        "<p>Machine SN: <b>" + result[0].machine_sn + "</b></p>" +
                                        "<p>Status: <b>" + (result[0].status == "Waiting..." ? "Waiting for mechanic" : "Repairing By " + result[0].inisial) + "</b></p>" +
                                    "</div>" +
                                    "<div class='modal-footer'>" +
                                        "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>" +
                                    "</div>" +
                                "</div>" +
                        "</div>" +
                    "</div>";                    
                // var secondColTimerNew = new easytimer.Timer();
                secondColTimer[result[0].id_machine_breakdown] = '';
                secondColTimer[result[0].id_machine_breakdown] = new easytimer.Timer();
                secondColTimer[result[0].id_machine_breakdown].start({
                    precision: 'seconds',
                    startValues: {
                        hours: parseInt(result[0].duration.substr(0, 2)),
                        minutes: parseInt(result[0].duration.substr(3, 2)),
                        seconds: parseInt(result[0].duration.substr(6, 2)),
                    }
                });
                secondColTimer[result[0].id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                    $("#" + result[0].id_machine_breakdown.toString()).html(secondColTimer[result[0].id_machine_breakdown].getTimeValues().toString());
                });
                $(data2ndFloorAdd).appendTo($('#secondFloor'));


                //add new tool tip for new breakdown
                // createToolTip2New(result);
            } else if (secondFloorColOld.length == secondFloorColNew.length) {
                var data2ndFloorChange = "";
                $.each(secondFloorColNew, function(i, itemNew) {
                    $.each(secondFloorColOld, function(x, itemOld) {
                        if (itemNew.status != itemOld.status && itemNew.id_machine_breakdown == itemOld.id_machine_breakdown) {
                            $('#secondFloor' + itemOld.id_machine_breakdown.toString()).removeClass('bg-danger').addClass('bg-warning').empty();
                            // $('#secondFloor' + itemOld.id_machine_breakdown.toString()).empty();
                            itemOld.status = "Repairing...";
                            itemOld.inisial = itemNew.inisial;
                            itemOld.duration = itemNew.duration;
                            data2ndFloorChange +=
                                "<div id='secondFloor" + itemOld.id_machine_breakdown.toString() + "' class='" + "small-box bg-warning shadow" + "'>" +
                                    "<div class='inner'>" +
                                        "<h4 class='info-box-text' id='" + itemOld.id_machine_breakdown + "' style='font-weight: bold;'></h4>" +
                                        "<p>" +
                                            "Machine Type: <b>" + itemOld.machine_type + "</b>" +
                                            ";  Line: <b>" + itemOld.line + "</b>" +
                                        "</p>" +                                        
                                    "</div>" +
                                    "<div class='icon'><i class='" + "ion ion-wrench" + "'></i></div>" +
                                        "<a href='#' id='detail" + itemOld.id_machine_breakdown.toString() + "' class='" + "small-box-footer" + "' data-toggle='modal' data-target='" + "#modalDetail" + itemOld.id_machine_breakdown.toString() + "'>show detail " + 
                                            "<i class='fa fa-arrow-circle-right'></i>" + 
                                        "</a>" +
                                    "</div>" +
                                "</div>";
                                
                            secondColTimer[itemOld.id_machine_breakdown] = '';

                            secondColTimer[itemOld.id_machine_breakdown] = new easytimer.Timer();
                            secondColTimer[itemOld.id_machine_breakdown].start({
                                precision: 'seconds',
                                startValues: {
                                    hours: parseInt(itemOld.duration.substr(0, 2)),
                                    minutes: parseInt(itemOld.duration.substr(3, 2)),
                                    seconds: parseInt(itemOld.duration.substr(6, 2)),
                                }
                            });
                            secondColTimer[itemOld.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                                $("#" + itemOld.id_machine_breakdown.toString()).html(secondColTimer[itemOld.id_machine_breakdown].getTimeValues().toString());
                            });

                            $('#secondFloor' + itemOld.id_machine_breakdown.toString()).append(data2ndFloorChange);
                            $('#status' + itemOld.id_machine_breakdown).html("Status: " + "<b>Repairing by " + itemOld.inisial + "</b>");
                            //change tooltip
                            // changeTooltip1(itemOld);
                        }
                    });
                });

            } else if (secondFloorColOld.length > secondFloorColNew.length) {
                let onlyInOld = secondFloorColOld.filter(comparer(secondFloorColNew));
                console.log('onlyInOld: ', onlyInOld);

                secondFloorColOld = $.grep(secondFloorColOld, function(element, index){
                    return element.id_machine_breakdown == onlyInOld[0].id_machine_breakdown;
                }, true);

                $('#secondFloor' + onlyInOld[0].id_machine_breakdown).remove();
                $('#modalDetail' + onlyInOld[0].id_machine_breakdown).remove()
            }
        }

        function comparer(otherArray) {
            return function(current) {
                return otherArray.filter(function(other) {
                    return other.id_machine_breakdown == current.id_machine_breakdown
                }).length == 0;
            }
        }


        // }
    </script>
</body>

</html>