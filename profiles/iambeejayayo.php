<?php
date_default_timezone_set('Africa/Lagos');



$selfURL = './iambeejayayo.php';
$password = 'password';


if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!isset($conn)) {
        include '../config.php';
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        function trainBot($command)
        {
            
            $command = str_replace('train:', '', $command);
            $commands = explode('#', $command);
        
            if (count($commands) === 3) {
                $question = trim($commands[0]);
                $answer = trim($commands[1]);
                $userPassword = trim($commands[2]);
        
                if ($password === $userPassword) {
                    // save new question to database
                    $response = 'Thank you for teaching me!';
                } else {
                    $response = 'Sorry, the password is not correct, please try again';
                }
            } else {
                $response = 'Make sure the command structure matches "train: question #answer #password"';
            }
        
            echo json_encode('response');
            exit;
        }
        
        function findAnswer($question)
        {
            // find question in database and return answer
            $answer = '';
        
            if ($answer === '') {
                $answer = 'Sorry, I dont understand. You can train me by using the command "train: question #answer #password"';
            }
        
            return [
                'response' => $answer,
            ];
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-type: application/json');
        
            echo json_encode($_POST);
            die;
        
            $response = isset($_POST['train'])
            ? trainBot($_POST['train'])
            : findAnswer($_POST['question']);
        
            echo json_encode($response);
            die;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<title>BOLAJI AYODEJI | HNG4 Internship Profile</title>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bolaji Ayodeji">

    <!-- Style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <style>
        .container {
            text-align: left;
            padding: 2%;
        }

        img {
            width: 40%;
            height: auto;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .links {
            padding: 1%;
        }

        .color {
            color: blue;
        }

        .footer {
            text-align: center;
        }

        .social {
            font-size: 130%;
        }

        .chatbox {
            border-radius: 2px;
        }
        .chatbox-logo {
            width:40%
        }
        .chatbox-title {
        white-space:nowrap;
        }

        .chatbox-content {
            /* padding: 1rem; */
            flex-wrap: wrap;
            flex-direction: column;
            padding-top: 1rem;
            height: 350px;
            overflow-y: auto;
        }

        .chatbox-response {
            display: table;
            position: relative;
            background: #000;
            color: white;
            padding: .5rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            box-shadow: 0 3px 1px rgba(0, 0, 0, .06), 0 1px 2px 1px rgba(105, 105, 105, .4);
        }

        .chatbox-response:after {
            content: attr(data-time);
            display: block;
            position: absolute;
            top: calc(100% + .25rem);
            color: purple;
            font-size: .5rem;
        }

        .chatbox-response:not(.is-mine) {
            margin-right: auto;
        }

        .chatbox-response.is-mine {
            background: #fefefe;
            color: #000;
            margin-left: auto;
        }

        .chatbox-response.is-mine:after {
            right: .5rem;
        }

        .chatbox-footer {
            padding: 1rem;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <br />
    <br />
    <br />
    <div class="row">
        <div class="col-sm bg-dark text-light">
            <br />
            <img class="rounded-circle" style="width:50%" src="http://res.cloudinary.com/iambeejayayo/image/upload/v1524882640/BolajiAyodeji.jpg"
                alt="My Picture">
            <br />
            <br />
            <br />
            &nbsp <h3>Hello World!<i class="fa fa-thumbs-up"></i></h3>
            <p class="text-primary" style="font-size:300%"> I'm Bolaji Ayodeji </p>
                <h4>Tech Geek <i class="fa fa-user text-primary"></i>&nbsp
                & Web Developer <i class="fa fa-laptop text-primary"></i></h4>
                <br />
                </p>
            <br />

        </div>

        <div class="col-sm bg-dark">
            <br />
            <br />
            <div class="social">


                <a class="navbar-brand btn btn-outline-primary" href="#">Contact Me!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <br />
                <br />

                <div class="text-light">
                    <p>
                        <i class="fa fa-map-marker text-primary"></i> Lokoja, Nigeria</p>
                    <p>
                        <i class="fa fa-phone text-primary"></i> +234 8109445504</p>
                    <p>
                        <i class="fa fa-envelope text-primary"> </i> Sirbeejay1@gmail.com</p>

                    <a href="https://github.com/iambeejayayo" style="text-decoration:none" class="fa fa-github social text-light"></a>&nbsp
                    <a href="https://medium.com/@BolajiAyodeji" style="text-decoration:none" class="fa fa-medium social text-light"></a>&nbsp
                    <a href="https://slack.com/hnginternship4" style="text-decoration:none" class="fa fa-slack social text-light"></a>&nbsp
                    <a href="https://facebook.com/ayodeji.beejay" style="text-decoration:none" class="fa fa-facebook-official social text-light"></a>&nbsp
                    <a href="https://instagram.com/iambeejayayo" style="text-decoration:none" class="fa fa-instagram social text-light"></a>&nbsp
                    <a href="https://twitter.com/iambeejayayo" style="text-decoration:none" class="fa fa-twitter social text-light"></a>&nbsp
                    <a href="https://linkedin.com/in/iambeejayayo" style="text-decoration:none" class="fa fa-linkedin social text-light"></a>&nbsp
                    <a href="https://whatsapp.com/08109445504" style="text-decoration:none" class="fa fa-whatsapp social text-light"></a>&nbsp
                    <br />
                    <br />
                    <br />

                    <a class="btn btn-outline-light bg-danger btn-lg" href="#bot">Chat with my BOT!&nbsp<i class="fa fa-angle-double-down"></i></a>
                    </button>


                </div>
            </div>
        </div>
</div>
<br /><br />


<div class=" bg-dark row justify-content-center chatbox">
        <div class="col-lg-6 bg-light">
            <header class="justify-content-center chatbox-header">
            <div class="card bg-danger" align="center" id="bot">

                    <img class="chatbox-logo" src="https://res.cloudinary.com/iambeejayayo/image/upload/v1525095528/bot.png" alt="Alpha Bot" style="width:20%">
                    <h4 class="chatbox-title text-dark">Alpha Bot</h4>

                </div>
            </header>
            <div class="d-flex- chatbox-content card-body" id="chatbox-content">
                </div>
                <!-- chat messages goes here -->

               <p class="text-center text-muted small">
                <?php $date = date("d-m-Y h:i:a");
echo $date;
?>

            <div class="" align="center">
            <button class="navbar-brand btn btn-outline-light bg-danger justify-content-center" id="chatbox-trigger">
                <span>Click me buddy!</span>
                    <i class="fa fa-rocket"></i>
            </button>
            </div>
            <form class="row chatbox-footer" method="post">
            <input class="form-control chatbox-input" id="chatbox-input" autocomplete="off" placeholder="Talk to me Buddy!" type="text">

            </form>
        </div>
    </div>
</div>

    <script src="https://unpkg.com/dayjs@1.5.16/dist/dayjs.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" ></script>
      
    <script>
        const typingIndicator = 'random-string-for-indicator-id'
        const openChatbox = document.getElementById('chatbox-trigger')
        const chatboxContent = document.getElementById('chatbox-content')
        const chatboxInput = document.getElementById('chatbox-input')

        function startTyping() {
            const element = document.createElement('div')
            element.classList.add('chatbox-response', 'flash', 'animated', 'infinite')
            element.setAttribute('id', typingIndicator)
            chatboxContent.appendChild(element)
        }

        function stopTyping() {
            const el = document.getElementById(typingIndicator)

            if (el) el.parentNode.removeChild(el)
        }

        function addMessage(data) {
            if (data.message) {
                stopTyping()
                const element = document.createElement('div')
                element.classList.add('chatbox-response')

                if (data.recipient)
                    element.classList.add('is-mine')

                element.textContent = data.message

                const timeout = data.delay || 0

                setTimeout(() => {
                    chatboxContent.appendChild(element)
                    chatboxContent.scrollTo(0, chatboxContent.scrollHeight)
                }, timeout)
            }
        }

        function isTrainingCommand(value) {
            return (value.substring(0, 6).toLowerCase() === 'train:')
        }

        function botDetails() {
            addMessage({
                message: 'Hello My name is Alpha',
                delay:500,
            })
            addMessage({
                message: 'Bolaji Ayodeji created me',
                delay:1000,
            })
            addMessage({
                message: 'I love learning new things',
                delay:1500,
            })
            addMessage({
                message: 'You can teach me new tricks using the command...',
                delay:2000,
            })
            addMessage({
                message: 'Train: Question #answer #password',
                delay:2500,
            })
            addMessage({
                message: 'to know the commands i accept, type "listcommands"',
                delay:3000,
            })
        }

        function listCommands() {
            addMessage({
                message: 'aboutbot: to learn about me',
                delay:500,
            })
            addMessage({
                message: 'listcommands: to see what i can do',
                delay:1000,
            })
            addMessage({
                message: 'botversion: to know my current version',
                delay:1500,
            })
            addMessage({
                message: 'aboutbolaji: to learn about my creator',
                delay:2000,
            })
            addMessage({
                message: 'yourlocation: to know where i live',
                delay:2500,
            })
            addMessage({
                message: 'yourage: to know my age',
                delay:3000,
            })
            addMessage({
                message: 'yourgender: to know my gender',
                delay:3500,
            })
            addMessage({
                message: 'currentdate: to to know todays date',
                delay:4000,
            })
            addMessage({
                message: 'currenttime: to know the time',
                delay:4500,
            })
            addMessage({
                message: 'yourbirthday: to know the day i was created',
                delay:5000,
            })
            addMessage({
                message: 'yournumber: to get my private number',
                delay: 5500
            })
        }

        function aboutBolaji() {
            addMessage({
                message: 'Bolaji Ayodeji is my creator',
                delay:500,
            })
            addMessage({
                message: 'I cant live without him',
                delay:1000,
            })
            addMessage({
                message: 'He is a Tech Geek! & Web Developer',
                delay:1500,
            })
            addMessage({
                message: 'All he cares about is God, Code & Music',
                delay:2000,
            })
            addMessage({
                message: 'He plays the Acoustic Guitar & Piano',
                delay:2500,
            })
            addMessage({
                message: 'His favorite food is Yam/Potatoe Porridge & Plaintain',
                delay:3000,
            })
            addMessage({
                message: 'To know more about my creator',
                delay:3500,
            })
            addMessage({
                message: 'Follow him on social media',
                delay:4000,
            })
            addMessage({
                message: 'FACEBOOK @Bolaji Ayodeji',
                delay:4500,
            })
            addMessage({
                message: 'TWITTER @iamBeejayAyo',
                delay:5000,
            })
            addMessage({
                message: 'INSTAGRAM @iamBeejayAyo',
                delay:5500,
            })
            addMessage({
                message: 'MEDIUM @BolajiAyodeji',
                delay:6000,
            })
        }

        function botVersion() {
            addMessage({
                message: 'AlphaBot V 1.0.0',
                delay:1000,
            })
        }

        function botLocation() {
            addMessage({
                message: 'Im currently at Lokoja, Kogi State, Nigeria',
                delay: 1000,
            })
        }

        function botBirthday() {
            addMessage({
                message: 'I was created on 30th, April 2018',
                delay: 1000,
            })
        }

        function botAge() {
            addMessage({
                message: 'Im a couple days old!',
                delay:1000,
            })
        }

        function botGender() {
            addMessage({
                message: 'Im male buddy!',
                delay:1000,
            })
        }

        function botNumber() {
            addMessage({
                message: '+234 8109445504 Dont tell my mom please!',
                delay:1000,
            })
        }

        function currentTime() {
            const date = new Date
            const currentHour = date.getHours()
            const time = currentHour > 12 ? currentHour - 12 : currentHour
            const meridian = currentHour > 12 ? 'PM' : 'AM'

            addMessage({
                message: `The current time is ${time}:${date.getMinutes()} ${meridian}`,
                delay:1000,
            })
        }

        function currentDate() {
            const date = new Date
            const day = date.getDate()
            const weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][date.getDay()]
            const month = [
                'January', 'February', 'March', 'April',
                'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ][date.getMonth()]

            addMessage({
                message: `Today is ${weekday} ${day} of ${month} ${date.getFullYear()}`,
                delay:1000,
            })
        }


        openChatbox.addEventListener('click', function () {
            startTyping()
            addMessage({
            message: 'Hello, My name is alpha',
            delay:500,
            })
            startTyping()

            addMessage({
                message: 'Im here to help you!',
                delay:1000,
            })
            startTyping()

            addMessage({
                message: 'Type: Aboutbot -to learn about me',
                delay:1500,
            })
            startTyping()

            addMessage({
                message: 'Type: Listcommands -to see the commands i accept',
                delay:2000,
            })
        })


        chatboxInput.addEventListener('keydown', function (event) {
            if (event.keyCode === 13) {
                event.preventDefault()

                addMessage({ message: this.value, recipient: true })
                startTyping()

                if (this.value.toLowerCase() === 'aboutbot') return botDetails()
                if (this.value.toLowerCase() === 'listcommands') return listCommands()
                if (this.value.toLowerCase() === 'botversion') return botVersion()
                if (this.value.toLowerCase() === 'aboutbolaji') return aboutBolaji()
                if (this.value.toLowerCase() === 'yourlocation') return botLocation()
                if (this.value.toLowerCase() === 'yourage') return botAge()
                if (this.value.toLowerCase() === 'yourgender') return botGender()
                if (this.value.toLowerCase() === 'yourbirthday') return botBirthday()
                if (this.value.toLowerCase() === 'currenttime') return currentTime()
                if (this.value.toLowerCase() === 'currentdate') return currentDate()
                if (this.value.toLowerCase() === 'yournumber') return botNumber()
                 

                const data = isTrainingCommand(this.value)
                    ? { train: this.value }
                    : { question: this.value }

                const xhttp = new XMLHttpRequest()
                xhttp.onreadystatechange = function() {
                    addMessage({ message: JSON.parse(this.responseText) })
                }
                xhttp.open('POST', '<?php echo trim($selfURL, '?') ?>', true)
                xhttp.send(Object.entries(data).map(pair => pair.map(encodeURIComponent).join('=')).join('&'))

                this.value = ''
            }
        })


</script>
</body>
</html>
