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
      header("location:eventinfo.php");
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
  <div class="row justify-content-between">
    <div class="col-4">
		<h4>Category A:</h4>
    <p>some stuff </p>
    <h6>Price: <?php echo $categoryA;?></h6>
</div>
<div class="col-4">
<label>Quantity:</label>
	<input type="number" name="quantityA" class="form-control" min="0">
</div>
</div>

<div class="row justify-content-between">
    <div class="col-6">
		<h4>Category B:</h4>
    <p>some stuff </p>
    <h6>Price: <?php echo $categoryB;?></h6>
</div>
<div class="col-4">
<label>Quantity:</label>
	<input type="number" name="quantityB" class="form-control" min="0">
</div>
</div>
<div class="row justify-content-between">
    <div class="col-4">
		<h4>Category C:</h4>
    <p>some stuff </p>
    <h6>Price: <?php echo $categoryC;?></h6>
</div>
<div class="col-4">
<label>Quantity:</label>
	<input type="number" name="quantityC" class="form-control" min="0">
</div>
</div>
<div class="row justify-content-between">
    <div class="col-4">
		<h4>VIP Experience:</h4>
    <p>some stuff </p>
    <h6>Price: <?php echo $vip;?></h6>
</div>
<div class="col-4">
<label>Quantity:</label>
	<input type="number" name="quantityVIP" class="form-control" min="0">
</div>
</div>
</div>
    <input class="btn btn-success" type="submit" name="submit" value="Book tickets">  
</form>
</div>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
</body>
</html>