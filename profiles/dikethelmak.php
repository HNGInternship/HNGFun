<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HNG FUN</title>
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <style>
            body{
                margin: 0;
                padding: 0;
                background-color: #eeeeee;
            }

            .heading{
                background-color: #2773ae;
                height: 150px;
                padding-top: 10px;
                
            }

            .image{
                max-width: 200px;
                width: 169px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 57px;
                border-radius: 50%;
                border: 10px solid #f8f8f8;
            }

            .details{
                margin-top: 120px;
                text-align: center;
                color: #444444;
                font-weight: normal;
            }

            .big{
                font-size: 24px;    
            }

            .small{
                font-size: 16px;
                
            }

            a{
                text-decoration: none;
                font-size: 20px;
                padding: 10px 20px;
                color: #ffffff;
                border-radius: 5px;
            }

            .links{
                background-color: #ffffff;
                margin: 120px auto 0 auto;
                text-align: center;
                width: 75%;
                padding: 50px;
                
            }

            .info{
                background-color: #2196f3;
            }

            .warning{
                background-color: #ffd54f;
            }

            .content{
                text-align: center;
                background-color: #fff;
                margin: 120px auto 0 auto;
                padding: 30px;
                width: 75%;    
            }

            code{
                color: #f44336;
                background-color: #ffebee;
                padding: 2px 4px;
                border-radius: 5px;
                font-weight: bold;
            }

            .names{
                margin-left:auto;
                margin-right:auto;
                width:20%;
                text-align:center;
                padding-top:8%;
            }
        </style>
  </head>

  <body class="oj-web-applayout-body">
    <div class="oj-flex demo-panelwrapper">
        <div class="oj-flex-items oj-sm-3 oj-md-6 oj-lg-12">
             <div class="heading">
                <img src="http://res.cloudinary.com/dikethelma/image/upload/a_0/v1503494405/profile_rpbema.jpg" alt="profile-image" class="image">
            </div>           
        </div>

        <div class="names">
            <p class="big"> Dike, Thelma Kelechi</p>
            <p class="small"> UI/UX Designer | Web Developer</p>
            <p class="small"> @dikethelmak</p>
        </div>
    </div>   
    
    <div class="details">
        
    </div>
    
    <div class="links">
        <a href="#" class="warning" onclick="sayHi()">Say Hi</a>
    </div>

    <script>
        function sayHi() {
            alert('Hi,send a mail to dikethelmak@gmail.com');
        }
    </script>
    
     <?php

        require_once '../db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];        
?>


<!-- RequireJS bootstrap file -->
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>

</body>
</html>