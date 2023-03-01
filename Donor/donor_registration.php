<?php include "./header.php";?>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body class="container pt-5 mt-3">
<h2 align="center" class="pb-4">Donor Registration</h2>
<div class="row d-flex justify-content-center align-items-center h-100">
<form method="GET" action="">
<div class="form-group col-md-15">
<label>Name</label>
<input type="name" class="form-control" name="name" placeholder="Enter your name" required>
</div>
<div class="form-row">
<div class="form-group col-md-12">
<label>Email</label>
<input type="name" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter your email" required>
</div>
<div class="form-group col-md-6">
<label>Password</label>
<input type="password" class="form-control" name="password"  required>
</div>
<div class="form-group col-md-6">
<label>Confirm Password</label>
<input type="password" class="form-control" name="cpassword"  required>
</div>
</div>
<div class="form-group">
<label>Date Of Birth</label>
<input type="date" class="form-control" name="dob" required >
</div>

<div class="form-group col-md-16">
<label>Address</label>
<input type="text" class="form-control" name="address" required >
</div>
<!--Address-->
<div class="form-row">
<div class="form-group col-md-4">
<label for="inputCity">City</label>
<input type="text" class="form-control" name="city">
</div>
<div class="form-group col-md-2">
<label>Age</label>
<input type="name" class="form-control" name="age" required >
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
<div class="form-group col-md-3">
<label for="inputZip">Zip</label>
<input type="text" class="form-control" name="zip">
</div>
<div class="form-group col-md-3 ">
<label>Weight</label>
<input type="weight" class="form-control" name="weight" required>
</div>
<div class="form-group col-md-2">
<label for="exampleInputEmail1">Blood group</label>
<input type="name" class="form-control" name="group" required>
</div>

<div class="form-group col-md-6">
<label>Phone </label>
<input type="name" class="form-control" name="phone" placeholder="XXXXXXXXX9">

<label style="color:red;">(This feild is supposed to be exposed to the public. If you don't want, skip it.)</label>
</div>


<div class="form-group col-md-6" >
<label for="exampleInputEmail1">Availablity</label><br>
<input type="radio" name="a" value="y">&emsp;yes&emsp;
<input type="radio" name="a" value="n">&emsp;no
</div></div>
<div class="form-row">
<div class="form-group col-md-6">
<input type="submit" class="form-control" name="submit" aria-describedby="emailHelp"  required>
</div>
<div class="form-group col-md-6">
<a href="../Recipient/dashboard.php"><input type="button" value="Back" class="form-control" name="back" aria-describedby="emailHelp"  required></a>
</div>
</div>
</form>
</div>
<!-- footer -->
<? include "footer.php";?>
  <?php
    if(isset($_GET['submit']))
    {
        if($_GET['age']<=17)
        {
             ?><script>alert("age below 18");</script><?php
        }
        if($_GET['password']==$_GET['cpassword'] && $_GET['age']>17 && $_GET['weight']>44){
             $dob=$_GET['dob'];
            $name=$_GET['name'];
            $address=$_GET['address'];
            $password=$_GET['password'];
            $city=$_GET['city'];
            $zip=$_GET['zip'];
            $state=$_GET['state'];
            $country=$_GET['country'];
            $phone=$_GET['phone'];
            $email=$_GET['email'];
             $avail=$_GET['a'];
             $group=$_GET['group'];
            $age=$_GET['age'];
            $weight=$_GET['weight'];
           try{
                $insert=mysqli_query($connection,"insert into donor_details (name,dob,age,address,phone,city,State,country,zip,blood_group,email,password,availability,weight) values('$name','$dob',$age,'$address',$phone,'$city','$state','$country',$zip,'$group','$email','$password','$avail',$weight)");
            
                echo $insert;
            
                    if($insert)
                {
                    ?><script>alert("registration in progress..! registration will complete when they let you in.");</script><?php
                    ?><script>location.replace("donor_login.php");</script><?php
                }
                else
                {
                    echo "not".mysqli_error($connection);
                }
            }
            catch(exception $e){
                ?><script>alert("already registered");</script><?php
            }
        }
        if($_GET['password']!=$_GET['cpassword'])
        {
            ?><script>alert("incorrect password");</script><?php
        }
         if($_GET['weight']<45)
        {
            ?><script>alert("weight must be above 45");</script><?php
        }
        if($_GET['age']<18)
        {
            ?><script>alert("age must be above 18");</script><?php
        }
    }
        
    
    
    ?>