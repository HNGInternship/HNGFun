<?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="Perkyprince"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

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
        $data = $_POST['user-input'];
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/','', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }elseif($temp2==='help'){
            help();
        }elseif($temp2 === 'version'){
            echo "<div id='result'> <b>To know about my version, type: aboutbot</b></div>";
        }else{
            getAnswer($temp[0]);
        }
    }
  ##About Bot
    function aboutbot() {
        echo "<div id='result'><strong>I am Perkyprince's chatbot - STEVIA. Version: 1.0</strong></div>";
    }
   function help(){
   echo "<div id ='result'>Ask me your question and I will answer you.<br>You can train me to answer a particular question with a specific answer.<br> You can train me using: <br>train: question # answer # password. <br>To find out about me type: <b>aboutbot</b></div>";
   
   }
  
  ##Train Bot
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
                        echo "<div id='result'>Training successful! Ask the same question to get an answer!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>The password you entered is incorrect. </br>Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>I can't understand it, you can train me using: train: question # answer # password</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

 <!DOCTYPE html>
<html>
    <head>
        <title>Profile of Perkyprince</title>
        <meta charset="utf-8">
        <meta name="description" content="This page is a personal profile page about the author">
        <meta name="keywords" content="HTML5, CSS, Javascript, PHP, Profile, HNG, About, Internship, Chat, Chatbot">
        <meta name="author" content="Princewill Iwuala">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://use.fontawesome.com/dfb23fb58f.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!-- link to main stylesheet -->
        <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/3.3.4/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://static.oracle.com/cdn/jet/v4.1.0/default/css/alta/oj-alta-min.css">
        <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require/require.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <style type="text/css">

          body {
            background-size:cover;
            background-color: #f2ca85;
            color: #333333;
            font-family: 'Courier New', Courier, 'Lucida sans Typewriter', 'Lucida Typewriter', monospace;
          }

          .card {
            box-shadow: 0 40px 80px 0 rgba(0, 0, 0, 0.2);
            background-image: url(http://res.cloudinary.com/perkyprince/image/upload/v1525407435/classic.jpg);
            background-size:cover;
            max-width: 350px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 67px;
            margin-bottom: auto;
            text-align: center;
            background-color: white;
          }

          img {
            margin: auto;
          }

          .main {
            color: black;
            font-weight: bold;
            font-family: Roboto;
            font-style: normal;
            font-size: 30px;
          }

          #about{
            text-align: left;
            font-weight: bold;
            font-family: Roboto;
            font-style: italic;
            font-size: 18px;
          }

          .title {
            color: black;
            font-weight: bold;
            font-family: Roboto;
            font-style: italic;
            font-size: 18px;
          }

          .thick-green-border {
            border-color: grey;
            border-width: 1px;
            border-style: solid;
            border-radius: 30%;
          }

          a {
            text-decoration: none;
            font-size: 22px;
            color: black;
          }

          .modal-body{
            background-color: #79cdee;
          }

          .chat {
            position: relative;
            overflow: auto;
            overflow-x: hidden;
            overflow-y:absolute;
            padding: 0 35px 35px;
            border: none;
            margin-bottom: 0px !important;
            margin-top: 2px !important;
            max-height: 300px;
            -webkit-justify-content: flex-end;
            justify-content: flex-end;
            -webkit-flex-direction: column;
            flex-direction: column;
          }
          .chat p.stev{
            float: left;
            font-size: 14px;
            font-weight: normal;
            font-family: Roboto;
            padding: 20px;
            border-radius: 0px 20px 20px 20px;
            background-color: black;
            color: #efc940;
            max-width: 250px;
            clear: both;
            display: inline-block;
            margin-bottom: 0px !important;
            margin-top: 2px !important;


          }
          .chat p.me{
            float: right;
            font-size: 14px;
            font-weight: normal;
            font-family: Roboto;
            padding: 20px;
            border-radius: 20px 0px 20px 20px;
            background-color: #efc940;
            color: black;
            max-width: 250px;
            clear: both;
            margin-bottom: 0px !important;
            margin-top: 2px !important;
          }

          .chat-input{
            background-color: #1518db;
          }

          input {
            padding: 0 35px 35px;
            height: 50px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .chat-btn{
            border: none;
            outline: 0;
            display: inline-block;
            color: white;
            background-color: #000;
            text-align: center;
            margin: auto;
            cursor: pointer;
            max-width: 50%;
            font-size: 18px;
          }

          .chat-btn:hover, a:hover{
            opacity: 0.5;
          }

          .modal-content{
            background-color: #fff;
          }

          .stev-img{
            background: url('https://res.cloudinary.com/perkyprince/image/upload/v1525602151/chatrobot.jpg');
            background-repeat: no-repeat;
            background-size: 30px;
          }

          .me-img{
            background: url('http://res.cloudinary.com/perkyprince/image/upload/v1525601790/human.png');
            background-repeat: no-repeat;
            background-size: 30px;
          }
           
          .avatar{
            width: 15%;
            height: 10%;
          }
        </style>
    </head>

    <body>
      

        <div class="card">
          <img class="smaller-image thick-green-border img-responsive" src="http://res.cloudinary.com/perkyprince/image/upload/v1524546688/Camera1.jpg" alt="Perkyprince's Picture" style="width:80%">
          <div>
            <h1 class="main">Iwuala Princewill</h1>
            <p class="title">Intern at HNGInternship4</p>
          </div>
          <div>
            <ul id="about">
              <li>Web Developer/Designer</li>
              <li>Surveyor</li>
              <li>GIS Analyst</li>
              <li>Owerri, Imo state, Nigeria</li>
            </ul>
          </div>
          <div>
            <a href="https://github.com/Perkyprince" target="_blank"><i class="fa fa-github"></i></a>
            <a href="https://www.instagram.com/princewillherberts/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/Perkyprince33" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/princewill-herberts-63b399126/" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://web.facebook.com/perky.prince.14" target="_blank"><i class="fa fa-facebook"></i></a>
          </div>

          <div>
          <button class="btn col-sm-offset-5 chat-btn" data-toggle='modal' data-target='#chatModal'><i class="fa fa-comment-alt">Chat Now</i></button>
          </div>
          <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="chatModalLabel"><span><img class="avatar" src="https://res.cloudinary.com/perkyprince/image/upload/v1525602151/chatrobot.jpg" alt="Stevia"></span><b>Stevia</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body"> 
                  <div class="chat" id="chat">
                    <p class="stev">Hi! My name is <b>Stevia</b>.<br>I am here to help you.<br>Feel free to ask me anything.<br> You can tell me what to do and I promise not to fail you.<br> just type "help' to start with.<br>You can train me too by simply using <br>the format: "train:question#answer#password"<br>The Password is: <b>password</b>.</p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="chat-input">
                  <form action="" method="post" id="user-input-form">
                    <div class="input-group">
                      <input type="text" class="form-control" name="user-input" id="user-input" class="user-input" placeholder="Ask me your questions"><span class="input-group-addon"><button id="send"><i class="fa fa-send"></i></button></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <script>
            var outputArea = $("#chat");
            $("#user-input-form").on("submit", function(e) {
              e.preventDefault();
              var message = $("#user-input").val();
              outputArea.append(`<p class='me'>${message}</p>`);
              $.ajax({
                url: 'profile.php?id=Perkyprince',
                type: 'POST',
                data:  'user-input=' + message,
                success: function(response) {
                  var result = $($.parseHTML(response)).find("#result").text();
                  setTimeout(function() {
                    outputArea.append("<p class='stev'>" + result + "</p>");
                    $('#chat').animate({
                      scrollTop: $('#chat').get(0).scrollHeight
                    }, 1500);
                  }, 250);
                }
              });
              $("#user-input").val("");
            });
          </script> 
        </div> 
    </body>
</html>