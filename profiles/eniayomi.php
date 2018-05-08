<?php
// ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (!defined('DB_USER')) {
      //live server
      require "../../config.php";
      //   localhost
      // require "../config.example.php";
      try {
         $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
         echo ("🤖I couldn't connect to knowledge base : " . $pe->getMessage() . DB_DATABASE . ": " . $pe->getMessage());
      }
   }
   // require '../answers.php';
   global $conn;

   function train($question, $answer) {
      $question = trim($question);
      $answer = trim($answer);
      if (store($question, $answer)) {
         return "🤖 I just learnt something new, thanks to you 😎";
      } else {
         return "🤖 I'm sorry, An error occured while trying to store what i learnt 😔";
      }
   }

   function findThisPerson($user) {
      global $conn;
      $statement = $conn->prepare("select * from interns_data where username like :user or name like :user limit 1");
      $statement->bindValue(':user', "%$user%");
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $statement->fetchObject();
      return $rows;
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
         $response = "🤖 " . $response;
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
               $response = "🤖 I'm sorry, The function doesn't exist";
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
         $bot_response['response'] = "🤖 You haven't made any request";
      } else {
         if (!empty(searchRequest($user_request))) {
            $bot_response['response'] = searchRequest($user_request);
         } else if (preg_match("/(train:)/", $user_request)) {
            $power_split = explode("#", $request);
            $question = trim(preg_replace("/(train:)/", "", $power_split[0]));
            $answer = trim($power_split[1]);
            $password = trim($power_split[2]);

            if ($password != "password") {
               $bot_response['response'] = "🤖 Training Access Denied!";
            } else {
               $bot_response['response'] = train($question, $answer);
            }

         } else if (preg_match('/(find:)/', $request)) {
            $ex = explode("find:", $request);

            if (!empty($users = findThisPerson($ex[1]))) {
               $bot_response['response'] = array('resultType' => 'find', 'users' => $users);
            } else {
               $bot_response['response'] = "🤖 I couldn't find a user by that username or name";
            }

         } else {
            $bot_response['response'] = "🤖 I  don't understand your request, I hope you wouldn't mind training me?";
         }
      }
      send:
      echo json_encode($bot_response);
   }
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;
   $result2 = $conn->query("Select * from interns_data where username = 'eniayomi'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
}?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET") {?>
   <style>
   body {
      background: #DAE3E7;
      padding: 10px;
      /* border: 25px solid; */
      font-family: 'Lato', arial, sans-serif;
      margin: 20px;
   }
   a{
      color: #434343;
   }
   #top {
      background-color: #DAE3E7;
      background: white;
      height: 35%;
      margin: 20px;
      border-radius: 20px;
   }
   #intro{
      margin: 29px;
      display: block;
      font-size: 16px;
      padding: 20px;
   }
   h1{
      color: #434343;
      font-size: 38px;
      margin-bottom: 5px;
      margin-top: 30px;
      padding-top: 10px;
      font-family: 'Montserrat', sans-serif;
   }
   h2{
      color: #778492;
      font-size: 26px
   }
   img {
      border-radius: 50%;
      float: left;
      width: 15%;
      margin: 15px;
   }
   li{
      padding-right: 25px;
      margin-right: 9px;
      list-style: none;
      display: inline;
      font-size: 30px;
      padding-top: 10px;
      border-radius: 50%;
      color: #fff;
      text-align: center;
   }
   .round-corners{
      border-radius: 20px;
      /* background-color: #DAE3E7; */
      background: white;
      margin: 20px;
   }
   .inner{
      padding: 20px;
   }
   #id{
      border:2px black;
   }
   p,i,li{
      font-family:'Lato', arial, sans-serif;
   }
   #all_content{
      padding-top:21px
   }
   .form-control2{
      margin-bottom:20px;
   }
   .timeEl{color:#495057;font-size:12px}
</style>
<!DOCTYPE HTML5>
<head>
   <link href='https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css' />
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />
</head>
<html>
<body>
   <div id="all_content">
      <div id="top">
         <img src="http://res.cloudinary.com/eniayomi/image/upload/v1524007065/pe.png" alt="Oluwaseyi Oluwapelumi">
         <div id="intro">
            <h1><?php echo $user->name; ?></h1>
            <h2 style="text-align:left">Backend Developer</h2>
            <ul class="list-inline">
               <li><a target="_blank" title="Twitter" href="https://twitter.com/techteel"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" title="Github/eniayomi" href="https://github.com/eniayomi"><i class="fa fa-github-alt"></i></a></li>
               <li><a style="font-size:20px;" class="btn btn-cta-primary pull-right" href="mailto:nathanoluwaseyi@gmail.com" target="_blank"><i class="fa fa-paper-plane"></i> Contact Me</a></li>
            </ul>
         </div>
      </div>
      <div class="round-corners">
         <div style="font-size: 17px" class="inner">
            <h2>About Me</h2>
            <p>Frontend Developer, Java && MySQL. Currently learning core JavaScript.</p>
            <p>The things i like aren't so much: #peace #solitude #mylaptop</p>
         </div>
      </div>
      <div class="bot round-corners">
         <div class="inner">
            <h2>Eniayomi's Bot 🤖</h2>
            <div id="chatarea" style="overflow: auto; height:300px; border:1px solid whitesmoke; border-radius:5px"></div>
            <div class="input-group">
               <input type="text" class="form-control" id="message" type="text" placeholder="Message" name="newrequest" />
               <div class="input-group-btn">
                  <button class="btn btn-success pull-right" id="send" type="button">Send 💬</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<footer style="margin-bottom:0px; text-align:center; padding-top:25px;" id="footer">
   <p>Eniayomi @ 2018 HNG</p>
</footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

function newElementsForUser(userRequest) {
   var chatArea = $("#chatarea");
   var messageElement = "<div class='form-control form-control2 text-right'>" + userRequest + "</div>";
   chatArea.html(chatArea.html() + messageElement);
   var time = new Date().toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
   var timeElement = "<p class='timeEl text-right'>" + time + "</p>";
   chatArea.html(chatArea.html() + timeElement);
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
   var time = new Date().toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true , milliseconds: true});
   var timeElement = "<p class='timeEl text-left'>" + time + "</p>";
   chatArea.html(chatArea.html() + timeElement);
   chatArea.scrollTop($("#chatarea")[0].scrollHeight);
}

$(document).ready(function() {
   response = {"response" : "Hello there, I'm eniayomi Bot.<br/>Here's a couple of things i can do.<br/> 1. You can ask me anything<br/>2. You can find a friend who's in the dope HNGInternship<br/>syntax : find: username or find: name<br/>3. To train the bot(train: question # answer # password)"};
   newElementsForBot(response);
});

$(document).ready(function chargeBot() {
   $("#send").click(function () {
      var message = $("#message").val();
      newElementsForUser(message);
      if (message == "" || message == null) {
         response = { 'response': 'Please type something' };
         newElementsForBot(response);
      }else if (message.includes('open:')) {
         url = message.split('open:');
         window.open('http://' + url[1]);
      } else if (message.includes("randomquote:") || message.includes("random quotes:")) {
         $.getJSON("https://talaikis.com/api/quotes/random/", function (json) {
            response = json['quote'] + '<br/> Author : ' + json['author'];
            botResponse = { 'response': response };
            newElementsForBot(botResponse);
         });
         $("#chatarea").scrollTop($("#chatarea")[0].scrollHeight);
      } else if (message.includes("aboutbot") || message.includes("about bot") || message.includes("aboutbot:")) {
         response = { 'response': 'Version 4.0' };
         newElementsForBot(response);
      } else {
         $.ajax({
            url: "profiles/eniayomi.php",
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

document.body.addEventListener('keyup', function (e) {
   if (e.keyCode == "13") {
      $("#send").click();
   }
});

</script>

</html>

<?php }?>
