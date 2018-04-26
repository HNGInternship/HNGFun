<?php


// First off: Helper functions
function respond($response, array $options=['chatMassage' => true]) {
	if ($options['chatMassage'] == true) {
		// We call this function concurrently
		respond(['message' => $response], ['chatMassage' => false]);
	} else {
		echo json_encode($response);
		exit();
	}
}

//Sanitize string
function sanitize(string $value) {
	return trim(filter_var($value, FILTER_SANITIZE_STRING));
}

//message jarvis
if (!empty($_POST['message'])) {
	
	if(! defined('DB_USER')){
		require "../../config.php";		
		try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
    }
    

	$message = $_POST['message'];

	$trainRegex = "^train(?:\:?)?(?:\s+)?(.+)#(.+)(?:\s+)(.+)";
// First we check if we are training
if (preg_match("/^train/", $message)) {
		
    if (preg_match_all("/${trainRegex}/i", $message, $matches)) {
        $question = sanitize($matches[1][0]);
        $answer = sanitize($matches[2][0]);
        $password = ($matches[3][0]);

        if ($password !== 'trainpwforhng') {
            respond('Oh no! That\'s not the password to train me');
        }

        if (empty($question)) {
            respond('It look like you did not provide me with a question');
        }
        if (empty($answer)) {
            respond('It look like you did not provide me with an answer');
        }

        // Now we check if the question and answer already exists
        $sql = $conn->prepare("SELECT * FROM chatbot WHERE question = :question AND answer = :answer");
        $sql->execute([':question' => $question, ':answer' => $answer]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)) {
            respond('Oh! I already knew that. Please teach something else.');
        } else {
            $sql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';

            try {
                $query = $conn->prepare($sql);
                if ($query->execute([':question' => $question, ':answer' => $answer]) == true) {
                    respond('Great! thank you so much for teaching that');
                };
            } catch (PDOException $e) {
                respond('Oh o! Looks like the system that allows me to learn had a glitch, please try again');
            }
        }
    } else {
        respond('Oh! No. This is how to train me: train: Question # Answer Password');
    }
} else {
    $question = sanitize($message);

    $sql = $conn->prepare("SELECT * FROM chatbot WHERE question LIKE :question ORDER BY RAND()");
    $sql->execute([':question' => "%{$question}%"]);
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if (! $result) {
        respond('I do not understand what you mean because I\'ve not been trained on that.');
    } else {
        $output = preg_replace_callback("/(&#[0-9]+;)/", function($m) {
            return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
        }, $result['answer']); 

        respond($output);
    }
}
}



$sql = "SELECT * FROM interns_data WHERE username = 'timi'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$timi = array_shift($data);

// Secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$words = $q->fetch();
$secret_word = $words['secret_word'];



?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } 
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #efefef;
            background-image: url(http://res.cloudinary.com/tarrot-system-inc/image/upload/v1503349370/dot_srox60.png);
            color: #157EFB;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
        }
        .containers {
            display: flex;
            max-width: 700px;
            height: 100vh;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .wrappers {
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .mybio b {
            font-size: 14px;
            color:black;
        }
        .mybio{
            color:black;
        }
        .avatar {
            background-size: cover;
            height: 190px;
            width: 190px;
            margin: 8px
        }
        .name {
            font-size: 15px;
            padding-left: 20px;
            padding-right: 5px;
        }
        .name p {
            padding-left: 35%;
            padding-bottom: 5px;
        }
        .about {
            line-height: 1.5;
        }

        .about h3{
            color: #157EFB;
        }
        .profile-social-links span {
            display: none;
        }
        .footer-wrapper {
            display: flex;
            justify-content: space-between;
            float: right;
            margin: 0px 15px;
        }

        .others {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
        }

        .task {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
            padding-right: 15px;
            padding-bottom: 10px;
            float: right;
        }
        .task a {
            text-decoration: none;
            color: #636b6f;
        }
        .fa-link {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #00aced;
            margin-left: 10px;
            color: #fff;
        }
        .fa-link:hover {
            background-color: #322f30;
        }
        .myprofile {
            background-color: #ffffff;
            margin-right: 20px;
            height: 255px;
        }
        .profile-social-links {
            color: #fff;
            margin-left: 18%;
        }
        ul.profile-social-links {
            align-items: center;
            float: right;
        }
        .profile-social-links li {
            vertical-align: top;
            height: 100px;
            display: inline;
        }
        .profile-social-links a {
            color: #fff;
            text-decoration: none;
        }
        .fa-slack {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-slack:hover {
            background-color: #00aced;
        }
        .fa-github {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-github:hover {
            background-color:#157EFB;
        }
        .fa-twitter {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-twitter:hover {
            background-color: #157EFB;
        }
        .sendersname {
            padding: 20px;
            font-size: 14px;
            width: 460px;
            height: 40px;
            border: 0px;
        }
        .submit {
            padding: 10px;
            font-size: 14px;
            width: 460px;
            height: 40px;
            border: 0px;
        }
        .contact {
            margin-top: 10px;
        }
        .submit {
            background-color: #157EFB;
            color: white;
        }
        .submit:hover {
            background-color: #157EFB;
        }
        .message {
            height: 100px;
            padding: 20px;
            margin-top: 5px;
            font-size: 14px;
            width: 460px;
            border: 0px;
        }
    </style>
</head>

<body>
    <div class="containers">
        <div class="wrappers">
            <div class="myprofile">
                <img src="http://res.cloudinary.com/tarrot-system-inc/image/upload/v1523621115/IMG_4551_muwd22.jpg" class="avatar">
                <div class="name" style ="color: #157EFB;"><b>Tejumola David Timi</b>
                <p>@timi</p>
            </div>
            <div class="others socials">
                <ul class="profile-social-links">
                    <li>
                        <a href="https://github.com/timi-codes" class="social-icon" target="_blank"> <i class="fa fa-github"></i></a>
                    </li>
                    <li>
                        <a href="https://hnginternship4.slack.com/messages/@timi" class="social-icon" target="_blank"> <i class="fa fa-slack"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/codepreneur" class="social-icon" target="_blank"> <i class="fa fa-twitter"></i></a>
                    </li>
                    <br>
                </ul>
            </div>
        </div>

        <div class="mybio">
            <br/><h3>Tejumola David Timi</h3><br/>
            <p>UI/UX designer.<br/>JAVA Lover<br/>Swift.<br/></p>
            <p># Google Android Associate Developer.<br> # Learning fullstack javascript (MEAN Stack).<br/># Music Lover<br/> </b></p>
        </div>
        <div id="Jimie"></div>
    </div>
    <script src="profiles/jim/dist/Jimie.js"></script>