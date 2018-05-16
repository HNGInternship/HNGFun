<?php
    //require "../db.php";
    if (!defined('DB_USER')){
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }  $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
    $result2 = $conn->query("Select * from interns_data where username = 'Molo'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">     
        <title>HNG Fun</title>
        <style>
            html, body { 
                margin: 0;
                padding: 0;
                font-family: 'Lato';
                background: #042349;
                text-align: center; 
                overflow-x: hidden; 
            }
            .contains {
                background: #F6D630;
                padding: 1em;
                border-top-right-radius: 10%;
                border-bottom-left-radius: 10%;
            }
            .clouds{
                border-radius:50%;
                width: 150px;
                height: 150px;
            }
            .row {
                margin-top: 3em;
            }
            .first {
                margin-top: 1.5em;
            }
            .p {
                font-weight: bold;
                font-size: 20px;
                margin: 0;
                text-shadow: #808080 7px 5px 10px;
            }
            .name {
                margin: auto 1em;
                font-size: 20px;
                font-weight: bold;
                text-shadow: 2px 5px 10px black;
            }
            span.link {
                margin: auto 0.5em;
                text-shadow: #4f4f4f 5px 5px 5px;
            }
            .link:hover,
            .link:focus {
                text-shadow: #555 -10px 0 10px, #4f4f4f 10px 0 10px;
                transform: scale(1.1);
            }
            @media screen and (max-width: 767px) {
                .name {
                    display: block;
                }
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="container contains first">
                    <span class="name">AYINDE</span>
                    <img class="clouds" src="http://res.cloudinary.com/molo/image/upload/v1526381592/profile.jpg">
                    <span class="name">AYOBAMI</span>                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="container contains">
                    <p class="p">Aspiring Lagos-based Dev</p>
                    <p class="p">Lover of everything art</p>                    
                    <hr width="30%" style="border:1px solid #4f4f4f;">
                    <span class="link"><a href="https://www.codepen.io/AyoIX" target="_blank" style="color: black;"><i class="fa fa-codepen fa-2x"></i></a></span>
                    <span class="link"><a href="https://www.github.com/Arafly" target="_blank" style="color: black;"><i class="fa fa-github fa-2x"></i></a></span>
                    <span class="link"><a href="https://www.twitter.com/AraflyIX" target="_blank" style="color: skyblue;"><i class="fa fa-twitter fa-2x"></i></a></span>
                </div>
            </div>
        </div>
    </body>