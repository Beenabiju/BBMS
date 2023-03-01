<?php include "header.php";
  session_start();
?>

</head>
<body>
<link rel="stylesheet" href="CSS.css">

<?php 
     
    if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
         
    }
    include "navbar.php";
    $_SESSION['page']=4;
?>
<form method="POST" class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search by Id , Status , Recipient Email , Date , Blood Bank Id" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit" value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
    </div>
    </form>
    <form action="bloodbooking_insert.php">
     <input type="submit" class="fixed-bottom btn-circle btn-sm mb-5" style="left: 1200px; font-weight: 900;background:#880808; color:white;"value="ADD">
</form>
 <div class="container mt-5" align="center">

       
         <table class="table">
                    <tr class="lightbluebg" align="center">

<th>ID</th>
<th>RECIPIENT_EMAIL</th>
<th>BLOODBANK ID</th>
<th>RECIPIENT CONTACT</th>
<th>UNIT</th>
<th>DATE</th>
<th>BLOOD GROUP</th>
<th>TYPE</th>
<th>STATUS</th>
<th></th>
</tr>
 <?php 
        if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from blood_booking where ";
            foreach($keywords as $k)
            {
                $query.="id like '%$k%' or date like '%$k%' or Blood_bank_id like '%$k%' or status like '%$k%'  or recipent_email like '%$k%'and ";
            }
            $querys = substr_replace($query, "", -4);
           
        }
  else
  {
    $querys="Select * from blood_booking";
  
  }
      $i=mysqli_query($connection,$querys);
            while($row=mysqli_fetch_assoc($i))
            
        {
                echo"<tr align='center'>";
                
                echo"<td>".$row['Id']."</td> ";
                echo"<td>".$row['recipent_email']."</td> ";
                 echo"<td>".$row['Blood_bank_id']."</td> ";
                 echo"<td>".$row['Recipent_contact']."</td> ";
                 echo"<td>".$row['unit']."</td> ";
                 echo"<td>".$row['datetime']."</td> ";
                    echo"<td>".$row['blood_group']."</td> ";
                    echo"<td>".$row['type']."</td> ";
                 echo"<td>".$row['status']."</td> ";
                echo"<td><a href='blood_booking.php?delete=".$row['Id']."'><i class='fa fa-trash' style='font-size:24px'aria-hidden='true'></i></a></td>";
                echo"<td><a href='bloodbooking_update.php?update=".$row['Id']."'><i class='fa fa-edit' style='font-size:24px'></i></a></td>";
               
                if(isset($_GET['delete']))
           {
            $del=$_GET['delete'];
            $delete="DELETE FROM blood_booking WHERE Id='$del'";
            $delete_run=mysqli_query($connection,$delete);
                       ?>
   <script> location.replace("blood_booking.php"); </script>
    <?php
          
          }           
            echo"</tr>";
        }
      
            
        ?>


    </table>  
  
     </div>


<?php include "footer.php";?>