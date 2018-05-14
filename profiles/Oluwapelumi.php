<?php

if (!defined('DB_USER')) {
    include_once("../answers.php");
    require '../../config.php';
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
}


$sql = "Select * from secret_word LIMIT 1";
$result = $conn->query($sql);
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'Oluwapelumi'");
$user = $result2->fetch(PDO::FETCH_OBJ);


function chatWithMe($question, $conn){
    $question = sanitize_input($question);
    $fetchAnswerToQuestion = "SELECT * FROM chatbot WHERE question =:question";
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
        if($conn) {
            $query = $conn->prepare($fetchAnswerToQuestion);
            $query->bindParam(":question",$question);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $query->fetchAll();
            if(count($rows)>0){
                $index = rand(0, count($rows)-1); //choose random answer
                $row = $rows[$index];
                $answer = $row['answer'];
                echo json_encode([
                    'status' => 1,
                    'response' => $answer,
                ]);
                return;
            }

            echo json_encode([
                'status' => 1,
                'response' => "Sorry, I don't know this question but you can teach me: <br> Train pattern <br>train: question #answer #password"
            ]);
            return;
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
    return;
}

function sanitize_input($user_input) {
    $user_input = trim($user_input);
    $user_input = preg_replace("([?.!])", "", $user_input);
    $user_input = preg_replace("(['])", "\'", $user_input);
    return $user_input;
}

function trainMeBoss($queAndAns, $conn)
{
    $queAndAns = substr($queAndAns, 6); //cut out train word
    $queAndAns = sanitize_input($queAndAns);
    $queAndAns = explode("#", $queAndAns);

    if ((count($queAndAns) >= 2)) {
        $question = sanitize_input($queAndAns[0]);
        $answer = sanitize_input($queAndAns[1]);
        $password = sanitize_input($queAndAns[2]);
    }

    if (!(isset($password)) || $password !== 'password') {
        echo json_encode([
            'status' => 1,
            'response' => "Sorry, you entered and incorrect password. You mind trying again?"
        ]);
        return;
    }

    if (isset($question) && isset($answer)) {
        //input validation
        if ($question == "" || $answer == "") {
            echo json_encode([
                'status' => 1,
                'response' => "Please check, you seem to have no question or answer defined"
            ]);
            return;
        }

        $doIKnowThisQuery = "SELECT * FROM chatbot WHERE question LIKE '$question'";

        try {
            if ($conn) {
                if ($conn->query($doIKnowThisQuery)->fetch(PDO::FETCH_OBJ)) {
                    if ($conn->query($doIKnowThisQuery)->fetch(PDO::FETCH_OBJ)->answer === $answer) {
                        echo json_encode([
                            'status' => 1,
                            'response' => "I know this already."
                        ]);
                    }
                    return;
                };

                $trainQuery = "INSERT INTO `chatbot` (`question`, `answer`) VALUES  ('$question', '$answer')";

                if ($conn->query($trainQuery)->execute() === true) {
                    echo json_encode([
                        'status' => 1,
                        'response' => "I'm getting better, all thanks to you"
                    ]);
                    return;
                }
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    } else {
        echo json_encode([
            'status' => 0,
            'response' => "Sorry, you didn't follow my train pattern.<br> You might wanna check this<br>train: question #answer #password"
        ]);
    }
    return;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $question = sanitize_input($_POST['question']);

    if ($question == 'aboutbot') {
       echo json_encode([
               'status' => 0,
           'response' => "JuiceBot Version 0.1.0. <br> I'm still in the development process so you might want to check continuatlly to see my newly added features. <br>Nice to meet you though"
       ]);
       return;
    }

    if ($question == 'where am i') {
        $query = getLocationAPI();
        if($query && $query['status'] == 'success') {
            echo json_encode([
                    'status' => 1,
                'response' => 'You\'re currently in '.$query ['country'].', '.$query['regionName'].', '.$query['city'].'.'
            ]);
            return;
        } else {
            echo json_encode([
                    'status' => 0,
                'response' => 'Unable to get location: '. $query['message']
            ]);
            return;
        }
    }

    if (stripos($question, "town") !== false) {

        $town = substr($question, 6);

        $data = getWhetherWithAPI($town);
        var_dump($data);
    }

    if ($question == 'help') {
        echo json_encode([
            'status' => 0,
            'response' => "Here are my default features that will be useful to you <br>
 help: shows you how to use this bot efficiently<br>
  aboutbot: know more about me.<br>
  train: question #answer #password {to train me}<br>
  You can also type in your question and I'll give you the answer if I know it"
        ]);
        return;
    }

    if (strpos($question, "train") !== false) {
        trainMeBoss($question, $conn);
        return;
    }

    if (!strpos($question, "train"))
        chatWithMe($question, $conn);
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Oluwapelumi Olaoye</title>
    <meta name="theme-color" content="#2f3061">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <style type="text/css">
        body {
            /* background-color: firebrick; */
            font-family: 'Fruktur';
        }

        #whole-background {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        #profile {
            color: #6e4480;
            align-content: center;
            font-family: 'Fruktur';
        }

        .main{
            padding: 15px;
            border-radius: 15px;
            margin:30px;
            width: 450px;
            height: 100%;
            top: 1%;
            bottom: 1%;
            right: 62%;
            text-align: center;
            font-size: 1rem;
            background-color: white;
            position: absolute;
            border: 2px solid #6e4480;

        }

        .chat-space {
            border: 1px solid rgba(0, 0, 0, 0.15);
            width: 60%;
            margin-left: 485px;
            border-radius: 10px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2);
        }

        .chat-space-header {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px 10px 0;
        }

        .chat-box {
            min-height: 500px;
            position: relative;
            padding-bottom: 40px;
        }

        .messages-area {
            max-height: 220px;
            overflow: auto;
            padding: 10px;
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
            padding: 20px 20px;
            border-radius: 30px;
            line-height: 14px;
            font-size: 12px;
            font-weight: 600;
        }

        .received {
            background: #6e4480;
            color: white;
            text-align: left;
        }

        .sent {
            background: #6e4480;
            color: white;
            text-align: right;
        }

        .message-input-area {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            background: #E0E0E0;
            align-items: center;
            height: 40px;
        }

        #user-message{
            text-align: right;
            color: #6e4480;
        }
        #bot-message{
            text-align: left;
            color: #6e4480;
        }

        .message-input {
            color: rgba(4, 6, 6, 0.51);
            width: 100%;
            border: none;
            box-shadow: none;
            background: transparent;
            height: 100%;
            padding: 0 10px;
        }

        .message-input:focus {
            border: none;
            box-shadow: none;
            outline: none;
            outline-offset: 0;
        }

        .message-submit {
            border: #1b1e21;
            margin: 8px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div id="whole-background">
    <div class="main" id="profile">
        <div class="text-center">
            <img class="img-circle img-responsive" src="<?php echo $user->image_filename ?>
            " alt="" style="width: 70px height: 70px" />
            <h4>Hey there, nice to meet you, I'm <?php echo $user->name ?> and my username is <small><a href="https://hnginternship4.slack.com/messages/DA31NNEN7/">(@<?php echo $user->username ?>)</a></small></h4>
            <h5>I do both backend and mobile engineering. You can follow me on twitter <a href="https://twitter.com/pelumiiiiiii">@pelumiiiiiii</a></h5>
        </div>
    </div>

    <!--    Bot     -->
    <div class="chat-space">
        <div class="chat-space-header">
            <h5 class="text-left user-name"><b>JuiceBot</b></h5>
        </div>
        <hr style="margin: 10px 0">
        <div class="chat-box">
            <div class="messages-area">
                <!--Inputed messages-->
                <div class="sent-message text-left" id="sent-mes">
                    <p class="message sent">
                        Hello!
                    </p>
                </div>
                <!--Response message-->
                <div class=" received-message text-left">
                    <p class="message received">Hey there, nice to meet you <br>
                        I'm juice bot, I'm supposed to be serving you juice, <br>
                        but for a start, you can ask me random questions <br>
                        and I'll tell you if I know the answers to them <br>
                        If I don't, you don't need to panic, all you need to do is train me<br>
                        with this pattern <span>{train: question #answer #password}</span>
                    </p>
                </div>
            </div>

            <div id="whole-chat">
                <div id="chat-body-interface">
                </div>
            </div>

            <!--Input content area...-->
            <form method="post" id="interface" action="#">
                <div class="message-input-area">
                    <input type="text" class="message-input" name="question" id="message"
                           placeholder="Input your message and hit enter or click to submit your input">
                    <button class="btn" id="submit-button" name="button" type="submit">
                        <i class="fa fa-send-o message-submit"   value="send"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</div>
<script type="text/javascript">

	$(document).ready(function () {

		let formBody = $("#interface");
		formBody.on('submit', function (event) {
			event.preventDefault();
			let message = $('#message');
			let user_question = message.val();

			let displayFrame = $('#chat-body-interface');
			let displayChat = '<div class="message sent-message" id="user-message">'+
				'<div class="col-md-6">'+
				'<p class="message sent">'+user_question+'</p>'+
				'</div>'+
				'</div>';

			displayFrame.html(displayFrame.html()+displayChat);

			//Process your question with ajax.
			$.ajax({
				url: "profiles/Oluwapelumi.php",
				type: "POST",
				data: {question: user_question},
				dataType: "json",
				success: function(data){
					if(data.status == 1){
						var display = '<div class="message received-message" id="bot-message">'+
							'<div class="col-md-6">'+
							'<p class="message received">'+data.response+'</p>'+
							'</div>'+
							'</div>';
						displayFrame.html(displayFrame.html()+display);
						message.val("");
					}else if(data.status == 0){
                            var display = '<div class="message" id="bot-message">'+
							'<div class="col-md-6">'+
							'<p class="message received">'+data.response+'</p>'+
							'</div>'+
							'</div>';
						displayFrame.html(displayFrame.html()+display);

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