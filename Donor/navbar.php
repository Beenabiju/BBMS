
<?php 
include "../database_connection.php";
$username=$_SESSION['dusername'];
$donor=mysqli_query($connection,"select name from donor_details where email= '".$_SESSION['dusername']."'");
while($row=mysqli_fetch_assoc($donor)){
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background:#880808;">
<a class="navbar-brand" href="#"><b style="color:white;"><?php echo $row['name'];}?></b></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="dashboard.php" style="color:white; font-size:18px;" ><b>Home </b><span class="sr-only">(current)</span></a>
</li>

   
<li class="nav-item active">
    <a class="nav-link" href="donor_request.php" style="color:white; font-size:18px;" ><b>Requestes</b></a>
</li>
     
      
<li class="nav-item active">
    <a class="nav-link" href="alert.php" style="color:white; font-size:18px;" ><b>Alert</b></a>
</li>
   <li class="nav-item dropdown " style=" padding-left: 880px;">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-size:18px;" ><b>
   <i class="fa fa-user" style="font-size:24px; color: #fff;" aria-hidden="true"></i></b>
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown" >
<a class="dropdown-item" href='delete.php?delete=<?php echo $username; ?>'>Delete Account</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>



</div>
</nav>