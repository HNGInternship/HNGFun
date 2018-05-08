
<?php   
include '../config.php';
global $conn;

$result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'Tobey'");
  $user = $result2->fetch(PDO::FETCH_OBJ);

  try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
          if (!defined('DB_USER')){
              require '../config.php';
          }
          try {
              $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
            } catch (PDOException $pe) {
              die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
            }
     $mesuu = $_POST['message'];
     $message=strtolower($mesuu);
     trim($message);
     $statusTrain = stripos($message, "train:");
     if($statusTrain)
     {
       $newstring=str_replace("train:","","$message");
        $sets = explode("#", $newstring);
             $mQuestion= $sets[0];
             $mAns= $sets[1];
             $mPwd= $sets[2];
             if($mPwd=='passcode'){
             $resultIns = $conn->query("insert into chatbot (`question`, `answer`) values ('$mQuestion','$mAns')" );
             if($resultIns)
             {
               echo json_encode([
                'status' => 1,
                       'answer' => "thanks for enlarging my knowledge base"
                       ]);
return;
}
else {
echo json_encode([
  'status' => 1,
  'answer' => "sorry something went wrong"
]);
return;
 // code...
}
             }
             else {
               echo json_encode([
                  'status' => 1,
                  'answer' => "sorry wrong password"
                ]);
               // code...
             }
return;
     }
     
     if ($message==""){
 echo json_encode([
    'status' => 1,
    'answer' => "enter a question  you can also train me "
  ]);
return;
}
if ($message==""){
echo json_encode([
'status' => 1,
'answer' => "enter a question or you can train me "
]);
return;
}
     if($message=='aboutbot'){
       echo json_encode([
          'status' => 1,
          'answer' => "TundeChat v1.0"
        ]);
return;
     }
    if ($message!=''){
$result2 = $conn->query("select * from chatbot where question = '$message' order by rand()");
$user = $result2->fetch(PDO::FETCH_OBJ);
if($user){
$rows=$user->answer;
echo json_encode([
  'status' => 1,
  'answer' => $rows
]);
return;
}
else
{
 echo json_encode([
    'status' => 1,
    'answer' =>"sorry i have no answer to that yet .......but you can train me to annswer questions "
  ]);
return;
}
if ($message==""){
 echo json_encode([
    'status' => 1,
    'answer' => "enter a question  or train me"
  ]);
return;
}
}
   return;
}
 ?>


<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<title>Ezike Tobenna</title>

<style>
	
body {
    font:normal 12px/1.6em Arial, Helvetica, sans-serif;
	color:#2a3845;
	background:#ffffff;
	margin: 0;
}

p{
    margin: 0;
}

#wrapper {
    width: 632px;
    margin: 0 auto;
    border-left:1px solid #f0e9eb;
    border-right:1px solid #f0e9eb;
	
}

#nav {
	background:#06a;
	text-align:right;
	color:#f6dde3;
	padding-top: 10px;
    padding-bottom: 10px;
    padding-left:20px;
    padding-right:20px;
}

#header {
    margin-left: 1px;
    margin-right: 1px;
	
}

#bg {
	height:36px;
    background:url('http://img840.imageshack.us/img840/9886/87926428.gif') repeat-x;
}

#main-content {
    margin: 0 auto;
	
}

#main-image {
	text-align: center;
}

#left-column {
    width: 300px;
    float: left;
    padding-bottom: 30px;
    padding-left:30px;
    padding-right:30px;
	
}

#right-column {
   width: 270px;
   float: right;
	
}

.sidebar {
    background: #f7f7f7 no-repeat top;
    width: 218px;
    margin: 0 auto;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left:25px;
    padding-right:25px;
	
}

#footer {
	clear: both;
	background:#f7f7f7;
	padding-top: 10px;
    padding-bottom: 10px;
    padding-left:15px;
    padding-right:15px;
    border-top: 1px solid #f0e9eb;
}

/* Global Styling */

a:visited, a:link {
	color:#a43b55;
	text-decoration:underline;
	background:none;
}

a:hover {
	color:#a43b55;
	text-decoration:none;
	background:none;
}

h1 {
	color:#7a2e40;
	margin:0 0 10px;
	padding-bottom:10px;
	font:normal 17px Georgia, serif;
	border-bottom:1px solid #efece7;
}

h2 {
	color:#7a2e40;
	margin:20px 0 10px;
	padding-bottom:10px;
	font:normal 17px Georgia, serif;
	border-bottom:1px solid #efece7;
}

h3 {
	color:#7a2e40;
	margin:10px 0;
	padding-bottom:10px;
	font:bold 14px Arial, Helvetica, sans-serif;
	border-bottom:1px solid #efece7;
}

ul {
	padding:0;
	margin:0 0 0 17px;
    list-style:square url('http://img525.imageshack.us/img525/1890/bulletr.gif');
}

.box {
	background:#f7f7f7;
	border:1px solid #f0e9eb;
	padding:15px;
}

#nav a {
	margin: 0 10px;
}

#nav a:visited, #nav a:link {
	text-decoration:none;
	color:#f6dde3;
}

#nav a:hover {
	text-decoration:underline;
	color:#f6dde3;
}

#logo {
	margin-bottom:50px;
	font:normal 18px Georgia, serif;
	color:#300820;
}

.bot{
    height:300px;
    width:305px;
    background:white;
    position: fixed;
    right:0;
    bottom:38%;
    border: 1px solid #8e44ad;
    margin-right:10%;   
}


.top-bar {
  background:#e0e7e8;
  height:38px;
  color: #34495e;
  padding: 10px;
  position: relative;
  overflow: hidden;
  border-radius:4%;
  font-size: 28px;
   
}

.input{
    height:50px;
    width:100%;
}


.panel-body{
    height:350px;
    position:relative;
    overflow-y:auto;
    background:#34495e;
    padding: 10px;
}


.human-message{
    background:#e0e7e8; 
    margin: 10px 10px;
    margin-left:65px;
    font-size: 16px;
    color: #34495e;
    padding:15px;
    border-radius:4%;
}

.human-message:before{
    width: 0;
    height: 0;
    content:"";
    top:0px;
    margin-left:60px;
    margin-right:50px;
    left:-4px;
    position:absolute;
    font-size:15px;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;  
}

.bot-message{
    background:#e0e7e8;
    color: blue;
    margin: 10px 10px;
    font-size: 16px;
    margin-right:60px;
    margin-left:10px;
    border-radius:4%;
    padding:4px;
}

.bot-message:after{
    width: 0;
    height: 0;
    content:"";
    position:absolute;
    top:-5px;
    right:0;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: transparent transparent transparent #e0e7e8;  
}


</style>
</head>
<body>
<div id="wrapper">
    
    <div id="header">
		<div id="nav"><a href="index.html">Home</a> | <a href="#">About Me</a> | <a href="#">Contact Me</a> | <a href="#">My Photos</a> | <a href="#">My Videos</a></div>
		<div id="bg"></div>
	</div>
	
	<div id="main-content">
		<div id="left-column">
			<div id="logo">
			 Ezike Tobenna
			</div>
			<div class="box">
        		<h1>What You'll Find Here</h1>
        		<p>This is my space. Here are some of my interests: </p>
				<ul style="margin-top:10px;">
					<li>Android Development"</li>
					<li>UX Enthusiast</li>
					<li>Web Developer</li>
					<li>Creative Writer</li>
					<li>Tech Blogger</li>
				</ul>
			</div>
			<h2>A Few of My Famous Quotes</h2>
			<p>
				<img src="http://res.cloudinary.com/dk1btjvhc/image/upload/v1523630359/C360_2015-04-03-08-40-28-091.png
" width="139" height="150" style="margin: 0 10px 10px 0;float:left;" />
				<em>“Service to others is the rent you pay for your room here on Earth.”</em> - Muhammad Ali<br/>
				<em>"What is the essence of life? To serve others and to do good."</em> - Aristotle<br/>
				<em>“We make a living by what we get, but we make a life by what we give.” </em> - Winston Churchill<br/>
				<em>“Only a life lived for others is worth living."</em> - Albert Einstein<br/>
			</p>
		</div>
		<div id="right-column">
			<div id="main-image"><img src="http://res.cloudinary.com/dk1btjvhc/image/upload/v1523630359/C360_2015-04-03-08-40-28-091.png
" width="160" height="188" /></div>
			<div class="sidebar">
				<h3>Blurb About Me</h3>
				<p>My name is Ezike Tobenna.</p>
				<h3>Find on Social Media</h3>
				<div class="box">
					<ul>
						<li><a href="http://facebook.com/tobey.ezike" target="_blank">Facebook</a></li>
						<li><a href="http://twitter.com/ezike" target="_blank">Twitter</a></li>
						<li><a href="https://www.linkedin.com/in/tobenna-ezike-896439a8/" target="_blank">LinkedIn</a></li>
					</ul>
				
			</div>
		</div>
	</div>
	<div id="footer">
		Copyright &copy; 2018 Ezike Tobenna. All rights reserved.<br/>
	</div>
</div>

        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">TundeChat</div>
            <div class="panel-body">
                <div class ="bot-message row">Hi, my name is Tunde. Type <br> <span style="color: red">help</span> to see what I can do.</div>
                <div class="bot-message row">To train me use this format <br> <span style="color: red">train: question #answer #password</span></div>
                <div class ="bot-message row">Ask me anything</div>
            </div>
            <div class="input" id="async">
            <form action="" class="form-inline" method="POST" id="form">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control question-input message" name = "message" id="input" placeholder="type your message">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <input class="btn-primary" id="send" type="submit"></div>
                        </div>
                    </div>
            </form>

            </div>
        </div>
   
<script>

    $(document).ready(function(){
        $('#form').on('submit', function(e){
            e.preventDefault();
			var input = $("#input").val();
            var resusr = '</center><div class = "panel-body"><p> ';
            $("#async").append(resusr+" "+input+" </p></div>);
            $.ajax({
                type:'POST',
                url:'profiles/Tobey.php',
                dataType:'json',
                data:{'message':input},
                success:function(response){
                    console.log(response);
            var resbot='<div class="panel-body" ><p> ';
             $("#async").append(resbot+" "+response.answer+" </p></div>");
              $("#input").val('');
        },
        error: function(error){
          console.log(error);
        }
             });
        })
    });

</script>
</div>

</body>
</html>