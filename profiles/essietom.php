<?php 
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

        throw $err;
    }


?>

	
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		require "../answers.php";
		date_default_timezone_set("Africa/Lagos");
		// header('Content-Type: application/json');
		if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'answer' => "What is your question"
			]);
			return;
		}
		$question = $_POST['question']; //get the entry into the chatbot text field
		//check if in training mode
		$index_of_train = stripos($question, "train:");
		if($index_of_train === false){//then in question mode
			$question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
			$question = preg_replace("([?.])", "", $question); //remove ? and .
			//check if answer already exists in database
			$question = "%$question%";
			$sql = "select * from chatbot where question like :question";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':question', $question);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->fetchAll();
			if(count($rows)>0){
				$index = rand(0, count($rows)-1);
				$row = $rows[$index];
				$answer = $row['answer'];	
				//check if the answer is to call a function
				$index_of_parentheses = stripos($answer, "((");
				if($index_of_parentheses === false){ //then the answer is not to call a function
					echo json_encode([
						'status' => 1,
						'answer' => $answer
					]);
				}else{//otherwise call a function. but get the function name first
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
				}
			}else{
				echo json_encode([
					'status' => 0,
					'answer' => "Sorry, I cannot answer your question.Please train me. The training data format is  <b>train: question # answer # password</b>"
				]);
			}		
			return;
		}else{
			//in training mode
			//get the question and answer
			$question_and_answer_string = substr($question, 6);
			//remove excess white space in $question_and_answer_string
			$question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
			
			$question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
			$split_string = explode("#", $question_and_answer_string);
			if(count($split_string) == 1){
				echo json_encode([
					'status' => 0,
					'answer' => "Invalid training format. <br> Type  <b>train: question # answer # password</b>"
				]);
				return;
			}
			$que = trim($split_string[0]);
			$ans = trim($split_string[1]);
			if(count($split_string) < 3){
				echo json_encode([
					'status' => 0,
					'answer' => "Please enter the training password to train me."
				]);
				return;
			}
			$password = trim($split_string[2]);
			//verify if training password is correct
			define('TRAINING_PASSWORD', 'password');
			if($password !== TRAINING_PASSWORD){
				echo json_encode([
					'status' => 0,
					'answer' => "Sorry you cannot train me."
				]);
				return;
			}
			//insert into database
			$sql = "insert into chatbot (question, answer) values (:question, :answer)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':question', $que);
			$stmt->bindParam(':answer', $ans);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode([
				'status' => 1,
				'answer' => "Yipeee, I have been trained"
			]);
			return;
		}
		echo json_encode([
			'status' => 0,
			'answer' => "Sorry I cannot answer that question, please train me"
		]);
		
	}
	else{
?>
<head>
	<title><?php echo $user->username; ?></title>
	<style type="text/css">
		
		body{
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
	max-width: 1172px;
	background-color: #a1a1a1 ;
	background: no-repeat linear-gradient(to bottom,rgba(0,0,0,0.0),rgba(0,0,0,0.7));
}
.inner
{
	margin: 30px;
	padding-left: 90px;
	padding-right: 90px;
}
.banner
{
	width:100%;
	height: 500px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 40px;
	box-shadow: 10px 10px 5px #888888;
	background-color:rgba(0,0,0,0.1);

}

.more
{
	margin: 1px solid black;
	background-color: #352632;
	color:white;
	box-shadow: 5px #888888;
	text-decoration: none;
	border-radius: 7px;
	padding:5px;

}

.box
{
	background-color: #211d2e;
	color:white;
}
.box2
{
	background-color: black;
	color: white;
	
	
}
.box2list
{
	list-style-type: square;
}
.box2list > li > a
{
	
	text-decoration: none;
	color:white;
	margin-bottom: 50px;
}

.minbox
{
	width: 30.5%;
	height:100%;
	margin: 10px;
	float: left;
	text-align: center;
	padding: 2px;

}


.side-banner{
	width:30%;
	float: left;
	height: 100%;
}

.recent-work{
	border:1px solid #fff;
	padding:5px;
	height:27%;
	width: 95%;
}

.banner-main
{
	
	/*background-color:#113B66;*/
	color: black;
	height: 100%;
	text-align:center;
	width: 100%;
	padding-top: 30px;
	font-size: 18px;
}

.round-border
{
	border-radius:50%;
}

.page
{
	width:100%;
	height: 300px;
	position: relative;
	top:10px;
	margin: 0 auto;
	
}


.mybackground
{
	background-image: url('http://res.cloudinary.com/essietom/image/upload/v1523720347/background.png') ; 
	background-repeat:no-repeat; 
	background-size:cover;
	background-color: black;
	color: white;
}
.bbg
{
	background-image: url('http://res.cloudinary.com/essietom/image/upload/v1523719268/skills.png') ; 
	background-repeat:no-repeat; 
	background-size:cover;
	background-color: black;
	color: white;
}

.menu
{
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	/*background-color: #333;*/
}
.absmenu
{
	position: absolute;
	top:30px;
	left: 55%;
	

}
.menu>li
{
	
	float: left;
}

.menu > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
  color: white;
  text-align: center;
  text-decoration: none;
  animation:menushift 5s;
  animation-iteration-count: infinite;
}

.active
{
	color: red;
}

.menu2 {
  position: relative;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  float: right;
}

.nav
{
	margin: 7.5px -15px;

}


@keyframes menushift
{
	0%{color:navy;}
	25%{color:blue;}
	50%{color:teal;}
	75%{color:fuchsia;}
	100%{color:purple;}
}
.roll-image
{
	padding-top: 15px;
    transition:width:10s, height: 10s,transform:2s;
    transition-timing-function: ease-in;
}

.roll-image:hover {

    width: 150px;
    height: 155px;
    -webkit-transform: rotate(360deg); /* Chrome, Safari, Opera */
    transform: rotate(360deg);
}
		
				#time{
    display-content:center;
}
		
		.chat-frame {
			border-color: #cccccc;
			color: #333333;
			background-color: #ffffff;
			padding: 20px;
			height: 700px;
			margin-top: 5%;
			margin-bottom: 50px;
			font-size:18px;
		}
		.chat-messages {
			padding: 5px;
			height: 400px;
			overflow-y: auto;
			margin-left: 15px;
			margin-right: 15px;
			border-radius: 6px;
			
		}
		p {
    line-height: 1;
    margin: 10px 0;
}
		.single-message {
			margin-bottom: 5px; 
			border-radius: 5px;
			min-height: 30px;
			
		}
		.single-message-bg {
			background-color:#f3f3f3;
			
			
		}
		.single-message-bg2 {
			background-color: #f1f1f1;
			
		}
		input[name=question] {
			height: 50px;
		}
		button[type=submit] {
			height: 50px;
	
			color: black;
		}
		.circle {
			width: 60%;
			margin-left: 20%;
			border-radius: 50%;
		}
		.f-icon {
			font-size: 40px;
		}
		.col-md-4{
			border:0px;
		}
	</style>
</head>
<body>
<div class="inner">
<div class="absmenu">
<nav class="menu2">
	<ul class="menu nav">
		<li><a href="#" class="active">Home</a></li>
		<li><a href="#">Skills</a></li>
		<li><a href="#">About me</a></li>
		<li><a href="#">Awards</a></li>
		<li><a href="#">Academics</a></li>
	</ul>
</nav>
</div>
<div class="banner">

<div class="side-banner box">
	<h3 style="text-align:center">Recent Work</h3>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719269/work1.png" height="100%" width="100%">
	</div>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719267/work2.png" height="100%" width="100%">
	</div>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719267/work3.png" height="100%" width="100%">
	</div>
</div><!--end of side banner box -->

<div class="banner-main">
	
	<img src="http://res.cloudinary.com/essietom/image/upload/v1523719246/<?php echo $user->image_filename; ?>" width="100px" height="110px" class="round-border roll-image">
	<h2><?php echo $user->name; ?></h2>
	<h4>Web developer and designer</h4>
	<p style="text-align: justify; padding-right:10px;margin-left: 10px;">
		I am a tech enthusiast, passionate about changing my world with technology. Software development is my thing, with determination to discover creative ideas and solve complex problems.<br>
		I love inspiring women in tech and I hope to see more women in tech.<br>
		Oh! lest I forget, I am a good team player and can also have good leadership skills...
	</p>

	<a href="#" class="more"><i>know more</i></a>

</div><!--end of banner-main -->
	
</div><!--end of banner-->


<div class="page">
<div class="minbox mybackground" style="">

	<h3>Background</h3>
	<p>
		I wrote my first line of code "Hello World" in my first year in College.I have always been thrilled and fascinated by codes. I started with python, writing code for mathematical calculations like  "fibonnaci series", "Tower of Hanoi"...<a href="background.php">read more</a>
	</p>
	
</div>

<div class="bbg minbox">
	<h3>Skills</h3>
	
</div>
<div class="box2 minbox">
	<h3>Works</h3>

	<p>
		<ul class="box2list">
		<li><a href="github.com/cmstom" style="">Course Management System</a></li>
		<li><a href="github.com/cmstom">Expenses Manager</a></li>
		<li><a href="github.com/cmstom" >Website Design</a></li>
		<li><a href="#" >And many more</a></li>
		</ul>
	</p>
</div>

</div><!--end of page div-->
<div style="color:white">My secret code:<?php echo $secret_word; ?></div>
</div><!--inner ends here -->
<div class="row">
	<div class="col-md-4"></div>
<div class="col-md-4 offset-md-1 chat-frame">
			<h3 class="text-center">Bot Tom</h3>
			<div class="row chat-messages" id="chat-messages">
				<div class="col-md-12" id="message-frame">
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							<p>i am tom and its nice having you around</h5>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							<p>Ask me any damn thing u need to know about Hotels.ng </p>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							
							<p>You can as well train me, following this format: <br/><b>train: question # answer # password</b><p>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="row" style="margin-top: 40px;">
				<form class="form-inline col-md-12 col-sm-12" id="question-form">
					<div class="col-md-12 col-sm-12 col-12">
						<input class="form-control w-100" type="text" name="question" placeholder="type here...." />
					</div>
					<div class="col-md-12 col-sm-12 col-12" style="margin-top: 20px">
						<button type="submit" class="btn btn-success w-100" style="float:center;">Send</button>
					</div>
				</form>	
			</div>
			

</div>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script>
	
	$(document).ready(function(){
		var questionForm = $('#question-form');
		questionForm.submit(function(e){
			e.preventDefault();
			var questionBox = $('input[name=question]');
			var question = questionBox.val();
			
			//display question in the message frame as a chat entry
			var messageFrame = $('#message-frame');
			var chatToBeDisplayed = '<div class="row single-message">'+
						'<div class="col-md-12 offset-md-2 single-message-bg2">'+
							'<h5>'+question+'</h5>'+
						'</div>'+
					'</div>';
			
			messageFrame.html(messageFrame.html()+chatToBeDisplayed);
			$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
			//send question to server
			$.ajax({
				url: "/profiles/essietom.php",
				type: "post",
				data: {question: question},
				dataType: "json",
				success: function(response){
					if(response.status == 1){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-12 single-message-bg">'+
										'<h5>'+response.answer+'</h5>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-12 single-message-bg">'+
										'<h5>'+response.answer+'</h5>'+
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
</body>
</html>
<?php } ?>
