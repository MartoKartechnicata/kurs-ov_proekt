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

//if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

?>

<!DOCTYPE html>

<html>

<head>
    <title>USF-About Us</title>
    <meta charset="UTF-8">
    <meta name="description" content="About us page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, about us, information, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <h1 class="text-center">About us</h1>

  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <p>akfbkdbjsbjjbj<br>
              ksd;jkjljfs;lj<br>
            </p> 
        </div>
        <div class="col-lg-9 col-6">
            <img src="../images/Screenshot_1.png">
        </div>
    </div>
</div>
<!--<p>The team We're a group of three students from the Vocational School of Computer Technology in the city of Pravets, Bulgaria and this is our
 course project. USF(UKTC Students Figthing) is a Bulgarian mixed martial arts (MMA) promotion company based in the dorms of UKTC.
 It is owned and operated by Martin Yordanov, Kristiyan Yordanov and Stivan Borisov.
 It produces events in Bulgaria that showcase 8 weight divisions and abides no rules whatsoever.</p>..-->
    <footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
</body>
</html>
