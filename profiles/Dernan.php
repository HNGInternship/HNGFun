<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gazelle007</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html{
            font-family: sans-serif;
            line-height: 2;
        }

        body{
        	height: 100%;
        }
        
        a{
            color: #fff;
            text-decoration: none;
            opacity: .8;
        }
        a:hover{
            opacity: 1;
        }
        a.btn{
            border-radius: 4px;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            background-color: #3f51b5;
            opacity: 1;
        }
        
        section{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 80px 80px;
        }
        
        h2{
            font-family: sans-serif;
            color: white;
        }
        nav{
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            list-style: none;
        }

        a{
            margin: 0 15px;
        }
        
        .landing{
            position: relative;
            justify-content: center;
            text-align: center;
            min-height: 100%;
        }
        
        body{
        	background-image: url(http://res.cloudinary.com/ddjpblpib/image/upload/v1523629224/1.jpg);
        	background-size: cover;
		width: 100vw;
        }

        .landing h1{
            font: bold 30px "Open Sans";
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #cccccc;
        }
        .landing h1 span{
            font-size: 23px;
            color: #ffffff;
        }
        
        .landing p{
        	color: white;
            text-shadow: 2px 2px 4px #000000;
        }
        
        .landing_content_area{
            opacity: 0;
            margin-top: 108px;
            animation: 1s slidefade 1s forwards;
        }
        
        @keyframes slidefade{
            100%{
                opacity: 1;
                margin: 0;
            }
        }
        
    </style>
</head>
<body">
    
    <section class="landing">
    	<img src="http://res.cloudinary.com/ddjpblpib/image/upload/c_scale,h_300,r_200,w_250/v1523626732/IMG_20180409_101519.png" alt="profile image" class="rounded-circle">
        
        <div class="landing_content_area">
            <h3></h3>         
            <h1><span>Hey there!! I'm</span> Tirsing, Dernan Dorcas</h1>
            <p>A front-end web developer, competent in HTML, CSS, UIKIT and an intermediate user of Javascript and PHP.</p>
            <p>I love challenges that help me grow and be better at what I do.</p>
        </div>
        <h2>@Dernan</h2>
        <nav>
            <a href="https://www.facebook.com/dorcas.godwin"><span class="fa fa-facebook"></span></a>
            <a href="https://https://twitter.com/DerNaan><span class="fa fa-twitter"></span></a>
            <a href="https://www.linkedin.com/in/dernan-tirsing-5155ba156"><span class="fa fa-linkedin"></span></a>
            <a href="https://github.com/DernanT"><span class="fa fa-github"></span></a>
        </nav>

        <?php
		    try {
		        $sql = 'SELECT * FROM secret_word';
		        $q = $conn->query($sql);
		        $q->setFetchMode(PDO::FETCH_ASSOC);
		        $data = $q->fetch();
		    } catch (PDOException $e) {
		        throw $e;
		    }
		    $secret_word = $data['secret_word'];
		?>
    </section>
</body>
</html>
