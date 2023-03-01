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
          
    }
    
    include "navbar.php";

$_SESSION['page']=1;
    ?>
    <form method="POST" class="form-inline container mt-4 mb-4" >
    <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search by Name, Blood Bank Id, City, State" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit"
        value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
     </div>
    </form>
    <form method="POST" action="bloodbank_insert.php">
    <input type="submit" name="add" class="fixed-bottom btn-circle btn-sm mb-5" style="left: 1200px; font-weight: 900; background:#880808; color:white;" value="ADD">
    </form>
    
    
 <div class="container mt-5 ml-4" align="center">
 
       <div class="table-responsive-sm">
  <table class="table">
                    <tr class="lightbluebg" align="center">

<th>ID</th>
<th>NAME</th>
<th>PASSWORD</th>
<th>ADDRESS</th>

<th>PHONE_NO</th>
<th>EMAIL</th>
<th>Access</th>
<th>DELETE</th>
<th>UPDATE</th>

</tr>
  <?php if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from bloodbank_details where ";
            foreach($keywords as $k)
            {
                $query.="Name like '%$k%' or BloodBank_id like '%$k%' or City like '%$k%' or State like '%$k%' and ";
            }
            $querys = substr_replace($query, "", -4);
           
        }        
   else
   {
       $querys="Select * from bloodbank_details";
   }
            
     $i=mysqli_query($connection,$querys);
            while($row=mysqli_fetch_assoc($i))
        {
                echo"<tr align='center'>";
                
                echo"<td>".$row['BloodBank_id']."</td> ";
               
                 echo"<td>".$row['Name']."</td> ";
                 echo"<td>".$row['password']."</td> ";
               echo"<td>".$row['Address']."<br>".$row['City'].",".$row['State']."<br>".$row['Zip']."</td> ";
                 echo"<td>".$row['Phone_no']."</td> ";
                echo"<td>".$row['Email']."</td> ";
                 echo"<td>".$row['access']."</td> ";
                echo"<td><a href='bloodbank_details.php?delete=".$row['BloodBank_id']."'><i class='fa fa-trash' style='font-size:24px'aria-hidden='true'></i></a></td>";
                echo"<td><a href='bloodbank_update.php?update=".$row['BloodBank_id']."'><i class='fa fa-edit'style='font-size:24px'></i></a></td>";
               
                if(isset($_GET['delete']))
           {
            $del=$_GET['delete'];
            $delete="DELETE FROM bloodbank_details WHERE BloodBank_id='$del'";
            $delete_run=mysqli_query($connection,$delete);
                    ?>
   <script> location.replace("bloodbank_details.php"); </script>
    <?php
            
          
          }
  
             
                
            echo"</tr>";
        }
      
            
        ?>

   
   
           </table>  </div>

     </div>


<?php include "footer.php";?>