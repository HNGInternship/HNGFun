<<<<<<< HEAD
<!--Created by Thomas Lois -->
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
	<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
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
            max-width: 400px;
			height: 400px;
			border-radius: 0px;
			margin: 50px;
			background: white;
        }

        footer {
            display: none;
        }

		   .container.profile-body {
            padding-right : 0;
        }

        .profile-details{
            padding: 40px;
			 
        }

        .profile-details {
            padding-right: 0;
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
			width: 450px;
			margin: 10px;
        }
        .profile-body {
            max-width: 100%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 220px;
			height:300px;
            border-radius: 0px;
			box-shadow: 0px 0px 2px 1px grey;
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
            background: #A6BBEC;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 400px;
			border-radius: 0px; 
			
        }
        .chat-result > div {
            margin: 0 0 5px 0;
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
            padding: 5px 5px;
			margin: 5px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 15px;
            background: #A6BBEC;
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
		   width: 80px;
		   height: 45px;
		   display: inline-block
		   outline: none;
		   border: none;
		   color: #fff;
		   background-color: #DA70D6;
		   float: right;
		   border-radius: 25px;
		   padding: 0px;
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
			border-radius:0px;
        }

        .chatbot-close, .chatbot-help {
            display: inline-block;
            margin-left: 20px;
            margin-top: 2.5px;
        }
		.oj-panel{
		background-color:#DFE1E2;
            padding-left: 70px;
		}
		.demo-panelwrapper {
		background-color:#DFE1E2;
		width: 500px;
        padding: 40px;
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
</head>
<body>
<div class="container">
    <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="techHajiya"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
	 <div class="oj-flex demo-panelwrapper">
            <div class="oj-flex-item oj-panel">
            <div class="col-sm-6 profile-details" >
                <div class="profile-image">
                    <img src="http://res.cloudinary.com/lois-idzi/image/upload/v1524718483/mypic.jpg" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?=$my_data['name'] ?>  <br/>(@<?=$my_data['username'] ?>) <br/> iLearn | iEat | iCode</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
			  </div>
  <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6 " style='width: 450px;'>
        <div class="oj-flex-item demo-mypanel" style='float: right; padding-top: 10px;'>
			<div class="col-sm-6 chatbox" style='float: right; padding-top: 10px'>
				<div class='chatbot-menu-header'>
                        <div class="hng-logo"></div> <span>LoBot v1.0</span>
                    </div>
                <div class="chat-result" id="chat-result">
                    <div class="user-message">
					<div class="message">Hello! I'm LoBot! Feel free to ask me anything.   </div>
					<div class="message">Learn more about me by typing "aboutbot".</div>
                    <div class="message">To train me, use this syntax - "train:question#answer#password".</div>
					<div class="message">Password is password. </div>
                    </div>
                </div>
				
                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Type a message...">
						<button id="send">SEND</button>
                    </form>
                </div>
		</div>
		   </div>
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
        $temp2 = preg_replace('/\s+/','', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    }
	##About Bot
    function aboutbot() {
        echo "<div id='result'><strong>LoBot 1.0 </strong></br>
		Hey...I am LoBot, created by Lois Thomas to answer any question from the database. You can also teach me tricks I do not know...</br> Let's goooo...</div>";
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
                        echo "<div id='result'>Thank you for training me. </br>
			Now you can ask me same question, and I will answer it correctly.</div>";
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
            echo "<div id='result'>Oops! I've not been trained to learn that command. </br>Would you like to train me?
</br>You can train me to answer any question at all using, train:question#answer#password
</br>e.g train:Who said Nigerian youth are lazy#President Buhari#password</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>
</body>

<script>
    var outputArea = $("#chat-result");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: 'profile.php?id=techHajiya',
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
=======
<!--Created by Thomas Lois -->
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
	<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
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
            max-width: 400px;
			height: 400px;
			border-radius: 0px;
			margin: 50px;
			background: white;
        }

        footer {
            display: none;
        }

		   .container.profile-body {
            padding-right : 0;
        }

        .profile-details{
            padding: 40px;
			 
        }

        .profile-details {
            padding-right: 0;
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
			width: 450px;
			margin: 10px;
        }
        .profile-body {
            max-width: 100%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 220px;
			height:300px;
            border-radius: 0px;
			box-shadow: 0px 0px 2px 1px grey;
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
            background: #A6BBEC;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 400px;
			border-radius: 0px; 
			
        }
        .chat-result > div {
            margin: 0 0 5px 0;
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
            padding: 5px 5px;
			margin: 5px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 15px;
            background: #A6BBEC;
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
		   width: 80px;
		   height: 45px;
		   display: inline-block
		   outline: none;
		   border: none;
		   color: #fff;
		   background-color: #DA70D6;
		   float: right;
		   border-radius: 25px;
		   padding: 0px;
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
			border-radius:0px;
        }

        .chatbot-close, .chatbot-help {
            display: inline-block;
            margin-left: 20px;
            margin-top: 2.5px;
        }
		.oj-panel{
		background-color:#DFE1E2;
            padding-left: 70px;
		}
		.demo-panelwrapper {
		background-color:#DFE1E2;
		width: 500px;
        padding: 40px;
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
</head>
<body>
<div class="container">
    <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="techHajiya"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
	 <div class="oj-flex demo-panelwrapper">
            <div class="oj-flex-item oj-panel">
            <div class="col-sm-6 profile-details" >
                <div class="profile-image">
                    <img src="http://res.cloudinary.com/lois-idzi/image/upload/v1524718483/mypic.jpg" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?=$my_data['name'] ?>  <br/>(@<?=$my_data['username'] ?>) <br/> iLearn | iEat | iCode</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
			  </div>
  <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6 " style='width: 450px;'>
        <div class="oj-flex-item demo-mypanel" style='float: right; padding-top: 10px;'>
			<div class="col-sm-6 chatbox" style='float: right; padding-top: 10px'>
				<div class='chatbot-menu-header'>
                        <div class="hng-logo"></div> <span>LoBot v1.0</span>
                    </div>
                <div class="chat-result" id="chat-result">
                    <div class="user-message">
					<div class="message">Hello! I'm LoBot! Feel free to ask me anything.   </div>
					<div class="message">Learn more about me by typing "aboutbot".</div>
                    <div class="message">To train me, use this syntax - "train:question#answer#password".</div>
					<div class="message">Password is password. </div>
                    </div>
                </div>
				
                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Type a message...">
						<button id="send">SEND</button>
                    </form>
                </div>
		</div>
		   </div>
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
        $temp2 = preg_replace('/\s+/','', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    }
	##About Bot
    function aboutbot() {
        echo "<div id='result'><strong>LoBot 1.0 </strong></br>
		Hey...I am LoBot, created by Lois Thomas to answer any question from the database. You can also teach me tricks I do not know...</br> Let's goooo...</div>";
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
                        echo "<div id='result'>Thank you for training me. </br>
			Now you can ask me same question, and I will answer it correctly.</div>";
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
            echo "<div id='result'>Oops! I've not been trained to learn that command. </br>Would you like to train me?
</br>You can train me to answer any question at all using, train:question#answer#password
</br>e.g train:Who said Nigerian youth are lazy#President Buhari#password</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>
</body>

<script>
    var outputArea = $("#chat-result");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: 'profile.php?id=techHajiya',
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
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
</script>