<?php
 require 'db.php';

$username = "umaryusuf";

 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sql0 = "SELECT * FROM `secret_word` LIMIT 1";

$stmt0 = $conn->prepare($sql0);
$stmt0->execute();


$data = $stmt0->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />
  <meta name="author" content="Umar Yusuf" />

  <title>Umar Yusuf</title>

  <!-- shortcut icon -->
  <link rel="shortcut icon" href="" />

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.2.43/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <style>
     body{
        font-family: ubuntu;
        background-color: #fcfcfc;
      }

      nav ul a,
      nav .brand-logo {
        color: #444;
      }
      .brand-logo{
        font-family: pacifico;
      }
      p {
        line-height: 2rem;
      }

      .button-collapse {
        color: #26a69a;
      }
      .block{
        width: 100%;
      }
      .desc{
        font-weight: bold;
      }
      .parallax-container {
        min-height: 360px;
        line-height: 0;
        height: auto;
        color: rgba(255,255,255,.9);
      }
      .round{
        padding: 10px;
        background-color: #ffab40;
        border-radius: 10px;
      }
      .photo{
        width: 300px;
      }
      .card-title{
        color: #ffab40 !important;
        font-weight: bold !important;
      }
      .parallax-container .section {
        width: 100%;
      }

      @media only screen and (max-width : 992px) {
        .parallax-container .section {
          position: absolute;
          top: 40%;
        }
        #index-banner .section {
          top: 10%;
        }
      }

      @media only screen and (max-width : 600px) {
        #index-banner .section {
          top: 0;
        }
        .photo{
          width: 150px;
        }
        h1{
          font-size: 2em;
        }
      }

      .icon-block {
        padding: 0 15px;
      }
      .icon-block .material-icons {
        font-size: inherit;
      }

      footer.page-footer {
        margin: 0;
      }
  </style>
</head>
<body>

  <div id="index-banner" class="parallax-container">
    <div  class="section no-pad-bot scrollspy" id="about">
      <div class="container center">
        <br>
        <img src="<?php echo $result['image_filename'] ?>" class="circle responsive-img photo" alt="umar yusuf">
        <h1 class="header center text-lighten-2 "><?php echo $result['name']; ?></h1>
        <h5 class="center">@<?php echo $result['username']; ?></h5>
        <div class="row center">
          <h5 class="header col s12 orange-text accent-2 flow-text desc">Hello!, I'am Umar Yusuf web application developer based in Kaduna Nigeria, I provide application development, enhancement, and I also accept paid work.</h5>
        </div>
        
        <br>
      </div>
    </div>
    <div class="parallax"><img src="https://images.pexels.com/photos/370799/pexels-photo-370799.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <h4 class="center-align orange-text accent-2">Languages & Skills</h4>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center orange-text accent-2"><i class="mdi mdi-flash"></i></h2>
            <ul class="collection">
              <li class="collection-item">
                <div>HTML
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-html5"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>CSS
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>JavaScript
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-javascript"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>PHP
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-php"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>SQL
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-tags"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Mongodb
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-tags"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center orange-text accent-2"><i class="mdi mdi-group"></i></h2>
            <ul class="collection">
              <li class="collection-item">
                <div>Twitter Bootstrap
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Materialize
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Foundation
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>AngularJS
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-angular"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>ReactJS
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-javascript"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Sass
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-tags"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
       
      </div>
    </div>
  </div>

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large orange accent-3">
      <i class="large mdi mdi-pencil"></i>
    </a>
    <ul>
      <li class="waves-effect waves-light">
        <a class="btn-floating blue lighten-1" href="https://www.twitter.com/umaryusufkd"><i class="mdi mdi-twitter"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating blue darken-4" href="https://web.facebook.com/umar.yusuf.3762/"><i class="mdi mdi-facebook"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating red darken-2" href="https://plus.google.com/+UmarYusufKD"><i class="mdi mdi-google-plus"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating blue darken-2" href="https://github.com/umaryusuf"><i class="mdi mdi-git"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating pink accent-1" href="https://www.instagram.com/umaryusufkd"><i class="mdi mdi-instagram"></i></a>
      </li>
    </ul>
  </div>

  <!--  Scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script>
    (function($){
        $(function(){
              
          $('.button-collapse').sideNav();
          $('.parallax').parallax();   

        }); // end of document ready
      })(jQuery); // end of jQuery name space
  </script>
  </body>
</html>
