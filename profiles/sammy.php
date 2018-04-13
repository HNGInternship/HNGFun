<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sammy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="Felix%20-%20Favcoder_files/art.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="favicon.ico" type="icon">

    <script>
         var slideInterval = 2500;
            function getFigures() {
                return document.getElementById('carousel').getElementsByTagName('figure');
            }
            function moveForward() {
                var pointer;
                var figures = getFigures();
                for (var i = 0; i < figures.length; i++) {
                    if (figures[i].className == 'visible') {
                        figures[i].className = '';
                        pointer = i;
                    }
                }
                if (++pointer == figures.length) {
                    pointer = 0;
                }
                figures[pointer].className = 'visible';
                setTimeout(moveForward, slideInterval);
            }
            function startPlayback() {
                setTimeout(moveForward, slideInterval);
            }
            startPlayback();
            $('#carousel').hover(function () {
                $("#carousel").carousel('pause');
            }, function () {
                $("#carousel").carousel('cycle');
            });

    </script>
    <style>
        
        body {
            background-image: url("https://res.cloudinary.com/dyuuulmg0/image/upload/v1523627482/8c96e0ec2289dd03f3facc8317c2627c.jpg"); 
            background-size: cover;
            padding: 20px 100px 20px 100px;
        }

        .name {
            color: white;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: left;
            font-style: normal, bold;
            letter-spacing: 1.5px;
            font-size: 1em;
        }
        #center {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }

        p {
            color: white;
            font-family:'Sans-Serif', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: center;
            line-height: 2;
            text-align: center;
            margin: 5px 10px;
            padding: 5px 10px;
            box-shadow: -2px -2px 9px #0e0a0a;
        }

        #artcenter {
            position: fixed;
            top: 70%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }


        #footer {
            color: white;
            position: fixed;
            top: 120%;
            left: 50%;
            display:inline;
            transform: translateX(-50%) translateY(-50%);
        }
        
        .right {
            float:right;
            margin-left:30px;
        }
        
    </style>
</head>
<body>
    <div class="name">Achem Samuel - Web/Android Developer</div>
    
    <div>
        <img id="center" class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523621000/sam1.jpg" alt="I am Achem Samuel" height="250" width="200" />
    </div>

    <section id="artcenter">
        <section id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <figure class="item active" role="option">
                    <p>
                        I am a tech enthusiast, dedicated to learning and improving on my skills on a daily basis. </br>
                        "The price of success is hard work, dedication to the job at hand, and the determination that whether we win or lose, we
                        have applied the best of ourselves to the task at hand." </br> - Vince Lombardi </br>

                        "I'm proud of my hard work. Working hard won't always lead to the exact things we desire. There are many things I've wanted
                        that I haven't always gotten. But, I have a great satisfaction in the blessings from my mother and father, who instilled
                        a great work ethic in me both personally and professionally." </br> -Tamron Hall
                    </p>
                </figure>
                <figure class="item" role="option">
                    <p>
                        I believe that hard and dedication to the completion of a project should not be forced on anyone. </br>
                        A person should be willing to choose to work hard because of the vision and goals of a project. A major strong point for me in the design process is that 
                        the designer must clearly understand the mind og the client and work around the clock to help the client achieve this dream. It's in this that the designer should derive satisfaction.
                    </p>
                </figure>
            </div>
        </section>

    </br>
    <div id="footer">
           
            <a class="right" href="https://twitter.com/_Achimedes" target="_blank">
                <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523625296/tweet.png" height="30" width="30" />
            </a>
            <a class="right" href="https://github.com/Achemsamuel" target="_blank">
                <img  class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523625295/itytytyt.png" height="30" width="30" />
            </a>
            <a class="right" href="https://web.facebook.com/achimede" target="_blank">
                <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523626151/face.jpg" height="30" width="30"
                />
            </a>
    </div>
    </section>
</body>
</html>


