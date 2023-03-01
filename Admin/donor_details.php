<?php include "header.php";
 session_start();
?>
</head>
<body>
<link rel="stylesheet" href="CSS.css">
<?php if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
          
    }include "navbar.php";
    $_SESSION['page']=2;
?>
 <form method="POST" class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search by Name, Blood Group, State, City" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit" value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
    </div>
    </form>
     <form action="donor_insert.php">
      <input type="submit" class="fixed-bottom btn-circle btn-sm mb-5" style="left: 1200px; font-weight: 900;background:#880808; color:white;"value="ADD">
</form>
 <div class="container mt-5 ml-4" align="center">
 
       <div class="table-responsive-sm">
  <table class="table">
                    <tr class="lightbluebg" align="center">

<th>NAME</th>
<th>DOB</th>
<th>AGE</th>
<th>PASSWORD</th>
<th>ADDRESS</th>
<th>PHONE_NO</th>
<th>BLOOD GROUP</th>
<th>EMAIL</th>
<th>AVAILABLITY</th>
<th>WEIGHT</th>
<th>DELETE</th>
<th>UPDATE</th>

</tr>
  <?php 
        if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from donor_details where ";
            foreach($keywords as $k)
            {
                $query.="name like '%$k%' or blood_group like '%$k%' or city like '%$k%' or State like '%$k%' and ";
            }
            $querys = substr_replace($query, "", -4);
           
        }
  else
  {
    $querys="Select * from donor_details";
  
  }
      $i=mysqli_query($connection,$querys);
            while($row=mysqli_fetch_assoc($i))
        {
                echo"<tr align='center'>";
                
                echo"<td>".$row['name']."</td> ";
                echo"<td>".$row['dob']."</td> ";
                echo"<td>".$row['age']."</td> ";
                 echo"<td>".$row['password']."</td> ";
                 echo"<td>".$row['address']."<br>".$row['city'].",".$row['State']."<br>".$row['zip']."</td> ";
                 echo"<td>".$row['phone']."</td> ";
               
                  
                 echo"<td>".$row['blood_group']."</td> ";
                  echo"<td>".$row['email']."</td> ";
                echo"<td>".$row['availability']."</td> ";
                 echo"<td>".$row['weight']."</td> ";
                echo"<td><a href='donor_details.php?delete=".$row['email']."'><i class='fa fa-trash' style='font-size:24px'aria-hidden='true'></i></a></td>";
                echo"<td><a href='donor_update.php?update=".$row['email']."'><i class='fa fa-edit' style='font-size:24px'></i></a></td>";
               
                if(isset($_GET['delete']))
           {
            $del=$_GET['delete'];
            $delete="DELETE FROM donor_details WHERE email='$del'";
            $delete_run=mysqli_query($connection,$delete);
                    ?>
   <script> location.replace("donor_details.php"); </script>
    <?php
            
                    
            
          
          }
  
             
                
            echo"</tr>";
            
        }
  
            
        ?>

   
   
           </table>  </div>
   
     </div>


<?php include "footer.php";?>