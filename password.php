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
	font-size: 30px;

}
button.reg_but{
	width: 80%;
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
}	
#sign_in{
	text-transform: uppercase;
}

</style>
</head>
<body>
<?php

	$regs = $_REQUEST['reg'];


	echo '<form class="reg_form" action="password.php?reg='.$regs.'" method="POST">
		<h2 id="sign_in">Create Password</h2>
		<img src="img/login.png" class="img"><br><br>

		<label class="reg_label"><b>Password</b></label><br>
		<input class="reg_box" type="password" name="pass"><br><br>

		<label class="reg_label" ><b>Confirm Password</b></label><br><br>
		<input class="reg_box" type="password" id="pass_reg" name="conf_pass"><br><br>

		<button class="reg_but" type="submit" name="submit"><b>Register</b></button><br><br>
		<button class="reg_but" type="button" onclick="window.location.href=\'login.php\'"><b>Login</b></button><br><br>';

	if(isset($_POST['submit'])){
		

		$pass=stripslashes($_REQUEST['pass']);
		$conf_pass=stripslashes($_REQUEST['conf_pass']);

		

			if(!empty($pass)){
				if(!empty($conf_pass)){
					if($pass==$conf_pass){

						$passave = md5($pass);

						$qu = "INSERT INTO std_pass(reg_number,password) values('$regs','$passave')";
						$res = mysqli_query($con,$qu);
						 if($res){
						 	echo '<script>alert("Registration Successfuly");
						 			window.location.href="login.php";
						 	 </script>';
						 }else{
						 	echo "Sever Error";
						 }

					}else{ echo "Password is Not Match";}
				}else{ echo "Please confirm Password";}
			}else{ echo "Please Enter Password";}
}
?>
</form>

</body>
</html>