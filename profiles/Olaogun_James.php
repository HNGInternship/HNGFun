<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
			.james-cont {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
  font-family: arial;
  width: 600px;
}

.james-title {
  color: grey;
  font-size: 18px;
}

.james-number {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #3bea45;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.james-sociala {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.james-number:hover, a:hover {
  opacity: 0.7;
}

.my_ul{
  list-style-type: none;
  color: black;
  padding: 0px;
  display: inline-flex;
}

.my_li{
  padding: 10px;
  margin: 1px;
  border-radius: 2px;
  margin-left: 80px;
}


/***************************CHAT *************************************************/

.my_user {
    background-color: #f1f1f1;
    border-radius: 10px;
    padding: 10px;
    margin: 10px 0;
	font-size:16px;
}

.my_bot {
    border-color: #ccc;
    background-color: #09a4cb;
    text-align: right !important;
	border-radius: 10px;
	padding: 10px;
    margin: 10px 0;
	font-size:16px;
}
.message_body{
  height: 500px;
  overflow: auto;
  width: 80%;
  background-color:#fff;
  border-radius:10px;
}

.my_user::after {
    content: "";
    clear: both;
    display: table;
}

.message-box {
    padding: 8px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	margin-left:50px;
}

.send-message-btn {
    background-color: #4CAF50;
    color: white;
    padding: 8px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
.bot{
	width: 90%;
	margin-left:25px;
}
.bot-reply{
	text-align: right;
}
.you{
	width: 90%;
	margin-left:25px;
}
.bot_title{
	font-size:17px;
}

	</style>
  
</head>
<body>

<?php

if(!defined('DB_USER')){
  require "../../config.php";
}
try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

global $conn;



$secret_q = "SELECT * FROM secret_word  LIMIT 1";
$result = $conn->query($secret_q);
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$details = "SELECT * FROM interns_data  WHERE username = 'Olaogun_James' ";
$result2 = $conn->query($details);
$my_details = $result2->fetch(PDO::FETCH_OBJ);

 

?>
<br>
  <?php
                      
    if (isset($_POST['payload'])) {
    require "../answers.php"; 
    $question = $_POST['payload'];
    function trainningMode($question) {
      if (strpos($question, 'train:') !== false) {
        return true;
      }
      return false;
      }
          
	 function botReply() {
		global $question;
		global $conn;
		$query1 = 'SELECT * FROM chatbot WHERE question LIKE "' . $question . '"';
		$chat_query1 =  $conn->query($query1);
		$chat_query1->setFetchMode(PDO::FETCH_ASSOC);
		$question_chat = $chat_query1->fetchAll();
		$question_chat_index = 0;
		if (count($question_chat) > 0) {
		  $question_chat_index = rand(0, count($question_chat) - 1);
		}
		if (!isset($question_chat[$question_chat_index])) {
		  return 'I don\'t understand that question. I will be glad if you could train me, To train follow the format below: <br> <code>train: your question? # The answer # password.</code>"';
		}		
		  return $question_chat[$question_chat_index]['answer'];
		}

	
    function questionFromTranning($question) {
      $s = 7;
      $e = strlen($question) - strpos($question, " # ");
      $new_question = substr($question, $s, -$e);
      return $new_question;
    }
    
    function answerFromTranning($question) {
      $s = strpos($question, " # ") + 3;
      $the_answer = substr($question, $s);
      return $the_answer;
    }
    $string = explode("#", trim($question));
    if (trainningMode($question)) {
      if (!isset($string[2])) {
        echo "Please provide the password required to train me.";
        exit();
        return;
      }
      if (trim($string[2]) !== "password") {
        echo "Invalid password, i will not allow you train me.";
        exit();
        return;
      }  
      $question = $string[0] ."#". $string[1];
      $answer = answerFromTranning($question);
      $question = strtolower(questionFromTranning($question));
      $q_and_a = array(':question' => $question, ':answer' => $answer);      
      $insert_q_a = 'INSERT INTO chatbot ( question, answer )
          VALUES ( :question, :answer );';
      $query_insert_q_a = $conn->prepare($insert_q_a);
      $query_insert_q_a->execute($q_and_a);
      echo "Thank you. i have gained more knowledge.";
      return;
    }
    function multiplication($a, $b)
    {
        $c = $a * $b;
        echo $c;
    }

    function addition($a, $b)
    {
        $c = $a + $b;
        echo $c;
    }

    function subtraction($a, $b)
    {
        $c = $a - $b;
        echo $c;
    }

    function division($a, $b)
    {
        $c = $a / $b;
        echo $c;
    }

	  function multiplication_question($question) {
		if (strpos($question, 'multiply:') !== false) {
		  return true;
		}
		return false;
	  }
	  if(multiplication_question($question)){      
    $multiply = str_replace("multiply:", "", $question);    
        $multiply_ex = explode("*", $multiply);        
        if(!isset($multiply_ex[0])){
          echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
        }
        if(!isset($multiply_ex[1])){
          echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
        } 
        $num_1 = trim($multiply_ex[0]);
        $num_2 = trim($multiply_ex[1]);

		$multiplication = multiplication($num_1, $num_2);
		return $multiplication;
	  }

	  function addition_question($question) {
		if (strpos($question, 'add:') !== false) {
		  return true;
		}
		return false;
	  }
	  if(addition_question($question)){
		$add = str_replace("add:", "", $question);
          $add_ex = explode("+", $add);
          if(!isset($add_ex[0])){
            echo "Invalid Input, The numbers are not up to two or invalid operator ";
        exit();
        return;
          }
          if(!isset($add_ex[1])){
            echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
          } 
          $num_1 = trim($add_ex[0]);
          $num_2 = trim($add_ex[1]);

           $addition = addition($num_1, $num_2);
		return $addition;
	  }

	  function subtraction_question($question) {
		if (strpos($question, 'subtract:') !== false) {
		  return true;
		}
		return false;
	  }
	  if(subtraction_question($question)){
		$subtract = str_replace("subtract:", "", $question);
		$subtract_ex = explode("-", $subtract);
		if(!isset($subtract_ex[0])){
		  echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
		}
		if(!isset($subtract_ex[1])){
		  echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
		} 
		$num_1 = trim($subtract_ex[0]);
		$num_2 = trim($subtract_ex[1]);
  
		$subtraction = subtraction($num_1, $num_2);
		return $subtraction;
	  }

	  function division_question($question) {
		if (strpos($question, 'divide:') !== false) {
		  return true;
		}
		return false;
	  }
	  if(division_question($question)){
		$divide = str_replace("divide:", "", $question);
		$divide_ex = explode("/", $divide);
		if(!isset($divide_ex[0])){
      echo "Invalid Input, The numbers are not up to two or invalid operator";
      exit();
      return;
		}
		if(!isset($divide_ex[1])){
      echo "Invalid Input, The numbers are not up to two or invalid operator";
      exit();
      return;
		} 
		$num_1 = trim($divide_ex[0]);
		$num_2 = trim($divide_ex[1]);

		$division = division($num_1, $num_2);
		return $division;
	  }
	  
	  $answer = botReply();
	  echo $answer;
	  exit();
	

} else {
    ?>
	<ul class="my_ul">
  <li class="my_li">
    <div class="james-cont">
    <img src="<?php echo $my_details->image_filename  ?>" alt="James" style="width:100%">
    <h1><?php echo $my_details->name  ?></h1>
    <p class="james-title">Student and Tech Enthusiast</p>
    <p class="james-title">Web Developer (Laravel/PHP)</p>
    <p>Tai Solarin University of Education</p>
    <div style="margin: 24px 0;">
      <a href="https://twitter.com/James_Olaogun" class="james-social"><i class="fa fa-twitter"></i></a>  
      <a href="https://www.linkedin.com/in/olaogun-james-654024144/" class="james-social"><i class="fa fa-linkedin"></i></a>  
      <a href="https://web.facebook.com/olaogun.jamez" class="james-social"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button class="james-number">08178313562</button></p>
  </div>
  </li>
	<li class="my_li">
<div class="bot-container message_body">
	<center> <span class="bot_title">Hi, My name is Kiara.</span></center>
    <div class="messages-container">
      <div>
        <div class="my_user message bot">
          <span class="content">Ask me anything. you can also train me by following the format below <code><br> train: question # answer # password </code></span>
        </div>
      </div>
      <div>
        <div class="my_user message bot">
          <span class="content">I can perform basic arithmetic of two numbers. to calculate follow the format below: <code><br>add: 1st number + 2nd number <br>multiply: 1st number * 2nd number <br>subtract: 1st number - 2nd number <br>divide: 1st number / 2nd number</code></span>
        </div>
      </div>
    </div>
    <div class="send-message-container">
      <input class="message-box" placeholder="Ask/Train me..."/>
      <button class="send-message-btn"> Ask  </button>
    </div>
  </div>
  
</ul>	
</body>
</html>
<script type="text/javascript">
  window.onload = function() {
    $(document).keypress(function(e) {
      if(e.which == 13) {
        getResponse(getQuestion());
      }
    });
    $('.send-message-btn').on('click', function () {
      getResponse(getQuestion());
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
      url: "profiles/Olaogun_James.php",
      method: "POST",
      data: { payload: question },
      success: function(res) {
        if (res.trim() === "") {
          showResponse(`
          I don\'t understand that question. I will be glad if you could train me, To train follow the format below: <br> <code>train: your question? # The answer # password.</code>"
          `);
        } else {
          showResponse(res);
        }
      }
    });
  }

  function showResponse(response) {
    if (response === true) {
      $('.messages-container').append(
        `<div>
		<div class="my_bot bot temp">
  <span class="chat_text content"> Retriving, Please wait.... </span>
		</div>
		</div>`
      );
      return;
    }
    $('.temp').parent().remove();
    $('.messages-container').append(
      `<div>
	  <div class="my_bot message bot">
  <span class="chat_text content bot-reply">  ${response}   </span>
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
    $('.messages-container').append(
      `<div>
	  <div class="my_user message you">
  <span class="chat_text content"> ${message} </span>
		</div>
		</div>`
    );
  }
</script>
					  <?php } ?>