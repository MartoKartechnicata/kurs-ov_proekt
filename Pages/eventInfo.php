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

session_start();
$title=mysqli_query($connection, "Select name from event where id='{$_SESSION["event_id"]}'");
$title=$title->fetch_assoc();
$allFights=mysqli_query($connection, "Select fight.id from fight join event on fight.Event_id=event.id where event.id='{$_SESSION["event_id"]}'");
?>
<!doctype html>
<html>

<head>
    <title><?php Echo $title['name']; ?></title>
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
	  
  </head>
  <body>

  <form method="POST">
  <?php 

while ($row = $allFights->fetch_assoc()){

  ?>
<p><?php
$f1=mysqli_query($connection, "Select * from fighter join fight on fighter1id=fighter.id where fight.id='{$row["id"]}'");
$fighter1=$f1->fetch_assoc();
$f2=mysqli_query($connection, "Select * from fighter join fight on fighter2id=fighter.id where fight.id='{$row["id"]}'");
$fighter2=$f2->fetch_assoc();
echo $fighter1["firstName"]." ".$fighter1["lastName"]." vs ".$fighter2["firstName"]." ".$fighter2["lastName"];?> </p>
<?php
// close while loop 
}
?>
    </form>
    <br>
<footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
    </body>
</html>