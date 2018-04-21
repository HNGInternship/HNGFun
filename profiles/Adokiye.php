<?php

session_start();

if (!isset($_SESSION["all"])){
    $_SESSION["all"] = [];
}
if(!defined('DB_USER')){
    require "../../config.php";
    $servername = DB_HOST;
    $username_ = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;
    // Create connection
    $conn = mysqli_connect($servername, $username_, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }}
global $conn;

$solution = '';
if (isset($_POST['restart'])){
    session_destroy();
}
if (isset($_POST['button'])) {
    if (isset ($_POST['input']) && $_POST['input'] !== "") {
        $asked_question_text = $_POST['input'];
        $solution = askQuestion($asked_question_text) . "<br/>";
        $_SESSION["all"][] = array($solution, $asked_question_text);
    }
}
function askQuestion($input)
{
    $split = preg_split("/(:|#)/", $input, -1);
    global $conn;
    $action = "train";
    if ($split[0] !== $action && !isset($split[1]) && !isset($split[2])) {
        $question = strtolower($split[0]);
        $sql = 'SELECT answer FROM chatbot WHERE LOWER(question) = "' . $question . '"';
        $result = $conn->query($sql);
            $fetched_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $row_cnt = $result->num_rows;
            if ($row_cnt>0) {
                return $fetched_data[0]['answer'];
            } else
            return "ENTER TRAIN: QUESTION#ANSWER TO ADD MORE QUESTIONS TO THE DATABASE";
    }else if  ($split[0] == $action && isset($split[1]) && isset($split[2])) {
            $question = strtolower($split[1]);
            $sql1 = 'SELECT question FROM chatbot WHERE LOWER(question) = "' . $question . '"';
            $query = $conn->query($sql1);
            $fetched_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $row_cnt = $query->num_rows;
            if ($row_cnt>0) {
                return "QUESTION ALREADY EXISTS ";
            }else
                $the_queried = $conn->query("INSERT INTO chatbot(question, answer) VALUES ('" . $split[1] . "', '" . $split[2] . "')");
                if ($the_queried){
                $saved_message = "Saved " . $split[1] ." -> " . $split[2];
                return $saved_message;
                }else
                return "Please try again";
    }
}

?>


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
            //
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
    $servername = DB_HOST;
    $username_ = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;
    // Create connection
    $conn = mysqli_connect($servername, $username_, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }}
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
    <p class="mycss"> Chatbot by Adokiye</p><br />
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
            <div class="bot-css"> <?php foreach($_SESSION["all"] as list($asked,$soln )){ ?>
                <span style="color:blue"><?=  "YOU : $soln <br/>";echo "</span>";
                echo "BOT : $asked<br/>" ?><br/><?php } ?><br/>
        </div>
    <p>


    </p>
</div>
</body>
</html>



