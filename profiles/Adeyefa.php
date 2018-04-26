<?php

if(!defined('DB_USER')){
  require "../../config.php";		
  try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
}


$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'adeyefa'");
$user = $result2->fetch(PDO::FETCH_OBJ);
///////////////////////////////////////////////////////////////



if($_SERVER['REQUEST_METHOD'] === 'POST'){

    require "../answers.php";
    
    date_default_timezone_set("Africa/Lagos");


    try{

	    if(!isset($_POST['question'])){
	      echo json_encode([
	        'status' => 1,
	        'answer' => "Please provide a question"
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

			unset($arr[0]);
			$q = implode(" ",$arr);
			$queries = explode("#", $q);
			if (count($queries) < 3) {
				# code...
				echo json_encode([
					'status' => 0,
					'answer' => "You need to enter a password to train me.",
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
					'answer' => "You entered a wrong passsword"
				]);
				return;
			}
			$quest = $queries[0];
			$ans = $queries[1];

			$sql = "insert into chatbot (question, answer) values (:question, :answer)";

			$stmt = $conn->prepare($sql);
	        $stmt->bindParam(':question', $quest);
	        $stmt->bindParam(':answer', $ans);
	        $stmt->execute();
	        $stmt->setFetchMode(PDO::FETCH_ASSOC);

			
			echo json_encode([
				'status' => 1,
				'answer' => "Thanks for training me, you can now test my knowledge"
			]);
			return;
		}
		elseif ($arr[0] == "help") {
			echo json_encode([
				'status' => 1,
				'answer' => "Type 'aboutbot' to know more about me. You can also convert cryptocurrencies using this syntax.
				'convert btc to usd'.  You can train me by using this format ' train: This is a question # This is the answer # password '",
			]);
			return;	
		}
		elseif ($arr[0] == "convert") {
			# code...
			$from = $arr[1];
			$to = $arr[3];
			$converted_price = GetCryptoPrice($from, $to);
			$price = "1 " . $from . " = " . $to . " " . $converted_price ;
			echo json_encode([
				'status' => 1,
				'answer' => $price
			]);
			return;
		}
	    elseif ($arr[0] == "aboutbot") {
	    	# code...
	    	echo json_encode([
	    		'status'=> 1,
	    		'answer' => "I am MATRIX, Version 1.0.0."
	    	]);
	    	return;
	    }
	    else {
	    	$question = implode(" ",$arr);
	    	//to check if answer already exists in the database...
	    	$question = "%$question%";
	    	$sql = "Select * from chatbot where question like :question";
	        $stat = $conn->prepare($sql);
	        $stat->bindParam(':question', $question);
	        $stat->execute();

	        $stat->setFetchMode(PDO::FETCH_ASSOC);
	        $rows = $stat->fetchAll();
	        if(count($rows)>0){
		        $index = rand(0, count($rows)-1);
		        $row = $rows[$index];
		        $answer = $row['answer'];
		        // check if answer is a function.
		        $index_of_parentheses = stripos($answer, "((");
		        if($index_of_parentheses === false){// if answer is not to call a function
		        	echo json_encode([
			        	'status' => 1,
			        	'answer' => $answer
			        ]);
			        return;
		        }else{//to get the name of the function, before calling
		            $index_of_parentheses_closing = stripos($answer, "))");
		            if($index_of_parentheses_closing !== false){
		                $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
		                $function_name = trim($function_name);
		                if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
		                   echo json_encode([
		                    'status' => 0,
		                    'answer' => "The function name should not contain white spaces"
		                  ]);
		                  return;
		                }
			            if(!function_exists($function_name)){
			              echo json_encode([
			                'status' => 0,
			                'answer' => "I am sorry but I could not find that function"
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
		    		'answer' => "I am sorry, I cannot answer your question now. You could offer to train me."
		    	]);
		    	return;
		    }
	    }
	}catch (Exception $e){
		return $e->message ;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>  <?php echo $user->name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-image: url(https://res.cloudinary.com/adeyefa/image/upload/v1524267920/turntable-1109588__340.jpg);
			height: 100%; 
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		}
		p{
			text-align: center;
			font-size: 60px;
			color: red;
		}
		#info{
			text-align: center;
			font-size: 30px;
		}
		#sidebar{
			width: 380px;
			height: 600px;
			position: relative;
		}
		#bbb{
			width: 780px;
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
			width: 350px;
			height: auto;
		}
		input{
			width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		textarea{
		    width: 65%;
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
		    max-height: 350px;
		    -webkit-justify-content: flex-end;
		    justify-content: flex-end;
		    -webkit-flex-direction: column;
		    flex-direction: column;
		    background-color: #00FFFF;

		}
		.irr{
	        color: red;
	        font-size: 15px;
			font-family: Ubuntu;
		}
		.irr:before{
			left: -3px;
            background-color: #00b0ff;
		}
		.iio{
			float: left;
			color: red;
			font-size: 15px;
			font-family: Ubuntu;

		}
		#ans{
			background-color: #00FF00;
			margin-top: 4px;
			margin-bottom: 4px
		}
		#que{
			background-color: #000FFF;
			margin-bottom: 4px;
			margin-top: 4px;
		}
	</style>
</head>
<body class="oj-web-applayout-body " >
	<div class="demo-flex-display oj-flex-items-pad oj-contrast-marker">
		<?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="adeyefa"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
		<div id="bbb">
	    	<div>
	    		<div class="oj-flex">
					<div class="oj-flex-item"> <p> HELLO WORLD </p> </div>
				</div>
				<div class="oj-flex">
					<div class="oj-flex-item"><p>I am   <?=$my_data['name'] ?></p> </div>
				</div>
				<div class="oj-flex">
					<div class="oj-flex-item"><p>A Blogger, Web Developer and Programmer</p> </div>
				</div>
				<p>
					<a href="https://github.com/sainttobs"><i class="fa fa-github"></i></i></a>
					<a href="https://twitter.com/9jatechguru"><i class="fa fa-twitter"></i></i></a>
					<a href="https://web.facebook.com/toba.adeyefa"><i class="fa fa-facebook"></i></i></a>	
				</p>
			</div>
	    </div>	
		<div id="sidebar">
			<div class="head">
				<h2> Chat With MyBot</h2>
			</div>
			<div class="row-holder">
				<div>
					<div id="form">
						<form id="qform" method="post">
							<div id="textform">
								<textarea id='questionBox' name="question" placeholder="Enter message ..."></textarea>
								<button type="submit" id="send-button">Send</button>
							</div>
							<div id="bot_reply">
								<div class="irr">
									Hi,i am MATRIX, the bot, i can answer basic questions. To know more about me type 'aboutbot'. You can also train me using this format 'train: Question # Answer # Password'
								</div>
									
								<div class="iio">
									<ul id="que">
											
									</ul>
									<ul class="ans">
										
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
				$("#que").append("<li> You: " + question + "</br></li>");
					//let newMessage = `<div class="iro">
	                  //${question}
	                //</div>`
				$.ajax({
					url: '/profiles/Adeyefa.php',
					type: 'POST',
					data: {question: question},
					dataType: 'json',
					success: function(response){
			        $("#ans").append("<li> MATRIX: "  + response.answer +  "</br></li>");
			       // console.log(response.result);
			        //alert(response.result.d);
			        //alert(answer.result);
			        
					},
					error: function(error){
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
