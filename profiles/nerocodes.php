<?php

if(isset($_POST['chat'])){

    $chat = $_POST['chat'];
    $explosion = explode(':', $chat);
    $oneWord = strtolower(trim($explosion[0]));
    

    echo '<div style="display: none;"class="chat friend">
                <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
                <p class="chat-message" id="user">'. $chat .'</p>
            </div>';

    function aboutbot(){
        echo '<div style="display: none;"class="chat friend">
        <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
        <p class="chat-message" id="result">Version 1.0</p>
        </div>';
    }

    function getAnswer($question){

        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $stmt = $GLOBALS['conn']->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        if(empty($data)){
            echo '<div style="display: none;"class="chat friend">
            <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
            <p class="chat-message" id="result">oops... I do not know that yet, train me</p>
            </div>';
        } else {
            $random = array_rand($data);
            echo '<div style="display: none;"class="chat friend">
            <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
            <p class="chat-message" id="result">'. $data[$random]["answer"]. '</p>
            </div>';
        }
    }

    function train($input){
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);

        if ( $password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '" and answer = "'. $answer .'" LIMIT 1';
            $stmt = $GLOBALS['conn']->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $data = $stmt->fetchAll();

            if(empty($data)){
                $trainsql = 'INSERT INTO chatbot(question,answer) VALUES(:question, :answer)';
                $train = $GLOBALS['conn']->prepare($trainsql);
                $train->execute(['question' => $question, 'answer' => $answer]);
                echo '<div style="display: none;"class="chat friend">
                <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
                <p class="chat-message" id="result">Training successful,
                 thank you for making me smarter</p>
                </div>';
            } else {
                echo '<div style="display: none;"class="chat friend">
                <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
                <p class="chat-message" id="result">oops... I already know this,
                 you can teach me something else</p>
                </div>';
            }

        } else {
            echo '<div style="display: none;"class="chat friend">
                <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
                <p class="chat-message" id="result">Invalid password or format..
                 example: train:question#answer#password</p>
                </div>';
            
        }
        
    }

    if ( $oneWord === 'aboutbot'){
        aboutbot();

    } elseif ( $oneWord === 'help'){
        echo '<div style="display: none;"class="chat friend">
                <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
                <p class="chat-message" id="result">Type \'aboutbot\' to see my current version.
                 To train me type \'train:question#answer#password\'</p>
                </div>';

    } elseif( $oneWord === 'train'){
        $second = strtolower(trim($explosion[1]));
        train($second);

    } elseif ( $oneWord === 'i am') {
        $second = strtolower(trim($explosion[1]));
        echo '<div style="display: none;"class="chat friend">
        <div class="user-photo"><img src="img/friend.jpg" alt=""></div>
        <p class="chat-message" id="result"> Welcome '. ucfirst($second) .',you can ask me anything. <br>
        To see what i can do type \'help\' </p>
        </div>';
    } else {
        getAnswer($oneWord); 
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>NeroCodes Profile</title>
        <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.0.0/3rdparty/require/require.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
        <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" type="text/css"
	/>
    </head>
    <body>
    <style>

        .oj-panel-alt1{
            background-color: #333333;
            color: #ffffff;
            text-align: center;
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #333333);
            background: -moz-linear-gradient(top, #aaaaaa 0%, #333333);
            background: -o-linear-gradient(top, #aaaaaa 0%, #333333);
            background: -ms-linear-gradient(top, #aaaaaa 0%, #333333);
            background-image: url('https://res.cloudinary.com/drlcfqzym/image/upload/v1523934335/chess-2730034_1920.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .image{
            display: block;
            width: 20%;
            height: 20%;
            border-style: groove;
            border-width: 2px;
            border-radius: 100%;
            margin:0 auto;
            opacity: 0.8;
        }

        .name{
            font-family: verdana;
            font-size: 2em;
            margin-top: 7px;
            color: #ffffff;
        }

        .username{
            font-family: verdana;
            font-size: 2em;
            color: #ffffff;
        }

        section{
            background-color: rgba(255,255,255,0.5);
            font-family: verdana;

        }

        section h3{
            font-size: 1.5em;
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #333333);
        }

        
        .chatbox {
            font-family: tahoma, sans-serif;
            text-align: start;
            box-sizing: border-box;
            width: 500px;
            min-width: 100px;
            height: 600px;
            background-color: rgba(255, 255, 255, 0.4);
            padding: 25px;
            margin: 20px auto;
            box-shadow: 0 3px #cccccc;
            display: none;
        }

        .chatlogs{
            padding: 10px;
            width: 100%;
            height: 450px;
            overflow-x: hidden;
            overflow-y: scroll;
        }

        .chatlogs::-webkit-scrollbar{
            width: 10px;
        }

        .chatlogs::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background: rgba(0, 0, 0, .1);
        }

        .chat {
            display: flex;
            flex-flow: row wrap;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .chat .user-photo {
            width: 60px;
            height: 60px;
            background: #cccccc;
            border-radius: 50%;
            overflow: hidden; 
        }

        .chat .user-photo img {
            width: 100%;
        }

        .chat .chat-message{
            width: 70%;
            padding: 15px;
            margin: 5px 10px 0;
            border-radius: 10px;
            color: #ffffff;
            font-size: 20px;
            overflow-x: auto;
        }

        .chat-message::-webkit-scrollbar{
            width: 10px;
        }

        .chat-message::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background: rgba(0, 0, 0, .1);
        }

        .friend .chat-message{
            background: -webkit-linear-gradient(top, #ffffff 0%, #aaaaaa);
            color: #333333;
        }

        .self .chat-message{
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #333333);
            order: -1;
        }

        .chat-form {
            margin-top: 20px;
            display: flex;
            align-items: flex-start;
        }

        .chat-form #chat {
            background: #fbfbfb;
            width: 75%;
            height: 50px;
            border: 2px solid #eee;
            border-radius: 3px;
            resize: none;
            padding: 10px;
            font-size: 18px;
            color: #333333;
        }

        .chat-form #chat:focus{
            background: #ffffff;
        }

        .chat-form #chat::-webkit-scrollbar{
            width: 10px;
        }

        .chat-form #chat::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background: rgba(0, 0, 0, .1);
        }

        #button, #chat-btn {
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #ed1d2e);
            padding: 5px 15px;
            font-size: 30px;
            color: #ffffff;
            border: none;
            margin: 0 10px;
            border-radius: 3px;
            box-shadow: 0 3px 0 #fa1a2c;
            cursor: pointer;

            -webkit-transition: background .2s ease;
            -moz-transition: background .2s ease;
            -o-transition: background .2s ease;
        }


        .chat-form #button:hover {
            background: #fa1a2c;
        }

        #chat-btn:hover{
            background: -webkit-linear-gradient(top, #ffffff 0%, #ed1d2e);
        }

        @media only screen and (max-width: 768px) {

            .chatbox {
                font-family: tahoma, sans-serif;
                text-align: start;
                box-sizing: border-box;
                width: 300px;
                min-width: 100px;
                height: 400px;
                background-color: rgba(255, 255, 255, 0.4);
                padding: 10px;
                margin: 10px auto;
                box-shadow: 0 3px #cccccc;
            }

            .chatlogs{
                padding: 10px;
                width: 100%;
                height: 70%;
                overflow-x: hidden;
                overflow-y: scroll;
            }
            
            .chatlogs::-webkit-scrollbar{
                width: 10px;
            }

            .chatlogs::-webkit-scrollbar-thumb {
                border-radius: 5px;
                background: rgba(0, 0, 0, .6);
            }
            .user-photo{
                display: none;
            }
            .chat .chat-message{
                width: 70%;
                padding: 15px;
                margin: 5px 10px 0;
                border-radius: 10px;
                color: #ffffff;
                font-size: 20px;
                overflow-x: auto;
            }
        }
        
    </style>
    <?php      


        $sql = $conn->query("SELECT * FROM secret_word LIMIT 1");
        $sql = $sql->fetch(PDO::FETCH_OBJ);
        $secret_word = $sql->secret_word;

        $result = $conn->query("SELECT * FROM interns_data WHERE username = 'nerocodes'");
        $user = $result->fetch(PDO::FETCH_OBJ);

    ?>
    <main  class="oj-web-applayout-body">
        
        <div class="oj-panel oj-panel-alt1 oj-margin demo-mypanel">
            <h1 class="oj-header-border name"><?php echo $user->name ?></h1>
            <img src="<?php echo $user->image_filename ?>" alt="" class="image">
            <h2 class="username">@<?php echo $user->username ?></h2>
            <section>
                <h3>Front-End Web Developer</h3>
            </section>
            <button id="chat-btn">
                Chatbot
            </button>
            <div class="chatbox">
                <div class="chatlogs" id="chatlogs">
                    <div class="chat self">
                        <div class="user-photo"><img src="https://res.cloudinary.com/drlcfqzym/image/upload/v1525213200/face-41697_1280.png" alt=""></div>
                        <p class="chat-message" id="chat-message">Hello!! I am NCBot, What's your name?</p>
                    </div>
                    
                    
                </div>
                <form action="" class="chat-form" id="chat-form" method="post">
                    <input name="chat" id="chat" type="text" value="I am:">
                    
                    <input type="submit" name="submit" value="send" id="button">
                </form>
            </div>
            <footer>
                &copy;NeroCodes 2018
            </footer>
        </div>
        
    
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

            $("#chat-btn").click(function(){
                $(".chatbox").slideToggle("slow");
            });

            $("#chat-form").submit(function(event){
                event.preventDefault();

                var $form = $(this),
                term = $form.find( "input[name='chat']").val(),
                url = $form.attr("action");

                var forming = $(this).serialize();
                

                var posting = $.post( url, { chat: term});
                // var posting = $.post( url, forming);

                posting.done(function(data){
                    var user = $($.parseHTML(data)).find("#user").text();
                    var result = $($.parseHTML(data)).find("#result").text();
            
                    $("#chatlogs").append('<div class="chat friend"><div class="user-photo"><img src="https://res.cloudinary.com/drlcfqzym/image/upload/v1525212302/avatar-1295406_1280.png" alt=""></div><p class="chat-message">' + user + '</p></div>');
                    
                    

                    setTimeout(function(){

                        $("#chatlogs").append('<div class="chat self"><div class="user-photo"><img src="https://res.cloudinary.com/drlcfqzym/image/upload/v1525213200/face-41697_1280.png" alt=""></div><p class="chat-message">' + result + '</p></div>');
                        $("#chatlogs").animate({
                            scrollTop: $("#chatlogs").get(0).scrollHeight
                        }, 1500);

                    }, 250);
                    
                });
                $('#chat').val('');

            });
        });
  </script>
    
        
    </body>
</html>