<?php
  if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(!defined('DB_USER')){
      require "../config.php";   
      try {
          $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
          die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
      }
    }
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("select secret_word from secret_word limit 1");
    $stmt->execute();
    $secret_word = null;
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    if(count($rows)>0){
      $row = $rows[0];
      $secret_word = $row['secret_word']; 
    }
    $name = null;
    $username = "chigozie";
    $image_filename = null;
    $stmt = $conn->prepare("select * from interns_data where username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    if(count($rows)>0){
      $row = $rows[0];
      $name = $row['name']; 
      $image_filename = $row['image_filename']; 
    }
  }
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!defined('DB_USER')){
      require "../config.php";   
      try {
          $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
          die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
      }
    }
    require "../answers.php";
    date_default_timezone_set("Africa/Lagos");
    // header('Content-Type: application/json');
    if(!isset($_POST['question'])){
      echo json_encode([
        'status' => 1,
        'answer' => "Please provide a question"
      ]);
      return;
    }
    $question = $_POST['question']; //get the entry into the chatbot text field
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
          'answer' => "Invalid training format. I cannot decipher the answer part of the question. <br> The correct training data format is <br> <b>train: question # answer</b>"
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
      define('TRAINING_PASSWORD', 'trainpwforhng');
      if($password !== TRAINING_PASSWORD){
        echo json_encode([
          'status' => 0,
          'answer' => "You are not authorized to train me"
        ]);
        return;
      }
      // //check if question already exists before adding it again
      // $question = "%$que%";
      // $sql = "select * from chatbot where question like :question limit 1";
      // $stmt = $conn->prepare($sql);
      // $stmt->bindParam(':question', $question);
      // $stmt->execute();
      // $stmt->setFetchMode(PDO::FETCH_ASSOC);
      // $rows = $stmt->fetchAll();
      // if(count($rows)>0){
      //  //question already exists. update its answer
      //  $sql = "update chatbot set answer = :answer where question = :question";
      //  $stmt = $conn->prepare($sql);
      //  $stmt->bindParam(':answer', $ans);
      //  $stmt->bindParam(':question', $que);
      //  $stmt->execute();
      //  echo json_encode([
      //    'status' => 1,
      //    'answer' => "Thank you. I have now learnt a new answer to the question"
      //  ]);
      //  return;
      // }
      //insert into database
      $sql = "insert into chatbot (question, answer) values (:question, :answer)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':question', $que);
      $stmt->bindParam(':answer', $ans);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo json_encode([
        'status' => 1,
        'answer' => "Thank you, I am now smarter"
      ]);
      return;
    }
    echo json_encode([
      'status' => 0,
      'answer' => "Unfortunately, I cannot answer your question at the moment. I need to be trained further"
    ]);
    
  }
?>

<?php
  if($_SERVER['REQUEST_METHOD'] === "GET"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chigozie's Corner</title>
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

  <style>
    body {
      background-image: url(http://res.cloudinary.com/dqscsuyyn/image/upload/v1523631081/bg.jpg);
    }
    .circle {
      width: 60%;
      margin-left: 20%;
      border-radius: 50%;
    }
    .frame {
      border: 1px solid grey;
      padding: 20px;
      background-color: #ffffff;
      margin-top: 5%;
      height: 400px;
    }
    .info {
      margin-top: 25px;
    }
    .slack_span {
      color: #0000ff;
    }
    .occupation_span {
      color: #ff0000;
      font-weight: bold;
    }
    .chat-frame {
      border: 1px solid grey;
      padding: 20px;
      background-color: #f8d34a;
      margin-top: 5%;
      margin-bottom: 50px;
    }
    .chat-messages {
      background-color: #ffffff;
      height: 600px;
      overflow-y: auto;
      margin-left: 15px;
      margin-right: 15px;
      border-radius: 6px;
      padding: 5px;
    }
    .single-message {
      margin-bottom: 5px; 
      border-radius: 5px;
      min-height: 60px;
    }
    .single-message-bg {
      background-color: #99ff33;
      padding: 10px;
    }
    .single-message-bg2 {
      background-color: #6699ff;
      padding: 10px;
    }
    input[name=question] {
      height: 50px;
    }
    button[type=submit] {
      height: 50px;
    }
    .f-icon {
      font-size: 40px;
    }
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-1 frame">
      <div class="row">
        <div class="col-md-12">
          <div class="circle">
            <img src="<?php echo $image_filename; ?>" alt="Profile Picture" class="circle" />
          </div>
        </div>  
      </div>

      <div class="row info">
        <div class="col-md-12">
          <h3 class="text-center">
            <?php echo $name; ?>
          </h3>
          <h5 class="text-center"><span class="slack_span">Slack Username: </span>@<?php echo $username; ?></h5>
          <p class="text-center"><span class="occupation_span">What I do: </span>I develop web and mobile apps</p>
        </div>

      </div>
    </div>  

    <div class="col-md-4 offset-md-1 chat-frame">
      <h2 class="text-center">Chatbot Interface</h2>
      <div class="row chat-messages" id="chat-messages">
        <div class="col-md-12" id="message-frame">
          <div class="row single-message">
            <div class="col-md-2 single-message-bg">
              <span class="fa fa-user f-icon"></span>
            </div>

            <div class="col-md-8 single-message-bg">
              <p>Welcome! My name is <span style="font-weight: bold">Optimus Prime</span></p>
            </div>
          </div>
          <div class="row single-message">
            <div class="col-md-2 single-message-bg">
              <span class="fa fa-user f-icon"></span>
            </div>
            <div class="col-md-8 single-message-bg">
              <p>Ask me your questions and I will try to answer them.</p>
            </div>
          </div>
          <div class="row single-message">
            <div class="col-md-2 single-message-bg">
              <span class="fa fa-user f-icon"></span>
            </div>
            <div class="col-md-8 single-message-bg">
              <p>You can teach me answers to new questions by training me.</p>
              <p>To train me, enter the training string in this format:</p>
              <p><b>train: question # answer</b></p>
            </div>
          </div>

          <!-- <div class="row single-message">
            <div class="col-md-10">
              <p>Welcome! How may I assist you today?</p>
            </div>
            <div class="col-md-2">
              <span class="float-right fa fa-user f-icon"></span>
            </div>
          </div> -->
        </div>
      </div>
      <div class="row" style="margin-top: 40px;">
        <form class="form-inline col-md-12 col-sm-12" id="question-form">
          <div class="col-md-12 col-sm-12 col-12">
            <input class="form-control w-100" type="text" name="question" placeholder="Ask a question" />
          </div>
          <div class="col-md-12 col-sm-12 col-12" style="margin-top: 20px">
            <button type="submit" class="btn btn-info float-right w-100">Send</button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    var questionForm = $('#question-form');
    questionForm.submit(function(e){
      e.preventDefault();
      var questionBox = $('input[name=question]');
      var question = questionBox.val();
      //display question in the message frame as a chat entry
      var messageFrame = $('#message-frame');
      var chatToBeDisplayed = '<div class="row single-message">'+
            '<div class="col-md-8 offset-md-2 single-message-bg2">'+
              '<p>'+question+'</p>'+
            '</div>'+
            '<div class="col-md-2 single-message-bg2">'+
              '<span class="float-right fa fa-user f-icon"></span>'+
            '</div>'+
          '</div>';
      messageFrame.html(messageFrame.html()+chatToBeDisplayed);
      $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
      //send question to server
      $.ajax({
        url: "/profiles/chigozie.php",
        type: "post",
        data: {question: question},
        dataType: "json",
        success: function(response){
          if(response.status == 1){
            var chatToBeDisplayed = '<div class="row single-message">'+
                  '<div class="col-md-2 single-message-bg">'+
                    '<span class="fa fa-user f-icon"></span>'+
                  '</div>'+
                  '<div class="col-md-8 single-message-bg">'+
                    '<p>'+response.answer+'</p>'+
                  '</div>'+
                '</div>';
            messageFrame.html(messageFrame.html()+chatToBeDisplayed);
            questionBox.val("");  
            $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
          }else if(response.status == 0){
            var chatToBeDisplayed = '<div class="row single-message">'+
                  '<div class="col-md-2 single-message-bg">'+
                    '<span class="fa fa-user f-icon"></span>'+
                  '</div>'+
                  '<div class="col-md-8 single-message-bg">'+
                    '<p>'+response.answer+'</p>'+
                  '</div>'+
                '</div>';
            messageFrame.html(messageFrame.html()+chatToBeDisplayed);
            $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
          }
        },
        error: function(error){
          console.log(error);
        }
      })
    });
  });
</script> 
</body>
</html>

<?php 
  }
?>
