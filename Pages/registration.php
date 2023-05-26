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
	<link rel="stylesheet" type="text/css" href="../Style.css">
 </head>
  <body>
    <header>
      <?php 
      include "../components/header.html" 
      ?>
    </header>
	<main class="form-background">
<div class="container-fluid text-center">
    <div class="row">
        <div class="col">
        <img src="../images/logo1-red.png" alt="usf-logo" style="height:75%">
        </div>
    </div>
    <div class="row">
        <div class="col">
        <h1 class="slogan">We make the big fights happen</h1>
</div>
</div>
</div>
<form method="post" enctype="multipart/form-data">
<div class="container-fluid border-container-form" style="background-color:gainsboro;">
<div class="row register-form-heading">
    <h2 style="text-align:center">Sign Up</h2>
</div>
<div class="row form-rows" style="padding-top:2%;">
    <div class="col">
        <div class="form-floating">
            <input type="text" class="form-control" id="fName" name="firstName">
            <label for="fName">First name</label>
        </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
        <div class="form-floating">
            <input type="text" class="form-control" id="lName" name="lastName">
            <label for="lName">Last name</label>
        </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInputGrid" name="email">
        <label for="floatingInputGrid">Email address</label>
      </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
        <div class="form-floating">
            <input type="text" class="form-control" id="password" name="password">
            <label for="password">Password</label>
        </div>
    </div>
</div>
<div class="row last-row">
    <div class="col">
        <div class="form-floating">
            <input type="text" class="form-control" id="passwordC" name="passwordC">
            <label for="passwordC">Confirm Password</label>
        </div>
    </div>
</div>
<div class="row" style="text-align:center; padding-bottom:2%;">
    <div class="col">
       <input class="btn btn-danger" type="submit" value="Register">  
    </div>
</div>  
</div>
</form>
</main>

   <footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>

  </body>
</html>

