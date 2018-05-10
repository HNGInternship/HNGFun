<!doctype html>
  <html>
  <head>
    <script type="text/javascript" src="vendor/jquery/jquery.js"></script>
  	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
  	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
  		$(document).ready(function() {
  			$('#send').on("click", function(){
  				var value = $('#question').val();
  				$.ajax({
  					url: 'answer.php',
  					data: {'question': value},
  					type: 'post',
  					success: function(res){
  						$(".chat_bot_conserv").append('<li style = "text-shadow: 1px 1px #333;">'+ res +'</li><br>') ;
  					}
  				});
  			});
  		});
  </script>

  <?php

  if(!isset($_GET['id'])){
     require '../db.php';
   }else{
      require 'db.php';
   }

    try {
      $sql = "SELECT * FROM secret_word";
      $secret_word_query = $conn->query($sql);
      $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
      $query_result = $secret_word_query->fetch();

      $sql_query = 'SELECT * FROM interns_data WHERE username="obate"';
      $query_my_intern_db = $conn->query($sql_query);
      $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
      $intern_db_result = $query_my_intern_db->fetch();

    } catch (PDOException $exceptionError) {
      throw $exceptionError;
    }

    $secret_word = $query_result['secret_word'];
    $name = $intern_db_result['name'];
    $username = $intern_db_result['username'];
    $image_url = $intern_db_result['image_filename'];
  ?>



    <style>

    #container {
      padding: 100px;
      width: 800px;
      height: 400px;
      margin: 10px auto;
      box-shadow: 4px 4px #a8b2c1;
      position:relative;
      color: black;
      overflow-y: scroll;
      background-image:url('https://cdn.pixabay.com/photo/2018/02/18/20/29/computer-3163436_960_720.png');
      background-size:contain;
    }
    #controls {
      width: 400px;
      margin: 0px auto;
      background-color: #007bff;
      border-radius:5px;
      /*box-shadow: 4px 4px 2px #a8b2c1;*/
      border-radius: 1px;
      height: 120px;
      margin-bottom: 20px;
    }
    textarea {
      resize: none;
      width: 400px;
      float: left;
      height: 50px;
      font-family: arial-bold;
      padding: 7px;
      /*box-shadow: 4px 2px  10px black;*/
      border: 0px;
      font-size: 30px;
      border-radius: 1px;
      background-color: white;
      color: black;
    }
    #send {
      border: none;
      color: white;
      padding: 13px 28px;
      text-align: center;
      font-size: 15px;
      margin: 5px 12px;
      /*position: absolute;*/
      float: right;
      /*box-shadow: 4px 4px 2px #a8b2c1;*/
      border-radius: 10px;
    }
    .chat_bot_conserv{
      list-style-type: none;
      display: block;
    }
    .card{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
    }

    .title{
      color:grey;
      font-size:18px;
    }

    .profile-image {
      height: 70%;
      width: 100%;

    button{
      border:none;
      outline:0;
      display: inline-block;
      padding:20px;
      color:white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    a {
      text-decoration: none;
      font-size: 2px;
      color: black;
    }

    .fa {
    padding: 5px;
    font-size: 30px;
    width: 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;

    }


    button:hover, a:hover{
      opacity:0.7;
    }

    </style>
    <title>Obasi Uchechukwu | Software developer</title>
  </head>


  <!-- the php code that works with the Chatbot -->
  	<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $question = $_POST['question'];
      $question = preg_replace('([\s]+)', ' ', trim($question));
      $question = preg_replace("([?.])", "", $question);
        if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'aboutbot'){
          echo json_encode([
            'status' => 1,
            'answer' => "Hi dear! My name is obabot-"
          ]);
          return;
        };
        //Check if user want to train the bot or ask a normal question
      $check_for_train = stripos($question, "train:");
        if($check_for_train === false){

      $question = preg_replace('([\s]+)', ' ', trim($question));
      $question = preg_replace("([?.])", "", $question);

      $question = $question;
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetchAll();
            if(empty($data)){
                echo json_encode([
                'status' => 1,
                 'answer' =>  "your question cannot be answered! Please train me by typing-->  train: question #answer #password"
             ]);
              return;
            }else {
                $rand_keys = array_rand($data);
                $answer = $data[$rand_keys]['answer'];
                echo json_encode([
                'status' => 1,
                 'answer' => $answer,
             ]);
               return;
              };


      }else{
        //train the chatbot to be more smarter
          $train_string  = preg_replace('([\s]+)', ' ', trim($question));
          $train_string  = preg_replace("([?.])", "",  $train_string);
          $train_string = substr( $train_string, 6);
          $train_string = explode("#", $train_string);

            $user_question = trim($train_string[0]);
              if(count($train_string) == 1){
                echo json_encode([
                  'status' => 1,
                  'answer' => "invalid training format. The correct format is-->  train: question #answer #password"
                ]);
              return;
              };
              $user_answer = trim($train_string[1]);
              if(count($train_string) < 3){
                echo json_encode([
                  'status' => 1,
                  'answer' => "Please enter training password to train me. The password is--> password"
                ]);
              return;
              };

            $user_password = trim($train_string[2]);
              //verify if training password is correct
              define('TRAINING_PASSWORD', 'password');
              if($user_password !== TRAINING_PASSWORD){
                echo json_encode([
                  'status' => 1,
                  'answer' => "password incorrect! Please enter the correct password which is-->  password "
                ]);
            return;
            };
            //check database if answer exist already
            $user_answer = "$user_answer";
            $sql = "select * from chatbot where answer like :user_answer";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_answer', $user_answer);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $rows = $stmt->fetchAll();
            if(empty($rows)){
              $sql = "insert into chatbot (question, answer) values (:question, :answer)";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(':question', $user_question);
              $stmt->bindParam(':answer', $user_answer);
              $stmt->execute();
              $stmt->setFetchMode(PDO::FETCH_ASSOC);

              echo json_encode([
                'status' => 1,
                  'answer' => " Thanks! for training me "
                ]);
            return;

            }else{
               echo json_encode([
                'status' => 1,
                  'answer' => "Sorry! Answer already exist. Try train me with a new question and a new answer."
                ]);
          return;
            };
          return;
        };

    } else {

  	 ?>


  <body>

    <div class="card">
          <img src="<?php echo $image_url ?>" alt="obate" class="profile-image" style="width:100%"/>
          <p>Username</p>
          <p>
          <?php
            echo $username;
          ?>
          </p>

          <h1>Name</h1>
          <p><?php
            echo $name;
          ?></p>
          <p class="title">CEO & Founder, Software Developer, Data Scientist</p>
          <p>Obdesign Technologies Ltd</p>
          <a href="#" class="fa fa-medium"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-github"></a>
          <p><button>Contact: +2348188587683</button></p>
        </div>

<h1 style="text-align: center; color: black; padding-top: 20px;">My Chatbot</h1>
    <div id="container">
      <div class="chat_bot">
        <ul class="chat_bot_conserv">
          <div class="message">Hello! My name is Lolly.<br>You can ask me questions and get answers.<br>Type <span style="color: #FABF4B;"><strong> Aboutbot</strong></span> to know more about me.
          </div>
          <div class="message">You can also train me to be smarter by typing; <br><span style="color: #FABF4B;"><strong>train: question #answer #password</strong></span><br><strong>NOTE: </strong></span> I don't accept functions. Keep it simple!</div>
        </ul>
      </div>
    </div>
    <div id="controls">
      <div class="form-group" style="text-align: center;">
        <input type="text" class="form-control" name="question" id="question" placeholder="Type Here.........">
      </div>
      <button id="send" style="float:right;" class="btn btn-lg btn-primary btn-hover" name="send">Send</button>
      </div>



  </body>
</html>
