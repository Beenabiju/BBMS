<?php
    //header
    include"header.php";
    ?>
<meta charset="UTF-8">
<title>profile</title>
</head>
<?php
        $data;
        session_start();
        $blooddetails=mysqli_query($connection,"select * from bloodbank_details where bloodbank_id= '".$_SESSION['bloodbank']."'");

        while($row=mysqli_fetch_assoc($blooddetails)){
?>
<body>
    <h2 align="center" class="pb-4">Profile</h2>
    
    <div class="row d-flex justify-content-center align-items-center h-100">
        <form method="POST" action="">

            <div class="form-group col-md-15">
                <label>Name</label>
                <input type="name" value='<?php echo $row['Name'];?>'class="form-control" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Blood Bank id</label>
                    <input type="name" value='<?php echo $row['BloodBank_id'];?>' class="form-control" name="bloodbankid" placeholder="Enter your name" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Reset Password</label>
                    <input type="text" value='<?php echo $row['password'];?>' class="form-control" name="password" placeholder="Enter your name" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Confirm Password</label>
                    <input type="text" value='<?php echo $row['password'];?>' class="form-control" name="cpassword" placeholder="Enter your name" required>
                </div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input value='<?php echo $row['Address'];?>'type="text" class="form-control" name="address" required >
            </div>


        <!--Address-->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" value='<?php echo $row['City'];?>' class="form-control" name="city">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <select name="state" class="form-control">
                        <option selected><?php echo $row['State'];?></option>
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
                        <option selected><?php echo $row['Country'];?></option>
                        <option>India</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Zip</label>
                    <input type="text" value='<?php echo $row['Zip'];?>' class="form-control" name="zip">
                </div>


                <div class="form-group col-md-4">
                    <label>Phone</label>
                    <input type="name" value='<?php echo $row['Phone_no'];?>' class="form-control" name="phone" placeholder="XXXXXXXXX9">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" value='<?php echo $row['Email'];?>' class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <input type="submit" class="form-control" name="submit" aria-describedby="emailHelp"  required>
                </div>

                <div class="form-group col-md-6">
                    <a href="dashboard.php"><input type="button"value="Back"class="form-control"name="back"aria-describedby="emailHelp"required></a>
                </div>
            </div>
        </form>
    </div>
</body>
<?php }?>



<?php

if(isset($_POST['submit'])){
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
        
                $update=mysqli_query($connection,"update bloodbank_details set BloodBank_id='$bbid', Name='$name', Address='$address', password='$password',City='$city', Zip='$zip', State='$state', Country='$country', Phone_no='$phone', Email='$email' where BloodBank_id='".$_SESSION['bloodbank']."'");
                    if($update)
                { 
                        $_SESSION['bloodbank']=$bbid;
                    ?><script>alert("Data updated!");</script><?php
                    ?><script>location.replace("dashboard.php");</script><?php

                }
        }
        else{
            ?><script>alert("password doesn't match!");</script><?php
        }
}

?>