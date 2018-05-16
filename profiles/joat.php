<?php	
if(!defined('DB_USER')){
	require "../../config.php";		
	try {
	    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
	} catch (PDOException $pe) {
	    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}
}

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username='joat'");
$user = $result2->fetch(PDO::FETCH_OBJ);

?>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$question = preg_replace("([?!.])", "", trim($_POST['question'])); //get the entry into the chatbot text field
		//check if in training mode
		$index_of_train = stripos($question, "train:");
		if($index_of_train === 0){
			if(substr_count($question, "#") === 2){
				//in training mode
				//get the question and answer
				$question_and_answer_string = substr($question, 6);
				//remove excess white space in $question_and_answer_string
				$question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
				
				$passstrt = strripos($question, "#") + 1;
	            $answerstrt = stripos($question, "#") + 1;
	            $answerend = strripos($question,"#") - $answerstrt;
	            $trainqend = stripos($question, "#") - 6;
	            $trainquest = trim(substr($question,6,$trainqend));
	            $trainanswer = trim(substr($question,$answerstrt, $answerend));
	            $trainpass = trim(substr($question, $passstrt));

	            if(trim(substr($question, $answerstrt,$answerend)) === ""){
	            	//if there is no anwser
	            	$sql = "SELECT * FROM  chatbot WHERE question = :question";
	            	$query = $conn->prepare($sql);
	            	$query->bindParam(":question",$question);
                    $query->execute();
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    $rows = $query->fetchAll();
                    if(count($rows)>0){ 
                    	//if the input is a question in database
                        $index = rand(0, count($rows)-1); 
                        //choose answer at random row
                        $row = $rows[$index];
                        $answer = $row['answer'];
                            echo json_encode([
                                'status' => 1,
                                'answer' => $answer,  //returns one row answer
                            ]);
                        return;
                    }else{ 
                    	//if input is not a question in db
                        echo json_encode([
                            'status' => 1,
                            'answer' => "Training Unsuccessfull! You didnt add a desired answer. To train type <b>train: question #answer #password</b>"
                        ]);
                    	return;
                    }
	            }else{
		            //if there is an answer
		            if($trainpass == "password"){
		            	//if password is correct
		                $sql = "INSERT INTO chatbot (question, answer) VALUES (:trainquest,:trainanswer)";
		                $query = $conn->prepare($sql);
		                $query->bindParam(":trainquest",$trainquest);
		                $query->bindParam(":trainanswer",$trainanswer);
		                $query->execute();
		                $query->setFetchMode(PDO::FETCH_ASSOC);
		                echo json_encode([
		                        'status' => 1,
		                        'answer' => "Training successful!! Thank you, I am now smarter"
		                    ]);
		                    return;
		            }else{
		            	//if password is not correct
		            	$sql = "SELECT * FROM  chatbot WHERE question =:question ";
		                $query = $conn->prepare($sql);
		                $query->bindParam(":question",$question);
		                $query->execute();
		                $query->setFetchMode(PDO::FETCH_ASSOC);
		                $rows = $query->fetchAll();
		                if(count($rows)>0){ //if input is a question in db
		                    $index = rand(0, count($rows)-1); //choose random row
		                    $row = $rows[$index];
		                    $answer = $row['answer'];
		                        echo json_encode([
		                            'status' => 1,
		                            'answer' => $answer,  //returns one row answer
		                        ]);
		                        return;
		                }else{ //if input is not a question in db
		                    echo json_encode([
		                        'status' => 1,
		                        'answer' => "Training Unsuccessfull! Incorrect training password. To train type <b>train: question #answer #password"
		                    ]);
		                    return;
		                }
		                return;
		            }
			    }
			}else {
	     		//if it does not have two hashtags
	     		$sql = "SELECT * FROM  chatbot WHERE question = :question ";
	            $query = $conn->prepare($sql);
	            $query->bindParam(":question",$question);
	            $query->execute();
	            $query->setFetchMode(PDO::FETCH_ASSOC);
	            $rows = $query->fetchAll();
	            if(count($rows)>0){ 
	            	//if input is a question in db
	                $index = rand(0, count($rows)-1);
	                $row = $rows[$index];
	                $answer = $row['answer'];
	                    echo json_encode([
	                        'status' => 1,
	                        'answer' => $answer,
	                    ]);
	                return;
	            }else{ 
	            	//if no answer for the question in database
	                if(substr_count($question, "#") === 1){
	                	//if it has 1 hashtag
	                    $onlyhash = stripos($question, "#") + 1;
	                    if(trim(substr($question, $onlyhash)) === ""){
	                    	//if no answer and password
	                         echo json_encode([
		                        'status' => 1,
		                        'answer' => "Training Unsuccessfull! Please add desired answer and the training password, To train type <b>train: question #answer #password"
		                    ]);
	                		return;
	                    }else{
	                    	//if no password only
	                        echo json_encode([
		                        'status' => 1,
		                        'answer' => "Training Unsuccessfull! Please add the training password, To train type <b>train: question #answer #password"
		                    ]);
	                		return;
	                    }
	                }
	                else{
	                	//if it does not have 1 or 2 hashtags
	                    echo json_encode([
		                    'status' => 1,
		                    'answer' => "Training Unseccessfull! Please train with this pattern: 'train: question #answer #password' without the quote ofcourse."
	                    ]);
	                return;
	                }
	            }
	        }
	        return;
	    }
    else{
    	// if it is a question
        if(stripos($question, "aboutbot") === 0 && strlen($question) ===8){
            echo json_encode([
                'status' => 1,
                'answer' => "I am Jarvis. I love united"
            ]);
            return;
        }else{
        	$sql = "SELECT * FROM  chatbot WHERE question =:question ";
            $query = $conn->prepare($sql);
            $query->bindParam(":question",$question);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $query->fetchAll();
            if(count($rows)>0){ 
	            $index = rand(0, count($rows)-1);
	            $row = $rows[$index];
	            $answer = $row['answer'];
                echo json_encode([
                    'status' => 1,
                    'answer' => $answer,  //returns one row answer
                ]);
                return;
            }else{ //if no answer for the question in database
                echo json_encode([
                    'status' => 1,
                    'answer' => "Unfortunately, I can't answer that question at the moment. I need to be trained. To train me type <br> <b>train: question #answer #password </b>"
                ]);
                return;
            }
        }
        return;
    }  
	  
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HNG FUN</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom styles for this template -->
      <link href="../css/style2.css" rel="stylesheet">
      <link href="../css/style1.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
	  <link href="../css/carousel.css" rel="stylesheet">
	<style type="text/css">
		a:hover{
		  text-decoration: none;
		}
	</style>
</head>
<body style='background-color:#3f4447;'>
	
<div class='container'>
	<br><br>
	<div class='row'>
		<div class='col-sm-6' >
			<center><img height='100%' class='img-responsive' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523639668/josh.png"></center>
		</div>
		<div class='col-sm-6'>
			<div>
				<br><br><br><br><br><br>
				<h1 style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; text-transform: uppercase;'><?php echo $user->name; ?></h1>
				<h2 style='font-family: "proxima-nova"; color:#a3a3a3; font-size: 22px; line-height: 1.15em; text-transform: none;letter-spacing: .01em; margin-bottom:26px; text-align:left;'>I am a website devloper, android app devloper ,an animator and also love gaimg. Follow me anywhere.</h2>
				<h2 style='text-align:left;'><a href="mailto:starboi247@gmail.com" style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; '>STARBOI247@GMAIL.COM</a></h2>
				<h2 style='text-align:left;'><a href="http://itsjoat.com" style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; '>WEBSITE</a></h2>
				<div>
					<a href="https://instagram.com/its_joat"><img style='margin-right:10px;' width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/instagram-icon-white.png"></a>
					<a href="https://twitter.com/its_joat"><img style='margin-right:10px;' width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/icon-twitter-white-1.png"></a>
					<a href="https://m.youtube.com/channel/UCvLacR6r37O6N_dWEXDGUyQ"><img width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/white-youtube-2-512.png"></a>
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-2'></div>
		<div class="col-sm-8 chatfr">
		<h2 style='font-family: "proxima-nova"; color:#fff; font-size: 22px; line-height: 1.15em; text-transform: none;letter-spacing: .01em; margin-bottom:26px; text-align:left;'>Chat Bot</h2>
		<div class="row chats" id="chats" style='background-color:#fff; overflow-y: auto; height:400px; padding:10px; margin:0px;'>
			<div class="col-md-12" id="message-frame">
				<div class="row message">
					<div class="col-md-1 ">
						<p>Bot:</p>
					</div>

					<div class="col-md-8 ">
						<p>Welcome! I am <b>Jarvis</b></p>
					</div>
				</div>
				<div class="row message">
					<div class="col-md-1 ">
						<p>Bot:</p>
					</div>
					<div class="col-md-8 ">
						<p>Ask me your questions and I will try to answer them.</p>
					</div>
				</div>
				<div class="row message">
					<div class="col-md-1 ">
						<p>Bot:</p>
					</div>
					<div class="col-md-8 ">
						<p>you can also train me to answer new quetions</p>
						<p>To train me, enter the training string in this format</p>
						<p>train: question #answer #password</p>
					</div>
				</div>
			</div>
		</div>
		<form id="question-form">
			<input class="form-control" type="text" name="question" id="question" class="question" placeholder="Ask a question" />
			<button type="submit" class="btn btn-info float-right w-100">Send</button>
		</form>	
	</div>
	<div class='col-sm-2'></div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
	$("#question-form").on("submit", function(event) {
		event.preventDefault();
		var question = $("#question").val();
		//display question in the message frame as a chat entry
		var chatToBeDisplayed = '<div class="row message">'+
					'<div class="col-md-1 2">'+
						'<p>User:</p>'+
					'</div>'+
					'<div class="col-md-8 2">'+
						'<p>'+question+'</p>'+
					'</div>'+
					
				'</div>';
		$('#message-frame').append(chatToBeDisplayed);
		$("#chats").scrollTop($("#chats")[0].scrollHeight);
		//send question to server
		$.ajax({
			url: '/profiles/joat.php',
			type: 'POST',
			data: {question: question},
			dataType: 'json',
			success: (response) => {
				var chatToBeDisplayed = '<div class="row message">'+
					'<div class="col-md-1 2">'+
						'<p>Bot:</p>'+
					'</div>'+
					'<div class="col-md-8 2">'+
						'<p>'+response.answer+'</p>'+
					'</div>'+
				'</div>';
				$('#message-frame').append(chatToBeDisplayed);
				$("#chats").scrollTop($("#chats")[0].scrollHeight);
			},
			error: (error) => {
				alert('error occured')
					console.log(error);
			}
		});

		$("form").each(function(event){
            this.reset()
        });
	});
</script>	
</body>
</html>

<?php 
	}
?>
