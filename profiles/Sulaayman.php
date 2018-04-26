<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sulaayman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style type="text/css">
        .container{
            width: 100%;
            min-height: 100%
        }
        html, body {
            height: 100%;
            background-image: url('http://res.cloudinary.com/dprr4anw3/image/upload/c_scale,e_accelerate:68,h_650,r_50,w_800/a_0/v1523722712/Rectangle.png');
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
            font-family: "Helvetica";
            line-height: 130px;
            font-size: 50px;
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
            font-family: "Helvetica";
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
            font-family: "Helvetica";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
       
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
<div class="offset-md-3 col-md-6">
        <div class="col-md-2">
        </div>
        <div>
        <img class="img-fluid rounded"  onerror="this.src='images/default.jpg'" style = "width: 500px; " image="center" src="https://res.cloudinary.com/dprr4anw3/image/upload/v1523724395/20180312_172640.jpg" >
        </div>
        <div class="main"><span class="text">Owodunni Sulaiman</span></div>
        <div class="under"><span>Php/ laravel developer</span></div>
        <div class="under1"><span><a href="https://github.com/sulaayman">
                <img style="width:40px; height: 40px;" src="https://cdn1.iconfinder.com/data/icons/logotypes/32/github-512.png">
            </a></span></div>
        
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
</body>
</html>