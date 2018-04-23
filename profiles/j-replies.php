<?php
require "../../config.php";
require "../answers.php";


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
//for debugging conncection
    
}
  global $conn;

//end of connection

       
  try {
      $connn = new PDO("mysql:host=". DB_HOST. ";dbname=".DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
      die("Could not connect to the database " .DB_DATABASE . ": " . $pe->getMessage());
  }


      $question = $_POST['chatMessage'];
      
//end of connection

function getAnswerFromDB($question, $conn, $connn){

$q = "SELECT * FROM chatbot WHERE question='$question'";
$r = mysqli_query($conn, $q);

if (mysqli_num_rows($r) > 0)
    {   
        $sql = "select * from chatbot where question like :question";
      $query = $connn->prepare($sql);
      $query->execute([':question' => $question]);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $query->fetchAll();
      $resultsCount = count($rows);

        $index = rand(0,  $resultsCount - 1);
        $row = $rows[$index];
        $answer = $row['answer'];
        // $answer = mysqli_fetch_assoc($r);
        // $answer = $answer['answer'];


        //if answer has a function call in it
         // $answer =  callFunction();
        // else

        $startParanthesesIndex = stripos($answer, "((");
            if ($startParanthesesIndex === false){
                echo $answer;
            }
            else{
            callFunction($answer, $startParanthesesIndex);
            }

}





else{
   

    $answer = "WOAH! I'll get there...just train me using the format; train : yourquestion # your answer # password";
    echo $answer;
}
}





//trainbot function
function trainJobot($question, $conn){

    $train = 0;
    $trainString = "train";
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
        echo "You Are Not Allowed To Train Me";
    }
}







function callFunction($answer, $open_bracket_pos){

      $closing_brac_pos = stripos($answer, "))");

      if($closing_brac_pos !== false){
        $nameOfFunction = substr($answer, $open_bracket_pos + 2, $closing_brac_pos - $open_bracket_pos - 2);
        $nameOfFunction = trim($nameOfFunction);
        
        if(stripos($nameOfFunction, ' ') !== false){
          echo "The name of the function is invalid for a function";
        }
        
        if(!function_exists($nameOfFunction)){
          echo "Well, the function command does not exist";
        }
        else{
          $functionResult = str_replace("((".$nameOfFunction."))", $nameOfFunction(), $answer);
          echo $functionResult;
        }
      }

}



if (isset($_POST['trainValidity']))
{
    if ($_POST['trainValidity'] == 1){
        trainJobot($question, $conn);
    }
}
else{
    getAnswerFromDB($question, $conn, $connn);
}


?>
