<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | WIP Per ORC Output Sewing - Line <?php echo $this->session->userdata['username']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/css.php'); ?>
    <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
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
                            <h1 class="m-0 text-dark">WIP Per ORC</h1>
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
                                    <h3 class="card-title">WIP Per ORC Output Sewing - Line <?php echo $this->session->userdata['username']; ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label">ORC:</label>
                                        <!-- <select class="select2 form-control" id="orcs" width="100%"></select> -->
                                        <div class="input-group mb-3">
                                            <input type="text" id="orcWIP" class="form-control">
                                            <span class="input-group-append">
                                                <button type="button" id="btnSearchOrcWIP" class="btn btn-warning"><i class="fa fa-search"></i>&nbsp;Search</button>
                                            </span>
                                        </div>

                                    </div>
                                    <table id="wipOrcTable" class="table table-striped table-bordered" width="100%">
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
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/jszip/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/pdf/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/vfs_fonts/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/buttonshtml5/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/extensions/buttonprint/js/buttons.print.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            var table;

            $('#btnSearchOrcWIP').click(function() {
                var orc = $('#orcWIP').val();
                if (orc == '') {
                    Swal.fire({
                        type: 'warning',
                        title: 'Warning',
                        text: 'ORC tidak boleh kosong!',
                        showComfirmButton: false,
                        timer: 2000
                    });
                } else {
                    searchWIPOrc(orc);
                }
                $('#orcWIP').val('')
                $('#orcWIP').focus();
            });

            function searchWIPOrc(o) {
                table = $('#wipOrcTable').DataTable({
                    "serverSide": true,
                    "lengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    "destroy": true,
                    "dom": "lBfrtip",
                    "buttons": [{
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
                                columns: [1, 2, 3, 4, 5, 6, 7]
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
                                columns: [1, 2, 3, 4, 5, 6, 7]
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
                                columns: [1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                    ],
                    // "buttons": [
                    //     'copy', 'csv', 'excel', 'pdf', 'print'
                    // ],
                    "ajax": {
                        "url": "<?php echo site_url('OutputSewing/ajax_get_datatables_wip_orc'); ?>/" + o,
                        "type": "POST",
                        "dataType": "json"
                    },
                });
            }

        });
    </script>
</body>

</html>