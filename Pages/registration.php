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
	$stmt = $connection->prepare("SELECT * FROM user WHERE email = ?"); 
        $stmt->execute([ $email]); 
	    $result = $stmt->fetch();
	if ($result) {
		echo "Error";
		$error=true;
	}


	
	
	
	if ( !$error ) {
		$sql = "INSERT INTO user (firstName, lastName, email, password) VALUES (?,?,?,?)";
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
  <title>USF-Registration</title>
    <meta charset="UTF-8">
    <meta name="description" content="Registration page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, register, information, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <?php 
      include "../components/header.html" 
      ?>
    </header>
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


<footer>
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
  </body>
</html>

