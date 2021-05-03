<?php

$conn=mysqli_connect('localhost','root','','denzel');

?>

<?php
session_start();


?>
<!DOCTYPE html>



<html>
<head>
	

	<style>
		body{
			background-image: url("bg.jpg");
			background-repeat: no-repeat;
		}

		.button { 
			background-color: #1a1a1a;
			font-family: Times New Roman;
			font-size: 15px;
			border: none;
			cursor: pointer;
			color: white;
			width: 75px;
			height: 35px;
			border-radius: 4px;
		}
		.button2{
			background-color: #404040;
		}

		button:hover {
 		 opacity: 0.8;
		}

		label {
			font-family: Times New Roman;
			color: #262626;
			font-size: 20px;
		}

		input[type=text], input[type=password]{
			width: 200px;
			height: 30px;
		}

		.login1{
			padding: 50px;
			width: 250px;
			background-color: #737373;
			position: absolute;
			left: 550px;
			top: 220px;
		}

		.logo{
			position: absolute;
			left: 675px;
			bottom: 530px;
			

		}






		

	</style>
</head>

<body>



<center>
	

<form method="post">
<div class="login1">
	<label><b>Enter Username:</b></label><br>
    <input type="text" placeholder="Enter USERNAME" name="user" required>
	<br><br>
    <label><b>Enter Email:</b></label><br>
    <input type="text" placeholder="Enter Email Address" name="mail" required>
	<br><br>
    <button class = "button"type="submit" name="buton1">Confirm</button>
    <button class = "button button2"type="signup" name="buton2" onclick="document.location='Act.php'">Cancel</button>

  </div>  
   <div class = "logo">
  	<img src="cat.gif" alt="cat" style="width: 100px; height: 100px;border-radius: 50%;">







  	
  </div> 
</form>	 
</center>

<?php
	if (isset($_POST['buton1'])){
		$username = $_POST['user'];
		$userque = "SELECT id FROM regform WHERE usernamee = '$username'";
		$result = mysqli_query($conn, $userque);
		$num1 = mysqli_num_rows($result);
		$email = $_POST['mail'];
		$emailque = "SELECT id FROM regform WHERE emaill = '$email'";
		$result1 = mysqli_query($conn, $emailque);
		$num2 = 	mysqli_num_rows($result1);
		

		if ($num1 == 1 && $num2 == 1){

			date_default_timezone_set('Asia/Taipei');
			$timeee = date("Y-m-d h:i:s");
			$forget = "FORGOT PASSWORD";
   			$queryy = mysqli_query($conn, "INSERT INTO event_log (ACTIVITY, user_id, date_time) VALUES ('$forget', '$username', '$timeee')");
   			$_SESSION['userr'] = $username;
   			echo '<script>alert("Account Verified!")</script>';
   			header("location: resetpass.php");
		
			
		}
		else if ($num1 !=1 && $num2 == 1){
			echo '<script>alert("INCORRECT USERNAME!!")</script>';
		
		}
		else if ($num1 ==1 && $num2 != 1){
			echo '<script>alert("INCORRECT EMAIL!!")</script>';
		
		}
		else{
			echo '<script>alert("ACCOUNT does not EXIST!!")</script>';
		
		}

		

	}



?>



















</body>
</html>