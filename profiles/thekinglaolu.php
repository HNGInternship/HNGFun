<?php
<<<<<<< HEAD
	if(!defined('DB_USER')){

		require_once '../../config.php';

		try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare("select secret_word from secret_word limit 1");
	$stmt->execute();
	$secret_word = null;
=======
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $conn->prepare("select secret_word from secret_word limit 1");
	$stmt->execute();

	$secret_word = null;

>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $stmt->fetchAll();
	if(count($rows)>0){
		$row = $rows[0];
		$secret_word = $row['secret_word'];	
	}
?>

<?php 
<<<<<<< HEAD
	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' ) {
	    $question = $_GET['chat-input'];
=======
	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
	    $question = $_POST['chat-input'];
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440

	    $trainingInput =  stripos($question, "train:");
	    $questionTrim = preg_replace('([\s]+)', ' ', trim(strtolower($question)));

<<<<<<< HEAD
	    
	    
=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	    if ($questionTrim === 'aboutbot') {
	        echo "<div id='reply'>Hello Human, I am Groot v1.0 </div>";
	    }
	    elseif ($trainingInput === false) {
	        $question = preg_replace('([?.])', '', $questionTrim);

	        $question = $question;
	        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
<<<<<<< HEAD
	        $stmt = $conn->query($sql);
	        $q = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        if(empty($q)) {
	            echo "<div id='reply'>I am Groot, Try train me with train: question / answer / password</div>";
=======
	        $stmt = $GLOBALS[ 'conn' ]->query($sql);
	        $q = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        if(empty($q)) {
	            echo "<div id='reply'>I am Groot, Try train me with <span class='train'> train: question # answer # password</span></div>";
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	        }else {
	            $rand_keys = array_rand($q);
	            $reply = $q[$rand_keys]['answer'];
	            echo "<div id='reply'>" . $reply . "</div>";
	        }
<<<<<<< HEAD
=======

>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	    }
	    else {
	        $trainingText =  preg_replace('([?.])', '', $questionTrim);
	        $trainingText =  substr( $trainingText, 6);
<<<<<<< HEAD
	        $trainingText =  explode('/', $trainingText);
=======
	        $trainingText =  explode("#", $trainingText);
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440

	        $trainingQuestion = trim($trainingText[0]);
	        $trainingAnswer   = trim($trainingText[1]);
	        $trainingPassword = trim($trainingText[2]);

<<<<<<< HEAD
	        if ($trainingPassword === 'password') {
=======
	        if ($trainingPassword != 'password') {
	            echo "<div id='reply'>I am Groot! Please enter a correct password. {Hint: Password is password ;)}</div>";
	        }
	        else {
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	            $sql = 'SELECT * FROM chatbot WHERE question = "' . $trainingQuestion . '" and answer = "' . $trainingAnswer . '" LIMIT 1';
	            $stmt   = $GLOBALS[ 'conn' ]->query( $sql );
	            $trainer = $stmt->fetch(PDO::FETCH_ASSOC);
	            if ( empty( $trainer ) ) {
	                $trainingList = array( ':question' => $trainingQuestion,':answer' => $trainingAnswer);
	                $sql = 'INSERT INTO chatbot ( question, answer) VALUES ( :question, :answer);';
	                try {
	                    $stmt = $GLOBALS['conn']->prepare( $sql );
	                    if ( $stmt->execute( $trainingList ) == true ) {
	                        echo "<div id='reply'>I am Groot! Yipee! You've taught me something new!</div>";
	                    }
	                }
	                catch ( PDOException $e ) {
	                    echo "Connection failed" . $e->getMessage();
	                }
	            }
	            else {
	                echo "<div id='reply'>I am Groot! I know that already :/</div>";
	            }
	        }
<<<<<<< HEAD
	        else  {
	            echo "<div id='reply'>I am Groot! Please enter a correct password. {Hint: Password is password ;)}</div>";
	        }
=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	    }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<<<<<<< HEAD
    <link href="https://fonts.googleapis.com/css?family=Lato|Varela+Round|Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<style>

=======
    <link href="https://fonts.googleapis.com/css?family=Lato|Varela+Round|Work+Sans" rel="stylesheet"> 
	<style>

		body {
			background-color: #fff !important;
		}

>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
		.wrapper{
			font-size: 62.5%;
			display: grid;
			grid-template-areas: 'about chatbox';
			box-sizing: border-box;
<<<<<<< HEAD
			background: #fff;
=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
		}

		h1 {
			color: #383838;
			font-size: 5em;
			font-family: 'Poppins', sans-serif;
			font-weight: normal;
			margin-bottom: 0;
		}

		h2 {
		  font-family: 'Poppins', sans-serif;
			color: #383838;
			font-size: 1.8em;
			margin-top: 0;
			font-weight: 300;
		}

		.about-me {
<<<<<<< HEAD
			grid-area: 'about';
=======
			grid-area: about;
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
			max-width: 50em;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
		}

		.bio {
		  color: #383838;
		  font-family: 'Lato', sans-serif;
		  font-size: 1.8em;
		  padding: .5em 1em;
		}

		.profile-picture {
			height: 15em;
			margin-top: 4em;
			border-radius: 100%;
		}

		.grey {
			height: .3em;
			background-color: #7A7A7A;
			border: none;
			width: 5em;
		}

		.chat-box {
<<<<<<< HEAD
			grid-area: 'chatbox';
			font-family: 'Varela Round', sans-serif;
			font-weight: bold;
			height: 87vh;
			width: 35em;
			margin-top: 4em;
=======
			font-family: 'Varela Round', sans-serif;
			font-weight: bold;
			grid-area: 'chatbox';
			height: 80vh;
			width: 35em;
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
			padding: 2em 1em 0 2em;
			border: .3em dashed #808080;
			border-radius: 5%;
		}

		.chat-log {
			display: flex;
			flex-direction: column;
			height: 90%;
			color: #fff;
			padding-right: 1em;
<<<<<<< HEAD
			margin-bottom: .8em;
=======
			margin-bottom: .3em;
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
			overflow-y: scroll;
		}

		.bot-msg {
			text-align: left;
			padding: .4em .8em;
			background: #3f8abf;
			margin-bottom: .7em;
			border-radius: 1.2em;
			width: -moz-fit-content;
			max-width: 70%;
		}

		.user-msg {
			text-align: right;
			padding: .4em .8em;
			background: #5fcf80;
			margin-left: auto;
			margin-bottom: .7em;
			border-radius: 1.2em;
			width: -moz-fit-content;
			max-width: 70%;
		}

		.chat-input-wrapper {
			width: 100%;
			text-align: center;
			padding-right: 1em;
		}

		#chat-input {
			width: 80%;
			height: 100%;
			padding: .5em 1em;
			margin-right: .5em;
			background: none;
			color: #656565;
			background-image: none;
			border: 1px solid #a0b3b0;
			border-radius: 2em;
			-webkit-transition: border-color .25s ease, box-shadow .25s ease;
			transition: border-color .25s ease, box-shadow .25s ease;
		}
<<<<<<< HEAD

=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
		#chat-input:focus {
			outline: 0;
			border-color: #3f8abf;
		}

		.chat-button {
			background: #3f8abf;
			color: #fff;
			width: 3em;
			height: 3em;
			border-radius: 100%;
			box-sizing: border-box;
			border: none;
		}
<<<<<<< HEAD

		.chat-button i {
			color: #fff;
			font-size: 1.5em;
		}

=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
		@media screen and (max-width: 992px){
			.wrapper {
				grid-template-areas:
					'about'
					'chatbox';
			}
<<<<<<< HEAD

=======
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
			.chat-box {
				margin: 0 auto;
			}
		}
	</style>
	<title>David Afolayan | thekinglaolu</title>
</head>
<body>
	<main class="wrapper">
		<section class="about-me">
<<<<<<< HEAD
			<img src="https://res.cloudinary.com/thekinglaolu/image/upload/v1523623906/1X1.jpg" alt="profile-picture" class="profile-picture" />
=======
			<img src="https://res.cloudinary.com/thekinglaolu/image/upload/v1523623906/1X1.jpg" alt="profile-picture" class="profile" />
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
			<h1> David Afolayan </h1>
			<h2>FRONTEND MAGICIAN</h2>
			<hr class="grey"/>
			<p class="bio">David Afolayan is a young and passionate ninja geek. He has interests in javascript technologies, UI/UX design and building things that crawl on the web. He's aspiring tech influencer who's trying to get his feet steady in the sands of coding. And did I mention he's a sucker for graphics design, phtography and art? Well, He is!</p>
		</section>
		<section class="chat-box">
			<section class="chat-log">
				<div class="bot-msg">
					I AM GROOT!
				</div>
				<div class="bot-msg">
					You can know me better using this command "aboutbot"
				</div>
				<div class="bot-msg">
					Ask me any question you like, I'm that smart! ;)
				</div>
				<div class="bot-msg">
<<<<<<< HEAD
					You can teach me new stuff with this "train: question / answer / password"
				</div>
			</section>
			<section class="chat-input-wrapper">
					<form action="" method="GET" id="chat-form">
						<input type="text" name="chat-input" id="chat-input" required>
						<button type="submit" class="chat-button" id="submit">
							<i class="fas fa-paper-plane"></i>
=======
					You can teach me new stuff with this "train: question # answer # password"
				</div>
			</section>
			<section class="chat-input-wrapper">
					<form action="" method="post" id="chat-form">
						<input type="text" name="chat-input" id="chat-input" required>
						<button type="submit" class="chat-button" id="submit">
							<i class="fa fa-send"></i>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
						</button>
					</form>				
			</section>
		</section>
	</main>
<<<<<<< HEAD
=======
	<script src="vendor/jquery/jquery.min.js"></script>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
	<script>
    var chatLog = $(".chat-log");
	    $("#chat-form").on("submit", function(event) {
	        event.preventDefault();
	        var chatInput = $("#chat-input").val();
	        chatLog.append("<div class='user-msg'>"+ chatInput +"</div>");
			$.ajax({
				url: 'profile.php?id=thekinglaolu',
<<<<<<< HEAD
				type: 'GET',
				data: 'chat-input=' + chatInput,
				success: (reply) => { 
			        var botReply = $($.parseHTML(reply)).filter('#reply').text();
			        console.log(reply);
			        console.log(botReply);
			        setTimeout(function() {
				        chatLog.append("<div class='bot-msg'>"+ botReply +"</div>");
=======
				type: 'POST',
				data: 'chat-input=' + chatInput,
				success: (reply) => { 
			        let botReply = $($.parseHTML(reply)).find('#reply').text();
			        setTimeout(function() {
				        chatLog.append("<div class='bot-msg'>"+ botReply +"</div>");      
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
				       	$('.chat-log').animate({scrollTop: $('.chat-log').get(0).scrollHeight}, 1100);
				       }, 500);
				}
				
			});

			$('#chat-form').trigger("reset");
		});	
	</script>
</body>
</html>