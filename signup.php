<!DOCTYPE html>
<?php

$conn=mysqli_connect('localhost','root','','denzel');

?>

	


<html>
<head>
	<title></title>
</head>
<style>
		body{
			background-image: url("bg.jpg");
			background-repeat: no-repeat; 
			
		}

		button { 
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
			width: 200px;
			height: 35px;
		}
		
		button:hover {
 		 opacity: 0.8;
		}

		label {
			font-family: Times New Roman;
			color: #262626;
			font-size: 15px;
		}

		input[type=text], input[type=password]{
			width: 200px;
			height: 30px;

		}

		.login1{
			padding: 50px;
			width: 500px;
			background-color: #737373;
			position: absolute;
			left: 425px;
			bottom: 120px;
			text-align: left;
		}

		.logo{
			position: absolute;
			left: 675px;
			bottom: 630px;
			

		}

		.logo2{
			position: absolute;
			left: 800px;
			bottom: 350px;
			

		}

	</style>
	<body>

<center>
	

<form action="" method="post">








<div class="login1">
    <label for="uname">Username:</label><br>
  <input type="text" placeholder ="Enter Username" name="uname" required><br><br>
  <label for="password">Password:</label><br>
  <input type="password" placeholder ="Enter Password" name="pass" id="myInput1" required><br><br>
  <input type="checkbox" onclick="myFunction1()">Show Password<br><br>
  <label for="password">Confirm Password:</label><br>
  <input type="password" placeholder ="Re-enter Password" name="pass1" id="myInput" required><br><br> 
  <input type="checkbox" onclick="myFunction()">Show Password<br><br>
  <label for="emailadd">Email:  </label><br>
  <input type="text" placeholder ="Enter email" name="email" required><br><br>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
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












<br>	

<?php
	if(isset($_POST['boton2'])){


		$unamee = $_POST['uname'];
		$pass1 = $_POST['pass'];
		$pass2 = $_POST['pass1'];
		$email = $_POST['email'];


		$get = "select * from regform where usernamee = '$unamee'";
		$get1 = "select * from regform where paswordd = '$pass1'";
		$result = mysqli_query($conn, $get);
		$count = mysqli_num_rows($result);
		





		$upcase = preg_match("/[A-Z]/", $pass1);
		$lowcase = preg_match("/[a-z]/", $pass1);
		$num = preg_match("/[0-9]/", $pass1);
		$specialChars = preg_match("/[^\w]/", $pass1);

		if(!$upcase || !$lowcase || !$num || !$specialChars) {
			echo "Password must contain atleast 8 characters and should contain upper and lower case alphabet, numbers and special characters!!";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Please enter a valid  email address!";
		
	}

		else if ($pass1!=$pass2) {
			echo "Password not match!";
		}


		



			

			else if($count ==1){
				echo "username already exist";

			}
			
		
		


















		else{
				
		$conn=mysqli_connect('localhost','root','','denzel');	
	$insert_Query = "INSERT INTO regform(usernamee, paswordd,emaill) VALUES ('$unamee','$pass2','$email')";

		if(mysqli_query($conn,$insert_Query)){
	echo "Success! You may now Log In! Just press button beside Sign In";

}
else{
	echo "fail";
}
}

	}
?>

<br><br>
  <button class = "button"type="signin" name="boton2">Sign In</button>
   <button class = "button button2"type="login" name="boton3" onclick="document.location='Act.php'">Go Back to Log In</button>

  </div>  
   <div class = "logo">
  	<img src="cat.gif" alt="cat" style="width: 100px; height: 100px;border-radius: 50%;">
  </div>
  <div class = "logo2">
	<img src="neko1.gif" alt="neko1" style="width: 200px; height: 200px;border-radius: 4px;"><br><br>
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
  	
  </div> 
</form>	 




</center>
 
  







</body>
</html>