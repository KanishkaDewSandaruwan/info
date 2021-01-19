<?php
  require_once 'connection.php'; //insert connection to page
  require_once 'admin.php'; //Check login 

?>
<!DOCTYPE html>
<html>
<head>
	<title>SEUSL</title>
	<link rel="stylesheet" type="text/css" href="css/boot.css"> <!--load boostrup styles -->
</head>
<body>
<div class="container mt-5">
	<form method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput" class="a ml-3">Attendance Date</label>
    <input type="text" class="form-control ml-3" id="formGroupExampleInput" name="date" placeholder="Attendance Date">
  </div>
  <div class="form-group col-md-10">
     <label for="formGroupExampleInput" class="a ml-3">Subject</label>
        <select id="inputState" name="subcode" class="form-control">
        	<option></option>
         <?php $q3 = "SELECT * FROM subject";
            $res3 = mysqli_query($con,$q3);
            $c=1;
            while($row=mysqli_fetch_assoc($res3)){
              echo "<option>".$row['sub_name']."</option>";
              $c++;
            } ?>
            	
            </select>
      </div>
  <button type="submit" name="submit" class="btn btn-danger">Create Report</button>
  <button type="button" onclick="window.location.href='dashboard.php'" class="btn btn-danger">Go to Dashboard</button>
</form>
</div>
	<?php 
		if(isset($_POST['submit'])){
			$date = $_REQUEST['date'];
			$subname = $_REQUEST['subcode'];

			$q4 = "SELECT * FROM subject where sub_name = '$subname'";
            $res4 = mysqli_query($con,$q4);
            $row = mysqli_fetch_assoc($res4);

			$subcode = $row['sub_code'];
			if(!empty($date)&&!empty($subname)){	
				header('location:attend_report.php?date='.$date.'&code='.$subcode.'');
			}else{
				echo '<script>alert("Enter Date to Get Report");</script>';
			}
		}
	 ?>
</body>
</html>