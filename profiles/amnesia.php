<?php session_start();
function gettTime()
{
    date_default_timezone_set('Africa/Lagos');
    return "The time is " . date("h:i:sa");
}
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
return "Amnesia v1.0";
} else if (preg_match("/\b($time)\b/",$input)) {
return gettTime();
} else if (preg_match('/\bhelp\b/',$input)) {
return "Enter train:yourquestion?#youranswer#password to add more questions to  me<br/>Click on restart to clear our conversation and start again<br/>";
}else if($input=="Enter Correct method"||$input == "Try again"){
return "STOP ACTING DULL";
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HNG FUN</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/learn.css" rel="stylesheet">
    <!--    <link href="css/carousel.css" rel="stylesheet">-->
    <link href="css/landing-page.min.css" rel="stylesheet">

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: Ebrima;
            margin-top: 70px;
        }

        .chatbox {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: auto;
            text-align: center;
            font-family: Ebrima;
            float: right;
            background-color: grey;
        }


        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #007BFF;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
        h6{
            text-align:center;
            font-family: Ebrima;

        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }

        .mt{ margin-top: 20px; }
    </style>

</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/index.php">HNG FUN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="learn.php">Learn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listing.php">Interns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testimonies.php">Testimonies</a>
                </li>
            </ul>
        </div>
    </div>
</nav><!-- Page Content -->


<div class="card">
    <img src="http://res.cloudinary.com/kaysy123/image/upload/v1523968386/IMG-20160626-WA0014.jpg" alt="picture" style="width:100%">
    <h3 class="mt">Bassey Kingsley</h3>
    <h6> Designer</h6>
    <h6 style="color: #007BFF"> slack username: amnesia</h6>
    <p><button><a href="www.hngfun/amnesia.php"></a>  HNG 4.0 Intern</button></p>
 </div>
 <div class="chatbox"> 
        <p style="color: #FFFFFF">&nbsp;
    </p>
    <p style="color: #e9e9e9; font-size: 24px; font-weight: bolder;">CHATTER-BOT    </p>
    <p style="color: #FFFFFF">Type help to learn how to Use Me</p>
    <p style="color: #FFFFFF">    <form name = "askMe" method="post">
    <p>
        <label>
            <input name="input" type="text" class="tb5"  placeholder="Type you message then,Press Ask to send.">
        </label>
        <label>
        <input name="button" type="submit"  class="btn btn-primary mb-2" id="button" value="ASK">
        </label>
        <label>
        <input name="restart" type="submit"  class="btn btn-primary mb-2"  id="button" value="Restart">
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
 </div>






<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a id="twitter" href="https://twitter.com/basi_rafael">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a id="github" href="https://github.com/https://github.com/Kaysy123">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
                        </a>
                    </li>

                </ul>
                <p class="copyright text-muted">Copyright &copy; HNG FUN 2018</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/hng.min.js"></script>

<?php
try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $data['secret_word'];
?>

</body>
