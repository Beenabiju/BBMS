<?php include "header.php";
include "../database_connection.php";
?>
<?php session_start();
if(isset($_GET['rphone'])){
$_SESSION['rname']=$_GET['rname'];
$_SESSION['remail']=$_GET['remail'];
$_SESSION['rphone']=$_GET['rphone'];
$_SESSION['bloodunit']=$_GET['bloodunit'];
$_SESSION['bloodgroup']=$_GET['bloodgroup'];
$_SESSION['bloodtype']=$_GET['bloodtype'];
}
//&rname=athulya&remail=athulyaanil%40gmail.com&rphone=6543546&bloodunit=8&bloodgroup=A-&bloodtype=Blood&book=Proceed
?>
<title>Blood Booking</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark pt-2 pb-2" style="background-color:#E7625F;">
<a class="navbar-brand" href="#"><b>BBMS</b></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<b>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav">
<li class="nav-item active">
<a class="nav-link" href="login1.php">Back to login <span class="sr-only">(current)</span></a>
</li>
</ul>
</div>
</b>
</nav>
<form  method="get" class="form-inline container mt-4 mb-4">
<div class="row">
<div class="col-sm">
<input class="form-control border-end-0 border rounded-pill" type="search" name='search' placeholder="Search" aria-label="Search" style="width:900px" id="example-search-input">
</div>
<div class="col-sm">
<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" name='submit' value='submit'>
<i class="fa fa-search"></i>
</button>
</div></div>  </form>
<div class="container">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Sl.No.</th>
<th scope="col">Name</th>
<th scope="col">Blood Group</th>
<th scope="col">Type</th>
<th scope="col">Units availble</th>
<th scope="col">Bloodbank id</th>
<th scope="col">Address</th>
    </tr>
</thead>
<?php 
    if(isset($_GET['submit'])){
        $keyword=$_GET['search'];
        $keywords=explode(' ',$keyword);
        $query="select bloodbank_details.Name, blood_details.blood_group,blood_details.unit,blood_details.type,bloodbank_details.Bloodbank_id, bloodbank_details.Address, bloodbank_details.State, bloodbank_details.City, bloodbank_details.Country from blood_details,bloodbank_details where ";
        $query.="bloodbank_details.bloodbank_id=blood_details.bloodbank_id and blood_details.unit!='0' and ";
        foreach($keywords as $k)
        {
            $query.=" (bloodbank_details.Name like '%$k%' or blood_details.type like '%$k%' or blood_details.blood_group like '%$k%' or bloodbank_details.City like '%$k%') and ";
        }
        $query = substr_replace($query, "", -4);
       $query.=" order by blood_details.unit desc";
    }
    else{
//        $r=mysqli_query($connection,"select * from bloodbank_details");
//        while($rr=mysqli_fetch_assoc($r))
//        {
//        $id=$r['BloodBank_id'];
//        $lati=$r['lati'];
//        $longi=$r['longi'];
//        $location= calculateDistance($_GET['lati'], $_GET['longi'], $rr['lati'] , $rr['longi']);
        $query="select bloodbank_details.Name, bloodbank_details.Phone_no,blood_details.blood_group,blood_details.unit,blood_details.type, bloodbank_details.Bloodbank_id, bloodbank_details.Address, bloodbank_details.State, bloodbank_details.City, bloodbank_details.Country from blood_details,bloodbank_details where bloodbank_details.bloodbank_id=blood_details.bloodbank_id and blood_details.unit>='".$_SESSION['bloodunit']."' and blood_details.blood_group = '".$_SESSION['bloodgroup']."' and blood_details.type = '".$_SESSION['bloodtype']."' order by blood_details.unit desc";
    }
    $q = mysqli_query($connection,$query);
    $i=1;
    while($bloddetails=mysqli_fetch_assoc($q))
    {
        $bbid=$bloddetails['Bloodbank_id'];
        $blood=$bloddetails['blood_group'];
        $type=$bloddetails['type'];
        $unit = $bloddetails['unit'];
?>
<tr>
<th scope="row"><?php echo $i;?></th>
<td><?php echo $bloddetails['Name'];?></td>
<td><?php echo $bloddetails['blood_group'];?></td>
<td><?php echo $bloddetails['type'];?></td>
<td><?php echo $bloddetails['unit'];?></td>
<td><?php echo $bloddetails['Bloodbank_id'];?></td>
<td><?php echo $bloddetails['Address'].", ".$bloddetails['City'].", ".$bloddetails['State'].", ".$bloddetails['Country'];?></td>
<?php echo "<td><a href='bloodbooking.php?bbid=".$bbid."&phone=".$bloddetails['Phone_no']."'>";
        $status="";
      $bloodrequests=mysqli_query($connection,"SELECT status FROM `blood_booking` WHERE Blood_bank_id='$bbid' and blood_group='$blood' and type='$type' and recipent_email='".$_SESSION['remail']."'");
        while($row=mysqli_fetch_assoc($bloodrequests)){
            $status=$row['status'];
        }
        if($status=='requested'){
            echo "<td><a href='bloodbooking.php?&bbid=".$bbid."&bloodgroup=".$blood."&type=".$type."&bloodunit=".$_SESSION['bloodunit']."&rname=".$_SESSION['rname']."&phone=".$bloddetails['Phone_no']."&r=cancel'>Requested</a></td>";
        }
        else if($status=='confirmed'){
            echo "<td><a href='bloodbooking.php?remail=".$_SESSION['remail']."&bbid=".$bbid."&bloodgroup=".$blood."&type=".$type."&bloodunit=".$_SESSION['bloodunit']."&rname=".$_SESSION['rname']."&phone=".$bloddetails['Phone_no']."&r=req'>Request Booking</a></td>";
        }
        else if ($status==""){
            echo "<td><a href='bloodbooking.php?remail=".$_SESSION['remail']."&bbid=".$bbid."&bloodgroup=".$blood."&type=".$type."&bloodunit=".$_SESSION['bloodunit']."&rname=".$_SESSION['rname']."&phone=".$bloddetails['Phone_no']."&r=req'>Request Booking</a></td>";
        }?>
</tr>
<?php 
     $i++;
    }?>
</table>
<?php
    if(isset($_GET['phone']) ){
        if($_GET['r']=="req"){
        try{
        $insertrecip=mysqli_query($connection,"insert into recipient_details values('".$_SESSION['rname']."','".$_SESSION['remail']."')");
        }
        catch(exception $e){echo "";}
        $insertrequest=mysqli_query($connection,"insert into blood_booking values(null, '".$_SESSION['remail']."', '".$_GET['bbid']."', '".$_GET['phone']."', '".$_SESSION['bloodunit']."', NOW(), '".$_SESSION['bloodgroup']."','".$_GET['type']."','requested')");
            if($insertrequest){
                        ?><script>location.replace("bloodbooking.php");</script><?php
        }
        }
        else if($_GET['r']=="cancel"){
            $deletebooking=mysqli_query($connection,"delete from blood_booking where status='requested' and Blood_bank_id='".$_GET['bbid']."' and blood_group='".$_GET['bloodgroup']."' and type='".$_GET['type']."' and recipent_email='".$_SESSION['remail']."'");
                        ?><script>location.replace("bloodbooking.php");</script><?php
        }
    }
//echo $location;?>
</div>
<?php 

    include "footer.php";?>