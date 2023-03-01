
<?php
include "database_connection.php";
date_default_timezone_set('Asia/Kolkata');
$today =date('y-m-d H:i:s'); 
$yesterday= date('Y-m-d H:i:s', strtotime('-1 day', strtotime($today)));

$booking="select datetime,Id from blood_booking where status='requested'";
$run_booking=mysqli_query($connection,$booking);
while($row=mysqli_fetch_assoc($run_booking))
{
    
    if($row['datetime']<$yesterday)
 {
     $delete="DELETE FROM blood_booking WHERE Id='".$row['Id']."'";
     $delete_run=mysqli_query($connection,$delete);
 }
    
}


$donor_booking="select datetime,id from donor_booking where status='requested'";
$donor_run_booking=mysqli_query($connection,$donor_booking);
while($row=mysqli_fetch_assoc($donor_run_booking))
{
    
    if($row['datetime']<$yesterday)
 {
     $delete="DELETE FROM donor_booking WHERE id='".$row['id']."'";
     $delete_run=mysqli_query($connection,$delete);
 }
    
}

 


?>
