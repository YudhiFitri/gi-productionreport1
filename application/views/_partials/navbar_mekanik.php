<!-- <nav class="main-header navbar navbar-expand bg-danger-gradient navbar-light border-bottom"> -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="<?php echo base_url('img/adminmechanic.png'); ?>" alt="App Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Production Report-Mekanik</span>
        </a>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo site_url('dashboardmekanik'); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                        Menu Mekanik
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li>
                            <a href="<?php echo site_url('Mekanik/show_machine_breakdown_repairing'); ?>" class="dropdown-item">Calling for Machines Breakdown</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Mekanik/show_machine_settlement'); ?>" class="dropdown-item">Delayed Machine Settlement</a>
                        </li>
						<li>
							<a href="<?php echo site_url('Mekanik/clearingMachinesBreakdown'); ?>" class="dropdown-item">Clearing Machines Breakdown</a>
						</li>                        
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-flag">
                            <span id="machineBreakdown" class="badge badge-danger navbar-badge"></span>
                        </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listMachineBreakdown">
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-wrench">
                            <span id="machineRepairing" class="badge badge-warning navbar-badge"></span>
                        </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listMachineRepairing">
                    </div>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('user/logout'); ?>" class="nav-link">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<//?php echo site_url('DashboardMekanik'); ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<//?php echo site_url('user/logout'); ?>" class="nav-link">Log Out</a>
        </li>

    </ul> -->
</nav>

<script>
    countMachineBreakdown();
    countMachineRepairing();
    listMachineBreakdown();
    listMachineRepairing();

    setInterval("countMachineBreakdown();", 10000);
    setInterval("countMachineRepairing();", 10000);
    setInterval("listMachineBreakdown();", 10000);
    setInterval("listMachineRepairing();", 10000);    

    function countMachineBreakdown() {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("Mekanik/ajax_count_machines_breakdown"); ?>',
            dataType: 'json',
        }).done(function(dt) {

            $('#machineBreakdown').text(dt.countLine);
            $('#breakdown').text(dt.countLine);
            $('#showBreakdown').fadeIn(1500);
        });
    }

    function countMachineRepairing() {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("Mekanik/ajax_count_machines_repairing"); ?>',
            dataType: 'json',
        }).done(function(dt) {
            $('#machineRepairing').text(dt.countLine);
            $('#repairing').text(dt.countLine);
            $('#showRepairing').fadeIn(1500);
        });
    }

    function listMachineBreakdown(){
        $.getJSON('<?php echo site_url("Mekanik/ajax_list_machine_breakdown"); ?>', (data, textStatus, jqXHR)=>{
            showListMachineBreakdown(data);

        });
    }

    function listMachineRepairing(){
        $.getJSON('<?php echo site_url("Mekanik/ajax_list_machine_repairing"); ?>', (data, textStatus, jqXHR)=>{
            showListMachineRepairing(data);
        });
    }    

    function showListMachineBreakdown(dt){
        var htmlListMachineBreakdonwn = "";
        $.each(dt, function(i, item){
            htmlListMachineBreakdonwn +="<a href='#' class='dropdown-item'>" + 
                                            "<div class='media'>" + 
                                                "<img src='<?php echo base_url("img/flag-48.png"); ?>' alt='breakdown avatar' class='img-size-50 mr-3 img-circle'>" + 
                                                "<div class='media-body'>" + 
                                                    "<h3 class='dropdown-item-title'>" + item.line + "</h3>" + 
                                                    "<p class='text-sm'>" + item.machine_type + "</p>" + 
                                                    "<p class='text-sm'>" + item.machine_sn + "</p>" + 
                                                    "<p class='text-sm text-muted'>" + item.sympton + "</p>" + 
                                                "</div>" + 
                                            "</div>" +
                                        "</a>" + 
                                        "<div class='dropdown-divider'></div>";
        });
        htmlListMachineBreakdonwn += "<a href='<?php echo site_url("Mekanik/show_machine_breakdown"); ?>' class='dropdown-item dropdown-footer'>See All Messages</a>";
        $('#listMachineBreakdown').empty();
        $('#listMachineBreakdown').append(htmlListMachineBreakdonwn);        
    }

    function showListMachineRepairing(dt){
        var htmlListMachineRepairing = "";
        $.each(dt, function(i, item){
            htmlListMachineRepairing +="<a href='#' class='dropdown-item'>" + 
                                            "<div class='media'>" + 
                                                "<img src='<?php echo base_url("img/wrench-48.png"); ?>' alt='breakdown avatar' class='img-size-50 mr-3 img-circle'>" + 
                                                "<div class='media-body'>" + 
                                                    "<h3 class='dropdown-item-title'>" + item.line + "</h3>" + 
                                                    "<p class='text-sm'>" + item.machine_type + "</p>" + 
                                                    "<p class='text-sm'>" + item.machine_sn + "</p>" + 
                                                    "<p class='text-sm text-muted'>" + item.sympton + "</p>" + 
                                                "</div>" +
                                            "</div>" +
                                        "</a>" + 
                                        "<div class='dropdown-divider'></div>";
        });
        htmlListMachineRepairing += "<a href='<?php echo site_url("Mekanik/show_machines_repairing"); ?>' class='dropdown-item dropdown-footer'>See All Messages</a>";
        $('#listMachineRepairing').empty();
        $('#listMachineRepairing').append(htmlListMachineRepairing);
    }
</script>