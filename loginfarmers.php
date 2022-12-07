<?php
	include_once "resource/session.php";
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "register";
// Create connection
$conn = new mysqli($servername,$username, $password,$dbname);
if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
}
				// Create connection
//				$conn = new mysqli($servername, $username, $password, $dbname);
//				// Check connection
//				if ($conn->connect_error) {
//					die("Connection failed: " . $conn->connect_error);
//				}
				
		
?>

<!DOCTYPE html>
<html >

  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farm Link: Buy and Sell Raw Product Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">  
</head>
<body>
 <div class="login-form" style = "margin-top: 75px;">
  <div class = "thumbnail" style="width: 50%; margin:auto;">
     <form method = "POST" style = "width:80%; margin: auto;">
	    <h1>Farmer's Sign In</h1>
			<?php
			if(isset($_POST["loginFarmer"])){
				$CompanyName = str_replace("'", "''", $_POST["CompanyName"]);
				$password = str_replace("'", "''", $_POST["pass"]);
				//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				
				
				$sel_user = "SELECT * FROM farmers WHERE CompanyName = '$CompanyName' AND Password = '$password'";
                $resultt = $conn->query($sel_user);
                if ($resultt->num_rows > 0) {
					$_SESSION['CompanyName'] = $CompanyName;
					
					echo "<script>window.open('FarmerProfile.php', '_self')</script>";
				}
				else{
				$result = "<p style='padding: 20px; color: red; line-height: 1.5;'>invalid password or username</p>";
				echo $result;
				}
				
			}
			

			?>
			 <div class="form-group">
			   <input type="text" class="form-control"  id="UserName" name ="CompanyName" placeholder="Username" value = ""  >
			   <i class="fa fa-user"></i>
			 </div>
			 <div class="form-group log-status">
			   <input type="password" class="form-control" placeholder="Password" id="Passwod" name = "pass">
			   <i class="fa fa-lock"></i>
			 </div>
			<a class="link" style = "float: left;padding-left: 20px;"href="register.php">Register Here</a><a class="link" style = "float: right; padding-right: 20px;"href="forgot_passfarmer.php">Lost your password?</a></br>
			  </br>
			  <div align = "center">
			 <button style =" width: 45%;" name = "loginFarmer" type="submit" class="btn btn-primary" ><strong>SIGN IN</strong></button>
			</br>
			 </br>
			</div>
			</form>
		   </div>
		   </div>
   
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
		<div style = "padding: 1em 0 2em 0;">
	
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
            <p align = "center">Developed by SpringLight Technology</p>
								
		</footer>
				
</body>
</html>