
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Production Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php $this->load->view('_partials/css.php'); ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('template/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('template/sidebar.php'); ?>

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
          <div class="col-md-4">
            <div class="card bg-primary-gradient">
              <div class="card-header">
                <h3 class="card-title">Cutting Department</h3>
              </div>
              <div class="card-body">
                <table class="table table-responsive" id="tablecutting">
                  <tr>
                    <th>Result</th>
                    <th>Efficiency</th>
                    <th>WIP</th>
                    <th>To sewing</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-primary-gradient">
              <div class="card-header">
                <h3 class="card-title">Sewing Department</h3>
              </div>
              <div class="card-body">
                <table class="table table-responsive" id="tablecutting">
                  <tr>
                    <th>Result</th>
                    <th>Efficiency</th>
                    <th>wIP</th>
                    <th>To Packing</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-primary-gradient">
              <div class="card-header">
                <h3 class="card-title">Packing Department</h3>
              </div>
              <div class="card-body">
                <table class="table table-responsive" id="tablecutting">
                  <tr>
                    <th>Result</th>
                    <th>Efficiency</th>
                    <th>wIP</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>

        <!-- Small boxes (Stat box) -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('template/footer.php'); ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view('_partials/js.php'); ?>
</body>
</html>
