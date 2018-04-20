<?php
 function get_time(){
     //instantiate date-time object
     $datetime = new DateTime();
     //set the timezone to Africa/Lagos 
     $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
     //format the time

     return $datetime->format('H:i: A');
 }
 
 //bitcoin price index
 function bytenaija_hodl(){
     $url ="https://api.coindesk.com/v1/bpi/currentprice.json";
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

// end of functions by johnayeni

/////////////////////////////////////////////////////// Olaogun Function 
function multiplication($a, $b){
    $c = $a * $b;
    echo $c;
}

function addition($a, $b){
    $c = $a + $b;
    echo $c;
}

function subtraction($a, $b){
    $c = $a - $b;
    echo $c;
}

function division($a, $b){
    $c = $a / $b;
    echo $c;
}


// AbseeJP own

  require 'db.php';
 
if (isset($_POST['question'])) {
	$value = $_POST['question'];
	
	$arr = str_split($value);
	if ($arr[0]=='#') {

		$input2 = $value;


		$ab = explode( ':', $input2 );
		$ques = ltrim($ab[0], '#');
		$ans = $ab[1];

		$awesome = "INSERT INTO chatbot (question, answer) VALUES ('$ques', '$ans')";
		$Absee = $conn->query($awesome);
   		$Absee = $Absee->fetch(PDO::FETCH_OBJ);
	}
	else{

	$Absee = $conn->query("SELECT * from chatbot where question = '$value'");
   	$Absee = $Absee->fetch(PDO::FETCH_OBJ);

	if ($Absee) {
		$answer = $Absee->answer ;
		echo '<div class= "container">
				<p  style= "width:60%;background:#BBDEFB;color:white;border-radius:5px;padding:10px;">'
					.$value.'
				<br>
				</p>'.
				'<p style= "float:right;width:40%;background:#90CAF9;color:white;border-radius:5px;padding:10px;margin-bottom:20px;margin-top:10px;">'.$answer.'<br>
				</p>
			</div>';
	
	}else{
		$reply = 'Not in db';
		echo '<div class= "container">
				<p  style= "width:60%;background:#BBDEFB;color:white;border-radius:5px;padding:10px;">'
					.$value.'
				<br>
				</p>'.
				'<p style= "float:right;width:40%;background:#FF5722;color:white;border-radius:5px;padding:10px;margin-bottom:20px;margin-top:10px;">'.$reply.'<br>
				</p>
			</div>';
		
	}
		
	}
}



 ?>
<!-- end of absee own  -->


?>
