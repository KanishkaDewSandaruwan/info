<?php
	require_once 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
form.reg_form{
	margin-top: 3%;
	text-align: center;
	margin-left:30%;
	/*margin-top: 50px;*/
	background-color: white;
	width: 30%;
	height: 100%;
	border: 1px solid black;
	padding: 2%;
	padding-top: 0px;
}
form img{
	width: 150px;
	height: 150px;
}
form h2{
	color: red;
	font-size: 30px;
}
label.reg_label{
	color: black;
	font-size: 2vw;

}
button.reg_but{
	width: 80%;
	margin-top: 2%;
	height: 60px;
	background-color: black;
	color: white;
	font-size: 1.5vw;
	text-align: center;
	cursor: pointer;

}
input.reg_box{
	width: 80%;
	height: 30px;
	margin-top: 2%;
}	
#sign_in{
	text-transform: uppercase;
	font-size: 2vw;	
}

</style>
</head>
<body>

<form class="reg_form" action="register.php" method="POST">
	<h2 id="sign_in">Register</h2>
	<img src="img/login.png" class="img"><br><br>

	<label class="reg_label"> Registration Number</label><br>
	<input class="reg_box" type="text" id="uname_reg" name="regnum"><br><br><br>

	<button class="reg_but" type="submit" name="submit"><b>Go Next</b></button><br><br>
	<button class="reg_but" type="button" onclick="window.location.href='login.php'"><b>Back</b></button><br><br>


	<?php
	if(isset($_POST['submit'])){
		$username=stripslashes($_REQUEST['regnum']);

		$registersql="SELECT * from student_reg where reg_number='$username'";
		$result=mysqli_query($con,$registersql);

		$registersql1="SELECT * from std_pass where reg_number='$username'";
		$result1=mysqli_query($con,$registersql1);
		$row2 = mysqli_fetch_assoc($result1);

		if($row = mysqli_num_rows($result)>0){
			$pass = $row2['password'];

			if(empty($pass)){
				header('location:password.php?reg='.$username.'');
			}else{
				echo '<script>alert("You Alrady Registerd");
					window.location.href="login.php";
					</script>';
			}

		}else{
			echo '<script>alert("Registration Number is Wrong or Your Not Register Yet"); </script>';
		}
	}
?>

</form>

</body>
</html>