<?php
  // this runs only when a post is been made via the bot chat through AJAX
  if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!isset($conn)) {
        include '../../config.php';

        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    }

    if(isset($_POST['q']) && $_POST['q'] != '') {
      $q = trim($_POST['q']);

      if(strtolower($q) == 'aboutbot') {echo "Name: toribot. Version: 1.0"; exit();}
      $q = $_POST['q'];

      // HANDLE TRAINING
      $words = explode(':', $q);
      if((count($words) > 1) && ($words[0] == 'train')) {
        $QandA = explode('#', $words[1]);

        // Ensure '?' is always removed question
        $question = trim($QandA[0]);
        $question_length = strlen($question);
        $question = ($question[$question_length - 1] == '?') ? substr($question, 0, $question_length -1) : $question;

        $answer = trim($QandA[1]);
        $password = trim($QandA[2]);

        if(count($QandA) != 3 || $question == '' || $answer == '') {
          echo "Incorrect training format. Train me using <span style=\"color:pink;\">train: question # answer # password<span>"; exit();
        }

        if($password == 'password') {
          // try to retrieve question from db
          $sql = "select * from chatbot where question like '{$question}%'";
          $query = $conn->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);

          // retrain bot if retrieved
          if($query->rowCount()) {
            foreach ($results as $result) {
              if($answer == trim($result->answer)) {
                echo "I've been trained on this already"; exit();
              }
            }

            $sql = "insert into chatbot(question, answer) values('{$question}', '{$answer}')";
            $query = $conn->prepare($sql);
            $query->execute();

            if($query->rowCount()) {
              echo "I'm familiar with this quetion. Although I have taken note of this answer as well. Thanks for retraininig me."; exit();
            }
            else{
              echo "Sorry, something went wrong."; exit();
            }
          }

          // train bot if not retrieved
          $sql = "insert into chatbot(question, answer) values('{$question}', '{$answer}')";
          $query = $conn->prepare($sql);
          $query->execute();

          if($query->rowCount()) {
            echo "Thank you for training me. :)"; exit();
          }
        }

        echo "Sorry, incorrect password used."; exit();
      }

      // Get answer if question is found in db : non training mode
      $q_length = strlen($q);
      $q = ($q[$q_length - 1] == '?') ? substr($q, 0, $q_length - 1) : $q; // Ensure '?' is always removed question
      $sql = "select * from chatbot where question like '$q%'";
      $query = $conn->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $rowCount = $query->rowCount();

      if($rowCount == 1) { // if one answer
        echo $results[0]->answer; exit();
      }
      else if($rowCount > 1) { // if multiple answers, select 1 randomly from the available
        echo $results[rand(0, $rowCount - 1)]->answer; exit();
      }
      else {
        echo "I can't find an answer to that. Train me using <span style=\"color:pink;\">train: question # answer # password<span>";
      }
      exit();
    }
	}

  // Retrieve user details from database
  try {
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
  } catch (PDOException $e) {
    die(var_dump($e));
  }

  try {
    $result2 = $conn->query("select * from interns_data where username = 'toriboi'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
  } catch (Exception $e) {
    die(var_dump($e));
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>toriboi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style media="screen">
      body {
        background-color: #eee;
      }

      #main {
        background-color: blue;
        overflow: hidden;
        clear: both;
      }

      #t-container {
        font-family: 'ubuntu';
        width: 35%;
        min-width: 400px;
        /* margin: auto; */
        margin-top: 150px;
        background-color: #aaa;
        border-radius: 30px;
        float: left;
      }

      #t-image {
        position: relative;
        margin: auto;
        height: 100px;
      }

      img {
        position: absolute;
        top: -100px;
        left: 100px;
        border-radius: 50%;
      }

      #t-desc {
        text-align: center;
      }

      p {
        padding: 0 20px 50px 20px;
        color: #fff
      }

      #t-social-media {
        margin-bottom: 20px;
      }

      .t {
        font-size: 40px;
        margin: 10px;
        text-decoration: none;
        width: 50px;
      }

      .t-twitter:hover {
        color: #1DA1F2;
      }

      .t-facebook:hover {
        color: #3B5998;
      }

      .t-github:hover {
        color: #333;
      }

      .t:hover {
        box-shadow: 5px 5px 5px #333;
        text-decoration: none;
      }

      #t-bot {
        background-color: #222;
        width: 50%;
        float: left;
        margin: 50px 0 0 50px;
        overflow: hidden;
        border-radius: 5px;
        font-family: 'ubuntu';
        font-size: 16px;
      }

      #t-chat-section {
        width: 90%;
        margin: auto;
      }

      #t-message-area {
        width: 100%;
        background-color: #999;
        margin: 20px 0px;
        height: 100%;
        min-height: 500px;
        max-height: 500px;
        overflow-y: scroll;
      }

      #text, #submit {
        width: inherit;
        border: 0px;
        border-radius: 5px;
      }

      #text {
        background-color: #eee;
        width: 75%;
        padding-left: 10px;
      }

      #submit {
        background-color: #eee;
        width: 20%;
        float: right;
      }

      #submit:hover {
        background-color: #aaa;
        color: #eee;
      }

      #t-form {
        margin-bottom: 20px;
      }

      .bot-message, .my-message {
        text-align: left;
        margin: 5px;
      }

      .bot-message {
        height: auto;
        background-color: green;
        margin-left: 5px;
        margin-right: 20%;
        border-radius: 0 5px 5px 10px;
      }

      .my-message {
        height: auto;
        background-color: blue;
        margin-right: 5px;
        margin-left: 20%;
        border-radius: 5px 10px 0 5px;
      }

      .name {
        padding-left: 5px;
        color: maroon;
      }

      .message {
        padding-left: 5px;
        color: #fff;
      }

      footer {
        clear: both;
      }

      @media (max-width: 990px) {
        #t-container {
          margin: auto;
          margin-top: 150px;
          float: none;
        }

        #t-bot {
          margin: auto;
          float: none;
          width: 80%;
          margin-top: 50px;
        }
      }
    </style>

  </head>
  <body>
    <div ids="main">
      <div id="t-container">
        <div id="t-image">
          <img src="<?php echo $user->image_filename ?>" alt="" width="200" height="200">
        </div>
        <div id="t-desc">
          <h1 style="font-family:'ubuntu';"><?php echo $user->name ?></h1>
          <h2 style="font-family:'ubuntu';">HNG 4.0 Intern</h2>
          <p>
            I'm <?php echo $user->name ?>, aka <?php echo $user->username ?>,  a student of Federal University of Technology, Owerri, FUTO, from the department of computer science 400 level.
            I am very passionate about tech. I do a little PHP, JS and i also play around with the ARDUINO. I have an insatiable desire to learn.
            I love playing games, expecially soccer.
          </p>

          <div id="t-social-media">
            <span><a href="https://twitter.com/toriiboy" class="fa fa-twitter t-twitter t"></a></span>
            <span><a href="https://web.facebook.com/toriboi" class="fa fa-facebook t-facebook t"></a></span>
            <span><a href="https://github.com/toriboi" class="fa fa-github t-github t"></a></span>
          </div>
        </div>
      </div>

      <div id="t-bot">
        <div id="t-chat-section">
          <div id="t-message-area">
            <div class="bot-message">
              <span class="name">toribot: </span><span class="message">Hi, I'm toribot. Pleased to meet u.</span>
            </div>
            <div class="bot-message">
              <span class="name">toribot: </span><span class="message">
                You can train me using <span style="color:pink;">train: question # answer # password</span>
              </span>
            </div>
          </div>
          <form id="t-form">
            <input type="text" id="text" name="text" value="" placeholder="Chat with me!">
            <input type="submit" id="submit" name="submit" value="Send">
          </form>
        </div>
      </div>

    </div>

    <script type="text/javascript">
      var messageArea = document.getElementById('t-message-area');
      var form = document.getElementById('t-form');

      form.addEventListener('submit', handleRequest);

      function handleRequest(e) {
        var text = document.getElementById('text').value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            addMyMessage(text);
            setTimeout(addBotMessage(this.responseText), 500);
            messageArea.scrollTop = messageArea.scrollHeight;
          }
        }
        xhttp.open('POST', 'profiles/toriboi.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('q='+ text);

        e.preventDefault();
      }

      function addMyMessage(message) {
        var you = `<div class="my-message">
                    <span class="name">you: </span><span class="message">`+ message +`</span>
                  </div>`;
        messageArea.innerHTML += you;
      }

      function addBotMessage(answer) {
        var toribot = `<div class="bot-message">
                        <span class="name">toribot: </span><span class="message">`+ answer +`</span>
                      </div>`;
        messageArea.innerHTML += toribot;
      }

    </script>
  </body>
</html>
