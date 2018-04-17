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

    <!-- Custom styles for this template -->
    <style type="text/css">
      body{font-family:Lato}h1,h2,h3,h4,h5,h6{font-weight:700;font-family:Montserrat}hr.star-dark,hr.star-light{max-width:15rem;padding:0;text-align:center;border:none;border-top:solid .25rem;margin-top:2.5rem;margin-bottom:2.5rem}hr.star-dark:after,hr.star-light:after{position:relative;top:-.8em;display:inline-block;padding:0 .25em;content:'\f005';font-family:FontAwesome;font-size:2em}hr.star-light{border-color:#fff}hr.star-light:after{color:#fff;background-color:#18bc9c}hr.star-dark{border-color:#2c3e50}hr.star-dark:after{color:#2c3e50;background-color:#fff}section{padding:6rem 0}section h2{font-size:2.25rem;line-height:2rem}@media (min-width:992px){section h2{font-size:3rem;line-height:2.5rem}}a{color:#18bc9c}a:active,a:focus,a:hover{color:#128f76}.btn{border-width:2px}.bg-primary{background-color:#18bc9c!important}.bg-secondary{background-color:#2c3e50!important}.text-primary{color:#18bc9c!important}.text-secondary{color:#2c3e50!important}.btn-primary{background-color:#18bc9c;border-color:#18bc9c}.btn-primary:active,.btn-primary:focus,.btn-primary:hover{background-color:#128f76;border-color:#128f76}.btn-secondary{background-color:#2c3e50;border-color:#2c3e50}.btn-secondary:active,.btn-secondary:focus,.btn-secondary:hover{background-color:#1a252f;border-color:#1a252f}
    </style>

  </head>

  <body>

    <!-- Header -->
    <header class="bg-secondary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="http://i1074.photobucket.com/albums/w416/Butu_Ordooter_A/profile1_zpsblk9vlnz.png" alt="">
        <h1 class="text-uppercase mb-0"><?php echo ($data['name']); ?></h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0"><?php echo ("Web Developer -  DevOps Engineer - Backend Engineer"); ?></h2>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">My Current Date is: <?php echo date("D M d, Y G:i a"); ?></h2>
      </div>
    </header>

   

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
