<?php   
    try {
         $query = $conn->query("SELECT * from interns_data WHERE username = 'Gwinyai'");
            $user = $query->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw $e;
    }
?>
<?php
    try {
         $data = $conn->query("SELECT * from secret_word LIMIT 1");
            $result = $data->fetch(PDO::FETCH_OBJ);
            $secret_word = $result->secret_word;
    } catch (PDOException $e) {
        throw $e;
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <title>Gwinyai</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            line-height: 1.6;
            font-family: Arail, Helvetica, sans-serif;
        }

        #container {
            position: relative;
            width: 100%;
            min-height: 55vw;
            overflow: hidden;
            margin-top: 5px;
            padding-top: 5px;
        }

        .layer {
            position: absolute;
            width: 100vw;
            min-height: 55vw;
            overflow: hidden;
        }

        .layer .content-wrap {
            position: absolute;
            width: 100vw;
            min-height: 55vw;

        }

        .layer .content-body {
            width: 25%;
            position: absolute;
            top: 50%;
            text-align: center;
            transform: translateY(-50%);
            color: #fff
        }

        .layer img.img {
            position: absolute;
            width: 35%;
            top: -28%;
            left: 50%;
            transform: translate(-50%, 50%);
            

        }
        .social a {
            padding-left: 10px;
        }

        .ball  {
            

            animation: bounce 0.5s;
            animation-direction: alternate;
            animation-timing-function: cubic-bezier(.5,0.05,1,.5);
            animation-iteration-count: infinite;
            }

            @keyframes bounce {
            from { transform: translate3d(0, 0, 0);     }
            to   { transform: translate3d(0, 20px, 0); }
            }

            /* Prefix Support */
            ball {
            -webkit-animation-name: bounce;
            -webkit-animation-duration: 0.5s;
            -webkit-animation-direction: alternate;
            -webkit-animation-timing-function: cubic-bezier(.5,0.05,1,.5);
            -webkit-animation-iteration-count: infinite;
            }

            @-webkit-keyframes bounce {
            from { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
            to   { -webkit-transform: translate3d(0, 20px, 0); transform: translate3d(0, 20px, 0); }
            }

        .img {
            width: 120;
            height: 120;
        border-radius: 100%; 
        border: 2px solid #fff; 
        
        }

        .layer h1 {
            font-size: 2em;
        }

        .bottom {
            background: #222;
            z-index: 1;
        }

        .bottom .content-body {
            right: 9%;
        }

        .bottom h1 {
            color: #fdab00;
        }

        .top {
            background: #fdab00;
            color: #222;
            z-index: 2;
            width: 50vw;
        }

        .top .content-body {
            left: 6%;
            color: #222;
        }

        .slack{
            position: absolute;
            top: 0;
            left: 0;
        }
        
        .skew .handle {
            top: 50%;
            transform: rotate(30deg) translateY(-50%);
            height: 200%;
            transform-origin: top;
        }

        .skew .top {
            transform: skew(-30deg);
            margin-left: -1000px;
            width: calc(50vw + 1000px);
        }

        .skew .top .content-wrap {
            transform: skew(30deg);
            margin-left: 1000px;
        }

        @media(max-width: 768px) {
            body {
                font-size: 75%;
            }
        }
    </style>
</head>

<body>
<section id="container" class="skew">
    <div class="layer bottom">
        <div class="content-wrap">
            <div class="content-body">
                <h1>Drop me a line</h1>
                <p>Feel free to get in touch on</p>

                <span class="social">
                    
                <a class="ball" href="https://twitter.com/gtchax">
                        <img class="ball" src="https://res.cloudinary.com/itzimlabs/image/upload/v1524514541/twitter-2430933_640.png" height="50"
                            width="50" alt="">
                    </a> 
                <a href="https://web.facebook.com/gwinyai.chakonda">
                        <img class="ball" src="https://res.cloudinary.com/itzimlabs/image/upload/v1524514540/facebook-2429746_640.png" height="50"
                    width="50" alt="">
                    </a>
                <a href="https://www.linkedin.com/in/rodney-gwinyai-0a570115a/">
                        <img class="ball" src="https://res.cloudinary.com/itzimlabs/image/upload/v1524520392/linkedin.png" height="50" width="50"
                        alt="">
                    </a>
                </span>
            </div>
                <img class="img" src="<?php echo $user->image_filename; ?>" alt="profile photo">
        </div>
    </div>

    <div class="layer top">
        <div class="content-wrap">
            <div class="content-body">
                <h1>@<?php echo $user->username?></h1>
                <p>Hi, <?php echo $user->name?> here, welcome to my profile</p>
                <p><span id="typed"></span></p>
                <p>
                    <img class="slack"src="https://res.cloudinary.com/itzimlabs/image/upload/v1524516425/slack.png" height="40" width="40" alt="slack">
                
                </p>
            </div>
            <img class="img" src="<?php echo $user->image_filename; ?>" alt="profile photo">
        </div>
    </div>

    

</section>
       
     <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
       <script>
         document.addEventListener('DOMContentLoaded', function () {
           
                var typed = new Typed('#typed', {
                    strings: ["I'm a Chemical Engineer... ", 'Entrepreneur ...', 'and web developer ...', 'Hope you enjoy the show :)'],
                    typeSpeed: 32,
                    backSpeed: 40,
                    startDelay: 1000,
                    loop: true,
                    loopCount: Infinity,

                });
           
            
         });
       </script>
</body>

</html>