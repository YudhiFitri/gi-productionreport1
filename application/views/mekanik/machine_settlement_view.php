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
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 text-center">
                            <h1 class="m-0 text-dark text-center">Mechanic Panel - Delayed Machine Settlement List </h1>
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
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title text-center">Delayed Machine Settlement List</h3>
                                </div>
                                <div class="card-body">
                                    <table id="machineSettlementTable" class="table table-striped" style="width: 100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>Machine Type</th>
                                            <th>Brand</th>
                                            <th>Type</th>
                                            <th>Serial Number</th>
                                            <th>Sympthon</th>
                                            <th>Settlement Date</th>
                                        </thead>
                                        <tfoot>
                                            <th>ID</th>
                                            <th>Machine Type</th>
                                            <th>Brand</th>
                                            <th>Type</th>
                                            <th>Serial Number</th>
                                            <th>Sympthon</th>
                                            <th>Settlement Date</th>
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



    <script>
        $(document).ready(function() {
            getMachineBreakdown();
            getMachineRepairing();

            function getMachineBreakdown() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url("Mekanik/ajax_count_machines_breakdown"); ?>',
                    dataType: 'json',
                }).done(function(dt) {
                    $('#machineBreakdown').text(dt.countLine);
                    $('#breakdown').text(dt.countLine);
                    $('#showBreakdown').fadeIn(1500);

                });
            }

            function getMachineRepairing() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url("Mekanik/ajax_count_machines_repairing"); ?>',
                    dataType: 'json',
                }).done(function(dt) {
                    $('#machineRepairing').text(dt.countLine);
                    $('#repairing').text(dt.countLine);
                    $('#showRepairing').fadeIn(1500);
                });
            }

            var table = $('#machineSettlementTable').DataTable({
                "autoWidth": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('Mekanik/ajax_machine_settlement_list'); ?>",
                    "type": "POST",
                    "dataType": "json",
                }
            });

            setInterval(reloadTable, 10000);

            function reloadTable(){
                table.ajax.reload(null,false);
            }


        });
    </script>
</body>

</html>