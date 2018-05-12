<?php
        $sql ="SELECT * FROM interns_data WHERE username = '@SunkanmiSheba' LIMIT 1";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $intern_data = $q->fetch();

        $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    // Set the secret word
    $secret_word = $data['secret_word'];
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sunkanmi Sheba's Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="http://res.cloudinary.com/sunkanmisheba/raw/upload/v1524912657/CSS/sheba.css" />
    <script src="main.js"></script>
</head>
<body>
    <div id="big_wrapper">
        <div>
            <div>
                <h1>HNG Internship 4.0</h1>
            </div>
            <img src="http://res.cloudinary.com/sunkanmisheba/image/upload/v1524742893/PicsArt_1455023726793.jpg" alt="Sheba Ayosunkanmi" width="250px" height="220px" class="main_img"/>
            <h3>Sheba Ayosunkanmi</h3>
        </div>
        <div>
            <p>Hello! Sheba here, I am a beginner developer who is enthusiastic about tech!</p>
            <p>My goal in this awesome intenship is to work my way towards becoming a Full-Stack web developer</p>
            <p>Once I become a full-stack web developer, my Ultimate Goal is to open and give opportunities
                 to disabled people like me and to the less privileged.</p>
        </div>
        <div id="social">
            <a href="https://github.com/SunkanmiSheba"><img src="http://res.cloudinary.com/sunkanmisheba/image/upload/v1524912409/git.png"/></a>
            <a href="https://twitter.com/SunkanmiSheba"><img src="http://res.cloudinary.com/sunkanmisheba/image/upload/v1524912336/twitter.png"/></a>
            <a href="https://facebook.com/ayosheba"><img src="http://res.cloudinary.com/sunkanmisheba/image/upload/v1524912385/facebook.png"/></a>
        </div>
    </div>
</body>
</html>
