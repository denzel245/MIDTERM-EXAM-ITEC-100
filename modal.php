<?php
$conn=mysqli_connect('localhost','root','','denzel');

session_start();




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	 .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0%;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.8); /* Black w/ opacity */

}


/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: RED;
  text-decoration: none;
  cursor: pointer;
}

  	/* Modal Header */
.modal-header {
  padding: 2px 16px;
  background-color: #999999;
  color: #ffffff;
}

/* Modal Body */
.modal-body {
	padding: 8%;
  color: white;
}
.modal-body input{
	padding: 5%;
}

/* Modal Footer */
.modal-footer{
    background-color: #999999;
  color: white;
}
.rs{

  width: 30%;
  height: 40px;
  cursor: pointer;
  border: none;
  outline: none;
  color: #ffffff;
  font-size: 16px;
  background: #333333;
  border-radius: 4px;
  border:2px solid gray;
  margin: 5% 5% 5%;
}
.csub{

  width: 30%;
  height: 40px;
  cursor: pointer;
  border: none;
  outline: none;
  color: #ffffff;
  font-size: 16px;
  background: #333333;
  border-radius: 4px;
  border:2px solid gray;
  margin-left: 23%;
}


.rs:hover, .csub:hover
{
       background: rgb(12,27,15);
       color: white;
       border:2px solid white;
}

/* Modal Content */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  border: 1px solid gray;
  box-shadow: 100px red;
  width: 30%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.6s;
  margin-top: 20%;
  border-radius: 5px;
  background: #000000;
}

/* Add Animation */
@keyframes animatetop {
  from {top: -300px; opacity: 0}
  to {top: 0; opacity: 1}
}

.modal-body input { 
  width: 95%; 
  margin-bottom: 10px; 
  background: rgba(130,130,100,0.3);
  border: none;
  outline: none;
  padding: 10px;
  font-size: 13px;
  color: white;
  border: 1px solid rgba(0,0,0,0.3);
  border-radius: 4px;
  box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
  margin-top: 10px;
  margin-left: 2%;

}



</style>
<body>

<?php


	if(isset($_POST['boton8'])){

		



    date_default_timezone_set('Asia/Taipei');
    $timeee = date("Y-m-d h:i:s");
    
    $insuc = "LOGIN SUCCESSFULLY";
    $usernamee = $_SESSION['users'];
    $queryy = mysqli_query($conn, "INSERT INTO event_log (ACTIVITY, user_id, date_time) VALUES ('$insuc', '$usernamee', '$timeee')");

		$codees = $_POST['codeess'];
		$get = "SELECT * FROM codee where CODE = '$codees'";
		$result = mysqli_query($conn, $get);
		$count = mysqli_num_rows($result);

		$getTime = "SELECT Expiration FROM codee where CODE = '$codees'";
		$resultTime = mysqli_query($conn,$getTime);
		$row = mysqli_fetch_assoc($resultTime);
		if($count>0){
			$timee = date("Y-m-d h:i:s");
			
			$mema = $row['Expiration'];

	



			$datetime1 = strtotime($timee);
			$datetime2 = strtotime($mema);

			$secs = $datetime1 - $datetime2;// == <seconds between the two times>
			$minutes = $secs / 60;









			
			if ($minutes>=0) {
				echo '<script>alert("Code Expired! And Click Resend Code")</script>';
			}
			else {
				
			
				echo '<script>alert("Log in successful!");
				window.location.replace("hello.php");</script>';

			}

				
		}











	}


	if(isset($_POST['boton9'])){

		

		$next = "SELECT * FROM codee ORDER BY ID DESC LIMIT 1";
		$find	=	mysqli_query($conn, $next);
		$anotherOne = mysqli_fetch_assoc($find);
		$eyy = $anotherOne['userID'];

		$coode = rand(100000,999999);
				
			
            
           	 	$timeea = date("Y-m-d h:i:s");

                $dateTodaay = strtotime($timeea);
                $incomingDatee = $dateTodaay+(60*5);
                $formatDatee = date("Y-m-d H:i:s", $incomingDatee);

                //insert data inside the next table
          		$codes = "INSERT INTO codee (userID,CODE,Created,Expiration)  SELECT '$eyy','$coode','$timeea','$formatDatee'";
           		$result1 = mysqli_query($conn, $codes);
				
			
				echo '<script>alert ("Use this code to for authentication: '.$coode.'");
				window.location.replace("modal.php");</script>';

			
					
			














	}

	




?>


































 <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Authentication</h2>
      </div>
      <form action="modal.php" method="post">
        <div class="modal-body">
          <table>
            <tr>
              <td>Authentication Code: </td>
              <td><input type="text" name="codeess" placeholder="Enter Authentication Code"></td>
            </tr>
          </table>
          
        </div>
        <div class="modal-footer">
          <button type="submit" name="boton9" id="boton9" class="rs">Resend Code</button>
          <button type="submit" name="boton8" id="boton8" class="csub">Submit Code</button>
          
        </div>
      </form>

    </div>

</div>






<script type="text/javascript">
 // Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
// When the user clicks on <span> (x), close the modal

//var button = document.getElementById("sub");


span.onclick = function() {
  window.location.replace("Act.php");
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    window.location.replace("Act.php");
  }
}

</script>

<?php
		echo '<script >
						 modal.style.display = "block";
			</script>';


		
?>   




































</body>
</html>