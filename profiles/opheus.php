

<?php
   // error_reporting(E_ALL);
  //  ini_set("display_errors", 1);
//header('Access-Control-Allow-Origin: *'); 
if($_SERVER['REQUEST_METHOD'] === "POST"){


//ini_set("output_buffering",4096);
//session_start();

if(isset($_POST['opheuslocation'])) {
echo $time = get_time($_POST['opheuslocation']);
}
elseif(isset($_POST['opheusweather'])) {
echo $weather = get_weather($_POST['opheusweather']);
}
elseif(isset($_POST['browser'])) {
echo $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
}



////////////////////////////////////////////TRAIN OPHEUS BOT /////////////////////////////////////////////////////
elseif(isset($_POST['opheustrain'])) {
	
	
    //$train = $_GET['opheustrain'];
	function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
 $train = $_POST['opheustrain'];
//$text = "#train: this a question | this my answer :)";
$exploded = multiexplode(array(":","|"),$train);

$question = trim($exploded[1]);

$answer = trim($exploded[2]);

if (!defined('DB_USER'))
	{
	require "../../config.php";

	}

try
	{
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	}

catch(PDOException $pe)
	{
	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}


try {
    
    $sql = "insert into chatbot (question, answer) values (:question, :answer)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':question', $question);
				$stmt->bindParam(':answer', $answer);
				$stmt->execute();
    
    echo "Thank you! i just learnt something new, my master would be proud of me.";
	
	}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
$conn = null;

}









///////////////////////////////////////////GET OPHEUS ANSWER FROM DB////////////////////////////////////////////////////

elseif(isset($_POST['opheuscheck'])) {
	
	if (!defined('DB_USER'))
	{
	require "../../config.php";

	}

try
	{
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	}

catch(PDOException $pe)
	{
	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}


$check = $_POST['opheuscheck'];

$stmt = $conn->prepare("SELECT * FROM chatbot WHERE question='$check' ORDER BY rand() LIMIT 1");
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




///////////////////////////////////////////////////////END OF GET MY ANSWER/////////////////////////////////////////////////////////////////





//function bot_answer($check) {


//}









//function train_bot ($train) {



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

//}

elseif(isset($_POST['timing'])) {
	
	$string = $_POST['timing'];
	$keyworded = 'in';
	$finder    = strpos($string, $keyworded) + strlen($keyworded);
	$cityplace = substr($string, $finder);
	$city = rawurlencode(trim($cityplace));
	//$map_address = "new york";
	$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=$city";
	$lat_long = get_object_vars(json_decode(file_get_contents($url)));
	// pick out what we need (lat,lng)
	//$lat_long = $lat_long['results'][0]->geometry->location->lat . "," . $lat_long['results'][0]->geometry->location->lng;
	$latitude = $lat_long['results'][0]->geometry->location->lat;
	$longitude = $lat_long['results'][0]->geometry->location->lng;

	
	
	$url2 = 'https://maps.googleapis.com/maps/api/timezone/json?location='.$latitude.','.$longitude.'&timestamp='.time().'&sensor=false';
	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_URL, $url2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$json_string = curl_exec($ch);
	$parsed_json = json_decode($json_string);
	$timezoneid = $parsed_json->timeZoneId;
	
	date_default_timezone_set("$timezoneid");
	$datenew = date('h:i:s A d-m-Y') ;
	
	echo "The current time and date in $cityplace is $datenew";

}

elseif(isset($_POST['weather'])) {
	
	
	$string = $_POST['weather'];
	$keyworded = 'in';
	$finder    = strpos($string, $keyworded) + strlen($keyworded);
	$cityplace = substr($string, $finder);
	$city = rawurlencode(trim($cityplace));
 
	#Find latitude and longitude
	 
	//$map_address = "new york";
	$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=$city";
	$lat_long = get_object_vars(json_decode(file_get_contents($url)));
	// pick out what we need (lat,lng)
	//$lat_long = $lat_long['results'][0]->geometry->location->lat . "," . $lat_long['results'][0]->geometry->location->lng;
	$latitude = $lat_long['results'][0]->geometry->location->lat;
	$longitude = $lat_long['results'][0]->geometry->location->lng;




	$url2 = "https://www.amdoren.com/api/weather.php?api_key=N5ePG6a2yFTcT4bABY83xuGfSnbd7v&lat=$latitude&lon=$longitude";
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $url2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$json_string = curl_exec($ch);
		$parsed_json = json_decode($json_string);
		$forecasts = $parsed_json->forecast;
		
		foreach ($forecasts as $forecast) {
			$summary = $forecast->summary;
			$date = $forecast->date;
			$icon = $forecast->icon;
			echo "<br><img src='https://www.amdoren.com/media/$icon' title='$summary'></img><br/><strong>$date is going to be $summary  </strong>";

		}
}









}

//else {




if($_SERVER['REQUEST_METHOD'] === "GET"){


    try {
        $sql = 'SELECT intern_id, name, username, image_filename FROM interns_data WHERE username=\'opheus\'';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
		
		$name = $data["name"];
		$username = $data["username"];
		$imagelink = $data["image_filename"];
	
?>

<html>
<head>
<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  max-height: auto;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.titler {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}


button:hover, a:hover {
  opacity: 0.7;
}

#i {
    color: #28da5f !important;
}
</style>
<style type="text/css">
    	                    
.customfoo {
    position: fixed;
    bottom: 0;
    width: 400;
    right: 0;
  }
 .portlet {
    margin-bottom: 15px;
}

.btn-white {
    border-color: #cccccc;
    color: #333333;
    background-color: #ffffff;
}

.portlet {
    border: 1px solid;
}

.portlet .portlet-heading {
    padding: 0 15px;
}

.portlet .portlet-heading h4 {
    padding: 1px 0;
    font-size: 16px;
}

.portlet .portlet-heading a {
    color: #fff;
}

.portlet .portlet-heading a:hover,
.portlet .portlet-heading a:active,
.portlet .portlet-heading a:focus {
    outline: none;
}

.portlet .portlet-widgets .dropdown-menu a {
    color: #333;
}

.portlet .portlet-widgets ul.dropdown-menu {
    min-width: 0;
}

.portlet .portlet-heading .portlet-title {
    float: left;
}

.portlet .portlet-heading .portlet-title h4 {
    margin: 10px 0;
}

.portlet .portlet-heading .portlet-widgets {
    float: right;
    margin: 8px 0;
}

.portlet .portlet-heading .portlet-widgets .tabbed-portlets {
    display: inline;
}

.portlet .portlet-heading .portlet-widgets .divider {
    margin: 0 5px;
}

.opheuscont {
	  margin: 0 auto;
	  background-color: white;
	  border: 0.1px solid #333;
	  border-radius: 2px;
	  height: 500px;
	  margin-top: 15px;
}
.portlet .portlet-body {
	  width: 350px;
	  margin: 0 auto;
	  background-color: white;
	  border: 0.1px solid #333;
	  border-radius: 2px;
	  height: 500px;
	  margin-top: 15px;
	  overflow: scroll;
    padding: 15px;
    background: #fff;
}

.portlet .portlet-footer {
    padding: 10px 15px;
    background: #fbf0e4;
}

.portlet .portlet-footer ul {
    margin: 0;
}

.portlet-green,
.portlet-green>.portlet-heading {
    border-color: #16a085;
}

.portlet-green>.portlet-heading {
    color: #fff;
    background-color: #16a085;
}

.portlet-orange,
.portlet-orange>.portlet-heading {
    border-color: #f39c12;
}

.portlet-orange>.portlet-heading {
    color: #fff;
    background-color: #f39c12;
}

.portlet-blue,
.portlet-blue>.portlet-heading {
    border-color: #2980b9;
}

.portlet-blue>.portlet-heading {
    color: #fff;
    background-color: #2980b9;
}

.portlet-red,
.portlet-red>.portlet-heading {
    border-color: #e74c3c;
}

.portlet-red>.portlet-heading {
    color: #fff;
    background-color: #e74c3c;
}

.portlet-purple,
.portlet-purple>.portlet-heading {
    border-color: #8e44ad;
}

.portlet-purple>.portlet-heading {
    color: #fff;
    background-color: #8e44ad;
}

.portlet-default,
.portlet-dark-blue,
.portlet-default>.portlet-heading,
.portlet-dark-blue>.portlet-heading {
    border-color: #34495e;
}

.portlet-default>.portlet-heading,
.portlet-dark-blue>.portlet-heading {
    color: #fff;
    background-color: #34495e;
}

.portlet-basic,
.portlet-basic>.portlet-heading {
    border-color: #333;
}

.portlet-basic>.portlet-heading {
    border-bottom: 1px solid #333;
    color: #333;
    background-color: #fff;
}

@media(min-width:768px) {
    .portlet {
        margin-bottom: 30px;
    }
}

.text-green {
    color: #16a085;
}

.text-orange {
    color: #f39c12;
}

.text-red {
    color: #e74c3c;
}    
.username {
  color: blue;
  font-weight: bold;
}

.bot {
  color: green;
  font-weight: bold;
}
.i {
	color: #ffffff !important;
}
  
     
    </style>
</head>
<body>
<br>
<h4 style="text-align:center">User Profile</h4>
<br>


<div class="card">
  <img src="<?php echo $imagelink; ?>" alt="ima" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <h2>@<?php echo $username; ?></h2>
  <p class="titler">Web Designer & Developer, UI/UX Designer</p>
  <p>Delta State Univeristy (B.Sc Physics)</p>
  <p>Nigeria</p>
  <div style="margin: 24px 0;">
    <a href="https://t.me/opheus"><i class="fa fa-telegram"></i></a> 
    <a href="https://twitter.com/orpheusohms"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/orpheusohms/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/j.ominiabohs"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
 
<div class="customfoo">                  
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-md-12 col-md-offset-4">
            <div class="portlet portlet-blue">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h4><i class="fa fa-circle text-green"></i>&nbsp;OPHEUS BOT - Customer Service</h4>
                    </div><br>
                    <div class="portlet-widgets">
                        <div class="btn-group">
                            <button type="button" class="btn btn-white dropdown-toggle btn-xs" data-toggle="dropdown">
                                <i class="fa fa-circle text-green"></i> Online
                            </button>
                        </div>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion" href="#chat"><i class="fa fa-chevron-down"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="chat" class="panel-collapse collapse in">
                    <div>
                    <div class="portlet-body"  id="scrollbody">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-center text-muted small"><?php $date = date("Y-m-d h:i:sa"); echo $date;?></p>
                            </div>
                        </div>
                     
                       <div id="opheuscont" class="opheuscont">
						
						</div>
                    </div>
                    </div>
                    <div class="portlet-footer">
                        <form role="form">
                            <div class="form-group">
                                <textarea id='text-sms' name="controls-box" class="form-control" placeholder="Enter message..."></textarea>
                            </div>
							<div>
							 <input checked type="checkbox" id="enter">
							<label>Send On Enter</label></div>
                            <div class="form-group">
                                <button type="button" id="send-button" class="btn btn-white pull-right">Send</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-4 -->
    </div>
</div>
</div>   
<?php
$ip       = $_SERVER['REMOTE_ADDR']; 
$ipsample = "197.211.58.103";
$date     = gmdate("r"); 
$details  = json_decode(file_get_contents("https://ipapi.co/{$ip}/json/")); 
$city     = $details->city; 
$code     =$details->region_code;
$state     = $details->region; 
$zipcode     = $details->postal; 
$cntry  = $details->country_name; 


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






///https://ipapi.co/{$ip}/json\\\
///========================// By Opheus \\========================\\\
//$ip       = $_SERVER['REMOTE_ADDR']; 
//$date     = gmdate("r"); 
//$details  = json_decode(file_get_contents("https://ipapi.co/{$ip}/json")); 
//$host     = $details->hostname; 
//$city     = $details->city; 
//$code     =$details->region_code;
//$state     = $details->region; 
//$zipcode     = $details->postal; 
//$ccode     = $details->country; 
//$cntry  = $details->country_name; 
//$md5      = md5($date); 
//$sha1     = sha1($date); 




// Usage:

$browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
$device = get_device_name($_SERVER['HTTP_USER_AGENT']);





?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" ></script>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script>
var username = ''
var country = '<?php echo $cntry ?>';
var state = '<?php echo $state ?>';
var browser = '<?php echo $browser ?>';
var device = '<?php echo $device ?>';
var ip = '<?php echo $ip ?>';
var ip2 = '<?php echo $ipsample ?>';

//$.getJSON("http://freegeoip.net/json/", function(data) {
  //  var country_code = data.country_code;
  //  var country = data.country_name;
   // var ip = data.ip;
    //var time_zone = data.time_zone;
   // var latitude = data.latitude;
    //var longitude = data.longitude;

   // alert("Country Code: " + country_code);
   // alert("Country Name: " + country);
   // alert("IP: " + ip); 
    //alert("Time Zone: " + time_zone); 
//});

// send the message to user
function send_message(message){
      var prevSms = $('#opheuscont').html();
      if (prevSms.length > 8) {
        prevSms = prevSms + '<br>'
        }
      $('#opheuscont').html(prevSms + '<span class="cureent_sms">' + '<span class="bot">opheusbot: </span>' + message + '</span>');
	  $('.portlet-body').scrollTop($('.portlet-body').prop('scrollHeight'));
      $('.cureent_sms').hide();
      $('.cureent_sms').delay(50).fadeIn();
      $('.cureent_sms').removeClass("current_sms");
    }

// get the username
function get_username(){
    send_message('Hi, friend what should i call you....?');
	responsiveVoice.speak('Welcome, i am online if you need me. Click the chat and enter your name only to begin.','UK English Male');
}


// simple ai function
function ai(message){
        if (username.length < 1){
          username = message;
          send_message('Hi, nice to meet you ' + username + '. Would you like to train me? If yes please use the format. train: this is a question | this is an answer.')
		  responsiveVoice.speak('Hi, nice to meet you ' + username + '. Would you like to train me? If yes please use the format. train: this is a question | this is an answer.','UK English Male');
        }

        else if ((message.indexOf('what is the time now') >= 0) || (message.indexOf('what is my time') >= 0) || (message.indexOf('what time is it') >= 0)){
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
          send_message('your current time is: ' + time +'.' );
          responsiveVoice.speak('your current time is: ' + time +'.' ,'UK English Male');
        }
		 else if ((message.indexOf('can you locate me') >= 0) || (message.indexOf('what is my location') >= 0) || (message.indexOf('where am i') >= 0)){
          send_message('you are currently in '+ state +','+ country + '.');
          responsiveVoice.speak('you are currently in '+ state +','+ country + '.','UK English Male');
        }
		 else if ((message.indexOf('who am i') >= 0)|| (message.indexOf('what am i') >= 0)){
          send_message('A human from '+ state +','+ country + '&nbsp;currently using a '+ browser +'&nbsp;on a '+ device + '&nbsp;Device with ip address '+ ip +'.' );
          responsiveVoice.speak('You are human from '+ state +','+ country + 'currently using a '+ browser +'on a '+ device + 'Device with ip address '+ ip +'.','UK English Male');
        }
		 else if ((message.indexOf('what browser am i using') >= 0) || (message.indexOf('what device am i using') >= 0) || (message.indexOf('what is my device') >= 0) || (message.indexOf('what is my browser') >= 0)){
			send_message('you are currently using a&nbsp;'+ browser +'&nbsp;on a '+ device + '&nbsp;Device');
          responsiveVoice.speak('you are currently using a '+ browser +'on a '+ device + 'Device','UK English Male');
		  }
		 else if ((message.indexOf('what is my ip address') >= 0) || (message.indexOf('what is my ip') >= 0) || (message.indexOf('what ip am i using') >= 0) || (message.indexOf('show me my ip') >= 0)){
			send_message('your ip address is : '+ ip +'');
          responsiveVoice.speak('your ip address is : '+ ip +'','UK English Male');
		  }
		  else if ((message.indexOf('aboutbot') >= 0) || (message.indexOf('aboutBot') >= 0) || (message.indexOf('About Bot') >= 0) || (message.indexOf('botAbout') >= 0)){
			send_message('Opheus-B0t v1.0');
          responsiveVoice.speak('i am an opheus bot and i am currently at version 1.0.','UK English Male');
		  }
		else if (message.indexOf('train:') >= 0){
		trainer = message;
		$.ajax({
			method: "POST",
			url: 'profiles/opheus.php/',
			data: {opheustrain: trainer },
			success: function(data){
				send_message(data);
				responsiveVoice.speak(data ,'UK English Male');
				
			}
		 });}
		else if (message.indexOf('time in') >= 0){
		citytime = message;
		$.ajax({
			method: "POST",
			url: 'profiles/opheus.php/',
			data: {timing: citytime },
			success: function(data){
				send_message(data);
				responsiveVoice.speak(data ,'UK English Male');
				
			}
		 });}
		else if (message.indexOf('weather in') >= 0){
		forecast = message;
		$.ajax({
			method: "POST",
			url: 'profiles/opheus.php/',
			data: {weather: forecast },
			success: function(data){
				send_message(data);
				responsiveVoice.speak('Here are the current weather conditions for five days including today' ,'UK English Male');
				
			}
		 });}
		else{
		elses = message;
		$.ajax({
			method: "POST",
			url: 'profiles/opheus.php/',
			data: {opheuscheck: elses },
			success: function(data){
				send_message(data);
				responsiveVoice.speak(data ,'UK English Male');
			}
		 });}
}


// main JQuery function
$(function() {

      get_username();

      $('#text-sms').keypress(function(event){
        if (event.which == 13) {
          if ($('#enter').prop('checked')){
            $('#send-button').click();
            event.preventDefault();
          }
        }
      });

    $('#send-button').click(function(){
        var username = '<span class="username">You: </span>'
        var sms = $('#text-sms').val();
        $('#text-sms').val('');
          //store the first sms
        var prevSms = $('#opheuscont').html();

          //check if prev sms length is greater than 8
        if (prevSms.length > 8) {
          prevSms = prevSms + '<br>'
          }

        //show the sms to the opheuscont div
        $('#opheuscont').html(prevSms + username + sms);

        $('.portlet-body').scrollTop($('.portlet-body').prop('scrollHeight'));


        ai(sms);
      });
});



</script>
 <?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    ?>
</div>

</body>
<html>
<?php 
	}
?>
