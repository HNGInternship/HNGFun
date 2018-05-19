
<?php 
if(!isset($_SESSION)) { session_start(); }


// require_once("db.php");
// for choosing active page on nav bar

$fileName=basename($_SERVER['PHP_SELF']);

$files = array('buy_coins.php','buyandsell.php','help.php');
$activeArray = array('','','','');

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
      <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

   <script src="js/jquery.min.js"></script>

      <!-- Custom fonts for this template -->
  <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Work+Sans:400,900&amp;subset=latin-ext" rel="stylesheet">
     <link rel="stylesheet" href="css/custom.css" type="text/css">
<!--      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous"> -->
    <!-- Custom styles for this template -->
      <link href="css/style2.css" rel="stylesheet">
      <link href="css/style1.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/custom.css" rel="stylesheet">
     <!-- <link href="css/learn.css" rel="stylesheet"> -->
<!--	  <link href="css/carousel.css" rel="stylesheet">-->
      <link href="css/landing-page.min.css" rel="stylesheet">

      <style>
      
        .navbar{
          font-size: 15px;
          font-weight: bold;
          background-color: #F4F4F4;
          padding: 0 5%;
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
		.mod{
			width: 100%;
			height: 75px;
			background-color: #2196F3 !important;
			color: #ffffff;
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
		
		.note-body{
			background-color:#F2F2F2;
			font-size: 14px;
			padding-right: 10px;
		}
		
		span>a{
			color: #2196F3;
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
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="#">
        <img src="img/approved_HNG_logo.png" alt="HNG logo" width="128" height="52" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item <?= $activeArray[0] ?>">
            <a class="nav-link" href="#">Buy HNGcoin <span class="sr-only"></span></a>
          </li>
          <li class="nav-item <?= $activeArray[1] ?>">
            <a class="nav-link" href="buyandsell.php">Sell HNGcoin</a>
          </li>
          <li class="nav-item <?= $activeArray[2] ?>" > 
            <a class="nav-link" href="help.php">Help</a>
          </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->

            <ul class="navbar-nav ml-auto navbar-row upper-navbar py-0 mt-2 mt-lg-0">

            
            <li class="nav-item dropdown py-0 mt-3 mb-0 ">
                <a class="nav-link dropdown-toggle mr-3 remove-after notification" href="#" id="navbarSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell navbar-icon fa-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-notification" aria-labelledby="navbarSettings">
                    <span class="dropdown-item hover-text"><b>Notifications</b></span>
					<div class="dropdown-divider"></div>
					<div class="note-body">
						
						
						
						<span class="dropdown-item hover-text" href="#"><img src="img/gimage.png" width="10%"> &nbsp; <a href="">Marvelous350</a> wants to <a href="#" data-toggle="modal" data-target="#buynote">buy</a> 0.321 coins<br/>2 hours ago</span>
						<div class="dropdown-divider"></div>
						<span class="dropdown-item hover-text" href="#"><img src="img/gimage.png" width="10%"> &nbsp; <a href="">Marvelous350</a> wants to <a href="#" data-toggle="modal" data-target="#buynote">buy</a> 0.321 coins<br/>29 April</span>
						<div class="dropdown-divider"></div>
						<span class="dropdown-item hover-text" href="#"><img src="img/gimage.png" width="10%"> &nbsp; <a href="">Marvelous350</a> wants to <a href="#" data-toggle="modal" data-target="#buynote">buy</a> 0.321 coins<br/>26 April </span>
						<div class="dropdown-divider"></div>
						<span class="dropdown-item hover-text" href="#"><img src="img/gimage.png" width="10%"> &nbsp; <a href="">Marvelous350</a> wants to <a href="#" data-toggle="modal" data-target="#buynote">buy</a> 0.321 coins<br/>25 April</span>
						<div class="dropdown-divider"></div>
						<span class="dropdown-item hover-text" href="#"><img src="img/gimage.png" width="10%"> &nbsp; <a href="">Marvelous350</a> wants to <a href="#" data-toggle="modal" data-target="#sellnote">sell</a> 0.321 coins<br/>24 April</span>
						<div class="dropdown-divider"></div>
						<span class="dropdown-item hover-text" href="#"><img src="img/gimage.png" width="10%"> &nbsp; <a href="">Marvelous350</a> wants to <a href="#" data-toggle="modal" data-target="#sellnote">sell</a> 0.321 coins<br/>20 April</span>
						<div class="dropdown-divider"></div>
						
										
					</div>
					<a class="dropdown-item hover-text text-center" href="#">See All</a>
                </div>
            </li>

            <li class="nav-item  pt-0 mt-3 mb-0 pl-2 pr-0 ">
                <a class="nav-link  mr-3 " href="#" id="navbarSettings">
                    Wallet
                </a>
            </li>
            <li class="nav-item dropdown py-0 my-0">
                <a class="nav-link dropdown-toggle mr-3" href="#" id="navbarSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle navbar-icon fa-3x"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarSettings">
                    <a class="dropdown-item py-3" href=" #">Admin Login</a>
                    <a class="dropdown-item py-3" href=" {{route('signup')}} ">Sign Up</a>
                </div>
            </li>
        </ul>
      </div>
    </nav>
    
   

<!---Modal--->
<div class="modal fade bd-example-modal-lg" id="sellnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header mx-auto text-center">
        
      </div>
      <div class="modal-body">
        <div class="row mx-auto text-center">
			<div class="col mx-auto text-center">
				Marvelous350 wants to sell 0.321 coins
			</div>
			
		</div>
      </div>
      <div class="modal-footer mx-auto text-center">
		<div class="col mx-auto text-center">
			<button type="button" class="btn btn-primary mod">Accept</button>
		</div>
		<div class="col mx-auto text-center">
			<button type="button" class="btn btn-primary mod">Decline</button>
		</div>
        
      </div>
    </div>
  </div>
</div>


<!---Modal--->
<div class="modal fade bd-example-modal-lg" id="buynote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header mx-auto text-center">
        
      </div>
      <div class="modal-body">
        <div class="row mx-auto text-center">
			<div class="col mx-auto text-center">
				Marvelous350 wants to buy 0.321 coins
			</div>
			
		</div>
      </div>
      <div class="modal-footer mx-auto text-center">
		<div class="col mx-auto text-center">
			<button type="button" class="btn btn-primary mod">Accept</button>
		</div>
		<div class="col mx-auto text-center">
			<button type="button" class="btn btn-primary mod">Decline</button>
		</div>
        
      </div>
    </div>
  </div>
</div>