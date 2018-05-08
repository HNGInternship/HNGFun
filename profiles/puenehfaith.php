<?php
 include_once("../answers.php"); 
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
  $sql = "SELECT * FROM interns_data WHERE `username` = 'puenehfaith' LIMIT 1";
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $my_data = $q->fetch();
} catch (PDOException $e) {
  throw $e;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>pueneh</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">       
 body{
  padding-top: 60px;
    background-color: #0000ff;
    background-image:url(http://res.cloudinary.com/pueneh/image/upload/v1524600731/background.jpg);
    background-size:cover;
}
p{
  color: #ffffff;
}
h1{
  color: #ffffff;
  float: center;
}
h2{
  color: #000000;
}
ul{
  color: #ffffff;
}
h3{
  color: #ffffff;
}

#nav{
  background-color: white;
  color:white;
  float: right;
  width: 100%
  height:100px;
}
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}
#bodybox {
  margin: auto;
  max-width: 550px;
  font: 15px arial, sans-serif;
  background-color: white;
  border-style: solid;
  border-width: 1px;
  padding-top: 10px;
  padding-bottom: 15px;
  padding-right: 15px;
  padding-left: 15px;
  box-shadow: 3px 3px 3px grey;
  border-radius: 10px;
}

#chatborder {
  border-style: solid;
  background-color: #D2691E;
  border-width: 3px;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-left: 10px;
  margin-right: 20px;
  padding-top: 10px;
  padding-bottom: 15px;
  padding-right: 10px;
  padding-left: 5px;
  border-radius:15px;
}

.chatlog {
   font: 10px arial, sans-serif;
}
#chatbox {
  font: 10px arial, sans-serif;
  height: 15px;
  width: 100%;


h2 {
  margin: auto;
}

pre {
  background-color: #f0f0f0;
  margin-left: 15px;
}     
</style>
</head>

<body>
<?php
  require 'db.php';

$select = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $result= $select->fetch();
    $secret_word = $result['secret_word'];


$result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'puenehfaith'");
    $result2->setFetchMode(PDO::FETCH_ASSOC);
    $user = $result2->fetch()

?>
    
<div id="wrapper">
    
  <div id="header">
    <div id="nav"><a href="index.html">Home</a> | <a href="#">About Me</a> | <a href="#">Contact Me</a> | <a href="#">My Photos</a></div>
    <div id="bg"></div>
  </div>
  
  <div id="main-content">
    <div id="left-column">
      <div class="box">
            <h1style="text-align: center;"><strong>WELCOME TO MY PAGE</strong></h1>
          <h1>my name is <span id="me"><?php echo $user["name"]?></span></h1>
<p>This is my space. Here are some of my interests: </p>
        <ul style="margin-top:10px;">
          <li>Am a front end web developer</li>
          <li>I love coding</li>
          <li>Still learning</li>
          <li>want to be good in vue.js,react and angular.js</li>
        </ul>
      </div>
      <h2><strong>MORE ABOUT ME</strong></h2>
      <p>
        <img src="http://res.cloudinary.com/pueneh/image/upload/v1524830779/pix_6.jpg
" width="139" height="150" style="margin: 0 10px 10px 0;float:left;" />
        <em>"Am a foodie"</em><br/>
        <em>"Am easy going."</em><br/> 
        <em>"My fav color is red"</em><br/>
        <em>"i love travelling."</em><br/> 
      </p>
    </div>
    <div id="right-column">
      <div id="main-image"><img src="http://res.cloudinary.com/pueneh/image/upload/v1524830633/pix_5.jpg
" width="160" height="188" /></div>
      <div class="sidebar">     
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-linkedin"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
      </div>
    </div>
  </div>
    Copyright &copy; 2018 Pueneh Faith. All rights reserved.<br/>
  </div>
</div>div id='bodybox'>
  <div id='chatborder'>
    <p id="chatlog7" class="chatlog">&nbsp;</p>
    <p id="chatlog6" class="chatlog">&nbsp;</p>
    <p id="chatlog5" class="chatlog">&nbsp;</p>
    <p id="chatlog4" class="chatlog">&nbsp;</p>
    <p id="chatlog3" class="chatlog">&nbsp;</p>
    <p id="chatlog2" class="chatlog">&nbsp;</p>
    <p id="chatlog1" class="chatlog">&nbsp;</p>
    <input type="hello" name="Jayo" id="chatbox" placeholder="Heloo am Jayo! can you train me?." onfocus="placeHolder()">
  </div>
  <br>
  <br>
  <h2>jayo</h2>
  <p>i love making beads but i don't know alot about making one can you teach me how to make a beautiful neck piece? to train me use the keyword "train" your question #your answer #password.</p>
  <ul style="list-style-type:disc">
    <li>hello.</li>
    <li>hi dear you are welcome.</li>
  </ul>
  <br><pre><code>if (lastUserMessage === 'hi'){
  botMessage = 'hello!';
}</pre></code>
  <pre><code>if (lastUserMessage === 'what is your name'){
  botMessage = 'My name is' Jayo;
}</pre></code><pre><b>User:</b> I love beadmaking
<b>Chatbot:</b> Tell me more about bead making.</pre>
 </div>
</body>
<script src="<?=$home_url;?>vendor/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?=$home_url;?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).on('click', '.chat-btn', function(){
    $('.chatbot-menu').show();
    $('.chat-btn').hide();
    if ($(window).width() <= 767) {
        $(window).scrollTop($(window).height());
    }
});
$(document).on('click', '.chatbot-close', function(){
    $('.chatbot-menu').hide();
    $('.chat-btn').show();
});
$(document).on('click', '.chatbot-help', function(){
    help_menu = $('.chatbot-message-bot:first').html();
    $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">'+help_menu+'</p></div>');
    content_height = $('.chatbot-menu-content').prop('scrollHeight');
    $('.chatbot-menu-content').scrollTop(content_height);
});
// Chatbot send button handler
$(document).on('click', '.chatbot-send', function(e){
    e.preventDefault();
    bot_query = 'bot_query';
    message_string = $('input[name="chatbot-input"]').val();
    password = true;
    aboutbot = false;
    $('input[name="chatbot-input"]').val('');
    if (message_string.trim() === '') {
        message_string = '';
        payload = {'response':'empty', 'message':'Sorry, you cannot send an empty message.'};
        $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message"><p>'+payload.message+'</p></div>');
    }
    else {
        message_string = message_string.trim();
        payload = {'response':'success', 'message':message_string};
        $('.chatbot-menu-content').append('<div class="chatbot-message-sender" id="last-message"><p>'+payload.message+'</p></div>');
    }
    if (message_string.split(':')[0].trim() === 'train') {
        bot_query = 'bot_train';
        if (!message_string.includes('# password') && !message_string.includes('#password')) {
            password = false;
            $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">Sorry, you need to input a password</p></div>');
        }
        else if (message_string.trim().slice(-8) !== 'password') {
            password = false;
            $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">Sorry, I do not recognize this password, try again.</p></div>');
        }
        else {
            array_words = message_string.trim().split(':');
            parse_colon_delimiter = array_words[0].trim() + ': ' + array_words[1].trim();
            parse_hash_delimiter = parse_colon_delimiter.split('#');
            payload.message = parse_hash_delimiter[0].trim() + ' # ' + parse_hash_delimiter[1].trim();
            console.log(payload.message);
        }
    }
    else if (message_string.trim() === 'help') {
        help_menu = $('.chatbot-message-bot:first').html();
        $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">'+help_menu+'</p></div>');
    }
    else if (message_string.trim() === 'aboutbot') {
        aboutbot = true;
        version = "<div><p><span class='bot-command'>Locato v1.0</span></p></div> <div><p>Hi! I'm Locato</p><p>I want to help you with find distances between any two locations in Nigeria, eg distance between two addresses or cities, get the duration to move from one location to the other and also show you direction on map.</p></div>";
        $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">'+version+'</div>');
    }
    else if (message_string.split(' : ').length === 2 && !message_string.includes('#')) {
        bot_query = 'bot_command';
    }
    if (message_string.slice(0, 6) === 'train:') {
        $('.chatbot-message-sender:last').addClass('chatbot-train-message');
    }
    content_height = $('.chatbot-menu-content').prop('scrollHeight');
    $('.chatbot-menu-content').scrollTop(content_height);
    url = './profiles/christoph.php';
    if (location.pathname.includes('christoph.php')) {
        url = '../profiles/christoph.php'
    }
    
    // Use AJAX to query DB and look for matches to user's query
    if(message_string !== '' && message_string.trim() !== 'help' && password && !aboutbot) {
        $.ajax({
            url: url,
            data: bot_query+'='+payload.message,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message"><p>Give me some time, it takes some time for me to process...</p></div>');
                content_height = $('.chatbot-menu-content').prop('scrollHeight');
                $('.chatbot-menu-content').scrollTop(content_height);
                $('.chatbot-send').attr('disable');
            },
            success: function(data){
                console.log(data);
                $('.chatbot-message-bot:last > p').html(data.message);
                if (data.response === 'show_direction') {
                    $('.chatbot-message-bot:last > p').html('Click on <a href="'+data.message+'" target="_blank">'+data.message+'</a> to view directions on map');
                }
                if (data.response === 'training_error') {
                    training_menu = $('.training-menu').clone();
                    $('.chatbot-message-bot:last').html(data.message);
                    $('.chatbot-message-bot:last').append(training_menu);
                }
                $('.chatbot-send').removeAttr('disable');
            }
        });
    }
});
</script>
</html>
<?php endif; ?
