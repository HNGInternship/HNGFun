<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'Bosman'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>::HNG FUN/ Bosman Profile Page</title>

    <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


      <!-- Custom fonts for this template -->
  <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
      <link href="css/style2.css" rel="stylesheet">
      <link href="css/style1.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/learn.css" rel="stylesheet">
<!--    <link href="css/carousel.css" rel="stylesheet">-->
      <link href="css/landing-page.min.css" rel="stylesheet">
      <style type="text/css">
        body{
          background-image: url(http://res.cloudinary.com/bosmanrule/image/upload/v1524692721/06.jpg);
        }

        .row.title {
           padding: 0 20px;
        }

        .text-center {
            text-align: center;
            background: #fff;
            margin-bottom: 20px;
            padding: 20px;
            width: 100%

        }

        .margin-top {
            margin-top: 50px;
        }

       /* h2 {
            font-size: 48px;
            color: #fff;
            position: relative;
        }*/
        .img-circle {
            border-radius: 50%;
        }
        .intro{
          background-color: #fff;
          position: absolute;
          padding: 20px;
        }

        .fa{
          padding: 0 10px;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
                touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
               -moz-user-select: none;
                -ms-user-select: none;
                    user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
          }
          .btn:focus,
          .btn:active:focus,
          .btn.active:focus,
          .btn.focus,
          .btn:active.focus,
          .btn.active.focus {
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
          }
          .btn:hover,
          .btn:focus,
          .btn.focus {
            color: #333;
            text-decoration: none;
          }
          .btn:active,
          .btn.active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
                    box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
          }
          .btn.disabled,
          .btn[disabled],
          fieldset[disabled] .btn {
            cursor: not-allowed;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
                    box-shadow: none;
            opacity: .65;
          }
          a.btn.disabled,
          fieldset[disabled] a.btn {
            pointer-events: none;
          }
          .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
          }
          .btn-default:focus,
          .btn-default.focus {
            color: #333;
            background-color: #e6e6e6;
            border-color: #8c8c8c;
          }
          .btn-default:hover {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
          }
          .btn-default:active,
          .btn-default.active,
          .open > .dropdown-toggle.btn-default {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
          }
          .btn-default:active:hover,
          .btn-default.active:hover,
          .open > .dropdown-toggle.btn-default:hover,
          .btn-default:active:focus,
          .btn-default.active:focus,
          .open > .dropdown-toggle.btn-default:focus,
          .btn-default:active.focus,
          .btn-default.active.focus,
          .open > .dropdown-toggle.btn-default.focus {
            color: #333;
            background-color: #d4d4d4;
            border-color: #8c8c8c;
          }
          .btn-default:active,
          .btn-default.active,
          .open > .dropdown-toggle.btn-default {
            background-image: none;
          }
          .btn-default.disabled:hover,
          .btn-default[disabled]:hover,
          fieldset[disabled] .btn-default:hover,
          .btn-default.disabled:focus,
          .btn-default[disabled]:focus,
          fieldset[disabled] .btn-default:focus,
          .btn-default.disabled.focus,
          .btn-default[disabled].focus,
          fieldset[disabled] .btn-default.focus {
            background-color: #fff;
            border-color: #ccc;
          }
          .btn-default .badge {
            color: #fff;
            background-color: #333;
          }
          .btn-primary {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
          }
          .btn-primary:focus,
          .btn-primary.focus {
            color: #fff;
            background-color: #286090;
            border-color: #122b40;
          }
          .btn-primary:hover {
            color: #fff;
            background-color: #286090;
            border-color: #204d74;
          }

          footer{
            display: none;
            visibility: hidden;
          }
      </style>

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">HNG FUN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="learn.php">Learn</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="listing.php">Interns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonies.php">Testimonies</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="text-center">
          <h2 class="site-heading">User Profile Page</h2>
        </div>
      </div>
      
    </div>
    <div class="container">  
      <div class="row">
        
        <div class="col-md-3">
          
            <div class="intro">
              <img class="img-rounded" src="http://res.cloudinary.com/bosmanrule/image/upload/v1524654463/bosman.jpg">
              <h5>Babatunde Olatunbosun </h5>
              
              
              <p><a href="https://twitter.com/bosmanrule"><i class="fa fa-twitter" style="font-size:36px"></i></a><a href="https://www.facebook.com/babatunde.bosun"><i class="fa fa-facebook" style="font-size:36px"></i></a><a href="https://github.com/bosmanrule"><i class="fa fa-github" style="font-size:36px"></i></a><a href=""><i class="fa fa-slack" style="font-size:36px"></i></a></p>
            </div>
          
        </div>
        <div class="col-md-1">
          
        </div>
        <div class="col-md-8">

         <div class="intro">
           <H4> HI, MY NAME IS BOSMAN. I AM A
            DESIGNER & DEVELOPER</H4>
            <p>I have experience and understanding working with HTML, CSS ,MYSQL, PHP and JavaScript . Exceptional knowledge of the latest Adobe Creative Suite (Photoshop, Illustrator, Fireworks).This site showcase some of my works. </p>
            <p><a class="btn btn-default btn-primary" data-wow-delay=".9s" href="#works">View Works</a></p>
         </div>

          
        </div>
      </div>
    </div>

</body>

</html>

    