<?php
require "../../config.php";


//connection
$db = "hng_fun";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo 'connection successful';
}
  global $conn;

//end of connection


if (isset($_POST['phpques'])){
    //gets the question from the user
$question = $_POST['phpques'];
$question = trim($question);
$question = strtolower($question);

//explode, trim and implode to make it a normal string
$questionA = explode(" ",$question);
$counter = 0;
while ($counter < count($questionA)){
   $questionA[$counter] =  trim($questionA[$counter]);
    $counter++;
}
$question = implode(" ",$questionA);
$question = trim($question);


$train = 0;
$trainString = "train";
$convertString = "convert";
$LocateString = "locate";
//search if it starts train : 
if (stripos($question, $trainString) === FALSE and stripos($question, $convertString) === FALSE)
{
//if it doesn't start with train
//do below

$q = "SELECT answer FROM chatbot WHERE question='$question'";
$r = mysqli_query($conn, $q);

if (mysqli_num_rows($r) > 0)
    {
        $answer_index = rand(0, (count($result) - 1));

        while($answer = mysqli_fetch_assoc($r)){

            $ans = $answer[$answer_index]['answer'];
        }
        echo $ans;

    }
else {
    echo '<font style ="font-size:10px ">WOAH that\'s too much.Teach me using this format<i>train:yourquestion#youranswer#password</i></font>';
    }

}
else if(stripos($question, $convertString) !== FALSE){
 
    $question = stristr($question,$trainString);
    $questionArray = explode(":",$question);
    $question = $questionArray[1];
    $base_and_other = $question = explode("#",question);
    $base = $base_and_other[0];
    $other = $base_and_other[1];

    $base = trim($base);
    $other = trim($other);
    $quesArray = explode(" ",$ques);
    $qcounter = 0;
    
    jConvert($base, $other);


}
// else if(stripos($question, $trainString) !== FALSE){

// }




//if it contains train,check if it contains : and #; : get the postion of : and  # to be able to strip it
//if it containes train and doesn't contain the other characters wrong format

else if (stripos($question, $trainString) !== FALSE){

    $colonPos = stripos($question, ":");
    $hashPos = stripos($question, "#");
    $questionLength = strlen($question);
    $question = stristr($question,$trainString);
    $questionArray = explode(":",$question);
    $question = $questionArray[1];
    $ques_and_ans_and_pass = $question = explode("#",$question);
    $ques = $ques_and_ans_and_pass[0];
    $ans = $ques_and_ans_and_pass[1];
    $pass = $ques_and_ans_and_pass[2];

    $quesArray = explode(" ",$ques);
    $qcounter = 0;
    while ($qcounter < count($quesArray)){
   $quesArray[$qcounter] =  trim($quesArray[$qcounter]);
    $qcounter++;
    }
    $ques = implode(" ",$quesArray);
    $ques = trim($ques);


    $ansArray = explode(" ",$ans);
    $acounter = 0;
    while ($acounter < count($ansArray)){
    $ansArray[$acounter] =  trim($ansArray[$acounter]);
    $acounter++;
    }
    $ans = implode(" ",$ansArray);
    $ans = trim($ans);

    $pass = trim($pass);

    if ($pass === "password")
    {
    $train_query = "INSERT INTO chatbot (question, answer)
                    VALUES ('$ques', '$ans')";
    $result = mysqli_query($conn, $train_query);
    echo "Alright, You just made me smarter";

    }
    else{
        echo "You Are Not Allowed To Train Me".$pass;
    }
   

}


}//end of the parent if statement
else{
    echo "error";
}


function jTime($location) {
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

 function jConvert($base, $other){
     $api_key = "U7VdzkfPuGyGz4KrEa6vuYXgJxy4Q8";
     $url = "https://www.amdoren.com/api/currency.php?api_key=" . $api_key . "&from=" . $base . "&to=" . $other;

     $response = file_get_contents($url);
     $response = json_decode($response, true);
     echo "1 ". strtoupper($base) ." is equal to ".  strtoupper($other)  ." " .$response['amount'];
 }


?>