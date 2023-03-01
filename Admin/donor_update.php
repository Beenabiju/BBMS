
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

$query_profile="select * from donor_details where email='$id'";
$result_profile=mysqli_query($connection,$query_profile);

while($row = mysqli_fetch_assoc($result_profile))
{
    $demail=$row['email'];
    
    ?>

        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                       </div>
                           
                            <div class="form-group col-md-2">
                            <label>Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" value="<?php echo  $row['dob'];?>">
                                </div>
                                  <div class="form-group col-md-2">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" value="<?php echo  $row['age'];?>">
                                </div>
                                  <div class="form-group col-md-5">
                              <label>Address</label>
                              <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
                            </div>
                             <div class="form-group col-md-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
                                </div>
                             
                       <div class="form-group col-md-3">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $row['city'];?>">
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
                          
                            <div class="form-group col-md-2">
                            <label>Zip</label>
                            <input type="text" class="form-control" name="zip" placeholder="1234 Main St" value="<?php echo $row['zip'];?>">
                                </div>
                      
                            <div class="form-group col-md-3">
                            
                            <label>Country:</label>
                            <input type="text" class="form-control" name="country" value="<?php echo $row['country'];?>">
                          </div>
                         
            
                            <div class="form-group col-md-2">
                            <label>Blood Group</label>
                            <input type="text" class="form-control" name="group" value="<?php echo $row['blood_group'];?>">
                      </div>
                     
                            <div class="form-group col-md-3">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
                          </div>
                           <div class="form-group col-md-3">
                            <label>Password</label>
                            <input type="text" class="form-control" name="pass" value="<?php echo $row['password'];?>">
                          </div>
                           
                            <div class="form-group col-md-2">
                            <label>Availability</label>
                            <input type="text" class="form-control" name="avail" value="<?php echo $row['availability'];?>">
                      </div>
                            <div class="form-group col-md-2">
                            <label>Weight</label>
                            <input type="text" class="form-control" name="weight" value="<?php echo $row['weight'];?>">
                          </div>
                            </div>
                        

   <?php
}
   
?>
                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit"class="btn btn-primary"    name="submit" value="submit">
                        <button type="submit" class="btn btn-primary" > <a href="donor_details.php" style="text-decoration:none;color:white;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit'])&& $_POST['state']!='--Select--')
    {
        
         $name=$_POST['name'];
        $age=$_POST['age'];
        $weight=$_POST['weight'];
        $dob=$_POST['dob'];
        $address=$_POST['address']; 
         $phonenumber=$_POST['phone'];
         $city=$_POST['city'];
         $state=$_POST['state'];
         $zip=$_POST['zip'];
        $country=$_POST['country'];
      $group=$_POST['group'];
        $email=$_POST['email'];
         $avail=$_POST['avail'];
        $password=$_POST['pass'];
         
     

        $query_update="UPDATE donor_details SET name='$name',dob='$dob',age='$age',address='$address',phone='$phonenumber',city='$city',State='$state',country='$country',zip='$zip',blood_group='$group',email='$email',password='$password',availability='$avail',weight='$weight' WHERE email = '$demail'";
        $result_update = mysqli_query($connection,$query_update); 
              ?>
   <script> location.replace("donor_details.php"); </script>
    <?php

    


/*if(mysqli_query($connection, $queryupdate))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }*/
    }
?>

                              
</form>

<?php include "footer.php";?>
