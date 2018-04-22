<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra SC|Romanesco' rel='stylesheet'>
    <style type="text/css">

        .container{
            width: 100%;
            min-height: 100%
        }
        .body0 {
            height: 100%;
            /*background-image: url('https://wallup.net/wp-content/uploads/2016/01/155420-water-dark-calm-nature.jpg');*/
            /*background-repeat:no-repeat;*/
            /*background-size:cover;*/
        }

        span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }

        .main {
            position: relative;
            /*top:20px;*/
            width: 100%;
            /*padding-top: 300px;*/
            height: 130px;
            font-family: "Romanesco";
            line-height: 130px;
            font-size: 96px;
            text-align: center;
        }
        .text {
            background: -webkit-linear-gradient(0deg, #FF0F00, rgba(17, 26, 240, 0.55), #EC0F13);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .under {
            position: relative;
            /*top:450px;*/
            height: 50px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under1 {
            position: relative;
            /*top:500px;*/
            height: 40px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under2 {
            position: relative;
            /*top:540px;*/
            height: 49.71px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);
        * {
            box-sizing: border-box;
        }
        html {
            background: skyblue;
            margin: 0px;

        }
        body, html {
            height: 100%;
        }
        .body1 {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 115%;
            display: flex;
            flex-direction: column;
            max-width: 700px;
            margin: 0 auto;
        }
        .chat-output {
            flex: 1;
            padding: 20px;
            display: flex;
            background: white;
            flex-direction: column;
        }
        .chat-output > div {
            margin: 0 0 20px 0;
        }
        .chat-output .user-message .message {
            background: #0fb0df;
            color: white;
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: #eee;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 20px;
            background: #eee;
            border: 1px solid #ccc;
            border-bottom: 0;
        }
        .chat-input .user-input {
            width: 100%;
            font-size: 2rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
        }



    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <?php

    global $conn;

    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="melody"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

    <div class="row" style="padding-top: 20px">
        <div class="col-md-6">
            <div class="body0">
                    <img class="img-fluid rounded" style="padding-top: 10px" onerror="this.src='images/default.jpg'" src="<?=$my_data['image_filename'] ?>" >
                    <div class="main"><span class="text"><?=$my_data['name'] ?></span></div>
                    <div class="under"><span>Full Stack Web Developer</span></div>
                    <div class="under1"><span><a href="https://github.com/mokunuga">
                        <img style="width:40px; height: 40px;" src="https://cdn1.iconfinder.com/data/icons/logotypes/32/github-512.png"></a>
                            <a href="https://linkedin.com/in/mokunuga">
                        <img style="width:40px; height: 40px;" src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-social-media/256/Linkedin-icon.png">
                </a></span></div>
                    <div class="under2"><span>Lagos | NG</span></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="body1">
                <div class="chat-output" id="chat-output">
                    <div class="user-message">
                        <div class="message">Hi! I'm a bot. What's up?</div>
                    </div>
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
<!--                        <input type="hidden" name="id" value="--><?php //echo htmlspecialchars($_GET['id']);?><!--">-->
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Talk to the bot.">
                    </form>
                </div>

            </div>
        </div>
    </div>


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

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user-input'];
        $data = preg_replace('/\s+/', '', $data);
        $temp = explode(':', $data);

        if($temp[0] === 'train'){
            train($temp[1]);
        }else{
            getAnswer($temp[0]);
        }
    }

    function train($input) {
        $input = explode('#', $input);
        $question = $input[0];
        $answer = $input[1];
        $password = $input[2];
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
                        echo "<div id='result'>Training Successful!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>Invalid Password, Try Again!</div>";

        }
    }

    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry, I do not know that command. You can train me simply by using the format - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>

</body>


<script>
    var outputArea = $("#chat-output");

    $("#user-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#user-input").val();

        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);


        $.ajax({
            url: 'profile.php?id=melody',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                }, 250);
            }
        });


        $("#user-input").val("");

    });
</script>

