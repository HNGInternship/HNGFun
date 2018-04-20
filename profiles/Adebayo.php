<?php 

$result = $conn->query("SELECT * FROM secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("SELECT * FROM interns_data where username = 'Adebayo'");
$user = $result2->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Adebayo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Over+the+Rainbow" rel="stylesheet">
    <style>
        /* Desktop */
        html {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            border: 0;
            height: 100%;
            background: #000000;
        }

        /* DAST */

        h1.logo {
            margin: 0px;
            font-family: 'Over the Rainbow', cursive;
            font-size: 36px;
            color: #000000;
            text-shadow: 2px 2px 3px #cccccc;
        }

        /* Profile */

        main {
            box-shadow: 0 4px 6px 0 #cccccc;
            max-width: 400px;
            max-height: auto;
            margin: auto;
            text-align: center;
            font-family: cursive;
            background: #70BBD9;
            margin-top: 65px;
        }



        /* Image */

        img {

            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: #C4C4C4;
            border: 3px solid #000000;

        }

        /* DARAMOLA ADEBAYO STEVE */
        h1.name {
            font-weight: bold;
            font-size: 24px;
            color: #000000;
            font-family: cursive;
        }

        /* Vector 3 */

        .linebreak {
            height: 0px;
            border: 1px inset;
            width: 300px;
        }

        /* WEB DEVELOPER - UI/UX DESIGNER - HNG INTERN */

        .skill {
            font-style: normal;
            font-weight: normal;
            line-height: normal;
            font-size: 24px;
            text-transform: uppercase;
            color: #000000;
        }

        /*icons*/

        .fa {
            padding: 10px;
            font-size: 15px;
            width: 35px;
            text-align: center;
            margin: 3px 2px;
            border-radius: 50%;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.35);
            transition: 0.2s;
        }

        .fa-facebook {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-twitter {
           background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-linkedin {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-github {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: #000000;
            background-color: white;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <main>
    <header class="header">
            <h1 class="logo">DAST</h1>
        </header>
        <img src="<?php echo $image_filename;?>" alt="Me">
        
        
        <h1 class="name"><?php echo $name;?></h1>
        <hr class="linebreak" />
       
        <p class="skill">ui/ux DESIGNER 
            <br/> Web DESIGNER | HNG INTERN</p>
            <h5 style="font-family:cursive;">Slack:@<?php echo $username;?></h5>

<div id="icons">
            <a href="https://www.facebook.com/daramola.adebayo">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com/baystizzle">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/in/adebayo-daramola-31b852b3">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="https://github.com/Baystef">
                <i class="fa fa-github"></i>
            </a>
        </div>
        <p>
            <button>Contact Me</button>
        </p>
    </main>


</body>

</html>
