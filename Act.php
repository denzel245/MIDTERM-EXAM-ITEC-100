<!DOCTYPE html>

<?php

$conn=mysqli_connect('localhost','root','','denzel');
session_start();

?>











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
	

<form action="" method="post">
<div class="login1">
    <label for="uname"><b>Username:</b></label><br>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br><br>
    <label for="password"><b>Password:</b></label><br>
    <input type="password" placeholder="Enter Password" name="pass" id="myInput1" required><br>
    <input type="checkbox" onclick="myFunction1()">Show Password<br><br>
    <br>
    <a href="forgetpass.php" style="color: black;">Forget Password</a>

    <?php
	if(isset($_POST['boton'])){
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];

		


		$get = "SELECT id FROM regform WHERE usernamee = '$uname'";
		$get1 = "SELECT id FROM regform WHERE paswordd = '$pass'";
		$result = mysqli_query($conn, $get);
		$result1 = mysqli_query($conn, $get1);
		$count = mysqli_num_rows($result);
		$count1 = mysqli_num_rows($result1);

		date_default_timezone_set('Asia/Taipei');
		$timeee = date("Y-m-d h:i:s");
		$_POST['uname'] = $uname;
		$in = "LOGIN";
		$queryy = mysqli_query($conn, "INSERT INTO event_log (ACTIVITY, user_id, date_time) VALUES ('$in', '$uname', '$timeee')");
		$_SESSION['users'] = $uname;



		if($count == 1 && $count1 == 1){
				$code = rand(100000,999999);
				
				$uname = $_POST['uname'];
				$unamequery = "SELECT id from regform where usernamee = '$uname'";
            	$result = mysqli_query($conn, $unamequery);
            
           	 	$timee = date("Y-m-d h:i:s");

                $dateToday = strtotime($timee);
                $incomingDate = $dateToday+(60*5);
                $formatDate = date("Y-m-d H:i:s", $incomingDate);

                //insert data inside the nest table
          		$codes = "INSERT INTO codee (userID,CODE,Created,Expiration)  SELECT id,'$code','$timee','$formatDate' FROM regform  where usernamee = '$uname' ";
           		$result1 = mysqli_query($conn, $codes);
				
			
				echo '<script>alert ("Use this code to for authentication: '.$code.'");
				window.location.replace("modal.php");</script>';

			
					
			}

	


			
			

			else if($count !=1 && $count1 !=1){
			echo '<script>alert("user does not exist!!")</script>';

		}

			else if($count !=1){
				echo "wrong username";

			}
			else if ($count1 !=1) {
			echo "wrong password";
			
		}
		
			

		else{
			echo "";
		}

		
		
		
		}
	

?>








    <br><br>    
    <button class = "button"type="submit" name="boton">Log In</button>
    <button class = "button button2"type="signup" name="boton1" onclick="document.location='signup.php'">Sign Up</button>

  </div>  
   <div class = "logo">
  	<img src="cat.gif" alt="cat" style="width: 100px; height: 100px;border-radius: 50%;">




<?php

$id = "";
$usernamee = "";
$passwordd = "";
$emaill = "";




if($conn)
	{
		echo "Connected";

	}
	else{
		echo "not";
	}




?>









  	
  </div> 
</form>	 
</center>
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


















</body>
</html>