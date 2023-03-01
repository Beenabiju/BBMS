
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
                            
                              <label>Id</label>
                              <input type="text" class="form-control" name="id">
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
                             <div class="form-group col-md-12">
                                <label for="inputState "required>Recipient Email</label>
                                <select name="remail" class="form-control">
                                <option selected>Choose...</option>
                                <?php
    $query_profile="select email from recipient_details";
    $result_profile=mysqli_query($connection,$query_profile);
    while($row = mysqli_fetch_assoc($result_profile))
             {
                 $ids=$row['email'];
                 echo"<option>$ids</option>";
             }
    ?>   
                               
  </select>
                            </div>
                             <div class="form-group col-md-12">
                            
                              <label>Recipient Contact</label>
                              <input type="text" class="form-control" name="contact">
                       </div>
                           
                             
                             
                       <div class="form-group col-md-12">
                            <label>Unit</label>
                            <input type="text" class="form-control" name="unit">
                      </div>
                      <div class="form-group col-md-12">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date">
                      </div>
                        <div class="form-group col-md-12">
                            <label>Blood Group</label>
                            <input type="text" class="form-control" name="group">
                      </div>
                        <div class="form-group col-md-12">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type">
                      </div>
                      <div class="form-group col-md-12">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status">
                      </div>
                   
                            </div>
                        

                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit" class="btn btn-primary"  name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="blood_booking.php" style="color:white;text-decoration:none;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        
         $id=$_POST['id'];
        $email=$_POST['remail'];
        $bloodbankid=$_POST['bloodbankid']; 
         $contact=$_POST['contact'];
         $unit=$_POST['unit'];
        $date=$_POST['date'];
          $group=$_POST['group'];
          $type=$_POST['type'];
          $status=$_POST['status'];
     

        $query_update="insert into blood_booking (Id,recipent_email,Blood_bank_id,Recipent_contact,unit,date,blood_group,type,status) values('$id','$email','$bloodbankid','$contact','$unit','$date','$group','$type',$status')";
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
