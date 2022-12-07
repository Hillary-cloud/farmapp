<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "register";
// Create connection
$conn = new mysqli($servername,$username, $password,$dbname);
if ($conn->connect_error) {
    echo "Database not found !!!";
}
//			$conn = mysql_connect($servername, $username, $password);
//			mysql_select_db($dbname, $conn);
			if (isset($_GET['CompanyName'])) {
                $username = str_replace("'", "''", $_GET['CompanyName']);
                $query = "SELECT * FROM products WHERE 'CompanyName' = '$username'";
                $resultt = $conn->query($query);
                if ($resultt->num_rows > 0) {
                    while ($row = $resultt->fetch_assoc()) {
                        $imageData = $row["image"];
                    }
                    header("content-type: image/jpeg");
                    echo $imageData;
                } else {

                    echo "Error!";
                }

            }

?>