<?php
if(!defined('DB_USER')){
  require "../../config.php";		
  try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
}
//Fetch User Details
try {
    $query = "SELECT * FROM interns_data WHERE username ='johnayeni'";
    $resultSet = $conn->query($query);
    $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    throw $e;
}
$username = $resultData['username'];
$fullName = $resultData['name'];
$picture = $resultData['image_filename'];
//Fetch Secret Word
try{
    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
    $resultSet   =  $conn->query($querySecret);
    $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
    $secret_word =  $resultData['secret_word'];
}catch (PDOException $e){
    throw $e;
}
$secret_word =  $resultData['secret_word'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  require "../answers.php";

  date_default_timezone_set("Africa/Lagos");


  try{
    if(!isset($_POST['question'])){
      echo json_encode([
        'status' => 1,
        'answer' => "Please provide a question"
      ]);
      return;
    }
  
    $question = $_POST['question'];
    
    // return help manual
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'help'){
      echo json_encode([
        'status' => 1,
        'answer' => getBotMenu()
      ]);
      return;
    }

    // return fact
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'fact'){
      echo json_encode([
        'status' => 1,
        'answer' => getRandomFacts()
      ]);
      return;
    }


    // return time
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'time'){
      echo json_encode([
        'status' => 1,
        'answer' => getTime()
      ]);
      return;
    }

    // return about bot
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'about'){
      echo json_encode([
        'status' => 1,
        'answer' => aboutMe()
      ]);
      return;
    }

    //check if in training mode
    $index_of_train = stripos($question, "train:");
    if($index_of_train === false){//then in question mode
      $question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
      $question = preg_replace("([?.])", "", $question); //remove ? and .
  
      //check if answer already exists in database
      $question = "%$question%";
      $sql = "select * from chatbot where question like :question";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':question', $question);
      $stmt->execute();
  
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $stmt->fetchAll();
      if(count($rows)>0){
        $index = rand(0, count($rows)-1);
        $row = $rows[$index];
        $answer = $row['answer'];	
  
        //check if the answer is to call a function
        $index_of_parentheses = stripos($answer, "((");
        if($index_of_parentheses === false){ //then the answer is not to call a function
          echo json_encode([
            'status' => 1,
            'answer' => $answer
          ]);
        }else{//otherwise call a function. but get the function name first
          $index_of_parentheses_closing = stripos($answer, "))");
          if($index_of_parentheses_closing !== false){
            $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
            $function_name = trim($function_name);
            if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
              echo json_encode([
                'status' => 0,
                'answer' => "The function name should not contain white spaces"
              ]);
              return;
            }
            if(!function_exists($function_name)){
              echo json_encode([
                'status' => 0,
                'answer' => "I am sorry but I could not find that function"
              ]);
            }else{
              echo json_encode([
                'status' => 1,
                'answer' => str_replace("(($function_name))", $function_name(), $answer)
              ]);
            }
            return;
          }
        }
      }else{
        echo json_encode([
          'status' => 0,
          'answer' => "Unfortunately, I cannot answer your question at the moment. I need to be trained further. The training data format is <br> <b>train: question # answer</b>"
        ]);
      }		
      return;
    }else{
      //in training mode
      //get the question and answer
      $question_and_answer_string = substr($question, 6);
      //remove excess white space in $question_and_answer_string
      $question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
      
      $question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
      $split_string = explode("#", $question_and_answer_string);
      if(count($split_string) == 1){
        echo json_encode([
          'status' => 0,
          'answer' => "Invalid training format. I cannot decipher the answer part of the question \n
                      The correct format is training: question # answer # password"
        ]);
        return;
      }
      $que = trim($split_string[0]);
      $ans = trim($split_string[1]);
  
      if(count($split_string) < 3){
        echo json_encode([
          'status' => 0,
          'answer' => "You need to enter the training password to train me."
        ]);
        return;
      }
  
      $password = trim($split_string[2]);
      //verify if training password is correct
      define('TRAINING_PASSWORD', 'password');
      if($password !== TRAINING_PASSWORD){
        echo json_encode([
          'status' => 0,
          'answer' => "You are not authorized to train me"
        ]);
        return;
      }
  
      //insert into database
      $sql = "insert into chatbot (question, answer) values (:question, :answer)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':question', $que);
      $stmt->bindParam(':answer', $ans);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo json_encode([
        'status' => 1,
        'answer' => "Thanks alot for your help"
      ]);
      return;
    }
  
    echo json_encode([
      'status' => 0,
      'answer' => "Sorry, i really dont understand you right now, you could offer to train me"
    ]);  
  } catch (Exception $e){
    return $e->message ;
  }
  
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $fullName ?></title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Ubuntu';
    }

    #main {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #about {
      color: #b22222;
    }

    #hello {
      font-size: 100px;
      color: #b22222;
      font-family: 'Alfa Slab One';
    }

    #about h4 {
      font-size: 40px;
      font-weight: bold;
    }

    #about h5 {
      font-size: 14px;
      color: #b22222;
    }

     #social {
      margin: 0 auto;
      width: 300px;
    }

    .social-icons {
      width: 50px;
      margin: 10px;
      transition: all 700ms;
    }

    .social-icons:hover {
      transform: scale(1.2, 1.2);
    }

    @media (max-width: 575px) {
      #hello {
        font-size: 90px;
      }

      #profile-pic {
        width: 150px;
        height: 150px;
      }

      #about h4 {
        font-size: 24px;
      }

      #about h5 {
        font-size: 12px;
      }
    }

    .chat-modal-button {
      border-radius: 6px;
      background-color: firebrick;
      border: none;
      color: #ffffff;
      text-align: center;
      font-size: 20px;
      padding:20px;
      margin-right: 20px;
      transition: all 0.5s;
      cursor: pointer;
      bottom: 5%;
      right: 0;
      position: fixed;
      z-index: 1;
      box-shadow: 0 2px 3px 0 rgba(0,0,0,0.2);
      transition: all 0.5s ease;
    }

    .chat-modal-button:hover {
      background-color: #ffffff;
      color: firebrick;
    }

    .chat {
      position: relative;
      overflow: auto;
      overflow-x: hidden;
      padding: 0 35px 92px;
      border: none;
      max-height: 300px;
      -webkit-justify-content: flex-end;
      justify-content: flex-end;
      -webkit-flex-direction: column;
      flex-direction: column;
    }

    .bubble {
      font-size: 16px;
      position: relative;
      display: inline-block;
      clear: both;
      margin-bottom: 8px;
      padding: 13px 14px;
      vertical-align: top;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius: 5px;
    }
    .bubble:before {
      position: absolute;
      top: 19px;
      display: block;
      width: 8px;
      height: 6px;
      content: '\00a0';
      -moz-transform: rotate(29deg) skew(-35deg);
      -ms-transform: rotate(29deg) skew(-35deg);
      -webkit-transform: rotate(29deg) skew(-35deg);
      transform: rotate(29deg) skew(-35deg);
    }
    .bubble.you {
      float: left;
      color: #fff;
      background-color: #00b0ff;
      -webkit-align-self: flex-start;
      align-self: flex-start;
      -moz-animation-name: slideFromLeft;
      -webkit-animation-name: slideFromLeft;
      animation-name: slideFromLeft;
    }
    .bubble.you:before {
      left: -3px;
      background-color: #00b0ff;
    }
    .bubble.me {
      float: right;
      color: #1a1a1a;
      background-color: #eceff1;
      -webkit-align-self: flex-end;
      align-self: flex-end;
      -moz-animation-name: slideFromRight;
      -webkit-animation-name: slideFromRight;
      animation-name: slideFromRight;
    }
    .bubble.me:before {
      right: -3px;
      background-color: #eceff1;
    }

    textarea {
      resize: none !important;
    }

  </style>
</head>

<body>
  <div id="main">
    <div id="about">
      <div class="text-center">
        <img class="rounded-circle img-fluid" src="http://res.cloudinary.com/johnayeni/image/upload/v1523621916/john_gttqiq.jpg" width="250" style="margin: auto">
        <h2 id="hello">Hello</h2>
        <h3>I'm <?php echo $fullName ?>  (<?php echo $username ?>)</h3>
        <h4>I am a Software Engineer from Nigeria</h4>
          <div id="social">
            <ul class="nav nav-pills">
              <li>
                <a href="https://codepen.io/johnayeni" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/johnayeni/image/upload/v1523630522/001-codepen_yqof5d.png" />
                </a>
              </li>
              <li>
                <a href="https://github.com/johnayeni" target="_blank" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/johnayeni/image/upload/v1523630522/003-github-logo_b5y1j4.png" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/johnayeni_" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/johnayeni/image/upload/v1523630522/002-twitter_nlb7b6.png" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- chat dialog -->
    <button class="btn chat-modal-button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-comment-alt"></i>CHAT</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> John Ayeni</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="chat">
              <div class="bubble you">
                  Hello, hi there?
              </div>
              <div class="bubble you">
                  You can ask me question, get facts or time?
              </div>
              <div class="bubble you">
                  To see a list of things i can do type help
              </div>
            </div>
          </div>
          <hr>
          <form id="question-form" style="padding:5px;">
            <div class="form-row">
              <div class="col-8">
                <textarea class="form-control" rows="2" name="question" id="question"></textarea>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.js"></script>
  <script>
	;(function($){
		let questionForm = $('#question-form');
    let questionBox = $('textarea[name=question]');
    let chatbox = $('.chat')
    questionBox.emojioneArea();
		questionForm.submit(function(e){
			e.preventDefault();
			let question = questionBox.val();
			//display question in the message frame as a chat entry
			let newMessage = `<div class="bubble me">
                  ${question}
              </div>`;

			chatbox.html(`${chatbox.html()} ${newMessage}`);
      chatbox.scrollTop(chatbox[0].scrollHeight);
			//send question to server
			$.ajax({
				url: '/profiles/johnayeni.php',
				type: 'POST',
				data: {question: question},
				dataType: 'json',
				success: (response) => {
          response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />'); 
          let newMessage = `<div class="bubble you">
                          ${response.answer}
                      </div>`;

          chatbox.html(`${chatbox.html()} ${newMessage}`);
          chatbox.scrollTop(chatbox[0].scrollHeight);
          questionBox.val('');						
				},
				error: (error) => {
          alert('error occured')
					console.log(error);
				}
			})
		});
	})(jQuery);
</script>	
</body>
</html>

<?php
}
?>