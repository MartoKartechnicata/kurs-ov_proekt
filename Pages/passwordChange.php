<?php
$sname= "localhost";
$unmae= "root";
$db_name = "kp";

$connection = new PDO("mysql:host=$sname;dbname=$db_name", $unmae);



if (!$connection) {

    echo "Connection failed!";

}

session_start(); 

if (isset($_POST['passwordO']) && isset($_POST['passwordN']) && isset($_POST['passwordNC'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $OP = validate($_POST['passwordO']);
    $NP = validate($_POST['passwordN']);
    $CNP = validate($_POST['passwordNC']);


    $error = false;

    if ( empty( $OP ) ) {

        $error = true;
        echo "Please, type your old password<br>";
    }

    if ( empty( $NP ) ) {

        $error = true;
        echo "Please, type a new password<br>";
    }

    if($CNP!=$NP){
		echo "<center style='color:red;'>The passwords do not match</center>";
		$error=true;
	}

    if ( !$error ) {

        $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?"); 
        $stmt->execute([$_SESSION['email']]); 
	    $result = $stmt->fetch();

        if (password_verify($OP, $result['password']) ) {

            $row = ($result);
            $stmt = $connection->prepare("UPDATE `user` SET `password` = ? WHERE (`id` = ?)"); 
            $stmt->execute([password_hash($NP, PASSWORD_DEFAULT), $row['id']]); 
            echo "Password changed";
            header("location: profile.php");

        }
        else{
            echo "Error";
        }

    }
	$OP = htmlspecialchars( $OP, ENT_QUOTES );
	$NP=htmlspecialchars($NP, ENT_QUOTES);
}




?>


<!doctype html>
  <head>
  <title>USF-Change Password</title>
    <meta charset="UTF-8">
    <meta name="description" content="Log in page of the USF - UKTC STUDENT FIGHTS">
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
<form method="post" class="login-form" enctype="multipart/form-data">
<div class="container-fluid border-container-form form-color">
<div class="row register-form-heading">
<div class="d-md-block d-none">
    <h2 style="text-align:center">Change password</h2>
</div>
<div class="d-md-none d-block">
    <h1 style="text-align:center;padding-top:2%">Change password</h1>
</div>
</div>
<div class="row form-rows"  style="padding-top:2%;">
    <div class="col">
      <div class="form-floating">
        <input type="password" class="form-control" id="passwordO" name="passwordO" placeholder="Old Password">
        <label for="passwordO">Old Password</label>
      </div>
    </div>
</div>
<div class="row form-rows">
    <div class="col">
      <div class="form-floating">
        <input type="password" class="form-control" id="passwordN" name="passwordN" placeholder="New Password">
        <label for="passwordN">New Password</label>
      </div>
    </div>
</div>
<div class="row last-row">
    <div class="col">
        <div class="form-floating">
            <input type="password" class="form-control" id="passwordNC" name="passwordNC" placeholder="New Password">
            <label for="passwordNC">Confirm New Password:</label>
        </div>
    </div>
</div>
<div class="row" style="text-align:center; padding-bottom:2%;">
    <div class="col">
       <input class="btn btn-danger btn-danger-submit" type="submit" name="submit" value="Change password">  
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