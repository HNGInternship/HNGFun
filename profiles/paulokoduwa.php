<?php
require 'db.php';
$result = $conn->query("Select * from secret_word LIMIT 1");

$result = $result->fetch(PDO::FETCH_OBJ);

$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'paulokoduwa'");

$user = $result2->fetch(PDO::FETCH_OBJ);

?>


<html>
  <head>
    <title> paul okoduwa's profile </title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="bootstrap.min.css">
      <script src="bootstrap.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


 <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
      width:100%;

  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
      width:100%;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
    .navbar-brand h2{

        margin: 10px;
        color:blue;

    }

  </style>

<body>
<!-- Navbar -->
 
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="#"><h2 <style="font-family:sans-serif;">Paulcode</h2></a>
    </div>
   
  </div>
</nav>





<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Who Am I?</h3>
  <img src="http://res.cloudinary.com/ddid1emba/image/upload/v1523863491/me.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>I'm an adventurer</h3>




<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>
  I’m a digital marketing, business optimization professional,
   web developer and Entrepreneur who'll help your business GROW
  
   </p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Where To Find Me?</h3><br>
    <a href="www.facebook.com/iampaulokoduwa" class="fa fa-facebook"></a>
    <a href="www.twitter.com/paul_okoduwa" class="fa fa-twitter"></a>
    <a href="www.github.com/paulokoduwa" class="fa fa-github"></a>

    </div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>simple profile made by paul okoduwa</p> 
</footer>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>

