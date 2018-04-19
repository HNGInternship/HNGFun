<?php
  if(!defined('DB_USER')){
    require "../../config.php";
  }
  try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
  $date_time = new DateTime('now', new DateTimezone('Africa/Lagos'));
  global $conn;

  try {
    $sql = 'SELECT * FROM secret_word';
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $secret_word_result = $secret_word_query->fetch();

    $sql = 'SELECT * FROM interns_data WHERE username = "dennisotugo"';
    $intern_data_query = $conn->query($sql);
    $intern_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data_result = $intern_data_query->fetch();
  } catch (PDOException $e) {
      throw $e;
  }

  $secret_word = $secret_word_result['secret_word'];
  $name = $intern_data_result['name'];
  $img_url = $intern_data_result['image_filename'];

  if(isset($_POST['payload']) ){
    require "../answers.php";
    $question = trim($_POST['payload']);
  
    function isTraining($question) {
      if (strpos($question, 'train:') !== false) {
        return true;
      }
      return false;
    }
  
    function getAnswer() {
      global $question;
      global $conn;

      $sql = 'SELECT * FROM chatbot WHERE question LIKE "' . $question . '"';
      $answer_data_query =  $conn->query($sql);
      $answer_data_query->setFetchMode(PDO::FETCH_ASSOC);
      $answer_data_result = $answer_data_query->fetchAll();
      $answer_data_index = 0;
      if (count($answer_data_result) > 0) {
        $answer_data_index = rand(0, count($answer_data_result) - 1);
      }

      if ($answer_data_result[$answer_data_index]["answer"] == "") {
        return 'I don\'t understand that question. If you want to train me to understand, please type "<code>train: your question? # The answer.</code>"';
      }
  
      if (containsVariables($answer_data_result[$answer_data_index]['answer']) || containsFunctions($answer_data_result[$answer_data_index]['answer'])) {
        $answer = resolveAnswer($answer_data_result[$answer_data_index]['answer']);
        return $answer;
      } else {
        return $answer_data_result[$answer_data_index]['answer'];
      }
    }
    
    function resolveQuestionFromTraining($question) {
      $start = 7;
      $end = strlen($question) - strpos($question, " # ");
      $new_question = substr($question, $start, -$end);
      return $new_question;
    }
    
    function resolveAnswerFromTraining($question) {
      $start = strpos($question, " # ") + 3;
      $answer = substr($question, $start);
      return $answer;
    }

    if (isTraining($question)) {
      $answer = resolveAnswerFromTraining($question);
      $question = strtolower(resolveQuestionFromTraining($question));
      $question_data = array(':question' => $question, ':answer' => $answer);
  
      $sql = 'SELECT * FROM chatbot WHERE question = "' . $question . '"';
      $question_data_query =  $conn->query($sql);
      $question_data_query->setFetchMode(PDO::FETCH_ASSOC);
      $question_data_result = $question_data_query->fetch();
  
  
      $sql = 'INSERT INTO chatbot ( question, answer )
          VALUES ( :question, :answer );';
      $q = $conn->prepare($sql);
      $q->execute($question_data);
      echo "Training successful.";
      return;
    }

    function containsVariables($answer) {
      if (strpos($answer, "{{") !== false && strpos($answer, "}}") !== false) {
        return true;
      }
    
      return false;
    }
    
    function containsFunctions($answer) {
      if (strpos($answer, "((") !== false && strpos($answer, "))") !== false) {
        return true;
      }
      return false;
    }
    
    function resolveAnswer($answer) {
      if (strpos($answer, "((") == "" && strpos($answer, "((") !== 0) {
        return $answer;
      } else {
        $start = strpos($answer, "((") + 2;
        $end = strlen($answer) - strpos($answer, "))");
        $function_found = substr($answer, $start, - $end);
        $replacable_text = substr($answer, $start, - $end);
        $new_answer = str_replace($replacable_text, $function_found(), $answer);
        
        $new_answer = str_replace("((", "", $new_answer);
        $new_answer = str_replace("))", "", $new_answer);
        return resolveAnswer($new_answer);
      }
    }
  
    $answer = getAnswer();
    echo $answer;
    exit();
  
  } else {

?>

  <div class="bot-body">
    <div class="messages-body">

      <div>
        <div class="message bot">
          <span class="content">Look alive</span>
        </div>
      </div>
    </div>
    <div class="send-message-body">
      <input class="message-box" placeholder="Type here..."/>
    </div>
  </div>

<style>

footer {
	display: none;
	padding: 0px !important;
}
  .bot-body {
		max-width: 100% !important;
    position: fixed;
    /* top: 0; */
    margin: 32px auto;
    position: fixed;
    width: 100%;
    left: 0;
    bottom: 0px;
		height: 25%;
    /* box-sizing: border-box; */
    /* box-shadow: 1px 1px 9px; */
  }

  .messages-body {
    background-color: white;
    color: #3A3A5E;
    padding: 10px;
    overflow: auto;
    width: 100%;
    border-top: 1px solid #f1f1f1;
    padding-bottom: 50px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .messages-body > div {
    background-color: white;
    color: #3A3A5E;
    padding: 10px;
    overflow: auto;
    width: 100%;
    padding-bottom: 50px;
  }

  .message {
    float: left;
    font-size: 16px;
    background-color: #007bff63;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
  }

  .message:before {
    position: absolute;
    top: 0;
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
  }

  .message.bot:before {
    border-color: transparent #9cccff transparent transparent;
    border-width: 0 10px 10px 0;
    left: -9px;
  }
	.color-change {
  border-radius: 5px;
  font-size: 20px;
  padding: 14px 80px;
  cursor: pointer;
  color: #fff;
  background-color: #00A6FF;
  font-size: 1.5rem;
  font-family: 'Roboto';
  font-weight: 100;
  border: 1px solid #fff;
  box-shadow: 2px 2px 5px #AFE9FF;
  transition-duration: 0.5s;
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
}

.color-change:hover {
  color: #006398;
  border: 1px solid #006398;
  box-shadow: 2px 2px 20px #AFE9FF;
}
  .message.you:before {
    border-width: 10px 10px 0 0;
    right: -9px;
    border-color: #edf3fd transparent transparent transparent;
  }
  
  .message.you {
    float: right;
  }

  .content {
    display: block;
		color: black;
  }

  .send-message-body {
		position: fixed;
    width: 100%;
    left: 0;
    bottom: 0px;
    box-sizing: border-box;
    box-shadow: 1px 1px 9px 0px rgba(1, 1, 1, 1);
  }

  .message-box {    
		width: -webkit-fill-available;
    border: none;
		padding: 2px 4px;
    font-size: 18px;
  }


  body {
		overflow: hidden;
    height: 100%;
		background: white !important;
  }

	.container {
    max-width: 100% !important;
}

/*--------------------
Bounce
--------------------*/
@keyframes bounce { 
  0% { transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.7% { transform: matrix3d(0.45, 0, 0, 0, 0, 0.45, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.41% { transform: matrix3d(0.883, 0, 0, 0, 0, 0.883, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  14.11% { transform: matrix3d(1.141, 0, 0, 0, 0, 1.141, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.72% { transform: matrix3d(1.212, 0, 0, 0, 0, 1.212, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  24.32% { transform: matrix3d(1.151, 0, 0, 0, 0, 1.151, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.93% { transform: matrix3d(1.048, 0, 0, 0, 0, 1.048, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  35.54% { transform: matrix3d(0.979, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  41.04% { transform: matrix3d(0.961, 0, 0, 0, 0, 0.961, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  52.15% { transform: matrix3d(0.991, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  63.26% { transform: matrix3d(1.007, 0, 0, 0, 0, 1.007, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  85.49% { transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}


@keyframes ball { 
  from {
    transform: translateY(0) scaleY(.8);
  }
  to {
    transform: translateY(-10px);
  }
</style>
<script>
  window.onload = function() {
    $(document).keypress(function(e) {
      if(e.which == 13) {
        getResponse(getQuestion());
      }
    });
  }

  function isUrl(string) {
    var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
    var regex = new RegExp(expression);
    var t = string;

    if (t.match(regex)) {
      return true;
    } else {
      return false;
    }
  }

  function stripHTML(message){
    var re = /<\S[^><]*>/g
    return message.replace(re, "");
  }

  function getResponse(question) {
    updateThread(question);
    showResponse(true);

    if (question.trim() === "") {
      showResponse(':)');
      return;
    } 


    $.ajax({
      url: "profiles/dennisotugo.php",
      method: "POST",
      data: { payload: question },
      success: function(res) {
        if (res.trim() === "") {
          showResponse(`
          I don\'t understand that question. If you want to train me to understand,
          please type <code>"train: your question? # The answer."</code>
          `);
        } else {
          showResponse(res);
        }
      }
    });
  }

  function showResponse(response) {
    if (response === true) {
      $('.messages-body').append(
        `<div class="trigger_popup">
          <div class="message bot temp">
            <span class="content">Thinking...</span>
          </div>
        </div>`
      );
      return;
    }

    $('.temp').parent().remove();
    $('.messages-body').append(
      `<div class="trigger_popup">
        <div class="message bot">
          <span class="content">${response}</span>
        </div>
      </div>`
    );
    $('.message-box').val("");

  }

  function getQuestion() {
    return $('.message-box').val();
  }

  function updateThread(message) {
    message = stripHTML(message);
    $('.messages-body').append(
      `<div class "trigger_popup">
        <div class="message you">
          <span class="content">${message}</span>
        </div>
      </div>`
    );
  }

  var options = { hour12: true };
  var time = "";
  function updateTime() {
    var date = new Date();
    time = date.toLocaleString('en-NG', options).split(",")[1].trim();
    document.querySelector(".time").innerHTML = time;
  }
  setInterval(updateTime, 60);

	$(window).load(function () {
    $(".trigger_popup").click(function(){
       $('.hover').show();
    });
    $('.hover').click(function(){
        $('.hover').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover').hide();
    });
});

document.getElementById("message bot").innerHTML;
function speak(string){
	var utterance = new SpeechSynthesisUtterance();
	utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
	utterance.text = string;
	utterance.lang = "en-US";
	utterance.volume = 1; //0-1 interval
	utterance.rate = 1;
	utterance.pitch = 1; //0-2 interval
	speechSynthesis.speak(utterance);
}
</script>
<?php } 
?>
