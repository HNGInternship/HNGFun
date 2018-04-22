<?php
date_default_timezone_set('Africa/Lagos');

if (!defined('DB_USER')){
    
    require "../../config.php";
}
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }

   global $conn;

try {
    $sql = 'SELECT * FROM secret_word LIMIT 1';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}    
try {
    $sql = "SELECT * FROM interns_data WHERE `username` = 'Dernan' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}  
   if ($_SERVER['REQUEST_METHOD']==='POST'){

        $message = trim($_POST['message']);
        if ($message === ''){
             $empty_response = [
                 'You have not asked anything',
                 'Stop that I am allergic to white space',
                 'Ohh, stop that kind of play',
                 'you asked me nothing, are you expecting anything',
                 'can something come out of nothing, please be serious',
                 'whitespace! please be serious',
             ];
            echo json_encode(['status'=>0,'data'=> $empty_response[rand(0, (count($empty_response)-1))]]);
            return;
        }
       if (strpos($message, 'train:') !== false){
            $password = 'password';
            $first_test = explode(':', $message);
            $q_s_p = $first_test[1];
            $second_test = explode('#', $q_s_p);
            $question = trim($second_test[0]);
            $question = trim($question, "?");
            $answer = trim($second_test[1]);
            $pass = trim($second_test[2]);

            if ($pass === $password){

                $sql = 'insert into chatbot( question, answer) values(:question, :answer)';

                $query = $conn->prepare($sql);
                $query->bindParam(':question', $question);
                $query->bindParam(':answer', $answer);
                $store = $query->execute();
                if( $store){

                    echo json_encode(['status'=>1, 'data'=>'Thanks for teaching me']);
                }
                else{
                    echo json_encode(['status'=>0, 'data'=>'Aw, I\'m sometimes slow, I beg your pardon']);
                }
            }
            else{
                echo json_encode(['status'=>0, 'data'=>'You\'re not authorized to teach me']);
            }

       }
       else{
           //do get answer if it's not training
           $sql = "select * from chatbot where question like :question";
           $query = $conn->prepare($sql);
           $query->bindParam(':question', $message);
           $query->execute();
           $query->setFetchMode(PDO::FETCH_ASSOC);
           $result = $query->fetchAll();
           if ($result){
               $index = rand(0, count($result)-1);
               $response = $result[$index]['answer'];
               echo json_encode(['status'=>1, 'data'=>$response]);
           }
           else{
               echo json_encode(['status'=>0, 'data'=>'sorry I\'ve not been taught about this one']);
           }
       }
   }
   else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dernan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html{
            font-family: sans-serif;
            line-height: 2;
        }
        
        a{
            color: #fff;
            text-decoration: none;
            opacity: .8;
        }
        a:hover{
            opacity: 1;
        }
        a.btn{
            border-radius: 4px;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            background-color: #3f51b5;
            opacity: 1;
        }
        
        h3{
            font-size: 20px;
            font-family: sans-serif;
            color: #cccccc;
        }
        #connect{
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            list-style: none;
            justify-content: center;
        }

        a{
            margin: 0 15px;
        }
        
        .landing{
            position: relative;
            justify-content: center;
            text-align: center;
            min-height: 100%;
        }
        
        body{
            background-color: #333333;
            /*background-image: url(http://res.cloudinary.com/ddjpblpib/image/upload/v1523629224/1.jpg);*/
            /*background-size: cover;*/
        }

        .landing h1{
            font: bold 30px "Open Sans";
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #cccccc;
        }
        .landing h1 span{
            font-size: 23px;
            color: #ffffff;
        }
        
        .landing p{
            color: white;
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
        }
        
        .landing_content_area{
            opacity: 0;
            margin-top: 108px;
            animation: 1s slidefade 1s forwards;
        }
        
        @keyframes slidefade{
            100%{
                opacity: 1;
                margin: 0;
            }
        }

        .card{
            max-height: 500px;
        }

        .panel-heading{
            background-color: #cccccc;
            color: #333333;
            text-align: center;
        }
        .frame{
            background:#ffffff;
            background-size: contain;
            height:350px;
            overflow: hidden;
            padding:0;
            color: #333;
        }
        .frame > div:last-of-type{
            position:absolute;
            bottom:0;
            width:100%;
            display:flex;
        }
       
  
        input:focus{
            outline: none;
        }        
        ::-webkit-input-placeholder { 
            color: #d4d4d4;
        }
        ::-moz-placeholder { 
            color: #d4d4d4;
        }
        ::-ms-input-placeholder {
            color: #d4d4d4;
        }
        ::-moz-placeholder {
            color: #d4d4d5;
        }
        .message{
            position:relative;
            -webkit-box-shadow:0 -2px 1px rgba(0,0,0,.03);
            box-shadow:0 -2px 1px rgba(0,0,0,.03)
            }
        .message input{
            font:16px Noto Sans,sans-serif;
            background-color: #cccccc;
            border:none;
            padding:20px 30px;
            width:100%;
            color: black;
            }
        .message input:focus{outline:0}
        .message button.msg{
            background: #cccccc;
            color:#333333;
            border: none;
            /*border-radius:70%;*/
            width: 50px;
            height:50px;
            /*padding:13px 10px 20px;*/
            position:absolute;
            font-size:2.2em;
            text-align:center;
            right:8px;
            bottom:6px
        }
       
        /* CSS talk bubble */
        .talk-bubble {
            margin: 10px;
            display: inline-block;
            position: relative;
            width: 70%;
            height: auto;
            background-color: #333333;
            color: #ffffff;
        }
        .talk-bubble-2 {
            margin: 10px;
            display: inline-block;
            position: relative;
            width: 80%;
            height: auto;
            background-color:#333333;
            color: #ffffff;
        }


        /* Right triangle placed top left flush. */
        .tri-right.border.left-top:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -40px;
            right: auto;
            top: -8px;
            bottom: auto;
            border-color: #666 transparent transparent transparent;
        }
        .tri-right.left-top:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -20px;
            right: auto;
            top: 0px;
            bottom: auto;
            border: 22px solid;
            border-color:#333333 transparent transparent transparent;
        }



        /* Right triangle placed top right flush. */
        .tri-right.border.right-top:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
          left: auto;
            right: -40px;
          top: -2px;
            bottom: auto;
            /* border: 32px solid; */
            border-color: #666 transparent transparent transparent;
        }
        .tri-right.right-top:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
          left: auto;
            right: -20px;
          top: 0px;
            bottom: auto;
            border: 20px solid;
            border-color: #333333 transparent transparent transparent;
        }

        /* talk bubble contents */
        .talktext{
          padding: 1em;
            text-align: left;
          line-height: 1.5em;
        }
        .talktext p{
          /* remove webkit p margins */
          -webkit-margin-before: 0em;
          -webkit-margin-after: 0em;
        }

        .card-body{
            overflow-y: scroll ;
        }
        .bot-foot{
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: 150px;">
            <div class="col-sm-12 col-md-7 landing">
                <!-- for profile content -->
                <!-- <div class=""> -->
                    <img src="http://res.cloudinary.com/ddjpblpib/image/upload/c_scale,h_300,r_200,w_250/v1523626732/IMG_20180409_101519.png" alt="profile image" class="rounded-circle">
                    
                    <div class="landing_content_area">
                        <h3></h3>         
                        <h1><span>Hey there!! I'm</span> Tirsing, Dernan Dorcas</h1>
                        <p>A front-end web developer, competent in HTML, CSS, UIKIT and an intermediate user of Javascript and PHP.</p>
                        <p>I love challenges that help me grow and be better at what I do.</p>
                    </div>
                    <h3>Slack Username: @Dernan</h3>
                    <div id="connect">
                        <a href="https://www.facebook.com/dorcas.godwin"><span class="fa fa-facebook"></span></a>
                        <a href="https://https://twitter.com/DerNaan"><span class="fa fa-twitter"></span></a>
                        <a href="https://www.linkedin.com/in/dernan-tirsing-5155ba156"><span class="fa fa-linkedin"></span></a>
                        <a href="https://github.com/DernanT"><span class="fa fa-github"></span></a>
                    </div>
                <!-- </div> -->
            </div>
            <div class="col-sm-10 col-md-5">
                <div class="cardd bg-success text-black" style="background-color: #333333 !important">
                    <!-- <div class="panel-heading">
                        <h1><span class="fa fa-comments"></span>Chat Bot</h1>
                    </div>
                        <div class="col-sm-12 col-md-12 frame"> -->
                        
                        <div class="card">
                            <div class="card-header">
                            <h1><span class="fa fa-comments"></span>softBot</h1>
                            </div>
                            <div class="card-body">
                                <div class="message-container">
                                   
                                    <!-- <div class="sent-message talk-bubble tri-right round border right-top">
                                        <div class="talktext">
                                            <p>And finally on the right flush at the top. Uses .round .border and .right-top</p>
                                        </div>
                                    </div> -->
                                     <div class="response-message talk-bubble-2 tri-right left-top">
                                        <div class="talktext">
                                            <p>Hey there, to know about me send <code>#aboutbot</code> and I'll tell you who I am</p>
                                            <p>To train me send your lesson in the format <code>train:question#answer#password</code></p>
                                            <p>Enjoy your time with me</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <footer class="bot-foot">
                                    <div class="message">
                                        <form id="chat-form">
                                            <input class="form-control chat" name="message" aria-label="With textarea" placeholder="Enter your question here..." name="qstn">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-sm msg"><span class="fa fa-send-o"></span></button>
                                            </div>
                                        </form>
                                    </div>
                            </footer>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $('documnet').ready(function(){
            $('#chat-form').submit(function(e){
                e.preventDefault();

               
                var chat = $('.chat');
                var message = chat.val().trim();
                // alert(message);
                 var message_div = $('.message-container');
                if (message != ''){

                    if (message.split(':')[0] !='train' && message != "aboutbot"){
                        message_div.append(sentMessage(message));
                        chat.val('');
                        $('.card-body').scrollTop($('.card-body')[0].scrollHeight);
                    }
                }
                if (message =="#aboutbot"){
                    chat.val('');
                    message_div.append(responseMessage('I am a softbot, my verion is 1.0, I live on the internet and I am a friend to all those that have common sense'));
                    $('.card-body').scrollTop($('.card-body')[0].scrollHeight);
                    return;
                }
    
                 $.ajax({
                     url: '/profiles/Dernan.php',
                     type: 'POST',
                     dataType: 'json',
                     data : {message: message},
                     success: function(res){

                         console.log(res);

                         if (res){

                             if (res.status ===0){
                                chat.val('');
                                message_div.append(responseMessage(res.data));
                                $('.card-body').scrollTop($('.card-body')[0].scrollHeight);
                             }
                            if (res.status ===1){
                                chat.val('');
                                message_div.append(responseMessage(res.data));
                                $('.card-body').scrollTop($('.card-body')[0].scrollHeight);
                            }

                         }
                     },
                     error: function(error){
                         console.log(error);
                     }
                 });
                function responseMessage(query){

                     return   '<div class="response-message talk-bubble-2 tri-right left-top">'+
                                '<div class="talktext">'+
                                    '<p>'+query+'</p>'+
                                '</div>'+
                              '</div>';
                }

                function sentMessage(response){
                    return   '<div class="sent-message talk-bubble tri-right round border right-top">'+
                                '<div class="talktext">'+
                                    '<p>'+response+'</p>'+
                                '</div>'+
                            '</div>';
                }
               
            });
        });
    </script>
</body>
</html>
    <?php } ?>
