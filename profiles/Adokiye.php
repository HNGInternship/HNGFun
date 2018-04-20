<?php
include "../answers.php";
<<<<<<< HEAD
<<<<<<< HEAD

            require "../../config.php";
            try {
                $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
                echo "connection successful";
            } catch (PDOException $pe) {
                die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
            }
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
function askQuestion($input)
=======
require "../../config.php";
$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;

=======
require "../../config.php";
$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;

>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//
if (isset($_POST['button'])) {
    if (isset ($_POST['input']) && $_POST['input'] !== "") {
        $asked_question_text = $_POST['input'];
        echo askQuestion($asked_question_text);
    }
}function askQuestion($input)
<<<<<<< HEAD
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
    {
        $split = preg_split("/(:|#)/", $input, -1);
        global $conn;
        $action = "train";
        if ($split[0] !== $action && !isset($split[1]) && !isset($split[2])) {
            $result = $conn->query("SELECT id FROM chatbot where question = '$input'");
<<<<<<< HEAD
<<<<<<< HEAD
            $fetched_records = $result->fetch_all(MYSQLI_ASSOC);
=======
=======
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
            if ($result==true){


            $fetched_records = mysqli_fetch_field($result);
            mysqli_free_result($result);
<<<<<<< HEAD
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
            if ($fetched_records === true) {
                $result2 = $conn->query("SELECT answer FROM chatbot where id = '{$fetched_records[0]['id']}'");
                $fetched_answer = $result2->fetch_all(MYSQLI_ASSOC);
                return $fetched_answer[0]['answer'];
            } else {
                if ($split[0] == "What is the current time?" || $split[0] == "what is the current time?" || $split[0] == "what is the current time" || $split[0] == "What is the current time") {
                    return get_current_time();
                } else {
                    if ($split[0] == "Who is your creator?" || $split[0] == "who is your creator?" || $split[0] == "who is your creator" || $split[0] == "Who is your creator") {
                        return myCreator();
                    } else
                        return "ENTER train:your question#your answer  to add questions and answers to the database";
                }
<<<<<<< HEAD
<<<<<<< HEAD
            }
=======
            }}
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
            }}
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
        } elseif ($split[0] == $action && isset($split[1]) && isset($split[2])) {
            $asked_question_answer = "INSERT INTO chatbot (question, answer) VALUES ('$split[1]','$split[2]')";
            $conn->query($asked_question_answer);
            echo "Question and answer added successfully";
        } else if ($split[0] == $action && isset($split[1]) && isset($split[2]) && $split[2] == "((get_current_time))") {
            $time = get_current_time();
            $asked_question_answer = ("INSERT INTO chatbot (question, answer) VALUES ('$split[1]','$time')");
            $conn->query($asked_question_answer);
            return "Question and answer with getCurrentTime function added successfully";
        } else if ($split[0] == $action && isset($split[1]) && isset($split[2]) && $split[2] == "((myCreator))") {
            $create = myCreator();
            $asked_question_answer = ("INSERT INTO chatbot (question, answer) VALUES ('$split[1]','$create')");
            $conn->query($asked_question_answer);
            echo "Question and answer with myCreator function added successfully";
        } else
            return "ENTER train:your question#your answer  to add questions and answers to the database";
<<<<<<< HEAD
<<<<<<< HEAD
    }    if (isset($_POST['button'])) {
            if (isset ($_POST['input']) && $_POST['input'] !== "") {
                $asked_question_text = $_POST['input'];
                echo askQuestion($asked_question_text);
            }

=======
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adokiye Iruene</title>
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
    </marquee><form name = "askMe" method="post">
        <p>
            <label>
                <input name="input" type="text" class="tb5">
            </label><label>
                <input name="button" type="submit" class="fb7" id="button" value="ASK">
            </label>
            <br />

        </p>
        <p>&nbsp;</p>
    </form>
    <p style="font-style: normal; font-weight: bold;">&nbsp;</p>
    <p style="font-style: normal; font-weight: bold;">NAME : <?php echo "Iruene Adokiye" ?></p>
    <p style="font-weight: bold">USERNAME : <?php echo "Adokiye" ?></p>



</div>
</body>
</html>
