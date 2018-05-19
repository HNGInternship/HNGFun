<<<<<<< HEAD
<?php

if($_SERVER['REQUEST_METHOD'] !== "POST"){
    if(!defined('DB_USER')){
        require "../config.php";
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
        }
    }
    try{
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);

        $result2 = $conn->query("Select * from interns_data where username='Remi_Jnr'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e){
        throw $e;
    }
    $secret_word = $result->secret_word;

}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    if(!defined('DB_USER')){
        require "../config.php";
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
        }
    }
    //require "../answers.php"; // This is the offending line that caused all the problem. I need to figure out how to use it correctly.
    date_default_timezone_set("Africa/Lagos");
    // header('Content-Type: application/json');
    if(!isset($_POST['question'])){
        echo json_encode([
            'status' => 1,
            'answer' => "Please type in a question"
        ]);
        return;
    }
    $question = $_POST['question']; //get the entry into the chatbot text field
    //check if in training mode
    $index_of_train = stripos($question, "train:");
    if($index_of_train === false){//then in question mode
        $question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
        $question = preg_replace("([?.])", "", $question); //remove ? and .
        //check if answer already exists in database
        $question = "%$question%";
        $sql = "select * from chatbot where question like :question";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $question);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        if(count($rows)>0){
            $index = rand(0, count($rows)-1);
            $row = $rows[$index];
            $answer = $row['answer'];
            //check if the answer is to call a function
            $index_of_parentheses = stripos($answer, "((");
            if($index_of_parentheses === false){ //then the answer is not to call a function
                echo json_encode([
                    'status' => 1,
                    'answer' => $answer
                ]);
            }else{//otherwise call a function. but get the function name first
                $index_of_parentheses_closing = stripos($answer, "))");
                if($index_of_parentheses_closing !== false){
                    $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
                    $function_name = trim($function_name);
                    if(stripos($function_name, ' ') !== false){ //if method name contains whitespaces, do not invoke any method
                        echo json_encode([
                            'status' => 0,
                            'answer' => "The function name should be without white spaces"
                        ]);
                        return;
                    }
                    if(!function_exists($function_name)){
                        echo json_encode([
                            'status' => 0,
                            'answer' => "I am unable to find the function you require"
                        ]);
                    }else{
                        echo json_encode([
                            'status' => 1,
                            'answer' => str_replace("(($function_name))", $function_name(), $answer)
                        ]);
                    }
                    return;
                }
            }
        }else{
            echo json_encode([
                'status' => 0,
                'answer' => "I can't answer that right now, please train me.The format...<br> <b>train: question#answer#password</b>"
            ]);
        }
        return;
    }else{
        //in training mode
        //get the question and answer
        $question_and_answer_string = substr($question, 6);
        //remove excess white space in $question_and_answer_string
        $question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));

        $question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
        $split_string = explode("#", $question_and_answer_string);
        if(count($split_string) == 1){
            echo json_encode([
                'status' => 0,
                'answer' => "I can't answer that right now, please train me.The format...<br> <b>train: question#answer#password</b>"
            ]);
            return;
        }
        $que = trim($split_string[0]);
        $ans = trim($split_string[1]);
        if(count($split_string) < 3){
            echo json_encode([
                'status' => 0,
                'answer' => "training password required"
            ]);
            return;
        }
        $password = trim($split_string[2]);
        //verify if training password is correct
        define('TRAINING_PASSWORD', 'password');
        if($password !== TRAINING_PASSWORD){
            echo json_encode([
                'status' => 0,
                'answer' => "invalid training password"
            ]);
            return;
        }

        //insert into database
        $sql = "insert into chatbot (question, answer) values (:question, :answer)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $que);
        $stmt->bindParam(':answer', $ans);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        echo json_encode([
            'status' => 1,
            'answer' => "Thank you, I am now smarter"
        ]);
        return;
    }
    echo json_encode([
        'status' => 0,
        'answer' => "I can't answer that right now, please train me.The format...<br> <b>train: question#answer#password</b>"
    ]);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Remi_Jnr | Profile</title>
   <style>
	body{
	position: relative;
	bottom: 0px;
	color: inherit;
	}
   .main{
   background-color: #96deda;
   margin: auto;
   width: 45em;
   height: 34em;
   border-color: grey;
   border-radius: 1.27em;
   position: relative;
   bottom: 30px;
}
.d{
   width: 195px;
   background-color: white;
   color: #625be7;
   margin-top: 1em;
   font-size: 2.1em;
   margin-bottom: 0em;
   border-top-right-radius: 30px;
   border-bottom-style : solid black;
   text-shadow: 0 0 3px #FF0000;
}
#me{
    font-size: 2.09em;
   text-shadow: -2px 0 white, 0 2px white, 2px 0 white, 0 -2px white;
}
hr{
   margin: 0px;
   height: 4px;
   border-top: none;
   background-color: white;
   
}
#div1{
   width: 40em;
   height: 41em;
   position: relative;
   bottom: 4em;
   left: 0px;
   border-right-width: 0.2em;
}
img{
	box-shadow: 5px 5px 5px rgb(25,20,60);
	top: 5em;
   margin: auto;
   position:relative;
   left: 13em;
   z-index: 1;
   border: groove ;
   border-width: 20px;
   border-radius: 50%;
   
   background-color: #625be7;
}
#details{
   height: 13em;
   width: 45em;
   position: absolute;
   bottom: 10px;
   left: 0px;
   background-color: #625be7;
   border-radius: 20px;
   border-top-left-radius: 40px;
   border-top-right-radius: 40px;
}
#span{
   font-style: italic;
   font-size: 2em;
   text-align: center;
   text-shadow: 5px 5px 3px darkseagreen;
   opacity: 0.9;
   color: cyan;
}</style>
</head>
<body>
   
      <div class="main">
          <div id="div1">
              <img src="http://res.cloudinary.com/remijr/image/upload/v1524646974/FB_IMG_15233947670837503.jpg">
            <div id="details">
                <span>
                    <p class="d">Details<hr></p>
                    <div id="span"> Hi, Sweet! The name is <strong>Remi_Jnr</strong><br> and I am a Developer</div>
                </span>
               
            </div>
          </div>
      </div>
      <script>
          console.log("Hello World");
      </script>
  </body>
=======
<?php

  if (!defined('DB_USER')) {
    include_once("../answers.php");
    require '../../config.php';
    try {
      $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
  }

  $query = "SELECT * FROM secret_word";
  $secret_word = $conn->query($query);
  $result = $secret_word->fetch();
  $secret_word = $result['secret_word'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    chat($_POST['message']);
    return;
  }

  /**
   * first function call whenever someone types a message in the chatbot
   * @return void
   */
  function chat($message) {
    $message = trim($message);
    if (empty($message)) {
      echo 'please type something';
      return;
    }
    $warning = badWord($message);
    if (!is_null($warning)) {
      echo $warning;
      return;
    }
    getFunction($message);
  }

  function badWord($message) {
    require_once('../classes/class.badwords.php');
    $BadWords = new badWords();
    $badWords = $BadWords::getBadWords();
    $message = strtolower($message);
    $words = explode(' ', $message);

    foreach ($words as $word) {
      if (in_array($word, $badWords)) {
        $replies = [
          'Hey! Watch your Thumbs!',
          'Stop that! You wont wanna corrupt a brother',
          'Hey! Watch it, wont take that next.',
          "I'll act like I didn't see that"
        ];

        return $replies[array_rand($replies)];
      }
    }
    return null;
  }

  function getFunction($message, $delimiter = '#') {
    if ($message == 'about' || $message == 'aboutbot' || $message == 'about_bot') {
      return about();
    }

    $function = trim(substr($message, 0, strpos($message, ':')));
    $functions = array(
      'train',
      'teach',
      'coach'
    );

    $hasDelimiter = strpos($message, $delimiter);
      // no delimiter means chatbot is not being trained
    if ($hasDelimiter === false) {
      getBotResponse($message);
      return;
    }

    if ($function && in_array($function, $functions)) {
      $message = substr($message, strpos($message, ':')+1);

      $data = explode($delimiter, $message);
      if (isset($data[2])) {
        $password = trim($data[2]);
      } else {
        echo 'you need to enter a password. contact my owner (email: remilekunelijah21997@gmail.com or slack: @Remi Jnr) if you do not know my password';
        return;
      }
      if ($password != 'password') {
        echo 'password is incorrect. contact my owner (email: remilekunelijah21997@gmail@gmail.com or slack: @Remi Jnr) if you do not know my password';
        return;
      }
      $question = $answer = null;
      if (isset($data[0])) {
        $question = trim($data[0]);
      }
      if (isset($data[1])) {
        $answer = trim($data[1]);
      }
      if (in_array($function, $functions)) {
        $function($question, $answer);
        return;
      }
    }
    echo 'no valid function detected. to train me, use the following structure without brackets (train:the question#the answer#my valid training password)';
    return;
  }

  /**
   * Train the chat bot so it knows how to respond to certain questions
   * @return void
   */
  function train($question, $answer) {
    $trainingResponses = [
      'Great! I have learnt something new.',
      'Watch out, I may become the smartest bot in the world!',
      'Got It!',
      'Interesting. I will try to remember this.',
      'Noted!'
    ];

    if (botKnowsIt($question, $answer)) {
      echo 'Thanks, but I knew that already';
      return;
    }

    try {
      $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
      $query = $conn->prepare("INSERT INTO chatbot (question, answer) values (:question, :answer)");
      $query->bindParam(':question', $question);
      $query->bindParam(':answer', $answer);
      $query->execute();
      echo $trainingResponses[array_rand($trainingResponses)];
      return;
    } catch (PDOException $e) {
      return "Error: " . $e->getMessage();
    }
  }

  function botKnowsIt($question, $answer) {
    try {
      $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
      $sql = 'SELECT count(*) FROM chatbot WHERE question = "' . $question . '" AND answer = "' . $answer . '" LIMIT 1';
      $query = $conn->query($sql);
      $result = $query->fetch();
      $count = $result["count(*)"];
      return (bool)$count;
    } catch (PDOException $e) {
      return "Error: " . $e->getMessage();
    }
  }

  function teach($question, $answer)
  {
    return train($question, $answer);
  }

  function coach($question, $answer)
  {
    return train($question, $answer);
  }

  function about() {
    echo 'Version 2.0';
  }

  /**
   * Train the chat bot so it knows how to respond to certain questions
   * @return void
   */
  function getBotResponse($question) {
    $lastChar = substr($question, -1);
    $q = '"' . $question . '"';
    if ($lastChar != '?') {
      $q = '"' . $question . '" OR question = "' . $question . '?"';
    }
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
    $query = $conn->query('SELECT answer FROM chatbot WHERE question = ' . $q . ' ORDER BY RAND() LIMIT 1');
    $result = $query->fetch();
    if ($result) {
      // if result has a special function, call that function and append the result
      $answer = $result['answer'];
      if (strstr($answer, '((')) {
        // you will see: ((getQuote))
        $start = strpos($answer, '((');
        $end = strpos($answer, '))');
        $extraFunction = substr($answer, $start + 2, (strlen($answer) - ($start + 4)));
        $quoteData = $extraFunction();
        $quote = json_decode($quoteData);
        echo '"' . $quote->quote . '" --' . $quote->author;
        return;
      }
      echo $answer;
      return;
    }
    $unknownResponses = [
      'I don\'t know what you talking about.',
      'no idea!',
      'I guess I don\'t know everything.',
      'interesting question! am not sure.',
      'not sure.',
      'sorry, don\'t know that.'
    ];
    echo $unknownResponses[array_rand($unknownResponses)] . ' ' . 'But you can train me so I can know the answer next time.';
    return;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Remilekun Elijah</title>
  <link rel="stylesheet" type="text/css"  href="vendor/bootstrap/3.3.4/css/bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <style>
    body, html {
      background: url('http://res.cloudinary.com/remijr/image/upload/v1524646974/FB_IMG_15233947670837503.jpg') no-repeat center top;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      font-family: 'Open Sans', sans-serif;
      text-rendering: optimizeLegibility !important;
      -webkit-font-smoothing: antialiased !important;
      color: #777;
      width: 100% !important;
      height: 100% !important;
    }
    h2 {
      margin: 0 0 20px 0;
      color: #555;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 400;
      font-size: 30px;
    }
    h3, h4 {
      color: #222;
      font-size: 18px;
      font-weight: 300;
      letter-spacing: 1px;
    }
    h5 {
      text-transform: uppercase;
      font-weight: 700;
      line-height: 20px;
    }
	.about-text{
		text-shadow: 5px 5px 3px #000;
		opacity: 0.7;
	}
    p.intro {
	  text-shadow: 3px 3px 2px #000;
	  opacity: 0.7;
      font-size: 16px;
      margin: 12px 0 0;
      line-height: 24px;
    }
    a {
      color: #555;
    }
    a:hover, a:focus {
      text-decoration: none;
      color: #000;
    }
    ul, ol {
      list-style: none;
    }
    .clearfix:after {
      visibility: hidden;
      display: block;
      font-size: 0;
      content: " ";
      clear: both;
      height: 0;
    }
    .clearfix {
      display: inline-block;
    }
    * html .clearfix {
      height: 1%;
    }
    .clearfix {
      display: block;
    }
    ul, ol {
      padding: 0;
      webkit-padding: 0;
      moz-padding: 0;
    }
    hr {
      height: 1px;
      width: 70px;
      text-align: center;
      position: relative;
      background: #666;
      margin: 0 auto;
      margin-bottom: 30px;
      border: 0;
    }
    /* About Section */
    #about {
      padding: 120px 0;
      width: 80%;
    }
    #about .about-text {
      margin-left: 10px;
      text-align: center;
      width: 80%;
    }
    #about img {
      border-radius: 50%;
      width: 200px;
      height: 200px;
      display: inline-block;
      -webkit-filter: drop-shadow(16px 16px 10px rgba(0,0,0,0.9));
      filter: drop-shadow(16px 16px 10px rgba(0,0,0,0.9));
    }
    #about p {
      margin-top: 40px;
      margin-bottom: 30px;
      line-height: 22px;
    }
    .categories {
      padding-bottom: 30px;
      text-align: center;
    }
    ul.cat li {
      display: inline-block;
    }
    ol.type li {
      display: inline-block;
      margin-left: 20px;
    }
    ol.type li a {
      border: 1px solid #777;
      color: #555;
      padding: 8px 20px;
    }
    ol.type li a:hover {
      background: #222;
      border: 1px solid #222;
      color: #fff;
    }
    /* chatbot */
    .mytext{border:0;padding:10px;background:whitesmoke;}
    .text{width:75%;display:flex;flex-direction:column;}
    .text > p:first-of-type{width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;}
    .text > p:last-of-type{width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;}
    .text-l{float:left;padding-right:10px;}
    .text-r{float:right;padding-left:10px;}
    .avatar{
        display:flex;
        justify-content:center;
        align-items:center;
        width:25%;
        float:left;
        padding-right:10px;
    }
    .macro{margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;}
    .msj-rta{float:right;background:whitesmoke;}
    .msj{float:left;background:white;}
    .frame{
        background:#e0e0de;
        height:590px;
        position: fixed;
        bottom: 100px;
        right: 0;
        overflow:auto;
    }
    .frame > div:last-of-type{position:absolute;bottom:0;width:100%;display:flex;}
    body > div > div > div:nth-child(2) > span{background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;}
    body > div > div > div.msj-rta.macro{margin:auto;margin-left:1%;}
    .chats {
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
    input:focus{outline: none;}
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */color: #d4d4d4;}
    ::-moz-placeholder { /* Firefox 19+ */color: #d4d4d4;}
    :-ms-input-placeholder { /* IE 10+ */color: #d4d4d4;}
    :-moz-placeholder { /* Firefox 18- */color: #d4d4d4;}
    footer {
        bottom: 0;
        height: 2em;
        position: relative;
        width:100%; 
    }
  </style>

  <script type="text/javascript">
    var user = {};
    var bot = {};
    var introText = "<p>Hey Human, Welcome To My World. <br/> You can ask me questions and I will try my best to answer some. You can also train me if you can using the following format</p>" +
    "<code>train : question # answer # password</code>" +
    '<p>Feel free to replace the word "<i>train</i>" with "<i>teach</i>" or "<i>coach</i>"</p>' +
    '<p>To see this message at any time, type "intro"</p>' +
    '<p>To see my version number, type "<i>about</i>", "<i>aboutbot</i>" or "<i>about_bot</i>"</p>';
    bot.avatar = "https://cdn-images-1.medium.com/max/1200/1*0Cj-W6K2TP_xAh-rXxunBg.png";

    function formatAMPM(date) {
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      var strTime = hours + ':' + minutes + ' ' + ampm;
      return strTime;
    }

    //-- No use time. It is a javaScript effect.
    function insertChat(who, text, time) {
      if (time === undefined) {
        time = 0;
      }
      var control = "";
      var date = formatAMPM(new Date());

      if (who == "user") {
          control = '<li style="width:100%;">' +
                          '<div class="msj-rta macro">' +
                              '<div class="text text-r">' +
                                  '<p>'+text+'</p>' +
                                  '<p><small>'+date+'</small></p>' +
                              '</div>' +
                    '</li>';
      } else {
          control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                        '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ bot.avatar +'" /></div>' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';
      }

      setTimeout(
        function() {
          $("ul.chats").append(control).scrollTop($("ul.chats").prop('scrollHeight'));
        }, time
      );
    }

    function resetChat() {
      $("ul.chats").empty();
    }

    //-- Clear Chat
    resetChat();

    $(document).ready(function() {
      $(".mytext").on("keyup", function(e) {
        if ((e.keyCode || e.which) == 13) {
          var text = $(this).val();
          if (text !== "") {
            insertChat("user", text);
            $(this).val('');
            botResponse();
          }
        }

        function botResponse() {
          shouldScroll = $("ul.chats").scrollTop + $("ul.chats").clientHeight === $("ul.chats").scrollHeight;

          var date = formatAMPM(new Date());
          if (text.toUpperCase() === "INTRO") {
            insertChat("bot", introText, 200);
          } else {
            $.ajax({
              type: "POST",
              url: 'profiles/angela.php',
              data: {message: text},
              success: function(response) {
                reply = '<li style="width:100%">' +
                          '<div class="msj macro">' +
                          '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ bot.avatar +'" /></div>' +
                              '<div class="text text-l">' +
                                  '<p>'+ response +'</p>' +
                                  '<p><small>'+date+'</small></p>' +
                              '</div>' +
                          '</div>' +
                      '</li>';

                setTimeout(
                  function() {
                    $("ul.chats").append(reply).scrollTop($("ul.chats").prop('scrollHeight'));
                  }, 0
                );
              }
            });
            if (!shouldScroll) {
              scrollToBottom();
            }
          }
        }
      });
    });

function scrollToBottom() {
  $("ul.chats").scrollTop = $("ul.chats").scrollHeight;
}
    // $('body > div > div > div:nth-child(2) > span').click(function() {
    //   $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
    // })

    insertChat("bot", introText, 350);
    scrollToBottom();
  </script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  <!-- About Section -->
  <div id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><img src="http://res.cloudinary.com/remijr/image/upload/v1524646974/FB_IMG_15233947670837503.jpg" class="img-responsive"></div>
        <div class="col-md-8 col-md-offset-2">
          <div class="about-text">
		  <p> Hi, Sweet! The name is <b>Remilekun Elijah</b><br> and I am a Developer</p>
          </div>
          <div class="section-title text-center center">
            <h2>My Skills</h2>
            <hr>
          </div>
          <div class="categories">
            <ul class="cat">
              <li>
                <ol class="type">
                  <li><a href="#" data-filter="*">CSS</a></li>
                  <li><a href="#" data-filter=".graphic">HTML</a></li>
                  <li><a href="#" data-filter=".illustration">JavaScript</li>
               </ol>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chat bot -->
  <div class="col-sm-3 col-sm-offset-4 frame">
    <ul class="chats"></ul>
    <div>
        <div class="msj-rta macro">
            <div class="text text-r" style="background:whitesmoke !important">
                <input class="mytext" placeholder="Type here" autofocus/>
            </div>
        </div>
    </div>
  </div>

</body>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
</html>