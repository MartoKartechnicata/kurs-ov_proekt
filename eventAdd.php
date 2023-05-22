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


	$name = $_POST['name'];
	$place = $_POST['place'];
	$date = $_POST['date'];


	$error = false;
	
	// изписване на грешка ако не е попълнен модел
	
	if ( !$name ) {
		echo "<center style='color:red;'>Въведете име на събитието</center>";
		$error = true;
	}

	// изписване на грешка ако не е попълнено описание

	if ( !$place ) {
		echo "<center style='color:red;'>Изберете втория участник</center>";
		$error = true;
	}
	
	if ( !$date ) {
		echo "<center style='color:red;'>Изберете събитието</center>";
		$error = true;
	}
	
	// изписване на грешка ако не е попълнена цена

	
	
	if ( !$error ) {

		// INSERT заявка към базата, с която се записват полетата

        $eventInsert="INSERT INTO event (name,date,place) VALUES ('$name','$date','$place')";
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
	<label>Name:<label>
    <input type="text" name="name" value="<?= @$name ?>">
    <br>
    <label>Place:<label>
    <input type="text" name="place" value="<?= @$place ?>">
    <br>
    <label>Date:</label>
        <input type="date" name="date" class="form-control">
        <br>
	
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
  </body>
</html>