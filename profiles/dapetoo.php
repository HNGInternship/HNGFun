<!--Created by Dapetoo -->
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <style type="text/css">
	 @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);
       body { 
            font-family: "Josefin Sans","Montserrat","Segoe UI","Roboto","Helvetica Neue","Arial","sans-serif";
            color: #4A4646;
            overflow-x: hidden;
        }
		 .container {
            max-width: 95%;
            padding-left: 0;
		
        }
		   .chatbox {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            max-width: 550px;
            margin: 0 auto;
			 border-radius: 5px;
			 margin-bottom: 50px;
        }

        footer {
            display: none;
        }

		   .container.profile-body {
            padding-right : 0;
        }

        .profile-details{
            padding-top: 20px;
        }

        .profile-details {
            padding-right: 0;
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }
        .profile-body {
            max-width: 50%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 250px;
			height:400px;
            border-radius: 100px;
			box-shadow: 0px 0px 5px 2px grey;
        }

                .bot-image img {
            margin: auto;
            display: block;
            width: 250px;
            height:400px;
            border-radius: 100px;
            box-shadow: 0px 0px 5px 2px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			color:#191970;
        }
        .social-links a {
            margin-right: 20px;
        }
        .fa-github {
            color: #333333;
        }
        .fa-facebook {
            color: #3b5998;
        }
        .fa-twitter {
            color: #1da1f2;
        }
		
		
		* {
		outline: none; 
	   tap-highlight: none;
	   -webkit-tap-highlight: none;
	   -webkit-tap-highlight-color: none;
	   -moz-tap-highlight: none;
	   -moz-tap-highlight-color: none;
	   -khtml-tap-highlight: none;
	   -khtml-tap-highlight-color: none;
		}		
        .chat-result {
            flex: 1;
            padding: 10px;
            display: flex;
            background: white;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 500px;
			border-radius: 5px; 
			
        }
        .chat-result > div {
            margin: 0 0 10px 0;
        }
        .chat-result .user-message .message {
            background: #DA70D6;
            color: white;
        }
        .chat-result .bot-message {
            text-align: right;
        }
        .chat-result .bot-message .message {
            background: #eee;
			
        }
        .chat-result .message {
            display: inline-block;
            padding: 10px 10px;
			margin: 5px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 15px;
            background-color: #fff;
			font-size: 16px;
        }
        .chat-input .user-input {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 25px;
            padding: 10px;
			float: left;
        }
		#send {
		   width: 500px;
		   height: 45px;
		   
		   outline: none;
		   border: none;
		   color: #fff;
		   background-color: #DA70D6;
		   float: right;
		   border-radius: 25px;
           padding-top: 0px;
		   margin-top: 10px;
		   cursor: pointer;
		   margin: 0px;
		}

		#send:active {
		   background-color: #00A; 
		   outline: none;
		}
		
		
	.chatbot-menu-header {
            background-color: #191970;
            padding: 7px 20px;
            margin: 0px 0 0 0px;
            color: #FFFFFF;
            height: 45px;
			border-radius:10px;
        }

        .chatbot-close, .chatbot-help {
            display: inline-block;
            margin-left: 20px;
            margin-top: 2.5px;
        }

        .fa-close, .fa-question-circle {
            font-size: 23px;
        }

        .chatbot-menu-header span {
            font-weight: bold;
			font-size: 24px;
        }

        .chatbot-menu-header a {
            color: #FFFFFF;
        }
    </style>

    <script>
    var outputArea = $("#chat-result");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: 'profile.php?id=dapetoo',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-result').animate({
                        scrollTop: $('#chat-result').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>
</head>
<body>
<div class="container">
    <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="dapetoo"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
     <div class="row">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?=$my_data['image_filename'] ?>" alt="Dada Peter">
                </div>
				<p class="text-center profile-name">
				<span> Full Name: <?=$my_data['name'] ?>  <br/>Slack Username: @<?=$my_data['username'] ?> </span></br>
                <p>I am a tech enthusiast, I only live a triangular lifestyle which is CODE, SLEEP, and EAT</p>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/dapetoo" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/dapetoo" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/dapetoo" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>

      <div class="col-sm-6 chatbox" style='float: right; padding-top: 20px'>
	 <div class='chatbot-menu-header'>
                        <div class="hng-logo"></div> <span>DeeJay BOT 1.0</span>
                    </div>
                <div class="chat-result" id="chat-result">
                    <div class="user-message">
                        <marquee>Welcome to Deejay Bot!!! Your Virtual Assistant</marquee>
                        <img src="http://res.cloudinary.com/dapetoo/image/upload/v1524452096/IMG-20160120-00422.jpg" alt="BOT LOGO" class="bot-image">
					<div class="message">Hello! I'm your Virtual Assistant! Feel free to ask me anything.   </div>
					<div class="message">Learn more about me by typing 'aboutbot'.</div>
                    <div class="message">To train me, use this syntax - 'train: question # answer # password'.</div>
					<div class="message">Password is password. </div>
                    </div>
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Ask me a question"></br>
						<button id="send">SEND</button>
                    </form>
                </div>
		
          </div>
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
        $data = $_POST['user-input'];
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
	
    //Bot Details
    function aboutbot() {
        echo "<div id='result'><strong>LoBot 1.0 </strong>
		Hey...I am DeeJayBot!!! Your virtual Assistant created by Dada Peter to answer any question. I can also be trained to do anything for you.</div>";
    }
	
	##Train Bot
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
                        echo "<div id='result'>Thank you for for the <strong>INPUT!!!</strong> a.k.a. training. <br>
			Now you can ask me same question, and I will answer it.</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>You entered an invalid Password. </br>Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Oops! This is a new command, I didnt have the answer to this, but I can be train to answer any question for you. </br>Would you like to train me?
</br>You can train me to answer any question at all using, train: question # answer # password
</br>e.g train: Who is the president of Nigeria # Muhammadu Buhari # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>
</body>

