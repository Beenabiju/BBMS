<?php include "header.php";
include "../database_connection.php";
session_start();
if(empty($_SESSION['remail']))
{
    header("Location:login.php");
}
$blood_type = $_SESSION['rtype'];
$remail = $_SESSION['remail'];
$runit = $_SESSION['runit'];
$rname=$_SESSION['rname'];
$rcontact=$_SESSION['rphone'];
?>

    
    <title>Donor Booking</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#880808;">
  <a class="navbar-brand" href="#"><b id="reciname"><?php echo $rname?></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <b>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
   
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      </ul>
      </div>
    </b>
    </nav>

  <!--search-->
 <form method="POST" class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit" title="search" value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
       <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="back" title="back" value="submit" type="submit">
        <i class="fa fa-rotate-left"></i>
     </button>
       </div>
       
       
    </div>  
</form>
       
<?php
        if(isset($_POST['back']))
        { 
            header("Location:login.php");
        }
    
    ?>
    <div class="container">
    <table class="table table-hover">
  <thead>
    <tr>
     
        <th scope="col"><center>Sl.No.</center></th>
        <th scope="col"><center>Name</center></th>
        <th scope="col"><center>Blood Group</center></th>
        <th scope="col"><center>Address</center></th>
      <th scope="col"></th>
        
    </tr>
  </thead>
         <?php
        
        
        
            if(isset($_GET['requestdonor']))
            {
                $demail=$_GET['requestdonor'];
                $c = mysqli_query($connection,"select count(*) as count from donor_booking where recipient_email='$remail' and donor_email='$demail' and status='requested'");
                $count = mysqli_fetch_assoc($c);
                $f=0;
                
                if($count['count']!=0)
                {
                    $a = mysqli_query($connection,"select * from donor_booking where recipient_email='$remail' and donor_email='$demail' and status='requested'");
                    while($b = mysqli_fetch_assoc($a))
                    {
                        $date=substr($b['datetime'],0,11);
                        $date1=date_create(date("y-m-d"));
                        $date2=date_create($date);
                        $diff=date_diff($date1,$date2);
                        $d=$diff->format("%a");
                        if($d==0)
                        {
                            $f=1;
                            break;
                        }
                    }
                    if($f!=1){
                        mysqli_query($connection,"insert into donor_booking(recipient_email,donor_email,type,unit,datetime,status,Recipient_contact)values('$remail','$demail','$blood_type','$runit',NOW(),'requested','$rcontact')");
                        echo '<script type ="text/JavaScript">';    
                        echo 'alert("requested")';  
                        echo '</script>';
                    }
                        
                    
                }
                else
                {
                    mysqli_query($connection,"insert into donor_booking(recipient_email,donor_email,type,unit,datetime,status,Recipient_contact)values('$remail','$demail','$blood_type','$runit',NOW(),'requested','$rcontact')");
                    echo '<script type ="text/JavaScript">';    
                    echo 'alert("requested")';  
                    echo '</script>';
                }
        } 
        if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from donor_details where availability='y' and ";
            foreach($keywords as $k)
            {
                $query.=" (name like '%$k%' or blood_group like '%$k%' or city like '%$k%' or State like '%$k%') and ";
            }
            $querys = substr_replace($query, "", -4);
            
        }
        else
        {?>
   <?php 
    $querys ="select * from donor_details where availability='y' and blood_group='$blood_type'";
        }
    $q= mysqli_query($connection,$querys);
    $i=1;
    while($donor=mysqli_fetch_assoc($q))
    {
        $email=$donor['email'];
        ?>
    
    <tr>
      <th scope="row"><center><?php echo $i;?></center></th>
        <td><?php echo $donor['name'];?></td>
        <td><center><?php echo $donor['blood_group'];?></center></td>
      <td><?php echo $donor['address'].", ".$donor['city'].", ".$donor['State'].", ".$donor['country'];?></td>
      <?php echo "<td><a href='donor_booking_details.php?email=".$email."'>view</a></td>";?>
      <?php echo "<td><a href='donor_booking.php?requestdonor=".$email."'>request</a></td>";?>
     
    </tr>
        
    <?php 
     $i++;
    }
        ?>
</table>
    </div>
   

<?php include "footer.php";
 