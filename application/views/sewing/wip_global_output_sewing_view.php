<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | WIP Global Output Sewing - Line <?php echo $this->session->userdata['username']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/css.php'); ?>
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">
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
                            <h1 class="m-0 text-dark">WIP Global</h1>
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
                                <div class="card-header text-center">
                                    <h3 class="card-title">WIP Global Output Sewing - Line <?php echo $this->session->userdata['username']; ?></h3>
                                </div>
                                <div class="card-body">
                                    <table id="wipGlobalTable" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ORC</th>
                                                <th>Bundle #</th>
                                                <th>Center Panel</th>
                                                <th>Back Wings</th>
                                                <th>Cups</th>
                                                <th>Assembly</th>
                                                <th>QTY</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>ORC</th>
                                                <th>Bundle #</th>
                                                <th>Center Panel</th>
                                                <th>Back Wings</th>
                                                <th>Cups</th>
                                                <th>Assembly</th>
                                                <th>QTY</th>
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
    <?php $this->load->view('_partials/js.php'); ?>
    <!-- <//?php $this->load->view('_partials/modal.php'); ?> -->
    <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/jszip/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/pdf/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/vfs_fonts/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/buttonshtml5/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/buttonprint/js/buttons.print.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            var table = $('#wipGlobalTable').DataTable({
                "serverSide": true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "dom": "lBfrtip",
                "buttons": [
                    {
                        extend: 'copy',
                        text: 'Copy to Clipboard',
                        messageBottom: null,
                        exportOptions: {
                            modifier: {
                                order: 'index',
                                page: 'all',
                                search: 'none'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                        messageBottom: null,
                        exportOptions: {
                            modifier: {
                                order: 'index',
                                page: 'all',
                                search: 'none'
                            },
                            columns:[1,2,3,4,5,6,7]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        messageBottom: null,
                        exportOptions: {
                            modifier: {
                                order: 'index',
                                page: 'all',
                                search: 'none'
                            },
                            columns:[1,2,3,4,5,6,7]
                        }
                    },                    
                    {
                        extend: 'print',
                        text: 'Print',
                        messageBottom: null,
                        exportOptions: {
                            modifier: {
                                order: 'index',
                                page: 'all',
                                search: 'none'
                            },
                            columns:[1,2,3,4,5,6,7]
                        }
                    },
                ],
                // "buttons": [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ],
                "ajax": {
                    "url": "<?php echo site_url('OutputSewing/ajax_get_datatables_wip_global'); ?>",
                    "type": "POST",
                    "dataType": "json"
                },
            });
        });
    </script>
</body>

</html>