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

<!DOCTYPE html>
<!--
 Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->

<!-- ************************ IMPORTANT INFORMATION ************************************
  This web navigation drawer template is provided as an example of how to configure
  a JET web application with a navigation drawer as a single page application
  using ojRouter and oj-module.  It contains the Oracle JET framework and a default
  requireJS configuration file to show how JET can be setup in a common application.
  This project template can be used in conjunction with demo code from the JET
  website to test JET component behavior and interactions.

  Any CSS styling with the prefix "demo-" is for demonstration only and is not
  provided as part of the JET framework.

  Please see the demos under Cookbook/Patterns/App Shell: Web and the CSS documentation
  under Support/API Docs/Non-Component Styling on the JET website for more information on how to use 
  the best practice patterns shown in this template.

  Aria Landmark role attributes are added to the different sections of the application
  for accessibility compliance. If you change the type of content for a specific
  section from what is defined, you should also change the role value for that
  section to represent the appropriate content type.
  ***************************** IMPORTANT INFORMATION ************************************ -->
<html lang="en-us">
  <head>
    <title>Oracle JET Starter Template - Web Nav Drawer</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <link rel="icon" href="/dennisotugo/css/images/favicon.ico" type="image/x-icon" />

    <!-- This is the main css file for the default Alta theme -->
<!-- injector:theme -->
<link rel="stylesheet" href="/dennisotugo/css/alta/5.0.0/web/alta.css" id="css" />
<!-- endinjector -->
    
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="/dennisotugo/css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="/dennisotugo/css/app.css" type="text/css"/>

  </head>
  <body class="oj-web-applayout-body">
    <!-- Template for rendering navigation items shared between nav bar and nav list -->
    <script type="text/html" id="navTemplate">
      <li><a href="#">
        <span :class="[[$data['iconClass']]]"></span>
        <oj-bind-text value="[[$data['name']]]"></oj-bind-text>
      </a></li>
    </script>

    <div id="globalBody" class="oj-offcanvas-outer-wrapper oj-offcanvas-page">
      <!--
         ** Oracle JET V5.0.0 web application navigation drawer pattern.
         ** Please see the demos under Cookbook/Patterns/App Shell: Web
         ** and the CSS documentation under Support/API Docs/Non-Component Styling
         ** on the JET website for more information on how to use this pattern. 
         ** The off-canvas section is used when the browser is resized to a smaller media
         ** query size for a phone format and hidden until a user clicks on
         ** the header hamburger icon.
      -->
      <div id="navDrawer" role="navigation" class="oj-contrast-marker oj-web-applayout-offcanvas oj-offcanvas-start">
        <oj-navigation-list data="[[navDataSource]]"
                            edge="start"
                            item.renderer="[[oj.KnockoutTemplateUtils.getRenderer('navTemplate', true)]]"
                            on-click="[[toggleDrawer]]"
                            selection="{{router.stateId}}">
        </oj-navigation-list>
      </div>
      <div id="pageContent" class="oj-web-applayout-page">
        <!--
           ** Oracle JET V5.0.0 web application header pattern.
           ** Please see the demos under Cookbook/Patterns/App Shell: Web
           ** and the CSS documentation under Support/API Docs/Non-Component Styling
           ** on the JET website for more information on how to use this pattern.
        -->
        <header role="banner" class="oj-web-applayout-header">
          <div class="oj-web-applayout-max-width oj-flex-bar oj-sm-align-items-center">
            <!-- Offcanvas toggle button -->
            <div class="oj-flex-bar-start oj-md-hide">
              <oj-button id="drawerToggleButton" class="oj-button-lg" on-oj-action="[[toggleDrawer]]" chroming="half" display="icons">
                <span slot="startIcon" class="oj-web-applayout-offcanvas-icon"></span>
                <span>Application Navigation</span>
              </oj-button>
            </div>

          </div>
          <div role="navigation" class="oj-web-applayout-max-width oj-web-applayout-navbar">
            <oj-navigation-list class="oj-sm-only-hide oj-md-condense oj-md-justify-content-flex-end"
                                data="[[navDataSource]]"
                                edge="top"
                                item.renderer="[[oj.KnockoutTemplateUtils.getRenderer('navTemplate', true)]]"
                                selection="{{router.stateId}}">
            </oj-navigation-list>
          </div>
        </header>
        <oj-module role="main" class="oj-web-applayout-max-width oj-web-applayout-content" config="[[moduleConfig]]">
        </oj-module>
      </div>
    </div>
    
    <script type="text/javascript" src="/dennisotugo/js/libs/require/require.js"></script>
    <script type="text/javascript" src="/dennisotugo/js/main.js"></script>

  </body>

</html>

<?php } 
?>
