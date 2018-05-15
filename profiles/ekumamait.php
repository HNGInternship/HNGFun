<?php

        require_once 'db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();

            $result2 = $conn->query("Select * from interns_data where username = 'ekumamait'");
            $user = $result2->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eric Ebulu — UI/UX Designer and Software Engineer based in Uganda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script> -->
    
    <style>
        body {
            margin: 0px;
            font-family: 'Raleway', sans-serif;
            line-height: 1.5;
        }

        .jumbotron{
            background-image: url("http://res.cloudinary.com/dghqhkadc/image/upload/v1524637622/067.jpg");
            padding-top: 10%;
            padding-right: 200px;
            padding-left: 10%;
        }

        img{
            border-radius: 50%;
            border: 10px solid gainsboro;
            margin: 0 auto;    
            
        }
        
        .about-me h2 {
            font-weight:700;
            text-align: justify;
        }

        h4{
            font-family:cursive;   
            font-weight: 200;
        }
        
        .about-me  h3{
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 200;
            letter-spacing: 2px;
            color: #999;
            margin-bottom: 5px;
        }
        
        .about-me p{
            font-size: 16px;
            font-family:  Proxima Nova,Tahoma,Helvetica,Verdana,sans-serif;  
        }
        
        #tweety, #insty , #fb, #slacky{
            color: grey;
            text-shadow: 1px 1px 1px #ccc;
            font-size: 2em;
            display: inline-block;     
        }

        .twitter-icon, .twitter-icon a{
            margin: auto;
            padding-left: 10%;    
        }

        .full-body{
            margin-top: 50px;
        }

       .footer {
            padding: .75rem 1rem;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: $footer-background;
            text-align: center;    

             @include screen-breakpoint(md) {
                padding: 1rem 1.5rem;
            }

                &.is-overlayed {
                border-top: 1px solid #eaeaea;
             box-shadow: 0 -2px 6px rgba(0,0,0,.05)
                }
            }


    </style>
</head>
<body>
    <!--Jumbotron-->
    <div class="container-fluid full-body"> 
        <!--<div class="row">
           <div class="jumbotron">
            
           </div>
        </div> -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 img">
                <img height="auto" width="80%"  src="<?php echo $user->image_filename ?>" alt="">   
            </div>
            <div class="col-sm-6 about-me">
                <h2><?php echo $user->name ?></h2>  <!--<span><small>(Web Designer)</small></span> -->
                <h4>@<?php echo $user->username ?></h4>
                
                <h3 class="profile-headline">I design and build intuitive user interfaces</h3>
               <p class="profile-description">
        I am currently learning Design and full-stack development at
        <a target="_blank" rel="noopener" href="http://hng.com">hotels.nigeria</a>.
        <br>I'm finishing work on something wonderful. Stay in touch.
    </p></p></p>
               
    <div class="profile-links">
        <a target="_blank" rel="noopener" class="profile-link" href="https://github.com/ekumamait">
            <span class="sr-only">GitHub</span>
            <img src="/img/github.svg" alt="GitHub" inline>
        </a>
        <a target="_blank" rel="noopener" class="profile-link" href="https://linkedin.com/in/ericebulu">
            <span class="sr-only">LinkedIn</span>
            <img src="/img/linkedin.svg" alt="LinkedIn" inline>
        </a>
        <a target="_blank" rel="noopener" class="profile-link" href="https://twitter.com/ekumamait">
            <span class="sr-only">Twitter</span>
            <img src="/img/twitter.svg" alt="Twitter" inline>
        </a>
        <a target="_blank" rel="noopener" class="profile-link"
           href="mailto:ericebuluochol@gmail.com?subject=Hello%20Ekumamait">
            <span class="sr-only">Email</span>
            <img src="/img/email.svg" alt="Email" inline>
        </a>
    </div>
                              
            </div>
        </div>
    </div>   
</body>
    <p>
    <footer id="footer" class="footer">
    Made in 2018 with <span class="text-red">♥</span> from Kampala, Uganda.
</footer>
</html>