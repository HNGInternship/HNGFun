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
<<<<<<< HEAD
    padding-right: 40px; 
=======
    padding-right: 20px; 
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
    line-height: 40px; 
    color: white; 
}

.html {width: 90%; background-color: #4CAF50; height: 5px;} /* Green */
.css {width: 80%; background-color: #2196F3; height: 5px;} /* Blue */
.js {width: 75%; background-color: #f44336; height: 5px;} /* Red */
.php {width: 30%; background-color: #808080; height: 5px;} /* Dark Grey */

<<<<<<< HEAD

/* ---------- chat-bot ---------- */

    #chat-box {
      bottom: 0;
      font-size: 12px;
      right: 24px;
      position: fixed;
      width: 300px;

    }

    #chat-box header {
      background: #293239;
      border-radius: 5px 5px 0 0;
      color: #fff;
      cursor: pointer;
      padding: 16px 24px;
    }

    #chat-box h4, #chat-box h5{
      line-height: 1.5em;
      margin: 0;

    }
    #chat-box h4:before {
      background: #1a8a34;
      border-radius: 50%;
      content: "";
      display: inline-block;
      height: 8px;
      margin: 0 8px 0 0;
      width: 8px;

    }

    #chat-box h4 {
      font-size: 12px;
    }

    #chat-box h5 {
      font-size: 10px;
    }

    #chat-box form {
      padding: 24px;
    }

    #chat-box input[type="text"] {
      border: 1px solid #ccc;
      border-radius: 3px;
      padding: 8px;
      outline: none;
      width: 234px;
    }

    .chat {
      background: #fff;
          
    }
      .hide{
      display: none;
    }

    .chatlogs {
      height: 252px;
      padding: 8px 24px;
      overflow-y: scroll;
    }

    .chat-message {
      margin: 16px 0;
    }

    .bot img {
      border-radius: 50%;
      float: left;
    }
    .bot .chat-message-content{
      margin-left: 40px;
      border-radius:0  10px 10px 10px;
      background: #e4e4e4;
      padding: 10px 10px;
    }
    .user .chat-message-content{
      margin-right: 40px;
      border-radius: 0px 10px 10px 10px;
      background: #e4e4e4;
      padding: 10px 10px;
    }
    .user img{
      border-radius: 50%;
      float: right;
    }
    .chat-message-content {
      /*margin-left: 56px;*/
    }

    .bot .chat-time {
      float: right;
      font-size: 10px;
    }
    .user .chat-time {
      float: right;
      font-size: 10px;
    }

=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
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

<<<<<<< HEAD
				<span class="tagline">Developer. Accountant. Poet.</span>
=======
				<span class="tagline">Developer. Accountant. Nomad.</span>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440

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

<<<<<<< HEAD
<div id="chat-box"> 
    <header class="clearfix" onclick="change()">
      <h4>Online</h4>
    </header>
    <div class="chat hide" id="chat">
      <div class="chatlogs" id="chatlogs">
        <div class="chat bot chat-message">
          <img src="https://res.cloudinary.com/cupidy28/image/upload/v1526227579/Profile.jpg" alt="" width="32" height="32">
          <div class="chat-message-content clearfix">
            <p>Hello.</p>
            <span class="chat-time"> </span>
          </div> 
        </div>
        <div class="chat bot chat-message">
          <img src="https://res.cloudinary.com/cupidy28/image/upload/v1526227579/Profile.jpg" alt="" width="32" height="32">
          <div class="chat-message-content clearfix">
            <p>I'm JEDiBot, here to help you.</p>
            <span class="chat-time"></span>
          </div> 
        </div>
        <div class="chat bot chat-message">
          <img src="https://res.cloudinary.com/cupidy28/image/upload/v1526227579/Profile.jpg" alt="" width="32" height="32">
          <div class="chat-message-content clearfix">
            <p>You can ask me any question, and I'll do my best to answer. You can also train me to answer specific questions
            using the format train: question # answer # password.</p>
            <span class="chat-time"></span>
          </div> 
        </div>

        
         
        <div id="chat-content"></div>
        
      </div> <!-- end chat-history -->
      <form action="#" method="post" class="form-data">
        <fieldset>
          <input type="text" placeholder="Type your message…" name="question" id="question" autofocus>
          <input type="submit" name="bot-interface" value="SEND"/>
        </fieldset>
      </form>
    </div> <!-- end chat -->
  </div> <!-- end chat-box -->


  <script >
    
    
    function change(){
      document.getElementById("chat").classList.toggle('hide');
      
    }
     var btn = document.getElementsByClassName('form-data')[0];
    var question = document.getElementById("question");
    var chatLog = document.getElementById("chatlogs");
    var chatContent = document.getElementById("chat-content");
    var myTime = new Date().toLocaleTimeString(); 
    document.getElementsByClassName('chat-time')[0].innerHTML = myTime;
    document.getElementsByClassName('chat-time')[1].innerHTML = myTime;
    document.getElementsByClassName('chat-time')[2].innerHTML = myTime;
    btn.addEventListener("submit", chat);


    function chat(e){
        if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
           var xhttp = new XMLHttpRequest();
      } else if (window.ActiveXObject) { // IE 6 and older
        var  xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
       
      xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
              // console.log(this.response);
               userChat(question.value, this.response);
          e.preventDefault();
              question.value = '';
            }
            }
        xhttp.open('POST', 'profiles/Abigail', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('question='+ question.value);
        e.preventDefault();
    }

    function userChat(chats, reply){
      if(question.value !== ''){
        var chat = `<div class="chat user chat-message">
          <img src="https://res.cloudinary.com/cupidy28/image/upload/v1526232716/user.jpg" alt="" width="32" height="32">
          <div class="chat-message-content clearfix">
            <p>` + chats + `</p>
            <span class="chat-time">` + new Date().toLocaleTimeString(); + `</span>
           </div>
        </div>`;
      }
      chatContent.innerHTML += chat;
         
        setTimeout(function() {
          chatContent.innerHTML += reply + `<span class="chat-time">`+ new Date().toLocaleTimeString(); +` </span>
          </div> 
        </div>`;
        document.getElementById('chatlogs').scrollTop = document.getElementById('chatlogs').scrollHeight; 
      }, 1000);
    }
  </script>

  <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/mail.js"></script>
    <!--script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script-->

    <!-- Custom scripts for this template -->
    <script src="js/hng.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
</body>
</html>