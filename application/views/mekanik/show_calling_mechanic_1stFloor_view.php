<!DOCTYPE html>
<html style="height: auto">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Calling Mechanic - 1st Floor</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/js.php'); ?>
    <?php $this->load->view('_partials/css.php'); ?>
    <!-- <link href="<//?php echo base_url('plugins/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/extensions/scroller2/css/scroller.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/tipped/css/tipped.css'); ?>" rel="stylesheet">
    <!-- <link href="<//?php echo base_url('plugins/tooltipster/css/tooltipster.bundle.min.css'); ?>" rel="stylesheet"> -->
    <style rel="stylesheet">
        html,
        body {
            height: 100%;
            width: 100%;
        }

        td.highlight-waiting {
            font-weight: bold;
            color: red;
        }

        td.highlight-repairing {
            font-weight: bold;
            color: yellow;
        }

        .tableFloor tbody th,
        .tableFloor tbody td {
            white-space: nowrap;
            padding: 2px 2px;
        }

        /* table th:nth-child(3),
        td:nth-child(3) {
            display: none;
        } */
        /* .tableFloor {
            height: 160px;
            overflow: auto;
        } */

        /* th {
            position: fixed;
            top: 0px
        } */

        table {
            text-align: center;
            position: relative;
        }

        .headerFloor {
            color: white;
            background: blue;
            position: sticky;
            top: 0;
        }
    </style>

</head>

<body class="hold-transition">


    <div class="row">
        <div class="col-lg-12">
            <div id="firstFloor">
                <!-- <h3 class="card-title small text-center text-white">Machines breakdown at 1st floor</h3> -->
                <table class="table tableFloor" id="tableFirstFloor" style="width: 100%;">
                    <thead>
                        <th class="headerFloor">ID</th>
                        <th class="headerFloor">Time</th>
                        <th class="headerFloor">Line</th>
                        <th class="headerFloor">SN</th>
                        <th class="headerFloor">Status</th>
                        <th class="headerFloor">Timer</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->

    <!-- <//?php $this->load->view('_partials/modal.php'); ?> -->
    <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/scroller2/js/dataTables.scroller.min.js'); ?>"></script>
    <!-- <script src="<//?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('plugins/easytimer/easytimer.min.js'); ?>"></script>
    <!-- <script src="<//?php echo base_url('plugins/tipped/js/tipped.min.js'); ?>"></script> -->

    <script>
        $(document).ready(function() {
            var tableFirstFloor = $('#tableFirstFloor').DataTable({
                "destroy": true,
                "responsive": true,
                "info": false,
                "scrollY": false,
                "paging": false,
                "ordering": false,
                "searching": false,
                "columnDefs": [{
                    "targets": [0, 1, 3, 4],
                    "visible": false
                }],
                "createdRow": function(row, data, dataIndex) {
                    if (data[4] == "Waiting...") {
                        $('td', row).eq(0).css('color', 'red');
                        $('td', row).eq(1).css('color', 'red');
                        $('td', row).eq(2).css('color', 'red');
                        $('td', row).eq(3).css('color', 'red');
                        $('td', row).eq(4).css('color', 'red');
                        // $(row).addClass('highlight-waiting');
                    } else if (data[4] == "Repairing...") {
                        $('td', row).eq(0).css('color', 'yellow');
                        $('td', row).eq(1).css('color', 'yellow');
                        $('td', row).eq(2).css('color', 'yellow');
                        $('td', row).eq(3).css('color', 'yellow');
                        $('td', row).eq(4).css('color', 'yellow');
                        // $(row).addClass('highlight-repairing');

                    }
                    // $(row).addClass('bg-success');
                    $(row).addClass('bg-gray');
                }
            });

            var dataFirstFloor;
            var dt1stLength;
            var firstFloorTimer = [];

            get1stFloorData();
            setInterval(get1stFloorData, 15000);

            function get1stFloorData() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url("Mekanik/ajax_get_1stfloor_data"); ?>',
                    dataType: 'json'
                }).done(function(dt) {
                    dt1stLength = dt.length;
                    tableFirstFloor.clear();
                    $.each(dt, function(x, itm) {
                        tableFirstFloor.row.add([
                            itm.id_machine_breakdown, itm.duration, itm.line, itm.machine_sn, itm.status,
                            "<div class='tmr' id='" + itm.id_machine_breakdown + "'></div>"
                        ]).draw();

                        firstFloorTimer[itm.id_machine_breakdown] = new easytimer.Timer();
                        // var timer = null;
                        // timer = new easytimer.Timer();
                        firstFloorTimer[itm.id_machine_breakdown].start({
                            precision: 'seconds',
                            startValues: {
                                hours: parseInt(itm.duration.substr(0, 2)),
                                minutes: parseInt(itm.duration.substr(3, 2)),
                                seconds: parseInt(itm.duration.substr(6, 2)),
                            }
                        });
                        firstFloorTimer[itm.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                            $("#" + itm.id_machine_breakdown.toString()).html(firstFloorTimer[itm.id_machine_breakdown].getTimeValues().toString());
                        });
                    })
                    // scroll1stData();
                });
            }
            function scroll1stData() {
                var child = $('#firstFloor').find('tbody');
                // console.log(child[0].children);
                var anm;
                $.each(child[0].children, function(i, item) {
                    // console.log(item);
                    // item.animate({
                    //     scrollTop: $(this).offset().top
                    // }, 100).delay(2800);
                    anm = item.animate([{
                            transform: 'translateY(0px)'
                        },
                        {
                            transform: 'translateY(-200px)'
                        },
                    ], {
                        // duration: 2 * dt1stLength * 1000,
                        duration: (2*child[0].children.length*1000)+5000
                        // direction: 'alternate',
                        // iterations: Infinity
                    });

                });

                anm.onfinish = function() {
                    // console.log('animasi selesai..');
                    // timer = null;
                    get1stFloorData();
                }

                // anm.onfinish = get3rdFloorData();
            }            
        });
    </script>

</body>

</html>