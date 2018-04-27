<?php

require 'db.php';

$sec = $conn->query("Select * from secret_word LIMIT 1");
$sec = $sec->fetch(PDO::FETCH_OBJ);
$secret_word = $sec->secret_word;



//querying the database
$query = $conn->query("Select * from interns_data where username = 'maaj'");
$row = $query->fetch();

// Secret Word and others 

$name = $row['name'];
$username= $row['username'];
$image_url = $row['image_filename'];

?>
<?php
// chatbot
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	$question = $_POST['text_in'];
	
	
	 // bot version
    if(stripos($question,'aboutbot') !== false){
      echo json_encode([
        'status' => 1,
        'answer' => "Hello, I am maaj's assistant. Version 1.0, currently running on PHP 5.7."
      ]);
      return;
    };
	
	//greeting
	if((stripos($question,'hey') !== false) || (stripos($question,'hi') !== false) || (stripos($question,'hello') !== false)){
      echo json_encode([
        'status' => 1,
        'answer' => "Hello, how are you?"
      ]);
      return;
    };
	
	// time
	if(stripos($question,'time') !== false){
		
		
		// Get IP address
		$ip_address = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');

		// Get JSON object
		$jsondata = file_get_contents("http://timezoneapi.io/api/ip/?" . $ip_address);

		// Decode
		$data = json_decode($jsondata, true);

		// Request OK?
		if($data['meta']['code'] == '200'){

		

		// Example: Get the users time
		$time = $data['data']['datetime']['date_time_txt'];
		
		}
		
		
		 
		echo json_encode([
        'status' => 1,
        'answer' => $time 
      ]);
      return;
		
	
	}
	
	
	}
	
	
	else{
	
	
	
}
?> 
<!DOCTYPE html>
<!--
 Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->

<!-- ************************ IMPORTANT INFORMATION ************************************
  This hybrid navigation bar template is provided as an example of how to configure
  a JET hybrid mobile application with a navigation bar as a single page application
  using ojRouter and oj-module.  It contains the Oracle JET framework and a default
  requireJS configuration file to show how JET can be setup in a common application.
  This project template can be used in conjunction with demo code from the JET
  website to test JET component behavior and interactions.

  Any CSS styling with the prefix "demo-" is for demonstration only and is not
  provided as part of the JET framework.

  Please see the demos under Cookbook/Patterns/App Shell: Hybrid Mobile and the CSS documentation
  under Support/API Docs/Non-Component Styling on the JET website for more information on how to use 
  the best practice patterns shown in this template.

  Aria Landmark role attributes are added to the different sections of the application
  for accessibility compliance. If you change the type of content for a specific
  section from what is defined, you should also change the role value for that
  section to represent the appropriate content type.
  ***************************** IMPORTANT INFORMATION ************************************ -->
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Maaj's Profile</title>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' *.oracle.com 'unsafe-inline' 'unsafe-eval' localhost:* 127.0.0.1:*; style-src 'self' *.oracle.com 'unsafe-inline'; img-src * data:"/>
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="icon" href="css/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
    <!-- This is the main css file for the default Alta theme -->
<!-- injector:theme -->
<link rel="stylesheet" href="css/alta/5.0.0/web/alta.css" id="css"/>
<!-- endinjector -->
    <!-- This contains icon fonts used by the starter template -->
    <!-- This is where you would add any app specific styling -->
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.0.0/3rdparty/require-css/css.min" type="text/css"/>
    
	<style>
        .oj-web-applayout-body{
            background-color: #153643;
            vertical-align: middle;
            color: #FFFFFF;
            align-content: left;
            margin: auto;
            
			width: 100%;
        }
		.oj-web-applayout-page{
			background-color: #153643;
            vertical-align: middle;
            color: #FFFFFF;
            align-content: left;
            margin: auto;
            
			width: 100%;
		}
        .oj-profile{
            background-image: url('https://res.cloudinary.com/maaj/image/upload/v1523621615/profile.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 400px;
			height: 400px;
            border-radius: 50%;
			text-align: center;
        }
        .oj-title{
            color: #ffffff;
            text-align: left;
			margin-left: 40px; 
			
            
        }
		.oj-links{
			text-align: left;
			margin-left: 80px;
			
		}
        .oj-head{
            color: #ffffff;
            text-align: center;
            font-size: 60px;
            text-transform: capitalize;
            font-weight: bold;
        }
		
		body{
			margin:0;
			
		}
		#header{
			width: 350px;
			height: 60px;
			margin: 0px auto;
			background-color:#00AFEF;
			border: 1px solid #00AFEF;
			color:#ffffff;
		}
		#header h1{
			margin: 0 0 0 30%;
			color:#ffffff;
		}
		#contain{
			width:350px; 
			height: 400px;
			margin-top:10px;
			margin:0px auto;
			
			background-color:white;
			border:1px solid #00AFEF;
			overflow:scroll;
		}
		#controls{
			width:350px;
			margin:0px auto;
			
		}
		#textbox{
			margin:0 0 0 0;
			width:82%;
			
		}
		#send{
		background-color: #00AFEF;
		width="100%";
		color: #ffffff;
		font-weight: bold;
		height="5%";
		font-size: 16px;}
		
		.username{
			margin:5px;
			padding:10px;
			background-color: #f1f1f1;
			border-radius:5px;
			height: auto;
			float: right;
			width: 70%;
			color:blue;
			font-weight: bold;
			}
			
		.bot{
			margin: 5px;
			padding:10px;
			background-color: #ddd;
			border-radius:5px;
			height: auto;
			float: left;
			color:green;
			font-weight: bold;
			width: 70%;
			}	
		
     </style>

  </head>
 

  <body class="oj-web-applayout-body">
	<div class="oj-web-applayout-page">
	<div>
		<h1 class="oj-head">Hello....</h1>
	</div>
      
	  <div class="oj-flex">
		
		<div class="oj-flex-item">
          
		  <div class="oj-profile"></div>
		  <div class="oj-title">
                  <h2 class="oj-title"><?php echo $name;?></h2>
                  <h2 class="oj-title">Slack username: <?php echo $username;?></h2>
                  
              </div>

          </div>
		  <div class="oj-flex-item">
			<div id ="header">

				<h1>Maaj's bot</h1>
			</div>
				<div id="contain">
				
				</div>
				<div id ="controls">
					<form method="POST" action="" id= "chat">
					<input type="text" id="textbox"></input>
					<input id="send" type="submit" value="Send"></input>
					</form>

				</div>
	
          </div>
		  </div>
                            <div class="oj-links"><a href="https://instagram.com/wale_j"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="https://github.com/dmaaj"><i class="fa fa-github"></i></a>
          
		</div>  
    
      </div>
	  
     
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
 <script>
    var message = $("#contain");
		
	    $("#chat").on("submit", function(e) {
	        e.preventDefault();
			if($("#textbox").val() !== ''){
	        var text_in = $("#textbox").val();
			var username = "You:  ";
	        message.append("<div class='username'>"+ username + text_in+"</div>");
	       	message.scrollTop(message[0].scrollHeight);
			//send question to server
			$.ajax({
				url: '/profiles/maaj.php', //location
				type: 'POST',
				data: {text_in: text_in},
				dataType: 'json',
				success: (response) => {
					
			        response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />'); 
			        let response_answer = response.answer;
			        message.append("<div class='bot'><div class='message'><img src='https://res.cloudinary.com/maaj/image/upload/v1524822457/bot.png' width='30px'/>" +response_answer+ "</div></div>");      
			       	$('#contain').animate({scrollTop: $('#contain').get(0).scrollHeight}, 1100);     
				},
				error: (error) => {
	          		alert('error occured')
						console.log(error);
				}
				
			});
			$("#textbox").val("");
			}
		});

</script>
  </body>

</html>

