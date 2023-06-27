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
<body class="home-background">
  <div class="container-fluid">
  <div class="row">
    <div class="col-12 col-lg-2 home-logo-align">
    <img src="../images/logo1-white.png" alt="logo" class="home-logo">
    </div>
    <div class="col">
    <div class="d-md-block d-none">
    <h1 class="home-header">WELCOME TO THE OFFICIAL HOME OF UKTC STUDENT FIGHTS</h1>
</div>
  </div>
  </div>
  </div> 
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="d-md-block d-none">
          <h2>The best fighters, and the best fights</h2>
        </div>
        <div class="d-md-none d-block">
          <h2>WELCOME TO THE OFFICIAL HOME OF UKTC STUDENT FIGHTS</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
      <div class="d-md-block d-none">
      <a class="btn btn-outline-dark" href="events.php">Events</a>
      <a class="btn btn-outline-dark" href="aboutus.php">About Us</a>
      <a class="btn btn-outline-dark" href="contacts.php">Contacts</a>
      <a class="btn btn-outline-dark" href="registration.php">Register</a>
      <a class="btn btn-outline-dark" href="login.php">Log In</a>
      </div>     
      <div class="d-md-none d-block">
      <a class="btn btn-outline-light btn-home mb-1" href="events.php">Events</a><br>
      <a class="btn btn-outline-light btn-home mb-1" href="aboutus.php">About Us</a><br>
      <a class="btn btn-outline-light btn-home mb-1" href="contacts.php">Contacts</a><br>
      <a class="btn btn-outline-light btn-home mb-1" href="registration.php">Register</a><br>
      <a class="btn btn-outline-light btn-home mb-1" href="login.php">Log In</a><br>
    </div>
</div>
  </div>
</body>

</html>

<?php 

//}
 ?>