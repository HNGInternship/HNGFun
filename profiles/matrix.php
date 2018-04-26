<!DOCTYPE html>
<html>
<head>
	<title>Matrix</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.card {
		    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		    max-width: 300px;
		    margin: auto;
		    text-align: center;
		}

		.title {
		    color: grey;
		    font-size: 18px;
		}

		button {
		    border: none;
		    outline: 0;
		    display: inline-block;
		    padding: 8px;
		    color: white;
		    background-color: #000;
		    text-align: center;
		    cursor: pointer;
		    width: 100%;
		    font-size: 18px;
		}

		a {
		    text-decoration: none;
		    font-size: 22px;
		    color: black;
		}

		button:hover, a:hover {
		    opacity: 0.7;
		}
		.list{
			list-style: none;
			display: inline-flex;
			margin-left: 40px;
		}
		.list li{
			padding-left: 10px;
		}
		.chat
		{
		    list-style: none;
		    margin: 0;
		    padding: 0;
		}

		.chat li
		{
		    margin-bottom: 10px;
		    padding-bottom: 5px;
		    border-bottom: 1px dotted #B3A9A9;
		}

		.chat li.left .chat-body
		{
		    margin-left: 60px;
		}

		.chat li.right .chat-body
		{
		    margin-right: 60px;
		}


		.chat li .chat-body p
		{
		    margin: 0;
		    color: #777777;
		}

		.panel .slidedown .glyphicon, .chat .glyphicon
		{
		    margin-right: 5px;
		}

		.panel-body
		{
		    overflow-y: scroll;
		    height: 450px;
		}

		::-webkit-scrollbar-track
		{
		    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		    background-color: #F5F5F5;
		}

		::-webkit-scrollbar
		{
		    width: 12px;
		    background-color: #F5F5F5;
		}

		::-webkit-scrollbar-thumb
		{
		    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
		    background-color: #555;
		}

	</style>
</head>
<body>

	<?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        $secret_word = $data['secret_word'];
    } catch (PDOException $e) {

        throw $e;
    }?>
    <div class="col-sm-6">
		<div class="card">
		  <img src="https://res.cloudinary.com/sirmatrix/image/upload/v1523739407/sm.jpg" alt="John" style="width:100%">
		  <h1>Sanusi Mubaraq</h1>
		  <p class="title">Web developer</p>
		  <p>Nigeria</p>
		  <ul class="list">
			  <li><a href="https://github.com/LPMatrix"><i class="fa fa-github"></i></a> </li>
			  <li><a href="https://twitter.com/_sirmatrix_"><i class="fa fa-twitter"></i></a></li> 
			  <li><a href="https://www.linkedin.com/in/matrix2552/"><i class="fa fa-linkedin"></i></a></li> 
			  <li><a href="#"><i class="fa fa-facebook"></i></a></li> 
		  </ul>
		  <p><button>Contact</button></p>
		</div>
	</div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                </div>
            <div class="panel-collapse">
                <div class="panel-body">
                    <ul class="chat">
                    	<li class="left clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/55C1E7/fff&text=BOT" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <p style="text-align: right; line-height:; margin-right: 55px;">
                                   Hello, you are welcome, how may I help you?<br/>
                                   send <strong>time</strong> to check time<br/>
                                   send <strong>fact</strong> to get random fact
                                </p>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="panel-footer">
	                    <div class="input-group">
	                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Hi there! Type here to talk to me." name="message" />
	                        <span class="input-group-btn">
	                            <button class="btn btn-warning btn-sm" id="btn-chat" type="submit" name="send">Send</button>
	                        </span>
	                    </div>
                </div>
            </div>
            </div>
        </div>
<script type="text/javascript">

  var synth = window.speechSynthesis;

  var lastUserMessage = "" //keeps track of the most recent input string from the user
  var botMessage = "" // keeps track of what the chatbot is going to say


//this runs each time enter is pressed.
//It controls the overall input and output
function newEntry(data) {
  //if the message from the user isn't empty then run 
  if (document.getElementById("btn-input").value != "") {
    //pulls the value from the chatbox ands sets it to lastUserMessage
    lastUserMessage = document.getElementById("btn-input").value;
    //sets the chat box to be clear
    document.getElementById("btn-input").value = "";

    var chat = `<li class="right clearfix"><span class="chat-img pull-left">
                <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
            </span>
                <div class="chat-body clearfix">
                    <p style="text-align: left; line-height: 4; margin-left: 55px;">
                        ${ lastUserMessage }
                    </p>
                </div></li>`
    var chatter = `<li class="left clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/55C1E7/fff&text=BOT" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <p style="text-align: right; line-height: ; margin-right: 55px;">
                                   ${ data }
                                </p>
                            </div>
                        </li>`

    $('.chat').append(chat);
    $('.chat').append(chatter);
    var utterance = new SpeechSynthesisUtterance(data);
    synth.speak(utterance);

  }
}


$( document ).ready(function() {
    $( "#btn-chat" ).click(function() {
    	var message = $("#btn-input").val();
        $.ajax({
            data: {message: message, action: 'send'},
            type: 'post',
            success: function(result) {
                newEntry(result)
                //alert(result)
            }
        });
    });
});

</script>

</body>
</html>

<?php 

  $facts = array(
  		'The first computer programmer was a female, named Ada Lovelace.',
  		'The first game was created in 1961. Fun facts are that it didn’t earn any money.',
  		'The first virus was created in 1983.',
  		'The first computer was actually a loom called the Jacquard loom, an automated, mechanical loom, which didn’t use any electricity.',
  		'The first high-level (very close to real English that we use to communicate) programming language was FORTRAN. invented in 1954 by IBM’s John Backus.',
  		'Computer programming is one of the fastest growing occupations currently',
  		'Programmers will start the count from zero, not one.',
  		'Programmer says ‘=’ != ‘==’',
  		'Ctrl + C and Ctrl + V have saved more lives than Batman and Robin.',
  		'Programmers love to code day and night.'
  );
  $greet = array('hi', 'hello', 'howdy');

	if (isset($_POST['action'])) {
		echo $message = $_POST['message'];
		$botName = 'Matrix';
		$time = date("h:ia");

		$train = explode(" ", $message);

			if ($train[0] == "train:") {
			list($split, $combined) = explode(':', $message);
			$combined = trim($combined);
			$seperate = explode('#', $combined);
			$question = $seperate[0];
			$answer = $seperate[1];

			$sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
			$conn->exec($sql);

			echo json_encode('Cool, I have learnt something new');
			return;
		}

			if ($message == 'fact') {
				echo json_encode($facts[array_rand($facts)]);
				exit();
			}elseif ($message == 'time') {
				echo json_encode('The time is '.$time);
				exit();
			}elseif($message == 'what is your name'){
				echo json_encode('My name is '.$botName);
				exit();
			}elseif ($message == 'hi') {
				echo json_encode($greet[array_rand($greet)]);
				exit();
			}else{
				$str = "'%".$message."%'";

				$sql1 = "SELECT COUNT(*) FROM chatbot WHERE question LIKE " . $str;
				$res = $conn->query($sql1);
				if ($res->fetchColumn() > 0) {
					$sql = "SELECT answer FROM chatbot WHERE question LIKE " . $str . " LIMIT 1";
				if ($qans = $conn->query($sql)) {
					$ans = $qans->fetch();
					echo json_encode($ans['answer']);
					exit();
				}
				}else{
					echo json_encode("I don't understand that command yet. You could train me to understand this using this format <strong>train: question # answer</strong>!");
					exit();
				}
				
			}
	}

 ?>