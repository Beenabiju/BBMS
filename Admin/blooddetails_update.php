
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

$query_profile="select * from blood_details where id='$id'";
$result_profile=mysqli_query($connection,$query_profile);

while($row = mysqli_fetch_assoc($result_profile))
{
    
    ?>

        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label> Id</label>
                              <input type="text" class="form-control" name="id" value="<?php echo $row['id'];?>">
                       </div>
                           
                            <div class="form-group col-md-12">
                            <label>Blood Group</label>
                            <input type="text" class="form-control" name="group" value="<?php echo  $row['blood_group'];?>">
                                </div>
                                 
                             <div class="form-group col-md-12">
                            <label>unit</label>
                            <input type="text" class="form-control" name="unit" value="<?php echo $row['unit'];?>">
                                </div>
                             
                       <div class="form-group col-md-12">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" value="<?php echo $row['type'];?>">
                      </div>
                      
                    
                                <div class="form-group col-md-12">
                                <label for="inputState "required>Blood Bank Id</label>
                                <select name="bloodbankid" class="form-control">
                              
                                <option><?php echo $row['bloodbank_id'];?></option>
                                <?php
    $query_profile="select BloodBank_id from bloodbank_details";
    $result_profile=mysqli_query($connection,$query_profile);
    while($row = mysqli_fetch_assoc($result_profile))
             {
                 $ids=$row['BloodBank_id'];
                 echo"<option>$ids</option>";
             }
    ?>   
                               
  </select>
                            </div>
                           
                            </div>
                       
                          

                        

   <?php

}

   
?>
                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit" class="btn btn-primary"  name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="blood_details.php "style="color:white;text-decoration:none;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        $bloodbank_id=$_POST['bloodbankid']; 
         $id=$_POST['id'];
        $group=$_POST['group'];
        $unit=$_POST['unit'];
         $type=$_POST['type'];
        $query_update="UPDATE blood_details SET blood_group='$group',unit='$unit',type='$type',bloodbank_id ='$bloodbank_id' where id='$id'";
       $result_update = mysqli_query($connection,$query_update); 
           
            
        /*if(mysqli_query($connection,$query_update))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }*/
        ?>
   <script> location.replace("blood_details.php"); </script>
    <?php

    }



?>

                              
</form>

<?php include "footer.php";?>
