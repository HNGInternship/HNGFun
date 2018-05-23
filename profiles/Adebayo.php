<?php 

if (!defined('DB_USER')){
            
    require_once "../config.php";
}

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

        
        $result = $conn->query("SELECT * FROM secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;

        $result2 = $conn->query("SELECT * FROM interns_data where username = 'Adebayo'");
        $user = $result2->fetch(PDO::FETCH_ASSOC);

        $username = $user['username'];
        $name = $user['name'];
        $image_filename = $user['image_filename']; 
            

//Bot 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['input_text'];
  //  $data = preg_replace('/\s+/', '', $data);
    $temp = explode(':', $data);
    $temp2 = preg_replace('/\s+/', '', $temp[0]);
    
    if($temp2 === 'train'){
        train($temp[1]);
    }elseif($temp2 === 'aboutbot') {
        aboutbot();
    }else{
        getAnswer($temp[0]);
    }
}

function aboutbot() {
    echo "<div id='result'>I am Dast-Bot v1.0.1 and i will RULE THE WORLD!....you just have to train me first to know how</div>";
}
function train($input) {
    $input = explode('#', $input);
    $question = trim($input[0]);
    $answer = trim($input[1]);
    $password = trim($input[2]);
    if($password == 'password') {
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();

        if(empty($data)) {
            $training_data = array(':question' => $question,
                ':answer' => $answer);

            $sql = 'INSERT INTO chatbot ( question, answer)
          VALUES (
              :question,
              :answer
          );';

            try {
                $q = $GLOBALS['conn']->prepare($sql);
                if ($q->execute($training_data) == true) {
                    echo "<div id='result'>You'll make a great teacher! I am now way smarter than before we met</div>";
                };
            } catch (PDOException $e) {
                throw $e;
            }
        }else{
            echo "<div id='result'>I already know this. Teach me something new!</div>";
        }
    }else {
        echo "<div id='result'>You are not an ADMIN!, but you could be by just supplying the password while training me</div>";

    }
}

function getAnswer($input) {
    $question = $input;
    $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
    $q = $GLOBALS['conn']->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetchAll();
    if(empty($data)){
        echo "<div id='result'>Sorry i'm not smart enough to answer, pls train me with 'train: # question # answer # password' to train me (without the quotes ofcourse)</div>";
    }else {
        $rand_keys = array_rand($data);
        echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Adebayo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"
    />
    <link href="https://fonts.googleapis.com/css?family=Over+the+Rainbow" rel="stylesheet">

    <style>
        /* Desktop */

        .oj-web-applayout-body {
            margin: 0;
            padding: 0;
            border: 0;
            height: 100%;
            background-color: #000000;
        }


        /* Profile */

        .oj-web-applayout-page {
            box-shadow: 0 4px 6px 0 #cccccc;
            max-width: 500px;
            max-height: auto;
            margin: auto;
            text-align: center;
            font-family: cursive;
            background: #70BBD9;
            margin-top: 5px;
        }


        /* Image */

        img {

            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: #C4C4C4;
            border: 3px solid #000000;

        }

        /* DARAMOLA ADEBAYO STEVE */

        h1.name {
            font-weight: bold;
            font-size: 24px;
            color: #000000;
            font-family: cursive;
        }

        /* Vector 3 */

        hr.linebreak {
            height: 0px;
            border: 1px inset;
            width: 100%;
        }

        /* WEB DEVELOPER - UI/UX DESIGNER - HNG INTERN */

        .skill {
            font-style: normal;
            font-weight: normal;
            line-height: normal;
            font-size: 24px;
            text-transform: uppercase;
            color: #000000;
        }

        /*icons*/

        .fa {
            padding: 10px;
            font-size: 15px;
            width: 35px;
            text-align: center;
            margin: 3px 2px;
            border-radius: 50%;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.35);
            transition: 0.2s;
        }

        .fa-facebook {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-twitter {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-linkedin {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-github {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        #icons a {
            text-decoration: none;
        }

        div.contactMe button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: #000000;
            background-color: white;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;

        }

        /* chatbot */

        .chatbot-container {
            background-color: #F3F3F3;
            width: 500px;
            height: 500px;
            margin: 10px;
            box-sizing: border-box;
            box-shadow: -3px 3px 5px gray;
        }

        .chat-header {
            width: 500px;
            height: 50px;
            background-color: #999999;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 1.5em;
        }

        .chat-header span:before {
            background: #1a8a34;
            border-radius: 50%;
            content: "";
            display: inline-block;
            height: 8px;
            margin: 0 8px 0 0;
            width: 8px;
        }

        #chat-body {
            display: flex;
            flex-direction: column;
            padding: 10px 20px 20px 20px;
            background: #22254c;
            overflow-y: scroll;
            height: 395px;
            max-height: 395px;
        }

        .message {
            background-color: #1380FA;
            color: white;
            font-size: 0.8em;
            width: 300px;
            display: inline-block;
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
            line-height: 18px;
        }

        .bot_chat {
            text-align: left;

        }

        .bot_chat .message {
            background-color: #1380FA;
            color: white;
            opacity: 0.9;
            box-shadow: 3px 3px 5px gray;
        }

        .user_chat {
            text-align: right;
        }

        .user_chat .message {
            background-color: #E0E0E0;
            color: black;
            box-shadow: 3px 3px 5px gray;
        }

        .chat-footer {
            background-color: #F3F3F3;
        }

        .input-text-container {
            margin-left: 20px;
        }

        .input_text {
            width: 370px;
            height: 35px;
            padding: 5px;
            margin-top: 8px;
            border: 0.5px solid #1380FA;
            border-radius: 5px;
        }

        .send_button {
            width: 75px;
            height: 35px;
            padding: 5px;
            margin-top: 8px;
            color: white;
            border: none;
            border-radius: 5px;
            background-color: #1380FA;
        }

        .send_button:active {
            box-shadow: 0px 3px 3px black;
        }



        .myfooter {
            margin: 100px 0px 50px 0px;
            font-size: 0.9em;
        }

        .footer_line {
            padding: 0px;
            margin-bottom: 20px;
            border: 0.5px solid #34495E;
            background-color: #34495E;
            width: 100%;
        }

        .grey-text {
            text-decoration: none;
        }
    </style>
</head>

<body class="oj-web-applayout-body">

    <div id="pageContent" class="oj-web-applayout-page">
        <div class="oj-web-applayout-content">
            <div class="oj-flex oj-sm-flex-items-1">
                <div class="oj-flex-item oj-sm-12 oj-md-12">
                    <img src="<?php echo $image_filename;?>" alt="Me">

                    <h1 class="name">
                        <?php echo $name;?>
                    </h1>

                    <hr class="linebreak" />

                    <p class="skill">ui/ux DESIGNER
                        <br/> Web DESIGNER | HNG INTERN</p>
                    <h5 style="font-family:cursive;">Slack:@
                        <?php echo $username;?>
                    </h5>

                    <div id="icons">
                        <a href="https://www.facebook.com/daramola.adebayo">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.twitter.com/baystizzle">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/adebayo-daramola-31b852b3">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/Baystef">
                            <i class="fa fa-github"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="contactMe">
            <button>
                <i class="fa fa-phone" style="font-size: 18px; color: red;"></i>
                <a href="tel:+2347060771436" style="text-decoration: none;">Contact Me</a>
            </button>
        </div>
    </div>


    <!--Chatbot-->
    <div class="col-lg-6 col-xl-7 pl-lg-5 pb-4">
        <div class="row mb-3">
            <div class="col-10">
                <p class="grey-text">
                    <div class="chatbot-container">
                        <div class="chat-header">
                            <span>DAST-BOT</span>
                        </div>
                        <div id="chat-body">
                            <div class="bot_chat">
                                <div class="message">Hello!
                                    <br> i'm DAST-BOT.
                                    <br>Type
                                    <span style="color: #FABF4B;">
                                        <strong>aboutbot</strong>
                                    </span> to know more about me.
                                </div>

                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="input-text-container">
                                <form action="" method="post" id="chat-input-form">
                                    <input type="text" name="input_text" id="input_text" required class="input_text" placeholder="Talk to me...">
                                    <button type="submit" class="send_button" id="send">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <!-- RequireJS bootstrap file -->
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>

    <script>
        //Chat sending function
        var outputArea = $("#chat-body");

        $("#chat-input-form").on("submit", function (e) {

            e.preventDefault();

            var message = $("#input_text").val();

            outputArea.append(`<div class='user_chat'><div class='message'>${message}</div></div>`);


            $.ajax({
                url: 'profile.php?id=Adebayo',
                type: 'POST',
                data: 'input_text=' + message,
                success: function (response) {
                    var result = $($.parseHTML(response)).find("#result").text();
                    setTimeout(function () {
                        outputArea.append(
                            "<div class='bot-chat'><div class='message'>" +
                            result + "</div></div>");
                        $('#chat-body').animate({
                            scrollTop: $('#chat-body').get(0).scrollHeight
                        }, 1500);
                    }, 250);
                }
            });


            $("#input_text").val("");

        });
    </script>



</body>

</html>