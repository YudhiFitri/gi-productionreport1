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
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partials/navbar_packing.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_partials/sidebar_packing.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Output Packing </h1>
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
                                    <h3 class="card-title">Data Output Packing</h3>
                                    <div class="card-tools">
                                        <!-- <button id="btnAddPacking" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New Packing</button> -->

                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Take Action</button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="javascript:void(0)" title="Add New Packing" id="btnAddPacking">Add Packing</a></li>
                                            <li class="dropdown-item"><a href="javascript:void(0)" title="Update Data Packing" id="btnUpdatePacking">Update Packing</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="javascript:void(0)" title="Show Detail Packing" id="btnShowPacking">Show Summary</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="packingTable" class="table table-striped table-hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>ORC</th>
                                                <th>BOXES</th>
                                                <th>ACTUAL BOXES</th>
                                                <th>TOTAL QTY</th>
                                                <th>TOTAL ACTUAL QTY</th>
                                                <!-- <th>ACTIONS</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>ORC</th>
                                                <th>BOXES</th>
                                                <th>ACTUAL BOXES</th>
                                                <th>TOTAL QTY</th>
                                                <th>TOTAL ACTUAL QTY</th>
                                                <!-- <th>ACTIONS</th> -->
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Modal detail packing-->
                    <div class="modal fade" id="modal_packing_detail" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h4 class="modal-title">Detail Packing</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-bordered" id="tableDetailPacking" width="100%">
                                                        <thead>
                                                            <th>Size</th>
                                                            <th>Color</th>
                                                            <th>Style</th>
                                                            <th>Qty per Box</th>
                                                        </thead>
                                                        <tfoot>
                                                            <th>Size</th>
                                                            <th>Color</th>
                                                            <th>Style</th>
                                                            <th>Qty per Box</th>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-info">
                                    <button type="button" class="btn btn-default btn-lg shadow" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal detail packing

                    <!--packing modal-->
                    <div class="modal fade" id="modal_packing" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title">Add/Edit Data Packing</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times</span>
                                    </button>
                                </div>
                                <form method="post" id="form-modal-packing">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label">ORC:</label>
                                            <!-- <select class="select2 form-control" id="orcs" width="100%"></select> -->
                                            <div class="input-group mb-3">
                                                <input type="text" id="orcPacking" class="form-control">
                                                <span class="input-group-append">
                                                    <button type="button" id="btnSearchPacking" class="btn btn-warning"><i class="fa fa-search"></i>&nbsp;Search</button>
                                                </span>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label text-right">Detail ORC: </label>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table table-bordered" id="tableSize" width="100%">
                                                            <thead>
                                                                <th>Size</th>
                                                                <th>Color</th>
                                                                <th>Style</th>
                                                                <!-- <th>Qty per Box</th> -->
                                                            </thead>
                                                            <tfoot>
                                                                <th>Size</th>
                                                                <th>Color</th>
                                                                <th>Style</th>
                                                                <!-- <th>Qty per Box</th> -->
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- <input type="text" id="size" class="form-control"> -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label text-right">Box capacity: </label>
                                            <div class="col-md-2">
                                                <input type="number" id="box_capacity" class="form-control" value="0">
                                            </div>

                                            <label class="col-md-2 col-form-label text-right">Total qty size: </label>
                                            <div class="col-md-2">
                                                <input type="number" id="total_qty_size" value="0" class="form-control" disabled>
                                            </div>

                                            <label class="col-md-2 col-form-label text-right">Total actual qty size: </label>
                                            <div class="col-md-2">
                                                <input type="number" id="actual_qty" class="form-control" value="0" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label text-right">Total actual boxes size: </label>
                                            <div class="col-md-2">
                                                <input type="number" id="actual_boxes" class="form-control" value="0" disabled>
                                            </div>

                                            <label class="col-md-2 col-form-label text-right">Qty Output : </label>
                                            <div class="col-md-2">
                                                <input type="number" id="output_qty" class="form-control" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-success">
                                        <button type="button" class="btn btn-default btn-lg shadow-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Exit</button>
                                        <button type="button" id="btnSavePacking" class="btn btn-warning btn-lg shadow-sm"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end of packing modal-->

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
    <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


    <script>
        var status = "";
        // $(document).ready(function() {
        var table;
        var orc;
        var pcs;
        var tableSize;
        var tableDetailPacking;

        var orcVal;
        var selectedRow;
        var dataSelectedRow;
        var size;
        var style;
        var color;
        var totalQty;
        var idPacking;
        var id_packing;
        var boxes;
        var tableSelectedRow;

        var actualBoxes;
        var actualBoxes1;

        table = $('#packingTable').DataTable({
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "lengthMenu": [
                [5, 10, 15, 20, 25, 75, 100],
                [5, 10, 15, 20, 25, 75, 100]
            ],
            "select": {
                "style": "single"
            },
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('packing/ajax_list'); ?>",
                "type": "POST",
                "dataType": "json",
            }
        });

        tableSize = $('#tableSize').DataTable({
            "select": {
                "style": "single"
            },
        });

        tableDetailPacking = $('#tableDetailPacking').DataTable();

        $('#tableSize tbody').on('click', 'tr', function() {
            dataSelectedRow = tableSize.row(this).data();

            var dataPacking = {
                'style': dataSelectedRow[2],
                'size': dataSelectedRow[0]
            }

            $.ajax({
                url: '<?php echo site_url("packing/ajax_get_kap_karton"); ?>',
                type: 'POST',
                data: {
                    'dataPacking': dataPacking
                },
                dataType: 'json'
            }).done(function(rv) {
                if (rv.kapasitas_karton != null) {
                    $('#box_capacity').val(rv.kapasitas_karton);
                } else {
                    $('#box_capacity').val("0");
                }
                getMaxBoxes(orcVal);
                getQtySizeBoxes(orcVal, dataSelectedRow[0], dataSelectedRow[1], dataSelectedRow[2]);
            });
        });

        $('#packingTable tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
            // dataSelectedRow = table.row(this).data();

            // console.log('dataSelectedRow: ', dataSelectedRow);
        });

        $('#btnSearchPacking').click(function() {
            orcVal = $('#orcPacking').val();
            searchByOrc(orcVal);
        });

        function searchByOrc(o){
            if (o == '') {
                Swal.fire({
                    type: 'warning',
                    title: 'Warning',
                    text: 'ORC tidak boleh kosong!',
                    showConfirmButton: false,
                    timer: 1750
                });
                $('#orcPacking').focus();
            } else {
                var firstEmptySelect = true;
                $.ajax({
                    url: "<?php echo site_url('packing/ajax_get_by_orc_for_packing'); ?>/" + o,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(dt) {
                    console.log('dt: ', dt);
                    // totalQty = dt.qty;
                    $('#box_capacity').val('0');
                    $('#total_qty').val('0');
                    // $('#qty').val(dt.qty);
                    $('#actual_qty').val('0');
                    // $('#boxes').val('0');
                    $('#actual_boxes').val('0');
                    if (dt.length > 0 ) {
                        tableSize.clear().draw();
                        $.each(dt, function(i, item) {
                            tableSize.row.add([
                                item.size,
                                item.color,
                                item.style,
                                item.qty_pcs
                            ]).draw();
                        })
                    } else {
                        Swal.fire({
                            type: 'warning',
                            title: 'Warning',
                            text: 'ORC ' + o + ' tidak ada!',
                            showConfirmButton: false,
                            timer: 2000
                        });

                    }
                    $('#orcPacking').val('');
                    $('orcPacking').focus();
                });
            }            
        }

        $('#btnAddPacking').click(function() {
            status = "Add";
            $('#modal_packing').modal('show');
            // loadOrc();
        });

        $('#btnSavePacking').click(function() {
            console.log('status: ', status);
            if (status == "Add") {
                var dataStr = {
                    'orc': orcVal,
                    'boxes': boxes,
                    'total_actual_boxes': $('#actual_boxes').val(),
                    'total_qty': totalQty,
                    'total_actual_qty': $('#actual_qty').val()
                }

                $.ajax({
                    url: '<?php echo site_url("packing/ajax_save"); ?>',
                    type: 'POST',
                    data: {
                        'dataStr': dataStr
                    },
                    dataType: 'json'
                }).done(function(id) {
                    if (id > 0) {
                        
                        idPacking = id;

                        //insert detail packing
                        selectedRow = tableSize.rows({
                            selected: true
                        }).data();

                        size = selectedRow[0][0]; //$('#size').val();
                        color = selectedRow[0][1];
                        style = selectedRow[0][2];

                        if (color.includes("BLACK") == true) {
                            var colorGroup = "Black";
                        } else if (color.includes("WHITE") == true) {
                            var colorGroup = "White";
                        } else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
                            var colorGroup = "color"
                        }

                        var ajaxGetGroupSize;
                        var ajaxGetPackingSAM;
                        var groupSize;
                        var dataForPackingSAM;
                        var packingSam;
                        var samResult;
                        var output_qty;
                        // var karton = $('#karton').val();

                        var dataForPacked = {
                            'orc': orcVal,
                            'size': size,
                            'color': color,
                            'style': style,
                        }

                        ajaxGetGroupSize = $.ajax({
                                url: '<?php echo site_url('packing/ajax_get_by_size'); ?>',
                                type: 'POST',
                                data: {
                                    'dataSize': size
                                },
                                dataType: 'json'
                            }),
                            ajaxGetPackingSAM = ajaxGetGroupSize.then(function(dt) {
                                groupSize = dt.group;

                                dataForPackingSAM = {
                                    'style': style,
                                    'color': colorGroup,
                                    'grup_size': groupSize
                                };
                                // console.log('dataForCuttingSAM: ', dataForCuttingSAM);
                                return $.ajax({
                                    url: '<?php echo site_url("packing/ajax_get_packing_sam"); ?>',
                                    type: 'POST',
                                    data: {
                                        'dataForPackingSAM': dataForPackingSAM
                                    },
                                    dataType: 'json'
                                });

                            });

                        ajaxGetPackingSAM.done(function(d) {
                            packingSam = d.packing_sam;
                            output_qty = $('#output_qty').val();
                            samResult = packingSam * output_qty;
                            var dataStr = {
                                'id_output_packing': idPacking,
                                'size': size,
                                'color': color,
                                'style': style,
                                'actual_qty': $('#output_qty').val(),
                                'box_capacity': $('#box_capacity').val(),
                                'packing_sam': packingSam,
                                'packing_sam_result': samResult
                            };

                            saveInsertDetailPacking(dataStr);
                            // var dataPacking = {
                            //     'orc': orc,
                            //     'size': size
                            // };
                            // $.ajax({
                            //     url: '<//?php echo site_url("packing/ajax_get_by_orc_size"); ?>',
                            //     type: 'POST',
                            //     data: {
                            //         'dataSearch': dataPacking
                            //     },
                            //     dataType: 'json'
                            // }).done(function(dt) {
                            //     if (dt != null) {
                            //         Swal.fire({
                            //             type: 'warning',
                            //             title: 'Warning!!',
                            //             text: 'This is already packed!!',
                            //             showConfirmButton: false,
                            //             timer: 1500
                            //         });
                            //     } else {
                            //         saveInsertPacking(dataStr, dataForPacked);
                            //     }
                            // })
                        });

                    }
                })
            } else if (status == "Update") {
                // idPacking = id;

                //insert detail packing
                selectedRow = tableSize.rows({
                    selected: true
                }).data();

                size = selectedRow[0][0]; //$('#size').val();
                color = selectedRow[0][1];
                style = selectedRow[0][2];

                if (color.includes("BLACK") == true) {
                    var colorGroup = "Black";
                } else if (color.includes("WHITE") == true) {
                    var colorGroup = "White";
                } else if (color.includes("BLACK") != true && color.includes("WHITE") != true) {
                    var colorGroup = "color"
                }

                var ajaxGetGroupSize;
                var ajaxGetPackingSAM;
                var groupSize;
                var dataForPackingSAM;
                var packingSam;
                var samResult;
                var output_qty;
                // var karton = $('#karton').val();

                var dataForPacked = {
                    'orc': orcVal,
                    'size': size,
                    'color': color,
                    'style': style,
                }

                ajaxGetGroupSize = $.ajax({
                        url: '<?php echo site_url('packing/ajax_get_by_size'); ?>',
                        type: 'POST',
                        data: {
                            'dataSize': size
                        },
                        dataType: 'json'
                    }),
                    ajaxGetPackingSAM = ajaxGetGroupSize.then(function(dt) {
                        groupSize = dt.group;

                        dataForPackingSAM = {
                            'style': style,
                            'color': colorGroup,
                            'grup_size': groupSize
                        };
                        // console.log('dataForCuttingSAM: ', dataForCuttingSAM);
                        return $.ajax({
                            url: '<?php echo site_url("packing/ajax_get_packing_sam"); ?>',
                            type: 'POST',
                            data: {
                                'dataForPackingSAM': dataForPackingSAM
                            },
                            dataType: 'json'
                        });

                    });

                ajaxGetPackingSAM.done(function(d) {
                    packingSam = d.packing_sam;
                    output_qty = $('#output_qty').val();
                    samResult = packingSam * output_qty;
                    var dataStr = {
                        'id_output_packing': idPacking,
                        'size': size,
                        'color': color,
                        'style': style,
                        'actual_qty': $('#output_qty').val(),
                        'box_capacity': $('#box_capacity').val(),
                        'actual_boxes': actualBoxes1,
                        'packing_sam': packingSam,
                        'packing_sam_result': samResult
                    };

                    saveInsertDetailPacking(dataStr);
                });
            }

        });

        function saveInsertDetailPacking(data) {
            console.log('data: ', data);
            $.ajax({
                url: '<?php echo site_url("packing/ajax_save_detail"); ?>',
                type: 'POST',
                data: {
                    'dataStrDetail': data
                },
                dataType: 'json'
            }).done(function(val) {
                console.log('val: ', val);
                if (val > 0) {
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Simpan data packing berhasil!',
                        showConfirmButton: false,
                        timer: 1750
                    });
                    if (status == "Add") {
                        $('#modal_packing').modal('hide');
                    }
                    reloadTable();
                }
            })
        }

        // function updatePacking(dataUpdatePacking) {
        //     $.ajax({
        //         url: '<//?php echo site_url("packing/ajax_update_packing"); ?>',
        //         type: 'POST',
        //         data: {
        //             'dataUpdatePacking': dataUpdatePacking
        //         },
        //         dataType: 'json'
        //     }).done(function(v) {
        //         console.log('v: ', v);
        //         if (v > 0) {
        //             Swal.fire({
        //                 type: 'success',
        //                 title: 'Berhasil',
        //                 text: 'Simpan data packing berhasil!',
        //                 showConfirmButton: false,
        //                 timer: 1750
        //             });
        //             reloadTable();
        //         }
        //     })
        // }

        $('#output_qty').blur(function(event) {
            // calculateTotalActualQty()
            if (status == "Add") {
                if (!isNaN($('#output_qty').val()) && $('#output_qty').length != 0) {
                    $('#actual_qty').val($(this).val());
                    var boxCapacity = parseInt($('#box_capacity').val());
                    var outputQty = parseInt($('#output_qty').val());

                    actualBoxes1 = Math.round(outputQty / boxCapacity);
                    $('#actual_boxes').val(actualBoxes1);
                    // $('#actual_boxes').val('1');
                }
            } else if (status == "Update") {
                if (!isNaN($('#output_qty').val()) && $('#output_qty').length != 0) {
                    var actualQty = ($('#actual_qty').val() == "" ? 0 : parseInt($('#actual_qty').val()));

                    var outputQty = parseInt($('#output_qty').val());
                    $('#actual_qty').val(actualQty + outputQty);

                    actualBoxes = ($('#actual_boxes').val() == "" ? 0 : parseInt($('#actual_boxes').val()));

                    var boxCapacity = parseInt($('#box_capacity').val());

                    actualBoxes1 = Math.round(outputQty / boxCapacity);

                    $('#actual_boxes').val(actualBoxes + actualBoxes1);
                }
            }
        });

        function getQtySizeBoxes(ov, s, c, st) {
            var selectedRow = {
                'orc': ov,
                'size': s,
                'color': c,
                'style': st
            };

            $.ajax({
                type: 'POST',
                url: 'packing/ajax_get_by_qty_size_boxes',
                dataType: 'json',
                data: {
                    'selectedRow': selectedRow
                },
            }).done(function(r) {
                console.log('r: ', r);
                if (r != null) {
                    $('#total_qty_size').val(r.qty_detail);
                    $('#output_qty').val('0');
                    totalQty = r.qty;
                    if (status == "Update") {
                        console.log('selectedRow: ', selectedRow);
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("packing/ajax_get_actual_boxes_qty"); ?>',
                            dataType: 'json',
                            data: {
                                'dataPacking': selectedRow
                            }
                        }).done(function(value) {
                            console.log('value: ', value);
                            if (value != null) {
                                $('#actual_boxes').val(value.sum_actual_boxes);
                                $('#actual_qty').val(value.sum_actual_qty);
                            }
                        })
                    }
                }
            });

        }

        function getMaxBoxes(o) {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("packing/ajax_get_max_boxes"); ?>/' + o,
                dataType: 'json',
            }).done(function(rv) {
                boxes = rv.max_boxes;
            })
        }

        function reloadTable() {
            table.ajax.reload(null, false);
        }

        $('#modal_packing').on('hidden.bs.modal', function() {
            status = "";
            tableSize.clear().draw();

            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("select")
                .val("")
                .end();
            // $('#orc_packing').empty();
        });

        $('#modal_packing_detail').on('hidden.bs.modal', function() {
            status = "";
            tableDetailPacking.clear().draw();

        });        
        // });

        $('#btnUpdatePacking').click(function() {
            if (table.rows('.selected').any()) {
                status = "Update";
                
                var selRow = table.rows({
                    selected: true
                }).data();
                console.log('selRow: ', selRow);
                idPacking = selRow[0][0];
                orcVal = selRow[0][2];
                console.log('orcVal: ', orcVal);
                $('#orcPacking').val('');

                searchByOrc(orcVal);
                $('#orcPacking').val(orcVal);
                $('#modal_packing').modal('show');

            } else {
                Swal.fire({
                    type: 'warning',
                    title: 'Peringatan',
                    text: 'Pilih ORC terlebih dahulu!',
                    showConfirmButton: true
                });
            }
        });

        $('#btnShowPacking').click(function() {
            if (table.rows('.selected').any()) {

                $('#modal_packing_detail').modal('show');
            }else{
                Swal.fire({
                    type: 'warning',
                    title: 'Peringatan',
                    text: 'Pilih ORC terlebih dahulu!',
                    showConfirmButton: true
                });                
            }
        });
    </script>
</body>

</html>