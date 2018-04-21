<?php
if(!defined('DB_USER')){
require('../../config.php');
}
//require('/../answers.php');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if($connect){
	$result = mysqli_query($connect, "SELECT * FROM secret_word");
	$secret_word = mysqli_fetch_assoc($result)['secret_word'];
	$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'jilh'");
	if($result)	$my_data = mysqli_fetch_assoc($result);
	else {echo "An error occored";}
}
else{
	echo "Unable to connect to db";
}

?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(isset($_POST['message']) && $_POST['message'] != "")
	{
		$question = $_POST['message'];
	
		$training_mode = stripos($question, "train:");
		$find_average = stripos($question, "avg:");
		$find_sum = stripos($question, "sum:");
		$find_multiply = stripos($question, "multiply:");
		$find_say = stripos($question, "say:");
		$bot_info = stripos($question, "aboutbot");
		
		if($training_mode !== false){
			$string = trim($question);
			$split = explode("#", $string);
			$new_question = mysqli_real_escape_string($connect, ltrim($split[0], "train: "));
			$new_answer = mysqli_real_escape_string($connect, $split[1]);
		
			$perform_training = mysqli_query($connect, "INSERT INTO chatbot (id, question, answer) VALUES(0, '$new_question', '$new_answer')");
			if($perform_training){
				echo json_encode(['state' => 1, 'msg' => "You just make me smarter! Thanks."]);
			}else{
				echo json_encode(['state' => 0, 'msg' => "I'm sorry, something went wrong"]);
			}
		}
		elseif($bot_info !== false){
			echo json_encode(['state' => 1, 'msg' => "Bot v1.1 Developed by Afolayan Stephen"]);
		}
		elseif($find_average !== false){
			$value = explode(" ", trim($question));
			
			$numbers = explode(",", trim($value[1], ","));
			$sum_of_numbers = 0;
			
			foreach($numbers as $num){
				$sum_of_numbers += $num;
			}
			
			$average = $sum_of_numbers/ count($numbers);
			
			echo json_encode(['state' => 0, 'msg' => "The average of <b>" . $value[1] . "</b> is " . $average]);
		}
		elseif($find_sum !== false){
			$value = explode(" ", trim($question, ","));
			
			$numbers = explode(",", trim($value[1], ","));
			$sum_of_numbers = 0;
			
			foreach($numbers as $num){
				$sum_of_numbers += $num;
			}
			
			echo json_encode(['state' => 0, 'msg' => "The sum of <b>" . $value[1] . "</b> is " . $sum_of_numbers]);
		}
		elseif($find_multiply !== false){
			$value = explode(" ", trim($question));
			
			$numbers = explode(",", trim($value[1], ","));
			$multiplied = 1;
			
			foreach($numbers as $num){
				$multiplied *= $num;
			}
			
			echo json_encode(['state' => 0, 'msg' => "The product of <b>" . $value[1] . "</b> is " . $multiplied]);
		}
		elseif($find_say !== false){
			$words = trim($question, "say:");
			echo json_encode(['state' => 'say', 'msg' => $words]);
		}
		else{
			
			$test_for_parenthes_start = stripos($question, "{{");
			
			if($test_for_parenthes_start !== false){
				$test_for_parenthes_end = stripos($question, "}}");
				
				$function_name_called = substr($question, $test_for_parenthes_start+2, $test_for_parenthes_end - $test_for_parenthes_start-2);
				
				if(stripos($function_name_called, " ") !== false){
					echo json_encode(['state' => 0, 'msg' => "When you put spaces in the call, i won't do it"]);	
				}
				elseif(!function_exists($function_name_called)){
					echo json_encode(['state' => 0, 'msg' => "Hmm! I can't perform that function"]);
				}
				else{
					$function_response = $function_name_called();
					echo json_encode(['state' => 0, 'msg' => "The response is " . $function_response]);
				}
			}
			else{
				$sanitized_question = mysqli_real_escape_string($connect, trim($question));
				$perform_answer = mysqli_query($connect, "SELECT * FROM chatbot WHERE question LIKE '%$sanitized_question%' ORDER BY RAND()");
				if($perform_answer){
					if($rows = mysqli_num_rows($perform_answer) > 0){
						$result = mysqli_fetch_assoc($perform_answer);
						$answer = $result['answer'];
					
						echo json_encode(['state' => 1, 'msg' => $answer]);
					}
					else{
						echo json_encode(['state' => 1, 'msg' => "Oh no! I couldn't help you this time. Please train me more"]);
					}
				}
				else{
					json_encode(['state' => 0, 'msg' => "I'm sorry, something went wrong"]);
				}
			}
		}
	}
}
?>

<?php if($_SERVER['REQUEST_METHOD'] === 'GET'){ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>I'm Stephen</title>
		<style type="text/css">
			body{
					background: #f2f2f2;
					font-family: 'arial';
				}
				.nav{
					width: 80%;
					margin-left: 10%;
					margin-right: 10%;
				}
				.brand{
					float: left;
					display: inline-block;
					font-size: 24px;
					text-decoration: none;
					color: #000;
					font-family: 'arial';
					font-style: regular;
					}
				.nav-list{
					float: right;
					margin-top: 0;
				}
				.nav-list > li{
					display: inline-block;
					text-align: left;
				}
				.nav-list > li > a{
					text-decoration: none;
					color: #000;
					font-size: 18px;
					margin-left: 10px;
					font-style: regular;
				}
				.clear{clear: both;}
				
				.main{
					width: 100%;
					height: 600px;
					position: relative;
					left: 0;
					right: 0;
					top: 30px;
					bottom: 0;
					margin: auto;
					text-align: center;
					background: #ddd;
					padding: 20px;
				}
				.main > h2{
					font-size: 30px;
					color: #007bff;
					margin-top: 10px;
					}
				.main > h3{
					font-size: 18px;
					line-height: 2em;
					font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
				}
				.main > h6 {
					font-size: 14px;
					margin-top: 15px;
					color: #007bff;
				}
				.my_pics{
					width: 200px;
					height: 250px;
					border-radius: 100%;
					border: 5px solid #ddd;
				}
				
				.connect{
					list-style-type: none;
					margin-left: 0;
					margin-top: 10px;
					padding-left: 0;
				}
				.connect > li{
					display: inline-block;
				}
				.connect > li > a{
					font-size: 34px;
					font-weight: bold;
					text-decoration: none;
					color: #fff;
					text-align: center;
					border-radius: 20%;
				}
				
				.my-bot{
					position: fixed;
					right: 5px;
					bottom: 0;
					height: 400px;
					width: 300px;
					border: 1px solid #ddd;
					background: #fff;
					box-model: border-box;
				}
				.my-bot > .pan {
					
				}
				.my-bot > .pan > .pan-head{
					background: #007bff !important;
					padding: 5px;
					color: #fff;
				}
				.my-bot > .pan > .pan-head > .minimize{
					position: absolute;
					right: 5px;
				}
				.pan-body {
					padding: 5px;
					height: 300px;
					overflow: auto;
				}
				.pan-body > .design {
					display: block;
					font-size: 14px;
					border-radius: 4px;
					width: 80%;
					padding: 5px;
					margin-bottom: 5px;
				}
				.pan-body > .design > .name{
					display: block;
					font-weight: bold;
					font-size: 15px;
				}
				.pan-body > .sender{
					background: #ddd;
					float: right;
				}
				.pan-body > .reciever{
					background: #abf;
					float: left;
				}
				
				.pan > form{
					width: 100%;
					margin: 5px;
				}
				.pan > form > textarea{
					width: 290px;
				}
		</style>
	</head>
	
	<body>
		
		<div class="main">
			<img src="<?php if(isset($my_data['image_filename'])) echo $my_data['image_filename']; ?>" class="my_pics" alt="Afolayan Stephen">
			<h2>Hi! I'm <?php if(isset($my_data['name'])) echo $my_data['name']; ?></h2>
			<h3>I'm a lover of tech, i just got my hands on an opportunity to learn,
			and i'm loving every bit of it.</h3>
			
			<h6>Let's talk</h6>
			<ul class="connect">
				<li><a style="color: #3b5998;" href="https://www.facebook.com/afolayan.stephen"><span class="fa fa-facebook-square"></span></a></li>
				<li><a style="color: #db4437;" href="https://plus.google.com/100463981266653803670"><span class="fa fa-google-plus-square"></span></a></li>
				<li><a style="color: #212529;" href="https://github.com/jilh"><span class="fa fa-github-square"></span></a></li>
			</ul>
		</div>
		
		<div class="my-bot">
			<div class="pan">
				<div class="pan-head">Let's Chat
					<span class="minimize fa fa-remove"></span>
				</div>
				<div class="pan-body">
					<span class="design reciever">
						<span class="name">Agent Mark</span>
						Hi! I'm agent mark, i'm here to help.
						Be free to ask me anything. I know some arithmetic,
						and i can answer some few questions.
						<hr>
						<div>This are my functions</div>
							Train me with <code>train: question # answer</code><br>
							Find Average with <code>avg: num1,num2,..</code><br>
							Find sum with <code>sum: num1,num2,..</code><br>
							Find product with <code>multiply: num1,num2,..</code><br>
							Make me talk with <code>say: word</code><br>
					</span>
				</div>
				<form action="#" method="POST" onSubmit="chatBot(); return false;">
					<input id="message" type="text" name="chats" placeholder="Ask me anything">
					<input type="submit" value="Send" class="">
				</form>
			</div>
		</div>
		<script src="../HNGFun/vendor/jquery/jquery.min.js"></script>
		<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
		<script type="text/javascript">
			function chatBot(){
				let botMessage = $('#message').val();
				if(botMessage == ''){
					$('.pan-body').append('<span class="design reciever"><span class="name">Bot</span>Common! Don\'t hide your feelings from me</span>');
					$(".pan-body").scrollTop($(".pan-body")[0].scrollHeight);
					return false;
				}
				else{
					$('.pan-body').append('<span class="design sender"><span class="name">User</span>' + botMessage + '</span>');
					$('#message').val('');
					
					$.ajax({
						url: "profiles/jilh.php",
						type: "POST",
						data: {message: botMessage},
						dataType: "json",
						success: function(response){ //alert(response);
							if(response.state === "say")
							{
								$('.pan-body').append('<span class="design reciever"><span class="name">Bot</span>' + response.msg + '</span>');
								$(".pan-body").scrollTop($(".pan-body")[0].scrollHeight);
								responsiveVoice.speak(response.msg, 'UK English Male');
								return false;
							}
							else if(response.state === 1){
								$('.pan-body').append('<span class="design reciever"><span class="name">Bot</span>' + response.msg + '</span>');
								$(".pan-body").scrollTop($(".pan-body")[0].scrollHeight);
								return false;
							}
							else{
								$('.pan-body').append('<span class="design reciever"><span class="name">Bot</span>' + response.msg + '</span>');
								$(".pan-body").scrollTop($(".pan-body")[0].scrollHeight);
								return false;
							}
						}
					});
				}
			}
		</script>
	</body>
</html>
<?php } ?>