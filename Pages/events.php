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
    <title>USF-Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Home page of the USF - UKTC STUDENT FIGHTS">
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

    $allFights = mysqli_query($connection, "SELECT fight.* from fight join event on event_id=event.id");
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
    