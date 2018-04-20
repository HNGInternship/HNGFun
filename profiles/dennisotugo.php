<?php
$sql = "SELECT * FROM interns_data WHERE username = 'dennisotugo'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$dennisotugo = array_shift($data);
// Secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$words = $q->fetch();
$secret_word = $words['secret_word'];
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require "../answers.php";

        date_default_timezone_set("Africa/Lagos");

        // header('Content-Type: application/json');

        if (!isset($_POST['question'])) {
                echo json_encode(['status' => 1, 'answer' => "What is your question"]);
                return;
        }

        $question = $_POST['question']; //get the entry into the chatbot text field

        // check if in training mode

        $index_of_train = stripos($question, "train:");
        if ($index_of_train === false) { //then in question mode
                $question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
                $question = preg_replace("([?.])", "", $question); //remove ? and .

                // check if answer already exists in database

                $question = "%$question%";
                $sql = "select * from chatbot where question like :question";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':question', $question);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $rows = $stmt->fetchAll();
                if (count($rows) > 0) {
                        $index = rand(0, count($rows) - 1);
                        $row = $rows[$index];
                        $answer = $row['answer'];

                        // check if the answer is to call a function

                        $index_of_parentheses = stripos($answer, "((");
                        if ($index_of_parentheses === false) { //then the answer is not to call a function
                                echo json_encode(['status' => 1, 'answer' => $answer]);
                        }
                        else { //otherwise call a function. but get the function name first
                                $index_of_parentheses_closing = stripos($answer, "))");
                                if ($index_of_parentheses_closing !== false) {
                                        $function_name = substr($answer, $index_of_parentheses + 2, $index_of_parentheses_closing - $index_of_parentheses - 2);
                                        $function_name = trim($function_name);
                                        if (stripos($function_name, ' ') !== false) { //if method name contains spaces, do not invoke method
                                                echo json_encode(['status' => 0, 'answer' => "No white spaces allowed in function name"]);
                                                return;
                                        }

                                        if (!function_exists($function_name)) {
                                                echo json_encode(['status' => 0, 'answer' => "Function not found"]);
                                        }
                                        else {
                                                echo json_encode(['status' => 1, 'answer' => str_replace("(($function_name))", $function_name() , $answer) ]);
                                        }

                                        return;
                                }
                        }
                }
                else {
                        echo json_encode(['status' => 0, 'answer' => "Sorry, I cannot answer your question.Please train me. The training data format is  <b>train: question # answer # password</b>"]);
                }

                return;
        }
        else {

                // in training mode
                // get the question and answer

                $question_and_answer_string = substr($question, 6);

                // remove excess white space in $question_and_answer_string

                $question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
                $question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
                $split_string = explode("#", $question_and_answer_string);
                if (count($split_string) == 1) {
                        echo json_encode(['status' => 0, 'answer' => "Invalid training format. <br /> Type  <b>train: question # answer # password</b>"]);
                        return;
                }

                $que = trim($split_string[0]);
                $ans = trim($split_string[1]);
                if (count($split_string) < 3) {
                        echo json_encode(['status' => 0, 'answer' => "Please enter the training password to train me."]);
                        return;
                }

                $password = trim($split_string[2]);

                // verify if training password is correct

                define('TRAINING_PASSWORD', 'password');
                if ($password !== TRAINING_PASSWORD) {
                        echo json_encode(['status' => 0, 'answer' => "Sorry you cannot train me."]);
                        return;
                }

                // insert into database

                $sql = "insert into chatbot (question, answer) values (:question, :answer)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':question', $que);
                $stmt->bindParam(':answer', $ans);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                echo json_encode(['status' => 1, 'answer' => "I have been trained"]);
                return;
        }

        echo json_encode(['status' => 0, 'answer' => "Sorry I cannot answer that question, please train me"]);
}
else {
?>


<div class="profile">
						<h1>Dennis Otugo</h1>
						<p>Human Being &nbsp;&bull;&nbsp; Cyborg &nbsp;&bull;&nbsp; Never asked for this</p>

					</div>
  <div class="bot-body">
    <div class="messages-body">
      <div>
        <div class="message bot">
          <span class="content">Look alive</span>
        </div>
      </div>
	<div>
        <div class="message bot">
          <span class="content">What do you have in mind, Let's talk :) </span>
        </div>
      </div>
    </div>
    <div class="send-message-body">
      <input class="message-box" placeholder="Enter your words here..."/>
    </div>
  </div>

<style>
.profile {height: 100%;text-align: center;position: fixed;position: fixed;position: fixed;width: 50%;right: 0;background-color: #007bff}footer {display: none;padding: 0px !important}h1, h2, h3, h4, h5, h6 {text-align: center;bottom: 50%;left: 65%;position: fixed;font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: 700}p {position: fixed;bottom: 40%;left: 58%;line-height: 1.5;margin: 30px 0}.bot-body {max-width: 100% !important;position: fixed;margin: 32px auto;position: fixed;width: 100%;left: 0;bottom: 0px;height: 80%}.messages-body {overflow-y: scroll;height: 100%;background-color: #FFFFFF;color: #3A3A5E;padding: 10px;overflow: auto;width: 50%;padding-bottom: 50px;border-top-left-radius: 5px;border-top-right-radius: 5px}.messages-body > div {background-color: #FFFFFF;color: #3A3A5E;padding: 10px;overflow: auto;width: 100%;padding-bottom: 50px}.message {float: left;font-size: 16px;background-color: #007bff63;padding: 10px;display: inline-block;border-radius: 3px;position: relative;margin: 5px}.message: before {position: absolute;top: 0;content: '';width: 0;height: 0;border-style: solid}.message.bot: before {border-color: transparent #9cccff transparent transparent;border-width: 0 10px 10px 0;left: -9px}.color-change {border-radius: 5px;font-size: 20px;padding: 14px 80px;cursor: pointer;color: #fff;background-color: #00A6FF;font-size: 1.5rem;font-family: 'Roboto';font-weight: 100;border: 1px solid #fff;box-shadow: 2px 2px 5px #AFE9FF;transition-duration: 0.5s;-webkit-transition-duration: 0.5s;-moz-transition-duration: 0.5s}.color-change: hover {color: #006398;border: 1px solid #006398;box-shadow: 2px 2px 20px #AFE9FF}.message.you: before {border-width: 10px 10px 0 0;right: -9px;border-color: #edf3fd transparent transparent transparent}.message.you {float: right}.content {display: block;color: #000000}.send-message-body {border-right: solid black 3px;position: fixed;width: 50%;left: 0;bottom: 0px;box-sizing: border-box;box-shadow: 1px 1px 9px 0px rgba(1, 1, 1, 1)}.message-box {width: -webkit-fill-available;border: none;padding: 2px 4px;font-size: 18px}body {overflow: hidden;height: 100%;background: #FFFFFF !important}.container {max-width: 100% !important}.fixed-top {position: fixed !important;}
</style>
<script>
  window.onload = function () {
          $(document).keypress(function (e) {
                  if (e.which == 13) {
                          getResponse(getQuestion());
                  }
          });
  }

  function isUrl(string) {
          var expression =
                  /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
          var regex = new RegExp(expression);
          var t = string;
          if (t.match(regex)) {
                  return true;
          } else {
                  return false;
          }
  }

  function stripHTML(message) {
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
          if (question.toLowerCase().includes("aboutbot")) {
                  var textToSay = question.toLowerCase().split("aboutbot")[1];
                  showResponse('version 1.1.0');
                  return;
          }
              $.ajax({
      url: "profiles/dennisotugo.php",
     method: "post",
	data: {question: question},
	dataType: "json",
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
                          `<div>
          <div class="message bot temp">
            <span class="content">...</span>
          </div>
        </div>`
                  );
                  return;
          }
          $('.temp').parent().remove();
          $('.messages-body').append(
                  `<div>
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
                  `<div>
        <div class="message you">
          <span class="content">${message}</span>
        </div>
      </div>`
          );
  }
</script>
<?php } 
?>
