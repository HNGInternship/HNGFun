<?php
// If you can't find const DB_USER, this occurs when I'm testing locally or through hng.fun/profiles/temitope.php
		if(!defined('DB_USER')){
			require "../../config.php";
			//Renamed myconfig so as not to confuse with config.php in the main folder, remember to change this to config.php
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			    
			} catch (PDOException $e) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
			}
		}
// Let's set up d profile first
if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$query = $conn->query("Select * from secret_word LIMIT 1");
	$query = $query->fetch(PDO::FETCH_OBJ);
	$secret_word = $query->secret_word;

	$query_me = $conn->query("Select * from interns_data where username = 'temitope'");
	$user = $query_me->fetch(PDO::FETCH_OBJ);

}

// if we're sending a post message, i.e from the bot.
if($_SERVER['REQUEST_METHOD'] === "POST"){
	

		// let's start with some functions to simplify our work
		function stripquestion($question){
			// remove whitespace first
			$strippedquestion = trim(preg_replace("([\s+])", " ", $question));
			// now let's remove any other character asides :, (, ), ', and whitespace
			$strippedquestion = trim(preg_replace("/[^a-zA-Z0-9\s\'\-\:\(\)#]/", "", $strippedquestion));
			$strippedquestion = $strippedquestion;

			return strtolower($strippedquestion);
		}

		function is_training($data){
			$keyword = stripquestion($data);
			if ($keyword=='train') {
				return true;
			}else{
				return false;
			}
		}
		function authorize_training($password){
			if ($password=='password') {
				return true;
			}else{
				return false;
			}
		}
		function training_data($body){
			$array_data = explode('#', $body);
			// clean everything up
			foreach ($array_data as $key => $value) {
				$value = stripquestion($value);
			}
			return array('question' => $array_data[0], 'answer' => $array_data[1], 'password'=> $array_data[2]);
		}

		function train($question, $answer){
			global $conn;
			try {
				$insert_stmt = $conn->prepare("INSERT into chatbot (question, answer) values (:question, :answer)");
				$insert_stmt->bindParam(':question', $question);
				$insert_stmt->bindParam(':answer', $answer);
				$insert_stmt->execute();
				return "Thanks! The new information is mcuh appreciated.";
			} catch (PDOException $e) {
				return "An error occured: ". $e->getMessage();
			}

		}

		// set to debug mode
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// Let's prepare a statement to just randomly fetch any answer and show it to us
		
		

		// This is how we select a random value, needed for later
		// $random_answer = $conn->prepare("SELECT answer FROM chatbot ORDER BY RAND() LIMIT 1");

		// Time for action
		
		if (isset($_POST['message']) && $_POST['message']!=null) {

			$question = $_POST['message'];
			// remove question marks and strip extra spaces
			$strippedquestion = stripquestion($question);

			// Let's first check if we're in training mode
			$array_data = explode(':', $strippedquestion);

			if (is_training($array_data[0])) { 
				
				// get training data
				extract(training_data(stripquestion($array_data[1])), EXTR_PREFIX_ALL, "train");
				

				if(authorize_training(stripquestion($train_password))){
				// store question in database
				$answer = train($train_question, $train_answer);}else{$answer=" incorrect password, authorization failed";}
				echo json_encode([
					'status' => 1,
					'answer' => $answer
				]);
				return;
				
			}
			else{
				// then we're askin a question
			
			$strippedquestion = "%$strippedquestion%";
			$answer_stmt = $conn->prepare("SELECT answer FROM chatbot where question LIKE :question ORDER BY RAND() LIMIT 1");
			$answer_stmt->bindParam(':question', $strippedquestion);
			$answer_stmt->execute();


			$results = $answer_stmt->fetch();

			if(($results)!=null){

				$answer = $results['answer'];
				echo json_encode([
					'status' => 1,
					'answer' => $answer
				]);
				return;
				
			}
			else{
				$answer = "Sorry, I cannot answer that question at the moment, you can also train me by entering the following command: <br>
				<code class='text-white'>train: your question # the correct answer # password</code>
				";
				echo json_encode([
					'status' => 0,
					'answer' => $answer
				]);
				return;
				
			}
			}



		}

		// $stmt = $conn->prepare("SELECT * from chatbot WHERE question LIKE '%hello there%' LIMIT 1");

		// $stmt->execute();
		// $stmt->execute();

		// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		// Just in case there are multiple answers, select a random one

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MY CHAT BOT</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <link rel="icon" href="css/images/favicon.ico" type="image/x-icon" />

    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    

    <style>

      body{
        font-family: 'roboto';
        background-image: url('https://res.cloudinary.com/dzbxciyvo/image/upload/v1524148027/imageedit_1_9203304264.gif');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
      }

      .profile{
        width: 95%;
        margin-left: auto;
        margin-right: auto;
        max-width: 600px;
        height: 400px;
      }

      .span-width{
        width: 80%;
      }

     
      .bot-panel{
      height: 80vh;
      min-height: 400px;
      width: 90%;
      padding: 0;
      border: none;
      max-width: 400px;
    }

    @media(min-width: 750px){
      .bot-panel{
        position: fixed;
        right: 0;
        bottom: 0;
      }
    }

    .bot-panel .card-header{
      background-color: rgba(173, 88, 31, 0.85);
      color: #fff;
      height: 20%;
    }

    .bot-panel .card-body{  
      overflow-y: scroll;
      height: 65%;
      padding: 10px;
      
    }

    .gracie-icon{
      max-width: 60px;
      border: 1px solid #fff;
      border-radius: 50%;
    }

    .msj:before{
        width: 0;
        height: 0;
        content:"";
        top:-5px;
        left:-14px;
        position:relative;
        border-style: solid;
        border-width: 0 13px 13px 0;
        border-color: transparent #f1a97a transparent transparent;            
    }
    .msj-rta:after{
        width: 0;
        height: 0;
        content:"";
        top:-5px;
        left:14px;
        position:relative;
        border-style: solid;
        border-width: 13px 13px 0 0;
        border-color: whitesmoke transparent transparent transparent;           
    }  

    .text{
        width:75%;display:flex;flex-direction:column;
    }

    .text-r{
        float:right;padding-left:10px;
    }

    .avatar{
        display:flex;
        justify-content:center;
        align-items:center;
        width:25%;
        float:left;
        padding-right:10px;
    }
    .macro{
        margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
    }
    .msj-rta{
        float:right;background:whitesmoke;
    }
    .msj{
        float:left;background:#f1a97a;
    }
    </style>
</head>
<body class="oj-web-applayout-body">
    <div id="globalBody" class="oj-web-applayout-page">
      

      <div role="main" class="oj-web-applayout-max-width oj-web-applayout-content">
        

        <div class="demo-flex-display">
            <div class="oj-sm-odd-cols-12 oj-md-odd-cols-6 oj-flex-items-pad">
              <div class="oj-flex">
                  <div class="oj-flex-item" style="height: 100%;">
                    <div class="profile oj-panel oj-panel-shadow-sm oj-sm-margin-2x demo-panel-customizations">
                      <div class="profile-img" style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; margin-left: auto; margin-right: auto;">
                        <img style="width: 200px;" src="https://res.cloudinary.com/dzbxciyvo/image/upload/v1523701236/IMG_20180317_103431.jpg">
                        
                      </div>
                      <div class="oj-flex oj-sm-flex-items-initial oj-sm-justify-content-center">
                        <div class="oj-flex-item" style="text-align: center;">
                          <h1><?php echo ucwords(strtolower($user->name)) ?></h1>
                           <span> @<?php echo strtolower($user->username) ?> </span> <oj-button class='oj-button-primary'> <span slot="startIcon" class="fab fa-slack" width="16" height="16"></span> Slack </oj-button>

                          <oj-button class='oj-button-primary span-width'>
                            <span slot="startIcon" class="fa fa-sticky-note" width="16" height="16"></span>
                            HNG 4.0 INTERN
                          </oj-button>
                        </div>
                      </div>
                      

                    </div>
                      
                  </div>

                  <div class="oj-flex-item" style="height: 100%;">
                    <div class="bot-panel ml-auto mr-auto oj-panel oj-panel-shadow-sm oj-sm-margin-2x demo-panel-customizations">
                      <div class="card-header">
                        <img src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon"> <h4 class="ml-3 d-inline" style="font-size: 1.2rem; font-weight: 500;">Gracie</h4>
                      </div>
                      <div class="card-body" id="chatWindow">
            
                  <!-- Gracie's message -->
                              <div class="msj macro">
                              <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon"></div>
                                  <div class="text text-l">
                                      <p>Hi! My name is Gracie. How may I be of service today?</p>
                                      
                                  </div>
                              </div>
                          <!-- Gracie's message -->
                              <div class="msj macro">
                              <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div>
                                  <div class="text text-l">
                                      <p>You can ask me any questions, let's see if I can answer them. You could also train me by entering the following format: <br>
                                        <code class="text-white">train: your question # the correct answer # password</code>
                                      </p>
                                      
                                  </div>
                              </div>
                              <?php if (isset($question)) {
                                ?>
                              
                          <!-- User's message -->
                        
                              <div class="msj-rta macro">
                                  <div class="text text-r">
                                      <p><?php echo $question; ?></p>
                                      
                                  </div>
                              <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div>

                            </div>

                            <?php } ?>

                        <?php if (isset($answer)) { ?>
                    <!-- Gracie's message -->
                              <div class="msj macro">
                              <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon"></div>
                                  <div class="text text-l">
                                      <p><?php echo $answer; ?></p>                                
                                  </div>
                              </div>
                          <?php } ?>

                      </div>

                      <div class="card-footer">
                        <form class="form-inline" method="post" id="messageForm">
                          <div class="form-group mb-2 col-10 mr-auto">
                            <label for="message" class="sr-only">Message</label>
                            <input type="text" class="col-12 form-control" id="message" name="message" placeholder="Type Here">
                          </div>
                          <button type="submit" class="col-2 mx-auto btn btn-primary mb-2"><i class="fa fa-paper-plane"></i></button>

                        </form>
                        
                      </div>
                      

                    </div>
                      
                  </div>
              </div>       
              
            </div>
          </div>  
      </div>
      
    </div>
    
    <!-- RequireJS bootstrap file -->
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty//require/require.js"></script>
    <script type="text/javascript" src="https://hng.fun/profiles/temitope/js/main.js"></script>


<script>
  $(document).ready(function() {
    // let's scroll to the last message
    $('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);

      $('#messageForm').submit(function(e){
        e.preventDefault();
        sendMessage(e); 
      });

      
      
      
    });

  function sendMessage(e) {
    var message = $('#message').val();
    if (message.length>0) {
      // I'm adding this because of delay in network, so the messages don't overlap
      var rand = Math.floor(Math.random()*100);
      var classname = 'sending-'+rand;
      var selector = '.'+classname;
      $('#message').val('');
      $('#chatWindow').append('<div class="msj-rta macro "><div class="text text-r"><p class="'+classname+'">Sending...</p></div>'+
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div></div>');
      $('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);
      
      $.ajax({
        url: "/profiles/temitope.php",
        type: "post",
        data: {message: message},
        dataType: "json",
        success: function(response){
        var answer = response.answer;
        $(selector).html(''+message+'');
      $(selector).removeClass(classname).addClass('sent');
      $('#chatWindow').append(' <div class="msj macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div><div class="text text-l"><p>'+answer+'</p></div></div>');
      
      },
      error: function(error){
          console.log(error);
        }
      // .catch(function (error) {
      //   $('#chatWindow').append(' <div class="msj macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div><div class="text text-l"><p>sorry, an error occured</p></div></div>');
      // });
      
      // e.preventDefault();
    });
  }
}
</script>
  </body>


</html>

