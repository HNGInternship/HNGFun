<?php
//    $con = mysql_connect('localhost','root','');
//    $db = mysql_select_db('hng_fun');
 if(!defined('DB_USER')){
            require "../../config.php";     
            try {
                $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
            } catch (PDOException $pe) {
                die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
            }
        }


    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        
         $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'lowkeynerd'");
        $intern_data->execute();
        $user = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
        $user = $intern_data->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
   // $secret_word = $data['secret_word'];
     $secret_word = 'sample_secret_word';

//    $result2 = $conn->query("Select * from interns_data where username = 'lowkeynerd'");
//    $get = $result2->fetch(PDO::FETCH_ASSOC);
//    $user = $get->fetch();
    
//$cn = mysqli_connect('localhost','root','root');

//$cn = new PDO('mysql:host=localhost;dbname=messages', 'root', 'root');



  function sanitizeText($text){

    return trim($text);
}

if(isset($_GET['training'])) {
      $message = $_GET['training'];
        echo workOnTrainData($message);
        exit();
}

else if(isset($_GET['info'])){
      $message = $_GET['info'];
      echo getReply($message);
        exit();

}

 

function workOnTrainData($data){
    
    
    require '../db.php';

    // $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      
    


  
    try {


        $indexOfHash=strpos($data,"#");

        if($indexOfHash===FALSE){

            return "Training format used is incorrect, use : <br><span id='important'>train: question # answer # password </span>";

        }

        $indexOfColon=strpos($data,":");

        $newMessage=substr($data,$indexOfColon+1);
    $query=explode ( "#" , $newMessage );
    $question=sanitizeText($query[0]);
    $answer=sanitizeText($query[1]);
    $password=sanitizeText($query[2]);

    // return $question;


    if($password==null || $password!="password"){

        return "Sorry, the password you entered is incorrect. Try again";
    }
    
    $sql =  $conn->prepare("INSERT INTO chatbot (question, answer)
VALUES (:question, :answer)");
   
   if( $result= $sql->execute(array(':question'=>$question,':answer'=>$answer))){
    
    return "Great training!";
}

else{

    return "Sorry! Something went wrong.";
}
    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}

function getReply($data){

 require '../db.php';



    try{

        $trimData=sanitizeText($data);

        if(strtolower($trimData)=="aboutbot"){

            return "Aryabot version 1.5";

        }

      

       

$stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question=:question ORDER BY RAND() LIMIT 1");

$result= $stmt->execute(array(
   ':question'=>$trimData
  ));




  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {


   
        return $row["answer"];

  }


    return "I'm sorry, I don't seem to understand you...you can train me using the format below.<br> <span id='highlight'>train: question # answer # password </span>"; 


}

catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();

}

}



    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    
    <title>HNG 4.0 |lowkeynerd</title>
    
    <style>
        
        .body{
            margin: 0;
            padding: 0;
        }
        #box{
            height: 100%;
            width: 100%;
            background: rgba(212, 175, 55, 0.4);
            padding: 40px;
            text-align: center;
            margin: auto;
            font-family: 'Century Gothic', sans-serif;
        }

        #box img{
            border-radius: 50%;
            max-width: 100%;
            max-height: 100%;
        }
        
        .zoom{
            transition: transform 5.0s; /* speed of image zooming out */
            margin-bottom: 10px;
        }

        .zoom:hover{
            transform: scale(1.3);/* zoom- 110% */
        }
        
        #name{
            font-size: 30px;
            font-weight: 100;
        }
        
        #username{
            font-size: 15px;
            font-weight: bold;
        }
        #job{
            font-size: 20px;
            letter-spacing: 3px;
        }
        span{
            text-align: center;
        }
        
        .list{
            margin: 0;
            padding: 0;
            display: inline;
            width: 20%;
        }

        #box li {
            list-style: none;
            display: inline-block;
            margin: 6px;
        }

        #box li a {
            text-decoration: none;
            color: #000;
            font-size: 30px;
            position: relative;
            display: block;
            text-align: center;
            padding: 5px;
            transition: transform 1.5s;
			}
        
        .list li a:hover {
            transform: scale(1.3);
            color: blue;
			}
         
        section{
            display: block;
        }
        
        #chatButton:hover{
            background-color: #CADDFF;
        }
        
        #chatEnabled{
            background-color: #CADDFF;
        }
        /* chatbox */
        #chatBox{
            width: 550px;
            background-color: #CADDFF;
            margin: 50px;
            border: 1px solid #000;
        }
    
        
        /* chat message area */
        #chatArea{
            display: block;
            height: 300px;
            background: #fff;
            overflow-y: scroll;
        }
        
        .chat-name{
            font-size: 20px;
            font-weight: bold;
            display: inline-block;
            word-wrap: break-word; 
            min-width:25%;
            padding-right: 0px;
            margin-right: 0px;

        }
        
        .message{
            font-size: 20px;
            display: inline-block;
            word-wrap: break-word;
            max-width:70%;
            padding: 0px;
            margin-left: 0px;
        }
        
        #highlight{
            color: blue;    
        }
        
        /* message typing area */
        #messageTypingArea{
            height: 85px;
        }
        
        #messageTypingArea textarea{
            height: 70px;
            width: 400px;
            font-size: 15px;
        }
        
        #messageTypingArea .left{
            float: left;
        }
        
        #messageTypingArea .right{
            float: right;
        }
        
        #newMessageSend{
            float: right;
            display: block;
            height: 80px;
            width: 80px;
            font-size: 15px;
        }
        
    </style>
</head>

<body class="body">
    <main class="container">
            
            <div id="box">
            <span> <a href="https://res.cloudinary.com/lowkeynerd/image/upload/v1526554529/lkn.jpg"><img src="https://res.cloudinary.com/lowkeynerd/image/upload/v1526554795/lowkeynerd.jpg" alt="display photo" class="zoom"></a></span>
            
            <h1 id="name">Chiamaka Ibeme </h1>
            <p id="username">HNG Slack @<?php echo $user['username'] ?></p>
        <hr>
            
            <p id="job">Front End Developer</p>
<!--            <footer>-->
                
            <ul class="list">
                <li><a href="https://github.com/chiamakaibeme" title="Github" target="_blank"><i class="fab fa-github"></i></a></li>
                <li><a href="mailto:chiamakaibeme@ymail.com" title="Yahoomail" target="_blank"><i class="fas fa-envelope"></i></a></li>
                <li><a href="https://twitter.com/_chimmie_" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/_chimmie_/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        <br>
        
        <button id="chatButton">CHAT WITH BOT</button>
            
<!--            </footer>-->
        </div>  
            
            <div id="chatBox">
                
                 <section id="topArea">
                    <button id="closeChat">X</button>
                    <h2>ARYA</h2>
                </section>
               
                <div id="mainChat">
                <section id="chatArea">
                    <div class="chat-message row">

                        <p class="chat-name col-2">Arya :</p>
                        <span class="message user-message col-10">Hi. I am Arya the Bot. Ask me questions and I'll try my best to answer.</span>

                    </div>
                </section>
                </div>
                
                <section id="messageTypingArea">
                    <form name="newMessage" class="newMessage" action="" onsubmit="return false">
                    <section class="left">
                        <textarea name="newMessageContent" id="newMessageContent" placeholder="Enter your message"></textarea>
                        </section>
                    
                    <section class="right">
                        <input type="submit" id="newMessageSend" value="Send">
                    </section>
                    </form>
                </section>
                
            </div>  
        
    </main>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
        window.onload = function() {
            $('#chatBox').hide()
             $(document).keypress(function(e) {
      if(e.which == 13) {
         var message = $('#newMessageContent').val();
                
                if(message != '') {
                    $.ajax({
                        data: { message: message },
                        type: "POST",
                        url: "profiles/lowkeynerd.php",
                        success: function() {
                            $('#newMessageContent').val('');
                        }
                    });
                }
                
                if($.trim(message) == ''){
                    
                    aryaMessage("You haven't typed any message.");
                    return;
                }
                
                $("#newMessageContent").val(null);
            $('#newMessageContent').prop('selectionStart',0);

            userMessage(message);

            $("#chatArea").animate({ scrollTop: 500 }, 1000);
            
                
            if (message.indexOf('train:') >= 0 || message.indexOf('train :')>=0){
                
            $.ajax({
            type: "GET",
            url: 'profiles/lowkeynerd.php',
            data: { training: message },
            success: function(data){
                aryaMessage(data);
                
            }
         });
                
                
            }
                else{
        elses = message;
        $.ajax({
            type: "GET",
            url: 'profiles/lowkeynerd.php',
            data: {info: message },
            success: function(data){
                console.log(data);

                aryaMessage(data);
            }
         });
                }
      }
        });
            
        }
        
        $(function() {
            $('#chatButton').click(function() {
               $('#chatBox').show();
                $('#newMessageContent').focus();
               
            });
             
            $('#closeChat').click(function() {
                $('#chatBox').hide();
            });
            

            
            $('#newMessageSend').click(function() {
                var message = $('#newMessageContent').val();
                
                if(message != '') {
                    $.ajax({
                        data: { message: message },
                        type: "POST",
                        url: "profiles/lowkeynerd.php",
                        success: function() {
                            $('#newMessageContent').val('');
                        }
                    });
                }
                
                if($.trim(message) == ''){
                    
                    aryaMessage("You haven't typed any message.");
                    return;
                }
                
                $("#newMessageContent").val(null);
            $('#newMessageContent').prop('selectionStart',0);

            userMessage(message);

            $("#chatArea").animate({ scrollTop: 500 }, 1000);
            
                
            if (message.indexOf('train:') >= 0 || message.indexOf('train :')>=0){
                
            $.ajax({
            type: "GET",
            url: '/profiles/lowkeynerd.php',
            data: { training: message },
            success: function(data){
                aryaMessage(data);
                
            }
         });
                
                
            }
                else{
        elses = message;
        $.ajax({
            type: "GET",
            url: '/profiles/lowkeynerd.php',
            data: {info: message },
            success: function(data){
        console.log(data);

                aryaMessage(data);
            }
         });
                }

            });
                
                

            });
            
        

        
        
        function aryaMessage(message){

            $('#chatArea').append(
              `
            <div class="chat-message row">

            <p class="chat-name col-2">Arya :</p>
          <span class="message col-10">${message}</span>

            </div>`
        );

    }
        
        
        function userMessage(message) {
              $('#chatArea').append(
                `
                <div class="chat-message row">

                <p class="chat-name col-2">You :</p>
                <span class="message user-message col-10">${message}</span>

            </div>`  
        );
    }
                  
    </script>
    
    
</body>
</html>