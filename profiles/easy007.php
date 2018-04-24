<!DOCTYPE html>
<html>
<head>
<title>Easy | Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
  box-sizing:border-box;
}
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
#about{
	text-align:center !important;
}
body >div{
	background:bisque;
	margin-bottom:1rem;
}

.bgimg{
  width: 25%;
    margin: auto;
}
.bgimg img{
  max-width:100%;
  height:auto;
}
</style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

      <div class="col-7">

<div class="content" style="margin:auto">
  <!-- Header -->
  <header class="w3-container w3-center" id="home">
    <h1 class="w3-jumbo" style="text-align:center;margin:1rem;">Name: &nbsp;&nbsp;<b>Adeniyi Yusuf</b></h1>
  </header>


  <div class="w3-content w3-justify w3-text-grey w3-text-center w3-padding-32" id="about">
    <h1 style="background: white;margin: 0 -1rem;">About</h1>
    <hr class="w3-opacity">
    <p>Student | Web developer| Computer scientist</p>

    <h2 class="w3-padding-16">My Skills</h2>
    <p class="w3-wide">HTML 5</p>
    <p class="w3-wide">CSS3</p>
    <p class="w3-wide">BootStrap</p>
    <p class="w3-wide">JQuery</p>
    <p class="w3-wide">JavaScript</p>
	<p>Nodejs</p>
    <p>Expressjs</p>
	</div>
  <!-- Contact Section -->
  <div class="w3-padding-32 w3-content w3-text-grey" id="contact" style="margin-bottom:64px; text-align:center">
    <h1 style="background: white;margin: 0 -1rem;">Contact Me</h1>
    <hr class="w3-opacity">

    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i>Lagos, Nigeria</p>
      <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i>Phone: +2348067177670</p>
      <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i>Email: easyclick05@gmail.com</p>
    </div>

    <p>Send me a message:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  <!-- End Contact Section -->
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin:-24px;text-align:center;">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Designed by <a href="#" target="_blank" class="w3-hover-text-green">Easyclick</a></p>
  </footer>

<!-- END PAGE CONTENT -->
</div>
      </div>
      <div class="col-5">

        <div class="container">
          <div class="row">
            <div class="col-12">
            <div class="bgimg">
               <img src="http://res.cloudinary.com/easy007/image/upload/v1523694330/image-1.jpg"  alt="My Image" max-width="100%" height="auto">
            </div>
            </div>

          </div>
          <div class="row">
            <div class="col-12">
            <h3>My Chatbot</h3>
            </div>

          </div>
        </div>


      </div>
</div>



<?php

try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $data['secret_word'];
?>

</body>
</html>
