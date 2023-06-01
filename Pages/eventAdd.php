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
if ( isset( $_POST['submit'] ) ) {

	// записване на данните от полетата в променливи за по-удобно


	$name = $_POST['name'];
	$place = $_POST['place'];
	$date = $_POST['date'];
	$price = $_POST['price'];


	$error = false;
	
	// изписване на грешка ако не е попълнен модел
	
	if ( !$name ) {
		echo "<center style='color:red;'>Въведете име на събитието</center>";
		$error = true;
	}

	// изписване на грешка ако не е попълнено описание

	if ( !$place ) {
		echo "<center style='color:red;'>Въведете място на събитието </center>";
		$error = true;
	}
	
	if ( !$date ) {
		echo "<center style='color:red;'>Изберете дата на събитието</center>";
		$error = true;
	}
	
	if ( !$price ) {
		echo "<center style='color:red;'>Въведете цена на билиетите за събитието</center>";
		$error = true;
	}
  if ( $price<0 ) {
		echo "<center style='color:red;'>Цената не може да е по-малко от 0</center>";
		$error = true;
	}
	// изписване на грешка ако не е попълнена цена

	
	
	if ( !$error ) {

		// INSERT заявка към базата, с която се записват полетата

        $eventInsert="INSERT INTO event (name,date,place,ticketPrice) VALUES ('$name','$date','$place','$price')";
		$result = mysqli_query($connection, $eventInsert);
		
		// изписва съобщение, че всичко е минало успешно
		
		if ( $result ) {
			echo "<center style='color:green;'>Събитието е добавено успешно</center>";
		}
	}
	
	// htmlspecialchars служи да предотврятяване на грешки при въведени "специални" символи в базата..
	// Просто запомнете, че вашите полетата трябва да бъдат така направени преди да се отпечатат в сайта, за да няма проблеми с данните
	
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>USF-eventAdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="Admin panel for adding events in USF">
    <meta name="keywords" content="usf, uktc, fights, mma, mma promotions">
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
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="eventAdd.php">Add an event</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="fightAdd.php">Add a fight</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="fighterAdd.php">Add a fighter</a>
  </li>
</ul>
  <form method="POST">
	<label>Name:</label>
    <input type="text" name="name" class="form-control">
    <br>
    <label>Place:</label>
    <input type="text" name="place" class="form-control">
    <br>
	<label>Ticket price:</label>
	<input type="number" name="price" class="form-control">
	<br>
    <label>Date:</label>
        <input type="date" name="date" class="form-control">
        <br>
	
        <br>
        <div class="container-fluid text-center">
        <input class="btn btn-primary" type="submit" name="submit" value="Submit" style="width:30%"> 
        
</div>
    </form>
    <br>
  </body>
</html>