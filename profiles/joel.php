<?php

  $result = $conn->query("select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_ASSOC);   
  
  
  $secret_word = $result['secret_word'];

  $result2 = $conn->query("Select * from interns_data where username = 'joel'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Joel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html, body {
            padding: 0;
            margin: 0;
            height: 100%;
        }
        #footer { color: red;
            text-decoration-color: red;
            display: flex;
            align-items: center;
            justify-content: center;    
        }
        table, tr, td {border-collapse: collapse; vertical-align: top; color: #1A446C; line-height: 15px;}

        body {
            background-color: #EEE4B9;
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
            color: red;
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
            width: 14em;
            border: 1px solid #333;
            border-radius: 50%;
        }

        .data {
            text-align: center;
            color: red;
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
                HNG INTERN4
            </div>
        </nav>
    
        <section class="desc">
            <image class="avatar" src="http://res.cloudinary.com/joel116/image/upload/v1523633259/IMG-20180219-WA0067.jpg"/>

            <div class="data">
                <h3><?php echo $user->name; ?></h3>
                <p><em>Web Developer</em></p>
            </div>        
            <div id="footer">Copyright 2018 JOEL UGWUMADU</div>
        </section>
    </div>
</body>
</html>