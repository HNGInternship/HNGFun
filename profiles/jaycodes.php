<?php

$today = date("H:i:s");
require_once 'db.php';
try {
    $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'jaycodes'");
    $intern_data->execute();
    $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
    $result = $intern_data->fetch();


    $secret_code = $conn->prepare("SELECT * FROM secret_word");
    $secret_code->execute();
    $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
    $code = $secret_code->fetch();
    $secret_word = $code['secret_word'];
 } catch (PDOException $e) {
     throw $e;
 }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@jaycodes</title>
    <style>
        *{
            margin: 0;padding: 0;box-sizing: border-box;font-family: cursive;
        }
        body{
            background-color: #e5e5e5;
            position: relative;
        }
        .pic{
            position: absolute;
            box-shadow: 2px 2px 2px #a1a1a1;
            top:100px;
            left:200px;
            border-radius: 10px;
        }
        .details{
            position: absolute;
            width: 450px;
            top:130px;
            left: 632px;
            background-color: #fff;
            box-shadow: 2px 2px 2px #a1a1a1; 
        }.details h2{
            margin-top: 60px;
            text-align: center;
            font-size: 36px;
        }
        small{
            font-size: 24px;
            font-weight: normal;
        }
        #time{
            padding: 0px 5px;
            float: right;
            clear: both;
            height: 42px;
            width: 141px;
            background-color: #efefef;
            text-align: center;
            font-size: 30px;
        }
        p{
            padding:0 30px;
            text-align: center;
            font-size: 24px;
        }
        .footer{
            margin-top: 70px;
            display: block;
            height: 50px;
            background-color: #efefef;
        }
        .footer button{
            height: 40px;
            margin: 5px 140px;
            width:150px;
            font-size: 24px;

        }
    </style>
    <script>
    
    </script>
</head>

<body>
    <img class="pic" src="http://res.cloudinary.com/djz6ymuuy/image/upload/v1523890911/newpic.jpg" alt="myPicture" width="432px" height="550px">
    <div class="details">
        <div id="time"><?php echo $today; ?></div>
        <h2>James James John<br><small><em>@jaycodes</em></small></h2>
        <div>
            <p>
                A 300L student of mechanical and aerospace engineering, university of Uyo.<br>
                Ilove programming and am proficient in HTML5, CSS3,Javascript and PHP.
            </p>

        </div>
        <div class="footer"><button>Contact</button></div>
    </div>
</body>
</html>