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
			height: 50%;
		}
		.chat {
			display: block;
			background-color: blue;
			color: #fff;
			text-align: center;
			padding: 10px 0;
		}
		.col-lg-4 {
    	-ms-flex: 0 0 33.333333%;
    	flex: 0 0 33.333333%;
    	max-width: 33.333333%;
    	}
    	  .col-sm {
    		-ms-flex-preferred-size: 0;
    		flex-basis: 0;
    		-ms-flex-positive: 1;
    		flex-grow: 1;
    		max-width: 100%;
  		}
  		.row {
  			display: -ms-flexbox;
  			display: flex;
  			-ms-flex-wrap: wrap;
  			flex-wrap: wrap;
  			margin-right: -15px;
  		}
  		.card-header {
  			padding: 0.75rem 1.25rem;
  			margin-bottom: 0;
  			background-color: rgba(0, 0, 0, 0.03);
  			border-bottom: 1px solid rgba(0, 0, 0, 0.125);
		}
		.top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative; 
            overflow: hidden;
        }
        .col-md-8 {
    		-ms-flex: 0 0 66.666667%;
    		flex: 0 0 66.666667%;
    		max-width: 66.666667%;
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
			<div class="col-lg-4">
                <div class="row chat-window" id="chat_window_1">
                                    <div class="card">
                                        <div class="row card-header top-bar">
                                            <div class="col-md-8">
                                                <h2>Bot Chat</h2>   
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <a href="#"><span id="minim_chat_window" class="fa fa-minus icon_minim"></span></a>
                                                <a href="#"><span class="fa fa-remove icon_close" data-id="chat_window_1"></span></a>
                                            </div>
                                        </div>
                                        <div class="card-body  msg_container_base">
                        
                                            <div class="row msg_container base_sent">
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="messages msg_sent">
                                                        <p><code>Hello, I am a bot, I am smart but you can make me smarter, I am always willing to learn</code></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2"></div>
                                            </div>
                                            <div class="row msg_container base_sent">
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="messages msg_sent">
                                                        <p><code>To teach me, package your lesson in the format below</code></p>
                                                        <p><code>train:your question#your answer#password</code></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2"></div>
                                            </div>

                                        </div>   <!-- message form -->
                                        <div class="card-footer message-div">
                                            <form action="" id="chat-form" method="post">
                                                <div class="input-group mb-3">
                                                    <input class="form-control message chat_input" name="chat_message" aria-label="With input" placeholder="Let's Chat  Now...">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary btn-sm send-message" id="btn-chat"><i class="fa fa-send-o"></i></button>                                                                                 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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