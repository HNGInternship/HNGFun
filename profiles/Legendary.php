<!DOCTYPE html>
<html class="full-height" lang="en-US">
  <head>
    
    <?php

    if(!defined('DB_USER')){
    require "../../config.php"; 
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
  }

    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="Legendary"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

    <title>Internship 4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">

  <style type="text/css">   
    body{
      padding:0;
      margin:0;
      font-family: 'Roboto', sans-serif;
      font-size: 100%;
      
    } 
    footer{
      display: none;
    }
  .fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn; }
    .flex-container{
      display: flex;
      flex-flow: row wrap;
      justify-content:center;
      margin-top: 90px;
    }
    .content-containter{
    /**  background-color: #F3F3F3; **/
      width: 500px;
      height: 500px;
      margin: 10px;
      text-align: center;
      box-sizing: border-box;
    }
    #hello {
        font-size: 50px;
        color: #34495E;
        font-family: 'Alfa Slab One';
      }
      .about{
        margin-top:  -20px;
        font-family: 'Ubuntu';
        font-size: 1.1em;
      }.link {
        color: blue;
      }.link a{
        text-decoration: none;
      }
    .chatbot-container{
      background-color: #F3F3F3;
      width: 500px;
      height: 500px;
      margin: 10px;
      box-sizing: border-box;
      box-shadow: -3px 3px 5px gray;
    }
    .chat-header{
      width: 500px;
      height: 50px;
      background-color: #1380FA;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 1.5em;
    }
    #chat-body{     
        display: flex;
        flex-direction: column;
        padding: 10px 20px 20px 20px;
        background: white;           
        overflow-y: scroll;
        height: 395px;
        max-height: 395px;
    }
    .message{
      background-color: #1380FA;
      color: white;
      font-size: 0.8em;
      width: 300px;
      display: inline-block;
              padding: 10px;
      margin: 5px;
              border-radius: 10px;
                line-height: 18px;
    }
    .bot_chat{
      text-align: left;

    }
    .bot_chat .message{
      background-color: #1380FA;
      color: white;
      opacity: 0.9;
      box-shadow: 3px 3px 5px gray;
    }
    .user_chat{
      text-align: right;
    }
    .user_chat .message{
      background-color: #E0E0E0;
      color: black;
      box-shadow: 3px 3px 5px gray;
    }
    .chat-footer{
      background-color: #F3F3F3;
    }
    .input-text-container{
      margin-left: 20px;
    }
    .input_text{      
      width: 370px;
      height: 35px;
      padding: 5px;
      margin-top: 8px;
      border: 0.5px solid #1380FA;
      border-radius: 5px;
    }
    .send_button{
      width: 75px;
      height: 35px;
      padding: 5px;
      margin-top: 8px;
      color: white;
      border:none;
      border-radius: 5px;
      background-color: #1380FA;
    }.myfooter{
      margin: 100px 0px 50px 0px;
      font-size: 0.9em;
    }.footer_line{
      padding: 0px;
      margin-bottom: 20px;
      border: 0.5px solid #34495E;
      background-color: #34495E;
      width: 100%;
    }
    .grey-text{
      text-decoration: none;
    }
  </style>
  <?php

    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['input_text'];
      //  $data = preg_replace('/\s+/', '', $data);
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/', '', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    }

    function aboutbot() {
        echo "<div id='result'>My  name is Le-Bot v1.0 - I'm like human with fast brain of understanding, I get input and process it in other to display the result, if there is no result you can instruct me on how to get such result!</div>";
    }
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();

            if(empty($data)) {
                $training_data = array(':question' => $question,
                    ':answer' => $answer);

                $sql = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';

                try {
                    $q = $GLOBALS['conn']->prepare($sql);
                    if ($q->execute($training_data) == true) {
                        echo "<div id='result'>Thank you for teaching me new words, it seem you are very good in lecturing. I will like you to teach me more next time!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>Invalid Password, Try Again!</div>";

        }
    }

    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry, I don not understand what you meant. You can teach me simply by using the format - 'train: question # answer # password' (without quote)</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

  </head>
  <body id="top">
    
      
<section class="py-5" id="projects">
  <div class="container">
    <div class="fadeIn">
      <h2 class="text-center h1 my-4">Internship Program</h2>
      <p class="px-5 mb-5 pb-3 lead blue-grey-text text-center">
       Internship (4) program is the best program so far, it allow me to rethink about my career as a developer right after my examination at Federal Polytechnic, Ukana. I will never forget to thank Mr David Iyang-Etoh because without him I wouldn't have know any thing about INTERNSHIP. My big thanks to INTERNSHIP for this opportunity that they created in other to blow up my brain to discover new shit as a developer, to share knowledge, Teach and Research. I REMAIN LEGENDARY, A BIG THANKS.
      </p>
    </div>
    <div class="row wow fadeInLeft" data-wow-delay=".3s">
      <div class="col-lg-6 col-xl-5 pr-lg-5 pb-5"><img class="img-fluid rounded z-depth-2" height="5" src="http://res.cloudinary.com/uyo-obong/image/upload/c_scale,h_576,w_864/v1524810634/legend.jpg" alt="Legendary" /></div>
      <div class="col-lg-6 col-xl-7 pl-lg-5 pb-4">
        <div class="row mb-3">
          <div class="col-1 mr-1"><i class="fa fa-book fa-2x cyan-text"></i></div>
          <div class="col-10">
            <h5 class="font-bold">Name:</h5>
            <p class="grey-text">
             <h1> <?=$my_data['name'] ?> </h1>
            </p>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-1 mr-1"><i class="fa fa-code fa-2x red-text"></i></div>
          <div class="col-10">
            <h5 class="font-bold">Technology</h5>
            <div class="grey-text"><strong>
              CEO & Founder, of <a href="https//excellentloaded.com" _target="blank"> Excellentloaded.com </a>
              </strong></div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
    <hr/>




     <div class="container">
    <div class="row wow fadeInLeft" data-wow-delay=".3s">
      <div class="col-lg-6 col-xl-5 pr-lg-5 pb-5"><div class="bot_chat">
        <div class="message">
          <p class="grey-text">It wasn't  possible, until I put on my Laptop. It can take days to research for a particular thing, when you realize, you gonna be happy. <b>Remember, programmers are not robot, but they are researchers. A good programmer is a good researcher!!! </b></p>
      </div></div> </b></div>
      <div class="col-lg-6 col-xl-7 pl-lg-5 pb-4">
        <div class="row mb-3">
          <div class="col-10">
            <p class="grey-text">
             <div class="chatbot-container">

                <!-- CHAT BOT HERE -->
      <div class="chat-header">
        <span>Le-Bot</span>
      </div>
      <div id="chat-body">
        <div class="bot_chat">
            <div class="message">Hello! My name is Le-bot.<br>I'm willing to attend to any of your question, so you can ask me anything!.<br>Type <span style="color: #FABF4B;"><strong> aboutbot</strong></span> to know more about me.
            </div>
            
        </div>
      </div>
      <div class="chat-footer">
        <div class="input-text-container">
          <form action="" method="post" id="chat-input-form">
            <input type="text" name="input_text" id="input_text" required class="input_text" placeholder="Type your question here...">
            <button type="submit" class="send_button" id="send">Send</button>
          </form>
        </div>        
      </div>
    </div>
  </div>  


<!--My script here-->
<script>
    var outputArea = $("#chat-body");

    $("#chat-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#input_text").val();

        outputArea.append(`<div class='user_chat'><div class='message'>${message}</div></div>`);


        $.ajax({
            url: 'profile.php?id=Legendary',
            type: 'POST',
            data:  'input_text=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='bot-chat'><div class='message'>" + result + "</div></div>");
                    $('#chat-body').animate({
                        scrollTop: $('#chat-body').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });


        $("#input_text").val("");

    });
</script>

            </p>
          </div>
        </div>
        </div>
      </div>
            
    <hr/>
    

    </footer>
   
 
   
</body>
</html>

