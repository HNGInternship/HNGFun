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
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Oracle JET Starter Template - Web Blank</title>
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="viewport-fit=cover, initial-scale=1.0"/>

<style>
.profile {height: 100%;text-align: center;position: fixed;position: fixed;position: fixed;width: 50%;right: 0;background-color: #007bff}footer {display: none;padding: 0px !important}h1, h2, h3, h4, h5, h6 {color: white;text-align: center;bottom: 50%;left: 65%;position: fixed;font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: 700}p {position: fixed;bottom: 40%;left: 58%;line-height: 1.5;margin: 30px 0}.bot-body {max-width: 100% !important;position: fixed;margin: 32px auto;position: fixed;width: 100%;left: 0;bottom: 0px;height: 80%}.messages-body {overflow-y: scroll;height: 100%;background-color: #FFFFFF;color: #3A3A5E;padding: 10px;overflow: auto;width: 50%;padding-bottom: 50px;border-top-left-radius: 5px;border-top-right-radius: 5px}.messages-body > div {background-color: #FFFFFF;color: #3A3A5E;padding: 10px;overflow: auto;width: 100%;padding-bottom: 50px}.message {float: left;font-size: 16px;background-color: #007bff63;padding: 10px;display: inline-block;border-radius: 3px;position: relative;margin: 5px}.message: before {position: absolute;top: 0;content: '';width: 0;height: 0;border-style: solid}.message.bot: before {border-color: transparent #9cccff transparent transparent;border-width: 0 10px 10px 0;left: -9px}.color-change {border-radius: 5px;font-size: 20px;padding: 14px 80px;cursor: pointer;color: #fff;background-color: #00A6FF;font-size: 1.5rem;font-family: 'Roboto';font-weight: 100;border: 1px solid #fff;box-shadow: 2px 2px 5px #AFE9FF;transition-duration: 0.5s;-webkit-transition-duration: 0.5s;-moz-transition-duration: 0.5s}.color-change: hover {color: #006398;border: 1px solid #006398;box-shadow: 2px 2px 20px #AFE9FF}.message.you: before {border-width: 10px 10px 0 0;right: -9px;border-color: #edf3fd transparent transparent transparent}.message.you {float: right}.content {display: block;color: #000000}.send-message-body {border-right: solid black 3px;position: fixed;width: 50%;left: 0;bottom: 0px;box-sizing: border-box;box-shadow: 1px 1px 9px 0px rgba(1, 1, 1, 1)}.message-box {width: -webkit-fill-available;border: none;padding: 2px 4px;font-size: 18px}body {overflow: hidden;height: 100%;background: #FFFFFF !important}.container {max-width: 100% !important}.fixed-top {position: fixed !important;}
</style>

  </head>
  <body>
<div class="profile">
						<h1>Dennis Otugo</h1>
						<p>Human Being &nbsp;&bull;&nbsp; Cyborg &nbsp;&bull;&nbsp; Never asked for this</p>

					</div>
  <div class="bot-body">
    <div class="messages-body">
      <div>
        <div class="message bot">
          <span class="content">Look alive</span>
        </div>
      </div>
	<div>
        <div class="message bot">
          <span class="content">What do you have in mind, Let's talk :) </span>
        </div>
      </div>
    </div>
    <div class="send-message-body">
      <input class="message-box" placeholder="Enter your words here..."/>
    </div>
  </div>

  
  
  <script>
        $('document').ready(function(){
            $('#send-message').submit(function(e){
                e.preventDefault();

               
                var chat = $('.chat');
                var message = chat.val().trim();
                 var message_div = $('.messages-container');
                if (message != ''){

                    if (message.split(':')[0] !='train' && message != "aboutbot"){
                        message_div.append(sentMessage(message));
                        chat.val('');
                        $('.bot-container').scrollTop($('.bot-container')[0].scrollHeight);
                    }
                }
                if (message =="#aboutbot"){
                    chat.val('');
                    message_div.append(responseMessage('v1.0'));
                    $('.bot-container').scrollTop($('.bot-container')[0].scrollHeight);
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
                                $('.bot-container').scrollTop($('.bot-container')[0].scrollHeight);
                             }
                            if (res.status ===1){
                                chat.val('');
                                message_div.append(responseMessage(res.data));
                                $('.bot-container').scrollTop($('.bot-container')[0].scrollHeight);
                            }

                         }
                     },
                     error: function(error){
                         console.log(error);
                     }
                 });
                function responseMessage(query){

                     return   '<div class="message bot">'+
                                '<div class="content">'+
                                    '<p>'+query+'</p>'+
                                '</div>'+
                              '</div>';
                }

                function sentMessage(response){
                    return   '<div class="message.you">'+
                                '<div class="content">'+
                                    '<p>'+response+'</p>'+
                                '</div>'+
                            '</div>';
                }
               
            });
        });
</script>

  </body>
</html>

<?php } 
?>
