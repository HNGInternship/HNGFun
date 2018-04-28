<!DOCTYPE html>
<html>
<head>
	<title> <?=$my_data['name'] ?></title>
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
		#bot{
			margin-bottom: 10px;
			margin-top: 10px;
		}
		#you{
			margin-bottom: 10px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="iii">
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
		<div class="bbb">
	    	<div class="main">
				<p>
					HELLO WORLD
				</p>
				<p id="p1">
					I am  <?=$my_data['name'] ?>
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
									Hi,i am MATRIX, the bot, i can answer basic questions. To know about my functions type 'help'
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
	        $data = $_POST['question'];
	      //  $data = preg_replace('/\s+/', '', $data);
	        $temp = explode(':', $data);
	        $temp2 = preg_replace('/\s+/', '', $temp[0]);
	        
	        if($temp2 === 'train'){
	            train($temp[1]);
	        }elseif($temp2 === 'aboutbot') {
	            aboutbot();
	        }else{
	            getAnswer($temp[0]);
	        }
	    }

	    function aboutbot() {
	        echo json_encode([
	        	'status'=>1,
	        	'answer'=>"I am MATRIX, Version 1.0.0"
	        ]);
	        return;
	    }
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
	                        echo json_encode([
	                        	'status'=> 1,
	                        	'answer'=> "Thanks for training me,you can now test my knowledge"
	                        ]);
	                        return;
	                    };
	                } catch (PDOException $e) {
	                    throw $e;
	                }
	            }else{
	                echo json_encode([
	                	'status'=>1,
	                	'answer'=> "I already understand this, teach me somethingnew"
	                ]);
	                return;
	            }
	        }else {
	            echo json_encode([
	            	'status'=>0,
	            	'answer'=>"You entered a wrong password"
	            ]);
	            return;

	        }
	    }

	    function getAnswer($input) {
	        $question = $input;
	        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
	        $q = $GLOBALS['conn']->query($sql);
	        $q->setFetchMode(PDO::FETCH_ASSOC);
	        $data = $q->fetchAll();
	        if(empty($data)){
	            echo json_encode([
	            	'status'=>0,
	            	'answer'=> "I dont understand that command, you can train me using this format train: This is a Question # This is the answer # password"
	            ]);
	            return;
	        }else {
	            $rand_keys = array_rand($data);
	            $answer = $data[$rand_keys]['answer'];
	            echo json_encode([
	            	'status'=>1,
	            	'answer'=> $answer
	            ]);
	            return;
	        }
	    }
	    ?>
	</div>	
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var Form =$('#qform');
			Form.submit(function(e){
				e.preventDefault();
				var questionBox = $('textarea[name=question]');
				var question = questionBox.val();
				$("#ans").append("<li id='you'> You: " + question + "</li>");
					
				$.ajax({
					url: '/profiles/Adeyefa.php',
					type: 'POST',
					data: {question: question},
					dataType: 'json',
					success: function(response){
			        $("#ans").append("<li id='bot'>Bot: " + response.answer + "</li>");
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
