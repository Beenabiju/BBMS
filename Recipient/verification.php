<?php include "header.php";
include "../database_connection.php";
?>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#880808;">
  <a class="navbar-brand" href=""><b>BBMS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <b>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
   
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">Donor-Booking-History</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">BloodBank-Booking-History</a>
      </li>
     
      </ul>
      </div>
    </b>
    </nav>
        

<div class="container pt-5 mt-5">
<h2 align="center" class="pb-4">Login</h2>
<div class="row d-flex justify-content-center align-items-center h-100">

<form method="post">

<div class="form-row">
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" name="email" placeholder="Enter your email" required>
</div>
</div>

<div class="form-row">
<div class="form-group">
<label>Phone number</label>
<input type="text" class="form-control" name="phone" placeholder="XXXXXXXXXX">
</div>
</div>

<div class="form-row">
<div class="form-group">
<label>booked from</label>
<select name="mode" id="">
    <option value="">choose...</option>
    <option value="b">blood bank</option>
    <option value="d">donor</option>

</select></div>
</div>

<!--Button-->
<div class="form-row">
<div class="py-4">
<button type="submit" name="submit" class="btn btn-primary btn-lg">Verify</button>
</div>
</div>

</form>
</div>
      </div>

<?php
      if(isset($_POST['submit']) ){
          
          session_start();
                if (isset($_POST['mode'])  && $_POST['mode']=="d"){

          $select=mysqli_query($connection, "select Recipient_contact from donor_booking where recipient_email='".$_POST['email']."' and Recipient_contact='".$_POST['phone']."'");
          while($row=mysqli_fetch_assoc($select)){
                $p=$row['Recipient_contact'];
          }
                }
          else if(isset($_POST['mode']) && $_POST['mode']=="b"){
          $select=mysqli_query($connection, "select Recipent_contact from blood_booking where recipent_email='".$_POST['email']."' and Recipent_contact='".$_POST['phone']."'");
          while($row=mysqli_fetch_assoc($select)){
                $p=$row['Recipent_contact'];
          }
          }
          if(isset($p)){
              $_SESSION['hemail']=$_POST['email'];
              $_SESSION['hphone']=$_POST['phone'];
              ?>
              <script>location.replace("booking_history.php?h=b");</script>
              <?php
          }
          else{
              ?>
              <script>alert("you have no history records");</script>
              <?php
          }
      }
      
      
      
      
      
      include"footer.php";