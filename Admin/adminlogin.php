<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>title</title>
</head>

     <body class="container pt-5 mt-5">
<h2 align="center" class="pb-4">Login</h2>
<div class="row d-flex justify-content-center align-items-center h-100">


<form action="adminlogin.php" method="post" form="form">

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
 <p id="password"  style="font-size:14px; color:red;"></p>

 </div>
    </div>
<div class="form-row container pl-4 ml-4">
<input type="submit" name="login" value="Login"  class="btn btn-primary btn-lg" align="center"> 
</div>
</form>
</div>
        <?php
include "header.php";
include "footer.php";
  session_start();
?>
   <?php
if(!empty($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(!empty($username) && !empty($password))
    {
        $username=mysqli_real_escape_string($connection,$username);
        $password=mysqli_real_escape_string($connection,$password);
        $query="SELECT * FROM admin WHERE username='$username'";
       $select_query=mysqli_query($connection,$query);
       while($rows=mysqli_fetch_assoc($select_query))
       {
           $db_username=$rows['username'];
          
            $db_password=$rows['password'];
       }
         if(isset($db_username) && isset($db_password))
         {
           if($username==$db_username && $password ==$db_password)
       {
                $_SESSION['username']=$db_username;
             
               ?>
               
                <script>location.replace("dashboard.php"); </script>
                              <?php
    }    
    elseif(!empty($password))
           {         
                ?>
        <script>document.getElementById("password").textContent="*Incorrect Username or Password";</script>
          <?php
       
               
           }    
     }  
       
    }}
    ?>
        
