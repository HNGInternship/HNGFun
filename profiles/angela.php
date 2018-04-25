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
          'Hey! Watch your mouth!',
          'The way you talk, yo mama would be ashamed. I\'m sure she taught you better',
          'Yuck! So dirty.',
          "I'll reply I didn't see that"
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
        echo 'you need to enter a password. contact my owner (email: angelabisibello@gmail.com or slack: @angela) if you do not know my password';
        return;
      }
      if ($password != 'password') {
        echo 'password is incorrect. contact my owner (email: angelabisibello@gmail.com or slack: @angela) if you do not know my password';
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
      'TIL something',
      'Interesting. I will try to remember this.',
      'Noted'
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
    echo 'Version 1.0';
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
      'I don\'t know.',
      'no idea!',
      'I guess I don\'t know everything.',
      'interesting question! am not sure.',
      'not sure.',
      'sorry, don\'t know that.'
    ];
    echo $unknownResponses[array_rand($unknownResponses)] . ' ' . 'But you can train me so I know the answer next time.';
    return;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Angela Bello</title>
  <link rel="stylesheet" type="text/css"  href="vendor/bootstrap/3.3.4/css/bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <style>
    body, html {
      background: url('https://images.unsplash.com/photo-1461354360854-e33a1d6f7905?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=fee6edcd0f9d69f8a32aef0e879d37d0&auto=format&fit=crop&w=2021&q=80') no-repeat center top;
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
    p.intro {
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
    var introText = "<p>Hello. You can ask me questions and I will try to answer them. You can also train me using the following format</p>" +
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
        <div class="col-md-12 text-center"><img src="https://res.cloudinary.com/dbrllj2wf/image/upload/v1523952485/angela.jpg" class="img-responsive"></div>
        <div class="col-md-8 col-md-offset-2">
          <div class="about-text">
            <p>My name is <b>Angela Bello</b>. I am a biochemistry student of Obafemi Awolowo university (OAU). I am in my second year and hope to combine my medical knowledge with technology and become a coder someday in the future.</p>
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
                  <li><a href="#" data-filter=".illustration">PHP</a></li>
                  <li><a href="#" data-filter=".photography">SQL</a></li>
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
</html>