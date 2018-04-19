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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f0b5af1cdd5f2b3290339a6aaf610d323b04eb91
>>>>>>> 77f8319ee17744e370f72da8923a604477d12d32
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
<<<<<<< HEAD
=======
  		.col-md-10 {
    		-ms-flex: 0 0 83.333333%;
    		flex: 0 0 83.333333%;
    		max-width: 83.333333%;
  		}
  		.col-md-2 {
    		-ms-flex: 0 0 16.666667%;
    		flex: 0 0 16.666667%;
    		max-width: 16.666667%;
  		}
        .msg_container_base {
            background: #e5e5e5;
            margin: 0 auto;
            width: 100%;
            padding: 0 10px 10px;
            max-height: 350px;
            overflow-x: hidden;
        }
        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }
        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
            
        }
        .base_receive>.avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }
        .base_sent>.avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close } .msg_sent > time{
            float: right;
        }
        .card-body {
  			-ms-flex: 1 1 auto;
  			flex: 1 1 auto;
  			padding: 1.25rem;
		}
		.messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }
        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
        }
        .card-footer {
  			padding: 0.75rem 1.25rem;
  			background-color: rgba(0, 0, 0, 0.03);
  			border-top: 1px solid rgba(0, 0, 0, 0.125);
		}

		.card-footer:last-child {
  			border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
		}
		.input-group {
  			position: relative;
  			display: -ms-flexbox;
  			display: flex;
  			-ms-flex-wrap: wrap;
  			flex-wrap: wrap;
  			-ms-flex-align: stretch;
  			align-items: stretch;
  			width: 100%;
		}
<<<<<<< HEAD
=======
=======
>>>>>>> 2b8c9accd201aadfbec9423ea29c2b64f6911980
>>>>>>> f0b5af1cdd5f2b3290339a6aaf610d323b04eb91
>>>>>>> 77f8319ee17744e370f72da8923a604477d12d32
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
                        <div class="row card-header top-bar chat">
=======
<<<<<<< HEAD
			<div class="col-lg-4">
                <div class="row chat-window" id="chat_window_1">
                    <div class="card">
                        <div class="row card-header top-bar">
>>>>>>> f0b5af1cdd5f2b3290339a6aaf610d323b04eb91
                            <div class="col-md-8">
                                <h2>Bot Chat</h2>   
                            </div>
                        </div>
<<<<<<< HEAD
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
=======
                            <div class="card-body  msg_container_base">
                        		<div class="row msg_container base_sent">
                                    <div class="col-md-10">
                                        <div class="messages msg_sent">
                                            <p><code>Hello, I am a bot, I am smart but you can make me smarter, I am always willing to learn</code></p>
                                        </div>
                                    </div>
                        			<div class="col-md-2"></div>
                                </div>
                            	<div class="row msg_container base_sent">
                                <div class="col-md-10">
                                    <div class="messages msg_sent">
                                        <p><code>To teach me, package your lesson in the format below</code></p>
                                        <p><code>train:your question#your answer#password</code></p>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            	</div>
                            </div>   <!-- message form -->
                            <div class="card-footer message-div">
                                <form action="" id="chat-form" method="post">
                                    <div class="input-group mb-3">
>>>>>>> f0b5af1cdd5f2b3290339a6aaf610d323b04eb91
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
		<div class="bot">
			<h2 class="chat">CHAT BOT</h2>
		</div>
>>>>>>> 2b8c9accd201aadfbec9423ea29c2b64f6911980
>>>>>>> f0b5af1cdd5f2b3290339a6aaf610d323b04eb91
>>>>>>> 77f8319ee17744e370f72da8923a604477d12d32
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