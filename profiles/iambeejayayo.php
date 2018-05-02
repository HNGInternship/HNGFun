<?php
$selfURL = /* $_SERVER['HTTP_HOST']. */$_SERVER['REQUEST_URI'];
$password = 'password';

function trainBot($command) {
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

    return compact('response');
}

function findAnswer($question) {
    // find question in database and return answer
    $answer = '';

    if ($answer === '') {
        $answer = 'Sorry, I dont understand. You can train me by using the command "train: question #answer #password"';
    }

    return [
        'response' => $answer
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
?>


<!DOCTYPE html>
<html lang="en">
<title>BOLAJI AYODEJI | HNG4 Internship Profile</title>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bolaji Ayodeji">

    <!-- FONT Styles -->
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
            <img class="rounded-circle" style="width:60%" src="http://res.cloudinary.com/iambeejayayo/image/upload/v1524882640/BolajiAyodeji.jpg"
                alt="My Picture">
            <br />
            <br />
            <br />
            &nbsp <h3>Hello World!</h3>
                <br />
                <h1> I'm Bolaji Ayodeji<i class="fa fa-smile text-primary"></i> </h1>
                <br />
                <h2>Tech Geek
                <i class="fa fa-user text-primary"></i>&nbsp & Web Developer
                <i class="fa fa-laptop text-primary"></i></h2>
                <br />
                <h4><i class="fa fa-graduation-cap text-primary"></i> B.SC Federal University Lokoja (Computer Science)</h4>
            </p>
            <br />

        </div>

        <div class="col-sm bg-dark">
            <br />
            <br />
            <div class="social">
                <br />
                <br />
                <br />
                <br />
                <br />

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
                    <button class="navbar-brand btn btn-danger justify-content-center" id="chatbox-trigger">
                        <span>Let's Chat!</span>
                        <i class="fa fa-rocket"></i>
                    </button>
                    <br /><br />

                </div>
            </div>
        </div>
</div>

<div class=" bg-dark row justify-content-center chatbox">
        <div class="col-lg-3 bg-light">
            <header class="row justify-content-center chatbox-header">
            <div class="card bg-danger" align="center">
            
                    <img class="chatbox-logo" src="https://res.cloudinary.com/iambeejayayo/image/upload/v1525095528/bot.png" alt="Alpha Bot">
                    <h2 class="chatbox-title text-dark">Alpha Bot</h2>
                </div>
            </header>
            <div class="d-flex chatbox-content" id="chatbox-content"></div>
            <p class="text-center text-muted small"><?php $date = date("Y-m-d h:i:sa"); echo $date;?></p>
            <form class="row chatbox-footer">
                <input class="form-control chatbox-input" id="chatbox-input" autocomplete="off" placeholder="Talk to me! buddy" type="text">
                
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/dayjs@1.5.16/dist/dayjs.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" ></script>
   <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
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
                chatboxContent.appendChild(element)
            }
        }

        function isTrainingCommand(value) {
            return (value.substring(0, 6).toLowerCase() === 'train:')
        }

        function botDetails() {
            setTimeout(() => {
                addMessage({
                    message: 'My name is Alpha'
                })
                addMessage({
                    message: 'Bolaji Ayodeji created me'
                })
                addMessage({
                    message: 'You can teach me new tricks using the command...'
                })
                addMessage({
                    message: 'train: question #answer #password'
                })
            }, 1000)
        }

        function listCommands() {
            setTimeout(() => {
                addMessage({
                    message: 'aboutbot: to learn about me'
                })
                addMessage({
                    message: 'listcommands: to see what i can do'
                })
            }, 1000)
        }
        

        openChatbox.addEventListener('click', function () {
            startTyping()
            setTimeout(() => {
                addMessage({
                    message: 'Hello, My name is alpha'
                })
                startTyping()
                setTimeout(() => {
                    addMessage({
                        message: 'Im here to help you!'
                    })
                    startTyping()
                setTimeout(() => {
                    addMessage({
                        message: 'Type: Aboutbot -to learn about me'
                    })
                    startTyping()
                setTimeout(() => {
                    addMessage({
                        message: 'Type: Listcommands -to see the commands i accept'
                    })
                    }, 500)
                  }, 500)
                }, 500)
            }, 1000)
            
        })
        

        chatboxInput.addEventListener('keydown', function (event) {
            if (event.keyCode === 13) {
                event.preventDefault()

                addMessage({ message: this.value, recipient: true })
                startTyping()

                if (this.value.toLowerCase() === 'aboutbot') return botDetails()
                if (this.value.toLowerCase() === 'listcommands') return listCommands()
                if (this.value.toLowerCase() === 'botversion') return botVersion()
                if (this.value.toLowerCase() === 'aboutcreator') return creatorDetails()
                if (this.value.toLowerCase() === 'location') return botLocation()
                if (this.value.toLowerCase() === 'yourage') return botAge()

                const data = isTrainingCommand(this.value)
                    ? { train: this.value }
                    : { question: this.value }

                const xhttp = new XMLHttpRequest()
                xhttp.onreadystatechange = function() {
                    addMessage({ message: this.responseText })
                }
                xhttp.open('POST', '<?php echo trim($selfURL, '?') ?>', true)
                xhttp.send(Object.entries(data).map(pair => pair.map(encodeURIComponent).join('=')).join('&'))

                this.value = ''
            }
        })

// get the username
function get_username(){
    send_message('Hello Buddy!, what should i call you....?');
	responsiveVoice.speak('Welcome, i am online if you need me. Click the chat and enter your name only to begin.','UK English Male');
}


// simple ai function
function ai(message){
        if (username.length < 1){
          username = message;
          send_message('Hi, nice to meet you ' + username + '. Would you like to train me? If yes please use the format. train: this is a question | this is an answer.')
		  responsiveVoice.speak('Hi, nice to meet you ' + username + '. Would you like to train me? If yes please use the format. train: this is a question | this is an answer.','UK English Male');
        }

        else if ((message.indexOf('what is the time') >= 0) || (message.indexOf('what is my time') >= 0) || (message.indexOf('what time is it') >= 0)){
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
          send_message('your current time is: ' + time +'.' );
          responsiveVoice.speak('your current time is: ' + time +'.' ,'UK English Male');
        }
		 else if ((message.indexOf('can you locate me') >= 0) || (message.indexOf('what is my location') >= 0) || (message.indexOf('where am i') >= 0)){
          send_message('you are currently in '+ state +','+ country + '.');
          responsiveVoice.speak('you are currently in '+ state +','+ country + '.','UK English Male');
        }
		 else if ((message.indexOf('what browser am i using') >= 0) || (message.indexOf('what device am i using') >= 0) || (message.indexOf('what is my device') >= 0) || (message.indexOf('what is my browser') >= 0)){
			send_message('you are currently using a&nbsp;'+ browser +'&nbsp;on a '+ device + '&nbsp;Device');
          responsiveVoice.speak('you are currently using a '+ browser +'on a '+ device + 'Device','UK English Male');
		  }
		 else if ((message.indexOf('what is my ip address') >= 0) || (message.indexOf('what is my ip') >= 0) || (message.indexOf('what ip am i using') >= 0) || (message.indexOf('show me my ip') >= 0)){
			send_message('your ip address is : '+ ip +'');
          responsiveVoice.speak('your ip address is : '+ ip +'','UK English Male');
		  }
		  else if ((message.indexOf('aboutbot') >= 0) || (message.indexOf('aboutBot') >= 0) || (message.indexOf('About Bot') >= 0) || (message.indexOf('botAbout') >= 0)){
			send_message('Opheus-B0t v1.0');
          responsiveVoice.speak('i am an opheus bot and i am currently version 1.0.');
		  }
		else if (message.indexOf('train:') >= 0){
		trainer = message;
		$.ajax({
			type: "POST",
			url: 'profiles/opheus.php',
			data: {opheustrain: trainer },
			success: function(data){
				send_message(data);
				responsiveVoice.speak(data ,'UK English Male');
				
			}
		 });}
		else{
		elses = message;
		$.ajax({
			type: "POST",
			url: 'profiles/opheus.php',
			data: {opheuscheck: elses },
			success: function(data){
				send_message(data);
				responsiveVoice.speak(data ,'UK English Male');
			}
		 });}
}

    </script>
</body>
</html>
