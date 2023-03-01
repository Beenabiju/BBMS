<?php include "header.php";
 session_start();
?>
</head>
<body>
 <link rel="stylesheet" href="CSS.css">
<?php  if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
         
    }include "navbar.php";
    $_SESSION['page']=6;
    
?>
<form method="post"  class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search by Id, Blood Bank Id, Blood Group, Type " aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit" value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
    </div> </form>
    <form action="blooddetails_insert.php">
    <input type="submit" class="fixed-bottom btn-circle btn-sm mb-5" style="left: 1200px; font-weight: 900;background:#880808; color:white;"value="ADD">
    
      
</form>


 <div class="container mt-5 ml-4" align="center">
 
       <div class="table-responsive-sm">
  <table class="table">
                    <tr class="lightbluebg" align="center">

<th>ID</th>
<th>BLOOD_GROUP</th>
<th>UNIT</th>
<th>TYPE</th>
<th>BLOODBANK_ID</th>
<th>DELETE</th>
<th>UPDATE</th>
</tr>
  <?php         
      if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from blood_details where ";
            foreach($keywords as $k)
            {
                $query.="type like '%$k%' or blood_group like '%$k%' or bloodbank_id like '%$k%' or id like '%$k%' and ";
            }
            $querys = substr_replace($query, "", -4);
           
        }
  else
  {
    $querys="Select * from blood_details";
  
  }
      $i=mysqli_query($connection,$querys);
   
            
            while($row=mysqli_fetch_assoc($i))
        {
                echo"<tr align='center'>";
                
                echo"<td>".$row['id']."</td> ";
                echo"<td>".$row['blood_group']."</td> ";
                 
                 echo"<td>".$row['unit']."</td> ";
                echo"<td>".$row['type']."</td> ";
               
                 echo"<td>".$row['bloodbank_id']."</td> ";
                echo"<td><a href='blood_details.php?delete=".$row['id']."'><i class='fa fa-trash' style='font-size:24px'></i></a></td>";
                echo"<td><a href='blooddetails_update.php?update=".$row['id']."'><i class='fa fa-edit' style='font-size:24px'></i></a></td>";
               
                if(isset($_GET['delete']))
           {
            $del=$_GET['delete'];
            $delete="DELETE FROM blood_details WHERE id='$del'";
            $delete_run=mysqli_query($connection,$delete);
               ?>
   <script> location.replace("blood_details.php"); </script>
    <?php
          
          }
  
             
                
            echo"</tr>";
        }
      
            
        ?>

   
   
           </table>  </div>
     
     </div>


<?php include "footer.php";?>