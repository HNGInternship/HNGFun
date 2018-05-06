<!DOCTYPE html>
<html>
<head>
    <title>Ezike Tobenna</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style>

.bot{
    height:250px;
    width:320px;
    background:white;
    position: fixed;
    right:0;
    bottom:40%;
    border: 1px solid #8e44ad;
    margin-right:3%;   
}


.top-bar {
  background:#e0e7e8;
  height:50px;
  color: #34495e;
  padding: 10px;
  position: relative;
  overflow: hidden;
  border-radius:4%;
  font-size: 28px;
   
}

.input{
    height:50px;
    width:200%;
}


.panel-body{
    height:300px;
    position:relative;
    overflow-y:auto;
    background:#34495e;
    padding: 10px;
}


.human-message{
    background:#e0e7e8; 
    margin: 10px 10px;
    margin-left:65px;
    font-size: 16px;
    color: #34495e;
    padding:15px;
    border-radius:4%;
}

.human-message:before{
    width: 0;
    height: 0;
    content:"";
    top:0px;
    margin-left:60px;
    margin-right:50px;
    left:-4px;
    position:absolute;
    font-size:15px;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;  
}

.bot-message{
    background:#e0e7e8;
    color: blue;
    margin: 10px 10px;
    font-size: 16px;
    margin-right:60px;
    margin-left:10px;
    border-radius:4%;
    padding:4px;
}

.bot-message:after{
    width: 0;
    height: 0;
    content:"";
    position:absolute;
    top:-5px;
    right:0;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: transparent transparent transparent #e0e7e8;  
}

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
			<div class="container">
			<div class="bot panel panel-default body1">
            <div class="panel-heading top-bar ">
            TundeChat
            </div>
            <div class="chat-output" id="chat-output">
                <div class="panel-body user-message">
                <div class ="bot-message row message">Hi, my name is Tunde. Type <br> <span style="color: red">help</span> to see what I can do.</div>
                <div class="bot-message row message">To train me use this format <br> <span style="color: red">train: question #answer #password</span></div>
                
                </div>
            <div class="input chat-input" >
            <form action="" class="form-inline" method="post" id="user-input-form">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control question-input" name="user-input" id="user-input" class="user-input" placeholder="Say something here">
                            <div class="input-group-append">
                                <div class="input-group-text btn-primary"><input class="btn-success" id="send" type="submit" onclick="return false;"></div>
                            </div>
                    </div>
            </form>	
			</div>
            </div>
        </div>
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
  $result2 = $conn->query("Select * from interns_data where username = 'Tobey'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
  

try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}

$secret_word = $data['secret_word'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['user-input'];
  //  $data = preg_replace('/\s+/', '', $data);
    $temp = explode(':', $data);
    $temp2 = preg_replace('/\s+/', '', $temp[0]);
    
    if($temp2 === 'train'){
        train($temp[1]);
    }elseif($temp2 === 'aboutbot') {
        aboutbot();
    }else{
        getAnswer($temp[0]);
    }
}

function aboutbot() {
    echo "<div id='result'>TundeChat 1.0 </div>";
}
function train($input) {
    $input = explode('#', $input);
    $question = trim($input[0]);
    $answer = trim($input[1]);
    $password = trim($input[2]);
    if($password == 'password') {
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();

        if(empty($data)) {
            $training_data = array(':question' => $question,
                ':answer' => $answer);

            $sql = 'INSERT INTO chatbot ( question, answer)
          VALUES (
              :question,
              :answer
          );';

            try {
                $q = $GLOBALS['conn']->prepare($sql);
                if ($q->execute($training_data) == true) {
                    echo "<div id='result'>Training Successful!</div>";
                };
            } catch (PDOException $e) {
                throw $e;
            }
        }else{
            echo "<div id='result'>I already understand this. Teach me something new!</div>";
        }
    }else {
        echo "<div id='result'>Invalid Password, Try Again!</div>";

    }
}

   ?>
   <script>
    var outputArea = $("#chat-output");

    $("#user-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#user-input").val();

        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);


        $.ajax({
            url: 'profile.php?id=Tobey',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });


        $("#user-input").val("");

    });
</script>

</body>
</html>