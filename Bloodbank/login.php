<?php
    //header
    include"header.php";
    ?>
<meta charset="UTF-8">
<title>login</title>
</head>

 

<body class="container pt-5 mt-5">
<h2 align="center" class="pb-4">Login</h2>
<div class="row d-flex justify-content-center align-items-center h-100">

 

<form>

 

<!--Username-->
<div class="form-row">
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" name="username" placeholder="Enter your username" required>
</div>
</div>

 

<!--Password-->
<div class="form-row">
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password">
</div>
</div>

 

<!--Button-->
<div class="form-row">
<div class="py-4">
<button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
<button type="submit" name="submit" class="btn btn-primary btn-lg"><a style="color:white;text-decoration:none;" href="registration.php">register</a></button>


</div>
</div>
<div class="form-row">
<div class="py-12">
 <button type="submit" name="submit" class="btn btn-primary btn-lg"><a style="color:white;text-decoration:none;" href="../Recipient/dashboard.php">Back</a></button>
</div>
</div>

</form>
</div>

 

 

<!-- footer --> 
<? include "footer.php";?>
<?php

    //verification
    session_start();
    if(isset($_GET['submit'])){
        $username=$_GET['username'];
        $password=$_GET['password'];


        $bloodbank=mysqli_query($connection,"select password,access from bloodbank_details where BloodBank_id='$username'");

            $password2="";$access="";
        while($row=mysqli_fetch_assoc($bloodbank)){
            $password2=$row['password'];
            $access=$row['access'];
        }


        if($password==$password2 && $access=="Granted"){
            $_SESSION['bloodbank']=$username;
            ?><script>location.replace("dashboard.php");
</script><?php

        }
        else if($password==$password2 && $access=="Deny"){
            ?><script>location.replace("reg_incomplete.php");</script><?php
        }
        else{
                        ?><script>alert("incorrect username or password");</script><?php
        }


    }

    ?>


</body>
</html>