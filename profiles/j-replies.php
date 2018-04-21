<?php
//connection
$db = "hng_fun";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
//search if it starts train : 
if (stripos($question, $trainString) === FALSE)
{
//if it doesn't start with train
//do below

$q = "SELECT answer FROM chatbot WHERE question='$question'";
$r = mysqli_query($conn, $q);

if (mysqli_num_rows($r) > 0)
    {
        $answer = mysqli_fetch_assoc($r);
        $answer = $answer['answer'];
        echo $answer;

    }
else {
    echo '<font style ="font-size:10px ">WOAH that\'s too much.Teach me using this format<i>train:yourquestion#youranswer#password</i></font>';
    }

}

//if it contains train,check if it contains : and #; : get the postion of : and  # to be able to strip it
//if it containes train and doesn't contain the other characters wrong format

else{

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
?>