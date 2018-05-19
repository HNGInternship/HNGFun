<!DOCTYPE html>

<html>
<head>
	<title>Hotelsng User Profile </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	
body {
	background: #e9e9e9;
	color: #3d3d3d;
	font: 100%/1.5em "Droid Sans", sans-serif;
	margin: 0;
}
p {
	font-size: 12px;
	font-family: Ubuntu;
	color: #000000;
	text-align: center;
}
h1 {
	font-size: 50px;
	font-family: Ubuntu;
	color: #bcbaba;
	background: #000000;
	text-align: center;
}
h3 {
	font-size: 15px;
	font-family: Ubuntu;
	color: #FFFF00;
	background: #000000;
	text-align: center;
}
h4, h5 {
	line-height: 1.5em;
	margin: 0;
}

a {
	text-align: center;
	text-decoration: none;
}
fieldset {
	border: 0;
	margin: 0;
	padding: 0;
}
.row {
	background: #ececec;
	font-family: Ubuntu;
	font-weight: bold;
	width: 500px;
	margin-right: auto;
	margin-left: auto;

}

@font-face {
      font-family: 'FontAwesome';
      src: url('../font/fontawesome-webfont.eot');
    }
.column {
    float: left;
    width: 50%;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
hr {
	background: #e9e9e9;
    border: 0;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 1px;
    margin: 0;
    min-height: 1px;
}

img {
    border: 0;
    display: block;
    height: auto;
    max-width: 100%;
}

input {
	border: 0;
	color: inherit;
    font-family: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}

p { margin: 0; }

.clearfix { *zoom: 1; } /* For IE 6/7 */
.clearfix:before, .clearfix:after {
    content: "";
    display: table;
}
.clearfix:after { clear: both; }

/* ---------- LIVE-CHAT ---------- */

#live-chat {
	bottom: 0;
	font-size: 12px;
	right: 24px;
	position: fixed;
	width: 300px;
}

#live-chat header {
	background: #293239;
	border-radius: 5px 5px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 16px 24px;
}

#live-chat h4:before {
	background: #1a8a34;
	border-radius: 50%;
	content: "";
	display: inline-block;
	height: 8px;
	margin: 0 8px 0 0;
	width: 8px;
}

#live-chat h4 {
	font-size: 12px;
}

#live-chat h5 {
	font-size: 10px;
}

#live-chat form {
	padding: 24px;
}

#live-chat input[type="text"] {
	border: 1px solid #ccc;
	border-radius: 3px;
	padding: 8px;
	outline: none;
	width: 234px;
}

.chat-message-counter {
	background: #e62727;
	border: 1px solid #fff;
	border-radius: 50%;
	display: none;
	font-size: 12px;
	font-weight: bold;
	height: 28px;
	left: 0;
	line-height: 28px;
	margin: -15px 0 0 -15px;
	position: absolute;
	text-align: center;
	top: 0;
	width: 28px;
}

.chat-close {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
}

.chat {
	background: #fff;
}

.chat-history {
	height: 252px;
	padding: 8px 24px;
	overflow-y: scroll;
}

.chat-message {
	margin: 16px 0;
}

.chat-message img {
	border-radius: 50%;
	float: left;
}

.chat-message-content {
	margin-left: 56px;
}

.chat-time {
	float: right;
	font-size: 10px;
}

.chat-feedback {
	font-style: italic;	
	margin: 0 0 0 80px;
}
	</style>
</head>
<body>
  
<h1> Hotelsng </br>User Profile for </br> Code-X

</h1>

 <div class="row">
  <div class="column">
<img src="http://res.cloudinary.com/code-x/image/upload/v1525118313/code-x.jpg" alt="Ndueze Ifeanyi Code-X" width="250" height="250">
</br>
<h3>Ndueze Ifeanyi David (Code-X) </br> Web Apps || Mobile Apps </h3>
  <a href="https://www.facebook.com/engrify"><i class="fa fa-facebook-official  fa-3x" aria-hidden="true"></i></a>
  <a href="https://twitter.com/IfeanyiOghene"> <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
  <a href="https://www.instagram.com/davidify/"> <i class="fa fa-instagram fa-3x" aria-hidden="true"></i></i></a>
  <a href="https://github.com/DavidIfeanyichukwu"> <i class="fa fa-github fa-3x" aria-hidden="true"></i></a>
  </div>
  <div class="column">
<?php
  //require '../db.php';
  $res = $conn->query("SELECT * FROM  interns_data WHERE username = 'code-x' ");
  $row = $res->fetch(PDO::FETCH_BOTH);
  $name = $row['name'];
  $img = $row['image_filename'];
  $username =$row['username'];



  $res1 = $conn->query("SELECT * FROM secret_word");
  $res2 = $res1->fetch(PDO::FETCH_ASSOC);
  $secret_word = $res2['secret_word'];
?>

<div id="live-chat">
		
		<header class="clearfix">
			
			<a href="#" class="chat-close">x</a>

			<h4>CodeX Chatbot</h4>

			<span class="chat-message-counter">3</span>

		</header>

		<div class="chat">
			
			<div class="chat-history" id="chat-box">
				
				<div class="chat-message clearfix">
					
					<img src="http://res.cloudinary.com/code-x/image/upload/v1525118313/code-x.jpg" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time">01:30pm</span>

						<h5>Code-X</h5>

						<p>Hello, I'm CodexBot, how may I help you today? You can also train me!!!</p>

					</div> <!-- end chat-message-content -->
					</div> <!-- end chat-message -->

				<hr>

				<div class="chat-message clearfix">
					
					<img src="https://scontent.flos8-1.fna.fbcdn.net/v/t1.0-9/29101326_1670126126413809_8661840651001790464_n.jpg?_nc_cat=0&oh=aac8c36c8aae143804e8c681f4112bb3&oe=5B91B7CA" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time">02:37pm</span>

						<h5>Maggie Lakes</h5>

						<p>Good afternoon, I need help with my website!</p>

					</div> <!-- end chat-message-content -->

				</div> <!-- end chat-message -->

				<hr>

				<div class="chat-message clearfix">
					
					<img src="https://scontent.flos8-1.fna.fbcdn.net/v/t1.0-9/29101326_1670126126413809_8661840651001790464_n.jpg?_nc_cat=0&oh=aac8c36c8aae143804e8c681f4112bb3&oe=5B91B7CA" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time">3:05pm</span>

						<h5>Maggie Lakes</h5>

						<p>Check it from the link sent</p>

					</div> <!-- end chat-message-content -->

				</div> <!-- end chat-message -->

				<hr>

			</div> <!-- end chat-history -->

			<p class="chat-feedback">Your partner is typing…</p>

			<form action="#" method="post">

				<fieldset>
					
					<input type="text" placeholder="Type your message…"	id="text-input" autofocus>
					<input type="hidden">

				</fieldset>

			</form>

		</div> <!-- end chat -->

	</div> <!-- end live-chat -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  </div>
</div> 
<script>
document.getElementById('text-input').onkeypress = function(e){

    if (!e) e = window.event;

    var keyCode = e.keyCode || e.which;

    if (keyCode == '13'){
      let chatDiv = document.getElementById('text-input');
      let reply = botReply(e.target.value);

      return false;

    }

  }
  
 function botReply(input){
  if(input == 'aboutbot')
	return 'This is CodeXbotv1.0908'
  else //AJAX GOES HERE
    return 'This is the response from server';
 }
 
 function userMessage(msg){
	 let output = '<div class="chat-message clearfix">';
	 output += '<img src="https://scontent.flos8-1.fna.fbcdn.net/v/t1.0-9/29101326_1670126126413809_8661840651001790464_n.jpg?_nc_cat=0&oh=aac8c36c8aae143804e8c681f4112bb3&oe=5B91B7CA" alt="" width="32" height="32">
	 ';
	 output  += '<div class="chat-message-content clearfix">';
						
	 output += '<span class="chat-time">02:37pm</span>'

     ouput += '<h5>Maggie Lakes</h5>'

	 output += '<p>' + msg + '</p>';
	 ouput += '</div> <!-- end chat-message-content -->';
	 ouput += '</div>'

 
     return output;
 }
 
 function botMessage(msg){
	 let output = '<div class="chat-message clearfix">';
	 output += '<img src="http://res.cloudinary.com/code-x/image/upload/v1525118313/code-x.jpg" alt="" width="32" height="32">
	 ';
	 output  += '<div class="chat-message-content clearfix">';
						
	 output += '<span class="chat-time">02:37pm</span>'

     ouput += '<h5>CodeXbot</h5>'

	 output += '<p>' + msg + '</p>';
	 ouput += '</div> <!-- end chat-message-content -->';
	 ouput += '</div>'

 
     return output;
 }
 
 
 

</script>

</body>

</html>