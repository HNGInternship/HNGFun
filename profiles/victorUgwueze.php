
<?php
try {
    if (!defined('DB_USER')){
            
        require "../../config.php";
    }
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
      }
       global $conn;


    $sql ="SELECT * FROM interns_data WHERE username = 'victorUgwueze' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data = $q->fetch();
  

    //query for the secret word;
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    // Set the secret word
    $secret_word = $data['secret_word'];
    } catch (PDOException $e) {
         throw $e;
    }

    /*   Bot Backend Implementation begins here     */


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $message = trim($_POST['message']);
        if($message == ''){
            echo json_encode(['status'=>200,"message"=>"empty"]);
        }else{
            //check if it ask about bot
                if($message == 'aboutbot'){
                    $version = "1.0.0";
                    echo json_encode(['status'=>200,"message"=>"version ".$version]);
                    exit();
                }

            if(strpos($message,'train:')===0){
                $trainMessage = explode('#',substr($message,6));
                if(sizeof($trainMessage)== 3){
                    trainIfAuthorized($trainMessage);
                }else{
                    echo json_encode(['status'=>200,"message"=>"Invalid format",'train']);  
                }
            }else{
                $answer = getAnswer($message);
                if($answer == null){
                    echo json_encode(['status'=>200,"message"=> "I don't know that","alert"=>'train']);  
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
                    echo json_encode(['status'=>200,"message"=>"You can try and see if I have learn't","train"=>"yes"]);
                }
                return;
            }else{
                echo json_encode(['status'=>200,"message"=>"Lol,I already know that, thanks anyway"]); 
            }
         }else{
            echo json_encode(['status'=>200,"message"=>"You are not authorized to train me"]); 
         }
    }

    function checkIfQuetionExists($question, $answer){
        global $conn;
        $sql = $conn->prepare("SELECT * FROM chatbot WHERE question = :question AND answer = :answer");
        $sql->execute([':question' => $question, ':answer' => $answer]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return true;
        }
        return false;
    }

    function train($question, $answer){
        global $conn;
        $sql = "INSERT INTO chatbot (question, answer) VALUES(:question,:answer)";
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
       $query = "SELECT * FROM chatbot WHERE `question` LIKE '%$question%'";
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
       }else{
           return null;
       }  
   }

    /*   Bot Backend Implementation ends here */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $intern_data['name']; ?></title>

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


body{
 	margin: 0;
	padding: 0;
}

h1,h2{
	margin: 0;
	letter-spacing: 1px;
	font-weight: 300;
	text-transform: uppercase;

}

h1{
	margin-top: 0;
	margin-bottom: 20px;
	font-size: 240%;
	word-spacing: 4px;

}

h2{
	font-size: 100%;
	word-spacing: 2px;
	text-align: center;
	margin: 10px auto;
	margin-bottom: 30px;

}
h3{
	font-size: 150%;
	word-spacing: 2px;
	margin-bottom: 20px;
}

.wrap{
    width: 480px;
    margin: 0 auto;
    margin-top: 100px;
    text-align: center;
    box-shadow: 7px 10px 34px 1px rgba(0, 0, 0, 0.68), inset -1px -6px 5px 0.1px #000;
}

.img img{
    height :200px;
    border-radius: 50%;
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
    right:0;
    bottom:10%;
    /* border-radius:4%; */
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
    background:gray;
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
  </style>



</head>
<body>
    <div class="wrap">
        <div class="img">
            <img src="<?php echo $intern_data['image_filename']; ?>" alt="Victor Ugwueze Profile Image">
        </div>
        <div class="username">
            <h2><?php echo $intern_data['name']; ?></h2>
            <h5>Software Developer</h5>
        </div>
        <div class="contact">
            <h3>Get In Touch</h3>
            <p>Want to get in touch with me? Be it to request more info about myself or my
                experience, to ask for my resume, or even if only for some nice coffe here in Lagos, 
                Nigeria... just feel free to drop me a line anytime.
                I promise to reply A.S.A.P.
            </p>
            <div class="contact-link">
                <div>
                    <a  href="https://github.com/Victor-Ugwueze" target="_blank">
                    <i class="fa fa-github-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
                <div>
                    <a  href="https://www.facebook.com/victor.c.ugwueze" target="_blank">
                    <i class="fa fa-facebook-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
                <div>
                    <a  href="https://twitter.com/CVicchigo" target="_blank">
                    <i class="fa fa-twitter-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">Zinco
                <span><button class="minimize-bot" data-hide="minimize">-</button></span>
            </div>
            <div class="panel-body">
                <div class ="bot-message row">Hi, welcome let's have a chat</div>
                <div class="bot-message row">To train me use this format<br> train: question #answer #password</div>
                <div class ="bot-message row">Ask me anything</div>
            </div>
            <div class="input" style="position:absolute; bottom:0;">
            <form action="" class="form-inline">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control question-input" id="inlineFormInputGroupUsername2" placeholder="type your message">
                        <div class="input-group-append">
                            <div class="input-group-text btn-primary"><input class="btn-primary" id="send" type="submit" onclick="return false;"></div>
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
                let output = '<div class="human-message">question: '+question+' response :'+answer+'</div>';
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
                url:'profiles/victorUgwueze.php',
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