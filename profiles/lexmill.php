<?php
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$result2 = $conn->query("Select * from interns_data where username = 'lexmill'");
$user = $result2->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>
function gettTime(){
    date_default_timezone_set('Africa/Lagos');
    return "The time is " . date("h:i:sa");
}function getMyquote(){
    $random = rand(0,11);
    $quote = array("My life is my message. Mahatma Gandhi",
        "Not how long, but how well you have lived is the main thing. Seneca",
        "I love those who can smile in trouble… Leonardo da Vinci",
        "Time means a lot to me because, you see, I, too, am also a learner and am often lost in the joy of forever developing and simplifying. If you love life, don’t waste time, for time is what life is made up of. Bruce Lee",
        "Life is what happens when you’re busy making other plans. John Lennon",
        "It is better to be hated for what you are than to be loved for what you are not. Andre Gide",
        "Dost thou love life? Then do not squander time, for that is the stuff life is made of. Benjamin Franklin",
        "Very little is needed to make a happy life; it is all within yourself, in your way of thinking. Marcus Aurelius",
        "Life is like playing a violin in public and learning the instrument as one goes on. Samuel Butler",
        "In the end, it’s not the years in your life that count. It’s the life in your years. Abraham Lincoln",
        "You’ve gotta dance like there’s nobody watching. William W. Purkey",
        "Believe that life is worth living and your belief will help create the fact. William James");
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
                return "Adokiye v1.0";
            } else if (preg_match("/\b($time)\b/",$input)) {
                return gettTime();
            } else if (preg_match('/\bhelp\b/',$input)) {
                return "Enter train:yourquestion?#youranswer#password to add more questions to dummy me<br/>Click on restart to clear our conversation and start again<br/>";
            }else if($input=="you are mad"||$input == "you're mad"){
                return "YOUR FATHER";
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

	 HNG Internship 4<br>
	 <div class="oj-panel oj-panel-oj-panel-shadow-md"><?php
	 date_default_timezone_set('Africa/Lagos');
	 $currentDateTime = date('Y-m-d H:i:s');
	 echo $currentDateTime;
         ?></h1></div><p class="oj-align-content-center">NAME: <?= $name?><br />USERNAME:: <?= $username?><br/><div class = "oj-flex-item oj-sm-10 oj-md-6 oj-lg-4">
		 <img src="<?php echo $image_filename; ?>" width="320" height="331" alt="Author's Picture"></div>
         </p>
	 </div>
          <label>
            <input name="input" type="text" class="tb5"  placeholder="Chat with me! Press Ask to send.">
        </label><label>
            <input name="button" type="submit"  class="btn btn-primary mb-2" id="button" value="ASK"><label>
                <input name="restart" type="submit"  class="btn btn-primary mb-2"  id="button" value="Restart">
            </label>
        </label>
        <br />

    </p>
    <p>&nbsp;</p>
    </form>&nbsp;</p>
    <p><?php echo $response;echo "<br/>"?>
        <?php foreach($_SESSION["all"] as list($asked,$soln )){ ?>
        <span style="color:greenyellow"><?=  "YOU : $soln <br/>";echo "</span>";echo "<span style=\"color:white\">";
            echo "BOT : $asked<br/>" ?><br/></span></p>
    <?php }?>
	     
	 </body>
	 </html>

