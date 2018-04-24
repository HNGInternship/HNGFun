<?php

if (!defined(DB_USER))
    require_once __DIR__."/../../config.php";

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}


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
    header("Content-Type: application/json");
    echo makeResponse($question, $answer);
    exit();
}


/**
 * It's a small Function that abstract Bot's interaction with the Database.
 * [Function Generator]
 * @param $type
 * @return Closure
 */
function Model($type)
{
    global $conn;
    if ($type === 'get') {
        return function($question) use ($conn) {
            $statement = $conn->prepare("SELECT answer, question FROM `chatbot` WHERE question LIKE ?");
            $statement->execute(array("%$question%"));
            $results = $statement->fetchAll(PDO::FETCH_OBJ);

            if (count($results) < 1)
                return "Sorry, I don't understand that. Perhaps you could train me. The format is: <b>train: question #answer #password</b>";
            return $results[mt_rand(0, count($results) - 1)]->answer;
        };
    }

    return function ($question, $answer) use ($conn) {
        $stmt = $conn->prepare("INSERT INTO `chatbot` (question, answer) VALUES (?, ?)");
        try {
            $status = $stmt->execute(array($question, $answer));
            if ($status)
                return "Thank you. You've given more knowledge to dummy me.";

            return "I gets tired too, and I cannot assimilate right now.";
        } catch (PDOException $e) {
            return "There seems to be a problem with my Brain at the moment.";
        }
    };
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
            respondJson($question, iDictionary($string[2]));
            exit();

        case "intern":
            respondJson($question, iHNGIntern($string[2]));
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
    if (count($string) < 3)
        respondJson($question, "Invalid training format. The correct training mode is: <b>train: question #answer #password</b>");

    // Check if question or answer supplied is empty. We don't want to learn empty word.
    if (empty($string[0] || empty($string[1])))
        respondJson($question, "Oh oh, seems you have an empty question or answer.");

    // Verify authorization to train Bot.
    if (!($string[2] === 'password'))
        respondJson($question, "Backoff! I can't trust you to feed me memory!");

    // ->[Insert to Database]...and, little drop of water, makes an Ocean.
    respondJson($question, Model('put')(trim($string[0]), trim($string[1])));

    exit();
}


/**
 * Handles the request being sent by delegating to other Handlers.
 * Think of this as the OS on a Kernel.
 * @param $question
 */
function processManager($question)
{
    if (preg_match("/train *:/", $question))
        training(trim(preg_replace("/train *:/", "", $question)), $question);

    if (preg_match("/command:/", $question))
        taskRunner(trim(substr($question, 8)), $question);

    if (strtolower($question) === 'aboutbot')
        respondJson($question, "I am iBot v1.0. <br> Developed by <b>ionware</b>.");


    // ask, said Matthew, and you shall receive
    respondJson($question, Model('get')($question));
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
<style>
    footer {
        display: none;
    }
    .bot-frame {
        height: 90vh;
        width: 60%;
        background-color: #ecf0f1;
        margin: 0 auto;
        position: relative;
    }
    @media screen and (max-width: 860px){
        .bot-frame {
            width: 100%;
        }
    }
    @media screen and (min-width: 860px) and (max-width: 960px){
        .bot-frame {
            width: 80%;
        }
    }
    .bot-title {
        width: 100%;
        padding: 15px 30px;
        background-color: #3498db;
        color: #fff;
    }
    .bot-title img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #fff;
        margin-right: 5px;

    }
    .bot-title span {
        font-weight: bold;
        position: relative;
        top: 3px;
    }
    .bot-conversation {
        width: 100%; height: 80%;
        padding: 10px 10px;
        overflow-y: scroll;
    }
    .conversation-primary {
        background-color: transparent;
        border-bottom: 1px solid #bdc3c7;
    }
    .conversation-primary .response {
        background-color: #fff;
        color: #34495e;
    }
    .message {
        width: 100%;
    }
    .response {
        width: 43%;
        padding: 5px 8px 10px 5px;
        display: inline-block;
        text-align: left;
        position: relative;
        font-size: .75em;
        border-radius: 5px;
        margin: 5px 0;
    }
    .message.bot-response {
        text-align: right;
    }

    .response .time {
        position: absolute;
        color: #7f868d;
        font-size: .65em;
        bottom: 0; right: 10px;
    }
    .response p {
        margin: 0; padding: 0;
    }
    .response a {
        color: #3498db;
    }
    .response img {
        width: 30px;
        height: 30px;
        background-color: #fff;
        border-radius: 50%;
        position: absolute;
        top: -10px; right: -10px;
    }
    .bot-input {
        border: 1px solid #3498db;
        border-radius: 20px;
        width: 90%;
        margin: 8px auto 5px auto;
        padding: 5px 5px;
    }
    .input-field {
        width: 90%;
        display: inline-block;
        border: 0;
        outline: none;
        font-size: .75em;
        padding: 0 10px 0 20px;
        background-color: transparent;
        font-family: Lato, sans-serif;
    }
    .bot-btn {
        border: none;
        background-color: transparent;
        padding: 0; margin: 0;
        font-size: .94em;
        color: #3498db;
    }
</style>
<body>
<div class="bot-frame">

    <div class="bot-title">
        <img src="/images/ibot.png" alt="iBot">
        <span>iBot</span>
    </div>
    <div class="bot-conversation conversation-primary">
        <div class="message bot-response">
            <div class="response">
                <p>
                    Hi, I am your friendly dummy bot.<br>
                    Here's what I can do. <br>
                    For finding intern: <b>command: #intern #intern-name</b> e.g <b>command: #intern #ionware</b><br>
                    For checking dictionary meaning: <b>command: #dictionary #word</b>
                </p>
                <span class="time"><?php echo date('H:i'); ?></span>
                <img src="https://res.cloudinary.com/ionware/image/upload/v1524371362/ibot.png" alt="iBot">
            </div>
        </div>
    </div>
    <div class="bot-input">
        <form action="post">
            <input type="text" name="q" placeholder="type message" class="input-field" id="feed">
            <button class="bot-btn"><i class="fa fa-send"></i></button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

    function zeroPadTime(string) {
        if (String(string).length < 2)
            return "0" + String(string);

        return String(string);
    }

    //Constructor for making a Conversation Response of Bot and Human.
    function Response(sender) {
        this.sender = sender;
    }
    /*
    * Returns the current time in HH:MM */
    Response.prototype.time = function () {
        var time = new Date();
        return zeroPadTime(time.getHours()) + ":" + zeroPadTime(time.getUTCMinutes());
    };

    //Make an appendable response
    Response.prototype.make = function(body) {
        this.body = "<div class='message'>";
        if (this.sender === 'bot')
            this.body = "<div class='message bot-response'>";

        this.body += "<div class='response'><p>" + body + "</p><span class='time'>" + this.time() + "</span>";
        if (this.sender === 'bot')
            this.body += "<img src='https://res.cloudinary.com/ionware/image/upload/v1524371362/ibot.png' alt='iBot'>";

        this.body += "</div></div>";
        return this;
    };

    // Update constructed response to the previous awesome conversation.
    Response.prototype.send = function (domNode) {
        domNode.append(this.body);
        $('.bot-conversation').animate({ 'scrollTop': $(".bot-conversation")[0].scrollHeight});
    };

    $("form").on('submit', function (event) {
        event.preventDefault();
        var inputNode = $("#feed");
        var question = inputNode.val();
        if (! question)
            return false;

        var _response = new Response();
        _response.make(inputNode.val()).send($('.bot-conversation'));
        inputNode.val("");
        $.ajax({
            url: "/profiles/ionware.php",
            data: { q: question.trim() },
            type: 'POST',
            success: function(data) {
                var response = new Response("bot");
                console.log(data.answer);
                if (!data.answer) {
                    response.make("iBot server is not responding properly").send($(".bot-conversation"));
                } else {
                    response.make(data.answer).send($(".bot-conversation"));
                }
                $('.bot-conversation').animate({ 'scrollTop': $(".bot-conversation")[0].scrollHeight});
            },
            error: function(error) {
                var response = new Response("bot");
                response.make("iBot server is not responding properly").send($(".bot-conversation"));
                console.log(error);
            }
        })
    })
</script>
</body>
</html>