<?php
require 'db.php';

if(isset($_POST['question']) ){
  $answer = getAnswer();
  echo $answer;
}

function getQuestionId() {
  global $conn;
  $sql = 'SELECT * FROM questions WHERE question = "' . $_POST['question'] . '"';
  $question_data_query =  $conn->query($sql);
  $question_data_query->setFetchMode(PDO::FETCH_ASSOC);
  $question_data_result = $question_data_query->fetch();
  return $question_data_result['id'];
}

function getAnswer() {
  global $conn;
  $question_id = getQuestionId();
  if ($question_id == "") {
    return 'I don\'t understand that question. If you want to train me to understand, please type "train: your question? # The answer."';
  }
  $sql = 'SELECT * FROM answers_bank WHERE question_id = ' . $question_id;
  $answer_data_query = $conn->query($sql);
  $answer_data_query->setFetchMode(PDO::FETCH_ASSOC);
  $answer_data_result = $answer_data_query->fetch();
  return $answer_data_result['answer'];
}

?>