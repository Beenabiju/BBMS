<?php include "header.php";
include "../database_connection.php";
?>
<title>Dashboard</title>

</head>
<body class="container">
<form action="bloodbooking.php">
<div class="row align-items-center vh-100">
<div class="col-12 mx-auto">
<div class="card-body d-flex flex-column align-items-center">
<p class="card-text">
<!--name recipient-->
<div class="form-group col-md-6">
<label>*Name</label>
<input required type="text" class="form-control" name="rname" placeholder="Enter your name" required>
</div>

<!--email recipient-->  
<div class="form-group col-md-6">
<label>*E-mail</label>
<input required type="text" class="form-control" name="remail" placeholder="someone@gmail.com" required>
</div>

<!--phone number recipient-->  
<div class="form-group col-md-6">
<label>*Phone Number</label>
<input required type="text" class="form-control" name="rphone" placeholder="XXXXXXXXXX">
</div>

<!--unit-->
<div class="form-group col-md-6">
<label>*Unit</label>
<input required type="text" class="form-control" name="bloodunit">
</div>
   
<div class="form-group col-md-6">
<label>*Blood group</label>
<select required name="bloodgroup" class="form-control">
        <option selected>Choose...</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
    </select>
</div>

<div class="form-group col-md-6">
<label>*Blood type</label>
<select required name="bloodtype" class="form-control">
        <option selected>Choose...</option>
        <option>Blood</option>
        <option>Platelets</option>
        <option>plasma</option>
        <option>RBC</option>
    </select></div>
</p>

<div class="form-row">
<div class="form-group col-md-3">
<a href="dashboard.php"> <input type="button" value="Back" class="btn btn-outline-danger form-control" name="back"aria-describedby="emailHelp"required></a>
</div>
<div class="form-group col-md-4">
<input type="submit" value="Proceed" class="btn btn-outline-success form-control" name="book" aria-describedby="emailHelp"  required>
</div>

<!--Back-->
<div class="form-group col-md-5">
<a href="bloodbooking_details.php"> <input type="button" value="MyBooking" class="btn btn-outline-danger form-control" name="back"aria-describedby="emailHelp"required></a>
</div>
</div>
</div>
    </div>
</form>