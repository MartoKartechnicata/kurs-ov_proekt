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
<!doctype html>
<html>

<head>
    <title>USF-Events</title>
    <meta charset="UTF-8">
    <meta name="description" content="Events page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Style.css?v2=1234">
</head>
<body>
    <header>
    <?php 
    include "../components/header.html" 
    ?>
    </header>
</body>

</html>
<?php

$allEvents = mysqli_query($connection, "SELECT * FROM event");
if ( isset( $_POST['submit'] ) ) {
    $event=$_POST['submit'];

    $allFights = mysqli_query($connection, "SELECT * from fight");
    $allFighters = mysqli_query($connection, "select * from fighter")
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>
	  
  </head>
  <body>
    <p><?php echo $event ?></p>
    <br>
  </body>
</html>
<?php
} else {
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
	  
  </head>
  <body>

  <form method="POST">
  <?php 

while ($row = $allEvents->fetch_assoc()){

?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
      <?php
    while ($r2 = $allFights->fetch_assoc()) {
      $fighters=mysqli_query($connection, "Select fighter.* from fighter join fight on fighter1_")
      ?>
		<div class="carousel-item active">
		  <img src="images/<?php?>" class="d-block w-100" alt="...">
		</div>
    </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>	
<button type="submit" value="<?php echo $row['id'] ?>" name="submit">"<?php echo $row['name'] ?>"</button><br>
<?php
// close while loop 
}
?>
    </form>
    <br>
<?php
// close while loop 
}
?>
<footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
    </body>
</html>
    