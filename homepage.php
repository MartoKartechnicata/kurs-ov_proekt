<?php 
$sname= "localhost";
$unmae= "root";
$db_name = "test_db";

$connection = mysqli_connect($sname, $unmae, "", "test");

if (!$connection) {

    echo "Connection failed!";

}

session_start();

if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>USF-Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Home page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">
</head>

<body>

</body>

</html>

<?php 

}
 ?>