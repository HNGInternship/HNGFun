<?php
// ob_start();
session_start();  
if($_SERVER['REQUEST_METHOD'] == "POST") {
   if(!defined('DB_USER')){
      //live server
      require "../../config.php";
      // localhost
//       require "../config.php";
      try {
         $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
         die("🤖I couldn't connect to knowledge base : ".$pe->getMessage() . DB_DATABASE . ": " . $pe->getMessage());
      }
   }
   require '../answers.php';
   global $conn;
   function train($trainData) {
      $data = [];
      $data['response'] = null;
      $data['request'] = null;
      $temp = explode("@", $trainData);
      $data['request']  = $temp[0];
      $data['response'] = $temp[1];
      $data['request'] = preg_replace('/(train:)/', '', $temp[0]);
      $data['response'] = preg_replace('/@/', '', $temp[1]);
      if(store($data['request'], $data['response'])) {
         return "🤖 I just learnt something new, thanks to you 😎";
      } else {
         return "🤖 I'm sorry, An error occured while trying to store what i learnt 😔";
      }
   }
   
   function findThisPerson($user){
      global $conn;
      $statement = $conn->prepare("select * from interns_data where username like :user limit 1");
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
      if(!empty($response)):
         $response = "🤖 ".$response;
      endif;
      //check for function
      if(preg_match('/(\(+[a-zA-Z_]+\))/', $response, $match)) {
         $functionName = $match[0];
         $functionName = str_replace('(', '', $functionName);
         $functionName = str_replace(')', '', $functionName);
         if(function_exists($functionName)) {
            $response = str_replace($functionName, $functionName(), $response);
            $response = "🤖 ".$response;
         } else {
            $response = "🤖 I'm sorry, The function doesn't exist";
         }
      }
      return $response;
   }
   function store($request, $response) {
      global $conn;
      $statement = $conn->prepare("insert into chatbot (question, answer) values (:request, :response)");
      $statement->bindValue(':request', $request);
      $statement->bindValue(':response', $response);
      $statement->execute();
      if($statement->execute()) {
         return true;
      } else {
         return false;
      }
   }
   if(isset($_GET['new_request'])) {
      $response_and_request = [];
      $response_and_request['request'] = "";
      $response_and_request['response'] = "";
      $response_and_request['time'] = "";
      $request = strtolower($_GET['new_request']);
      $response_and_request['request'] = trim($request);
      if(empty($response_and_request['request'])) {
         $response_and_request['response'] = "🤖 You haven't made any request";
         // echo json_encode($response_and_request);
      } else {
         if(!empty(searchRequest($response_and_request['request']))) {
            $response_and_request['response'] = searchRequest($response_and_request['request']);
            // goto send;
         } else if(preg_match("/(train:)/", $response_and_request['request']) && preg_match('/(@)/', $response_and_request['request'])) {
            if(preg_match("/(:password:trainpwforhng)/", $response_and_request['request'])) {
               $response_and_request['request'] = preg_replace("/(:password:trainpwforhng)/", "", $response_and_request['request']);
               $response_and_request['response'] = train($response_and_request['request']);
            } else {
               $response_and_request['response'] = "🤖 Training Access Denied!";
            }
            // goto send;
            } else if(preg_match("/(aboutbot)/", $response_and_request['request']) || preg_match("/(aboutbot:)/", $response_and_request['request']) || preg_match("/(about bot)/", $response_and_request['request'])) {
               $response_and_request['response'] = "🤖 Version : 3.0.23, Cool right?";
            } else if(preg_match('/(find:)/', $request)) {
            $ex = explode("find:", $request);
            if(!empty($users = findThisPerson($ex[1]))) {
               // $count = count($users);
               $response_and_request['response'] = array('resultType'=>'find', 'users'=> $users);
            } else {
               $response_and_request['response'] = "🤖 I couldn't find a user by that username or name";
            }
            // goto send;
         } else {
            $response_and_request['response'] = "🤖 I  don't understand your request, I hope you wouldn't mind training me?";
            // goto send;
         }
      }
      send:
      $response_and_request['time'] = date('h:i:s A');
      echo json_encode($response_and_request);
   }
}
if($_SERVER['REQUEST_METHOD'] == "GET") {
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;
   $result2 = $conn->query("Select * from interns_data where username = 'femi_dd'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
} ?>
<?php if($_SERVER['REQUEST_METHOD'] == "GET") { ?>
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
         <img src="https://res.cloudinary.com/femidd/image/upload/v1523647188/femi_dd.jpg" alt="Kole-Ibrahim AbdulQudus">
         <div id="intro">
            <h1><?php echo $user->name; ?></h1>
            <h2 style="text-align:left">Backend Developer</h2>
            <ul class="list-inline">
               <li><a target="_blank" title="Twitter/Femi_DD" href="https://twitter.com/Femi_DD"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" title="Facebook/KoleIbrahimAbdulQudus" href="https://facebook.com/KoleIbrahimAbdulQudus"><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" title="Linkedin/KoleIbrahimAbdulQudus" href="https://www.linkedin.com/in/koleibrahimabdulqudus/"><i class="fa fa-linkedin"></i></a></li>
               <li><a target="_blank" title="Github/Femi-DD" href="https://github.com/femi-dd"><i class="fa fa-github-alt"></i></a></li>
               <li><a target="_blank" title="StackOverflow/Femi_DD" href="https://stackoverflow.com/story/femi_dd"><i class="fa fa-stack-overflow"></i></a></li>
               <li><a style="font-size:20px;" class="btn btn-cta-primary pull-right" href="mailto:femi.highsky@gmail.com" target="_blank"><i class="fa fa-paper-plane"></i> Contact Me</a></li>
            </ul>
         </div>
      </div>
      <div class="round-corners">
         <div style="font-size: 17px" class="inner">
            <h2>About Me</h2>
            <p>Backend Developer(PHP:CodeIgniter), Java && MySQL. Currently learning core JavaScript.</p>
            <p>I'm also a Motivational Writer, basically just quotes, the kinds that mean so much!! <br> I'm a Farmer as well.</p>
            <p>Wanna read some? Checkout my Instagram page &nbsp;&nbsp;&nbsp;<a style="font-size:28px" target="_blank" title="Instagram/Femi_DD" href="https://instagram.com/femi_dd">@Femi_DD <i class="fa fa-instagram"></i></a></p>
            <p>The things i like aren't so much: #peace #solitude #mylaptop</p>
         </div>
      </div>
      <div class="bot round-corners">
         <div class="inner">
            <h2>femiBot 🤖</h2>
            <i style="font-size: 15px">To train the bot, follow :<br />
               1. train:What is the time @The time is (timefunction) (where train: is the question and @is the answer, timefunctionis the function to handler your request)<br />
               2. train:Today's date @Todays date is (date):password:passwordkey (where password key is the official password to train the bot)<br />
               3. My boss is working hard to give me some functions of my own very soon, I'll write them here when they're ready.<br>
               4. To find a user, just type => find:username</i>
               <div id="chatarea" style="overflow: auto; height:300px; border:1px solid whitesmoke; border-radius:5px"></div>
               <div class="input-group">
                  <input type="text" class="form-control" id="message" type="text" placeholder="Message" name="newrequest" />
                  <div class="input-group-btn">
                     <button class="btn btn-success pull-right" id="send" onclick="sendData()" value="newrequest" type="button">Send💬</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <footer style="margin-bottom:0px; text-align:center; padding-top:25px;" id="footer">
      <p>Copyright &copy; Kole-Ibrahim AbdulQudus 2018</p>
   </footer>
</body>

<script type="text/javascript">
function sendData() {
   var message = document.getElementById("message").value;
   var chatArea = document.getElementById("chatarea");
   var newElement = document.createElement("input");
   newElement.className = "form-control form-control2 text-right";
   newElement.value = message;
   chatArea.appendChild(newElement);
//request time  element
var timeEl2 = document.createElement("p");
timeEl2.className = "timeEl text-right";
timeEl2.innerHTML = new Date().toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
chatArea.appendChild(timeEl2);
//request time element
   var xmlhttp = new XMLHttpRequest();
   if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
   } else if (window.ActiveXObject) {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         var response = JSON.parse(xmlhttp.responseText);
         var newElement = document.createElement("input");
         var timeEl = document.createElement("p");
      timeEl.className = "timeEl text-left";
         newElement.className = "form-control form-control2 text-left";
         if(response.response.resultType === "find") {
            var newElement = document.createElement("div");
            newElement.className = "form-control form-control2 text-left";
            newElement.innerHTML = "Intern ID => " + response.response.users.intern_id + "\n" +
            "Intern Name => " + response.response.users.name + "\n" +
            "Intern Username => " + response.response.users.username + "\n" +
            "Intern Profile Picture => " + response.response.users.image_filename;
         }
         newElement.value = response.response;
         chatArea.appendChild(newElement);
         timeEl.innerHTML = new Date().toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
         newElement.setAttribute("id", response.time);
         chatArea.appendChild(timeEl);
         document.getElementById(response.time).focus();
         document.getElementById("message").focus();
      }
   }
   //live server
   xmlhttp.open("POST", "https://hng.fun/profiles/femi_dd.php?new_request="+message, true);
   //localhost
//    xmlhttp.open("POST", "http://localhost/HNGFun/profiles/femi_dd.php?new_request="+message, true);
   xmlhttp.send();
   document.getElementById("message").value = "";
}
</script>
</html>
<?php } ?>
