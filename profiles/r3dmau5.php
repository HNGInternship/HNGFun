<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <title>UDOH FAITH</title> 
        <style>
           html, body {
                color: #E5E5E5;
                background-size:cover;
                background-repeat: no-repeat;
            }
                        
            h1 {
               
                /* Udoh */

                position: absolute;
                width: 200px;
                height: 104px;
                left: 612px;
                top: 240px;
                font-family: Lato;
                font-style: normal;
                font-weight: 800;
                line-height: normal;
                font-size: 72px;
                text-align: center;
                color: #312D2D;
                margin-top: -180px;
                margin-left: -178px;




            }
        
            #profilepic{
                position: absolute;
                width: 421px;
                height: 563px;
                left: 253px;
                top: 191px;
                border-radius: 20px;
                margin-top: -150px;
                margin-left: -200px;
            }


            h2{
                position: absolute;
                width: 165px;
                height: 100px;
                left: 654px;
                top: 292px;

                font-family: Lato;
                font-style: normal;
                font-weight: 800;
                line-height: normal;
                font-size: 72px;
                text-align: center;
                color: #312D2D;
                margin-top: -170px;
                margin-left: -188px;
            }

            h3{ 
                
                position: absolute;
                width: 275px;
                height: 47px;
                left: 711px;
                top: 392px;

                font-family: Lato;
                font-style: normal;
                font-weight: 300;
                line-height: normal;
                font-size: 36px;
                letter-spacing: 0.05em;

                color: #000000;
                margin-top: -180px;
                margin-left: -190px;

            }

            h4{
                position: absolute;
                width: 102px;
                height: 33px;
                left: 711px;
                top: 456px;
                font-family: Lato;
                font-style: normal;
                font-weight: 800;
                line-height: normal;
                font-size: 24px;
                text-align: justify;
                letter-spacing: 0.05em;
                color: #AF6BD9;
                margin-top: -190px;
                margin-left: -190px;

            }
            
            p{
                position: absolute;
                width: 447px;
                height: 115px;
                left: 711px;
                top: 496px;
                font-family: Lato;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                font-size: 18px;
                letter-spacing: 0.05em;
                color: #000000;
                margin-top: -190px;
                margin-left:-190px;
            }

            #facebooklogo {
            position: absolute;
            width: 50px;
            height: 50px;
            left: 711px;
            top: 675px;
            margin-top: -220px;
            margin-left:-190px;

            }

            #twitterlogo{
            position: absolute;
            width: 50px;
            height: 50px;
            left: 1044px;
            top: 675px;
            margin-top: -220px;
            margin-left:-190px;
            }
        
            #iglogo{
            position: absolute;
            width: 50px;
            height: 50px;
            left: 822px;
            top: 675px;
            margin-top: -220px;
            margin-left:-190px;
            }

            #slacklogo{
            position: absolute;
            width: 50px;
            height: 50px;
            left: 933px;
            top: 675px;
            margin-top: -220px;
            margin-left:-190px;
            }
        
        
        </style>
    </head>
    <body>
        <h1>
            Udoh
        </h1>
        <p>
            I’m a down to earth kinda guy cos, you know, gravity. I’m a rocker, weirdo, geek, an ambivert. I’m obsessed with the Gothic subculture, a hardcore gamer of the PC MasterRace, a bad conversationalist and a grammar police.
        </p>
            
        <h2>
            Faith
        </h2>

        <h3> 
            UI/UX|Android|Graphics
        </h3>

        <h4>
            ABOUT
        </h4>    
            
        <img id = "profilepic" src ="http://res.cloudinary.com/r3dmau5/image/upload/v1524051968/MyPicture.png"/>
        <a href="https://web.facebook.com/fudoh2">
            <img id = "facebooklogo" src ="http://res.cloudinary.com/r3dmau5/image/upload/v1524051973/Facebook.png"/>
        </a>
        <a href="https://twitter.com/FaithUdoh11">
            <img id = "twitterlogo" src ="http://res.cloudinary.com/r3dmau5/image/upload/v1524051977/Twitter.png"/>
        </a>
        <a href="https://www.instagram.com/fitzfixesfeistsfits/">
            <img id = "iglogo" src ="http://res.cloudinary.com/r3dmau5/image/upload/v1524051956/Instagram.png"/>
        </a>
        <a href="https://hnginternship4.slack.com/messages/CA0AMUAAU/team/UA1VD4HFG/">
            <img id = "slacklogo" src ="http://res.cloudinary.com/r3dmau5/image/upload/v1524051975/Slack.png"/>
        </a>

        <?php
            require_once '../db.php';
            try {
                $select = 'SELECT * FROM secret_word';
                $query = $conn->query($select);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $data = $query->fetch();
            } 
            catch (PDOException $e) {
                
            throw $e;
            }
            $secret_word = $data['secret_word'];        
        ?>

    </body> 
</html>
