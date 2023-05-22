<?php
try {
	$connection = new PDO("mysql:host=localhost;dbname=kp", "root");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit'] ) ) {


	$fName = $_POST['firstName'];
	$lName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordC = $_POST['passwordC'];

	

	$error = false;
	
	
	if ( !$fName ) {
		echo "<center style='color:red;'>Please enter your first name </center>";
		$error = true;
	}


	if ( !$lName ) {
		echo "<center style='color:red;'>Please enter your last name</center>";
		$error = true;
	}
	
	
	if ( !$email ) {
		echo "<center style='color:red;'>Please enter your email</center>";
		$error = true;
	}

	if ( !$password ) {
		echo "<center style='color:red;'>Please enter a password</center>";
		$error = true;
	}

	if($passwordC!=$password){
		echo "<center style='color:red;'>The passwords do not match</center>";
		$error=true;
	}
	$stmt = $connection->prepare("SELECT * FROM users WHERE email = ?"); 
        $stmt->execute([ $email]); 
	    $result = $stmt->fetch();
	if ($result) {
		echo "Error";
		$error=true;
	}


	
	
	
	if ( !$error ) {
		$sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?,?,?,?)";
		$result = $connection->prepare($sql)->execute([$fName, $lName, $email, password_hash($password, PASSWORD_DEFAULT)]);
		
		
		if ( $result ) {
			echo "<center style='color:white; background-color: blue'>Registration has been successful</center>";
		}
	}
	
	
	$fName = htmlspecialchars( $fName, ENT_QUOTES );
	$lName = htmlspecialchars( $lName, ENT_QUOTES );
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$password=htmlspecialchars($password, ENT_QUOTES);
	
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	  
  </head>
  <body>

				<form method="post" enctype="multipart/form-data">
					<h1> Registration form</h1>
					<br>
					<label class="form-label">First Name:</label>
					<input type="text" name="firstName" class="form-control">
					<br>

					<label class="form-label">Last Name:</label>
					<input name="lastName" class="form-control">
					<br>

					<label class="form-label">Email:</label>
					<input name="email" class="form-control">
					<br>

					<label class="form-label">Password:</label>
					<input type="text" name="password" class="form-control">
					<br>

					<label class="form-label">Confirm Password:</label>
					<input type="text" name="passwordC" class="form-control">
					<br>

					
					<br><br>
					<h3>Already have an account? <a href="login.php">Login</a><h3>
					<button name="submit" class="btn btn-primary w-100" type="submit" value="submit" >Submit</button>
				</form>
  </body>
</html>

