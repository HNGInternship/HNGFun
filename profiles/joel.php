<?php

if(!defined('DB_USER')){
    require "../../config.php";   
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
}
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'joel'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
} else {
     $message = trim(strtolower($_POST['message']));
     $botversion = 'drugAbuse2020 V2.1';

    

  // $message = trim(strtolower($_POST['message']));

    //step 1: Figure out the intent of the message
    //intents: Greeting, Find the current time, Ask about the HNG Programme
    //Train the bot
    //Provide directions for HNG Stage completions
    //check the db

    $intent = 'unrecognized';
    $unrecognizedAnswers = [
        'Please I Dont Know the answer can you Please help train me?. just type: <b>#train: Question | Answer | password.</b>',
        'I don\'t understand that question. train me pleasee. Just type: <b>#train: Question | Answer | password.</b>',
       
    ];
    if (strpos($message, 'what is your name') !== false || strpos($message, 'what do you do') !== false || strpos($message, 'who are you') !== false) {
        $intent = 'myname';
    }
    if (strpos($message, 'what is drug abuse') !== false || strpos($message, 'define drug abuse') !== false || strpos($message, 'drug abuse') !== false) {
        $intent = 'drugabuseDEF';
    }
    if (strpos($message, 'dаngеr аѕѕосіаtеd wіth drugs') !== false || strpos($message, 'dаngеrs аѕѕосіаtеd wіth drugs') !== false || strpos($message, 'dangers of drug abuse') !== false || strpos($message, 'effect of drug abuse') !== false) {
        $intent = 'dаngеr';
    }
        if (strpos($message, 'effесtѕ оf drug abuse') !== false || strpos($message, 'what are the effесtѕ оf drug abuse') !== false || strpos($message, 'drug abuse effects') !== false || strpos($message, 'drug abuse effect') !== false) {
        $intent = 'Effесtѕ';
    }
     if (strpos($message, 'cаuѕеѕ of drug abuse') !== false || strpos($message, 'things that cаuѕе drug abuse') !== false || strpos($message, 'factors that leads to drug abuse') !== false || strpos($message, 'what can cause drug abuse') !== false) {
        $intent = 'Cаuѕеѕ';
    }
    if (strpos($message, 'solution to drug аbuѕе') !== false || strpos($message, 'Remedies to drug аbuѕе') !== false || strpos($message, 'what are the solutions to drug аbuѕе') !== false || strpos($message, 'what is the solution to drug аbuѕе') !== false) {
        $intent = 'solution';
    }

    if (strpos($message, 'hello') !== false || strpos($message, 'hi') !== false) {
        $intent = 'greeting';
    }
    if (strpos($message, 'aboutbot') !== false || strpos($message, 'about bot') !== false || strpos($message, 'bot version') !== false || strpos($message, 'what is your bot version') !== false) {
        $intent = 'version';
    }

    if (strpos($message, 'how are you') !== false 
            || strpos($message, 'how are you doing') !== false
            || strpos($message, 'how do you feel') !== false) {
        $intent = 'greeting_response';
    }

    if ((strpos($message, 'am ok') !== false 
        || strpos($message, 'am cool') !== false) 
        && $intent !== 'greeting_response') {
            $intent = 'casual';
    }

    if(strpos($message, "help") !== false) {
        echo json_encode([
           "
            - To know what drug abuse is just type (what is drug abuse) <br />
            - To know the dengers of drug abuse just type (dangers of drug abuse) <br />
            - To know the effесtѕ of drug abuse just type (effесtѕ оf drug abuse).
            - To know the cаuѕеѕ of drug abuse just type (cаuѕеѕ of drug abuse) <br />
            - To know the solution to drug abuse just type (solution to drug аbuѕе) <br />
            - To know about the bot just type (about bot) <br />
            ",
        ]);
        return;
      }


    //check for bot training
    $trainingData = '';
    if (strpos($message, 'train:') !== false) {
        $intent = 'training';
        $parts = explode('train:', $message);
        if (count($parts) > 1) {
            $trainingData = $parts[1];
        }
    }

    if ($intent === 'training' && $trainingData === '') {
        $response = 'please you did not get the training format. Use this format >>> "#train: Question | Answer"';
    } else if ($trainingData !== '') {
        $intent = 'training';
        $parts = explode('|', $trainingData);
        if (count($parts) > 1) {
            $question = trim($parts[0]);
            $answer = trim($parts[1]);
            $password = trim($parts[2]);
            //save in db
            if ($password === 'password') {
                $sql = "insert into chatbot (question, answer) values (:question, :answer)";
                $query = $conn->prepare($sql);
                $query->bindParam(':question', $question);
                $query->bindParam(':answer', $answer);
                $query->execute();
                $query->setFetchMode(PDO::FETCH_ASSOC);
                
                $response = 'Thank you!! you have succesfully updated my brain';              
            }
            else {
                $response = 'Ooops, please enter a correct password (HINT: Password is password';
            }         
        } else {
            $response = 'sorry. please enter question, answer and password using this format >>> "#train: Question | Answer | password"';
        }
    }

    if ($intent === 'unrecognized') {
        $answer = '';
        $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question LIKE '$message' ORDER BY rand() LIMIT 1");
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $intent = 'db_question';
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $answer = $row["answer"];
            }
        }
   }
    switch($intent) {
        case 'Cаuѕеѕ':
            echo 'Thеrе are twо primary саuѕеѕ of drug аbuѕе аmоng the уоuthѕ. Thеѕе аrе
                PEER PRESSURE: Yоuth аѕѕосіаtеѕ wіth dіffеrеnt tуреѕ оf реорlе otherwise known аѕ frіеndѕ. Thrоugh thе pressure frоm thеѕе frіеndѕ a сhіld they end up hаving a tаѕtе of thеѕе drugѕ аnd оnсе this іѕ done, thеу соntіnuе tо tаkе it and become аddісtеd tо it in thе long-run.
                DEPRESSION: Anоthеr рrіmаrу cause оf drug аbuѕе іѕ depression. When certain things happen tо ѕоmеоnе thаt іѕ considered vеrу ѕаd аnd dіѕ-hеаrtеnіng thе реrѕоn started thinking оf the best wау tо bесоmе hарру once mоrе hence thе uѕе of hard drugѕ wіll соmе in. This lаtеr оn turnѕ to a hаbіt, hence drug abuse.
                Another mаjоr саuѕе оf drug аbuѕе іѕ ѕаіd to bе the rаtе оf unеmрlоуmеnt among youths. Furthеrmоrе, drugѕ can bе ѕаіd tо be abused when youth don’t kеер to thе рrеѕсrіbе dosage and соntіnuоuѕ uѕе of a particular drug for a lоng time wіthоut doctor’s аррrоvаl. Thіѕ kind of аbuѕе іѕ аѕѕосіаtеd wіth ѕоft drugѕ.';
            break;
        case 'Effесtѕ':
            echo 'he following effects соuld bе еxреrіеnсеd in the body:
                    1. It deadens the nеrvоuѕ system.
                    2. It іnсrеаѕеs thе heart-beat.
                    3. It causes thе blооd vеѕѕеlѕ tо dilate.
                    4. It саuѕеѕ bad dіgеѕtіоn nоtаblу оf vіtаmіn B еѕресіаllу whеn taken on empty stomach.
                    5. It interferes wіth thе роwеr оf judgmеnt аnd роіѕоnѕ thе higher brаіn аnd nеrvе сеntrе еtс.Ovеr dоѕе of thе drugѕ produces blurrеd ѕреесh, ѕtаggеrіng, ѕluggіѕhnеѕѕ, rеасtіоn, erratic emotionality and untіmеlу ѕlеер. The stimulants іnсludе wеll knоwn сосаіnе, caffeine оr codeine, paracetamol еtс.';
            break;
        case 'solution':
            echo '1] Aggrеѕѕіvе еxtіnсtіоn оf аll thе sources оf these hаrd drugѕ іnсludіng the fаrmѕ whеrе thеу аrе planted bу a jоіnt fоrce of authorities.
                    2] Pаrеntѕ should mоnіtоr the kіnd of friends thеіr сhіldrеn interact with аnd guіdе аgаіnѕt bаd соmраnу.
                    3] alcohol recovery programs for jesus followers of the аffесtеd persons.
                    4] Tеасhіng thе еffесtѕ of drug аbuѕе іn schools.
                    5] Cоntіnuоuѕ саmраіgn аgаіnѕt thе uѕе оf hard drugѕ аt thе fеdеrаl, state аnd lосаl levels.
                    6] Cоnѕеnt of a dосtоr ѕhоuld be ѕоught bеfоrе a рrоlоng intаkе оf a particular ѕоft drug.
                    7] Stіff penalty should be mеltеd аgаіnѕt anybody fоund dеаlіng in hard drugѕ.';
            break; 
        case 'dаngеr':
            echo 'There аrе twо аѕресtѕ оf dаngеr аѕѕосіаtеd wіth drugs; the risk оf addiction and аdvеrѕе hеаlth and bеhаvіоurаl consequences.';
            break;
        case 'greeting':
            echo 'Hello. how are you doing today?';
            break;            
        case 'drugabuseDEF':
            echo 'Drug abuse іѕ a ѕіtuаtіоn whеn drug is tаkеn mоrе thаn іt is prescribed. Drug аbuѕе саn bе further dеfіnеd as thе dеlіbеrаtе uѕе оf chemical ѕubѕtаnсеѕ fоr reasons other thаn іntеndеd mеdісаl purposes and whісh rеѕultѕ іn рhуѕісаl, mental emotional оr ѕосіаl іmраіrmеnt of thе uѕеr.';
            break;
        case 'greeting_response':
            echo 'am fine thank you';
            break;
        case 'db_question':
            echo $answer;
            break;
        case 'training':
            echo $response;
            break;
            
        case 'casual':
            echo 'Alright. nice to kmow';
            break;
        case 'myname':
            echo 'my name is Joel and am here to teach about drug abuse in nigeria';
            break;
        case 'version':
            echo $botversion;
            break;
        case 'unrecognized':
        default:
            echo $unrecognizedAnswers[rand(0, count($unrecognizedAnswers) - 1)];
            break;
    }

    exit;
}
 

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Joel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html, body {
            padding: 0;
            margin: 0;
            height: 100%;
        }
        #footer { color: red;
            text-decoration-color: red;
            display: flex;
            align-items: center;
            justify-content: center;    
        }
        table, tr, td {border-collapse: collapse; vertical-align: top; color: #1A446C; line-height: 15px;}

        body {
            background-color: #EEE4B9;
            font-family: 'Lato', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        nav {
            padding: 2em 3em;
            display: flex;
        }

        .nav-header {
            color: red;
        }
        
        .desc {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2em 4em;
        }

        .avatar {
            width: 14em;
            border: 1px solid #333;
            border-radius: 50%;
        }

        .data {
            text-align: center;
            color: red;
            font-size: 1.5em;
        }

        .data p {
            font-size: .5em;
            margin-top: -2px;
        }

        .contact {
            display: flex;
        }
        .contact a {
            padding: .5em;
            height: 50px;
            width: 50px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #333;
            margin: .5em;
        }

        .contact a:hover {
            background-color: #fff;
        }

        .contact a:hover i {
            color: #333;
        }

        .chat-window {
            flex: 1;
            background-color: red;
            height: 60vh;
            max-width: 40vw;
            display: flex;
            flex-direction: column;
            margin: 1.5em auto 0;
            /* display: none; */
        }
        
        .chats {
            flex: 1;
            padding: .5em;
            max-height: 65vh;
            overflow-y: scroll;
        }

        .chat {
            font-size: 80%;
            position: relative;
            padding: 8px;
            margin: .5em 0 2em;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }

        .received {
            color: #fff;
            background: #075698;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#2e88c4), to(#b9c3ee));
            background: -moz-linear-gradient(#2e88c4, #b9c3ee);
            background: -o-linear-gradient(#2e88c4, #b9c3ee);
            background: linear-gradient(#2e88c4, #b9c3ee);
            
        }

        .sent {
            color: #b9c3ee;
            background: #fff;
           
        }

        .sent:after {
            content: "";
            position: absolute;
            top: -20px;
            left: 50px;
            bottom: auto;
            left: auto;
            /* border-width: 20px 20px 0 0; */
            border-width: 20px 0 0 20px;
            border-style: solid;
            border-color: transparent #fff;
            display: block;
            width: 0;
        }

        .received:after {
            content: "";
            position: absolute;
            bottom: -20px;
            right: 50px;
            border-width: 20px 0 0 20px;
            border-style: solid;
            border-color:  #b9c3ee transparent;
            display: block;
            width: 0;
        }

        #chat-input {
            width: 100%;
            margin-top: .5em;
            padding: .5em 1em;
            font-size: 80%;
            color: #444;
        }


        .chat-trigger {
            position: absolute;
            bottom: 2em;
            right: 2em;
            background-color: white;
            border-radius: 50%;
            padding: .5em .7em;
            box-shadow: 2px 2px 1px #222;
            border-width: 0px;
            color: #222;
        }

        .chat-trigger:hover {
            background-color: #222;
            color: white;
        }

        @media screen and (max-width: 360px) {
            .content {
                flex-direction: column;
            }

            .avatar {
                width: 8em;
                border: 1px solid #333;
                border-radius: 50%;
            }

            .chat-trigger {
                position: fixed;
                bottom: 0em;
                right: 0em;
                margin-top: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-header">
                HNG INTERN4
            </div>
        </nav>
    
        <section class="desc">
            <div class="data">
                <image class="avatar" src="http://res.cloudinary.com/joel116/image/upload/v1523633259/IMG-20180219-WA0067.jpg"/>

                <div>
                    <h3><?php echo $user->name; ?></h3>
                    <p><em>Web Developer</em></p>
                    <div id="footer">Copyright 2018 JOEL UGWUMADU</div> 
                </div>

            </div>

            <div class="chat-window" id="chat-window">
                <div class="chats" id="chats">
                    <p class="chat received">Welcome am Joel You can ask me any question on drug abuse in Nigeria. or just type (help) to find out all i can do..dont forget you can also train me.</p>
                </div>
                <input type="text" id="chat-input" name="chat-input" placeholder="Type and hit enter to send a message"/>
            </div>
            <button class="chat-trigger" id="chat-trigger"><i class="fa fa-comments"></i></button> 
           
        </section>
         
    </div>


     <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
        </script>
    <script>
        $(document).ready(function() {
            $("#chat-window").toggle();
            var chatTrigger = $("#chat-trigger");
            chatTrigger.on('click', function() {
                $("#chat-window").toggle(1000);
            });

            $('#chat-input').on('keypress', function (e) {
                if(e.which === 13){
                    //Disable textbox to prevent multiple submit
                    $(this).attr("disabled", "disabled");
                    if(this.value !== '') {
                        //send message
                        $("#chats").append(`<p class="chat sent">${this.value}</p>`);
                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 1000);
                        sendMessage(this.value);
                        this.value = '';
                    }

                    //Enable the textbox again if needed.
                    $(this).removeAttr("disabled");
                }
            });


              function sendMessage(message) {
                $.ajax({
                    method: 'POST',
                    url: 'profiles/joel.php',
                    data: {message: message},
                    success: function(response) {
                        $("#chats").append(`<p class="chat received">${response}</p>`);
                        $("#chats").animate({scrollTop: $('#chats').prop("scrollHeight")}, 1000);
                    },

                    error: function(error) {
                        $("#chats").append(`<p class="chat received">Sorry, I cannot give you a response at this time.</p>`);
                        $("#chats").animate({scrollTop: $('#chats').prop("scrollHeight")}, 1000);
                    }
                });
            }


        });


    </script>
</body>
</html>