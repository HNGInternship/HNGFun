<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Meet MacAnthony</title>
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
  .bg-img{background-image: url("http://res.cloudinary.com/melowsoft/image/upload/v1523618404/web-design-wallpaper-background-1920x1200-3.png");
    background-size: cover;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Me</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">WHO</a></li>
        <li><a href="#">WHAT</a></li>
        <li><a href="#">WHERE</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="bg-img container-fluid bg-1 text-center">
  <h1 class="margin">Meet MacAnthony</h1>
  <img src="http://res.cloudinary.com/melowsoft/image/upload/v1523616286/tonu_2.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <strong><h2></h2></strong>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">About Me</h3>
  <p>My name is Anthony, i am a fullstack developer with a passion for Technology.
                                        The Hotels.ng internship has been very interesting, i was so excited when i heard about it, and since i signup; i have improved my skill-set 
                                    considerably. its really been fun. </p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Portfolio</h3><br>
  <div class="row">
    <div class="col-sm-4">
    <h3> Front End Developer </h3> 
      <p>Proficient in all forms of website design and templating using html, css and JavaScript. </p>
    </div>
    <div class="col-sm-4">
    <h3> Back End Developer </h3> 
      <p> A big fan of JavaScript and frameworks. I basically use node.js for server side  </p>
      
    </div>
    <div class="col-sm-4"> 
    <h3> Web App Developer </h3>
      <p>Building flexible web apps that can be use across diferent platforms. With Modern React and React </p>
      
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p> &copy;2018 </p> 
</footer>

</body>
</html>
