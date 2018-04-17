<?php
    try {
        $sql = 'SELECT intern_id, name, username, image_filename FROM interns_data WHERE username=\'Bukola\'';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $name= $data['name'];
    $username= $data['username'];
    $link= $data['image_filename'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Nasa Image Search Engine</title>
    <!-- css stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,700" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            font-size: 62.5%;
            background-color: #fbfbf5;
        }
        body {
            font-family: "Overpass", sans-serif;
            font-size: 1.8rem;
            line-height: 1.6;
            color: #DC5960;
        }
        .wrapper {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            height: 100vh;
        }
        .my-face {
            background: lightblue url('https://res.cloudinary.com/do52uumgy/image/upload/v1523890291/avatar_lphsd8.png') no-repeat center;
            background-size: contain;
            width: 200px;
            height: 200px;
            border-radius: 100px;
            border: 1px solid #535353;
        }
        h1 {
            color: #047CB6;
        }
        .my-info div span {
            font-weight: 700;
        }
        .my-info div a {
            color: inherit
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div>
            <h1>Hi, I'm Bukola!<h1>
        </div>
        <div class="my-face"></div>
        <div class="my-info">
            <div>
                <span>Fullname:</span> 
                Bukola Bisuga
            </div>
            <div>
                <span>Nickname:</span> 
                bukks
            </div>
            <div>
                <span>Email:</span> 
                <a href="mailto:bukksbisuga@gmail.com">bukksbisuga@gmail.com</a>
            </div>
            <div>
                <span>Interests:</span> 
                Athletics, Singing
            </div>
        </div>
    </div>
    <?php
        try {
            $sql = 'SELECT * FROM secret_word LIMIT 1';
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
