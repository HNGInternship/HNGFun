<?php 

include '../..config.php';


$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data_ where username = 'adeyefa'");
$user = $result2->fetch(PDO::FETCH_OBJ);

/////////////////////////////////

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $mem = $_POST['question'];
    $mem = preg_replace('([\s]+)', ' ', trim($mem));
    $mem = preg_replace("([?.])", "", $mem);
	$arr = explode(" ", $mem);
	if($arr[0] == "train:"){
		unset($arr[0]);
		$q = implode(" ",$arr);
		$queries = explode("#", $q);
		$quest = $queries[0];
		$ans = $queries[1];
		 $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $quest . "', '" . $ans . "')";
		 $conn->exec($sql);
     header('Content-type: text/json');
     $arrayName = array('result' => 'Thanks for training me, you can now test my knowledge');
     echo json_encode($arrayName);
     return;
    }
    //else {
   //   $arrayName = array('result' => 'Oh my Error');
   //   header('Content-type: text/json');
   //   echo json_encode($arrayName);
   //   return;
   // }
    else {
      header('Content-type: text/json');
       $arrayName = array('result' => "Query Accepted");
       echo json_encode($arrayName);
       return;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>  <?php echo $user->name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-color: #D4F4F4;
		}
		h1{
			text-align: center;
			color: red;
		}
		.pimg{
			float: right;
		}
		p{
			text-align: center;
			font-size: 60px;
			color: red;
		}
		#p1{
			text-align: center;
			font-size: 60px;
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
		#form{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: absolute;
			width: 450px;
			height: auto;
		}
		input{
			width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		input[type=text] {

		    width: 80%;
		    box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    font-size: 15px;
		    padding: 12px 20px 12px 40px;
		}

		input[type=submit]{
		    width: 80%;
		    padding: 12px 20px;
		    margin: 8px 8px;
		}
		.head{
			background-color: #0EEFF1;
			text-align: center;
		}
		h2{
			font-weight: bolder;
			font-size: 40px;
		}
		li{
			size: 20px;
		}
		#questionBox{
			font-size: 15px;
			font-family: Ubuntu;
			width: 400px;
			height: auto;
		}
		#bot_reply{
            position: relative;
		    overflow: auto;
		    overflow-x: hidden;
		    padding: 10px 5px 92px;
		    border: none;
		    max-height: 300px;
		    -webkit-justify-content: flex-end;
		    justify-content: flex-end;
		    -webkit-flex-direction: column;
		    flex-direction: column;
		}
		.irr{
			float: left;
	        color: #fff;
	        background-color: #033FFF;
	        -webkit-align-self: flex-start;
	        align-self: flex-start;
	        -moz-animation-name: slideFromLeft;
	        -webkit-animation-name: slideFromLeft;
	        animation-name: slideFromLeft;
	        font-size: 15px;
			font-family: Ubuntu;
		}
		.irr:before{
			left: -3px;
            background-color: #00b0ff;
		}
	</style>
</head>
<body>
	<div class="iii">
		<div class="bbb">
	    	<div class="main">
				<p>
					HELLO WORLD
				</p>
				<p id="p1">
					I am  <?php echo $user->name; ?>
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
				<h2> Chat With MyBot</h2>
			</div>
			<div class="row-holder">
				<div class="row2">
					<div id="form">
						<form id="qform" method="post">
							<div id="textform">
								<textarea id='questionBox' name="question" placeholder="Enter message ..."></textarea>
								<button type="submit" id="send-button">Send</button>
							</div>
							<div id="bot_reply">
								<div class="irr">
									Chats 
									<ul id="chats">
										<?php

										?>
									</ul>
								</div>	
							</div>
						</form>
					</div>
				</div>
			</div>		
	    </div>
	</div>	
	<script src="Hngfun/vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var Form =$('#qform');
			Form.submit(function(e){
				e.preventDefault();
				var questionBox = $('textarea[name=question]');
				var question = questionBox.val();
				$("#chats").append("<li>" + question + "</li>");
				

				//$.ajax({
				//	url: 'Adeyefa.php',
				//	type: 'GET',
				//	dataType: 'json',
				//	data: {question: question},
				//	success: (response) =>{
				//		console.log("success");
				//	},
				//	error: (error) => {
				//		alert('error occured')
				//		console.log(error);
				//	}
				//}
				$.ajax({
					url: "Adeyefa.php",
					type: "post",
					data: {question: question},
					dataType: "json",
					success: function(answer){
		        $("#chats").append("<li>" + answer.result + "</li>");
					},
					error: function(error){
						console.log(error);
		        alert(error);
					}
				})	
			})
		});
	</script>
</body>
</html> 

<?php

?>
