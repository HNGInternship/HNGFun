<?php
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
function get_time(){
    //instantiate date-time object
    $datetime = new DateTime();
    //set the timezone to Africa/Lagos
    $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
    //format the time
    return $datetime->format('H:i: A');
}

///////////////JONAH VICTOR VICTOR//////////////////
////////////////                    /////////////////
///////////////                     /////////////////
///////////////     vectormike     /////////////////
////////////////                  //////////////////
////////////////                  //////////////////
/////// If you want to touch something, 
///////      don't touch this side  ///////////////// 




///////////////////////////////////////////////////////////////////
/////////////////// THE    END ////////////////////////////////////
///////////////////////////////////////////////////////////////////





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
    return date("h:i:s a");
}
function simpleMaths($operation, $expression){
    switch ($operation) {
        case 'factor':
            # factorization condition
            $notify = "Factorize";
            break;
        case 'simplify':
            # simplify
            $notify = "Simplify";
            break;
        case 'derive':
            # derivative
            $notify = "Derivative";
            break;
        case 'integrate':
            # Integrate
            $notify = "Integrate";
            break;
        case 'zeroes':
            # polinomia
            $notify = "Polinomial, find 0S in";
            break;
        case 'tangent':
            # tangent
            $notify = "Find Tangent";
            break;
        case 'log':
            # logrithms
            $notify = 'Logarithm';
            break;
        default:
            # code...
            break;
    }
    $url = "https://newton.now.sh/".$operation."/".$expression;
    $result = file_get_contents($url);
    $response = json_decode($result, true);
    echo json_encode([
        'question' => $notify." : ".$response['expression'],
        'answer' =>"Your answer is: ".$response['result']
    ]);
}
/******** End Adroit Bot Funct ********/
/*
// end of functions by johnayeni
//////////////////////////// BROWN SAMSON DO NOT MODIFY ////////////////////////////////////
$qsam = $_REQUEST["qsam"];
$anwerSam = "";
if ($qsam === "Moses"){
		$anwerSam = 'Nice Name, How are you ' . $qsam;
}
echo $anwerSam;
////////////////////// END OF FUNCTION BY BROWN SAMSON ////////////////////////////////////
/////////////////////opheus //////////
if(isset($_GET['opheuslocation'])) {
echo $time = get_time($_GET['opheuslocation']);
}
elseif(isset($_GET['opheusweather'])) {
echo $weather = get_weather($_GET['opheusweather']);

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
#           CHRISTOPH'S FUNCTION BEGINS HERE    |    DON'T TAMPER WITH THE FUNCTIONS BELOW          #
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

function show_direction ($location1, $location2, $mode) {
    return "https://www.google.com/maps/dir/?api=1&origin=$location1&destination=$location2&travelmode=$mode";

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

#####################################################################################################
#                                                                                                   #
#           CHRISTOPH'S FUNCTION ENDS HERE    |    DON'T TAMPER WITH THE FUNCTIONS ABOVE            #
#                                                                                                   #
#####################################################################################################


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


function davidQuadraticEquation($a, $b, $c)
{  #Remember I know where you live if you tamper with this function
    $discriminat = pow($b, 2) - (4 * $a * $c);
    if ($discriminat == 0) {
        $x = -($b / (2 * $a));
        return $x;

    } else {
        $root = sqrt($discriminat);
        $x1 = (-$b + $root) / (2 * $a);
        $x2 = (-$b - $root) / (2 * $a);
        return 'x1 is ' + $x1 + 'and' + 'x2 is ' + $x2;
    }
}


/*
    function trainingSam($newmessage){
        require 'db.php';
        $message = explode('#', $newmessage);
        $question = explode(':', $message[0]);
        $answer = $message[1];
        $password = $message[2];

        $question[1] = trim($question[1]);
        $password = trim($password);
        if ($password != "password"){
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

            $stmt = $conn->prepare('select answer FROM chatbot WHERE (question LIKE "%'.$question.'%") LIMIT 1');

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
    }else if ( $keyword[$decisionValue[0]] == "what do time? time"){
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
    }else if($qsam != "intro" && $qsam != "request name" && strtok($qsam, ":") != "train"){
        $te = checkDatabaseToo($qsam);
        if ($te == 1){
            if ( $keyword[$decisionValue[0]] == "i'm am fine okay doing great ok all good"){
                echo respondOkay();
            }else if ( $keyword[$decisionValue[0]] == "how are you"){
                echo respondGreeting();
            }else if (strtok($qsam, ":") == "name"){
                echo "nice name, also nice to meet you";
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
*/

////////////////////// END OF FUNCTION BY BROWN SAMSON ////////////////////////////////////



////////////////////FUNCTIONS BY ADEYEFA OLUWATOBA///////////////////////////////////

function GetCryptoPrice($from, $to) {
    $from = (trim(strtoupper($from)));
    $to = (trim(strtoupper($to)));
    $url = 'curl -s -H "CB-VERSION: 2017-12-06" "https://api.coinbase.com/v2/prices/'.$from.'-'.$to.'/spot"';
    $tmp = shell_exec($url);
    $data = json_decode($tmp, true);
    if ($data && $data['data'] && $data['data']['amount']) {
        return (float)$data['data']['amount'];
    }
    return null;
}
///////////////END OF FUNCTION BY ADEYEFA OLUWATOBA////////////////////////////////



/***************************john code begins here*************************/


//to check if the data was sent to the server
// Please place ur code in a function
function johnsCode()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


// to if the post request is not empty 


            if (!isset($_POST['question'])) {
                echo json_encode([
                    'status' => 1,
                    'answer' => "Please provide a question"
                ]);
                return;
            }

            $questions = $_POST['question'];
            $question = strtolower($questions);
  }
}

    /////////////////////////////FUNCTIONS COMES FIRST////////////////////////////////////////////////////////////////


    // All the functions goes here

            function before($thiss, $inthat)
            {
                return substr($inthat, 0, strpos($inthat, $thiss));
             };
             function after ($thiss, $inthat)
            {
                if (!is_bool(strpos($inthat, $thiss)))
                return substr($inthat, strpos($inthat,$thiss)+strlen($thiss));
             };
             function between ($thiss, $that, $inthat)
                {
                return before ($that, after($thiss, $inthat));
                };
            function after_last ($thiss, $inthat)
                 {
                    if (!is_bool(strrevpos($inthat, $thiss)))
                    return substr($inthat, strrevpos($inthat, $thiss)+strlen($thiss));
                };

//use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};

        function trainings($check)
        {
            $password="password";
            $newquestion= between(':', '#', $check);
            $newanswer= between('#', '#', $check);
            $newpassword= after_last('#', $check);
            if ($password==$newpassword)
                {
                    try {
                        require 'db.php';

                            $sql = "INSERT INTO chatbot (id, question, answer) VALUES ('', '$newquestion', '$newanswer')";
                            // use exec() because no results are returned
                            $conn->exec($sql);
                            $res = "Thanks for training me";
                            return $res;

                        }
                    catch(PDOException $e)
                            {
                            echo $sql . "<br>" . $e->getMessage();
                            }

                }
            else
                {
                    $res = "Please enter a password and train me using train:question#answer#password this should be without space";
                    return $res;
                }
        }
        function getAns($check){
                require 'db.php';


                $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question= '$check' ORDER BY rand() LIMIT 1");
                $stmt->execute();
                if($stmt->rowCount() > 0)
                {
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                  {
                        $res=$row["answer"];

                        return $res;
                  }

                }
                else {
                    $res="I don't seem understand what you asked. But you can train me.<br>Type<br>train:question#answer#password";
                    return $res;
                }


            }

            function getLocationAPI() {
                $ip = gethostbyname(gethostname());
                $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
                return $query;
            }



    function currencyConverter($from_currency, $to_currency, $amount) {
        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $encode_amount = 1;
        $get = file_get_contents("https://finance.google.com/bctzjpnsun/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
        $get = explode("<span class= bld>",$get);
        $get = explode("</span>",$get[1]);
        $rate = preg_replace("/[^0-9\.]/", null, $get[0]);
        $rate = (float)$rate;
        $res = $amount*$rate;
        return $res;
    }


function weather($country,$city){
    $client = new SoapClient("http://www.webservicex.net/globalweather.asmx?wsdl");
    $params = new stdClass;
    $params->CityName= $city;
    $params->CountryName= $country;
    $res = $client->GetWeather($params);
    // Check for errors...
    $weatherXML = $result->GetWeatherResponse;
    return $res;
}

////////-----Osawaru's function------////////
function getLatestNews() {
    global $news,$err;
    $api = 'https://newsapi.org/v2/top-headlines?sources=business-insider&apiKey=0b02db71635441abafa624c218e64192';
    $data = file_get_contents($api);
    $news = json_decode($data,true);
    return $news;
}
/////////////////////////////////////////////
/////////////////////////////FUNCTIONS ENDS HERE/////////////////////////////////////////////////////////////////


/////////////////////// Conditions for checking input//////////////////////////////////////////////

///////////////////To check if the statement begins with train://///////////////////////

//Please place code in a a function
//        if (preg_match("/^train:/", $question))
//        {
//
//            $question = preg_replace( '/\s+/','', $question);
//            $res = training($question);
//            echo json_encode([
//            'status' => 1,
//            'answer' => $res
//            ]);
//            return;
//
//        }
//
//        elseif (preg_match("/^about/", $question))
//        {
//           echo json_encode([
//            'status' => 1,
//            'answer' => "Robot Version1"
//            ]);
//            return;
//        }
//        elseif (preg_match("/^currency/", $question)){
//
//             $question = preg_replace( '/\s+/','', $question);
//             $from_currency= between("(", "," , "$question");
//            $to_currency= between(",", "," , "$question");
//            $amt= between(",", ")" , "$question");
//            $amount= (float)$amt;
//            $res= currencyConverter($from_currency,$to_currency,$amount);
//            echo  json_encode([
//                'status'=>1,
//                'answer'=> $res
//            ]);
//            return;
//        }
//        elseif(preg_match("/^weather/", $question)){
//            $country=between("(", ",", $question);
//            $city= between(",", ")", $question);
//            $res= weather($country,$city);
//            echo json_encode([
//                'status'=>1,
//                'answer' =>$res
//            ]);
//            return;
//        }
//
//        else{
//            $res= getAns($question);
//            echo json_encode([
//            'status' => 1,
//            'answer' => $res
//            ]);
//
//            return;
//
//
//        }
//}
/////////////////////////////Conditions Ends here///////////////////////////////
//    catch (Exception $e)
//    {
//
//        return $e->message ;
//
//    }
//}

//<<<<<<< HEAD
////////////////JONAH VICTOR VICTOR//////////////////
////////////////                    /////////////////
///////////////                     /////////////////
///////////////     vectormike     /////////////////
////////////////                  //////////////////
////////////////                  //////////////////
/////// If you want to touch something, 
///////      don't touch this side  ///////////////// 
function getBotInfo() {
    $bot_version="1.0.1";
    return "Heyo! I'm Vectormike's smiggle. I'm version " .$bot_version;
}
function getBotManual() {
    return  "Send 'location' to know your location. \n
    Send 'time' to get the time. \n
    Send 'about' to know me. \n
    Send 'help' to see this again. \n
    To train me, send in this format: \n
    'train: question # answer # password'";
}
function getAge() {
    $bot_version="1.0.1";
    return "Vectormike is just 20 years old. As for me, I have got no idea of age. Still " .$bot_version;
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;

    $PublicIP = get_client_ip();
    $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
    $json  =  json_decode($json ,true);
    $country =  $json['country_name'];
    $region= $json['region_name'];
    $city = $json['city'];
}


///////////////////////////////////////////////////////////////////
/////////////////// THE    END ////////////////////////////////////
///////////////////////////////////////////////////////////////////

//Yeah
//=======

/*******************************************************************************************
****************************START OF KINGSLEY67'S HOROSCOPE FUNCTION*********************************
*/
function
 zodiac($birthdate) {
 
   $zodiac = '';     
   list ($year, $month, $day) = explode ('-', $birthdate); 
         
   if ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) { $zodiac = "Aries"; } 
   elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) { $zodiac = "Taurus"; } 
   elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) { $zodiac = "Gemini"; } 
   elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) { $zodiac = "Cancer"; } 
   elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) { $zodiac = "Leo"; } 
   elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) { $zodiac = "Virgo"; } 
   elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) { $zodiac = "Libra"; } 
   elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) { $zodiac = "Scorpio"; } 
   elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) { $zodiac = "Sagittarius"; } 
   elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) { $zodiac = "Capricorn"; } 
   elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) { $zodiac = "Aquarius"; } 
   elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) { $zodiac = "Pisces"; } 
 
 return $zodiac; 
} 
//>>>>>>> e0ad1d08330b21b3ecf050998fddf139f9faf69a

/*************************************************************************************************
****************************END OF KINGSLEY67'S HOROSCOPE FUNCTION*********************************
******************************88PLEASE DO NOT EDIT OR REMOVE**************************************/


?>


