
	<?php
	 require 'db.php';
	$username = "ebuka1";
	 
	$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
	$query = $conn->prepare($sql);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	
	?>
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
        echo "<div id='result'><strong>Ebu Bot 1.1 </strong></br>
		Hello! </br> I'm Ebu Bot 1.1 </br> Hope you are having a lovely Day.</br> I am trained to answer everything on the database. </div>";
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
            echo "<div id='result'>Sorry! I've not been trained to learn that command. </br>Would you like to train me?
</br>You can train me to answer any question at all using, train:question#answer#password
</br>e.g train:what is the first day of the week#Sunday#password</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<title>ARINZE EMMANUEL EBUKA</title>
    <style type="text/css">

		body{
			color:#3498db;
			float:center;
			margin: 15px;
		}

		img{
			max-width: 50%;
			height: auto;
			display: block;
			margin-bottom:10px
		}
		
		.skills{
			margin-top:10px;
			font-size:20px;
			}


		  /* start social icon */
		.social-icon
			{
				position: relative;
				padding: 0;
				margin: 0
				margin-top:50px;
			}

		.social-icon li
			{
				display: inline-block;
				list-style: none;
			}
		.social-icon li a
			{
				border: 1px solid black;
				border-radius: 2px;
				color: black;
				width: 40px;
				height: 40px;
				line-height: 40px;
				text-align: center;
				text-decoration: none;
				-webkit-transition: all 0.4s ease-in-out;
						transition: all 0.4s ease-in-out;
				margin-right: 10px;
			}
		.social-icon li a:hover
			{
				background: #7efff5;
				border-color: transparent;
			}
	/* end social icon */
	
	/* start chatbot*/
		.chatbox {
			font-size: 20px;
			display: flex;
			flex-direction: column;
			max-width: 600px;
			height: 400px;
			border-radius: 5px;
			background-color:white;
			margin-top:100px;
			padding-top:100px;
			}	

        .oj-flex-item .oj-panel .demo-mypanel{
            padding: 40px;
			 
        }

       .oj-flex-item .oj-panel .demo-mypanel {
            padding-right: 0;
            background-color:white;
            height: auto;
			width: 600px;
			margin: 0px;
        }
       .chat-result {
            flex: 1;
            padding: 0px;
            display: flex;
            background: white;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 400px;
			border-radius: 0px; 
			
        }
        .chat-result > div {
            margin: 0 0 5px 0;
        }
        .chat-result .user-message .message {
            background: #3498db;
            color: white;
        }
        .chat-result .bot-message {
            text-align: right;
        }
        .chat-result .bot-message .message {
            background-color:  #3498db;
            color:white;
			
        }
        .chat-result .message {
            display: inline-block;
            padding: 5px 5px;
			margin: 5px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 15px;
            background: white;
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
		   background-color:#3498db;
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
            background-color: white;
            padding: 7px 20px;
            margin: 0px 0 0 0px;
            color: #3498db;
            height: 45px;
			border-radius:0px;
        }

        .chatbot-close, .chatbot-help {
            display: inline-block;
            margin-left: 20px;
            margin-top: 2.5px;
        }
		.oj-panel{
			background-color:white;
            margin-left: 40px;
		}
		.oj-flex{
		background-color:white;
        padding: 0px;
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
	/* end chatbot*/
		</style>

    </head>

    <body>
<div class="container-fluid">
     <div class="row" style="background-color: white; padding: 0"> 
       <div>
			<div class= "profile col-sm-7" >
				<!--Profile area-->
              <h1><?php echo $result["name"]; ?> </h1>
              <img src="http://res.cloudinary.com/dtvcmcdnu/image/upload/c_scale,h_450/v1525817213/IMG_20171129_135056_922.jpg"  class="img-circle img-responsive" alt="" /> 
              <h2>Web Developer </h2> 
              <ul class="skills">
                <h2>Skills:</h2>
                    <li><h3>Constantly learning and improving</h1></li>
                    <li><h3>keeping up to date with the industry</h1></li>
                    <li><h3>Being able to manage time and prioritize</h3></li>
                    <li><h3>Proper communication</h3></li>
                    <li><h3>Efficient in some programming languages</h3></li>
                </ul>
                <ul class="social-icon">
                    <li><a href="https://web.facebook.com/ebuka.arinze.5?ref=br_rs" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/ebuka_arinze" class="fa fa-twitter"></a></li>
                    <li><a href="https://github.com/ebukaarinze" class="fa fa-github"></a></li>
                    <li><a href="https://www.instagram.com/ebuka_arinze/" class="fa fa-instagram"></a></li>
                </ul>
           </div>
       <div class="col-sm-5" > 
            <div class= "chatbot" >
               <!--chatbot area-->
			    <div class="oj-flex-item oj-panel demo-mypanel" style='float: right;' >
						<div class='chatbot-menu-header'>
							<div class="hng-logo"></div> <span style="align:center;">Ebu Bot 1.1</span>
						</div>
					<div class="chat-result" id="chat-result">
						<div class="user-message">
							<div class="message">Hello! You are free to ask me anything.  </div>
							<div class="message">To learn more about me enter "aboutbot".</div>
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
</div>
</body>

<script>
    var outputArea = $("#chat-result");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: 'profile.php?id=ebuka1',
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

</html>
