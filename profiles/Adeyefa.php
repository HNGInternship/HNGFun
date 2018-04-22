<?php 

require "../config.php";

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'adeyefa'");
$user = $result2->fetch(PDO::FETCH_OBJ);

?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	require "../answers.php";

	function sendResponse($status, $answer){
      echo json_encode([
        'status' => $status,
      'answer' => $answer]);
      exit();
    }


    function answerQuestion($question){
      global $conn;

      $question = preg_replace('([\s]+)', ' ', trim($question));
      $question = preg_replace("([?.])", "", $question);
      
      $question = "%$question%";
      $sql = "select * from chatbot where question like :question";
      $query = $conn->prepare($sql);
      $query->execute([':question' => $question]);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $query->fetchAll();
      
      $resultsCount = count($rows);
      if($resultsCount > 0){
        $index = rand(0, $resultsCount - 1);
        $row = $rows[$index];
        $answer = $row['answer'];	
        
        $startParanthesesIndex = stripos($answer, "((");

        // If the answer does not contain a function call
        if($startParanthesesIndex === false){
          sendResponse(200, $answer);
        }else{
          returnFunctionResponse($answer, $startParanthesesIndex);
        }
      }
    }
    function returnFunctionResponse($answer, $startParanthesesIndex){
      $endParanthesesIndex = stripos($answer, "))");
      if($endParanthesesIndex !== false){
        $nameOfFunction = substr($answer, $startParanthesesIndex + 2, $endParanthesesIndex - $startParanthesesIndex - 2);
        $nameOfFunction = trim($nameOfFunction);
        
        // If the function contains whitespace do not call it
        if(stripos($nameOfFunction, ' ') !== false){
          sendResponse(404, "The name of the function should not contain white spaces.");
        }
        
        // If the function does not exist in answers.php, tell the user
        if(!function_exists($nameOfFunction)){
          sendResponse(404, "I'm sorry. I do not know what you're trying to make me do.");
        }else{
          $functionResult = str_replace("((".$nameOfFunction."))", $nameOfFunction(), $answer);
          sendResponse(200, $functionResult);
        }
      }
    }


    function trainBot($question){
        global $conn;

        $trainingData = substr($question, 6);
        $trainingData = preg_replace('([\s]+)', ' ', trim($trainingData));
        $trainingData = preg_replace("([?.])", "", $trainingData);
        
        $splitString = explode("#", $trainingData);
        if(count($splitString) == 1){
          sendResponse(422, "Please provide valid training data.");
        }
        
        $question = trim($splitString[0]);
        $answer = trim($splitString[1]);

        $sql = "insert into chatbot (question, answer) values (:question, :answer)";
        $query = $conn->prepare($sql);
        $query->bindParam(':question', $question);
        $query->bindParam(':answer', $answer);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        sendResponse(200, "I can literally feel my IQ increasing. Thanks 🙈");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if($_POST['password'] === 'trainpwforhng'){
        $question = $_POST['question'];

        $userIsTrainingBot = stripos($question, "train:");
        if($userIsTrainingBot === false){
          answerQuestion($question);
        }else{
          trainBot($question);
        }
        
        $randomIndex = rand(0, sizeof($noIdeaResponses) - 1);
        sendResponse(200, $noIdeaResponses[$randomIndex]);
    }else{
        echo json_encode([
          'status' => 403,
          'answer' => 'You are not authorized to train this bot.'
        ]);
      }
    }
}
/*
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    include "../answers.php";
    
    try{

	    if(!isset($_POST['question'])){
	      echo json_encode([
	        'status' => 1,
	        'result' => "Please provide a question"
	      ]);
	      return;
	    }

	    //if(!isset($_POST['question'])){
	    $mem = $_POST['question'];
	    $mem = preg_replace('([\s]+)', ' ', trim($mem));
	    $mem = preg_replace("([?.])", "", $mem);
		$arr = explode(" ", $mem);
		//test for training mode

		if($arr[0] == "train:"){



	        //echo json_encode([
	          //'status' => 0,
	          //'answer' => "You need to enter the training password to train me."
	        //]);
			unset($arr[0]);
			$q = implode(" ",$arr);
			$queries = explode("#", $q);
			if (count($queries) < 3) {
				# code...
				echo json_encode([
					'status' => 0,
					'result' => "You need to enter a password to train me."
				]);
				return;
			}
			$password = trim($queries[2]);
			//to verify training password
			define('trainingpassword', 'password');
			
			if ($password !== trainingpassword) {
				# code...
				echo json_encode([
					'status'=> 0,
					'result' => "You entered a wrong passsword"
				]);
				return;
			}
			$quest = $queries[0];
			$ans = $queries[1];
<<<<<<< HEAD
			 $sql = "INSERT INTO chatbot(question, answer) VALUES ( '" . $quest . "', '" . $ans . "')";
			 $conn->exec($sql);
			 echo json_encode([
			 	'status' => 1,
			 	'result' => "Thanks for training me, you can now test my knowledge"
			 ]);
			 return;
=======
			$sql = "INSERT INTO chatbot(question, answer) VALUES ( '" . $quest . "', '" . $ans . "')";
			$conn->exec($sql);
			echo json_encode([
				'status' => 1,
				'result' => "Thanks for training me, you can now test my knowledge"
			]);
			return;
>>>>>>> 5c663863828d43d2f4d816767f80e3c439d708a2
	    }
	    //else {
	   //   $arrayName = array('result' => 'Oh my Error');
	   //   header('Content-type: text/json');
	   //   echo json_encode($arrayName);
	   //   return;
	   // }
	    elseif ($arr[0] == "aboutbot") {
	    	# code...
	    	echo json_encode([
	    		'status'=> 1,
	    		'result' => "I am MATRIX, Version 1.0.0. You can train me by using this format ' train: This is a question # This is the answer # password '"
	    	]);
	    	return;
	    }
	    else {
	    	$question = implode(" ",$arr);
	    	//to check if answer already exists in the database...
	    	$question = "%$question%";
	    	$sql = "Select * from chatbot where question like $question";
	        $stat = $conn->prepare($sql);
	        $stat->bindParam(':question', $question);
	        $stat->execute();

	        $stat->setFetchMode(PDO::FETCH_ASSOC);
	        $rows = $stat->fetchAll();
	        if(count($rows)>0){
		        $index = rand(0, count($rows)-1);
		        $row = $rows[$index];
		        $answer = $row['answer'];
		        
		        echo json_encode([
		        	'status' => 1,
		        	'result' => $answer
		        ]);
		        return;
		    }else{

		    	echo json_encode([
		    		'status' => 0,
		    		'result' => "I am sorry, I cannot answer your question now. You could offer to train me."
		    	]);
		    	return;
		    }
	    }
	}catch (Exception $e){
		return $e->message ;
	}
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>  <?php echo $user->name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-image: url(https://res.cloudinary.com/adeyefa/image/upload/v1524267920/turntable-1109588__340.jpg);
			height: 100%; 
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		}
		h1{
			text-align: center;
			color: red;
		}
		p{
			text-align: center;
			font-size: 60px;
			color: red;
		}
		#p1{
			text-align: center;
			font-size: 60px;
		}
		#info{
			text-align: center;
			font-size: 30px;
		}
		.sidebar{
			width: 400px;
			height: 590px;
		}
		.bbb{
			width: 790px;
			height: 590px;
			float: right;
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
			width: 400px;
			height: auto;
		}
		input{
			width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		textarea{
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
			text-align: center;
		}
		h2{
			color: white;
			font-weight: bolder;
			font-size: 40px;
		}
		li{
			size: 20px;
		}
		#questionBox{
			font-size: 15px;
			font-family: Ubuntu;
			width: 400px;
			height: auto;
		}
		#bot_reply{
            position: relative;
		    overflow: auto;
		    overflow-x: hidden;
		    padding: 10px 5px 92px;
		    border: none;
		    max-height: 300px;
		    -webkit-justify-content: flex-end;
		    justify-content: flex-end;
		    -webkit-flex-direction: column;
		    flex-direction: column;
		}
		.irr{
	        color: #fff;
	        font-size: 15px;
			font-family: Ubuntu;
		}
		.irr:before{
			left: -3px;
            background-color: #00b0ff;
		}
		#queries{
			margin-left: 50px;
		}
		.iro{
			float: right;
			color: #0DDFFF;
			font-size: 20px;
			font-family: Ubuntu;
		}
		.iio{
			float: left;
			margin-right: 90px;
			color: #01DDDD;
			font-size: 20px;
			font-family: Ubuntu;
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
					I am  <?php echo $user->name ; ?>
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
				<h2> Chat With MyBot</h2>
			</div>
			<div class="row-holder">
				<div class="row2">
					<div id="form">
						<form id="qform" method="post">
							<div id="textform">
								<textarea id='questionBox' name="question" placeholder="Enter message ..."></textarea>
								<button type="submit" id="send-button">Send</button>
							</div>
							<div id="bot_reply">
								<div class="irr">
									Hi,i am MATRIX, the bot, i can answer basic questions. To know more about me type: 'aboutbot'
								</div>
								<div class="iro">
									<ul id="queries">
										
									</ul>
								</div>	
								<div class="iio">
									<ul id="ans">
											
									</ul>
								</div>	
							</div>
						</form>
					</div>
				</div>
			</div>		
	    </div>
	</div>	
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var Form =$('#qform');
			Form.submit(function(e){
				e.preventDefault();
				var questionBox = $('textarea[name=question]');
				var question = questionBox.val();
				$("#queries").append("<li>" + question + "</li>");
					//let newMessage = `<div class="iro">
	                  //${question}
	                //</div>`
				$.ajax({
					url: '../profiles/Adeyefa.php',
					type: 'POST',
					data: {question: question},
					dataType: 'json',
					success: function(response){

			        $("#ans").append("<li>"  + response.answer +  "</li>");
			       // console.log(response.result);

			        //alert(response.result.d);
			        //alert(answer.result);
			        
					},
					error: function(error){

						console.log(error);
				        alert(error);

						//console.log(error);
				        alert(JSON.stringify(error));

					}
				})	
			})
		});
	</script>
</body>
</html> 

<?php

?>
