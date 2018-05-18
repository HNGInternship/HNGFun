<?php
	header("Access-Control-Allow-Origin: *");
	if($_SERVER['REQUEST_METHOD'] === "GET"){
		if(!defined('DB_USER')){
			require_once "../../config.php";
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
		$username = "sarah";
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

	// Function to return Date
	function respondDate(){
		date_default_timezone_set("Africa/Lagos");
		$time = date("Y/m/d");
		$respondTime = array( 'Today\'s date is '.$time,
								'It\'s '. $time,
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
								'It\'s '. $time,
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
				echo "I did't quite get that, something must be wrong, <br> please try again";
			} // End Catch
		} // End Else
	} // Train Function Ends here

	// Returns random respond to training
	// called if training is successful
	function repondTraining(){
		$repondTraining = array(  'Noted! Thank you for teaching me',
									'Acknowledged, thanks, really want to learn more',
									'A million thanks, I\'m getting smarter',
									'I\'m getting smarter, I really appreciate');
		$index = mt_rand(0, 3);
		return $anwerSam = $repondTraining[$index];
	}


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

// CHATBOT STARTS HERE
			if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$message = trim(strtolower($_POST['message']));

				if (strpos($message, 'train') !== false) {
					trainAlan($message);
			}else if ($message != "" ){
				$tempVariable = checkDatabase($message);

				if ($tempVariable == 1){
					if ($message == "what is the time"){
						echo respondTime();
					}else if ($message == "today's date"){
						echo respondDate();
					}else{
						echo "Could you be kind to rephrase that, 'cos I didn't get it.
						Or you could even teach me, just type and send:
						train: question # answer # password";
					}
				}
			}
			die();
		}

	?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $user->name?></title>
  <link href="https://fonts.googleapis.com/css?family=Snippet|Averia+Sans+Libre" rel="stylesheet">
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
      font-family: Roboto, sans-serif;
      font-size: 1.4rem;
      line-height: 1;
      height: auto !important;
      background: lightsmoke;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .constrain {
      margin: 0 auto;
      height: 100%;
      width: 80%;
      max-width: 2000px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
    }

    .name {
      font-family: 'Averia Sans Libre', sans-serif;
      font-size: 4rem;
      font-weight: 700;
      color: #DB0A5B;
      letter-spacing: 1px;
    }

    .labels {
      font-family: 'Snippet', sans-serif;
      font-size: 1rem;
      font-weight: bold;
      letter-spacing: 1px;
      color: #555;
      margin-top: 15px;
    }

    .socials {
      width: 80%;
      margin-top: 10px;
      margin-bottom: 60px;
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

    .header {
      font-size: 1.2rem;
      color: #555;
      margin-bottom: 30px;
      margin-top: 50px;
    }

    .profile-dp {
      border-radius: 50%;
      margin-top: 150px;
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
        color: rgb(219, 10, 91);
			}

			.chat-msgs {
				height: 300px;
				margin: 30px auto 15px auto;
				overflow-y: scroll;
				width: 98%;

			}

			.guest,
			.temipet {
				width: auto;
				max-width: 80%;
				border: 1px solid lightgrey;
				padding: 5px;
				clear: both;
				margin: 0 5px 5px 8px;
				border-radius: 10px;
				font-size: 16px;
			}

			.temipet {
				text-align: left;
				padding-left: 20px;
        background: rgba(219, 10, 91, .1);
        border: none;
			}

			.guest {
				float: right;
				text-align: left;
				padding-right: 20px;
        background: rgba(0, 0, 0, .1);
        border: none;
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
        background: rgba(219, 10, 91, .1);
				position: absolute;
				border-radius: 50%;
				border: 1px solid rgba(0, 0, 0, .3);
				height: 50px;
				width: 50px;
				right: 20px;
				bottom: 23px;
				color: rgba(0, 0, 0, .6);
				cursor: pointer;
				outline: none;
				/* overflow: hidden; */
			}

      .chat-send .fa-paper-plane {
        color: rgba(219, 10, 91);
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
      .guest,
				.temipet {
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
        font-size: 2.8rem;
      }
    }
  </style>
</head>

<body>

    <div class="constrain">
      <img src="https://res.cloudinary.com/temipet/image/upload/c_scale,w_300/v1523998638/fine_sarah.jpg" alt="A fine pic of Sarah" class="profile-dp">
      <section class="title">
        <h1 class="name">Sarah Temitope</h1>
        <p class="labels">Budding Designer ✿ Lover of Life</p>
      </section>
      <section class="socials">
        <a href="https://www.instagram.com/elegant_garlie0" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-instagram"></i>
        </a>
        <a href="https://www.twitter.com/sarahtemy" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-twitter"></i>
        </a>
        <a href="https://www.facebook.com/temipet" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-facebook-f"></i>
        </a>
        <a href="https://www.github.com/temipet" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-github-alt"></i>
        </a>
        <a href="https://ng.linkedin.com/in/adeboye-sarah-956a40143" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-linkedin"></i>
        </a>
        <a href="mailto:talk2oluwasarah@gmail.com" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-envelope"></i>
        </a>
      </section>

      <form class="chat-box" id="ajax-contact" method="post" action="">
				<span class="chat-box-header">Let's talk!</span>
				<div class="chat-msgs">
					<p class="temipet">Hello! I am temipet!</p>
					<p class="temipet">I am a young bot, to teach me a new thing just type and send: train: question # answer # password</p>
				</div>
				<div class="chat-type">
					<textarea class="chat-msg" name="message" required></textarea>
					<button class="chat-send" type="submit">
						<i class="icon fa fa-fw fa-paper-plane"></i>
					</button>
				</div>
			</form>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
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
					url: "profiles/sarah.php",
					data: formData,
				}).done(function (response) {
					console.log(response);
					chatMsgs.innerHTML += '<p class="temipet">' + response + '</p>';
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
