<!DOCTYPE html>
<html>
<head>
<title>Horlathunbhosun| Portifolio</title>
<link rel="stylesheet" type="text/css" href="">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="js/jquery.min.js"></script>

<style>
@import url('https://fonts.googleapis.com/css?family=Lato');

#boh1{
  text-align: center;
  font-family:'Lato', sans-serif;
  width: 300px;
}
body{

background: grey;
}
p {
  color: black;
  font-size: 20px;
}
.containerb{
  list-style-type: none;
  color: white;
  padding: 30px;
  padding-top: 200px;
  display: inline-flex;
  background: grey;
}

.contain{
  padding: 10px;
  margin: 50px;
  border-radius: 2px;
  margin-left: 80px;
}
.socialicons{
    text-align: justify;
    padding-top: 10px;
}


/****************************************chat Bot style ****************************/
.chatbox {
	width: 500px;
	min-width: 390px;
	height: 600px;
	background: #fff;
	padding: 25px;
	margin: 20px auto;
	box-shadow: 0 3px #ccc;
}

.chatlogs {
	padding: 10px;
	width: 100%;
	height: 450px;
	overflow-x: hidden;
	overflow-y: scroll;
}

.chatlogs::-webkit-scrollbar {
	width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb {
	border-radius: 5px;
	background: rgba(0,0,0,.1);
}

.chat {
	display: flex;
	flex-flow: row wrap;
	align-items: flex-start;
	margin-bottom: 10px;
}


.chat .user-photo {
	width: 60px;
	height: 60px;
	background: #ccc;
	border-radius: 50%;
}

.chat .chat-message {
	width: 80%;
	padding: 15px;
	margin: 5px 10px 0;
	border-radius: 10px;
	color: #fff;
	font-size: 20px;
}

.friend .chat-message {
	background: #1adda4;
}

.self .chat-message {
	background: #1ddced;
	order: -1;
}

.chat-form {
	margin-top: 20px;
	display: flex;
	align-items: flex-start;
}

.chat-form textarea {
	background: #fbfbfb;
	width: 75%;
	height: 50px;
	border: 2px solid #eee;
	border-radius: 3px;
	resize: none;
	padding: 10px;
	font-size: 18px;
	color: #333;
}

.chat-form textarea:focus {
	background: #fff;
}

.chat-form button {
	background: #1ddced;
	padding: 5px 15px;
	font-size: 30px;
	color: #fff;
	border: none;
	margin: 0 10px;
	border-radius: 3px;
	box-shadow: 0 3px 0 #0eb2c1;
	cursor: pointer;

	-webkit-transaction: background .2s ease;
	-moz-transaction: backgroud .2s ease;
	-o-transaction: backgroud .2s ease;
}

.chat-form button:hover {
	background: #13c8d9;
}

.message-box {
    padding: 8px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	margin-left:50px;
}

</style>
</head>


 


<?php


 // session_start();
 // require('answers.php');
if(!defined('DB_USER')){
  require "../../config.php";
	// require_once ('../db.php');
}


  global $conn;



  $query = $conn->query("SELECT * FROM secret_word");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $secret_word = $result['secret_word'];


    $result2 = $conn->query("SELECT * FROM interns_data WHERE  username = 'horlathunbhosun'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
   // $user = $result2->fetch();
   
    
 
?>
<br>


<?php
                      
    if (isset($_POST['payload'])) {
    // require "../answers.php"; 
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
		$query1 = 'SELECT * FROM chat_bot WHERE question LIKE "' . $question . '"';
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


    function area($radius, $pie){
	  	$circleArea  = pow($radius, 2)*$pie;

	  	return $circleArea;


	  }

 function areaofacircle($question) {
		if (strpos($question, 'circle:') !== false) {
		  return true;
		}
		return false;
	  }
	  if(areaofacircle($question)){      
    $circle = str_replace("circle:", "", $question);    
        $circle_ex = explode("*", $circle);        
        if(!isset($circle_ex[0])){
          echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
        }
        if(!isset($circle_ex[1])){
          echo "Invalid Input, The numbers are not up to two or invalid operator";
        exit();
        return;
        } 
        $num_1 = trim($circle_ex[0]);
        $num_2 = trim($circle_ex[1]);

		$area = area($num_1, $num_2);
		return $area;
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

	  function area($radius, $pie){
	  	$circleArea  = pow($radius, 2)*$pie;




	  }




	  
	  $answer = botReply();
	  echo $answer;
	  exit();
	

} else {
    ?>





<div class="container" style="padding-top: 100px;">
		<div class="row">	
	<div class="col-md-6" >
		<div class="chatbox" id="boh1" style="height: 700px;">
			<img src="<?php echo $user->image_filename; ?>" alt="2boh" width= "300px" height="300px" class="img-circle">
					<h1 style="color: black;"><?php echo  $user->name; ?></h1>
					<p style=" font-size: 30px;">(<?php echo $user->username; ?>) </p>
							<p>	(Web Developer)</p>
						<p>I love tech stuff and cools things</p>
						 <h6 style="font-size: 20px;"><b>Skills:</b>PHP(Code Igniter, Laravel)</h6>
						<a href="https://github.com/horlathunbhosun" target="_blank" style="color: black;" class="btn btn-success"><i class="fa fa-github"></i> Github</a>
						<a href="https://twitter.com/@horlathunbhosun" target="_blank" style="color: black;" class="btn btn-info"><i class="fa fa-twitter"></i> Twitter</a>
						<a href="https://www.linkedin.com/in/olulode-olatunbosun-458927135/" target="_blank" style="color: black;" class="btn btn-warning"><i class="fa fa-linkedin"></i> Linkedin</a>
						<a href="https://web.facebook.com/olaolulode" target="_blank" style="color: black;" class="btn btn-primary"><i class="fa fa-facebook"></i>Facebook</a>
						
			</div>
				</div>
			<div class="col-md-6">			
			<div class="chatbox">
				<div class="chatlogs">

					
             <div class="chat friend">
				 
				<!-- <div class="user-photo"> </div> -->
				<p class="chat-message">Ask me anything. you can also train me by following the format below <code><br> train: question # answer # password</p>	
				


			
			
		</div>
		<!-- /profile.php?id=horlathunbhosun.php -->


	
		<div class="chat-form">

			<!-- <input type="text" placeholder="Ask/Train me.." > -->
			<textarea placeholder="Ask/train Me".. class="message-box"></textarea>
			<button class="send-query" value="ask Me question">Send</button>

		</div>
	</div>


</div>

		
		</div>
	</div>	
</body>

</html>
<script type="text/javascript">
  window.onload = function() {
    $(document).keypress(function(e) {
      if(e.which == 13) {
        getResponse(getQuestion());
      }
    });
    $('.send-query').on('click', function () {
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
      url: "profiles/horlathunbhosun.php",
      // /profile.php?id=horlathunbhosun
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
      $('.chatlogs').append(
        `<div>
		<div class="chat friend temp">
  <p class="chat-message> Retriving, Please wait.... </p>
		</div>
		</div>`
      );
      return;
    }
    $('.temp').parent().remove();
    $('.chatlogs').append(
      `<div>
	  <div class="chat friend">
  <p class="chat-message">  ${response}   </p>
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
    $('.chatlogs').append(
      `<div>
	  <div class="chat self">
  <p class="chat-message"> ${message} </p>
		</div>
		</div>`
    );
  }
</script>
					  <?php } ?>

</html>

