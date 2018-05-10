<?php
  if(!defined('DB_USER')){
	  require "../config.php";	
  }	
	try {
	    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
	}catch (PDOException $pe) {
	   die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
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


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<style>
      body {
				margin: 0;
				padding: 0;
			}

		 .wrapper{
			 width: 800px;
			 background: inherit;
			 padding: 40px;
			 text-align: center;
			 margin: auto;
			 margin-top: 5%;
			 font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;
		 }

		 .wrapper-img{
			 width: 300px;
			 height: 300px;
			 border-radius: 50%;
			 margin-bottom: 20px;
		 }

		 .wrapper h1{
			 font-size: 40px;
			 letter-spacing: 4px;
			 font-weight: 100;
		 }

		 .wrapper h5{
			 font-size: 20px;
			 letter-spacing: 3px;
			 font-weight: 100;
		 }

		 .wrapper p{
			 text-align: justify;
		 }

		 .wrapper ul{
			 margin: 0;
			 padding: 0;
		 }

		 .wrapper li{
			 display: inline-block;
			 margin: 6px;
			 list-style: none;
		 }

		 .wrapper li a{
			 text-decoration: none;
			 font-size: 60px;
			 color: #007bff;
			 transition: all ease-in-out 250ms;
		 }

		 .wrapper li a:hover{
			 color: #000000;
		 }

		@media only screen and (max-width: 992px) {
			.wrapper {
				width: 95%;
				margin: auto;
				margin-top: 5%;
			}

			.wrapper-img{
				width: 250px;
				height: 250px;
			}
		}
*/
		 .chatbox{
			width: 500px;
			/*min-width: 390px;*/
			height: 600px;
			background: #444;
			padding: 25px;
			margin: 20px auto;
		}


		</style>

		.chat-logs::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background: rgba(255,255,255,0.1);
		}

		.chat{
			display: flex;
			flex-flow: row wrap;
			align-items: flex-start;
			margin-bottom: 10px;
		}
		.chat .bot-photo{
			width: 60px;
			height: 60px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909043/bot.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}

    .chat .user-photo{
			width: 100px;
			height: 100px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909063/user.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}
		.chat .chat-message {
			width: 80%;
			padding: 15px;
			margin: 5px 10px 0;
			border-radius: 10px;
			font-size:16px;
			color: #fff;
		}

		.bot .chat-message{
			background: #1ddced;

		}

		.user .chat-message{
			background: #1adda4;
			order: -1;
		}

		.chat-form{
			margin-top: 20px;
			display: flex;
			align-items: flex-start;
		}

		.chat-form input{
			background: #fbfbfb;
			width: 75%;
			height: 55px;
			resize: none;
			border: 2px solid #eee;
			padding: 10px;
			font-size: 18px;
			color: #333;
		}

		/* .chat-form input::-webkit-scrollbar{
			width: 5px;
		}

		.chat-form input::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background: rgba(0,0,0,0.1);
		} */


		.chat-form input:focus{
			background: #fff;
		}

		.chat-form button{
			background: #1ddced;
			padding: 5px 15px;
			color: #fff;
			font-size: 30px;
			border: none;
			margin: 0 10px;
			border-radius: 5px;
			cursor: pointer;
		}

		.chat-form button:hover{
			background: #13c8d9;
		}

    @media only screen and (max-width: 992px){
			.wrapper{
				flex-direction: column;
			}
		}

		@media only screen and (max-width: 542px){
			.chatbox{
				max-width: 350px;

			}
      .chat .bot-photo{
			width: 30px;
			height: 30px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909043/bot.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}
      .chat .chat-message {
			width: 85%;
			padding: 5px;
			margin: 5px 5px 0;
			border-radius: 3px;
			font-size:16px;
			color: #fff;
		}
		}
	</style>
</head>
<body>
<div class="wrapper">
			<div class="wrapper-profile">
				<img src=<?php echo $user->image_filename?> alt="Afam Jude picture" class="wrapper-profile-img">
				<h3>NAME: <?php echo $user->name?></h3>
				<h3>USERNAME: <?php echo $user->username;?></h3>
				<h5>WEB DEVELOPER</h5>
				<p>A Chemical engineeer during the day and a budding web developer at Night. I have a good knowledge of HTML5, CSS, JavaScript and currently learning PHP. Hoping to make a career switch into full stack Web developement.</p>

				<ul>
					<li><a href="https://twitter.com/bobjayafam" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
					<li><a href="https://github.com/bobjayafam" target="_blank"><i class="fa fa-github-square"></i></a></li>
					<li><a href="https://facebook.com/bobjayafam" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
				</ul>
			</div>
			<div class="wrapper-chat">
				<p>You can chat with my BOT</p>
				<div class="chatbox" id="chatbox">
					<div class="chat-logs">
						<div class="chat bot">
							<div class="bot-photo"></div>
							<p class="chat-message">My Name is BjAfam BOT</p>
						</div>
						<div class="chat bot">
							<div class="bot-photo"></div>
							<p class="chat-message">You can ask me any question.<br> To get my current version, type aboutbot <br> To train me, Enter in the following format: train:question#answer#password <br> where password = password</p>
						</div>


					</div>
        <div id="form">
          <form class="chat-form" method="post" id="chat-form">
						<input name="question" id="question" autocomplete="off">
						<button type="submit" name="submit" id="chat-btn">Send</button>
					</form>
				</div>
				</div>
			</div>
		</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function(){

			$('#chat-form').submit(function(e){
				e.preventDefault(); //prevents the reloading of page after a form submits
				var question = $('#question');
				var question = question.val();
				if(question){  // checks if question is not an empty string
					$(".chat-logs").append(`<div class="chat bot">
							<div class="bot-photo"></div>
							<p class="chat-message">${question}</p>
						</div>
						`);
						$.ajax({
					url: 'profiles/Bjafam.php',
					type: 'POST',
					data: {question: question},
					dataType: 'json',
					success: function(response){
						$(".chat-logs").append(`<div class="chat user">
							<div class="user-photo"></div>
							<p class="chat-message">${response.answer}</p>
						</div>
						`);
						$(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);//Automatic scroll to bottom of chat
			      },
					error: function(error){
						console.log(error);
				  }
				});
				}



				$("#chat-form").trigger('reset');
			})
		});
	</script>
</body>
</html>
<?php
}

?>
