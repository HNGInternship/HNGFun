<?php

require "../../config.php";

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'adeyefa'");
$user = $result2->fetch(PDO::FETCH_OBJ);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	require "../answers.php";

	date_default_timezone_set("Africa/Lagos");

	try{

		$question = $_POST['question'];
		//Check for training mode
		$train_question = stripos($question, "train:");
		if ($train_question === false) {
			# code...
			$question = preg_replace('([\s]+)', ' ', trim($question));//to remove extra white spaces from the question
			$question = preg_replace("([?.])", "", $question);

			//to check if question already exists in the database
			$question = "%$question%";
			$sql = "Select * from chatbot where question like :question";
			$stat = $conn->prepare($sql);
			$stat->bindParam(':question', $question);
			$stat->execute();

			$stat->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stat->fetchAll();
			if(count($rows)>0){
				#code...
				$index = rand(0,count($rows)-1);
				$row = $rows[$index];
				$answer = $row['answer'];
			}else{
				echo json_encode([
					'status' => 0,
					'answer' => "I cannot answer you question now, I will need further training"
			    ]);
			}
			return;
		}else{
			//get question and answer in training mode
			$training_string = substr($question, 6);
			//remove exceess white spaces
			$training_string = preg_replace('([\s]+)', ' ', trim($training_string));
			$training_string = preg_replace("([?.])", "", $training_string);

			$split_string = explode("#", $training_string);
			if(count($split_string) == 1){
				#code...
				echo  json_encode([
				    'status' => 0,
				    'answer' => "Invalid training format"
				]);

				return;
			}
			$que = trim($split_string[0]);
	        $ans = trim($split_string[1]);
	  
	        if(count($split_string) < 3){
		        echo json_encode([
		          'status' => 0,
		          'answer' => "You need to enter the training password to train me."
		        ]);
		        return;
	        }
			$password = trim($split_string[2]);
		    //verify if training password is correct
		    define('TRAINING_PASSWORD', 'trainpwforhng');
		    if($password !== TRAINING_PASSWORD){
		      echo json_encode([
		        'status' => 0,
		        'answer' => "You are not authorized to train me"
		      ]);
		      return;
		    }
		    $sql = "INSERT INTO chatbot (question,answer) VALUES (:question, :answer)";
		    $stat->bindParam(':question', $que);
		    $stat->bindParam(':answer', $ans);
		    $stat->execute();
		    $stat->setFetchMode(PDO::FETCH_ASSOC);
		    echo json_encode([
		    	'status' => 1,
		    	'answer' =>"Thanks for your help"
		    ]);
		    return;
		} 
		echo json_encode([
			'status' => 0,
			'answer' => "I am sorry, I dont understand you right now, I need more training"
		]);
	} catch (Exception $e){
		return $e->message;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>  <?php echo $user->name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-color: #D4F4F4;
		}
		h1{
			text-align: center;
			color: red;
		}
		.pimg{
			float: right;
		}
		p{
			text-align: center;
			font-size: 100px;
			color: red;
		}
		#p1{
			text-align: center;
			font-size: 60px;
		}
		#fav{
			size: 5px;
		}
		#info{
			text-align: center;
			font-size: 30px;
		}
		#bar{
			background-color: white;
		}
		.sidebar{
			background-color: #FD4F5F;
			width: 465px;
			height: 590px;
		}
		.bbb{
			background-color: #3DFFDF;
			width: 790px;
			height: 590px;
			float: right;
		}
		.iii{
			background-color: white;
		}
		.right{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: relative;
			margin-left: 100px;
		}
		.row{
			border-bottom: 3px solid #E1E1E1;
			margin-bottom: 10px;
			padding: 7px;
		}
		#form{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: absolute;
		}
		input{
			width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		input[type=text] {

		    width: 80%;
		    box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    font-size: 15px;
		    padding: 12px 20px 12px 40px;
		}

		input[type=submit]{
		    width: 80%;
		    padding: 12px 20px;
		    margin: 8px 8px;
		}
		.head{
			background-color: #0EEFF1;
			text-align: center;
		}
		h2{
			font-weight: bolder;
			font-size: 40px;
		}
	</style>
</head>
<body>
	<div class="iii">
		<div class="bbb">
	    	<div class="main">
				<p>
					HELLO WORLD
				</p>
				<p id="p1">
					I am  <?php echo $user->name; ?>
				</p>
				<p id="info">
					A Web developer, blogger and Software engineer
				</p>
				<p id="fav">
					<a href="https://github.com/sainttobs"><i class="fa fa-github"></i></i></a>
					<a href="https://twitter.com/9jatechguru"><i class="fa fa-twitter"></i></i></a>
					<a href="https://web.facebook.com/toba.adeyefa"><i class="fa fa-facebook"></i></i></a>	
				</p>
			</div>
	    </div>	
		<div class="sidebar">
			<div class="head">
				<h2> Chat With MyBot</h3>
			</div>
			<div class="row-holder">
				<div class="row2">
					<div id="form">
						<form id="qform">
							<input type="text" name='question' placeholder="type your question here"><input type="submit" name="submit">
						</form>
					</div>
				</div>
			</div>	
			<div>
				<ul id="chats">
					<li> Chat Here</li>
				</ul>
			</div>
	    </div>
	</div>	
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var Form =$('#qform');
			Form.submit(function(e){
				e.preventDefault();
				var questionBox = $('input[name=question]');
				var question = questionBox.val();
				$("#chats").append("<li>" + question + "</li>");

				$.ajax({
					url: '/profiles/Adeyefa.php',
					type: 'POST',
					dataType: 'json',
					data: {question: question},
					success: (response) =>{
						console.log("success");
					},
					error: (error) => {
						alert('error occured')
						console.log(error);
					}
				})
			})
		});
	</script>
</body>
</html> 

<?php

?>
