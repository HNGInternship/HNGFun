<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Oluwapelumi Olaoye</title>

    <?php
    require 'db.php';

    $sql = "Select * from secret_word LIMIT 1";
    $result = $conn->query($sql);
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'Oluwapelumi'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>

    <meta name="theme-color" content="#2f3061">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Fruktur">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <style>
        body {
            /* background-color: firebrick; */
            font-family: 'Fruktur';
        }

        #whole-background {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 70px;
        }

        #profile {
            color: #2182fa;
            align-content: center;
            font-family: 'Fruktur';
        }
    </style>
</head>

<body>
<div id="whole-background">
    <div id="profile">
        <div class="text-center">
            <img class="img-circle img-responsive" src="<?php echo $user->image_filename ?>" alt="" />
            <h3>Hey there, nice to meet you, I'm <?php echo $user->name ?> and my user name is <small>(@<?php echo $user->username ?>)</small></h3>
            <h4>I do both backend and mobile engineering. You can follow me on twitter <a href="https://twitter.com/pelumiiiiiii">@pelumiiiiiii</a></h4>
        </div>
    </div>
</div>
</div>
</body>

</html>