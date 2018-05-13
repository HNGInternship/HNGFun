<?php 
    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Briggs Alabo David</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Arvo:400,700|Ubuntu:400,700" rel="stylesheet">
        <style>
        #body{
        width:1498.89px;
        position: absolute;    
        background: #41608D;
        height:779px;
        left: 0px;
        top: 0px;
        }
        .img{
        position: absolute;
        width:   90.67796610169492%;
        height: 400px relative;
        border-radius: 50%;
        left:4.519774011299435%;
        top: 2.824858757062147%;          
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
        z-index: 2;
        align:center;
        }
        #box{
        position: absolute;
        width: 23.617476932930367%;
        height: 733px;
        left: 5.203850849628725%;
        top:  1.2515644555694618%;
        background: #FFFFFF;
        box-shadow: 3px 5px 7px rgba(0, 0, 0, 0.25), -3px 5px 7px rgba(0, 0, 0, 0.25);
        border-radius:1.3642564802182811%;
        z-index: 1;
        }
        .add{
        position: absolute;
        width: 80%;
        left: 14%;
        top: 54%;  
        font-family: Ubuntu;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 14px;  
        color: #000000;
        }
        .num{
        position: absolute;
        width: 80%;
        left: 14%;
        top:  62%;  
        font-family: Ubuntu;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 14px;  
        color: #000000;
        }
        .mail{
        position: absolute;
        width: 80%%;
        left: 14%;
        top: 69%;  
        font-family: Ubuntu;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 14px;  
        color: #000000;
        }
        .loc{
        position: absolute;
        width: 8.47457627118644%;
        height: relative;
        left: 3.1073446327683617%;
        top: 399px;
        }
        .num2{
        position: absolute;
        width: 8.47457627118644%;
        height: relative;
        left: 3.1073446327683617%;
        top: 456px;
        }
        .mail2{
        position: absolute;
        width: 8.47457627118644%;
        height: relative;
        left: 3.1073446327683617%;
        top: 513px;
        }
        .sr1{
        position: absolute;
        width:  100%;
        height: 34px;
        left: 0px;
        top: 673px;   
        background: #333333;  
        }
        .sr2{
        position: absolute;
        width:  100%;
        height: 60px;
        left: 0px;
        top: 673px;   
        background: #333333;
        border-radius: 1.3642564802182811%; 
        }
        .twitter{
        position: absolute;
        width: 9.03%;
        height: relative;
        left: 13.56%;
        top: 93.6%;
        }
        .facebook{
        position: absolute;
        width: 9.03%;
        height: relative;
        left: 35.02%;
        top: 93.6%;
        }
        .linkedin{
        position: absolute;
        width: 9.03%;
        height: relative;
        left: 56.21%;
        top: 93.6%;
        }
        .github{
        position: absolute;
        width: 9.03%;
        height: relative;
        left: 76.55%;
        top: 93.6%;
        }
        .rec{
        position: absolute;
        width: 100%;
        height: 232px;
        left: 0px;
        top: 69.79166666666666%;      
        background: #41608D;
        }
        .name{
        position: fixed;
        width: 330px;
        height: 5.77%;
        left: 38.7%;
        top: 5.26%;  
        font-family: Arvo;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 36px;   
        color: #F47A0E;
        }
        #skill{
        position: fixed;
        width: 373px;
        height: 2.7%;
        left: 37.67%;
        top: 13%;   
        font-family: Ubuntu;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 18px;   
        color: #000000;
        }
        .line{
        position: fixed;
        width: 252px;
        height: 0%;
        left: 41.36%;
        top: 19%;    
        border: 1px solid #F47A0E;
        }
        .arc{

        }
        </style>
    </head>
    <body>
    <div id = "">
    </div>
    <div id="">
    <div id = "box">
    <img class= "img" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525219101/Ellipse.png" alt="profile pic">
    <div>
    <img class= "loc" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525347132/facebook-placeholder-for-locate-places-on-maps.png" alt="location">
    <img class= "num2" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525347313/phone-receiver.png" alt="phone number">
    <img class= "mail2" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525347152/close-envelope.png" alt="Email">
    </div>
    <div>
    <p class= "add">River State, Nigeria</p>
    <p class= "num">+2349077572964</p>
    <p class= "mail">alabobriggs@yahoo.com</p>
    </div>
    <div>
    <div class ="sr1"></div>
    <div class ="sr2"></div>
    </div>
    <div>
    <img class= "twitter" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525219275/twitter.png" alt="twitter">
    <img class= "facebook" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525219263/facebook_1.png" alt="facebook">
    <img class= "linkedin" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525219307/linkedin.png" alt="linkedin">
    <img class= "github" src="https://res.cloudinary.com/alabobriggs/image/upload/v1525219291/github.png" alt="github">
    </div>
    </div>
    <div class="rec"></div>
    <div class="arc">
    <div class="name">
    <p>Briggs Alabo David</p>
    </div>
    <div id="skill">
    <p>Javascript developer, Marketer, Ethical hacker</p>
    </div>
    <div class="line"></div>
    </div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    </div>
    </body>
    </html>