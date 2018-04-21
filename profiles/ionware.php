<?php

//$q = $conn->query("select * from secret_word LIMIT 1");
//$result = $q->fetch(PDO::FETCH_OBJ);
//$secret_word = $result->secret_word;
//
////SQL Query
//$query = "select name, username, image_filename from interns_data where username = 'ionware'";
//
//try {
//    //Execute fetch query and harvest result.
//    $q = $conn->query($query);
//    $user = $q->fetch(PDO::FETCH_OBJ);
//
//}
//catch (PDOException $exception) {
//    echo "Server cannot properly establish connection to database.";
//    exit(1);
//}
//catch (Exception $e) {
//    echo "Temporary server problem.";
//    exit(1);
//}

/**
 * Constructs a response object.
 * @param $question
 * @param $answer
 * @return string
 */
function makeResponse($question, $answer)
{
    return json_encode([
        "question" => $question,
        "answer" => $answer
    ]);
}


function respondJson($question, $answer)
{
    echo makeResponse($question, $answer);
    exit();
}


/** Run the Build in Command from answer.php. All my Functions are prefixed with "i"
 * e.g iGitHub, iDictionary.
 * @param $command
 * @param $question
 */
function taskRunner($command, $question)
{
    $string = preg_split("/#\s*/", $command);
    if (count($string) < 3)
        respondJson($question, "Invalid command statement. Correct format is: <b>command: #command_type #option</b>");

    require_once "../answers.php";

    switch (trim($string[1])) {
        case "dictionary":
            iDictionary($string[2]);
            exit();

        case "github":
            iGitHub($string[2]);
            exit();

        default:
            respondJson($question, "Command Type is not recognized. Supported commands are <b>#dictionary and #github</b>");
    }

    exit();
}

/**
 * Handles the iBot Training Mode.
 * @param $string
 * @param $question
 */
function training($string, $question)
{
    $string = preg_split("/#\s*/", $string);
    //Can't figure out this error with preg_split yet, but assume there's always an empty $string[0]
    if (count($string) < 4)
        respondJson($question, "Invalid training format. The correct training mode is: <b>train: #question #answer #password</b>");

    // Check if question or answer supplied is empty. We don't want to learn empty word.
    if (empty($string[1] || empty($string[2])))
        respondJson($question, "Oh oh, seems you have an empty question or answer.");

    // Verify authorization to train Bot.
    if (!($string[3] === 'password'))
        respondJson($question, "Backoff! I can't trust you to feed me memory!");

    //Insert Into DB

    // ...and, little drop of water, makes an Ocean.
    respondJson($question, "Thank you. You've given more knowledge to dummy me.");

    exit();
}


/**
 * Handles the request being sent by delegating to other Handlers.
 * Think of this as the OS on a Kernel.
 * @param $question
 */
function processManager($question)
{
    if (preg_match("/train:/", $question))
        training(trim(substr($question, 6)), $question);

    if (preg_match("/command:/", $question))
        taskRunner(trim(substr($question, 8)), $question);

    if (strtolower($question) === 'aboutbot')
        respondJson($question, "I am iBot v1.0. <br> Developed by <b>ionware</b>.");

    respondJson($question, "it gets down here");
}


/**
 * Initialize the bot's POST Request.
 * @return string
 */
function bootstrap()
{
    if (!isset($_POST['q']) || empty(trim($_POST['q']))) {
        //stop processing - No need to go on.
        respondJson("", "Stop sending my an empty message. Ask my a question or run a command.");
    }

    return preg_replace("/[?+]/", "", trim($_POST['q']));
}

/**
 * It all starts with "Power-On"
 */
function Kernel()
{
    $question = bootstrap();
    // Run, Barry, Run!
    processManager($question);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Kernel();
    exit();
}

?>


<!-- iBot View -->
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:700" rel="stylesheet">
</head>
<body>

</body>
</html>


<!-- My profile view -->
<!--<html>-->
<!--<head>-->
<!--    <!-- Roboto and Lato Google fonts cdn -->-->
<!--    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:700" rel="stylesheet">-->
<!--    <style>-->
<!--        body {-->
<!--            background: #FAFAF6;-->
<!--            color: #323232;-->
<!--            font-family: Lato, sans-serif;-->
<!--            font-size: 16px;-->
<!--        }-->
<!--        p {-->
<!--            margin: 0; padding: 0;-->
<!--            font-size: 1.02em;-->
<!--        }-->
<!--        .pad-all-2x {-->
<!--            padding: 10px;-->
<!--        }-->
<!--        .avater {-->
<!--            width: 160px;-->
<!--            height: 160px;-->
<!--            border: 4px solid #ecf0f1;-->
<!--            border-radius: 50%;-->
<!--            -moz-border-radius: 50%;-->
<!--            -webkit-border-radius: 50%;-->
<!--        }-->
<!--        .heading-text {-->
<!--            font-size: 1.2em;-->
<!--            text-transform: uppercase;-->
<!--            font-family: Roboto, sans-serif;-->
<!--            margin: 5px 0;-->
<!--            color:-->
<!--        }-->
<!--        .social {-->
<!--            padding: 0 0;-->
<!--            text-align: right;-->
<!--        }-->
<!--        .social > a {-->
<!--            color: inherit;-->
<!--            font-size: 1.2em;-->
<!--            margin: 0 5px;-->
<!--        }-->
<!--        .paper {-->
<!--            background-color: #00D1FF;-->
<!--            color: #fff;-->
<!--            position: relative;-->
<!--            padding: 15px 0 15px 15px;-->
<!--            margin: 10px 10px;-->
<!--            box-shadow: 0 0 4px 3px #ecf0f1;-->
<!--            border-radius: 5px;-->
<!--        }-->
<!--        .paper > .category {-->
<!--            display: inline-block;-->
<!--            width: 85%;-->
<!--            float: right;-->
<!--        }-->
<!--        .category > p {-->
<!--            font-size: .84em;-->
<!--        }-->
<!--        .category > h4, .category > h5 {-->
<!--            font-size: .91em;-->
<!--            margin: 3px 0;-->
<!--            text-transform: uppercase;-->
<!--        }-->
<!--        .paper > .category-icon {-->
<!--            display: inline-block;-->
<!--            font-size: 2.5em;-->
<!---->
<!--        }-->
<!--        .clip {-->
<!--            background-color: #fff;-->
<!--            color: #323232;-->
<!--            padding: 5px 8px;-->
<!--            margin: 3px 3px;-->
<!--            display: inline-block;-->
<!--            font-size: .82em;-->
<!--            border-radius: 3px;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<div class="container" style="margin-top: 60px;">-->
<!--    <div class="row">-->
<!--        <div class="col-xs-12 offset-xs-0 col-sm-8 offset-sm-2">-->
<!--            <div class="row pad-all-2x">-->
<!--                <div class="col-xs-12">-->
<!--                    <img src="--><?php //echo $user->image_filename; ?><!--" alt="Profile Pic" class="avater">-->
<!--                </div>-->
<!--                <div class="col-xs-12">-->
<!--                    <h3 class="heading-text">overview</h3>-->
<!--                    <span class="username">@--><?php //echo $user->username; ?><!--</span>-->
<!--                    <p>-->
<!--                        Full stack Web Developer, and System Administrator. Experienced in several Web Technologies and-->
<!--                        Application development processes and cycle. Solid background in Python, and well versed in several-->
<!--                        Programming Languages including PHP, and Javascript. Possess great flexibility and ability to quickly-->
<!--                        adapt to company workflow.-->
<!--                    </p>-->
<!--                    <div class="social">-->
<!--                        <a href="http://facebook.com/pythonleet"><i class="fa fa-facebook"></i></a>-->
<!--                        <a href="http://twitter.com/ionwarez"><i class="fa fa-twitter"></i></a>-->
<!--                        <a href="http://github.com/ionware"><i class="fa fa-github"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row pad-all-2x">-->
<!--                <div class="col paper">-->
<!--                    <i class="fa fa-user category-icon"></i>-->
<!--                    <div class="category">-->
<!--                        <h4>Biography</h4>-->
<!--                        <p>-->
<!--                            Stephen was born in a local town called Ogbomosho, part of Oyo;-->
<!--                            Insatiable desire for exploring Tech. Loves good Musics, artistic works, and writing Poetry.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col paper">-->
<!--                    <i class="fa fa-database category-icon"></i>-->
<!--                    <div class="category">-->
<!--                        <h4>Interests</h4>-->
<!--                        <div class="clip">Engineering</div>-->
<!--                        <div class="clip">Developing</div>-->
<!--                        <div class="clip">Art</div>-->
<!--                        <div class="clip">Poetry</div>-->
<!--                        <div class="clip">Music</div>-->
<!--                        <div class="clip">Graphics</div>-->
<!--                        <div class="clip">Cooking</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->