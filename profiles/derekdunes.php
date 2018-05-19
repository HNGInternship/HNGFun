<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'derekdunes'");
        $intern_data->execute();
        $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
        $result = $intern_data->fetch();
    
    
        $secret_code = $conn->prepare("SELECT * FROM secret_word");
        $secret_code->execute();
        $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
        $code = $secret_code->fetch();
        $secret_word = $code['secret_word'];
     } catch (PDOException $e) {
         throw $e;
     }
     date_default_timezone_set("Africa/Lagos");
     $today = date("H:i:s");
}

 ?>
 <?php 
    if($_SERVER['REQUEST_METHOD']==='POST'){
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = preg_replace("([?.!])", "", $data);
            $data = preg_replace("(['])", "\'", $data);
            return $data;
        }
        function chatMode($ques){
            require '../../config.php';
            $ques = test_input($ques);
            $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
            if(!$conn){
                echo json_encode([
                    'status'    => 1,
                    'response'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                ]);
                return;
            }
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
            $result = $conn->query($query)->fetch_all();
            echo json_encode([
                'status' => 1,
                'response' => $result
            ]);
            return;
        }
        function trainerMode($ques){
            require '../../config.php';
            $questionAndAnswer = substr($ques, 6); 
            $questionAndAnswer =test_input($questionAndAnswer); 
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==3)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
                $password = test_input($questionAndAnswer[2]);
            }
            if(!(isset($password))|| $password !== 'password'){
                echo json_encode([
                    'status'    => 1,
                    'response'    => "Please insert the correct training password"
                ]);
                return;
            }
            if(isset($question) && isset($answer)){
                $question = test_input($question);
                $answer = test_input($answer);
                if($question == "" ||$answer ==""){
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "empty question or response"
                    ]);
                    return;
                }
                $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
                if(!$conn){
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                    ]);
                    return;
                }
                $query = "INSERT INTO `chatbot` (`question`, `answer`) VALUES  ('$question', '$answer')";
                if($conn->query($query) ===true){
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "trained successfully"
                    ]);
                }else{
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "Error training me: ".$conn->error
                    ]);
                }
                

                return;
            }else{ 
            echo json_encode([
                'status'    => 0,
                'response'    => "Wrong training pattern<br> PLease use this<br>train: question # answer"
            ]);
            return;
            }
        }

        
        $ques = test_input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            chatMode($ques);
        }

       
        return;
    }
 

?>

    	<title>Mbah Derek</title>

	    	<!-- import bootstrap -->
		<!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


		<!-- import font awesome -->
		<!-- <link rel="stylesheet" type="text/css" href="font-awesome.min.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link href="https://fonts.googleapis.com/css?family=Work+Sans:Regular|Lato:regular" rel="stylesheet"> 

				<!-- body style -->
		<style type="text/css">
				
				.container {
					margin-top: 15px; 
					background-color: rgba(45,156,219,.75);
					border-radius: 5px
				}

				img {
					border: 2px solid #fff;
					border-radius: 5px;
					width: 100%;/*312px*/
					height: 100%;/*516px*/
				}

				#bio {
					margin: 10px 
				}

				#button {
					margin: 5px;
					color: #fff;
					border: 2px solid #fff;
					border-radius: 5px;
					font-size: 14px;
					text-align: center;
					padding-top: 5px;
					height: 33px;
					width: 50%;
				}

				aside {
					color: #fff;
				}

				aside h3 {
					font-family: "Work Sans", "Helvetica Neue", Serif, sans-serif;
				}

				aside h6 {
					margin-bottom: 10px;
					font-family: lato, "Helvetica Neue", Serif, sans-serif; 
				}

				aside p {
					margin-bottom: 30px;
					font-family: lato, "Helvetica Neue", Serif, sans-serif;		
				}

				aside h4{
					font-family: lato, "Helvetica Neue", Serif, sans-serif;
					line-height: 25px
				}

				#line {
					border: 1px solid #fff;
					margin: 10px
				}

				#slackName {
					border-bottom: 1px solid #fff;
					width: 76px
				}

			</style>

			<div class="container">
				<br>
				<!-- Row for profile details and bio -->
				<div class="row" id="bio">
					<div class="col-md-2 col-sm-12"></div>
					<section class="col-md-4 col-sm-12">
						<!-- image src and alt value from the database -->
						<img class="img-responsive" src="http://res.cloudinary.com/dunesart/image/upload/v1524437912/passport_2.jpg" alt="mbah derek">

					</section>
				
					<aside class="col-md-4 col-sm-12">
						<!-- Bio Section -->
						<h3>Mbah Derek</h3>
						<h6 id="slackName">@Derekdunes</h6>
						<p><h4> A UI/UX Designer who's not scared to get his hands dirty with code. He's curious to learn new stacks and an overall team player</h4></p>
						
						<p><h4> Open Sourcerer, Linux contributor, etc looking for words to add to make this text box perfect.</h4></p>
						
						<p><h4> Hobbies: Coding, Reading, Video Gaming, StartUp Hunting.</h4></p>
						<div class="row">
							<div class="col-sm-2"><a href="https://github.com/derekdunes"><i class="fa fa-github" style="font-size:30px; color:white;" ></i></a></div>		
							<div class="col-sm-2"><a href="https://t.me/derekdunes"><i class="fa fa-telegram" style="font-size:30px; color:white;"></i></a></div>
							<div class="col-sm-2"><a href="https://twitter.com/derekdunes"><i class="fa fa-twitter" style="font-size:30px; color:white;"></i></a></div>
							<div class="col-sm-2"><a href="https://www.fb.com/mbahderek18"><i class="fa fa-facebook" style="font-size:30px; color:white;"></i></a></div>
							<div class="col-sm-2"><a href="https://www.instagram.com/derekdunes/"><i class="fa fa-instagram" style="font-size:30px; color:white;"></i></a></div>
							<div class="col-sm-2"><a href="https://linkedin.com/mbah_derek"><i class="fa fa-linkedin" style="font-size:30px; color:white;"></i></a></div>

	    					 
	    					 
							  
							 
	 					</div>
					</aside>
				<div class="col-md-2 col-sm-12"></div>
				</div>
				<!-- Button Row -->
				<div class="row">
					<div class="col-3"></div>
					<!-- Contact button -->
					<div class="col-6 text-center" onclick="mailHim()" id="button">
						Contact
					</div>
					<div class="col-3"></div>
				</div>
				<div class="row">
					<div class="col-3"></div>
					<div class="col-6" id="line"></div>
					<div class="col-3"></div>
				</div>

				<style type="text/css">
					.chat-bot {
						background-color: #fff;
						margin: 10px 5px 10px 5px;
						border-radius: 5px 5px 0px 0px;
						padding-bottom: 40px;
						position: relative; 
					}

					.chat-bot-title {
						width: 100%;
						height: 50px;
						padding-left: 10px;
						border-radius: 5px 5px 0px 0px;
						border: 1px solid #fff;
						background: rgba(45,156,219,.75);
						color: #fff;
					}

					.message-area {
						max-height: 220px;
						overflow: auto;
						padding: 10px
					}

					.sent-message {
						display: flex;
						justify-content: flex-end;
						margin: 0 0 4px;
					}

					.received-message {
						display: flex;
						justify-content: flex-start;
						margin: 0 0 4px;
					}

					.message {
						padding: 5px 15px;
						background-color: rgba(45,156,219,.75);
						line-height: 14px;
						font-size: 12px;
						font-weight: 600;
						max-width: 50%
					}

					.sent {
						border-radius: 10px 0px 10px 10px;
						color: #fff;
					}

					.received {
						border-radius: 0px 10px 10px 10px;
						color: #fff;
					}

					.message-input-area {
						position: absolute;
						bottom: 0;
						width: 100%;
						display: flex;
						background-color: #fff;
						border: 1px solid rgba(45,156,219,.75);
						align-items: center;
						height: 40px
					}

					.message-input {
						width: 90%;
						height: 100%;
						border: none;
						background: transparent;
						padding: 0 10px
					}


					@media (min-width: 1200px) {
						
						.btn {
							width: 10%;
							height: 100%;
							color: #fff;
							background-color: rgba(45,156,219,.75)
							border: 1px solid #fff;
						}

					}

					@media (min-width: 768px) and (max-width: 979px) {
						
						.btn {
							width: 10%;
							height: 100%;
							color: #fff;
							background-color: rgba(45,156,219,.75)
							border: 1px solid #fff;
						}

					}

			        @media (max-width: 767px){
			        	
			        	.btn {
							width: auto;
							height: 100%;
							color: #fff;
							background-color: rgba(45,156,219,.75)
							border: 1px solid #fff;
						}

			        }

				</style>
				<div class="row">
					<div class="col-md-2 col-sm-1"></div>
					<div class="col-md-8 col-sm-10">
						<!-- chat bot -->
				<div class="chat-bot">
					<!-- chat title area -->
					<div class="chat-bot-title">
						DunesBot v1.1
					</div>
					<div class="message-area">
						<div class="received-message">
							<p class="message sent">
								I am DunesBot how can i help you	
							</p>
							
						</div>

						<div class="received-message">
							<p class="message received">
								Ask me anything and if i can't answer train me with the format
								train:question#answer#password
							</p>	
						</div>
											

					</div>
					<div class="message-form">
						<div class="message-input-area">
							<label for="user-message"></label>
							<input type="text" class="message-input" id="user-message" name="user-message" placeholder="Ask me anything" required>
							<button class="btn btn-primary" type="button" onclick="sendMsg()">Send</button>
						</div>
					</div>

				</div>
				<br>	
					</div>
					<div class="col-md-2 col-sm-1"></div>
				</div>
		</div>

			    <!-- Bootstrap core JavaScript -->
	    <script type="text/javascript">

	    	//contact derek  
	    	function mailHim(){
	    		window.open('malito:mbahderek@gmail.com');
	    	};

	    	window.addEventListener("keydown", function(e){
	    		if (e.keyCode == 13){
	    			//check is input for is empty
	    			if (document.querySelector("#user-message").value == "" || document.querySelector("#user-message").value == null){

	    				var replyFromBot = 'Please enter a command or type HELP to see my command list';
	    				dispMessage(replyFromBot, 'received');

	    			}else{

	    				sendMsg();
	    				
	    			}
	    		}
	    	});

	    	//send message to bot 
	    	function sendMsg(){
	    		//get message
	    		var inputForm = document.querySelector("#user-message");
	    		var messageToBot = inputForm.value;

	    		dispMessage(messageToBot,'sent');
	    		
	    		//clear the form
		    	inputForm.value = "";

	    		if (messageToBot == "" || messageToBot == null) {
	    			var replyFromBot = 'Please enter a command or type HELP to see my command list';
	    			dispMessage(replyFromBot, 'received');

	    			return;
	    		}
		    		
		    	if (messageToBot == 'aboutbot' || messageToBot == 'Aboutbot' || messageToBot == 'about bot' || messageToBot == 'About bot') {
		    		var replyFromBot = 'Name: DunesBot<br>Version: 1.0.1';
		    		dispMessage(replyFromBot, 'received');

		    		return;
		   		}

		    		//send message
		    		var xhttp = new XMLHttpRequest();
		    		xhttp.onreadystatechange = function(){
		    			if(xhttp.readyState ==4 && xhttp.status ==200){
				            processData(xhttp.responseText);
				        }
		    		};

		    		    xhttp.open("POST", "/profiles/derekdunes.php", true);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send("ques="+messageToBot);
	    	}

	    	function processData(data){
	    		data = JSON.parse(data);
	    		console.log(data);
	    		var answer = data.response;

    			if(Array.isArray(answer)){
    				if(answer.length != 0){
    					var res = Math.floor(Math.random()*answer.length);
    					dispMessage(answer[res][0], "received");
    				}else{
    					dispMessage("Hey Wdup, sorry but i don't understand what you just said<br>To teach me use this format<br>train: question#answer#password","received");
      				}
    			}else{
    				dispMessage(answer,"received");
	    		}
	    	}

	    	function dispMessage(data,position){
	    		console.log(data + ' from dispMessage');

	    		//generate inner chat element
	    		var messageArea = document.querySelector(".message-area");
	    		var div = document.createElement("div");
	    		var par = document.createElement("p");

	    		if (position == 'sent') {	    			
	    			div.classList = position + "-message";
	    		}else if (position == 'received'){
	    			div.classList = position + "-message text-left"
	    		}
	    		
	    		par.classList = "message " + position;
	    		par.innerHTML = data;

	    		//join/append all the element together
	    		div.appendChild(par);
	    		messageArea.appendChild(div);

	    		//add autoscroll function
	    	}
	    	
		</script>