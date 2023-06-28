<?php
$sname= "localhost";
$unmae= "root";
$db_name = "kp";

$connection = new PDO("mysql:host=$sname;dbname=$db_name", $unmae);



if (!$connection) {

    echo "Connection failed!";

}

session_start(); 
$error = false;

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if ( empty( $email ) ) {

        $error = true;
        echo "Please, type email<br>";
    }

    if ( empty( $pass ) ) {

        $error = true;
        echo "Please, type pass<br>";
    }

    if ( !$error ) {

        $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?"); 
        $stmt->execute([ $email]); 
	    $result = $stmt->fetch();

        if (password_verify($pass, $result['password']) ) {

            $row = ($result);

                echo "Logged in!";
                $_SESSION['user_id'] = $row['id'];

                $_SESSION['email'] = $row['email'];

                $_SESSION['firstName'] = $row['firstName'];

                $_SESSION['lastName'] = $row['lastName'];

                $_SESSION['admin'] = $row['admin'];

                header("Location: homepage.php");

                exit();

        }
        else{
            $error=true;
        }

    }
	$email = htmlspecialchars( $email, ENT_QUOTES );
	$pass=htmlspecialchars($pass, ENT_QUOTES);
}




?>


<!doctype html>
  <head>
  <title>USF-Log in</title>
    <meta charset="UTF-8">
    <meta name="description" content="Log in page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, register, information, mma, mma promotions">
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
  <?php if($error){
    echo "Wrong email or password";
    }?>
  <main class="form-background">
  <div class="container-fluid text-center">
    <div class="row">
        <div class="col">
        <div class="d-lg-block d-none">
        <img src="../images/logo1-white.png" alt="usf-logo" class="logo-form">
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="d-lg-block d-none">
        <h1 class="slogan">The best fighters, and the best fights</h1>
        </div>
</div>
</div>
</div>
<form method="post" class="login-form" enctype="multipart/form-data">
<div class="container-fluid border-container-form form-color">
<div class="row register-form-heading">
    <h2 style="text-align:center">Sign In</h2>
</div>
<div class="d-md-none d-block">
    <h1 style="text-align:center;padding-top:2%">SIGN IN</h1>
</div>
</div>
<div class="row form-rows"  style="padding-top:2%;">
    <div class="col">
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInputGrid" name="email" placeholder="Email address">
        <label for="floatingInputGrid">Email address</label>
      </div>
    </div>
</div>
<div class="row last-row">
    <div class="col">
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
    </div>
</div>
<div class="row" style="text-align:center; padding-bottom:2%;">
    <div class="col">
       <input class="btn btn-danger btn-danger-submit" type="submit" name="submit" value="Log in">  
    </div>
</div>  
</div>
</form>
</main>
<footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
</footer>
</body>
</html>