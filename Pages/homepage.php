<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "kp";

try {
	$connection = mysqli_connect($servername, $username, $password,$database,);
	// echo "Connected successfully";
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}


session_start();

//if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

?>

<!DOCTYPE html>

<html>

<head>
    <title>USF-Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Home page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Style.css">
</head>
<header>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <img class="img-fluid logo-home" style="margin-top:3px" src="../images/logo1-red.png" alt="logo">
      </div>
      <div class="col">
        <h1 class="slogan-home">We make the big fights happen</h1>
      </div>
    </div>
  </div>
</header>
<body class="home-background">
  <div class="container-fluid">
    <div class="row row-bg home-container">
      <div class="col text-center home-text-container" style="margin-left: 0.5rem;">
        <p class="home-text">Find out about our upcoming events and book tickets to attend one of them</p>
        <a class="home-btn btn btn-outline-light" href="events.php">Events</a>
      </div>
      <div class="col text-center home-text-container">
        <p class="home-text">Find out more about who we are and how the USF brand came to be</p>
        <a class="home-btn btn btn-outline-light" href="aboutus.php">About us</a>
      </div>
      <div class="col text-center home-text-container" >
        <p class="home-text">Find out how to contact us in case you have any questions or suggestions</p>
        <a class="home-btn btn btn-outline-light" href="contacts.php">Contacts</a>
      </div>
      <div class="col text-center home-text-container">
        <p class="home-text">Log into an existing profile or register if you're new</p>
        <a class="home-btn btn btn-outline-light" href="registration.php" style="margin-bottom:1%">Register</a><br>
        <a class="btn btn-outline-light" href="login.php">Log In</a>
      </div>
    </div>
    
  </div>
</body>

</html>

<?php 

//}
 ?>