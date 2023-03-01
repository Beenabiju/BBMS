<?php include "header.php";
include "../database_connection.php";
?>
<title>Donor Booking</title>
</head>
<body>
<?php if(empty($_GET['email']))
{
    header("Location:login.php");
}
    $id = $_GET['email'];
    $query = mysqli_query($connection,"select * from donor_details where email='$id'");
    $donor=mysqli_fetch_assoc($query);
    
    if(isset($_GET['book']))
    {
        $rname =$_GET['rname'];
        $remail =$_GET['remail'];
        $blood_group = $donor['blood_group'];
        $unit =$_GET['runit'];
        $date = date("Y-m-d");
        $radd=mysqli_query($connection,"select count(*) from recipent_details where email='$remail'");
        $row=mysqli_fetch_assoc($radd);
        
        if($row['count(*)']!=1)
        {
            //insert into reci
            $radd = mysqli_query($connection,"insert into recipent_details values ('$rname','$remail')");
            $donor=mysqli_fetch_assoc($query);
        }
        $str="insert into donor_booking (recipient_email,donor_email,type,unit,date) values('$remail','$id','$blood_group',$unit,'$date'";
        echo $str;
        $donor_book = mysqli_query($connection,$str);
        
        $booking = mysqli_query($connection,"update donor_details set availability='n' where email='$id'");
        $donor=mysqli_fetch_assoc($booking);
    }
    ?>
<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#880808;">
  <a class="navbar-brand" href="#"><b>BBMS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <b>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
   
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      </ul>
      </div>
    </b>
</nav>

<div class="container mt-5 pt-5">
 
  <div class="row">
    <div class="col mt-5 pt-5" >
     
     <!--name-->
      <h1><?php echo $donor['name'];?></h1>
      
    <!--email-->
      <?php echo $donor['email'];?>
      
    </div>
    <div class="col">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <form method="GET" action="">
           
            <!--Blood Group-->
            <div class="form-group col-md-15">
                <label>Blood Group</label>
                <input type="text" class="form-control" value="<?php echo $donor['blood_group'];?>" readonly>
            </div>
            
     <!--Address-->
            <div class="form-group">
                <label>Address</label>
<input type="name" class="form-control" value="<?php echo $donor['address'];?>" readonly>
                   </div>
                   
        <!--city-->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" name="city"  value="<?php echo $donor['city'];?>"readonly>
                </div>
                
                <!--state-->  
                <div class="form-group col-md-6">
                    <label>State</label>
                    <input type="text" class="form-control" name="city"  value="<?php echo $donor['State'];?>"readonly>
                </div>
                
                <!--country-->
                <div class="form-group col-md-4">
                    <label>Country</label>
                    <input type="text" class="form-control" name="city"  value="<?php echo $donor['country'];?>"readonly>
                </div>
                
                <!--zip-->
                <div class="form-group col-md-4">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" value="<?php echo $donor['zip'];?>"readonly>
                </div>
                
                <!--age-->
                <div class="form-group col-md-4">
                    <label>Age</label>
                    <input type="name" class="form-control" value="<?php echo $donor['age'];?>"readonly>
                </div>
            </div>
                            
            <!--Back-->
                <div class="form-group col-md-12">
                    <a href="donor_booking.php"> <input type="button" value="Back" class="btn btn-outline-danger form-control" name="back"aria-describedby="emailHelp"required></a>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
    </div>


<?php include "footer.php"?>