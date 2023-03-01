   <?php include "header.php";
    session_start();
    ?>
<title></title>
    <meta charset="UTF-8">
</head>
<body class="container pt-5 mt-3">
    <div class="container">
        <h1>
          <span>Blood Requests</span>
              <button class='btn pull-right'><a href="login.php">logout</a></button>
              <button class='btn pull-right'><a href="profile.php">Edit profile</a></button>
              <button class='btn pull-right'><a href="dashboard.php">Back</a></button>
        </h1>
             <br><br>
              <table class="table">
                     <tr>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Blood group</th>
                         <th>Type</th>
                         <th>Unit</th>
                         <th>Time</th>
                         <th>Contact</th>
                         <th>Requests</th>

                     </tr>
                     
                  <?php
                  
                  $bloodbooking=mysqli_query($connection,"select * from blood_booking where Blood_bank_id='".$_SESSION['bloodbank']."' order by datetime desc");
                  
                  while($row=mysqli_fetch_assoc($bloodbooking)){
                      echo"<tr>";
                  $rname=mysqli_query($connection,"select name from recipient_details where email='".$row['recipent_email']."'");
                while($row1=mysqli_fetch_assoc($rname))
                      echo"<td>".$row1['name']."</td>";
                      echo"<td>".$row['recipent_email']."</td>";
                      echo"<td>".$row['blood_group']."</td>";
                      echo"<td>".$row['type']."</td>";
                      echo"<td>".$row['unit']."</td>";
                      echo"<td>".$row['datetime']."</td>";
                      echo"<td>".$row['Recipent_contact']."</td>";
                      if($row['status']=="requested")
                      echo"<td><a href='requests.php?r=c&id=".$row['Id']."&unit=".$row['unit']."&blood=".$row['blood_group']." &type=".$row['type']."'>".$row['status']."</a></td>";
                      else if($row['status']=="confirmed")
                      echo"<td><a href='requests.php?r=r&id=".$row['Id']."&unit=".$row['unit']."&blood=".$row['blood_group']." &type=".$row['type']."'>".$row['status']."</a></td>";
                  }
                  ?>

              </table>
              <?php
              if(isset($_GET['r']) && $_GET['r']=='c' ){
                  $units=mysqli_query($connection,"select unit from blood_details where bloodbank_id='".$_SESSION['bloodbank']."' and blood_group='".$_GET['blood']."' and type='".$_GET['type']."'");
                  echo $_GET['blood'];
                  while($row=mysqli_fetch_assoc($units)){
                      $unit = $row['unit'];
                  }
                  if($unit>$_GET['unit']){
                  $updatebloodbook=mysqli_query($connection,"update blood_booking set status='confirmed'  where id='".$_GET['id']."'");
                  $updatebloodbank=mysqli_query($connection,"update blood_details set unit = unit - ".$_GET['unit']." where bloodbank_id='".$_SESSION['bloodbank']."' and blood_group='".$_GET['blood']."' and type='".$_GET['type']."'");
                ?><script>location.replace("requests.php");</script><?php

                  }
                  else {
                        ?><script>alert("insufficient blood units.");</script><?php
                  }
              }
              if(isset($_GET['r']) && $_GET['r']=='r' ){
                  
                  $update=mysqli_query($connection,"update blood_booking set status='requested'  where id='".$_GET['id']."'");
                  $updatebloodbank=mysqli_query($connection,"update blood_details set unit = unit + ".$_GET['unit']." where bloodbank_id='".$_SESSION['bloodbank']."' and blood_group='".$_GET['blood']."' and type='".$_GET['type']."'");
                ?><script>location.replace("requests.php");</script><?php

                  
              }
              ?>
    
        </div>