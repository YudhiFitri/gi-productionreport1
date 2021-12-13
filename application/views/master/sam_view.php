<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Super Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/css.php'); ?>
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- <//?php $this->load->view('_partials/navbar_superadmin.php'); ?> -->
        <?php $this->load->view('_partials/navbar_ie.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- <//?php $this->load->view('_partials/sidebar_superadmin.php'); ?> -->
        <?php $this->load->view('_partials/sidebar_ie.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Master SAM </h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar">
                        <div class="btn-group mr-2" role="group" aria-label="">
                            <button type="button" class="btn btn-outline-info btn-sm" id="addSAM"><i class="fa fa-plus"></i>&nbsp;Add New SAM</button>
                            <button type="button" class="btn btn-outline-success btn-sm" id="editSAM"><i class="fa fa-pencil"></i>&nbsp;Edit SAM</button>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6" id="card-table">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Data Master SAM</h3>
                                </div>
                                <div class="card-body">
                                    <table id="sizeTable" class="table table-striped" width="100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>Style</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Cutting SAM</th>
                                            <th>Linning SAM</th>
                                            <th>Middle SAM</th>
                                            <th>Outer SAM</th>
                                            <th>Total Mold SAM</th>
                                            <th>Center Panel SAM</th>
                                            <th>Back Wings SAM</th>
                                            <th>Cups SAM</th>
                                            <th>Assembly SAM</th>
                                            <th>Total Sewing SAM</th>
                                            <th>Packing SAM</th>
                                        </thead>
                                        <tfoot>
                                            <th>ID</th>
                                            <th>Style</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Cutting SAM</th>
                                            <th>Linning SAM</th>
                                            <th>Middle SAM</th>
                                            <th>Outer SAM</th>
                                            <th>Total Mold SAM</th>
                                            <th>Center Panel SAM</th>
                                            <th>Back Wings SAM</th>
                                            <th>Cups SAM</th>
                                            <th>Assembly SAM</th>
                                            <th>Total Sewing SAM</th>
                                            <th>Packing SAM</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" id="card-tab">
                            <div class="card card-success">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Detail SAM</h3>
                                    <ul class="nav nav-pills ml-auto p-2">
                                        <li class="nav-item"><a class="nav-link active" href="#tab_style" data-toggle="tab">Style</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_cutting" data-toggle="tab">Cutting</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_molding" data-toggle="tab">Molding</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_sewing" data-toggle="tab">Sewing</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_packing" data-toggle="tab">Packing</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_style">
                                            <div class="form-group">
                                                <input type="hidden" id="idSAM">
                                                <label class="col-sm-2 col-form-label">Style</label>
                                                <div class="col-sm-6">
                                                    <select name="style" id="style" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select a Style</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-form-label">Color</label>
                                                <div class="col-sm-6">
                                                    <select id="color" name="color" class="form-control">
                                                        <option value="">Select a color</option>
                                                        <option value="White">White</option>
                                                        <option value="Black">Black</option>
                                                        <option value="color">Color</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-form-label">Size</label>
                                                <div class="col-sm-6">
                                                    <!-- <input type="text" id="size" class="form-control"> -->
                                                    <select name="size" id="size" class="form-control">
                                                        <option value="">Select a Size</option>
                                                        <option value="reguler">Reguler</option>
                                                        <option value="big">Big</option>
                                                        <option value="extra large">Extra Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_cutting">
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Cutting:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="sam_cutting">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_molding">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Linning:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control mold-input" id="linning_sam">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Middle:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control mold-input" id="mid_sam">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Outer:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control mold-input" id="outer_sam">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Total Mold:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="total_mold_sam">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_sewing">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Center Panel:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control sewing-input" id="center_panel_sam">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Back Wings:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control sewing-input" id="back_wings_sam">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Cups:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control sewing-input" id="cups_sam">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Assembly:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control sewing-input" id="assembly_sam">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right">Total Sewing:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="total_sewing_sam">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_packing">
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Packing:</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="packing_sam">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-warning" id="btnSave"><i class="fa fa-download"></i>&nbsp;Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('_partials/footer_superadmin.php'); ?>

    <!-- jQuery -->
    <?php $this->load->view('_partials/js.php'); ?>
    <?php $this->load->view('_partials/modal.php'); ?>
    <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/select2/select2.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            var accessType;

            $('#style').select2({
                placeholder: "Select a style",
                tags: true,
                createTag: function(params) {
                    return {
                        id: params.term,
                        text: params.term,
                        newOption: true
                    }
                },
                templateResult: function(data) {
                    var $result = $("<span></span>");
                    $result.text(data.text);

                    if (data.newOption) {
                        $result.append(" <em>(new)</em>");
                    }
                    return $result;
                }
            });

            controlsOff();

            // $('#editSAM').removeAttr('href');
            $('#editSAM').addClass('disabled');

            loadStyle();

            function loadStyle() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo site_url('Sam/ajax_get_styles'); ?>",
                    dataType: "json"
                }).done(function(retVal) {
                    // $('#style').empty();
                    $('#style').select2('data', null);
                    // $('#style').append($('<option />').prop('value', "").text("--Select a Style--"));
                    $.map(retVal, function(val, index) {
                        $('#style').append($('<option />').prop('value', val.style).text(val.style));
                    });
                })
            }

            var table = $('#sizeTable').DataTable({
                "autoWidth": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('sam/ajax_list'); ?>",
                    "type": "POST",
                    "dataType": "json",
                },
                "select": {
                    "style": "single"
                },
                "lengthMenu": [
                    [3, 5, 10, 15, 25, 50, 75, 100, -1],
                    [3, 5, 10, 15, 25, 50, 75, 100, "All"]
                ],
                "columnDefs": [{
                    "targets": [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                    "visible": false
                }]
            });

            $('#sizeTable tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                $('#idSAM').val(data[0]).change();
                $('#style').val(data[1]).change();
                $('#color').val(data[2]);

                $('#size').val(data[3]).change()

                $('#sam_cutting').val(data[4]);

                $('#linning_sam').val(data[5]);
                $('#mid_sam').val(data[6]);
                $('#outer_sam').val(data[7]);
                $('#total_mold_sam').val(data[8]);

                $('#center_panel_sam').val(data[9]);
                $('#back_wings_sam').val(data[10]);
                $('#cups_sam').val(data[11]);
                $('#assembly_sam').val(data[12]);
                $('#total_sewing_sam').val(data[13]);
                $('#packing_sam').val(data[14]);

                // $('#editSAM').addAttr('href');
                $('#editSAM').removeClass('disabled');

                controlsOff();
                console.log($('#idSAM').val());
            });

            //when edit
            $('#editSAM').click(function() {
                accessType = "edit";
                controlsOn();
            });

            //when add
            $('#addSAM').click(function() {
                accessType = "add";

                clearControls();
                controlsOn();
                $('#style').select2('open');
                $('#color').val('');
                $('#size').val('');
            });

            function clearControls() {
                $('#style').select2("val", "");
                $('#color').val("");
                $('#card-tab :input').val("0");
            }

            function controlsOn() {
                $('#card-tab :input').attr('disabled', false);

                $('#total_mold_sam').prop('disabled', true);
                $('#total_sewing_sam').prop('disabled', true);

                $('#card-tab select').attr('disabled', false);
                $('#card-tab :button').attr('disabled', false);
            }

            function controlsOff() {
                $('#card-tab :input').attr('disabled', true);
                $('#card-tab select').attr('disabled', true);
                $('#card-tab :button').attr('disabled', true);
            }

            $('#btnSave').click(function() {
                if (accessType == "add") {
                    saveSAM();
                } else if (accessType == "edit") {
                    updateSAM();
                }
            });

            function saveSAM() {
                var blSuccess;

                var dataStr = {
                    'style': $('#style').val(),
                    'color': $('#color').val(),
                    'grup_size': $('#size').val(),
                    'sam_cutting': $('#sam_cutting').val(),
                    'linning_sam': $('#linning_sam').val(),
                    'mid_sam': $('#mid_sam').val(),
                    'outer_sam': $('#outer_sam').val(),
                    'total_mold_sam': $('#total_mold_sam').val(),
                    'center_panel_sam': $('#center_panel_sam').val(),
                    'back_wings_sam': $('#back_wings_sam').val(),
                    'cups_sam': $('#cups_sam').val(),
                    'assembly_sam': $('#assembly_sam').val(),
                    'total_sewing_sam': $('#total_sewing_sam').val(),
                    'packing_sam': $('#packing_sam').val()
                }

                $.ajax({
                    'type': "POST",
                    'url': "<?php echo site_url('Sam/ajax_save'); ?>",
                    'data': {
                        "dataStr": dataStr
                    },
                    'dataType': "json",
                    'success': function(data, status, xhr) {
                        if (data != null) {
                            blSuccess = true
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Status Error: ' + xhr.status,
                            showConfirmButton: true
                        });
                        console.log(xhr.status);
                    },
                    complete: function() {
                        if (blSuccess) {
                            Swal.fire({
                                type: 'success',
                                title: 'Success',
                                text: 'Saved Data SAM successfully',
                                showConfirmButton: false,
                                timer: 1800
                            });
                            loadTable();
                            loadStyle();
                            clearControls();
                            $('#style').select2('open');
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Saved data failed, something went wrong',
                                showConfirmButton: true,
                            });
                        }
                    }
                });

            }

            function updateSAM() {
                var blSuccess;

                var dataStr = {
                    'idSAM': $('#idSAM').val(),
                    'style': $('#style').val(),
                    'color': $('#color').val(),
                    'grup_size': $('#size').val(),
                    'sam_cutting': $('#sam_cutting').val(),
                    'linning_sam': $('#linning_sam').val(),
                    'mid_sam': $('#mid_sam').val(),
                    'outer_sam': $('#outer_sam').val(),
                    'total_mold_sam': $('#total_mold_sam').val(),
                    'center_panel_sam': $('#center_panel_sam').val(),
                    'back_wings_sam': $('#back_wings_sam').val(),
                    'cups_sam': $('#cups_sam').val(),
                    'assembly_sam': $('#assembly_sam').val(),
                    'total_sewing_sam': $('#total_sewing_sam').val(),
                    'packing_sam': $('#packing_sam').val()
                }

                $.ajax({
                    'type': "POST",
                    'url': "<?php echo site_url('Sam/ajax_update'); ?>",
                    'data': {
                        "dataStr": dataStr
                    },
                    'dataType': "json",
                    'success': function(data, status, xhr) {
                        if (data != null) {
                            blSuccess = true
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Status Error: ' + xhr.status,
                            showConfirmButton: true
                        });
                        console.log(xhr.status);
                    },
                    complete: function() {
                        if (blSuccess) {
                            Swal.fire({
                                type: 'success',
                                title: 'Success',
                                text: 'Updated Data SAM successfully',
                                showConfirmButton: false,
                                timer: 1800
                            });
                            loadTable();
                            clearControls();
                            controlsOff();
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Updated data failed, something went wrong',
                                showConfirmButton: true,
                            });
                        }
                    }
                });
            }

            $('.mold-input').keyup(function() {
                if (accessType == "add" || accessType == "edit") {
                    var totalMold = 0;
                    $('.mold-input').each(function(index, element) {
                        var valMold = parseFloat($(element).val());
                        if (!isNaN(valMold)) {
                            totalMold += valMold;
                        }
                    });

                    $('#total_mold_sam').val(totalMold);
                }

            });

            $('.sewing-input').keyup(function() {
                if (accessType == "add" || accessType == "edit") {
                    var totalSewing = 0;
                    $('.sewing-input').each(function(index, element) {
                        var valSewing = parseFloat($(element).val());
                        if (!isNaN(valSewing)) {
                            totalSewing += valSewing;
                        }
                    });

                    $('#total_sewing_sam').val(totalSewing);
                }

            });

            function loadTable(){
                table.ajax.reload(null,false);
            }
        });
    </script>
</body>

</html>