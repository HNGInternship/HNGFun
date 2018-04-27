<?php
	if(!defined('DB_USER')){
	  require "../../config.php";		//change config details when pushing
	  try {
	      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
	  } catch (PDOException $pe) {
	      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	  }
	}
	//Fetch User Details
	try {
	    $query = "SELECT * FROM interns_data WHERE username ='adeyefa'";
	    $resultSet = $conn->query($query);
	    $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
	} catch (PDOException $e){
	    throw $e;
	}
	$username = $resultData['username'];
	$user = $resultData['name'];
	$picture = $resultData['image_filename'];
	//Fetch Secret Word
	try{
	    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
	    $resultSet   =  $conn->query($querySecret);
	    $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
	    $secret_word =  $resultData['secret_word'];
	}catch (PDOException $e){
	    throw $e;
	}
	$secret_word =  $resultData['secret_word'];
?>
<?php
//check if server method = post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include "../answers.php";
	//Get the input text from the user and store in a new vaariable called "question"
	$question = $_POST['question'];
	$question = preg_replace('([\s]+)', ' ', trim($question));
	$question = preg_replace("([?.])", "", $question); 
	 // check if question is "aboutbot"
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'aboutbot'){
      echo json_encode([
        'status' => 1,
        'answer' => "Hi dear! My name is Lolly. LollyBot is currently in version 1.0 and it's built by -Jeremiah Righteous-"
      ]);
      return;
    };
    //Check if user want to train the bot or ask a normal question
	$check_for_train = stripos($question, "train:");
    if($check_for_train === false){ //then user is asking a question
		//remove extra white space, ? and . from question
	    $question = preg_replace('([\s]+)', ' ', trim($question));
	    $question = preg_replace("([?.])", "", $question); 
	  
	    //check database for the question and return the answer
	    $question = "%$question%"; //return things that have the question
	    $sql = "select * from chatbot where question like :question";
	    $stmt = $conn->prepare($sql);
	    $stmt->bindParam(':question', $question);
	    $stmt->execute();
	    $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 	 $rows = $stmt->fetchAll();
	    if(count($rows)>0){ //if there are multiple match row
	        $index = rand(0, count($rows)-1); //choose any random one
	        $row = $rows[$index];
	        $answer = $row['answer'];
	        echo json_encode([
	            'status' => 1,
	            'answer' => $answer,  //return one of the row answers to client
	        ]);
	    }else{ //if no answer for the question in database
	    	 	 echo json_encode([
	            'status' => 1,
	            'answer' => "I can't answer your question! Please train me by typing-->  train: question #answer #password"
	        ]);
			
	    }
	    return;
	   
	}else{		  
		//train the chatbot to be more smarter 
		//remove extra white space, ? and . from question
	    $train_string  = preg_replace('([\s]+)', ' ', trim($question));
	    $train_string  = preg_replace("([?.])", "",  $train_string); 

	    //get the question and answer by removing the 'train'
	    $train_string = substr( $train_string, 6);

	    $train_string = explode("#", $train_string);

        //get the index of the user question
        $user_question = trim($train_string[0]);
	        if(count($train_string) == 1){ //then the user only enter question and did'nt enter answer and password
		        echo json_encode([
		          'status' => 1,
		          'answer' => "Oooh! sorry....you entered an invalid training format. Please the correct format is-->  train: question #answer #password"
		        ]);
	        return; 
	        };

	        //get the index of the user answer
	        $user_answer = trim($train_string[1]);    
	        if(count($train_string) < 3){ //then the user only enter question and answer But did'nt enter password
		        echo json_encode([
		          'status' => 1,
		          'answer' => "Please enter training password to train me. The password is--> password"
		        ]);
	        return;
	        };

	         //get the index of the user password
		    $user_password = trim($train_string[2]);

	        //verify if training password is correct
	        define('TRAINING_PASSWORD', 'password'); //this is a constant variable
	        if($user_password !== TRAINING_PASSWORD){ //the password is incorrect
		        echo json_encode([
		          'status' => 1,
		          'answer' => "The password you entered is wrong! Please enter the correct password which is-->  password "
		        ]);
	     	return;
	    	};

		    //check database if answer exist already
		    $user_answer = "$user_answer"; //return things that have the question
		    $sql = "select * from chatbot where answer like :user_answer";
		    $stmt = $conn->prepare($sql);
		    $stmt->bindParam(':user_answer', $user_answer);
		    $stmt->execute();
		    $stmt->setFetchMode(PDO::FETCH_ASSOC);

		 	$rows = $stmt->fetchAll();
		    if(empty($rows)){// then it means the database could not fetch any existing question and answer, so	we can insect the query.      
			    $sql = "insert into chatbot (question, answer) values (:question, :answer)";  //insert into database
			    $stmt = $conn->prepare($sql);
			    $stmt->bindParam(':question', $user_question);
			    $stmt->bindParam(':answer', $user_answer);
			    $stmt->execute();
			    $stmt->setFetchMode(PDO::FETCH_ASSOC);
			    
			    echo json_encode([
			    	'status' => 1,
			        'answer' => "WOW! I'm learning new things everyday. Thanks Buddy! for making me more smarter. You can ask me that same question right now and i will tell you the answer OR just keep training me more Buddy! "
			      ]);			
	     	return;
	     	
	     	}else{ //then it means the the question already in the database and no need to insert it again

	     		 echo json_encode([
			    	'status' => 1,
			        'answer' => "Sorry! Answer already exist. Try train me again with the same question AND provide an altanative answer different from the previous one you entered OR just train me with a new question and a new answer."
			      ]);
			return;		
	     	};
	    return;
	 	};    
	  
} else {

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
			margin-right: 90px;
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
		<div class="bbb">
	    	<div class="main">
				<p>
					HELLO WORLD
				</p>
				<p id="p1">
					I am  <?php echo $user->name ?>
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
						console.log(error);
				        alert(error);
					}
				})	
			})
		});
	</script>
</body>
</html> 

<?php }  ?>
