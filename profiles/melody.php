<?php
date_default_timezone_set('Africa/Lagos');
$date = date('l, M d, Y');
$time = date('G:i');
?>
<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra SC|Romanesco' rel='stylesheet'>
    <link href="../HNGStage1/style.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        html, body {
            height: 100%;
            background-image: url('https://wallup.net/wp-content/uploads/2016/01/155420-water-dark-calm-nature.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            margin: 0px;
        }
        .container {
            width: 100%;
            min-height: 100%
        }
        .header {
            width: 100%;
            height: 60px;
            background-color: rgba(148, 148, 148, 0.39);
        }
        .header-text {
            position: absolute;
            height: 60px;
            font-family: Almendra SC;
            line-height: 60px;
            font-size: 18px;
            text-align: center;
            color: #FFFFFF;
        }
        span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }
        .title {
            width: 204px;
        }
        .about {
            right: 0;
            width: 100px;
        }
        .main {
            position: absolute;
            top:20px;
            width: 100%;
            padding-top: 150px;
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
            top:300px;
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
    <div id=a class="header">
        <div class="header-text title"><span>HNG Internship 4</span></div>
        <div class="header-text about">About</div>
    </div>
    <div class="body">
        <div class="main"><span class="text">Oluwamelody Tech</span></div>
        <div class="under"><span>Lagos | NG</span></div>
    </div>
    <div class="footer">
        <span><?= $date ?> <br/> <?= $time ?></span>
    </div>
</div>

</body>
</html>


