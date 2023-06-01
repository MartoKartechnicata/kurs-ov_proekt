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
// echo $_SESSION['firstName'];
//<a href="http://programminghead.com">  
//<button>Click Me</button>  
//</a>
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
  <br>
  <button style="width:10%" type="button" class="btn btn-outline-primary" onclick="window.location.href = 'passwordChange.php';">Change password</button>

  <footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
</body>
</html>