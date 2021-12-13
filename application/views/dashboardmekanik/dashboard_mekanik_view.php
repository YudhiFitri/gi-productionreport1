<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Production Report | Admin Molding Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('_partials/js.php'); ?>    
    <?php $this->load->view('_partials/css.php'); ?>
    <link href="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/datatables/select.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/sweetalert2/css/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/iCheck/all.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/select2/select2.min.css'); ?>" rel="stylesheet">
</head>

<!-- <body class="hold-transition sidebar-mini"> -->

<body class="layout-top-nav sidebar-collapse" style="height: auto">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partials/navbar_mekanik.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- <//?php $this->load->view('_partials/sidebar_mekanik.php'); ?> -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Admin Mechanic Dashboard </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-success" id="showAll">
                                <div class="inner">
                                    <h3 id="total"></h3>
                                    <p>Total Machines Repairing & Breakdown</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-checkmark"></i>
                                </div>
                                <a href="<?php echo site_url('Mekanik/show_machine_breakdown_repairing'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-danger" id="showBreakdown">
                                <div class="inner">
                                    <h3 id="breakdown"></h3>
                                    <p>Machines Breakdown</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-flag"></i>
                                </div>
                                <a href="<?php echo site_url('Mekanik/show_machine_breakdown'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-warning" id="showRepairing">
                                <div class="inner">
                                    <h3 id="repairing"></h3>
                                    <p>Machines Repairing</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-wrench"></i>
                                </div>
                                <a href="<?php echo site_url('Mekanik/show_machines_repairing'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-4">
                            <div class="small-box bg-info" id="show1stFloor">
                                <div class="inner">
                                    <h3 id="firstFloor"></h3>
                                    <p>Machines Breakdown/Repairing at 1st Floor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-wrench"></i>
                                </div>
                                <a href="<?php echo site_url('Mekanik/show_machine_breakdown_repairing_1st'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-4">
                            <div class="small-box bg-info" id="show2ndFloor">
                                <div class="inner">
                                    <h3 id="secondFloor"></h3>
                                    <p>Machines Breakdown/Repairing at 2nd Floor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-wrench"></i>
                                </div>
                                <a href="<?php echo site_url('Mekanik/show_machine_breakdown_repairing_2nd'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-4">
                            <div class="small-box bg-info" id="show3rdFloor">
                                <div class="inner">
                                    <h3 id="thirdFloor"></h3>
                                    <p>Machines Breakdown/Repairing at 3rd Floor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-wrench"></i>
                                </div>
                                <a href="<?php echo site_url('Mekanik/show_machine_breakdown_repairing_3rd'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
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

    <?php $this->load->view('_partials/modal.php'); ?>
    <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/sweetalert2/js/sweetalert2.min.js'); ?>"></script>


    <script>
        $('#showAll').hide();
        $('#showBreakdown').hide();
        $('#showRepairing').hide();
        $('#show1stFloor').hide();
        $('#show2ndFloor').hide();
        $('#show3rdFloor').hide();
        getTotalMachines();
        getMachines1stFloor();
        getMachines2ndFloor();
        getMachines3rdFloor();

        function getTotalMachines(){
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_count_all_machines"); ?>',
                dataType: 'json',
            }).done(function(dt) {
                $('#total').text(dt.countLine);
                $('#showAll').fadeIn(1500);
            });            
        }

        function getMachines1stFloor(){
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_machines_1st_floor"); ?>',
                dataType: 'json'
            }).done(function(dt){
                $('#firstFloor').text(dt.countLine);
                $('#show1stFloor').fadeIn(1500);
            });
        }

        function getMachines2ndFloor(){
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_machines_2nd_floor"); ?>',
                dataType: 'json'
            }).done(function(dt){
                $('#secondFloor').text(dt.countLine);
                $('#show2ndFloor').fadeIn(1500);
            });
        }
        
        function getMachines3rdFloor(){
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Mekanik/ajax_get_machines_3rd_floor"); ?>',
                dataType: 'json'
            }).done(function(dt){
                $('#thirdFloor').text(dt.countLine);
                $('#show3rdFloor').fadeIn(1500);
            })
        }        


    </script>
</body>

</html>