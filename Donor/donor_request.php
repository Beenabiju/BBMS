<?php include "header.php";
 session_start();
?>
</head>
<body>
<link rel="stylesheet" href="CSS.css">
<?php if(empty($_SESSION['dusername']))
    {
        ?>
   <script> location.replace("donor_login.php"); </script>
    <?php
          
    }
    $username=$_SESSION['dusername'];
    include "navbar.php";
 
?>


 <div class="container mt-5" align="center">

       
         <table class="table">
                    <tr class="lightbluebg" align="center">

<th>ID</th>
<th>RECIPIENT_EMAIL</th>
<th>DONOR_EMAIL</th>
<th>TYPE</th>
<th>UNIT</th>
<th>DATE</th>
<th>Status</th>
<th>CONFORM</th>
<th>CANCEL</th>
</tr>
  <?php    
             $username=$_SESSION['dusername'];
         
       
    $querys="Select * from donor_booking  where donor_email='$username' order by datetime desc";
  
  
      $i=mysqli_query($connection,$querys);
                    
            while($row=mysqli_fetch_assoc($i))
        {
                echo"<tr align='center'>";
                
                echo"<td>".$row['id']."</td> ";
                echo"<td>".$row['recipient_email']."</td> ";
                 echo"<td>".$row['donor_email']."</td> ";
                 echo"<td>".$row['type']."</td> ";
                 echo"<td>".$row['unit']."</td> ";
                echo"<td>".$row['datetime']."</td> ";
                echo"<td>".$row['status']."</td> ";
                echo"<td><a href='donor_request.php?conform=".$row['id']."'>confirm</a></td>";
                 echo"<td><a href='donor_request.php?cancel=".$row['recipient_email']."&date=".$row['datetime']."'>cancel</a></td>";
                
               
 
            echo"</tr>";
        }
      
            
        ?>

   
   
    </table>  
  <?php
     
     if(isset($_GET['conform']))
     {
           $del=$_GET['conform'];
           $query_update="UPDATE donor_booking SET status='confirmed' where id='$del'";
       $result_update = mysqli_query($connection,$query_update); 
              ?>
   <script> location.replace("donor_request.php"); </script>
    <?php
     }
     if(isset($_GET['cancel']))
     {
         
           $del=$_GET['cancel'];
         $date=$_GET['date'];
         echo $del;
         echo $date;
             $delete="DELETE FROM donor_booking WHERE recipient_email='$del' and donor_email='".$_SESSION['dusername']."' and datetime='$date'";
            $delete_run=mysqli_query($connection,$delete);?>
  <script> location.replace("donor_request.php"); </script>
    <?php
     }
     
     
     ?>


<?php include "footer.php";?>