<?php

try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $data['secret_word'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['input_text'];
  //  $data = preg_replace('/\s+/', '', $data);
    $temp = explode(':', $data);
    $temp2 = preg_replace('/\s+/', '', $temp[0]);
    
    if($temp2 === 'train'){
        train($temp[1]);
    }elseif($temp2 === 'aboutbot') {
        aboutbot();
    }else{
        getAnswer($temp[0]);
    }
}

function aboutbot() {
    echo "<div id='result'>My  name is davbot v1.0 - I'm a chatbot, I get input and process it in other to display the result, if there is no result you can instruct me on how to get such result!</div>";
}
function train($input) {
    $input = explode('#', $input);
    $question = trim($input[0]);
    $answer = trim($input[1]);
    $password = trim($input[2]);
    if($password == 'password') {
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();

        if(empty($data)) {
            $training_data = array(':question' => $question,
                ':answer' => $answer);

            $sql = 'INSERT INTO chatbot ( question, answer)
          VALUES (
              :question,
              :answer
          );';

            try {
                $q = $GLOBALS['conn']->prepare($sql);
                if ($q->execute($training_data) == true) {
                    echo "<div id='result'>Thank you for teaching me new words, it seem you are very good in lecturing. I will like you to teach me more next time!</div>";
                };
            } catch (PDOException $e) {
                throw $e;
            }
        }else{
            echo "<div id='result'>I already understand this. Teach me something new!</div>";
        }
    }else {
        echo "<div id='result'>Invalid Password, Try Again!</div>";

    }
}

function getAnswer($input) {
    $question = $input;
    $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
    $q = $GLOBALS['conn']->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetchAll();
    if(empty($data)){
        echo "<div id='result'>Sorry, I am not understanding you. I am a currently developing, to train me, simply type - 'train: question # answer # password' (without quote)</div>";
    }else {
        $rand_keys = array_rand($data);
        echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Profile page</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
    <style media="screen">

    .chatbot-container{
      background-color: #F3F3F3;
      width: 400px;
      height: 500px;
      margin: 10px;
      box-sizing: border-box;
      box-shadow: -3px 3px 5px gray;
    }
    .chat-header{
      width: 400px;
      height: 50px;
      background-color: #000;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 1.5em;
    }
    #chat-body{     
        display: flex;
        flex-direction: column;
        padding: 10px 20px 20px 20px;
        background: white;           
        overflow-y: scroll;
        height: 395px;
        max-height: 395px;
    }
    .message{
      background-color: #000;
      color: white;
      font-size: 0.8em;
      width: 250px;
      display: inline-block;
              padding: 10px;
      margin: 5px;
              border-radius: 10px;
                line-height: 18px;
    }
    .bot_chat{
      text-align: left;

    }
    .bot_chat .message{
      background-color: #000;
      color: white;
      opacity: 0.9;
      box-shadow: 3px 3px 5px gray;
    }
    .user_chat{
      text-align: right;
    }
    .user_chat .message{
      background-color: #E0E0E0;
      color: black;
      box-shadow: 3px 3px 5px gray;
    }
    .chat-footer{
      background-color: #F3F3F3;
    }
    .input-text-container{
      margin-left: 20px;
    }
    .input_text{      
      width: 370px;
      height: 35px;
      padding: 5px;
      margin-top: 8px;
      border: 0.5px solid #000;
      border-radius: 5px;
    }
    .send_button{
      width: 75px;
      height: 35px;
      padding: 5px;
      margin-top: 8px;
      color: white;
      border:none;
      border-radius: 5px;
      background-color: #000;
    }.myfooter{
      margin: 100px 0px 50px 0px;
      font-size: 0.9em;
    }.footer_line{
      padding: 0px;
      margin-bottom: 20px;
      border: 0.5px solid #34495E;
      background-color: #34495E;
      width: 100%;
    }
    .grey-text{
      text-decoration: none;
    }
    /**/
    .mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    float:right;padding-left:10px;
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
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:whitesmoke;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#e0e0de;
    height:450px;
    overflow:hidden;
    padding:0;
}
.frame > div:last-of-type{
    position:absolute;bottom:0;width:100%;display:flex;
}
body > div > div > div:nth-child(2) > span{
    background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;
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
  background-image: url("https://res.cloudinary.com/gyrationtechs/image/upload/v1526053526/bg.jpg");
  
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  margin: 0px;
  padding: 0px;
 }
.navbar{
  width: 100%
  padding: 20px;
  position: fixed;
  top: 0px;
  transition: .5s;
}
.navbar ul li{
  list-style-type: none;
  display: inline-block;
  padding: 10px 15px;
  color: white;
  font-size: 24px;
  font-family: sans-serif;
  cursor: pointer;
  float: right;
  border-radius: 10px;
  transition: .5s;
}
.navbar ul li:hover{
  background: orange;
}
.navbar,
.text-center{
  text-align: center;
}
      .personal-image img{
        border-radius: 50%;
        width: 200px;
        height: 200px;
      }
      .personal-image p{
        border-left: 3px black;
        border-right: 3px black;
        font-size: 20px;
        text-align: center;
        font-family: Playball;
        margin: 0;
        padding: 0;
      }
      .personal-image h4{
        font-size: 35px;
        text-align: center;
        margin-top: 0em;
      }
      .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
      margin-top: 10%;
      }
      .personal-image h4 {
        font-family:  sans-serif;
        margin-bottom: 0em;
      }
      .personal-image p{
        font-family: Arial;
        margin-top: 0em;
        padding-top: 0em;
        color: #a90909;
	font-weight: bold;
        margin-bottom: 0em;
      }
      .social-page{
        margin-top: 0em;
      }
      .social-page img{
        width: 30px;
        height: 30px;
        padding-bottom: 0;
      }
.text-center{
  text-align: center;
}
.box{
  display: inline-block;
  background-color: grey;
  width: 100%;
  height: 50px;
}
.box p{
  font-size: 16px;
  text-align: center;
  padding-top: 10px;
  color: #430f0f;
}

.box span {
text-align: center;
  padding-top: 10px;
  color: #430f0f;
}
p {
font-size: 18px;
color: #430f0f
}

.personal-image span {
font-size: 14px;
text-align: center;
font-family: verdana;
color: #fff;
left: 30%; 
right: 30%;
}
/*legend*/

.chatbot-container{
      background-color: #F3F3F3;
      width: 500px;
      height: 500px;
      margin: 10px;
      box-sizing: border-box;
      box-shadow: -3px 3px 5px gray;
    }
    .chat-header{
      width: 500px;
      height: 50px;
      background-color: #1380FA;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 1.5em;
    }
    #chat-body{     
        display: flex;
        flex-direction: column;
        padding: 10px 20px 20px 20px;
        background: white;           
        overflow-y: scroll;
        height: 395px;
        max-height: 395px;
    }
    .message{
      background-color: #1380FA;
      color: white;
      font-size: 0.8em;
      width: 300px;
      display: inline-block;
              padding: 10px;
      margin: 5px;
              border-radius: 10px;
                line-height: 18px;
    }
    .bot_chat{
      text-align: left;

    }
    .bot_chat .message{
      background-color: #1380FA;
      color: white;
      opacity: 0.9;
      box-shadow: 3px 3px 5px gray;
    }
    .user_chat{
      text-align: right;
    }
    .user_chat .message{
      background-color: #E0E0E0;
      color: black;
      box-shadow: 3px 3px 5px gray;
    }
    .chat-footer{
      background-color: #F3F3F3;
    }
    .input-text-container{
      margin-left: 20px;
    }
    .input_text{      
      width: 370px;
      height: 35px;
      padding: 5px;
      margin-top: 8px;
      border: 0.5px solid #1380FA;
      border-radius: 5px;
    }
    .send_button{
      width: 75px;
      height: 35px;
      padding: 5px;
      margin-top: 8px;
      color: white;
      border:none;
      border-radius: 5px;
      background-color: #1380FA;
    }.myfooter{
      margin: 100px 0px 50px 0px;
      font-size: 0.9em;
    }.footer_line{
      padding: 0px;
      margin-bottom: 20px;
      border: 0.5px solid #34495E;
      background-color: #34495E;
      width: 100%;
    }
    .grey-text{
      text-decoration: none;
    }

/**/
</style>
  </head>
  <body>
<div class="personal-image">
  <img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526012343/David.jpg" alt="my image" class="center">
        
        <h4 style="color: #fff">David Ozokoye</h4>
        <p>Front End Web developer / AI (chabot) developer / HNG Intern </p><br>
        <div class="social-page text-center">
	<span> What's up, I'm David a Web developer based in Nigeria. I am a fan of technology, design and entrepreneurship. <br> I'm also interested in web development and programming. Get in touch with me via any of my social handle below.</span> <br><br>
          <a href="https://www.facebook.com/davis5nd"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051537/fb.png"></a>
          <a href="https://www.twitter.com/gyrationtech"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051669/twitter.png"></a>
          <a href="https://www.linkedin.com/in/david-ozokoye"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051162/link.jpg" ></a>
          <a href="https://www.github.com/gyrationtechs"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526052030/git.png"></a>
 </div>
 <div class="chatbot-container">
<!-- CHAT BOT HERE -->
<div class="chat-header">
<span>davBot UI</span>
</div>
<div id="chat-body">
<div class="bot_chat">
<div class="message">Hello! My name is davbot.<br>I'm able to attend to any of your question, so feel free to ask me anything!.<br>Type <span style="color: #FABF4B;"><strong> aboutbot</strong></span> to know more about me.
</div>

</div>
</div>
<div class="chat-footer">
<div class="input-text-container">
<form action="" method="post" id="chat-input-form">
<input type="text" name="input_text" id="input_text" required class="input_text" placeholder="Type your question here...">
<button type="submit" class="send_button" id="send">Send</button>
</form>
</div>        
</div>
</div>
</div>  
<!---->

      </div><br><br>
      <script >
  window.Sorry, I am not understanding you. I am a currently developing, to train me, simply type - 'train: question # answer # password' (without quote) = function(a){
    a.init({
      appUISetting:"%7B%22openMode%22%3A%7B%22text%22%3A%22davBot%20UI%22%2C%22height%22%3A390%2C%22width%22%3A320%7D%2C%22closeMode%22%3A%7B%22text%22%3A%22davBot%20UI%22%2C%22width%22%3A200%2C%22displayType%22%3A%22rectangular%22%7D%2C%22common%22%3A%7B%22logo%22%3A%22https%3A//www.gupshup.io/images/botwidget/ic_dummy_chat_g.png%22%2C%22imgDispType%22%3A%22circular%22%2C%22bgColor%22%3A%22%23090909%22%2C%22fontSize%22%3A16%2C%22fontColor%22%3A%22%23ffffff%22%7D%2C%22content%22%3A%7B%22bot%22%3A%22//www.buildquickbots.com/widget/bots/9f2b71f6e25b5651172f3fb230f1f952/8c85312b892047b9a7f4ae7d905cefa0/bot.png%22%2C%22botBubbleColor%22%3A%22%23161212%22%2C%22botFontColor%22%3A%22%23e7dfdf%22%2C%22user%22%3A%22https%3A//www.gupshup.io/images/botwidget/ic_user.png%22%2C%22userBubbleColor%22%3A%22%23232dd2%22%2C%22userFontColor%22%3A%22%23ffffff%22%2C%22pageTitle%22%3A%22davBot%20UI%22%2C%22fontSize%22%3A14%2C%22fontFamily%22%3A%22sans-serif%22%7D%2C%22config%22%3A%7B%22persistenceMenu%22%3A%22%7B%5C%22disableinput%5C%22%3Afalse%2C%5C%22menu%5C%22%3A%5B%7B%5C%22title%5C%22%3A%5C%22Level1%20-%20Element1%5C%22%2C%5C%22type%5C%22%3A%5C%22nested%5C%22%2C%5C%22menu%5C%22%3A%5B%7B%5C%22title%5C%22%3A%5C%22Level2%20-%20Element1%5C%22%2C%5C%22type%5C%22%3A%5C%22text%5C%22%7D%2C%7B%5C%22title%5C%22%3A%5C%22Level2%20-%20Element2%5C%22%2C%5C%22type%5C%22%3A%5C%22nested%5C%22%2C%5C%22menu%5C%22%3A%5B%7B%5C%22title%5C%22%3A%5C%22Level3%20-%20Element1%5C%22%2C%5C%22type%5C%22%3A%5C%22text%5C%22%7D%5D%7D%2C%7B%5C%22title%5C%22%3A%5C%22Level2%20-%20Element4%5C%22%2C%5C%22type%5C%22%3A%5C%22nested%5C%22%2C%5C%22menu%5C%22%3A%5B%7B%5C%22title%5C%22%3A%5C%22Level3%20-%20Element1%5C%22%2C%5C%22type%5C%22%3A%5C%22text%5C%22%7D%5D%7D%2C%7B%5C%22title%5C%22%3A%5C%22Level2%20-%20Element5%5C%22%2C%5C%22type%5C%22%3A%5C%22text%5C%22%7D%5D%7D%2C%7B%5C%22title%5C%22%3A%5C%22Level2%20-%20Element4.1%5C%22%2C%5C%22type%5C%22%3A%5C%22text%5C%22%7D%5D%7D%22%2C%22perMenuImg%22%3A%22%22%2C%22attachment%22%3A%22Yes%22%2C%22widgetType%22%3A%22Text%22%2C%22msgEnc%22%3A%22No%22%2C%22webView%22%3A%22Yes%22%2C%22RDStatus%22%3A%22No%22%2C%22isResponsive%22%3A%22Yes%22%2C%22allowHtmlFromBot%22%3A%22Yes%22%2C%22callback%22%3A%22Sorry%2C%20I%20am%20not%20understanding%20you.%20I%20am%20a%20currently%20developing%2C%20to%20train%20me%2C%20simply%20type%20-%20%27train%3A%20question%20%23%20answer%20%23%20password%27%20%28without%20quote%29%22%7D%7D",
      version: "3"
    });
  };
  (function(d, s, id){
    var js, tjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    var ts = new Date().getTime();
    js.src = '//www.buildquickbots.com/botwidget/v3/demo/static/js/sdk.js?v=3&ts='+ts;
    js.setAttribute("callback","Sorry, I am not understanding you. I am a currently developing, to train me, simply type - 'train: question # answer # password' (without quote)");
    js.setAttribute("key","98f4afed-4433-43d6-ad8f-4fc7673c4ab6");
    tjs.parentNode.insertBefore(js, tjs);
  }(document, 'script', 'gs-sdk'));
</script>
<!--My script here-->
<script>
    var outputArea = $("#chat-body");

    $("#chat-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#input_text").val();

        outputArea.append(`<div class='user_chat'><div class='message'>${message}</div></div>`);


        $.ajax({
            url: 'profile.php?id=david',
            type: 'POST',
            data:  'input_text=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='bot-chat'><div class='message'>" + result + "</div></div>");
                    $('#chat-body').animate({
                        scrollTop: $('#chat-body').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });


        $("#input_text").val("");

    });
</script>
</body>
</html>
<?php

    if(!defined('DB_USER')){
    require "../../config.php"; 
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
  }

    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="david"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>