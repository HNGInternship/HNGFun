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
    'teach'
  );

  $hasDelimiter = strpos($message, $delimiter);
    // no delimiter means chatbot is not being trained
  if ($hasDelimiter === false) {
    getBotResponse($message);
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
    if ($password != 'trainpwforhng') {
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

  function teach($question, $answer) {
 return train($question, $answer);
}

function about() {
  echo 'version 1.0';
}

/**
 * Train the chat bot so it knows how to respond to certain questions
 * @return void
 */
function getBotResponse($question) {
  $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
  if ($question == '' || $question == ' ') {
    $condition = '= "' . $question . '"';
  } else {
    $condition = "LIKE '%" . $question . "%'";
  }
  $query = $conn->query("SELECT answer FROM chatbot WHERE question " . $condition . " ORDER BY RAND() LIMIT 1");
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
  $default = getBotResponse('');
  $lastChar = substr("testers", -1);
  $extra = ' ';
  if ($lastChar != '.' && $lastChar != '!') {
    $extra = '. ';
  }
  echo $default . $extra . 'But you can train me so I know the answer next time.';
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
        font-family: 'Open Sans', sans-serif;
        text-rendering: optimizeLegibility !important;
        -webkit-font-smoothing: antialiased !important;
        background: url('https://images.unsplash.com/photo-1501696461415-6bd6660c6742?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=defe121eb958a24b9e2c4f2041897339&auto=format&fit=crop&w=800&q=60') no-repeat center top;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
      }
      h2 {margin: 0 0 20px 0;color: #333;text-transform: uppercase;letter-spacing: 1px;font-weight: 400;font-size: 60px;}
      h3, h4 {color: #888;font-size: 18px;font-weight: 300;letter-spacing: 1px;}
      h5 {text-transform: uppercase;font-weight: 700;}
      p.intro {font-size: 30px;margin: 12px 0 0;line-height: 24px;}
      a {color: #555;}
      a:hover, a:focus {text-decoration: none;color: #fff;}
      ul, ol {list-style: none;}
      .clearfix:after {visibility: hidden;display: block;font-size: 0;content: " ";clear: both;height: 0;}
      .clearfix {display: inline-block;}
      hr {height: 1px;width: 70px;text-align: center;position: relative;background: #fff;margin: 0 auto;margin-bottom: 30px;border: 0;}
      .intro {width: 100%;padding: 0;text-align: center;color: #333;}
      .intro h1 {font-size: 60px;font-weight: 600;letter-spacing: 2px;text-transform: uppercase;margin-bottom: 20px;color: #ccc;}
      .intro p {font-size: 20px;margin-bottom: 40px;margin-top: 20px;color: #ccc;}
      header .intro-text {padding-top: 100px;}
      #portfolio {padding: 120px 0;}
      .isotope-item {z-index: 2}
      .isotope-hidden.isotope-item {z-index: 1}
      .isotope, .isotope .isotope-item {-webkit-transition-duration: 0.8s;-moz-transition-duration: 0.8s;transition-duration: 0.8s;}
      .isotope-item {margin-right: -1px;-webkit-backface-visibility: hidden;backface-visibility: hidden;}
      .isotope {-webkit-backface-visibility: hidden;backface-visibility: hidden;-webkit-transition-property: height, width;-moz-transition-property: height, width;transition-property: height, width;}
      .isotope .isotope-item {-webkit-backface-visibility: hidden;backface-visibility: hidden;-webkit-transition-property: -webkit-transform, opacity;-moz-transition-property: -moz-transform, opacity;transition-property: transform, opacity;}
      .portfolio-item {margin: 15px 0;-webkit-transition: all 0.5s ease-out;-moz-transition: all 0.5s ease-out;-ms-transition: all 0.5s ease-out;-o-transition: all 0.5s ease-out;transition: all 0.5s ease-out;}
      .portfolio-item:hover {-webkit-transform: scale(1.1);-moz-transform: scale(1.1);-ms-transform: scale(1.1);-o-transform: scale(1.1);transform: scale(1.1);}
      .portfolio-item .hover-bg {height: 195px;overflow: hidden;position: relative;}
      .hover-bg .hover-text {position: absolute;text-align: center;margin: 0 auto;background: rgba(0, 0, 0, 0.66);padding: 30% 0 0 0;height: 100%;width: 100%;opacity: 0;transition: all 0.5s;}
      .hover-bg .hover-text>h4 {text-transform: uppercase;opacity: 0;color: #fff;-webkit-transform: translateY(100%);transform: translateY(100%);transition: all 0.3s;}
      .hover-bg:hover .hover-text>h4 {opacity: 1;-webkit-transform: translateY(0);transform: translateY(0);}
      .hover-bg .hover-text>i {opacity: 0;-webkit-transform: translateY(0);transform: translateY(0);transition: all 0.3s;}
      .hover-bg:hover .hover-text>i {opacity: 1;-webkit-transform: translateY(100%);transform: translateY(100%);}
      .hover-bg:hover .hover-text {opacity: 1;}

      /* CHATBOT */
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
          height:450px;
          overflow:hidden;
          padding:0;
      }
      .frame > div:last-of-type{position:absolute;bottom:0;width:100%;display:flex;}
      body > div > div > div:nth-child(2) > span{background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;}
      body > div > div > div.msj-rta.macro{margin:auto;margin-left:1%;}
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
      input:focus{outline: none;}
      ::-webkit-input-placeholder { /* Chrome/Opera/Safari */color: #d4d4d4;}
      ::-moz-placeholder { /* Firefox 19+ */color: #d4d4d4;}
      :-ms-input-placeholder { /* IE 10+ */color: #d4d4d4;}
      :-moz-placeholder { /* Firefox 18- */color: #d4d4d4;}
    </style>

    <script type="text/javascript">
      var user = {};
      var bot = {};
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
            $("ul").append(control).scrollTop($("ul").prop('scrollHeight'));
          }, time
        );
      }

      function resetChat() {
        $("ul").empty();
      }

      //-- Clear Chat
      // resetChat();

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
            var date = formatAMPM(new Date());
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
                    $("ul").append(reply).scrollTop($("ul").prop('scrollHeight'));
                  }, 0
                );
              }
            });
          }
        });
      });

      $('body > div > div > div:nth-child(2) > span').click(function() {
        $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
      })

      //-- Print Messages
      insertChat("bot", "Hello. Would you like to train me?", 0);
      // insertChat("user", "Hi, Pablo", 1500);
      // insertChat("user", "Tell me a joke",7000);
      // insertChat("bot", "What would you like to talk about today?", 3500);
      // insertChat("user", "LOL", 12000);
      // insertChat("bot", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
    </script>
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <header id="header">
      <div class="intro">
        <div class="container">
          <div class="row">
            <div class="intro-text">
              <h1>Hello</h1>
              <hr>
              <p>My name is Angela Bello</p>
          </div>
        </div>
      </div>
    </header>

    <!-- Chat bot -->
    <div class="col-sm-3 col-sm-offset-4 frame">
      <ul></ul>
      <div>
          <div class="msj-rta macro">
              <div class="text text-r" style="background:whitesmoke !important">
                  <input class="mytext" placeholder="Type a message"/>
              </div>
          </div>
          <div style="padding:10px;">
              <!-- <span class="glyphicon glyphicon-asterisk"></span> -->
          </div>
      </div>
    </div> <!-- Chat bot -->

    <div id="portfolio">
      <div class="container">
        <div class="section-title text-center center">
          <h2>My Skills</h2>
          <hr>
        </div>
        <div class="row">
          <div class="portfolio-items">
            <div class="col-sm-6 col-md-3 col-lg-3 illustration">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="https://cdn.lynda.com/course/609030/609030-636402179425109240-16x9.jpg" title="CSS" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>CSS</h4>
                  </div>
                  <img src="https://cdn.lynda.com/course/609030/609030-636402179425109240-16x9.jpg" class="img-responsive" alt="CSS"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 graphic">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="https://longren.io/wp-content/uploads/2014/03/HTML.jpg" title="HTML" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>HTML</h4>
                  </div>
                  <img src="https://longren.io/wp-content/uploads/2014/03/HTML.jpg" class="img-responsive" alt="HTML"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 graphic">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvTjFTtbTFUn5vwIcgtKx_PftJvj5g1szwY3nM7EyzKrPk7AQWkQ" title="PHP" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>PHP</h4>
                  </div>
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvTjFTtbTFUn5vwIcgtKx_PftJvj5g1szwY3nM7EyzKrPk7AQWkQ" class="img-responsive" alt="PHP"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 graphic">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="https://upload.wikimedia.org/wikipedia/en/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png" title="SQL" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>SQL</h4>
                  </div>
                  <img src="https://upload.wikimedia.org/wikipedia/en/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png" class="img-responsive" alt="SQL"> </a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- Portfolio -->

  </body>
</html>