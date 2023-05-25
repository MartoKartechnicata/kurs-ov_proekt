<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "kp";

try {
	$connection = mysqli_connect($servername, $username, $password,$database);
	// echo "Connected successfully";
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit'] ) ) {

	// записване на данните от полетата в променливи за по-удобно


	$fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
	$class = $_POST['class'];
    $room = $_POST['room'];
    
    $file = $_FILES['picture'];
	$file_name = $_FILES['picture']['name'];
	$file_temp = $_FILES['picture']['tmp_name'];
	$file_type = $_FILES['picture']['type'];

	$error = false;
	
	// изписване на грешка ако не е попълнен модел
	
	if ( !$fName ) {
		echo "<center style='color:red;'>Въведете първо име на съзтезателя</center>";
		$error = true;
	}

	// изписване на грешка ако не е попълнено описание

	if ( !$lName ) {
		echo "<center style='color:red;'>Въведете фамилия име на съзтезателя</center>";
		$error = true;
	}

    if ( !$height ) {
		echo "<center style='color:red;'>Въведете височина на съзтезателя</center>";
		$error = true;
	}

    if ( !$weight ) {
		echo "<center style='color:red;'>Въведете тегло на съзтезателя</center>";
		$error = true;
	}
	
	if ( !$class ) {
		echo "<center style='color:red;'>Въведете клас на съзтезателя</center>";
		$error = true;
	}

    if ( !$room ) {
		echo "<center style='color:red;'>Въведете номер на стаята на съзтезателя</center>";
		$error = true;
	}
    if ( $file_type != "image/png" && $file_type != "image/jpeg" ) {
		
		echo "<center style='color:red;'>Качете снимка</center>";
		$error = true;
		
	} else {
		
		// завършване на upload-а и записване на качения файл в папка images
	
		move_uploaded_file( $file_temp, "../../images/".$file_name );
	}

	
	
	if ( !$error ) {

		// INSERT заявка към базата, с която се записват полетата

        $eventInsert="INSERT INTO fighter (firstName, lastName, height, weight, class, roomNum, picture_name) 
        VALUES ('$fName','$lName','$height', '$weight', '$class', '$room', '$file_name')";
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	  
  </head>
  <body>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="eventAdd.php">Add an event</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="fightAdd.php">Add a fight</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="fighterAdd.php">Add a fighter</a>
  </li>
</ul>

  <form method="post" enctype="multipart/form-data">
	<label>First Name:</label>
    <input type="text" name="fName" value="<?= @$fName ?>">
    <label>Last Name:</label>
    <input type="text" name="lName" value="<?= @$lName ?>">
    <br>
    <label>Height:</label>
    <input type="text" name="height" value="<?= @$height ?>">
    <label>Weight:</label>
    <input type="text" name="weight" value="<?= @$weight ?>">
    <br>
    <label>Class:</label>
    <input type="text" name="class" value="<?= @$class ?>">
    <label>Room:</label>
    <input type="text" name="room" value="<?= @$room ?>">
    <br>
	<label>Picture:</label>
	<input type="file" name="picture">
					
	<button name="submit" class="btn btn-primary w-100" type="submit" value="submit">Submit</button>
	</form>
    <br>
  </body>
</html>