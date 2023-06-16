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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <?php 
    include "../components/header.html" 
    ?>
  </header>
  <main>
    
  <div class="container-fluid">
  <div class="row">
  <div class="container-fluid ">
    <div class="row"></div>
  <div class="row">
 <h4><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?></h4>
</div>
<div class="row">
<h6><?php echo $_SESSION['email']?></h6>
</div>
</div>
</div>
      <button type="button">Edit Profile</button>
  </div>
</main>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
</body>
</html>