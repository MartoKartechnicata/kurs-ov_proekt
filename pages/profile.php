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
$accountTickets=mysqli_query($connection, "Select ticket.* from ticket join event on event.id=ticket.eventId where owner_id={$_SESSION['user_id']} order by event.date;");
date_default_timezone_set('Europe/Sofia');
$date = new DateTime();
?>
<!DOCTYPE html>

<html>

<head>
    <title>USF-<?php echo $_SESSION['firstName']," ".$_SESSION['lastName'] ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Your rofile page in the USF-UKTC STUDENT FIGHTS site">
    <meta name="keywords" content="usf, uktc, fights, profile, tickets, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    
  </style>
  </head>
<body>
<header>
    <?php 
    include "../components/header.html" ;
    ?>
  </header>
  <main>
    <div class="container-fluid">
  <div style="display: flex; align-items: center;">
    <i class="fas fa-user fa-3x"></i>
    <div class="container-fluid">
  <div class="row">
    <h4><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></h4>
  </div>
  <div class="row">
    <h6><?php echo $_SESSION['email']?></h6>
  </div>
  </div>
  </div>
  <?php while ($row = $accountTickets->fetch_assoc()){ 
    $event=mysqli_query($connection, "Select event.* from event join ticket on event.id=eventId where event.id={$row['eventId']}");
    $event=$event->fetch_assoc(); 
    $eventDate = new DateTime($event["date"]);
    if($eventDate>$date || $eventDate->format('Y-m-d')==$date->format('Y-m-d')){
    ?>
    <div class="container-fluid events-container ">
<div class="d-md-block d-none">
    <div class="row" style="align-items: center;">
      <div class="col">
<h4>Event:<?php echo $event['name'];?></h4>
    </div>
    <div class="col">
  <p>Date:<?php echo $event['date'];?>
  <br>Place:<?php echo $event['place'];?></p>
    </div>
    <div class="col">
    <h4>Ticket Type:<?php echo $row['type'];?></h4>
    </div>
  </div>
  </div>
  </div>
<?php
    }
}
?>
  </div>
</main>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" ;
      ?>
</footer>
</body>
</html>