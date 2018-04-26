
<?php
    session_start();
    require('answers.php');
                $dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE;
   $db = new PDO($dsn, DB_USER,DB_PASSWORD);
   $codeQuery = $db->query('SELECT * FROM secret_word ORDER BY id DESC LIMIT 1', PDO::FETCH_ASSOC);
     $secret_word = $codeQuery->fetch(PDO::FETCH_ASSOC)['secret_word'];
                                $detailsQuery = $db->query('SELECT * FROM interns_data WHERE name = \'Tiarayuppy\' ');
    $username = $detailsQuery->fetch(PDO::FETCH_ASSOC)['username'];
    if(isset($_POST['message']))
    {
                    array_push($_SESSION['chat_history'], trim($_POST['message']));
                    if(stripos(trim($_POST['message']), "train") === 0)
        {
          
                    $args = explode("#", trim($_POST['message']));
                    $question = trim($args[1]);
          $answer = trim($args[2]);
          $password = trim($args[3]);
          if($password == "password")
          {
              // Password perfect
            $trainQuery = $db->prepare("INSERT INTO chatbot (question , answer) VALUES ( :question, :answer)");
            if($trainQuery->execute(array(':question' => $question, ':answer' => $answer)))
            {
                array_push($_SESSION['chat_history'], "That works! okay continue chatting");
            }
            else
            {
                array_push($_SESSION['chat_history'], "Something went wrong somewhere");
            }
          }
          else
          {
              // Password not correct
             array_push($_SESSION['chat_history'], "The password entered was incorrect");
          }
        }
        else
        {
            // Not Training
          $questionQuery = $db->prepare("SELECT * FROM chatbot WHERE question LIKE :question");
          $questionQuery->execute(array(':question' => trim($_POST['message'])));
          $qaPairs = $questionQuery->fetchAll(PDO::FETCH_ASSOC);
          if(count($qaPairs) == 0)
          {
                    $answer = "Sorry, I cant understand your details";
          } else
          {
            $answer = $qaPairs[mt_rand(0, count($qaPairs) - 1)]['answer'];
            $bracketIndex = 0;
            while(stripos($answer, "{{", $bracketIndex) !== false)
            {
              $bracketIndex = stripos($answer, "{{", $bracketIndex);
              $endIndex = stripos($answer, "}}", $bracketIndex);
              $bracketIndex++;
                  $function_name = substr($answer, $bracketIndex + 1, $endIndex - $bracketIndex -1);
                  $answer = str_replace("{{".$function_name."}}", call_user_func($function_name), $answer);
            }
          }
          array_push($_SESSION['chat_history'] , $answer);
        }
    }
    if(!isset($_SESSION['chat_history']))
    {
                $_SESSION['chat_history'] = array('Hello! How can I help? Ask for my help. To train me, enter the command "train # question # answer # password');
    }
    $messages = $_SESSION['chat_history'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>TiaraYuppy - HNG Internship</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://rawgit.com/tiarayuppy/chatscript/master/chatbot.js"></script>

<style>
.navbar-nav > li > a {
    padding-top: 10px;
    padding-bottom: 10px;
    line-height: 0px !important;
}
 
 .mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:40% !important;display:flex !important;flex-direction:column !important;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left ;padding-right:10px;
}        
.text-r{
    float:right !important;
    padding-left:10px !important;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:20px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:left;background:whitesmoke;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#e0e0de;
    height:500px;
    overflow:hidden;
    padding:0;
    width: 50%;
    border: 2px;
    overflow-y: scroll;
    scroll-behavior: auto;
}
/* width */
::-webkit-scrollbar {
    width: 10px;
}
/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #888; 
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; 
}
.frame > div:last-of-type{
    position:absolute;bottom:0;width:100%;display:flex;
}
body > div > div > div:nth-child(2) > span{
    background: blue;
    padding: 10px;
    font-size: 21px;
    border-radius: 50%;
}
body > div > div > div.msj-rta.macro{
    margin:auto;margin-left:1%;
}
ul {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:47px;
    display:flex;
    flex-direction: column;
    top:0;
    overflow-y:scroll;
}
.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}  
body{
    margin-bottom: 100px;
}
.card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
}
.card .card-heading {
    padding: 0 20px;
    margin: 0;
}
.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}
.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}
.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}
.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}
.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}
.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}
.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}
.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}
.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}
.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}
.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}
.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}
.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}
.card.people:first-child {
    margin-left: 0;
}
.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}
.card.people .card-top.green {
    background-color: #53a93f;
}
.card.people .card-top.blue {
    background-color: #427fed;
}
.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}
.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}
.card.hovercard .cardheader {
    background: url("http://lorempixel.com/850/280/nature/4/");
    background-size: cover;
    height: 155px;
}
.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}
.card.hovercard .avatar img {
    width: 100%;
    height: 100%;
    max-width: 200px;
    max-height: 200px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}
.card.hovercard .info {
    padding: 4px 8px 10px;
}
.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 35px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}
.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 20px;
    line-height: 50px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  
}
.color{
    background-color: #e2e2e2;
}
.btn-sm-github{
    color: #070707;
    background-color: #070707;
}
#time{
    display-content:center;
}
#demo {
            /*background-color: #ffffff;*/
            width: 80%;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: #F8F8F8;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px #999;
            line-height: 1.4em;
            font: 13px helvetica,arial,freesans,clean,sans-serif;
            color: black;
        }
        #demo input {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            width: 400px;
        height:300px;
        }
        .button {
            display: inline-block;
            background-color: darkcyan;
            color: #fff;
            padding: 8px;
            cursor: pointer;
            float: right;
        }
        #chatBotCommandDescription {
            display: none;
            margin-bottom: 20px;
        }
        input:focus {
            outline: none;
        }
        .chatBotChatEntry {
            display: none;
        }
        .chatBotChatEntry {
        padding: 20px;
        background-color: #fff;
        border: none;
        margin-top: 5px;
        font-family: 'open_sanslight', sans-serif !important;
        font-size: 17px;
        font-weight: normal;
    }
.chatBotChatEntry * {
    font-family: 'open_sanslight', sans-serif !important;
    font-size: 17px;
    font-weight: normal;
}
.chatBotChatEntry .origin {
    font-weight: bold;
    margin-right: 10px;
}
.chatBotChatEntry .imgBox {
    position: relative;
    width: 32%;
    display: inline-block;
    margin-top: 10px;
    margin-right: 10px;
    height: 218px;
    overflow: hidden;
}
.chatBotChatEntry .imgBox .actions .button {
    margin-top: 10px;
    font-size: 18px;
    padding: 5px;
    width: 50%;
}
.chatBotChatEntry .imgBox .actions {
    position: absolute;
    display: none;
    top: 31px;
    width: 100%;
    text-align: center;
}
.chatBotChatEntry .imgBox:hover .actions {
    display: block;
}
.chatBotChatEntry .imgBox .title {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 5px;
    color: #fff;
    background-color: #333;
    font-weight: normal;
    font-size: 16px;
}
    .chatBotChatEntry .imgBox img {
        width: 100%;
    }
    .bot {
        /*border: 4px solid rgba(0, 132, 60, 0.2);*/
        background-color: rgba(0, 132, 60, 0.2);
    }
    .human {
        /*border: 4px solid rgba(38, 159, 202, 0.2);*/
        background-color: rgba(38, 159, 202, 0.2);
    }
    #chatBotCommandDescription {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }
    .commandDescription span.phraseHighlight {
        color: chartreuse;
    }
    .commandDescription span.placeholderHighlight {
        color: deeppink;
    }
    .commandDescription {
        margin-top: 5px;
    }
    #chatBotConversationLoadingBar {
        background-color: darkcyan;
        height: 2px;
        width: 0;
    }
    .appear {
        animation-duration: 0.2s;
        animation-name: appear;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
    }
    @keyframes appear {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
 }
 .my-container
    {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: "Work Sans", sans-serif;
    }
    .content
    {
        display: flex;
        flex-direction: column;
    }
    .row
    {
        display: flex;
        width: 100%;
        justify-content: center;
        flex-direction: row;
    }
    .icon-row
    {
        display: flex;
        flex-direction: row;
        width: 70px;
        justify-content: space-between;
    }
    .chatbox
    {
        display: center;
        flex-direction: column;
        background-color: #c5f9f0;
        width: 40%;
        min-height: 500px;
        border-style: solid;
        border-width: 1px;
        border-radius: 20px;
        border-color:#1d3baf;
        margin-top: 25px;
        margin-bottom: 50px;
        margin-left: 400px;
    }
    .chat-area
    {
        display: flex;
        flex-direction: column;
        width: 100%;
        min-height: 450px;
        padding-top: 20px;
        padding-bottom: 10px;
        padding-right: 20px;
        padding-left: 20px;
        overflow: scroll;
        box-sizing: border-box;
    }
    .chat-controller
    {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 50px;
        border-top: 1px solid #1d3baf;
        box-sizing: border-box;
        font-size: 20px;
    }
    .chat-container
    {
        box-sizing: border-box;
        width: 80%;
        display: flex;
        padding-left: 30px;
    }
    .input-ctn
    {
        flex-direction: row-reverse;
    }
    .recieved-message-ctn
    {
        flex-direction: row;
    }
    .chat
    {
        min-height: 30px;
        padding: 10px;
        box-sizing: border-box;
        min-width: 30px;
        border-radius: 8px;
        font-size: 12px;
        margin-bottom: 5px;
        max-width: 60%;
    }
    .input
    {
        color: black;
        background-color: #ce2395;
        padding-left: 20px;
    }
    .recieved-message
    {
        background-color: transparent;
        color: black;
    }
    form{
        display: flex; 
        width: 100%;
    }
    input{
        box-sizing: border-box; 
        flex-grow: 3; 
        border-right: 1px solid #757575; 
        border-left: 0px;  
        border-top: 0px; 
        border-bottom: 0px; 
        background-color: 
        transparent; 
        margin-left: 5px; 
        height: 50px;
    }
</style>
<body class="color">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="http://res.cloudinary.com/tiarayuppy/image/upload/v1523634049/IMG_20171025_172725.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://res.cloudinary.com/tiarayuppy/image/upload/v1523634049/IMG_20171025_172725.jpg">Miracle Joseph</a>
                    </div>
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek| Woman in Tech</div>
              
                </div>                 
  
            </div>
        </div>
    </div>
</div>

      <div class="col-sm-6 col-sm-offset-5 frame" 
      style="box-shadow:2px 2px 4px 5px #ccc;
      background-color: #e1ecf7; 
      border: 2px; 
      margin-bottom: 30px;
      float: right;
      height: 100%;">
       <h4 style="text-align: center;">My Chat bot </h4>
            <ul></ul>
            <div>
        
            <?php for($index = 0; $index < count($messages); $index++ ) :?>
                      <div class="chat-container <?= ($index % 2 == 0) ? "recieved-message-ctn" : "input-ctn"  ?>">
                          <div class="chat <?= ($index % 2 == 0) ? "recieved-message" : "input"  ?>"><?= $messages[$index] ?></div>
                      </div>
                  <?php endfor; ?>
              </div>
            <div class="msj-rta macro" style="background: transparent;"> 
                     
            
                <div>
                <form action="/profile.php?id=Tiarayuppy" method="POST" class="w3-container w3-card-4" style="display: flex; width: 100%;">
                                      
                </div> 
                </div>                
            </div>
            <div class="text text-r" style="background:lightblue !important;"> 
                 
        <input type="text" name="message" class="mytext" lenght="40%" placeholder="Type a message" style="background: transparent;" />
        

                </div>
                <div style="padding-top: 0px;">
                    <input type="submit" value="send your message" style=" border-radius:10px; flex-grow: 1; background-color: green; color: #FAFAFA; float: right !important; "/>
                    </div>    
                
                </form>
            </div>
        </div> 

   <script>
    var sampleConversation = [
        "Hi",
        "My name is [name]",
        "Where is Hotels.ng?",
        "Where is  Nigeria",
        "Bye",
        "What is the time"
        
    ];
    var config = {
        botName: 'Tiarayuppy',
        inputs: '#humanInput',
        inputCapabilityListing: true,
        engines: [ChatBot.Engines.duckduckgo()],
        addChatEntryCallback: function(entryDiv, text, origin) {
            entryDiv.delay(200).slideDown();
        }
    };
    ChatBot.init(config);
    ChatBot.setBotName("Tiarayuppy");
    ChatBot.addPattern("^hi$", "response", "Hello, friend", undefined, "Say 'Hi' to be greeted back.");
    ChatBot.addPattern("^What is the time$", "response", "The Time is getTime()", undefined, "Say 'What is the time' to be greeted back.");
    ChatBot.addPattern("^bye$", "response", "See you later...", undefined, "Say 'Bye' to end the conversation.");
    ChatBot.addPattern("(?:my name is|I'm|I am) (.*)", "response", "hi $1, thanks for talking to me today", function (matches) {
        ChatBot.setHumanName(matches[1]);
    },"Say 'My name is [your name]' or 'I am [name]' to be called that by the bot");
    ChatBot.addPattern("(what is the )?meaning of life", "response", "42", undefined, "Say 'What is the meaning of life' to get the answer.");
    ChatBot.addPattern("compute ([0-9]+) plus ([0-9]+)", "response", undefined, function (matches) {
        ChatBot.addChatEntry("That would be "+(1*matches[1]+1*matches[2])+".","bot");
    },"Say 'compute [number] plus [number]' to make the bot your math calculator");
</script>   
<script>
    
  $(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })
</script>



</body>
</html>
