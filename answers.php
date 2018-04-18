<?php
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
}

function getRandomFact(){
  $facts = ["Most toilets flush in E flat",
  "“Almost” is the longest word in English with all the letters in alphabetical order.",
  "All swans in England belong to the queen.",
  "No piece of square paper can be folded more than 7 times in half."];

  return $facts[rand(0, count($facts) - 1)];
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

//$text = "#train: this a question | this my answer :)";
$exploded = multiexplode(array(":","|"),$message);

$question = trim($exploded[1]);

$answer = trim($exploded[2]);

require 'db.php';

try {
    
    $sql = "INSERT INTO chatbot (id, question, answer)
VALUES ('', '$question', '$answer')";
    // use exec() because no results are returned
    $conn->exec($sql);
    
    echo "Thank you! i just learnt something new, my master would be proud of me.";
	
	}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
$conn = null;
//////////////////////


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


/*
|=================================================================|
|              JIM (JIMIE) Functions Begins                       |
|=================================================================|
*/
function inspire() {
    $inspirations = [
        'It is during our darkest moments that we must focus to see the light. \\n - Aristotle',
        'Start by doing what\'s necessary; then do what\'s possible; and suddenly you are doing the impossible. \\n - Francis of Assisi',
        'I can\'t change the direction of the wind, but I can adjust my sails to always reach my destination. \\n - Jimmy Dean',
        'Put your heart, mind, and soul into even your smallest acts. This is the secret of success. \\n - Swami Sivananda',
        'The best preparation for tomorrow is doing your best today. \\n - H. Jackson Brown, Jr',
        'Optimism is the faith that leads to achievement. Nothing can be done without hope and confidence. \\n - Helen Keller',
        'Failure will never overtake me if my determination to succeed is strong enough. \\n - Og Mandino',
        'It does not matter how slowly you go as long as you do not stop. \\n - Confucius',
        'Either I will find a way, or I will make one. \\n - Philip Sidney',
        'It always seems impossible until it\'s done. \\n - Nelson Mandela',
        'Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy. \\n - Norman Vincent Peale',
        'The secret of getting ahead is getting started. \\n - Mark Twain',
        'Accept the challenges so that you can feel the exhilaration of victory. \\n - George S. Patton',
        'A creative man is motivated by the desire to achieve, not by the desire to beat others. \\n - Ayn Rand',
        'Your talent is God\'s gift to you. What you do with it is your gift back to God. \\n - Leo Buscaglia',
        'Keep your eyes on the stars, and your feet on the ground. \\n - Theodore Roosevelt',
        'Quality is not an act, it is a habit. \\n - Aristotle',
        'We may encounter many defeats but we must not be defeated. \\n - Maya Angelou',
        'Never retreat. Never explain. Get it done and let them howl. \\n - Benjamin Jowett',
        'The most effective way to do it, is to do it. \\n - Amelia Earhart',
        'If you can dream it, you can do it. \\n - Walt Disney',
        'Two roads diverged in a wood, and I took the one less traveled by, And that has made all the difference. \\n – Robert Frost',
        'You miss 100% of the shots you don’t take. \\n – Wayne Gretzky',
    ];
    return $inspirations[array_rand($inspirations)];
}

function get_current_time() {
    date_default_timezone_set("Africa/Lagos");
    return date('h:i:s A');
}

function get_btc_rates() {
    $response = file_get_contents('https://bitaps.com/api/ticker/average');
    $data = json_decode($response, true);
    $otherCurs = array_shift($data);

    $usd = number_format($data['usd']);
    $eur = number_format($otherCurs['eur']);
    $rub = number_format($otherCurs['rub']);
    $try = number_format($otherCurs['try']);

   return "1 BTC = {$usd} USD | {$eur} EURO | {$rub} RUB | {$try} TRY";
}
/*
|=================================================================|
|               JIM (JIMIE) Functions Ends                        |
|=================================================================|
*/

?>