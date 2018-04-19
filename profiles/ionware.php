<?php
require_once "../db.php";

//SQL Query
$query = "select name, username, image_filename from interns_data where username = 'ionware'";

try {
    //Execute fetch query and harvest result.
    $q = $conn->query($query);
    $user = $q->fetch(PDO::FETCH_OBJ);

}
catch (PDOException $exception) {
    echo "Server cannot properly establish connection to database.";
    exit(1);
}
catch (Exception $e) {
    echo "Temporary server problem.";
    exit(1);
}


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Roboto and Lato Google fonts cdn -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:700" rel="stylesheet">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $user->username; ?></title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            background: #E7EFF3;
            color: #fff;
            font-size: 16px;
            font-family: Lato, sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: Roboto, sans-serif;
            margin: 3px 0;
        }
        .container {
            width: 30%;
            height: 100%;
            position: absolute;
            background: #429ffd;
            left: 0; right: 0; top: 0; bottom: 0;
            margin: auto; padding: 80px 0 0 0;
        }
        .user-details {
            text-align: center;
        }
        .user-details > span {
            display: block;
            font-size: 1.1em;
        }
        .avater {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
        .social {
            background: #fff;
            padding: 15px 30px;
            text-align: center;
            position: absolute;
            bottom: 0; right: 0;
            width: 100%;
        }
        .social a {
            color: #2C3E50;
            font-size: 1.2em;
            margin: 0 5px;
        }
        @media screen and (max-width: 840px) {
            .container {
                position: relative;
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="user-details">
        <img src="<?php echo $user->image_filename ?>" alt="Profile Pic" class="avater">
        <span>@<?php echo $user->username; ?></span>
        <h3><?php echo $user->name; ?></h3>
    </div>
    <!-- Social icons bar -->
    <div class="social">
        <a href="https://fb.me/pythonleet" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/ionwarez" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://github.com/ionware" target="_blank"><i class="fa fa-github"></i></a>
    </div>
</div>
</body>
</html>