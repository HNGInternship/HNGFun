
<?php
	if(!defined('DB_USER')){
		if (file_exists('../../config.php')) {
			require_once '../../config.php';
		} else if (file_exists('../config.php')) {
			require_once '../config.php';
		} elseif (file_exists('config.php')) {
			require_once 'config.php';
		}
			
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);			
		} catch (PDOException $e) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
		}
	}

  try {
      $sql = "SELECT * FROM interns_data WHERE username ='dreamtech467'";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $names = $data['name'];
  $username = $data['username'];
  $profile_img = $data['image_filename'];


  try {
      $sql2 = 'SELECT * FROM secret_word';
      $q2 = $conn->query($sql2);
      $q2->setFetchMode(PDO::FETCH_ASSOC);
      $data2 = $q2->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $secret_word = $data2['secret_word'];

  
  
  
		//chatBot
	if($_SERVER['REQUEST_METHOD'] === "POST"){
	
		function stripquestion($question){
			// remove whitespace first
			$strippedquestion = trim(preg_replace("([\s+])", " ", $question));
			$strippedquestion = trim(preg_replace("/[^a-zA-Z0-9\s\'\-\:\(\)#]/", "", $strippedquestion));
			$strippedquestion = $strippedquestion;
			return strtolower($strippedquestion);
		}
		function is_training($data){
			$keyword = stripquestion($data);
			if ($keyword=='train') {
				return true;
			}else{
				return false;
			}
		}
		function authorize_training($password){
			if ($password=='password') {
				return true;
			}else{
				return false;
			}
		}
		function training_data($body){
			$array_data = explode('#', $body);
			// clean everything up
			foreach ($array_data as $key => $value) {
				$value = stripquestion($value);
			}
			return array('question' => $array_data[0], 'answer' => $array_data[1], 'password'=> $array_data[2]);
		}
		function train($question, $answer){
			global $conn;
			try {
				$insert_stmt = $conn->prepare("INSERT into chatbot (question, answer) values (:question, :answer)");
				$insert_stmt->bindParam(':question', $question);
				$insert_stmt->bindParam(':answer', $answer);
				$insert_stmt->execute();
				return "Thanks!";
			} catch (PDOException $e) {
				return "An detect error: ". $e->getMessage();
			}
		}
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (isset($_POST['message']) && $_POST['message']!=null) {
			$question = $_POST['message'];
			$strippedquestion = stripquestion($question);
			$array_data = explode(':', $strippedquestion);
			if (is_training($array_data[0])) { 
				extract(training_data(stripquestion($array_data[1])), EXTR_PREFIX_ALL, "train");
				if(authorize_training(stripquestion($train_password))){
				$answer = train($train_question, $train_answer);}else{$answer=" invalid password";}
				echo json_encode([
					'status' => 1,
					'answer' => $answer
				]);
				return;				
			}
			else{			
				$strippedquestion = "%$strippedquestion%";
				$answer_stmt = $conn->prepare("SELECT answer FROM chatbot where question LIKE :question ORDER BY RAND() LIMIT 1");
				$answer_stmt->bindParam(':question', $strippedquestion);
				$answer_stmt->execute();
				$results = $answer_stmt->fetch();
				if(($results)!=null){
					$answer = $results['answer'];
					echo json_encode([
						'status' => 1,
						'answer' => $answer
					]);
					return;		
				}
				else{
					$answer = "Wow, I can only answer your question to the best of my knowledge, but you can train me to be smart: By entering the following<br>
					train: question #answer #password";
					echo json_encode([
						'status' => 0,
						'answer' => $answer
					]);
					return;
					
				}
			}
		}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initail-scale=1">
		<title>Abraham Profile</title>
		
		<script src="https://code.jquery.com/jquery-git.min.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
		 
		 
		 <script>
			$(document).ready(function() {
				
				$('.chatWrap').hide();
				
				$('.chatHead').click(function(){
					$('.chatWrap').slideToggle();
				});
						
				// let's scroll to the last message
				$('.chatBody').animate({scrollTop: $('.chatBody').prop("scrollHeight")}, 1000);
					
				
					
					$('textarea').keypress(
							function(e){
							if (e.keyCode == 13) {
								sendMessage(e);	
							}
					});
					
					
				});
			function sendMessage(e) {
				var message = $('#message').val();
				if (message.length>0) {
					// for delay in network
					var rand = Math.floor(Math.random()*100);
					var classname = 'sending-'+rand;
					var selector = '.'+classname;
					$('#message').val('');
					$('.chatBody').append('<div class="msgB"><strong>you</strong><br><p class="'+classname+'">Sending...</p></div>');
					$('.chatBody').animate({scrollTop: $('.chatBody').prop("scrollHeight")}, 1000);
					
				  $.ajax({
						url: "/profiles/dreamtech467.php",
						type: "post",
						data: {message: message},
						dataType: "json",
						success: function(response){
					var answer = response.answer;
					$(selector).html(''+message+'');
					$(selector).removeClass(classname).addClass('sent');
					$('.chatBody').append(' <div class="msgA"><strong>dreamtech</strong><br><p>'+answer+'</p></div>');
				  
											
				  },
				  error: function(error){
							console.log(error);
						}
				});
			}
		}
		</script>
      <style>
			
			body{
				padding-bottom: 0px;
				font-family: 'Open Sans', Arial, Tahoma;
				color: #363636;
				background: #ededed;
				font-size: 14px;
			}
			h2{
				font-weight: 700;
				font-size:1.5em;
				line-height: 1.4em;
				text-align: left;
			}
			strong, h2{
				color: #3b5a76;
			}

			.container-main{
				background: #fff;
				  margin-top: 80px;
				  padding:30px;
				  width:100%;
				  smargin-right:auto;
				  smargin-left:auto;
				  border-radius: 10px;
				  

			}

			header{
				min-height: 100px;
				overflow: auto;
			}

			header h4{
				margin:0;
				padding:10px 0 0 0;
				font-size: 1.6em;
				font-weight: 600;
				letter-spacing:-1px;
				text-align: center;
				line-height: 1.4em;

			}

			.profile-img{
				width:200px;
				height:200px;
				display: block;
				margin: auto;
				margin-top:-80px;
				border-radius: 20%;
			}
			
			.chatBox{
				cursor:pointer;
				background:#ffffff;
				0width:250px;
				0right:20px;
				mmposition:fixed;
				bottom:-5px;
				border-radius: 5px 5px 0px 0px;
			}
			.chatHead{
				background:#007BFF;
				padding:15px;
				color: #ffffff;
				border-radius: 5px 5px 0px 0px;
			}
			.close{
				float:right;
				color: #ffffff;
			}
			.chatBody{
				height:300px;
				font-size:12px;
				overflow:auto;
				overflow-x:hidden;
				
			}
			
			.msgA{
				margin-top: 10px;
				margin-right:20px;
				padding:15px;
				background:#99ffcc;
				margin-left:20px;
				position:relative;
				min-height:10px;
				border-radius:5px;
			}
			.msgA:before{
				content: "";
				  position: absolute;
				  width: 0px;
				  height: 0px;
				  left: -28px;
				  top: 7px;
				  border-radius:5px;
				  border: 15px solid;
				  border-color: transparent #99ffcc transparent transparent;
			}
			.msgB{
				margin-top: 10px;
				margin-right:20px;
				padding:15px;
				background:#6699ff;
				margin-left:20px;
				min-height:15px;
				position:relative;
				border-radius:5px;
				color:#ffffff;
			}
			.msgB:before{
				content: "";
				  position: absolute;
				  width: 0px;
				  height: 0px;
				  right: -28px;
				  top: 7px;
				  border-radius:5px;
				  border: 15px solid;
				  border-color: transparent  transparent transparent #6699ff;
			}
			#message{
				border: transparent;
				border-top:1px solid #bdc3c7;
				width:100%;
				padding:5px;
				-webkit-box-sizing: border-box;
			   -moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			.pAbout{
				text-align:center;
			}
		</style>
	</head>
	<body>
		<section>
			<div class="container container-main">
				<div class="col-md-8">
					<img src="<?php echo $profile_img ?>" alt="" class="profile-img" />
					<header>
						<h4>Hello, <br>Am <strong><?php echo $names ?>
						</strong> <br>a web developer @<?php echo $username ?>
						</h4>
						
					</header>
							<h2># About Me</h2>
							<p class="pAbout">Hi!! I am a Front-end/Backend Developer, self-driven, highly 
							motivated and hungry to learn new technologies, methodologies and 
							processes.Having overall experience in programming using google 
							search, I make complex problems beautiful. Outside the programming
							world, I’m a Crane Operator (Vessel Cranes).
							</p>
							
				</div>		
				<div class="col-md-3">
					
					<div class="chatBox">
						<div class="chatHead">
							dreamtech467 Bot
							<div class="close">
								x
							</div>
						</div>
					
						<div class="chatWrap">	
							<div class="chatBody">
								<!-- Bot message -->
								<div class="msgA">
										<p>Hi: Am dreamtech,<br> How may I help?</p>
								</div>
								
								<!-- You Questions -->
								<?php if (isset($question)) {?>
								<div class="msgA">
										<p><?php echo $question; ?></p>
								</div>
								<?php } ?>

								<!-- Bot message -->
								<?php if (isset($answer)) { ?>
									<div class="msgB">
											<p><?php echo $answer; ?></p>  
									</div>
								<?php } ?>
							</div>

							<div class="chatFooter">
								<label for="message" class="sr-only">Message</label>
								<textarea id="message" name="message"  placeholder="Ask Me Your Questions" ></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
	</body>
</html>

