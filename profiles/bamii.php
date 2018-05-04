<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # require "../answers.php";
    # require_once '../db.php';
    # User input
    $data = $_POST['question'];

    if(!defined('DB_USER')){
			require "../../config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
    }
    
    
    # Functions to get the data from db
    $sql = $conn->prepare('select * FROM chatbot');
    $sql->execute();
    $db_result = $sql->fetchAll(PDO::FETCH_ASSOC);

    # arrays to populaate with db data;
    $q = [];
    $a = [];

    # Greetings
    /* $greeting = ['hi?', 'hey?', 'hello?', 'hello there?', 'hey there?', 'hi there?'];
    $follow_up = ['whats up?', 'and you?', 'how are you?']; */

    # Populate the question array
    foreach ($db_result as $key => $value) {
      array_push($q, strtolower($value['question']));
      array_push($a, strtolower($value['answer']));
    }

    # Make the data lower case. makes it easier to compare data.
    $data_lower = strtolower($data);
    $greet = $data_lower;
    if(!strpos($greet, '?')) {
      $greet = $greet . '?';
    }

    if(strpos($data, "train:") !== false) {
      ################################
      ######## Train the bot #########
      ################################


      # Split into question & answer array.
      $array = explode("#", $data);
      $question_temp = explode(":", $array[0]);
      $question = trim($question_temp[1]);
      $answer = trim($array[1]);

      # replace question mark
      $question = preg_replace("([?.])", "", $question);

      # Append the question to the db
      try {
        $sql2 =  'INSERT INTO `chatbot`(`question`, `answer`) VALUES ("' . $question . '", "' . $answer . '");';
        $conn->exec($sql2);
        echo json_encode([
          'status' => 1,
          'answer' => "Heyyy check it out, you taught me something. Now you can ask me again and i'll gladly answer :)",
        ]);
        return;
      } catch (Exception $e) {
        echo json_encode([
          'status' => 1,
          'answer' => "Sorry. My Bad. Something happened. Please try again",
        ]);
        return;
      }
      return;
    } else if (strpos($data, "train:") !== true) {
      if(in_array($data_lower, $q)) { # DONE
        # search the stored db
        $data_lower_2 = preg_replace("([?.])", "", $data_lower);
  
        $indexes = array_keys($q, $data_lower);
        $arr_size = sizeof($indexes);
        $random = mt_rand(0, $arr_size-1);
  
        $index = $indexes[$random];
  
        echo json_encode([
          'status' => 1,
          'answer' => $a[$index],
        ]);
        return;
      } else if(strpos($data_lower, "help") !== false) {
        echo json_encode([
          'status' => 1,
          'answer' => "
            - To convert currency, use this format <br />
            convert value from base to destination <br />
            e.g convert 100 from usd to ngn <br />
            - To tell the current time. Make sure you have 'time' in your command <br />
            - To tell you corny chuck norris jokes. Make sure you have either 'joke' or 'chuck' in your command.
            e.g. tell me chuck norris jokes <br />
            - To tell details about a place. Type: details the_country <br />
            e.g details lagos. <br />
            If you type details nigeria. It defaults to the capital of the country. <br />
            - Search hotels in hotel.ng. Type: search hotels: hotel_name <br />
            e.g search hotels: moon <br /> <hr />
            Just so you know (In case you want to enter multiple commands at the same time e.g search time details), <br />
            this is the order of preference of the functions --> help > time > convert > joke > details > search. <br />
            So if you do 'search time details', you'll trigger the time function because it's the highest in the chain. <br />
            ",
        ]);
        return;
      } else if(strpos($data_lower, 'time') !== false) {
        $result = bamiiTellTime($data_lower);
  
        echo json_encode([
          'status' => 1,
          'answer' => $result,
        ]);
        return;
      } else if(strpos($data_lower, 'convert') !== false) {
        ##################################
        ####### Currency Convertion ######
        ##################################
  
  
          $curr_array = explode(" ", $data_lower);

          if(isset($curr_array[1]) && is_numeric($curr_array[1]) && isset($curr_array[3]) && isset($curr_array[5])) {
            
            $amount = $curr_array[1];
            $from_index = array_search('from', $curr_array) + 1;
            $to_index = array_search('to', $curr_array) + 1;
    
            $from = $curr_array[$from_index];
            $to = $curr_array[$to_index];
            $converted = bamiiConvertCurrency($amount, $from, $to);
            $value = $amount . " " . $from . " is " . $converted . " " . $to;
            echo json_encode([
              'status' => 1,
              'answer' => $value,
            ]);
            return;
          } else {
            echo json_encode([
              'status' => 1,
              'answer' => "Please follow the syntax. Thank you! <br /> <i>convert amount from base to destination</i>",
            ]);
            return;
          } 
      } else if(strpos($data_lower, 'joke') !== false || strpos($data_lower, 'chuck') !== false) {
        $random_joke = bamiiChuckNorris();
  
        echo json_encode([
          'status' => 1,
          'answer' => $random_joke,
        ]);
        return;
      } else if(strpos($data_lower, "details") !== false) {
        $result = bamiiCountryDetails($data_lower);
  
        echo json_encode([
          'status' => 1,
          'answer' => $result,
        ]);
        return;
      } else if(strpos($data_lower, 'search') !== false) {
        $url_temp = str_replace("search hotels:", "", $data_lower);
        $url = trim($url_temp);
        echo json_encode([
          'status' => 2,
          'answer' => 'https://hotels.ng/hotels/search?query=' . $url,
        ]);
        return;
      } else { # 
        echo json_encode([
          'status' => 1,
          'answer' => nl2br("Sorry, I can't answer this command / question right now. \nSadly, my creator didn't train me enough *rolls eyes*."
          ." Fortunately for you, you can train me by typing \n<strong> 'train: what_you_want_me_to_know # how_to_answer' </strong> like so: <br /> "
          ." -> <strong> train: Which company is hosting this internship. # This Internship is hosted courtesy Hotels.NG </strong> <br />
          <hr /> You can also type in help for a full list of commands i understand."),
        ]);
        return;
      }
    }



      # Split into question & answer array.
      $array = explode("#", $data);
      $question_temp = explode(":", $array[0]);
      $question = trim($question_temp[1]);
      $answer = trim($array[1]);

      # replace question mark
      $question = preg_replace("([?.])", "", $question);

      # Append the question to the db
      try {
        $sql2 =  'INSERT INTO `chatbot`(`question`, `answer`) VALUES ("' . $question . '", "' . $answer . '");';
        $conn->exec($sql2);
        echo json_encode([
          'status' => 1,
          'answer' => "Heyyy check it out, you taught me something. Now you can ask me again and i'll gladly answer :)",
        ]);
        return;
      } catch (Exception $e) {
        echo json_encode([
          'status' => 1,
          'answer' => "Sorry. My Bad. Something happened. Please try again",
        ]);
        return;
      }
      return;
    } else if (strpos($data, "train:") !== true) {
      if(in_array($data_lower, $q)) { # DONE
        # search the stored db
        $data_lower_2 = preg_replace("([?.])", "", $data_lower);
  
        $indexes = array_keys($q, $data_lower);
        $arr_size = sizeof($indexes);
        $random = mt_rand(0, $arr_size-1);
  
        $index = $indexes[$random];
  
        echo json_encode([
          'status' => 1,
          'answer' => $a[$index],
        ]);
        return;
      } else if(strpos($data_lower, "help") !== false) {
        echo json_encode([
          'status' => 1,
          'answer' => "
            - To convert currency, use this format <br />
            convert value from base to destination <br />
            e.g convert 100 from usd to ngn <br />
            - To tell the current time. Make sure you have 'time' in your command <br />
            - To tell you corny chuck norris jokes. Make sure you have either 'joke' or 'chuck' in your command.
            e.g. tell me chuck norris jokes <br />
            - To tell details about a place. Type: details the_country <br />
            e.g details lagos. <br />
            If you type details nigeria. It defaults to the capital of the country. <br />
            - Search hotels in hotel.ng. Type: search hotels: hotel_name <br />
            e.g search hotels: moon <br /> <hr />
            Just so you know (In case you want to enter multiple commands at the same time e.g search time details), <br />
            this is the order of preference of the functions --> help > time > convert > joke > details > search. <br />
            So if you do 'search time details', you'll trigger the time function because it's the highest in the chain. <br />
            ",
        ]);
        return;
      } else if(strpos($data_lower, 'time') !== false) {
        $result = bamiiTellTime($data_lower);
  
        echo json_encode([
          'status' => 1,
          'answer' => $result,
        ]);
        return;
      } else if(strpos($data_lower, 'convert') !== false) {
        ##################################
        ####### Currency Convertion ######
        ##################################
  
  
          $curr_array = explode(" ", $data_lower);

          if(isset($curr_array[1]) && is_numeric($curr_array[1]) && isset($curr_array[3]) && isset($curr_array[5])) {
            
            $amount = $curr_array[1];
            $from_index = array_search('from', $curr_array) + 1;
            $to_index = array_search('to', $curr_array) + 1;
    
            $from = $curr_array[$from_index];
            $to = $curr_array[$to_index];
            $converted = bamiiConvertCurrency($amount, $from, $to);
            $value = $amount . " " . $from . " is " . $converted . " " . $to;
            echo json_encode([
              'status' => 1,
              'answer' => $value,
            ]);
            return;
          } else {
            echo json_encode([
              'status' => 1,
              'answer' => "Please follow the syntax. Thank you! <br /> <i>convert amount from base to destination</i>",
            ]);
            return;
          } 
      } else if(strpos($data_lower, 'joke') !== false || strpos($data_lower, 'chuck') !== false) {
        $random_joke = bamiiChuckNorris();
  
        echo json_encode([
          'status' => 1,
          'answer' => $random_joke,
        ]);
        return;
      } else if(strpos($data_lower, "details") !== false) {
        $result = bamiiCountryDetails($data_lower);
  
        echo json_encode([
          'status' => 1,
          'answer' => $result,
        ]);
        return;
      } else if(strpos($data_lower, 'search') !== false) {
        $url_temp = str_replace("search hotels:", "", $data_lower);
        $url = trim($url_temp);
        echo json_encode([
          'status' => 2,
          'answer' => 'https://hotels.ng/hotels/search?query=' . $url,
        ]);
        return;
      } else { # 
        echo json_encode([
          'status' => 1,
          'answer' => nl2br("Sorry, I can't answer this command / question right now. \nSadly, my creator didn't train me enough *rolls eyes*."
          ." Fortunately for you, you can train me by typing \n<strong> 'train: what_you_want_me_to_know # how_to_answer' </strong> like so: <br /> "
          ." -> <strong> train: Which company is hosting this internship. # This Internship is hosted courtesy Hotels.NG </strong> <br />
          <hr /> You can also type in help for a full list of commands i understand."),
        ]);
        return;
      }
    }


   /*  if(in_array($data_lower, $q)) { # DONE
      # search the stored db
      $data_lower_2 = preg_replace("([?.])", "", $data_lower);

      $indexes = array_keys($q, $data_lower);
      $arr_size = sizeof($indexes);
      $random = mt_rand(0, $arr_size-1);

      $index = $indexes[$random];

      echo json_encode([
        'status' => 1,
        'answer' => $a[$index],
      ]);
      return;
    } else if(strpos($data, "train:") !== false) {
      ################################
      ######## Train the bot #########
      ################################

      # Split into question & answer array.
      $array = explode("#", $data);
      $question_temp = explode(":", $array[0]);
      $question = trim($question_temp[1]);
      $answer = trim($array[1]);

      # replace question mark
      $question = preg_replace("([?.])", "", $question);

      # Append the question to the db
      try {
        $sql2 =  'INSERT INTO `chatbot`(`question`, `answer`) VALUES ("' . $question . '", "' . $answer . '");';
        $conn->exec($sql2);
        echo json_encode([
          'status' => 1,
          'answer' => "Heyyy check it out, you taught me something. Now you can ask me again and i'll gladly answer :)",
        ]);
        return;
      } catch (Exception $e) {
        echo json_encode([
          'status' => 1,
          'answer' => "Sorry. My Bad. Something happened. Please try again",
        ]);
        return;
      }
      return;
    } else if(strpos($data_lower, 'time') !== false) {
      $result = bamiiTellTime($data_lower);

      echo json_encode([
        'status' => 1,
        'answer' => $result,
      ]);
      return;
    } else if(strpos($data_lower, 'convert') !== false) {
      ##################################
      ####### Currency Convertion ######
      ##################################


        $curr_array = explode(" ", $data_lower);
        $amount = $curr_array[1];

        $from_index = array_search('from', $curr_array) + 1;
        $to_index = array_search('to', $curr_array) + 1;

        $from = $curr_array[$from_index];
        $to = $curr_array[$to_index];
        $converted = bamiiConvertCurrency($amount, $from, $to);
        $value = $amount . " " . $from . " is " . $converted . " " . $to;
        echo json_encode([
          'status' => 1,
          'answer' => $value,
        ]);
        return;

    } else if(strpos($data_lower, "help") !== false) {
      echo json_encode([
        'status' => 1,
        'answer' => "
          - To convert currency, use this format <br />
          convert value from base to destination <br />
          e.g convert 100 from usd to ngn <br />
          - To tell the current time. Make sure you have 'time' in your command <br />
          - To tell you corny chuck norris jokes. Make sure you have either 'joke' or 'chuck' in your command.
          e.g. tell me chuck norris jokes <br />
          - To tell details about a place. Type: details the_country <br />
          e.g details lagos. <br />
          If you type details nigeria. It defaults to the capital of the country. <br />
          - Search hotels in hotel.ng. Type: search hotels: hotel_name <br />
          e.g search hotels: moon <br />
          ",
      ]);
      return;
    } else if(strpos($data_lower, 'joke') !== false || strpos($data_lower, 'chuck') !== false) {
      $random_joke = bamiiChuckNorris();

      echo json_encode([
        'status' => 1,
        'answer' => $random_joke,
      ]);
      return;
    } else if(strpos($data_lower, "details") !== false) {
      $result = bamiiCountryDetails($data);

      echo json_encode([
        'status' => 1,
        'answer' => $result,
      ]);
      return;
    } else if(strpos($data_lower, 'search') !== false) {
      $url_temp = str_replace("search hotels:", "", $data_lower);
      $url = trim($url_temp);
      echo json_encode([
        'status' => 2,
        'answer' => 'https://hotels.ng/hotels/search?query=' . $url,
      ]);
      return;
    } else { # 
      echo json_encode([
        'status' => 1,
        'answer' => nl2br("Sorry, I can't answer this command / question right now. \nSadly, my creator didn't train me enough *rolls eyes*."
        ." Fortunately for you, you can train me by typing \n<strong> 'train: what_you_want_me_to_know # how_to_answer' </strong> like so: "
        ." eg -> <strong> train: Which company is hosting this internship. # This Internship is hosted courtesy Hotels.NG </strong> <br />
        <hr /> You can also type in help for a full list of commands i understand."),
      ]);
      return;
    } */

    
  }
  function bamiiConvertCurrency($amount, $from, $to){
    $conv_id = "{$from}_{$to}";
    $string = file_get_contents("https://free.currencyconverterapi.com/api/v5/convert?q=$conv_id&compact=y");
    $json_a = json_decode($string, true);

    #return $json_a[strtoupper($conv_id)]['val'];
    #return $amount;
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
      $response = file_get_contents($string, false, stream_context_create($arrContextOptions));

      $a =json_decode($response, true);

      if($a['data']['error']) {
        return "Unable to find the country";
      }

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
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Bami | Portfolio </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/dfb23fb58f.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
	<!-- link to main stylesheet -->
	<link rel="stylesheet" type="text/css" href="/css/main.css">
    <style>
      body {
       background: white; 
      }
      profile {
        height: 0;
        width: 0;
	    }
      div.page-container,
      .chatbot-container {
        padding-top: 15px;
        width: 500px;
        border: 1px solid grey;
        border-radius: 2px;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-bottom: 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
        z-index: -1;
        -webkit-box-shadow: -1px 1px 4px 1px #c8cbd1;
        -moz-box-shadow: -1px 1px 4px 1px #c8cbd1;
        box-shadow: -1px 1px 4px 1px #c8cbd1;
      }
      .blur {
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
      }
        /* HEADER STYLES */
        .header-container {
        width: 100%;
        }
        .my-details {
        width: 70%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        text-align: center;
        }
        .img-container {
        height: 300px;
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 10px;
        }
        .img-container>img {
        height: inherit;
        border-radius:50%;
        }
        h1 {
        border-bottom: black 1px solid;
        }
        div>h1,
        div>h2{
        margin: 0;
        font-family: 'Raleway', sans-serif;
        color: black;
        text-align: center;
        }
        /* MORE DETAILS */
        .more-details {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 15px;
        }
        .about-me,
        .my-stack,
        .portfolio-click {
        font-family: 'Josefin Sans';
        border: 1px solid black;
        margin: 0 auto;
        margin-top: 10px;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;  
        width: 80%;
        height: 50px;
        display: flex;
        cursor: pointer;
        }
        
        .first-paragraph,
        .second-paragraph {
        font-family: 'Josefin Sans';
        display: none;
        flex-direction: column;
        border: 1px solid #888888;
        margin: 0 auto;
        width: 75%;
        padding-left: 10px;
        padding-right: 10px;
        -webkit-transition: height 4s ease;  
        -moz-transition: height 4s ease;  
        -o-transition: height 4s ease;  
        -ms-transition: height 4s ease;  
        transition: height 4s ease;
        }

        .my-list>li:first-child {
        border-right: 1px white solid;
        }
        .my-list>li {
        display: inline-block;
        border-bottom: 1px solid transparent;   width: 0px;
        transition: 0.6s ease;
        white-space: nowrap;
        }
        .my-list>li:hover {
        border-bottom: 1px solid white;
        border-right: 1px solid white;
        border-left: 1px solid white;
        width: 50%;
        }
        .my-list>li {
        list-style: none;
        width: 50%;
        padding-top: 1px;
        }

        .chatbot-container {
          min-height: 300px;
          width: 200px;
          margin: 0 auto;
          width: 500px;
          display: flex;
          flex-direction: column;
          padding: 10px;
        }

        .chat-details {
          flex: 1;
          display: flex;
          flex-direction: column;
          width: 100%;
          border-bottom: 1px solid grey;
          margin-bottom: 10px;
        }

        .server-reply,
        .client-send {
          padding: 10px 20px;

          font-size: small;

          font-size: medium;

          font-size: medium;

          font-family: 'Tajawal';
          min-width: 30%;
          max-width: 60%;
          overflow-wrap: break-word;
          border: 1px solid grey;
          align-items: center;
          margin-bottom: 10px;
          font-size: 16px;
        }

        .server-reply {
          border-radius: 0 0 10px 0;
          border-right: 3px solid black;
        }

        .server-name {
          font-family: 'Tajawal';
          font-size: medium;
        }

        .client-name {
          align-self: flex-end;
          font-family: 'Tajawal';
          font-size: medium;
          
        }

        .client-send {
          align-self: flex-end;
          border-radius: 0px 0px 0px 10px;
          border-left: 3px solid black;
        }

        .chatbot {
          text-align: center;
          font-size: 40px;
          font-family: 'Raleway';
        }

        .input {
          height: 50px;
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .chat-input {
          height: 100%;
          width: 80%;
          border: 1px solid grey;
          border-radius: 3px;
          padding: 0 15px;
          margin: 0 auto;
          font-size: small;
          font-family: 'Tajawal';
        }

        .chat-btn {
          height: 100%;
          width: 18%;
          border: 1px solid grey;
          font-size: small;
          font-family: 'Raleway';
          border-radius: 3px;
          background: black;
          color: white;
          cursor: pointer; 
        }


    </style>
	</head>
  <body>
    <?php
      $sql = 'SELECT * FROM interns_data WHERE username="bamii"';
      $query = $conn->query($sql);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $result = $query->fetch();    

      $name = $result['name'];
      $user = $result['username'];
      $image = $result['image_filename'];
    ?>
    <div class="page-container">  
      <div class="header-container">
        <div class="img-container">
          <img class="profile-image" src="http://res.cloudinary.com/bambam/image/upload/v1523622325/16966438.jpg"/>
        </div>
        <div class="my-details">
          <h1> <?php echo($name) ?> </h1>
          <h2 id="button"> @<?php echo($user); ?> </h2>
        </div>
      </div>
    </div>
    <div class="chatbot"> _ChatBot_ </div>
    <div class="chatbot-container">
      <div class="chat-details" id="chat">
        <div class="server-name"> Bot </div>
        <div class="server-reply">
          Hey there. I'm your new best friend. :) Ask me anything in this line <br />
          1. To tell you corny chuck norris jokes <br />
          2. Convert currency. <br />
          3. Tell you the time <br />
          4. Tell you few details about a country/state <br />
          5. Search hotels.ng hotels <br />
          ... i've still got a few things up my sleeve though. Just chill ;). <br /> <hr />
          Did i tell you that you can train me too? It's simple!. <br /> <hr />
          Just type "train: your_command # the_supposed_answer" <br/> <hr />
          Voila! Next time you ask me that question (I'm a strict parent lol. Ask me the same thing ::), i'll be sure to answer <br /> <hr />
          type "help" to show my commands.
        </div>
      </div>
      <form class="input" id="bot-input">
        <input class="chat-input" id="chat-input" type="text" placeholder="Ask a question" />
        <button type="submit" class="chat-btn"> Ask </button>
      </form>
    </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
      <script>
        $(function(){
              var chatInput = $('#chat-input');
              var bot_input = $('#bot-input');
              var stack = $('#stack');

              bot_input.submit(function(e) {
                  e.preventDefault();
                  var question = $('#chat-input').val();

                    // Append the client bubble
                    var client = document.getElementById('chat');
                    var ish = document.createElement('div');
                    var text = document.createElement('div');
                    ish.className += " " + 'client-send';
                    text.className += " " + 'client-name';
                    text.innerHTML = 'You';
                    ish.innerHTML = question;
                    client.appendChild(text);
                    client.appendChild(ish);
                    $('#chat-input').val("");
                    
                    /* Scroll to the bottom */
                    $('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
                    $.ajax({
                        url: './profiles/bamii.php',
                        type: "post",
                        dataType: "json",
                        data: {'question': question},
                        success: function(response) {
                          if(response.status === 1) {
                            var resp = document.createElement('div');
                            var respText = document.createElement('div');
                            respText.className += " " + 'server-name';
                            resp.className += " " + 'server-reply';
                            respText.innerHTML = 'Bot';
                            resp.innerHTML = response.answer;
                            client.appendChild(respText);
                            client.appendChild(resp);
                            $('html,body').animate({scrollTop: document.body.scrollHeight},"fast")
                          } else if (response.status === 2) {
                            var resp = document.createElement('div');
                            var respText = document.createElement('div');
                            respText.className += " " + 'server-name';
                            resp.className += " " + 'server-reply';
                            respText.innerHTML = 'Bot';
                            resp.innerHTML = "Sure!";
                            client.appendChild(respText);
                            client.appendChild(resp);
                            open(response.answer);
                          }
                        },
                        error: function(error) {
                          var resp = document.createElement('div');
                          var respText = document.createElement('div');
                          respText.className += " " + 'server-name';
                          resp.className += " " + 'server-reply';
                          respText.innerHTML = 'Bot';
                          resp.innerHTML = "I'm sorry, Some error occured. Please try again. Or refresh your browser.";
                          client.appendChild(respText);
                          client.appendChild(resp);
                          console.log(error);
                          $('html,body').animate({scrollTop: document.body.scrollHeight},"fast")
                        }
                    })
              }); // end submit
        }); // end func
      </script>
      <?php
        try {
            $sql2 = "SELECT * FROM secret_word";
            $query2 = $conn->query($sql2);
            $query2->setFetchMode(PDO::FETCH_ASSOC);
            $result2 = $query2->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $result2['secret_word'];
      ?>
  </body>
</html>
