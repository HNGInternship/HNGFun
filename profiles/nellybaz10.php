<?php
$link = mysqli_connect(DB_DATABASE, DB_USER, DB_PASSWORD);
if(!$link){
	echo "not connected";
}
else{
	echo "connected";
}

?>

<!DOCTYPE html>
<html>
<title>Nellybaz10 Profile Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: cursive;}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body onload="typeWriter()" class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="http://res.cloudinary.com/nellybaz/image/upload/v1523621863/pic1.jpg" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT ME</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>PHOTOS</p>
  </a>
  
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT ME</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
   
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 id="type-in" class="w3-jumbo"></h1>
    <p>Programmer and Enterpreneur</p>
    <img src="http://res.cloudinary.com/nellybaz/image/upload/e_art:incognito/v1523621760/nelly.jpg" style="border-radius: 50%" alt="Nelson Bassey" class="w3-image" width="300" height="400">
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">A Little About Me</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>I am passionate about technology. This passion started when I saw an advert from edx on "Intro to Python" then I thought, wow, people now learn snakes. What a world! When I got to realize that Python was a programming Language, I had already printing Hello World. That is how my love for programming began.
    </p>
    <h3 class="w3-padding-16 w3-text-light-grey">My Skills</h3>
    <p class="w3-wide">Python</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:95%"></div>
    </div>
    <p class="w3-wide">HTML/CSS</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:85%"></div>
    </div>
    <p class="w3-wide">Javascript</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:80%"></div>
    </div>
    <p class="w3-wide">PHP/MySQL</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:85%"></div>
    </div>


    <br>
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">5+</span><br>
        Web Development Projects
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">15+</span><br>
        Algorithm Designs
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">5+</span><br>
        Happy Clients
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">1000+</span><br>
        Passion for Learning
      </div>
    </div>

    <button class="w3-button w3-light-grey w3-padding-large w3-section">
      <a style="text-decoration: none;" href="https://github.com/nellybaz"> My GITHUB </a>
    </button>    
    
    </div>
    
    <!-- Testimonials 
    <h3 class="w3-padding-24 w3-text-light-grey">My Reputation</h3>  
    <img src="/w3images/bandmember.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Chris Fox.</span> CEO at Mighty Schools.</p>
    <p>Jane Doe saved us from a web disaster.</p><br>
    
    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Rebecca Flex.</span> CEO at Company.</p>
    <p>No one is better than Jane Doe.</p>
   End About Section -->
  </div>
 
  <!-- Portfolio Section -->
  <div class="w3-padding-64 w3-content" id="photos">
    <h2 class="w3-text-light-grey">My Photos</h2>
    <hr style="width:200px" class="w3-opacity">

    <!-- Grid for photos -->
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half">
        <table align="center">
          <tr>
        <td><img src="http://res.cloudinary.com/nellybaz/image/upload/v1523621863/pic1.jpg" style="width:100%"></td>
        <td><img src="http://res.cloudinary.com/nellybaz/image/upload/v1523622008/pic2.jpg" style="width:100%"></td>
        <td><img src="http://res.cloudinary.com/nellybaz/image/upload/v1523622011/pic3.jpg" style="width:100%"></td>
      </div>
      </tr>
      </table>

 <!--
      <div class="w3-half">
        <img src="/w3images/underwater.jpg" style="width:100%">
        <img src="/w3images/chef.jpg" style="width:100%">
        <img src="/w3images/wedding.jpg" style="width:100%">
        <img src="/w3images/p6.jpg" style="width:100%">
      </div>
    End photo grid -->
    </div>
  <!-- End Portfolio Section -->
  </div>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <a href="https://www.facebook.com/nellybass.1234"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://twitter.com/nelson_baz"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="www.linkedin.com/in/nelson-bassey-394a4b110"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <p style="font-size: 16px">Don't Forget to Connect</p>
    
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>


<script>
var i = 0;
var txt = "I'm Nelson Bassey.";
var speed = 100;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("type-in").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
</script>
</body>
</html>
