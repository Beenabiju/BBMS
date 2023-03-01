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
    //header
    include "header.php";
?>
</head>
<body>

    <form method="POST" class="form-inline container mt-4 mb-4">
   <div class="row">
    <div class="col-sm">
    <input class="form-control border-end-0 border rounded-pill" name="search" type="text" placeholder="Search by access" aria-label="Search" style="width:900px" id="example-search-input">
       </div>
    <div class="col-sm">
       <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" name="submit" value="submit" type="submit">
        <i class="fa fa-search"></i>
     </button>
       </div>
    </div>
</form>
<div class="container">
<table class="table mt-5">
<tr>
<th>Id</th>
<th>Name</th>
<th>Access</th>
<th></th>
<th></th>
</tr>
<?php
    if(isset($_POST['submit']))
        {
            $keyword=$_POST['search'];
            $keywords=explode(' ',$keyword);
            $query="select * from bloodbank_details where ";
            foreach($keywords as $k)
            {
                $query.="BloodBank_id like '%$k%' or access like '%$k%'  and ";
            }
            $querys = substr_replace($query, "", -4);
           
        }
  else
  {
      $querys="Select * from bloodbank_details";
  }
               $i=mysqli_query($connection,$querys);
            while($row_select=mysqli_fetch_assoc($i))
                {
                    $bloodbankid=$row_select['BloodBank_id'];
                    echo("<tr><td>".$row_select['BloodBank_id']."</td><td>".$row_select['Name']."</td>
<td>".$row_select['access'].
                            "</td>");?>
                           <?php if($row_select['access']=="Deny"){ ?>
<td><a href="bloodbank_access.php?a=g&id=<?php echo $bloodbankid;?>"><i class="fa fa-check"></i></a></td><?php } else{?>
<td><a href="bloodbank_access.php?a=d&id=<?php echo $bloodbankid;?>"><i class="fa fa-times"></i></a></td>
<?php
                        }
                }
            ?>
</table>
</div>
<?php
if(isset($_GET['a'])&& isset($_GET['id'])){
$a = $_GET['a'];
$id = $_GET['id'];
if($a=='g')
{
    $strng ="update bloodbank_details set access='Granted' where BloodBank_id='$id'";
    mysqli_query($connection,$strng);
    $bbid="";
    $blood_details_bbid=mysqli_query($connection,"select bloodbank_id from blood_details where bloodbank_id='$id'");
    while($row=mysqli_fetch_assoc($blood_details_bbid)){
        $bbid=$row['bloodbank_id'];
    }
    if($bbid!=$id){
    $addToBloodDetails=mysqli_query($connection,"insert into blood_details (id,blood_group,unit,type,bloodbank_id) values
    (null,'A+','0','Blood','$id'),(null,'A+','0','Platelets','$id'),(null,'A+','0','plasma','$id'),(null,'A+','0','RBC','$id'),
    (null,'A-','0','Blood','$id'),(null,'A-','0','Platelets','$id'),(null,'A-','0','plasma','$id'),(null,'A-','0','RBC','$id'),
    (null,'B+','0','Blood','$id'),(null,'B+','0','Platelets','$id'),(null,'B+','0','plasma','$id'),(null,'B+','0','RBC','$id'),
    (null,'B-','0','Blood','$id'),(null,'B-','0','Platelets','$id'),(null,'B-','0','plasma','$id'),(null,'B-','0','RBC','$id'),
    (null,'O+','0','Blood','$id'),(null,'O+','0','Platelets','$id'),(null,'O+','0','plasma','$id'),(null,'O+','0','RBC','$id'),
    (null,'O-','0','Blood','$id'),(null,'O-','0','Platelets','$id'),(null,'O-','0','plasma','$id'),(null,'O-','0','RBC','$id'),
    (null,'AB+','0','Blood','$id'),(null,'AB+','0','Platelets','$id'),(null,'AB+','0','plasma','$id'),(null,'AB+','0','RBC','$id'),
    (null,'AB-','0','Blood','$id'),(null,'AB-','0','Platelets','$id'),(null,'AB-','0','plasma','$id'),(null,'AB-','0','RBC','$id')
    ");
    }
    ?>
<script> location.replace("bloodbank_access.php"); </script>
<?php
}
else if($a=="d")
{
    mysqli_query($connection,"update bloodbank_details set access='Deny' where BloodBank_id='$id'");
    ?>
<script>location.replace("bloodbank_access.php"); </script>
<?php
}
}
?>
<!-- footer -->
<?php include "footer.php";?>