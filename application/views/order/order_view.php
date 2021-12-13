<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Admin PPIC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view('_partials/css.php'); ?>
  <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">

  <style rel="stylesheet">
    td.details-control {
      background: url('../resources/details_open.png') no-repeat center center;
      cursor: pointer;
    }

    tr.details td.details-control {
      background: url('../resources/details_close.png') no-repeat center center;
    }
  </style>


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php $this->load->view('_partials/navbar_ppic.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('_partials/sidebar_ppic.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
              </ol>
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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Order</h3>
                </div>
                <div class="card-body">

                  <table id="orderTable" class="table table-border table-striped" width="100%">
                    <thead>
                      <th>id</th>
                      <th width="10%">style</th>
                      <th>orc</th>
                      <th>comm</th>
                      <th>buyer</th>
                      <th>so</th>
                      <th>color</th>
                      <th>qty</th>
                      <th>etd</th>
                      <th>Actions</th>
                    </thead>
                    <tfoot>
                      <th>id</th>
                      <th>style</th>
                      <th>orc</th>
                      <th>comm</th>
                      <th>buyer</th>
                      <th>so</th>
                      <th>color</th>
                      <th>qty</th>
                      <th>etd</th>
                      <th>Actions</th>
                    </tfoot>
                  </table>
                  <!-- </div> -->
                </div>
                <div class="card-footer text-center">
                  <!-- <button type="button" id="btnAddOrder" class="btn btn-default"><i class="fa fa-plus"></i> Add Order</button> -->
                  <a href="<?php echo site_url('order/add_order'); ?>" class="btn btn-success float-left"><i class="fa fa-plus"></i> Add Order </a>
                  <!-- <div class="text-right"> -->
                  <form enctype="multipart/form-data" id="import_file_excel" method="post" class="float-right">
                    <!-- <p><label>Pilih file excel(.xlsx)</label></p> -->
                    <input type="file" name="file" id="file" required accept=".xlsx">
                    <button type="submit" name="import" id="import" class="btn btn-default"><i class="fa fa-upload"></i>Upload</button>
                  </form>
                  <a href="<?php echo base_url('excel/format-list-order.xlsx'); ?>" class="btn btn-default float-right"><span><i class="fa fa-download"></i> Download Format &nbsp;</span></a>
                  <!-- </div> -->
                </div>
              </div>
            </div>

            <!--modal edit order-->
            <div class="modal fade" id="modal_edit_order" role="dialog">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-success">
                    <h4 class="modal-title">Edit Data Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times</span>
                    </button>
                  </div>
                  <form id="form-edit-order" name="form-edit-order">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Buyer:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="buyer_edit" name="buyer_edit" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Color:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="color_edit" name="color_edit" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Shipment Plan:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control datepicker" id="shipment_plan_edit" name="shipment_plan" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">ETD:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control datepicker" id="etd_edit" name="etd_edit" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Cust PO No:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="po_edit" name="po_edit" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">ORC:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="orc_edit" name="orc_edit" maxlength="10" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Style:</label>
                            <div class="col-md-6">
                              <input type="text" id="style_edit" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Style SAM:</label>
                            <div class="col-md-6">
                              <select id="style_sam_edit" class="form-control col-md-6 select2" width="100%" name="style_sam_edit">
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Comm:</label>
                            <div class="col-md-2">
                              <input type="text" class="form-control" id="comm_edit" name="comm_edit" maxlength="2" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Total QTY:</label>
                            <div class="col-md-4">
                              <input type="number" class="form-control" id="total_qty_edit" name="total_qty_edit" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Line 1:</label>
                            <div class="col-md-6">
                              <select id="line_allocation1_edit" name="line_allocation1_edit" class="form-control select2" width="100%">
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Line 2:</label>
                            <div class="col-md-6">
                              <select id="line_allocation2_edit" name="line_allocation2_edit" class="form-control select2" width="100%">
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-right">Line 3:</label>
                            <div class="col-md-6">
                              <select id="line_allocation3_edit" name="line_allocation3_edit" class="form-control select2" width="100%">
                              </select>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="button" id="btnUpdateOrder" name="btnUpdateOrder" class="btn btn-success"><i class="fa fa-upload"></i> Update</button>
                      <!-- <button type="button" id="btnBack" name="btnBack" class="btn btn-default btn-lg float-right"><i class="fa fa-arrow-left"></i> Back</button> -->
                      <a href="#" class="btn btn-danger float-right close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i> Close</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end edit order modal-->
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

  <script src="<?php echo base_url('plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/extensions/jszip/js/jszip.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/extensions/pdf/js/pdfmake.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/extensions/vfs_fonts/js/vfs_fonts.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/extensions/buttonshtml5/js/buttons.html5.min.js'); ?>"></script>


  <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
  <script src="<?php echo base_url('dist/js/moment.min.js'); ?>"></script>

  <script>
      $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        language: "id",
        autoclose: true,
        todayHighlight: true
      });
      $('.select2').select2();    
    var orderTable = $('#orderTable').DataTable({
      dom: 'lBfrtip',
      buttons: [{
        extend: 'excel',
        text: 'Download',
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6, 7, 8],
          orthogonal: 'excel',
          modifier: {
            order: 'current',
            page: 'all',
            selected: false
          }
        }
      }, ],
      // serverSide: 'true',
      processing: 'true',
      order: [],
      autoWidth: true,
      ajax: {
        type: 'POST',
        url: '<?php echo site_url("order/ajax_get_all"); ?>',
        dataType: 'json',
        dataSrc: "",
      },
      columns: [{
          data: 'id_order'
        },
        {
          data: 'style'
        },
        {
          data: 'orc'
        },
        {
          data: 'comm'
        },
        {
          data: 'buyer'
        },
        {
          data: 'so'
        },
        {
          data: 'color'
        },
        {
          data: 'qty'
        },
        {
          data: 'etd'
        },
        {
          data: null
        }
      ],
      columnDefs: [{
        targets: 9,
        render: function(data, type, row) {
          return '<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action</button>' +
            '<ul class="dropdown-menu">' +
            // '<li class="dropdown-item"><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit Order" onclick="editOrder(' + "'" + row.id_order + "'" + ')"><i class="fa fa-pencil"></i> Edit Order</a></li>' +
            '<li class="dropdown-item"><a class="btn btn-sm btn-danger" href="<?php echo site_url('Order/edit_order'); ?>/' + row.id_order + '" title=Edit Order" ><i class="fa fa-pencil"></i> Edit Order</a></li>' +
            '<li class="dropdown-item"><a href="javascript:void(0);" title="Delete this order" class="btn btn-danger" onclick="deleteOrder(' + "'" + row.id_order + "'" + ')"><i class="fa fa-trash"></i> Delete This Order</a></li>' +
            '<li class="dropdown-divider"></li>' +
            '</ul>'
        }
      }]
    });

    $('#btnUpdateOrder').click(function() {
      var dataEditOrder = {
        'id_order': $('#idOrder').val(),
        'buyer': $('#buyer_edit').val(),
        'color': $('#color_edit').val(),
        'etd': $('#etd_edit').val(),
        'po': $('#po_edit').val(),
        'style': $('#style_edit').val(),
        'orc': $('#orc_edit').val(),
        'comm': $('#comm_edit').val(),
        'total_qty': $('#total_qty_edit').val(),
      }

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url("order/ajax_update"); ?>',
        dataType: 'json',
        data: {
          'dataEditOrder': dataEditOrder
        },
      }).done(function(rst) {
        console.log('rst update: ', rst);
        if (rst > 0) {
          Swal.fire({
            type: 'success',
            title: 'Data Order berhasil di-update',
            showConfirmButton: false,
            timer: 2000
          });
          $('#form-edit-order')[0].reset();
          $('#modal_edit_order').modal('hide');
          loadOrderTable();
        }
      })
    });

    function loadOrderTable() {
      orderTable.ajax.reload(null, false);
    }

    // });

    function editOrder(id) {
      console.log('id: ', id);
      $('#modal_edit_order').modal('show');
      loadStyle();
      loadLine();

      $.ajax({
        type: 'GET',
        url: '<?php echo site_url("Order/edit_order"); ?>/' + id,
        dataType: 'json',
      }).done(function(rst) {
        console.log('rst: ', rst);
        if (rst != null) {
          $('#idOrder').val(rst.id_order);
          $('#buyer_edit').val(rst.buyer);
          $('#color_edit').val(rst.color);
          $('#shipment_plan_edit').val(rst.plan_export),
          $('#etd_edit').val(rst.etd);
          $('#po_edit').val(rst.so);
          $('#style_edit').val(rst.style);
          $('#style_sam_edit').val(rst.style_sam);
          $('#orc_edit').val(rst.orc);
          $('#comm_edit').val(rst.comm);
          $('#total_qty_edit').val(rst.qty);
          $('#line_allocation1_edit').val(rst.line_allocation1);
          $('#line_allocation2_edit').val(rst.line_allocation2);
          $('#line_allocation3_edit').val(rst.line_allocation3);


        }
      })
    }

    function loadStyle() {
      $.ajax({
        url: '<?php echo site_url("order/ajax_get_all_style"); ?>',
        type: 'GET',
        dataType: 'json',
      }).done(function(r) {
        $('#style_sam_edit').empty();
        $.each(r, function(i, item) {
          $('#style_sam_edit').append($('<option>', {
            value: item.style,
            text: item.style
          }));
        });
      });
    }

    function loadLine(){
      $.ajax({
        url: '<?php echo site_url("order/ajax_get_all_line"); ?>',
        type: 'GET',
        dataType: 'json',
      }).done(function(r) {
        $('#line_allocation1_edit').empty();
        $('#line_allocation2_edit').empty();
        $('#line_allocation3_edit').empty();
        $.each(r, function(i, item) {
          $('#line_allocation1_edit').append($('<option>', {
            value: item.name,
            text: item.name
          }));

          $('#line_allocation2_edit').append($('<option>', {
            value: item.name,
            text: item.name
          }));
          
          $('#line_allocation3_edit').append($('<option>', {
            value: item.name,
            text: item.name
          }));          
        });
      });
    }

    function deleteOrder(idOrder) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Yakin akan dihapus?',
        text: "Data tidak bisa dikembalikan lagi!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, batalkan!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '<?php echo site_url("order/ajax_delete_order"); ?>/' + idOrder,
            dataType: 'json',
          }).done(function(rv) {
            if (rv > 0) {
              swalWithBootstrapButtons.fire(
                'Dihapus!',
                'Data sudah dihapus.',
                'success'
              );
              loadOrderTable();
            }
          })
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Dibatalkan',
            'Data tidak dihapus :)',
            'error'
          )
        }
      })
    }

    $('#import_file_excel').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url("Order/import"); ?>',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
      }).done(function(data) {
        if (data > 0) {
          Swal.fire({
            type: 'success',
            title: 'Imported data successfully.',
            showConfirmButton: false,
            timer: 2000
          });
          loadOrderTable();
          $('#file').val('');
        }
      })
    })

    // });
  </script>
</body>

</html>