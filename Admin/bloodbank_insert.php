
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
                            
                              <label>BloodBank Id</label>
                              <input type="text" class="form-control"required name="bloodbank_id">
                       </div>
                           
                            <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" class="form-control" required name="name">
                                </div>
                                  <div class="form-group col-md-3">
                              <label>Password</label>
                              <input type="text" class="form-control"required name="password">
                            </div>
                             <div class="form-group col-md-4">
                            <label>Address</label>
                            <input type="text" class="form-control" required name="address">
                                </div>
                             
                       <div class="form-group col-md-2">
                            <label>City</label>
                            <input type="text" class="form-control"required name="city">
                      </div>
                      
                   
                            <div class="form-group col-md-3">
                            <label>Zip</label>
                            <input type="text" class="form-control" name="zip" required>
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

                      
                            <div class="form-group col-md-4">
                            
                            <label>Country:</label>
                            <input type="text" class="form-control" required  name="country" value="India">
                          </div>
                         
            
                            <div class="form-group col-md-4">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" required name="phone">
                      </div>
                     
                            <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="text" class="form-control" required name="email">
                          </div>
                            </div>
                       

                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit"   class="btn btn-primary" name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="bloodbank_details.php" style="text-decoration:none;color:white;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
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
         

        $query_update="insert into bloodbank_details (BloodBank_id,Name,password,Address,City,Zip,State,Country,Phone_no,Email,access)values('$bloodbank_id','$name','$password','$address','$city','$zip','$state','$country','$phonenumber','$email','Deny')";
          $result_update = mysqli_query($connection,$query_update); 
          ?>
   <script> location.replace("bloodbank_details.php"); </script>
    <?php
            

/*if(mysqli_query($connection,$query_update))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }

    }*/

    }

?>

                              
</form>

<?php include "footer.php";?>
