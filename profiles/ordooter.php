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
      body{font-family:Lato}h1,h2,h3,h4,h5,h6{font-weight:700;font-family:Montserrat}hr.star-dark,hr.star-light{max-width:15rem;padding:0;text-align:center;border:none;border-top:solid .25rem;margin-top:2.5rem;margin-bottom:2.5rem}hr.star-dark:after,hr.star-light:after{position:relative;top:-.8em;display:inline-block;padding:0 .25em;content:'\f005';font-family:FontAwesome;font-size:2em}hr.star-light{border-color:#fff}hr.star-light:after{color:#fff;background-color:#18bc9c}hr.star-dark{border-color:#2c3e50}hr.star-dark:after{color:#2c3e50;background-color:#fff}section{padding:6rem 0}section h2{font-size:2.25rem;line-height:2rem}@media (min-width:992px){section h2{font-size:3rem;line-height:2.5rem}}.btn-xl{padding:1rem 1.75rem;font-size:1.25rem}.btn-social{width:3.25rem;height:3.25rem;font-size:1.25rem;line-height:2rem}.scroll-to-top{z-index:1042;right:1rem;bottom:1rem;display:none}.scroll-to-top a{width:3.5rem;height:3.5rem;background-color:rgba(33,37,41,.5);line-height:3.1rem}#mainNav{padding-top:1rem;padding-bottom:1rem;font-weight:700;font-family:Montserrat}#mainNav .navbar-brand{color:#fff}#mainNav .navbar-nav{margin-top:1rem;letter-spacing:.0625rem}#mainNav .navbar-nav li.nav-item a.nav-link{color:#fff}#mainNav .navbar-nav li.nav-item a.nav-link:hover{color:#18bc9c}#mainNav .navbar-nav li.nav-item a.nav-link:active,#mainNav .navbar-nav li.nav-item a.nav-link:focus{color:#fff}#mainNav .navbar-nav li.nav-item a.nav-link.active{color:#18bc9c}#mainNav .navbar-toggler{font-size:80%;padding:.8rem}@media (min-width:992px){#mainNav{padding-top:1.5rem;padding-bottom:1.5rem;-webkit-transition:padding-top .3s,padding-bottom .3s;-moz-transition:padding-top .3s,padding-bottom .3s;transition:padding-top .3s,padding-bottom .3s}#mainNav .navbar-brand{font-size:2em;-webkit-transition:font-size .3s;-moz-transition:font-size .3s;transition:font-size .3s}#mainNav .navbar-nav{margin-top:0}#mainNav .navbar-nav>li.nav-item>a.nav-link.active{color:#fff;background:#18bc9c}#mainNav .navbar-nav>li.nav-item>a.nav-link.active:active,#mainNav .navbar-nav>li.nav-item>a.nav-link.active:focus,#mainNav .navbar-nav>li.nav-item>a.nav-link.active:hover{color:#fff;background:#18bc9c}#mainNav.navbar-shrink{padding-top:.5rem;padding-bottom:.5rem}#mainNav.navbar-shrink .navbar-brand{font-size:1.5em}}header.masthead{padding-top:calc(6rem + 72px);padding-bottom:6rem}header.masthead h1{font-size:3rem;line-height:3rem}header.masthead h2{font-size:1.3rem;font-family:Lato}@media (min-width:992px){header.masthead{padding-top:calc(6rem + 106px);padding-bottom:6rem}header.masthead h1{font-size:4.75em;line-height:4rem}header.masthead h2{font-size:1.75em}}.portfolio{margin-bottom:-15px}.portfolio .portfolio-item{position:relative;display:block;max-width:25rem;margin-bottom:15px}.portfolio .portfolio-item .portfolio-item-caption{-webkit-transition:all ease .5s;-moz-transition:all ease .5s;transition:all ease .5s;opacity:0;background-color:rgba(24,188,156,.9)}.portfolio .portfolio-item .portfolio-item-caption:hover{opacity:1}.portfolio .portfolio-item .portfolio-item-caption .portfolio-item-caption-content{font-size:1.5rem}@media (min-width:576px){.portfolio{margin-bottom:-30px}.portfolio .portfolio-item{margin-bottom:30px}}.portfolio-modal .portfolio-modal-dialog{padding:3rem 1rem;min-height:calc(100vh - 2rem);margin:1rem calc(1rem - 8px);position:relative;z-index:2;-moz-box-shadow:0 0 3rem 1rem rgba(0,0,0,.5);-webkit-box-shadow:0 0 3rem 1rem rgba(0,0,0,.5);box-shadow:0 0 3rem 1rem rgba(0,0,0,.5)}.portfolio-modal .portfolio-modal-dialog .close-button{position:absolute;top:2rem;right:2rem}.portfolio-modal .portfolio-modal-dialog .close-button i{line-height:38px}.portfolio-modal .portfolio-modal-dialog h2{font-size:2rem}@media (min-width:768px){.portfolio-modal .portfolio-modal-dialog{min-height:100vh;padding:5rem;margin:3rem calc(3rem - 8px)}.portfolio-modal .portfolio-modal-dialog h2{font-size:3rem}}.floating-label-form-group{position:relative;border-bottom:1px solid #e9ecef}.floating-label-form-group input,.floating-label-form-group textarea{font-size:1.5em;position:relative;z-index:1;padding-right:0;padding-left:0;resize:none;border:none;border-radius:0;background:0 0;box-shadow:none!important}.floating-label-form-group label{font-size:.85em;line-height:1.764705882em;position:relative;z-index:0;top:2em;display:block;margin:0;-webkit-transition:top .3s ease,opacity .3s ease;-moz-transition:top .3s ease,opacity .3s ease;-ms-transition:top .3s ease,opacity .3s ease;transition:top .3s ease,opacity .3s ease;vertical-align:middle;vertical-align:baseline;opacity:0}.floating-label-form-group:not(:first-child){padding-left:14px;border-left:1px solid #e9ecef}.floating-label-form-group-with-value label{top:0;opacity:1}.floating-label-form-group-with-focus label{color:#18bc9c}form .row:first-child .floating-label-form-group{border-top:1px solid #e9ecef}.footer{padding-top:5rem;padding-bottom:5rem;background-color:#2c3e50;color:#fff}.copyright{background-color:#1a252f}a{color:#18bc9c}a:active,a:focus,a:hover{color:#128f76}.btn{border-width:2px}.bg-primary{background-color:#18bc9c!important}.bg-secondary{background-color:#2c3e50!important}.text-primary{color:#18bc9c!important}.text-secondary{color:#2c3e50!important}.btn-primary{background-color:#18bc9c;border-color:#18bc9c}.btn-primary:active,.btn-primary:focus,.btn-primary:hover{background-color:#128f76;border-color:#128f76}.btn-secondary{background-color:#2c3e50;border-color:#2c3e50}.btn-secondary:active,.btn-secondary:focus,.btn-secondary:hover{background-color:#1a252f;border-color:#1a252f}
    </style>

  </head>

  <body id="page-top">

    <!-- Header -->
    <header class="masthead bg-secondary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="http://i1074.photobucket.com/albums/w416/Butu_Ordooter_A/profile1_zpsblk9vlnz.png" alt="">
        <h1 class="text-uppercase mb-0">@<?php echo ($data['username']); ?></h1>
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
