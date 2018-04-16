<?php 
    try {
        $secret = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Melas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html, body {
            padding: 0;
            margin: 0;
            height: 100%;
        }

        body {
            background-color: #445544;
            font-family: 'Lato', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        nav {
            padding: 2em 3em;
            display: flex;
        }

        .nav-header {
            color: white;
            flex: 3;
        }
        
        .desc {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .avatar {
            height: ;
            width: 15em;
            border: 1px solid #333;
            border-radius: 50%;
        }

        .data {
            text-align: center;
            color: white;
            font-size: 1.5em;
        }

        .data p {
            font-size: .5em;
            margin-top: -2px;
        }

        .contact {
            display: flex;
        }
        .contact a {
            padding: .5em;
            height: 50px;
            width: 50px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #333;
            margin: .5em;
        }

        .contact a > i {
            color: #fff;
        }

        .contact a:hover {
            background-color: #fff;
        }

        .contact a:hover i {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-header">
                HNG INTERN
            </div>
        </nav>
    
        <section class="desc">
            <image class="avatar" src="http://res.cloudinary.com/ccmelas/image/upload/v1523619383/melas_avatar_1.jpg"/>
            <div class="data">
                <h3>Chiemela Chinedum</h3>
                <p><em>Web Developer</em></p>
            </div>        
            <div class="contact">
                <a href="https://www.facebook.com/chiemela.chinedum" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/ccmelas" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://github.com/ccmelas" target="_blank"><i class="fa fa-github"></i></a>        
            </div>
        </section>
    </div>
</body>
</html>