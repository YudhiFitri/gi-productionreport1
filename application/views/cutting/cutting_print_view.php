
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
            <h1 class="m-0 text-dark">Print Label & Barcode</h1>
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
                          <h3 class="card-title">Data Cutting</h3>
                      </div>
                      <div class="card-body">
                          <table id="cuttingPrintTable" class="table table-striped" style="width: 100%">
                            <thead>
                                <th>ID</th>
                                <th>ORC</th>
                                <th>STYLE</th>
                                <th>COLOR</th>
                                <th>BUYER</th>
                                <th>COMM</th>
                                <th>SO</th>
                                <th>QTY</th>
                                <th>BOXES</th>
                                <th>PREPARE ON</th>
                                <th>Action</th>
                            </thead>
                            <tfoot>
                                <th>ID</th>
                                <th>ORC</th>
                                <th>STYLE</th>
                                <th>COLOR</th>
                                <th>BUYER</th>
                                <th>COMM</th>
                                <th>SO</th>
                                <th>QTY</th>
                                <th>BOXES</th>
                                <th>PREPARE ON</th>
                                <th>Action</th>
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
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/select2/select2.full.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url('plugins/jquery-barcode/jquery-barcode.min.js'); ?>"></script> -->


<script>
  var table;
  var detailTable;
  var idCutting;
  var selectedRow;
  var selectedRows;
  
  $(document).ready(function(){

    table = $('#cuttingPrintTable').DataTable({
      "autoWidth": true,      
      "processing": true,
      // "serverSide": true,      
      "order" :[],
      "distroy" : true,
      "select" :{
        "style" : "single"
      },      
      "ajax": {
        "url" : "<?php echo site_url('cutting/ajax_get_all'); ?>",
        "type": "POST",
        "dataType": "json",
        "dataSrc" : "",
      },
      "columns" : [
        {"data" : "id_cutting"},
        {"data" : "orc"},
        {"data" : "style"},
        {"data" : "color"},
        {"data" : "buyer"},
        {"data" : "comm"},
        {"data" : "so"},
        {"data" : "qty"},
        {"data" : "boxes"},
        {"data" : "prepare_on"},
        {
          "data" : null,
          "render" : function(data, type, row){
            // console.log(data);
            // return '<button id="btnPrint" class="btn btn-sm btn-success"><i class="fa fa-print></i> Print Barcode</button>'
            return '<a href="<?php echo site_url('cutting/print_barcode'); ?>/' + data.id_cutting + '" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i> Print Barcode</button>' ;
          }
        }
      ]
    });

    $('#cuttingPrintTable').on('click', 'tr', function(){
      idCutting = table.row(this).data().id_cutting;
    });

    $('#btnPrint').click(function(){
      console.log(idCutting);
    })

  });



    
</script>
</body>
</html>
