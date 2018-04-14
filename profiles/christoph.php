<?php

include_once '../config.php';
define('DB_CHARSET', 'utf8mb4');

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET;

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);

$stmt1 = $pdo->query(
    "SELECT     interns_data.name, 
                interns_data.username, 
                interns_data.image_filename
    FROM        interns_data
    WHERE       interns_data.username = 'Christoph' LIMIT 1");

$stmt2 = $pdo->query(
    "SELECT     secret_word.secret_word 
    FROM        secret_word LIMIT 1");

$row1 = $stmt1->fetch();
$row2 = $stmt2->fetch();
// Secret Word
$secret_word = $row2['secret_word'];

// Profile Details
$name = $row1['name'];
$username = $row1['username'];
$filename = $row1['image_filename'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>James Christopher</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css' />
    <style>

        body {
            font-family: "Josefin Sans","Montserrat","Segoe UI","Roboto","Helvetica Neue","Arial","sans-serif";
            color: #4A4646;
        }

        .profile-details, .skills {
            padding-top: 130px;
        }

        .profile-details {
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }

        .skills {
            padding: 75px 70px;
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
            font-size: 4.5em;
            font-weight: 600;
            margin-bottom: 0;
        }

        .skills > span {
            display: inline-block;
            font-size: 18px;
            margin-bottom: 25px;
        }

        .skill-list h4 {
            font-size: 30px;
            border-bottom: 2px solid;
            display: inline-block;
            margin-bottom: 20px;
        }

        .skill-progress {
            margin-bottom: 15px;
        }

        .progress-bar {
            background-color: #E9ECEF;
            border-radius: 5px;
        }

        .progress {
            background-color: #DAB9EA;
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

        @media screen and (max-width: 768px) {
            .profile-details {
                padding-top: 115px;
            }

            .social-links {
                margin-bottom: 30px;
            }

            .skills {
                padding: 25px 30px;
            }

            .hello-text {
                font-size: 3.5em;
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
            <div class="col-sm-6 skills">
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
            </div>
        </div>
    </div>
</body>
<script src="../vendor/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</html>