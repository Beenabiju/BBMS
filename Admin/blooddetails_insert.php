
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

  

        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label> Id</label>
                              <input type="text" required class="form-control" name="id" >
                       </div>
                           
                            <div class="form-group col-md-12">
                            <label>Blood Group</label>
                            <input type="text" required class="form-control" name="group">
                                </div>
                               
                             <div class="form-group col-md-12">
                            <label>unit</label>
                            <input type="text" required name="unit" class="form-control">
                                </div>
                             
                       <div class="form-group col-md-12">
                            <label>Type</label>
                            <input type="text" required  class="form-control" name="type">
                      </div>
                      
                   
                            <div class="form-group col-md-12">
                                <label for="inputState "required>Blood Bank Id</label>
                                <select name="bloodbankid" class="form-control">
                                <option selected>Choose...</option>
                           
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
                          

                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit" class="btn btn-primary"   name="submit" value="submit">
                        <button type="submit" class="btn btn-primary" > <a href="blood_details.php" style="color:white;text-decoration:none;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        

        $bloodbank_id=$_POST['bloodbankid']; 
         $id=$_POST['id'];
        $group=$_POST['group'];
       
        $unit=$_POST['unit'];
         $type=$_POST['type'];
        

        $query_update="insert into blood_details(id,blood_group,unit,type,BloodBank_id)values('$id','$group','$unit',' $type','$bloodbank_id')";
        $result_update = mysqli_query($connection,$query_update); 
   ?>
   <script> location.replace("blood_details.php"); </script>
    <?php
    }



?>

                              
</form>

<?php include "footer.php";?>
