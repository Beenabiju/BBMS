   
<?php include "header.php";


 session_start();
?>

   <?php  
if(isset($_GET['delete']))
           {
            $del=$_GET['delete'];
            $delete="DELETE FROM donor_details WHERE email='$del'";
            $delete_run=mysqli_query($connection,$delete);
                    ?>
   <script> location.replace("donor_registration.php"); </script>
    <?php
            
          
          }
  