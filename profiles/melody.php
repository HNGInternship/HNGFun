<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra SC|Romanesco' rel='stylesheet'>
    <style type="text/css">
        .container{
            width: 100%;
            min-height: 100%
        }
        html, body {
            height: 100%;
            background-image: url('https://wallup.net/wp-content/uploads/2016/01/155420-water-dark-calm-nature.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            margin: 0px;
        }

        span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }

        .main {
            position: absolute;
            top:20px;
            width: 100%;
            padding-top: 300px;
            height: 130px;
            font-family: "Romanesco";
            line-height: 130px;
            font-size: 96px;
            text-align: center;
        }
        .text {
            background: -webkit-linear-gradient(0deg, #FF0F00, rgba(17, 26, 240, 0.55), #EC0F13);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .under {
            position: absolute;
            top:450px;
            height: 50px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under1 {
            position: absolute;
            top:500px;
            height: 40px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under2 {
            position: absolute;
            top:540px;
            height: 49.71px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 313.66px;
            height: 48.63px;
            padding-bottom: 30px;
            font-family: "Almendra SC";
            line-height: normal;
            font-size: 24px;
            text-align: center;
            color: #7ED7F9;
        }
    </style>
</head>
<body>
<div class="container">
    <?php

    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="melody"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

    <div class="offset-md-3 col-md-6">
        <div class="col-md-2">
        </div>
        <img class="img-fluid rounded" style="padding-top: 10px" onerror="this.src='images/default.jpg'" src="<?=$my_data['image_filename'] ?>" >
        <div class="main"><span class="text"><?=$my_data['name'] ?></span></div>
        <div class="under"><span>Full Stack Web Developer</span></div>
        <div class="under1"><span><a href="https://github.com/mokunuga">
                <img style="width:40px; height: 40px;" src="https://cdn1.iconfinder.com/data/icons/logotypes/32/github-512.png">
            </a><a href="https://linkedin.com/in/mokunuga">
                <img style="width:40px; height: 40px;" src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-social-media/256/Linkedin-icon.png">
                </a></span></div>
        <div class="under2"><span>Lagos | NG</span></div>

    </div>


    <?php


    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    ?>

</div>

</body>

