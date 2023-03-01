<?php include "header.php";
include "../database_connection.php";
session_start();
if(empty($_SESSION['remail']))
{
    header("Location:login1.php");
}
$remail = $_SESSION['remail'];
$rname = $_SESSION['rname'];?>
<title>bloodbank Booking Hisory</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#E7625F;">
<a class="navbar-brand" href="#"><b><?php echo $rname;?></b></a>
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
<a class="nav-link" href="donor_booking.php">Back</a>
</li>
</ul>
</div>
</b>
</nav>


<div class="container mt-5">
<h3 class="mb-4">History</h3>

<table class="table">

<tr>

<th><center>Sl.No.</center></th>
<th>Bloodbank</th>
<th>E-mail</th>
<th>Address</th>
<th>Contact</th>
<th>Status</th>
<th></th>

</tr>
<?php 
    $select_query = mysqli_query($connection,"select * from blood_booking where recipent_email='$remail'");
        $i=1;
    while($select = mysqli_fetch_assoc($select_query))
    {
       $remail= $select['recipent_email'];


        ?>
<tr>
<th><center><?php echo $i;?></center></th>


<?php $s = mysqli_query($connection,"select * from bloodbank_details where Email = '$remail'");
            while($r=mysqli_fetch_assoc($s))
            {?>
<td><?php echo $r['name'];?></td>
<td><?php echo $demail;?></td>
<td><?php echo $r['address'].",<br>".$r['city'].",<br>".$r['State'].", ".$r['country'];?></td>
<td><?php echo $r['phone'];?></td>
<td><i class="fa fa-trash" aria-hidden="true"></i></td>
</tr>
<?php
            }
     $i++;
    }

    ?>

<?php include "footer.php"?>