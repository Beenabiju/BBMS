<?php include "header.php";
include "../database_connection.php";
     $date=date("y-m-d");
     $date=date_format(date_create($date),"Y-m-d");
session_start();
?>
<title>Dashboard</title>
</head>
<body>
<?php
    $_SESSION['remail']=null;
    $_SESSION['rname']=null;
    $_SESSION['rphone']=null;
    $_SESSION['rtype']=null;
    $_SESSION['runit']=null;
    $_SESSION['hemail']=null;
    $_SESSION['hphone']=null;
    ?>
<!--BBMS-->
<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#880808;">
  <a class="navbar-brand" href="#"><b>BBMS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <b>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
   
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <!--Recipient-->
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="sr-only">(current)</span>
          Find Blood
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="login.php">Donor Booking</a>
          <a class="dropdown-item" href="../Recipient/login1.php">BloodBank Booking</a>
        </div>
        
      </li>
      
      <!--BloodBank-->
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="sr-only">(current)</span>
          Blood Bank
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Bloodbank/login.php">Login</a>
          <a class="dropdown-item" href="../Bloodbank/registration.php">Register</a>
        </div>
      </li>
      
      <!--Donor-->
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="sr-only">(current)</span>
          Donor
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Donor/donor_login.php">Login</a>
          <a class="dropdown-item" href="../Donor/donor_registration.php">Register</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="verification.php">Booking History</a>
      </li>
    </ul>
  </div>
    </b>
</nav>

 <!--Search--> 
  <form class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="Search" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
        <i class="fa fa-search"></i>
     </button>
       </div></div>  </form>
  
  
<marquee width="100%" direction="left" height="90px" style="font-size:18pt; color:#880808"><b id="alert">Shortage in </b></marquee>

<!--alert-->
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
      <?php 
    echo "<ul>";
    $select_query = mysqli_query($connection,"select * from alert");
    while($row_select=mysqli_fetch_assoc($select_query))
    {
        if($row_select['expire']>$date)
        echo "<li>".$row_select['description']."</li>";
    }
    echo "</ul";
    ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" </button>
</div>


<!--find percentage of each blood-->
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
    $abn= number_format((float)($total_abn['sum(unit)']/$total_count['sum(unit)'])*100,2,'.','');
    
    $shortage = min($ap,$an,$bp,$bn,$op,$on,$abp,$abn);
    if($shortage==$ap)
    {
         ?><script>document.getElementById("alert").textContent=" A+";</script><?php
    }
    if($shortage==$an)
    {
        ?><script>
    document.getElementById("alert").textContent+=" A-";
</script><?php
    }
    if($shortage==$bp)
    {
        ?><script>
    document.getElementById("alert").textContent+=" B+";
</script><?php
    }
    if($shortage==$bn)
    {
        ?><script>
    document.getElementById("alert").textContent+=" B-";
</script><?php
    }
    if($shortage==$op)
    {
        ?><script>
    document.getElementById("alert").textContent+=" O+";
</script><?php
    }
    if($shortage==$on)
    {
        ?><script>
    document.getElementById("alert").textContent+=" O-";
</script><?php
    }
    if($shortage==$abp)
    {
        ?><script>
    document.getElementById("alert").textContent+=" AB+";
</script><?php
    }
    if($shortage==$abn)
    {?><script>
    document.getElementById("alert").textContent+=" AB-";
</script><?php
    }
    ?>
    

 
<!--BLOOD GROUP-->
 <div class="row mb-3 ml-5 pl-5 justify-content-center">
 <div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $ap;?>%</h5>
                            <h1 class="display-4">A+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_ap['sum(unit)']?> unit</h6>
                        </div>
                    </div>
                </div>


<div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $bp;?>%</h5>
                            <h1 class="display-4">B+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_bp['sum(unit)'];?> unit</h6>

                        </div>
                    </div>
                </div>
<div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $op;?>%</h5>
                            <h1 class="display-4">O+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_op['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>


<div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $abp;?>%</h5>
                            <h1 class="display-4">AB+</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_abp['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
    </div>
     
                           
 <div class="row mb-3 ml-5 pl-5 justify-content-center">
<div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $an;?>%</h5>
                            <h1 class="display-4">A-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_an['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
                
                
<div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $bn;?>%</h5>
                            <h1 class="display-4">B-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_bn['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
                
                
<div class="col-xl-2 col-sm-5 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $on;?>%</h5>
                            <h1 class="display-4">O-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_on['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
                
                
<div class="col-xl-2 col-sm-6 py-2">
                    <div class="card text-white h-100">
                        <div class="card-body" style="background-color:#880808;">
                            <h5 class="text-uppercase"><?php echo $abn;?>%</h5>
                            <h1 class="display-4">AB-</h1>
                            <h6 class="text-lowercase" style="text-align: right"><?php echo $total_abn['sum(unit)'];?> unit</h6>
                        </div>
                    </div>
                </div>
    </div>









<?php include "footer.php";