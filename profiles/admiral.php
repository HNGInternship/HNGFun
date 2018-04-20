<?php
		if(!defined('DB_USER')){
			require "../../config.php";
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			    
			} catch (PDOException $e) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
			}
		}
if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$query = $conn->query("Select * from secret_word LIMIT 1");
	$query = $query->fetch(PDO::FETCH_OBJ);
	$secret_word = $query->secret_word;

	$query_me = $conn->query("Select * from interns_data where username = 'admiral'");
	$user = $query_me->fetch(PDO::FETCH_OBJ);

}
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
				return "Thanks! The new information is mcuh appreciated.";
			} catch (PDOException $e) {
				return "An error occured: ". $e->getMessage();
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
				$answer = train($train_question, $train_answer);}else{$answer=" incorrect password, authorization failed";}
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
				$answer = "Sorry, I cannot answer that question at the moment, you can also train me by entering the following command: <br>
				<code class='text-white'>train: your question # the correct answer # password</code>
				";
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
		.main{
			margin-top: 20vh;
		}

		.card.profile-card{
			
			width: 90%;
			max-width: 400px;
			background-color: #fff;
			color: #777;
			/*min-height: 90%;*/
			
		}

		.profile-card h1{
			font-size: 1.8rem;
		}


		.span-width{
			width: 80%;
		}

		.bot-panel{
			height: 80vh;
			width: 90%;
			max-width: 400px;
		}

		@media(min-width: 750px){
			.bot-panel{
				position: fixed;
				right: 0;
				bottom: 0;
			}
		}

		.bot-panel .card-header{
			background-color: #0085A1;
			color: #fff;
		}

		.bot-panel .card-body{	
			overflow-y: scroll;
		}

		.gracie-icon{
			max-width: 60px;
			border: 1px solid #fff;
			border-radius: 50%;
		}
		.msj-rta:after{
		    width: 0;
		    height: 0;
		    content:"";
		    top:-5px;
		    left:14px;
		    position:relative;
		    border-style: solid;
		    border-width: 13px 13px 0 0;
		    border-color: whitesmoke transparent transparent transparent;           
		}  

		.text{
		    width:75%;display:flex;flex-direction:column;
		}

		.text-r{
		    float:right;padding-left:10px;
		}

		.avatar{
		    display:flex;
		    justify-content:center;
		    align-items:center;
		    width:25%;
		    float:left;
		    padding-right:10px;
		}
		.macro{
		    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
		}
		.msj-rta{
		    float:right;
		    background:whitesmoke;
		}
		.msj{
		    float:left;
		    background-color: #0085A1;
		}
		.txt {
			font-size: 14px;
		}
		.tx {
			color: #fff
		}
		.text-white {
			color: red;
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
			<div class="col-md-6">
				<div class="card border-0 bot-panel ml-auto mr-auto">
				  <div class="card-header">
				    <h4 class="ml-3 d-inline" style="font-size: 1.2rem; font-weight: 500;">CHAT BOT</h4>
				  </div>
				  <div class="card-body" id="chatWindow">
                        <div class="msj macro">
                            <div class="text text-l">
                                <p class="txt">How may I be of service today?</p>
                            </div>
                        </div>
                    <!-- Gracie's message -->
                        <div class="msj macro">
                            <div class="text text-l">
                                <p class="txt">ask me any questions, You can also train me by entering the following format: <br>
                                	<code class="text-white">train: your question # the correct answer # password</code>
                                </p>
                                
                            </div>
                        </div>
                        <?php if (isset($question)) {
                        	?>
                        
                    <!-- User's message -->
                  
                        <div class="msj-rta macro">
                            <div class="text text-r">
                                <p><?php echo $question; ?></p>
                                
                            </div>
                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div>

                    	</div>

                    	<?php } ?>

				    <?php if (isset($answer)) { ?>
				    	<!-- Gracie's message -->
                        <div class="msj macro">
                            <div class="text text-l">
                                <p><?php echo $answer; ?></p>                                
                            </div>
                        </div>
				    <?php } ?>

				  </div>

				  <div class="card-footer">
				  	<form class="form-inline" method="post" id="messageForm">
				  		<div class="form-group mb-2 col-10 mr-auto">
					    	<label for="message" class="sr-only">Message</label>
					    	<input type="text" class="col-12 form-control" id="message" name="message" placeholder="Type Here">
					  	</div>
					  	<button type="submit" class="col-2 mx-auto btn btn-primary mb-2"><i class="fa fa-angle-double-right"></i></button>
				  	</form>
				  	
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
		<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function() {
		// let's scroll to the last message
		$('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);

			$('#messageForm').submit(function(e){
				e.preventDefault();
				sendMessage(e);	
			});

			
			
			
		});

	function sendMessage(e) {
		var message = $('#message').val();
		if (message.length>0) {
			// I'm adding this because of delay in network, so the messages don't overlap
			var rand = Math.floor(Math.random()*100);
			var classname = 'sending-'+rand;
			var selector = '.'+classname;
			$('#message').val('');
			$('#chatWindow').append('<div class="msj-rta macro "><div class="text text-r"><p class="'+classname+'">Sending...</p></div>'+
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div></div>');
			$('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);
			
		  $.ajax({
				url: "/profiles/admiral.php",
				type: "post",
				data: {message: message},
				dataType: "json",
				success: function(response){
		    var answer = response.answer;
		  	$(selector).html(''+message+'');
			$(selector).removeClass(classname).addClass('sent');
			$('#chatWindow').append(' <div class="msj macro"><div class="text text-l"><p class="tx">'+answer+'</p></div></div>');
		  
		  },
		  error: function(error){
					console.log(error);
				}
		  // .catch(function (error) {
		  //   $('#chatWindow').append(' <div class="msj macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div><div class="text text-l"><p>sorry, an error occured</p></div></div>');
		  // });
		  
		  // e.preventDefault();
		});
	}
}
</script>
    </body>
</html>