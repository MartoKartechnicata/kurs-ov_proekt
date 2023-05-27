<?php
try {
	$connection = new PDO("mysql:host=localhost;dbname=kp", "root");
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit'] ) ) {


	$fName = $_POST['firstName']; 
    $fName2 = $_POST['firstName2']; 
    if( !empty($fName) ){
	$lName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordC = $_POST['passwordC'];

	

	$error = false;


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
            header("Location: login.php");
		}
	}
	
	
	$fName = htmlspecialchars( $fName, ENT_QUOTES );
	$lName = htmlspecialchars( $lName, ENT_QUOTES );
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$password=htmlspecialchars($password, ENT_QUOTES);
    $passwordC=htmlspecialchars($passwordC, ENT_QUOTES);
} else if (empty($fName) && !empty($fName2)){
    $lName2 = $_POST['lastName'];
	$email2 = $_POST['email'];
	$password2 = $_POST['password'];
	$passwordC2 = $_POST['passwordC'];

	

	$error = false;


	if ( !$lName2 ) {
		echo "<center style='color:red;'>Please enter your last name</center>";
		$error = true;
	}
	
	
	if ( !$email2 ) {
		echo "<center style='color:red;'>Please enter your email</center>";
		$error = true;
	}

	if ( !$password2 ) {
		echo "<center style='color:red;'>Please enter a password</center>";
		$error = true;
	}

	if($passwordC2!=$password2){
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
            header("Location: login.php");
		}
	}
	
	
	$fName = htmlspecialchars( $fName, ENT_QUOTES );
	$lName = htmlspecialchars( $lName, ENT_QUOTES );
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$password=htmlspecialchars($password, ENT_QUOTES);
    $passwordC=htmlspecialchars($passwordC, ENT_QUOTES);
}
	else if (empty($fName) && empty($fName2)){
        echo "<center style='color:red;'>Please enter your last name</center>";
        if ( !$lName2 && !$lName) {
            echo "<center style='color:red;'>Please enter your last name</center>";
            $error = true;
        }
        
        
        if ( !$email2 && !$email) {
            echo "<center style='color:red;'>Please enter your email</center>";
            $error = true;
        }
    
        if ( !$password2 && !$password) {
            echo "<center style='color:red;'>Please enter a password</center>";
            $error = true;
        }
    
        if($passwordC2!=$password2 && $passwordC!=$password){
            echo "<center style='color:red;'>The passwords do not match</center>";
            $error=true;
        }
    }
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="d-lg-block d-none">
        <img src="../images/logo1-white.png" alt="usf-logo" class="logo-form">
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="d-lg-block d-none">
        <h1 class="slogan">We make the big fights happen</h1>
        </div>
</div>
</div>
</div>
<form method="post" class="registration-form" enctype="multipart/form-data">
<div class="container-fluid border-container-form form-color">
<div class="row register-form-heading">
<div class="d-md-block d-none">
    <h2 style="text-align:center">Sign Up</h2>
</div>
<div class="d-md-none d-block">
<h2 style="text-align:center; padding-top:5%;">SIGN UP FORM</h2>
<p class="about-account">Fill this sign up form to create your own USF account. Singing up for an USF account grants you the ability to book tickets for our events and gives you a more personalised experience on our website</p>
</div>
</div>
<div class="row form-rows first-row">
    <div class="col">
    <div class="d-md-block d-none">
        <div class="form-floating">
            <input type="text" class="form-control" id="fName" name="firstName" placeholder="First Name">
            <label for="fName">First name</label>
        </div>
    </div>
    <div class="d-md-none d-block">
    <label class="label-mobile" for="fName">First name: </label>
    <input type="text" class="form-control input-size" id="fName" name="firstName2" placeholder="First Name">
    </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
    <div class="d-md-block d-none">
        <div class="form-floating">
            <input type="text" class="form-control" id="lName" name="lastName" placeholder="Last Name">
            <label for="lName">Last name</label>
        </div>
    </div>
    <div class="d-md-none d-block">
    <label class="label-mobile" for="lName">Last name: </label>
    <input type="text" class="form-control input-size" id="lName" name="lastName2" placeholder="Last Name">
    </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
    <div class="d-md-block d-none">
      <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="email Address">
        <label for="email">Email address</label>
      </div>
    </div>
    <div class="d-md-none d-block">
    <label class="label-mobile" for="email">Email: </label>
    <input type="email" class="form-control input-size" id="email" name="email2" placeholder="Email Address">
    </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
    <div class="d-md-block d-none">
        <div class="form-floating">
            <input type="text" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
    </div>
    <div class="d-md-none d-block">
    <label class="label-mobile" for="password">Password: </label>
    <input type="text" class="form-control input-size" id="password" name="password2" placeholder="Password">
    </div>
    </div>
</div>
<div class="row last-row">
    <div class="col">
    <div class="d-md-block d-none">
        <div class="form-floating">
            <input type="text" class="form-control" id="passwordC" name="passwordC" placeholder="Confirm Password">
            <label for="passwordC">Confirm Password</label>
        </div>
    </div>
    <div class="d-md-none d-block"> 
    <label class="label-mobile" for="passwordC">Confirm Password: </label>
    <input type="text" class="form-control input-size" id="passwordC" name="passwordC2" placeholder="Confirm Password">
    </div>
    </div>
</div>
<div class="row" style="text-align:center; padding-bottom:2%;">
    <div class="col">
       <input class="btn btn-danger btn-danger-submit" type="submit" name="submit" value="Register">  
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

