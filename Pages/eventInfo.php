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
$_SESSION['event_id']=$_GET['event'];
$title=mysqli_query($connection, "Select name from event where id='{$_SESSION["event_id"]}'");
$title=$title->fetch_assoc();
$allFights=mysqli_query($connection, "Select fight.id from fight join event on fight.Event_id=event.id where event.id='{$_SESSION["event_id"]}'");

?>
<!doctype html>
<html>

<head>
    <title><?php Echo $title['name']; ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Events page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, mma, mma promotions">
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
    <main>
      <h1 class="events-header"><?php echo $title['name'] ?>    FIGHT CARD</h1>
  <?php 
while ($row = $allFights->fetch_assoc()){

$f1=mysqli_query($connection, "Select * from fighter join fight on fighter1id=fighter.id where fight.id='{$row["id"]}'");
$fighter1=$f1->fetch_assoc();
$f2=mysqli_query($connection, "Select * from fighter join fight on fighter2id=fighter.id where fight.id='{$row["id"]}'");
$fighter2=$f2->fetch_assoc();
$fightRow=mysqli_query($connection, "Select * from fight where id='{$row["id"]}'");
$fightRow=$fightRow->fetch_assoc();
$time=mysqli_query($connection, "SELECT time, SUBSTRING(time ,1,5) FROM kp.fight where fight.id={$row['id']};");
$time=$time->fetch_assoc();
$time=$time['SUBSTRING(time ,1,5)'];?>
<div class="container-fluid events-container ">
<div class="d-md-block d-none">
  <div class="row">
    <div class="col-3">
    <img src="../images/<?php echo $fighter1['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter1["firstName"]." ".$fighter1["lastName"]?>">
    </div>
    <div class="col-6 text-center">
      <p class="fighter-names"><?php echo $fighter1["firstName"]." ".$fighter1["lastName"]." vs ".$fighter2["firstName"]." ".$fighter2["lastName"];?> </p>
      <div class="container fight-info-container">
        <div class="row">
          <p class="fighter-names">Fight info</p>
          <p class="no-margin-padding"><span class="fight-info-text">Time: </span><span class="fight-info-numbers"><?php echo $time ?></span></p>
          <p class="no-margin-padding"><span class="fight-info-text">Weight class: </span><span class="fight-info-numbers"><?php echo $fightRow['weight_class']; ?></span></p>
          <div class="col">
          <ul class="fight-info-numbers" style="text-align:start">
              <li><?php echo $fighter1["height"]?>cm</li>
              <li><?php echo $fighter1["weight"]?>kg</li>
              <li><?php echo $fighter1["class"]?></li>
              <li><?php echo $fighter1["roomNum"]?></li>
            </ul>
          </div>
          <div class="col">
            <ul class="text-center fight-info-text">
              <li>Height</li>
              <li>Weight</li>
              <li>Course</li>
              <li>Room</li>
            </ul>
          </div>
          <div class="col" style="text-align:end;">
          <ul class="fight-info-numbers" style="text-align:end">
              <li><?php echo $fighter2["height"]?>cm</li>
              <li><?php echo $fighter2["weight"]?>kg</li>
              <li><?php echo $fighter2["class"]?></li>
              <li><?php echo $fighter2["roomNum"]?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 fighter-2-align">
    <img src="../images/<?php echo $fighter2['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter2["firstName"]." ".$fighter2["lastName"]?>">
    </div>
  </div>
  </div>
  <div class="d-block d-md-none">
  <div class="row row-border text-center">
    <div class="col ">
      <p class="fighter-names"><?php echo $fighter1["firstName"]." ".$fighter1["lastName"]." vs ".$fighter2["firstName"]." ".$fighter2["lastName"];?> </p>
    </div>
  </div>
  <div class="row row-border event-background-mobile">
    <div class="col">
      <img src="../images/<?php echo $fighter1['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter1["firstName"]." ".$fighter1["lastName"]?>">
    </div>
    <div class="col fighter-2-align">
      <img src="../images/<?php echo $fighter2['picture_name']?>" class="events-fighter-picture" alt="<?php echo $fighter2["firstName"]." ".$fighter2["lastName"]?>">
    </div>
  </div>
  <div class="row text-center">
  <p class="fighter-names">Fight info</p>
          <p class="no-margin-padding"><span class="fight-info-text">Time: </span><span class="fight-info-numbers"><?php echo $time ?></span></p>
          <p class="no-margin-padding"><span class="fight-info-text">Weight class: </span><span class="fight-info-numbers"><?php echo $fightRow['weight_class']; ?></span></p>
          <div class="col">
          <ul class="fight-info-numbers" style="text-align:start">
              <li><?php echo $fighter1["height"]?>cm</li>
              <li><?php echo $fighter1["weight"]?>kg</li>
              <li><?php echo $fighter1["class"]?></li>
              <li><?php echo $fighter1["roomNum"]?></li>
            </ul>
          </div>
          <div class="col">
            <ul class="text-center fight-info-text">
              <li>Height</li>
              <li>Weight</li>
              <li>Course</li>
              <li>Room</li>
            </ul>
          </div>
          <div class="col" style="text-align:end;">
          <ul class="fight-info-numbers" style="text-align:end">
              <li><?php echo $fighter2["height"]?>cm</li>
              <li><?php echo $fighter2["weight"]?>kg</li>
              <li><?php echo $fighter2["class"]?></li>
              <li><?php echo $fighter2["roomNum"]?></li>
            </ul>
</div>
  </div>
  </div>
</div>


<?php
// close while loop 
}
?>
    <br>
    </main>
    <footer class="position-static bottom-0 start-0 end-0">
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
    </body>
</html>