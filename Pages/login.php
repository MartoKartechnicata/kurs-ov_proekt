<?php
$sname= "localhost";
$unmae= "root";
$db_name = "kp";

$connection = new PDO("mysql:host=$sname;dbname=$db_name", $unmae);



if (!$connection) {

    echo "Connection failed!";

}

session_start(); 

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);


    $error = false;

    if ( empty( $email ) ) {

        $error = true;
        echo "Please, type email<br>";
    }

    if ( empty( $pass ) ) {

        $error = true;
        echo "Please, type pass<br>";
    }

    if ( !$error ) {

        $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?"); 
        $stmt->execute([ $email]); 
	    $result = $stmt->fetch();

        if (password_verify($pass, $result['password']) ) {

            $row = ($result);

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['firstName'] = $row['firstName'];

                $_SESSION['lastName'] = $row['lastName'];

                header("Location: homepage.php");

                exit();

        }
        else{
            echo "Error";
        }

    }
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$pass=htmlspecialchars($password, ENT_QUOTES);
}




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	  
  </head>
  <body>
		<form method="post" enctype="multipart/form-data">
		<h1> Login </h1>
		<br>
		<label class="form-label" >Email:</label>
		<input type="text" name="email" class="form-control">
		<br>

		<label class="form-label" >Password:</label>
		<input name="password" class="form-control" >
		<br>
		<button name="submit" class="btn btn-primary w-100" type="submit" value="submit" >Submit</button>
 </form>		
</body>
</html>