<?php include "header.php";
session_start();
?>
 <style>
  
        /* For Chrome or Safari */
        progress::-webkit-progress-bar {
            background-color: #eeeeee;
        }
   
</style>
</head>
<body>

<?php if(empty($_SESSION['username']))
    {
    
        ?>
  
    <script> location.replace("adminlogin.php"); </script>
    <?php
          
    }
    include "navbar.php";
?>


<?php

 $bcount="SELECT BloodBank_id, COUNT(*) FROM bloodbank_details";
$bcount_run=mysqli_query($connection,$bcount);
$brows = mysqli_fetch_row($bcount_run);
   
$dcount="SELECT email, COUNT(*) FROM donor_details";
$dcount_run=mysqli_query($connection,$dcount);
$rows = mysqli_fetch_row($dcount_run);
$rcount="SELECT email, COUNT(*) FROM recipient_details";
$rcount_run=mysqli_query($connection,$rcount);
$rrows = mysqli_fetch_row($rcount_run);


?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Ventura - Dashboard</title><br>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Main Wrapper -->
            <!-- Header -->
                <?php include("header.php"); ?>
            <!-- /Header -->
            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Welcome Admin!</h3>
                                <p></p>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fe fe-users"></i>
                                        </span>
                                    </div>
                                    <div class="dash-widget-info">
                                        <?php  $totals= $brows[1]+$rows[1]+$rrows[1];?>
                                        <h3><?php echo $totals;
                                           ?></h3>
                                          
                                        <h6 class="text-muted">Users</h6>
                                         <progress value="100" max="100" ></progress>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-success">
                                            <i class="fe fe-users"></i>
                                        </span>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h3><?php
                                            echo $brows[1];?></h3>
                                        <h6 class="text-muted">Blood Bank</h6>
                                         
                                          <progress value="<?php echo($brows[1]) / $totals * 100;?>" max="100"></progress>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-danger">
                                            <i class="fe fe-users"></i>
                                        </span>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h3><?php 
                                            echo $rows[1];?>
                                             </h3>
                                        <h6 class="text-muted">Donor</h6>
                                          <progress value="<?php echo($rows[1]) / $totals * 100;?>" max="100"></progress>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-warning">
                                            <i class="fe fe-users"></i>
                                        </span>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h3><?php 
                                            echo $rrows[1];?></h3>
                                        <h6 class="text-muted">Recipent</h6>
  
                                            <progress  value="<?php echo($rrows[1]) / $totals * 100;?>" max="100"></progress>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
    $total = mysqli_query($connection,"select sum(unit) from blood_details");
    $total_count=mysqli_fetch_assoc($total);
    $ap_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='A+' && type='blood'");
    $total_ap=mysqli_fetch_assoc($ap_query);
    $an_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='A-' && type='blood'");
    $total_an=mysqli_fetch_assoc($an_query);
    $bp_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='B+' && type='blood'");
    $total_bp=mysqli_fetch_assoc($bp_query);
    $bn_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='B-' && type='blood'");
    $total_bn=mysqli_fetch_assoc($bn_query);
    $op_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='O+' && type='blood'");
    $total_op=mysqli_fetch_assoc($op_query);
    $on_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='O-' && type='blood'");
    $total_on=mysqli_fetch_assoc($on_query);
    $abp_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='AB+' && type='blood' ");
    $total_abp=mysqli_fetch_assoc($abp_query);
    $abn_query = mysqli_query($connection,"select sum(unit) from blood_details where blood_group='AB-' && type='blood'");
    $total_abn=mysqli_fetch_assoc($abn_query);
    $ap=number_format((float)($total_ap['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $an= number_format((float)($total_an['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $bp= number_format((float)($total_bp['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $bn= number_format((float)($total_bn['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $op= number_format((float)($total_op['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $on= number_format((float)($total_on['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $abp= number_format((float)($total_abp['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    $abn= number_format((float)($total_abn['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');?>
<!--BLOOD GROUP-->
                <div class="row">

 <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $ap;?>%</h5>
                            <h1 class="display-4">A+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_ap['sum(unit)']?> unit</h6>
                        </div>
                    </div>
                </div>
<div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $bp;?>%</h5>
                            <h1 class="display-4">B+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_bp['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
<div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $op;?>%</h5>
                            <h1 class="display-4">O+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_op['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
<div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $abp;?>%</h5>
                            <h1 class="display-4">AB+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_abp['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="row " >
  
 
<div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $an;?>%</h5>
                            <h1 class="display-4">A-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_an['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
<div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $bn;?>%</h5>
                            <h1 class="display-4">B-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_bn['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
<div class="col-xl-3 col-sm-5 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $on;?>%</h5>
                            <h1 class="display-4">O-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_on['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
<div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $abn;?>%</h5>
                            <h1 class="display-4">AB-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_abn['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                
    </div>
        <!-- /Main Wrapper -->
        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/raphael/raphael.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/js/chart.morris.js"></script>
        <!-- Custom JS -->
        <script  src="assets/js/script.js"></script>
    </body>
</html>
<?php include "footer.php";?>