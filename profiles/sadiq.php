<?php 
    require 'db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<?php 
         /*   Enter Bot    */
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $message = trim($_POST['message']);
        if($message == ''){
            echo json_encode(['status'=>200,"message"=>"empty"]);
        }else{
            //about bot
                if($message == 'aboutbot'){
                    $version = "NagatoBot v 0.1";
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
                    echo json_encode(['status'=>200,"message"=> "Err.. If you can see me, I'm scratching my head","alert"=>'train']);  
                }else{
                    echo json_encode(['status'=>200,"message"=> $answer]); 
                }
                
            }
        }
       exit();
    }
    function trainIfAuthorized($trainMessage){
        if($trainMessage[2]=='password'){
            // train if question does not exists else answer
            if(!checkIfQuetionExists($trainMessage[0],$trainMessage[1])){
                $trained = train($trainMessage[0],$trainMessage[1]);
                if($trained){
                    echo json_encode(['status'=>200,"message"=>"Senpou! I feel new chakra","train"=>"yes"]);
                }
                return;
            }else{
                echo json_encode(['status'=>200,"message"=>"You underate my power"]); 
            }
         }else{
            echo json_encode(['status'=>200,"message"=>"You are not authorized to train the Akatsuki leader"]); 
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
    /*  Exit Bot */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sadiq Profile</title>
    <!-- style -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- custom style -->
    <style type="text/css">
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .section, .row {
            margin: 1em 20%;
            padding: auto;
            box-shadow: 5px 5px 5px lightgrey;
            border-top: 1px solid lightgrey;
            border-left: 1px solid lightgrey;
        }
        span {
            opacity: 0.5;
            font-size: 16px;
        }
        img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
        a:link, a:visited, a:hover {
            text-decoration: none;
        }
        a:hover {
            background: beige;
            padding: 5px 0;
            box-shadow: 2px 0 2px #696;
        }
        p {
            display: inline-flex;
        }
        p:first-child {
            padding-top: 5px;
        }
        p:last-child {
            padding-bottom: 5px;
        }
        figure, h3 {
            padding-top: 50px;
        }
        h2, h3 {
            font-size: 28px;
        }
        h2#tag {
            opacity: 0.7;
        }
        /* bot style */
        .bot{
            height:500px;
            width:340px;
            background:ghostwhite;
            position: fixed;
            right:0;
            bottom:10%;
            /* border-radius:4%; */
            border: 1px solid gray;
            margin-right:3%;   
        }
        .top-bar {
          background: #696;
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

    <div class="row section">
        <div class="col-md-12">
            <figure>
                <img alt="dp" class="img-responsive" src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg">
                <figcaption><p><?php echo $user->name ?></p></figcaption>
            </figure>
            <h2 id="tag">Web Developer<br />
            <span>HTML | CSS | JS | JQUERY | ANGULAR | BOOTSTRAP | PHP</span></h2>
        </div>
    </div>

    <div class="row section">
        <div class="col-md-12">
            <h3>Check Me Out</h3>
            <div class="row">
                <div class="col-md-12">
                    <p><a href="https://www.codepen.io/sastech" target="_blank" style="color: black;">Codepen</a></p>
                    <p><a href="https://www.github.com/saslamp" target="_blank" style="color: black;">GitHub</a></p>
                    <p><a href="https://www.twitter.com/_saslamp" target="_blank" style="color: skyblue;">Twitter</a></p>
                    <p><a href="https://www.linkedin.com/in/abubakar-sambo-ii-102726b4" target="_blank" style="color: lightskyblue;">LinkedIn</i></a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- bot section -->
   <div class="row section">
        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">Zinco
                <span><button class="minimize-bot" data-hide="minimize">-</button></span>
            </div>
            <div class="panel-body">
                <div class ="bot-message row">I'm NagatoBot. Let's chat.</div>
                <div class="bot-message row">To train me use this format<br> train: question #answer #password</div>
                <div class ="bot-message row">Ask me anything</div>
            </div>
            <div class="input" style="position:absolute; bottom:0;">
            <form action="" class="form-inline">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control question-input" id="userTxt" placeholder="Enter your message..">
                        <div class="input-group-append">
                            <div class="input-group-text btn-primary"><input class="btn-primary" id="send" type="submit" onclick="return false;"></div>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <!-- section end -->


    <!-- script -->
    <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
    <script>
        // show()hide() 
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
                url:'profiles/sadiq.php',
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