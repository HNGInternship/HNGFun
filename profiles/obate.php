<!doctype html>
  <html>
  <head>
    <script type="text/javascript" src="vendor/jquery/jquery.js"></script>
  	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
  	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <?php

  if(!defined('DB_USER')){
        require_once "../../config.php";

        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
        }
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

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	$question = $_POST['input_text'];
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




    <style>

    .container {
      padding: 30px;
      width: 500px;
      height: 400px;
      margin: 10px auto;
      box-sizing: border-box;
      box-shadow: -3px 3px 5px gray;
      position:relative;
      color: black;
      overflow-y: scroll;
      background-color: #F3F3F3;
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

    .message{
			font-size: 15px;
			width: 200px;
			display: inline-block;
          		padding: 15px;
			margin: 7px;
          		border-radius: 30px;
            		line-height: 20px;
		}
		.bot_chat{
			text-align: left;
		}
		.bot_chat .message{
			background-color: #34495E;
			color: white;
			opacity: 1.9;
			box-shadow: 5px 5px 8px gray;
		}
    #chat_showcase{
      list-style-type: none;
      display: flex;
      flex-direction: column;
    }

    .user_chat{
			text-align: right;
		}
		.user_chat .message{
			background-color: #E0E0E0;
			color: black;
			box-shadow: 3px 3px 5px gray;
		}
    .card{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      
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
    <div class="container">
      <div id="chat_showcase">
        <div class="bot_chat">
          <div class="message">Hello! My name is obabot.<br>You can ask me questions and get answers.<br>Type <span style="color: #90CAF9;"><strong> Aboutbot</strong></span> to know more about me.
          </div>
          <div class="message">You can also train me to be smarter by typing; <br><span style="color: #90CAF9;"><strong>train: question #answer #password</strong></span></div>
        </div>
      </div>
    </div>
    <div id="controls">
      <div class="input-text-container" style="text-align: center;">
        <form action="" method="post" id="chat-input-form">
          <input type="text" name="input_text" id="input_text" required class="input_text" placeholder="Type your question here...">
          <button type="submit" class="send_button" id="send">Send</button>
        </form>
      </div>
      <script>
          var chat_output = $("#chat_showcase");
            $("#chat-input-form").on("submit", function(e) {
                e.preventDefault();
                var input_text = $("#input_text").val();
                chat_output.append("<div class='user_chat'><div class='message'>"+input_text+"</div></div>");
                chat_output.scrollTop(chat_output[0].scrollHeight);
            //send question to server
            $.ajax({
              url: 'profiles/obate.php',
              type: 'POST',
              data: {input_text: input_text},
              dataType: 'json',
              success: (response) => {
                    response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />');
                    let response_answer = response.answer;
                    chat_output.append("<div class='bot_chat'><div class='message'>" +response_answer+ "</div></div>");
                    $('#chat_showcase').animate({scrollTop: $('#chat_showcase').get(0).scrollHeight}, 1100);
              },
              error: (error) => {
                      alert('error occured')
                  console.log(error);
              }

            });
            document.getElementById("chat-input-form").reset();
          });
      </script>


  </body>
</html>
<?php } ?>
