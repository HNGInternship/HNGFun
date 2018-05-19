<?php
ini_set("display_errors",1);
if(!defined('DB_USER')){
  require_once('../config.php');
}

global $conn;

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data WHERE username = 'tvynch'");
  $user = $result2->fetch(PDO::FETCH_OBJ);

// for jacz chatbot

  function getMessage($query){
    global $conn;

    $sql = "SELECT `answer` FROM `chatbot` WHERE `question` = '" . $query . "' ORDER BY RAND() ASC LIMIT 1";

        if($smtp = $conn->query($sql)){
          while($row = $smtp->fetch(PDO::FETCH_ASSOC))  {
              echo  $row['answer'];
              exit();
          }
        }else{
          return false; exit();
        }
  }

  function smartBot($keyword,$response){
    global $conn;

    if(!empty($keyword) && !empty($response)){

      $keyword  = filter_var($keyword,FILTER_SANITIZE_STRING);
      $response   = filter_var($response,FILTER_SANITIZE_STRING);

      $query  = "SELECT * FROM chatbot WHERE question = '{$keyword}' ";
      $query .= "AND answer = '{$response}'";

      $smtp = $conn->prepare($query);
      $smtp->execute();
      if($row = $smtp->fetch()){
        echo "This I already know this. Teach me something new. Thanks";
        exit();
      }else{
        try {
             $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . trim($keyword) . "', '" . trim($response) . "')";

              $conn->query($sql);
              return true;
            }
              catch(PDOException $e)
            {
              echo $sql . "<br>" . $e->getMessage();
              return false;
            }
      }

    }else{
      return false;
    }
  }

  function about(){

    echo "<strong>JACZ</strong> version 1.0.4.18,<br/> developer is @tvynch &trade;";
    exit();
  }

  function divideString($delimiter,$data){

    $return = explode($delimiter, $data);
    return $return;
  }

  function trainJacz($query){
    $str = divideString("#", trim($query));

    if(isset($str) && !empty($str)){
      //validating users input for correct requirements
      if(array_values($str) !== "train:" ){
        //ensure the user begins training with train:
        $question = trim($str[0]);
        $question = str_replace("train: ", "", $question);

        if(isset($question) && !empty($question) && !empty($str[1]) && isset($str[2])){
          //ensure an answer was provided in proper format
          $answer = trim($str[1]);

          if(isset($question) && isset($answer) && isset($str[2])){
              $password = trim($str[2]);
              if($password === "password"){
                smartBot($question, $answer);
                echo "Thanks I feel smarter.<br> You can teach me more so i'd get smarter";
                exit();
              }else{
                echo "Password mismatch. Use the correct password and try again.";
                exit();
              }

          }else{
            echo "Did you forget to add password, Use #password replace <strong>password</strong> with your password.";
            exit();
          }
        }else{
          echo "No answer was provided. Use #answer to input an answer after the question. Replace <strong>Answer</strong> with your answer.";
          exit();
        }

      }else{
        echo "Use train: to begin training JACZ.";
        exit();
      }

    }
  }

  function day(){
    $timestamp = time();
        $readabledate = date("l jS F Y",$timestamp);
        echo json_encode("Today is ". $readabledate); exit();
  }

  function help(){
    echo "<ul class='help'>
        <span>help menu</span>
        <li>call a function by typing the function name with parenthesis, if it exists it will run. e.g 'about()' shows the version of Jacz. <span style='color:red;'>NOTE:<span> do not call a php built in function.</li>
        <li> type 'list' to view the list of functions i am originally built with</li>
        <li>use phrases like 'about' to know the version of Jacz.</li>
        <li>use phrases like 'time' or 'what is the time' to get the current time in GMT.</li>
        <li>use phrases like 'today' or 'what day is it' or 'what is today' to get today's date.</li>
        <li>convert to different currencies. Type Currency Convert or check function list.
        </li>
      <ul>"; exit();
  }

  function knowconversion(){
    echo "<ul>
        <span>convert to dollars,euros,pounds,rupees,canadian dollars and australian dollars.</span><br>
        <span> how to make conversion</span>
        <li>type: eg '1 naira to dollars convert'.</li> 
        <li>NOTE: Conversion must be in this very order. Values for conversion are gotten from https://xe.com/ and are liable to change as exchange market changes</li>
      </ul>"; exit();
  }

  function funclist(){
    echo "<ul>
        <span>Jacz Built-in fuctions List</span>
        <span style='color:red'>Note: DO NOT USE ANY PHP BUILT-IN FUNCTIONS.</span>
        <li>about()</li>
        <li>day()</li>
        <li>timing()</li>
        <li>help()</li>
        <li>knowconversion()</li>
      </ul>"; exit();
  }

  function convertCurrencies($query){
    //query digit to dollars
    //check query if it has currency in the query
    if(strpos($query, "dollars to naira") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $naira = $digit[0] * 359.500;
        $naira = money_format("%i", $naira);
        echo $naira." NGN at rate of 359.500/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "naira to dollars") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $dollars = $digit[0] * 0.00278164;
        $dollars = money_format("%i", $dollars);
        echo $dollars." USD at rate of 0.0278164/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "euros to naira") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $naira = $digit[0] * 428.747;
        $naira = money_format("%i", $naira);
        echo $naira."NGN at rate of 428.747/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "naira to euros") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $euro = $digit[0] * 0.00233162;
        $euro = money_format("%i", $euro);
        echo $euro." EUR at rate of 0.00233162/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "naira to pounds") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $pounds = $digit[0] * 0.00204860;
        $pounds = money_format("%i", $pounds);
        echo $pounds." GBP at rate of 0.00204860/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "pounds to naira") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $naira = $digit[0] * 486.676;
        $naira = money_format("%i", $naira);
        echo $naira." NGN at rate of 486.676/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "australian dollars to naira") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $naira = $digit[0] * 0.00371190;
        $naira = money_format("%i", $naira);
        echo $naira." NGN at rate of 0.00371190/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "naira to australian dollars") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $aud = $digit[0] * 269.403;
        $aud = money_format("%i", $aud);
        echo $aud." AUD at rate of 269.403/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "canadian dollars to naira") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $naira = $digit[0] * 0.00360388;
        $naira = money_format("%i", $naira);
        echo $naira." NGN at rate of 0.00360388/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, " naira to canadian dollars") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $cad = $digit[0] * 277.479;
        $cad = money_format("%i", $cad);
        echo $cad." CAD at rate of 277.479/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "naira to rupees") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $rupee = $digit[0] * 5.36198;
        $rupee = money_format("%i", $rupee);
        echo $rupee." INR at rate of 5.36198/1"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }elseif (strpos($query, "rupee to naira") !== false){
      $digit = divideString(" ",$query);
      if(is_numeric($digit[0])){
        $naira = $digit[0] * 277.479;
        $naira = money_format("%i", $naira);
        echo $naira." NGN at rate of 277.479"; exit();
      }else{
        echo "Ensure that the value you input is a number."; exit();
      }
    }
  }

  function timing(){
    $timestamp = time()+date("Z");
    $readabletime = gmdate("h: i a", $timestamp);
    echo "The time is ". $readabletime." GMT"; exit();
  }

  function getFunction($query){
    //search if query has ()
    if(strpos($query, "()") !== false) {
      //get an array with the aim to get the function's name
        $func = divideString("()", $query);
        $func = trim($func[0]);

        //make sure function exists,
        //if it does return else give an error message
        $jaczFunc = array('day','timing','help','funclist','about', 'knowconversion');
        if(in_array($func, $jaczFunc)){
          return $func();
          exit();
        }else{
          echo "This function does not exists. type list to view list of Jacz's function.";
          exit();
        }
        exit();
    }
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $query = isset($_POST['query'])? $_POST['query'] : '';
    $query = strtolower($query);
    $query = filter_var($query,FILTER_SANITIZE_STRING);

      if( strpos($query, "train:") !== false){
        trainJacz($query);
      }elseif($query === 'about'){
        about();
      }elseif (($query === 'time') || ($query === 'what is the time')) {
        timing();
      }elseif ($query === 'today' || $query === 'what day is it' || $query === 'what is today') {
        day();
      }elseif (strpos($query, "()") !== false) {
        getFunction($query);
      }elseif (strpos($query, "help") !== false) {
        help();
      }elseif (strpos($query, "list") !== false) {
        funcList();
      }elseif (strpos($query, "convert") !== false) {
        if(!convertCurrencies($query)){
            knowconversion();
        }else{
          convertCurrencies($query);
        }
      }elseif($query){

        if(strpos($query, "?") !== false){
          $query = str_replace("?", "", $query);
          if(!getMessage($query)){
            echo "I do not understand you. You could train me so i'd understand"; exit();
          }else{
            getMessage($query);
          }
        }else{
          if(!getMessage($query)){
            echo "I do not understand you. You could train me so i'd understand"; exit();
          }else{
            getMessage($query);
          }
        }
        exit();
      }else{
        echo "I do not understand you. You could train me so i'd understand"; exit();
      }
      exit();
  }
// end of chatbot

  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@tvynch</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-font-awesome.min.css">
  </head>
  <style media="screen">
    .page-header {
      padding-bottom: 9px;
      margin: 40px 0 20px;
      border-bottom: 1px solid #eee;
    }
    .small{
          font-size: 0.35em;
          border-top: 1px solid #eee;
    }
    .header{
        font-weight: bold;
        font-stretch: expanded;
    }

    a{
      text-decoration: none;
    }

   li{
        list-style: none;
    }

    section{
      margin-top: 50px;
    }

    html {
      box-sizing: border-box;
    }
        *,
    *::before,
    *::after {
      box-sizing: inherit;
    }
          *{
          padding: 0;
          margin: 0;
          border: 0;
      }

      body{
          background: silver;
      }

      #container{
          width: 100%;
          background: lavender;
          margin: 0 auto;
          padding: 1rem;
          display: none;
          overflow: hidden;
      }

      /* .chatmessages{
        overflow: auto;
        height: 300px;
      } */

      .title{
        color: green;
        font-weight: bolder;
        font: normal 1rem/1.5 Arial, sans-serif;
        font-size: 1.3em;
      }

      #chat_box{
          width: 90%;
          /*height: 400px;*/
      }

      /* div .chatbot-input{
        border-top: 1px solid red;
        background: green;
        border-radius: 25px;
      } */

      #chat_data{
          width: 100%;
          padding: 5px;
          margin-bottom: 5px;
          border-bottom: 1px solid silver;
          font-weight: bold;
      }

      input[type="text"]{
          width: 80%;
          height: 40px;
          border: 1px solid grey;
          border-radius: 5px;
      }

      input[type="submit"]{
          width: 100%;
          height: 40px;
          border: 1px solid grey;
          border-radius: 5px;
      }

      /* textarea{
          width: 100%;
          height: 40px;
          border: 1px solid grey;
          border-radius: 5px;
      } */

      .chatbot {
        position: fixed;
        bottom: 20px;
        right: 10px;
        z-index: 1000;
        width: auto;
      }

      #container {
        position: absolute;
        bottom: 30px;
        right: 4.5rem;
        width: 500px;
        height: 490px;
        overflow: hidden;
        overflow-y: auto;
        border-radius: 1rem 1rem 0 1rem;
      }

      .chatbot-screen {
        display: flex;
        flex-flow: column;
        margin-bottom: 2rem;
        padding: 0.7rem 1rem;

        background: lavender;
      }

      .chatbot-screen:empty {
        display: none;
      }

      .chat {
        position: relative;
        display: flex;
        align-items: baseline;
        margin-bottom: 0.4rem;
        padding: 0.3rem 1rem;
        box-shadow: 1px 2px 3px 0 #ccc;
        background: white;
      }


      .chat::after {
        content: '';

        position: absolute;
        top: 12px;
        border: 10px solid transparent;
        /*filter: drop-shadow(1px 3px 3px #ccc);*/
      }

      .chat span {
        display: inline-block;
        margin-right: 0.5rem;
        box-sizing: border-box;
        font-size: 1rem;
        font-weight: bold;
      }

      .user {
        justify-content: flex-end;
      }

      .user::after {
        right: -20px;

        border-left-color: white;
      }

      .user span {
        color: purple;
      }

      .bot {
        justify-content: flex-start;
      }

      .bot::after {
        left: -20px;


        border-right-color: white;
      }

      .bot span {
        color:  green;
      }
      button {
        border: none;
        padding: 0.7em;
        border-radius: 5px;
        font-size: 1.1em;
        cursor: pointer;
      }
      .bot li{
        box-sizing: border-box;
        margin-left: 30px;
        word-wrap: break-word;
      }

      .collapsible{
        display: inline-flex;
        align-items: center;
        justify-content: center;

        background-color: white;
        color: #444;
        cursor: pointer;
        padding: 10px;
        height: 50px;
        width: 50px;
        border-radius: 289304px;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;

      }
      .active, .collapsible:hover{
        background-color: green;
      }

      .response{
        height: 200px;
        overflow: auto;
      }

    .footer{
      margin-top: 15px;
      padding-top: 25px;
      border-top: 1px solid grey;
    }
    .footer li{

    }
  </style>
  <body>
    <div class="container">
      <div class="row">
          <header class="col-md-12">
            <h1 class="page-header"> tvynch's Profile <span class="small"> George Jacob T.</span></h1>

            <div class="text-center header">
              <h3>Major >> Web Developer</h3>
            </div>
          </header>

          <section class="col-md-6">

            <div class="col-12">
              <p>I am a simple guy, a graduate of Electrical/Electronics Engineering (Telecommunication Option), who fell in love with the codes and computers</p>
              <p>Presently getting deeper and hope to use this to create job opportunities for the unemployed youth while still learning to be great in the trade. Also to enlighten and teach young people the fun and beauty of not just owning a computer system but using it to build applications that could make the world a better place.</p>

              <p>Joining the Hotel.ng stack has made me feel like i am in a world where i am truly living, cause i meet people who are ready to teach and help shapen and polish my coding skills. Also i get the chance to assist others to get pass their hudles. Like they say <blockquote>"When you teach, you also learn."</blockquote> </p>
            </div>

            <div class="col-12">
              <p>Glad To be here, Ready to learn, Ready for the challenges.</p>
              <p>Lets do this...</p>
            </div>

          </section>

          <section class="col-md-6">
            <img src="images/tvynch.jpg" alt="tvynch">
          </section>

          <section class="chatbot col-md-6 col-md-offset-3">
            <!-- chatbot -->
            <button class="collapsible"> <i class="fa fa-paper-plane-o" style="font-size:36px"></i></button>
              <div id="container">
                  <div id="chat_box">
                      <div id="chat_data">
                        <h1 class="title"><strong>Jacz</strong></h1>
                        <hr style="background-color: red; border: 2px solid red;">
                      </div>
                      <div class="chat">
                        <p>Hello i am <strong>Jacz</strong> and i am ready to assist you.
                        You can train me by using keywords <qoutes><strong>train: question #answer #password</strong></qoutes>. Type help to view menu on what I can do and list to view my Built-in fuctions.</p>
                       </div>
                   </div>


                   <div class="chatbot-screen">
                      <div id="time"></div>
                       <div id="chatmessages" class="chatmessages"></div>
                   </div>


                   <div class="chatbot-input">
                    <form id="chatbotForm">
                        <input type="text" name="query" id="textbox" placeholder="Enter Message" autocomplete="off" />
                        <button type="submit" id="send">Send</button>
                    </form>
                   </div>
               </div>
          </section>

          <footer class="footer text-center col-md-12">
            <div class="col-12">
            <h6>I can be reached for contracts and just to say hi with the contacts below</h6>
                <ul>
                  <li><a href="https://web.facebook.com/tammvynch" >
                    tvynch &trade;
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                     </span>
                  </a></li>
                  <li>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-address-book fa-stack-1x fa-inverse"></i>
                     </span> 08058957387
                    </li>
                  <li><a href="https://twitter.com/tvynch">
                    tvynch &trade; <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                  </a></li>
                </ul>
              </div>
          </footer>

        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

         <script type="text/javascript">
            var col = document.getElementsByClassName('collapsible');

            for (var i = 0; i < col.length;  i++) {
               col[i].addEventListener("click", function (){
                this.classList.toggle(".active");
                var content = this.nextElementSibling;
                if (content.style.display === 'block') {
                  content.style.display = "none";
                }else{
                  content.style.display = "block";
                }
               });
            }
         </script>

        <script type="text/javascript">

            $(document).ready(function(){
              //e.preventDefault();

               function sendMessage(message){

                  var chatTimer = new Date();
                  var h = chatTimer.getHours();
                  var m = chatTimer.getMinutes();
                  var ampm = h >= 12 ? 'pm':'am';
                  h = h % 12;
                  h = h ? h : 12;
                  m = m < 10 ? '0'+m : m;
                  var chatTime = "<div class='currentMessage'>" + h + ":" + m + ampm + "</div>";
                  var prevMsg = $("#chatmessages");
                  if(prevMsg != 0){
                    prevMsg = prevMsg + '';
                }

                $("#chatmessages").append(chatTime + "<div class='chat bot currentMessage'><span>"+"<span>Jacz: </span>" + message + "</span>"+"</div>");

                $(".currentMessage").hide();
                $(".currentMessage").delay(1000).fadeIn();
                $(".currentMessage").removeClass("currentMessage");
                // $("#chatmessages").scrollTop($("#chatmessages")[0].scrollHeight);
              }

              function users(message){
                var chatTimer = new Date();
                var h = chatTimer.getHours();
                var m = chatTimer.getMinutes();
                var ampm = h >= 12 ? 'pm':'am';
                h = h % 12;
                h = h ? h : 12;
                m = m < 10 ? '0'+m : m;
                var chatTime = "<div>" + h + ":" + m + ampm + "</div>";
                var user = `<span> You : </span>`;
                var prevMsg = $("#chatmessages");
                      $("#chatmessages").append(chatTime + `<div class='chat user'><span>` + user + message + `</span></div>`);
                 $("#container").scrollTop($("#chatmessages")[0].scrollHeight);
              }

              $("#send").click(function(e){
                  e.preventDefault();

                  var txt = $("#textbox").val();
                  $("#textbox").val("");
                  if(txt != ''){

                    users(txt);

                    $.ajax({
                        url   :'profiles/tvynch.php',
                        type  :"POST",
                        data  :{query:txt},
                        success : function(response){
                         sendMessage(response);
                         $("#textbox").val("");
                          //for getting messages to scroll up to top
                        $("#container").stop().animate({scrollTop: $("#chatmessages")[0].scrollHeight},1000);
                         
                        },
                        error: function(error){
                          console.log(error);
                        }
                    });
                    
                  }else{
                    sendMessage("I can not provide answer to a blank question.");
                  }

                });
              //for getting messages to scroll up to top
               // $("#container").stop().animate({scrollTop: $("#chatmessages")[0].scrollHeight},1000);
                $("#textbox").val("");
            });
    </script>

  </body>
</html>
