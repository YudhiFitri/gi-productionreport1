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

  <style>
    .error-class {
      color: #FF0000;
      /* red */
    }

    .valid-class {
      color: #00CC00;
      /* green */
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
            <div class="col-md-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Add New Order</h3>
                </div>
                <form id="form-order" name="form-order">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Buyer:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="buyer" name="buyer" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Color:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="color" name="color" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Shipment Plan:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control datepicker" id="shipment_plan" name="shipment_plan" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">ETD:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control datepicker" id="etd" name="etd" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Cust PO No:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="po" name="po" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">ORC:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="orc" name="orc" maxlength="15" />
                          </div>
                        </div>                        

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Style:</label>
                          <div class="col-md-6">
                            <input type="text" id="style" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Style SAM:</label>
                          <div class="col-md-6">
                            <select id="style_sam" class="form-control select2" width="100%" name="style_sam">
                              <option value="">Please select a style
                                <?php foreach ($styles as $s) : ?>
                              <option value="<?php echo $s->style; ?>"><?php echo $s->style; ?></option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Comm:</label>
                          <div class="col-md-2">
                            <input type="text" class="form-control" id="comm" name="comm" maxlength="5" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Total QTY:</label>
                          <div class="col-md-4">
                            <input type="number" class="form-control" id="total_qty" name="total_qty" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Line Allocation 1:</label>
                          <div class="col-md-6">
                            <select id="line_allocation1" name="line_allocation1" class="form-control select2" width="100%">
                              <option value=''>Please select a line</option>
                              <?php foreach ($lines as $l) : ?>
                                <option value="<?php echo $l->name; ?>"><?php echo $l->name; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Line Allocation 2:</label>
                          <div class="col-md-6">
                            <select id="line_allocation2" name="line_allocation2" class="form-control select2" width="100%">
                              <option value=''>Please select a line</option>
                              <?php foreach ($lines as $l) : ?>
                                <option value="<?php echo $l->name; ?>"><?php echo $l->name; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label text-right">Line Allocation 3:</label>
                          <div class="col-md-6">
                            <select id="line_allocation3" name="line_allocation3" class="form-control select2" width="100%">
                              <option value=''>Please select a line</option>
                              <?php foreach ($lines as $l) : ?>
                                <option value="<?php echo $l->name; ?>"><?php echo $l->name; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>                        

                      </div>

                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" id="btnSaveOrder" name="btnSaveOrder" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                    <button type="button" id="btnCancelOrder" name="btnCanvelOrder" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</button>
                    <!-- <button type="button" id="btnBack" name="btnBack" class="btn btn-default btn-lg float-right"><i class="fa fa-arrow-left"></i> Back</button> -->
                    <a href="<?php echo site_url('order'); ?>" class="btn btn-default float-right"><i class="fa fa-arrow-left"></i> Back</a>
                  </div>
                </form>
              </div>

            </div>

            <!--modal add order-->
            <!--end add bundle modal-->
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
  <!-- <//?php $this->load->view('_partials/modal.php'); ?> -->
  <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
  <script src="<?php echo base_url('dist/js/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>

  <script>
    // function format ( d ) {
    //     return 'Size: ' + d.size + '<br>' + 'Qty: ' + d.qty_size+'<br>';
    // }
    $(document).ready(function() {
      var bolBuyer = false,
        bolColor = false,
        bolEtd = false,
        bolPo = false,
        bolStyle = false,
        bolOrc = false;
      var bolComm = false,
        bolTotQty = false;

      $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        language: "id",
        autoclose: true,
        todayHighlight: true
      });
      $('.select2').select2();

      // $(function(){
      $('form[name="form-order"]').validate({
        focusCleanup: true,
        errorClass: 'error-class',
        validClass: 'success-class',
        rules: {
          buyer: 'required',
          color: 'required',
          etd: 'required',
          po: 'required',
          style: 'required',
          style_sam: 'required',
          orc: 'required',
          comm: 'required',
          total_qty: 'required'
        },
        submitHandler: function(form) {
          // form.submit()
          // alert('kjaskdjksjd');
          var dataOrder = {
            'buyer': $('#buyer').val(),
            'color': $('#color').val(),
            'shipment_plan': $('#shipment_plan').val(),
            'etd': $('#etd').val(),
            'po': $('#po').val(),
            'orc': $('#orc').val(),
            'style': $('#style').val(),
            'style_sam': $('#style_sam').val(),
            'comm': $('#comm').val(),
            'total_qty': $('#total_qty').val(),
            'line_allocation1': $('#line_allocation1').val(),
            'line_allocation2': $('#line_allocation2').val(),
            'line_allocation3': $('#line_allocation3').val()
          }

          $.ajax({
            type: 'POST',
            url: '<?php echo site_url("order/ajax_save"); ?>',
            dataType: 'json',
            data: {
              'dataOrder': dataOrder
            },
          }).done(function(rst) {
            if (rst > 0) {
              Swal.fire({
                type: 'success',
                title: 'Berhasil',
                text: 'Data Order berhasil disimpan',
                showConfirmButton: false,
                timer: 2000
              });
              $('#form-order')[0].reset();
              $('#buyer').focus();
            }
          })
        }
      });

      // });


      // $('#btnSaveOrder').prop('disabled', true);

      $('#orc').blur(function() {
        var orc = $(this).val();

        $.ajax({
          url: '<?php echo site_url("order/ajax_get_by_orc"); ?>/' + orc,
          dataType: 'json',
        }).done(function(r) {
          if (r != null) {
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: 'ORC ini sudah diinput sebelumnya!!',
              showConfirmButton: false,
              timer: 2000
            });
            // $('#form-order')[0].reset();
            // $('#buyer').focus();
            $('#orc').val('');
            $('#orc').focus();
          }
        })
      });


    });
  </script>
</body>

</html>