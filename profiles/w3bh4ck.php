<!DOCTYPE html>
<html>

<head>
    <title>W3BH4CK || HotelNG Intern</title>
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Concert+One|Patua+One|Righteous|Russo+One|Shrikhand" rel="stylesheet">
</head>
<style type="text/css">
    /*
font-family: 'Patua One', cursive;
font-family: 'Concert One', cursive;
font-family: 'Cinzel', serif;
font-family: 'Righteous', cursive;
font-family: 'Shrikhand', cursive;
font-family: 'Russo One', sans-serif;
        */

    html,
    body {
        margin: 0 auto;
    }

    #header {
        font-family: 'Russo One', sans-serif;
        color: white
    }

    body {
        background-image: url('http://res.cloudinary.com/w3bh4ck/image/upload/v1523849170/web-wallpaper.jpg');
    }

    img {
        margin-top: 10px;
        border: 2px dashed white;
    }

    .skills {
        margin-top: 20px;
        border: 2px solid grey;
        background-color: grey;
        font-family: 'Patua One', cursive;
        border-radius: 8px;
        box-shadow: 1px 1px 2px grey;
        opacity: 0.8;
    }

    .intro {
        margin-top: 20px;
        color: aliceblue;
        padding-top: 30px;
        font-family: 'Cinzel', serif;
    }
</style>

<body>

    <?php 
        require 'db.php';
    ?>

    <div class="container">

        <div id="header" class="section text-center">
            <img alt="photo" class="img-circle" src="http://res.cloudinary.com/w3bh4ck/image/upload/v1523793277/23658800_1730371916975943_5091116093810420678_n.jpg" height="300px" width="300px">
            <h2>AMADI LUCKY SAMPSON</h2>
            <h3>Software developer</h3>
        </div>
        <div class="row">
            <div class="col-md-6 intro">
                <h2>Hello, I am <strong>W3bh4ck</strong> A software developer with eyes for intuitive designs. I'm fascinated by technology and always ready to build and learn anything that works on the web.
                </h2>
            </div>

            <div class="col-md-6 skills">
                <h2 class="text-center">SKILLS</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        JavaScript
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        jQuery
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
                        React.js
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                        PHP
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        Java
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- chatbot section -->
    <div>



        <div class="col-md-6 offset-md-1 chat-frame">
            <h2 class="text-center">Chatbot Interface</h2>
            <div class="row chat-messages" id="chat-messages">
                <div class="col-md-12" id="message-frame">
                    <div class="row single-message">
                        <div class="col-md-2 single-message-bg">
                            <span class="fa fa-user f-icon"></span>
                        </div>

                        <div class="col-md-8 single-message-bg">
                            <p>Welcome! My name is <span style="font-weight: bold">Optimus Prime</span></p>
                        </div>
                    </div>
                    <div class="row single-message">
                        <div class="col-md-2 single-message-bg">
                            <span class="fa fa-user f-icon"></span>
                        </div>
                        <div class="col-md-8 single-message-bg">
                            <p>Ask me your questions and I will try to answer them.</p>
                        </div>
                    </div>
                    <div class="row single-message">
                        <div class="col-md-2 single-message-bg">
                            <span class="fa fa-user f-icon"></span>
                        </div>
                        <div class="col-md-8 single-message-bg">
                            <p>You can teach me answers to new questions by training me.</p>
                            <p>To train me, enter the training string in this format:</p>
                            <p><b>train: question # answer # password</b></p>
                            <p>To get assistance, type: <br>
                                <b>--help</b>
                            </p>
                        </div>
                    </div>

                    <!-- <div class="row single-message">
						<div class="col-md-10">
							<p>Welcome! How may I assist you today?</p>
						</div>

						<div class="col-md-2">
							<span class="float-right fa fa-user f-icon"></span>
						</div>
					</div> -->
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <form class="form-inline col-md-12 col-sm-12" id="question-form">
                    <div class="col-md-12 col-sm-12 col-12" id="thinking-div" style="display: none;">
                        <p style="font-size: 12px; font-style: italic; font-weight: bold;">w3bh4ck AI Prime is thinking...</p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <input class="form-control w-100" type="text" name="question" placeholder="Ask a question" />
                    </div>
                    <div class="col-md-12 col-sm-12 col-12" style="margin-top: 20px">
                        <button type="submit" class="btn btn-info float-right w-100">Send</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- end chatbot ->


<!--script -->
    
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
						'<div class="col-md-8 offset-md-2 single-message-bg2">'+
							'<p>'+question+'</p>'+
						'</div>'+
						'<div class="col-md-2 single-message-bg2">'+
							'<span class="float-right fa fa-user f-icon"></span>'+
						'</div>'+
					'</div>';

			messageFrame.html(messageFrame.html()+chatToBeDisplayed);
			$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);

			if(question.trim() == ''){
				var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-2 single-message-bg">'+
										'<span class="fa fa-user f-icon"></span>'+
									'</div>'+

									'<div class="col-md-8 single-message-bg">'+
										'<p>'+"Please enter a question"+'</p>'+
									'</div>'+
								'</div>';

				messageFrame.html(messageFrame.html()+chatToBeDisplayed);
				questionBox.val("");	
				$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
				return;
			}

			var thinkingDiv = $('#thinking-div');
			thinkingDiv.show();
			//send question to server
			$.ajax({
				url: "/profiles/chigozie.php",
				type: "post",
				data: {question: question},
				dataType: "json",
				success: function(response){
					if(response.status == 1){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-2 single-message-bg">'+
										'<span class="fa fa-user f-icon"></span>'+
									'</div>'+

									'<div class="col-md-8 single-message-bg">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';

						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-2 single-message-bg">'+
										'<span class="fa fa-user f-icon"></span>'+
									'</div>'+

									'<div class="col-md-8 single-message-bg">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';

						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}
					thinkingDiv.hide();
				},
				error: function(error){
					thinkingDiv.hide();
					console.error(error);
					var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-2 single-message-bg">'+
										'<span class="fa fa-user f-icon"></span>'+
									'</div>'+

									'<div class="col-md-8 single-message-bg">'+
										'<p style="color: red">'+'An error occured. I think my cerebellum is fried'+'</p>'+
									'</div>'+
								'</div>';

					messageFrame.html(messageFrame.html()+chatToBeDisplayed);
					$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
				}
			})

		});
	});
</script>	
<!-- end script -->
    
    <?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(!defined('DB_USER')){
			require "../../config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}
		require "../answers.php";

		date_default_timezone_set("Africa/Lagos");

		// header('Content-Type: application/json');

		if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'answer' => "Please provide a question"
			]);
			return;
		}

		$question = $_POST['question']; //get the entry into the chatbot text field

		if(stripos(trim($question),'--help') !== false){
			if(function_exists('getOptimusPrimeCustomFunctions')){
				echo json_encode([
					'status' => 1,
					'answer' => getOptimusPrimeCustomFunctions()
				]);
			}else{
				echo json_encode([
                	'status' => 0,
                	'answer' => "Some decepticon tampered with my head. I have forgotten my custom functions"
				]);
			}
			return;	
		}

		//check if in training mode
		// $index_of_train = stripos($question, "train:");
		$index_of_train = false;
		$index_of_colon = stripos($question, ":");
		if($index_of_colon !== false){
			//check for presence of train before colon
			$string_before_colon = trim(substr($question, 0, $index_of_colon));
			if(stripos($string_before_colon, "train") !== false){
				$index_of_train = $index_of_colon;
			}
		}
		if($index_of_train === false){//then in question mode
			$question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
			$question = preg_replace("([?.])", "", $question); //remove ? and .
			$question2 = $question; //to be used for performing query of questions with parameters

			//check if answer already exists in database
			// $question = "%$question%";
			$question = "$question";
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

				//question exists. 
				//check if the answer is to call a function
				$index_of_parentheses = stripos($answer, "((");
				if($index_of_parentheses === false){ //then the answer is not to call a function
					echo json_encode([
						'status' => 1,
						'answer' => $answer
					]);
					return;
				}else{//otherwise call a function. but get the function name first
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
				//normal question not found.
				//check for question that contains parameter

				$new_sentences = generate_arrangements($question2);
				//for each sentence, perform a query. Remove the last word first
				foreach($new_sentences as $sentence){
					$index_of_first_space = strpos($sentence, " ");
					$index_of_last_space = strrpos($sentence, " ");

					if($index_of_last_space === false){ //$index_of_first_space is also going to be false
						// search database for question containing only one word in it. That word is the parameter
						$question = " {{"."%";
						$sql = "select * from chatbot where question like :question";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':question', $question);
						$stmt->execute();

						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						$rows = $stmt->fetchAll();

						if(count($rows)>0){
							//then question may exist.
							//and the parameter is the ONLY part of the question
							$parameter = $sentence;
							$index = rand(0, count($rows)-1);
							$row = $rows[$index];

							$question_in_db = trim($row['question']);
							//$question_in_db must contain exactly one word for this match to be correct
							if(strpos($question_in_db, " ") !== false){
								continue;
							}
							$answer = $row['answer'];

							//check if the answer is to include the parameter in it
							$index_of_braces = stripos($answer, "{{");
							if($index_of_braces !== false && $index_of_braces >= 0){ //then the answer is to include the parameter in it
								$index_of_braces_closing = stripos($answer, "}}");
								if($index_of_braces_closing !== false){
									$parameter_placeholder =  substr($answer, $index_of_braces+2, $index_of_braces_closing-$index_of_braces-2);
								}
								
								$answer = str_replace("{{".$parameter_placeholder."}}", ucfirst($parameter), $answer);
							}

							//check if the answer is to call a function
							$index_of_parentheses = stripos($answer, "((");
							if($index_of_parentheses === false){ //then the answer is not to call a function
								echo json_encode([
									'status' => 1,
									'answer' => $answer
								]);
								return;
							}else{//otherwise call a function. but get the function name first
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
											'answer' => str_replace("(($function_name))", $function_name($parameter), $answer)
										]);
									}
									return;
								}
							}	
						}

					}else{
						$query_sentence = substr($sentence, 0, $index_of_last_space);
						$query_sentence = trim($query_sentence);

						$question = "%".$query_sentence." {{"."%";
						$sql = "select * from chatbot where question like :question";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':question', $question);
						$stmt->execute();

						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						$rows = $stmt->fetchAll();

						if(count($rows)>0){
							//then question exists.
							//and the parameter is the last part of the question
							$parameter = substr($sentence, $index_of_last_space+1);

							$index = rand(0, count($rows)-1);
							$row = $rows[$index];
							$answer = $row['answer'];

							//check if the answer is to include the parameter in it
							$index_of_braces = stripos($answer, "{{");
							if($index_of_braces !== false && $index_of_braces >= 0){ //then the answer is to include the parameter in it
								$index_of_braces_closing = stripos($answer, "}}");
								if($index_of_braces_closing !== false){
									$parameter_placeholder =  substr($answer, $index_of_braces+2, $index_of_braces_closing-$index_of_braces-2);
								}
								
								$answer = str_replace("{{".$parameter_placeholder."}}", ucfirst($parameter), $answer);
							}

							//check if the answer is to call a function
							$index_of_parentheses = stripos($answer, "((");
							if($index_of_parentheses === false){ //then the answer is not to call a function
								echo json_encode([
									'status' => 1,
									'answer' => $answer
								]);
								return;
							}else{//otherwise call a function. but get the function name first
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
											'answer' => str_replace("(($function_name))", $function_name($parameter), $answer)
										]);
									}
									return;
								}
							}	
						}
					}
				}

				echo json_encode([
					'status' => 0,
					'answer' => "Unfortunately, I cannot answer your question at the moment. I need to be trained further. The training data format is <br> <b>train: question # answer # trainingpassword</b>"
				]);
			}		
			return;
		}else{
			//in training mode
			//get the question and answer
			$question_and_answer_string = substr($question, $index_of_colon+1);
			//remove excess white space in $question_and_answer_string
			$question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
			
			$question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
			$split_string = explode("#", $question_and_answer_string);
			if(count($split_string) == 1){
				echo json_encode([
					'status' => 0,
					'answer' => "Invalid training format. I cannot decipher the answer part of the question. <br> The correct training data format is <br> <b>train: question # answer # trainingpassword</b>"
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
			define('TRAINING_PASSWORD', 'password');
			if($password !== TRAINING_PASSWORD){
				echo json_encode([
					'status' => 0,
					'answer' => "You are not authorized to train me"
				]);
				return;
			}

			//check if question contains parameter
			$index_of_braces = stripos($que, "{{");
			if($index_of_braces === false){ //then the question does not contain a parameter
				//insert into database
				$sql = "insert into chatbot (question, answer) values (:question, :answer)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':question', $que);
				$stmt->bindParam(':answer', $ans);
				$stmt->execute();
				echo json_encode([
					'status' => 1,
					'answer' => "Thank you, I am now smarter"
				]);
				return;
			}else{
				//parameter present in question
				$index_of_braces_closing = stripos($que, "}}");
				if($index_of_braces_closing !== false){
					$parameter_name = substr($que, $index_of_braces+2, $index_of_braces_closing-$index_of_braces-2);
					// $parameter_name2 = trim($parameter_name);

					//check if paramenter_name contains more than one word
					if(count(explode(" ", $parameter_name))>1){
						echo json_encode([
							'status' => 1,
							'answer' => "I am sorry, but I can only learn to accept a question with a parameter if the parameter has only one word in it"
						]);
						return;
					}

					//remove {{parameter_name}} from the question string and move it to the end of the string
					$que2 = trim(str_replace("{{".$parameter_name."}}", "", $que));
					$que2 = preg_replace("([\s]+)", " ", $que2);
					$que2 .= " {{".$parameter_name."}}";
					
					//insert rearranged question into database
					$sql = "insert into chatbot (question, answer) values (:question, :answer)";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':question', $que2);
					$stmt->bindParam(':answer', $ans);
					$stmt->execute();
					echo json_encode([
						'status' => 1,
						'answer' => "Thank you, I am now smarter"
					]);
					return;
				}else{
					echo json_encode([
						'status' => 1,
						'answer' => "Invalid format for parameter"
					]);
				}
			}

		}

		echo json_encode([
			'status' => 0,
			'answer' => "Unfortunately, I cannot answer your question at the moment. I need to be trained further"
		]);
		
	}

	function generate_arrangements($sentence){
		$new_sentences = [];
		$split_sentence = preg_split("([\s]+)", $sentence);
		for($i=count($split_sentence)-1; $i >= 0; $i--){
			$word = $split_sentence[$i];
			$new_sentence = "";
			for($j=0; $j<count($split_sentence); $j++){
				if($j !== $i){
					$new_sentence .= $split_sentence[$j]. " ";
				}
			}
			$new_sentence .= $word;
			$new_sentences[] = $new_sentence;
		}
		return $new_sentences;
	}

	function getWeather($location=''){
      define('OW_API_KEY', "97fbc1fbe89950b7e28508aa9148bf9d");
        if($location === ''){
            return "Please enter location";
        }

        $url = "http://api.openweathermap.org/data/2.5/weather?q=$location&units=metric&appid=".OW_API_KEY;
        // $curl_session = curl_init();
        // curl_setopt($curl_session, CURLOPT_URL, $url);
        // curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);
        // curl_setopt($curl_session,CURLOPT_HEADER, false); 
        // $result=curl_exec($curl_session);
        // curl_close($curl_session);
        $result = file_get_contents($url);
        $result_object = json_decode($result);
        if(!isset($result_object->main)){
        	return "City not found";
        }
        $weather = ucfirst($result_object->weather[0]->description);
        $temperature = $result_object->main->temp;
        $pressure = $result_object->main->pressure;
        $humidity = $result_object->main->humidity;
        $windspeed = $result_object->wind->speed;
        $result = "Weather: <b>$weather</b><br>Temperature: <b>$temperature<sup>o</sup>C</b><br>Pressure: <b>$pressure"."mb</b><br>Humidity: <b>$humidity%</b><br>Windspeed: <b>$windspeed"."km/hr</b>";
        return $result;
    }

    function getOptimusPrimeCustomFunctions(){
      $result = array("<b>getDayOfWeek</b>", "<b>getDaysInMonth</b>", "<b>getWeather</b>");
      $r = "My custom functions are:<br>".implode("<br>", $result);
      $r .= "<br>I however have to be trained first before I can answer questions based on these functions.";
      $r .= "<br>To answer questions which do not contain a parameter but whose answer uses a custom function, the training answer must contain the function name enclosed in (( )), i.e. ((<b>function_name</b>)). For example ((<b>getDayOfWeek</b>))";
      $r .= "<br>To answer questions which contain a parameter in the question, the training question must contain the parameter enclosed in {{ }}, i.e. {{<b>parameter</b>}}";
      $r .= "<br>and the training answer must contain the name of the function to call enclosed in (( )), i.e. ((<b>functionname</b>)). <br>An example of this is:";
      $r .= "<br>train: How many days does {{month}} have? # {{month}} has ((getDaysInMonth)) # trainingpassword";
      return $r;
    }
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
?>
    
    




<!--  ***************************************************************** -->
    <?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'w3bh4ck'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>


</body>

</html>