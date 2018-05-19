<!DOCTYPE html>
<?php
// chdir(dirname(__FILE__));

  require_once 'db.php';

    
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'brownsamson'");
$user = $result2->fetch(PDO::FETCH_OBJ);
        
if (isset($_POST['message'])) {
  $message = $_POST['message'];
  samsonjnrBot($message);
}

function samsonjnrBot($qsam){
  $qsam = strtolower($qsam);
  $anwerSam = "";
  $guestName = "";
 
 
  $keyword = array('newschool', 'how are you','what are you you?', 'what your do name ur name? call you your\'s', 'my name name?', 'i\'m am fine okay doing great ok all good', 'today today\'s date', 'version version? aboutbot', 'what do time? time', 'still here you there codmax jnr samson');
 
  $decisionArray = array();
  $usrKeywords = $qsam; //$_POST['keywords']
  $arr1 = explode(' ', $usrKeywords);
  foreach ($keyword as $s){
    $arr2 = explode(' ', $s);
    $aint = array_intersect($arr2, $arr1);
    $percentage = (count($aint) * 100 / count($arr2));
    array_push($decisionArray, $percentage);
  }
  if ($qsam != 'how' && $qsam != "you" && $qsam != "your" && $qsam != "are" && $qsam != "my" && $qsam != "still" && $qsam != "here" && $qsam != "there" && $qsam != "call"){
  $decisionValue = array_keys($decisionArray, max($decisionArray));
  }else{
    $decisionValue = [0];
  }
 
 
  function trainingSam($newmessage){
    require 'db.php';
    $message = explode('#', $newmessage);
    $question = explode(':', $message[0]);
    $answer = $message[1];
    $password = $message[2];
 
    $question[1] = trim($question[1]);
    $password = trim($password);
    if ($password != "password"){
      echo "You are not authorize to train me.";
 
    }else{
    $chatbot= array(':id' => NULL, ':question' => $question[1], ':answer' => $answer);
    $query = 'INSERT INTO chatbot ( id, question, answer) VALUES ( :id, :question, :answer)';
 
    try {
        $execQuery = $conn->prepare($query);
        if ($execQuery ->execute($chatbot) == true) {
            echo repondTraining();
 
        };
    } catch (PDOException $e) {
        echo "Oops! i did't get that, Something is wrong i guess, <br> please try again";
      }
    }
  }
 
  function greetingSam(){
    $greeting = array('Hi! Good to have you here. My name is Samson Jnr, but you can call me Codmax' ,
                      'Hello there, my name is Codmax, how Can i be of help?' ,
                      'Good day, You are chatting with Codmax, ask me something',
                      'Hi! My name is Samson whats up?',
                      'It\'s Codmax, Welcome on board',
                      'I\'m Codmax, let\'s get started');
      $index = mt_rand(0, 5);
      return $anwerSam = $greeting[$index];
  }
 
  function requestName(){
      $requestName = array( 'Sorry I did\'t catch your name',
                            'What can I call you?',
                            'What\'s that lovely name of yours?');
      $index = mt_rand(0, 2);
      return $anwerSam = $requestName[$index];
  }
 
  function repondTraining(){
      $repondTraining = array(  'Noted! Thank you for teaching me',
                                'Acknowledged, thanks, really want to learn more',
                                'A million thanks, I\'m getting smarter',
                                'i\'m getting smarter, I really appreciate');
      $index = mt_rand(0, 3);
      return $anwerSam = $repondTraining[$index];
  }
 
  function repondName(){
      $repondName = array( 'Yeah! i\'m still here',
                            'I\'m with you',
                            'go ahead I\'m still here');
      $index = mt_rand(0, 2);
      return $anwerSam = $repondName[$index];
  }
 
  function respondDate(){
    date_default_timezone_set("Africa/Lagos");
    $time = date("Y/m/d");
    $respondTime = array( 'Today\'s date is '.$time,
                          'it\'s '. $time,
                          'Today is '. $time,
                          $time);
    $index = mt_rand(0, 3);
    return $anwerSam = $respondTime[$index];
  }
 
  function respondTime(){
    date_default_timezone_set("Africa/Lagos");
    $time = date("h:i A");
    $respondTime = array( 'The time is '.$time,
                          'it\'s '. $time,
                          $time);
    $index = mt_rand(0, 2);
    return $anwerSam = $respondTime[$index];
  }
 
  function respondName(){
    $respondName = array( 'Codmax, you can still call me Samson Jnr.',
                          'Samson Jnr, I\'m still called Codmax.',
                          'Samson Jnr. or Codmax');
    $index = mt_rand(0, 2);
    return $anwerSam = $respondName[$index];
  }
 
  function respondOkay(){
    $respondOkay = array( 'That\'s Great, we should keep chatting I\'m having fun',
                          'So Lovely, let\'s keep chatting',
                          'That\'s good news, so how can I help you?');
    $index = mt_rand(0, 2);
    return $anwerSam = $respondOkay[$index];
  }
 
  function respondGreeting (){
    $respondGreeting = array( 'Oh, I\'m doing quite well. You?',
                          'Am fine and thanks What about you?',
                          'Am all good. and how are you too?');
    $index = mt_rand(0, 2);
    return $anwerSam = $respondGreeting[$index];
  }
 
 
  function checkDatabaseToo($question){
    try{
        require 'db.php';
 
        $stmt = $conn->prepare('select answer FROM chatbot WHERE (question LIKE "%'.$question.'%") LIMIT 1');
 
        $stmt->execute();
        if($stmt->rowCount() > 0){
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ echo $row["answer"];}
        }else{
          return 1;
        }
      }
        catch (PDOException $e){
           echo "Error: " . $e->getMessage();
        }
        $conn = null;
      }
 
 
  if ($qsam == "intro"){
      echo greetingSam();
  } else if($qsam == "request name"){
      echo requestName();
  }else if (strtok($qsam, ":") == "train"){
              trainingSam($qsam);
  }else if ( $keyword[$decisionValue[0]] == "what do time? time"){
              echo respondTime();
  }else if ( $keyword[$decisionValue[0]] == "what your do name ur name? call you your's" || $qsam == "your name" || $qsam == "name" || $qsam == "ur name" || $qsam == "ur name?"){
              echo respondName();
  } else if ( $keyword[$decisionValue[0]] == "my name name?"){
              echo "givename";
  }else if ( $keyword[$decisionValue[0]] == "version version? aboutbot"){
              echo "Version: 1.0";
  }else if ( $keyword[$decisionValue[0]] == "what are you you?"){
              echo "I'm a ChatBot";
  }else if ( $keyword[$decisionValue[0]] == "today today's date"){
              echo respondDate();
  }else if($qsam != "intro" && $qsam != "request name" && strtok($qsam, ":") != "train"){
    $te = checkDatabaseToo($qsam);
    if ($te == 1){
      if ( $keyword[$decisionValue[0]] == "i'm am fine okay doing great ok all good"){
                  echo respondOkay();
      }else if ( $keyword[$decisionValue[0]] == "how are you"){
                  echo respondGreeting();
      }else if (strtok($qsam, ":") == "name"){
            echo "nice name, also nice to meet you ";
            $nameGuest = explode (":", $qsam);
            $guestName = $nameGuest [1];
            echo "$guestName" . ". How are you today?";
 
      }else if ( $keyword[$decisionValue[0]] == "still here you there codmax jnr samson"){
        echo repondName();
      }else if ( $keyword[$decisionValue[0]] == "newschool"){
        echo "oop! Sorry i don't understand you. But I'm a fast learner,
              you can train me in this format 'train: question # answer #password'";
      }
    }
  }
  }
 

if ($_SERVER["REQUEST_METHOD"] == "GET"){ ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Meet Brown Samson Dappa</title>
        <link rel="icon" href="favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Rubik|Quicksand" rel="stylesheet">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400');
            *,
            *:before,
            *:after {
                margin: 0;
                padding: 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            img{
                user-drag: none;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            }
            p{
                margin: 20px 0;
                line-height: 30px;
            }
            a{
                text-decoration: none;
            }
            .dark{ background-color: #33648B; color: #ffffff;}
            .darker{ background-color: #212939;  color: #ffffff;}
            .darkest{ background-color: #212129;  color: #ffffff;}
            .light{ color: #8CDEF7;}
            .fullwidth{width: 100%; display:block;}
            .float-right{float: right;}
            .float-left{float: left;}
            .container{
                width: 100%;
                /*padding: 0 8.33%;*/
                display: table;
            }
            .body{
                padding-top: 30px;
                padding-bottom: 30px;
            }
            .body{
                font-family: 'Roboto', 'Rubik', sans-serif;
                font-size: 12pt;
                width: 100%;
                background-color: #212939;
            }
            #footer{
                height: 60px;
                padding: 15px 0;
                text-align: center;
            }
            .socials-container{
                max-width: 200px;
                text-align: center;
                margin-top: 0px;
                display: inline-block;
            }
            .socials{
                margin: 0 10px;
            }
            .banner{
              margin-top: 50px;
                /*height: 10px;*/
            }
            /*============== BANNER ANIMATION ======================*/
            .banner-item-container{
                max-width: 350px;
                padding-left: 8%;
                padding-right: 15px;
                padding-top: 20px;
                background: rgba(33,41,57, 0.6);
            }
            .banner-item{
                border-left: 2px solid #8CDEF7;
                padding-left: 15px;
                padding-top: 10px;
            }
            .banner-item>h4{
                display: inline;
            }
            .banner-item>h3{
                margin-bottom: 5px;
            }
            .hello{
                margin-bottom: 5px;
                font-weight: 100 !important;
            }
            .banner-item>p{
                margin-bottom: 25px;
                font-weight: 100 !important;
            }
            .banner {
              margin:0px;
              text-align:left;
              padding-top:20px;
              color:#fff;
              font-family:'Roboto';
              font-size:20px;
              font-weight: bold;
              overflow:hidden;
            /*  animation:bg 10s linear infinite;*/
              background: url(http://res.cloudinary.com/samsondappa/image/upload/v1523983445/samsonnewautonew.png) no-repeat bottom right;
                background-color: #212939;
            }
            #dropping-texts {
              display: inline-block;
              max-width: 350px;
              text-align: left;
              height: 30px;
              margin-top: -10px;
              position:absolute;
              font-weight:300;
              padding: 0 5px 0 0 ;
            /*  border-right: 2px solid rgba(225, 204, 41, 1);*/
              /* height: 25px; */
            }
            #aboutme{
                max-width: 650px;
                margin: auto;
            }
            button{
                border: none;
                margin: 5px;
                padding: 2px 10px;
                text-align: center;
            }
            .send-button{
              background-color: #FFCC29;
              border: none;
              color: #000000 !important;
              padding: 5px 15px;
              margin: 0;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              /* border-radius: 7px; */
              width: 100%;
            }
            .button{
                background-color: #FFCC29;
                border: none;
                color: #000000 !important;
                padding: 5px 15px;
                margin: 30px 15px 30px 0;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 7px;
            }
            .send-button:hover, .button:hover{
                color: #ffffff !important;
                background-color: #33648B;
                cursor: pointer;
                transition: .5s;
            }
            #personal-body{
              margin-top: 90px;
              padding: 30px 0;
            }
            .space{
              width: 100%;
              height: 30px;
            }
            #chat-icon-con{
              padding: 5px;
              height: 60px;
              width: 60px;
              border-radius: 50%;
              background-color: #749E40;
              position: fixed;
              right: 4%;
              bottom: 40px;
              transition: 1s;
            }
            #chat-icon-con:hover{
              background-color: #FFC916;
              cursor: pointer;
              transition: 1s;
            }
              #icon-img{
                width: 100%;
              }
              #chatcon{
                width: 350px;
                height: 85vh;
                background: #F2F2F3;
                position: fixed;
                bottom:30px;
                right:-100%;
                padding: 15px 15px 10px 15px;
                border-radius: 5px;
                /*display: none;*/
                transition: right 1s ease-in-out 0.05s;
                /*transition: right 1s ease-in-out 0.05s;*/
              }
              .message-con{
                width: 100%;
                height: 55vh;
                background-color: #FFFFFF;
                padding: 20px 10px 10px 10px;
                overflow-y: scroll;
                /*display:flex;
                flex-direction: column-reverse;*/
              }
              #conversation{
              }
              .form-group{
                margin: 10px 0;
                /*padding-right: 15px;*/
              }
              #message{
                height: 100%;
                width: 100%;
                border-radius: 0;
              }
              .textarea-con{
                /*padding: 10px;*/
                width: 100%;
                height: 14vh;
              }
              textarea{
                resize: none;
              }
              .bot{
                width: 65%;
                background-color: #0D2147;
                color: #ffffff;
                float:left;
                padding: 6px;
                margin: 0 0 20px 10px;
                border-radius: 5px;
                font-size: .8em;
                position: relative;
              }
              .arrow-left{
                width: 0;
                height: 0;
                border-top:  10px solid transparent;
                border-bottom:  10px solid transparent;
                border-right:  10px solid #0D2147;
                position: absolute;
                left: -2.5%;
                bottom: 20%;
              }
              .guest{
                width: 65%;
                background-color: #FFC916;
                float: right;
                padding:6px;
                margin: 0 10px 20px 0;
                border-radius: 5px;
                font-size: .8em;
                position: relative;
              }
              .arrow-right{
                width: 0;
                height: 0;
                border-top:  10px solid transparent;
                border-bottom:  10px solid transparent;
                border-left:  10px solid #FFC916;
                position: absolute;
                right: -2.5%;
                bottom: 20%;
              }
              @media only screen and (max-width: 572px){
                #chatcon{
                  width: 100%;
                  display: table;
                  height: 550px;
                  position: static;
                  bottom:30px;
                  padding: 15px 15px 10px 15px;
                  margin: 20px 0 20px 0;
                  border-radius: 5px;
                  display: none;
                  transition: right 1s ease-in-out 0.05s;
                }
                .message-con{
                  width: 100%;
                  height: 70%;
                  background-color: #FFFFFF;
                  padding: 20px 10px 10px 10px;
                  overflow-y: scroll;
                  display: static;

                }
                .textarea-con{
                  padding: 0px;
                  width: 100%;
                  height: 14vh;
                }
                .form-group{
                  margin: 10px 0;
                  padding-right: 0px;
                }
              }
        </style>

    </head>
    <body id="personal-body">

        <div class="banner darker fullwidth container">
            <div class="banner-item-container">
                <div class="banner-item">
                    <h3 class="light hello">Hi! I'm </h3>
                    <h3>BROWN SAMSON DAPPA</h3>

                      <div class="space"></div>
                    <div id="dropping-texts">
                    </div>
                    <div class="space"></div>
                </div>
                <div class="space"></div>
                <a href="http://brownsamson.com/portfolio"><button class="button">My Portfolio</button></a>
                <div class="space"></div>
                <div class="space"></div>
            </div>
        </div>

        <div id="chatcon">
          <div class="message-con" id="messageCon">
              <div id="conversation">
            <!-- <div class="bot"><div class="arrow-left"></div>Hi! Good to have you here. My name is Samson Jnr, but you can call me Codmax</div>
            <div class="bot"><div class="arrow-left"></div>Sorry i did't catch your name</div> -->

          </div>
          </div>
          <form id="ajax-contact" method="post" action="profiles/brownsamson.php">
            <div class="form-group">
					    <div class="textarea-con"><textarea type="text" class="form-control" name="message" id="message" placeholder="Ask Me Something"></textarea></div>
					  </div>

            <div class="form-group"><button type="submit" class="send-button" id="guest-send">Send</button></div>
          </form>

        </div>

        <div id="chat-icon-con"><img src="http://res.cloudinary.com/samsondappa/image/upload/v1524134592/chatIcon.png" id="icon-img"></div>
        <footer class="darkest " id ="footer">
            <div class="socials-container">
                <a href="https://facebook.com/brownsamson.dappa" target="_blank" class="socials">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                      viewBox="0 0 53 113" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <defs>
                        <style type="text/css">
                          .facebook-svg {
                            fill: rgb(190, 190, 190);
                            fill-rule: nonzero;
                          }
                        </style>
                      </defs>
                      <path class="facebook-svg" d="M35 113l-21 0 0 -57 -14 0 0 -19 14 0 0 -11c0,-16 4,-26 23,-26l16 0 0 19 -10 0c-7,0 -8,3 -8,8l0 10 18 0 -2 19 -16 0 0 57z"
                      />
                  </svg>
                </a>

                <a href="https://twitter.com/SamsonDappa" target="_blank" class="socials">
                  <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="18px" height="18px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                      viewBox="0 0 1129 917" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <defs>
                        <style type="text/css">
                          .twitter-svg {
                            fill: rgb(190, 190, 190);
                            fill-rule: nonzero;
                          }
                        </style>
                      </defs>
                      <path class="twitter-svg" d="M1129 109c-42,18 -86,30 -133,36 48,-29 84,-74 102,-128 -45,26 -95,46 -147,56 -43,-45 -103,-73 -169,-73 -128,0 -232,104 -232,232 0,18 2,35 6,52 -193,-9 -363,-101 -477,-242 -20,35 -32,74 -32,117 0,80 41,151 103,193 -38,-2 -73,-12 -105,-29 0,1 0,2 0,3 0,112 80,205 186,227 -19,5 -40,8 -61,8 -15,0 -29,-2 -43,-4 29,92 115,159 216,160 -79,63 -179,100 -288,100 -18,0 -37,-1 -55,-4 102,66 224,104 355,104 426,0 659,-352 659,-659 0,-10 0,-20 -1,-29 46,-33 85,-74 116,-120z"
                      />
                  </svg>
                </a>

                <a href="https://www.github.com/codmax" target="_blank" class="socials">
                  <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="18px" height="18px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                      viewBox="0 0 583 583" xmlns:xlink="http://www.w3.org/1999/xlink" class="da-svg">
                      <defs>
                        <style type="text/css">
                          .github-svg {
                            fill: rgb(190, 190, 190);
                            fill-rule: nonzero;
                          }
                        </style>
                      </defs>
                      <path class="github-svg" d="M535 292c0,-33 -7,-65 -20,-95 -13,-30 -30,-56 -52,-77 -21,-22 -47,-39 -77,-52 -30,-13 -61,-19 -94,-19 -33,0 -65,6 -95,19 -30,13 -56,30 -77,52 -22,21 -39,47 -52,77 -13,30 -19,62 -19,95 0,53 15,100 47,143 31,43 72,73 123,88l0 -64c-14,2 -23,3 -26,3 -28,0 -48,-13 -59,-38 -3,-10 -8,-18 -13,-24 -2,-2 -4,-4 -8,-7 -4,-4 -8,-7 -11,-10 -3,-2 -5,-4 -5,-6 0,-3 4,-4 11,-4 7,0 14,2 19,5 6,4 11,8 15,14 4,5 8,10 12,15 4,6 9,10 15,14 6,4 14,5 22,5 10,0 20,-1 30,-5 4,-14 12,-26 24,-34 -42,-4 -73,-14 -93,-31 -20,-18 -30,-46 -30,-86 0,-30 9,-55 27,-75 -3,-10 -5,-21 -5,-32 0,-14 3,-28 10,-41 15,0 27,2 39,7 11,5 23,13 38,23 19,-4 40,-7 64,-7 20,0 40,2 58,7 15,-11 27,-18 38,-23 11,-5 24,-7 38,-7 7,13 10,27 10,41 0,11 -1,22 -5,32 18,21 28,46 28,75 0,40 -10,69 -31,86 -20,17 -51,28 -93,32 18,12 27,28 27,49l0 86c50,-15 91,-45 122,-88 32,-43 48,-90 48,-143zm48 0l0 0c0,53 -13,101 -39,146 -26,45 -61,80 -106,106 -45,26 -93,39 -146,39 -53,0 -102,-13 -147,-39 -44,-26 -80,-61 -106,-106 -26,-45 -39,-93 -39,-146 0,-53 13,-102 39,-147 26,-44 62,-80 106,-106 45,-26 94,-39 147,-39 53,0 101,13 146,39 45,26 80,62 106,106 26,45 39,94 39,147z"
                      />
                  </svg>
                </a>
            </div>
        </footer>

    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script>
        typer ();
        function typer (){
            var y = 0;
            var m = "#749E40"
            var skill = ["I Design   ", "I Code   ", "And I Write too   "];
            var x = 0;
            function printSentence(id, sentence, speed) {
              var index = 0;
                  timer = setInterval(function() {
                    var char= sentence.charAt(index);
                    if(char === '<') index= sentence.indexOf('>',index);
                    document.getElementById(id).innerHTML= sentence.substr(0,index);
                    if(index++ === sentence.length){
                        clearInterval(timer);
                        removeSentence('dropping-texts', skill[x], 50);
                        if (x==2){
                            x = -1;
                        }
                    }
                  }, speed);
            } //printSentence
            function removeSentence(id, sentence, speed) {
              var index = sentence.length;
                  timer = setInterval(function() {
                    var char= sentence.charAt(index);
                    if(char === '<') index= sentence.indexOf('>',index);
                    document.getElementById(id).innerHTML= sentence.substr(0,index);
                    if(index-- === 0){
                        clearInterval(timer);
                        x++;
                        printSentence('dropping-texts', skill[x], 150);
                    }
                  }, speed);
            } //removeSentence
        //    printSentence('intro', intro, 30);
            printSentence('dropping-texts', skill[x], 150);
            blink = setInterval(function(){
            document.getElementById('dropping-texts').style.borderRight = "2px solid rgba(225, 204, 41, " + y + ")";
                if (y == 1){
                    y = 0;
                } else if (y == 0){
                    y = 1;
                }
            }, 150);
            var scrollingElement = (document.scrollingElement || document.body);
            function scrollToBottom () {
               scrollingElement.scrollTop = scrollingElement.scrollHeight;
            }
            var messageBottonBlink = setInterval(function(){
              var chatIco = document.getElementById('chat-icon-con');
              chatIco.style.backgroundColor = m;
                if (m == "#FFC916"){
                    m = "#749E40";
                } else if (m == "#749E40"){
                    m = "#FFC916";
                }
            }, 800);
        }

        function scrollToBottom(id){
           var div = document.getElementById(id);
           div.scrollTop = div.scrollHeight - div.clientHeight;
        }
  // ------------.....-------......------ AJAX ---------..........---------------------------
        var guestSend = document.getElementById('guest-send');
        var conversation = document.getElementById('conversation');
        var textarea = document.getElementById('message');
        var message = "";
        var chatIcon = document.getElementById('chat-icon-con');
        var realMessageIcon = '<img src="http://res.cloudinary.com/samsondappa/image/upload/v1524134592/chatIcon.png" id="icon-img">'
        var realMessageCancel = '<img src="http://res.cloudinary.com/samsondappa/image/upload/v1524444837/cancelmessage.png" id="icon-img">'
        var firstMessage = 0;
        var senderName = "";
        chatIcon.addEventListener("click", function(){
          if (this.innerHTML == realMessageCancel){
            this.innerHTML = realMessageIcon;
            document.getElementById('chatcon').style.display = "none";
            document.getElementById('chatcon').style.right = "-100%";
            scrollingElement.scrollTop = 0;
          } else {
            this.innerHTML = realMessageCancel;
            document.getElementById('chatcon').style.display = "table";
            document.getElementById('chatcon').style.right = "10%";
            scrollingElement = (document.scrollingElement || document.body)
            scrollingElement.scrollTop = 600;
            if (firstMessage == 0){
              sendTheMessage('message=intro');
              sendTheMessage('message=request name');
              firstMessage++;
            }
          }
        });
        
        $(function() {
    // Get the form.
    var form = $('#ajax-contact');

    // Set up an event listener for the contact form.
    $(form).submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

       // Serialize the form data.
      var formData = $(form).serialize();
      message = textarea.value;
      // Submit the form using AJAX.
      if (firstMessage == 1){
                sendTheMessage("message=name:" + message);
                textarea.value = "";
                firstMessage++;
                senderName = message;
              }else{
                sendTheMessage(formData);
                textarea.value = "";
              }
    });
});

function sendTheMessage(formData){
  var form = $('#ajax-contact');
 
  $.ajax({
          type: 'POST',
          url: $(form).attr('action'),
          data: formData,
      }).done(function(response) {
            var last8 = response.substr(response.length - 8);
            if (last8 == 'givename'){
              response = senderName;
            }
            conversation.innerHTML += '<div class="bot"><div class="arrow-left"></div>' + response + '</div>';
            scrollToBottom('messageCon');
      })
}

        guestSend.addEventListener('click', function(){
          message = textarea.value;
          if (message != ""){
            conversation.innerHTML += '<div class="guest"><div class="arrow-right"></div>' + message + '</div>';
            scrollToBottom('messageCon');
          }   
        });
// var res = str.replace("Microsoft", "W3Schools"); trainpwforhng
      //   function getMessageSam(messageSam) {
      //     if (messageSam.length == 0) {
      //         textarea.value = "";
      //         return;
      //     } else {
      //         var xmlReq = new XMLHttpRequest();
      //         xmlReq.onreadystatechange = function() {
      //             if (this.readyState == 4 && this.status == 200) {
      //                 message = this.responseText;
      //                 var last8 = message.substr(message.length - 8);
      //                 if (last8 == 'givename'){
      //                   message = senderName;
      //                 }
      //                 conversation.innerHTML += '<div class="bot"><div class="arrow-left"></div>' + message + '</div>';
      //                 scrollToBottom('messageCon');
      //             }
      //         };
      //         messageSam = messageSam.replace("#", "%23");
      //         messageSam = messageSam.replace("#", "%23");
      //         xmlReq.open("GET", "profile/brownsamson.php?qsam=" + messageSam, true);
      //         xmlReq.send();
      //     }
      // }
</script>
</html>
<?php } ?>