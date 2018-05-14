<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];

  $result2 = $conn->query("Select * from interns_data where username = 'basitomania'");
  $user = $result2->fetch(PDO::FETCH_ASSOC);
  
  $username = $user['username'];
  $name = $user['name'];
  $image_filename = $user['image_filename'];
?>   

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Basitomania | Web Developer</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Changa+One|Open+Sans" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <style>
        /********************
GENERAL
*********************/
body {
	font-family: 'Open Sans', sans-serif;
}
#wrapper {
	max-width: 940px;
	margin: 0 auto;
	padding: 0 5%;
}

a {
	text-decoration: none;
}


h3 {
	margin: 0 0 1em 0;
}

/********************
HEADING
*********************/
header {
	float: left;
	margin: 0 0 30px 0;
	padding: 5px 0 0 0;
	width: 100%;
}
#logo {
	text-align: center;
	margin: 0;
}

h1 {
	font-family: 'Changa One', sans-serif;
	margin: 15px 0;
	font-size: 1.75em;
	font-weight: normal;
	line-height: 0.8em;
}

h2 {
	font-size: 0.75em
	margin: -5px 0 0;
	font-weight: normal;
}

#primary {
		width: 50%;
		float: left;
	}

#secondary {
		width: 40%;
		float: right;
	}


/********************
FOOTER
*********************/
footer {
	font-size: 0.95em;
	text-align: center;
	clear: both;
	padding-top: 50px
	color: #ccc;
}

/********************
PAGE: ABOUT
*********************/
.profile-photo {
			width: 200px;
            border-radius:50%;
        }



/********************
PAGE: CONTACT
*********************/
.contact-info {
	list-style: none;
	padding: 0;
	margin: 0;
	font-size: 0.9em;
}

.contact-info a {
	display: block;
	min-height: 20px;
	background-repeat: no-repeat;
	background-size: 20px 20px;
	padding: 0 0 0 30px;
	margin: 0 0 10px;
}

.contact-info li.phone a {
	background-image: url('../img/phone.png');
}

.contact-info li.mail a {
	background-image: url('../img/mail.png');
}

.contact-info li.twitter a {
	background-image: url('../img/twitter.png');
}

/********************
COLORS
*********************/

/* site body */
body {
	background-color: #fff;
	color: #999;
}

/* Green Header */
header {
	background: #6ab47b;
	border-color: #599a68;
	padding-top: 30px;
}

/* Nav background on mobile devices */
nav {
	background: #599a68;
	text-align: center;
	padding: 5px 0;
	margin: 5px 0 0;
}

h1, h2 {
	color: #fff;
}

/* logo text */
a {
	color: #6ab47b;
}

/*chatbot*/
.chatbot-container{
		  background-color: #F3F3F3;
		  width: 500px;
		  height: 500px;
		  margin: 10px;
		  box-sizing: border-box;
		  box-shadow: -3px 3px 5px gray;
		}
.chat-header{
			width: 500px;
			height: 50px;
			background-color: #6ab47b;
			color: white;
			text-align: center;
			padding: 10px;
			font-size: 1.5em;
		}
#chat-body{
		    display: flex;
		    flex-direction: column;
		    padding: 10px 20px 20px 20px;
		    background: white;
		    overflow-y: scroll;
		    height: 395px;
		    max-height: 395px;
		}
.message{
			font-size: 0.8em;
			width: 300px;
			display: inline-block;
          	padding: 10px;
			margin: 5px;
        	border-radius: 10px;
    		line-height: 18px;
		}
.bot-chat .bot-message {
            text-align: right;
        }
.bot-chat{
			text-align: left;
		}
.bot-chat .message{
			background-color: #6ab47b;
			color: white;
			opacity: 1.9;
			box-shadow: 3px 3px 5px gray;
		}
#chat_showcase{
      list-style-type: none;
      display: flex;
      flex-direction: column;
    }

.user_chat{
			text-align: right;
		}
.user_chat .message{
			background-color: #E0E0E0;
			color: black;
			box-shadow: 3px 3px 5px gray;
		}
.chat-output .bot-message {
            text-align: right;
        }
.chat-output .bot-message .message {
            background: #eee;
        }

button{
      border:none;
      outline:0;
      display: inline-block;
      padding:20px;
      color:#6ab47b;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
	  border-radius: 10px;
    }
input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
</style>
	</head>
	<body>
		<header>
			<a href="index.html" id="logo">
				<h1>Basitomania</h1>
				<h2>Web Developer</h2>
			</a>
		</header>
		<div id="wrapper">
				<section id = "primary">
					<img src="https://res.cloudinary.com/envision-media/image/upload/v1524776569/IMG_20180211_193710.jpg" alt="photo" class="profile-photo">
					<h3 style = "padding-top:10px">About</h3>
					<p>Hi I'm basitomania, this is my design portfolio where i share all my work when i'm not surfing the net and markerting online. To follow me on twitter my handle is <a href="http://www.twitter.com">@iamblack8</a>.</p>
					<h3 style = "padding-top:10px">Contact Details</h3>
					<ul class="contact-info">
						<li class="phone">
							<a href="tel:+2348166380172">+2348166380172</a>
						</li>
						<li class="mail">
							<a href="mailto:basitomania@gmail.com">basitomania@gmail.com</a>
						</li>
						<li class="twitter">
							<a href="http://twitter.com/intent/tweet?screen_name=iamblack8">@iamblack8</a>
						</li>
					</ul>	
				</section>		
			<section id="secondary">
				<div class="chatbot-container">
					<div class="chat-header">
						<span>Bas Chatbot</span>
					</div>
					<div id="chat-body">
						<div class="bot-chat">
							<div id="user-output">
								<div class="message">Hello! My name is Basbot.<br>You can ask me questions and get answers.<br>Type <span style="color: #90CAF9;/"><strong> Aboutbot</strong></span> to know more about me.</div>
								<div class="message">You can also train me to be smarter by typing; <br><span style="color: #90CAF9;"><strong>train: question #answer #password</strong></span><br></div>
							</div>
						</div>
					</div>
					<div class="chat-footer">
						<div class="input-text-container">
							<form action="" method="post" id="input-form">
								<input type="text" name="input-text" id="input" required class="input-text" placeholder="Type your question here...">
								<!-- <button type="submit" class="send_button" id="send">Send</button>-->
							</form>
						</div>
					</div>
				</div>
			</section>		
		</div>
<?php
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
	$data = $_POST['input-text'];
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
	echo "<div id='result'>BasBot v1.0 - I am simply a bot that returns data from the database and I also can be taught new tricks!</div>";
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

function getAnswer($input) {
	$question = $input;
	$sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
	$q = $GLOBALS['conn']->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$data = $q->fetchAll();
	if(empty($data)){
		echo "<div id='result'>Sorry, I do not know that command. You can train me simply by using the format - 'train: question # answer # password'</div>";
	}else {
		$rand_keys = array_rand($data);
		echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
	}
}
?>

		<footer>
			<p>&copy; 2017 Maniaweb.</p>
		</footer>
			<script type = text/javascript>
				var outputArea = $("#user-output");

				$("#input-form").on("submit", function(e) {

					e.preventDefault();

					var message = $("#input").val();

					outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);


					$.ajax({
						url: 'profile.php?id=basitomania',
						type: 'POST',
						data:  'input-text=' + message,
						success: function(response) {
							var result = $($.parseHTML(response)).find("#result").text();
							setTimeout(function() {
								outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
								$('#user-output').animate({
									scrollTop: $('#user-output').get(0).scrollHeight
								}, 1500);
							}, 250);
						}
					});


					$("#input").val("");

				});
			</script>
		</div>
	</body>
</html>