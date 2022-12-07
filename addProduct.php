<?php
	
	ini_set('mysql.connect_timeout', 300);
	ini_set('default_socket_timeout', 300);

	include_once "resource/session.php";

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "register";
            // Create connection
            $conn = new mysqli($servername,$username, $password,$dbname);
			//$conn = mysql_connect($servername, $username, $password);
		//	mysql_select_db($dbname, $conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
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

<body style = "padding-top: 40px;">
   
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>Farm Link</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"style = "font-weight: bold;">
                <ul class="nav navbar-nav">
                    
					<li>
                        <a href="FarmerProfile.php?username=<?php if(isset($_SESSION['CompanyName'])) echo $_SESSION['CompanyName'] ; ?>">View Profile</a>
                    </li>
					
					<li>
						<a href = "logout.php">Logout</a>
                    </li>
					
                </ul>
            </div>
        </div>
    </nav>
	</br>
	   <div class="container">
	<header class="jumbotron hero-spacer"style= "background: url(assets/img/background.jpg); margin-top: 0px; background-size: cover; height: 200px;">
     <h1 align ="center" style= "color:white;"><strong> <?php if(isset($_SESSION['CompanyName'])) echo $_SESSION['CompanyName'] ; ?></strong></h1>
	 </header>  
	<form method = "post" action ="" enctype = "multipart/form-data" style = "width:50%; margin: auto;">
		<br/>
		<h1>Add Product</h1>
<?php 
	if(isset($_POST['AddProduct'])){
		$file = $_FILES['image']['name'];
	$CompanyName = $_POST['CompanyName'];
	$Phone = $_POST['Phone'];
	$price = $_POST['Price'];
	$Category = $_POST['Category'];
	$Description = $_POST['Description'];
	$select = $_POST['select_category'];
	$select = $_POST['select_category'];
		
	$sql = "INSERT INTO products (CompanyName, Category, type_product, Description, Phone, Price, image)
	VALUES ('$CompanyName', '$Category', '$select', '$Description', '$Phone', '$price', '$file')";
	$result = mysqli_query($conn,$sql);
		if ($result) {
			move_uploaded_file($_FILES['image']['tmp_name'], "$file"); 
			header("FarmerProfile.php"); ?>
			<script type="text/javascript">
            alert("Product added Successful");
            window.location.href = "FarmerProfile.php";
        </script>
			<?php 
	}
		else{ ?>
			<h5 class="text-danger">Product could not be added successfully.</h5>
	<?php	}				
}
?>

		<div class="form-group ">
		   <input type="text" class="form-control" value="<?php echo $_SESSION['CompanyName'] ; ?>" placeholder="Company Name " minlength="8"  id="username" name ="CompanyName" readonly required>
		   <i class="fa fa-user"></i>
		 </div>
		<div class="form-group ">
		   <input type="text" class="form-control" name ="Phone" placeholder="Phone Number" minlength="11"  id="Phone" required>
		   <i class="fa fa-user"></i>
		 </div>
			 <div class="form-group ">
				<select class="form-control" name = "select_category" style = "width: 100%;" required>
					<option>Select product category here</option>
					<option>Livestock</option>
					<option>Fruits</option>
					<option>Vegetables</option>
					<option>Poultry</option>
					<option>Frozen foods</option>
					<option>Tuber & Roots</option>
					<option>Grain</option>
					<option>Fish</option>
					<option>Grains</option>
					<option>Others</option>
			</select>
		   <p style = "color:blue;">Products with specified category have more customers</p>
		   <i class="fa fa-user"></i>
		 </div>
		
		<div class="form-group ">
		   <input type="text" class="form-control" minlength="4" placeholder="Kind of Product e.g Rice, yam, palm oil e.t.c" id="category" name ="Category" required>
		   <i class="fa fa-user"></i>
		 </div>
		  <div class="form-group ">
		   <input type="number" class="form-control" minlength="6"  placeholder="Enter Price of Product" id="price" name ="Price" required>
		   <i class="fa fa-user"></i>
		 </div>
		 
		<div class="form-group ">
		   <textarea class="form-control" placeholder="Description " minlength="20" maxlength = "120" id="description" name ="Description" style="width:100%;height:150px;" required></textarea>
		   <i class="fa fa-user"></i>
		 </div>
		<div class="form-group ">
<!--			<form method = "post" enctype = "multipart/form-data" style = "width:50%; margin: auto;">-->
		<hr>
		
		Upload Picture:
		</br>
		<input type = "file" name = "image" required/>
		<br/><br/>
		  <i class="fa fa-user"></i>
		 </div>
		 <p>
           <button name = "AddProduct" type="submit" class="btn btn-primary" style ="float: right;">Add Product</button> 
        </p>
	</form>
	
		<div style = "padding: 1em 0 2em 0;">
	
				
</div>

	

	</div>
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
            <p align = "center">Developed by SpringLight Technology</p>
								
		</footer>
	
	
	
</body>
</html>	