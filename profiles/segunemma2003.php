<?php  
if (!defined('DB_USER'))
	{
	require "../../config.php";
	}
try
	{
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	}
catch(PDOException $e)
	{
	die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
	}

global $conn;
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$message = trim(htmlspecialchars($_POST['message']));
	if ($message === '')
	{
				$empty_response = [
					'You have not asked anything',
					'Ohh, nothing?!!!!',
					'hey!!! what the hell is this?',
					'come on, be serious'

				];
				echo json_encode(['status'=>0,'data'=> $empty_response[rand(0, (count($empty_response)-1))]]);
				return;
	}
	if (strpos($message, 'train:') !== false)
	{
		$password = 'password';
		$first_test = explode(':', $message);
		$q_s_p = $first_test[1];
		$second_test = explode('#', $q_s_p);
		$question = trim($second_test[0]);
		//$question = trim($question, "?");
		$answer = trim($second_test[1]);
		$pass = trim($second_test[2]);

		if ($pass === $password)
		{
			$sql = 'INSERT INTO chatbot( question, answer) VALUES(:question, :answer)';

			$query = $conn->prepare($sql);
			$store=$query->execute(array('question'=>$question, 'answer'=>$answer));
                // $query->bindParam(':question', $question);
                // $query->bindParam(':answer', $answer);
                // $store = $query->execute();
                	if($store)
			{

                    		echo json_encode(['status'=>1, 'data'=>'Alright gonna put it in mind']);
				return;
				
			}
			else
			{
				echo json_encode(['status'=>0, 'data'=>'Aw, I don\'t get']);
				return;
			}
          	}
            	else
		{
                	echo json_encode(['status'=>0, 'data'=>'You\'re not authorized to teach me']);
			return;
		}
	}
	else
	{
			//do get answer if it's not training
			$sql = "select * from chatbot where question LIKE :question";
			$query = $conn->prepare($sql);
			$query->bindParam(':question', $message);
			$query->execute();
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$result = $query->fetchAll();
			if ($result)
			{
				$index = rand(0, count($result)-1);
				$response = $result[$index]['answer'];
				echo json_encode(['status'=>1, 'data'=>$response]);
				return;
			}
			else
			{
				echo json_encode(['status'=>0, 'data'=>'sorry I can\'t give you an answer at the moment but you can as well teach me <br>just use the following pattern train: what is the time? # The time is#password']);
				return;
			}
	}
}
	 
		
		?>


<?php 
if ($_SERVER['REQUEST_METHOD'] === "GET") {
try {
	$sql = 'SELECT name, username, image_filename, secret_word FROM secret_word, interns_data WHERE username = "segunemma2003"';
	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$data = $q->fetch();
	$secret_word = $data['secret_word'];
} catch (PDOException $e) {
	throw $e;
}
}
?>	
<!DOCTYPE html>

<html>
<head>
	<title><?php echo $data['username'];?> 'profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<style>
*{
	border:0px;
	margin:0px;
}
@keyframes  animate{
	0%{opacity:0.9;}
	25%{opacity:0.7;}
	50%{opacity:0.5;}
	75%{opacity: 0.2;}
	100%{opacity: 0.1;}
}
	center img{
		border-radius:40px;
		animation-name:animate;
		animation-iteration-count: infinite;
		animation-duration: 4s;
		animation-delay: 2s;
		box-shadow: 8px 8px 16px black;
	}
	body{
		background-color:rgb(250,250,250);
		color:;
		
	}
	header{
		margin-left:100px;
	}
	center{
		margin-top:70px;
	}
	.all{
		display:flex;
		float:left;
	}
	.first{
		width:200px;
		height:200px;
		background:radial-gradient(red,green,red);

	}

	.second{
		width:200px;
		height:200px;
		background:green;

	}
	.third{
		width:200px;
		height:200px;
		background:linear-gradient(red,green,red);
	}
	canvas{
		float:right;
		margin-right: 50px;
		
	}
	.chatbot {
	width: 500px;
	min-width: 390px;
	height: 600px;
	background: #fff;
	padding: 18px;
	margin: 20px auto;
	box-shadow: 4px 4px 8px 8px grey;
}

.chatlogs {
	padding: 10px;
	width: 100%;
	height: 450px;
	overflow-x: hidden;
	overflow-y: scroll;
}

.chatlogs::-webkit-scrollbar {
	width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb {
	border-radius: 5px;
	background: rgba(0,0,0,.1);
}

.chat {
	display: flex;
	flex-flow: row wrap;
	align-items: flex-start;
	margin-bottom: 10px;
}


.chat .user-photo {
	width: 60px;
	height: 60px;
	background: #ffccff;
	border-radius: 50%;
}

.chat .chat-message {
	width: 80%;
	padding: 15px;
	margin: 5px 10px 0;
	border-radius: 10px;
	color:;
	font-size: 20px;
}

.friend .chat-message {
	background:#ccc;
}

.self .chat-message {
	background:rgb(200,200,155);
	order: -1;
}

.chat-form {
	margin-top: 20px;
	display: flex;
	align-items: flex-start;
}

.chat-form textarea {
	background: #fbfbfb;
	width: 75%;
	height: 50px;
	border: 2px solid #eee;
	border-radius: 3px;
	resize: none;
	padding: 10px;
	font-size: 18px;
	color: #333;
}

.chat-form textarea:focus {
	background: #fff;
}

.chat-form button {
	background: #1ddced;
	padding: 5px 15px;
	font-size: 30px;
	color: #fff;
	border: none;
	margin: 0 10px;
	border-radius: 3px;
	box-shadow: 0 3px 0 #0eb2c1;
	cursor: pointer;

	-webkit-transaction: background .2s ease;
	-moz-transaction: backgroud .2s ease;
	-o-transaction: backgroud .2s ease;
}

.chat-form button:hover {
	background: #13c8d9;
}
	
</style>
<body>
	<div class="container">
	<div class=row>
		<div class="col-md-6">
				<header>
					<?php echo "<h1>Name: ".$data['name'] ."</h1>";?>
					<?php echo "<h2>Username: ".$data['username']. "</h2>";?>
					<h3>aka youngpresido</h3>
					<h4>contact me: segunemma2003@gmail.com</h4>
					<?php echo'this is my secret code '. $secret_word;?>
				</header>
			<center class='img'>
				<img src="<?php echo $data['image_filename']; ?>" alt="segun" width="300px" height="300px">
				<span class="im"></span>
			</center>

		</div>


		<div class="col-md-6">
			<h3 class="text-muted text-center">MY CHAT BOT</h3>
			<article class="chatbot">
			
				<section class="chatlogs">
					<div class="chat self">
						<div class="user-photo"></div>
						<p class="chat-message">What's up ..!!<br> You got any question for me.......</p>	
					</div>
				</section>
				<div class="chat-form" style="margin:0 auto;">
					<div class="message" style="margin:0 auto;">
						<form id="myform">
						<textarea name="message" class="chat" rows="3" style="width:400px;"></textarea>
						<div align="right">
						<button type="submit"  class="btn btn-primary" style="border-radius:200px;" >Send</button>
						</div>
						</form>
					</div>
				
				</div>
			</article>		

		</div>
	</div>
</div>
	<div style="margin:auto;">
		<div><h6>Contact me </h6> </div>
		<a href="https://github.com/segunemma2003"><i class="fa fa-github"></i>Github</a> |
		<a href="https://www.linkedin.com/in/segun-bamidele-028160154"><i class="fa fa-linkedin"></i>LinkedIn</a> |
		<a href="https://www.instagram.com/youngpresidooo"><i class="fa fa-instagram"></i>Instagram</a> |
		<a href="https://www.facebook.com/youngpresido"><i class="fa fa-facebook"></i>Facebook</a> |
		<a href="https://twitter.com/idibia59"><i class="fa fa-twitter"></i>Twitter</a>
	</div>
		
	
<!-- 		
	<div class="all">
		<div class="first">
			
		</div>
		<div class="second">
			
		</div>
		<div class="third">

		</div>

	</div> -->
	<canvas id="myCanvas" width="300px" height="400px"></canvas>
	<!-- <script>
		let can=document.getElementById('myCanvas');
		let canvas=can.getContext('2d');
		canvas.fillStyle="white";
		canvas.arc(50,50,50,0,Math.PI*2,false);
		canvas.fill();
		canvas.fillStyle="green";
		canvas.arc(200,100,100,0,Math.PI*2,false);
		canvas.fill();
	</script> -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

	<script>
	$(document).ready(function(){
		$('.chat-form').submit(function(e){
                e.preventDefault();
		let chat = $('textarea');
                let message = chat.val().trim();
		//alert(message);
                //document.write(message);
                let container = $('.chatlogs');
                if (message != ''){

                    if (message.split(':')[0] !='train' && message != "aboutbot"){
                        container.append(sentMessage(message));
                        chat.val('');
                        $('.chatlogs').scrollTop($('.chatlogs')[0].scrollHeight);
					
                    }
                }
                if (message =="#aboutbot"){
                    chat.val('');
                	container.append(responseMessage('I am a little bot, my version is 0.1,'+'you can train me and i am fun to chat with'));
                    $('.chatlogs').scrollTop($('.chatlogs')[0].scrollHeight);
					// alert(responseMessage('I am a little bot'));
                    return;
                }
		if (message.startsWith('train:') ==true){
                    chat.val('');
                	container.append(sentMessage(message));
                    $('article').scrollTop($('article').scrollHeight);
					// alert(responseMessage('I am a little bot'));
				}
                $.ajax({
                     url: '/profiles/segunemma2003.php',
                     type: 'POST',
                     dataType: 'json',
                     data : {message: message},
                     success: function(res){

                         console.log(res);
			 //console.log(res==true);

                         if (res){

                             if (res.status ===0){
                                chat.val('');
				     console.log(res.data);
                                container.append(responseMessage(res.data));
                                $('.chatlogs').scrollTop($('.chatlogs')[0].scrollHeight);
								//alert($('.chatlogs').scrollTop($('.chatlogs')[0].scrollHeight));
                             }
                            if (res.status ===1){
                                chat.val('');
				    console.log(res.data);
                               container.append(responseMessage(res.data));
							   $('.chatlogs').scrollTop($('.chatlogs')[0].scrollHeight);
                            }

                         }
                     },
                     error: function(error){
                         console.log(error);
                     }
                 });

				
                function responseMessage(query){

                     return   '<div class="chat friend"><div class="user-photo"></div><p class="chat-message">'+ query + '</p></div>';
                }

                function sentMessage(response){
                    return   '<div class="chat self"><div class="user-photo"></div><p class="chat-message">' +  response + '</p></div>';
							
							
                }
               
            });
	
	});
			 
	</script>
	</div>
</body>
</html>

