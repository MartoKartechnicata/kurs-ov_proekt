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
?>
<!DOCTYPE html>

<html>

<head>
    <title>USF-<?php echo $_SESSION['firstName']," ".$_SESSION['lastName'] ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Your rofile page in the USF-UKTC STUDENT FIGHTS site">
    <meta name="keywords" content="usf, uktc, fights, profile, tickets, mma, mma promotions">
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
  <main>
    <!-- Background image -->
    <div class="bg-image" style="
    background-image: url('../images/profilebg.jpg');
    background-size: cover; height: 100vh; background-attachment: fixed;
  ">
<!-- container -->
<div class="container-fluid">
      <!-- mask -->
<div class="mask" style="background-color: hsla(0, 0%, 0%, 0.6); mask-size: 70%;">
    <!-- row -->
    <div class="row">
        <!-- col-->
        <div class="col text-center">
<img src="../images/logo1-red.png" alt="usf-logo">
</div>
<!-- /col -->
</div>
<!-- /row -->
<!-- row -->
<div class="row">
<div class="col text-center">
    <h1 class="register-form-heading"><?php echo $_SESSION['firstName']," ".$_SESSION['lastName'] ?> </h1>
    </div>
<!-- /col -->
</div>
<!-- /row --> 
</div>
  <!-- /mask -->
<br><br>
<!-- mask -->
<div class="mask" style="background-color: hsla(0, 0%, 98%, 0.6); mask-size: 70%;">
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="profile.php">Profile info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profileTickets.php">Tickets</a>
  </li>
</ul>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3>User Profile</h3>
          </div>
          <div class="card-body">
            <div class="col">
            <p class="textSize-profile"><strong>First name:</strong> <?php echo $_SESSION['firstName']?></p> 
            <p class="textSize-profile"><strong>Last Name:</strong> <?php echo $_SESSION['lastName']?></p>
            <p class="textSize-profile"><strong>Email:</strong> <?php echo $_SESSION['email']?></p>
            </div>
            <div class="col offset-10">
            <button style="width:49%" type="button" class="btn btn-outline-primary" onclick="window.location.href = 'passwordChange.php';">Change password</button>
            <button style="width:49%" type="button" class="btn btn-outline-danger" onclick="window.location.href = 'profileDelete.php';">Delete account</button>
            </div>
          </div>
          </div>
        </div>
      </div>

</div>
<!-- /mask -->
</div>
<!-- /container -->

</main>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
</body>
</html>