<?php
require '../db.php';

if(isset($_POST['payload']) ){
  $question = trim($_POST['payload']);
  if (isTraining($question)) {
    $answer = resolveAnswerFromTraining($question);
    $question = strtolower(resolveQuestionFromTraining($question));
    $question_data = array(':question' => $question, ':answer' => $answer);

    $sql = 'SELECT * FROM chatbot WHERE question = "' . $question . '"';
    $question_data_query =  $conn->query($sql);
    $question_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $question_data_result = $question_data_query->fetch();

    if ($question_data_result['id'] == "") {
      $sql = 'INSERT INTO chatbot ( question, answer )
          VALUES ( :question, :answer );';
      $q = $conn->prepare($sql);
      $q->execute($question_data);
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

function replaceFunctions($answer, $functionsList) {
  return "The temperature in {{location}} is 30 degrees";
}

function replaceVariables($answer, $variablesList) {
  return "The temperature in Lagos is ((get_temperature))";
}

function resolveVariables($answer) {
  return ["Lagos"];
}

function resolveFunctions($answer) {
  return [getTemperature()];
}

function getTemperature() {
  return "30 degrees";
}

function resolveAnswer($answer) {
  if (containsFunctions($answer)) {
    $functionsList = resolveFunctions($answer);
    $answer = replaceFunctions($answer, $functionsList);
  }

  if (containsVariables($answer)) {
    $variablesList = resolveVariables($answer);
    $answer = replaceVariables($answer, $variablesList);
  }
  return $answer;
}

function getAnswer() {
  global $question;
  global $conn;

  $sql = 'SELECT * FROM chatbot WHERE question = "' . $question . '"';
  $answer_data_query =  $conn->query($sql);
  $answer_data_query->setFetchMode(PDO::FETCH_ASSOC);
  $answer_data_result = $answer_data_query->fetch();

  if ($answer_data_result["answer"] == "") {
    return 'I don\'t understand that question. If you want to train me to understand, please type "<code>train: your question? # The answer.</code>"';
  }

  if (containsVariables($answer_data_result['answer']) || containsFunctions($answer_data_result['answer']) ) {
    $answer = resolveAnswer($answer_data_result['answer']);
    return $answer;
  } else {
    return $answer_data_result['answer'];
  }
}

?>
