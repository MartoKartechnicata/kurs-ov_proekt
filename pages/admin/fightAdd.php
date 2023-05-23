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

if ( isset( $_POST['submit'] ) ) {

	// записване на данните от полетата в променливи за по-удобно


	$fighter1 = $_POST['fighter1'];
	$fighter2 = $_POST['fighter2'];
	$time = $_POST['time'];
	$event = $_POST['event'];


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

	
	
	if ( !$error ) {

		// INSERT заявка към базата, с която се записват полетата

        $eventInsert="INSERT INTO fight ( fighter1id, fighter2id, time, event_id) VALUES ('$fighter1','$fighter2','$time', '$event')";
		$result = mysqli_query($connection, $eventInsert);
		
		// изписва съобщение, че всичко е минало успешно
		
		if ( $result ) {
			echo "<center style='color:green;'>Продуктът е добавен успешно</center>";
		}
	}
	
	// htmlspecialchars служи да предотврятяване на грешки при въведени "специални" символи в базата..
	// Просто запомнете, че вашите полетата трябва да бъдат така направени преди да се отпечатат в сайта, за да няма проблеми с данните
	
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
	  
  </head>
  <body>

  <form method="POST">
	<label>Event:<label>
	<select name="event">
        <?php 

$allEvents = mysqli_query($connection, "SELECT * FROM event");
while ($row = $allEvents->fetch_assoc()){

?>
<option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

<?php
// close while loop 
}
?>
        </select>
		<br>
        <label>Time:</label>
        <input type="time" name="time" class="form-control">
        <br>
        <label>Fighter 1:</label>
        <select name="fighter1">
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
        <select name="fighter2">
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
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
  </body>
</html>