
<?php include "header.php";


 session_start();
?></head>
<body>

<?php if(empty($_SESSION['dusername']))
    {
        ?>
   <script> location.replace("donor_login.php"); </script>
    <?php
          
    }
    include "navbar.php";
?>

<title>My Profile</title>


<body>
   <?php
     $date=date("y-m-d");
     $date=date_format(date_create($date),"Y-m-d");
      
    
    ?>

   <div class="container mt-5">
    <table class="table">
    <tr class="tr">
        <th>ID</th>
        <th>Descripition</th>
        <th>Posted On</th>
        <th>Exp On</th>
        
        <th></th>
      
    </tr>
    <?php
        $query_selects = "select * from alert";
      $result_selects= mysqli_query($connection,$query_selects);
    while($row_selects =mysqli_fetch_assoc($result_selects))
    {
       
    if($row_selects['expire']>$date)
    {
?>
   
        <tr>
            <td><?php echo $row_selects['id'];?></td>
           <td> <?php echo $row_selects['description'];?></td>
           
            <td><?php echo $row_selects['date'];?></td>
            <td><?php echo $row_selects['expire'];?></td>
  
            <?php
    }
    }
    
        ?>
        </tr>
    </table></div>