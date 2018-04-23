<?php

if (!defined('DB_USER')) {
	require "../../config.php";
}
try {
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
}
catch(PDOException $pe) {
	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
$date_time = new DateTime('now', new DateTimezone('Africa/Lagos'));
global $conn;
if (isset($_POST['payload'])) {
	require "../answers.php";
	$question = trim($_POST['payload']);
  $password = trim($input[2]);
	function isTraining($question)
	{
		if (strpos($question, 'train:') !== false) {
			return true;
		}
		return false;
	}
	function getAnswer()
	{
		global $question;
		global $conn;
		$sql = 'SELECT * FROM chatbot WHERE question LIKE "' . $question . '"';
		$answer_data_query = $conn->query($sql);
		$answer_data_query->setFetchMode(PDO::FETCH_ASSOC);
		$answer_data_result = $answer_data_query->fetchAll();
		$answer_data_index = 0;
		if (count($answer_data_result) > 0) {
			$answer_data_index = rand(0, count($answer_data_result) - 1);
		}

		if ($answer_data_result[$answer_data_index]["answer"] == "") {
			return 'train: question # answer # password';
		}

		if (containsVariables($answer_data_result[$answer_data_index]['answer']) || containsFunctions($answer_data_result[$answer_data_index]['answer'])) {
			$answer = resolveAnswer($answer_data_result[$answer_data_index]['answer']);
			return $answer;
		}
		else {
			return $answer_data_result[$answer_data_index]['answer'];
		}
	}
	function resolveQuestionFromTraining($question)
	{
		$start = 7;
		$end = strlen($question) - strpos($question, " # ");
		$new_question = substr($question, $start, -$end);
		return $new_question;
	}

	function resolveAnswerFromTraining($question)
	{
		$start = strpos($question, " # ") + 3;
		$answer = substr($question, $start);
		return $answer;
	}

		if (isTraining($question)) {
			$answer = resolveAnswerFromTraining($question);
			$question = strtolower(resolveQuestionFromTraining($question));
			$question_data = array(
				':question' => $question,
				':answer' => $answer
			);
			$sql = 'SELECT * FROM chatbot WHERE question = "' . $question . '"';
			$question_data_query = $conn->query($sql);
			$question_data_query->setFetchMode(PDO::FETCH_ASSOC);
			$question_data_result = $question_data_query->fetch();
			$sql = 'INSERT INTO chatbot ( question, answer )
      	    VALUES ( :question, :answer );';
			$q = $conn->prepare($sql);
			$q->execute($question_data);
			echo "Now I understand. No wahala, now try me again";
			return;
		}

	function containsVariables($answer)
	{
		if (strpos($answer, "{{") !== false && strpos($answer, "}}") !== false) {
			return true;
		}

		return false;
	}

	function containsFunctions($answer)
	{
		if (strpos($answer, "((") !== false && strpos($answer, "))") !== false) {
			return true;
		}

		return false;
	}

	function resolveAnswer($answer)
	{
		if (strpos($answer, "((") == "" && strpos($answer, "((") !== 0) {
			return $answer;
		}
		else {
			$start = strpos($answer, "((") + 2;
			$end = strlen($answer) - strpos($answer, "))");
			$function_found = substr($answer, $start, -$end);
			$replacable_text = substr($answer, $start, -$end);
			$new_answer = str_replace($replacable_text, $function_found() , $answer);
			$new_answer = str_replace("((", "", $new_answer);
			$new_answer = str_replace("))", "", $new_answer);
			return resolveAnswer($new_answer);
		}
	}

	$answer = getAnswer();
	echo $answer;
	exit();
}
else {
?>

<?php
$doc = new DOMDocument();
$doc->loadHTMLFile("/dennis/index.html");
echo $doc->saveHTML();
?>

<?php } 
?>
