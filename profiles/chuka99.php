   <?php
	
$question= $_POST['question'];
$answer= $_POST['answer'];
$password= $_POST['password'];
$id = $_POST['ID'];


//connect to server
mysql_connect ("localhost", "root", "") or die (mysql_error());

//select db
mysql_select_db ("hng_fun") or die (mysql_error());

//insert into db_table
$qstr= "insert into chatbot(`question`, `answer`, `password`, `ID`)
values ('$question', '$answer', '$password', 'ID')";


//query db
$que= mysql_query($qstr) or die (mysql_error());


if ($_POST['submit']){ 
if($que)

	echo "Data properly stored, now ask your question";

else
{
	echo "Please train me by feeling the question and answer box on this page, thank you";
}

}
     ?>







<!DOCTYPE html>
<html lang="en">
<head>
	<title>CHUKA99</title>
	<link rel="stylesheet" type="text/css" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css">

	<style>
		body/* {
			background-image: url(https://res.cloudinary.com/brume/image/upload/v1523991947/IMG_20171231_182016_330.jpg);
		}*/
		.circle {
			width: 60%;
			margin-left: 20%;
			border-radius: 50%;
		}
		.frame {
			border: 1px solid grey;
			padding: 20px;
			background-color: #E0E0E0;
			margin-left: 15%;
			height: 400px;
		}
		.info {
			margin-top: 25px;
		}
		.slack_span {
			color: #131312;
		}
		.occupation_span {
			color:#131312;
			font-weight: bold;
		}
		.chat-frame {
			border: 1px solid grey;
			padding: 20px;
			background-color: #828282;
			margin-top: 5%;
			margin-bottom: 50px;
		}
		.chat-messages {
			background-color: #F1A7CF;
			font-size: 14px;
			height: 600px;
			overflow-y: auto;
			margin-left: 15px;
			margin-right: 15px;
			border-radius: 6px;
			padding: 5px;
		}
		.single-message {
			margin-bottom: 5px; 
			border-radius: 5px;
			min-height: 60px;
		}
		.single-message-bg {
			background-color:#E0E0E0;
			padding: 10px;
		}
		.single-message-bg2 {
			background-color: #E0E0E0;
			padding: 10px;
		}input[name=question] {
			height: 50px;
		}
		button[type=submit] {
			height: 50px;
		}
		.f-icon {
			font-size: 40px;
		}
		.center {
			text-align: center;
		}
	.bot {
	margin: auto;
	float: none;
	width: auto;
	background-color: #999;
}
    .question {
	background-color: #0F0;
	margin: auto;
	float: none;
	width: auto;
}
    </style>
</head>

<body id="globalBody">

<div class="oj-flex">
	<div class="oj-flex-item oj-md-1 oj-margin"></div>
    <div class="oj-flex-item oj-md-3 oj-margin frame">
    	<div class="oj-flex oj-flex-item oj-md-flex-direction-column">
		    <div class="circle">
		        <img src="https://res.cloudinary.com/drvtjwwxy/image/upload/v1524622580/hng/ch.jpg" alt="Profile Picture" class="circle" />
		    </div>
		</div>
		<div class="info oj-flex-item oj-md-flex-direction-column">
		    <h3 class="center"><?php echo $name; ?></h3>
		    <h5 class="center"><span class="slack_span">Slack Username: </span>@CHUKA99</h5>
		    <p class="center"><span class="occupation_span">What I do: </span>Web Designer and Developer</p>
		</div>
    </div>
    

   <div class="bot">
   
       <strong>train this bot by inputing questions and answers here:</strong>
    
 
    <form action="" method="post">
    <p>Question: <input type="" name="question" placeholder="question" value="<?php echo $recs['question'];?>" required ></p>
     <p>Answer: <input type="" name="answer" placeholder="answer" value="<?php echo $recs['answer'];?>" required></p>
     <p><input type="hidden" name="id" value="<?php echo $recs['ID']; ?>" /></p>
     <input type="submit" value="Submit" name="submit">
    
   
    
    </form>
    <br>

   
   </div>
   
   
   <?php 
mysql_connect("localhost", "root", "");
mysql_select_db("hng_fun");

$question = $_POST['question'];
$answer = $_POST['answer'];
$pass = $_POST['password'];
$id = $_POST['ID'];


$qstr = "select * from `hng_fun`.`chatbot` where `question` = '$question'";
$query = mysql_query($qstr);

//fetch from database
$recs = mysql_fetch_assoc($query);



?>




<?php
if ($_POST['output']){ 
if($recs)

	echo $recs['answer'];

else
{
	echo "Please train me by feeling the question and answer box on this page, thank you";
}

}
?>

<?php

?>

   
   <div class="question">
   <form action="chuka99.php" method="post">
   <p>Ask a question without question mark </p>
   <input type="" name="question" placeholder="" value="<?php echo $recs['question'];?>" required>
    <p><input type="hidden" name="id" value="<?php echo $recs['ID']; ?>" /></p>
    <input type="submit" name="output" value="output" onKeyPress="<?php echo $recs['question'];?>">
   
    
</form>

   
   </div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</body>
	
</html>

