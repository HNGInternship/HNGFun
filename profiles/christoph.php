<?php
error_reporting(0);
if (empty($_SESSION)) {
    session_start();
}

// if (file_exists('config.php')) {
//     include 'config.php';
// }
// else if (file_exists('../config.php')) {
//     include '../config.php';
// }
// else if (file_exists('../../config.php')) {
//     include '../../config.php';
// }

if(!defined('DB_USER')){
    require "../../config.php";		
    try {
        define('DB_CHARSET', 'utf8mb4');
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET;

        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
}

$intern_details_query = $conn->query(
    "SELECT     interns_data.name, 
                interns_data.username, 
                interns_data.image_filename
    FROM        interns_data
    WHERE       interns_data.username = 'christoph' LIMIT 1");

$secret_word_query = $conn->query(
    "SELECT     secret_word.secret_word 
    FROM        secret_word LIMIT 1");

$intern_detail = $intern_details_query->fetch();
$secret_word = $secret_word_query->fetch();

// Secret Word
$secret_word = $secret_word['secret_word'];

// Profile Details
$name = $intern_detail['name'];
$username = $intern_detail['username'];
$filename = $intern_detail['image_filename'];

$padding = '50px 80px';
$home_url = '';

if (!stristr($_SERVER['REQUEST_URI'], 'id')) {
    $padding = '80px 70px';
    $home_url = '../';
}

?>

<?php if (empty($_POST['bot_query']) and empty($_POST['bot_train']) and empty($_POST['bot_command'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$name;?></title>
    <link rel="stylesheet" href="<?=$home_url;?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$home_url;?>vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css' />
    <style>

        body {
            font-family: "Josefin Sans","Montserrat","Segoe UI","Roboto","Helvetica Neue","Arial","sans-serif";
            color: #4A4646;
            overflow-x: hidden;
        }

        .btn {
            font-family: "Josefin Sans","Montserrat","Segoe UI","Roboto","Helvetica Neue","Arial","sans-serif";
        }

        .container.profile-body {
            padding-right : 0;
        }

        .profile-details, .skills {
            padding-top: 110px;
        }

        .profile-details {
            padding-right: 0;
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }

        .skills {
            height: auto;
            padding: <?=$padding;?>;
            background: #FFFFFF;
        }

        footer {
            display: none;
        }

        .container {
            max-width: 100%;
            padding-left: 0;
        }

        .profile-body {
            max-width: 100%;
        }

        .profile-image img {
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 300px;
            border-radius: 150px;
        }

        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
        }

        .social-links a {
            margin-right: 20px;
        }

        .fa-github {
            color: #333333;
        }

        .fa-facebook {
            color: #3b5998;
        }

        .fa-twitter {
            color: #1da1f2;
        }

        .hello-text {
            font-family: "Lobster Two", "Montserrat", "Roboto", "Arial";
            font-size: 3.5em;
            font-weight: 600;
            margin-bottom: 0;
        }

        .skills > span {
            display: inline-block;
            font-size: 18px;
            margin-bottom: 25px;
        }

        .skill-list {
            margin-bottom: 50px;
        }

        .skill-list h4 {
            font-family: "Josefin Sans","Montserrat","Segoe UI","Roboto","Helvetica Neue","Arial","sans-serif";
            font-size: 30px;
            border-bottom: 2px solid;
            display: inline-block;
            margin-bottom: 20px;
        }

        .skill-progress {
            margin-bottom: 15px;
        }

        .skill-progress > span {
            font-size: 16px;
        }

        .progress-bar {
            background-color: #E9ECEF;
            border-radius: 5px;
        }

        .progress {
            background-color: #007BFF;
            height: 3px;
        }

        .progress.html {
            width: 75%;
        }

        .progress.js {
            width: 72%;
        }

        .progress.php {
            width: 70%;
        }

        .progress.mysql {
            width: 70%;
        }

        .progress.figma {
            width: 35%;
        }

        .chat-btn {
            float: right;
            background: #007BFF;
            border-color: #007BFF;
            font-size: 14px;
            padding: 12px;
        }

        .btn-primary.chat-btn:hover, 
        .btn-primary.chat-btn:active, 
        .btn-primary.chat-btn:focus {
            background-color: #007BFF !important;
            border-color: #007BFF !important;
            box-shadow: 0 6px 15px 0 rgba(0, 0, 0, 0.19);
        }

        .chatbot-menu {
            display: none;
            position: absolute;
            padding: 15px 0 0 15px;
            height: 523px;
            width: 400px;
            top: 0;
            right: 30px;
            margin: 55px 0px 0px 20px;
            background: #FFFFFF;
            box-shadow: 0 6px 15px 0 rgba(0, 0, 0, 0.19);
        }

        .chatbot-menu-header {
            background-color: #007BFF;
            padding: 7px 25px;
            margin: -15px 0 0 -15px;
            color: #FFFFFF;
            height: 45px;
        }

        .chatbot-close, .chatbot-help {
            display: inline-block;
            margin-left: 20px;
            margin-top: 2.5px;
        }

        .fa-close, .fa-question-circle {
            font-size: 23px;
        }

        .chatbot-menu-header span {
            font-weight: bold;
        }

        .chatbot-menu-header a {
            color: #FFFFFF;
        }

        div.hng-logo {
            display: inline-block;
            font-size: 23px;
            font-weight: bold;
        }

        .chatbot-menu-content {
            height: 400px;
            margin-top: 10px;
            overflow-y: scroll;
        }

        .chatbot-message-bot, .chatbot-message-sender {
            float: left;
            padding: 7px 10px;
            margin-bottom: 10px;
            width: 85%;
            font-size: 15px;
            word-wrap: break-word;
        }

        #last-message > p {
            margin-bottom: 0;
        }

        .chatbot-train-message {
            color: #3857B7;
        }

        .chatbot-message-bot {
            float: left;
            border-radius: 10px 10px 10px 0;
            background: #FBF3F3;
        }

        .chatbot-message-sender {
            float: right;
            border-radius: 10px 10px 0 10px;
            margin-right: 10px;
            background: #EBEBEB;
        }

        .chatbot-message-sender span {
            font-size: 15px;
        }

        .chatbot-menu-input {
            position: absolute;
            bottom: 15px;
            width: 100%;
        }

        .message-box {
            width: 70%;
            margin-right: 15px;
        }

        .message-box > .form-control {
            width: 100%;
        }

        .btn-primary.send-message {
            background-color: #007BFF !important;
            border-color: #007BFF !important;
        }

        .btn-primary:hover, 
        .btn-primary:active, 
        .btn-primary:focus {
            background-color: #007BFF !important;
            border-color: #007BFF !important;
        }

        .bot-command {
            color: #B55106;
            font-weight: bold;
        }

        .highlight {
            text-decoration: underline;
        }

        @media screen and (max-width: 768px) {
            .profile-details {
                padding-top: 40px;
            }

            .social-links {
                margin-bottom: 30px;
            }

            .skills {
                padding: 10px 35px;
            }

            .skill-list {
                margin-bottom: 80px;
            }

            .hello-text {
                font-size: 3em;
            }

            .chatbot-menu {
                padding: 0 0 0 15px;
                height: 523px;
                width: auto;
                top: 0;
                right: 5px;
            }

            .chatbot-header {
                margin: -15px 0 -10px 0px;
            }

            .chatbot-menu-content {
                display: inline-block;
                margin-top: 20px;
            }

            .chatbot-message-bot, .chatbot-message-sender {
                width: 87%;
            }

            .message-box {
                width: 70%;
                margin-right: 5px;
            }

            .chat-btn {
                position: fixed;
                bottom: 10px;
                right: 35px;
            }
        }

    </style>
</head>
<body>
    <div class="container profile-body">
        <div class="row">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?=$filename;?>" alt="Christoph HNG Intern">
                </div>
                <p class="text-center profile-name">
                    <?=$name;?> (@<?=$username;?>)
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/chrismarcel" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/chrismarcel" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/chrismarcelj" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
            <div class="col-sm-6 skills" style="">
                <p class="hello-text text-center">Hello World!</p>
                <span>I am a Full-Stack Developer and an aspiring UI/UX Designer. Feel free to engage me in any of your projects.</span>
                <div class="skill-list">
                    <h4>Skills</h4>
                    <div class="skill-progress">
                        <span class="skill-name">HTML + CSS + Bootstrap</span>
                        <div class="progress-bar">
                            <div class="progress html">
                            </div>
                        </div>
                    </div>
                    <div class="skill-progress">
                        <span class="skill-name">Javascript + JQuery</span>
                        <div class="progress-bar">
                            <div class="progress js">
                            </div>
                        </div>
                    </div>
                    <div class="skill-progress">
                        <span class="skill-name">PHP + Laravel</span>
                        <div class="progress-bar">
                            <div class="progress php">
                            </div>
                        </div>
                    </div>
                    <div class="skill-progress">
                        <span class="skill-name">Apache + MYSQL</span>
                        <div class="progress-bar">
                            <div class="progress mysql">
                            </div>
                        </div>
                    </div>
                    <div class="skill-progress">
                        <span class="skill-name">UI/UX + Figma</span>
                        <div class="progress-bar">
                            <div class="progress figma">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chatbot-menu">
                    <div class='chatbot-menu-header'>
                        <div class="hng-logo">}{</div> <span>HNG Chatbot - Locato</span>
                        <a href="#" class="pull-right chatbot-close"><i class="fa fa-close"></i></a>
                        <a href="#" class="pull-right chatbot-help"><i class="fa fa-question-circle"></i></a>
                    </div>
                    <div class="chatbot-menu-content">
                        <div class="chatbot-message-bot">
                            <div class="gen-message">
                                <p>Hi! I'm Locato</p>
                                <p>I want to help you find distances between any two locations in Nigeria, eg distance between two addresses or cities, get the duration to move from one location to the other and also show you direction on map.</p>
                                <p>Ask me a question like <span class="bot-command">What is the distance between [Location A] and [Location B]</span> to return the distance between the two locations, <span class="bot-command">eg What is the distance between Obalende and Yaba<span></p>
                                <p>Or even distances between two addresses like <span class="bot-command">What is the distance between [Address A] and [Address B]</span> (I'm still learning this part, but hey you could still try) to return the distance between two addresses, <span class="bot-command">eg What is the distance between CCHub, Yaba and Ozone Cinemas<span></p>
                            </div>
                            <div class="training-menu">
                                <p>You can train me to understand and answer new questions. I have two training modes</p>
                                <p>1) Simple Mode: You can train me to answer any question, I mean any question at all using: <span class="bot-command">train: question # answer # [password]</span></p> 
                                <p>eg <span class="bot-command">train: Where is Yaba # Yaba is in Lagos # password</span></p>
                                <p>2) Complex Mode: You can train me further to answer specific questions giving me variables and specific functions. To train me for complex mode: Type <span class="bot-command">train: question [preposition] {{parameter_1}} [delimiter] {{parameter_2}} # answer {{parameter1}} [delimiter] {{parameter}} (method_name) # [password]</span> where : </p>
                                <p><span class="bot-command">[preposition]</span> can either be <span class="bot-command">between</span> or <span class="bot-command">from</span> and <span class="bot-command">[delimiter]</span> can either be <span class="bot-command">and</span> or <span class="bot-command">to</span></p>
                                <p>eg 1) <span class="bot-command">train: What is the distance <span class="bot-command highlight">between</span> {{Yaba}} <span class="bot-command highlight">and</span> {{Surulere}} # The distance between {{Yaba}} <span class="bot-command highlight">and</span> {{Surulere}} ((calculate_distance)) # password</span></p>
                                <p>eg 2) <span class="bot-command">train: Can you calculate the distance <span class="bot-command highlight">between</span> {{Lagos Airport}} <span class="bot-command highlight">to</span> {{Sheraton Hotels}} # Yes, I can. The distance between {{Lagos Airport}} <span class="bot-command highlight">to</span> {{Sheraton Hotels}} ((calculate_distance)) # password</span></p>
                                <p>eg 3) <span class="bot-command">train: How long is it <span class="bot-command highlight">from</span> {{UNILAG}} <span class="bot-command highlight">to</span> {{LASU}} # The distance from {{UNILAG}} <span class="bot-command highlight">to</span> {{LASU}} ((calculate_distance)) # password</span></p>
                                <p>Use the <span class="bot-command">get duration : mode</span> Command to show you the approximate duration it would take you to get from one location to the other (The last two locations) where <span class="bot-command">mode</span> can either be <span class="bot-command">driving</span> or <span class="bot-command">walking</span> eg <span class="bot-command">get duration : walking</span></p>
                                <p>Use the <span class="bot-command">show direction : mode</span> Command to show you the direction between the last two locations on map where <span class="bot-command">mode</span> can either be <span class="bot-command">driving</span> or <span class="bot-command">walking</span> eg <span class="bot-command">show direction : driving</span></p>
                                <p>To get the current version of Locato, type <span class="bot-command">aboutbot</span></p>
                                <!-- <p>Use the <i class="bot-command fa fa-arrow-up"></i> and <i class="bot-command fa fa-arrow-down"></i> keys on your keyboard to navigate between previous commands.</p> -->
                                <p>To see this help menu again, simply type <span class="bot-command">help</span> or click the <i class="fa fa-question-circle"></i> above</p>
                            </div>
                        </div>
                    </div>
                    <div class="chatbot-menu-input">
                        <form action="" class="form-inline">
                            <div class="form-group message-box">
                                <input type="text" name="chatbot-input" id="" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary chatbot-send">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-primary chat-btn">HNG Chat Bot</button>
            </div>
        </div>
    </div>
</body>
<script src="<?=$home_url;?>vendor/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?=$home_url;?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script>

$(document).on('click', '.chat-btn', function(){
    $('.chatbot-menu').show();
    $('.chat-btn').hide();
    if ($(window).width() <= 767) {
        $(window).scrollTop($(window).height());
    }
});

$(document).on('click', '.chatbot-close', function(){
    $('.chatbot-menu').hide();
    $('.chat-btn').show();
});

$(document).on('click', '.chatbot-help', function(){
    help_menu = $('.chatbot-message-bot:first').html();
    $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">'+help_menu+'</p></div>');
    content_height = $('.chatbot-menu-content').prop('scrollHeight');
    $('.chatbot-menu-content').scrollTop(content_height);
});

// Chatbot send button handler
$(document).on('click', '.chatbot-send', function(e){
    e.preventDefault();
    bot_query = 'bot_query';
    message_string = $('input[name="chatbot-input"]').val();
    password = true;
    aboutbot = false;
    $('input[name="chatbot-input"]').val('');
    if (message_string.trim() === '') {
        message_string = '';
        payload = {'response':'empty', 'message':'Sorry, you cannot send an empty message.'};
        $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message"><p>'+payload.message+'</p></div>');
    }
    else {
        message_string = message_string.trim();
        payload = {'response':'success', 'message':message_string};
        $('.chatbot-menu-content').append('<div class="chatbot-message-sender" id="last-message"><p>'+payload.message+'</p></div>');
    }

    if (message_string.split(':')[0].trim() === 'train') {
        bot_query = 'bot_train';
        if (!message_string.includes('# password') && !message_string.includes('#password')) {
            password = false;
            $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">Sorry, you need to input a password</p></div>');
        }
        else if (message_string.trim().slice(-8) !== 'password') {
            password = false;
            $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">Sorry, I do not recognize this password, try again.</p></div>');
        }
        else {
            array_words = message_string.trim().split(':');
            parse_colon_delimiter = array_words[0].trim() + ': ' + array_words[1].trim();
            parse_hash_delimiter = parse_colon_delimiter.split('#');
            payload.message = parse_hash_delimiter[0].trim() + ' # ' + parse_hash_delimiter[1].trim();

            console.log(payload.message);
        }
    }
    else if (message_string.trim() === 'help') {
        help_menu = $('.chatbot-message-bot:first').html();
        $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">'+help_menu+'</p></div>');
    }
    else if (message_string.trim() === 'aboutbot') {
        aboutbot = true;
        version = "<div><p><span class='bot-command'>Locato v1.0</span></p></div> <div><p>Hi! I'm Locato</p><p>I want to help you with find distances between any two locations in Nigeria, eg distance between two addresses or cities, get the duration to move from one location to the other and also show you direction on map.</p></div>";
        $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message">'+version+'</div>');
    }
    else if (message_string.split(' : ').length === 2 && !message_string.includes('#')) {
        bot_query = 'bot_command';
    }

    if (message_string.slice(0, 6) === 'train:') {
        $('.chatbot-message-sender:last').addClass('chatbot-train-message');
    }

    content_height = $('.chatbot-menu-content').prop('scrollHeight');
    $('.chatbot-menu-content').scrollTop(content_height);

    url = './profiles/christoph.php';
    if (location.pathname.includes('christoph.php')) {
        url = '../profiles/christoph.php'
    }
    
    // Use AJAX to query DB and look for matches to user's query
    if(message_string !== '' && message_string.trim() !== 'help' && password && !aboutbot) {
        $.ajax({
            url: url,
            data: bot_query+'='+payload.message,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $('.chatbot-menu-content').append('<div class="chatbot-message-bot" id="last-message"><p>Give me some time, it takes some time for me to process...</p></div>');
                content_height = $('.chatbot-menu-content').prop('scrollHeight');
                $('.chatbot-menu-content').scrollTop(content_height);
                $('.chatbot-send').attr('disable');
            },
            success: function(data){
                console.log(data);
                $('.chatbot-message-bot:last > p').html(data.message);
                if (data.response === 'show_direction') {
                    $('.chatbot-message-bot:last > p').html('Click on <a href="'+data.message+'" target="_blank">'+data.message+'</a> to view directions on map');
                }
                if (data.response === 'training_error') {
                    training_menu = $('.training-menu').clone();
                    $('.chatbot-message-bot:last').html(data.message);
                    $('.chatbot-message-bot:last').append(training_menu);
                }
                $('.chatbot-send').removeAttr('disable');
            }
        });
    }
});

</script>
</html>
<?php endif; ?>

<?php

// Check if there's a POST REQUEST from the bot
if (!empty($_POST['bot_query']) or !empty($_POST['bot_train']) or !empty($_POST['bot_command'])) {
    if (empty($conn)) {
        $response = ['response'=>'connection_error', 'message'=>"Sorry, I could not connect to the database, someone must have crashed it again."];
        echo json_encode($response);
        exit;
    }

    // Function that parses a given location string and concatenates it with '+'
    function parseLocation ($location_string) {
        $parsed_location_string = preg_replace("#[^a-zA-Z0-9/_|+ -]#", '', $location_string);
        $parsed_location_string = preg_replace("#[/_|+ -]+#", '+', $parsed_location_string);
        $parsed_location_string = trim($parsed_location_string, '+');

        return $parsed_location_string;
    }

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=";
    $key = "AIzaSyCFtpq466EjoP-RImHD66upJV_OwjWL93k";
    if ($_POST['bot_query']) {
        $query_input = $_POST['bot_query'];

        // Check if query matches a distance request pattern
        if (preg_match('/(.+)(between|from)(.+)/', $query_input, $matches)) {
            $question = $matches[1];
            $question .= $matches[2];
            $query_input = trim($question);
        }
        
        // Search db for question and return a random answer if question exists
        $check_message_query = $conn->prepare(
        'SELECT     chatbot.answer,
                    chatbot.question
        FROM        chatbot
        WHERE       chatbot.question LIKE ?
        ORDER BY    RAND() LIMIT 1');

        $check_message_query->bindValue(1, "%$query_input%");
        $check_message_query->execute();

        $query_result = $check_message_query->fetch();

        // If query doesn't match any question
        if ($query_result === false) {
            $error_messages = ["That seems rather complex, it's quite embarrasing that I can't answer that now. I would like you to train me further, Pleeaaase!!! <br /> <br />", "I used to think I knew it all, but I don't. Could you train me? <br /> <br />", "I don't have an answer to this yet, would you like to can train me, so I have an answer for you next time? <br /> <br />"];
            $response = ['response'=>'training_error', 'message'=>$error_messages[rand(0, 2)]];
            echo json_encode($response);
        }
        else {
            // Check if it is a function call
            if (preg_match('/(.+)\(([A-z_]+)\)/', $query_result['answer'], $matches)) {
                $unparsed_location = substr($_POST['bot_query'], strlen($query_result['question']));
                $parsed_location = preg_match('/(.+) (and|to) (.+)/', $unparsed_location, $location_data);
                // Strip query of unwanted symbols
                $location1      = parseLocation($location_data[1]);
                $delimiter      = $location_data[2];
                $location2      = parseLocation($location_data[3]);
                $answer         = $matches[1];
                $function_name  = $matches[2];

                // Quick fix for duplicate preposition error
                $array_words = explode(' ', $answer);
                $words_length = count($array_words);
                if ($array_words[$words_length - 2] == $array_words[$words_length - 3]) {
                    array_pop($array_words);
                    array_pop($array_words);
                    $answer = trim(implode(' ', $array_words));
                }

                $_SESSION['location1'] = $location1."+Nigeria";
                $_SESSION['location2'] = $location2."+Nigeria";
                
                if ($parsed_location) {
                    include '../answers.php';
                    if (function_exists($function_name)) {
                        $distance = call_user_func($function_name, $key, $url, $location1, $location2);
                        $response = ['response'=>'christoph_bot', 'message'=>"$answer $location_data[1] $delimiter $location_data[3] : <b>$distance</b>"];
                        echo json_encode($response);
                    }
                    else {
                        $response = ['response'=>'function_error', 'message'=>'Someone has tampered with my functions, check back in a bit'];
                        echo json_encode($response);
                    }
                }
                else {
                    $response = ['response'=>'parse_error', 'message'=>"Sorry, I don't understand that delimiter, very soon I would though. <br /><br /> I'm learning really hard. But till then, you can only use the supported delimiters <span class='bot-command highlight'>and</span> or <span class='bot-command highlight'>to</span> <br /></br> Type <span class='bot-command'>help</span> for more guides."];
                    echo json_encode($response);
                }
            }
            else {
                $response = ['response'=>'christoph_bot', 'message'=>$query_result['answer']];
                echo json_encode($response);
            }
        }
    }
    elseif (substr(strtolower(trim($_POST['bot_train'])), 0, 6) === 'train:') {
        // Regular expression to check if the training command is correct
        // Retrieve Questions, Location and Function Name
        $simple_mode_pattern = '/train: (.+[^{}]) \# (.+[^{}])/';
        $complex_mode_pattern = '/train: ?(.+) ?(between|from) ?{{(.+)}} ?(and|to) ?{{(.+)}} ?\# ?(.+) ?(between|from) ?{{(.+)}} ?(and|to) ?{{(.+)}} ?\(\((.+)\)\)/';
        $train_command = $_POST['bot_train'];
        $match_simple_mode = preg_match($simple_mode_pattern, $train_command, $match_simple);
        $match_complex_mode = preg_match($complex_mode_pattern, $train_command, $matches);
        if ($match_simple_mode or $match_complex_mode) {
            if ($match_simple_mode) {
                $question = $match_simple[1];
                $answer   = $match_simple[2];
                // Insert question into database
                $save_message = $conn->prepare(
                "INSERT INTO chatbot (question, answer) VALUES (?, ?)");
                $save_message->bindParam(1, $question, PDO::PARAM_STR);
                $save_message->bindParam(2, $answer, PDO::PARAM_STR);
                $save_message->execute();
                
                // Concatenate random answer retrieved from database with the calculated distance
                $array_responses = ["Thanks for teaching me, I'm a fast learner. Why don't you try asking me again.", "Now I've learnt this command, you can try asking me the same question again. Yaaay, thanks for teaching me."];
                
                $response = ['response'=>'train_message', 'message'=>$array_responses[rand(0, 1)]];

                echo json_encode($response);
            }
            elseif ($match_complex_mode) {
                $question       = $matches[1];
                $preposition    = $matches[2];
                $location1      = parseLocation($matches[3]);
                $delimiter      = $matches[4];
                $location2      = parseLocation($matches[5]);
                $answer         = $matches[6];
                $function_name  = $matches[11];
                $_SESSION['location1'] = $location1;
                $_SESSION['location2'] = $location2;

                // Include answers.php and call the calculate_distance function if it exists
                include "../answers.php";
                if (function_exists($function_name) or $match_simple_mode) {
                    $distance = "<b>".call_user_func($function_name, $key, $url, $location1, $location2)."</br>";

                    $location1 = str_replace('+', ' ', $location1);
                    $location2 = str_replace('+', ' ', $location2);
                    
                    $concat_question = "$question $preposition";
                    $concat_answer = "$answer ($function_name)";
                    // Insert question into database
                    $save_message = $conn->prepare(
                    "INSERT INTO chatbot (question, answer) VALUES (?, ?)");
                    $save_message->bindParam(1, $question, PDO::PARAM_STR);
                    $save_message->bindParam(2, $concat_answer, PDO::PARAM_STR);
                    $save_message->execute();
                    
                    // Concatenate random answer retrieved from database with the calculated distance
                    $array_responses = ["Thanks for teaching me, I'm a fast learner. Why don't you try asking me again. <br /><br /> $answer $location1 $delimiter $location2 : $distance", "Now I've learnt this command, you can try asking me the same question again. Yaaay, thanks for teaching me. <br /><br /> $answer $location1 $delimiter $location2 : $distance"];
                    $response = ['response'=>'train_message', 'message'=>$array_responses[rand(0, 1)]];

                    echo json_encode($response);
                }
                else {
                    $response = ['response'=>'train_command_error', 'message'=>'Sorry, that command does not exist, you can only use: <br /><br /> <span class="bot-command">((calculate_distance))</span> function with the <span class="bot-command">train: </span> command to get the distance between 2 locations <br /><br /> <span class="bot-command">get duration : [mode]</span> Command to get the estimated trip duration between the last 2 locations <br /><br /><br /> <span class="bot-command">show direction : [mode]</span> Command to display the direction between the last 2 locations<br /><br /><br /> You can type <span class="bot-command">help</span> to learn more'];
                    echo json_encode($response);
                }
            }
        }
        else {
            $error_messages = ["Sorry, I do not understand this training command, please try again <br /> <br />", "This training command is new, sure you're not missing anything? <br /> <br />", "Oops!, I've not been trained to learn that training command <br /> <br />"];
            $response = ['response'=>'training_error', 'message'=>$error_messages[rand(0, 2)]];
            echo json_encode($response);
        }
        
    }
    if ($_POST['bot_command']) {
        if (substr($_POST['bot_command'], 0, 12) === 'get duration') {
            $get_command = explode(' : ', $_POST['bot_command']);
            $mode = $get_command[1];
            $location1 = $_SESSION['location1'];
            $location2 = $_SESSION['location2'];
            $function_name = trim(str_replace(' ', '_', strtolower($get_command[0])), '_');
            include '../answers.php';
            if (function_exists($function_name)) {
                $trip_duration = call_user_func($function_name, $key, $url, $location1, $location2, $mode);
                $location1 = str_replace('Nigeria', '', str_replace('+', ' ', $location1));
                $location2 = str_replace('Nigeria', '', str_replace('+', ' ', $location2));
                $response = ['response'=>'trip_duration', 'message'=>"The $mode duration from $location1 to $location2 is estimated to be about <b>$trip_duration</b>"];
                echo json_encode($response);
            }
            else {
                $response = ['response'=>'command_error', 'message'=>'Sorry, that command does not exist.'];
                echo json_encode($response);
            }
        }
        elseif (substr($_POST['bot_command'], 0, 14) === 'show direction') {
            $get_command = explode(' : ', $_POST['bot_command']);
            $mode = $get_command[1];
            $location1 = $_SESSION['location1'];
            $location2 = $_SESSION['location2'];
            $function_name = trim(str_replace(' ', '_', strtolower($get_command[0])), '_');
            include '../answers.php';
            if (function_exists($function_name)) {
                $map_url = call_user_func($function_name, $location1, $location2, $mode);
                $response = ['response'=>'show_direction', 'message'=>$map_url];
                echo json_encode($response);
            }
            else {
                $response = ['response'=>'command_error', 'message'=>'Someone must have tampered with my functions file.'];
                echo json_encode($response);
            }
        }
        else {
            $response = ['response'=>'train_command_error', 'message'=>'Sorry, that command does not exist, you can only use: <br /><br /> <span class="bot-command">((calculate_distance))</span> function with the train command to get the distance between 2 locations <br /><br /> <span class="bot-command">get duration : [mode]</span> Command to get the estimated trip duration between the last 2 locations <br /><br /> <span class="bot-command">show direction : [mode]</span> Command to display the direction between the last 2 locations'];
            echo json_encode($response);
        }
    }
}

?>