<?php
    
 require 'db.php';
 include_once("../answers.php");
    
 if (!defined('DB_USER')){
            
   require "../config.php";
 }
//define('DB_HOST', "localhost");
//define('DB_DATABASE', "hng_fun");
//define('DB_USER', "root");
//define('DB_PASSWORD', "");

    try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
 global $conn;
    

        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;
 
$result2 = $conn->query("Select * from interns_data where username = 'pearl'");
  
$user = $result2->fetch(PDO::FETCH_OBJ);
    
    
    //checking for post request
    
function test_input($data) {
  $data = trim($data);
  $data = chop($data);
  $data = trim($data, "?");
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
       
        $question =test_input($_POST["displayMessage"]);
        //bot version
        if($question == "aboutbot"){
            $reply = "Pearlbot v1.0";
                       $response = array('status'=>3,'answer'=> $reply);
                       echo json_encode($response); 
        }else{
        
        //check if pearbot is to be trained
        $train = explode(':', $question);
        if($train[0] == 'train'){
            $inputQuestion = explode('#', $train[1]);
            $password = 'password';
            if(!count($inputQuestion)<3 && test_input($password) === test_input($inputQuestion[2])){
                if (test_input($inputQuestion[0]) && test_input($inputQuestion[1]) != " "){
                    $dataQuestion = test_input($inputQuestion[0]);
                    $dataAnswer = test_input($inputQuestion[1]);
                    
                    //is the question or answer already in the database
                    $select = $conn->query("Select * from chatbot where question LIKE '%$dataQuestion%'");
                    $select ->setFetchMode(PDO::FETCH_ASSOC);
                    $fetch = $select->fetchAll();
                    if($fetch){
                        $reply = "Do you want to overwrite my knowledge. <br /> Sorry only my creator can";
                       $response = array('status'=>3,'answer'=> $reply);
                       echo json_encode($response); 
                    }
                    else{
                        //save into the database as a new question
                        $insert = "Insert into chatbot (question, answer) values ('$dataQuestion', '$dataAnswer')";
                        
                        if($conn->query($insert)){
                            $reply = "Thanks for your help, I appreciate";
                            $response = array('status'=>4, 'answer'=>$reply);
                            echo json_encode($response);
                        }else{
                            $reply = "Something went wrong please try again";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                        }
                    }
                    //saving to database ends here
                    
                }else{
                    $reply = "Seems you don't follow instructions.<br> Training Format: train:question#answer#password";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                }
            }else{
                    $reply = "Seems you don't follow instructions.<br> Training Format: train:question#answer#password";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                }
        }else{
      //retrieving answers to questions from the database 
        $question = test_input($_POST["displayMessage"]);
        $answer = $conn->query("Select * from chatbot where question LIKE '%$question%'");
        
        $answer ->setFetchMode(PDO::FETCH_ASSOC);
        $ans = $answer->fetchAll();
        if (count($ans) > 0) {
    
          $choseRandom = rand(0, count($ans)-1);
          $response = $ans[$choseRandom]['answer'];
          $response = array('status'=>1,'answer'=> $response);
          echo json_encode($response);
    
        }
        else{
            $error = "I don't seem to understand you <br> You can train me on that.";
            $response = array('status'=>2, 'answer'=> $error);
            echo json_encode($response); 
        }
     
    }
  }
}else{
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>HNG Test</title>
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

<style>
	* {
    box-sizing: border-box;
}
.container{
    width: 100%;
    text-align: justify;
    line-height: 1.2;
}
.header{
    width: 100%;
    height: 55px;
    line-height: 1.2px;
    color: #fff;
    padding: 20px;
    font-size: 24px;
    background-color: #7a8690;
    margin-top: -10px;
}
.header span{
    margin-left: 70px;
}
#intro{
        background-image: url(http://res.cloudinary.com/duxoxictr/image/upload/v1523623853/coding-laptop.png);
        max-width: 100%;
        height: 450px;
    }
#intro-span{
    padding-top: 150px;
}
#intro-span #main{
    background-color: rgba(0, 0, 0, 0.73);
    width: 350px;
    color: #fcfcfc;
    font-size: 20px;
    padding: 20px;
    text-align: left;
    margin: 0 auto;
}#intro-span #main #me{
    font-size: 25px;
    font-weight: 400px;
}#intro-span #main span{
    font-size: 16px;
}

.main{
    background-color: rgba(255, 255, 255, .9);
    width: 100%;
    padding: 20px;
    margin: 0 auto;
    text-align: left;
    z-index: 6px;
}
h1{
    font-size: 30px;
}
h1, h2, p{
    font-family: serif;
}
.img{
    min-width: 40%;
    height: 270px;
    padding: 15px;
    margin-top: -30px;
}
.img2{
    width: 0px;
    height: 0px;
    display: none !important;
}
#caption{
    width: 55%;
}
.mission{
    background-color: #e1e3ef;
    border: 4px solid #c1c1c1;
    padding: 8px;
    border-radius: 0px 10px;
    margin-top: 20px;
}
.school{
    border-left: solid 4px #667c90;
    padding: 10px;
    margin-right: 5px;
}
.school span{
    font-size: 18px;
    font-family: fantasy;
}
.school #g{
    color: #4285f4;
}.school #o1{
    color: #ea4335;
}.school #o2{
    color: #fbbc05;
}.school #l{
    color: #34a853;
}
.inLove{
    margin-left: 20px;
    margin-bottom: -20px;
}
#mobile1{
width: 60%;
background-color:#34a853;
}
footer{
    width: 95%;
    text-align: center;
    background-color: #47484b;
    margin: 0 auto;
    color: #fff;
    padding: 5px;
}
footer a{
    text-decoration: none;
    color: #fff;
}
footer #link{
    border-right: solid 2px #fff;
    padding: 6px;
}
#chatbot{ 
    float: right;
    width: 320px;
    max-height: 320px;
    background-color: #fff;
    text-align: center;
    margin-top: 0px;
    margin-left: 20px; 
    margin-bottom: 100px;
    margin-right: 20px;
    position: absolute;
    display: none;
}
#chat, #displayHidden{
  height: 60px;
    background-color: #7a8690;
    width: 100%;
    padding-top: 10px;
    color: #e5e5e5;
    font-size: 20px;
    font-weight:bold;
}
#displayHidden:hover{
    color: #7a8690;
    background-color: #fff;
}#button:hover{
    color: #7a8690;
    background-color: #fff;
}
#chatMessages{ 
    width: 100%;
    overflow-x: hidden;
    max-height: 250px;
}
button{
    font-size: 20px;
    font-weight:bold;
}
#messageReceived, #messageSent, #message{
    margin: 10px;
    padding: 15px;
    text-align: center;
}
#messageReceived{
    background-color: #dedede;
    width: 50%;
    float: left;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    border-bottom-left-radius: 50px;
    border: #fff 2px solid;
}#messageSent{
    background-color: #fff;
    float: right;
    width: 50%;
    border: #dedede 2px solid;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    border-bottom-left-radius: 50px;
}
#chat_message{
    height: 40px;
}
@media only screen and (max-width: 500px) {
    .img{
        width: 0px;
        height: 0px;
    }.img2{
        width: 100%;
        height: 400px;
        margin-top: -45px;
        padding: 20px;
    }
    #caption{
       width: 100%;
        margin-top: -20px;
    }
    .get-started{
        padding: 20px;
    }
}
@media only screen and (min-width: 501px) {
    .img{
        width: 40%;
        float: right;
        height: auto;
    }
    #caption{
        width: 60%;
    }
}@media only screen and (max-width: 420px) {
    #chatbot{
        width: 80%;
    }
    
}@media only screen and (max-width: 460px) {
    .header span{
        margin-left: 0px;
    }
    #intro-span #main{
        width: 90%;
    }
    .img2{
        width: 0px;
        height: 0px;
    }
    .mission{
        width: 100%;
        text-align: left;
    }
    #caption{
        margin-top: -20px;
    }
    .get-started{
        padding: 10px;
    }
    .get-started h1{
        text-align: left;
    }
    footer #link, footer #link2, footer p{
        border: 0px;
        display: block;
        padding: 6px;
        text-align: left;
    }
}@media only screen and (max-width: 850px) {
    .get-started{
        padding: 10px;
    }

}
@media only screen and (min-width: 850px) {
    .img{
        height: 500px;
    }

}

</style>
</head>
<body cz-shortcut-listen="true">

	<div class="oj-flex oj-flex-item">
	<div class=" container">
		<header>
			<div class="header">
                <span class="oj-text-xm"><?php echo $user->name ?></span>
     </div>
		</header>

        <div id="intro">
            <div id="intro-span">
                <div id="main">
                    Hi, I am<br /><span id="me"><?php echo $user->name ?></span><br />
                    <span>A Software Developer</span>
                </div>
            </div>

<!--Checking for questions in the database -->
<?php
    
?>
            
            <!--Chat Bot-->
            <div class="oj-panel oj-panel-shadow-md" id="displayHidden" style="width:120px;height:50px;text-align:center;position:relative;margin:10px 20px;float:right;">Let's Chat</div>
            <div id="chatbot" style="margin:-100px 20px;">
                <div id="chat" style="">
                    <span>Meet Pearlbot</span>
                    <button id="button" style="float:right; margin-right:10px;"><span>-</span></button>
                    <span><?php echo "" . date("h:i:a"); ?></span>
                </div>
                <div id="main_chat">
                    <div id="chatMessages">
                        <div id="message" style="background-color:#dedede;">Hi I am Pearlbot, I have been created to read user location, read user ip address</div>

                    </div>
                </div>
          

                <form action="" id="pearlbot_form" method="post">
                     <div class="input-group">
                       <input class="form-control chat_input" id="chat_message" name="entered_message" placeholder="Start Typing...">
                        
                     </div>
               </form>
            </div>
        </div>
		
        
        
        <section class="main">
			<div class="get-started">
                <h1 class="oj-text-xm">Meet <?php echo $user->username ?></h1>
                <div>
                    <img class="img"  src="<?php echo $user->image_filename ?>" alt="She Codes" /></div>
                <p class="oj-panel oj-panel-shadow-md" id="caption"><b>My mission for HNG Internship:</b> Be a world class developer, initiate and complete innovative projects, and have a voice in the technology ecosystem. </p>
                
                <p>Anyway, this is the “About” page, so I should probably tell you my story.
                </p>
                <p>
                    <em><\Insert Flashback Sequence></\Insert></em>
                </p>
                <p>In my younger days, I was on the track towards medical school(Medcine and Surgery), but was detoured on the way by the quest for Admission. As years passed I settled for an alternative course (Computer Science), then did I realized humanity can be helped or even saved through software development.</p>
                <h3 class="inLove">She Fell in Love</h3>
                <p class="school">I found the love of my life few months before Industrial Training, a friend of mine one afternoon came to my room so excited, she wanted to demonstrate something to me but I was watching movie(that’s what majority of students do with their PC, I was no different). Her excitement was overwhelming that I gave her an opportunity. Guess what! she wrote some foreign characters, opened my browser and boom!!! the miracle happened; <span id="g">G</span><span id="o1">o</span><span id="o2">o</span><span id="g">g</span><span id="l">l</span><span id="o1">e</span> written bodily with its 4 different colours appeared on the screen, immediately I fell in love.
My love grew into passion that I gave up my little savings to learn web development using java for back end. The journey have not been easy but I have this inner peace that am doing what I love the most.</p>
                
                <h2 style="text-align:left;" class="oj-listview-card-layout">Skills</h2>
                <p>Web Development <span style="font-weight:bold;">60%</span>(HTML, CSS. JAVASCRIPT, JQUERY, JAVA EE)</p>
	
                <p>Mobile Development <span style="font-weight:bold;">40%</span>(JAVA)</p>
            </div>
        </section>
        
		<footer>
				<p class="meta">
                    <a id="link" href="http:/linkedin.com/in/chiamaka-osumgba-7ba8a9145/" target="_blank">LinkedIn</a>
                    <a id="link" href="https://github.com/osumgbachiamaka" target="_blank">Github</a><a id="link" href="https://www.facebook.com/chiamaka.pearl1" target="_blank">Facebook</a><a id="link" href="http:/instagram.com/kindnessosumgba" target="_blank">Instagram</a>
                    <a id="link2" href="https://twitter.com/KindnessOsumgba" target="_blank">Twitter</a>
                </p>
		</footer>
    </div>
    <script type="text/javascript" src="../../bootcamp-v1/js/jquery.min.js"></script>
    <script>
        
        var chatting = document.querySelector("#chatbot");
        var chat = document.querySelector("#displayHidden");
        chat.addEventListener("click", function(){
            chat.style.display="none";
            chatting.style.display="block";
        });
        var button = document.querySelector("#button");
        button.addEventListener("click", function(){
        chatbot.style.display="none";
            chat.style.display="block";
        });

      
    </script>
    <script>
        $(document).ready(function() {
    $("#pearlbot_form").on("submit", function (event) {
        event.preventDefault();
        
        var message = $("#chat_message").val();
        var messageContainer = $("#chatMessages");

        if (message == "") {
            $("#chat_message").focus();
        } else {
            $("#chatMessages").append('<div id="messageSent">' + message + '</div>');

            $.ajax({
                url: './profiles/pearl.php',
                type: 'POST',
                data: {displayMessage: message},
                dataType: 'json'
            }).done(function(resp) {
                if(resp.status == 5){
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else if(resp.status == 4){
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else if(resp.status == 3){
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else if (resp.status == 2) {
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                } else if (resp.status == 1) {
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else {
                    alert(resp.answer);
                }
            }).fail(function(error) {
                console.log("Request failed: " + error.statusText)
                console.log(error)
            })
        }
    });
    
});



    </script>
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.0.0/3rdparty/require/require.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</div>
</body>
</html>
    <?php
                }
            ?>
