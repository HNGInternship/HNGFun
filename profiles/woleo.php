<?php

    
      
    try {
      
            if (!defined('DB_USER')){
        
                require "../../config.php";
            }
              
        $profile = 'SELECT * FROM interns_data WHERE username="woleo"';
        $select = 'SELECT * FROM secret_word';
    
        $query = $conn->query($select);
        $profile_query = $conn->query($profile);
    
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $profile_query->setFetchMode(PDO::FETCH_ASSOC);
    
        $get = $query->fetch();
        $secret_word = $get['secret_word'];
        $user = $profile_query->fetch();
        $name = $user['name'];
        $username = $user['username'];
        $image_filename = $user['image_filename'];
    } catch (PDOException $e) {
        throw $e;
    }
    //$secret_word = $get['secret_word'];
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $message = trim($_POST['message']);
        if($message == ''){
            echo json_encode(['status'=>200,"message"=>"empty"]);
        }else{
            //check if it ask about bot
                if($message == 'aboutbot'){
                    $version = "1.0.0";
                    echo
json_encode(['status'=>200,"message"=>"version ".$version]);
                    exit();
                }
            if(strpos($message,'train:')===0){
                $trainMessage = explode('#',substr($message,6));
                if(sizeof($trainMessage)== 3){
                    trainIfAuthorized($trainMessage);
                }else{
                    echo
json_encode(['status'=>200,"message"=>"Invalid Training format",'train']);
                }
            }else{
                $answer = getAnswer($message);
                if($answer == null){
                    echo json_encode(['status'=>200,"message"=> "I
don't know that","alert"=>'train']);
                }else{
                    echo json_encode(['status'=>200,"message"=> $answer]);
                }

            }
        }
       exit();
    }
    function trainIfAuthorized($trainMessage){
        if($trainMessage[2]=='password'){
            //Check if question already exists else train
            if(!checkIfQuetionExists($trainMessage[0],$trainMessage[1])){
                $trained = train($trainMessage[0],$trainMessage[1]);
                if($trained){
                    echo json_encode(['status'=>200,"message"=>"You
can try","train"=>"yes"]);
                }
                return;
            }else{
                echo json_encode(['status'=>200,"message"=>"I
already know that, thank You"]);
            }
         }else{
            echo json_encode(['status'=>200,"message"=>"You are not
authorized to train me"]);
         }
    }
    function checkIfQuetionExists($question, $answer){
        global $conn;
        $sql = $conn->prepare("SELECT * FROM bottable WHERE question =
:question AND answer = :answer");
        $sql->execute([':question' => $question, ':answer' => $answer]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return true;
        }
        return false;
    }
    function train($question, $answer){
        global $conn;
        $sql = "INSERT INTO bottable (question, answer)
VALUES(:question,:answer)";
        $stm= $conn->prepare($sql);
        $stm->bindParam(':question',$question);
        $stm->bindParam(':answer',$answer);
        if($stm->execute()){
            return true;
        }

    }
    function getAnswer($question){
        return checkIfQuestionExists($question);
   }
   function checkIfQuestionExists($question){
       global $conn;
       $query = "SELECT * FROM bottable WHERE `question` LIKE '%$question%'";
       $stm = $conn->query($query);
       $stm->setFetchMode(PDO::FETCH_ASSOC);
       $result = $stm->fetchAll();
       if($result){
           switch($result){
                case (sizeof($result)==1):
                    return $result[0]['answer'];
                case (sizeof($result) >1):
                    return $result[rand(0,sizeof($result)-1)]['answer'];
                default:
                    return null;
           }
       }
       else{
           return null;
       }
   }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\vendor\bootstrap\css\bootstrap.min.css">
    <title>Profile</title>
    
    <style>
       *{
        margin: 0;
        padding: 0;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
}
html{
        color: #555;
        font-family: 'lato', 'Arial', 'sans-serif';
        font-weight: 300;
        font-size: 18px;
        text-rendering:optimizeLegibility;
}

.wrap{
    width: 480px;
    margin: 0 auto;
    margin-top: 100px;
    text-align: center;
   
}

.contact{
    width:50%;
    margin: 0 auto;
}
.contact .contact-link{
    display: flex;
    justify-content: space-around;
    padding-bottom: 20px;
}
.bot{
    height:500px;
    width:340px;
    background:white;
    position: fixed;
    left:62%;
    top:10%;
    border: 1px solid gray;
    margin-right:3%;
}
.top-bar {
  background: #666;
  height:50px;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
  border-radius:4%;

}
.input{
    height:50px;
    width:100%;
}
.minimize-bot{
    position:absolute;
    right:2%;
    font-weight:180%;
}
.panel-body{
    height:400px;
    position:relative;
    overflow-y:auto;
    background:#BADA55;
    padding: 10px;
}
.human-message{
    background:white;
    margin: 10px 10px;
    border-radius:8%;
    padding:4px;
}
.human-message:before{
    width: 0;
    height: 0;
    content:"";
    top:0px;
    left:-4px;
    position:absolute;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;
}
.bot-message{
    background:#007bff;
    color: #FFFFFF;
    margin: 10px 10px;
    border-radius:4%;
    padding:4px;
}
.bot-message:after{
    width: 0;
    height: 0;
    content:"";
    position:absolute;
    top:-5px;
    right:0;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: transparent transparent transparent whitesmoke;
}
.card{
            margin: auto 0;
            width: 100%;
            position:relative;
            padding-left: 10%;
            font-family: 'sans-serif', Arial;
        }


h3 span, p span{
    color:#BADA55
}
.buttn > button, .bttn >input[type='submit'] {
  border: none;
  display: inline-block;
  padding: 8px;
  color:grey;
  background-color: #000;
  text-align: center;
  width: 10%;
  font-size: 16px;
}
img{
            width:20%;
            height:20%;
            border-radius:100%;
            margin-top:20px;
 }
a {
  text-decoration: none;
  font-size: 22px;
  color: blue;
  padding-right:20px;
}

  
    </style>
</head>
<body>

<div class="card">

  <img src="<?php echo $image_filename; ?>" alt="profile" >
  
 <h3><span> Name: </span><?php echo $name; ?></h3> <br>
 <p><span> Slack ID: </span><?php echo $username; ?> </p>
  <small><br> Software Developer from Ogun State</small>
  
  

  
  <div class='buttn'>       
    <a href="https://twitter.com/oluwolley"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/iam_ahead/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/S.Hammed"><i class="fa fa-facebook"></i></a> 

 <button>Contact</button>
 <div>
 <!--- Chat Bot-->

 <div class="container">
        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">BOT
                <span><button class="minimize-bot"
data-hide="minimize">-</button></span>
            </div>
            <div class="panel-body">
                <div class ="bot-message row">Let's have a
chat.. Please</div>
                <div class="bot-message row">To train me use this
format<br> train: question #answer #password</div>
                <div class ="bot-message row">Ask me anything</div>
            </div>
            <div class="input" style="position:absolute; bottom:0;">
            <form action="" class="form-inline">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control
question-input" id="inlineFormInputGroupUsername2" placeholder="Lets Chat">
                        <div class="input-group-append">
                            <div class="input-group-text
btn-primary"><input class="btn-primary" id="send" type="submit"
onclick="return false;"></div>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Javascript tags -->
    <script>
        //handles show and hide for chat window
        (function init(){
            let minimizeBot = document.querySelector('.minimize-bot');
            minimizeBot.addEventListener('click',chatAction);
            console.log( document.querySelector('.modal'));
            let sendMessageButton = document.getElementById('send');
            sendMessageButton.addEventListener('click',getInput);
        })();

        function chatAction(){
                if(this.dataset.hide ==="minimize"){
                    this.dataset.hide = "expand";
                    hideChat();
                }else if(this.dataset.hide === "expand"){
                    this.dataset.hide = "minimize";
                    showChat();
                }
                console.log(this.dataset.hide);
        }
        function hideChat(){
            let chatWindow = document.querySelector('.panel-body');
            chatWindow.style.display = "none";
            chatWindow.parentNode.style.height = "100px";
        }
        function showChat(){
            let chatWindow = document.querySelector('.panel-body');
            chatWindow.style.display = "block";
            chatWindow.parentNode.style.height = "400px";
        }
        function getInput(){
            console.log(document.getElementsByTagName('form'));
            let bot = "";
            let input = document.querySelector('.question-input').value
            if(input == "") return;
            let messageBox = document.querySelector('.panel-body');
            let childDiv = document.createElement("div");
            if(input.split(':')[0]=='train'){
                let trainInput = input.substring(6).split('#');
                let question = trainInput[0];
                let answer = trainInput[1];
                let output = '<div class="human-message">question:'+question+' response :'+answer+' </div>';
                // childDiv.innerHTML = output;
                messageBox.innerHTML = output;
                // messageBox.appendChild(output);
            }else{
                let output = '<div class="human-message row">'+input+'</div>';
                // childDiv.innerHTML = output;
                messageBox.innerHTML += output;
                // messageBox.appendChild(output);
            }

            sendQuestion(input)
        }
        function sendQuestion(input){
            console.log(input);
            $.ajax({
                type:'POST',
                url:'profiles/woleo.php',
                dataType:'json',
                data:{'message':input},
                success:(data,status)=>{
                    console.log(data);
                    replyMessage(data);
                },
                error:(err)=>{
                    console.log(err);
                }
            });
        }
        function replyMessage(data){
            let messageBox = document.querySelector('.panel-body');
            let childDiv = document.createElement("div");
            let output = '<div class="bot-message row">'+data.message+'</div>';
            // childDiv.innerHTML = output;
            messageBox.innerHTML += output;
            messageBox.scrollTop = messageBox.scrollHeight;
        }
        
    </script>



</body>
</html>




