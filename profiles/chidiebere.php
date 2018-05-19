<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
<title> ekwwueme</title>

	 <link rel="shortcut icon" type="image/png" 
	href="mygoodest.png" >
	 
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	
	body
	{
color:white;
box-sizing: border-box;
font-family:tahoma; 
margin:0;
}
	.container{ 
		display:flex;
		flex-wrap:wrap;
	
		
				
	}
	
	.container > *
	
	{
	flex: 1 100%;	
		
	}
	.header	{background-color: #ab7b7b; }
	.imageContainer {  }
	
	.longSide 
	{
		background-color:#944c4c ; font-size:18px;  padding:10px;   
		
	}
	.Hside {
		background-color:#733434; font-size:18px;  padding:10px;
	}
	
	.footer{
		background-color:#ab7b7b;
		text-align:center; 
	}
	.imageCarry{margin: 0 auto;   max-width:400px; max-height:400px }
	.imageCarry > img { height:400px;  width:400px; border-radius:10%;}
	@media all and (min-width: 900px) 
	{
		.imageContainer {display:flex; flex:1 7%; margin:10px 10px 10px 5px; }
	
		.longSide{
		
    margin: auto; display:flex; flex:1; padding:40px 10px 0px 10px; color:white; font-size:30px;  margin:0px 0px 0px 0px; line-height:56px;
		}   
	
		.Hside 
		{
		display:flex; flex:1 100%; 
			padding:15px;
			text-align:center;
		}
	.imageCarry > img {height:400px;  width:400px; border-radius:50%;}
	}
	
</style>
	
	
	<body>
		
<?php
require './db.php';
=======

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
			bor
        }
		 .container {
            max-width: 95%;
            margin:20px auto;
			display:flex;
			flex-flow: row wrap;
		
        }
		   .chatbox {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
            display: flex;
            flex-direction: column;
           
		
			border-radius: 0px;
			
			background: white;
        }
		
		.demo-mypanel{
			
			display:flex;
			justify-content:center;
		}

        footer {
            display: none;
        }

		   .container.profile-body {
            padding-right : 0;
        }

        

        .profile-details {
            padding-right: 0;
            background:white;
            height: auto;
			width: 300px;
			margin: 10px;
			
			background-color: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			
        }
        .profile-body {
            max-width: 100%;
			border:3px solid pink;
        }
        .profile-image {
            margin: auto;
            display: block;
            width: 300px;
			height:300px;
            border-radius: 0px;
			box-shadow: 0px 0px 2px 1px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			text-align:center;
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
	   box-sizing:border-box;
		}		
        .chat-result {
            flex: 1;
            padding: 10px;
            display: flex;
            background: rgb(84, 68, 113);
            flex-direction: column;
            overflow-y: scroll;
			overflow-x:none;
            max-height: 400px;
			border-radius: 0px; 
			
        }
		
		.chat-result::-webkit-scrollbar
		{
		width:10px;	
		}
		.chat-result::-webkit-scrollbar-thumb
		{
			border-radius:5px;
			background:#e6e6e6;
		}
        .chat-result > div {
            margin: 0 0 5px 0;
        }
		
		
        .chat-result .user-message .message {
            background: #8e748d;
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
            background: #e6e6e6;
			font-size: 16px;
			width:100%;
			
			
        }
		
		
	
        .chat-input .user-input {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
			
        }
		#send {
		   
		   width:18%;
		   display: inline-block;
		   border:none;
		   outline:none;
		   padding:5px 10px;
		   color: #fff;
		   background-color: #8e748d;
		   border-radius: 10px;
		   height:43px;
		   cursor: pointer;
		   margin-left:2px;

		}
		#send:active {
		   background-color: #8e748d;
		   outline:none;
		}
		
	.chatbot-menu-header {
            background-color: #e6e6e6;
            padding: 7px 20px;
            margin: 0px 0 0 0px;
            color: #544471;
            height: 45px;
			border-radius:0px;
        }

        .chatbot-close, .chatbot-help {
            display: inline-block;
            margin-left: 20px;
            margin-top: 2.5px;
        }
		.oj-panel{
		background-color:#ffffff;
              padding:0px;
		}
		.demo-panelwrapper {
		background-color:#ffffff;
		flex-flow: row wrap;
		
     
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
		
		
		.chatboz{
			border:3px solid brown;
			width:50%;
			background:red;
			
		}
		
		@media screen and (max-width: 766px) {
			.profile-details{margin:0 auto; }
			
		}
		
    </style>
</head>
<body>
<div class="container">
  <?php
require '../db.php';
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440

  try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();
  
    $sql_query = 'SELECT * FROM interns_data WHERE username="chidiebere"';
    $query_my_intern_db = $conn->query($sql_query);
    $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
    $intern_db_result = $query_my_intern_db->fetch();

  } catch (PDOException $exceptionError) {
    throw $exceptionError;
  }

  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_url = $intern_db_result['image_filename'];
?>

<<<<<<< HEAD

	<div class="container">
		
			
	
		<div class="imageContainer"> <div class="imageCarry"><img src="http://res.cloudinary.com/chidiebere/image/upload/v1523832031/pp.jpg" alt="@chidiebere">  </div> </div>
	
		
			<div class="longSide">My name is Chidiebere Chukwudi.  <br/>I am Full-Stack Webdeveloper, A farmer--a serious type.   <br/> Css3 (flex box), Javascript, php <br/>Username: @chidiebere  </div>
		
		
		<div class="Hside">Favourite Quotes: I might not be a guru, genius or geek but i know with hard work and consistency, the result will be the same! <br />  </div>
	
	
</div>	
	
</body>

</html>
=======
	 <div class="oj-flex demo-panelwrapper">
            <div class="oj-flex-item oj-panel">
            <div class="col-sm-6 profile-details" >
                <div class="profile-image">
                    <img src="https://res.cloudinary.com/chidiebere/image/upload/v1526680815/mybday.jpg" height="100%" width="100%" alt="@chidiebere">
                </div>
				<div class="text-center profile-name">
				<p>I am <span style="color:orange;">chidiebere </span></p>
				<p>php, js, HTML5, CSS3</p>
				<p>I am a <span style="border-bottom:2px solid orange; ">webdeveloper</span></p>
				
                </div>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
			  </div>
  <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6  chatboz"  >
        <div class="oj-flex-item demo-mypanel">
			<div class="col-sm-6 chatbox" >
				<div class='chatbot-menu-header'>
                        <div class="hng-logo"></div> <span>Chidi's bot</span>
                    </div>
                <div class="chat-result" id="chat-result">
                    <div class="user-message">
					<div class="message">Do you know? I am chidi's bot   </div>
				
                    <div class="message">To train me, use this syntax - "train:question#answer#password".</div>
					<div class="message">Password is password. </div>
                    </div>
                </div>
				
                <div class="chat-input">
                    <form action="" method="post" id="user-input-form" class="fr">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Chat with chidi's bot...">
						<button id="send" class="seend">SEND</button>
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
                echo "<div id='result'>I know this already. Teach me something else!</div>";
            }
        }else {
            echo "<div id='result'>Invalid password,dear. </br>Try One more time!</div>";
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
            url: 'profile.php?id=chidiebere',
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
        $("#user-input").val("hello");
    });

</script>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
