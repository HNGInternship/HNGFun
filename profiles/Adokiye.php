<?php
include "../answers.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adokiye Iruene</title>
    <style type="text/css">
        #div_main {
            width: 980px;
            margin-right: auto;
            margin-left: auto;
            font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-align: center;
            background-image: url(http://res.cloudinary.com/gorge/image/upload/v1523960257/Internships-1.png);
            height: auto;
        }

        #header {
            background-color: #FFFFFF;
            width: 980px;
            margin-right: auto;
            margin-left: auto;
        }

        .tb5 {
            border: 2px solid #456879;
            border-radius: 10px;
            height: 32px;
            width: 400px;
            background: #B3FAFF;

        }

        .fb7 {
            border: 2px solid #456879;
            outline: none;
            background-color: #FFFFFF;
            vertical-align: middle;
            font-size: 15px;
            text-align: center;
            color: #563F3F;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class=".body" id="div_main">
    <div class=".header" id="header">
        <img src="http://res.cloudinary.com/gorge/image/upload/v1523960590/images.jpg" width="120" height="131" alt=""/>
        <p style="font-size: 36px; text-align: center; color: #563F3F; font-weight: bold;"><span
                    style="font-style: italic; color: #FFFFFF; font-size: 24px;"><span
                        style="color: #6FB0CB; font-size: 30px;">my</span></span> PROFILE</p>
    </div>
    <marquee onmouseover="this.stop();" onmouseout="this.start();">
        <p style=" color: #FFFFFF;font-family: arial, sans-serif; font-size: 14px;font-weight: bold;letter-spacing: 0.3px;">
            ASK ANY QUESTION IN THE TEXT BOX BELOW OR TYPE IN <span style="font-weight: bolder">TRAIN: YOUR QUESTION#YOUR ANSWER</span>
            TO ADD MORE QUESTIONS TO THE DATABASE</p>
    </marquee>
    <p style="font-style: normal; font-weight: bold;">&nbsp;</p>
    <p style="font-style: normal; font-weight: bold;">NAME : <?php echo "i=Iruene Adokiye" ?></p>
    <p style="font-weight: bold">USERNAME : <?php echo "Adokiye" ?></p>
</div>
</body>
</html>
