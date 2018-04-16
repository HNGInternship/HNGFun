<?php
require 'db.php';

if(isset($_POST['question']) ){
  $question = trim($_POST['question']);
  if (isTraining($question)) {
    $answer = resolveAnswerFromTraining($question);
    $question = strtolower(resolveQuestionFromTraining($question));
    $question_data = array(':question' => $question);

    $sql = 'SELECT * FROM questions WHERE question = "' . $question . '"';
    $question_data_query =  $conn->query($sql);
    $question_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $question_data_result = $question_data_query->fetch();

    if ($question_data_result['id'] == "") {
      $sql = 'INSERT INTO questions ( question )
          VALUES ( :question );';

      try {
        $q = $conn->prepare($sql);
        $q->execute($question_data);
        $question_id = $conn->lastInsertId();

        $sql = 'INSERT INTO answers_bank ( question_id, answer  )
            VALUES ( :question_id, :answer );';
        $answer_data = array(':question_id' => $question_id, ':answer' => $answer);
        $q = $conn->prepare($sql);
        $q->execute($answer_data);

      } catch (PDOException $e) {
        throw $e;
      }
      echo "Training successful.";
      return;
    } else {
      echo "Already trained.";
      return;
    }
  }

  $answer = getAnswer();
  echo $answer;
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

function isTraining($question) {
  if (strpos($question, 'train:') !== false) {
    return true;
  }
  return false;
}

function getQuestionId() {
  global $conn;
  global $question;
  
  $sql = 'SELECT * FROM questions WHERE question = "' . $question . '"';
  $question_data_query =  $conn->query($sql);
  $question_data_query->setFetchMode(PDO::FETCH_ASSOC);
  $question_data_result = $question_data_query->fetch();
  return $question_data_result['id'];
}

function containsVariables($answer) {
  if (strpos($answer, "{{") !== false && strpos($answer, "}}") !== false) {
    return true;
  }

  if (strpos($answer, "((") !== false && strpos($answer, "))") !== false) {
    return true;
  }

  return false;
}

function resolveAnswer($answer) {

}

function getAnswer() {
  global $conn;

  $question_id = getQuestionId();
  if ($question_id == "") {
    return 'I don\'t understand that question. If you want to train me to understand, please type <code>"train: your question? # The answer."</code>';
  }

  $sql = 'SELECT * FROM answers_bank WHERE question_id = ' . $question_id;
  $answer_data_query = $conn->query($sql);
  $answer_data_query->setFetchMode(PDO::FETCH_ASSOC);
  $answer_data_result = $answer_data_query->fetch();

  if (containsVariables($answer_data_result['answer'])) {
    $answer = resolveAnswer($answer_data_result['answer']);
    return $answer;
  } else {
    return $answer_data_result['answer'];
  }
}

?>
