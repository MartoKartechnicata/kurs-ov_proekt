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
  <hr noshade style="color:crimson">

  <div class="container-fluid">
  <div class="d-lg-block d-none">
    <div class="row">
        <div class="col-lg-7">
          <h3 class="crimsonbg order-1 whiteText text-center" style="padding-bottom:0.25%;">Our project</h3>
          <br>
            <p>We're a group of three students from the Vocational School of Computer Technology in the city of Pravets, Bulgaria and this is our
 course project. As huge fans of MMA as a sport, we decided something related to it would be a suitable theme 
 for out project as it'd keep us excited and motivated. USF(UKTC Students Figthing) is a Bulgarian mixed martial arts (MMA) 
 promotion company based in the dorms of UKTC. It is owned and operated by Martin Yordanov, Kristiyan Yordanov and Stivan Borisov.
 It produces events in Bulgaria that showcase 8 weight divisions and abides no rules whatsoever. As of 2023 it hasn't hosted any events and is yet to
  schedule the first one. The company is still filling its roster, which will include all three of the corporation's founders and more. <br></p>
 <p class="italicText">Disclaimer: We do not organise real fights and do not encourage such activity in our school.</p>
</div>
        <div class="col-lg-5">
            <img src="..\images\30anniversary.jpg" alt="UKTC" height="300" title="The Vocational School of Computer Technology in the city of Pravets" class="img-fluid">
        </div>
    </div>
    <div class="row" style="padding-top:5%;">
    <div class="col-lg-4">
            <img src="..\images\GettyImages-1416166454-1024x631.jpg" alt="Leon Edwards knocks out Kamaru Usman with head kick to win 
            UFC welterweight title" height="300" title="Leon Edwards knocks out Kamaru Usman with head kick to win UFC welterweight title">
    </div>
    <div class="col-lg-8">
    <h3 class="crimsonbg whiteText text-center" style="padding-bottom:0.25%;">What is MMA?</h3>
    <br>
          <p>Mixed martial arts (MMA) is a full-contact combat sport based on striking, grappling and ground fighting, incorporating 
            techniques from various combat sports from around the world. The first documented use of the term 
            mixed martial arts was in a review of UFC 1 by television critic Howard Rosenberg in 1993 Originally promoted as a 
            competition to find the most effective martial arts for real unarmed combat, competitors from different fighting styles were 
            pitted against one another in contests with relatively few rules. Later, individual fighters incorporated multiple martial 
            arts into their style. MMA promoters were pressured to adopt additional rules to increase competitors' safety, 
            to comply with sport regulations and to broaden mainstream acceptance of the sport. Following these changes, the sport has 
            seen increased popularity with a pay-per-view business that rivals boxing and professional wrestling..</p>
</div>
</div>
<div class="row" style="padding-top:5%;padding-bottom:2%">
        <div class="col-lg-8">
          <h3 class="crimsonbg whiteText text-center" style="padding-bottom:0.25%;">Our goals</h3>
          <br>
            <p>First and foremost, our primary goal is to get an excellent grade with this project. We also want to make sure we
              provide entertaining fights and assure the fans they'll get their money's worth. After that, our next goal would to
              expand to multiple countries across Europe and eventually become the largest MMA promotion on the continent. We
            want to keep the passion for the sport alive and further popularise it in our home country Bulgaria. We'd like to improve our venues
            and expand our roster with new younger or experienced fighters and maybe even create our own MMA gyms to train new ambitious sportsmen. 
          Our final ambition would be to conquer the market and challenge the most famouse promotions like
          'UFC' and ' ONE Championship'.</p>
        </div>
        <div class="col-lg-4">
            <img src="..\images\Screenshot_54.png" alt="BKS bate" height="300" title="Ph" class="img-fluid">
        </div>
    </div>
</div>
<div class="d-block d-lg-none">
    <div class="row">
        <div class="col-12">
          <h3 class="crimsonbg order-1 whiteText text-center" style="padding-bottom:0.25%;">Our project</h3>
</div>
<div class="col-12">
            <img src="..\images\30anniversary.jpg" alt="UKTC" height="300" title="The Vocational School of Computer Technology in the city of Pravets" class="img-fluid">
        </div>
          <br>
          <div class="col-12">
            <p>We're a group of three students from the Vocational School of Computer Technology in the city of Pravets, Bulgaria and this is our
 course project. As huge fans of MMA as a sport, we decided something related to it would be a suitable theme 
 for out project as it'd keep us excited and motivated. USF(UKTC Students Figthing) is a Bulgarian mixed martial arts (MMA) 
 promotion company based in the dorms of UKTC. It is owned and operated by Martin Yordanov, Kristiyan Yordanov and Stivan Borisov.
 It produces events in Bulgaria that showcase 8 weight divisions and abides no rules whatsoever. As of 2023 it hasn't hosted any events and is yet to
  schedule the first one. The company is still filling its roster, which will include all three of the corporation's founders and more. <br></p>
 <p class="italicText">Disclaimer: We do not organise real fights and do not encourage such activity in our school.</p>
</div>
    </div>
    <div class="row" style="padding-top:5%;">
    <div class="col-12">
    <h3 class="crimsonbg whiteText text-center" style="padding-bottom:0.25%;">What is MMA?</h3>
</div>
    <div class="col-12">
            <img src="..\images\GettyImages-1416166454-1024x631.jpg" alt="Leon Edwards knocks out Kamaru Usman with head kick to win 
            UFC welterweight title" height="300" title="Leon Edwards knocks out Kamaru Usman with head kick to win UFC welterweight title" class="img-fluid">
    </div>
    <div class="col-12">
          <p>Mixed martial arts (MMA) is a full-contact combat sport based on striking, grappling and ground fighting, incorporating 
            techniques from various combat sports from around the world. The first documented use of the term 
            mixed martial arts was in a review of UFC 1 by television critic Howard Rosenberg in 1993 Originally promoted as a 
            competition to find the most effective martial arts for real unarmed combat, competitors from different fighting styles were 
            pitted against one another in contests with relatively few rules. Later, individual fighters incorporated multiple martial 
            arts into their style. MMA promoters were pressured to adopt additional rules to increase competitors' safety, 
            to comply with sport regulations and to broaden mainstream acceptance of the sport. Following these changes, the sport has 
            seen increased popularity with a pay-per-view business that rivals boxing and professional wrestling..</p>
</div>
<div class="row" style="padding-top:5%;padding-bottom:2%">
        <div class="col-12">
          <h3 class="crimsonbg whiteText text-center" style="padding-bottom:0.25%;">Our goals</h3>
          </div
          <div class="col-12">
            <img src="..\images\Screenshot_54.png" alt="BKS bate" height="300" title="Ph" class="img-fluid">
        </div>
        <div class="col-12">
            <p>First and foremost, our primary goal is to get an excellent grade with this project. We also want to make sure we
              provide entertaining fights and assure the fans they'll get their money's worth. After that, our next goal would to
              expand to multiple countries across Europe and eventually become the largest MMA promotion on the continent. We
            want to keep the passion for the sport alive and further popularise it in our home country Bulgaria. We'd like to improve our venues
            and expand our roster with new younger or experienced fighters and maybe even create our own MMA gyms to train new ambitious sportsmen. 
          Our final ambition would be to conquer the market and challenge the most famouse promotions like
          'UFC' and ' ONE Championship'.</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
    <footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
</body>
</html>
