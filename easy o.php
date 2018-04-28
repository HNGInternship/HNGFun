
<?php
include "../answers.php";
require "../../config.php";
$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;

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
    {
        $split = preg_split("/(:|#)/", $input, -1);
        global $conn;
        $action = "train";
        if ($split[0] !== $action && !isset($split[1]) && !isset($split[2])) {
            $sql = "SELECT answer FROM chatbot where question LIKE ".$input."ORDER BY answer ASC";
            $result = $conn->query($sql);
            $count = $result->rowCount();
            if($count > 0){
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $data = $result->fetchAll();
                $rand = rand(0, $count - 1);
                echo $data[$rand]["answer"];

            }else{
                echo "I don't understand that command yet.Use this format <strong>train: question # answer</strong>!";
            }
}elseif  ($split[0] == $action && isset($split[1]) && isset($split[2])) {
            try {

                $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $split[1] . "', '" . $split[2] . "')";

                $conn->exec($sql);
                $saved_message = "Saved " . $split[1] ." -> " . $split[2];


                echo $saved_message;
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
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
}}
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
    <p style="font-style: normal; font-weight: bold;">NAME : <?php echo $name ?></p>
    <p style="font-weight: bold">USERNAME : <?php echo $username ?></p>



</div>
</body>
</html>
