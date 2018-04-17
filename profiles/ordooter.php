<!DOCTYPE html>
<?php
if(!isset($_GET['id'])){
    require '../db.php';
}else{
    require 'db.php';
}
try {
    $sql = 'SELECT * FROM interns_data,secret_word WHERE username ="'.'ordooter'.'"';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Butu Ordooter" content="">

    <title>Butu Ordooter</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vhttps://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">



  </head>

  <body>

    <!-- Header -->
    <section class="bg-secondary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="http://i1074.photobucket.com/albums/w416/Butu_Ordooter_A/profile1_zpsblk9vlnz.png" alt="">
        <h1 class="text-uppercase mb-0"><?php echo ($data['name']); ?></h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0"><?php echo ("Web Developer -  DevOps Engineer - Backend Engineer"); ?></h2>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">My Current Date is: <?php echo date("D M d, Y G:i a"); ?></h2>
      </div>
    </section>

   

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Butu Ordooter is an experienced Professional In Information Communication Technology with a demonstrated history of working in the industry. Full Stack Web Developer skilled in DevOps, Software Development, </p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">System Administration, Ruby, PHP, Python, Scrum Agile, Web Technologies, Operating Systems, Blockchains, Cryptocurrencies and HTML. Strong entrepreneurship professional with a B.Sc. Computer Science from Benue State University, Makurdi.</p>
          </div>
        </div>
      </div>
    </section>


   

  </body>

</html>
