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

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = [];
    $subject = $_POST['subject'];
    $to  = 'etimnseabasi@gmail.com';
    $body = $_POST['message'];

    if($body == '' || $body == ' ') {
      $error[] = "I would love to have your opinion. Please Write me a message";
    }
      
    if($subject == '' || $subject == ' ') {
      $error[] = 'A subject would be nice.';
    }
      
    if(empty($error)) {
      $config = include __DIR__ . "/../../config.php";
      $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
      $con = new PDO($dsn, $config['username'], $config['pass']);
      $exe = $con->query('SELECT * FROM password LIMIT 1');
      $data = $exe->fetch();
      $password = $data['password'];
      $url = "/sendmail.php?to=$to&body=$body&subject=$subject&password=$password";
      header("location: $url");
    }
  }
 ?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>HNG-(nseetim)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    * { outline: none;}
    html[xmlns] .clearfix{
    display: block
    }
    * html .clearfix{
    height: 1%;
    }

    body{
    font-family: Tahoma, sans-serif;
    font-size: 12px;
    font-weight:normal;
    }

    .wrapper{
    background: url('https://images8.alphacoders.com/559/thumb-1920-559128.jpg') top center no-repeat;
    display:block;
    text-align:center;
    width:100%;
    max-width:1440px;
    min-width:320px;
    margin:0 auto;
    overflow:hidden;
    min-height:836px;
    }

        .form-holder{
        background:#fff; /*Fallback for old browsers*/
        background: rgba(255,255,255,0.6);
        overflow:hidden;
        width:100%;
        min-width:320px;
        max-width:400px;
        display:block;
        margin:0 auto;
        min-height:836px;
        -moz-box-shadow: inset 0px 0px 50px #fff, 0px 0px 5px rgba(0,0,0,0.1);
        -webkit-box-shadow: inset 0px 0px 50px #fff, 0px 0px 5px rgba(0,0,0,0.1);
        box-shadow: inset 0px 0px 50px #fff, 0px 0px 5px rgba(0,0,0,0.7);
        }

        .clearfix:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: inherit;
            height: inherit
        }

        .clearfix{
            display: inline-block;
        }

        #info {
            float: left;
            margin-bottom: 12px;
        }

        span{
            box-sizing:inherit
        }

        h1{
            font-family: "Simonetta", "Trebuchet MS", Arial, sans-serif;
            color: darkslategrey;
            font-size: 3.6em;
            margin-bottom: 1px;
        }

        h3{
            font-family: "Trebuchet MS", Verdana, Arial, sans-serif; color: #777; font-weight: normal; font-size: 1.8em; margin-bottom: 10px;
        }

        small{
            font-family: "Balthazar", "Droid Serif", serif; color: #656565; font-size: 1.6em; display: block; margin-bottom: 6px;
        }

        #logo{
        margin-top:1px;
        }

        #BDV_title{
        margin-top:55px;
        }

        .form-holder p{
        font-size:13px;
        color:#666; /**/
        color:rgba(0,0,0,0);
        text-shadow:0px 1px 0px #fff;
        margin:25px 0;
        padding:0 50px;
        line-height:120%;
        }

        .contact-me-input {
        width: 190px;
        border: 1px solid #ccc;
        margin: 8px auto;
        border-radius: 4px;
        font-size: 12px;
        padding: 6px 0 6px 10px;
        display:block;
        }

        .contact-me-input:focus {
        -moz-box-shadow: 0px 0px 5px #f37e01;
        -webkit-box-shadow: 0px 0px 5px #f37e01;
        box-shadow: 0px 0px 5px #f37e01;
        border: 1px solid #f37e01;
        transition:all 0.2s linear;
            -webkit-transition:all 0.2s linear;
            -o-transition:all 0.2s linear;
            -moz-transition:all 0.2s linear;
            -ms-transition:all 0.2s linear;
            -kthtml-transition:all 0.2s linear;
        }

        .cta {
        background: #f17f22;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zd…IwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2cxKSIgLz48L3N2Zz4=);
        background-image: -webkit-gradient(linear, center top, center bottom, color-stop(0%, #ffc374), color-stop(2%, #fb9a27), color-stop(100%, #f17f22), color-stop(100%, #fb9a27));
        background-image: -webkit-linear-gradient(top, #ffc374 0%, #fb9a27 2%, #f17f22 100%, #fb9a27 100%);
        background-image: -moz-linear-gradient(top, #ffc374 0%, #fb9a27 2%, #f17f22 100%, #fb9a27 100%);
        background-image: -ms-linear-gradient(top, #ffc374 0%, #fb9a27 2%, #f17f22 100%, #fb9a27 100%);
        background-image: -o-linear-gradient(top, #ffc374 0%, #fb9a27 2%, #f17f22 100%, #fb9a27 100%);
        background-image: linear-gradient(to bottom, #ffc374 0%, #fb9a27 2%, #f17f22 100%, #fb9a27 100%);
        padding: 12px 20px;
        display: block;
        font-family: Arial, sans-serif;
        font-weight: bold;
        font-size: 14px;
        text-transform: uppercase;
        text-shadow: 0px 1px 0px #fcb75f;
        color: #360000;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        margin:12px auto;
        position: relative;
        cursor: pointer;
        width: 205px;
        border: none;
        }

        .cta:hover{
            color:#fff;
        text-shadow: 0px 1px 0px #360000;
        }

        .top{
        position:relative;
        z-index:2;
        }

        /* Style all font awesome icons */
        .fa{
            padding: 20px;
            font-size: 30px;
            width: 50px;
            text-align: center;
            text-decoration: none
        }

        /* Add a hover effect */
        .fa:hover{
            opacity: 0.7;
        }

        /* specific colour for each brand*/
        /* Facebook */
        .fa-facebook{
            background: #3B5998;
            color: white
        }

        /* Twitter */
        .fa-github{
            background: #EDF0F2;
            color: black;
        }

        /* Slack */
        .fa-slack{
            background: #0F7965;
            color: antiquewhite;
        }

    </style>
  
</head>

<body>
  <div class="wrapper">
   <div class="form-holder">
       <header class="clearfix">
           <div id="info">
               <h1><span itemprop="name">Nse-Abasi Joseph</span></h1>
               <h3><span itemprop="jobtitle">Software Engineer &amp; Programmer</span></h3>
               <small itemprop="adress" itemscope="" itemtype="http://schema.org/PostalAddress">
                   <span>Oron</span>,
                   <span>Akwa-Ibom</span><br>
                   <span>Nigeria</span>
               </small>
               </div>
       </header>
    
    <img id="logo" src="https://res.cloudinary.com/nseetim/image/upload/v1523709297/nseimage.jpg" alt="nseetim profile avatar" width="240" />
     
     <p>A full stack Python Developer,
       experienced with HTML,CSS and Java script for web design with Python as the backend, and Software Development on all platforms using Python. This profile wont be complete if i fail to mention that am a Christian and Jesus is my everything.
       </p>
       <form action="nseetim.php" method="POST" name="Contat-Me">
        <fieldset>
            <legend>Contact Me</legend>
                <input class="contact-me-input placeholder" name="subject" placeholder="Subject" type="text" required>
                <input class="contact-me-input placeholder" name="email" placeholder="Your email address" type="email" onblur="this.setAttribute('value', this.value);" value="" required>
                <textarea class="contact-me-input placeholder" name="message" placeholder="Message" cols="50" rows="5" required></textarea>
                <input class="cta top" type="submit" value="submit">
                <input name="input-processing" type="hidden" value="contact-me">
           </fieldset>
       </form>
     <p class="top">Thank for reaching out.</p>
       <a href="https://github.com/nseetim/hotels.ng/blob/master/script.php" class="fa fa-github" aria-hidden="true">Stage 1 repo</a>
       <a href="http://hnginterns.slack.com/etimnseabasi" class="fa fa-slack" aria-hidden="true">slack</a>
       <a href="https://facebook.com/nse.etim" class="fa fa-facebook-square" aria-hidden="true">Facebook</a>

   </div>
</div>
  
  
</body>
</html>
