<?php 
$sname= "localhost";
$unmae= "root";
$db_name = "test_db";

$connection = mysqli_connect($sname, $unmae, "", "test");

if (!$connection) {

    echo "Connection failed!";

}

session_start();

//if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

?>

<!DOCTYPE html>

<html>

<head>
    <title>USF-Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Home page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Style.css?v1=1234">
</head>

<body>
    <?php 
    include "../components/header.html" 
    ?>
<!--<div class="container text-center">
    <div class="row">
        <header>
            <img src="images/logo1.png" class="img-fluid" alt="usf logo" style="height:inherit;">
        </header>
    </div>
</div> -->
</body>

</html>

<?php 

//}
 ?>