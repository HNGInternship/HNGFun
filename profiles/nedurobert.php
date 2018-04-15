<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nedu Robert</title>
    <style>
        .profileImage img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profileInfo {
            margin: 50px auto;
            width: 500px;
            max-width: 100%;
            display: flex;
        }

        .profileName {
            display: flex;
            margin-top: 20px;
        }

        .profileName span {
            margin-top: 10px;
            margin-left: 5px;
        }

        h2 {
            margin-left: 50px;
        }
    </style>
    <?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;

        $result2 = $conn->query("Select * from interns_data where username = 'nedurobert'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>
</head>
<body>
    <div class=profileInfo>
        <div class="profileImage">
            <img src="<?php echo $user->image_filename ?>" />
        </div>
        <div class="profileName">
            <h1><?php echo $user->name ?></h1> 
            <span>(@<?php echo $user->username ?>)</span>
        </div>  
    </div>
    <h2>Full-Stack Developer</h2>
</body>
</html>