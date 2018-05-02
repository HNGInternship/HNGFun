<?php

if(!defined('DB_USER')){
  require "../../config.php";		
	try {
	    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
	}catch (PDOException $pe) {
	   die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}
}

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
if($_SERVER['REQUEST_METHOD'] === 'POST'){

		include '../answers.php';
	    
	    try{

		    if(!isset($_POST['text_in'])){
		      echo json_encode([
		        'status' => 1,
		        'answer' => "Please provide a question"
		      ]);
		      return;
		    }

		    //if(!isset($_POST['question'])){
		    $mem = $_POST['text_in'];
		    $mem = preg_replace('([\s]+)', ' ', trim($mem));
		    $mem = preg_replace("([?.])", "", $mem);
			$arr = explode(" ", $mem);
			//test for training mode

			if($arr[0] == "train:"){

				unset($arr[0]);
				$q = implode(" ",$arr);
				$queries = explode("#", $q);
				if (count($queries) < 3) {
					# code...
					echo json_encode([
						'status' => 0,
						'answer' => "You need to enter a password to train me."
					]);
					return;
				}
				$password = trim($queries[2]);
				//to verify training password
				define('trainingpassword', 'password');
				
				if ($password !== trainingpassword) {
					# code...
					echo json_encode([
						'status'=> 0,
						'answer' => "You entered a wrong passsword"
					]);
					return;
				}
				$quest = $queries[0];
				$ans = $queries[1];

				$sql = "insert into chatbot (question, answer) values (:question, :answer)";

				$stmt = $conn->prepare($sql);
		        $stmt->bindParam(':question', $quest);
		        $stmt->bindParam(':answer', $ans);
		        $stmt->execute();
		        $stmt->setFetchMode(PDO::FETCH_ASSOC);

				
				echo json_encode([
					'status' => 1,
					'answer' => "Thanks for training me, you can now test my knowledge"
				]);
				return;
			}
			elseif ($arr[0] == "help") {
				echo json_encode([
					'status' => 1,
					'answer' => "You can train me by using this format ' train: This is a question # This is the answer # password '. You can also convert cryptocurrencies using this syntax.'convert btc to usd"
					
				]);
				return;
				
			}
			elseif ($arr[0] == "convert") {
				# code...
				$from = $arr[1];
				$to = $arr[3];
				$converted_price = GetCryptoPrice($from, $to);
				$price = "1 " . $from . " = " . $to . " " . $converted_price ;
				echo json_encode([
					'status' => 1,
					'answer' => $price
				]);
				return;
			}
		    elseif ($arr[0] == "aboutbot") {
		    	# code...
		    	echo json_encode([
		    		'status'=> 1,
		    		'answer' => "I am MATRIX, Version 1.0.0. "
		    	]);
		    	return;
		    }
		    else {
		    	$question = implode(" ",$arr);
		    	//to check if answer already exists in the database...
		    	$question = "$question";
		    	$sql = "Select * from chatbot where question like :question";
		        $stat = $conn->prepare($sql);
		        $stat->bindParam(':question', $question);
		        $stat->execute();

		        $stat->setFetchMode(PDO::FETCH_ASSOC);
		        $rows = $stat->fetchAll();
		        if(empty($rows)){
		        	echo json_encode([
			    		'status' => 0,
			    		'answer' => "I am sorry, I cannot answer your question now. You could train me to answer the question."
			    	]);
			    	return;
			    }else{
			    	$rand = array_rand($rows);
			    	$answer = $rows[$rand]['answer'];

			    	$index_of_parentheses = stripos($answer, "((");
			        if($index_of_parentheses === false){// if answer is not to call a function
			        	echo json_encode([
				        	'status' => 1,
				        	'answer' => $answer
				        ]);
				        return;
			        }else{//to get the name of the function, before calling
			            $index_of_parentheses_closing = stripos($answer, "))");
			            if($index_of_parentheses_closing !== false){
			                $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
			                $function_name = trim($function_name);
			                if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
			                   echo json_encode([
			                    'status' => 0,
			                    'answer' => "The function name should not contain white spaces"
			                  ]);
			                  return;
			                }
				            if(!function_exists($function_name)){
				              echo json_encode([
				                'status' => 0,
				                'answer' => "I am sorry but I could not find that function"
				              ]);
				            }else{
				              echo json_encode([
				                'status' => 1,
				                'answer' => str_replace("(($function_name))", $function_name(), $answer)
				              ]);
				            }
				            return;
			            }
			        }
			    }       
		    }
		}catch (Exception $e){
			return $e->message ;
		}
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
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
					<form method="POST" action="" id="chat">
					<input type="text" id="textbox" name="text_in"></input>
					<input id="send" type="submit" value="Send"></input>
					new head1
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
 $(document).ready(function(){
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
					
			        //response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />'); 
			        //let response_answer = response.answer;
			        message.append("<div class='bot'><div class='message'><img src='https://res.cloudinary.com/maaj/image/upload/v1524822457/bot.png' width='30px'/>" + response.answer + "</div></div>");      
			       	$('#contain').animate({scrollTop: $('#contain').get(0).scrollHeight}, 1100);     
				},
				error: (error) => {
	          		alert(JSON.stringify(error));
						console.log(error);
						
				}
				
			});
			$("#textbox").val("");
			}
		});
		
	});

</script>
  </body>

</html>

