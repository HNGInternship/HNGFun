<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Isaac Miti | HNG 4 Internship</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="screen">
      header {
          text-align: center;
          color: #fff;
          background: #176DAA;
      }
      .img {
        margin: 50px auto;
        border: 10px solid rgba(255, 255, 255, 0.3);
      }
      .intro {
        margin-bottom: 40px;
      }
      section.success {
          color: #fff;
          background: #B788B4; /*Purple colour*/
          padding: 40px;
      }
      /*Button Styles*/
      .btn-outline {
          margin-top: 10px;
          font-size: 20px;
          color: #000;
          transition: all .3s ease-in-out;
          display: inline-block;
          width: 50px;
          height: 50px;
          border: 2px solid #fff;
          background: #fff;
          border-radius: 100%;
          text-align: center;
          line-height: 45px;
      }

      .btn-outline:hover,
      .btn-outline:focus,
      .btn-outline:active,
      .btn-outline.active {
          border: solid 2px #f00;
          color:#fff;
          background: #f00;
      }
      #contact {
        background: rgba(0, 0, 0, 0.8);
      }

      #contact h2 {
        color: #fff;
      }

      .list-inline {
        margin: 10px auto;
      }
      .skills img, h4 {
        margin: 30px auto;
      }
    </style>
  </head>
  <body>
   <?php
   $qry = "SELECT * FROM secret_word";
   $query = $conn->query($qry);
   $query->setFetchMode(PDO::FETCH_ASSOC);
   $result = $query->fetch();
   $secret_word = $result['secret_word'];

   try {
       $qry2 = 'SELECT name,username,image_filename FROM interns_data WHERE username="knight"';
       $q2 = $conn->query($qry2);
       $q2->setFetchMode(PDO::FETCH_ASSOC);
       $data = $q2->fetch();
   } catch (PDOException $e) {
       throw $e;
   }

   ?>
    <!-- Header -->
    <header>
    <h1 class="text-center"><?php echo $data['username']; ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img class="img-responsive img-circle img" src="<?php echo $data['image_filename']; ?>" alt="" width="350">
                    <div class="intro">
                        <span><?php echo $data['name']; ?></span>
                        <hr class="starh-light">
                        <span class="skills">Full Stack Developer - Graphic Designer - UI Designer - UX Designer - Windows Developer - Database Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="skills">
      <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <h4>Web Design</h4>
          <img src="http://res.cloudinary.com/ikayz/image/upload/v1523831178/pexels-photo-326424.jpg" class="img-responsive" alt="Image">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <h4>Graphic Design</h4>
          <img src="http://res.cloudinary.com/ikayz/image/upload/v1523831589/designer-board-typo-word.jpg" class="img-responsive" alt="Image">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <h4>UI Design</h4>
          <img src="http://res.cloudinary.com/ikayz/image/upload/v1523831178/pexels-photo-326424.jpg" class="img-responsive" alt="Image">
        </div>
        </div>
      </div>
    </section>
    <!-- About Section -->
    <section class="success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Ikayz is a Full Stack Developer, graphics designer, UI designer, C# Developer, and windows developer. I am passionate about good user experience in web development, apps and mobile. I have an eye for great detail and design. I see the world as colour in everything I do.</p>
                </div>
                <div class="col-lg-4">
                    <p>I hope and strive to be the best in what I do. Being an expert data scientist in the future  is part of my plans, can't wait to see what I'll build next.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-offset-4">
              <h2>Connect &amp; Share <i class="fa fa-share"></i></h2>
              <hr>
              <ul class="list-inline">
                  <li>
                      <a href="https://facebook.com/isaac.ikayz" class="btn-outline">
                          <i class="fa fa-facebook"></i>
                      </a>
                  </li>
                  <li>
                      <a href="https://github.com/ikayz" class="btn-outline">
                          <i class="fa fa-github"></i>
                      </a>
                  </li>
                  <li>
                      <a href="https://twitter.com/ikayz" class="btn-outline">
                          <i class="fa fa-twitter"></i>
                      </a>
                  </li>
              </ul>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          </div>
        </div>
      </div>
    </section>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="Hello World"></script>
  </body>
</html>
