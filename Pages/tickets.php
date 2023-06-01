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
$_SESSION['event_id']=$_GET['role'];

$p=mysqli_query($connection, "Select ticketPrice from event where event.id='{$_SESSION['event_id']}'");
$p2=$p->fetch_assoc();
$price=$p2['ticketPrice'];
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
  <?php
  if ( isset( $_POST['submit'] ) ) {
    $quantity=$_POST['quantity'];
    for ($x = 1; $x <= $quantity; $x++) {
        $result=mysqli_query($connection, "Insert into ticket (owner_id,eventId) values ('{$_SESSION['user_id']}', '{$_SESSION['event_id']}')");
      }
      if ( $result ) {
        echo "<center style='color:green;'>Резервацията е успешна!</center>";
        unset($_SESSION['event_id']);
        // header("Location: homepage.php");
    }
    ?>
    <p> Total price: <?php echo $price*$quantity?></p>
    <?php
}
  else{
  ?>
  <form method="post" enctype="multipart/form-data">
  <label>Number of tickets:</label>
	<input type="number" name="quantity">
    <h5>Individual ticket price-<?php echo $price?></h5>
    <input class="btn btn-success" type="submit" name="submit" value="Book tickets">  
</form>
<?php } ?>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
</body>
</html>