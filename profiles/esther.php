<!-- php code -->
<?php
if(!defined('DB_USER')){
    require "../../config.php";
    try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
}
  try {
      $secret_word_db = $conn->query("SELECT * FROM secret_word LIMIT 1");
      $secret_word_db = $secret_word_db->fetch(PDO::FETCH_OBJ);
      $secret_word = $secret_word_db->secret_word;
      $my_data = $conn->query("SELECT * FROM interns_data WHERE username = 'esther'");
      $user = $my_data->fetch(PDO::FETCH_OBJ);
    }
    catch (PDOException $pe) {
      die("Could not connect to the database " . $pe->getMessage());
    }
  ?>
  <?php
    if (isset($_POST['question'])) {
      function train_bot($data){
        $question = '';
        $answer = '';
        $password = 'password';
        $response = '';
        $train_bot_msg = substr($data, 6);
        $train_bot_msg = preg_replace("([\s]+)", " ", trim($train_bot_msg));
  		  $train_bot_msg = preg_replace("([?.'])", "", $train_bot_msg);
        $split_train_msg = explode('#', $train_bot_msg);
        $split_train_msg_count = count($split_train_msg);
        if (isset($split_train_msg[0]) && strlen($split_train_msg[0]) > 0) {
          $question = trim($split_train_msg[0]);
        }
        else {
          echo $response = 'question not set';
          return;
        }
        if(isset($split_train_msg[1]) && strlen($split_train_msg[1]) > 0) {
          $answer = trim($split_train_msg[1]);
        }
        else {
          echo $response = 'answer not set';
          return;
        }
        if (isset($split_train_msg[2])) {
          if (trim($split_train_msg[2]) !== $password) {
            echo $response = 'Invalid password';
          }
          else {
            //echo $response = 'valid pass';
          }
        }
        if ($split_train_msg_count < 1 || $split_train_msg_count > 3) {
          echo $response = 'Invalid training format';
        }
        else {
          $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          $sql = "INSERT INTO chatbot (question, answer) VALUES ('$question', '$answer')";
          $conn->exec($sql);
          echo 'Training successful. I am now smarter thanks to you!';
        }
        return;
      }
      function generate_response($data) {
        $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
        $query = "SELECT answer FROM chatbot WHERE question LIKE '%$data%' ORDER BY rand() LIMIT 1";
        $result = $conn->query($query)->fetch_all();
        if (!$result) {
          echo 'I am unable to answer your question right now. But you can train me to answer this particular question. Use the format <br><br> train: question #answer #password';
          return;
        }
        echo $result[0][0];
        return;
      }

      $message = $_POST['question'];
      $is_train = substr($message, 0, 6);
      if($is_train === 'train:') {
        train_bot($message);
      }
      else {
        generate_response($message);
      }
      return;
    }
  ?>

  <!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8">
          <title><?php echo $user->name; ?>'s Profile</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style media="screen">
#hero{
  background-image:url("https://res.cloudinary.com/esther/image/upload/v1525868384/pattern-3160023_1920.jpg");
  background-size:cover;
  position:relative;
  height:100vh;
}

.header{
  position:absolute;
  bottom: -5%;
  text-align:center;
  width:100%;
  color:#fff;
  font-size:12px;
  -ms-transform: translate(0,-50%); /* IE 9 */
    -webkit-transform: translate(0,-50%); /* Safari */
    transform: translate(0,-50%);

}

#content{
  padding:100px 50px;
  text-align:center;
  width:80%;
  margin:0px auto;
}

h1, h2 {
    font-weight: 400;
    margin: 0px 0px 5px 0px;
}
h1 {
    font-size: 24px;
}
h2 {
    font-size: 16px;
}
p {
    margin: 0px;
}
.profile-card {
	background: #FFB300;
	width: 56px;
	height: 56px;
	position: absolute;
	left: 50%;
	top: 50%;
    z-index: 2;
	overflow: hidden;
    opacity: 0;
    margin-top: 70px;
	-webkit-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	-webkit-border-radius: 50%;
	border-radius: 50%;
	-webkit-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
	box-shadow: 0px 3px 6px rgba(0 ,0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
    -webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_landscape 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
    animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_landscape 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
}
.profile-card header {
    width: 179px;
    height: 280px;
    padding: 40px 20px 30px 20px;
    display: inline-block;
    float: left;
    border-right: 2px dashed #EEEEEE;
	background: #FFFFFF;
    color: #000000;
    margin-top: 50px;
    opacity: 0;
    text-align: center;
    -webkit-animation: moveIn 1s 3.1s ease forwards;
    animation: moveIn 1s 3.1s ease forwards;
}
.profile-card header h1 {
    color: #FF5722;
}
body {
    background-size: 100% auto;
    background-color: #f2f3f5;
    overflow-x: hidden;
}
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    max-width: none;
}
footer {
    padding: 50px 0 65px;
    position: absolute;
    display: block;
    top: 100%;
    width: 100%;
    background-color: #FFFFFF;
}
.profile-card header a {
    display: inline-block;
    text-align: center;
    position: relative;
    margin: 25px 30px;
}
.profile-card header a:after {
	position: absolute;
    content: "";
	bottom: 3px;
	right: 3px;
	width: 20px;
	height: 20px;
    border: 4px solid #FFFFFF;
    -webkit-transform: scale(0);
    transform: scale(0);
    background: -webkit-linear-gradient(top, #2196F3 0%, #2196F3 50%, #FFC107 50%, #FFC107 100%);
    background: linear-gradient(#2196F3 0%, #2196F3 50%, #FFC107 50%, #FFC107 100%);
    -webkit-border-radius: 50%;
    border-radius: 50%;
    -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    -webkit-animation: scaleIn 0.3s 3.5s ease forwards;
    animation: scaleIn 0.3s 3.5s ease forwards;
}
.profile-card header a > img {
    width: 150px;
    height: 150px;
    max-width: 100%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    -webkit-transition: -webkit-box-shadow 0.3s ease;
    transition: box-shadow 0.3s ease;
    -webkit-box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
    box-shadow: 0px 0px 0px 8px rgba(0, 0, 0, 0.06);
}
.user-message {
  width: 85%;
  padding: 15px;
  margin-top: 10px;
  margin: 5p 10px 0;
  border-radius: 10px;
  color: #fff;
  font-size: 15px;
  text-align: justify;;
  background: #1adda4;
}
.bot-message {
  width: 85%;
  padding: 15px;
  margin-top: 10px;
  margin: 5p 10px 0;
  border-radius: 10px;
  color: #fff;
  font-size: 15px;
  text-align: justify;
  background: #1ddced;
}
.profile-card header a:hover > img {
    -webkit-box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 0px 12px rgba(0, 0, 0, 0.1);
}
.profile-card .profile-bio {
    width: 175px;
    height: 180px;
    display: inline-block;
    float: right;
    padding: 50px 20px 30px 20px;
	background: #FFFFFF;
    color: #333333;
    margin-top: 50px;
    text-align: center;
    opacity: 0;
    -webkit-animation: moveIn 1s 3.1s ease forwards;
    animation: moveIn 1s 3.1s ease forwards;
}
.profile-social-links {
    width: 218px;
    display: inline-block;
    float: right;
    margin: 0px;
    padding: 15px 20px;
	background: #FFFFFF;
    margin-top: 50px;
    text-align: center;
    opacity: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-animation: moveIn 1s 3.1s ease forwards;
    animation: moveIn 1s 3.1s ease forwards;
}
.profile-social-links li {
    list-style: none;
    margin: -5px 0px 0px 0px;
    padding: 0px;
    float: left;
    width: 33.3%;
    text-align: center;
}
.profile-social-links li a {
    display: inline-block;
    /* width: 24px;
    height: 24px; */
    padding: 6px;
    position: relative;
    overflow: hidden!important;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.profile-social-links li a img {
    position: relative;
    z-index: 1;
}
.profile-social-links li a:before {
    display: block;
    content: "";
    background: rgba(0, 0, 0, 0.3);
    position: absolute;
    left: 0px;
    top: 0px;
    width: 36px;
    height: 36px;
    opacity: 1;
    -webkit-transition: transform 0.4s ease, opacity 1s ease-out;
    transition: transform 0.4s ease, opacity 1s ease-out;
    -webkit-transform: scale3d(0, 0, 1);
    transform: scale3d(0, 0, 1);
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.profile-social-links li a:hover:before {
    -webkit-animation: ripple 1s ease forwards;
    animation: ripple 1s ease forwards;
}
.profile-social-links li a img,
.profile-social-links li a svg {
    width: 24px;
}


@media screen and (min-aspect-ratio: 4/3) {
    body {
        background-size: 100% auto;
    }
    body:before {
        width: 0px;
    }
    @-webkit-keyframes puff {
        0% {
            top: 100%;
            width: 0px;
            padding-bottom: 0px;
        }
    	100% {
            top: 50%;
            width: 100%;
            padding-bottom: 100%;
        }
    }
    @keyframes puff {
        0% {
            top: 100%;
            width: 0px;
            padding-bottom: 0px;
        }
    	100% {
            top: 50%;
            width: 100%;
            padding-bottom: 100%;
        }
    }
}
@media screen and (min-height: 480px) {
	.profile-card {
		-webkit-animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_portrait 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
		animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, materia_portrait 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
	}
	.profile-card header {
        width: auto;
        height: auto;
        padding: 30px 20px;
        display: block;
        float: none;
        border-right: none;
    }
    .profile-card .profile-bio {
        width: auto;
        height: auto;
        padding: 15px 20px 30px 20px;
        display: block;
        float: none;
    }
    .profile-social-links {
        width: 100%;
        display: block;
        float: none;
    }
}
@media screen and (min-aspect-ratio: 4/3) {
    body {
        background-size: 100% auto;
    }
    body:before {
        width: 0px;
		-webkit-animation: puff_landscape 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
		animation: puff_landscape 0.5s 1.8s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, borderRadius 0.2s 2.3s linear forwards;
	}
}
@-webkit-keyframes init {
    0% {
    	width: 0px;
    	height: 0px;
    }
	100% {
        width: 56px;
        height: 56px;
        margin-top: 0px;
        opacity: 1;
    }
}
@keyframes init {
    0% {
    	width: 0px;
    	height: 0px;
    }
	100% {
        width: 56px;
        height: 56px;
        margin-top: 0px;
        opacity: 1;
    }
}
@-webkit-keyframes puff_portrait {
    0% {
        top: 100%;
        height: 0px;
        padding: 0px;
    }
	100% {
        top: 50%;
        height: 100%;
        padding: 0px 100%;
    }
}
@keyframes puff_portrait {
    0% {
        top: 100%;
        height: 0px;
        padding: 0px;
    }
	100% {
        top: 50%;
        height: 100%;
        padding: 0px 100%;
    }
}
@-webkit-keyframes puff_landscape {
	0% {
		top: 100%;
		width: 0px;
		padding-bottom: 0px;
	}
	100% {
		top: 50%;
		width: 100%;
		padding-bottom: 100%;
	}
}
@keyframes puff_landscape {
	0% {
		top: 100%;
		width: 0px;
		padding-bottom: 0px;
	}
	100% {
		top: 50%;
		width: 100%;
		padding-bottom: 100%;
	}
}
@-webkit-keyframes borderRadius {
    0% {
        -webkit-border-radius: 50%;
    }
	100% {
        -webkit-border-radius: 0px;
    }
}
@keyframes borderRadius {
    0% {
        -webkit-border-radius: 50%;
    }
	100% {
        border-radius: 0px;
    }
}
@-webkit-keyframes moveDown {
    0% {
   	    top: 50%;
    }
	50% {
	   top: 40%;
    }
    100% {
       top: 100%;
    }
}
@keyframes moveDown {
    0% {
   	    top: 50%;
    }
	50% {
	   top: 40%;
    }
    100% {
       top: 100%;
    }
}
@-webkit-keyframes moveUp {
    0% {
        background: #FFB300;
        top: 100%;
    }
	50% {
	   top: 40%;
    }
    100% {
       top: 50%;
       background: #E0E0E0;
    }
}
@keyframes moveUp {
    0% {
        background: #FFB300;
        top: 100%;
    }
	50% {
	   top: 40%;
    }
    100% {
       top: 50%;
       background: #E0E0E0;
    }
}
@-webkit-keyframes materia_landscape {
    0% {
        background: #E0E0E0;
    }
    50% {
        -webkit-border-radius: 4px;
    }
    100% {
        width: 440px;
        height: 280px;
        background: #FFFFFF;
        -webkit-border-radius: 4px;
    }
}
@keyframes materia_landscape {
    0% {
        background: #E0E0E0;
    }
    50% {
        border-radius: 4px;
    }
    100% {
        width: 440px;
        height: 280px;
        background: #FFFFFF;
        border-radius: 4px;
    }
}
@-webkit-keyframes materia_portrait {
	0% {
		background: #E0E0E0;
	}
	50% {
		-webkit-border-radius: 4px;
	}
	100% {
		width: 280px;
		height: 440px;
		background: #FFFFFF;
		-webkit-border-radius: 4px;
	}
}
@keyframes materia_portrait {
	0% {
		background: #E0E0E0;
	}
	50% {
		border-radius: 4px;
	}
	100% {
		width: 280px;
		height: 440px;
		background: #FFFFFF;
		border-radius: 4px;
	}
}
@-webkit-keyframes moveIn {
    0% {
        margin-top: 50px;
        opacity: 0;
    }
	100% {
        opacity: 1;
        margin-top: -20px;
    }
}
@keyframes moveIn {
    0% {
        margin-top: 50px;
        opacity: 0;
    }
	100% {
        opacity: 1;
        margin-top: -20px;
    }
}
@-webkit-keyframes scaleIn {
    0% {
        -webkit-transform: scale(0);
    }
	100% {
        -webkit-transform: scale(1);
    }
}
@keyframes scaleIn {
    0% {
        transform: scale(0);
    }
	100% {
        transform: scale(1);
    }
}
@-webkit-keyframes ripple {
    0% {
        transform: scale3d(0, 0, 0);
    }
    50%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
    }
    100% {
        opacity: 0;
    }
}
@keyframes ripple {
    0% {
        transform: scale3d(0, 0, 0);
    }
    50%, 100% {
        transform: scale3d(1, 1, 1);
    }
    100% {
        opacity: 0;
    }
}
  /** Chat Bot CSS **/

  .chatbot{
    width: 300px;
    min-width: 350px;
    height: 400px;
    background: #fff;
    /* padding: 8px; */
    margin: 10px auto;
    float: right;
    margin-top: 0px;
    box-shadow: 0 3px #ccc;
  }

  .chatbot-menu-header {
    background-color: #007BFF;
    padding: 7px 25px;
    color: #FFFFFF;
    height: 40px;
  }

  .chatbot-close {
    display: inline-block;
    margin-left: 20px;
    margin-top: 2.5px;
    }
  .fa-close, .fa-question-circle {
    font-size: 23px;
    padding-left: 120px
  }
  .chatbot-menu-header span {
    font-weight: bold;
  }
  .chatbot-menu-header a {
    color: #FFFFFF;
  }
  div.hng-logo {
    display: inline-block;
    font-size: 23px;
    font-weight: bold;
  }

  span{
    color: #000;
  }

  .chatlogs{
    padding: 10px;
    width: 100%;
    height: 300px;
    overflow-x: hidden;
    overflow-y: scroll;
  }

  .chatlogs::-webkit-scrollbar{
    width: 10px;
  }

  .chatlogs::-webkit-scrollbar-thumb{
    border-radius: 5 px;
    background: rgba(0,0,0,.1);
  }

  .chat{
    display: flex;
    flex-flow: row wrap;
    align-items: flex-start;
    margin-bottom: 10px;
  }

  .chat .user-photo{
    width: 30px;
    height: 30px;
    background: #ccc;
    border-radius: 50%;
    overflow: hidden;
  }

  .chat .user-photo img{
    width: 100%;

  }

  .chat .chat-message{
    width: 85%;
    padding: 15px;
    margin: 5p 10px 0;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    text-align: justify;
  }

  .chat .self-message {
    width: 85%;
    padding: 15px;
    margin-top: 10px;
    margin: 5p 10px 0;
    border-radius: 10px;
    color: #fff;
    font-size: 15px;
    text-align: justify;
  }

  .friend .chat-message{
    background: #1adda4;
  }

  .self .self-message{
    background: #1ddced;
  }

  .chat p {
    line-height: 1.2;
  }


  #chat-form{
    display: flex;
    align-items: flex-start;
  }

  #chat-form textarea{
    background: #fbfbfb;
    width: 75%;
    height: 43px;
    border: 2px solid #eee;
    border-radius: 3px;
    resize: none;
    padding: 10px;
    font-size: 16px;
    color: #333;
  }

  #chat-form textarea:focus{
    background: #fff;
  }

  #chat-form textarea::-webkit-scrollbar{
    width: 10px;
  }

  #chat-form textarea::-webkit-scrollbar-thumb{
    border-radius: 5 px;
    background: rgba(0,0,0,.1);
  }

  #chat-form button{
    background: #007bff;
    padding: 5px 15px;
    font-size: 20px;
    color: #fff;
    border: none;
    margin: 0 10px;
    border-radius: 3px;
    box-shadow: 0 3px 0 #0eb21c1;
    cursor: pointer;

    -webkit-transition:background .2s ease;
    -moz-transition: background .2s ease;
    -o-transition: background .2s ease;
  }

.chat-trigger {
  position: absolute;
  bottom: 2em;
  right: 2em;
  background-color: #ee5327;
  border-radius: 5%;
  padding: .5em .7em;
  box-shadow: 2px 2px 1px #222;
  border-width: 0px;
  color: #222;
}
.chat-trigger:hover {
  background-color: #222;
  color: white;
}

.chat-trigger {
  position: fixed;
  bottom: 0em;
  right: 0em;
  margin-top: 2em;
}

.hidden {
  visibility: hidden;
}

</style>

<!-- Profile and Chatbot Interface -->
<body>

<div id="hero">
    <div class="header">
      <aside class="profile-card">

      	<header>

      		<!-- here’s the avatar -->
      		<a href="#">
      			<img src="https://res.cloudinary.com/esther/image/upload/v1523975518/mine.jpg" />
      		</a>

      		<!-- the username -->
      		<h1>Esther Itolima</h1>

      		<!-- and role or location -->
      		<h2>Frontend Web Developer</h2>

      	</header>

      	<!-- bit of a bio; who are you? -->
      	<div class="profile-bio">

      		<p>Am a tech enthusiasts and also a frontend web developer</p>


      	</div>

      	<!-- some social links to show off -->
      	<ul class="profile-social-links">

      		<!-- twitter - el clásico  -->
      		<li>
      			<a href="https://www.facebook.com/itolimaesther"><img src="https://res.cloudinary.com/esther/image/upload/v1523978383/facebook.png"></a>
      		</li>

      		<!-- envato – use this one to link to your marketplace profile -->
      		<li>
      			<a href="https://twitter.com/Itolimaesther"><img src="https://res.cloudinary.com/esther/image/upload/v1523978402/twitter.png"></a>
      		</li>

      		<!-- codepen - your codepen profile-->
      		<li>
      			<a href="https://www.linkedin.com/in/itolimaesther/"><img src="https://res.cloudinary.com/esther/image/upload/v1523978414/linkedin.png" ></a>
      		</li>

      		<!-- add or remove social profiles as you see fit -->

      	</ul>
        <button  class="chat-trigger btn btn-secondary" id="chat-trigger">Lets Chat</button>

      </aside>

      <!-- Chat Bot Interfce -->

       <div class="chatbot hidden0" id="chatbot">
         <div class='chatbot-menu-header'>
                         <div class="hng-logo"><span>Esty Chatbot</span>
                         <a href="#" class="pull-right chatbot-close"><i class="fa fa-close" id="closechat"></i></a>
                     </div>
        <div class="chatlogs">
          <div id="chat-area" class="self chat">
            <p class="self-message">Hi there, I am Esty.</p>
            <p class="self-message">Am excited to meet you and also to answer your questions</p>
            <p class="self-message">Type "about hng internship" without the quotes to know about the HNG internship</p>
          </div>
        </div>
          <div id="chat-form">
            <input type="text" name="chatbot-input" id="chat-send" class="form-control" placeholder="Type your question"autofocus>
            <button class="chatbot-send" onclick="checkMessage()">Send</button>
          </div>
          </div>
    </div>
  </div>

  <!-- Javascript code -->
     <script>
     var chatArea = document.getElementById('chat-area');

      window.addEventListener('DOMContentLoaded', function() {
            (function($) {
                $(document).ready(function() {
                  $( "#chat-trigger" ).click(function() {
                    $("#chatbot").removeClass("hidden");
                  });
                });
                $(document).ready(function() {
                  $( "#closechat" ).click(function() {
                    $("#chatbot").addClass("hidden");
                  });
                });
                });
              });
           function aboutBot() {
            renderMessage(`The HNG is a 3-month remote internship program designed
  to locate the most talented software developers in Nigeria and the whole
             of Africa. Everyon e is welcome to participate (there is no entrance exam).
              We create fun challenges every week on our slack channel. THose who
              solve them stay on. Everyone gets to learn important concepts quickly,
              and make connections with people they can work with in the future.
              The intern coders are introduced to complex programming frameworks,
              and get to work on real applications that scale. the finalist are
              connected to the best companies in the tech ecosystem and get full
              time jobs and contracts immediately.`, 'bot-message');
          }
          function renderMessage(msg, className) {
            var messageNode = document.createElement('p');
            messageNode.innerHTML = msg;
            messageNode.classList.add(className);
            chatArea.appendChild(messageNode);
            chatArea.scrollTop = 3000;
          }
          function checkMessage() {
            var msg = document.getElementById('chat-send').value;
            console.log(msg)
            if (msg.trim() === '' || msg.trim() === null || msg.trim() === undefined) {
              return;
            }
            else if (msg.trim() === 'about hng internship') {
              renderMessage(msg, 'user-message');
              aboutBot();
            }
            else {
              console.log(msg)
              renderMessage(msg, 'user-message');
              sendMessage(msg);
            }
          }
          function sendMessage(msg) {
            var form = document.getElementById('chat-form');
            var formData = new FormData(form);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                console.log(xhttp.responseText);
                getAnswer(xhttp.responseText);
              }
            };
            xhttp.open("POST", "profiles/esther.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("question=" + msg.trim());
          }
          function getAnswer(msg) {
            renderMessage(msg, 'bot-message');
          }

    </script>
</body>
</html>
