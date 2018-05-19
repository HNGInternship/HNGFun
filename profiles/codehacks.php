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
    $secret_word_db = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $secret_word_db = $secret_word_db->fetch(PDO::FETCH_OBJ);
    $secret_word = $secret_word_db->secret_word;

    $my_data = $conn->query("SELECT * FROM interns_data WHERE username = 'codehacks'");
    $user = $my_data->fetch(PDO::FETCH_OBJ);
  }
  catch (PDOException $pe) {
    die("Could not connect to the database " . $pe->getMessage());
  }
?>
<?php
  if (isset($_POST['question'])) {
    function train_bot($data){
      $question = '';
      $answer = '';
      $password = 'password';
      $response = '';
      $train_bot_msg = substr($data, 6);
      $train_bot_msg = preg_replace("([\s]+)", " ", trim($train_bot_msg));
		  $train_bot_msg = preg_replace("([?.'])", "", $train_bot_msg);
      $split_train_msg = explode('#', $train_bot_msg);
      $split_train_msg_count = count($split_train_msg);
      if (isset($split_train_msg[0]) && strlen($split_train_msg[0]) > 0) {
        $question = trim($split_train_msg[0]);
      }
      else {
        echo $response = 'question not set';
        return;
      }
      if(isset($split_train_msg[1]) && strlen($split_train_msg[1]) > 0) {
        $answer = trim($split_train_msg[1]);
      }
      else {
        echo $response = 'answer not set';
        return;
      }
      if (isset($split_train_msg[2])) {
        if (trim($split_train_msg[2]) !== $password) {
          echo $response = 'Invalid password';
        }
        else {
          //echo $response = 'valid pass';
        }
      }
      if ($split_train_msg_count < 1 || $split_train_msg_count > 3) {
        echo $response = 'Invalid training format';
      }
      else {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        $sql = "INSERT INTO chatbot (question, answer) VALUES ('$question', '$answer')";
        $conn->exec($sql);
        echo 'Training successful. I am now smarter thanks to you!';
      }

      return;
    }
    function generate_response($data) {
      $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
      $query = "SELECT answer FROM chatbot WHERE question LIKE '%$data%' ORDER BY rand() LIMIT 1";
      $result = $conn->query($query)->fetch_all();
      if (!$result) {
        echo 'I am unable to answer your question right now. But you can train me to answer this particular question. Use the format <br><br> train: question #answer #password';
        return;
      }
      echo $result[0][0];
      return;
    }
    
    $message = $_POST['question'];
    $is_train = substr($message, 0, 6);
    if($is_train === 'train:') {
      train_bot($message);
    }
    else {
      generate_response($message);
    }
    return;
  }
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <title>
        <?php echo $user->name; ?>'s Profile
      </title>
      <style>
        body {
          font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
          font-size: 14px;
          line-height: 1.5;
          color: #333;
          background: linear-gradient(90deg, #fff, hsla(0, 0%, 62%, .2));
        }
        h1 {
          margin-top: 60px;
        }
        .job-role {
          font-size: 18px;
        }
        hr {
          border: 1px thin #fff;
          margin-left: 5px;
          margin-right: 5px;
          width: 98%;
        }

        .social-media {
          display: flex;
          padding: 10px;
          flex-wrap: wrap;
          justify-content: space-between;
          align-items: center;
        }

        a:link {
          text-decoration: none;
        }

        .short-description {
          display: flex;
          padding: 10px;
          justify-content: space-between;
        }
        .short-description img {
          width: 250px;
          height: 250px;
          border-radius: 50%;
        }
        h3 {
          text-align: center;
        }
        .show-bot {
          position: fixed;
          right:10px;
          bottom: 10px;
          z-index: 5;
          background-color: #FFC107;
          padding: 20px;
          border-radius: 50%;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
          cursor: pointer;
        }
        .bot {
          display:none;
          position: fixed;
          right: 0;
          bottom: 0;
          z-index: 5;
          background-color: #FFC107;
          padding-top: 15px;
          width: 50%;
          height: 50vh;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
          transition: opacity 0.6s;
        }
        .bot h3 {
          margin: 0 5px;
          text-align: left;
        }
        .bot i {
          float: right;
          cursor: pointer;
        }
        .bot-chat {
          clear: both;
          position: relative;
          overflow-y: scroll;
          width: 100%;
          height: 100%;
          background-color: white;
          padding: 10px;
        }
        .bot-chat p {
          width: 60%;
        }

        .bot-actions {
          position: fixed;
          right: 0;
          bottom: 0;
        }
        .user-message {
            margin-left: auto;
            margin-right: 0;
            margin-top:5px;
            margin-bottom: 10px;
            text-align: right;
            border-radius: 16px;
            background-color: #9d9d9d;
            width: 60%;
            padding: 10px;
            color: white;
          }
          .bot-message {
            margin-bottom: 30px;
            border-radius: 16px;
            margin-top: 5px;
            margin-bottom: 35px;
            background-color: #212121;
            width: 60%;
            padding: 10px;
            color: white;
          }

        @media (max-width: 600px) {
          .job-role {
            display: block;
            margin: 10px;
          }
          .short-description {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
          }
          h2 {
            text-align: center;
          }
          .bot {
            width: 80%;
          }
        }
        @media (max-width: 420px) {
          .bot {
            width: 100%;
          }
        }
      </style>

    </head>

    <body>

          <h1><?php echo $user->name; ?></h1>
          <span class="job-role">Front-End Developer</span>

          <hr>

          <div class="social-media">
            <div>
              <span>Facebook:
                <a href="https://www.facebook.com/kelvin.gobo">Kelvin Gobo</a>
              </span>
            </div>

            <div>
              <span>Twitter:
                <a href="https://twitter.com/kelvingobo">@kelvingobo</a>
              </span>
            </div>

            <div>
              <span>Github:
                <a href="https://github.com/kelvingobo">Kelvin Gobo</a>
              </span>
            </div>
            <div>
              <span>Linkedin:
                <a href="https://www.linkedin.com/in/kelvingobo">Kelvin Gobo</a>
              </span>
            </div>
          </div>

          <hr>

          <div class="short-description">
            <div>
              <img src="<?php echo $user->image_filename; ?>">
            </div>

            <div>
              <p>I am a Front-End Developer, building for/on the web with the community.</p>
              <h2>Core Skills</h2>
              <ul>
                <li>Polymer</li>
                <li>Firebase</li>
                <li>Vue.js</li>
                <li>Javascript</li>
              </ul>
            </div>
          </div>

          <div class="">
            <span id="bot-button" class="show-bot" onclick="showBot()">
              <i class="material-icons" onclick="showBot()">chat</i>
            </span>
            <div class="bot" id="bot">
              <i class="material-icons" onclick="hideBot()">minimize</i>
              <h3>adien</h3>
              <div id="chat" class="bot-chat">
                <div id="chat-area">
                  <p class="bot-message">Hi there, I am Adien, a bot created by Kelvin Gobo.</p>
                  <p class="bot-message">You can ask me anything and I will do my best to answer.</p>
                  <p class="bot-message">Type "aboutbot" without the quotes to find out my current version</p>
                </div>
                <div class="bot-actions">
                  <form action="codehacks.php" method="post" id="form">
                    <input name="message" id="message" type="text" placeholder="Ask Me Anything">
                    <button type="submit">Send</button>
                  </form>
                </div>

              </div>
            </div>

          </div>

      <script>
        document.addEventListener('submit', function (e) {
          e.preventDefault();
          checkMessage(e.target[0].value);
        });
        var chatArea = document.getElementById('chat');

        function aboutBot() {
          renderMessage('codehacks bot<br>Version: 0.5', 'bot-message');
        }

        function renderMessage(msg, className) {
          var messageNode = document.createElement('p');
          messageNode.innerHTML = msg;
          messageNode.classList.add(className);
          chatArea.appendChild(messageNode);
          chatArea.scrollTop = 3000;
        }

        function checkMessage(msg) {
          if (msg.trim() === '' || msg.trim() === null || msg.trim() === undefined) {
            return;
          }
          else if (msg.trim() === 'aboutbot') {
            renderMessage(msg, 'user-message');
            aboutBot();
          }
          else {
            renderMessage(msg, 'user-message');
            sendMessage(msg);
          }
        }

        function sendMessage(msg) {
          var form = document.getElementById('form');
          var formData = new FormData(form);
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              console.log(xhttp.responseText);
              getAnswer(xhttp.responseText);
            }
          };
          xhttp.open("POST", "profiles/codehacks.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("question=" + msg.trim());
        }

        function getAnswer(msg) {
          renderMessage(msg, 'bot-message');
        }

        function showBot() {
          document.getElementById('bot').style.display = 'block';
          document.getElementById('bot-button').style.display = 'none';
        }

        function hideBot() {
          document.getElementById('bot').style.display = 'none';
          document.getElementById('bot-button').style.display = 'block';
        }
      </script>

    </body>

    </html>