
<?php include "header.php";
 session_start();
?></head>
<body>

<?php if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
          
    } include "navbar.php";
?>

<title>My Profile</title>


<body>


        <div class="container mt-5">
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label>Name</label>
                              <input type="text" required class="form-control" name="name" >
                       </div>
                     
                            <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="text" required class="form-control" name="email">
                          </div>
                           
                        </div>
                        

   <?php

?>
                   
 <form action="" method="post">                     

                      <div align="center">
                       <input type="submit" class="btn btn-primary"  name="submit" value="submit">
                        <button type="submit" class="btn btn-primary" > <a href="recipient_details.php" style="text-decoration:none;color:white;">Back</a></button>
                        </div>
                             
                              
<?php  
    if(!empty($_POST['submit']))
    {
        
         $name=$_POST['name'];
        $email=$_POST['email'];
       
         
     

        $query_update="insert into recipient_details(name,email)values('$name','$email')";
        $result_update = mysqli_query($connection,$query_update); 
              ?>
   <script> location.replace("recipient_details.php"); </script>
    <?php

    }



/* if(mysqli_query($connection,$query_update))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }*/
?>

                              
</form>

<?php include "footer.php";?>
