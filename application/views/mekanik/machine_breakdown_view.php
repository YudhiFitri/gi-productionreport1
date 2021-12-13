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
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 text-center">
                            <h1 class="m-0 text-dark text-center">Mechanic Dashboard - Machines Breakdown </h1>
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
                            <!-- <div class="card shadow"> -->
                            <!-- <div class="card-header bg-info">
                                    <div class="card-title text-center">
                                        <h3>Calling For Machine Breakdown</h3>
                                    </div>
                                </div> -->
                            <!-- <div class="card-body"> -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="card card-secondary card-outline">
                                        <div class="card-header">
                                            <div class="card-title text-center">1st Floor</div>
                                        </div>
                                        <div class="card-body">
                                            <div id="firstCol"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card card-warning card-outline">
                                        <div class="card-header">
                                            <div class="card-title text-center">2nd Floor</div>
                                        </div>
                                        <div class="card-body">
                                            <div id="secondCol"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card card-success card-outline">
                                        <div class="card-header">
                                            <div class="card-title text-center">3rd Floor</div>
                                        </div>
                                        <div class="card-body">
                                            <div id="thirdCol"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- </div> -->
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
        var firstFloorColOld = [];
        var firstFloorColNew;
        var firstColTimer = [];

        var secondColTimer = [];
        var secondFloorColNew;
        var data2ndFloorOld = "";
        var data2ndFloorLength;
        var secondFloorColOld

        var thirdFloorCol;
        var thirdColTimer = [];

        var rowTable;

        var data1stFloorOld = "";
        var data1stFloorNew = "";
        var data1stFloorLength;

        var data3rdFloor = "";
        var data3rdFloorLength;

        show1stFloorData();

        function show1stFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_1stfloor_waiting_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                // firstFloorColOld = [];
                data1stFloorOld = "";
                $.each(data, function(i, item) {
                    //add to firstFloorColOld array
                    firstFloorColOld.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'machine_brand': item.machine_brand,
                        'line': item.line,
                        'tgl': item.tgl,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
                        'floor': item.floor,
                        'sympton': item.sympton,
                        'status': item.status,
                        'inisial': item.inisial,
                        'duration': item.duration
                    });

                    //tampilkan
                    data1stFloorOld +=
                        "<div class='col-md-4'>" +
                        "<a href='#' id='tip" + item.id_machine_breakdown.toString() + "'>" +
                        "<div id='firstFloor" + item.id_machine_breakdown.toString() + "' class='info-box bg-danger shadow'>" +
                        "<span class='icon'><i class='fa fa-flag'></i></span> " +
                        "<div class='info-box-content text-left'>" +
                        "<span class='info-box-text'>" + item.machine_type + "</span>" +
                        "<span class='info-box-text'>" + item.line + "</span>" +
                        "<span class='info-box-text' id='" + item.id_machine_breakdown + "' style='font-weight: bold;'></span>" +
                        "</div>" +
                        "</div>" +
                        "</a>" +
                        "</div>";

                    // var firstColTimer = new easytimer.Timer();
                    firstColTimer[item.id_machine_breakdown] = new easytimer.Timer();

                    firstColTimer[item.id_machine_breakdown].start({
                        precision: 'seconds',
                        startValues: {
                            hours: parseInt(item.duration.substr(0, 2)),
                            minutes: parseInt(item.duration.substr(3, 2)),
                            seconds: parseInt(item.duration.substr(6, 2)),
                        }
                    });
                    firstColTimer[item.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                        $("#" + item.id_machine_breakdown.toString()).html(firstColTimer[item.id_machine_breakdown].getTimeValues().toString());
                    });

                });
                $("<div class='row' id='firstFloor'>" + data1stFloorOld + "</div>").appendTo($('#firstCol'));
                createToolTip1();
            });
        }

        // });
        setInterval("fetch1stFloorData();", 10000);

        function fetch1stFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_1stfloor_waiting_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                firstFloorColNew = [];
                data1stFloorOld = "";
                $.each(data, function(i, item) {
                    //add to firstFloorColOld array
                    firstFloorColNew.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'line': item.line,
                        'tgl': item.tgl,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
                        'floor': item.floor,
                        'sympton': item.sympton,
                        'status': item.status,
                        'inisial': item.inisial,
                        'duration': item.duration
                    });
                });

                comparing1stFloorData()
            });
        }

        function comparer(otherArray) {
            return function(current) {
                return otherArray.filter(function(other) {
                    return other.id_machine_breakdown == current.id_machine_breakdown
                }).length == 0;
            }
        }

        function comparing1stFloorData() {

            if (firstFloorColOld.length < firstFloorColNew.length) {
                var onlyInNew = firstFloorColNew.filter(comparer(firstFloorColOld));
                var onlyInOld = firstFloorColOld.filter(comparer(firstFloorColNew));
                var result = onlyInNew.concat(onlyInOld);

                //add to firstFloorColOld array
                firstFloorColOld.push({
                    'id_machine_breakdown': result[0].id_machine_breakdown,
                    'line': result[0].line,
                    'tgl': result[0].tgl,
                    'machine_type': result[0].machine_type,
                    'machine_sn': result[0].machine_sn,
                    'floor': result[0].floor,
                    'sympton': result[0].sympton,
                    'status': result[0].status,
                    'inisial': result[0].inisial,
                    'duration': result[0].duration
                });

                //add the machine breakdown
                var data1stFloorAdd = "";
                data1stFloorAdd +=
                    "<div class='col-md-4'>" +
                    "<a href='#' id='tip" + result[0].id_machine_breakdown.toString() + "'>" +
                    "<div id='firstFloor" + result[0].id_machine_breakdown.toString() + "' class='" + "info-box bg-danger shadow status>" +
                    "<span class='icon'><i class='fa fa-flag'></i></span> " +
                    "<div class='info-box-content text-left'>" +
                    "<span class='info-box-text'>" + result[0].machine_type + "</span>" +
                    "<span class='info-box-text'>" + result[0].line + "</span>" +
                    "<span class='info-box-text' id='" + result[0].id_machine_breakdown + "' style='font-weight: bold;'></span>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>";
                // var firstColTimerNew = new easytimer.Timer();
                firstColTimer[result[0].id_machine_breakdown] = new easytimer.Timer();
                firstColTimer[result[0].id_machine_breakdown].start({
                    precision: 'seconds',
                    startValues: {
                        hours: parseInt(result[0].duration.substr(0, 2)),
                        minutes: parseInt(result[0].duration.substr(3, 2)),
                        seconds: parseInt(result[0].duration.substr(6, 2)),
                    }
                });
                firstColTimer[result[0].id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                    $("#" + result[0].id_machine_breakdown.toString()).html(firstColTimer[result[0].id_machine_breakdown].getTimeValues().toString());
                });
                $(data1stFloorAdd).appendTo($('#firstFloor'));

                //add new tool tip for new breakdown
                createToolTip1New(result);


            } else if (firstFloorColOld.length > firstFloorColNew.length) {
                let onlyInOld = firstFloorColOld.filter(comparer(firstFloorColNew));

                firstFloorColOld = $.grep(firstFloorColOld, function(element, index) {
                    return element.id_machine_breakdown == onlyInOld[0].id_machine_breakdown;
                }, true);

                $('#firstFloor' + onlyInOld[0].id_machine_breakdown).remove();
                $('#tip' + onlyInOld[0].id_machine_breakdown).remove();
            }
        }

        //tooltip for 1st floor
        function createToolTip1() {
            $.each(firstFloorColOld, function(x, itm) {
                console.log('firstFloorColOld itm: ', itm.sympton);

                "<span id='span" + itm.id_machine_breakdown.toString() + "'></span>"
                Tipped.create('#tip' + itm.id_machine_breakdown.toString(), $(
                    "<span class='info-box-text text-left'>Merk: <b>" + itm.machine_brand + "</b></span>" +
                    "<span class='info-box-text text-left'>Type: <b>" + itm.machine_type + "</b></span>" +
                    "<span class='info-box-text'>S N: <b>" + itm.machine_sn + "</b></span>" +
                    "<span class='info-box-text'>Sympton: <b>" + itm.sympton + "</b></span>" +
                    "<span class='info-box-text'>Line: <b>" + itm.line + "</b></span>" +
                    "<span class='info-box-text'>Status: <b>Waiting for mechanic...</b></span>"
                ), {
                    skin: 'red',
                    fadeIn: 500,
                    size: 'large',
                    behavior: 'mouse',
                    onShow: function(content, element) {
                        $(element).addClass('highlight');
                    },
                    afterHide: function(content, element) {
                        $(element).removeClass('highlight');
                    }
                });
            });

        }

        function createToolTip1New(r) {
            console.log('r: ', r);
            "<span id='span" + r[0].id_machine_breakdown.toString() + "'></span>"
            Tipped.create('#tip' + r[0].id_machine_breakdown.toString(), $(
                "<span class='info-box-text text-left'>Merk: <b>" + r[0].machine_brand + "</b></span>" +
                "<span class='info-box-text text-left'>Type: <b>" + r[0].machine_type + "</b></span>" +
                "<span class='info-box-text'>S N: <b>" + r[0].machine_sn + "</b></span>" +
                "<span class='info-box-text'>Sympton: <b>" + r[0].sympton + "</b></span>" +
                "<span class='info-box-text'>Line: <b>" + r[0].line + "</b></span>" +
                "<span class='info-box-text'>Status: <b>Waiting for mechanic...</b></span>"
            ), {
                skin: 'red',
                fadeIn: 1000,
                size: 'large',
                behavior: 'mouse',
                onShow: function(content, element) {
                    $(element).addClass('highlight');
                },
                afterHide: function(content, element) {
                    $(element).removeClass('highlight');
                }
            });
        }

        //-----------------------------------------------------------------------------------------------
        //second floor
        show2ndFloorData();

        function show2ndFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_2ndfloor_waiting_data"); ?>',
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
                        // "<div class='row'>" + 
                        "<div class='col-md-4'>" +
                        "<a href='#' id='tip" + item.id_machine_breakdown.toString() + "'>" +
                        "<div id='secondFloor" + item.id_machine_breakdown.toString() + "' class='" + "info-box bg-danger shadow>" +
                        "<span class='icon'><i class='" + "fa fa-flag" + "'></i></span> " +
                        "<div class='info-box-content'>" +
                        "<span class='info-box-text'>" + item.machine_type + "</span>" +
                        // "<span class='info-box-text'>" + item.machine_sn + "</span>" +
                        // "<span class='info-box-text'>" + item.sympton + "</span>" +
                        "<span>" + item.line + "</span>" +
                        "<span class='info-box-text' id='" + item.id_machine_breakdown + "' style='font-weight: bold;'></span>" +
                        // "<span class='info-box-text'>" + (item.inisial == null ? "Waiting..." : item.inisial) + "</span>" +
                        // "</div>" +
                        "</div>" +
                        "</div>" +
                        "</a>" +
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
                $.each(data, function(x, itm) {

                    "<span id='span" + itm.id_machine_breakdown.toString() + "'></span>"
                    Tipped.create('#tip' + itm.id_machine_breakdown.toString(), $(
                        "<span class='info-box-text text-left'>Merk: <b>" + itm.machine_brande + "</b></span>" +
                        "<span class='info-box-text text-left'>Type: <b>" + itm.machine_type + "</b></span>" +
                        "<span class='info-box-text'>S N: <b>" + itm.machine_sn + "</b></span>" +
                        "<span class='info-box-text'>Sympton: <b>" + itm.sympton + "</b></span>" +
                        "<span class='info-box-text'>Line: <b>" + itm.line + "</b></span>" +
                        "<span class='info-box-text'>Status: <b>Waiting fro mechanic...</b></span>"
                    ), {
                        skin: 'red',
                        fadeIn: 500,
                        size: 'large',
                        behavior: 'mouse',
                        onShow: function(content, element) {
                            $(element).addClass('highlight');
                        },
                        afterHide: function(content, element) {
                            $(element).removeClass('highlight');
                        }
                    });
                });
            });
        }

        setInterval("fetch2ndFloorData();", 10000);

        function fetch2ndFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_2ndfloor_waiting_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                secondFloorColNew = [];
                data2ndFloorOld = "";
                $.each(data, function(i, item) {
                    //add to secondFloorColOld array
                    secondFloorColNew.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'line': item.line,
                        'tgl': item.tgl,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
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
                    "<a href='#' id='tip" + result[0].id_machine_breakdown.toString() + "'>" +
                    "<div id='secondFloor" + result[0].id_machine_breakdown.toString() + "' class='" + (result[0].status == "Waiting..." ? "info-box bg-danger shadow status" : "info-box bg-danger shadow status") + "'>" +
                    "<span class='icon'><i class='fa fa-flag'></i></span> " +
                    "<div class='info-box-content text-left'>" +
                    "<span class='info-box-text'>" + result[0].machine_type + "</span>" +
                    "<span class='info-box-text'>" + result[0].line + "</span>" +
                    "<span class='info-box-text' id='" + result[0].id_machine_breakdown + "' style='font-weight: bold;'></span>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
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
                createToolTip2New(result);
            } else if (secondFloorColOld.length > secondFloorColNew.length) {
                let onlyInOld = secondFloorColOld.filter(comparer(secondFloorColNew));

                secondFloorColOld = $.grep(secondFloorColOld, function(element, index) {
                    return element.id_machine_breakdown == onlyInOld[0].id_machine_breakdown;
                }, true);

                $('#secondFloor' + onlyInOld[0].id_machine_breakdown).remove();
                $('#tip' + onlyInOld[0].id_machine_breakdown).remove();
            } 
        }

        function createToolTip2() {
            $.each(secondFloorColOld, function(x, itm) {

                "<span id='span" + itm.id_machine_breakdown.toString() + "'></span>"
                Tipped.create('#tip' + itm.id_machine_breakdown.toString(), $(
                    "<span class='info-box-text text-left'>Merk: <b>" + itm.machine_brand + "</b></span>" +
                    "<span class='info-box-text text-left'>Type: <b>" + itm.machine_type + "</b></span>" +
                    "<span class='info-box-text'>S N: <b>" + itm.machine_sn + "</b></span>" +
                    "<span class='info-box-text'>Sympton: <b>" + itm.sympton + "</b></span>" +
                    "<span class='info-box-text'>Line: <b>" + itm.line + "</b></span>" +
                    "<span class='info-box-text'>Status: <b>Waiting for mechanic...</b></span>"
                ), {
                    skin: 'red',
                    fadeIn: 500,
                    size: 'large',
                    behavior: 'mouse',
                    onShow: function(content, element) {
                        $(element).addClass('highlight');
                    },
                    afterHide: function(content, element) {
                        $(element).removeClass('highlight');
                    }
                });
            });

        }

        function createToolTip2New(r) {
            console.log('r: ', r);
            "<span id='span" + r[0].id_machine_breakdown.toString() + "'></span>"
            Tipped.create('#tip' + r[0].id_machine_breakdown.toString(), $(
                "<span class='info-box-text text-left'>Merk: <b>" + r[0].machine_brand + "</b></span>" +
                "<span class='info-box-text text-left'>Type: <b>" + r[0].machine_type + "</b></span>" +
                "<span class='info-box-text'>S N: <b>" + r[0].machine_sn + "</b></span>" +
                "<span class='info-box-text'>Sympton: <b>" + r[0].sympton + "</b></span>" +
                "<span class='info-box-text'>Line: <b>" + r[0].line + "</b></span>" +
                "<span class='info-box-text'>Status: <b>Waiting for mechanic...</b></span>"
            ), {
                skin: 'red',
                fadeIn: 1000,
                size: 'large',
                behavior: 'mouse',
                onShow: function(content, element) {
                    $(element).addClass('highlight');
                },
                afterHide: function(content, element) {
                    $(element).removeClass('highlight');
                }
            });
        }

        //-----------------------------------------------------------------------------------------------
        //third floor
        show3rdFloorData();

        function show3rdFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_3rdfloor_waiting_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                thirdFloorColOld = [];
                data3rdFloorOld = "";
                $.each(data, function(i, item) {
                    //add to thirdFloorColOld array
                    thirdFloorColOld.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'machine_brand': item.machine_brand,
                        'line': item.line,
                        'tgl': item.tgl,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
                        'floor': item.floor,
                        'sympton': item.sympton,
                        'status': item.status,
                        'inisial': item.inisial,
                        'duration': item.duration
                    });

                    //tampilkan
                    data3rdFloorOld +=
                        // "<div class='row'>" + 
                        "<div class='col-md-4'>" +
                        "<a href='#' id='tip" + item.id_machine_breakdown.toString() + "'>" +
                        "<div id='thirdFloor" + item.id_machine_breakdown.toString() + "' class='" + "info-box bg-danger shadow>" +
                        "<span class='icon'><i class='" + "fa fa-flag" + "'></i></span> " +
                        "<div class='info-box-content'>" +
                        "<span class='info-box-text'>" + item.machine_type + "</span>" +
                        // "<span class='info-box-text'>" + item.machine_sn + "</span>" +
                        // "<span class='info-box-text'>" + item.sympton + "</span>" +
                        "<span>" + item.line + "</span>" +
                        "<span class='info-box-text' id='" + item.id_machine_breakdown + "' style='font-weight: bold;'></span>" +
                        // "<span class='info-box-text'>" + (item.inisial == null ? "Waiting..." : item.inisial) + "</span>" +
                        // "</div>" +
                        "</div>" +
                        "</div>" +
                        "</a>" +
                        "</div>";

                    thirdColTimer[item.id_machine_breakdown] = new easytimer.Timer();

                    thirdColTimer[item.id_machine_breakdown].start({
                        precision: 'seconds',
                        startValues: {
                            hours: parseInt(item.duration.substr(0, 2)),
                            minutes: parseInt(item.duration.substr(3, 2)),
                            seconds: parseInt(item.duration.substr(6, 2)),
                        }
                    });
                    thirdColTimer[item.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                        $("#" + item.id_machine_breakdown.toString()).html(thirdColTimer[item.id_machine_breakdown].getTimeValues().toString());
                    });

                });
                $("<div class='row' id='thirdFloor'>" + data3rdFloorOld + "</div>").appendTo($('#thirdCol'));
                $.each(data, function(x, itm) {

                    "<span id='span" + itm.id_machine_breakdown.toString() + "'></span>"
                    Tipped.create('#tip' + itm.id_machine_breakdown.toString(), $(
                        "<span class='info-box-text text-lefy'>Merk: <b>" + itm.machine_brand + "</b></span>" +
                        "<span class='info-box-text text-left'>Type: <b>" + itm.machine_type + "</b></span>" +
                        "<span class='info-box-text'>S N: <b>" + itm.machine_sn + "</b></span>" +
                        "<span class='info-box-text'>Sympton: <b>" + itm.sympton + "</b></span>" +
                        "<span class='info-box-text'>Line: <b>" + itm.line + "</b></span>" +
                        "<span class='info-box-text'>Status: <b>Waiting for mechanic</b></span>"
                    ), {
                        skin: 'red',
                        fadeIn: 500,
                        size: 'large',
                        behavior: 'mouse',
                        onShow: function(content, element) {
                            $(element).addClass('highlight');
                        },
                        afterHide: function(content, element) {
                            $(element).removeClass('highlight');
                        }
                    });
                });
            });
        }

        setInterval("fetch3rdFloorData();", 10000);

        function fetch3rdFloorData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_3rdfloor_waiting_data"); ?>',
                cache: false,
                dataType: 'json'
            }).done(function(data) {
                thirdFloorColNew = [];
                data3rdFloorOld = "";
                $.each(data, function(i, item) {
                    //add to thirdFloorColOld array
                    thirdFloorColNew.push({
                        'id_machine_breakdown': item.id_machine_breakdown,
                        'machine_brand': item.machine_brand,
                        'line': item.line,
                        'tgl': item.tgl,
                        'machine_type': item.machine_type,
                        'machine_sn': item.machine_sn,
                        'floor': item.floor,
                        'sympton': item.sympton,
                        'status': item.status,
                        'inisial': item.inisial,
                        'duration': item.duration
                    });
                });

                comparing3rdFloorData();
            });
        }

        function comparing3rdFloorData() {
            if (thirdFloorColOld.length < thirdFloorColNew.length) {
                var onlyInNew = thirdFloorColNew.filter(comparer(thirdFloorColOld));
                var onlyInOld = thirdFloorColOld.filter(comparer(thirdFloorColNew));
                var result = onlyInNew.concat(onlyInOld);

                //add to thirdFloorColOld array
                thirdFloorColOld.push({
                    'id_machine_breakdown': result[0].id_machine_breakdown,
                    'line': result[0].line,
                    'tgl': result[0].tgl,
                    'machine_type': result[0].machine_type,
                    'machine_sn': result[0].machine_sn,
                    'floor': result[0].floor,
                    'sympton': result[0].sympton,
                    'status': result[0].status,
                    'inisial': result[0].inisial,
                    'duration': result[0].duration
                });

                //add the machine breakdown
                var data3rdFloorAdd = "";
                data3rdFloorAdd +=
                    "<div class='col-md-4'>" +
                    "<a href='#' id='tip" + result[0].id_machine_breakdown.toString() + "'>" +
                    "<div id='thirdFloor" + result[0].id_machine_breakdown.toString() + "' class='" + "info-box bg-danger shadow status" + "'>" +
                    "<span class='icon'><i class='fa fa-flag'></i></span> " +
                    "<div class='info-box-content text-left'>" +
                    "<span class='info-box-text'>" + result[0].machine_type + "</span>" +
                    "<span class='info-box-text'>" + result[0].line + "</span>" +
                    "<span class='info-box-text' id='" + result[0].id_machine_breakdown + "' style='font-weight: bold;'></span>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>";
                // var thirdColTimerNew = new easytimer.Timer();
                thirdColTimer[result[0].id_machine_breakdown] = '';
                thirdColTimer[result[0].id_machine_breakdown] = new easytimer.Timer();
                thirdColTimer[result[0].id_machine_breakdown].start({
                    precision: 'seconds',
                    startValues: {
                        hours: parseInt(result[0].duration.substr(0, 2)),
                        minutes: parseInt(result[0].duration.substr(3, 2)),
                        seconds: parseInt(result[0].duration.substr(6, 2)),
                    }
                });
                thirdColTimer[result[0].id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                    $("#" + result[0].id_machine_breakdown.toString()).html(thirdColTimer[result[0].id_machine_breakdown].getTimeValues().toString());
                });
                $(data3rdFloorAdd).appendTo($('#thirdFloor'));

                //add new tool tip for new breakdown
                createToolTip2New(result);
            }  else if (thirdFloorColOld.length > thirdFloorColNew.length) {
                let onlyInOld = thirdFloorColOld.filter(comparer(thirdFloorColNew));
                console.log('onlyInOld: ', onlyInOld);

                thirdFloorColOld = $.grep(thirdFloorColOld, function(element, index) {
                    return element.id_machine_breakdown == onlyInOld[0].id_machine_breakdown;
                }, true);

                $('#thirdFloor' + onlyInOld[0].id_machine_breakdown).remove();
                $('#tip' + onlyInOld[0].id_machine_breakdown).remove();
            }
        }

        function createToolTip3() {
            $.each(thirdFloorColOld, function(x, itm) {

                "<span id='span" + itm.id_machine_breakdown.toString() + "'></span>"
                Tipped.create('#tip' + itm.id_machine_breakdown.toString(), $(
                    "<span class='info-box-text text-left'>Type: <b>" + itm.machine_type + "</b></span>" +
                    "<span class='info-box-text'>S N: <b>" + itm.machine_sn + "</b></span>" +
                    "<span class='info-box-text'>Sympton: <b>" + itm.sympton + "</b></span>" +
                    "<span class='info-box-text'>Line: <b>" + itm.line + "</b></span>" +
                    "<span class='info-box-text'>" + (itm.inisial == null ? "Status: <b>Waiting for mechanic...</b>" : "Mechanic: <b>" + itm.inisial) + "</b></span>"
                ), {
                    skin: 'red',
                    fadeIn: 500,
                    size: 'large',
                    behavior: 'mouse',
                    onShow: function(content, element) {
                        $(element).addClass('highlight');
                    },
                    afterHide: function(content, element) {
                        $(element).removeClass('highlight');
                    }
                });
            });

        }

        function createToolTip3New(r) {
            console.log('r: ', r);
            "<span id='span" + r[0].id_machine_breakdown.toString() + "'></span>"
            Tipped.create('#tip' + r[0].id_machine_breakdown.toString(), $(
                "<span class='info-box-text text-left'>Type: <b>" + r[0].machine_type + "</b></span>" +
                "<span class='info-box-text'>S N: <b>" + r[0].machine_sn + "</b></span>" +
                "<span class='info-box-text'>Sympton: <b>" + r[0].sympton + "</b></span>" +
                "<span class='info-box-text'>Line: <b>" + r[0].line + "</b></span>" +
                "<span class='info-box-text'>Status: <b>Waiting for mechanic...</b></span>"
            ), {
                skin: 'red',
                fadeIn: 1000,
                size: 'large',
                behavior: 'mouse',
                onShow: function(content, element) {
                    $(element).addClass('highlight');
                },
                afterHide: function(content, element) {
                    $(element).removeClass('highlight');
                }
            });
        }        

    </script>
</body>

</html>