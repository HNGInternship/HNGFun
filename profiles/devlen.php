<?php
/**
 * Created by PhpStorm.
 * User: DavidOkonji
 * Date: 4/22/18
 * Time: 9:50 PM
 */
    require 'db.php';
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = "1n73rn@Hng";
    $secret_word = $result->secret_word;
    $result2 = $conn->query("Select * from interns_data where username = 'Devlen'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html>
<head>
    <title>Contact Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        .container{
            background: aliceblue;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            text-align: center;
            background: white;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        .email{
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px 0px 8px 0px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: hand;
            width: 100%;
            font-size: 18px;
            text-decoration: none;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
<div class="container">
<div class="card" style="margin: 70px auto;">
    <img src="http://res.cloudinary.com/devlen/image/upload/v1524431266/PicsJoin_20171017191459771.jpg" alt="david" style="width:100%">
    <?php

            echo "<h1>" . $user->name . "</h1>";
            echo "<p class='title'>" . "Android Developer | PHP DEV" . "</p>";
            echo "<p>@ " .$user->username . "</p>";
    ?>
    <div style="display: inline-block">
    <a href="https://twitter.com/david_okonji" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="https://github.com/devlen000" target="_blank"><i class="fa fa-github"></i></a>
    <a href="https://www.linkedin.com/in/chukwunonso-okonji/" target="_blank"><i class="fa fa-linkedin"></i></a>
    </div>
    <p>
    <span><a href="mailto:davidokonji3@gmail.com" class="email">Contact</a></span>
    </p>
</div>
</div>
</body>
</html>
