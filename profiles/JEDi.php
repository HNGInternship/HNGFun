<?php

try {
    $sql = 'SELECT * FROM secret_word LIMIT 1';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];


} catch (PDOException $e) {

    throw $e;
}    
try {
    $sql = "SELECT * FROM interns_data WHERE `username` = 'JEDi' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q->fetch();
    


} catch (PDOException $e) {

    throw $e;
}

?>


<!DOCTYPE html>
<html lang="en-US">

<head>

	<meta charset="UTF-8" />
	<title>Elekwa Solomon</title> 
	<meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,600");
@import url("https://fonts.googleapis.com/css?family=Lora");
html, body, div, span,
h1, h3, p,
a,img, strong,
b, u, i, center, ul, 
li {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline; }

body {
  line-height: 1; }

img.alignright {
  float: right; }

img.alignleft {
  float: left; }

img.aligncenter {
  clear: both;
  display: block;
  margin-right: auto;
  margin-left: auto; }

body {
  background-color: #FFFFFF;
  border-style: none; }

body,
p, a, a:hover {
  color: #000000; }


html {
  background-color: #061C30; }

body.fullsingle{
  background-color: #061C30;
  font-family: 'Montserrat', sans-serif;
  font-weight: 400;
  font-size: 21px;
  line-height: 33px;
  letter-spacing: -0.2px;
  color: #848d96;
	  -webkit-animation: fadein 2s;
   			animation: fadein 2s; }
body.fullsingle p {
    color: #848d96; }

.fs-split {
  width: 100vw;
  height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex; }

  @media (max-width: 800px) {
.fs-split {
     height: auto;
     -ms-flex-wrap: wrap;
     flex-wrap: wrap; } }

.fs-split .image {
    width: 50%;
    height: 100vh;
    background-image: url("https://res.cloudinary.com/cupidy28/image/upload/v1523799015/background.jpg");
    background-position: center center;
    background-size: cover; }

    @media (max-width: 800px) {
.fs-split .image {
       height: 80vh;
       width: 100%; } }
.fs-split .content {
    width: 50%;
    min-height: 100vh;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    overflow: auto; }

    @media (max-width: 800px) {
.fs-split .content {
    width: 100%;
    height: auto; } }
.fs-split .content .vertically-center {
    padding: 80px;
    max-width: 640px;
    margin-top: auto;
    margin-bottom: auto; }
    @media (max-width: 1200px) {
.fs-split .content .vertically-center {
    padding: 60px; } }
    @media (max-width: 800px) {
.fs-split .content .vertically-center {
    padding: 40px; } }

.intro {
	  font-weight: 600;
	  font-size: 64px;
  	line-height: 80px;
  	letter-spacing: -2px; }
 h1 {
    font-weight: 400;
    text-transform: uppercase;
    font-size: 16px;
    line-height: 16px;
    margin-bottom: 40px;
    letter-spacing: 0.4px;
    color: #47bec7; }
.intro .tagline {
    color: #CCCCCC; }

.bio {
  	padding: 40px 0 40px 0;
  	font-family: 'Lora', serif; 
  }

  @media (max-width: 1200px) {
.bio {
     padding: 30px 0; } }

  @media (max-width: 800px) {
.bio {
      padding: 20px 0; } }

.bio p {
    color: #848d96; }

.lists .list {
  	width: 10%;
  	display: inline-block;
  	margin-bottom: 20px; }
  @media (max-width: 500px) {
    .lists .list {
      	width: 90%; } }
  	.lists .list i {
    	line-height: 11px;
    	margin-bottom: 32px;
    	color: #848d96;
      font-size: 26px
    	opacity: 0.7; }


 *{
  box-sizing:border-box
}

.container {
    width: 100%;
    height: wrap-content;
    background-color: #ddd; 
}

.skills {
    text-align: right; 
    padding-right: 20px; 
    line-height: 40px; 
    color: white; 
}

.html {width: 90%; background-color: #4CAF50; height: 5px;} /* Green */
.css {width: 80%; background-color: #2196F3; height: 5px;} /* Blue */
.js {width: 75%; background-color: #f44336; height: 5px;} /* Red */
.php {width: 30%; background-color: #808080; height: 5px;} /* Dark Grey */

</style>


</head>

<body id="fullsingle" class="fullsingle">

<div class="fs-split">

	<div class="image">

	<img src="#">

	</div>

	<div class="content">

		<div class="vertically-center">
		
			<div class="intro">
				
				<h1>Elekwa Solomon U.</h1>

				<span class="tagline">Developer. Accountant. Nomad.</span>

			</div>

			<div class="bio">
				
				<h1>My Skills</h1>

        <p>HTML</p>
        <div class="container">
          <div class="skills html"></div>
        </div>

        <p>CSS</p>
        <div class="container">
          <div class="skills css"></div>
        </div>

        <p>JavaScript</p>
        <div class="container">
          <div class="skills js"></div>
        </div>

        <p>PHP</p>
        <div class="container">
          <div class="skills php"></div>
        </div>

			  </div>

			  <div class="lists">
				
				<div class="list">
					<h3><a href="https://web.facebook.com/jeddyel">
          <i class="fa fa-facebook iconn"></i>
          </a></h3>
        </div>

        <div class="list">
          <h3> 
          <a href="https://twitter.com/JeddyEl">
          <i class="fa fa-twitter iconn"></i>
          </a></h3>
        </div>

        <div class="list">
          <h3>
          <a href="https://github.com/JEDiTech/">
          <i class="fa fa-github iconn"></i>
          </a></h3>
        </div>

        <div class="list">
          <h3>
          <a href="https://slack.com/hnginternship4/@JEDi">
          <i class="fa fa-slack iconn"></i>
          </a> </h3>
        </div>

        <div class="list">
          <h3>
          <a href="https://www.linkedin.com/in/solomon-u-elekwa-7667a5132/">
          <i class="fa fa-linkedin iconn"></i>
          </a></h3>
        </div>
						

			</div>	

		</div>

	</div>

</div>

</body>
</html>