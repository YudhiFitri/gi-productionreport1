<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/css.php'); ?>
    <link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar/fullcalendar.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar/fullcalendar.print.css'); ?>">

    <!-- <link href="<//?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet"> -->
    <!-- <link href="<//?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet"> -->
    <!-- <link href="<//?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet"> -->
    <!-- <link href="<//?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet"> -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partials/navbar_planning.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_partials/sidebar_planning.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Planning </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header">
                                    ORCs
                                </div>
                                <div class="card-body">
                                    <div id="external-events">
                                        <div class="external-event bg-success">G3-20B043A</div>
                                        <div class="external-event bg-warning">G3-20B010A</div>
                                        <div class="external-event bg-info">G3-20B040A</div>
                                        <div class="external-event bg-primary">G3-20B044A</div>
                                        <div class="external-event bg-danger">G3-20C008B</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <//?php $this->load->view('_partials/footer.php'); ?> -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php $this->load->view('_partials/js.php'); ?>
    <script src="<?php echo base_url('dist/js/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>
    <!-- <//?php $this->load->view('_partials/modal.php'); ?> -->
    <!-- <script src="<//?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script> -->
    <!-- <script src="<//?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script> -->
    <!-- <script src="<//?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script> -->
    <!-- <script src="<//?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script> -->
    <!-- <script src="<//?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script> -->

    <script>
        $(function() {
            function ini_events(ele) {
                ele.each(function() {
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }
                    $(this).data('eventObject', eventObject)

                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                });
            }

            ini_events($('#external-events div.external-event'));

            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                //Random default events
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954' //red
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: '#f39c12' //yellow
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor: '#0073b7' //Blue
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor: '#00c0ef' //Info (aqua)
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor: '#00a65a' //Success (green)
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor: '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject')

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject)

                    // assign it the date that was reported
                    copiedEventObject.start = date
                    copiedEventObject.allDay = allDay
                    copiedEventObject.backgroundColor = $(this).css('background-color')
                    copiedEventObject.borderColor = $(this).css('border-color')

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                    // is the "remove after drop" checkbox checked?
                    // if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        // $(this).remove()
                    // }
                }
            });

        });
    </script>
</body>

</html>