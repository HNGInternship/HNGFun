<?php
function gettTime(){
    date_default_timezone_set('Africa/Lagos');
    return "The time is " . date("h:i:sa");
}
function getMyquote(){
    $random = rand(0,11);
    $quote = array("The past is always TENSE, the future PERFECT",
        "I will JOS go first because you play too much",
        "Why do virgins not like low men? Because they have HYMEN",
        "What if an atom says he's positive he lost an electron",
        "A criminals best asset is his LIE-ABILITY",
        "To write with a broken pencil is POINTLESS",
        "I'm a cannon on the drum line flick the high beams",
        "The fattest knight at the dinner was Sir Cumference, he acquired his size from too much pi",
        "A hole has been found in the nudist camp, the police are looking into it",
        "If you jumped off the bridge in Paris, you will be in Seine",
        "A backward pet writes inverse",
        "The phone call interrupted my nap, I never did get the rest");
    return $quote[$random];
}function getmyJoke(){
    $random = rand(0,6);
    $joke = array("Q. What is the biggest lie in the entire universe?
               A. I have read and agree to the Terms & Conditions.",
        "Q. What do you call it when you have your mom’s mom on speed dial? A. Instagram.",
        "Q. What should you do after your Nintendo game ends in a tie?  A. Ask for a Wii-match!",
        "Why are iPhone chargers not called Apple Juice?!",
        "Q. How does a computer get drunk?  A. It takes screenshots.",
        "Q. Why did the PowerPoint Presentation cross the road?
        A. To get to the other slide.",
        "PATIENT: Doctor, I need your help. I’m addicted to checking my Twitter!
    DOCTOR: I’m so sorry, I don’t follow.",
        "What’s the Gig Deal?
        Have you heard of that new band “1023 Megabytes”? They’re pretty good, but they don’t have a gig just yet."
    );
    return $joke[$random];
}
session_start();
if (!isset($_SESSION["all"])){
    $_SESSION["all"] = [];
}if(!defined('DB_USER')){
    require_once "../../config.php";
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }}
global $conn;
$solution = '';
if (isset($_POST['restart'])){
    session_destroy();
}if (isset($_POST['button'])) {
    if (isset ($_POST['input']) && $_POST['input'] !== "") {
        $function = $_POST['input'];
        $functionName = explode("(", $function);
        if (function_exists($functionName[0])&&strpos($function,"(")&&strpos($function,")")) {
            $functionVariable = explode(')',$functionName[1],2);
            if (!strpos($functionVariable[0],",")){
                $response = $functionName[0]($functionVariable[0]);
            }else
                $functionVariable1 = explode(',',$functionVariable[0],2);
            $response = $functionName[0]($functionVariable1[0],$functionVariable1[1]);
            // Dynamic call using variable value as function name.
        }else{$asked_question_text = $_POST['input'];
            $solution = askQuestion($asked_question_text) . "<br/>";
            $_SESSION["all"][] = array($solution, $asked_question_text);
        }
    }
}
function askQuestion($input)
{$input = strtolower($input);
    $input = trim($input);
    $action = "train:";
    $time = "time";
    global $conn;
    $train = strpos($input,$action);
    if ($input!==""||$input!==" ") {
        if ($train === 0) {
            $explode = explode(':', $input, 2);
            if (isset($explode[1])) {
                $explode2 = explode('#', $explode[1], 2);
                if (isset($explode2[1])) {
                    $explode3 = explode('#', $explode2[1], 2);
                    if (isset($explode3[1])){
                        if (  $explode3[1] == "password") {
                            $query = $conn->query("SELECT question, answer FROM chatbot WHERE LOWER(question) ='" . $explode2[0] . "' and LOWER(answer) =  '" . $explode3[0] . "'");
                            $row_cnt = $query->rowCount();
                            if ($row_cnt > 0) {
                                return "QUESTION ALREADY EXISTS ";
                            } else
                                $the_queried = $conn->query("INSERT INTO chatbot(question, answer) VALUES ('" . $explode2[0] . "', '" . $explode3[0] . "')");
                            if ($the_queried) {
                                $saved_message = "Saved " . $explode2[0] . " -> " . $explode3[0];
                                return $saved_message;
                            } else
                                return "Please try again";
                        } else
                            return "Please enter the right password";
                    }else
                        return "Please enter the password after your answer";
                } else
                    return "The right format is train:yourquestion#youranswer#password";
            } else
                return "The right format is train:yourquestion#youranswer#password";
        } else {
            if (preg_match('/\baboutbout\b/',$input)) {
                return "lexmill v1.0";
            } else if (preg_match("/\b($time)\b/",$input)) {
                return gettTime();
            } else if (preg_match('/\bhelp\b/',$input)) {
                return "Enter train:yourquestion?#youranswer#password to add more questions to dummy me<br/>Click on restart to clear our conversation and start again<br/>";
            }else if($input=="you are mad"||$input == "you're mad"){
                return "YOU ARE NOT ETHICAL";
            }else if(preg_match("/\bquote\b/",$input)){
                return getMyquote();
            }else if(preg_match("/\bjoke\b/",$input)){
                return getmyJoke();
            }
            else {
                $input = $_POST['input'];
                $question = strtolower($input);
                $question = str_replace('?', '', $question);
                $question = trim($question);
                $query = "SELECT * FROM chatbot WHERE LOWER(question) like '$question'";
                $result = $conn->query($query);
                $row_cnt = $result->rowCount();
                $records = $result->fetchAll(PDO::FETCH_ASSOC);
                $rand = rand(0, $row_cnt - 1);
                if ($row_cnt > 0) {
                    return $records[$rand]['answer'];
                } else
                    return "Am sorry, this question wasn't found,Please ENTER TRAIN:QUESTION#ANSWER#password to make me smarter";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="http://www.oracle.com/webfolder/technetwork/jet/js/libs/require/require.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <!meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            background-color:#4169E1;
        }
        .sec1{
            margin-top: 300px;
            text-align: center;
            color: #fff;
            font-size: 5px;
        }        .mycss
                 {
                     text-shadow:1px 3px 1px rgba(255,255,255,1);font-weight:bold;text-transform:uppercase;color:#000000;border: 5px ridge #FFFFFF;letter-spacing:5pt;word-spacing:2pt;font-size:20px;text-align:center;font-family:arial, helvetica, sans-serif;line-height:1;
                 }
    </style>
</head>
<body>


<div>
    <h1>Stage 1</h1>
    <br>
    <img src="http://res.cloudinary.com/dtvv1oyyj/image/upload/c_fill,h_330,w_300/v1524842222/Snapchat-684128679.jpg">
    <hr>
    HNG Internship 2018<br>
    <div class="oj-panel oj-panel-oj-panel-shadow-md"><?php
        date_default_timezone_set('Africa/Lagos');
        $currentDateTime = date('Y-m-d H:i:s');
        echo $currentDateTime;
        ?></h1></div><p class="oj-align-content-center">My name is : <?= "Leke!"?><br />My HNG username is : <?= "lexmill"?><br/><div class = "oj-flex-item oj-sm-10 oj-md-6 oj-lg-4">
        </div>

</div><form method="post">
<label>
    <input name="input" type="text" class="tb5"  placeholder="Chat with Smart!">
</label><br><label>
    <input name="button" type="submit"  class="btn btn-primary mb-2" id="button" value="ASK">&nbsp&nbsp&nbsp<label>
        <input name="restart" type="submit"  class="btn btn-primary mb-2"  id="button" value="Restart">
    </label>
</label>
<br />


<p>&nbsp;</p>
</form>
<p>
    <?php foreach($_SESSION["all"] as list($asked,$soln )){ ?>
    <span style="color:greenyellow"><?=  "YOU : $soln <br/>";echo "</span>";echo "<span style=\"color:white\">";
        echo "BOT : $asked<br/>" ?><br/></span></p>
<?php }?>

</body>
</html>
