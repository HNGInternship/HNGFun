<?php 
	 if($_SERVER['REQUEST_METHOD'] === "GET"){
	if(!defined('DB_USER')){
		require "/config.example.php";	
	   
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}

    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {
        throw $err;
	}
}
?>

<?php
  function validateinput($input) {
	$input = trim($input);
	$input = chop($input);
	$input = trim($input, "?");
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
  return $input;
  }
 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	require "../answers.php";
	date_default_timezone_set("Africa/Lagos");

		
	if(empty($_POST['question'])){
		$reply = "You have to enter a question.";
		$response =array('status' => 0,'answer' => $reply);
		echo json_encode($response); 

		return;		
	}
       
	$question = validateinput($_POST['question']);
    
	//display bot version
	if($question == "about bot" ||$question == "aboutbot" ){
		$reply = "Andy bot v1.0";
				   $response = array('status'=>1,'answer'=> $reply);
				   echo json_encode($response); 
				   return;
	}else{
	
	//check for train
	$train = explode(':', $question);
	if($train[0] == 'train'){
		$inputQuestion = explode('#', $train[1]);
		$password = 'password';
		if(!count($inputQuestion)<3 && validateinput($password) === validateinput($inputQuestion[2])){
			if (validateinput($inputQuestion[0]) && validateinput($inputQuestion[1]) != " "){
				$dataQuestion = validateinput($inputQuestion[0]);
				$dataAnswer = validateinput($inputQuestion[1]);
				
				//is the question or answer already in the database
				$select = $conn->query("Select * from chatbot where question LIKE '%$question%'");
				$select->bindParam(':question', $question);
				$select->execute();
				$select ->setFetchMode(PDO::FETCH_ASSOC);
				$fetch = $select->fetchAll();
				if($fetch){
					$reply = "I already know that fam!";
				   $response = array('status'=>0,'answer'=> $reply);
				   echo json_encode($response); 
				}
				else{
					//save into the database as a new question
					$insert = "Insert into chatbot (question, answer) values ('$dataQuestion', '$dataAnswer')";
					
					if($conn->query($insert)){
						$reply = "Thanks alot, i feel smarter already.";
						$response = array('status'=>1, 'answer'=>$reply);
						echo json_encode($response);
					}else{
						$reply = "Sorry i didn't get that </br> i need you to repeat that lesson.";
						$response = array('status'=>0, 'answer'=>$reply);
						echo json_encode($response);
					}
				}
				//saving to database ends here
				
			}else{
				$reply = "Sorry fam, i only learn this way =><br> Training Format: train:question#answer#password";
						$response = array('status'=>0, 'answer'=>$reply);
						echo json_encode($response);
			}
		}else{
				$reply = "Thats not how to train buddy.<br> Training Format: train:question#answer#password";
						$response = array('status'=>0, 'answer'=>$reply);
						echo json_encode($response);
			}
	}else{
  //retrieving answers to questions from the database 
	 $question = validateinput($_POST['question']);
	 $answer = $conn->query("Select * from chatbot where question LIKE '%$question%'");
	
	 $answer ->setFetchMode(PDO::FETCH_ASSOC);
	 $ans = $answer->fetchAll();
	 if (count($ans) > 0) {

	   $choseRandom = rand(0, count($ans)-1);
	   $response = $ans[$choseRandom]['answer'];
	   $response = array('status'=>1,'answer'=> $response);
	   echo json_encode($response);

	 }
	 else{
		$index_of_parentheses_closing = stripos($answer, "))");
					if($index_of_parentheses_closing !== false){
						$function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
						$function_name = trim($function_name);
						if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
							echo json_encode([
								'status' => 0,
								'answer' => "No white spaces allowed in function name"
							]);
							return;
						}
						if(!function_exists($function_name)){
							echo json_encode([
								'status' => 0,
								'answer' => "Function not found"
							]);
						}else{
							echo json_encode([
								'status' => 1,
								'answer' => str_replace("(($function_name))", $function_name(), $answer)
							]);
						}
						return;
					}
					else{
						$error = "I don't seem to understand you <br> You can train me on that.";
						$response = array('status'=>2, 'answer'=> $error);
						echo json_encode($response); 
					}
				}
			}
			
		}
			

	} 
  else {
?>

<link href="https://fonts.googleapis.com/css?family=Englebert|Open+Sans:400,600,700" rel="stylesheet" type="text/css"> 
<script src="../js/jquery.min.js"></script>
<script src="..js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
 	
 <style>


  body
 {
	margin-top: 50px;
	padding: 0px;
	background:#7f7fff;
	font-family: 'Open Sans', sans-serif;
	font-size: 10pt;
	color: #737373;
 }

 h1, h2, h3
 {
	margin: 0;
	padding: 0;
	font-family: 'Englebert', sans-serif;
	color: #74C5F2;
 }

 h2
 {
	font-weight: 400;
	font-size: 2.00em;
	color: #8B2287;
 }

p, ol, ul
{
	margin-top: 0px;
}

p
{
	line-height: 180%;
	margin: 30px 0px 30px 0px;
}


a
{
	color: #8C2287;
}

a:hover
{
	text-decoration: none;
}

a img
{
	border: none;
}

img.alignleft
{
	float: left;
}

img.alignright
{
	float: right;
}

img.aligncenter
{
	margin: 0px auto;
}

hr{
	display: none;
}

/** WRAPPER */

#wrapper
{
	overflow: hidden;
	background: #FFFFFF;
	box-shadow: 0px 0px 20px 5px rgba(0,0,0,.10);
	border-radius: 40px;	
}

.container
{
	width: 380px;
	margin: 0px auto;
	height: 950px;	
}

.clearfix
{
	clear: both;
}

/** HEADER */

#header
{
	overflow: hidden;
	width: 920px;
	padding: 0px 0px;
	padding-top: 10px;
}

/** LOGO */

#logo
{
	float: left;
	width: 400px;
	height: 100px;
}


#logo h1 a
{
	line-height: 100px;
	text-decoration: none;
	font-size: 2em;
	font-weight: 400;
	color: #FFFFFF;
	width: 400px;
}

/** MENU */

#menu
{
	float: right;
	width: 650px;
	height: 80px;
	margin-top: 20px;
	background: #8C2287;
	box-shadow: 0px 0px 10px 1px rgba(0,0,0,.10);
	border-radius: 20px 20px 0px 0px;
}

#menu ul
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	line-height: normal;
	text-align: center;
}

#menu li
{
	display: inline-block;
	padding: 0px 20px;
}

#menu a
{
	display: block;
	line-height: 80px;
	text-decoration: none;
	font-family: 'Englebert', sans-serif;
	font-size: 1.50em;
	color: #FFFFFF;
}

#menu a:hover
{
	text-decoration: underline;
}

/** PAGE */

#page
{
	overflow: hidden;
	padding: 50px 0px;
	
}

#page h2
{
	padding-bottom: 20px;
}

/** CONTENT */

#content
{
	float: left;
	width: auto;
}

/** SIDEBAR */

#sidebar
{
	float: right;
	width: 280px;
}

#sidebar #sbox1
{
	margin-bottom: 30px;
}

/* Footer */

#footer
{
	overflow: hidden;
	padding:  0px 30px 0px;
	color: #C54F7F;
}

#footer p
{
	text-align: center;
}

#footer a
{
	color: #CE6790;
}

.image-style img
{
	margin-bottom: 2em;
	border-radius: 30px;
	padding: 0px 40px;
	width: 300px;
}

/** LIST STYLE 1 */

.list-style1
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	font-family: 'Open Sans', sans-serif;
	color: #777777;
}

.list-style1 li
{
	padding: 10px 0px 10px 0px;
	border-top: 1px solid #D6D6D6;
}

.list-style1 a
{
	color: #777777;
}

.list-style1 h3
{
	padding: 10px 0px 5px 0px;
	font-weight: 500;
	color: #444444;
}

.list-style1 .posted
{
	padding: 0px 0px 0px 0px;
}

.list-style1 .first
{
	border-top: 0px;
	padding-top: 0px;
}

/** LIST STYLE 2 */

.list-style2
{
	margin: 0px;
	padding: 0px;
	list-style: none;
}

.list-style2 li
{
	padding: 10px 0px 20px 0px;
	border-top: 1px solid #C9C9C9;
}

.list-style2 a
{
	color: #777777;
}

.list-style2 .first
{
	padding-top: 0px;
	border-top: 0px;
}

.link-style1
{
	display: inline-block;
	margin-top: 20px;
	background: #8C2287;
	border-radius: 10px;
	padding: 10px 30px;
	text-decoration: none;
	font-family: 'Englebert', sans-serif;
	font-size: 1.50em;
	color: #FFFFFF;
}

.chat-messages {
			background-color: lightblue;
			padding: 5px;
			height: 300px;
			overflow-y: auto;
			margin-left: 15px;
			margin-right: 15px;
			border-radius: 6px;
			
	
}

#chatMessages{ 
    width: 100%;
    overflow-x: hidden;
    max-height: 250px;
	margin-top: 20px;
}

#chat_message{
    height: 40px;
}

</style>
<div id="header" class="container" style="height:100px">
	<div id="logo">
		<h1><a href="#">@IyadiCyril</a></h1>
	</div>	
</div>
<div id="wrapper" class="container">
	<div id="page" style="width: 350px;">
		<div id="content"> <a href="#" class="image-style" style="padding-right: 40px;padding-left: 30px;width: 370.797px;"><img src="https://res.cloudinary.com/dj7y9zirl/image/upload/v1523825090/IMG_20180411_111139_1.jpg" width="300" height="200" alt=""></a>
			<h2 class="text-center">Software developer</h2>					
					<p style="margin-top: 0px;margin-left: 20px;border-right-width: 20px;margin-right: 20px;">The only edge i have is my ever in-depth desire to learn. </br> Have fun with my bot...He's name is Andy.</p>										
	</div>
</div>

 <!--Andy Bot-->
 <div class=" " style="width:350px;height:457px">
			<h2 class="text-center"><u>CHATBOT</u></h2>
			<div class="row chat-messages" id="chat-messages">
				<div class="col-md-12" id="message-frame">
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							<h5>Hey there!<span style="font-weight: bold"> My name's Andy</span></h5>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							<h5>I'm social, chat me up. </h5>
							<h5>To teach me a response use: <br/><b>train: question # answer # password</b><h5>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">							
							
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="row" style="margin-top: 40px;">
				<form class="form-inline col-md-12 col-sm-12" id="question-form">
					<div class="col-md-12 col-sm-12 col-12">
						<input class="form-control w-100" type="text" name="question" placeholder="Enter your message" />
					</div>
					<div class=" " style="margin-top: 20px; width:350px;" id="form">
						<button type="submit" class="btn btn-info" style="width:70px;border-left-width:0px;border-right-width:0px;padding-left:10px;padding-right:10px;margin-left:140px;margin-right:140px">DM</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="../js/jquery.min.js"></script>
<script>	
	$("#form").submit(function(){
		var questionForm = $('#question-form');
		questionForm.submit(function(event){
			event.preventDefault();
			var questionBox = $('input[name=question]');
			var question = questionBox.val();
			//var question = $('#question-form').val();
			
			//display question in the message frame as a chat entry
			var messageFrame = $('#message-frame');
			var chatToBeDisplayed = '<div class="row single-message">'+
						'<div class="col-md-12 offset-md-2 single-message-bg2">'+
							'<h5>You:'+question+'</h5>'+
						'</div>'+
					'</div>';
			
			messageFrame.html(messageFrame.html()+chatToBeDisplayed);
			$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
			//send question to server
			$.ajax({
				url: "/profiles/iyadicyril.php",
				type: "post",
				data: {question: question},
				dataType: "json",
				success: function(response){
					if(response.status == 1){
						var chatToBeDisplayed = '<div class="row single-message" style=" text-align: right;">'+
									'<div class="col-md-12 single-message-bg">'+
										'<h5>'+response.answer+':Me</h5>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row single-message" style=" text-align: right;">'+
									'<div class="col-md-12 single-message-bg">'+
										'<h5>'+response.answer+' :Me</h5>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}
				},
				error: function(error){
					console.log(error);
				}
			})
		});
	});
</script>
<?php } ?>

