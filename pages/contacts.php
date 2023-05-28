<?php


session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>USF-Contacts</title>
    <meta charset="UTF-8">
    <meta name="description" content="Contacts page of the USF - UKTC STUDENT FIGHTS">
    <meta name="keywords" content="usf, uktc, fights, email, phone number, contacts, information, mma, mma promotions">
    <meta name="author" content="Martin Yordanov 19315, Kristiyan Yordanov 19313, Stivan Borisov 19321">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>
  <header>
    <?php 
    include "../components/header.html" 
    ?>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="contacts-heading">CONTACTS</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>If you wish to contact the USF in regard to any question or suggestions you have for us, you can do so:</p>
            <address>
              via email: <a href="mailto:usf-contact@gmail.com" class="">usf-contact@gmail.com</a><br>
              via phone: <a href="tel:+359 87 817 2705">+359 87 817 2705</a><br>
              Or through messaging us on one of our social media profiles:<br>
              <a class="fa-brands fa-facebook" href="https://www.facebook.com/martiyordanov2005/"></a>
              <a class="fa-brands fa-instagram" href="https://www.instagram.com/marto__yordanov/"></a>
            </address>
          
        </div>
      </div>
    </div>
  </main>
  
    <footer>
      <?php 
      include "../components/footer.html" 
      ?>
    </footer>
</body>

</html>