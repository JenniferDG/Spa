
	<?php

	include 'conn.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Conexion fallida: " . mysqli_connect_error());
	}
	

	$checkEmail = "SELECT * FROM users WHERE Email = '$_POST[email]' ";

	$result = $conn-> query($checkEmail);

	$count = mysqli_num_rows($result);

	if ($count == 1) {
		header('Location: index.php');	
	} else {	
	

	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	


	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	
	$query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$passHash')";

	if (mysqli_query($conn, $query)) {
		header('Location: login.php');	
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}

	mysqli_close($conn);
	?>
