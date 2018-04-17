<?php	
   $result = $conn->query("Select* from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'adeyefa'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
   //start
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		require "../answers.php";

		date_default_timezone_set("Africa/Lagos");


		try{
		  if(!isset($_POST['question'])){
		    echo json_encode([
		      'status' => 1,
		      'answer' => "Please provide a question"
		    ]);
		    return;
		    }
		    $question = $_POST['question'];
		}
		#Check Training Mode
	    $train_index = stripos($question, "train:");
	    if($train_index === false){
		    $question = preg_replace('([\s]+)', ' ', trim($question));
		    $question = preg_replace("([?.])", "", $question);

		    $question = "%$question%";
	        $sql = "Select * from chatbot where question like :question";
	        $stat = $conn->prepare($sql);
	        $stat->bindParam(':question', $question);
	        $stat->execute();
	  
	        $stat->setFetchMode(PDO::FETCH_ASSOC);
	        $rows = $stat->fetchAll();
	        if(count($rows)>0){
		    $index = rand(0, count($rows)-1);
		    $row = $rows[$index];
		    $answer = $row['answer'];
		    echo $answer;	
		}
		else{
			$training_string = substr($question, 6);
		    //remove excess white space in $question_and_answer_string
		    $training_string = preg_replace('([\s]+)', ' ', trim($training_string));
		      
		    $training_string = preg_replace("([?.])", "", $training_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
		    $split_string = explode("#", $question_and_answer_string);
		
    
	        $question = trim($split_string[0]);
	        $answer = trim($split_string[1]);

	        $sql = "INSERT INTO chatbot(question, answer) VALUES (:question, :answer)";
		    $stat = $conn->prepare($sql);
		    $stat->bindParam(':question', $question);
		    $stat->bindParam(':answer', $answer);
		    $stat->execute();
		    $stat->setFetchMode(PDO::FETCH_ASSOC);
		    echo json_encode([
		        'status' => 1,
		        'answer' => "Thanks for training me"
		    ]);
		    return;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>  <?php echo $user->name ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-color: #D4F4F4;
		}
		h1{
			text-align: center;
			color: red;
		}
		p{
			text-align: center;
			font-size: 80px;
			color: red;
		}
		#p1{
			text-align: center;
			font-size: 40px;
		}
		#fav{
			size: 5px;
		}
		#info{
			text-align: center;
			font-size: 30px;
		}
		#bar{
			background-color: white;
		}
		.sidebar{
			background-color: #FD4F5F;
			width: 465px;
			height: 590px;
		}
		.bbb{
			background-color: #3DFFDF;
			width: 790px;
			height: 590px;
			float: right;
		}
		.iii{
			background-color: white;
		}
		.right{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: relative;
			margin-left: 100px;
		}
		.row{
			border-bottom: 3px solid #E1E1E1;
			margin-bottom: 10px;
			padding: 7px;
		}
		.form{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: relative;
		}
		input[type=submit]{
			width: 60%;
		    padding: 12px 20px;
		    margin: 8px 8px;
		}
		input[type=text] {
		    width: 60%;
		    box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    font-size: 22px;
		    padding: 12px 20px 12px 40px;
		}
		.head{
			background-color: #0EEFF1;
			text-align: center;
		}
		h2{
			font-weight: bolder;
			font-size: 40px;
		}
		.col{
			background-color: white;
		}
	</style>
</head>
<body>
	<h1>
		WELCOME TO MY PROFILE PAGE
	</h1>
	<div class="iii">
		<div class="bbb">

	    	<div class="main">
				<p>
					HELLO WORLD
				</p>
				<p id="p1">
					I am  <?php echo $user->name ?>
				</p>
				<p id="info">
					A Web developer, blogger and Software engineer
				</p>
				<p id="fav">
					<a href="https://github.com/sainttobs"><i class="fa fa-github"></i></i></a>
					<a href="https://twitter.com/9jatechguru"><i class="fa fa-twitter"></i></i></a>
					<a href="https://web.facebook.com/toba.adeyefa"><i class="fa fa-facebook"></i></i></a>	
				</p>
			</div>
	    </div>	
		<div class="sidebar">
			<div class="head">
				<h2> Chat</h3>
			</div>
			<div class="row-holder">
				<div class="row2">
					<div class="form">
						<form action="Adeyefa.php" method="post">
							<input type="text" name="question" placeholder="type your question here"><input type="submit" name="submit">
						</form>
					</div>
				</div>
			</div>	
	    </div>
	</div>	
</body>
</html> 