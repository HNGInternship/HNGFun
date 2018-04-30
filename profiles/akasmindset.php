<?php
error_reporting(0);
if (empty($conn)) {
    include("../db.php");

    define('DB_CHARSET', 'utf8mb4');
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET;

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);
}

$intern_details_query = $conn->query(
    "SELECT     interns_data.name, 
                interns_data.username, 
                interns_data.image_filename
    FROM        interns_data
    WHERE       interns_data.username = 'akasmindset' LIMIT 1");

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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akas J.C corner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .card{
        box=shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin:auto;
        max-width:350px;
        text-align: center; 
        font-family: Arial,sans-serif;

    }
    .logo{
        color:red;
    }
    a{
        font-size: 24px;
    }
    .profile-img img {
              margin-left: auto;
              margin-right: auto;
              border-radius: 50%;
              max-width: 100%;
              height: 350px;
    }
    .profile-name{
        font-size: 20px;

    }
    #title{
        font-size:20px;
        color: gray;
    }
    #twitter{
        color:#00aced;
    }
    #facebook{
        color:#3b5998;
    }
    #github{
        color:#333
    }
    footer p{
        color: #ffffff;
        line-height:40px;
        font-size: 14px;
        background-color: black; 
    }
        
    
    </style>

</head>
<body>
<h2 style="text-align: center">HNG Internship Profile Card</h2>
<div class="card">

<div class= "profile-img">
<img src="<?=$filename;?>" alt="Akas HNG Profile pic">
</div>

 <p class="profile-name">
            <?=$name;?><br>
             (@<?=$username;?>)
 </p>

	  		        
<p style="text-align:center" id="title"> Web Developer </p> 
<h2><span class="logo">Hng</span> Internship 4.0</h2>
<p>Connect with me on<br>
<a href="https://github.com/akasmindset"><i class="fa fa-github" id="github"></i></a>
<a href="https://twitter.com/akasmindset"><i class="fa fa-twitter" id="twitter"></i></a>
<a href="https://web.facebook.com/john.ebuka.39"><i class="fa fa-facebook" id="facebook"></i> </a>

</p>

<footer style="padding:opx">
<p>copyright&copy; HNG Internship 2018</p>
</footer>
</div>

</body>
</html>