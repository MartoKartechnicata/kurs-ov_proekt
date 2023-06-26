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
if (empty($_SESSION['user_id'])) {
  header("Location: registration.php");
}
$_SESSION['event_id']=$_GET['event'];
$eventName=mysqli_query($connection,"Select name from event where id={$_SESSION['event_id']}");
$eventName=$eventName->fetch_assoc();
$eventName=$eventName['name'];

$p=mysqli_query($connection, "Select price.* from price join event on price.event_id=event.id where event.id='{$_SESSION['event_id']}'");
$p2=$p->fetch_assoc();
$categoryA = $p2['categoryA'];
	$categoryB = $p2['categoryB'];
	$categoryC = $p2['categoryC'];
	$vip = $p2['VIPexperience'];
  
  if ( isset( $_POST['submit'] ) ) {
    $qunatityA=$_POST['quantityA'];
    $qunatityB=$_POST['quantityB'];
    $qunatityC=$_POST['quantityC'];
    $qunatityVIP=$_POST['quantityVIP'];
    $seats=mysqli_query($connection, "Select * from availableseats where event_id={$_SESSION['event_id']}");
  $seats=$seats->fetch_assoc();
  $catA=$seats['categoryA'];
  $catB=$seats['categoryB'];
  $catC=$seats['categoryC'];
  $vip=$seats['vip'];


    $error=false;
    if(!$qunatityA && !$qunatityB && !$qunatityC && !$qunatityVIP){
      echo "Please place a booking";
      $error=true;
    }

    $totalprice=0;
    if(!$error) {
      for($i = 0; $i<$qunatityA; $i++){
        $sql1="insert into ticket(owner_id, eventid, type) values ({$_SESSION['user_id']}, {$_SESSION['event_id']}, 'Category A')";
        $result=mysqli_query($connection, $sql1);
        $catA=$catA-1;
        $st=mysqli_query($connection, "UPDATE availableseats SET categoryA = {$catA} WHERE event_id = {$_SESSION['event_id']}");
      }
      for($i=0; $i<$qunatityB; $i++){
        $sql2="insert into ticket(owner_id, eventid, type) values ({$_SESSION['user_id']}, {$_SESSION['event_id']}, 'Category B')";
        $result=mysqli_query($connection, $sql2);
        $catB=$catB-1;
        $st=mysqli_query($connection, "UPDATE availableseats SET `categoryB` = {$catB} WHERE event_id = {$_SESSION['event_id']}");
      }
      for($i=0; $i<$qunatityC; $i++){
        $sql3="insert into ticket(owner_id, eventid, type) values ({$_SESSION['user_id']}, {$_SESSION['event_id']}, 'Category C')";
        $result=mysqli_query($connection, $sql3);
        $catC=$catC-1;
        $st=mysqli_query($connection, "UPDATE availableseats SET `categoryC` = {$catC} WHERE event_id = {$_SESSION['event_id']}");
      }
      for($i=0; $i<$qunatityVIP; $i++){
        $sql4="insert into ticket(owner_id, eventid, type) values ({$_SESSION['user_id']}, {$_SESSION['event_id']}, 'VIP')";
        $result=mysqli_query($connection, $sql4);
        $vip=$vip-1;
        $st=mysqli_query($connection, "UPDATE availableseats SET `vip` = {$vip} WHERE event_id = {$_SESSION['event_id']}");
      }
      header("location:profile.php");
    } else{
      echo "error";
    }
  }
?>
<!DOCTYPE html>

<html>

<head>
    <title>USF-Tickets</title>
    <meta charset="UTF-8">
    <meta name="description" content="Contacts page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, email, phone number, contacts, information, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">

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

  <div class="container-fluid">
    <h1 class="text-center"><?php echo $eventName?></h1>
  <form method="post" enctype="multipart/form-data">
  <div class="container-fluid ticket-container ">
<div class="block">
  <div class="row">
    <div class="col-2">
		<h4>Category A:</h4>
    <h6>Price: $<?php echo $categoryA;?></h6>
</div>
    <div class="col-9">
    <p>Introducing the ultimate UFC experience with our Category A tickets! Get ready to witness the electrifying action from the front row as these tickets provide exclusive access to seats in rows 1 to 5. With unmatched proximity to the octagon, you'll be in the heart of the action, feeling the intensity as every punch and submission unfolds before your eyes. Immerse yourself in the atmosphere of raw power and skill as the world's top fighters clash in epic battles. Don't miss your chance to secure these second best tickets, offering an unparalleled view and an unforgettable UFC experience. Get your Category A tickets now and be a part of the action like never before!</p>
  </div>
<div class="col-1">
<label>Quantity:</label>
	<input type="number" name="quantityA" class="form-control" min="0">
</div>
</div>
</div>
</div>

<div class="container-fluid ticket-container ">
<div class="block">
<div class="row ">
    <div class="col-2">
		<h4>Category B:</h4>
    <h6>Price: $<?php echo $categoryB;?></h6>
</div>
<div class="col-9">
  <p>
Welcome to the thrill of UFC with our Category B tickets! Experience the heart-pounding action from rows 6 to 10, as you immerse yourself in the electrifying atmosphere of the octagon. These third best tickets offer an excellent vantage point, providing a great view of all the intense strikes and ground battles that unfold before you. Feel the energy and adrenaline as the world's finest fighters showcase their skills in epic clashes. Don't miss your chance to secure your Category B tickets and be a part of this unforgettable UFC event. Grab your seats now and prepare for an evening of exhilarating fights!</p>
</div>
<div class="col-1">
<label>Quantity:</label>
	<input type="number" name="quantityB" class="form-control" min="0">
</div>
</div>
</div>
</div>

<div class="container-fluid ticket-container ">
<div class="block">
<div class="row">
    <div class="col-2">
		<h4>Category C:</h4>
    <h6>Price: $<?php echo $categoryC;?></h6>
</div>
    <div class="col-9">
<p>Experience the heart-pounding action of UFC with our Category C tickets! These fourth best tickets offer an incredible opportunity to witness the thrilling battles from rows 11 to 15. Take your seat and get ready to be captivated by the explosive strikes and intense ground maneuvers as the world's top fighters showcase their skills in the octagon. With Category C, you'll still enjoy a fantastic view of the action-packed fights, feeling the adrenaline rush with every powerful blow. Don't miss your chance to secure these tickets and be part of the electrifying UFC atmosphere. Get your Category C tickets now and prepare for an unforgettable evening of combat sports excellence!</p>
  </div>  <div class="col-1">
<label>Quantity:</label>
	<input type="number" name="quantityC" class="form-control" min="0">
</div>
</div>
</div>
</div>

<div class="container-fluid ticket-l-container ">
<div class="block">
<div class="row">
    <div class="col-2">
		<h4>VIP Experience:</h4>
    <h6>Price: $<?php echo $vip;?></h6>
</div>
<div class="col-9">
  <p>
  VIP experience USF tickets provide unparalleled access and prime seating for an unforgettable evening of intense MMA action. 
  With unobstructed views of the octagon, fans experience every punch, kick, and submission up close. Located near the center of the arena, 
  these tickets offer a clear line of sight to all the adrenaline-fueled battles. Accompanied by VIP perks and amenities like access to exclusive 
  lounges and complimentary food and beverages, VIP ticket holders enjoy a luxurious and immersive experience. 
  It's the ultimate opportunity to be part of the passionate crowd, witness legendary fighters, and feel the electrifying atmosphere of 
  the world's premier combat sports event.
  </p>
</div>
<div class="col-1">
<label>Quantity:</label>
	<input type="number" name="quantityVIP" class="form-control" min="0">
</div>
</div>
</div>
</div>
</div>
<div class="text-center">
<input class="btn btn-success btn-ticket" type="submit" name="submit" value="Book tickets" > 
</div> 
</form>
</div>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
</body>
</html>