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



  
	$fighter1 = $_POST['fighter1'];
	$fighter2 = $_POST['fighter2'];
	$time = $_POST['time'];
	$event = $_POST['event'];
  $main=isset($_POST['main']);


	$error = false;
	
	// изписване на грешка ако не е попълнен модел
	
	if ( !$fighter1 ) {
		echo "<center style='color:red;'>Изберете първия участник</center>";
		$error = true;
	}

	// изписване на грешка ако не е попълнено описание

	if ( !$fighter2 ) {
		echo "<center style='color:red;'>Изберете втория участник</center>";
		$error = true;
	}
	
	if ( !$event ) {
		echo "<center style='color:red;'>Изберете събитието</center>";
		$error = true;
	}
	
	// изписване на грешка ако не е попълнена цена
	
	if ( !$time ) {
		echo "<center style='color:red;'>Попълнете кога е събитието</center>";
		$error = true;
	}

  if (isset($_POST['main'])){
    $stmt = $connection->prepare("SELECT * FROM fight join event on Event_id=event.id WHERE main=1 and event.id=?"); 
        $stmt->execute([$event]); 
	    $dup = $stmt->fetch();
	if ($dup) {
		echo "There's already a main event";
		$error=true;
	}
  }

	
	
	if ( !$error ) {

		// INSERT заявка към базата, с която се записват полетата

        $eventInsert="INSERT INTO fight ( fighter1id, fighter2id, time, event_id,main) VALUES ('$fighter1','$fighter2','$time', '$event','$main')";
		$result = mysqli_query($connection, $eventInsert);
		
		// изписва съобщение, че всичко е минало успешно
		
		if ( $result ) {
			echo "<center style='color:green;'>Битката е добавена успешно</center>";
		}
	}
	
	// htmlspecialchars служи да предотврятяване на грешки при въведени "специални" символи в базата..
	// Просто запомнете, че вашите полетата трябва да бъдат така направени преди да се отпечатат в сайта, за да няма проблеми с данните
	
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>USF-fightAdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="Admin panel for adding fights in USF">
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
    <a class="nav-link" aria-current="page" href="eventAdd.php">Add an event</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="fightAdd.php">Add a fight</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="fighterAdd.php">Add a fighter</a>
  </li>
</ul>

  <form method="POST">
	<label>Event:</label>
	<select class="form-control" name="event">
        <?php 

$allEvents = mysqli_query($connection, "SELECT * FROM event");
while ($row = $allEvents->fetch_assoc()){

?>
<option  value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

<?php
// close while loop 
}
?>
        </select>
		<br>
        <label>Time:</label>
        <input  class="form-control" type="time" name="time" class="form-control">
        <br>
        <label>Fighter 1:</label>
        <select class="form-control" name="fighter1">
        <?php 

$allFighters = mysqli_query($connection, "SELECT * FROM fighter");

while ($row = $allFighters->fetch_assoc()){

?>
<option value="<?php echo $row['id']?>"><?php echo $row['firstName']." ".$row['lastName']; ?></option>

<?php
// close while loop 
}
?>
        </select>
        <br>
        
        <label>Fighter 2:</label>
        <select class="form-control" name="fighter2">
        <?php 

$allFighters = mysqli_query($connection, "SELECT * FROM fighter");
while ($row = $allFighters->fetch_assoc()){

?>
<option value="<?php echo $row['id']?>"><?php echo $row['firstName']." ".$row['lastName']; ?></option>

<?php
// close while loop 
}
?>
        </select>
        <label>Main:</label>
        <input type="checkbox" id="main" name="main">
        <br>
        <div class="container-fluid text-center">
        <input class="btn btn-primary" type="submit" name="submit" value="Submit" style="width:30%">  
</div>
    </form>
    <br>
	<footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
  </body>
</html>