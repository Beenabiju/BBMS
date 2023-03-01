
<?php include "header.php";

 session_start();
?></head>
<body>

<?php if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
          
    }
    include "navbar.php";
?>


    
<?php
$id=$_SESSION['username'];

$queryprofile="select * from admin where username='$id'";
$resultprofile=mysqli_query($connection,$queryprofile);

while($row = mysqli_fetch_assoc($resultprofile))
{
    
    ?>

  <div class="container mt-5">
                  
    <h1 align="center"> Profile</h1>
                   <br>
                    <form method="post" enctype="multipart/form-data">

                   <div class="form-row">
                            <div class="form-group col-md-12">
                            
                              <label> Username</label>
                              <input type="text" required class="form-control" name="id" value="<?php echo $row['username'];?>">
                       </div>
                           
                            <div class="form-group col-md-12">
                            <label>Password</label>
                            <input type="text" required class="form-control" name="password" value="<?php echo $row['password'];?>" >
                                </div>
                                
                               <div class="form-group col-md-12">
                            <label>Contact</label>
                            <input type="text" required class="form-control" name="contact" value="<?php echo $row['contact'];?>" >
                                </div>
                        </div>
    </div>
                              <?php
}?>
                              <center><input type="submit" name="submit" value="submit" ></center> 
                                                           
<?php  
    if(!empty($_POST['submit']))
    {
        

        $ids=$_POST['id']; 
        $password=$_POST['password']; 
        $contact=$_POST['contact']; 

        $query_updates="UPDATE admin SET username='$ids',password='$password',contact='$contact'  WHERE username = '$id'";
        $result_updates = mysqli_query($connection,$query_updates); 
        $_SESSION['username']=$id;
        /*if(mysqli_query($connection,$query_updates))
           {
              
             echo "hai";
           }
           else
           {
               
                echo "not updated".mysqli_error($connection);
           }*/
            ?>
   <script> location.replace("admin_profile.php"); </script>
    <?php
          

    }
?>
    </form>

    </body>
</html>