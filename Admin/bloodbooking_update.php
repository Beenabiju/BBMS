
<?php include "header.php";
 session_start();
?></head>
<body>

<?php if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
          
    }include "navbar.php";
?>

<title>My Profile</title>


<body>

<?php
$id=$_GET['update'];

$query_profile="select * from blood_booking where id='$id'";
$result_profile=mysqli_query($connection,$query_profile);

while($row = mysqli_fetch_assoc($result_profile))
{
    
    ?>

        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label>Id</label>
                              <input type="text" readonly class="form-control" name="id" value="<?php echo $row['Id'];?>">
                       </div>
                           
                           <div class="form-group col-md-12">
                            
                              <label>Recipient Email</label>
                              <input type="text" readonly class="form-control" name="email" value="<?php echo $row['recipent_email'];?>">
                       </div>
                           
                           <div class="form-group col-md-12">
                            
                              <label>Blood Bank Id</label>
                              <input type="text" readonly class="form-control" name="bbid" value="<?php echo $row['Blood_bank_id'];?>">
                       </div>
                           
                           
                         
                             <div class="form-group col-md-12">
                            <label >Recipent Contact</label>
                            <input readonly type="text" class="form-control" name="recipentcontact" value="<?php echo $row['Recipent_contact'];?>">
                                </div>
                             
                       <div class="form-group col-md-12">
                            <label >Unit</label>
                            <input readonly type="text" class="form-control" name="unit" value="<?php echo $row['unit'];?>">
                      </div>
                      <div class="form-group col-md-12">
                            <label >Date</label>
                            <input readonly type="date" class="form-control" name="date" value="<?php echo $row['datetime'];?>">
                      </div>
                         <div class="form-group col-md-12">
                            <label >Blood Group</label>
                            <input readonly type="text" class="form-control" name="group" value="<?php echo $row['blood_group'];?>">
                      </div>
                         <div class="form-group col-md-12">
                            <label >Type</label>
                            <input readonly type="text" class="form-control" name="type" value="<?php echo $row['type'];?>">
                      </div>
                        <div class="form-group col-md-12">
                                <label for="inputState">Status</label>
                                <select name="status" class="form-control">
                                <option hidden> <?php if(isset($_GET['update'])){echo $row['status'];} else{ echo "--Select--";}?> </option> 
                                <option>confirmed</option>
                                <option>Requested</option>
                               
                            </select>
                       </div>
                   
                            </div>
                        

   <?php
}
   
?>
                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit" class="btn btn-primary"  name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="blood_booking.php" style="text-decoration:none;color:white;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        
         $id=$_POST['id'];
        $email=$_POST['email'];
        $bloodbankid=$_POST['bbid']; 
         $contact=$_POST['recipentcontact'];
         $unit=$_POST['unit'];
        $date=$_POST['date'];
         $group=$_POST['group'];
         $type=$_POST['type'];
        $status=$_POST['status'];
     

        $query_update="UPDATE blood_booking SET Id='$id',recipent_email='$email',Blood_bank_id='$bloodbankid',Recipent_contact='$contact',unit='$unit',date='$date',status='$status' WHERE Id='$id'";
       $result_update = mysqli_query($connection,$query_update); 
              ?>
   <script> location.replace("blood_booking.php"); </script>
    <?php

    



/*if(mysqli_query($connection,$query_update))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }*/
    }
?>

                              
</form>

<?php include "footer.php";?>
