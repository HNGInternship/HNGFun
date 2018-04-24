<?php
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

       throw $err;
    }?>
  <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation.min.css" integrity="sha256-GSio8qamaXapM8Fq9JYdGNTvk/dgs+cMLgPeevOYEx0= sha384-wAweiGTn38CY2DSwAaEffed6iMeflc0FMiuptanbN4J+ib+342gKGpvYRWubPd/+ sha512-QHEb6jOC8SaGTmYmGU19u2FhIfeG+t/hSacIWPpDzOp5yygnthL3JwnilM7LM1dOAbJv62R+/FICfsrKUqv4Gg==" crossorigin="anonymous">
    <title>Document</title>
    <style>
        * {
            /*outline: 1px solid red !important; */
        }
        html, body {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
            }
            .wrapper {
                height: inherit;
                width: inherit;
                background: linear-gradient(to bottom right, rgba(33, 18, 43, 0.74) 0%, #836195 0%, rgba(1, 7, 13, 0.67)59.12%); 
            }
            h4 {
                font-family: 'Cabin';
                font-weight: 700;
                letter-spacing: 1.5px;
            }
            #pro-pic {
                border-radius: 50%;
                border: 4px solid #fff;
                width: 70px;
                height: 70px;
                margin-top: 20px;
                margin-left: 40px;
                padding-bottom: 20px;
                padding: 0px;
            }
            #body {
                line-height: 24px;
                font-size: 16px;
                font-family: 'Cabin';
                color: #BDBDBD;
                padding: 15px;
            }
            #foot {
                text-align: right;
                padding-top: 55px;
                padding-right: 20px;
                font-size: 14px;
                color: #F2F2F2;
            }
            #name {
                padding-top: 45px;
                padding-left: 15px;
                font-size: 22px;
                color: #F2F2F2;
            }
                         /* 
            ##Device = Most of the Smartphones Mobiles (Portrait)
            ##Screen = B/w 320px to 479px
            */
            @media (min-width: 320px) and (max-width: 480px) {
                
                #name {
                padding-top: 55px;
                font-size: 30px;
                color: #F2F2F2;
                
                line-height: 20px;
            }
            h4 {
                font-family: 'Cabin';
                font-weight: 700;
                letter-spacing: 1.5px;
            }
            #pro-pic {
                border-radius: 50%;
                border: 2px solid #fff;
                width: 60px;
                height: 60px;
                margin-top: 20px;
                margin-left: 40px;
                padding-bottom: 20px;
                padding: 0px;
                /*padding: 20px;*/
            }
            #body {
                line-height: 30px;
                font-size: 16.5px;
                font-family: 'Cabin';
                color: #BDBDBD;
                padding: 15px;
            }
            .hi {
                height: 100px;
            }
            .bi {
                height: 470px;
            }
            #foot {
                text-align: center;
                padding: 40px;
                font-size: 14px;
                color: #F2F2F2;
                margin-top: 20px;
            }
            .wrapper {
                height: 710px;
            }
                
            }
    </style>
</head>
<body>
<br>
<br>
    <br>
<br>
    <div class="wrapper">

            <div class="grid-x margin-x hi">
                    <div class="small-0 medium-0 large-1">
                            
                    </div>
                    <div class="small-4 large-1">
                            <img src="http://res.cloudinary.com/dejkcxyhc/image/upload/v1523913360/joehng.jpg" alt="" id="pro-pic">
                    </div>
                    <div class="small-8 medium-0 large-10" id="name">
                            <h4>Ogunlowo Joseph</h4>
                    </div>
                    
                </div>
    
                <div class="grid-x margin-x body bi">
                        <div class="small-0 medium-0 large-1">
                                
                        </div>
                        <div class="small-0 medium-0 large-1">
                                
                        </div>
                        <div class="small-12 medium-0 large-4" id="body">
                                <p>
                                    Joseph,a lover of ICT andprogramming.
                                    <br /><br />
                                    He has intermediate experience in Computer Langusges like HTML, CSS, Python.<br /><br />
                                    He is  also a cryptocurrency expert. 
                                </p>
                        </div>
                        <div class="small-0 large-5">
                                
                        </div>
                        <div class="small-0 large-1">
                                <h1></h1>
                        </div>
                    </div>
    
                    <div class="grid-x margin-x">
                        <div class="small-12 large-12" id="foot">
                                <p>© 2018 hng, fun</p>
                        </div>
                    </div>
    </div>
<footer>
<div>
                <a href="https://github.com/josephogunlowo1"><i class="fa fa-github"></i></i></a>
                <a href="https://twitter.com/josephogunlowo1"><i class="fa fa-twitter"></i></i></a>
                <a href="https://medium.com/@josephogunlowo"><i class="fa fa-medium"></i></i></a>
                <a href="https://web.facebook.com/joseph.ogunlowo"><i class="fa fa-facebook"></i></i></a>  
            </div>
</footer>
  </body>
</html>
