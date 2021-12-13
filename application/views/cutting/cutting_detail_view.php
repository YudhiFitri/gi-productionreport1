
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
  <style rel="stylesheet">
      .center-text{
          text-align: center
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
            <h1 class="m-0 text-dark">Cutting Detail</h1>
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
                          <h3 class="card-title">Data Cutting Detail</h3>
                          <div class="card-tools">
                            <a href="<?php echo site_url('cutting'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
                          </div>
                      </div>
                      <div class="card-body">
                          <table id="cuttingDetailTable" class="table table-display table-hover nowrap" style="width: 100%">
                            <thead>
                                <th>id</th>
                                <th>size</th>
                                <th>qty</th>
                                <th>bundle #</th>
                                <th>outer mold</th>
                                <th>mid mold</th>
                                <th>linnig mold</th>
                                <th>panty</th>
                                <th>Actions</th>
                            </thead>
                            <tfoot>
                            <th>id</th>
                                <th>size</th>
                                <th>qty</th>
                                <th>bundle #</th>
                                <th>outer mold</th>
                                <th>mid mold</th>
                                <th>linnig mold</th>
                                <th>panty</th>
                                <th>Actions</th>                                
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

<script>
    var dataDetailCutting = JSON.parse(localStorage.getItem("cuttingDetails"));
    var detailTable = $('#cuttingDetailTable').DataTable({
        order:[[4, "asc"]],
        lengthMenu: [[5,10,25,50,100],[5,10,25,50,100]],
        columnDefs: [
            {
                targets: [4,5,6,7],
                className: 'center-text'
            }
        ]
    });

    console.log('dataDetailCutting: ', dataDetailCutting);

    $.each(dataDetailCutting, function(i, item){
        $.each(item, function(x, itm){
            detailTable.row.add([
                itm.id_cutting_detail,
                itm.size,
                itm.qty_pcs,
                itm.no_bundle,
                (itm.outermold_barcode !="" ? "<i class='fa fa-check'></i>" : "<i class='fa fa-ban'></i>"),
                (itm.midmold_barcode !="" ? "<i class='fa fa-check'></i>" : "<i class='fa fa-ban'></i>"),
                (itm.linningmold_barcode !="" ? "<i class='fa fa-check'></i>" : "<i class='fa fa-ban'></i>"),
                (itm.panty_barcode !=null ? "<i class='fa fa-check'></i>" : "<i class='fa fa-ban'></i>"),
                '<a href="#" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-remove"></i></a>'
            ]).draw();
        })
    })
</script>
</body>
</html>
