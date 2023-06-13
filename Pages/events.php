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
$error=false;

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <main>
      <h1 class="events-header">UPCOMING EVENTS</h1>
<?php

$allEvents = mysqli_query($connection, "SELECT * FROM event");
if ( isset( $_POST['submit'] ) ) {
    $event=$_POST['submit'];
    $_SESSION["event_id"]=$event;
    header("Location: eventInfo.php");
}
?>

  <?php 

while ($row = $allEvents->fetch_assoc()){
  $main=mysqli_query($connection, "Select fight.id from fight join event on fight.Event_id=event.id where event.id='{$row["id"]}' and main=1");
  $mainEvent=$main->fetch_assoc();
  if(!$mainEvent){?>
    <br><button type="submit" value="<?php echo $row['id'] ?>" name="submit">"<?php echo $row['name'] ?>"</button>
    <?php
    echo "No main event";
  } else{
  // $mainEvent e celiq red s main eventa
  $f1=mysqli_query($connection, "Select * from fighter join fight on fighter1id=fighter.id 
  where fight.id='{$mainEvent["id"]}'");
$fighter1=$f1->fetch_assoc();
// $fighter1 e celiq red
$f2=mysqli_query($connection, "Select * from fighter join fight on fighter2id=fighter.id 
where fight.id='{$mainEvent["id"]}'");
$fighter2=$f2->fetch_assoc();
$eventNumber=mysqli_query($connection, "SELECT name, SUBSTRING(name ,5,2) FROM kp.event where event.id={$row['id']};");
$eventNumber=$eventNumber->fetch_assoc();
$eventNumber=$eventNumber['SUBSTRING(name ,5,2)'];
 ?> 
<div class="container-fluid events-container ">
<div class="d-md-block d-none">
  <div class="row">
    <div class="col-3">
    <img src="../images/<?php echo $fighter1['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter1["firstName"]." ".$fighter1["lastName"]?>">
    </div>
    <div class="col-6 text-center">
      <h3><img class="event-usf-picture" src="../images/logo1.png" alt="USF logo"><span class="event-header"><?php echo $eventNumber?></span></h3>
      <p class="fighter-names"><?php echo $fighter1["firstName"]." ".$fighter1["lastName"]." vs ".$fighter2["firstName"]." ".$fighter2["lastName"];?> </p>
      <form method="GET" class="event-buttons">
      <a class="btn btn-outline-danger" href="eventInfo.php?event=<?php echo $row['id'] ?>">Learn More</a>
      <a class="btn btn-outline-primary" href="ticketsBuy.php?event=<?php echo $row['id'] ?>">Book Tickets</a>
      </form>
    </div>
    <div class="col-3 fighter-2-align">
    <img src="../images/<?php echo $fighter2['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter2["firstName"]." ".$fighter2["lastName"]?>">
    </div>
  </div>
  </div>
  <div class="d-block d-md-none">
  <div class="row row-border text-center">
    <div class="col ">
      <p class="fighter-names"><?php echo $fighter1["firstName"]." ".$fighter1["lastName"]." vs ".$fighter2["firstName"]." ".$fighter2["lastName"];?> </p>
    </div>
  </div>
  <div class="row row-border event-background-mobile">
    <div class="col">
      <img src="../images/<?php echo $fighter1['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter1["firstName"]." ".$fighter1["lastName"]?>">
    </div>
    <div class="col fighter-2-align">
      <img src="../images/<?php echo $fighter2['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter2["firstName"]." ".$fighter2["lastName"]?>">
    </div>
  </div>
  <div class="row text-center">
  <form method="GET" class="event-buttons">
      <a class="btn btn-outline-danger" href="eventInfo.php?event=<?php echo $row['id'] ?>">Learn More</a>
      <a class="btn btn-outline-primary" href="ticketsBuy.php?event=<?php echo $row['id'] ?>">Book Tickets</a>
  </form>
  </div>
  </div>
</div>

<?php
// close while loop 
  }
}
?>
    
</main>
    <br>
    <footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
    </body>
</html>
<?php /* $ef=mysqli_query($connection, "Select fight.* from fight join event on Event_id=event.id where event.id='{$row['id']}'");
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
      <?php
    while ($eventFights=$ef->fetch_assoc()) {
      $fighters=mysqli_query($connection, "Select fighter.* from fighter join fight 
      on fighter1id=fighter.id or fighter2id=fighter.id where fight.id='{$eventFights['id']}'")
      ?>
		<div class="carousel-item active">
		  <img src="../images/<?php echo $fighters['picture_name']?>" class="d-block w-100" alt="...">
		</div>
    <?php
    }
    ?>
    </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>	*/
  ?>