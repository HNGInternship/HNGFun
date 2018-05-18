<?php
	header("Access-Control-Allow-Origin: *");
	if($_SERVER['REQUEST_METHOD'] === "GET"){
		if(!defined('DB_USER')){
			require "../../config.php";
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("select secret_word from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];
		}

		$name = null;
		$username = "somiari";
		$image_filename = '';

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];
			$image_filename = $row['image_filename'];
		}
	}
?>


<?php
		// require_once '../../config.php';
		// require_once '../db.php';

		// $result = $conn->query("Select * from secret_word LIMIT 1");
		// $result = $result->fetch(PDO::FETCH_OBJ);
		// $secret_word = $result->secret_word;

		// $result2 = $conn->query("Select * from interns_data where username = 'somiari'");
		// $user = $result2->fetch(PDO::FETCH_OBJ);

	// Function to return Date
	function respondDate(){
		date_default_timezone_set("Africa/Lagos");
		$time = date("Y/m/d");
		$respondTime = array( 'Today\'s date is '.$time,
								'it\'s '. $time,
								'Today is '. $time,
								$time);
		$index = mt_rand(0, 3);
		return $anwerSam = $respondTime[$index];
	}// Date function ends here

	// Function to return Time
	function respondTime(){
		date_default_timezone_set("Africa/Lagos");
		$time = date("h:i A");
		$respondTime = array( 'The time is '.$time,
								'it\'s '. $time,
								$time);
		$index = mt_rand(0, 2);
		return $anwerSam = $respondTime[$index];
	} // Time function ends here

	// function to train bot
	// pass message as arguement
	function trainAlan($newmessage){
		require_once '../db.php';
		$message = explode('#', $newmessage);
		$question = explode(':', $message[0]);
		$answer = $message[1];
		$password = $message[2];

		$question[1] = trim($question[1]); //triming off white spaces
		$password = trim($password); //triming off white spaces

		// check if password matches
		if ($password != "password"){
			echo "You are not authorized to train me.";
		}else{
			$chatbot= array(':id' => NULL, ':question' => $question[1], ':answer' => $answer);
			$query = 'INSERT INTO chatbot ( id, question, answer) VALUES ( :id, :question, :answer)';

			try {
				$execQuery = $conn->prepare($query);
				if ($execQuery ->execute($chatbot) == true) {
					// call a function that handles successful training response
					echo repondTraining();
				};
			} catch (PDOException $e) {
				echo "Oops! i did't get that, Something is wrong i guess, <br> please try again";
			} // End Catch
		} // End Else
	} // Train Function Ends here

	// Returns random respond to training
	// called if training is successful
	function repondTraining(){
		$repondTraining = array(  'Noted! Thank you for teaching me',
									'Acknowledged, thanks, really want to learn more',
									'A million thanks, I\'m getting smarter',
									'i\'m getting smarter, I really appreciate');
		$index = mt_rand(0, 3);
		return $anwerSam = $repondTraining[$index];
	} // respondTraining Ends Here


	// Function to check if question is in database
	// Returns 1 if question is not found in database
	function checkDatabase($question){
		try{
			require_once '../db.php';
			$stmt = $conn->prepare('select answer FROM chatbot WHERE (question LIKE "%'.$question.'%") LIMIT 1');
			$stmt->execute();

			// checking if query retrieves data
			if($stmt->rowCount() > 0){
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ echo $row["answer"];}
			}else{
				return 1; // returns 1 is no data was retrieved
			}
		}catch (PDOException $e){
			 echo "Error: " . $e->getMessage();
		} // Catch Ends here

		$conn = null; // close database connection
	}

	//////////// CHATBOT STARTS HERE //////////////////////////////////////////////////////////////
		// if (isset($_POST['message'])) {
			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			// Retrieve form data from ajax
			// Change message to all lowercase
			// trim off white spaces
			$message = trim(strtolower($_POST['message']));

			//Analyse message to determine response
			// if (strtok($message, ":") == "train"){
				if (strpos($message, 'train') !== false) {
					trainAlan($message); // Call function to handle training
			}else if ($message != "" ){
				// Check if question exist in database
				// returns 1 if question does not exist in database
				$tempVariable = checkDatabase($message);

				if ($tempVariable == 1){
					if ($message == "what is the time"){
						echo respondTime();
					}else if ($message == "today's date"){
						echo respondDate();
					}else{
						echo "I didn't quite get that but I'm a fast learner.
						To teach me something, just type and send:
						train: question # answer # password";
					} // end else
				} // end if
			}
			die();
		}

		// if ($_SERVER["REQUEST_METHOD"] == "GET"){
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Somiari Lucky | Learner, Developer, Builder</title>
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display|Roboto+Condensed" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style>
			*,
			*::before,
			*::after {
				margin: 0;
				padding: 0;
				box-sizing: inherit;

			}

			html {
				font-size: 100%;
				box-sizing: border-box;
				height: auto !important;
			}

			body {
				font-family: Roboto, 'Roboto Slab', sans-serif;
				font-size: 1.4rem;
				line-height: 1;
				height: auto !important;
				background: #ecf0f1;
			}

			a {
				color: inherit;
				text-decoration: none;
			}

			.contained {
				margin: 0 auto;
				height: 100%;
				width: 95%;
				max-width: 2000px;
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				text-align: center;
			}

			.name {
				font-family: 'Playfair Display', sans-serif;
				font-size: 4rem;
				font-weight: 900;
				color: #0e0e19;
				letter-spacing: 1px;
			}

			.labels {
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 1.1rem;
				letter-spacing: 1px;
				color: orangered;
				margin-top: 15px;
			}

			.socials {
				width: 80%;
				margin-top: 30px;
				display: flex;
				justify-content: space-between;
				flex-wrap: wrap;
			}

			.socials .fa-icon {
				font-size: 1.2rem;
				flex-basis: 33%;
				margin: 8px auto;
				color: #555;
				transition: all .5s ease;
			}

			.socials .fa-icon:hover {
				color: #0e0e19;
			}

			.footer {
				font-size: 1.1rem;
				color: #666;
				margin-left: auto;
				margin-right: auto;
				margin-top: 40px;
				margin-bottom: 20px;
				text-align: center;
			}

			.footer .icon {
				padding-left: 5px;
				padding-right: 5px;
				font-size: 1.4rem;
				color: rgba(0, 0, 0, .3);
			}

			.profile-pic img {
				margin-top: 50px;
				width: 90%;
			}

			.chat-box {
				display: flex;
				flex-direction: column;
				margin: 50px auto 30px auto;
				border: 1px solid rgba(0, 0, 0, .3);
				border-radius: 30px;
				width: 90%;
				padding-bottom: 10px;
			}

			.chat-box .chat-box-header {
				display: block;
				padding-top: 20px;
				padding-bottom: 20px;
				border-bottom: 1px solid rgba(0, 0, 0, .3);
				font-size: 18px;
			}

			.chat-msgs {
				height: 300px;
				margin: 30px auto 15px auto;
				overflow-y: scroll;
				width: 98%;
			}

			.guest,
			.alan {
				width: auto;
				max-width: 80%;
				border: 1px solid lightgrey;
				padding: 5px;
				clear: both;
				margin: 0 5px 5px 8px;
				border-radius: 10px;
				font-size: 16px;
			}

			.alan {
				text-align: left;
				padding-left: 20px;
			}

			.guest {
				float: right;
				text-align: left;
				padding-right: 20px;
			}

			.chat-type {
				position: relative;
				width: 100%;
				margin: 0 auto;
			}

			.chat-msg {
				width: 95%;
				margin: 0 auto;
				outline: none;
				border: 1px solid rgba(0, 0, 0, .3);
				background: transparent;
				/* position: relative; */
				resize: none;
				padding: 10px;
				padding-right: 75px;
				height: 90px;
				border-radius: 10px;
				font-size: 18px;
			}

			.chat-send {
				position: absolute;
				border-radius: 50%;
				border: 1px solid rgba(0, 0, 0, .3);
				height: 50px;
				width: 50px;
				background: transparent;
				right: 20px;
				bottom: 23px;
				color: rgba(0, 0, 0, .6);
				cursor: pointer;
				outline: none;
				/* overflow: hidden; */
			}

			@media only screen and (min-width: 600px) {
				.socials .fa-icon {
					flex-basis: 0;
				}
				.name {
					font-size: 4.1rem;
					font-weight: bolder;
				}
				.labels {
					font-size: 1.4rem;
				}
				.footer {
					font-size: 1.2rem;
				}
				.footer .icon {
					font-size: 1.4rem;
				}
				.guest,
				.alan {
					width: auto;
					max-width: 60%;
				}

				.chat-send {
					line-height: 50px;
					position: absolute;
					border-radius: 50%;
					border: 1px solid rgba(0, 0, 0, .3);
					;
					height: 50px;
					width: 50px;
					background: transparent;
					right: 40px;
					bottom: 23px;
					color: rgba(0, 0, 0, .6);
					cursor: pointer;
					outline: none;
					/* overflow: hidden; */
				}
				.chat-msg {
					width: 95%;
					margin: 0 auto;
					outline: none;
					border: 1px solid rgba(0, 0, 0, .3);
					background: transparent;
					/* position: relative; */
					resize: none;
					padding: 10px;
					padding-right: 85px;
					height: 90px;
					border-radius: 10px;
					font-size: 18px;
				}

				.chat-box .chat-box-header {
					font-size: 24px;
				}
			}

			@media only screen and (min-width: 700px) {
				.name {
					font-size: 5.1rem;
					font-weight: bolder;
				}
				.labels {
					font-size: 1.8rem;
				}
			}

			@media only screen and (min-width: 800px) {
				.name {
					font-size: 6rem;
					font-weight: bolder;
				}
				.labels {
					font-size: 1.9rem;
				}
			}

			@media only screen and (min-width: 1200px) {
				.name {
					font-size: 8rem;
					font-weight: bolder;
				}
				.labels {
					font-size: 2.4rem;
				}
			}
		</style>
	</head>

	<body>


		<div class="contained">
			<figure class="profile-pic">
				<img src="https://res.cloudinary.com/somiari/image/upload/v1523656656/somiariblended_feuybj.png" alt="An overtly serious pic of Somiari. Lol.">
			</figure>
			<section class="title">
				<h1 class="name">
				<?php echo $name; ?>
				</h1>
				<p class="labels">UI/UX and Web Developer.</p>
			</section>
			<section class="socials">
				<a href="https://www.github.com/somiari" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-github-alt"></i>
				</a>
				<a href="https://www.twitter.com/somiarilucky" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-twitter"></i>
				</a>
				<a href="https://www.facebook.com/somiarilucky" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-facebook-f"></i>
				</a>
				<a href="https://www.medium.com/@somiari" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-medium"></i>
				</a>
				<a href="https://www.linkedin.com/in/somiarilucky" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-linkedin"></i>
				</a>
				<a href="mailto:hello@somiari.me" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-envelope"></i>
				</a>
			</section>

			<form class="chat-box" id="ajax-contact" method="post" action="">
				<span class="chat-box-header">Alan is not a bot</span>
				<div class="chat-msgs">
					<p class="alan">Hello! I'm Alan, and I am
						<del>not</del> a bot.</p>
					<p class="alan">I'm a fast learner. To teach me something, just type and send: train: question # answer # password</p>
				</div>
				<div class="chat-type">
					<textarea class="chat-msg" name="message" required></textarea>
					<button class="chat-send" type="submit">
						<i class="icon fa fa-fw fa-paper-plane"></i>
					</button>
				</div>
			</form>

			<footer class=".footer">
				<?php
				date_default_timezone_set('Africa/Lagos');
			?>
				<span class="date">
					<?php echo date("D. M d, Y"); ?>
				</span>
				<i class="icon fa fa-fw fa-clock-o"></i>
				<span class="time">
					<?php echo date("h:i a"); ?>
				</span>
			</footer>

		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script> -->
		<script>
			const chatMsgs = document.querySelector(".chat-msgs");
			const chatMsg = document.querySelector(".chat-msg");
			const callAJAX = document.querySelector(".chat-send");

			callAJAX.addEventListener("click", function () {
				if (chatMsg.value != "") {
					chatMsgs.innerHTML += '<p class="guest">' + chatMsg.value + '</p>';
				}
				fixScroll(); // call function to fix scroll bottom
			});



			$(function () {
				// Get the form.
				var form = $('#ajax-contact');

				// Set up an event listener for the contact form.
				$(form).submit(function (event) {
					// Stop the browser from submitting the form.
					event.preventDefault();

					// Serialize the form data.
					var formData = $(form).serialize();

					// ignore question mark
					formData = formData.replace("%3F", "");

					// Submit the form using AJAX.
					sendTheMessage(formData);

					// Clearing text filled
					chatMsg.value = "";
				}); // End of form event handler
			});

			// function to handle ajax
			function sendTheMessage(formData) {
				var form = $('#ajax-contact');

				$.ajax({
					type: 'POST',
					url: "profiles/somiari.php",
					data: formData,
				}).done(function (response) {
					console.log(response);
					chatMsgs.innerHTML += '<p class="alan">' + response + '</p>';
					fixScroll(); // call function to fix scroll bottom
				}) // end ajax handler
			} // end send message fuction

			// function to fix scroll bottom
			function fixScroll() {
				chatMsgs.scrollTop = chatMsgs.scrollHeight - chatMsgs.clientHeight;
			}
		</script>
	</body>

	</html>
	<?php // } ?>
