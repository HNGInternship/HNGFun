<?php
function get_time(){
  //instantiate date-time object
  $datetime = new DateTime();
  //set the timezone to Africa/Lagos
  $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
  //format the time
  return $datetime->format('H:i: A');
}
////////////////////////////////
// END OF JOHN AYENI FUNCTIONS//
////////////////////////////////
*/

/////////////////////////////////////////
//Beginning Aniuchi A. M's Functions/////
////////////////////////////////////////
function getCurrentDateAndTime(){
    $newDate = date("l jS \of F Y");
    $newTime = date("h:i:s A");
    echo "Today's date is " . $newDate . ". The time is " . $newTime;
    //A.M.A
}
function getCurrentDayOfTheWeek(){
    $newDate = date("l");
    echo "Today is a " . $newDate;
}
function getFutureDate(){
    $newDate = date("Y-m-d");
    $newdate = date_create($newDate);
    date_add($newDate,date_interval_create_from_date_string("7 days"));
    echo "A week from now, the date will be: " . date_format($newDate, "l jS \of F Y");
    //A.M.A
}

function getRandomYoMamaJoke(){
	$randomJokeJson = file_get_contents("http://api.yomomma.info");
	$randomJoke = json_decode($randomJokeJson);
    echo $randomJoke->joke;	
    //A.M.A
}

function getRandomQuote(){
	$randomQuoteJson =file_get_contents("https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en&json=?");
	$randomQuote = json_decode($randomQuoteJson);
	$quoteText = $randomQuote->quoteText;
    $quoteAuthor = $randomQuote->quoteAuthor;
    if(!empty($quoteAuthor) ){
        echo "<br/>" .$quoteText. "<br/> &nbsp; &nbsp; &ndash; <cite>" .$quoteAuthor. "</cite>";
    }
    else  echo "<br/>" .$quoteText. "<br/> &nbsp; &nbsp; &ndash; <cite>Unknown Author</cite>" ;
    //A.M.A
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

function getMotivationalQuoteForTheDay(){
	$randomQuoteJson =file_get_contents("http://quotes.rest/qod.json?category=inspire");
	$randomQuote = json_decode($randomQuoteJson, true);
	$quoteTitle = $randomQuote['contents']['quotes'][0]['title'];
	$quoteText = $randomQuote['contents']['quotes'][0]['quote'];
    $quoteAuthor = $randomQuote['contents']['quotes'][0]['author'];
    echo "</br>" .$quoteText. "<br/> &nbsp; &nbsp; &mdash; " .$quoteAuthor. "<br/>";
    //A.M.A
}

function getMediumArticle(){
	$getMediumUrlContents = file_get_contents("https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fmedium.com%2Ffeed%2F%40adamichelllle");
	$getMediumJson = json_decode($getMediumUrlContents, true);
	foreach($getMediumJson['items'] as $getSingleMediumArticle){
		$mediumArticleTitle = $getSingleMediumArticle['title'];
		$mediumArticleUrl = $getSingleMediumArticle['link'];
		$mediumArticleThumbnail = $getSingleMediumArticle['thumbnail'];
		echo "<a href= '$mediumArticleUrl' style='color: #ffffff'><img src='http://res.cloudinary.com/missada/image/upload/v1524225094/hng_internship.png' class= 'img-responsive' ><br/><b>$mediumArticleTitle</b></a>"; 
		$article = "<script type='text/Javascript'>window.open('$mediumArticleUrl');</script>";
		break;
    }
    //A.M.A

}
function getPinkyCommands(){
    echo "Hi there! You can ask me to do one of the following: <br/> 1. Get or tell you <b>today's date and current time</b> </br/> 
    2. Get <b>motivational quote of the day.</b> or <b>inspire me today</b> <br/> 3. Get my creator <b>Ada's latest medium article</b> <br/>
    4. Get or tell you<b> a random Yo Momma Joke</b>. <br/> 5. Get or tell you <b>what day of the week it is.</b> <br/>
    6. Get the <b>date seven days or a week from now.</b> <br/> 7.Get or tell you<b> a random quote.</b> <br/>
    8. Tell you version of the bot <b>aboutbot</b><br/>
    NB. All or some of the words in bold should be included in your message. Please try to follow these patterns as I am still learning.";
    //A.M.A
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


///////////////////////////////
//End Aniuchi A. M's Functions/
///////////////////////////////



#####################################################################################################
#                                                                                                   #
#           CHRISTOPH'S FUNCTION ENDS HERE    |    DON'T TAMPER WITH THE FUNCTIONS BELOW            #
#                                                                                                   #
#####################################################################################################

function calculate_distance($key, $url, $location1, $location2) {
    $request_distance = $url.$location1."+Nigeria&destinations=$location2+Nigeria"."&key=".$key;
    $response  = json_decode(file_get_contents($request_distance), 1);
    $status = $response['status'];
    if ($status === 'OK' and $response['rows'][0]['elements'][0]['status'] === 'OK') {
        $distance = $response['rows'][0]['elements'][0]['distance']['text'];
        return $distance;
    }
    // If no match, return error message
    else {
        $message = ["I couldn't calculate the distance for given location, could you be more specific? \n \n You could add City name or State or Country to be more accurate", "The addresses you gave me are quite complex. \n \n Why don't you add a city or state or even a country for me to get it correctly", "I couldn't really calculate this. \n \n Why? the addresses you gave me are rather too complex. \n \n You can include the city, state or country and watch me do magic"];
        return nl2br($message[rand(0, 2)]);
    }
}

function get_duration ($key, $url, $location1, $location2, $mode) {
    $request_duration = $url.$location1."&destinations=$location2"."&key=".$key."&mode=".$mode."&departure_time=now";
    $response = json_decode(file_get_contents($request_duration), 1);
    $status = $response['status'];
    if ($status === 'OK' and $response['rows'][0]['elements'][0]['status'] === 'OK') {
        $duration = $response['rows'][0]['elements'][0]['duration_in_traffic']['text'];
        return $duration;
    }
    // If no match, return error message
    else {
        $message = ["Sorry, I currently can't retrieve the duration for this trip as I don't have enough information"];
        return $message;
    }
}


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

function show_direction ($location1, $location2, $mode) {
    return "https://www.google.com/maps/dir/?api=1&origin=$location1&destination=$location2&travelmode=$mode";

}


function davidQuadraticEquation($a, $b, $c){  #Remember I know where you live if you tamper with this function
     $discriminat = pow($b,2) - (4 * $a * $c);
     if($discriminat == 0){
         $x = -($b/(2 * $a));
         return $x; 
     }
     else {
         $root = sqrt($discriminat);
         $x1 = (-$b + $root) / (2 *$a);
         $x2 = (-$b - $root) / (2 *$a);
         return 'x1 is ' + $x1 + 'and' + 'x2 is ' + $x2; 
     }
    
     
 }

#####################################################################################################
#                                                                                                   #
#           CHRISTOPH'S FUNCTION ENDS HERE    |    DON'T TAMPER WITH THE FUNCTIONS ABOVE            #
#                                                                                                   #
#####################################################################################################

##########################################################################
# Sunday @Nectar Space starts Here: Pls don't touch
##########################################################################

function cleanInput($question){
    return $question;
}
function commandCheck($question){
    $command = null;

    if ($question[0] === '#'){
        $command = 'Train';
    }elseif($question[0] === 'H'){
        $command = 'Help';
    }
    
    return $command;
}

##########################################################################
# Sunday @Nectar Ends Here: Pls don't touch
##########################################################################


?>
=======
