<?php
 require 'db.php';
$username = "mikkybang";
 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sql2 = "SELECT * FROM `secret_word` LIMIT 1";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$query2 = $conn->prepare($sql2);
$query2->execute();
$data = $query2->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once "../../config.php";
    global $conn;
    global $response;
    try{
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=". DB_DATABASE, DB_USER, DB_PASSWORD);
    }catch(PDOException $err){
        die("could not connect to database " . DB_DATABASE . ":" . $err->getMessage());
    }

    $question = $_POST['question'];

    $question = strtolower($question);

    if(preg_match('([?.])', $question)){
        $question = preg_replace('([?.])', "", $question);
    }

    $question = trim($question);
    if($question !== ""){

        if(isTraining($question) === true){
            $response = saveQuestion($conn, $question);
        }elseif(isTraining($question) === false){
            if(isAbout($question)){
                $response = getAbout();
            }
            elseif(isHelp($question) !== false){
                $response = isHelp($question);
            }else{
                $response = getAnswer($conn, $question);
            }

        }
    }else{
        $response =  json_encode([
            'status' => 1,
            'answer' => "You have not input anything in the input field."
        ]);
    }

    echo $response;

}

function isTraining($data){
    if(strpos($data, 'train:') !== false){
        return true;
    }

    return false;
}

function saveQuestion($conn, $data){
    $data_arr = explode('#', $data);
    
    if(count($data_arr) == 3){
        if(trim($data_arr[2]) == 'password'){
            $question_arr = explode(':', $data_arr[0]);
            $question = trim($question_arr[1]);
            $answer = trim($data_arr[1]);

            if(isAnswerExisting($conn, $question, $answer) === false ){
                try{
                    $sql = "INSERT INTO chatbot (question, answer) VALUES ('" . $question . "', '" . $answer . "')";
                    $conn->exec($sql);
                    $answer = "Training Successful!. Thanks for that";
                }catch(PDOException $err){
                    $answer = "Training Failed!. Try Again. type 'help' for more info";
                }
            }else{
                $answer = "Answer provided for the training already existed. You can provide an alternative answer";
            }
        }else{
            $answer = "Password Incorrect, try again";
        }
    }else{
        $answer = "You cannot train me. Include password to train me. For more info type 'help'";
    }

    $status = 1;
    
    return json_encode([
                'status' => $status,
                'answer' => $answer
            ]);
}

function isAnswerExisting($conn, $question, $answer){
    try{
        $sql = "SELECT * FROM chatbot WHERE question = '" . $question . "'" . "AND answer = '" . $answer . "'";
        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $answer_arr = $query->fetchAll();
        if(count($answer_arr) > 0){
            return true;
        }else{
            return false;
        }

    }catch(PDOException $err){
        throw $err;
    }
}


function getAnswer($conn, $question){
    $question = trim($question);
    $answer = "";

    try{
        $sql = "SELECT answer FROM chatbot WHERE question = '" . $question . "'";
        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $answer_arr = $query->fetchAll();
        if(count($answer_arr) > 0){
            $count = count($answer_arr);
            $rand = rand(0, $count - 1);
            $answer = $answer_arr[$rand];
            $answer = $answer['answer'];
        }else{
            $answer = "I do not have the answers to the question you are asking. You can train me to become more intelligent";
            $answer .= "Train me by typing; 'train: your question # your answer # password'";
        }

    }catch(PDOException $err){
        $answer = "Oops, Something went wrong. Try again";
    }
    $status = 1;

    return json_encode([
        'status' => $status,
        'answer' => $answer
    ]);

}

function isHelp($question){
    if($question == 'help'){
        $status = 1;
        $answer = "You can ask me any question. If i am unable to answer, there is an option to train me. ";
        $answer .= "To train me use; 'train: your question # your answer # password'. ";
        $answer .= "Password = 'password'. ";

        return json_encode([
            'status' => $status,
            'answer' => $answer
        ]);
    }

    return false;
}


function isAbout($question){
    if(strpos($question, 'aboutbot') !== false){
        return true;
    }
 
    return false;
 }
 
 function getAbout(){
    $status = 1;
    $answer = "I am mikkybang's bot Version 1.0.0";
    $answer .= " You can ask me any question.";
    $answer .="you can also train me to answer more questions";
    $answer .= "To train me use; 'train: your question # your answer # password";
    $answer .= "My training password is: password";
 
    return json_encode([
                'status' => $status,
                'answer' => $answer
            ]);
 }
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Michael Efemena</title>
    <style type="text/css">

    body {
        color: floralwhite;
        height: 100%;
    }

  img{
      border-radius: 50%;
  }


   .profile{
       background-color: #cd84f1;
   } 

  .chatbot{
      background-color: #4b4b4b;
      background-size: cover;
      height: 100%;
  }

  .botmessage{


  }

  /* start social icon */
.social-icon
	{
		position: relative;
		padding: 0;
		margin: 0;
	}
.social-icon h4
	{
		display: inline-block;
		padding-right: 20px;
	}
.social-icon li
	{
		display: inline-block;
		list-style: none;
	}
.social-icon li a
	{
		border: 1px solid #fff;
		border-radius: 2px;
		color: #fff;
		width: 40px;
		height: 40px;
		line-height: 40px;
		text-align: center;
		text-decoration: none;
		-webkit-transition: all 0.4s ease-in-out;
		        transition: all 0.4s ease-in-out;
		margin-right: 10px;
	}
.social-icon li a:hover
	{
		background: #7efff5;
		border-color: transparent;
	}
/* end social icon */


    </style>

    </head>

    <body>

        <div>
            <!--Profile area-->
        <div class="col-md-7 profile">
       
            <img class="pic" src="http://res.cloudinary.com/mikkybang/image/upload/c_scale,h_387/v1524318803/me.jpg">

         
            <h2>Hi welcome to my page </br></br>
                I am <?php echo $result["name"]; ?> </h2>
        </br>
        <h3>I am a Technology Enthusiast and a Computer Engineering student...</h3>

            <ul class="social-icon">
                    <li><h4>FEEL FREE TO FOLLOW ME ON MY SOCIAL MEDIA HANDLES</h4></li>
                    <li><a href="https://web.facebook.com/michael.efemena" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/Mikky_bang" class="fa fa-twitter"></a></li>
                    <li><a href="http://www.github.com/mikkybang" class="fa fa-github"></a></li>
                    <li><a href="http://www.linkedin.com/in/michael-efemena" class="fa fa-linkedin"></a></li>
                    <li><a href="https://www.youtube.com/channel/UC4yzoGuKkCL_8FzI-B-x83A" class="fa fa-instagram"></a></li>
                </ul>
                </div>
    <!--chat bot area-->
    <div class="col-md-5 chatbot pull-right" style="height: 100%;">
         <div class="">
                   <div class="botmessage">I am mikky's_bot. <br>I am here to help you</div>
                    <div class="botmessage">Ask me any question</div>
                   <div class="botmessage">To find out more about me type <strong>aboutbot</strong></div>
                    <div class="botmessage">For help on how to use me type <br><strong>help</strong></div>
         </div>

            <form class="" method="POST" action="mikkybang.php">
                            <div class="">
                              <input id="txt_question" class="" type="text" name="chatbotmessage" placeholder="Type in your requests">
                            </div>
                            <div class="">
                              <input type="submit" class="btn btn-large btn-primary" type="button" value="Send">
                            </div>
             </form>

    </div>

</div>
    </body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<script type="text/javascript">
      $(document).ready(function(){
            $('form').on('submit', function(e){
             e.preventDefault();
             $.ajax({
                    url: "./profiles/mikkybang.php",
                    type: 'POST',
                    dataType: 'json',
                    data: {question: question},
                    success: function(data){
                        console.log(data);
                        if(data['status'] == 1){
                            var message_con = document.querySelector('.messages');
                            var bot = document.createElement('div');
                            bot.className = 'bot';
                            bot_text = document.createTextNode('Bot:');
                            bot.appendChild(bot_text);

                            var bot_msg = document.createElement('div');
                            bot_msg.className = 'bot-msg';
                            bot_msg_text = document.createTextNode(data['answer']);
                            bot_msg.appendChild(bot_msg_text);

                            message_con.appendChild(bot);
                            message_con.appendChild(bot_msg);
                            $('.messages').scrollTop($('.messages')[0].scrollHeight);
                        }

                    }
                });
            });
            
            });
    </script>

   </html>