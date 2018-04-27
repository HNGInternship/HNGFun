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
            }elseif(isCalculation($question) !== false){
                $response = calculate($question);
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
                    $answer = "Training Successful! I am now more intelligent now. Thanks for that";
                }catch(PDOException $err){
                    $answer = "Ooops Training Failed! Something went wrong. Try Again. type '--help' for more info";
                }
            }else{
                $answer = "Answer provided for the training already existed. You can provide an alternative answer";
            }
        }else{
            $answer = "Password Incorrect, try again";
        }
    }else{
        $answer = "You do not have permission to train me. Include password to train. For more info type '--help'";
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
            $answer = "I don't understand what you are asking. You can train me to become more intelligent";
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

function isCalculation($question){

    if(strpos($question, 'sum:') !== false || strpos($question, 'sum(') !== false){
        return true;
    }elseif(strpos($question, 'subtract:') !== false || strpos($question, 'subtract(') !== false){
        return true;
    }elseif(strpos($question, 'multiply:') !== false || strpos($question, 'multiply(') !== false){
        return true;
    }elseif(strpos($question, 'divide:') !== false || strpos($question, 'divide(') !== false){
        return true;
    }

    return false;
}

function calculate($question){
    $func = getCalcFunction($question);
    $num_arr = getNumbersArray($func, $question);
    $total = 0;
    switch($func){
        case 'sum':
            for($i = 0; $i < count($num_arr); $i++){
                $total += $num_arr[$i];
            }
            break;
        case 'subtract':
            for($i = 0; $i < count($num_arr); $i++){
                if($i == 0){
                    $total = $num_arr[0];
                }else{
                    $total -= $num_arr[$i];
                }
                
            }
            break;
        case 'multiply':
            for($i = 0; $i < count($num_arr); $i++){
                if($i == 0){
                    $total = $num_arr[0];
                }else{
                    $total *= $num_arr[$i];
                }
                
            }
            break;
        case 'divide':
            for($i = 0; $i < count($num_arr); $i++){
                if($i == 0){
                    $total = $num_arr[0];
                }else{
                    $total /= $num_arr[$i];
                }
                
            }
            break;
             
    }

    $status = 1;

    return json_encode([
                'status' => $status,
                'answer' => 'The result is ' . $total
            ]);
}

function getCalcFunction($question){
    if(strpos($question, 'sum:') !== false || strpos($question, 'sum(') !== false){
        $func = 'sum';
    }elseif(strpos($question, 'subtract:') !== false || strpos($question, 'subtract(') !== false){
        $func = 'subtract';
    }elseif(strpos($question, 'multiply:') !== false || strpos($question, 'multiply(') !== false){
        $func = 'multiply';
    }elseif(strpos($question, 'divide:') !== false || strpos($question, 'divide(') !== false){
        $func = 'divide';
    }

    return $func;

}


function getNumbersArray($func, $question){
    $num_arr = [];
    if(strpos($question, $func . ':') !== false){
        $question_arr = explode(':', $question);
        $num_arr = explode(',', $question_arr[1]);
    }elseif(strpos($question, $func . '(') !== false){
        $question_arr = explode('(', $question);
        $num_arr_init = trim($question_arr[1], ')');
        $num_arr = explode(',', $num_arr_init);
    }

    return $num_arr;
}

function isAbout($question){
    if($question == 'aboutbot'){
        return true;
    }

    return false;
}

function getAbout(){
    $status = 1;
    $answer = "I am geniusBot. Version 1.0";

    return json_encode([
                'status' => $status,
                'answer' => $answer
            ]);
}

function isHelp($question){
    if($question == '--help'){
        $status = 1;
        $answer = "You can ask me any question. If i am unable to respond, there is an option to train me. ";
        $answer .= "To train me use; 'train: your question # your answer # password'. ";
        $answer .= "Password = 'password'. ";
        $answer .= "Also, I can do basic arithmetic such as addition, subtraction, multiplication and division. ";
        $answer .= "For Addition use; 'sum: 1,2,3,..'  or  'sum(1,2,3,..)'. ";
        $answer .= "For Subtraction use; 'subtract: 1,2,3,..'  or  'subtract(1,2,3,..)'. ";
        $answer .= "For Multiplication use; 'multiply: 1,2,3,..'  or  'multiply(1,2,3,..)'. ";
        $answer .= "For Division use; 'divide: 1,2,3,..'  or  'divide(1,2,3,..)'.";

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
        $sql = "SELECT * FROM interns_data WHERE username = 'fantastic_genius'";
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
    <meta charset="utf-8" />
    <title>Fantastic Genius Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    

    <style>
        .main{
            background: url("https://res.cloudinary.com/dbd5poy8d/image/upload/v1524087688/layout-bg.jpg") ;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 600px;
        }

        .overlay{
            background: rgb(51, 51, 51, 0.59) ;
            background-size: cover;
            min-height: 600px;

        }

        .item-right{
            margin: 100px 0 20px 0;
            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
            font-weight: normal;
            line-height: normal;
            border-radius: 10px;
            background: #56CCF2;
            padding: 20px 20px 10px 20px;
        }

        .item-right h3{
            font-size: 24px;
            color: #000080;
        }

        .item-right small{
            font-size: 16px;
            color: 	#0000CD;
        }

        .item-content p:first-child{
            color: #CC0000;
            font-size: 18px;
        }

        .item-content p:last-child{
            font-size: 24px;    
            color: #9F0D0D;
            background: #56CCF2;
            line-height: 38px;
            vertical-align: center;    
        }

        .item-content p:last-child span{
            font-size: 36px;   
            color: #2A32F4;
            line-height: 38px;
        }

        .circle{
            margin-top: 100px;
            width: 400px;
            height: 400px;
            border-radius: 200px;
            margin-left: 100px;
        }

        @media only screen and (min-width: 991px) and (max-width: 1052px){
            .circle{
                margin-top: 100px;
                width: 350px;
                height: 350px;
                border-radius: 175px;
                margin-left: 0px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px){
            .circle{
                margin-top: 100px;                
                width: 300px;
                height: 300px;
                border-radius: 150px;
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 768px){
            .circle{
                width: 350px;
                height: 350px;
                border-radius: 175px;
                margin-left: 20px;
            }
        }
        
        .skills-title{
            color: 	#000080;
            font-size: 20px;            
        }

        ul.skills-item{
            list-style: none;
            padding-left: 0;
        }

        .skills-item li{
            color: 	#990000;
        }

        .skills-item li .fa{
            margin-right: 10px;
        }

        .social-link{
            list-style: none;
            padding-left: 0;
        }

        .social-link li{
            display: inline;
            color: #2A32F4;
            padding: 0 5px;
        }
        .social-link li .fa{
            color: #2A32F4;
            font-size: 20px;
        }

        @media only screen and (min-width: 48em) {
            .pull-right-sm {
              float: right;
            }
        }

        .chatbot{
            position: fixed;
            bottom: 0;
            right: 20px;
            z-index: 99;
            width: 350px;
            background: #ffffff;            
            border: 1px solid #000080;
            border-radius: 10px 10px 0 0;            
        }
        .chatbot-head{
            background: #56CCF2;
            color: #000080;
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
            border: 1px solid #000080;
        }

        .scrollbar-blue::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5; 
        }

        .scrollbar-blue::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #000080; 
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
            background: #56CCF2;
            font-size: 12px;
            margin: 10px 10px 0 100px;
            border-radius: 10px;
            padding: 10px;
        }

        #send{
            border: none;
            background: #000080;
            padding: 3px 10px;
            border-radius: 30px;
        }

        #send .fa-play{
            color: #56CCF2;
        }


    
    </style>
    
</head>
<body>
    <div class="main">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div>
                            <img class="circle" src="https://res.cloudinary.com/dbd5poy8d/image/upload/v1524087716/profile_pic.jpg">
                        </div>                    
                    </div>  
                    <div class="col-md-6">
                        <div class="item-right order-md-1">
                            <h3>I am Abdulfattah Hamzah Atanda</h3>
                            <small>@fantastic_genius</small>
                            <div class="item-content">
                                <p>I am a Software Developer.I do frontend and backend development with upto one year 
                                experience in web application development. I am a creative thinker and problem solver with a can do attitude. </p>
                                <div>
                                <h5 class="skills-title">Skills</h5>
                                    <ul class="skills-item">
                                        <li><i class="fa fa-check"></i>HTML5</li>
                                        <li><i class="fa fa-check"></i>CSS</li>
                                        <li><i class="fa fa-check"></i>PHP</li>
                                        <li><i class="fa fa-check"></i>Javascript</li>
                                        <li><i class="fa fa-check"></i>Laravel</li>
                                        <li><i class="fa fa-check"></i>Codeigniter</li>
                                        <li><i class="fa fa-check"></i>Bootstrap</li>
                                        <li><i class="fa fa-check"></i>Wordpress</li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="social-link">
                                        <li><a href="https://github.com/fantastic-genius"><i class="fa fa-github"></i></a></li>
                                        <li><a href="https://www.facebook.com/hamzah.atanda"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="www.linkedin.com/in/hamzah-abdulfattah-81419694"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://twitter.com/Fantastigenius"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>                            
                        </div>
                    </div>
                                      
                </div>
                <div class="chatbot pull-right">
                    <div class="chatbot-head">
                        <h3>geniusBot <i class="fa fa-chevron-up pull-right"></i></h3>
                    </div>
                    <div class="chat-message">
                        <div class="messages scrollbar-blue"></div>
                        
                            <input type="text" class="user-input" name="user-input">
                            <button type="submit" id="send"><i class="fa fa-play"></i></button>
                        
                    </div>
                </div>                
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
                    botVersion += '<div class="bot-msg">I am geniusBot. <br>I am here to help you</div>';
                    botVersion += '<div class="bot-msg">Ask me any question</div>';
                    botVersion += '<div class="bot-msg">To find out more about me type <strong>aboutbot</strong></div>';
                    botVersion += '<div class="bot-msg">For help on how to use me type <br><strong>--help</strong></div>';
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
                    url: "./profiles/fantastic_genius.php",
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