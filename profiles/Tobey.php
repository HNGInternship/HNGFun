<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra SC|Romanesco|Source+Sans+Pro:400,700' rel='stylesheet'>
    <link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <style type="text/css">

        
        .body0 {
            height: 100%;
        }

        span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }

        .main {
            position: relative;
            /*top:20px;*/
            width: 100%;
            /*padding-top: 300px;*/
            max-height: 230px;
            font-family: "Romanesco";
            line-height: 150px;
            font-size: 96px;
            text-align: center;
        }
        .text {
            background: -webkit-linear-gradient(0deg, #FF0F00, rgba(17, 26, 240, 0.55), #EC0F13);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .under {
            position: relative;
            /*top:450px;*/
            max-height: 100px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under1 {
            position: relative;
            /*top:500px;*/
            height: 40px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under2 {
            position: relative;
            /*top:540px;*/
            height: 49.71px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
      
        .body1 {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 75%;
            display: flex;
            flex-direction: column;
            max-width: 600px;
            margin: 0 auto;
        }
        .chat-output {
            flex: 1;
            padding: 10px;
            display: flex;
            background: #e0e7e8;
            font-size:14px;
            color: ;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 500px;
        }
        .chat-output > div {
            margin: 0 0 20px 0;
        }
        .chat-output .user-message .message {
            background: #34495e;
            color: white;
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: #eee;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            margin:3px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 14px;
            background: #eee;
            font-size:14px;       
            border: 1px solid #ccc;
            border-bottom: 0;
        }
        .chat-input .user-input {
            width: 98%;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 9px;
            margin-right:10px;
        }

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
.panel-body{
    height:350px;
    position:relative;
    overflow-y:auto;
    background:#34495e;
    padding: 10px;
}
.bot{
    height:300px;
    width:305px;
    background:white;
    position: fixed;
    right:0;
    bottom:30%;
    border: 1px solid #8e44ad;
    margin-right:10%;   
}


.top-bar {
  background:#e0e7e8;
  height:32px;
  color: #34495e;
  padding: 10px;
  position: relative;
  overflow: hidden;
  border-radius:4%;
  font-size: 28px;
   
}

</style>
</head>
<body>
<div class="container">
   
            <div class="body0">
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

        </div>
        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">TundeChat</div>
        <div class="panel-body">
        <div class="oj-sm-12 oj-flex-item">
            <div class="body1">
                <div class="chat-output" id="chat-output">
                    <div class="user-message">
                        <div class="message">Hey there! it's TundeBot at your service. </div>
                        <div class="message">To teach me new stuff, use this format - <span style="color: yellow">'train: question # answer # password'.</span> </div>
                    
                    <div class="message">To learn more about me, simply type - <span style="color: orange">'aboutbot'.</span></div>
                  
                    </div>
                   
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Say something here">
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <?php

    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user-input'];
      //  $data = preg_replace('/\s+/', '', $data);
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/', '', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    }

    function aboutbot() {
        echo "<div id='result'> TundeBot v1.0</div>";
    }
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();

            if(empty($data)) {
                $training_data = array(':question' => $question,
                    ':answer' => $answer);

                $sql = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';

                try {
                    $q = $GLOBALS['conn']->prepare($sql);
                    if ($q->execute($training_data) == true) {
                        echo "<div id='result'>Training Successful!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>Invalid Password, Try Again!</div>";

        }
    }

    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry, I do not know that command. You can train me simply by using the format - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>

</body>


<script>
    var outputArea = $("#chat-output");

    $("#user-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#user-input").val();

        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);


        $.ajax({
            url: 'profile.php?id=Tobey',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });


        $("#user-input").val("");

    });
</script>

 <?php

global $conn;

try {
    $sql2 = 'SELECT * FROM interns_data WHERE username="melody"';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q2->fetch();
} catch (PDOException $e) {
    throw $e;
}
?>

