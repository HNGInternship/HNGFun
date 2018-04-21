<?php 
    require 'db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sadiq Profile</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- custom style -->
    <style type="text/css">
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .section, .row {
            margin: 1em 20%;
            padding: auto;
            box-shadow: 5px 5px 5px lightgrey;
            border-top: 1px solid lightgrey;
            border-left: 1px solid lightgrey;
        }
        span {
            opacity: 0.5;
            font-size: 16px;
        }
        img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
        a:link, a:visited, a:hover {
            text-decoration: none;
        }
        a:hover {
            background: beige;
            padding: 5px 0;
            box-shadow: 2px 0 2px #696;
        }
        p {
            display: inline-flex;
        }
        p:first-child {
            padding-top: 5px;
        }
        p:last-child {
            padding-bottom: 5px;
        }
        figure, h3 {
            padding-top: 50px;
        }
        h2, h3 {
            font-size: 28px;
        }
        h2#tag {
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <div class="row section">
        <div class="col-md-12">
            <figure>
                <img alt="dp" class="img-responsive" src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg">
                <figcaption><p><?php echo $user->name ?></p></figcaption>
            </figure>
            <h2 id="tag">Web Developer<br />
            <span>HTML | CSS | JS | JQUERY | ANGULAR | BOOTSTRAP</span></h2>
        </div>
    </div>

    <div class="row section">
        <div class="col-md-12">
            <h3>Check Me Out</h3>
            <div class="row">
                <div class="col-md-12">
                    <p><a href="https://www.codepen.io/sastech" target="_blank" style="color: black;">Codepen</a></p>
                    <p><a href="https://www.github.com/saslamp" target="_blank" style="color: black;">GitHub</a></p>
                    <p><a href="https://www.twitter.com/_saslamp" target="_blank" style="color: skyblue;">Twitter</a></p>
                    <p><a href="https://www.linkedin.com/in/abubakar-sambo-ii-102726b4" target="_blank" style="color: lightskyblue;">LinkedIn</i></a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>