<?php 
	function getUserInfo($username="davidshare"){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT intern_id, name, username, image_filename FROM interns_data WHERE username =:username");
		    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    if(!empty($result)){
		    	return $result[0];
		    }
		    
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

	$user_info = getUserInfo();

	function getSecretWord(){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT * FROM secret_word");
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    if(!empty($result)){
		    	return $result[0]['secret_word'];
		    }
		    
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

	$secret_word = getSecretWord($user_info['intern_id']);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="ha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<style>
		body {
			background-color: ghostwhite;
			font-weight: normal;
			font-family: sans-serif;
		}
		.con {
			width: 90%;
			margin: 0 auto;
		}
		div img {
			width: 200px;
			float: left;
			margin-right: 5px;
		}
		.sum {
			background-color: lightgray;
			height: 226px;
			width: 78%;
			float: left;
			text-align: center;
			padding: 10px;
		}
		.cols {
			float: left;
			text-align: center;
			padding: 10px;
			margin-left: 70px;
			margin-top: 20px;
		}
		h3 {
			font-style: italic;
			font-size: 14px;
			margin: o auto
			}
		.clear {
			clear: both;
		}
		.footer {
			text-align: center;
			margin-top: 30px;
		}
		.top {
			margin-top: 50px;
		}
		.bot {
			position: fixed;
			bottom: 2%;
			right: 8%;
			width: 350px;
			display: block;
			background-color: blue;
		}
		.chat {
			display: block;
			background-color: blue;
			color: #fff;
			text-align: center;
			padding: 10px 0;
		}
		.chat-messages {
			background-color: #fff;
			margin-left: 15px;
			margin-right: 15px;
			padding: 5px;
		}
		.single-message {
			margin-bottom: 5px; 
			border-radius: 5px;
			min-height: 60px;
		}
	</style>
</head>
<body>
	<div class="top clear"></div>
	<div class="con clear">
		<div class="img">
			<img src= "http://res.cloudinary.com/intellitech/image/upload/v1523779243/admiral.jpg" alt="Admiral">
		</div>
		<div class="sum">
    		<h1>Hi Guys!</h1>
    		<p>This is a summary of my profile and my skills</p>
  		</div>
  		<div class = "cols">
			<h2> PROFILE</h2>
			<h3>My Name is Bright Robert</h4>
		</div>
		<div class = "cols">
			<h2> SKILLS</h2>
			<h3> Software Development, System Engr, Network Admin</h3>
		</div>
		<div class = "cols" >
			<h2> CONTACT </h2>
			<h3> Slack: @admiral </h3>
		</div>
		<div class="clear"></div>
		<div class="bot">
			<h2 class="chat">CHAT BOT</h2>
			<div class="chat-messages" id="chat-messages">
				<div class="col-md-12" id="message-frame">
					<div class="row single-message">
						<div class="col-md-2 single-message-bg">
							<span class="fa fa-user f-icon"></span>
						</div>

						<div class="col-md-8 single-message-bg">
							<p>Welcome! My name is <span style="font-weight: bold">Optimus Prime</span></p>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-2 single-message-bg">
							<span class="fa fa-user f-icon"></span>
						</div>
						<div class="col-md-8 single-message-bg">
							<p>Ask me your questions and I will try to answer them.</p>
						</div>
					</div>
					<div class="single-message">
						<div>
							<p>You can teach me answers to new questions by training me.</p>
							<p>To train me, enter the training string in this format:</p>
							<p><b>train: question # answer</b></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 40px;">
				<form class="form-inline col-md-12 col-sm-12" id="question-form">
					<div class="col-md-12 col-sm-12 col-12">
						<input class="form-control w-100" type="text" name="question" placeholder="Ask a question" />
					</div>
					<div style="margin-top: 20px">
						<button type="submit" class="btn btn-info float-right w-100">Send</button>
					</div>
				</form>	
			</div>
		</div>
		<div class="footer">
			<footer class="socials">
                <i class="fab fa-github-square fa-2x"></i>
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fab fa-twitter-square fa-2x"></i>
                <i class="fab fa-linkedin fa-2x"></i>
            </footer>
		</div>
    </body>
</html>