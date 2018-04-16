<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $profile_query = "SELECT name, username, image_filename FROM interns_data WHERE username = '$profile_name' LIMIT 1";
        $profile_result = $conn->query($profile_query);
        $profile_result->setFetchMode(PDO::FETCH_ASSOC);
        $profile_details = $profile_result->fetch();


        $secret_word_query = "SELECT secret_word FROM secret_word LIMIT 1";
        $secret_word_result = $conn->query($secret_word_query);
        $secret_word_result->setFetchMode(PDO::FETCH_ASSOC);
        $secret = $secret_word_result->fetch();
        $secret_word = $secret['secret_word'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tobi - HNG Intern</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <style>
        body{
            padding:0;
            margin:0;
            font-family: 'Source Sans Pro', sans-serif;
        }
        header{
            background-color: #d7d9dd;
            text-align: center;
            padding: 2rem;      
        }
        .content{

        }
        .header_img{
            border-radius: 50%;
            border:  5px solid white;
            width: 15rem;
            box-shadow: 5px 5px 5px grey;
        }
        .header_txt{
            font-size: 4rem;
            text-shadow: 2px 1px darkgrey;
        }
        .content{
            text-align: center;
            font-size: 1.5rem
        }
    </style>
</head>
<body>
    <header>
        <img  class='header_img' src='<?php echo $profile_details['image_filename']?>'>
        <p class='header_txt'>Hi, I'm <?php echo $profile_details['username']?>.</p>
    </header>
    <div class='content'>
        <p><b>Full Name:</b><?php echo $profile_details['name']?></p>
        <p><b>Slack Username:</b>@<?php echo $profile_details['username']?></p>
        <p><b>Occupation:</b> Student(UI, Computer Science, 400level), Intern(HNG)</p>
        <p><b>Languages:</b> Python, HTML/CSS/JS/PHP</p>
        <p><b>Lover of:</b> Anime, Novels, Good Food</p>
    </div>
</body>
</html>