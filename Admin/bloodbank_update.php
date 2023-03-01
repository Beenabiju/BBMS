
<?php include "header.php";

 session_start();
?></head>
<body>

<?php if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
          
    }include "navbar.php";
?>

<title>My Profile</title>


<body>

<?php
$id=$_GET['update'];

$query_profile="select * from bloodbank_details where  BloodBank_id='$id'";
$result_profile=mysqli_query($connection,$query_profile);

while($row = mysqli_fetch_assoc($result_profile))
{
    $bbid=$row['BloodBank_id'];
    
    ?>

        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label>BloodBank Id</label>
                              <input type="text" class="form-control" name="bloodbank_id" value="<?php echo $row['BloodBank_id'];?>">
                       </div>
                           
                            <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo  $row['Name'];?>">
                                </div>
                                  <div class="form-group col-md-3">
                              <label>Password</label>
                              <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>">
                            </div>
                             
                       <div class="form-group col-md-3">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $row['City'];?>">
                      </div>
                      
                    <div class="form-group col-md-3">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['Phone_no'];?>">
                      </div>
                            <div class="form-group col-md-3">
                            <label>Zip</label>
                            <input type="text" class="form-control" name="zip" placeholder="1234 Main St" value="<?php echo $row['Zip'];?>">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select name="state" class="form-control">
                                <option hidden> <?php if(isset($_GET['update'])){echo $row['State'];} else{ echo "--Select--";}?> </option> 
                                <option>Andhra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chhattisgarh</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Kerala</option>
                                </select>
                                </div>


                            <div class="form-group col-md-4">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $row['Address'];?>">
                                </div>
                      
                            <div class="form-group col-md-4">
                            
                            <label>Country:</label>
                            <input type="text" class="form-control" name="country" value="India">
                          </div>
                         
            
                           
                     
                            <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row['Email'];?>">
                          </div>
                            </div>
                       
                          

                        

   <?php

}

   
?>
                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit"   class="btn btn-primary" name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="bloodbank_details.php" style="text-decoration:none;color:white;">Back</a></button>
                        </div>
                             
                              
<?php  
     
    if(!empty($_POST['submit'])&& $_POST['state']!='--Select--')
    {
      
        

        $bloodbank_id=$_POST['bloodbank_id']; 
         $name=$_POST['name'];
        $password=$_POST['password'];
        $address=$_POST['address']; 
        $city=$_POST['city'];
         $zip=$_POST['zip'];
        $state=$_POST['state'];
      $phonenumber=$_POST['phone']; 
        $country=$_POST['country'];
        $email=$_POST['email'];
         

        $query_update="UPDATE bloodbank_details SET BloodBank_id='$bloodbank_id',Name='$name',password='$password',Address='$address',City='$city',Zip='$zip',State='$state',Country='$country',Phone_no='$phonenumber',Email='$email' WHERE BloodBank_id = '$bbid'";
        $result_update = mysqli_query($connection,$query_update); 
            ?>
   <script> location.replace("bloodbank_details.php"); </script>
    <?php
          
        
    }



?>

                              
</form>

<?php include "footer.php";?>
