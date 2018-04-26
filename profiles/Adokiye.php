<?php
ini_set('display_errors',0);
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
        include "../answers.php";
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
                return "Enter train:yourquestion?#youranswer#password to add more questions to dummy me<br/> or enter the name of any function you want to run";
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Adokiye ---- Stage 4</title>
    <style type="text/css">

        .mycss
        {
            text-shadow:1px 3px 1px rgba(255,255,255,1);font-weight:bold;text-transform:uppercase;color:#000000;border: 5px ridge #FFFFFF;letter-spacing:5pt;word-spacing:2pt;font-size:20px;text-align:center;font-family:arial, helvetica, sans-serif;line-height:1;
        }

        .bot-css {
            display: inline-block;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            width: 300px;
            height: fit-content;
            padding: 18px 0;
            border: none;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            font: normal normal bold 16px/1 "Times New Roman", Times, serif;
            color: rgba(10,6,6,1);
            text-align: center;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            background: rgba(190,216,226,1);
            -webkit-box-shadow: 2px 3px 0 2px rgba(201,201,211,1) ;
            box-shadow: 2px 3px 0 2px rgba(201,201,211,1) ;
            text-shadow: 0 1px 2px rgba(255,255,255, 0.5) , 3px 2px 1px rgba(0,0,0,0.2) ;
            -webkit-transition: font-size 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
            -moz-transition: font-size 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
            -o-transition: font-size 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
            transition: font-size 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
            -webkit-transform: rotateX(-1.64deg) rotateY(-3.4377467707849396deg)   ;
            transform: rotateX(-1.64deg) rotateY(-3.4377467707849396deg)   ;
        }
        #div_main {
            width: 980px;
            margin-right: auto;
            margin-left: auto;
            font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-align: center;
            background-image: url(http://res.cloudinary.com/gorge/image/upload/v1523960257/Internships-1.png);
            height: auto;
            padding-bottom: 1px;
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
        #myform{
            background: rgba(76, 175, 80, 0.3);
            display: inline-block;
            width: 50px;
            height: fit-content;
            float: left;
        }#myBtn {
             display: none; /* Hidden by default */
             position: fixed; /* Fixed/sticky position */
             bottom: 20px; /* Place the button at the bottom of the page */
             right: 30px; /* Place the button 30px from the right */
             z-index: 99; /* Make sure it does not overlap */
             border: none; /* Remove borders */
             outline: none; /* Remove outline */
             background-color: red; /* Set a background color */
             color: white; /* Text color */
             cursor: pointer; /* Add a mouse pointer on hover */
             padding: 15px; /* Some padding */
             border-radius: 10px; /* Rounded corners */
             font-size: 18px; /* Increase font size */
         }

        #myBtn:hover {
            background-color: #555; /* Add a dark-grey background on hover */
        }

    </style>
</head><script>function show_function() {
        var x = document.getElementById("myform");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }// When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }  </script>
<body>
<?php
$name = 'Adokiye Iruene';
$username = 'Adokiye';

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
            ASK ANY QUESTION IN THE TEXT BOX BELOW OR TYPE IN <span style="color: #0C1621">TRAIN: YOUR QUESTION#YOUR ANSWER#password</span>
            TO ADD MORE QUESTIONS TO THE DATABASE</p>
    </marquee>
    <div>
        <p style="font-style: normal; font-weight: bold;">&nbsp;</p>
        <p style="font-style: normal; font-weight: bold;">NAME : <?php echo $name ?></p>
        <p style="font-weight: bold">USERNAME : <?php echo $username ?></p>
    </div>
    <p class="mycss">Chatbot by Adokiye<br />Click on show below to display the password for training me<br/>Enter help, quote or joke<br/>to see qhat i can do</p><br /><button onclick="show_function()" class = "fb7" >SHOW</button>
    <form name = "askMe" method="post">
        <p>
            <label>
                <input name="input" type="text" class="tb5" placeholder="Chat with me! Press Ask to send.">
            </label><label>
                <input name="button" type="submit" class="fb7" id="button" value="ASK"><label>
                    <input name="restart" type="submit" class="fb7" id="button" value="Restart">
                </label>
            </label>
            <br />

        </p>
        <p>&nbsp;</p>
    </form>
    <div class="bot-css"> <?php echo $response;echo "<br/>"?><?php foreach($_SESSION["all"] as list($asked,$soln )){ ?>
        <span style="color:blue"><?=  "YOU : $soln <br/>";echo "</span>";
            echo "BOT : $asked<br/>" ?><br/><?php } ?><br/>
    </div><div id = "myform" style="display:none"  >HAHAHA, THE PASSWORD IS PASSWORD</div>
    <p>


    </p> <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</div>
</body>
</html>

