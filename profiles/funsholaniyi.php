<?php
/**
 * Created by PhpStorm.
 * User: Funsho Olaniyi
 * Date: 19/04/2018
 * Time: 10:38 AM
 */

/**
 * This is largely a smart work approach with basic implementation ideas from jim and chigozie and opheus codebase
 * after which, i built on it and made a beauty, i like to think of it that way
 *
 * PLEASE ENJOY THE SEARCH AND MATCH ALGORITHM, GIVE CREDITS IF U WANT TO USE IT, OPEN SOURCED
 */

if(!defined('DB_USER')){
	if (file_exists('../../config.php')) {
		require_once '../../config.php';
	} else if (file_exists('../config.php')) {
		require_once '../config.php';
	} elseif (file_exists('config.php')) {
		require_once 'config.php';
	}
}

/**
 * Class Database
 */
class Database
{
	// a singleton pattern implementation
	
	private static $_instance;
	private $connection;
	
	/**
	 * Database constructor.
	 */
	protected function __construct()
	{
		
		$this->connection =  new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
//		$tz = (new DateTime('now', new DateTimeZone('Africa/Lagos')))->format('P');
//		$this->connection->query("SET time_zone='$tz';");
		// Error handling
		if (mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(),
				E_USER_ERROR);
			die('Failed to connect to MySQL');
		}
	}
	
	/**
	 * @return PDO
	 */
	public static function getInstance()
	{
		if (!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance->connection;
	}
	
	// Magic method clone is empty to prevent duplication of connection
	public function __clone()
	{
	}
	
}

/**
 * Class Response
 */
class Response
{
	
	public $status;
	public $data = array();
	public $message;
	
	/**
	 * Response constructor.
	 * @param string $status
	 * @param null $data
	 * @param string $message
	 */
	function __construct($status = '', $data = null, $message = '')
	{
		$this->status = $status;
		$this->data = $data;
		$this->message = $message;
	}
}

/**
 * Class Model
 */
class Model
{
	private $dbh;
	
	/**
	 * Model constructor.
	 */
	public function __construct()
	{
		$this->dbh = Database::getInstance();
	}
	
	/**
	 * @return string
	 */
	public function getSecretWord()
	{
		try {
			$query = $this->dbh->prepare("SELECT * FROM secret_word LIMIT 1");
			$query->execute();
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$data = $query->fetch();
			return $data['secret_word'];
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	/**
	 * @param string $username
	 * @return mixed|string
	 */
	public function getProfile($username = 'funsholaniyi')
	{
		try {
			$query = $this->dbh->prepare("SELECT * FROM interns_data WHERE username='{$username}' LIMIT 1");
			$query->execute();
			$query->setFetchMode(PDO::FETCH_OBJ);
			return $user = $query->fetch();
			
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	/**
	 * @param $question
	 * @return mixed|string
	 */
	public function getAQuestionAnswer($question)
	{
		try {
			$query = $this->dbh->prepare("SELECT * FROM chatbot ORDER BY RAND()");
			$query->execute();
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$data = $query->fetchAll();
			
			return smartSearch($question, $data);
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	/**
	 * @param $question
	 * @param $answer
	 * @return bool|string
	 */
	public function ifQuestionAnswerPairExists($question, $answer)
	{
		try {
			$sql = $this->dbh->prepare("SELECT * FROM chatbot WHERE question = :question AND answer = :answer");
			$sql->execute([':question' => $question, ':answer' => $answer]);
			$result = $sql->fetch(PDO::FETCH_ASSOC);
			if ($result) return true;
			return false;
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}
	
	/**
	 * @param $question
	 * @param $answer
	 * @return string
	 */
	public function trainBot($question, $answer)
	{
		try {
			$stmt = $this->dbh->prepare("INSERT INTO chatbot (question, answer) VALUES (:question, :answer)");
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


// common functions

/**
 * remove bad characters
 * @param $string
 * @return string
 */
function clean_string($string)
{
	if (is_array($string)) {
		$data = [];
		foreach ($string as $key => $value) {
			$data[$key] = clean_string($value);
		}
	} else {
		return strip_tags(trim(filter_var($string, FILTER_SANITIZE_STRING)));
	}
}

/**
 * Proud of this one
 * A search algorithm to intelligently match words asked to those in the questions db, the highest match wins
 * also, yhello will be mapped with hello result for example to give a broader range of response
 *
 * @param $question
 * @param $questions_array
 * @return mixed
 */
function smartSearch($question, $questions_array)
{
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
				if ($hit_count === $word_count) {
					// we match all words here already, so stop looping and return instead
					return $item;
				}
				if ($hit_count && ($hit_count === count($question) || $hit_count > 2)) { // if count is more than 1 and greater that 2 or equal count of question
					$q_sorta[] = $item;
				}
			
			}
		}
	}
	ksort($q_sorta);
	$item = end($q_sorta);
	if($item){
	    return $item;
    }else{
	    return [];
    }
}

/**
 * @param $message
 * @param string $status
 * @return string
 */
function respond($message, $status = 'success')
{
	$myResponse = new Response();
	$myResponse->status = $status;
	$myResponse->message = $message;
	return json_encode($myResponse);
}

/**
 * @param $result
 * @return mixed|string
 */
function parseAnswer($result)
{
	if (empty($result)) $answer = 'Didn\'t get that, How about you train me';
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
				if (stripos($function_name, ' ') === false) { //if method name contains spaces, do not invoke method
					$answer = str_replace("(($function_name))", $function_name(), $answer);
				}
			}
		}
	}
	if (empty($answer)) $answer = 'Didn\'t get that, How about you train me';
	
	return $answer;
}

/**
 * @return string
 */
function sendMessage()
{
	$m = new Model();
	$message = clean_string($_POST['message']);
	
	if(strstr('aboutbot', $message)){
		return respond('Hi, My name is Christiana, I\'m currently versioned 0.1');
	}
	
	$if_training_mode = preg_match("/^train/", $message);
	if ($if_training_mode) {
		$message = str_replace('train:', '', $message);
		
		$message = preg_replace('([\s]+)', ' ', trim($message));
		$message = preg_replace("([?.])", "", $message); //remove ? and . so that questions missing ? (and maybe .) can be recognized
		
		if (count($matches = explode('#', $message, 3)) === 3) {
//		    var_dump($matches);
			$question = clean_string($matches[0]);
			$answer = clean_string($matches[1]);
			$password = clean_string($matches[2]);
			
			if ($password !== 'password') {
				return respond('but dear, ! That\'s not the password to train me');
			}
			if (empty($question)) {
				return respond('C\'mon, ask me something');
			}
			if (empty($answer)) {
				return respond('Include the answer please...');
			}
			if ($m->ifQuestionAnswerPairExists($question, $answer) !== false) {
				return respond('Oh! I already knew that. something else, please...');
			} else {
				$m->trainBot($question, $answer);
				return respond('Christiana is smarter, don\'t get jealous, you made it happen');
			}
		} else {
			return respond('but no. I\'d prefer, train: Question # Answer # Password');
		}
	} else {
		$result = $m->getAQuestionAnswer($message);
		$answer = parseAnswer($result);
		return respond($answer);
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
$user = (new Model())->getProfile();


?>

<main class="my-container row">
    <div class="profile col-md-6">
        <div class="avatar"></div>
        <br/>
        <ul class="list-group">

            <li class="list-group-item">
                <i class="fa fa-user"></i>
                &emsp;
                <strong>
					<?php echo $user->name; ?>
                </strong>
            </li>
            <li class="list-group-item">
                <i class="fa fa-envelope"></i>
                &emsp;
                <strong>
                    <a href="mailto:funsholaniyi@gmail.com">funsholaniyi@gmail.com</a>
                </strong>
            </li>
            <li class="list-group-item">
                <i class="fa fa-phone-square"></i>
                &emsp;
                <strong>
                    <a href="tel:+2347085827380">+2347085827380
                </strong>
            </li>

            <li class="list-group-item text-center">
                <a target="_blank" href="https://facebook.com/funsholaniyi/"><i class="fa fa-facebook"></i></a> &emsp;
                <a target="_blank" href="https://twitter.com/funsholaniyi/"><i class="fa fa-twitter"></i></a> &emsp;
                <a target="_blank" href="https://quora.com/profile/Funsho-Olaniyi/"><i class="fa fa-quora"></i></a>
                &emsp;
                <a target="_blank" href="https://github.com/funsholaniyi/"><i class="fa fa-github"></i></a> &emsp;
                <a target="_blank" href="https://ng.linkedin.com/in/funsholaniyi"><i class="fa fa-linkedin"></i></a>
            </li>
        </ul>

    </div>
    <div class="profile col-md-5">
        <div class="content">
            <div id="group-info">

            </div>
            <div class="messages">
                <ul id="message-outlet">

                </ul>
            </div>

            <div class="message-input">
                <form id="message_chat_form">
                    <div class="form-group">
                        <input type="text" class="form-control" style="width: 100%; font-size: 12px;"
                               id="chat_message_text"
                               placeholder="Type Something">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm pull-right">Send</button>
                </form>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>

<script type="text/javascript">
    var chat = chat || {};

    (function () {
        this.onReady = function () {
            // send welcome messages
            var strMessages = '<li class="replies"><img src="https://res.cloudinary.com/funsholaniyi/image/upload/v1524159157/default.jpg">' +
                '<p><small style="font-size: 10px;">Christiana</small><br>Hi, My name is Christiana</p></li><div class="clearfix"></div> ';
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

            var strMessages = '<li class="sent"><img src="https://res.cloudinary.com/funsholaniyi/image/upload/v1524159157/default.jpg">' +
                '<p><small style="font-size: 10px;">You</small><br>' +
                '' + message + '</p></li><div class="clearfix"></div> ';
            $('#message-outlet').append(strMessages);
            $(".messages").scrollTop($("#message-outlet").outerHeight());

            var data = {
                "function": "sendMessage",
                "message": message,
            };
            this.postJSON(data, "/profiles/funsholaniyi.php", function (response) {
                $('#message_chat_form')[0].reset();
                // console.log(response);
                var strMessages = '<li class="replies"><img src="https://res.cloudinary.com/funsholaniyi/image/upload/v1524159157/default.jpg">' +
                    '<p><small style="font-size: 10px;">Christiana</small><br>' +
                    '' + response.message + '</p></li><div class="clearfix"></div> ';
                $('#message-outlet').append(strMessages);
                $(".messages").scrollTop($("#message-outlet").outerHeight());
                responsiveVoice.speak(response.message, 'US English Female');
            });
        };

    }).apply(chat);


    $(this).delay(1000).queue(function () {
        chat.onReady();
        $(this).dequeue();
    });
</script>


<style>
    .my-container {
        margin-bottom: 100px;
        margin-top: 100px;
        position: relative;
    }

    div.profile {
        width: 100%;
        /*max-width: 500px;*/
        background: #fff;
        height: 400px;
        margin: 10px;
        padding: 50px 20px 10px;
    }

    div.avatar {
        background: url(<?php echo $user->image_filename; ?>) center no-repeat;
        background-size: 100% 100%;
        border-radius: 100%;
        width: 200px;
        height: 200px;
        box-shadow: 0 0 10px inset rgba(1, 1, 1, 0.8);
        margin-left: auto;
        margin-right: auto;
        margin-top: -120px;
        right: 0;
        left: 0;
        position: absolute;
    }

    .skills i {
        font-size: 25pt;
        cursor: pointer;
    }

    .skills i:hover {
        filter: brightness(150%);
    }

    /*chat box*/

    .content .messages {
        height: 200px;
        min-height: calc(100% - 200px);
        max-height: calc(100% - 200px);
        overflow-y: scroll;
        /*overflow-x: hidden;*/
    }

    @media screen and (max-width: 735px) {
        .content .messages {
            max-height: calc(100% - 105px);
        }
    }

    .content .messages::-webkit-scrollbar {
        width: 8px;
        background: transparent;
    }

    .content .messages::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .content .messages ul li {
        display: inline-block;
        clear: both;
        margin: 5px;
        width: calc(100% - 25px);
        font-size: 0.7em;
    }

    .content .messages ul li.sent {
        float: left;
    }

    .content .messages ul li.replies {
        float: right;
    }

    .content .messages ul li:nth-last-child(1) {
        margin-bottom: 20px;
    }

    .content .messages ul li.sent img {
        margin: 6px 8px 0 0;
    }

    .content .messages ul li.sent h5 {
        font-size: 10px;
        color: #19a708;

    }

    .content .messages ul li.sent p {
        background: #19a708;
        color: #f5f5f5;
    }

    .content .messages ul li.replies img {
        float: right;
        margin: 6px 0 0 8px;
    }

    .content .messages ul li.replies h5 {
        font-size: 10px;

    }

    .content .messages ul li.replies p {
        background: #f5f5f5;
        float: right;
    }

    .content .messages ul li img {
        width: 22px;
        border-radius: 50%;
        float: left;
    }

    .content .messages ul li p {
        display: inline-block;
        padding: 5px 15px;
        margin: 0;
        border-radius: 20px;
        max-width: 205px;
        line-height: 130%;
    }

    @media screen and (min-width: 735px) {
        .content .messages ul li p {
            max-width: 300px;
        }
    }

    .content .message-input {
        /*position: absolute;*/
        bottom: 0;
        /*background-color: #ffffff;*/
        width: 100%;
        z-index: 99;
    }

    .content .message-input .wrap {
        position: relative;
    }

    .content .message-input .wrap input {
        font-family: "lato", "Source Sans Pro", sans-serif;
        float: left;
        border: none;
        width: calc(100% - 60px);
        padding: 11px 32px 10px 8px;
        font-size: 0.8em;
        color: #404040;
    }

    @media screen and (max-width: 735px) {
        .content .message-input .wrap input {
            padding: 15px 32px 16px 8px;
        }
    }

    .content .message-input .wrap input:focus {
        outline: none;
    }

    .content .message-input .wrap button {
        float: right;
        border: none;
        width: 50px;
        padding: 12px 0;
        cursor: pointer;
        background: #18a706;
        color: #f5f5f5;
    }

    @media screen and (max-width: 735px) {
        .content .message-input .wrap button {
            padding: 16px 0;
        }
    }

    .content .message-input .wrap button:hover {
        background: #435f7a;
    }

    .content .message-input .wrap button:focus {
        outline: none;
    }

</style>
<div class="clearfix"></div>
