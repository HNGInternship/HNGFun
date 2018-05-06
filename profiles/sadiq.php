<?php 
    require 'db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

    $name = "Sambo Abubakar";
?>

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
                    return "I don't understand that. Perhaps you could train me. Use: <b>train: question #answer #password</b>";
                return $results[mt_rand(0, count($results) - 1)]->answer;
            };
        }

        return function ($question, $answer) use ($conn) {
            $stmt = $conn->prepare("INSERT INTO `chatbot` (question, answer) VALUES (?, ?)");
            try {
                $status = $stmt->execute(array($question, $answer));
                if ($status)
                    return "Arigato Sensei. For training me.";

                return "What a drag.";
            } catch (PDOException $e) {
                return "My chakra is low at the moment.";
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
            respondJson($question, "I am Uchiha Bot 1.0.");


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
            respondJson("", "You don't fear my Sharingan? Stop sending my an empty message.");
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sadiq Profile</title>
    
    <!-- styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
 
    <!-- custom style -->
    <style type="text/css">
        body {
            background: linear-gradient(to bottom right, black, lightgrey, black, red, yellow);          
            text-align: center;
            font-family: 'Lato';
        }
        .sect, .row {
            margin: 1em 15%;
            padding: auto;
            box-shadow: 5px 5px 5px lightgrey;
            border-top: 1px solid lightgrey;
            border-left: 1px solid lightgrey;
            background: #fff;
        }
        span {
            opacity: 0.5;
            font-size: 16px;
        }
        img#profile {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
        a:link, a:visited, a:hover {
            text-decoration: none;
        }
        p > a:hover,
        p > a:focus {
            background: beige;
            padding: 1em;
            box-shadow: 2px 0 2px #696;
        }
        p > a {
            padding: 1em;
        }
        p {
            display: inline-flex;
        }
        p:first-child {
            padding-top: 5px;
        }
        p:last-child {
            padding-bottom: 5px;
        }
        figure, h3 {
            padding-top: 50px;
        }
        h2, h3 {
            font-size: 28px;
        }
        h2#tag {
            opacity: 0.7;
        }

    /** bot sect **/
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
   
 .botbg {
    background: url(akatsuki-emblem.png) repeat;
  }
  </style>
</head>

<body>
    <main>
<!-- section starts -->

        <div class="row sect">
            <div class="col-md-12">
                <figure>
                    <img id="profile" class="img-responsive" src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg" alt="dp">
                    <figcaption><p><?php echo $name ?></p></figcaption>
                </figure>
                <h2 id="tag">UI Designer</h2>
                <hr style="width:5%;margin-top:0px;margin-bottom:0px;">
                <h2 id="tag" style="padding-bottom:5px;">Web Developer<br />
                <span>HTML | CSS | JS | JQUERY | ANGULAR | BOOTSTRAP | PHP</span></h2>
            </div>
        </div>

        <div class="row sect">
            <div class="col-md-12">
                <h3>Social</h3>
                <div class="row">
                    <div class="col-md-12">
                        <p><a href="https://www.codepen.io/sastech" target="_blank" style="color: black;"><i class="fa fa-codepen fa-2x"></i></a></p>
                        <p><a href="https://www.github.com/saslamp" target="_blank" style="color: black;"><i class="fa fa-github fa-2x"></i></a></p>
                        <p><a href="https://www.twitter.com/_saslamp" target="_blank" style="color: skyblue;"><i class="fa fa-twitter fa-2x"></i></a></p>
                        <p><a href="https://www.linkedin.com/in/abubakar-sambo-ii-102726b4" target="_blank" style="color: lightskyblue;"><i class="fa fa-linkedin fa-2x"></i></a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- bot section -->
<div class="bot-frame">

    <div class="bot-title">
        <img src="/images/ibot.png" alt="iBot">
        <span>iBot</span>
    </div>
    <div class="bot-conversation conversation-primary">
        <div class="message bot-response">
            <div class="response">
                <p>
                    Konnichuwa. I am Uchiha Bot.<br>
                    The only survivor of the uchiha bot clan.
                </p>
                <span class="time"><?php echo date('H:i'); ?></span>
                <img src="https://res.cloudinary.com/sastech/image/upload/v1525646123/1577739_show_default_oookay.png" alt="uchiha-bot">
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
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

  <script>
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
            this.body += "<img src='https://res.cloudinary.com/sastech/image/upload/v1525646123/1577739_show_default_oookay.png' alt='uchiha-bot'>";

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
            url: "/profiles/sadiq.php",
            data: { q: question.trim() },
            type: 'POST',
            success: function(data) {
                var response = new Response("bot");
                console.log(data.answer);
                if (!data.answer) {
                    response.make("Akatsuki server is not responding properly").send($(".bot-conversation"));
                } else {
                    response.make(data.answer).send($(".bot-conversation"));
                }
                $('.bot-conversation').animate({ 'scrollTop': $(".bot-conversation")[0].scrollHeight});
            },
            error: function(error) {
                var response = new Response("bot");
                response.make("Akatsuki server is not responding properly").send($(".bot-conversation"));
                console.log(error);
            }
        })
    })
    </script>
</body>