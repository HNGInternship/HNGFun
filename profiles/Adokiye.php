<?php
global $conn;
function processAskedQuestion($input){

    if(validateTrain_function($input)){
        list($trim, $question) = explode(":", $input);
        $question = trim($question, " ");
        if($question !== ''){
            if(strpos($question, "#") !== false){
                list($question,$answer)  = explode("#", $question);
                $answer = trim($answer, " ");
                if($answer !== ''){
                    training($question, $answer);
                }else{
                    echo "Please enter the question and answer";
                }
            }else{
                echo "Please enter the question and answer";
            }}else{
            echo "Please enter the question and answer";
        }}else if(validateFunction($input)){
        list($functionName, $parameter) = explode('(', $input) ;
        list($parameter, $notUsed) = explode(')', $parameter);
        if(strpos($parameter, ",")!== false){
            $paramenterArr = explode(",", $parameter);
        }switch ($functionName){
            case "time":
            default:
                echo "No command like that";
        }
    }else{
        getAnswerFromDb($input);
    }

if (isset($_POST['button'])) {
    if(!defined('DB_USER')){
        require "../../config.php";
        try {
            global $conn;
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }
if (isset ($_POST['input']) && $_POST['input'] !== "") {
    $asked_question_text = $_POST['input'];
    processAskedQuestion($asked_question_text);
}}
function validateTrain_function($input){if(strpos($input, "train:") !== false){
    return true;
}else{return false;
}
}function validateTextFunction($input){if(strpos($input, "(") !== false){return true;
}else{
    return false;
}}function training($question, $answer){
    global $conn;
    try {
        $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
        $conn->exec($sql);
        $Output_message = "This has been saved   " . $question ." -> " . $answer;
        echo $Output_message;

    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

}function getAnswerFromDb($input)
{
    global $conn;
    if (strpos($input, "deleteEmpty") === false) {
        $input = "'%" . $input . "%'";
        if ($input !== '') {
            $sql = "SELECT answer FROM chatbot WHERE question LIKE " . $input . " ORDER BY answer ASC";
            $result = $conn->query($sql);
            $count = $result->rowCount();
            if ($count > 0) {
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $fetched_data = $result->fetchAll();
                $rand = rand(0, $count - 1);
                echo $fetched_data[$rand]["answer"];
            } else {
                echo "ASK ANY QUESTION IN THE TEXT BOX BELOW OR TYPE IN TRAIN: YOUR QUESTION#YOUR ANSWER
            TO ADD MORE QUESTIONS TO THE DATABASE";
            }
        }else{
            echo "Enter a valid command!";
        }

    }


    if (isset($_GET["query"])) {
        include_once realpath(__DIR__ . '/..') . "/answers.php";
        if (!defined('DB_USER')) {
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
        global $conn;
        global $secret_word;
        try {
            $sql = "SELECT secret_word FROM secret_word";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
            $secret_word = $data['secret_word'];
        } catch (PDOException $e) {
            throw $e;
        }processQuestion($_GET['query']);
    }else{
        echo "------";
    }

}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Adokiye ---- Stage 4</title>
    <style type="text/css">
        #div_main {
            width: 980px;
            margin-right: auto;
            margin-left: auto;
            font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-align: center;
            background-image: url(http://res.cloudinary.com/gorge/image/upload/v1523960257/Internships-1.png);
            height: auto;
        }

        #header {
            background-color: #FFFFFF;
            width: 980px;
            margin-right: auto;
            margin-left: auto;
        }

        .tb5 {
            border: 2px solid #456879;
            border-radius: 10px;
            height: 32px;
            width: 400px;
            background: #B3FAFF;

        }

        .fb7 {
            border: 2px solid #456879;
            outline: none;
            background-color: #FFFFFF;
            vertical-align: middle;
            font-size: 15px;
            text-align: center;
            color: #563F3F;
            cursor: pointer;
        }

    </style>
</head>
<body>
<?php
if(!defined('DB_USER')){
    require "../../config.php";
}
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
global $conn;
$name = '';
$username = '';
$sql = "SELECT * FROM interns_data where username = 'Adokiye'";
foreach ($conn->query($sql) as $row) {
    $name = $row['name'];
    $username = $row['username'];
}

global $secret_word;

try {
    $sql = "SELECT secret_word FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}
?>
<div class=".body" id="div_main">
    <div class=".header" id="header">
        <img src="http://res.cloudinary.com/gorge/image/upload/v1523960590/images.jpg" width="120" height="131" alt=""/>
        <p style="font-size: 36px; text-align: center; color: #563F3F; font-weight: bold;"><span
                    style="font-style: italic; color: #FFFFFF; font-size: 24px;"><span
                        style="color: #6FB0CB; font-size: 30px;">my</span></span> PROFILE</p>
    </div>
    <marquee onmouseover="this.stop();" onmouseout="this.start();">
        <p style=" color: #FFFFFF;font-family: arial, sans-serif; font-size: 14px;font-weight: bold;letter-spacing: 0.3px;">
            ASK ANY QUESTION IN THE TEXT BOX BELOW OR TYPE IN <span style="font-weight: bolder">TRAIN: YOUR QUESTION#YOUR ANSWER</span>
            TO ADD MORE QUESTIONS TO THE DATABASE</p>
    </marquee>
    <div>
        <p style="font-style: normal; font-weight: bold;">&nbsp;</p>
        <p style="font-style: normal; font-weight: bold;">NAME : <?php echo $name ?></p>
        <p style="font-weight: bold">USERNAME : <?php echo $username ?></p>
    </div>
    Chatbot by Adokiye<br />
    <form name = "askMe" method="post">
        <p>
            <label>
                <input name="input" type="text" class="tb5" placeholder="Chat with me! Press Ask to send.">
            </label><label>
                <input name="button" type="submit" class="fb7" id="button" value="ASK">
            </label>
            <br />

        </p>
        <p>&nbsp;</p>
    </form>
</div>
</body>
</html>

