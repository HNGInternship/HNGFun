<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gazelle007</title>
     <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
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
        
        footer{
            position: relative;
            width: 100%;
            height: 20%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 108px 0;
            color: #fff;
            flex-wrap: wrap;
        }
        
        footer h2{
            font-family: sans-serif;
        }

        footer nav{
            display: flex;
/*            flex-wrap: wrap;*/
            margin-right: -15px;
            list-style: none;
        }

        footer a{
            margin: 0 15px;
        }
        
        .landing{
            position: relative;
            justify-content: center;
            text-align: center;
            min-height: 80%;
        }
        
        body .bg_img{
            position: absolute;
            top: 8;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            z-index: -1;
            background-color: #80a3db;
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
<body style="background-color:red;">
    <div class="bg_img" style="background-image: url(http://res.cloudinary.com/ddjpblpib/image/upload/v1523629224/1.jpg);"></div>
    
    <section class="landing">
    	<img src="http://res.cloudinary.com/ddjpblpib/image/upload/c_scale,h_300,r_200,w_250/v1523626732/IMG_20180409_101519.png">
        
        <div class="landing_content_area">
            <h3></h3>         
            <h1><span>Hey there!! I'm</span> Tirsing, Dernan Dorcas</h1>
            <p>A front-end web developer, competent in HTML, CSS, UIKIT and an intermediate user of Javascript and PHP.</p>
            <p>I love challenges that help me grow and be better at what I do.</p>
        </div>
    </section>
    <footer>
        <h2>gazelle007</h2>
        <nav>
            <a href="https://www.facebook.com/dorcas.godwin"><span class="fab fa-facebook"></span></a>
            <a href="https://twitter.com/gazelle_007"><span class="fab fa-twitter"></span></a>
            <a href="https://www.linkedin.com/in/dernan-tirsing-5155ba156"><span class="fab fa-linkedin"</span></a>
            <a href="https://github.com/Gazelle007"><span class="fab fa-github"></span></a>
        </nav>    
    </footer>
</body>
</html>