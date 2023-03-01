
   <?php include "header.php";?>

    <meta charset="UTF-8">
    <title>registration form</title>
</head>

<body class="container pt-5 mt-3">
    <h2 align="center" class="pb-4">Blood bank Registration</h2>
    
    <div class="row d-flex justify-content-center align-items-center h-100">
        <form method="POST" action="">

            <div class="form-group col-md-15">
                <label>Name</label>
                <input type="name" class="form-control" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Blood Bank id</label>
                    <input type="name" class="form-control" name="bloodbankid" placeholder="Enter your name" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your name" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter your name" required>
                </div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" required >
            </div>


        <!--Address-->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="form-group col-md-6">
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
                    <label for="inputState">Country</label>
                    <select name="country" class="form-control">
                        <option selected>Choose...</option>
                        <option>India</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="zip">
                </div>


                <div class="form-group col-md-4">
                    <label>Phone</label>
                    <input type="name" class="form-control" name="phone" placeholder="XXXXXXXXX9">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <input type="submit" class="form-control" name="submit" aria-describedby="emailHelp"  required>
                </div>

                <div class="form-group col-md-6">
                    <a href="login.php"><input type="button"value="Back"class="form-control"name="back"aria-describedby="emailHelp"required></a>
                </div>
            </div>
        </form>
    </div>



<!-- footer --> 
<? include "footer.php";?>
 
 
  <?php
    if(isset($_POST['submit']))
    {
        if($_POST['password']==$_POST['cpassword']){
            $bbid=$_POST['bloodbankid'];
            $name=$_POST['name'];
            $address=$_POST['address'];
            $password=$_POST['password'];
            $city=$_POST['city'];
            $zip=$_POST['zip'];
            $state=$_POST['state'];
            $country=$_POST['country'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $lati=$_POST['lati'];
            $longi=$_POST['longi'];
            
            try{
                $insert=mysqli_query($connection,"insert into bloodbank_details (BloodBank_id,Name, Address,password,City,Zip,State,Country,Phone_no,Email,access) values('$bbid','$name','$address','$password','$city',$zip,'$state','$country',$phone,'$email','Deny')");
                    if($insert)
                {
                    ?><script>alert("registration in progress..! registration will complete when they let you in.");</script><?php
                    ?><script>location.replace("login.php");</script><?php

                }
            }
            catch(exception $e){
                ?><script>alert("already registered");</script><?php
            }
        }
        else{
            ?><script>alert("incorrect password");</script><?php
        }
    }
    ?>
  
