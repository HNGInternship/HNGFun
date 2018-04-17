<?php
// ob_start();
session_start();
require 'db.php';
global $conn;
/**
* femiBot Class
*/
class Bot {
   public $error = null;

   // public function __construct()
   // {
   //    self::startChat($user);
   // }

   // function connect() {
   //    $link = mysqli_connect("localhost", "root", "", "bot");
   //    return $link;
   // }

   function startChat($user) {
      $_SESSION['chatSession']['user'] = $user;
      $_SESSION['chatSession']['messages'] = [];
      array_push($_SESSION['chatSession']['messages'], array(
         'request' => 'Hello, I\'m '.$user,
         'response' => 'Welcome '.$user,
         'time' => date('h:i:s A')
      ) );
      // = ;
      unset($_GET['action']);
   }

   function endChat(){
      try {
         // ob_destroy();
         unset($_SESSION['chatSession']);
         session_destroy();
         return true;
      } catch (Exception $ex) {
         $error = $ex->getMessage();
         return false;
      }
   }

   function messagesAdd($response_and_request) {
      array_push($_SESSION['chatSession']['messages'], $response_and_request);
      print_r($response_and_request);
   }

   function getAction($functionName) {
      if(function_exists($functionName)) {
         return $functionName();
      } else {
         return false;
      }
   }

   function train($trainData) {
      $data = [];
      $data['response'] = null;
      $data['request'] = null;
      $temp = explode("#", $trainData);
      $data['request']  = $temp[0];
      $data['response'] = $temp[1];
      $data['request'] = preg_replace('/(train:)/', '', $temp[0]);
      $data['response'] = preg_replace('/#/', '', $temp[1]);
      if(self::store($data['request'], $data['response'])) {
         return "I just learnt something new, thanks to you 😎";
      } else {
         return "I'm sorry " .$_SESSION['chatSession']['user'].", An error occured while trying to store what i learnt 😔";
      }
   }

   function searchRequest($request) {
      global $conn;
      $statement = $conn->prepare("select * from chatbot where question like :request");
      $statement->bindValue(':request', "%$request%");
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $statement->fetch();
      $response = $rows['answer'];
      return $response;
   }

   function store($request, $response) {
      global $conn;
      $statement = $conn->prepare("insert into chatbot (question, answer) values (:request, :response)");
      $statement->bindValue(':request', $request);
      $statement->bindValue(':response', $response);
      $statement->execute();
      // setFetchMode(PDO::FETCH_ASSOC);
      // return true
      if($statement->execute()) {
         return true;
      } else {
         return false;
      }
   }
}

if(isset($_GET['action']) && !empty($_GET['action'])) {
   $bot = new Bot();
   $response_and_request = [];
   $response_and_request['request'] = "";
   $response_and_request['response'] = "";
   $response_and_request['time'] = "";
   
   switch ($_GET['action']) {

      case 'newrequest':
      $response_and_request['request'] = trim($_GET['newrequest']);
      if(empty($response_and_request['request'])) {
         goto defaultaction;
      }
      //train or skip
      if(preg_match("/(train:)/", $response_and_request['request']) && preg_match('/(#)/', $response_and_request['request'])) {
         $response_and_request['response'] = $bot->train($response_and_request['request']);
      } else {
         if(!empty($bot->searchRequest($response_and_request['request']))) {
            $response_and_request['response'] = $bot->searchRequest($response_and_request['request']);
         } else {
            $response_and_request['response'] = "I don't understand your request, I hope you wouldn't mind training me?";
         }
      }

      $response_and_request['time'] = date('h:i:s A');
      $bot->messagesAdd($response_and_request);
      break;

      case 'endchat':
      $bot->endChat();
      break;

      case 'startchat':
      if(!empty($_GET['user'])) {
         $bot->startChat($_GET['user']);
      } else if(empty($_GET['chat'])) {
         $bot->startChat("Anonymous");
      }
      break;

      default:
      defaultaction:
      $response_and_request['response'] = "You haven't made any request 💁‍♂️";
      $response_and_request['time'] = date('h:i:s A');
      $bot->messagesAdd($response_and_request);
      break;
   }
}

?>
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
   padding: 20px
}
p,i,li{
   font-family:'Lato', arial, sans-serif;
}
#all_content{
   padding-top:21px
}
</style>
<?php
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'femi_dd'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE HTML5>
<head>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css' />
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />
</head>
<html>
<body>
   <div id="all_content">
      <div id="top">
         <img src="http://res.cloudinary.com/femidd/image/upload/v1523647188/femi_dd.jpg" alt="Kole-Ibrahim AbdulQudus">
         <div id="intro">
            <h1><?php echo $user->name; ?></h1>
            <h2 style="text-align:left">Backend Developer</h2>
            <ul class="list-inline">
               <li><a target="_blank" title="Twitter/Femi_DD" href="https://twitter.com/Femi_DD"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" title="Facebook/KoleIbrahimAbdulQudus" href="http://facebook.com/KoleIbrahimAbdulQudus"><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" title="Linkedin/KoleIbrahimAbdulQudus" href="https://www.linkedin.com/in/koleibrahimabdulqudus/"><i class="fa fa-linkedin"></i></a></li>
               <li><a target="_blank" title="Github/Femi-DD" href="http://github.com/femi-dd"><i class="fa fa-github-alt"></i></a></li>
               <li><a target="_blank" title="StackOverflow/Femi_DD" href="https://stackoverflow.com/story/femi_dd"><i class="fa fa-stack-overflow"></i></a></li>
               <li><a style="font-size:20px;" class="btn btn-cta-primary pull-right" href="mailto:femi.highsky@gmail.com" target="_blank"><i class="fa fa-paper-plane"></i> Contact Me</a></li>
            </ul>
         </div>
      </div>
      <div class="round-corners">
         <div style="font-size: 18px" class="inner">
            <h2>About Me</h2>
            <p>Backend Developer(PHP:CodeIgniter), Java && MySQL. Currently learning core JavaScript.</p>
            <p>I'm also a Motivational Writer, basically just quotes, the kinds that mean so much!! <br> I'm a Farmer as well.</p>
            <p>Wanna read some? Checkout my Instagram page &nbsp;&nbsp;&nbsp;<a style="font-size:28px" target="_blank" title="Instagram/Femi_DD" href="http://instagram.com/femi_dd">@Femi_DD <i class="fa fa-instagram"></i></a></p>
            <p>The things i like aren't so much: #peace #solitude #mylaptop</p>
         </div>
      </div>
      <div class="bot round-corners">
         <div class="inner">
         <h2>femiBot 🤖</h2>
            <div style="overflow: auto; height:500px;">
            <?php if(empty($_SESSION['chatSession'])) { ?>
               <form>
                  <input type="text" name="id" value="femi_dd" hidden />
                  <input class="form-control" type="text" name="user" placeholder="Enter your name here to begin chat" />
                  <button class="btn btn-primary pull-right" name="action" value="startchat" style="float:right; margin-top:10px" type="submit">Start Chat</button>
               </form>
            <?php } ?>
            <?php if (!empty($_SESSION['chatSession'])) { ?>
               <?php foreach ($_SESSION['chatSession']['messages'] as $key => $chat) { ?>
                  <input style="text-align:right" class="form-control" type="text" name="response" value="<?php echo $chat['request']; ?>" readonly />
                  &nbsp;
                  <input style="text-align:left" class="form-control" type="text" name="response" value="🤖 <?php echo $chat['response']; ?>" readonly />
                  <!-- <p class="pull-right" style="font-size:10px"><i><?php echo $chat['time']; ?></i></p> -->
               <?php } ?>
               <form>
                  <input type="text" name="id" value="femi_dd" hidden />
                  <input style="word-break: break-all" class="form-control" type="text" placeholder="Message" name="newrequest" />
                  &nbsp;
                  <button class="btn btn-success pull-right" name="action" value="newrequest" style="float:right; margin-top:10px" type="submit">Send 💬</button>
                  <button class="btn btn-primary pull-left" name="action" value="endchat" style="float:right; margin-top:10px" type="submit">End Chat ❌</button>
               </form>
            <?php } ?>
            </div>
         </div>
      </div>
   </div>
   </div>
   <footer style="margin-bottom:0px; text-align:center; padding-top:25px;" id="footer">
      <p>Copyright &copy; Kole-Ibrahim AbdulQudus 2018</p>
   </footer>
</body>
</html>
