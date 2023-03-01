
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


        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label>Name</label>
                              <input type="text" required class="form-control" name="name">
                       </div>
                             <div class="form-group col-md-4">
                            <label>Password</label>
                            <input type="text" required class="form-control" name="pass">
                                </div>
                            <div class="form-group col-md-2">
                            <label>Date Of Birth</label>
                            <input type="date" required class="form-control" name="dob">
                                </div>
                                    <div class="form-group col-md-2">
                            <label>Age</label>
                            <input type="text" required class="form-control" name="age">
                                </div>
                                  <div class="form-group col-md-4">
                              <label>Address</label>
                              <input type="text" required class="form-control" name="address">
                            </div>
                             <div class="form-group col-md-3">
                            <label>Phone</label>
                            <input type="text" required class="form-control" name="phone">
                                </div>
                             
                       <div class="form-group col-md-3">
                            <label>City</label>
                            <input type="text" required class="form-control" name="city">
                      </div>
                      
                    <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select name="state" class="form-control">
                                <option selected>Choose...</option>
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
                            <input type="text" required class="form-control" name="zip">
                                </div>
                      
                            <div class="form-group col-md-3">
                            
                            <label>Country:</label>
                            <input type="text" required class="form-control" name="country" value="India">
                          </div>
                         
            
                            <div class="form-group col-md-2">
                            <label>Blood Group</label>
                            <input type="text" required class="form-control" name="group">
                      </div>
                     
                            <div class="form-group col-md-3">
                            <label>Email</label>
                            <input type="text" required class="form-control" name="email">
                          </div>
                              <div class="form-group col-md-2">
                            <label>Weight</label>
                            <input type="text" required class="form-control" name="weight">
                          </div>
                           
                            <div class="form-group col-md-2">
                            <label>Availability</label>
                            <input type="text" required class="form-control" name="avail">
                      </div>
                            </div>
                        

   <?php

   
?>
                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit"   name="submit" class="btn btn-primary" value="submit">
                        <button type="submit" class="btn btn-primary" > <a href="donor_details.php" style="text-decoration:none;color:white;">Back</a></button>
                        </div>
                             
                              
<?php  
      if(!empty($_POST['submit']) )
         {
     if($_POST['age']<=17)
        {
             ?><script>alert("age below 18");</script><?php
        }
     if($_POST['weight']<=44)
        {
             ?><script>alert("weight below 45");</script><?php
        }
   
       if($_POST['age']>17 && $_POST['weight']>44)
    {
        
         $name=$_POST['name'];
        $dob=$_POST['dob'];
         $pass=$_POST['pass'];
        $age=$_POST['age'];
          $weight=$_POST['weight'];
        $address=$_POST['address']; 
         $phonenumber=$_POST['phone'];
         $city=$_POST['city'];
         $state=$_POST['state'];
         $zip=$_POST['zip'];
        $country=$_POST['country'];
      $group=$_POST['group'];
        $email=$_POST['email'];
         $avail=$_POST['avail'];
         
     

        $query_update="insert into donor_details (name,dob,age,address,phone,city,State,country,zip,blood_group,email,password,availability,weight)values('$name','$dob','$age','$address','$phonenumber','$city','$state','$country','$zip','$group','$email','$pass','$avail','$weight')";
        $result_update = mysqli_query($connection,$query_update); 
              ?>
   <script> location.replace("donor_details.php"); </script>
    <?php

    


/*if(mysqli_query($connection,$query_update))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }*/
       }  }
?>

                              
</form>

<?php include "footer.php";?>
