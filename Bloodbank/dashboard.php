   <?php include "header.php";?>
<title></title>
    <meta charset="UTF-8">
</head>
<body class="container pt-5 mt-3">
    <div class="container">
        <h1>
          <span>Blood Bank Portal</span>
              <button class='btn pull-right'><a href="login.php">logout</a></button>
              <button class='btn pull-right'><a href="profile.php">Edit profile</a></button>
              <button class='btn pull-right'><a href="requests.php">Requests</a></button>
        </h1>
        </div>
    <form action="" action="GET">
    <table class = "table pt-5 mt-3">
       <?php
        $unit;
        session_start();
        $blooddetails=mysqli_query($connection,"select id,unit from blood_details where bloodbank_id= '".$_SESSION['bloodbank']."'");
        $i=0;
        while($row=mysqli_fetch_assoc($blooddetails)){
        
            $unit[$i]=$row['unit'];
            $id[$i]=$row['id'];
            $i++;
        }
        ?>
        <tr>
            <th>Blood\Type</th>
            <th>Blood</th>
            <th>Plateletes</th>
            <th>Plasma</th>
            <th>RBC</th>

        </tr>
        <tr>
            <th>A+</th>
            <td><input type="text" name='0' value='<?php echo $unit[0];?>'/></td>
            <td><input type="text" name='1' value='<?php echo $unit[1];?>'></td>
            <td><input type="text" name='2' value='<?php echo $unit[2];?>'></td>
            <td><input type="text" name='3' value='<?php echo $unit[3];?>'></td>
        </tr>
        <tr>
             <th>A-</th>
            <td><input type="text" name='4' value='<?php echo $unit[4];?>'></td>
            <td><input type="text" name='5' value='<?php echo $unit[5];?>'></td>
            <td><input type="text" name='6' value='<?php echo $unit[6];?>'></td>
            <td><input type="text" name='7' value='<?php echo $unit[7];?>'></td>
        </tr>
        <tr>
             <th>B+</th>
            <td><input type="text" name='8' value='<?php echo $unit[8];?>'></td>
            <td><input type="text" name='9' value='<?php echo $unit[9];?>'></td>
            <td><input type="text" name='10' value='<?php echo $unit[10];?>'></td>
            <td><input type="text" name='11' value='<?php echo $unit[11];?>'></td>
        </tr>
        <tr>
             <th>B-</th>
            <td><input type="text" name='12' value='<?php echo $unit[12];?>'></td>
            <td><input type="text" name='13' value='<?php echo $unit[13];?>'></td>
            <td><input type="text" name='14' value='<?php echo $unit[14];?>'></td>
            <td><input type="text" name='15' value='<?php echo $unit[15];?>'></td>
        </tr>
                <tr>
            <th>O+</th>
            <td><input type="text" name='16' value='<?php echo $unit[16];?>'></td>
            <td><input type="text" name='17' value='<?php echo $unit[17];?>'></td>
            <td><input type="text" name='18' value='<?php echo $unit[18];?>'></td>
            <td><input type="text" name='19' value='<?php echo $unit[19];?>'></td>
        </tr>
        <tr>
             <th>O-</th>
            <td><input type="text" name='20' value='<?php echo $unit[20];?>'></td>
            <td><input type="text" name='21' value='<?php echo $unit[21];?>'></td>
            <td><input type="text" name='22' value='<?php echo $unit[22];?>'></td>
            <td><input type="text" name='23' value='<?php echo $unit[23];?>'></td>
        </tr>
        <tr>
             <th>AB+</th>
            <td><input type="text" name='24' value='<?php echo $unit[24];?>'></td>
            <td><input type="text" name='25' value='<?php echo $unit[25];?>'></td>
            <td><input type="text" name='26' value='<?php echo $unit[26];?>'></td>
            <td><input type="text" name='27' value='<?php echo $unit[27];?>'></td>
        </tr>
        <tr>
             <th>AB-</th>
            <td><input type="text" name='28' value='<?php echo $unit[28];?>'></td>
            <td><input type="text" name='29' value='<?php echo $unit[29];?>'></td>
            <td><input type="text" name='30' value='<?php echo $unit[30];?>'></td>
            <td><input type="text" name='31' value='<?php echo $unit[31];?>'></td>
        </tr>
    </table>
<!--div align="center" class="form-group col-md-10"-->
<input  type="submit" class="form-control" name="submit" aria-describedby="emailHelp"  required>
<!--</div>-->
</form>

<?php
    if(isset($_GET['submit'])){
        for($i=0;$i<32;$i++){
        $updatebd=mysqli_query($connection,"update blood_details set unit = ".$_GET[$i]." where id=".$id[$i]."");
    }
        if($updatebd){
        ?><script>location.replace("dashboard.php");</script><?php
        }
    }
    ?>
<? include "footer.php";?>
