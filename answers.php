<?php

function getUserAvatar($username)
{
    require 'db.php';

    $sqlForUser = "SELECT * FROM interns_data WHERE interns_data.username = '".$username."' LIMIT 1";

    // this is executing our query
    $qForUser = $conn->query($sqlForUser);

    // this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
    $qForUser->setFetchMode(PDO::FETCH_ASSOC);

    // this is finally sending the query to the database#9b4247
    $userData = $qForUser->fetch();

    if ($userData === false) {
        return 'No user was found with username '.$username;
    }

    return "Here's how ".$username.' looks: <br /> '."<img className='user-avatar' style='width: 150px; height:150px; border-radius: 0px;' src=".$userData['image_filename'].'>';
}

function getNumberOfGithubRepos($username)
{
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/users/'.$username,
    CURLOPT_USERAGENT => 'Hng Internship', ));
    // Send the request & save response to $resp
    $resp = json_decode(curl_exec($curl));
    // Close request to clear up some resources
    curl_close($curl);

    if (property_exists($resp, 'message')) {
        return "I couldn't find a github user with the name ".$username;
    }

    return $username.' has '.$resp->public_repos.' repositories on github. Check them out <a style="color: black; font-weight: bold; font-size: 18px; padding: 0px; text-decoration: none" target="_blank" href="'.$resp->html_url.'?tab=repositories">HERE</a>';
}

function getNeneRaeBotCustomCommands()
{
    return '<small>If you want to know the number of interns at HNG this year, type: <br /><b>"show number of interns" </b><br /><br />'.
    'If you want to see the avatar of a specific intern, type: <br /><b>"show avatar: intern username" </b><br /><br />'.
    'If you want me to show you the number of repositories a github user has, type: <br /><b>"show user repos: github username"</b> </small>';
}

function getNumberOfInterns()
{
    require 'db.php';

    $sqlForUser = 'SELECT COUNT(*) FROM interns_data';

    // this is executing our query
    $qForUser = $conn->query($sqlForUser);

    // this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
    $qForUser->setFetchMode(PDO::FETCH_ASSOC);

    // this is finally sending the query to the database#9b4247
    $userData = $qForUser->fetch();

    return 'Presently, there are ' . $userData['COUNT(*)'] . ' interns at the amazing hng internship.';
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

        #return $json_a[strtoupper($conv_id)]['val'];
        #return $amount;
        return $amount * $json_a[strtoupper($conv_id)]['val'];
    }

    function bamiiChuckNorris()
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $geocodeUrl = "http://api.icndb.com/jokes/random";
        $response = file_get_contents($geocodeUrl, false, stream_context_create($arrContextOptions));

        $a = json_decode($response, true);

        return $a['value']['joke'];
    }

    function bamiiTellTime($data)
    {
        if (strpos($data, 'in')) {
            return "Sorry i can't tell you the time somewhere else right now";
        } else {
            return 'The time is:' . date("h:i");
        }
    }

    function bamiiCountryDetails($data)
    {
        $country_arr = explode(' ', $data);
        $country_index = array_search('details', $country_arr) + 1;
        $country = $country_arr[$country_index];
        $country_temp = str_replace('details', "", $data);
        $country2 = trim($country_temp);

        $string = 'http://api.worldweatheronline.com/premium/v1/search.ashx?key=1bdf77b815ee4259942183015181704&query=' . $country2 . '&num_of_results=2&format=json';

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $geocodeUrl = "http://api.worldweatheronline.com/premium/v1/search.ashx?key=1bdf77b815ee4259942183015181704&query=lagos&num_of_results=2&format=json";
        $response = file_get_contents($geocodeUrl, false, stream_context_create($arrContextOptions));

        $a = json_decode($response, true);

        $longitude = $a['search_api']['result'][0]['longitude'];
        $latitude = $a['search_api']['result'][0]['latitude'];
        $name = $a['search_api']['result'][0]['areaName'][0]['value'];
        $country_name = $a['search_api']['result'][0]['country'][0]['value'];
        $population = $a['search_api']['result'][0]['population'];


        return ('
            ' . ($name ? 'Name :' . $name . '<br />' : null) . '
            Country: ' . $country_name . ' <br />
            Latitude: ' . $latitude . ' <br />
            Longitude: ' . $longitude . ' <br />
            Population: ' . $population . '<br />
        ');
    }

    ###################### END BAMII #####################

    function getListOfCommands()
    {
        return 'Type "<code>show: List of commands</code>" to see a list of commands I understand.<br/>
  Type "<code>open: www.google.com</code>" to open Google.com<br/>
  Type "<code>say: Hello bot</code>" to get me to say "Hello bot"<br/>
  Type "<code>train: Your question # My reply</code>" to train me to understand how to reply to more things';
    }

    function getRandomNumber()
    {
        return (rand(10, 10000));
    }

    function getBotName()
    {
        return "the_ozmic's bot";
    }

    function getRandomFact()
    {
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

        switch ($stage) {
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
    function getAJoke()
    {
        $jokes = ["My dog used to chase people on a bike a lot. It got so bad, finally I had to take his bike away.", "What is the difference between a snowman and a snowwoman? Snowballs.",
            "I invented a new word. Plagiarism.", "Helvetica and Times New Roman walk into a bar. 'Get out of here!' shouts the bartender. 'We don't serve your type.'",
            "Why don’t scientists trust atoms? Because they make up everything.", "Where are average things manufactured? The satisfactory.", "How do you drown a hipster? Throw him in the mainstream",
            "How does Moses make tea? He brews!", "Why can’t you explain puns to kleptomaniacs? They always take things literally.", "I got called pretty yesterday and it felt good! Actually, the full sentence was 'You're pretty annoying.' but I'm choosing to focus on the positive.",
            "Two cannibals eating a clown. 'Does this taste funny to you?'", "Why can’t you hear a pterodactyl in the bathroom? Because it has a silent pee.", "Where does a sheep go for a haircut? To the baaaaa baaaaa shop!"];

        return $jokes[rand(0, count($jokes) - 1)];
    }


    function emojifyText($text)
    {
        $url = "http://torpid-needle.glitch.me/emojify/{trim($text)}";
        return file_get_contents($url);
    }

    function rollADice()
    {
        return rand(1, 6);
    }

    function flipACoin()
    {
        return rand(0, 1) === 1 ? "Heads" : "Tails";
    }

    function predictOutcome($battle)
    {
        $players = explode('vs', $battle);

        if (count($players) >= 2) {
            return $players[rand(0, count($players) - 1)];
        }

        return "Uhh.. nope. You've provided invalid prediction data.";
    }

// End of functions by @mclint_

    //functions defined by @chigozie. DO NOT MODIFY!!!
    function getDayOfWeek(){ 
        return date("l");
    }

    function getDaysInMonth($month)
    {
        $months_with_31_days = ["january", "march", "may", "july", "august", "october", "december"];
        $months_with_30_days = ["april", "june", "september", "november"];
        $other = ["february"];

        $month = strtolower(trim($month));
        if(in_array($month, $months_with_31_days)){
            return "31 days";
        }else if(in_array($month, $months_with_30_days)){
            return "30 days";
        }else if(in_array($month, $other)){
            $ans = "29 days in a leap year. Otherwise, it has 28 days. ";
            $ans .= "If you are interested in the current year ".date("Y").", then February has ";
            if(isCurrentYearLeap()){
                $ans .= "29 days";
            } else {
                $ans .= "28 days";
            }
            return $ans;
        } else {
            return "I don't recognize the month you entered";
        }
    }

    function isCurrentYearLeap()
    {
        $currrent_year = intval(date('Y'));
        if ($currrent_year % 400 === 0) {
            return true;
        }
        if ($currrent_year % 100 === 0) {
            return false;
        }
        if ($currrent_year % 4 === 0) {
            return true;
        }
        return false;
    }

    function getWeather($location=''){
      define('OW_API_KEY', "97fbc1fbe89950b7e28508aa9148bf9d");
        if($location === ''){
            return "Please enter location";
        }

        $url = "http://api.openweathermap.org/data/2.5/weather?q=$location&units=metric&appid=".OW_API_KEY;
        $curl_session = curl_init();
        curl_setopt($curl_session, CURLOPT_URL, $url);
        curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_session,CURLOPT_HEADER, false); 
        $result=curl_exec($curl_session);
        curl_close($curl_session);
        $result_object = json_decode($result);
        $weather = ucfirst($result_object->weather[0]->description);
        $temperature = $result_object->main->temp;
        $pressure = $result_object->main->pressure;
        $humidity = $result_object->main->humidity;
        $windspeed = $result_object->wind->speed;
        $result = "Weather: <b>$weather</b><br>Temperature: <b>$temperature<sup>o</sup>C</b><br>Pressure: <b>$pressure"."mb</b><br>Humidity: <b>$humidity%</b><br>Windspeed: <b>$windspeed"."km/hr</b>";
        return $result;
    }

    function getOptimusPrimeCustomFunctions(){
      $result = array("<b>getDayOfWeek</b>", "<b>getDaysInMonth</b>", "<b>getWeather</b>");
      $r = "My custom functions are:<br>".implode("<br>", $result);
      $r .= "<br>I however have to be trained first before I can answer questions based on these functions.";
      $r .= "<br>To answer questions which do not contain a parameter but whose answer uses a custom function, the training answer must contain the function name enclosed in (( )), i.e. ((<b>function_name</b>)). For example ((<b>getDayOfWeek</b>))";
      $r .= "<br>To answer questions which contain a parameter in the question, the training question must contain the parameter enclosed in {{ }}, i.e. {{<b>parameter</b>}}";
      $r .= "<br>and the training answer must contain the name of the function to call enclosed in (( )), i.e. ((<b>parameter</b>)). <br>An example of this is:";
      $r .= "<br>train: How many days does {{month}} have? # {{month}} has ((getDaysInMonth)) # trainingpassword";
      return $r;
    }
    //end of functions defined by @chigozie



    /***************************Bytenaija Start here*************************/
//bytenaija time function
    function bytenaija_time($location)
    {
        // $curl = curl_init();
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $location . "&sensor=true&key=AIzaSyCWLZLW__GC8TvE1s84UtokiVH_XoV0lGM";
        /* curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $geocodeUrl,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));

        $response = curl_exec($curl); */
        $response = file_get_contents($geocodeUrl, false, stream_context_create($arrContextOptions));
        $response = json_decode($response, true);
        //$lat = $response->results;


        $response = $response['results'][0]['geometry'];

        $response = $response["location"];
        $lat = $response["lat"];
        $lng = $response["lng"];
        $timestamp = time();;

        $url = "https://maps.googleapis.com/maps/api/timezone/json?location=" . $lat . "," . $lng . "&timestamp=" . $timestamp . "&key=AIzaSyBk2blfsVOf_t1Z5st7DapecOwAHSQTi4U";

        /* curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $responseJson = curl_exec($curl); */
        //curl_close($curl);
        $responseJson = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $response = json_decode($responseJson);
        $timezone = $response->timeZoneId;
        $date = new DateTime("now", new DateTimeZone($timezone));
        echo "The time in " . ucwords($location) . " is " . $date->format('d M, Y h:i:s A');

    }

    function bytenaija_convert($base, $other)
    {
        $api_key = "U7VdzkfPuGyGz4KrEa6vuYXgJxy4Q8";
        $url = "https://www.amdoren.com/api/currency.php?api_key=" . $api_key . "&from=" . $base . "&to=" . $other;

        /* $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));

        $response = curl_exec($curl); */

        $response = file_get_contents($url);
        $response = json_decode($response, true);
        //curl_close($curl);
        echo "1 " . strtoupper($base) . " is equal to " . strtoupper($other) . " " . $response['amount'];
    }

    //bitcoin price index
    function bytenaija_hodl()
    {
        $url = "https://api.coindesk.com/v1/bpi/currentprice.json";
        /*  $curl = curl_init();
         curl_setopt_array($curl, array(
             CURLOPT_RETURNTRANSFER => 1,
             CURLOPT_URL => $url,
             CURLOPT_USERAGENT => 'Codular Sample cURL Request'
         ));

         $response = curl_exec($curl); */

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
    function myCreator()
    {
        return "Adokiye is my creator he is currently in stage 4 of the HNG internship, he will soon advance to stage 5";
    }

    function get_current_time()
    {
        date_default_timezone_set('Africa/Lagos');
        $currentTime = date('Y-M-D H:i:s');
        return $currentTime;
    }

    /*end of
    Adokiye's function*/

/*
|=================================================================|
|              JIM (JIMIE) Functions Begins                       |
|=================================================================|
*/
function inspire() {
    $inspirations = [
        'It is during our darkest moments that we must focus to see the light. \\n\\n - Aristotle',
        'Start by doing what\'s necessary; then do what\'s possible; and suddenly you are doing the impossible. \\n\\n - Francis of Assisi',
        'I can\'t change the direction of the wind, but I can adjust my sails to always reach my destination. \\n\\n - Jimmy Dean',
        'Put your heart, mind, and soul into even your smallest acts. This is the secret of success. \\n\\n - Swami Sivananda',
        'The best preparation for tomorrow is doing your best today. \\n\\n - H. Jackson Brown, Jr',
        'Optimism is the faith that leads to achievement. Nothing can be done without hope and confidence. \\n\\n - Helen Keller',
        'Failure will never overtake me if my determination to succeed is strong enough. \\n\\n - Og Mandino',
        'It does not matter how slowly you go as long as you do not stop. \\n\\n - Confucius',
        'Either I will find a way, or I will make one. \\n\\n - Philip Sidney',
        'It always seems impossible until it\'s done. \\n\\n - Nelson Mandela',
        'Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy. \\n\\n - Norman Vincent Peale',
        'The secret of getting ahead is getting started. \\n\\n - Mark Twain',
        'Accept the challenges so that you can feel the exhilaration of victory. \\n\\n - George S. Patton',
        'A creative man is motivated by the desire to achieve, not by the desire to beat others. \\n\\n - Ayn Rand',
        'Your talent is God\'s gift to you. What you do with it is your gift back to God. \\n\\n - Leo Buscaglia',
        'Keep your eyes on the stars, and your feet on the ground. \\n\\n - Theodore Roosevelt',
        'Quality is not an act, it is a habit. \\n\\n - Aristotle',
        'We may encounter many defeats but we must not be defeated. \\n\\n - Maya Angelou',
        'Never retreat. Never explain. Get it done and let them howl. \\n\\n - Benjamin Jowett',
        'The most effective way to do it, is to do it. \\n\\n - Amelia Earhart',
        'If you can dream it, you can do it. \\n\\n - Walt Disney',
        'Two roads diverged in a wood, and I took the one less traveled by, And that has made all the difference. \\n\\n – Robert Frost',
        'You miss 100% of the shots you don’t take. \\n\\n – Wayne Gretzky',
    ];
    return $inspirations[array_rand($inspirations)];
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

function get_jimies_functions() {
   return '1. You can ask me to inspire you \n
           E.g: Say "Inspire me" or "Inspire me please" \\n\\n
           2. You can ask me to get you the current Bitcoin rates. \\n
           E.g: Ask: "What are the current btc rates?"
           ';
    }

    /*
    |=================================================================|
    |               JIM (JIMIE) Functions Ends                        |
    |=================================================================|
    */


    /*
    |=================================================================|
    |               Alabots  - Alaba Mustapha                        |
    |=================================================================|
    */

    function alabotGetMenu()
    {
        return '1. enter menu to show this help <br>
            2. Find synonyms E.g: Synonyms of love? <br>
            3. train me e.g: train synonyms of goat # goatie,goater,etc # passkey. <br>
            3. clear screen: cls. <br>
            4. exit bot: exit. <br>
           ';
    }

    /*
    |=================================================================|
    |               Alabots  - Alaba Mustapha end                     |
    |=================================================================|
     */

// end of functions by johnayeni

/////////////////////////////////////////////////////// Olaogun Function 
    function multiplication($a, $b)
    {
        $c = $a * $b;
        echo $c;
    }

    function addition($a, $b)
    {
        $c = $a + $b;
        echo $c;
    }

    function subtraction($a, $b)
    {
        $c = $a - $b;
        echo $c;
    }

    function division($a, $b)
    {
        $c = $a / $b;
        echo $c;
    }


// AbseeJP own

//   require 'db.php';
 
// if (isset($_POST['question'])) {
// 	$value = $_POST['question'];
	
// 	$arr = str_split($value);
// 	if ($arr[0]=='#') {

// 		$input2 = $value;


// 		$ab = explode( ':', $input2 );
// 		$ques = ltrim($ab[0], '#');
// 		$ans = $ab[1];

// 		$awesome = "INSERT INTO chatbot (question, answer) VALUES ('$ques', '$ans')";
// 		$Absee = $conn->query($awesome);
//    		$Absee = $Absee->fetch(PDO::FETCH_OBJ);
// 	}
// 	else{

// 	$Absee = $conn->query("SELECT * from chatbot where question = '$value'");
//    	$Absee = $Absee->fetch(PDO::FETCH_OBJ);

// 	if ($Absee) {
// 		$answer = $Absee->answer ;
// 		echo '<div class= "container">
// 				<p  style= "width:60%;background:#BBDEFB;color:white;border-radius:5px;padding:10px;">'
// 					.$value.'
// 				<br>
// 				</p>'.
// 				'<p style= "float:right;width:40%;background:#90CAF9;color:white;border-radius:5px;padding:10px;margin-bottom:20px;margin-top:10px;">'.$answer.'<br>
// 				</p>
// 			</div>';
	
// 	}else{
// 		$reply = 'Not in db';
// 		echo '<div class= "container">
// 				<p  style= "width:60%;background:#BBDEFB;color:white;border-radius:5px;padding:10px;">'
// 					.$value.'
// 				<br>
// 				</p>'.
// 				'<p style= "float:right;width:40%;background:#FF5722;color:white;border-radius:5px;padding:10px;margin-bottom:20px;margin-top:10px;">'.$reply.'<br>
// 				</p>
// 			</div>';
		
// 	}
		
// 	}
// }
    
?>

