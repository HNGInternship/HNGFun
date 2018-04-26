<?php

if (!defined('DB_USER')) {
	require "../../config.php";
}

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data_ where username = 'pajimo'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE HTML>

<html>
  <head>
    <title> Olamide's Portfolio </title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="bootstrap.min.css">
      <script src="bootstrap.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <style>
    body{
  font-family: Roboto;
}
#front{
  background-image:url(https://images.unsplash.com/photo-1499428665502-503f6c608263);
  background-size: cover;
  background-position: center;
  color: #5563DE;
  Photo by David Werbrouck on Unsplash
  
}
.dropdown{
  color: #5563DE;
}

#skillset{
  background-image:url(https://images.unsplash.com/photo-1516054719048-38394ee6cf3e);
  background-size: cover;
  background-position: center;
  color: #74ABE2;
  Photo by Johnson Wang on Unsplash
  Photo by Ilya Pavlov on Unsplash
}

#bnext #next{
  float: left;
}
#bnext{
  margin-left: 37%;
  margin-right: 37%;
  margin-top: 1%;
  margin-bottom: 0%;
}

#dev{
  padding-top: 10%;
  padding-left: 25%;
  padding-right: 25%;
  padding-bottom: 25%;
  text-align: center;
  font-size: 24px;
  text-transform: uppercase;
  font-weight: 700;
}

#dev h1{
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                 0px 8px 13px rgba(0,0,0,0.1),
                 0px 18px 23px rgba(0,0,0,0.1);

}

#skills{
  font-size: 24px;
}
#hskills{
  text-align: center;
  font-weight: 700;
  margin-top: 20px;
  margin-bottom: 20px;
}
hr {
    
    border-top: 1px solid #f8f8f8;
    border-bottom: 1px solid rgba(0,0,0,0.2);
}
#contact{
  font-size: 24px;
  text-align: center;
  font-weight: 700;
  margin-top: 20px;
  margin-bottom: 20px;
  background-color: 
}

.fa{
  font-size: 18px;
}
.dropbtn {
  /*
    background-color: #4CAF50;
    color: white;
    */
    padding: 8px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-menu {
    display: none;
    position: absolute;
    background-color: grey;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-menu a {
    color: black;
    padding: 2px 2px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-menu a:hover {background-color: black}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-men {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
  </style>
  <body>
    <div id="front">
      <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <p>----</p>
          </button>
          <a class="navbar-brand" href="#" style="font-size: 20px;">Olamide's Portfolio</a>
        </div>
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 16px;"><span class="fa fa-address-book" aria-hidden="true"></span> Contact <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="https://twitter.com/Farry_ola" style="padding-top: 0px;" target ="_blank">Twitter</a></li>
                  <li><a href="https://www.facebook.com/olamide.faniyan" target ="_blank">Facebook</a></li>
                  <li><a href="https://instagram.com/olamidefaniyan_" target ="_blank">Instagram</a></li>
                  <li><a href="https://linkedin.com/faniyanolamide" target ="_blank">Linkedln</a></li>
                  <li><a href="https://github.com/Pajimo" target ="_blank">Github</a></li>
                  <li><a href="https://medium.com/olamidefaniyan" target ="_blank">Medium</a></li>
									</ul>
								</li>
							</ul>
          </div>
        </div>
      </nav>
      <div id = "dev">
        <img class="img-responsive" id="bobo" src="https://avatars3.githubusercontent.com/u/20623732?s=460&v=4" style="width: 300px; height: 300px; border-radius: 100px;" align="right"  />
          <h3>Hi I'm Olamide Faniyan</h3>
          <hr>
          <h1>A Front-end Web Developer / Designer </h1>
      </div>
    </div>
    <div class = "container">
    	<div id="skillset">
		    <div>
		      <h2 style ="text-align: center; margin-top: 0px; padding-top: 20px;"><strong> What exactly I do and the skills I use</strong></h2>
		      <p style ="text-align: center; font-size: 24px;"> I design and build user interfaces, which is also called the front-end or the client side in a website.Below are some of the skills I use in creating web aplication: </p>
		    </div>
		    
		    <div id="hskills" class = "container" style="margin-bottom: 0px;">
		      <div class = "row" id="skills">
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Javascript/Jquery</p>
		        </div>
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Python</p>
		        </div>
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Git</p>
		        </div>
		      </div>
		      <div class = "row" id="skills">
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Bootstrap</p>
		        </div>
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Html/Css</p>
		        </div>
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Figma</p>
		        </div>
		      </div>
		      <h4 style="font-size: 24px;"><strong>These are the ones I'm currently learning to become a full stack developer</strong></h4>
		      <div class = "row" id="skills">
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Express</p>
		        </div>
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Nodejs</p>
		        </div>
		        <div class ="col-lg-4 col-md-4 col-sm-4">
		          <img src="" alt="">
		          <p style="color: darkgrey;">Angular</p>
		        </div>
		      </div>
		      <div class="row" id="skills">
		      	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		      		<img src="" alt="">
		      		<p style="color: darkgrey;">MongoDB</p>
		      	</div>
		      </div>
		    </div>
		</div>
	</div>
    
    <div class="container" id="contact" style="margin-top: 0px;">
      <h2 style ="text-align: center; margin-bottom: 30px; font-weight: 700px; color: grey"><strong>Contact Info</strong></h2>
      <h4 style="font-family: Roboto;">I'm currently accepting projects</h4>
      <div style ="text-align: center; margin-bottom: 30px;" id="bnext">
        <div id="next">
          <a href="https://twitter.com/Farry_ola" style ="text-align: center;" class="btn btn-circle" target ="_blank"><i class="fa fa-twitter"></i></a>
        </div>
        <div id="next">
          <a href="https://www.facebook.com/olamide.faniyan" class="btn btn-circle" target = "_blank"><i class="fa fa-facebook"></i></a>
 
        </div>
        <div id="next">
          <a href="https://github.com/Pajimo" class="btn btn-circle" target ="_blank"><i class="fa fa-github"></i></a>

        </div>
        <div id="next">
          <a href="https://instagram.com/olamidefaniyan_" class="btn btn-circle" target ="_blank"><i class="fa fa-instagram"></i></a>

        </div>
        <div id="next">
          <a href="https://linkedin.com/faniyanolamide" class="btn btn-circle" target ="_blank"><i class="fa fa-linkedin"></i></a>

        </div>
        <div id="next">
          <a href="https://medium.com/olamidefaniyan" class="btn btn-circle" target ="_blank"><i class="fa fa-medium"></i></a>

        </div>
      </div>

      <div style="text-align: center;" class="row">
      	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      		<h4>Email: <a href="">faniyanolamide@gmail.com</a></h4>
      	</div>
      </div>
    </div>
    <div style="text-align: center">
		<h5 style="color: grey;">Olamide  ©. 
			<script type="text/javascript">
				document.write(new Date().getFullYear())
			</script>  All rights reserved
		</h5>
	</div>

     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
