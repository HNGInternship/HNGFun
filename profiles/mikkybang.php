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
            }elseif(isHelp($question) !== false){
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
                    $answer = "Training Failed! Something went wrong. Try Again. type 'help' for more info";
                }
            }else{
                $answer = "Answer provided for the training already existed. You can provide an alternative answer";
            }
        }else{
            $answer = "Password Incorrect, try again";
        }
    }else{
        $answer = "You cannot train me. Include password to train. For more info type '--help'";
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
            $answer = "I don't have the answers to what you are asking. You can train me to become better";
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



function isAbout($question){
    if($question == 'about'){
        return true;
    }

    return false;
}

function getAbout(){
    $status = 1;
    $answer = "I am mikkyBot. Version 1.0.0";

    return json_encode([
                'status' => $status,
                'answer' => $answer
            ]);
}

function isHelp($question){
    if($question == 'help'){
        $status = 1;
        $answer = "You can ask me any question. If i am unable to respond, there is an option to train me. ";
        $answer .= "To train me use; 'train: your question # your answer # password'. ";
        $answer .= "Password = 'password'. ";

        return json_encode([
            'status' => $status,
            'answer' => $answer
        ]);
    }

    return false;
}


if($_SERVER['REQUEST_METHOD'] === 'GET'){
    try{
        $sql = "SELECT * FROM secret_word LIMIT 1" ;
        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        $secret_word = $data['secret_word'];

    }catch(PDOException $err){
        throw $err;
    }

    try{
        $sql = "SELECT * FROM interns_data WHERE username = 'mikkybang'";
        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        $name = $data['name'];
        $image_url = $data['image_filename'];
    

    }catch(PDOException $err){
        throw $err;
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
        height: ;
        padding-top: 10px;
    }

  img{
      border-radius: 50%;
  }


   .profile{
       background-color: #cd84f1;
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
/*chat bot*/

 .chatbot{
            position: fixed;
            bottom: 0;
            right: 20px;
            z-index: 99;
            width: 350px;
            background: #84817a; 
            color: black;           
            border: 1px solid #f7f1e3;
            border-radius: 10px 10px 0 0;            
        }
        .chatbot-head{
            background: #34ace0;
            color: black;
            padding: 20px 30px;
            border-radius: 10px 10px 0 0;
            cursor: pointer;
        }
        .chat-message{
            background: #ffffff;
            display: none;
        }
        .messages{
            height: 200px;
            overflow-y: scroll;
        }
        .scrollbar-blue::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px; 
            border: 1px solid #706fd3;
        }

        .scrollbar-blue::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5; 
        }

        .scrollbar-blue::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #706fd3; 
        }

        .user-input{
            width: 250px;
            margin: 10px 0 10px 20px;
            padding: 5px;
            border: 1px solid #C0C0C0;
            border-radius: 5px;
        }

        .bot-msg{
            background: #56CCF2;
            font-size: 12px;
            margin: 10px 100px 0 10px;
            border-radius: 10px;
            padding: 10px;
        }

        .bot{
            background: #ffffff;
            font-size: 16px;
            margin: 10px 100px -10px 10px;
            padding: 0;
        }

        .user{
            background: #ffffff;
            font-size: 16px;
            margin: 10px 10px -10px 100px;
            padding: 0;
        }

        .user-msg{
            background: #34ace0;
            font-size: 12px;
            margin: 10px 10px 0 100px;
            border-radius: 10px;
            padding: 10px;
        }

        #send{
            border: none;
            background: #34ace0;
            padding: 3px 10px;
            border-radius: 30px;
        }

        #send .fa-play{
            color:#aaa69d;
        }


/*end chat bot*/

    </style>

    </head>

    <body>

        <div>
            <!--Profile area-->
        <div class="col-md-7 profile">
       
            <img class="pic" src="http://res.cloudinary.com/mikkybang/image/upload/c_scale,h_387/v1524318803/me.jpg">

         
            <h2>Hi welcome to my page </br></br>
                I am <?php echo $data["name"]; ?> </h2>
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
    <div class="chatbot pull-right">
                    <div class="chatbot-head">
                        <h3>mikkyBot <i class="fa fa-chevron-up pull-right"></i></h3>
                    </div>
                    <div class="chat-message">
                        <div class="messages scrollbar-blue"></div>
                        
                            <input type="text" class="user-input" name="user-input">
                            <button type="submit" id="send"><i class="fa fa-play"></i></button>
                        
                    </div>
                </div>            

</div>
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<script type="text/javascript">
        $(function(){
            $('.chatbot-head').click(function(){
                $('.chat-message').toggle('slow', function(){
                    var botVersion = '<div class="bot">Bot:</div>';
                    botVersion += '<div class="bot-msg">I am mikkyBot. <br>I am here to help you</div>';
                    botVersion += '<div class="bot-msg">Ask me anything</div>';
                    botVersion += '<div class="bot-msg">To find out more about me type <strong>about</strong></div>';
                    botVersion += '<div class="bot-msg">For help on how to use me type <br><strong>help</strong></div>';
                    $('.messages').html(botVersion);
                                    
                });

                $('.chatbot-head i').toggleClass('fa-chevron-down');
            });
            
            $('.user-input').keypress(function(event){
                
                if(event.which == 13){
                    $('#send').click();
                    event.preventDefault();
                }
            });

            $('#send').on('click', function(){
                var question = $('.user-input').val();

                var message_con = document.querySelector('.messages');

                var user = document.createElement('div');
                user.className = 'user';
                user_text = document.createTextNode('Me:');
                user.appendChild(user_text);

                var user_msg = document.createElement('div');
                user_msg.className = 'user-msg';
                user_msg_text = document.createTextNode(question);
                user_msg.appendChild(user_msg_text);

                message_con.appendChild(user);
                message_con.appendChild(user_msg);

                $('.user-input').val("");

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

                    },
                    error: function(req, status, err){
                        console.log('something went wrong now', status, err );
                        console.warn(req.responseText);
                    }
                });
            });
        });
    </script>
    </body>
   </html>
<?php
}
?>