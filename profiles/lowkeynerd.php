<?php
//    $con = mysql_connect('localhost','root','');
//    $db = mysql_select_db('hng_fun');

    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        
         $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'lowkeynerd'");
        $intern_data->execute();
        $user = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
        $user = $intern_data->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
   // $secret_word = $data['secret_word'];
     $secret_word = 'sample_secret_word';

//    $result2 = $conn->query("Select * from interns_data where username = 'lowkeynerd'");
//    $get = $result2->fetch(PDO::FETCH_ASSOC);
//    $user = $get->fetch();
    

    
?> 

<!DOCTYPE html>
<head>
    <title>HNG 4.0 |lowkeynerd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
   
</head>
<body class="body">
    <div class="box">
        <span> <a href="https://res.cloudinary.com/lowkeynerd/image/upload/v1526554529/lkn.jpg"><img src="https://res.cloudinary.com/lowkeynerd/image/upload/v1526554795/lowkeynerd.jpg" alt="display photo" class="zoom"></a></span>
            
        <h1 id="name">Chiamaka Ibeme </h1>
        <p id="username">HNG Slack @<?php echo $user['username'] ?></p>
        <hr>
            
        <p id="job">Front End Developer</p>
        
        <ul class="list">
            <li><a href="https://github.com/chiamakaibeme" title="Github" target="_blank"><i class="fab fa-github"></i></a></li>
            <li><a href="mailto:chiamakaibeme@ymail.com" title="Yahoomail" target="_blank"><i class="fas fa-envelope"></i></a></li>
            <li><a href="https://twitter.com/_chimmie_" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/_chimmie_/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
    
    <style>
        
        .body{
            background: #262626;
            margin: 0;
            padding: 0;
        }
        .box{
            height: 100%;
            width: 100%;
            background: rgba(212, 175, 55, 0.4);
            padding: 40px;
            text-align: center;
            margin: auto;
            font-family: 'Century Gothic', sans-serif;
        }

        .box img{
            border-radius: 50%;
            max-width: 100%;
            max-height: 100%;
        }
        
        .zoom{
            transition: transform 5.0s; /* speed of image zooming out */
            margin-bottom: 10px;
        }

        .zoom:hover{
            transform: scale(1.3);/* zoom- 110% */
        }
        
        #name{
            font-size: 30px;
            font-weight: 100;
        }
        
        #job{
            font-size: 20px;
            letter-spacing: 3px;
        }
        span{
            text-align: center;
        }
        
        .list{
            margin: 0;
            padding: 0;
            display: inline;
            width: 20%;
        }

        .box li {
            list-style: none;
            display: inline-block;
            margin: 6px;
        }

        .box li a {
            text-decoration: none;
            color: #000;
            font-size: 30px;
            position: relative;
            display: block;
            text-align: center;
            padding: 5px;
            transition: transform 1.5s;
			}
        
        .list li a:hover {
            transform: scale(1.3);
            color: blue;
			}
         
    </style>
</body>