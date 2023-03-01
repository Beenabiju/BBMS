<?php 
    //header
 session_start();
    include "header.php";
?>
</head>
<body>
<?php 
      if(empty($_SESSION['username']))
    {
        ?>
   <script> location.replace("adminlogin.php"); </script>
    <?php
         
    }
    //navbar
    include "navbar.php"; 
    //database
 
    

    ?><?php 
   
?>
</head>
<body>
<?php

if(!empty($_POST['send']))
{
  
    $content = $_POST['content'];
    $expire_on=$_POST['exp_name'];
date_default_timezone_set('Asia/Kolkata');

$date=date("y-m-d H:i");
    
    $query = "insert into alert(description,date,expire)values('$content','$date','$expire_on')";
    $result=mysqli_query($connection,$query);
   
}
?>

  <body>
      <form class="container"  action="alert.php?action=create" method="post" enctype="multipart/form-data">
      <h2 align="center"> Announcement </h2><br>
       <div class="container mb-3">
        <a href="alert.php?action=create"><input type=submit value=create></a>  
          <a href="alert.php?action=view"><input type=button value=view></a>
      </div>
  <?php
      if($_GET['action']=='create')
      {?>
          <h3 class="container">CREATE</h3>
          
              <div class="mb-3">
              
                <label class="form-label">Descripition</label>
                <textarea  class="form-control" name="content" required></textarea>
              </div>
            
              <div class="text-center row p-5">
                 <?php
      
       ?>
                 
                  <div class="col-3 mt-2">Current date : <?php echo  date("d-m-y")?> </div>
                  <div class="col-3 mt-2">Current Time : <?php  date_default_timezone_set('Asia/Kolkata');
echo date(' H:i');?> </div>
           
                  <div class="col-3">Exp date <input class="ml-2" type="date" name="exp_name"></div>
                  <div class="col-3">
                     
                </div>
              </div>



         <input type="submit" name="send" value="Send" class="butt">
        </form>
<?php
}



if($_GET['action']=='view')
{?>
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
    $query_select = "select * from alert";
    $result_select= mysqli_query($connection,$query_select);
    while($row_select = mysqli_fetch_assoc($result_select))
    {?>
        <tr>
            <td><?php echo $row_select['id'];?></td>
           <td> <?php echo $row_select['description'];?></td>
           
            <td><?php echo $row_select['date'];?></td>
            <td><?php echo $row_select['expire'];?></td>
  
            <td align="center">
                <a href="alert.php?action=view&id=<?php echo $row_select['id'];?>">
                      delete
                </a>
            </td>
            <?php
      if(isset($_GET['id']))
           {
     $id=$_GET['id'];
      $querys = "delete from alert where id='$id'";
      $results= mysqli_query($connection,$querys);
               ?>
   <script> location.replace("alert.php?action=view"); </script>
 
    <?php 
      }
     ?>
        </tr>
        <?php }?>
    
   
    </table>
      </div>


    <?php
}
      ?>
     
      



