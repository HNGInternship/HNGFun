<?php
include_once "db.php";
// include 'answers.php'
// require "../../config.php";


?>

<?php
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'roqak'");
$user = $result2->fetch(PDO::FETCH_OBJ);
///////////////////////////////////////////////////////////////
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $mem = $_POST['question'];
  // $mem = preg_replace('([\s]+)', ' ', trim($mem)); //remove extra white space from question
  $mem = preg_replace("([?.])", "", $mem); //remove ? and .
  if ($mem =="aboutbot") {
    header('Content-type: text/json');
    $arrayName = array('result' => 'Akin\'s chatbot Version 0.1');
    echo json_encode($arrayName);
    return;
  }
  //$mem = preg_replace('([\s]+)', ' ', trim($mem));
  //$mem = preg_replace("([?.])", "", $mem);
	$arr = explode(" ", $mem);
	if($arr[0] == "train:"){
		unset($arr[0]);
		$q = implode(" ",$arr);
		$queries = explode("#", $q);
		$quest = $queries[0];
		$ans = $queries[1];
		 $sql = "INSERT INTO nbot(question, answer) VALUES ('" . $quest . "', '" . $ans . "')";
		 $conn->exec($sql);
     header('Content-type: text/json');
     $arrayName = array('result' => 'Thanks for uprading my knowledge.... You can now test me');
     echo json_encode($arrayName);
     return;
    }
    //else {
   //   $arrayName = array('result' => 'Oh my Error')
   //   header('Content-type: text/json');
   //   echo json_encode($arrayName);
   //   return
   // }
    else {
      $mem = "%$mem%";
      $sql = "select * from chatbot where question like :mem";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':mem', $mem);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $stmt->fetchAll();
      if(count($rows)>0){
        $index = rand(0, count($rows)-1);
        $row = $rows[$index];
        $answer = $row['answer'];
        $open_par = stripos($answer, "((");
        $closing_par = stripos($answer, "))");

        header('Content-type: text/json');
          echo json_encode([
            'result' => $answer
          ]);
          return;
        }else {
          header('Content-type: text/json');
            echo json_encode([
              'result' => "I'm sorry, i didn't understand you, why don't you train me HUMMAN? type: train: question # answer to train me"
            ]);
            return;
        }
}
}



?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<title> <?php echo $user->name ?> </title>
	<style type="text/css">
	.white{
		color: white;
		margin-top: 20%;
		font-family: Alfa Slab One;
	}
	body{
		background-color: red;
	}
	#hello{
		font-size: 90px;
	}
	a{
		font-size: 40px;
		color: white;
		text-decoration: none;
		margin: 14px;
	}
	.mainn{
		height: 100%;
	}
	.chat{
		margin-top:9%;
		background-color: white;
		/* margin-bottom: 9%; */
	}
	.padedd{
		margin-top: 5%;
	}
  li{
    list-style-type: none;
  }
	</style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="jquery-3.3.1.min.js"></script> -->
<body>
<div class="container">
<div class="row">
 <div class="col-md-9 mainn">
	 <div class="white text-center">
		<h1 id="hello">HELLO</h1>
		<h3>I AM <?php echo $user->name ?>  HNG INTERN.</h3>
                <a href="" target="https://www.facebook.com/badoo.akin">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="" target="https://twitter.com/roqak">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="" target="https://twitter.com/roqak">
                  <i class="fa fa-instagram"></i>
                </a>
								<a href="" target="https://slack.com/roqak">
                  <i class="fa fa-slack"></i>
                </a>
     </div>
	 </div>
	 <div class="col-md-3 chat">
	    <div style="background-color: yellow"><h1 class="text-center"> My ChatBot</h1></div>
	      chat
				<ul id="chats">
				<?php

				?>
				</ul>
			<footer>
				<form class="padedd" methood="post" id="formm">
	    <input type="text" placeholder="message" name="message"><button id="send" name="send">Send</button>
			</form>
			</footer>
	    </div>

  </div>
	</div>
</div>
<script>
$(document).ready(function(){
	var Form = $('#formm');
	Form.submit(function(e){
		e.preventDefault();
		var MBox = $('input[name=message]');
		var question = MBox.val();
		$("#chats").append("<li>" + question + "</li>");


		// $.ajax({
		// 	url: 'Roqak.php',
		// 	type: 'POST',
		// 	dataType: 'json',
		// 	data: {question: question},
		// 	success: function(response){
		// 	console.log("sucess");
		// 	$("#chats").append(`<li> ${response.answer} </li>`);
		// 	},
		// 	error: function(error){
		// 		alert('error occured   ' + error);
		// 		console.log(error);
		// 	}
		// })
		$.ajax({
			url: "Roqak.php",
			type: "post",
			data: {question: question},
			dataType: "json",
			success: function(response){
        $("#chats").append("<li>" + response.result + "</li>");
			},
			error: function(error){
				console.log(error);
        alert(error);
			}
		})

	});
});
</script>
</body>
</html>
