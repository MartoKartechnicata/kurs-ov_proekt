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

$allEvents = mysqli_query($connection, "SELECT * FROM event");
if ( isset( $_POST['submit'] ) ) {
    $event=$_POST['submit'];
?>
<!doctype html>
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
	  
  </head>
  <body>

  <form method="POST">
  <?php 

while ($row = $allEvents->fetch_assoc()){

?>
<button type="submit" value="<?php echo $row['id'] ?>" name="submit"><</button><br>
<?php
// close while loop 
}
?>
    </form>
    <br>
  </body>
</html>
<?php
// close while loop 
}
?>