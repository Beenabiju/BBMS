
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

$query_profile="select * from donor_booking where  id='$id'";
$result_profile=mysqli_query($connection,$query_profile);

while($row = mysqli_fetch_assoc($result_profile))
{
    
    ?>

        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label>Id</label>
                              <input readonly type="text" class="form-control" name="id" value="<?php echo $row['id'];?>">
                       </div>
                 
                             
                             
                       <div class="form-group col-md-12">
                            <label>Type</label>
                            <input readonly  type="text" class="form-control" name="type" value="<?php echo $row['type'];?>">
                      </div>
                      
                      
                    <div class="form-group col-md-12">
                            <label>Unit</label>
                            <input readonly type="text" class="form-control" name="unit" value="<?php echo $row['unit'];?>">
                      </div>
                                    <div class="form-group col-md-12">
                            <label >Date</label>
                            <input type="date" class="form-control" readonly name="date" value="<?php echo $row['datetime'];?>">
                      </div>
                                    <div class="form-group col-md-12">
                            <label>Recipient Contact</label>
                            <input readonly  type="text" class="form-control" name="type" value="<?php echo $row['Recipient_contact'];?>">
                      </div>
                  <div class="form-group col-md-12">
                                <label for="inputState "required>Donor Email</label>
                                <select readonly  name="demail" class="form-control">
                                <option><?php echo $row['donor_email'];?></option>
                                <?php
    $query_profile="select email from donor_details";
    $result_profile=mysqli_query($connection,$query_profile);
    while($rows = mysqli_fetch_assoc($result_profile))
             {
                 $ids=$rows['email'];
                 echo"<option>$ids</option>";
             }
    ?>   
                               
  </select>
                                </div>
                                  <div class="form-group col-md-12">
                                <label for="inputState "required>Recipient Email</label>
                                <select readonly  name="remail" class="form-control">
                                <option><?php echo $row['recipient_email'];?></option>
                                <?php
    $query_profiles="select email from recipient_details";
    $result_profiles=mysqli_query($connection,$query_profiles);
    while($rowes = mysqli_fetch_assoc($result_profiles))
             {
                 $ides=$rowes['email'];
                 echo"<option>$ides</option>";
             }
    ?>   
                               
  </select>
                            </div>
                            
                      
                    <div class="form-group col-md-12">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status" value="<?php echo $row['status'];?>">
                      </div>
                        </div>

                        

   <?php

}

   
?>

                      <div  align="center">
                      
                       <input type="submit" class="btn btn-primary" name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="donor_booking.php" style="color:white;text-decoration:none;">Back</a></button>
                        </div>
                        
            </form>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        

        $id=$_POST['id']; 
         $remail=$_POST['remail'];
        $demail=$_POST['demail'];
        $type=$_POST['type']; 
        $unit=$_POST['unit'];
        $type=$_POST['type']; 
        $unit=$_POST['unit'];
        $date=$_POST['date']; 
        $status=$_POST['status'];
       

        $query_update="UPDATE donor_booking SET id='$id',recipient_email='$remail',donor_email='$demail',type='$type',unit='$unit',datetime='$date',status='$status'  WHERE id = '$id'";
        $result_update = mysqli_query($connection,$query_update); 
            ?>
   <script> location.replace("donor_booking.php"); </script>
    <?php
          

    }



?>

                              


<?php include "footer.php";?>
