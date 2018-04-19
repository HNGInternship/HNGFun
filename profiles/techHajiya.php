<<<<<<< HEAD
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
    "SELECT interns_data.name,interns_data.username, interns_data.image_filename FROM interns_data WHERE interns_data.username = 'TechHajiya'");
$stmt2 = $pdo->query(
    "SELECT     secret_word.secret_word FROM secret_word");
$row1 = $stmt1->fetch();
$row2 = $stmt2->fetch();

$secret_word = $row2['secret_word']; //Querying Secret Word

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
    <title>Lois Thomas</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=quicksand" rel='stylesheet' type='text/css' />
    <style>
        body {
            font-family: "quicksand"
            color: #4A4646;
			padding-left:400px;
		}        
		.profile-details{
            padding-top: 30px;
        }
        .profile-details {
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }
        .profile-body {
            max-width: 100%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 250px;
			height:400px;
            border-radius: 100px;
			box-shadow: 0px 0px 5px 2px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			color:#191970;
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
        @media screen and (max-width: 768px) {
            .profile-details {
                padding-top: 115px;
            }
            .social-links {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="width:1100px;">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?=$filename;?>" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?=$name;?>  <br/>(@<?=$username;?>) <br/> I Eat | I Code | I Repeat</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

=======
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
    "SELECT interns_data.name,interns_data.username, interns_data.image_filename FROM interns_data WHERE interns_data.username = 'TechHajiya'");
$stmt2 = $pdo->query(
    "SELECT     secret_word.secret_word FROM secret_word");
$row1 = $stmt1->fetch();
$row2 = $stmt2->fetch();

$secret_word = $row2['secret_word']; //Querying Secret Word

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
    <title>Lois Thomas</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=quicksand" rel='stylesheet' type='text/css' />
    <style>
        body {
            font-family: "quicksand"
            color: #4A4646;
			padding-left:400px;
		}        
		.profile-details{
            padding-top: 30px;
        }
        .profile-details {
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }
        .profile-body {
            max-width: 100%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 250px;
			height:400px;
            border-radius: 100px;
			box-shadow: 0px 0px 5px 2px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			color:#191970;
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
        @media screen and (max-width: 768px) {
            .profile-details {
                padding-top: 115px;
            }
            .social-links {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="width:1100px;">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?=$filename;?>" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?=$name;?>  <br/>(@<?=$username;?>) <br/> I Eat | I Code | I Repeat</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

>>>>>>> 278d9a17342470cd0a13ff48fb4cd2aa3e6d5f23
</html>