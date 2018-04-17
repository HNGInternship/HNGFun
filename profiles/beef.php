<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
<?php
require('db.php');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'Beef'");
if($result)    $my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
?>


	

	

<!DOCTYPE html>
<html>
<head>
<title>Beef</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif;}
.w3-row-padding img {margin-bottom: 12px;}
.w3-sidebar {width: 120px;background: #222;}
#main {margin-left: 120px;}
@media only screen and (max-width: 600px) {#main {margin-left: 0;}}
</style>
  
</head>
<body class="w3-indigo">
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  
  <img src="http://res.cloudinary.com/beef4/image/upload/v1523636064/IMG_20180401_123150.jpg" style="width:100%">
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
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>
<div class="w3-padding-large" id="main">
 
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Bifarin Alayonimi </span></h1>
        <img src="http://res.cloudinary.com/beef4/image/upload/v1523636064/IMG_20180401_123150.jpg" alt="Beef" class="w3-image" width="300" height="200">
  </header>
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">About</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>I'm a Web Developer, Adobe Certified Associate
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
    <p class="w3-wide">PHP</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:92%"></div>
    </div>
	
   





  
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">Contact Me</h2>
    <hr style="width:200px" class="w3-opacity">
    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Ile-Ife Nigeria</p>
      <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: 08168206382</p>
      <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email:alayonimibifarin@yahoo.com</p>
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
  
  </div>  
    
   <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <!-- <i class="fa fa-facebook-official icon-square w3-hover-opacity"></i>
    <i class="fa fa-instagram icon-square w3-hover-opacity"></i>
    <i class="fa fa-twitter icon-square w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i> -->
    <p class="w3-medium">Designed by <a href="#" target="_blank" class="w3-hover-text-green">BeefWeb</a></p>
  
  </footer>  
</div>
</body>
</html>
<<<<<<< HEAD
=======
<!DOCTYPE html>
<html>
  <head>
    <style>
    /* Desktop */

body {
    position: fixed;
    width: 100%;
    height: 100%;
    background: Blue;
}
/*    Hello World, HNG STAGE 3 */
p {
    position: absolute;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    left: 25%;

    font-family: Roboto Slab;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 50px;

    color: White;
}
/* Rectangle */
box {
    position: absolute;
    align-items: center;
    justify-content: center;
    left: 28%;
    top: 40%;
    font-size: 37px;
    color: white;
    padding: 50px;

    background: Brown;
}
</style>
    <title></title>
    <meta content="">
  </head>
  <body>
  <p>Hello World, HNG STAGE 3 </p>
  <box><?php
echo "Today's Date is " . date("F j, Y, g:i a") . "<br>";
?>
</box>
  </body>
</html>
>>>>>>> b2bbe46b15fc26a9eb4bb2d3c3786788727f0b54
=======
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
