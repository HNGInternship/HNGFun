<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HNG FUN</title>
    <!-- Bootstrap core CSS -->
    <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"-->
    <!-- Custom fonts for this template -->
    <!-- <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    Custom styles for this template  -->
    <style>
            body{
                margin: 0;
                padding: 0;
                background-color: #fff;
            }

            .heading{
                background-color: #2773ae;
                height: 150px;
                padding-top: 10px;
                width:100%;
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
                font-size: 1.3em;    
            }

            .small{
                font-size: 0.9em;
                
            }

            a{
                text-decoration: none;
                padding: 10px 20px;
                color: #ffffff;
                border-radius: 5px;
            }

            .links{
                background-color: #eee;
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
                font-size: 1em;
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
        </style>
  </head>

  <body>

   
        
    <div class="heading">
        <img src="http://res.cloudinary.com/dikethelma/image/upload/a_0/v1503494405/profile_rpbema.jpg" alt="profile-image" class="image">
    </div>
    
    
   <div class="details">
        <p class="big"> Dike, Thelma Kelechi</p>
        <p class="small"> UI/UX Designer | Web Developer</p>
        <p class="small"> @dikethelmak</p>
    </div>
    
    <div class="links">
        <a href="#" class="info" onclick="sayHi()">Say Hi</a>
    </div>
    

    <script>
        function sayHi() {
            alert('Hi,Hope to see you next time.');
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

</body>
</html>