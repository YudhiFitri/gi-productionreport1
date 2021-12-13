<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/css.php'); ?>
    <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partials/navbar_cutting.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_partials/sidebar_cutting.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Reprint Bundle Panty</h1>
                        </div><!-- /.col -->
                        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div> -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Panty Bundle</h3>
                                </div>
                                <div class="card-body">
                                    <!-- <div class="form-group">
                                        <label>Select an ORC</label>
                                        <select id="orc_panty" class="select2 form-control" width="100%">
                                            <option value="0">Please select an ORC</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label">Input an ORC:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="orc" class="form-control">
                                            <span class="input-group-append">
                                                <button type="button" id="btnSearch" class="btn btn-warning"><i class="fa fa-search"></i>&nbsp;Search</button>
                                            </span>
                                        </div>
                                    </div>                                    
                                    <div>
                                        <button type="button" class="btn btn-primary" id="btnSelectPantyAll">Select All</button>
                                        <button type="button" class="btn btn-primary" id="btnDeselectPantyAll">Deselect All</button>
                                    </div>
                                    <table id="orcPantyTable" class="table table-striped" style="width: 100%">
                                        <thead>
                                            <th>ORC</th>
                                            <th>SIZE</th>
                                            <th>BUNDLE #</th>
                                            <th>QTY</th>
                                        </thead>
                                        <tfoot>
                                            <th>ORC</th>
                                            <th>SIZE</th>
                                            <th>BUNDLE #</th>
                                            <th>QTY</th>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnPrintPantySelected" class="btn btn-warning"><i class="fa fa-print"></i> Print Selected</button>
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
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/select2/select2.min.js'); ?>"></script>

    <script>
        var table;

        $(document).ready(function() {
            $('#btnSelectPantyAll').prop('disabled', true);
            $('#btnDeselectPantyAll').prop('disabled', true);

            // $('.select2').select2();

            // $('#orcTable').hide();

            // loadOrc();

            // function loadOrc() {
            //     $.ajax({
            //         url: "<//?php echo site_url('cutting/ajax_get_orc_panty'); ?>",
            //         type: "GET",
            //         dataType: "json"
            //     }).done(function(dt){
            //         console.log('dt orc: ', dt);
            //         // dt.map(itm => itm.orc).filter((value, index, self) => self.indexOf(value) === index);
            //         // console.log('itm: ', itm);
            //         var unique = {};
            //         var distinct = [];
            //         for(var i in dt){
            //             if(typeof(unique[dt[i].orc]) == "undefined"){
            //                 distinct.push(dt[i].orc);
            //             }
            //             unique[dt[i].orc] = 0;
            //         }
            //         console.log('distinct: ', distinct);
            //         $.each(distinct, function(i, item) {
            //             $('#orc_panty').append($('<option>', {
            //                 value: item,
            //                 text: item
            //             }));
            //         })
            //     });
            // }

            // $('#orc_panty').change(function() {
            //     var orc = $(this).val();

            //     showDetail(orc)
            // });

            $('#btnSearch').click(function(){
                let strOrc = $('#orc').val();
                if(strOrc == ""){
                    Swal.fire({
                        type: 'warning',
                        title: 'Please input an ORC first',
                        showConfirmButton: false,
                        timer: 1750
                    });
                }else{
                    showDetail(strOrc);
                }
            });

            $('#orcPantyTable tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            function showDetail(o) {
                // $('#orcTable').show();

                table = $('#orcPantyTable').DataTable({
                    "processing": true,
                    "order": [],
                    "destroy": true,
                    "select": {
                        "style": "multi"
                    },
                    "ajax": {
                        "url": "<?php echo site_url('cutting/ajax_get_bundles'); ?>/" + o,
                        "type": "POST",
                        "dataType": "json",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "orc"
                        },
                        {
                            "data": "size"
                        },
                        {
                            "data": "no_bundle"
                        },
                        {
                            "data": "qty_pcs"
                        },
                    ],
                });

                $('#btnSelectPantyAll').prop('disabled', false);
            }

            $('#btnPrintPantySelected').click(function(){
                var selRows = table.rows({selected: true}).data();

                console.log('selRows: ', selRows);
                // localStorage.clear();
                localStorage.removeItem('selectedPantyRows');

                localStorage.setItem("selectedPantyRows", JSON.stringify(selRows));

                window.open("<?php echo site_url('cutting/show_print_bundle_panty'); ?>");
            });

            $('#btnSelectPantyAll').click(function(){
                table.rows({search:'applied'}).select();
                $('#btnDeselectPantyAll').prop('disabled', false);   

            });

            $('#btnDeselectPantyAll').click(function(){
                table.rows({search:'applied'}).deselect();                

            });
        });
    </script>
</body>

</html>