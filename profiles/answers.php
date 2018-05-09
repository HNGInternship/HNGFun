<?php
function get_time(){
  //instantiate date-time object
  $datetime = new DateTime();
  //set the timezone to Africa/Lagos
  $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
  //format the time
  return $datetime->format('H:i:A');
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
}

function bamiiCountryDetails($data) {
    $country_arr = explode(' ', $data);
    $country_index= array_search('details', $country_arr) + 1;
    $country = $country_arr[$country_index];
    $country_temp = str_replace('details', "", $data);
    $country2 = trim($country_temp);

    $string = 'http://api.worldweatheronline.com/premium/v1/search.ashx?key=1bdf77b815ee4259942183015181704&query='. $country2 .'&num_of_results=2&format=json';

    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );
    $geocodeUrl = "http://api.worldweatheronline.com/premium/v1/search.ashx?key=1bdf77b815ee4259942183015181704&query=lagos&num_of_results=2&format=json";
    $response = file_get_contents($geocodeUrl, false, stream_context_create($arrContextOptions));

    $a =json_decode($response, true);

    $longitude = $a['search_api']['result'][0]['longitude'];
    $latitude = $a['search_api']['result'][0]['latitude'];
    $name = $a['search_api']['result'][0]['areaName'][0]['value'];
    $country_name = $a['search_api']['result'][0]['country'][0]['value'];
    $population = $a['search_api']['result'][0]['population'];


    return('
        '. ($name ? 'Name :'. $name . '<br />' : null) .'
        Country: ' . $country_name . ' <br />
        Latitude: ' . $latitude . ' <br />
        Longitude: ' . $longitude . ' <br />
        Population: ' . $population . '<br />
    ');
}

###################### END BAMII #####################

function getListOfCommands() {
  return 'Type "<code>show: List of commands</code>" to see a list of commands I understand.<br/>
  Type "<code>open: www.google.com</code>" to open Google.com<br/>
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

//functions by melas. MODIFY NOT
function aboutHNG()
{
    return 'The HNG is a 3-month remote internship program designed to locate the most talented software developers in Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam). We create fun challenges every week on our slack channel. THose who solve them stay on. Everyone gets to learn important concepts quickly, and make connections with people they can work with in the future. The intern coders are introduced to complex programming frameworks, and get to work on real applications that scale. the finalist are connected to the best companies in the tech ecosystem and get full time jobs and contracts immediately.';
}

function aboutHNGStage($stage)
{
    $stages = [];

    $stages[1] = '* Set your picture and name on the Slack channel</br>';
    $stages[1] .= '* Setup a github account</br>';
    $stages[1] .= '* Install git and get git running on your system</br>';
    $stages[1] .= '* Make a figma account</br>';
    $stages[1] .= '* Download and install WAMP, LAMP or equivalent</br>';
    $stages[1] .= '* Ask @xyluz to add you to the github organisation</br>';
    $stages[1] .= '* Add your name to the contributors file: Full name, Slack Name and github name, comma delimited</br>';
    $stages[1] .= '* Join the #stage1 channel on Slack</br>';
    $stages[1] .= '* Proceed to do #stage2';

    $stages[2] = 'Make sure you have complete all #stage1 tasks. Ask all questions on how to achieve #stage2 in the #stage1 channel.<br/>';
    $stages[2] .= 'The goal of #stage2 is the achieve this:<br/><br/>';
    $stages[2] .= 'Create hng.fun/profile/<yourusername>This should be a simple html page with your photo, your name, your slack username and your biography.';
    $stages[2] .= 'Also link to the results of your <b>#stage1</b>. You should have your own css file and your own html page (unlinked to anyone elses)<br/>';
    $stages[2] .= 'Modify the participants page to include a link to your page<br/>';
    $stages[2] .= 'Submit your work in <b>#reviews channel</b>. Your submission should link to your personal profile page, as well as the participants page which shows your name there';

    $stages[3] = '1. clone repo - git clone https://github.com/HNGInternship/HNGFun<br/>';
    $stages[3] .= '2. if you have phpmyadmin, run - localhost/phpmyadmin. login to your phpmyadmin<br/>';
    $stages[3] .= '3. create a new database using phpmyadmin - name of the database is hng_fun<br/>';
    $stages[3] .= '4. from phpmyadmin upload and run the hng_fun.sql file in the project folder. This will create two tables in the database - interns_data and secret_word<br/>';
    $stages[3] .= '5. use phpmyadmin to insert data (name, username, image_filename) - this is only for testing locally, however, it is preferable to use the real data you\'ll fill in the hng.fun.admin.php form. The image file should be uploaded to your cloudinary account and only the link used in the project.<br/>';
    $stages[3] .= '6. open config.example.php in the projects directory, copy the content(db configurations)<br/>';
    $stages[3] .= '7. create a config.php file and paste the content there, make sure to set the config to suite your local environment. don\'t worry, the .gitignore file automatically ignore the config.php file you create when you push to the repo. however, check the .gitignore file to be sure that config.php is there to be safe.<br/>';
    $stages[3] .= '8. create your username.php file - username here is your slack username(display name)<br/>';
    $stages[3] .= '9. create your profile using html and css - note css and js used must be in the same file, don\'t create another file or edit any other file in the project folder<br/>';
    $stages[3] .= '10. use php to query your name, username, image_file from the interns_data table on your database.<br/><br/>';

    $stages[3] .= '<b>Note:<b/> you do not need to import the config.php file or the db.php file, it is already done for you in the profile.php file that will load your page<br/>';
    $stages[3] .= '11. query the secret_word table for the secret word and store your results in a variable called $secret_word<br/>';
    $stages[3] .= '12. go to hng.fun/admin.php and fill in the details in the form. the key code is - 1n73rn@Hng<br/><br/>';

    $stages[3] .= 'HINT: check the profile.php file and admin.php for example on how to query the database<br/>';
    $stages[3] .= 'DO NOT EDIT OR DELETE ANY OTHER FILE,<br/>';
    $stages[3] .= 'WHEN YOU RUN GIT STATUS, MAKE SURE THE ONLY FILE SHOWING IS YOUR USERNAME.PHP FILE<br/>';
    $stages[3] .= 'DO NOT EDIT ANY OTHER FILE. <br/>';
    $stages[3] .= 'IF YOU NEED ANY OTHER CLARIFICATION, DM A COLLEAGUE OR A MENTOR.<br/>';
    $stages[3] .= 'MAKE SURE ALL IMAGES ARE FROM CLOUDINARY<br/>';

    $stages[4] = 'Add a form to your profile page. This form is the interface of a chat-bot. When a question is asked of this chat-bot, you check the database if that question exists, and if it does, retrieve the answer and display it.<br/>';
    $stages[4] .= 'Everyone is sharing the same question and answer database. Using your text field, it is also possible to train the bot - simply type ‘train’ before the text, and then the question and the answer, using # as a delimiter. You do not need to use Ajax for this part.<br/>';
    $stages[4] .= 'For extra points, make it possible to call a function as a response. For example, you could ask the bot -“What time is it?” and it retrieves the current time. This will be possible by adding the function in a file called “answers.php”. In there, add the function, which returns a text result.<br/>';
    $stages[4] .= 'To activate a function, use the training syntax: train: what is the time? # The time is ((get_time)).';

    switch($stage) {
        case 1:
        case 2:
        case 3:
        case 4:
            return $stages[$stage] . '<br/><br/>Goodluck';
        default:
            return 'I don\'t have instructions for this stage yet. Please try again';
    }
}
//End of functions by melas

// functions by @mclint_. DO NOT MODIFY
function getAJoke(){
    $jokes = ["My dog used to chase people on a bike a lot. It got so bad, finally I had to take his bike away.", "What is the difference between a snowman and a snowwoman? Snowballs.",
    "I invented a new word. Plagiarism.", "Helvetica and Times New Roman walk into a bar. 'Get out of here!' shouts the bartender. 'We don't serve your type.'",
     "Why don’t scientists trust atoms? Because they make up everything.", "Where are average things manufactured? The satisfactory.", "How do you drown a hipster? Throw him in the mainstream",
    "How does Moses make tea? He brews!", "Why can’t you explain puns to kleptomaniacs? They always take things literally.", "I got called pretty yesterday and it felt good! Actually, the full sentence was 'You're pretty annoying.' but I'm choosing to focus on the positive.",
    "Two cannibals eating a clown. 'Does this taste funny to you?'", "Why can’t you hear a pterodactyl in the bathroom? Because it has a silent pee.", "Where does a sheep go for a haircut? To the baaaaa baaaaa shop!"];

    return $jokes[rand(0, count($jokes) - 1)];
}

function emojifyText($text){
    $url = "http://torpid-needle.glitch.me/emojify/{$text}";
    return file_get_contents($url);
}

function rollADice(){
    return rand(1, 6);
}

function flipACoin(){
    return rand(0,1) === 1 ? "Heads" : "Tails";
}

function predictOutcome($battle){
    $players = explode('vs', $battle);

    if(count($players) >= 2){
        return $players[rand(0, count($players) - 1)];
    }

    return "Uhh.. nope. You've provided invalid prediction data.";
}
// End of functions by @mclint_

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

/***************************Bytenaija Start here*************************/
//bytenaija time function
function bytenaija_time($location) {
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

     $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=".$location. "&sensor=true&key=AIzaSyCWLZLW__GC8TvE1s84UtokiVH_XoV0lGM";
     $response = file_get_contents($geocodeUrl, false, stream_context_create($arrContextOptions));
     $response = json_decode($response, true);


     $response = $response['results'][0]['geometry'];

     $response = $response["location"];
     $lat = $response["lat"];
     $lng = $response["lng"];
     $timestamp = time();;

     $url = "https://maps.googleapis.com/maps/api/timezone/json?location=".$lat.",".$lng."&timestamp=".$timestamp."&key=AIzaSyBk2blfsVOf_t1Z5st7DapecOwAHSQTi4U";
     $responseJson = file_get_contents($url,  false, stream_context_create($arrContextOptions));
     $response = json_decode($responseJson);
     $timezone = $response -> timeZoneId;
     $date = new DateTime("now", new DateTimeZone($timezone));
     echo "The time in ".ucwords($location). " is ".$date -> format('d M, Y h:i:s A');

 }

 function bytenaija_convert($base, $other){
     $api_key = "U7VdzkfPuGyGz4KrEa6vuYXgJxy4Q8";
     $url = "https://www.amdoren.com/api/currency.php?api_key=" . $api_key . "&from=" . $base . "&to=" . $other;

     $response = file_get_contents($url);
     $response = json_decode($response, true);
     echo "1 ". strtoupper($base) ." is equal to ".  strtoupper($other)  ." " .$response['amount'];
 }

 //bitcoin price index
 function bytenaija_hodl(){
     $url ="https://api.coindesk.com/v1/bpi/currentprice.json";

     $response = file_get_contents($url);
     $response = json_decode($response, true);
     //curl_close($curl);
     $responseStr = "<h4 class='hodl'>Bitcoin Price as at " . $response["time"]["updated"] . "</h4><br> <div><h4>Prices</h4><li>"
     . $response["bpi"]["USD"]["code"] . " " . $response["bpi"]["USD"]["rate"] . "</li>
     <li>"
     . $response["bpi"]["EUR"]["code"] . " " . $response["bpi"]["EUR"]["rate"] . "</li>
     <li>"
     . $response["bpi"]["GBP"]["code"] . " " . $response["bpi"]["GBP"]["rate"] . "</li>
     </div>";
     echo $responseStr;
 }

/***************************Bytenaija ends here*************************/

/* Adokiye's function starts here, do not edit
for any reason*/
function myCreator(){
    return "Adokiye is my creator he is currently in stage 4 of the HNG internship, he will soon advance to stage 5";
}

function get_current_time(){
    date_default_timezone_set('Africa/Lagos');
    $currentTime = date('Y-M-D H:i:s');
    return $currentTime;
}
/*end of
Adokiye's function*/


/////////////////////////////////////////////////
////////////////////////////////////////////////
// functions by john ayeni do not modify please//
////////////////////////////////////////////////
////////////////////////////////////////////////
function aboutMe(){
  return "Hi my name is Ruby, I am a chatbot, nice to meet you";
}


function getRandomFacts(){
  $facts = ["Most toilets flush in E flat",
  "“Almost” is the longest word in English with all the letters in alphabetical order.",
  "All swans in England belong to the queen.",
  "No piece of square paper can be folded more than 7 times in half."];
  return $facts[rand(0, count($facts) - 1)];
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
////////////////////////////////
// END OF JOHN AYENI FUNCTIONS//
////////////////////////////////

function getCurrentDateAndTime(){
    $newdate = date("l jS \of F Y h:i:s A");
    echo "Today's date is " . $newdate;
    //A.M.A
}
function getCurrentDayOfTheWeek(){
    $newdate = date("l");
    echo "Today's is a " . $newdate;
}
function getFutureDate(){
    $newdate = date("Y-m-d");
    $newdate = date_create($newdate);
    date_add($newdate,date_interval_create_from_date_string("7 days"));
    echo "A week from now, the date will be: " . date_format($newdate, "l jS \of F Y");
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
    echo "Hi there! You can ask me to do one of the following: <br/> 1. Get or tell you <b>today's date and time</b> </br/> 
    2. Get <b>motivational quote of the day.</b> <br/> 3. Get my creator <b>Ada's latest medium article</b> <br/>
    4. Get or <b>tell you a random Yo Momma Joke</b>. <br/> 5. Get or tell you <b>what day of the week it is.</b> <br/>
    6. Get the <b>date seven days or a week from now.</b> <br/> 7.Get or <b>tell you a random quote.</b><br/>
    NB. All or some of the words in bold should be included in your message.";
    //A.M.A
}


//////////////////////  VICTOR JONAH ///////////////////////////////////
/////////////////////                ///////////////////////////////////
////////////////////                 ///////////////////////////////////
///////////////// If you want to touch 
///////////////// anything, don't touch ////////////////////////////////
/////////////////         this side    /////////////////////////////////

function getBotInfo() {
    $bot_version = 1.01;
    return: "This is Vector, version " .$bot_version;
}
function getBotManual() {
        return  "Send 'location' to get your location. \n
          Send 'time' to get the time. \n
          Send 'about' to know me. \n
          Send 'help' to see this again. \n
          Send 'age' to know my age. \n
          If its just a question send the question plain. \n
          To train me, send in this format => \n
          'train: question # answer # password'";
}
function getAge() {
        return: "Vectormike is 20 years old. \n
        Vector is " .$bot_version;
}
function getTime() {
    return: date(h:i:sA);
}

///////////////////// THE END /////////////////////////////
//////////////////////////////////////////////////////////
?>