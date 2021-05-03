<!DOCTYPE html>
<?php

$conn=mysqli_connect('localhost','root','','denzel');

session_start();

?>
<html>
<head>
	<title></title>
</head>



<style>
	body{
			/*background-image: url("bg.jpg");
			background-repeat: no-repeat;*/
			background-color: black;

		}
	p{
			font-family: Times New Roman;
			color: turquoise;
			font-size: 100px;
			position: absolute;
			left: 200px;

		}
	button{
			background-color:  #8533ff;
			font-family: Times New Roman;
			font-size: 15px;
			border: none;
			cursor: pointer;
			color: white;
			width: 75px;
			height: 35px;
			border-radius: 4px;
			position: absolute;
			left: 680px;
			bottom: 300px;
	}



</style>







<body>
<form method="POST">
<center>
<img src="helo.gif" alt="helo" style="width: 1000px; height: 600px;border-radius: 8px;">
</center>

<button class = "button"type="logout" name="boton4" onclick="myFunction()">Log Out</button>
</form>
<script>
function myFunction() {
  location.replace("Act.php")
}
</script>

<?php
	if (isset($_POST['boton4'])) {
		
		date_default_timezone_set('Asia/Taipei');
		$timeee = date("Y-m-d h:i:s");
		$_SESSION['uname'] = $uname;
		$out = "LOGOUT";
		$usernamee = $_SESSION['users'];
   	$queryy = mysqli_query($conn, "INSERT INTO event_log (ACTIVITY, user_id, date_time) VALUES ('$out', '$usernamee', '$timeee')");
		
		echo '<script>alert("ACCOUNT LOGOUT!!!")</script>';
		header("location: Act.php");


	}





?>







</body>
</html>