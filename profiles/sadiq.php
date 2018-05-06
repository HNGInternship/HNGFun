<?php 
    require 'db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
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
        #user {
            width: 75%;
            margin-left: 10%;
            position: relative;
            left: 0px;
            bottom: 0px;
            display: block;
            background-color: #4F4F4F;
            white-space: nowrap;
        }
        @media screen and (max-width: 767px) {
            #user {
                width: 100%;
                margin: 0px;
            }
        }
        #msgbox {
           width: 80%;
           min-height: 25px;
           max-height: 35px;
           padding: 5px;
           outline: none;
           border: solid 1px #AAA;
           display: inline-block;
           vertical-align: center;
           float: left;
           background-color: #FFF;
           border-radius: 25px;
           resize: none;
           margin: 5px 5px 5px 10px;
        }
        #send {
           display: inline-block
           outline: none;
           border: none;
           color: #FFF;
           background-color: #FF6347;
           float: left;
           border-radius: 20%;
           padding: 5px;
           cursor: pointer;
           margin: 5px auto auto 5px;
        }
        @media screen and (max-width: 767px) {
            #send {
                margin: 0px auto auto 33%;
            }
        }
        #send:active {
           background-color: #00A; 
           outline: none;
        }

        #messages {
           display: block;
           width: 75%;
           height: 75%;
           background-color: #EEE;
           position: relative;
           overflow: auto;
           overflow-x: hidden;
           overflow-y: scroll;
           border: 2px solid #4f4f4f;
           padding: 5px;
           margin-left: 10%;
        }
        @media screen and (max-width: 767px) {
            #messages {
                margin: unset;
                width: 100%;
            }
        }
        .left {
           text-align: left; 
           /*
           display: block;
           */
        }
        .right {
           text-align: right; 
           /*
           display: block;
           */
        }
        .incoming {
           background-color: #FA8076;
           color: #4f4f4f;
           border: solid 1px #AAA;
        }
        .outgoing {
           background-color: #87CEEB;
           color: #4F4F4F;
        }
        .section {
           display: block; 
           padding-left: 5%;
           padding-right: 10%;
           margin-top: 7.5px;
           margin-bottom: 7.5px;
        }
        .message {
           display: inline-flex;
           justify-content: left;
           align-items: center;
           border-radius: 25px; 
           padding: 10px;
           font-size: 10pt;
        }
        input:first {
           color: #F00; 
        }
        .incoming:active {
           background-color: #EEE; 
        }
        .outgoing:active {
           background-color: #00A; 
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
                    <img id="profile"> class="img-responsive" src=<?php echo $image_filename ?> alt="dp">
                    <figcaption><p><?php echo $name ?></p></figcaption>
                </figure>
                <h2 id="tag">UI Designer</h2>
                <hr style="width:3%;margin-top:0px;margin-bottom:0px;">
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
        <div class="row sect botbg">        
            <div id="messages"></div>
        
            <div id="user">
                <input type="text" id="msgbox" placeholder="Type a message..." />
                <button id="send">SEND</button>
            </div>
        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $(function(){
            var commands = {
               "random":"var rand = (Math.floor(Math.random() * 10)); incoming(rand);",
               "commands":"var objstr = JSON.stringify(commands); objstr = JSON.stringify(commands, null, 4); incoming(objstr)"
            }
            var responseSys = {
                    "hi":"Hello There!",
                    "bye":"GoodBye!"
                    };
                    function cmd(name, action){
                       commands[name] = action;
                    }
            function outgoing(text){
                var newMsg = "<div class='section right'><div class='message outgoing'>" + text + "</div></div>";
                $("#messages").append(newMsg);
            }
            function incoming(text){
             var newMsg = "<div class='section left'><div class='message incoming'>" + text + "</div></div>";
                $("#messages").append(newMsg);
               
                // train test


               $('.botbg').animate({scrollTop: $('.botbg').prop("scrollHeight")}, 1000);
               // window.scrollTo(0, parseInt($("#messages").innerHeight))
            }
            $("#send").click(function(){
                var text = $("#msgbox").val();

                if(text != null && text != ""){
                $("#msgbox").val("");
                text = text.replace(/</ig, "&lt;");
                text = text.replace(/>/ig, "&gt;");
                text = text.replace(/\n/ig, "<br />");
                outgoing(text);
                reply(text)
                }
                else{
                   // Threaten :)
                   incoming("If you send empty message I will burn you WITH MY SHARINGAN.")
                }
            });
            $("#msgbox").keyup(function(e){
                if(e.which == 13){
                   $("#send").trigger("click")
                }
                else{
                   // Do Nothing 
                }
            });
            incoming("Kon ni chuwa!<br/>I am Uchiha Bot.<br/>How may I help you?");
            
            function responses(msg, response){
            msg = msg.toLowerCase();
                responseSys[msg] = response;
            }
            function reply(txt){
            txt = txt.toLowerCase();
            if(txt[0] == "r" && txt[1] == "e" && txt[2] == "s" && txt[3] == "p" && txt[4] == "o" && txt[5] == "n" && txt[6] == "s" && txt[7] == "e" && txt[8] == "s" && txt[9] == "("){
                    try{
                        eval(txt);
                    }
                    catch(e){
                       incoming(e);
                    }
                }
                else if(responseSys[txt] != undefined && responseSys[txt] != null && responseSys[txt] != "" ){
                   incoming(responseSys[txt]);
                   
                }
                else if(commands[txt] != null && commands[txt] != undefined && commands[txt] != ""){
                   try{
                       try{
                           eval(commands[txt])
                       }
                       catch(e){
                           incoming("Error Executing")
                       }
                   }
                   catch(e){
                      incoming("Command not defined") 
                   }
                }
                else if(txt[0] == "c" && txt[1] == "m" && txt[2] == "d"){
                   try{
                      eval(txt) 
                   }
                   catch(e){
                      incoming(e) ;
                   }
                }
                else{
                   incoming("I don't understand. Tell me about it.\nYou can train me with <strong>train: question?#password</strong>") 
                }
            }
            responses ("aboutbot","Uchiha Bot 1.0")
            responses ("about bot","Uchiha Bot 1.0")
            responses ("how are you?","I'm alright.")
            responses ("how are you","I'm alright")
            responses ("how far","Not far. Right in front of you")
            responses ("how far?","Cool.")
            responses ("sup","Norms.")
            responses ("what are you doing","Chatting with you")
            responses ("what are you doing?","Chatting with you")
            responses ("how old are you","Age is just a number.")
            responses("how old are you?","Age is just a number.")
            responses("what can you do", "I can capture tailed beasts, among other things.")
            responses("what can you do?", "I can capture tailed beasts, among other things.")
            responses ("are you a member of akatsuki","Do zebras have stripes?")
            responses ("are you a member of akatsuki?","Do zebras have stripes?")
            responses ("are you a member of the akatsuki","Do you think i am?")
            responses ("are you a member of the akatsuki?","Do you think i am?")
            responses("version","v1.0.")
            responses("how are you feeling", "Good 😁")
            responses("hello", "Hello non-shinobi.")
            responses("ok", "Arigato.")
            responses("hey", "Nanda?")
            responses("what is the time?", "The time is "+time()+".")
            responses("what is the time", "The time is "+time()+".")
        });
        
        function time() {
            var time = new Date();
            return time;
        }

        function ques() {
            var ques = document.querySelector("#")
        }
        function ansr() {

        }
    </script>
</body>