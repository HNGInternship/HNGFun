<!DOCTYPE html>
<html>
<head>
    <title>Ezike Tobenna</title>
<style>
	
body {
    font:normal 12px/1.6em Arial, Helvetica, sans-serif;
	color:#2a3845;
	background:#ffffff;
	margin: 0;
}

p{
    margin: 0;
}

#wrapper {
    width: 632px;
    margin: 0 auto;
    border-left:1px solid #f0e9eb;
    border-right:1px solid #f0e9eb;
	
}

#nav {
	background:#06a;
	text-align:right;
	color:#f6dde3;
	padding-top: 10px;
    padding-bottom: 10px;
    padding-left:20px;
    padding-right:20px;
}

#header {
    margin-left: 1px;
    margin-right: 1px;
	
}

#bg {
	height:36px;
    background:url('http://img840.imageshack.us/img840/9886/87926428.gif') repeat-x;
}

#main-content {
    margin: 0 auto;
	
}

#main-image {
	text-align: center;
}

#left-column {
    width: 300px;
    float: left;
    padding-bottom: 30px;
    padding-left:30px;
    padding-right:30px;
	
}

#right-column {
   width: 270px;
   float: right;
	
}

.sidebar {
    background: #f7f7f7 no-repeat top;
    width: 218px;
    margin: 0 auto;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left:25px;
    padding-right:25px;
	
}

#footer {
	clear: both;
	background:#f7f7f7;
	padding-top: 10px;
    padding-bottom: 10px;
    padding-left:15px;
    padding-right:15px;
    border-top: 1px solid #f0e9eb;
}

/* Global Styling */

a:visited, a:link {
	color:#a43b55;
	text-decoration:underline;
	background:none;
}

a:hover {
	color:#a43b55;
	text-decoration:none;
	background:none;
}

h1 {
	color:#7a2e40;
	margin:0 0 10px;
	padding-bottom:10px;
	font:normal 23px Georgia, serif;
	border-bottom:1px solid #efece7;
}

h2 {
	color:#7a2e40;
	margin:20px 0 10px;
	padding-bottom:10px;
	font:normal 17px Georgia, serif;
	border-bottom:1px solid #efece7;
}

h3 {
	color:#7a2e40;
	margin:10px 0;
	padding-bottom:10px;
	font:bold 14px Arial, Helvetica, sans-serif;
	border-bottom:1px solid #efece7;
}

ul {
	padding:0;
	margin:0 0 0 17px;
    list-style:square url('http://img525.imageshack.us/img525/1890/bulletr.gif');
}

.box {
	background:#f7f7f7;
	border:1px solid #f0e9eb;
	padding:15px;
}

#nav a {
	margin: 0 10px;
}

#nav a:visited, #nav a:link {
	text-decoration:none;
	color:#f6dde3;
}

#nav a:hover {
	text-decoration:underline;
	color:#f6dde3;
}

#logo {
	margin-bottom:50px;
	font:normal 30px Georgia, serif;
	color:#300820;
}
</style>
</head>
<body>
<div id="wrapper">
    
    <div id="header">
		<div id="nav"><a href="index.html">Home</a> | <a href="#">About Me</a> | <a href="#">Contact Me</a> | <a href="#">My Photos</a> </div>
		<div id="bg"></div>
	</div>
	
	<div id="main-content">
		<div id="left-column">
			<div id="logo">
			 Ezike Tobenna
			</div>
			<div class="box">
        		<h1>What You'll Find Here</h1>
        		<p>This is my space. Here are some of my skills and interests: </p>
				<ul style="margin-top:17px;">
					<li>Android Development"</li>
					<li>UX Enthusiast</li>
					<li>Web Developer</li>
					<li>Creative Writer</li>
					<li>Tech Blogger</li>
				</ul>
			</div>
			<h2>A Few Famous Quotes I like</h2>
			<p>
				<img src="http://res.cloudinary.com/dk1btjvhc/image/upload/v1523630359/C360_2015-04-03-08-40-28-091.png
" width="139" height="150" style="margin: 0 10px 10px 0;float:left;" />
				<em>“Service to others is the rent you pay for your room here on Earth.”</em> - Muhammad Ali<br/>
				<em>"What is the essence of life? To serve others and to do good."</em> - Aristotle<br/>
				<em>“We make a living by what we get, but we make a life by what we give.” </em> - Winston Churchill<br/>
				<em>“Only a life lived for others is worth living."</em> - Albert Einstein<br/>
			</p>
		</div>
		<div id="right-column">
			<div id="main-image"><img src="http://res.cloudinary.com/dk1btjvhc/image/upload/v1523630359/C360_2015-04-03-08-40-28-091.png
" width="160" height="188" /></div>
			<div class="sidebar">
				<h3>Blurb About Me</h3>
				<p>My name is Ezike Tobenna.</p>
				<h3>Find on Social Media</h3>
				<div class="box">
					<ul>
						<li><a href="http://facebook.com/tobey.ezike" target="_blank">Facebook</a></li>
						<li><a href="http://twitter.com/ezike" target="_blank">Twitter</a></li>
						<li><a href="https://www.linkedin.com/in/tobenna-ezike-896439a8/" target="_blank">LinkedIn</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		Copyright &copy; 2018 Ezike Tobenna. All rights reserved.<br/>
	</div>
</div>
<?php

$result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'olubori'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
  
  try {
      $sql = "SELECT secret_word FROM secret_word";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }

?>

</body>
</html>