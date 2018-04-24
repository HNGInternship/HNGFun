<script>
function speak(string){
	var utterance = new SpeechSynthesisUtterance();
	utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
	utterance.text = string;
	utterance.lang = "en-US";
	utterance.volume = 1; //0-1 interval
	utterance.rate = 1;
	utterance.pitch = 2; //0-2 interval
	speechSynthesis.speak(utterance);
}

function getListOfCommands() {
  return 'Type "<code>show: List of commands</code>" to see a list of commands I understand.<br/>
  Type "<code>open: www.google.com</code>" to open Google.com<br/>
  Type "<code>say: Hello bot</code>" to get me to say "Hello bot"<br/>
  Type "<code>train: Your question # My reply</code>" to train me to understand how to reply to more things';
}

function getRandomNumber() {
  return (rand(10,10000));
}

function getBotName() {
  return "the_ozmic's bot";
}</script>
<?php
<<<<<<< HEAD
function get_time(){
  //instantiate date-time object
  $datetime = new DateTime();
  //set the timezone to Africa/Lagos
  $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
  //format the time
  return $datetime->format('H:i: A');
}

########################################################
# __   ___              __      __  ___       __   __  #
#|  \ |__  |\ | |\ | | /__`    /  \  |  |  | / _` /  \ #
#|__/ |___ | \| | \| | .__/    \__/  |  \__/ \__> \__/ #
########################################################
######################################################
####################### @BAMII #######################
######################################################
function bamiiConvertCurrency($amount, $from, $to){
    $conv_id = "{$from}_{$to}";
    $string = file_get_contents("https://free.currencyconverterapi.com/api/v5/convert?q=$conv_id&compact=y");
    $json_a = json_decode($string, true);

    return $amount * $json_a[strtoupper($conv_id)]['val'];
}

function bamiiChuckNorris() {
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        );
    $geocodeUrl = "http://api.icndb.com/jokes/random";
    $response = file_get_contents($geocodeUrl, false, stream_context_create($arrContextOptions));

    $a =json_decode($response, true);

    return $a['value']['joke'];
}

function bamiiTellTime($data) {
    if(strpos($data, 'in')) {
        return "Sorry i can't tell you the time somewhere else right now";
    } else {
        return 'The time is:' . date("h:i");
    }
=======
//////////////////////////// BROWN SAMSON DO NOT MODIFY ////////////////////////////////////

$qsam = $_REQUEST["qsam"];
samsonjnrBot($qsam);
function samsonjnrBot($qsam){
$qsam = strtolower($qsam);
$anwerSam = "";
$guestName = "";


$keyword = array('newschool', 'how are you','what are you you?', 'what your do name ur name? call you your\'s', 'my name name?', 'i\'m am fine okay doing great ok all good', 'today today\'s date', 'version version? aboutbot', 'what do time? time', 'still here you there codmax jnr samson');

$decisionArray = array();
$usrKeywords = $qsam; //$_POST['keywords']
$arr1 = explode(' ', $usrKeywords);
foreach ($keyword as $s){
	$arr2 = explode(' ', $s);
	$aint = array_intersect($arr2, $arr1);
	$percentage = (count($aint) * 100 / count($arr2));
	array_push($decisionArray, $percentage);
}
if ($qsam != 'how' && $qsam != "you" && $qsam != "your" && $qsam != "are" && $qsam != "my" && $qsam != "still" && $qsam != "here" && $qsam != "there" && $qsam != "call"){
$decisionValue = array_keys($decisionArray, max($decisionArray));
}else{
	$decisionValue = [0];
>>>>>>> d1c56f65864671d0cb4f843f19b4790d4855b44b
}


function trainingSam($newmessage){
	require 'db.php';
	$message = explode('#', $newmessage);
	$question = explode(':', $message[0]);
	$answer = $message[1];
	$password = $message[2];

	$question[1] = trim($question[1]);
	$password = trim($password);
	if ($password != "samsonjnr"){
		echo "You are not authorize to train me.";

	}else{
	$chatbot= array(':id' => NULL, ':question' => $question[1], ':answer' => $answer);
	$query = 'INSERT INTO chatbot ( id, question, answer) VALUES ( :id, :question, :answer)';

	try {
			$execQuery = $conn->prepare($query);
			if ($execQuery ->execute($chatbot) == true) {
					echo repondTraining();

			};
	} catch (PDOException $e) {
			echo "Oops! i did't get that, Something is wrong i guess, <br> please try again";
		}
	}
}

function greetingSam(){
	$greeting = array('Hi! Good to have you here. My name is Samson Jnr, but you can call me Codmax' ,
										'Hello there, my name is Codmax, how Can i be of help?' ,
										'Good day, You are chatting with Codmax, ask me something',
										'Hi! My name is Samson whats up?',
										'It\'s Codmax, Welcome on board',
										'I\'m Codmax, let\'s get started');
		$index = mt_rand(0, 5);
		return $anwerSam = $greeting[$index];
}

function requestName(){
		$requestName = array( 'Sorry I did\'t catch your name',
													'What can I call you?',
													'What\'s that lovely name of yours?');
		$index = mt_rand(0, 2);
		return $anwerSam = $requestName[$index];
}

function repondTraining(){
		$repondTraining = array(  'Noted! Thank you for teaching me',
															'Acknowledged, thanks, really want to learn more',
															'A million thanks, I\'m getting smarter',
															'i\'m getting smarter, I really appreciate');
		$index = mt_rand(0, 3);
		return $anwerSam = $repondTraining[$index];
}

function repondName(){
		$repondName = array( 'Yeah! i\'m still here',
													'I\'m with you',
													'go ahead I\'m still here');
		$index = mt_rand(0, 2);
		return $anwerSam = $repondName[$index];
}

function respondDate(){
	date_default_timezone_set("Africa/Lagos");
	$time = date("Y/m/d");
	$respondTime = array( 'Today\'s date is '.$time,
												'it\'s '. $time,
												'Today is '. $time,
												$time);
	$index = mt_rand(0, 3);
	return $anwerSam = $respondTime[$index];
}

function respondTime(){
	date_default_timezone_set("Africa/Lagos");
	$time = date("h:i A");
	$respondTime = array( 'The time is '.$time,
												'it\'s '. $time,
												$time);
	$index = mt_rand(0, 2);
	return $anwerSam = $respondTime[$index];
}

function respondName(){
	$respondName = array( 'Codmax, you can still call me Samson Jnr.',
												'Samson Jnr, I\'m still called Codmax.',
												'Samson Jnr. or Codmax');
	$index = mt_rand(0, 2);
	return $anwerSam = $respondName[$index];
}

function respondOkay(){
	$respondOkay = array( 'That\'s Great, we should keep chatting I\'m having fun',
												'So Lovely, let\'s keep chatting',
												'That\'s good news, so how can I help you?');
	$index = mt_rand(0, 2);
	return $anwerSam = $respondOkay[$index];
}

function respondGreeting (){
	$respondGreeting = array( 'Oh, I\'m doing quite well. You?',
												'Am fine and thanks What about you?',
												'Am all good. and how are you too?');
	$index = mt_rand(0, 2);
	return $anwerSam = $respondGreeting[$index];
}


function checkDatabaseToo($question){
	try{
			require 'db.php';

			$stmt = $conn->prepare('select answer FROM chatbot WHERE (question LIKE "%'.$question.'%" ) LIMIT 1');

			$stmt->execute();
			if($stmt->rowCount() > 0){
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ echo $row["answer"];}
			}else{
				return 1;
			}
		}
			catch (PDOException $e){
				 echo "Error: " . $e->getMessage();
			}
			$conn = null;
		}


if ($qsam == "intro"){
		echo greetingSam();
} else if($qsam == "request name"){
		echo requestName();
}else if (strtok($qsam, ":") == "train"){
						trainingSam($qsam);
}else if($qsam != "intro" && $qsam != "request name" && strtok($qsam, ":") != "train"){
	checkDatabaseToo($qsam);
	if (checkDatabaseToo($qsam) == 1){
		if ( $keyword[$decisionValue[0]] == "what do time? time"){
								echo respondTime();
		}else if ( $keyword[$decisionValue[0]] == "what your do name ur name? call you your's" || $qsam == "your name" || $qsam == "name" || $qsam == "ur name" || $qsam == "ur name?"){
								echo respondName();
		} else if ( $keyword[$decisionValue[0]] == "my name name?"){
								echo "givename";
		}else if ( $keyword[$decisionValue[0]] == "version version? aboutbot"){
								echo "Version: 1.0";
		}else if ( $keyword[$decisionValue[0]] == "what are you you?"){
								echo "I'm a ChatBot";
		}else if ( $keyword[$decisionValue[0]] == "today today's date"){
								echo respondDate();
		}else if ( $keyword[$decisionValue[0]] == "i'm am fine okay doing great ok all good"){
								echo respondOkay();
		}else if ( $keyword[$decisionValue[0]] == "how are you"){
								echo respondGreeting();
		}else if (strtok($qsam, ":") == "name"){
					echo "nice name to meet you";
					$nameGuest = explode (":", $qsam);
					$guestName = $nameGuest [1];
					echo "$guestName" . ". How are you today?";

		}else if ( $keyword[$decisionValue[0]] == "still here you there codmax jnr samson"){
			echo repondName();
		}else if ( $keyword[$decisionValue[0]] == "newschool"){
			echo "oop! Sorry i don't understand you. But I'm a fast learner,
						you can train me in this format 'train: question # answer #password'";
		}
	}
}
}

////////////////////// END OF FUNCTION BY BROWN SAMSON ////////////////////////////////////


function getRandomFact(){
  $facts = ["Most toilets flush in E flat",
  "“Almost” is the longest word in English with all the letters in alphabetical order.",
  "All swans in England belong to the queen.",
  "No piece of square paper can be folded more than 7 times in half."];

  return $facts[rand(0, count($facts) - 1)];
}

// functions by @mclint_. DO NOT MODIFY
function getAJoke(){
    $jokes = ["My dog used to chase people on a bike a lot. It got so bad, finally I had to take his bike away.", "What is the difference between a snowman and a snowwoman? Snowballs.",
    "I invented a new word. Plagiarism.", "Helvetica and Times New Roman walk into a bar. 'Get out of here!' shouts the bartender. 'We don't serve your type.'",
     "Why don’t scientists trust atoms? Because they make up everything.", "Where are average things manufactured? The satisfactory.", "How do you drown a hipster? Throw him in the mainstream",
    "How does Moses make tea? He brews!", "Why can’t you explain puns to kleptomaniacs? They always take things literally.", "I got called pretty yesterday and it felt good! Actually, the full sentence was 'You're pretty annoying.' but I'm choosing to focus on the positive.",
    "Two cannibals eating a clown. 'Does this taste funny to you?'", "Why can’t you hear a pterodactyl in the bathroom? Because it has a silent pee.", "Where does a sheep go for a haircut? To the baaaaa baaaaa shop!"];

    return $jokes[rand(0, count($jokes) - 1)];
}

    //functions defined by @chigozie. DO NOT MODIFY!!!
    function getDayOfWeek(){
        return date("l");
    }

    function getDaysInMonth($month){
        $months_with_31_days = ["january", "march", "may", "july", "august", "october", "december"];
        $months_with_30_days = ["april", "june", "september", "november"];
        $other = ["february"];

        $month = strtolower(trim($month));
        if(in_array($month, $months_with_31_days)){
            return ucfirst($month)." has 31 days";
        }else if(in_array($month, $months_with_30_days)){
            return ucfirst($month)." has 30 days";
        }else if(in_array($month, $other)){
            $ans = "In a leap year, February has 29 days otherwise, it has 28 days. ";
            $ans .= "If you are asking about the current year ".date("Y").", then February has ";
            if(isCurrentYearLeap()){
                $ans .= "29 days";
            }else{
                $ans .= "28 days";
            }
            return $ans;
        }else{
            return "I don't recognize the month you entered";
        }
    }

    function isCurrentYearLeap(){
        $currrent_year = intval(date('Y'));
        if($currrent_year % 400 === 0){
            return true;
        }
        if($currrent_year % 100 === 0){
            return false;
        }
        if($currrent_year % 4 === 0){
            return true;
        }
        return false;
    }

// functions by john ayeni do not modify please


function get_current_time(){
    date_default_timezone_set('Africa/Lagos');
    $currentTime = date('Y-M-D H:i:s');
    return $currentTime;
}
/*end of
Adokiye's function*/







//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************THE WIZARD OF OZ********************************************************************************


function pig_latin($text){
  $vowels = "a,e,i,o,u";
  $pigText="";
  $intermediatePig="";
  $firstVowelPos=0;
  $frontConsonants="";


    $sentence=explode ( " " , $text );

for($h=0;$h<sizeof($sentence);$h++){
  for($i=0;$i<strlen($sentence[$h]);$i++){
    if(strpos($vowels,$sentence[$h][$i])!==FALSE){
      $firstVowelPos=$i;
      $intermediatePig=$intermediatePig.substr($sentence[$h],$firstVowelPos);
      if($i===0){
        $intermediatePig=$intermediatePig.$frontConsonants."yay";
      break;
      }
      $intermediatePig=$intermediatePig.$frontConsonants."ay";
      break;
    }

    else{
      $frontConsonants=$frontConsonants.$sentence[$h][$i];

    }

  }

  if($intermediatePig===""){
  $intermediatePig=$intermediatePig.$frontConsonants;

}

  $frontConsonants="";
  $pigText=$pigText.$intermediatePig." ";
  $intermediatePig="";
}



      return $pigText;


}



function find_place($query) {

// $apiKey="AIzaSyDlvWmwKX40qRKZQFRKP1qngWnTPKKWM5Y";
  $return="No results were found matching this query";
$display='block';

  $place=urlencode($query);
$placesUrl="https://maps.googleapis.com/maps/api/place/textsearch/json?query=".$place."&key=AIzaSyAAv9jKlS7LysppJQxkunTFQxihTgPLsek";

try{
$response = file_get_contents($placesUrl);
$parsed_response = json_decode($response, TRUE);



for($i=0;$i<sizeof($parsed_response['results']);$i+=2){

  if($i==0){
  $return="";
  }

  $firstName=$parsed_response['results'][$i]['name'];
  $firstRating=$parsed_response['results'][$i]['rating'];
  $firstAddy=$parsed_response['results'][$i]['formatted_address'];
  $firstType=$parsed_response['results'][$i]['types'][0];


  $secondName=$parsed_response['results'][$i+1]['name'];
  $secondRating=$parsed_response['results'][$i+1]['rating'];
  $secondAddy=$parsed_response['results'][$i+1]['formatted_address'];
  $secondType=$parsed_response['results'][$i+1]['types'][0];

  if(sizeof($parsed_response['results'])-$i==1 ){
  $display='none';
}


  $return='<div class="row">'

 .'<div class="col-xs-6 col-md-4">'
            .'<span>'.$firstName.'</span><br>'
            .'<span>'.$firstRating.' star rating</span><br>'
            .'<span>'.$firstAddy.'</span><br>'
            .'<span>'.$firstType.'</span><br>'
          .'</div>'
          .'<div class="col-xs-6 col-md-4" style="display:"'.$display.'">'
            .'<span>'.$secondName.'</span><br>'
            .'<span>'.$secondRating.' star rating</span><br>'
            .'<span>'.$secondAddy.'</span><br>'
            .'<span>'.$secondType.'</span><br>'
          .'</div>'
         .' </div>'.$return;

}

return $return;
}

catch(Exception $e){
  return $e;

}


}


function get_help(){

   return ' Some special functions I perform are: <br>'
          .'<ul><li><strong>Bot Version</strong><br>'
                .'Type <span id="important">aboutbot</span>'
            .'</li>'
              .'<li><strong>Translate English to Pig Latin</strong><br>'
                .'Type <span id="important">pig latin: word/sentence</span><br>'
                .'The variable is used like so <span id="important">{{variable}}</span> and function as <span id="important">(pig_latin)</span><br>'
             .'</li>'
              .'<li><strong>Place Locator</strong><br>'
                .'Used to find type of places in an area'
                .'Type <span id="important">find: place in area</span><br>'
                .'For example <span id="important">find: restaurants in nigeria</span><br>'
                .'<span id="important">find: hotels in yaba</span><br>'
                .'Also can find location of compnies or org e.g <span id="important">find: hotelsng in nigeria</span><br>'
                .'<span id="important">find: Chevron </span><br>'
                .'The variable is used like so <span id="important">{{variable}}</span> and function as <span id="important">(find_place)</span><br>'
              .'</li>'
               .'<li><strong>View available commands again</strong><br>'
                .'Type <span id="important">commands</span>'
            .'</li>'
          .'</ul>';
}

function get_bot_version(){

    $bot_version=1.9;

   return "Merlin Version : ".$bot_version;

}



//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************************************************************************************************************
//****************************************************************END********************************************************************************











/////////////////////////////////////////////////
////////////////////////////////////////////////
// functions by john ayeni do not modify please//
////////////////////////////////////////////////
////////////////////////////////////////////////

function aboutMe(){
  return "Hi my name is Ruby, I am a chatbot, nice to meet you";

}

function getBotMenu(){
  return  "Send 'fact' to get a fact. \n
    Send 'time' to get the time. \n
    Send 'about' to know me. \n
    Send 'help' to see this again. \n
    If its just a question send the question plain. \n
    To train me, send in this format => \n
    'train: question # answer # password'";
}

function getTime(){
  return date("h:i:s");
}

/******** End Adroit Bot Funct ********/

// end of functions by johnayeni



/////////////////////opheus //////////

if(isset($_GET['opheuslocation'])) {
echo $time = get_time($_GET['opheuslocation']);
}
elseif(isset($_GET['opheusweather'])) {
echo $weather = get_weather($_GET['opheusweather']);
}
elseif(isset($_GET['browser'])) {
echo $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
}
elseif(isset($_GET['opheustrain'])) {
	$message = $_GET['opheustrain'];
echo $train = train_bot($message);
}
elseif(isset($_GET['opheuscheck'])) {
	$check = $_GET['opheuscheck'];
echo $check = bot_answer($check);
}
elseif(isset($_GET['device'])) {
$browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
$device = get_device_name($_SERVER['HTTP_USER_AGENT']);
echo "you are currently using a ,".$browser.", browser on a  ,".$device.", Device.";
}


function bot_answer($check) {

require 'db.php';

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
 //   die("Connection failed: " . $conn->connect_error);
//}


global $conn;
$stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question='$check' ORDER BY rand() LIMIT 1");
$stmt->execute();
if($stmt->rowCount() > 0)
{
  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
		echo $row["answer"];
  }
} else {
    echo "Well i couldnt understand what you asked. But you can teach me.";
	echo "Type ";
	echo "train: write a question | write the answer.  ";
	echo "to teach me.";
}
}









function train_bot ($message) {
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}



require 'db.php';




//And output will be like this:
// Array
// (
//    [0] => here is a sample
//    [1] =>  this text
//    [2] =>  and this will be exploded
//    [3] =>  this also
//    [4] =>  this one too
//    [5] => )
// )

}



function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Other';
}



// Usage:


function get_device_name($user_agent)
{
    if (strpos($user_agent, 'Macintosh') || strpos($user_agent, 'mac os')) return 'Mac';
    elseif (strpos($user_agent, 'Linux')) return 'Linux';
    elseif (strpos($user_agent, 'Windows NT')) return 'Windows';
    elseif (strpos($user_agent, 'iPhone')) return 'iPhone';
    elseif (strpos($user_agent, 'Android')) return 'Android';
    elseif (strpos($user_agent, 'iPad') ) return 'iPad';

    return 'Other';
}

///////////////////////end of opheus ////////////////////
?>
