<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Dashboard</title>
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
              <h1 class="m-0 text-dark">Inputing Cutting Result </h1>
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
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Data Input Cutting Result</h3>
                  <!-- <div class="card-tools">
                    <button id="scanBundle" class="btn btn-success" data-toggle="modal" data-target="#modal_show_scan_bundle"><i class="fa fa-plus"></i> Scan Record Bundle</button>
                  </div> -->
                </div>
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label>Please Select Planning Line</label>
                    <select class="select2 form-control" id="line" width="100%"></select>
                  </div> -->
                  <div class="form-group">
                    <label>Please Scan Bundle Record</label>
                    <input type="text" id="barcode" class="form-control">
                  </div>
                  <table id="inputCuttingTable" class="table table-striped" style="width: 100%">
                    <thead>
                      <th>ID</th>
                      <th>ORC</th>
                      <th>STYLE</th>
                      <th>COLOR</th>
                      <th>BUNDLE NO.</th>
                      <th>SIZE</th>
                      <th>QTY</th>
                      <th>DATE</th>
                    </thead>
                    <tfoot>
                      <th>ID</th>
                      <th>ORC</th>
                      <th>STYLE</th>
                      <th>COLOR</th>
                      <th>BUNDLE NO.</th>
                      <th>SIZE</th>
                      <th>QTY</th>
                      <th>DATE</th>
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
  <script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>


  <script>
    var table;
    var detailTable;
    var idCutting;
    var selectedRow;
    var selectedRows;
    var barcodeSplit;


    $(document).ready(function() {
      $(".select2").select2();

      // loadLine();

      // function loadLine() {
      //   $('#line').empty();
      //   $.ajax({
      //     url: '<//?php echo site_url("outputcutting/ajax_get_all_line"); ?>',
      //     type: 'GET',
      //     dataType: 'json',
      //     success: function(dt) {
      //       $.each(dt, function(i, item) {
      //         $('#line').append($('<option>', {
      //           value: item.name,
      //           text: item.name
      //         })).trigger('change')
      //       })
      //     }
      //   });
      // }

      table = $('#inputCuttingTable').DataTable({
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('inputcutting/ajax_list'); ?>",
          "type": "POST",
          "dataType": "json",
        },

      });

      // $('#scanBundle').click(function(){
      //   $('#modal_show_scan_bundle').modal('show');
      //   // $('#barcode').focus();
      // });

      $('#modal_show_scan_bundle').on('shown.bs.modal', function() {
        $('#barcode').trigger('focus');
      })

      $('#barcode').keypress(function(e) {
        if (e.keyCode == 13) {
          e.preventDefault();

          var barcode = $('#barcode').val();
          barcodeSplit = barcode.split("_");

          console.log('barcode_split[1]: ', barcodeSplit[1]);


          // check_barcode($('#barcode').val());
          check_barcode(barcodeSplit[1]);
        }
      });

      function check_barcode(barcode) {
        $.ajax({
          url: '<?php echo site_url("inputcutting/ajax_get_by_barcode"); ?>/' + barcode,
          type: 'get',
          dataType: 'json',
          success: function(dt) {
            console.log('dt: ', dt);
            if (dt == 0) {
              Swal.fire({
                type: "warning",
                title: "Warning!",
                text: "This barcode already scanned!",
                showConfirmButton: false,
                timer: 500
              });
              $('#barcode').val('');
              $('#barcode').focus();
            } else {
              save_bundle_record(dt);
            }
            // if(dt != null){

            //   save_bundle_record(dt);
            // }
          }
        });
      }

      function save_bundle_record(data) {
        var dataStr = {
          'orc': data.orc,
          // 'line': $('#line').val(),
          'style': data.style,
          'color': data.color,
          'no_bundle': data.no_bundle,
          'size': data.size,
          'qty_pcs': data.qty_pcs,
          'kode_barcode': barcodeSplit[1]
        };

        $.ajax({
          url: '<?php echo site_url("inputcutting/ajax_save"); ?>',
          data: {
            'dataStr': dataStr
          },
          method: 'post',
          dataType: 'json'
        }).done(function(retVal) {
          if (retVal > 0) {
            Swal.fire({
              type: 'info',
              title: 'Save Data Success!!',
              showConfirmButton: false,
              timer: 500
            });
          }
          $('#barcode').val('');
          $('#barcode').focus();
          reload_table();
        });
      }

      function reload_table() {
        table.ajax.reload(null, false);

      }


    });
  </script>
</body>

</html>