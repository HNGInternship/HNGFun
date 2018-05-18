   <?php
	if(!defined('DB_USER')){
            require "../config.php";
}

class Db{
    
	private static $_instance;
	private $conn;
	
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
		if (!self::$_instance) { 
			self::$_instance = new self();
		}
		return self::$_instance->conn;
	}  
	
	//  clone
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
	
	public function getMyProfile($username = 'abayomi'){
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

	function botAnswer($result){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		if (empty($result)) $answer = 'I will understand you better, if you train me. To train me type; train: Question # Answer # Password';
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

	function messageBot(){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		$m = new DBHelper();
		$message =neat_string($_POST['message']);
		
		$if_training_mode = preg_match("/^train/", $message);
		if ($if_training_mode) {
			$message = str_replace('train:', '', $message);
			
			$message = preg_replace('([\s]+)', ' ', trim($message));
			$message = preg_replace("([?.])", "", $message); 
			
			if (count($matches = explode('#', $message, 3)) === 3) {
				$question =neat_string($matches[0]);
				$answer =neat_string($matches[1]);
				$password =neat_string($matches[2]);
				
				if ($password !== 'password') {
					return botMessage('Please enter the correct password train me');
				}if (empty($question)) {
					return botMessage('Ask me anything');
				}
				if (empty($answer)) {
					return botMessage('Include the answer please...');
				}
				if ($m->PairExists($question, $answer) !== false) {
					return botMessage('Question exist. Please try something new?');
				} else {
					$m->trainMyBot($question, $answer);
					return botMessage('ChatMe is awesome, I\'did love to learn more');
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
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="js/jScrollPane/jScrollPane.css">
	<title>HNGFun | Abayomi</title>
	
	<style>
        body{
            width: 100%;
        background: #fff;
        padding: 0;
        margin: 0;
        font-family: 'Montserrat',sans-serif;
        }
        .main {
        width: 360px;
        height: 600px;
        left: 50%;
        top:55%;
        background: rgb(43, 108, 167);
        position: absolute;
        transform: translate(-50%, -50%);
        }
         img{
        height: 150px;
        width: 150px;
        top: -80px;
        position: absolute;
        left: calc(50% - 80px);
        border: 3px solid rgb(115, 169, 219);
        border-radius: 50%;
        -moz-box-shadow: #2a3132 0px 4px 7px; 
        -webkit-box-shadow: #2a3132 0px 4px 7px; 
        box-shadow: #2a3132 0px 4px 7px; 
        background: #fff;   
        }
        h1 {
        margin-top: 100px;
        font-size: 24px;
        color: #fff;
        text-align: center;
        }
        h3 {
        margin: -10px;
        font-size: 20px;
        text-align: center;
        color: #fff;
        }
        p{
        margin:20px 35px;
        width: 80%;
        text-align: center;
        line-height:1.4em;
        
        }
        .connect_me {
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 16px;
        }
        #icons{
         margin-left: 50px;
        }
        .fa {
            position: relative;
        padding: 20px;
        font-size: 20px;
        width: 20px;
        height: 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 50%;
        }
        .fa:hover {
        opacity: 0.7;
        }
        .fa-facebook {
        background: #3B5998;
        color: white;
        }
        .fa-twitter {
        background: #55ACEE;
        color:#fff;
        }
        .fa-github {
        background: rgb(50, 73, 90);
        color:#fff;
        }
        .fa-linkedin {
        background: rgb(47, 136, 204);
        color:#fff;
        }
        .date{
        margin-bottom: 10px;
        }
        
        /* ChatBot section */
    .section-main{
	 width: 330px; 
    position: fixed; 
    right:5px;
     bottom:300px; 
	}
	.session-one:hover{
	 	cursor: pointer; 
	}
	.open-more{
	 	bottom:0px; 
        transition:2; 
	}
	.chat-border{
		 border:1px solid rgb(43, 108, 167);
		  margin: 0px; 
	}
	.session-one{
	 	background-color:rgb(43, 108, 167); 
	}
	.session-one p{
        color:#fff; 
        margin:0px;
        padding: 0px; 
        font-size: 15px; 
        font-weight: bold; 
	}
	.session-one p:hover{
		 color:#fff;
		  cursor: pointer; 
	}
	.right-session-one{
		 text-align: right;
        position: absolute;
        top: 10px;
        left: 70%;
	}
	.right-session-one i{
        color:#fff; 
        font-size: 15px;
        padding: 12px 3px; 
	} 
	.right-session-one i:hover{
	 	color:red; 
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
		
	}
	.messages ul li{
		 list-style: none; 
		 margin-top:-10px; 
		 position: relative; 
		 margin-left:10px; 
	}
	.session-three{
	 	border-top: 2px solid #EEEEEE; 
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
	.btn{
        position: absolute;
        bottom: 16px;
        right: 25px;
		  padding:11px 15px;
            border:none;
            color:white;
            font-size:20px;
            background-color:cornflowerblue;
	}
	.textInput{
		margin-bottom:16px;
        margin-left: 5px;
	}
	.follow{
		font-size: 24px;
	}
	.replies{
        color: cornflowerblue;
	}
    .sent{
        color:forestgreen;
        position: relative;
	}
        @media (max-width: 700px){
        .section-main{
                position: relative;
                margin: 180% auto 0px;
            }
        }
	</style>
</head>
<body>
    <div class="main">
        <div class="image"><img src="<?php echo $user->image_filename; ?>" alt="Author's Picture"></div>
        <div class="details">
            <h1><?php echo $user->name; ?></h1>
            <h3>Slack Username: @<?php echo $user->username; ?></h3>
            <p>Exceptionally well organised, self taught, self motivated and resourceful Professional with few years of experience in Website Development and Design using HTML, CSS, Bootstrap, JAVASCRIPT, JQuery, Laravel, PHP, MYSQL.  Excellent analytical and problem solving skills.</p>
            <p class="connect_me">Connect with me</p>

<!--
        <div id="icons">
          <?php //include('../footer.php'); ?>
        </div>
-->
    </div>
    </div>
<!--  Starting up the Chatbot Design  -->

         <!-- Chatbot Section -->
	<div class="section-main">
        <div class="row chat-border">
            <div class="col-md-12 col-sm-12 col-xs-12 session-one bg-primary">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 left-session-one">
                        <p id="chatbot-heading" class="blink"><i class="fa fa fa-question-circle"></i> Let's Chat</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 right-session-one">
                        <a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-clone" aria-hidden="true" id="maximize"></i></a>
                        <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                    	 		<input type="text" class="form-control custom-control" id="chat_message_text" autofocus="autofocus" rows="2" style="resize:none" placeholder="Type your message here"> 
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
<script type="text/javascript" src="../js/jquery.min.js"></script>s
<script type="text/javascript">
    var chat = chat || {};

    (function () {
        this.onReady = function () {
            // send welcome messages
            var strMessages = '<li class="replies"><p><small style="font-size: 15px;" >Hi, My name is ChatMe <br> How can I help you?</small></p></li><div class="clearfix"></div> ';
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

            var strMessages = '<li class="sent"><p><small style="font-size:15px;">You:</small> ' +
                ' ' + message + '</p></li><div class="clearfix"></div> ';
            $('#message-outlet').append(strMessages);
            $(".messages").scrollTop($("#message-outlet").outerHeight());

            var data = {
                "function": "messageBot",
                "message": message,
            };
            this.postJSON(data, "../profiles/abayomi.php", function (response) {
                $('#message_chat_form')[0].reset();
                console.log(response);
                var strMessages = '<li class="replies"><small style="font-size: 15px; color:rgb(47, 136, 204);" >ChatMe:</small> ' +
                    ' ' + response.message + '</p></li><div class="clearfix"></div> ';
                $('#message-outlet').append(strMessages);
                $(".messages").scrollTop($("#message-outlet").outerHeight());

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
            var usernameTag = "<li><div class='right-chat'><p><b>You: </b>";
            
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
