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
    $_SESSION['page']=3;
?>
<form method="POST" class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search by Name, Email" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit" value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
    </div>
    </form>
    <form action="recipient_insert.php">
     <input type="submit" class="fixed-bottom btn-circle btn-sm mb-5" style="left: 1200px; font-weight: 900;background:#880808; color:white;"value="ADD">
</form>
 <div class="container mt-5" align="center">

        <div class="table-responsive-sm">
         <table class="table">
                    <tr class="lightbluebg" align="center">

<th>Name</th>
<th>EMAIL</th>
<th>DELETE</th>
<th>UPDATE</th>
</tr>
  <?php   
             if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from recipient_details where ";
            foreach($keywords as $k)
            {
                $query.="name like '%$k%' or email like '%$k%' and ";
            }
            $querys = substr_replace($query, "", -4);
           
        }
             else
   {
    $querys="Select * from recipient_details";
  
  }
      $i=mysqli_query($connection,$querys);
            while($row=mysqli_fetch_assoc($i))
        {
                echo"<tr align='center'>";
                
                echo"<td>".$row['name']."</td> ";
                echo"<td>".$row['email']."</td> ";
                 
                echo"<td><a href='recipient_details.php?delete=".$row['email']."'><i class='fa fa-trash' style='font-size:24px'aria-hidden='true'></i></a></td>";
                echo"<td><a href='recipient_update.php?update=".$row['email']."'><i class='fa fa-edit' style='font-size:24px'></i></a></td>";
               
                if(isset($_GET['delete']))
           {
            $del=$_GET['delete'];
            $delete="DELETE FROM recipient_details WHERE email='$del'";
            $delete_run=mysqli_query($connection,$delete);
                    ?>
   <script> location.replace("recipient_details.php"); </script>
    <?php
            
          
          }
  
             
                
            echo"</tr>";
        }
      
            
        ?>

   
   

     </div>


<?php include "footer.php";?>