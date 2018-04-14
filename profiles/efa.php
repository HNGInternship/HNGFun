<?php include("header.php"); ?>

<!DOCTYPE html>
<html>
<title>Efa Eleng</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
.w3-sidebar {width: 120px;background: #222;}

#main {margin-left: 120px}

@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black">


<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  
  <img src="http://res.cloudinary.com/sage001/image/upload/v1523650843/C360_2015-12-19-12-25-12-665.jpg" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<div class="w3-padding-large" id="main">
 
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Efa Eleng </span></h1>
        <img src="http://res.cloudinary.com/sage001/image/upload/v1523650843/C360_2015-12-19-12-25-12-665.jpg" alt="Efa Eleng" class="w3-image" width="300" height="200">
  </header>


  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">About</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>I'm a web and developer, FullStack Enthusiast and an Aspiring Data Scientist
    </p>
    
    <h3 class="w3-padding-16 w3-text-light-grey">My Skills</h3>
    <p class="w3-wide">HTML 5</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:95%"></div>
    </div>
    <p class="w3-wide">CSS/CSS3</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:85%"></div>
    </div>
    <p class="w3-wide">JavaScript</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:50%"></div>
    </div><br>
    
      
  
  

  <!-- Contact Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">Contact Me</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Lagos, Nigeria</p>
      <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: 07067860296</p>
      <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: gistend@gmail.com</p>
    </div><br>
    <p>Send me a message</p>

    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  <!-- End Contact Section -->
  </div>
  
    <!-- Footer -->
    
       
   <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <!-- <i class="fa fa-facebook-official icon-square w3-hover-opacity"></i>
    <i class="fa fa-instagram icon-square w3-hover-opacity"></i>
    <i class="fa fa-twitter icon-square w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i> -->
    <p class="w3-medium">Designed by <a href="#" target="_blank" class="w3-hover-text-green">Efa Eleng</a></p>
  <!-- End footer -->
  </footer>
  
    <?php include("footer.php"); ?>


</div>

</body>
</html>
