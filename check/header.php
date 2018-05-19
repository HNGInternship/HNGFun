<?php 



// for choosing active page on nav bar

$fileName=basename($_SERVER['PHP_SELF']);

$files = array('index.php','learn.php','listing.php','testimonies.php','sponsors.php','alumni.php','partners.php');
$activeArray = array('','','','','','');

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">


      <!-- Custom fonts for this template -->
  <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Work+Sans:400,900&amp;subset=latin-ext" rel="stylesheet">
     <link rel="stylesheet" href="css/custom.css" type="text/css">
     
    <!-- Custom styles for this template -->
      <link href="css/style2.css" rel="stylesheet">
      <link href="css/style1.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/custom.css" rel="stylesheet">
     <!-- <link href="css/learn.css" rel="stylesheet"> -->
<!--	  <link href="css/carousel.css" rel="stylesheet">-->
      <link href="css/landing-page.min.css" rel="stylesheet">

      <style>
        body {
          background-color: #FAFAFA;

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
            /*background-color: rgba(199, 196, 196, 0.1);*/
            /*border-bottom: 3px solid rgb(90, 145, 247);*/
            border-bottom: 3px solid #2196F3;
        }

        footer {
          background: #FAFAFA;
        }

        .justify-space-between {
          justify-content: space-between;
        }

        .wrap {
          flex-wrap: wrap;
        }

         /* media queries */
        @media (max-width: 599px) { 
            .navbar {
                padding: 1em;
            }
            .login-con, .reset-title {
			    width: 100% !important;
		    }
        }   

    </style>

  </head>

  <body>
    <!-- Navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-light"  >
      <a class="navbar-brand" href="../index.php">
        <img src="img/approved_HNG_logo.png" alt="HNG logo" width="128" height="52" class="img-fluid">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
      
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?= $activeArray[0] ?>">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item <?= $activeArray[1] ?>">
                <a href="learn.php" class="nav-link">Learn</a>
            </li> 
            <li class="nav-item <?= $activeArray[2] ?>">
                <a href="listing.php" class="nav-link">Intern</a>
            </li> 
            <li class="nav-item <?= $activeArray[3] ?>">
                <a href="testimonies.php" class="nav-link">Testimonies</a>
            </li> 
            <li class="nav-item <?= $activeArray[4] ?>">
                <a href="sponsors.php" class="nav-link">Sponsors</a>
            </li> 
            <li class="nav-item <?= $activeArray[5] ?>">
                <a href="alumni.php" class="nav-link">Alumni</a>
            </li> 
           <li class="nav-item <?= $activeArray[6] ?>">
                <a href="partners.php" class="nav-link">Partners</a>
            </li> 
    </ul>
  </div>
         
    </nav>

    
