<<<<<<< HEAD
<<<<<<< HEAD
<?php
 require 'db.php';
$username = "Rico";
 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sqlz = "SELECT * FROM `secret_word` LIMIT 1";
$queri = $conn->prepare($sql);
$queri->execute();
$result = $queri->fetch(PDO::FETCH_ASSOC);

$queriz = $conn->prepare($sqlz);
$queriz->execute();
$data = $queriz->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Rico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
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
  .bg-img{background-image: url("https://beautifulcoolwallpapers.files.wordpress.com/2011/08/coolhdwallpapersv.jpg");
    background-size: cover;
  }
  </style>
</head>
<body>


<!-- First Container -->
<div class="bg-img container-fluid bg-1 text-center">
  <h1 class="margin"> <?php echo $result["name"]; ?> </h1>
  <img src="http://res.cloudinary.com/rico235y/image/upload/v1523722557/profile.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <strong><h2></h2></strong>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">About Me</h3>
  <p>I'm a Tech Enthusiast who has worked on multiple projects from gamedev, to automation and Ai  </p>
  
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p> &copy;2018 </p> 
</footer>

</body>
</html>

=======
<?php
 require 'db.php';
$username = "Rico";
 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sqlz = "SELECT * FROM `secret_word` LIMIT 1";
$queri = $conn->prepare($sql);
$queri->execute();
$result = $queri->fetch(PDO::FETCH_ASSOC);

$queriz = $conn->prepare($sqlz);
$queriz->execute();
$data = $queriz->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Rico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
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
  .bg-img{background-image: url("https://beautifulcoolwallpapers.files.wordpress.com/2011/08/coolhdwallpapersv.jpg");
    background-size: cover;
  }
  </style>
</head>
<body>


<!-- First Container -->
<div class="bg-img container-fluid bg-1 text-center">
  <h1 class="margin"> <?php echo $result["name"]; ?> </h1>
  <img src="http://res.cloudinary.com/rico235y/image/upload/v1523722557/profile.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <strong><h2></h2></strong>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">About Me</h3>
  <p>I'm a Tech Enthusiast who has worked on multiple projects from gamedev, to automation and Ai  </p>
  
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p> &copy;2018 </p> 
</footer>

</body>
</html>

>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
=======
<<<<<<< HEAD
<?php
 require 'db.php';
$username = "Rico";
 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sqlz = "SELECT * FROM `secret_word` LIMIT 1";
$queri = $conn->prepare($sql);
$queri->execute();
$result = $queri->fetch(PDO::FETCH_ASSOC);

$queriz = $conn->prepare($sqlz);
$queriz->execute();
$data = $queriz->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Rico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
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
  .bg-img{background-image: url("https://beautifulcoolwallpapers.files.wordpress.com/2011/08/coolhdwallpapersv.jpg");
    background-size: cover;
  }
  </style>
</head>
<body>


<!-- First Container -->
<div class="bg-img container-fluid bg-1 text-center">
  <h1 class="margin"> <?php echo $result["name"]; ?> </h1>
  <img src="http://res.cloudinary.com/rico235y/image/upload/v1523722557/profile.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <strong><h2></h2></strong>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">About Me</h3>
  <p>I'm a Tech Enthusiast who has worked on multiple projects from gamedev, to automation and Ai  </p>
  
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p> &copy;2018 </p> 
</footer>

</body>
</html>

=======
<?php
 require 'db.php';
$username = "Rico";
 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sqlz = "SELECT * FROM `secret_word` LIMIT 1";
$queri = $conn->prepare($sql);
$queri->execute();
$result = $queri->fetch(PDO::FETCH_ASSOC);

$queriz = $conn->prepare($sqlz);
$queriz->execute();
$data = $queriz->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Rico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
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
  .bg-img{background-image: url("https://beautifulcoolwallpapers.files.wordpress.com/2011/08/coolhdwallpapersv.jpg");
    background-size: cover;
  }
  </style>
</head>
<body>


<!-- First Container -->
<div class="bg-img container-fluid bg-1 text-center">
  <h1 class="margin"> <?php echo $result["name"]; ?> </h1>
  <img src="http://res.cloudinary.com/rico235y/image/upload/v1523722557/profile.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <strong><h2></h2></strong>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">About Me</h3>
  <p>I'm a Tech Enthusiast who has worked on multiple projects from gamedev, to automation and Ai  </p>
  
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p> &copy;2018 </p> 
</footer>

</body>
</html>

>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
