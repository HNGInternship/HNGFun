<?php 

		if(!isset($conn)) {
        include '../../config.php';

        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    }
  try {
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
  } catch (PDOException $e) {
    die(var_dump($e));
  }

		$result2 = $conn->query("Select * from interns_data where username = 'Sarge'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
?>

<?php 
	//Mr Chatbot..... Here I come!
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(isset($_POST['question']) && $_POST['question'] != ''){
			$question = trim($_POST['question']);
			//Return the the version and name of your bot, no need to go to the database
			if ($question == 'aboutbot') {
				$reply = "Name : Sarge's Bot <br>Version: 1.0";
				echo $reply;
				exit;
			}
					    //Explode the word to know what it contains
		    $string = explode(':', $question);
			if((count($string) > 1) && ($string[0] == 'train')) {
				//take the part that has the question answer and password and explode again
		        $QA = explode('#', $string[1]);
		        $question = trim($QA[0]);
		        $answer = trim($QA[1]);
		        $password = trim($QA[2]);
		    
		        if(count($QA) != 3 || $question == '' || $answer == '') {
		          echo "The correct training format is <span style=\"color:pink;\">train: question # answer # password<span>"; 
		          exit();
		        }

		        if($password = 'password'){
		        	$sql = "SELECT * FROM chatbot WHERE question LIKE '{$question}%'";
			        $query = $conn->prepare($sql);
			        $query->execute();
			        $results = $query->fetchAll(PDO::FETCH_OBJ);

			      // retrain bot if retrieved
			      if($query->rowCount()) {
			        foreach ($results as $result) {
			          if($answer == trim($result->answer)) {
			            echo "I've been trained on this already";
			            exit();
			          }
			        }

			        $sql = "INSERT INTO chatbot(question, answer) VALUES('{$question}', '{$answer}')";
			        $query = $conn->prepare($sql);
			        $query->execute();

			        if($query->rowCount()) {
			          echo "Thanks for the alternative answer, I'm a whole lot wiser"; 
			          exit();
			        }
			        else{
			          echo "Sorry, something went wrong. You can give it another try";
			           exit();
			        }
			      }

		          // train bot if not retrieved
		          $sql = "INSERT INTO chatbot(question, answer) VALUES('{$question}', '{$answer}')";
		          $query = $conn->prepare($sql);
		          $query->execute();

		          if($query->rowCount()) {
		            echo "Thank you for the heads up!"; exit();
		          }
		        }else{
		        	echo "Wrong password!";
		        	exit();
		        }
			}
			//Get answer from database if the question already exist
			$sql = "SELECT * FROM chatbot WHERE question LIKE '$question%'";
			$query = $conn->prepare($sql);
		    $query->execute();
		    $results = $query->fetchAll(PDO::FETCH_OBJ);
		    $rowCount = $query->rowCount();
		    if ($rowCount == 1) {
		    	//Return the answer if its only one
		    	echo $results[0]->answer;
		    	exit();
		    }else if ($rowCount > 1) {
		    	//If there are multiples, select a random answer
		    	$random = rand(0, $rowCount-1);
		    	echo $results[$random]->answer;
		    	exit();
		    }else{
		    	echo "I dont know what you're talking about. Perhaps you can teach me. Use the format <span style=\"color:red\">train:question#answer#password</span> ";
		    	exit();
		    }


	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sarge | HNG Profile</title>
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <style>
  	#hero{
		background: linear-gradient(rgba(26,26,26,0.7),rgba(26,26,26,0.7)), url(http://res.cloudinary.com/de31wg5rr/image/upload/v1524655744/bg_djwtwt.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		height: 100vh;
		width: 100%;
		color: white;
		text-align: center;
		margin-top: 40px;
	}

	.cover-cap{
		width: 100%;
		margin-top: 10px;
		padding-top: 10px; 
		height: auto;
	}

	.profile-box{
	width: 100%;
	}

	.profile{
		border-radius: 10px;
		box-shadow: rgba(0, 0, 0, 0.3) 12px 15px 20px;
		height: auto;
		margin: auto;
	}
	.profile-meta-container{
		background-color: #007bff;
		height: auto;
		overflow: hidden;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
	}
	
	.profile-meta{
		padding-top: 15px;

	}

	.profile-meta img{
		max-width: 100%;
		height: 100px;
		border-radius: 50%;
	}
	
	.name{
		font-weight: bolder;
		text-transform: uppercase;
	}

	.title{
		line-height: 7px;
	}

	.profile-social{
		list-style-type: none;
	}

	.profile-social li{
		display: inline-block;
		padding: 0 auto;
	}
	.profile-social li img{
		height: 30px;
		width: 30px;
	}

	.about-me-title{
		height: 40px;
		box-shadow: rgba(0, 0, 0, 0.1) 12px 15px 20px;
		margin:-20px 9px;
		left: 27%;
		width: 140px;
		padding-top: 7px;
		border-radius: 20px;
		background-color: #fff;
		color: #007bff;
		font-weight: bold;
		position: relative;
	}

	.about-me-text{
		padding: 30px;
		background-color: #fff;
		color: #007bff;
		border-radius: 0 0 10px 10px; 
	}

.chatbox{
	height: 23.54em;
	width: 19em;
	border: 1px solid #fff;
	vertical-align: baseline;
	border-radius: 5px;
	background-color: #ddd;
}

.form-position{
/*	position: relative;
	top:75%;*/

}
.user-message{
	border-radius: 30px 0 30px 30px;
	background-color: #0059ac;
	color: white; 
	text-align: right;
	padding:10px;
	margin: 10px 5px 10px 30px;
}

.bot-message{
	border-radius: 0 30px 30px 30px;
	background-color: #007bff;
	color: white; 
	text-align: left;
	padding: 10px;
	margin: 10px 30px 10px 5px;
}

#message-flow{
	height:85%;
	width: auto;
	//border: 1px solid black;
	overflow-y: scroll;
}

.message-input{
	height: 14%;
	//border: 1px solid red;
	padding:8px 10px;
}

.btn-default{
	text-transform: capitalize;
	margin-left: 20px;
}



@media (min-width:320px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
	/* smartphones, iPhone, portrait 480x320 phones */
.profile{
		
	width: 17em;
	margin: auto;
	font-size: 1em;
	}

	.profile-social{
		margin-left: -40px;
	}

		.about-me-title{
			left: 21%;
		}
}

@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
	/* smartphones, iPhone, portrait 480x320 phones */
.profile{
		
		width: 21em;
		
	}
.about-me-title{
		left: 26%;
	}
}

@media (min-width:641px)  {  /*portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones*/  

}

@media (min-width:767px)  { /*minor break point */


}

@media (min-width:781px)  { /*minor break point */

}

@media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */ 

}
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */ 
	
}
@media (min-width:1281px) { /* hi-res laptops and desktops */ }

</style>

</head>
<body id="hero">
    <div class="cover-cap">
      <div class="container">
      	<div class="row">
        <div class="col-sm-12 col-md-7 col-lg-">
			<div class="profile-box">
				<div class="profile">
				  <div class="profile-meta-container">
					<div class="profile-meta">
						 
						<img src="<?php echo $user->image_filename; ?>" alt="" class="">
						<h5 class="name"><?php echo $user->name; ?></h5>
						<p class="title">Web Developer</p>
						<ul class="profile-social">
						  <li>
							<a href="https://github.com/SirG97">
							  <span class="fa-stack fa-lg">
		                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
		                      </span>
		                   </a>
		                  </li>
						  <li>
							<a href="https://web.facebook.com/omesu.chinedu.9">
							  <span class="fa-stack fa-lg">
		                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
		                      </span>
		                    </a>
		                   </li>
		                 <li>
		                 	<a href="https://twitter.com/OmesuC">
						      <span class="fa-stack fa-lg">
	                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
	                          </span>
	                       </a>
	                     </li>
						</ul>
					</div>
				  </div>
				  <div class="about-me-title">ABOUT ME</div>
				  <div class="about-me-text">	
				    <p>I am a tech enthusiast and a lover of code. I do freelance projects and I'm conversant with PHP and Javascript. .</p>
				  </div>
				  
				</div>
			</div>
			
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5">
        	<div class="chatbox">
        		<div id="message-flow">
        			<div class="bot-message">
        				Hello there! Am Sarge's bot. Feel free to ask me some questions, I might have some answers for you.
        			</div>
        		</div>
        		<div class="message-input">
	        		<form action="" class="form-inline form-position" id="sarge">
					  <div class="form-group">
	                    <input type="text" name="query" class="form-control " id="query" value="" placeholder="message" >
	                  </div>
	                  <input type="submit" value="Send" class="btn btn-primary  btn-rounded">
					</form>
        		</div>

			</div>
        </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
	//Script to process the input and submit for processing
	var messageflow = document.getElementById('message-flow');
	document.getElementById('sarge').addEventListener('submit', processForm);
	
	function processForm(event){
		var txt = document.getElementById('query').value;
		//Start the Ajax call
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				popUpUserMessage(txt);
				document.getElementById('query').value = '';
				setTimeout(popUpBotMessage(xhttp.responseText), 2000);
				messageflow.scrollTop = messageflow.scrollHeight;
			}
		}
		xhttp.open('POST', 'profiles/Sarge.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('question='+ txt);
        event.preventDefault();
	}
	function popUpUserMessage(msg){
		messageflow.innerHTML += '<div class="user-message">'+ msg +'</div>';

	}
	function popUpBotMessage(ans){
		messageflow.innerHTML += '<div class="bot-message">'+ ans +'</div>';
	}
</script>
</body>
</html>
