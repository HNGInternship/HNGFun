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
    $sql = "SELECT * FROM interns_data WHERE `username` = 'dennisotugo' LIMIT 1";
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
                 'Try again'
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
                echo json_encode(['status'=>0, 'data'=>'no']);
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

    <style>

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
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
                     url: '/profiles/dennisotugo.php',
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
