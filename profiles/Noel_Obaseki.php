<?php

    global $conn;

    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="Noel_Obaseki"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
        $name=$my_data['name'];
        $username=$my_data['username'];
    } catch (PDOException $e) {
        throw $e;
    }
    
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
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/', '', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();	
        }
        elseif($temp2 === 'getTime' || $temp2 === 'gettime'  ||  $temp2 === 'Gettime'||  $temp2 === 'GetTime') {
        gettime();	
        }
        else{
            getAnswer($temp[0]);
        }
    }

    function aboutbot() {
        echo "<div id='result'> This is Jarvis v0.1	!</div>";
    }
    
    function gettime() {
        date_default_timezone_set("Africa/Lagos");
        $txt1 = date("h:i:sa");
        echo "<div id='result'> $txt1. </div>";
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
                        echo "<div id='result'> Thanks for helping me be better. The Training was a Success !!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already know how to do that. You can ask me a new question, or teach me something else. Remember, the format is train: question # answer # password!</div>";
            }
        }else {
            echo "<div id='result'>Invalid Password, Please Try Again!</div>";
        }
    }

    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry,My database isnt that expansive yet.Please help me correct this by training  me simply by using the format - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<style type="text/css">

    .container{
        width: 100%;
        min-height: 100%
    }
    
    #main-wrapper {
        padding-top: 10%;
    }
    span {
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
    }
    
    body, html {
        margin: 0px;
        background-color: white; 
        height: 100%;
    }

    .message_body1 {
        font-family: 'Open Sans', sans-serif;
        font-size: 75%;
        display: flex;
        flex-direction: column;
        max-width: 700px;
        margin: 0 auto;
        border: 4px solid rgba(68, 58, 58, 0.5);
        border-radius: 20px;
    }

    .chat-output {
        flex: 1;
        padding: 20px;
        display: flex;
        background: white;
        flex-direction: column;
        overflow-y: hidden;
        border-radius: 20px;
        max-height: 500px;
    }

    .chat-output:hover {
        overflow-y: scroll;
    }
    .chat-output > div {
        margin: 0 0 20px 0;
    }
    .chat-output .user-message .message {
        background: red ;
        color: white;
    }
    .chat-output .jarvis-message {
        text-align: right;
    }
    .chat-output .jarvis-message .message {
        background: black;
        color: white;
    }
    .chat-output .message {
        display: inline-block;
        padding: 12px 20px;
        border-radius: 10px;
    }
    .chat-input {
        padding: 20px;
        background: #eee;
        border-radius: 0 0 20px 20px;
        border: 1px solid #ccc;
        border-bottom: 0;
    }
    .chat-input .user-input {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
    }

    .profile-img{
        height: 150px; width: 150px;
        border-radius: 50%;
        background: url(http://res.cloudinary.com/dqnhgax9d/image/upload/v1525107042/Snapshot_20150201_2.jpg) no-repeat center center;
        background-size: cover;
        border: 5px solid rgba(200, 200, 200, .5);
        margin: 0 auto;
    }

    .card {
        text-align: center;
        background-color: #f6f6f6;
        padding-top: 2em;
    }

    .card-title {
        font-size: 25px;
    }

    .col-md-4 {
        border: 4px solid rgba(68, 58, 58, 0.5);
        border-radius: 20px;
    }

    .socials {
        font-size: 30px;
        letter-spacing: 0.5em;
    }
</style>

<div id="main-wrapper" class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 card">
        <div class="profile-img"></div>	
        <h1 class="card-title"><?=$name?></h1>
        <?php
            $data1 = "Username :";
			
            $result = "$data1 $username";
            echo "<p>" .$result. "<p>";
        ?>
		
		<p>HNG INTERNSHIP</p>

        <div class="socials">
            <a href="https://twitter.com/N0e_1"><i class="fa fa-twitter"></i></a> 
            <a href="https://www.linkedin.com/in/noel-obaseki-511799127/"><i class="fa fa-linkedin"></i></a> 
            <a href="https://github.com/Noel-96"><i class="fa fa-github"></i></a> 
        </div>
    </div>

    <div class="col-lg-6 offset-1 col-md-6 col-sm-6 ">
        <div class="message_body1">
            <div class="chat-output" id="chat-output">
                <div class="user-message">
                    <div class="message">
                            <p>Hi! I'm Jarvis, pleasure to meet you</p>
                            <p>You can ask me any question and ill try and reply to the best of my ability</p>
                            <p>To train me, use this format - 'train: question # answer # password'.</p>
                            <p>To see the current time - 'getTime'.</p>
                            <p>To see the current version of the bot - 'aboutbot'.</p>								
                    </div>
                </div>
            </div>

            <div class="chat-input">
                <form action="" method="post" id="user-input-form">
                    <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Type a command here !!">
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    var outputArea = $("#chat-output");

    $("#user-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#user-input").val();

        outputArea.append(`<div class='jarvis-message'><div class='message'>${message}</div></div>`);


        $.ajax({
		<!-- change page to noel obaseki later -->
            url: 'profile.php?id=Noel_Obaseki',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });


        $("#user-input").val("");

    });
</script>