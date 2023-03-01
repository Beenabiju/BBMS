<?php 
    include "header.php";
    include "../database_connection.php";
    session_start();
    if(empty($_SESSION['hemail']))
    {
        header("Location:login.php");
    }
    $remail = $_SESSION['hemail'];
    $rphn = $_SESSION['hphone'];
?>
<title>Donor Booking Hisory</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#880808;">
  <a class="navbar-brand" href=""><b><?php echo "HISTORY";?></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <b>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
   
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="booking_history.php?h=d">Donor-Booking-History</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="booking_history.php?h=b">BloodBank-Booking-History</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="verification.php">Back</a>
      </li>
      </ul>
      </div>
    </b>
</nav>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    <?php
    if(isset($_GET['h']) && $_GET['h']=='d')
    {
       if(isset($_GET['b_id']))
        {
            $bookingid=$_GET['b_id'];
            $delete_query=mysqli_query($connection,"delete from donor_booking where id='$bookingid'");
        } 
        ?>
    <div class="container mt-5">
    
    <table class="table">
    
    <tr>
     
        <th><center>Sl.No.</center></th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Group</th>
        <th>unit</th>
        <th>Status</th>
        <th></th>
        
    </tr>
    <?php 
       
    $select_query = mysqli_query($connection,"select * from donor_booking where recipient_email='$remail'");
        $i=1;
    while($select = mysqli_fetch_assoc($select_query))
    {
       $id= $select['id'];
       $demail=$select['donor_email'];
        
        ?>
        <tr>
          
           
            
            <?php $s = mysqli_query($connection,"select * from donor_details where email = '$demail'");
            while($r=mysqli_fetch_assoc($s))
            {?>
            <th><center><?php echo $i;?></center></th>
            <td><?php echo $r['name'];?></td>
            
            <td><?php echo $demail;?></td>
            
          <td><?php echo $r['address'].",<br>".$r['city'].",<br>".$r['State'].", ".$r['country'];?></td>
          
          <td><?php echo $r['phone'];?></td>
          
          <td><?php echo $select['type'];?></td>
          
          <td><?php echo $select['unit'];?></td>
          
          <td><?php echo $select['status'];?></td>
          <?php if($select['status']=='requested'){?>
                
            
            <td><a href="booking_history.php?h=d&b_id=<?php echo $id;?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          
                <?php }
            else{?>
                
            
            <td><i class="fa fa-trash" aria-hidden="true" style="color: #cccccc;cursor: not-allowed;"></i></td>
          
                <?php }
            ?>
        </tr>
        <?php
            }
     $i++;
    }
        }
    
    
    
    
    
    
    
    
    if(isset($_GET['h']) && $_GET['h']=="b")
    {
       if(isset($_GET['id']))
        {
           $bbid=$_GET['id'];
            $delete_query=mysqli_query($connection,"delete from blood_booking where Blood_bank_id='$bbid'");
        } 
    ?>
    <div class="container mt-5">
    
    <table class="table">
    
    <tr>
     
        <th><center>Sl.No.</center></th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Group</th>
        <th>Type</th>
        <th>unit</th>
        <th>Status</th>
        <th></th>
        
    </tr>
    <?php 
       
    $select_query = mysqli_query($connection,"select * from  blood_booking where recipent_email='$remail'");
        $i=1;
    while($select = mysqli_fetch_assoc($select_query))
    {
       $bid= $select['Blood_bank_id'];
       
        
        ?>
        <tr>
          <th><center><?php echo $i;?></center></th>
           
            
            <?php $s = mysqli_query($connection,"select * from bloodbank_details where BloodBank_id = '$bid'");
            while($r=mysqli_fetch_assoc($s))
            {?>
            <td><?php echo $r['Name'];?></td>
            
            <td><?php echo $r['Email'];?></td>
            
          <td><?php echo $r['Address'].",<br>".$r['City'].",<br>".$r['State'].", ".$r['Country'];?></td>
          
          <td><?php echo $r['Phone_no'];?></td>
          
          <td><?php echo $select['type'];?></td>
           <td><?php echo $select['blood_group'];?></td>
          
          <td><?php echo $select['unit'];?></td>
          
          <td><?php echo $select['status'];?></td>
          
            <td><a href="booking_history.php?h=b&id=<?php echo $r['BloodBank_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          
        </tr>
        <?php
            }
     $i++;
    }
        }
 
        
    ?>
    
    
    <?php include "footer.php"?>
