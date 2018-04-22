<?php 
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'Toby'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Oluwatobi</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<style>

	html { 
		-webkit-font-smoothing: antialiased;
  	-webkit-text-size-adjust: 100%;
  	-ms-text-size-adjust: 100%; 
  	}

	*,
	*:before,
	*:after {
  	-webkit-box-sizing: border-box;
  	-moz-box-sizing: border-box;
  	box-sizing: border-box; 
  	}

	body {
		color: #3d4451;
  	font-family: "Open Sans", sans-serif;
  	font-size: 16px;
  	line-height: 1.5;
		background-color: #e5e5e5;
	}

	a {
    text-decoration: none;
  }

	.clearfix:before, .clearfix:after {
  	content: " ";
  	display: table; 
  }
	.clearfix:after {
  	clear: both; 
  }
	.clearfix {
  	*zoom: 1; 
  }

  		/*container*/
	.content {
		z-index: 2;
		position: relative;
	}

	.container {
		width: 100%;
		max-width: 960px;
		padding-left: 10px;
		padding-right: 10px;
		margin: 0 auto; 
  }

		/*grid*/
	.row {
  	margin-left: -15px;
  	margin-right: -15px; 
  }
  .row:before, .row:after {
    content: " ";
    display: table; 
  }
  .row:after {
    clear: both;
  }
  .row {
    *zoom: 1; 
  }

  .col1, .col2, .col3 {
    position: relative;
  	min-height: 1px;
  	padding-left: 15px;
  	padding-right: 15px;
  	float: left;
	}

	.col1 {
		width: 41.66667%;
		
	}

	.col2 {
		width: 58.33333%;
	}

	.col3 {
		width: 50%;
	}

	/*section about*/
	.section-about {
 	 	padding-top: 40px;
  	position: relative; 
  }
  .section-box {
  	background-color: #fff;
  	padding: 40px 50px;
  }
  .section-title {
  	color: #3d4451;
  	font-size: 34px;
    line-height: 1.2;
    font-weight: 600;
    text-align: center;
  }

	.section-box, .profile-photo img {
  	background-color: #fff;
 		box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24); 
  }
  .section-about .section-box {
    padding: 0; 
  }
  .section-about .profile {
    padding: 57px 50px 15px 50px; 
  }
  .section-about .profile-photo {
    margin-right: 10%;
    margin-bottom: 10px; 
  }
  .section-about .profile-info {
    color: #3d4451;
    padding-bottom: 25px;
    margin-bottom: 25px;
    border-bottom: 1px solid #dedede; 
  }
  .section-about .profile-title {
    font-size: 36px;
   	line-height: 1.1;
    font-weight: 700;
    margin-bottom: 5px; 
  }
  .section-about .profile-title span {
    font-weight: 300; 
  }
  .section-about .profile_position {
    font-size: 18px;
    font-weight: 400;
    line-height: 1.1;
    margin-bottom: 0; 
    text-align: left;
  }

  .profile-photo img {
  	width: 100%;
  	display: block; 
  }

	.profile-preword {
  	margin-bottom: 28px; 
  }
  .profile-preword span {
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    line-height: 1.1;
    display: inline-block;
    padding: 7px 12px;
    text-transform: uppercase;
    position: relative;
    background-color: #07cb79; 
  }
  .profile-preword span:before {
    content: '';
    width: 0;
    height: 0;
    top: 100%;
    left: 5px;
    display: block;
    position: absolute;
    border-style: solid;
    border-width: 0 0 8px 8px;
    border-color: transparent; 
  }

	.profile-list {
  	margin: 0;
  	padding: 0;
  	list-style: none; 
  }
  .profile-list li {
    margin-bottom: 13px; 
  }
  .profile-list .title {
    display: block;
    width: 120px;
    float: left;
    color: #333333;
    font-size: 12px;
    font-weight: 700;
    line-height: 20px;
    text-transform: uppercase; 
  }
  .profile-list .cont {
    display: block;
    margin-left: 125px;
    font-size: 15px;
    font-weight: 400;
    line-height: 20px;
    color: #9da0a7; 
  }
  .profile-list .cont a {
    color: inherit; 
  }
  .profile-list .cont.profile-vacation {
    font-size: 14px; 
  }
  .profile-list .fa {
    margin-right: 10px;
    vertical-align: baseline; 
  }

    	/* social section*/
	.profile-social {
  	padding: 15px 0;
  	background-color: #07cb79; 
  }

  .social {
  	margin: 0;
  	padding: 0;
  	list-style: none;
  	text-align: center; 
  }
  .social li {
    display: inline-block;
   	margin: 5px 15px; 
   }
  .social li a {
    width: 45px;
    height: 45px;
    position: relative;
    text-decoration: none;
    display: inline-block;
    background-color: transparent;
    -webkit-transition: -webkit-transition, background-color 0.25s linear 0s;
    -moz-transition: -moz-transition, background-color 0.25s linear 0s;
    transition: transition, background-color 0.25s linear 0s;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%; 
  }
  .social li a:hover {
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.1); 
  }
  .social li a, .social li a .fa {
    line-height: 45; 
  }
  .social li a .fa {
    color: #fff;
    font-size: 20px;
    line-height: 45px;
    display: block; 
  }

    @media (max-width: 992px) {
  .section-about .profile {
    padding: 50px 40px 15px 40px; 
  }
  .section-about .profile-photo {
    margin-right: 0;
    margin-bottom: 30px; 
  }}
	
    @media (max-width: 767px) {
  .section-about {
    padding-top: 0; 
  }
  .section-about .profile {
    padding: 30px 20px 15px 20px; 
  }

  .profile-list .title, .profile-list .cont {
    width: 100%;
    float: none;
    line-height: 1.2; 
  }
  .profile-list .title {
    margin-bottom: 3px; 
  }
  .profile-list .cont {
    margin-left: 0;
    margin-bottom: 15px; 
  } }
	
  @media (max-width: 480px) {
  .section-about .row > div {
    width: 100%; }
  .section-about .profile-title {
    font-size: 28px; 
  } }
    
    /*Section Text*/
  .section-txt {
  	color: #000;
  	font-size: 17px;
  	font-weight: 200;
  	line-height: 1.5;
  	text-align: center;
  	margin-top: 30px;
  	padding-left: 5%;
  	padding-right: 5%; 
  }

  		/*skill progress bar*/
  .section-skills .section-box {
  	padding-bottom: 50px; 
  }

	.progress_bar {
  	position: relative;
  	margin-bottom: 40px; 
  }
  .progress_bar .bar-data {
    font-size: 14px;
    line-height: 1.1;
    padding-right: 40px; 
  }
  .progress_bar .bar-value {
    font-size: 16px;
    position: absolute;
    right: 0;
    top: 0;
    display: block; 
  }
  .progress_bar .bar-title {
   	display: block;
    margin-bottom: 5px; 
  }
  .progress_bar .bar-fill {
    height: 100%;
    background-color: #07cb79;
    display: block;
    position: relative;
    z-index: 1;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-transition: width 400ms ease-out 100ms;
    -moz-transition: width 400ms ease-out 100ms;
    transition: width 400ms ease-out 100ms; 
  }
  .progress_bar .bar-line {
    height: 5px;
    background-color: #0;
    position: relative; 
  }
  .progress_bar .bar-line:after {
    content: '';
    opacity: 0.2;
    position: absolute;
    background-color: #07cb79;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px; 
  }

  .ruby, .angular, .javascript{width: 70%;} .html{width: 90%;} .python{width: 40%;} .sass{width: 80%;} 

      @media (min-width: 768px) {
  .section-skills .section-box .row:last-child .progress_bar {
    margin-bottom: 0; 
  } }
	     @media (max-width: 767px) {
  .section-skills .section-box {
    padding-bottom: 35px; 
  }
  .section-skills .section-box .row:last-child .col-sm-6:last-child .progress_bar {
    margin-bottom: 0; 
  } }
	</style>

</head>
<body>
	
        <div class="content">
            <div class="container">
            	<section class="section-about">
            		<div class="section-box">
            			<div class="profile">
            				<div class="row">
            					<div class="col1">
            						<div class="profile-photo"><img src="http://res.cloudinary.com/dfximlv80/image/upload/e_auto_brightness/v1523901247/toby.jpg" alt="Oluwatobi Abraham"/></div>
            					</div>
            					<div class="col2">
            						<div class="profile-info">
            							<div class="profile-preword"><span>Hello</span>
            							</div>
											<h1 class="profile-title"><span>I'm</span> Oluwatobi A. Bolajoko</h1>
											 <h2 class="profile_position">Frontend Web Developer</h2>
            						</div>
            							<ul class="profile-list">
                                            <li class="clearfix">
                                                <strong class="title">E-mail</strong>
                                                <span class="cont"><a href="mailto:tobyabraham10@gmail.com">tobyabraham10@gmail.com</a></span>
                                            </li>
                                             <li class="clearfix">
                                                <strong class="title">Phone</strong>
                                                <span class="cont"><a href="tel:+2348093984294">+234 809 398 4294</a></span>
                                            </li>
                                        </ul>
            					</div>
            				</div>
            			</div>

            			<div class="profile-social">
								<ul class="social">
									<li><a href="https://www.behance.net/tobyabrahae3d9" target="_blank"><i class="fa fa-behance"></i></a></li>
									<li><a href="https://twitter.com/leREALtoby" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.linkedin.com/in/oluwatobi-bolajoko-88054615a/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="https://hnginternship4.slack.com/" target="_blank"><i class="fa fa-slack"></i></a></li>
									<li><a  href="https://github.com/tobyabraham" target="_blank"><i class="fa fa-github"></i></a></li>
								</ul>
							</div>
						</div>
						 <div class="section-txt">
                            <p>Hello! I’m Oluwatobi. a Frontend Web Developer. Experienced with all stages of the development cycle for dynamic web projects. Well-versed in numerous programming languages including JavaScript, Ruby e.t.c.</p>
              </div>
            	</section>

            	<section class="section-skills">
						<h2 class="section-title">Professional  Skills</h2>
						<div class="section-box">
							<div class="row">							
								<div class="col3">
									<div class="progress_bar">
										<div class="bar-data">
											<span class="bar-title">HTML & CSS</span>
											<span class="bar-value">90%</span>
										</div>
										<div class="bar-line">
											<span class="bar-fill html"></span>
										</div>
									</div>
								</div>
								
								<div class="col3">
									<div class="progress_bar">
										<div class="bar-data">
											<span class="bar-title">JavaScript</span>
											<span class="bar-value">70%</span>
										</div>
										<div class="bar-line">
											<span class="bar-fill javascript"></span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">							
								<div class="col3">
									<div class="progress_bar">
										<div class="bar-data">
											<span class="bar-title">Ruby/Ruby on Rails</span>
											<span class="bar-value">70%</span>
										</div>
										<div class="bar-line">
											<span class="bar-fill ruby"></span>
										</div>
									</div>
								</div>
								
								<div class="col3">
									<div class="progress_bar">
										<div class="bar-data">
											<span class="bar-title">Angular js</span>
											<span class="bar-value">70%</span>
										</div>
										<div class="bar-line">
											<span class="bar-fill angular"></span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">							
								<div class="col3">
									<div class="progress_bar">
										<div class="bar-data">
											<span class="bar-title">Python</span>
											<span class="bar-value">40%</span>
										</div>
										<div class="bar-line">
											<span class="bar-fill python"></span>
										</div>
									</div>
								</div>
								
								<div class="col3">
									<div class="progress_bar">
										<div class="bar-data">
											<span class="bar-title">SASS</span>
											<span class="bar-value">80%</span>
										</div>
										<div class="bar-line">
											<span class="bar-fill sass"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</section>
</body>
</html>