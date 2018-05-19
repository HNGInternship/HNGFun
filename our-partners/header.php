<?php
if(!isset($_SESSION)) { session_start(); }

// for choosing active page on nav bar

$fileName=basename($_SERVER['PHP_SELF'], ".php");

$files = array('index','learn','listing','testimonies','sponsors','alumni','partners', 'admin', 'signup', 'login');

$activeArray = array_fill(0, count($files), '');

$fileIndex=array_search($fileName,$files);


// if page is unknown, dont mark any nav item

if($fileIndex!==FALSE){

$activeArray[$fileIndex]="active";
}

/////////////////////////////////////////////////////////


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HNG FUN</title>

    <!-- Bootstrap core CSS -->

      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



      <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
   	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Work+Sans:400,900&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../assets/css/custom.css" type="text/css"> -->
    <link rel="shortcut icon" href="../images/favicon.png">

    <!-- Custom styles for this template -->
      <link href="../css/style2.css" rel="stylesheet">
      <link href="../css/style1.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/learn.css" rel="stylesheet">
      <link href="../css/custom.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/login.css">
      <link rel="stylesheet" href="../css/signout.css">
      <link href="../css/landing-page.min.css" rel="stylesheet">
      <link href="../css/shield-invite.css" rel="stylesheet">
      <link href="../css/404.css" rel="stylesheet">
      <link href="../css/contact.css" rel="stylesheet">
      <!-- <link href="css/carousel.css" rel="stylesheet"> -->


      <style>
       body {
            background-color: #FAFAFA;
            color: #3d3d3d;
            font-family: 'Lato', sans-serif;
        }
        .navbar{
          font-size: 15px;
          font-weight: bold;
          background-color: #F4F4F4;
          padding: 0 10em;
        }

        .nav-item{
            padding: 24px 15px;
            border-bottom: 3px solid #f4f4f4;
        }
        .nav-item:hover, .active {
            border-bottom: 3px solid #2196F3;
        }
        /* horizontal line learn page */
        hr.under-line {
            width: 10%;
            border-top: 3px solid #000;
        }
        .justify-space-between {
          justify-content: space-between;
        }
        .wrap {
          flex-wrap: wrap;
        }
          .btn-primary {
        border-radius: 8px;
        background-color: #2196F3;
        border-color: #2196F3;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:visited,
    .btn-primary:focus {
        background-color: #0475CE !important;
    }

      /*for footer*/
    .contact-icon{
      margin: 0px !important;
      padding: 0% 2%;
    }

    footer{
      background: #FAFAFA !important;
      color: #3D3D3D;
    }

      .footer-li .fa-stack-1x:hover{
            color: #0465be !important;
      }

  <?php if (function_exists('custom_styles')) {
      custom_styles();
    }
    ?>

    nav.navbar {
        box-sizing: border-box !important;
        padding: 0px 50px !important;
        font-size: 15px;
        font-weight: bold;
        display: inline-block;
        width: 100%;
            padding: 10px 50px !important;
    }

    .navbar-logo {
        width: auto !important;
    }

    .navbar-brand {
    width: auto !important;
    }

    @media (min-width: 992px){
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: .5rem;
        padding-left: .5rem;
        padding-top: 20px;
        font-size: 15px !important;
        position: relative;
    }

    ul.navbar-nav.collapse.ml-auto {
        display: -webkit-inline-box;
        height: 100% !important;
        float: right;

    }

    nav.navbar {
        padding: 0 16px 0 50px !important;
        height: 100px;
    }

    .navbar-logo {
        width: auto !important;
        margin-top: 30px;
    }
    }

    .navbar-toggler {
    float: right;
    }

    .nav-item.active {
        background-color: rgba(199, 196, 196, 0.1);
        border-bottom: 3px solid rgb(90, 145, 247);
    }

    .navbar-fixed {
      background: #f4f4f4 !important;
    }
     p {
       font-size: 14px;
    }

    .rightColumn {
        padding: 50px 5px 5px 20px;

    }
    ul {
    list-style-type: circle;
    }



	.voffset {
	margin-top: 330px;

	}

	span{
	  font-size: 14px;
    }

	.listing{

		font-size: 14px;
	}
	.cont{

		padding-top: 20px;
		padding-left: 10px;
		padding-bottom: 10px;
		background-color: #ffffff;
		width: 100%;

	}

	.head{
		margin-top: 40px;
		margin-left: 40px;
		color: #ffffff;
		}
	.circle{
		width: 43px;
		height: 43px;
		border-radius: 50%;
		background-color: #48BBFC;
		z-index: 100;
	}
	.btn{
		margin-top: -130px;
		background-color: #ffffff;
		border-radius: 50px;
		color: #48BBFC;
		margin-left: 100px;
		width: 181px;
		height: 39px;
	}
	#img-fixed {
   background: blue;
   position: absolute;
				top: 40%;
				left: 7%;/*
   position: relative;*/
   width: 33.3333%;
}
#img-fixed img{
  width: 100%;
  height: 70vh;
}
.img-partner{
  	 position: relative;
    display: inline-block;
  }

      .footer-li .fa-stack-1x:hover{
            color: #0465be !important;
      }

  @media (min-width: 575px) {
  #img-fixed {
    width: 235px;
  }
  .img-partner{
  	margin-top: 300px;
  	 position: relative;
    display: inline-block;
  }
}
@media (min-width: 768px) {
  #img-fixed {
    width: 235px;
  }
  .img-partner{
  	margin-top: 50px;
  	 position: relative;
    display: inline-block;
  }
}
@media (min-width: 992px) {
  #img-fixed {
    width: 309px;
  }
  .img-partner{
  	 position: relative;
    display: inline-block;
  }
}
@media (min-width: 1200px) {
  #img-fixed {
    width: 375px;
  }
  .img-partner{
  	 position: relative;
    display: inline-block;
  }
}
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
    </script>

  </head>

  <body>
    <!-- Navigation -->
    <div id="navbar-fixed" class="navbar-fixed">
        <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #f2f2f2;">
        <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt="" class="navbar-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <ul class="navbar-nav collapse ml-auto">
               <li class="nav-item <?= $activeArray[0] ?>">
                <a href="../index" class="nav-link">Home</a>
            </li>
            <li class="nav-item <?= $activeArray[1] ?>">
                <a href="../learn" class="nav-link">Learn</a>
            </li>
            <li class="nav-item <?= $activeArray[2] ?>">
                <a href="../listing" class="nav-link">Current Intern</a>
            </li>
            <li class="nav-item <?= $activeArray[3] ?>">
                <a href="../testimonies" class="nav-link">Testimonies</a>
            </li>
            <li class="nav-item <?= $activeArray[4] ?>">
                <a href="../sponsors" class="nav-link">Sponsors</a>
            </li>
            <li class="nav-item <?= $activeArray[5] ?>">
                <a href="../alumni" class="nav-link">Alumni</a>
            </li>
             <li class="nav-item <?= $activeArray[8] ?>">
                <a href="../signup" class="nav-link">SignUp</a>
            </li>
            <li class="nav-item <?= $activeArray[9] ?>">
                <a href="../login" class="nav-link">LogIn</a>
            </li>
            </ul>

        </nav>
    </div>
