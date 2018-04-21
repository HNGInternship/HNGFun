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

 ul {
  list-style: none; }

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

a,
a:hover {
  text-decoration: none;
  border: none;
  border-style: none;
  box-shadow: none; }


@-webkit-keyframes fadein {
  from {
    opacity: 0; }
  to {
    opacity: 1; } }
@keyframes fadein {
  from {
    opacity: 0; }
  to {
    opacity: 1; } }

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
    background-image: url(<?php echo $my_data['image_filename']; ?>);
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
.intro h1 {
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

.bio a {
    color: #848d96;
    transition-duration: 0.5s;
    border-bottom: 1px dotted #848d96; }

.bio a:hover {
    color: #CA486d;
    transition-duration: 0.1s;
    border-bottom: 1px dotted #CA486d; }

.lists .list {
  	width: 30%;
  	display: inline-block;
  	margin-bottom: 40px; }
  @media (max-width: 500px) {
    .lists .list {
      	width: 90%; } }
  	.lists .list h3 {
    	font-weight: 400;
    	text-transform: uppercase;
    	font-size: 11px;
    	line-height: 11px;
    	margin-bottom: 31px;
    	color: #848d96;
    	letter-spacing: 2px;
    	opacity: 0.5; }
  	.lists .list ul li {
    	font-size: 16px;
    	line-height: 16px;
    	margin-bottom: 12px; }
    .lists .list ul li a {
      color: #848d96;
      transition-duration: 0.5s; }
    .lists .list ul li a:hover {
        color: #CA486d;
        transition-duration: 0.1s; }

 	  .credit {
  		opacity: 0.4; }
  	.credit p {
    	font-size: 12px;
    	line-height: 14px; }
    .credit p a {
      color: #848d96; }

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
				
				<h1><?php echo $my_data['name']; ?></h1>

				<span class="tagline">Developer. Accountant. Nomad.</span>

			</div>

			<div class="bio">
				
				<p>I'm currently a Sofware Development fellow at <a href="https://nhub.ng">nHub</a>, a startup incubator in Jos Plateau state. 
        <br>
        I have a degree in Accounting from the University of Jos where i graduated with honors. 
        <br> 
        In 2017 i completed the Android Development Course under the Android Learning Community (ALC) run by <a href="https://andela.com">Andela</a> with support from Google and <a href="https://udacity.com">Udacity</a>. I have an undying passion for music, poetry and working with kids. 
        <br> 
        This inspired my pet project <a href="https://facebook.com/nerdsvilleinc">Nerdsville Code Club</a> where i introduce elementary school kids to the basics of programming, teamwork and innovative (divergent) thinking.
        <br>
        <br>
        You can connect with me below <br>
        and hey - thanks for checking out my page!</p>

			</div>

			<div class="lists">
				
				<div class="list">

					<h3>Connect</h3>

					<ul>
						<li><a href="http://jeddyel.blogspot.com.ng">Blog</a></li>
						<li><a href="mailto:jeddypatricks@gmail.com ?subject=Email%20Subject&body=Email%20Body%20Text">EMail</a></li>
						<li><a href="https://medium.com/@jeddypatricks">Medium</a></li>
					</ul>

				</div>

				<div class="list">

					<h3>Social</h3>

					<ul>
						<li><a href="https://twitter.com/JeddyEl">Twitter</a></li>
						<li><a href="https://www.instagram.com/jeddy_el/">Instagram</a></li>
						<li><a href="https://web.facebook.com/jeddyel">Facebook</a></li>
					</ul>

				</div>

				<div class="list">

					<h3>Network</h3>

					<ul>
						<li><a href="https://www.linkedin.com/in/solomon-u-elekwa-7667a5132/">LinkedIn</a></li>
						<li><a href="https://plus.google.com/u/0/100983049215283226594">Google+</a></li>
						<li><a href="https://github.com/JEDiTech/">Github</a></li>
					</ul>

				</div>
				
			</div>

			<div class="credit">

				<p>&copy; 2018 <a href="#">Elekwa Solomon U.</a> </p>

			</div>		

		</div>

	</div>

</div>

</body>
</html>