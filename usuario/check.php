<?php
	
      
       
			include '../conn.php';	
			
			//Variables de conexion
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		
			if (!$conn) {
				die("Conexion fallida " . mysqli_connect_error());
			}
			
			// datos de login.php 
			$email = $_POST['email']; 
			$password = $_POST['password'];
			
			// Query db
			$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
			

			$row = mysqli_fetch_assoc($result);
	
			$hash = $row['Password'];
			
		
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['usuario'] = $row['Name'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'];	
			
			} 
      
        ?>