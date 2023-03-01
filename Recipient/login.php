<?php include "header.php";
include "../database_connection.php";
session_start();?>
<title>Dashboard</title></head>
<body class="container">
   <form  method="get">
    <div class="row align-items-center vh-100">
        <div class="col-12 mx-auto">
                <div class="card-body d-flex flex-column align-items-center">
                    <p class="card-text">
                       <!--name recipient-->
                <div class="form-group col-md-6">
                    <label>*Name</label>
                    <input type="text" class="form-control" name="rname" placeholder="Enter your name" required>
                </div>
                
                <!--email recipient-->  
                <div class="form-group col-md-6">
                    <label>*E-mail</label>
                    <input type="text" class="form-control" name="remail" placeholder="someone@gmail.com" required>
                </div>
                
                <!--phone number recipient-->  
                <div class="form-group col-md-6">
                    <label>*Phone Number</label>
                    <input type="text" class="form-control" name="rphone" placeholder="XXXXXXXXXX" required>
                </div>
                       
                
                <!--blood type-->
                <div class="form-group col-md-6">
                    <label>*Blood Type</label>
                    <select class="form-select form-control btn" aria-label="Default select example" name="type">
                      <option>--Select--</option>
                      <option value="A+">A+</option>
                      <option value="B+">B+</option>
                      <option value="O+">O+</option>
                      <option value="AB+">AB+</option>
                      <option value="A-">A-</option>
                      <option value="B-">B-</option>
                      <option value="O-">O-</option>
                      <option value="AB-">AB-</option>
                    </select>
                </div>
                
                <!--unit-->
                <div class="form-group col-md-6">
                    <label>*Unit</label>
                    <input type="text" class="form-control" name="runit" required>
                </div>
                   
                    
                    
                <div class="form-group col-md-6 ml-5 pl-5">
                    <!--Proceed-->     
                       <div class="row ml-5 pl-5">
                        <div class="form-group col-6">
                            <input type="submit" value="Proceed" class="btn btn-outline-info btn-lg btn-block" name="proceed" aria-describedby="emailHelp"  required>
                        </div>

                
                    </div>
                </div>
                </form>
        </div>
    </div>
    
<?php
if(isset($_GET['proceed']))
{
        $rname =$_GET['rname'];
        $remail =$_GET['remail'];
        $runit =$_GET['runit'];
        $rphone = $_GET['rphone'];
        $rtype = $_GET['type'];
    
        $radd=mysqli_query($connection,"select count(*) from recipient_details where email='$remail'");
        $row=mysqli_fetch_assoc($radd);
        
        if($row['count(*)']!=1)
        {
            $radd = mysqli_query($connection,"insert into recipient_details values ('$rname','$remail')");
        }
    $_SESSION['remail']=$remail;
    $_SESSION['rname']=$rname;
    $_SESSION['rphone']=$rphone;
    $_SESSION['rtype']=$rtype;
    $_SESSION['runit']=$runit;
    header("Location:donor_booking.php");
}
       
?>
<?php include "footer.php"?>    
