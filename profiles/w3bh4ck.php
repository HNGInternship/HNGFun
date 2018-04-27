<?php
if(!defined('DB_USER')){
	if (file_exists('../../config.php')) {
		require_once '../../config.php';
	} else if (file_exists('../config.php')) {
		require_once '../config.php';
	} elseif (file_exists('config.php')) {
		require_once 'config.php';
	}
}
 
class Db{
	private static $_instance;
	private $conn;
	
	/**
	 * Db constructor.
	 */
	protected function __construct(){		
		$this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		$tz = (new DateTime('now', new DateTimeZone('Africa/Lagos')))->format('P');
		$this->conn->query("SET time_zone='$tz';");
		// Error handling
		if (mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(),
				E_USER_ERROR);
		}	 
	}
	
	
	public static function getInstance(){
		if (!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance->conn;
	}
	
	//  clone is empty to prevent duplication of connection
	public function __clone(){
	}
	
}

class Response{
	public $status;
	public $data = array();
	public $message;
	
	function __construct($status = '', $data = null, $message = ''){
		$this->status = $status;
		$this->data = $data;
		$this->message = $message;
	}
}


class DBHelper{
	private $dbh;
	
	
	public function __construct(){
		$this->dbh = Db::getInstance();
	}
	
	
	public function getSecret_Word(){	
		try {
			$query = $conn->prepare("SELECT * FROM secret_word LIMIT 1");
			$query->execute();
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$data = $query->fetch();
			return $data['secret_word'];
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	
	public function getMyProfile($username = 'w3bh4ck'){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			$query = $conn->prepare("SELECT * FROM interns_data WHERE username='{$username}' LIMIT 1");			
			$query->execute();
			$query->setFetchMode(PDO::FETCH_OBJ);
			return $name = $query->fetch();		
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	
	public function getQuestion($question){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		try {
			$query = $conn->prepare("SELECT * FROM chatbot ORDER BY RAND()");
			$query->execute();
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$data = $query->fetchAll();
			return searchQuestion($question, $data);
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	
	public function PairExists($question, $answer){
	$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			$sql = $conn->prepare("SELECT * FROM chatbot WHERE question = :question AND answer = :answer");
			$sql->execute([':question' => $question, ':answer' => $answer]);
			$result = $sql->fetch(PDO::FETCH_ASSOC);
			if ($result) return true;
			return false;
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	
	public function trainMyBot($question, $answer){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		try {
			$stmt = $conn->prepare("INSERT INTO chatbot (question, answer) VALUES (:question, :answer)");
			$stmt->execute(array(
				":question" => $question,
				":answer" => $answer,
			));
			return $insertId = $this->dbh->lastInsertId();
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
}



	function neat_string($string){
		if (is_array($string)) {
			$data = [];
			foreach ($string as $key => $value) {
				$data[$key] =neat_string($value);
			}
		} else {
			return strip_tags(trim(filter_var($string, FILTER_SANITIZE_STRING)));
		}
	}


	function searchQuestion($question, $questions_array){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		$keywords = explode(' ', $question); // explode to get words
		$word_count = count($keywords);
		$q_sorta = [];
		if (!empty($questions_array)) { // loop through all the questions
			foreach ($questions_array as $item) {
				$question = $item['question'];
				if (!empty($keywords)) {
					$hit_count = 0;
					foreach ($keywords as $word) {
						// we log number of word hits in a question
						if (strstr($question, $word) || strstr($word, $question)) {
							$hit_count++;
						}
					}
					if ($hit_count) {
						$q_sorta[] = $item;
					}
					if($hit_count >= $word_count){
					    // This stops the loop and returns the item
	                    return $item;
	                }
				}
			}
		}
		ksort($q_sorta);
		return end($q_sorta);
	}


	function botMessage($message, $status = 'success'){
		$myResponse = new Response();
		$myResponse->status = $status;
		$myResponse->message = $message;
		return json_encode($myResponse);
	}

/**
 * @param $result
 * @return mixed|string
 */
	function botAnswer($result){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		if (empty($result)) $answer = 'It will make more sense if you make out time to train me with this format; train: Question # Answer # Password';
		else {
			$question = $result['question'];
			$answer = $result['answer'];
			
			$index_of_parentheses = stripos($answer, "((");
			
			if ($index_of_parentheses === false) {
				return $answer;
			} else {
				$index_of_parentheses_closing = stripos($answer, "))");
				if ($index_of_parentheses_closing !== false) {
					$function_name = substr($answer, $index_of_parentheses + 2, $index_of_parentheses_closing - $index_of_parentheses - 2);
					$function_name = trim($function_name);
					if (stripos($function_name, ' ') !== false) { //if method name contains spaces, do not invoke method
						$answer = str_replace("(($function_name))", $function_name(), $answer);
					}
				}
			}
		}
		return $answer;
	}

/**
 * @return string
 */
	function messageBot(){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		$m = new DBHelper();
		$message =neat_string($_POST['message']);
		
		$if_training_mode = preg_match("/^train/", $message);
		if ($if_training_mode) {
			$message = str_replace('train:', '', $message);
			
			$message = preg_replace('([\s]+)', ' ', trim($message));
			$message = preg_replace("([?.])", "", $message); //remove ? and . so that questions missing ? (and maybe .) can be recognized
			
			if (count($matches = explode('#', $message, 3)) === 3) {
	//		    var_dump($matches);
				$question =neat_string($matches[0]);
				$answer =neat_string($matches[1]);
				$password =neat_string($matches[2]);
				
				if ($password !== 'password') {
					return botMessage('but dear, ! That\'s not the password to train me');
				}if (empty($question)) {
					return botMessage('C\'mon, ask me something');
				}
				if (empty($answer)) {
					return botMessage('Include the answer please...');
				}
				if ($m->PairExists($question, $answer) !== false) {
					return botMessage('Oh! I already knew that. Can you say something new?');
				} else {
					$m->trainMyBot($question, $answer);
					return botMessage('W3bh4ck, I will love to learn more');
				}
			} else {
				return botMessage('I\'d prefer, train: Question # Answer # Password');
			}
		} else {
			$result = $m->getQuestion($message);
			$answer = botAnswer($result);
			return botMessage($answer);
		}
	}

	if (!empty($_POST)) {
		
		if (!isset($_POST["function"])) {
			$data = $_POST['json'];
			$_POST = json_decode($data, true);
		}
		if (is_callable($_POST['function'])) {
			echo $_POST['function']();
		}
		exit;
	}
	$name = (new DBHelper())->getMyProfile();

?>
<?php if($_SERVER['REQUEST_METHOD'] === "GET"){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <style>
   
          body{
              background-image: url("http://res.cloudinary.com/w3bh4ck/image/upload/v1523849170/web-wallpaper.jpg");
          }
          
	.my-photo{
        margin-right: 30px;
	        border-radius: 50%;
	        margin-top: 36px;
        align-self: center;
	    }

	    .fa {
	        padding: 10px;
	        width: 30px;
	        border-radius: 50%;
	        text-align: center;
	        text-decoration: none;
	    }
	 .fa:hover {
	        opacity: 0.7;
	    }

	.heading{
	    background: rgb(13, 173, 85);
	    color: white;
	    padding: 16px;
	    margin-top: 36px;
	    font-family:  Arial, sans-serif; font-size:55px; color:white;
	    border-radius: 5px;
	}
	           /* chatbot css*/
	 .name{
	    	font-family: sans-serif; 
	    	font-size:36px; 
	   		color: #d16027;
	}    
	.section-main{
		 width: 330px; position: fixed; right:5px;
		 bottom:-380px; 
	}
	.session-one:hover{
	 	cursor: pointer; 
	}
	.open-more{
	 	bottom:0px; transition:2; 
	}
	.chat-border{
		 border:1px solid green;
		  margin: 0px; 
	}
	.session-one{
	 	background-color:green; 
	}
	.session-one p{
		 color:#fff; margin:0px;
		  padding: 10px 0px; 
		  font-size: 15px; 
		  font-weight: bold; 
	}
	.session-one p:hover{
		 color:#fff;
		  cursor: pointer; 
	}
	.right-session-one{
		 text-align: right;
		  float:right;
	}
	.right-session-one i{
		 color:#fff; font-size: 15px;
		  padding: 12px 3px; 
	} 
	.right-session-one i:hover{
	 	color:#fff; 
	} 
	.session-two{
		 padding: 0px;
		 margin: 0px; 
		 background-color: #F3F3F3; 
		 height: 300px; 
	}

	.messages{
		 overflow-y:scroll; 
		 height:300px; 
	}
	.messages ul{
		 padding: 0px;
		 margin-left:10px;
	}
	.messages ul li{
		 list-style: none; 
		 margin-top:10px; 
		 position: relative; 
		 margin-left:10px; 
	}
	.left-chat,.right-chat{
	 	overflow: hidden; 
	}
	.left-chat p,.right-chat p{
		 background-color:#007bff; 
		 padding: 10px; 
		 color:#fff; 
		 border-radius: 5px;  
		 float:left;  width:60%; 
		 margin-bottom:20px; 
	}
	.right-chat p{
		 float:right; 
		 background-color: #FFFFFF; 
		 color:#007bff; 
	}
	.left-chat i,.right-chat i{
		 width:50px; 
		 height:20px; 
		 float:left;
		 margin:0px 10px; 
	}
	.left-chat i{
		color: #007bff;
	}
	.right-chat i{
		 float:right; 
		 color: #007bff;
	}
	.left-chat span,.right-chat span{
		 position: absolute; 
		 left:70px; 
		 top:40px; 
		 color:#B7BCC5; 
	}
	.right-chat span{
	 	left:65px; 
	}
	.left-chat:before{
		content: " "; 
		position:absolute;
		top:0px;
		left:55px; 
		bottom:150px; 
		border:15px solid transparent; 
		border-top-color:#007bff; 
	}
	.right-chat:before{
		content: " "; 
		position:absolute; 
		top:0px; 
		right:55px; 
		bottom:150px;
		border:15px solid transparent; 
		border-top-color:#fff; 
	}   
	.session-three{
	 	border-top: 2px solid #EEEEEE; 
	}
	#message-outlet li{
		margin-left:10px;
	}
	.input-group{
		margin-top: 5px; 
		margin-bottom: -5px; 
	}
	input.form-control{
		 height: 40px; 
		 padding: 3px 6px; 
		 border:1px solid #007bff; 
	}
	.input-group-addon{
		 background-color: #007bff; 
		 border: #007bff; 
		 color: #fff
		}
	.sendBtn{
		margin-bottom:8px;
	}
	.textInput{
		margin-bottom:16px;
	}

	.follow{
		font-family: roboto;
		font-size: 24px;
	}
	.replies{
		font-family: roboto;

	}
	.sent{
		font-family: roboto;
		
	}
	.messages{
		/*margin-left: 24px;*/
	}
</style>
</head>
	<title>w3bh4ck</title>
	<body>
		<!-- Profile Section -->
	<div class="container"> 
		<div class="row">
		  	<div class="col-md-12 text-center">
                <img style="margin: auto" class="my-photo img-responsive img-circle" src="http://res.cloudinary.com/w3bh4ck/image/upload/v1523793277/23658800_1730371916975943_5091116093810420678_n.jpg" width="300px" height="400px">
		      <h2><strong>AMADI LUCKY SAMPSON</strong></h2>
                <h3>Software Developer</h3>
		  	</div>
		</div>
        <div class="row" style="color: white">
            <div class="col-md-7">
            
                <h2 class="text-center">SKILLS</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        JavaScript
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        jQuery
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
                        React.js
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                        PHP
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        Java
                    </div>
                </div>
                
                <h4>Contact Me: <span><a href="https://www.facebook.com/tranxamadi" target="_blank"><i class="fa fa-facebook-official" style="font-size:24px"></i></a></span><span><a href="https://www.github.com/w3bh4ck" target="_blank"><i class="fa fa-github" style="font-size:24px"></i></a></span><span><a href="https://www.twitter.com/w3bh4ck" target="_blank"><i class="fa fa-twitter" style="font-size:24px"></i></a></span></h4>
                
            </div>
        </div>
	</div>
	        <!-- Chatbot Section -->
	<div class="section-main">
        <div class="row chat-border">
            <div class="col-md-12 col-sm-12 col-xs-12 session-one bg-primary">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 left-session-one">
                        <p id="chatbot-heading" class="blink">W3bh4ck bot</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 right-session-one">
                        <a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row chat-border">
            <div class="col-md-12 col-sm-12 col-xs-12 session-two">
                <div class="messages">
                    <ul id="message-outlet">
                    </ul>
                </div>
            </div>
        </div>
        <div class="row chat-border">
            <div class="col-md-12 col-sm-12 col-xs-12 session-three">
                <form id="message_chat_form" >
                    <div class="input-group">
                    	<div class="row">
                    	 	<div class ="col-xs-9 textInput">
                    	 		<input type="text" class="form-control custom-control" id="chat_message_text" autofocus="autofocus" rows="2" style="resize:none" placeholder="Chat with me..." />
                    	 	</div>	
                    	 	<div class ="col-xs-3 sendBtn">
                    	 		<button type="submit" class="btn btn-success btn-sm pull-right">Send</button>  
                    	 	</div>
                    	</div>
                    </div>
             	</form>
         	</div>
     	</div>
    </div>
</body>
</html> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/477bc8d938.js"></script>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
    var chat = chat || {};

    (function () {
        this.onReady = function () {
            // send welcome messages
            var strMessages = '<li class="replies"><p><small style="font-size: 15px; color:green;" ><img src ="http://res.cloudinary.com/w3bh4ck/image/upload/v1524688848/1_paQ7E6f2VyTKXHpR-aViFg.png" height="20px" width="20px" ><b>W3bh4ck</small><br>Hi, I am w3bh4ck assistant </p></li><div class="clearfix"></div> ';
            $('#message-outlet').append(strMessages);
            $(".messages").scrollTop($("#message-outlet").outerHeight());
        };

        this.postJSON = function (dataObject, targeturl, callback) {
            $.ajax({
                type: "POST",
                url: targeturl,
                data: {"json": JSON.stringify(dataObject)},
                dataType: 'json',
                success: function (data) {
                    callback(data);
                    return true;
                },
                complete: function () {
                },
                error: function (xhr, textStatus, errorThrown) {
                    return false;
                }
            });
        };

        $('#message_chat_form').submit(function (e) {
            e.preventDefault();
            chat.messageChat();
            $('#message_chat_form')[0].reset();
        });

        this.messageChat = function () {

            var message = $("#chat_message_text").val();

            var strMessages = '<li class="sent"><p><small style="font-size: 15px; color:blue;"><img src="http://res.cloudinary.com/gconnect/image/upload/v1524432009/person.png" height="20px" width="20px" ><b>You</small><br>' +
                '' + message + '</p></li><div class="clearfix"></div> ';
            $('#message-outlet').append(strMessages);
            $(".messages").scrollTop($("#message-outlet").outerHeight());

            var data = {
                "function": "messageBot",
                "message": message,
            };
            this.postJSON(data, "../profiles/w3bh4ck.php", function (response) {
                $('#message_chat_form')[0].reset();
                console.log(response);
                var strMessages = '<li class="replies"><img src ="http://res.cloudinary.com/w3bh4ck/image/upload/v1524688848/1_paQ7E6f2VyTKXHpR-aViFg.png" height="20px" width="20px" ><small style="font-size: 15px; color:green;" ><b>w3bh4ck assistant</small><br>' +
                    '' + response.message + '</p></li><div class="clearfix"></div> ';
                $('#message-outlet').append(strMessages);
                $(".messages").scrollTop($("#message-outlet").outerHeight());
                responsiveVoice.speak(response.message, 'UK English Female');

            });
        };

    }).apply(chat);


    $(this).delay(800).queue(function () {
        chat.onReady();
        $(this).dequeue();
    });   
</script>

<script>
    //ON load of chat box page 
    $(document).ready(function(){
        $(".left-session-one").click(function(){
                $("#chatbot-heading").removeClass('blink');
                $('.section-main').toggleClass("open-more");
        });
        $(".fa-minus").click(function(){
            $('.section-main').removeClass("open-more");
        });

         $(".fa-times").click(function(){
            $('.section-main').removeClass("open-more");
        });

        $(".fa-clone").click(function(){
  				$( "#maximize").resizable({
				      maxHeight: 250,
				      maxWidth: 350,
				      minHeight: 150,
				      minWidth: 200
				    });
				  } );
                        
        $('.section-main').addClass("open-more");
        // welcome();
        $("#textbox").keypress(function(event){
            if( event.which == 13){
                if( $("#send").click() ){
                    $("#send").click();
                    event.preventDefault();
                }
            }
        });
        $("#send").click(function(){
            var usernameTag = "<li><div class='right-chat'><i class='fa fa-user-circle-o fa-3x'></i><p><b>You: </b>";
            
            var prevState = $("#chatSection").html();
            
            if(prevState.length == 194){
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
                $("#chatSection").html(prevState + usernameTag + userQuestion + "</p></div></li>");
                $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
                $("#textbox").val("");
                ai(userQuestion);
                }
        });                          
    });
</script>

<?php } ?>