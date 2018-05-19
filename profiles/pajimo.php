<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (!defined('DB_USER')) {
      require "../../config.php";
      try {
         $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
         echo ("<p style='color:red'>bot</p> " + " I couldn't connect to knowledge base : " . $pe->getMessage() . DB_DATABASE . ": " . $pe->getMessage());
      }
   }
    require '../answers.php';
   global $conn;
   function train($question, $answer) {
      $question = trim($question);
      $answer = trim($answer);
      if (store($question, $answer)) {
         return (  "<p style='color:red'>bot:</p> I just learnt something new, thanks to you ");
      } else {
         return ("<p style='color:red'>bot:</p> I'm sorry, An error occured while trying to store what i learnt ");
      }
   }
   function searchRequest($request) {
      global $conn;
      $statement = $conn->prepare("select answer from chatbot where question like :request order by rand()");
      $statement->bindValue(':request', "%$request%");
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $statement->fetch();
      $response = $rows['answer'];
      if (!empty($response)):
         $response = "<p style='color:red'>bot</p> " . $response;
      endif;
      //check for function
      try {
         if (preg_match('/(\(+[a-zA-Z_]+\))/', $response, $match)) {
            $functionName = $match[0];
            $functionName = str_replace('(', '', $functionName);
            $functionName = str_replace(')', '', $functionName);
            if (function_exists($functionName)) {
               $response = str_replace($functionName, $functionName(), $response);
               $response = str_replace('(', '', $response);
               $response = str_replace(')', '', $response);
            } else {
               $response = ("<p style='color:red'>bot</p> " + " I'm sorry, The function doesn't exist");
            }
         }
      } catch (Exception $ex) {
         echo $ex->getMessage();
      }
      return $response;
   }
   function store($request, $response)
   {
      global $conn;
      $statement = $conn->prepare("insert into chatbot (question, answer) values (:request, :response)");
      $statement->bindValue(':request', $request);
      $statement->bindValue(':response', $response);
      $statement->execute();
      if ($statement->execute()) {
         return true;
      } else {
         return false;
      }
   }
   if (isset($_POST['new_request'])) {
      $bot_response['response'] = [];
      $user_request = "";
      $bot_response['response'] = "";
      $request = $_POST['new_request'];
      $user_request = trim($request);
      if (empty($user_request)) {
         $bot_response['response'] = ("<p style='color:red'>bot</p> " + " You didnt write anything");
      } else {
         if (!empty(searchRequest($user_request))) {
            $bot_response['response'] = searchRequest($user_request);
         } else if (preg_match("/(train:)/", $user_request)) {
            $power_split = explode("#", $request);
            $question = trim(preg_replace("/(train:)/", "", $power_split[0]));
            $answer = trim($power_split[1]);
            $password = trim($power_split[2]);
            if ($password != "password") {
               $bot_response['response'] = " Training Access Denied!";
            } else {
               $bot_response['response'] = train($question, $answer);
            } 
         }else {
            $bot_response['response'] =("<p style='color:red'>bot</p> " + " I  am lost! Can you train me please?");
         }
      }
      send:
      echo json_encode($bot_response);
   }
}
if (!defined('DB_USER')){
            
  require "../config.php";
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
  $sql = "SELECT * FROM interns_data WHERE `username` = 'pajimo' LIMIT 1";
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $my_data = $q->fetch();
} catch (PDOException $e) {
  throw $e;
}?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET") {?>
   
<!DOCTYPE html>

  <style type="text/css">
    #globalBody{
      width: 70%;
      margin: 0 auto;
    }
    #begin{
      background-image:url(https://images.unsplash.com/photo-1499428665502-503f6c608263);
  background-size: cover;
  background-position: center;
    }
    #first_lare{
      padding-top: 15%;
  padding-left: 25%;
  padding-right: 25%;
  padding-bottom: 10%;
  text-align: center;
  font-size: 24px;
  text-transform: uppercase;
  font-weight: 700;
    }
    .oj-flex-item{
      font-size: 20px;
      color: grey
    }
    .oj-flex-items-pad{
      text-align: center;
    }
  </style>
<html lang="en-us">
  <head>
    <title>Olamide</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="Oracle JET">
    

    <!-- This is the main css file for the default Alta theme -->
    <!-- injector:theme -->
    
    <!-- endinjector -->
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="css/app.css" type="text/css"/>

  </head>
  <body class="oj-web-applayout-body">
    <div id="globalBody" class="oj-web-applayout-page">
      <!--
         ** Oracle JET V5.0.0 web application header pattern.
         ** Please see the demos under Cookbook/Patterns/App Shell: Web
         ** and the CSS documentation under Support/API Docs/Non-Component Styling
         ** on the JET website for more information on how to use this pattern.
      -->
      <header role="banner" class="oj-web-applayout-header" style="background-color: darkblue">
        <div class="oj-web-applayout-max-width oj-flex-bar oj-sm-align-items-center">
          <div class="oj-flex-bar-middle oj-sm-align-items-baseline">
            
            <h1 class="oj-sm-only-hide oj-web-applayout-header-title" title="Application Name" style="font-weight: bold; font-size: 25px">Olamide's Portfoilio</h1>
          </div>
          <div class="oj-flex-bar-end">
            <!-- Responsive Toolbar -->
            <oj-toolbar>
              <oj-menu-button id="userMenu" display="[[smScreen() ? 'icons' : 'all']]" chroming="half">
                <span style="font-weight: bold">Contact</span>
                <span slot="endIcon" :class="[[{'oj-icon demo-appheader-avatar': smScreen(), 'oj-component-icon oj-button-menu-dropdown-icon': !smScreen()}]]"></span>
                <oj-menu id="menu1" slot="menu" style="display:none">
                  <oj-option id="pref" value="pref"><a href="https://medium.com/olamidefaniyan" target ="_blank">Medium</a></oj-option>
                  <oj-option id="help" value="help"><a href="https://twitter.com/Farry_ola" style="padding-top: 0px;" target ="_blank">Twitter</a></oj-option>
                  <oj-option id="about" value="about"><a href="https://instagram.com/olamidefaniyan_" target ="_blank">Instagram</a></oj-option>
                  <oj-option id="out" value="out"><a href="https://github.com/Pajimo" target ="_blank">Github</a></oj-option>
                </oj-menu>
              </oj-menu-button>
            </oj-toolbar>
          </div>
        </div>
      </header>
      <div role="main" class="oj-web-applayout-max-width oj-web-applayout-content" style="padding-top: 0">
        <div id="begin">
          <div id="first_lare">
            <span role="img" title="Olamide" alt="Olamide"><img class="img-responsive" id="bobo" src="https://avatars3.githubusercontent.com/u/20623732?s=460&v=4" style="width: 300px; height: 300px; border-radius: 100px;"/></span>
            <h1 style="color: blue; font-weight: bold">HI, I'M Olamide Faniyan<br/> A Software Developer/ Designer</h1>
          </div>
          <h4 align="center" style="color: grey; font-weight: bold; font-size: 25px">My Skills</h4>
          <div class="demo-flex-display oj-flex-items-pad">
            <div class="oj-flex">
              <div class="oj-flex-item">Html/Css</div>
              <div class="oj-flex-item">PHP</div>
              <div class="oj-flex-item">Javascript/jquery</div>
              <div class="oj-flex-item">Bootstrap</div>
            </div>
            
            <div class="oj-flex"
                 data-bind="css: {'oj-sm-flex-wrap-nowrap': nowrap()}">
              <div class="oj-flex-item">Figma</div>
              <div class="oj-flex-item">Git</div>
              <div class="oj-flex-item">Oraclejet</div>
              <div class="oj-flex-item">Node.js</div>
            </div>
          </div>
        
        </div>
        <style type="text/css">
          .pull-me{
    -webkit-box-shadow: 0 0 8px #FFD700;
    -moz-box-shadow: 0 0 8px #FFD700;
    box-shadow: 0 0 8px #FFD700;
    cursor:pointer;
}
.panel {
  background: #ffffbd;
    background-size:90% 90%;
    height:300px;
  display:none;
    font-family:garamond,times-new-roman,serif;
}
.panel p{
    
}
.slide {
  margin:0;
  padding:0;
  border-top:solid 2px #cc0000;
  text-align: center
}
.pull-me {
  display:block;
    position:relative;
    right:-25px;
    width:150px;
    height:20px;
  font-family:arial,sans-serif;
    font-size:14px;
  color:#ffffff;
    background:#cc0000;
  text-decoration:none;
    -moz-border-bottom-left-radius:5px;
    -moz-border-bottom-right-radius:5px;
    border-bottom-left-radius:5px;
    border-bottom-right-radius:5px;
}
.pull-me p {
    text-align:center;
}
#child4 {
    position: absolute;
    top: 80px;
}
        </style>
         
         <div style="width: 400px" id="child4" class = "bot round-corners">
          <div class="panel inner">
              <div>
                <p style="overflow: scroll; height: 250px; width: 100%; margin: 0px;" id="chatarea"></p>
                <input type="text" name="" style="width: 80%; height: 24px;" id="message" name="newrequest"Type">
                <button style="position: absolute; width: 19%; height: 26px" id="send">Send</button>
              </div>
          </div>
          <p class="slide"><div class="pull-me" style="text-align: center">Chat with me :)</div></p>
        </div>
  
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function newElementsForUser(userRequest) {
   var chatArea = $("#chatarea");
   var messageElement = "<div class='form-control form-control2 text-right'>" + userRequest + "</div>";
   chatArea.html(chatArea.html() + messageElement);
   chatArea.scrollTop($("#chatarea")[0].scrollHeight);
}


function newElementsForBot(botResponse) {
   var chatArea = $("#chatarea");
   if (botResponse.response.resultType == "find") {
      var messageElement = "<div class='form-control form-control2 text-left'>Intern ID => " + botResponse.response.users.intern_id + "<br/>Name => " + botResponse.response.users.name + "<br/>Intern Username => " + botResponse.response.users.username + "<br/>Intern Profile Picture => " + botResponse.response.users.image_filename + "</div>";
   } else { 
      var messageElement = "<div class='form-control form-control2 text-left'>" + botResponse.response + "</div>";
   }
   chatArea.html(chatArea.html() + messageElement);
   chatArea.scrollTop($("#chatarea")[0].scrollHeight);
}
             
             document.body.addEventListener('keyup', function (e) {
   if (e.keyCode == "13") {
      $("#send").click();
   }
});

$(document).ready(function() {
   response = {"response" : "<p style='color:red'>bot</p> " + "Hello. am a bot and you can chat with me a little.<br/>Train me by(train: question # answer # password)"};
   newElementsForBot(response);
});
   
   $(document).ready(function() {

  $(".pull-me").click(function() {

    $(".panel").slideToggle('slow')
  });


});

$(document).ready(function chargeBot() {
   $("#send").click(function () {
      var message = $("#message").val();
      newElementsForUser(message);
      if (message == "" || message == null) {
         response = { 'response':  "<p style='color:red'>bot</p> " + ' Please type something' };
         newElementsForBot(response);
      }else if (message.includes('open:')) {
         url = message.split('open:');
         window.open('http://' + url[1]);
      } else if (message.includes("randomquote") || message.includes("random quotes")) {
         $.getJSON("https://talaikis.com/api/quotes/random/", function (json) {
            response = json['quote'] + '<br/> Author : ' + json['author'];
            botResponse = { 'response': "<p style='color:red'>bot</p> " + response };
            newElementsForBot(botResponse);
         });
         $("#chatarea").scrollTop($("#chatarea")[0].scrollHeight);
      } else if (message.includes("aboutbot") || message.includes("about bot") || message.includes("aboutbot:")) {
         response = { 'response': "<p style='color:red'>bot</p> " + 'Version 4.0' };
         newElementsForBot(response);
      } else {
         $.ajax({
            url: "profiles/pajimo.php",
            type: "POST",
            data: { new_request: message },
            dataType: "json",
            success: function (botResponse) {
               newElementsForBot(botResponse);
            }
         });
      }
      $("#message").val("");
   });
});

</script>

</html>

<?php }?>
