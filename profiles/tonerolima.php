<?php 
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $question = trim(strtolower($_POST['question']));
    $question = preg_replace("([?.])", "", $question);
    date_default_timezone_set("Africa/Lagos");

    if (str_replace(' ','',$question) == 'help'){
      echo 'Below are some of the things I can help you with and example questions:<br><br>Respond to salutation: Hello<br><br>Tell the time: what is the time?';
      return;
    }

    //return bot version
    if (str_replace(' ','',$question) == 'aboutbot'){
      echo 'Jarvis Version 1.0';
      return;
    }

    if (strpos($question, "time") !== false) {
      echo "The time is ".date("g:i A e");
      return;
    }

<<<<<<< HEAD
    if (strpos($question, 'location') !== false){
      if (isset($_POST['lat'])) {
        $lat=$_POST['lat'];
        $long=$_POST['lon'];
      }else{
        echo "Please enable location on your device, reload the page and try again";
        return;
      }
      
      $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&sensor=false";
      $json = @file_get_contents($url);
      $data = json_decode($json);
      $status = $data->status;
      $address = '';
      if($status == "OK"){
        echo 'Your Approx. location is:<br><br>'. $address = $data->results[0]->formatted_address;
        return;
      }else{
        echo "Location Data Unavailable, Try Again or Reload Page";
        return;
      }
    }


    if (strpos($question, 'weather') !== false){
      if (isset($_POST['lat'])) {
        $lat=$_POST['lat'];
        $long=$_POST['lon'];
      }else{
        echo "Please enable location on your device, reload the page and try again";
        return;
      }

      $url = 'https://api.darksky.net/forecast/d7ed37fea08e4f43c8e50182ba936c59/'.$lat.','.$long.'?units=si';
      $json = @file_get_contents($url);
=======
    // return user location (this is set on page load/reload)
    // if (strpos($question, 'location') !== false){
    //   $lat=$_POST['lat'];
    //   $long=$_POST['lon'];
      
    //   $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&sensor=false";
    //   $json = @file_get_contents($url);
    //   $data = json_decode($json);
    //   $status = $data->status;
    //   $address = '';
    //   if($status == "OK"){
    //     echo 'Your Approx. location is:<br><br>'. $address = $data->results[0]->formatted_address;
    //     return;
    //   }else{
    //     echo "Location Data Unavailable, Try Again or Reload Page";
    //     return;
    //   }
    // }


    // if (strpos($question, 'weather') !== false){
    //   $lat=$_POST['lat'];
    //   $long=$_POST['lon'];

    //   $url = 'https://api.darksky.net/forecast/d7ed37fea08e4f43c8e50182ba936c59/'.$lat.','.$long.'?units=si';
    //   $json = @file_get_contents($url);
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
      
    //   if ($json != false) {
    //     $data = json_decode($json);
    //     $summary = $data->currently->summary;
    //     $temperature = $data->currently->temperature.' &degC';
    //     $visibility = $data->currently->visibility.' km';
    //     $windSpeed = $data->currently->visibility.' mps';
    //     $timeZone = $data->timezone;
    //     echo 'The approx. weather information for '.$timeZone.' is:<br><br>'. $summary.'<br>Temperature = '.$temperature.'<br>Visibility = '.$visibility.'<br>Wind Speed = '.$windSpeed;
    //     return;
    //   }else {
    //     echo "Failed to get weather information, please try again";
    //     return;
    //   }
    // }

    require "../../config.php";

    try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }

    function trainMe(){
      $trainMsg = ["Hmmm! I don't quite understand what you mean.", "I guess I don't know everything afterall", "Sorry, I don't have that information yet!", "My knowledge is quite limited!", "I am young and still learning ", "This is awkward, I don't know what you mean"];
      $train = "If you would like to train me, enter data in the format below<br><br><strong>train:question#answer<strong>";
      $randMsg = $trainMsg[mt_rand(0,5)].'<br><br>'.$train;
      echo $randMsg;
    }

    $sql = 'SELECT question, answer FROM chatbot';
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $db_qestion = [];
    $db_answer = [];
    $regex = '/^.*\b'.$question.'\b.*$/i';

    if (strpos($question, "train:") !== false) {
      $trainData = preg_replace("/^\b(train:)\b/", "", $question);
      $trainArray = explode('#', $trainData);
      $trainQuestion = trim($trainArray[0]);
      $trainAnswer = trim($trainArray[1]);

      if (isset($trainArray[2])){
        $password = trim($trainArray[2]);
      }else {
        echo "Please enter train data with password and re-submit";
        return;
      }

      if ($password !== 'password') {
        echo "The password entered is incorrect. Please enter the correct value";
        return;
      }

      $sqlInsert = 'INSERT INTO chatbot (question, answer) VALUES (:trainQuestion, :trainAnswer)';
      $insertStatement = $conn->prepare($sqlInsert);
      $insertStatement->bindValue(':trainQuestion', $trainQuestion);
      $insertStatement->bindValue(':trainAnswer', $trainAnswer);
      $insertStatement->execute();
      $insertStatement->closeCursor();

      echo 'Thanks Human! Feels good to be smarter!';
      return;
    }

    foreach ($result as $val) {
      if (preg_match($regex, $val['question'])) {
        array_push($db_qestion, $val['question']);
        array_push($db_answer, $val['answer']);
      }
    }

    if (count($db_qestion)>0) {
      $arrLen = count($db_qestion);
      $randVal = mt_rand(0,$arrLen-1);
      echo ucfirst(trim($db_answer[$randVal]));
      return;
    }else{
      trainMe();
      return;
    }

  }
?>



<?php
  if($_SERVER['REQUEST_METHOD'] === "GET"){
    $sql = "SELECT * FROM `secret_word` LIMIT 1";
    $q = $conn->prepare($sql);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $secret_word = $data['secret_word'];
  }
  date_default_timezone_set("Africa/Lagos");

  $hour = date('H');
  if ($hour <=11) {
    $greeting = 'Good Morning';
  } else if ($hour <=15) {
    $greeting = 'Good Afternoon';
  } else {
     $greeting = 'Good Evening';
  }

?>

<?php if($_SERVER['REQUEST_METHOD'] === "GET"){ ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,700" rel="stylesheet">
  <script type="text/javascript" src="https://use.fontawesome.com/8ad6e47973.js"></script>
<<<<<<< HEAD
  <script type="text/javascript">
    var options = {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    };

    function success(pos) {
      var crd = pos.coords;
      $lat = crd.latitude;
      $lon = crd.longitude;
    }

    function error(err) {
      console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    navigator.geolocation.getCurrentPosition(success, error, options);

  </script>
=======
<!--   <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> -->
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
  <style type="text/css">

    body {
      font-family: 'Fira Sans', sans-serif;
      font-size: 25px;
      color: rgb(120, 120, 120);
    }

    .main {
      width: 1300px;
      height: 500px;
      margin: 50px 400px 0 auto;
      padding-top: 2rem;
      
    }

    #fixed {
      display: inline-block;
      height: 100px;
      width: 1200px;
      border-radius: .25rem;
      background: rgba(0, 200, 240, 0.5);
      text-align: right;

    }

    #title {
      color: #fff;
      font-weight: 700;
      font-size: 65px;
      margin-right: 150px;
      letter-spacing: .5rem;
    }

    #positioned {
      position: absolute;
      top: 200px;
      width: 1150px;
      padding-left: 3%;

    }

    img {
      width: 450px;
      max-height: 450px;
      float: left;
      box-sizing: content-box;
    }

    ul {
      list-style: none;
    }

    a {
      color: #fff !important;
    }

    a:hover {
      text-decoration: none;
    }

    #second_list {
      font-style: italic;
      font-weight: 300;
    }

    .list_items {
      float: left;
      font-weight: 400;
      margin-top: 50px;
    }

    #chat_bot {
      font-size: 20px;
      position: fixed;
      z-index: 10;
      right: 10px;
      bottom: 7px;
      width: 450px;
    }

    .input {
      height: 0px;
      box-sizing: border-box !important;
      transition: height 1s;
      display: none;
    }

    input {
      width: 82%;
      outline: none;
      float: left;
      border-bottom-left-radius: 10px;
      border-left: 5px solid rgba(0, 200, 240, 0.7);
      border-bottom: 5px solid rgba(0, 200, 240, 0.7);
    }

    #send {
      font-size: 130%;
      outline: none;
      width: 18%;
      vertical-align: bottom;
      background: #fff;
      float: right;
      border-bottom-right-radius: 10px;
      border-style: normal !important;
      border-right: 5px solid rgba(0, 200, 240, 0.7);
      border-bottom: 5px solid rgba(0, 200, 240, 0.7);
      border-left: none;
    }

    #chat_area {
      overflow: auto;
      color: black;
      background: rgb(200, 230, 240);
      border: 5px solid rgba(0, 200, 240, 0.7);
      border-bottom: none;
      height: 0px;
      max-height: 600px;
      width: 100%;
      box-sizing: border-box !important;
      transition: height 1s;
    }

    .chat_msg {
      width: 64%;
      border-radius: .4em;
    }

    .msg {
      background: rgba(0, 200, 240, 0.3);
      border-radius: 10px;
      padding: 5px;
      font-size: 20px;
      overflow-wrap: break-word;
    }

    .icon-block {
      background: none;
      font-size: 40px;
    }

    .chat_content_left {
      margin-left: 10px;
      float: left;
    }

    .chat_content_right {
      margin-right: 10px;
      text-align: right;
      float: right;
    }

    #text_input {
      vertical-align: baseline;
      padding: 0;
    }

    #chat_area::-webkit-scrollbar {
    width: 15px;
    }

    /* Track */
    #chat_area::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px rgb(120, 120, 120); 
        border-radius: 5px;
    }
     
    /* Handle */
    #chat_area::-webkit-scrollbar-thumb {
        background: rgba(0, 200, 240, 0.3); 
        
    }

    /* Handle on hover */
    #chat_area::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 200, 240, 0.8); 
    }

    #toggle_view {
      position: relative;
      top: 0;
      right: 0;
      width: 100%;
      height: 45px;
      background-color: rgba(0, 200, 240, 0.7);
      align-items: right;
      border-radius: 10px 10px 0 0;
      padding: 3px 5px 0 10px;
    }

    .toggle_btn {
      float: right;
      height: 100%;
      width: 40px;
      background: none;
      border: none;
      align-self: right;
    }

    span {
      color: #fff;
      font-size: 30px;
      font-weight: 700;
      letter-spacing: .3rem;
    }

    #spinner {
      color: green;
      display: none;
      position: absolute;
      bottom: 45px;
      left: 10px;
    }

  </style>
  <body>
  <div class="main">
    <div id="fixed">
      <p id="title">
        @Tonerolima
      </p>
    </div>
    <div id="positioned">
      <img class="img-thumbnail" src="https://res.cloudinary.com/tonerolima/image/upload/v1523880092/20170909_104232.jpg">
      <ul class="list_items">
        <li>First Name:</li>
        <li>Last Name:</li>
        <li>Other Names:</li>
        <li>Nationality:</li>
        <li>State:</li>
        <li>Current City:</li>
        <li>Phone Number:</li>
        <li>Email Address:</li>
        <li>Specializations:</li>
      </ul>
      <ul class="list_items" id="second_list">
        <li>Anthony</li>
        <li>Oyathelmhi</li>
        <li>Oghenakhogie</li>
        <li>Nigerian</li>
        <li>Edo</li>
        <li>Lagos</li>
        <li>07081627814</li>
        <li>tonero91@gmail.com</li>
        <li>Web Development <br>Oracle Database Admin <br>Linux System Admin </li>
      </ul>
    </div>

  </div>
  <div id="chat_bot">
      <div id="toggle_view">
        <span>ChatBot</span>
        <button class="toggle_btn" id="maximize">
          <i class="fa fa-window-maximize" aria-hidden="true"></i>
        </button>
        <button class="toggle_btn" id="minimize">
          <i class="fa fa-window-minimize" aria-hidden="true"></i>
        </button>
      </div>
      <div id="chat_area" type="text" name="bot_box">
        
        <div class="chat_msg chat_content_left">
          <div class="icon-block"><i class="fa fa-android" aria-hidden="true"></i></div>
          <p class="msg"><?php echo $greeting.',<br><br>' ?> I am Jarvis, your personal assistant.<br><br>Reply with <strong>help</strong> for a list of the actions I can perform.</p>
        </div>


        <div class="chat_msg chat_content_left"><div id="spinner" class="icon-block"><p style="font-size: 25px">Loading...<i class="fa fa-spinner fa-pulse fa-fw"></i></p></div></div>

      </div>
    <input class="input" type="text" name="input_field" id="text_input">
    <button class="input" id="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
    
  </div>
  </body>
<<<<<<< HEAD
=======



>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d

  <script type="text/javascript">
    var newQuestion = "";
    var serverResponse = "";
    var parent = document.getElementById("chat_area");
    var button = document.getElementById("send");
    var textArea = document.getElementById("text_input");
    var spinner = document.getElementById('spinner')
    var min = document.getElementById('minimize');
    var max = document.getElementById('maximize');
    var chatBoxState = 'close';


    parent.scrollTop = parent.scrollHeight;

    function askQuestion(){
      var msg = '<div class="chat_msg chat_content_right"><div class="icon-block"><i class="fa fa-user" aria-hidden="true"></i></div><p class="msg">'+textArea.value+'</p></div>';
      if (textArea.value != "") {
        parent.insertAdjacentHTML('beforeend',msg);
<<<<<<< HEAD
        if (typeof $lat !== 'undefined'){
          $message = {question: textArea.value, lat: $lat, lon: $lon};
        }
        else{
          $message = {question: textArea.value};
        }
=======
        $message = {question: textArea.value};
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
        textArea.value = ("");
        parent.scrollTop = parent.scrollHeight;
        spinner.style.display = 'block';
        window.setTimeout(function(){
          spinner.style.display = 'none';
          $.ajax({
            type: "POST",
            url: "profiles/tonerolima.php",
            data: $message,
            success: function(data){
              botResponse(data);
              parent.scrollTop = parent.scrollHeight;
            },
            error: function(){
<<<<<<< HEAD
              alert("Unable to retrieve answer!");
=======
              spinner.style.display = 'none';
              alert("Unable to retrieve answer. Please try again");
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
            }
          });
        },1000)
      }
    }

    function botResponse(resp){
      var botMsg = '<div class="chat_msg chat_content_left"><div class="icon-block"><i class="fa fa-android" aria-hidden="true"></i></div><p class="msg">'+resp+'</p></div>';
      parent.insertAdjacentHTML('beforeend',botMsg);
    }

    function closeChatBox(){
      if (chatBoxState == 'open') {
        parent.style.height = '0px';
        button.style.height = '0px';
        textArea.style.height = '0px';
        spinner.style.display = 'none';
        chatBoxState = 'close';
        window.setTimeout(function(){
          button.style.display = 'none';
          textArea.style.display = 'none';
        },700)
      }
    }

    function openChatBox(){
      if (chatBoxState == 'close') {
        parent.style.height = '600px';
        textArea.style.height = '55px';
        button.style.height = '55px';
        button.style.display = 'block';
        textArea.style.display = 'block';
        chatBoxState = 'open';
      }
    }

    function loading(){
      var spinner = '<div class="chat_msg chat_content_left"><div class="icon-block"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div></div>';
      parent.insertAdjacentHTML('beforeend',spinner);
    }

    button.addEventListener("click", function(){
      askQuestion();
    })

    textArea.addEventListener("keydown", function(event){
      if (textArea.value == "") {
        return;
      }
      switch(event.key) {
        case "Enter":
        askQuestion();
        break;
      }
      
    })

    min.addEventListener('click', function(){
      closeChatBox();
    })

    max.addEventListener('click', function(){
      openChatBox();
    })

    window.setTimeout(function(){
      openChatBox();
    },1000)


  </script>
<<<<<<< HEAD
<?php } ?>
=======
<?php } ?>
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
