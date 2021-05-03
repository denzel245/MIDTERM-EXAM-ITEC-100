<?php

$conn=mysqli_connect('localhost','root','','denzel');


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
			bottom: 225px;
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
	

<form action = "" method="post">
<div class="login1">
    <label for="uname"><b>New Password:</b></label><br>
    <input type="password" placeholder="Enter New Password" name="pass1" id="myInput2" required><br>
    <input type="checkbox" onclick="myFunction2()">Show Password
    <br><br>
    <label for="password"><b>Confirm Password:</b></label><br>
    <input type="password" placeholder="Enter Password" name="pass" id="myInput1" required><br>
    <input type="checkbox" onclick="myFunction1()">Show Password<br><br>
    <br>
    
   






  	
    <button class = "button"type="submit" name="buton3">Confirm</button>
    <button class = "button button2"type="signup" name="boton1" onclick="document.location='Act.php'">Cancel</button>

  </div>  
   <div class = "logo">
  	<img src="cat.gif" alt="cat" style="width: 100px; height: 100px;border-radius: 50%;">









  	
  </div> 
</form>	 
</center>





<?php
	if (isset($_POST['buton3'])){
		
		$newpass = $_POST['pass'];
		$passs = $_POST['pass1'];	

		
		if($passs == $newpass){
			$username = $_SESSION['userr'];
			$update = mysqli_query($conn, "UPDATE regform SET paswordd = '$passs' WHERE usernamee = '$username'");


			
			date_default_timezone_set('Asia/Taipei');
			$timeee = date("Y-m-d h:i:s");
			$reset = "CHANGE PASSWORD";

			
   		$queryy = mysqli_query($conn, "INSERT INTO event_log (ACTIVITY, user_id, date_time) VALUES ('$reset', '$username', '$timeee')");
   			echo '<script>alert("CHANGE PASSWORD!")</script>';
   			header("location: hello.php");
		}
			else{
				echo '<script>alert("Password not match!")</script>';
			}
		
		

	}



?>

































































<script>
function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


















</body>
</html>