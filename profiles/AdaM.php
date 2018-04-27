<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
		if(!defined('DB_USER')){
			require "../../config.php";
			//require "config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "SELECT secret_word FROM secret_word LIMIT 1";
		$sth = $conn->prepare($query);
		$sth->execute();
		$secretWord = null;
		$queryResult = $sth->setFetchMode(PDO::FETCH_ASSOC);
		$queryResultRows = $sth->fetchAll();
		$queryResultRowsCount = count($queryResultRows);

		if($queryResultRowsCount > 0){
			$queryResultRow = $queryResultRows[0];
			$secret_word = $queryResultRow['secret_word'];	
			
		}


		$name = null;
		$image_filename = null;
		$username = "AdaM";
		
		$query1 = "SELECT * FROM interns_data WHERE username = :username";
		$sth1 = $conn->prepare($query1);
		$sth1->bindParam(':username', $username);
		$sth1->execute();
		$queryResult1 = $sth1->setFetchMode(PDO::FETCH_ASSOC);
		$queryResult1Rows = $sth1->fetchAll();
		$queryResult1RowsCount = count($queryResult1Rows);

		if($queryResult1RowsCount > 0){
			$queryResult1Row = $queryResult1Rows[0];
			$name = $queryResult1Row['name'];	
			$image_filename = $queryResult1Row['image_filename'];	
		}
	}
?>
		
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(!defined('DB_USER')){
			require "../../config.php";	
			//require "../config.php";	
			try {
					$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
				} catch (PDOException $pe) {
						die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}
		require "../answers.php";
		date_default_timezone_set("Africa/Lagos");
			
		$userQuestion = $_POST['userQuestion'];
		$checkVersionQuestion  = "aboutbot";
		//$checkVersionQuestion = "%$checkVersionQuestion%";
		//check if input entered is to get chatbot version
		if($userQuestion == $checkVersionQuestion){
			$chatBotVersion = "Pinky v 1.0";
			echo $chatBotVersion;
			return;
		}
			
		/*Check if chatbot is in training mode*/
		$indexOfQuestion = stripos($userQuestion, "train:");
		if($indexOfQuestion === false){

			//i.e it is in question answering mode

			$userQuestion = preg_replace('([\s]+)', ' ', trim($userQuestion)); //remove all extra white spaces from the question
			$userQuestion = preg_replace('([?.])', '', $userQuestion); //remove '?' and '.'
							
			$userQuestion = "%$userQuestion%";
			
			$query = "SELECT * FROM chatbot WHERE question like :question";
			$sth = $conn->prepare($query);
			$sth->bindParam(':question', $userQuestion);
			$sth->execute();
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$result = $sth->fetchAll();
			$count = count($result);
							
			if($count > 0){
				$index = rand(0, $count-1);
				$resultRow = $result[$index];
				$userQuestionAnswer = $resultRow['answer'];

				//check if the userQuestionAnswer is to call a function
				$indexOfOpeningBrackets = stripos($userQuestionAnswer, "((");
				if($indexOfOpeningBrackets === false){
					echo "$userQuestionAnswer";
				}
				else{
					$indexOfClosingBrackets = stripos($userQuestionAnswer, "))");

					if($indexOfClosingBrackets !== false){
						$functionName = substr($userQuestionAnswer, $indexOfOpeningBrackets+2, $indexOfClosingBrackets-$indexOfOpeningBrackets-2);
						$functionName = trim($functionName);
						if(stripos($functionName, ' ') !== false){ //if method name contains spaces, do not invoke method
							echo "The function name should not have any white spaces";
							return;
						}
						if(!function_exists($functionName)){
							echo "Oops! Sorry! Function could not be found";
						}
						else{
							echo str_replace("(($functionName))", $functionName(), $userQuestionAnswer);
						}
						return;
					}

				}
			}  
			else{
				echo "Oops! Sorry! I couldn't understand your question. Try asking another question. <br/>
				 Or type <b style = 'color: #d16027;'>train: question # answer </b> to train me to more kinds of questions.";
			}   
		}
			
		else{
			//i.e The chatbot is in training mode
			
			$trainingString = substr($userQuestion, 6); //get the trainingString from the textarea
			$trainingString = preg_replace('([\s]+)', ' ', trim($trainingString)); //remove extra white spaces in the trainingString
			$trainingString = preg_replace("([?.])", "", $trainingString); //remove '?' and '.' to ensure recognization of questions without those symbols in the trainingString
			
			$splitTrainingString = explode("#", $trainingString);
			$splitTrainingStringCount = count($splitTrainingString);
			if($splitTrainingStringCount == 1){
					echo "Sorry, you entered an invalid training format. Type <b style = 'color: #d16027;'> train: question # answer </b> to do this again";
					return;
			}
			
			$question = trim($splitTrainingString[0]);
			$answer = trim($splitTrainingString[1]);
			
			if($splitTrainingStringCount < 3){
				echo "You need to enter a password to train me. Type <b style = 'color: #d16027;'>train: question # answer # password</b>";
				return;
			}
			$trainingPassword = trim($splitTrainingString[2]);
			
			//verification of password entered
			define('Training_Password', 'password');
			
			if($trainingPassword != Training_Password){
				echo "Invalid Password. Try again";
			}
			
			else{
					// If everything is in place i.e training string is in order and password is correct insert into the database
					$query = "INSERT INTO chatbot (question, answer) values (:question, :answer)";
					$sth = $conn->prepare($query);
					$sth->bindParam(':question', $question);
					$sth->bindParam(':answer', $answer);
					$sth->execute();
					$sth->setFetchMode(PDO::FETCH_ASSOC);
				
					//insert is successful, prompt user to ask that question.
					echo "Yay! Training Successful. Try asking me the same question now.";
				}

			}
		}
?>

<?php if($_SERVER['REQUEST_METHOD'] === "GET"){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aniuchi Adaobi M. - @AdaM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.1.0/default/css/alta/oj-alta-min.css" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 <style>
		@import url('https://fonts.googleapis.com/css?family=Allura|Damion');
		@media only screen and (min-width: 600px) {
				img.bootstrap-pic { display:inline-block; margin-top:-60px;}
		}
		@media only screen and (max-width: 600px) {
				img.bootstrap-pic { display:block;}
		}
		.oj-lg-6.image-sec{ padding: 10px 50px 10px 50px;}
		.panel{border:0; box-shadow:none;}
		.hello{font-family: 'Allura', Helvetica, cursive; font-size: 35px; line-height: 1.375em; font-weight: bold;}
		.name{font-family: 'Damion', Arial, sans-serif; font-size:55px; color: #27a9d1;}
		.icons{font-size: 110px;}
		.icons.html5{color: #d16027;}
		.icons.css3{color: #27a9d1;}
		.details{font-size: 22px;}
		.fb{color: #3b5998;}
		.tw{color: #1da1f2;}
		.git{color: #333333;}
		.ln{color: #0077b5; }
		.main-section{ width: 330px; position: fixed; right:5px; /*bottom:0px;*/bottom:-380px; }
    .first-section:hover{ cursor: pointer; }
    .open-more{ bottom:0px; transition:2s; }
    .border-chat{ border:1px solid #007bff; margin: 0px; }
    .first-section{ background-color:#007bff; }
    .first-section p{ color:#fff; margin:0px; padding: 10px 0px; font-size: 15px; font-weight: bold; }
    .first-section p:hover{ color:#fff; cursor: pointer; }
  	.right-first-section{ text-align: right; float:right;}
    .right-first-section i{ color:#fff; font-size: 15px; padding: 12px 3px; } 
    .right-first-section i:hover{ color:#fff; } 

    .second-section{ padding: 0px; margin: 0px; background-color: #F3F3F3; height: 300px; }
    .chat-section{ overflow-y:scroll; height:300px; }
    .chat-section ul{ padding: 0px; }
    .chat-section ul li{ list-style: none; margin-top:10px; position: relative; }
    .left-chat,.right-chat{ overflow: hidden; }
    .left-chat p,.right-chat p{ background-color:#007bff; padding: 10px; color:#fff; border-radius: 5px;  float:left;  width:60%; margin-bottom:20px; }
    .right-chat p{ float:right; background-color: #FFFFFF; color:#007bff; }
    .left-chat i,.right-chat i{ width:50px; height:20px; float:left; margin:0px 10px; }
    .left-chat i{color: #007bff;}
    .right-chat i{ float:right; color: #007bff;}
	.left-chat span,.right-chat span{ position: absolute; left:70px; top:40px; color:#B7BCC5; }
	.right-chat span{ left:65px; }
    .left-chat:before{ content: " "; position:absolute; top:0px; left:55px; bottom:150px; border:15px solid transparent; border-top-color:#007bff; }
    .right-chat:before{content: " "; position:absolute; top:0px; right:55px; bottom:150px;border:15px solid transparent; border-top-color:#fff; }
        
    .third-section{ border-top: 2px solid #EEEEEE; }
    .input-group{margin-top: 5px; margin-bottom: -5px; }
    textarea.form-control{ height: 40px; padding: 3px 6px; border:1px solid #007bff; }
    .input-group-addon{ background-color: #007bff; border: #007bff; color: #fff}
    input[type=checkbox]{margin: 2px 0 -5px; }
  </style>
</head>

<body class="oj-web-applayout-body">
  <div id="globalBody" style="margin-top: 50px; margin-bottom: -50px"  class="oj-web-applayout-page">
    <div role="main" class="oj-web-applayout-max-width oj-web-applayout-content">
      <div class="oj-flex">
        <div class="oj-flex-item oj-sm-12 oj-lg-6 oj-md-12 oj-lg-6 image-sec">
          <div class="panel panel-default" style="padding:5px 0 5px 0">
            <img src="https://res.cloudinary.com/missada/image/upload/v1523634470/squarequick_201671715640975.jpg" class= "img-responsive img-circle" />
          </div>
        </div>

        <div class="oj-flex-item oj-sm-12 oj-lg-6 oj-md-12 oj-lg-6">
          <div class="panel panel-default">
            <div class="panel-body" align="center" style="padding: 30px 10px 20px 10px">
              <h4 class= "hello">Hello! I'm</h4>
              <h1 class="name"><b><?php echo $name; ?></b></h1>
              <p style="font-size:20px">Rookie Web Developer, Writer and Blogger from Lagos, Nigeria</p>
              <div>
                  <span class="fa fa-html5 icons html5"></span> &nbsp; &nbsp;
                  <span class="fa fa-css3 icons css3"></span>
                  <img src="https://res.cloudinary.com/missada/image/upload/v1523807521/bootstrap.jpg" width="150px" height="150px" class="img-responsive bootstrap-pic"/>
              </div>
              <p class="details"><span class="fa fa-envelope"> adamichelllle@gmail.com </span></p>			
              <p>
                <a href="https://www.linkedin.com/in/adaobi-aniuchi-26173a105/"><span class="fa fa-linkedin-square fa-2x ln"></span></a>&nbsp;
                <a href="https://web.facebook.com/michelle.aniuchi"><span class="fa fa-facebook-square fa-2x fb"></span></a>&nbsp;
                <a href="https://twitter.com/AniuchiA"><span class="fa fa-twitter-square fa-2x tw"></span></a>&nbsp;
                <a href="https://github.com/AdaM2196/"><span class="fa fa-github fa-2x git"></span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="oj-flex">
        <!-- Chatbot Section -->
		    <div class="main-section">
          <div class="row border-chat">
            <div class="col-md-12 col-sm-12 col-xs-12 first-section bg-primary">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 left-first-section">
                  <p id="chatbot-heading" class="blink"><i class="fa fa fa-question-circle"></i> Chat with Me!</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 right-first-section">
                  <a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-clone" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="row border-chat">
            <div class="col-md-12 col-sm-12 col-xs-12 second-section">
              <div class="chat-section">
                <ul id="chatSection">
                </ul>
              </div>
            </div>
          </div>

          <div class="row border-chat">
            <div class="col-md-12 col-sm-12 col-xs-12 third-section">
              <form class="message-box">
                <div class="input-group">
                  <textarea class="form-control custom-control" id="textbox" autofocus="autofocus" rows="2" style="resize:none" placeholder="Enter your question here"></textarea>     
                  <span class="input-group-addon btn btn-primary" id="send"><i class="fa fa fa-paper-plane fa-lg" aria-hidden="true"></i></span>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" checked id="enter"> Send On Pressing Enter</label>
                </div>
              </form>
            </div>
          </div>
        </div>
	    </div>

      <div class="oj-flex">
        <span style="z-index:50;font-size:0.9em;"><img src="https://theysaidso.com/branding/theysaidso.png" height="20" width="20" alt="theysaidso.com"/><a href="https://theysaidso.com" title="Powered by quotes from theysaidso.com" style="color: #9fcc25; margin-left: 4px; vertical-align: middle;">theysaidso.com</a></span>
      </div>
    </div>  
  </div>

  <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require/require.js"></script>
  <script>
    requirejs.config({
      // Path mappings for the logical module names
            paths: {
              'knockout': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/knockout/knockout-3.4.0',
              'jquery': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/jquery/jquery-3.1.1.min',
              'jqueryui-amd': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/jquery/jqueryui-amd-1.12.0.min',
              'ojs': 'https://static.oracle.com/cdn/jet/v4.1.0/default/js/min',
              'ojL10n': 'https://static.oracle.com/cdn/jet/v4.1.0/default/js/ojL10n',
              'ojtranslations': 'https://static.oracle.com/cdn/jet/v4.1.0/default/js/resources',
              'text': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require/text',
              'promise': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/es6-promise/es6-promise.min',
              'hammerjs': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/hammer/hammer-2.0.8.min',
              'signals': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/js-signals/signals.min',
              'ojdnd': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/dnd-polyfill/dnd-polyfill-1.0.0.min',
              'css': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require-css/css.min',
              'customElements': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/webcomponents/custom-elements.min',
              'proj4js': 'https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/proj4js/dist/proj4'
            },
                  
            // Shim configuration
            shim: {
                'jquery': {
                    exports: ['jQuery', '$']
                }
            }
    });

    require(['ojs/ojcore', 'knockout', 'jquery', 'ojs/ojknockout', 'ojs/ojmodule', 'ojs/ojrouter'],
    function (oj, ko, app) { // this callback gets executed when all required modules are loaded
      
      $(function() {
        $("#send").click(function(){
          var usernameTag = "<li><div class='right-chat'><i class='fa fa-user-circle-o fa-3x'></i><p><b>You: </b>";
          
          var prevState = $("#chatSection").html();
          
          if(prevState.length == 189){
            var username = $("#textbox").val();
            
            if(prevState.length > prevState.length){
              prevState = prevState + "<br/>";
            }
            
            $("#chatSection").html(prevState + usernameTag + username + "</p><span>" +botDate+ "</span></div></li>");
            $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
            $("#textbox").val("");

            displayUsername(username);
          }
          else{
            var userQuestion = $("#textbox").val();
            if(prevState.length > prevState.length){
                  prevState = prevState + "<br/>";
            }

            $("#chatSection").html(prevState + usernameTag + userQuestion + "</p><span>" +botDate+ "</span></div></li>");
            $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
            $("#textbox").val("");

            ai(userQuestion);
            }
        });

        //initialization function
        function init() {
          oj.Router.sync().then(
            function () {
              // Bind your ViewModel for the content of the whole page body.
              ko.applyBindings(app, document.getElementById('globalBody'));

              $(".left-first-section").click(function(){
                  $("#chatbot-heading").removeClass('blink');
                  $('.main-section').toggleClass("open-more");
              });

              $(".fa-minus").click(function(){
                $('.main-section').removeClass("open-more");
              });
                      
              $('.main-section').addClass("open-more");

              welcome();
              $("#textbox").keypress(function(event){
                if( event.which == 13){
                  if( $("#enter").prop("checked") ){
                    $("#send").click();
                    event.preventDefault();
                  }
                }
              });
            },
            function (error) {
              oj.Logger.error('Error in root start: ' + error.message);
            }
          );
        }
  
        // If running in a hybrid (e.g. Cordova) environment, we need to wait for the deviceready 
        // event before executing any code that might interact with Cordova APIs or plugins.
        if ($(document.body).hasClass('oj-hybrid')) {
          document.addEventListener("deviceready", init);
        } else {
          init();
        }
  
      });
      
      
      
    }
  );


  var username = "";

		//function to add extra zeros for my botdate
		function pad(number){
			return (number < 10 ? '0' : '') + number;
		}
		var myDate = new Date();
		var d = myDate.getDate();
		var m = pad(myDate.getMonth());
		var y = myDate.getFullYear();
		var min = pad(myDate.getMinutes());
		var hr = myDate.getHours();
		var botDate = d+'/'+m+'/'+y+' '+hr+':'+min+'';

		var welcome_message = "Hi there! I am Ada's Assitant, Pinky. What is your name?";

		//chatbots welcome message
		function welcome() {
			send_message(welcome_message); 	         
		}

		//function to append users username in introductory greeting
		function displayUsername(message) {
			if(username.length < 6){
        username = message;
        send_message("Nice to meet you " + username + ". <br/>You could ask me a question right now, see my list of commands by typing <b style = 'color: #d16027'>pinky commands</b> or train me with a question of your own." +
				"<br/> To do that, do the following: In your text field type this: <b style = 'color: #d16027'> train: question # answer </b>");
      		}
		}

		//function to return bot's message
		function send_message(message) {
			$(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
			var prevState = $("#chatSection").html();
			if(prevState.length > prevState.length){
					prevState = prevState + "<br/>";
			}
			$("#chatSection").html(prevState + "<li class='current_message'><div class='left-chat'><i class='fa fa-user-circle fa-3x'></i><p><b>Pinky: </b>" + message + "</p></div></li>");   
			$(".current_message").hide();
      		$(".current_message").delay(600).fadeIn();
      		$(".current_message").removeClass("current_message");
			$(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
		}

		//fuction to send the message received from the user to the php script
		function ai(message) {
			var prevState =$("#chatSection").html();
			var	userQuestion = "";
			if(userQuestion.length < prevState.length){	
				var form_data = {userQuestion : message}
				$.ajax({
                	type: "POST",
                	url: "profiles/AdaM.php",
                	data: form_data,
                	success: function(data){
						send_message(data);
                	},
					error: function(){
						alert("Unable to retrieve answer!");
					}
          		});
			}
			
		}
  </script>
</body>
</html>
<?php } ?>