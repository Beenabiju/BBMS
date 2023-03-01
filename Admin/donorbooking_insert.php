
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
                             <div class="form-group col-md-6">
                                <label for="inputState "required>Donor Email</label>
                                <select name="demail" class="form-control">
                                <option selected>Choose...</option>
                               
                       
                                <?php
    $query_profile="select email from donor_details";
    $result_profile=mysqli_query($connection,$query_profile);
    while($row = mysqli_fetch_assoc($result_profile))
             {
                 $ids=$row['email'];
                 echo"<option>$ids</option>";
             }
    ?>   
                               
                                       </select>
                                </div>
                                 <div class="form-group col-md-6">
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
                            <label>Type</label>
                            <input type="text" class="form-control" name="type">
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
                            <label>Status</label>
                            <input type="text" class="form-control" name="status">
                      </div>
                         
                            </div>
                       
                          


                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit"class="btn btn-primary"   name="submit" value="submit">
                        <button type="submit" class="btn btn-primary"> <a href="donor_booking.php" style="color:white;text-decoration:none;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        

        $id=$_POST['id']; 
         $remail=$_POST['remail'];
           $contact=$_POST['contact'];
        $demail=$_POST['demail'];
        $type=$_POST['type']; 
        $unit=$_POST['unit'];
            $date=$_POST['date']; 
        $status=$_POST['status'];
       

        $query_update="insert into donor_booking(id,recipient_email,Recipient_contact,donor_email,type,unit,datetime,status) values('$id','$remail','$contact','$demail','$type','$unit','$date','$status')";
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
   <script> location.replace("donor_booking.php"); </script>
    <?php
          

    }



?>

                              
</form>

<?php include "footer.php";?>
