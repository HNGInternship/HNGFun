<?php
	try {
		if (!defined('DB_USER')){
			require "../../config.php";
		}
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);			} catch (PDOException $pe) {
			die("Could not connect err: " . DB_DATABASE . ": " . $pe->getMessage());
			}
			global $conn;
	}
	catch (PDOException $pe) {
		throw $pe;
   }
		
    $sql = "SELECT secret_word FROM secret_word;";
    $query = $conn->query($sql);
    $result = $query->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
    
    $queryProfile = $conn->query("SELECT * FROM interns_data WHERE username = 'walecloud';");    
	$rsProfile = $queryProfile->fetch(PDO::FETCH_OBJ);
	
	if($_SERVER['REQUEST_METHOD'] === 'POST') {

    	function isTrainQuestion( $question ) {
	    	if(stripos( $question, "train:") !== false ) { // train question
	    		$q = explode(":", $question); $qS = explode("#", $q[1]);
	    		$res = explode("#", $question);

	    		$array = array('q' => $qS[0], 'ans' => $res[1], 'pwd' => $res[2] );
	    		return $array;
	    	}
	    	return false;
    	}

		$question = $_POST['text'];
		$question = trim($question);
		$question = preg_replace('/\s+/', ' ', $question);
    	// check it is not a train question
    	$tQuest = isTrainQuestion($question);
    	if($tQuest === false || $tQuest == false) {
			// check if its about bot
			if($question == 'about bot' || $question == 'aboutbot' ){
				$version = "1.0";
				echo json_encode(['status'=>1,"answer"=>"version ".$version]);
				return;
			}
    		// query dbase for a similar questions and return a randomly selected single closest response attached to it.
			try {
				$stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question LIKE :question ORDER BY rand() LIMIT 1");
				$term = "%$question%";
				$stmt->bindParam(':question', $term);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result = $stmt->fetch();
				// there's a matching result return to user
				if($stmt->rowCount()) {		  
					echo json_encode([
						'status' => 1,
						'answer' => $result['answer']
					]);
				return;
				}
				else {
					echo json_encode([
						'status' => 1,
						   'answer' =>  "I don't understand, Please train me by typing  train: your question #your answer #password"
					]);
					return;
				}
			} catch(PDOExcetion $pe) { throw $pe;}
    		// if no result for query, then output i don't understand this please train me to know with train format.			

    	}

    	// It is a train question
    	else {
    		//insert into db
    		$trainData = ($tQuest);
    		
    		$trainQuestion  = $trainData['q'];
    		$trainAnswer = $trainData['ans'];
    		$password = $trainData['pwd'];

    		if(empty($trainQuestion) || empty($trainAnswer) || $password !== 'password') {
    			echo json_encode( [
    				'status' => 1,
    				'answer' => "wrong training format, please do like so-> train: question #answer # password"
    			]);
    			return;
    		}
			$stmt = $conn->prepare("SELECT * FROM chatbot WHERE question = :question");
    		$stmt->bindParam(':question', $question);
    		$stmt->execute();
    		$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->rowCount();

			if($rows > 0) {				
				echo json_encode( [
					'status' => 1,
					'answer' => 'Nice but i know this already. Thank you!'
				]);
				return;
			}
			
    		try {
				$sql = "INSERT INTO chatbot (question, answer) VALUES( :question, :answer);";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':question', $trainQuestion);
				$stmt->bindParam(':answer', $trainAnswer);
				try { 
					
					$stmt->execute();
						//$stmt->setFetchMode(PDO::FETCH_ASSOC);
						echo json_encode([
							'status' => 1,
							'answer' => " I've learnt something new, you can test me now!"
						]);
						return;
				}
				catch (PDOException $pe) { throw $pe; } {
					echo json_encode([
						'status' => 1,
						'answer' => $pe
					]);
					return;
				}
			} catch (PDOException $pe) { throw $pe; }
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>WaleCloud - Profile</title>
	<style>
		* { font-family: OCR A std; font-size: 30px; }
		body { justify-content: center; }
		.card {	height: 80vh; width: 300px; border: 1px groove #ccc; border-radius: 3px; }
		.dp { padding: 2px;	height: 300px;	}
		span { font-size: 16px;	}
		.chart-box{ margin-bottom: 8px; font-size:17px; width: 300px; height: 80vh; border: 2px solid #000; overflow:auto; padding-top: 90px; }
		.chart-input{ position: relative;}
		.chart-input-box{ position: absolute; bottom: 0px; }
		.chart-input-box input{ font-size:18px; padding: 10px 0 10px 0; width: 300px; border: 2px solid #000; }
		.move-box{ position: relative; }
		.move{ position: absolute; left: 10px; }
		button{ position: absolute; left: 250px; bottom: 10px; height: 35px; cursor: pointer; border: 0; margin-right: 10px; overflow: auto; }
	</style>
</head>
<body>

<div class="row">
	<div class="card col-md-6">
		<div class="dp">
			<img src="<?= $rsProfile->image_filename; ?>">
		</div>
		<div>
			<h2><?= $rsProfile->name; ?><br>
				<span><?= $rsProfile->username; ?><span></h2>
			<p>Having fun at HNG4...</p>
		</div>
	</div>
	<div class="chart col-md-6">
		<div class="chart-ui-box">
			<div class="chart-ui-box-inner">
				<div class="chart-box" id="chat-area">
					
				</div>
				<div class="chart-input">
					<div class="chart-input-box">
						<input type="text" id="text" name="text">
						<button type="submit" id="submit"><span class="fa fa-send"></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	function doChat() {
		var text = $('#text').val();

		$('#chat-area').append("<p style='text-align:right; font-size:17px;'>"+text+"</p>");
		$('#text').val('');
		//$('#chat-area').append("from db by bot");

		$.ajax({
			url: "/profiles/walecloud.php",
			type: "post",
			data: { text: text },
			dataType: "json",
			success: function(response){
				if(response.status == 1) {
            		$("#chat-area").append(response.answer);
            		console.log("why: "+response.answer);
            	}
            	else {
            		console.log("error");
            	}
        	},
        	error: function(jqXHR, textStatus, errorThrown) {
           		console.log(jqXHR, textStatus, errorThrown);
        	}
    	});
	}
	$(document).ready(function(){
		$('#submit').click(function() {
			doChat();
		});

		window.addEventListener("keydown", function(e){
		    if(e.keyCode ==13){
		        doChat();
		    }
		});
	});
</script>
</body>
</html>