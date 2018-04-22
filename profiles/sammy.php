<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Achem Samuel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
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
            background-size: cover;
            margin: 0;
            font:normal 12px/1.6em Arial, Helvetica, sans-serif
            
        }

        #body {
            padding-top: 1px;
            height: 900px;
            width: 800px;
            margin: 0 auto;
        }

        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 70%;
            margin: auto;
        }

        .carousel-inner {
            text-align: center;
        }

        .carousel .item>p {
            display: inline-block;
        }

        .name {
            color: rgb(0, 0, 0);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: right;
            position: relative;
            margin-top: 0px;
            right: 5%;
            text-align: center;
            font-style: normal;
            letter-spacing: 1px;
            font-size: 13px;
        }

        #center {
            position: absolute;
            top: 15%;
            float: left;
            padding-left: 20px;
        }

        p {
            color: rgb(0, 0, 0);
            font-family: 'Sans-Serif', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: center;
            line-height: 2;
            text-align: center;
            margin: 5px 10px;
            padding: 5px 10px;
            background-color: #f7f7f7;
            box-shadow: -2px -2px 9px #f7f7f7b9;
        }

        #artcenter {
            position: absolute;
            display: inline-block;
            top: 340%;
            left: 52%;
            width: 500px;
            transform: translateX(-50%) translateY(-50%);
        }

        .right {
            float: right;
            margin-left: 30px;
        }

        .background {
            width: 800px;
        }

       

        #layer-sub {
            float: right;
            margin-right: 3px;
            margin-left: 3px;

        }

        #nav a:visited,
        #nav a:link 
        {
            text-decoration: none;
            color: #ffffff;
        }

        #nav a:hover {
            text-decoration: none;
            color: #ffffff;
        }

        #nav a {
            margin: 0 5px;
            font-size: 15px;
        }

        #nav a:hover {
            text-decoration: underline;
            color: #ffffff;
        }

        #nav {
            color: snow;
            text-align: center;
            background-image: url("https://res.cloudinary.com/dyuuulmg0/image/upload/v1523622023/sammm.jpg");
            height: 130px;
            display: inline-block;
            width: 800px;
            padding-top: 20px;
            position: relative;
            letter-spacing: 1.5px;
            
        }

        #bg {
            height: 20px;
        }

        #link {
            float: right;
            padding-right: 20px;
            padding-top: 15px;

        }

        #footer {
            transform: translateX(0%) translateY(430px);
            clear: both;
            background: #f7f7f7;
            padding-top: 10px;
            padding-bottom: 10px;
            border-top: 1px solid #f0e9eb;
            text-align: center;
        }

        #like {
            transform: translateX(-0.1%) translateY(199px);
            margin: 20px;
            width: 230px;
            padding: 5px 10px;
            background-color: #f7f7f7;
            box-shadow: -2px -2px 9px #f7f7f7b9;
        }

        h5 {
            color: rgb(6, 65, 124);
            font-size: 20px;
        }

        h4 {
            color: rgb(105, 15, 19);
            font-size: 20px;
        }

        #tod {
            padding-top: 1px;
            border-left: 1px solid #5e5c5c46;
            border-right: 1px solid #5e5c5c46;
            border-top: 1px solid #5e5c5c46;
            border-bottom: 1px solid #5e5c5c46;
            height: 900px;
            width: 802px;
            
        }

        #foot-container {
            padding-top: 59px;
        }

        #cent {
            float:left;
            margin-right: 50px;
            text-align: center;
            align-content: flex-start;
            transform: translateX(-10px) translateY(10px);
        }
    </style>
</head>

<body>
   <div id="body">
        <div id="tod">
            <div id="layer1">
                <div id="head-image">
                    <div id="nav">
                        <a href="https://hng.fun">Home</a> |
                        <a href="https://sammy-favcode.heroku.com">About Me</a> |
                        <a href="#">Contact Me</a>
                        </br>
                        <div id="link">
                            <a class="right" href="https://twitter.com/_Achimedes" target="_blank">
                                <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523625296/tweet.png" height="25" width="25"
                                />
                            </a>
                            <a class="right" href="https://github.com/Achemsamuel" target="_blank">
                                <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523625295/itytytyt.png" height="25" width="25"
                                />
                            </a>
                            <a class="right" href="https://web.facebook.com/achimede" target="_blank">
                                <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523626151/face.jpg" height="25" width="25"
                                />
                            </a>
                        </div>
                    </div>
                </div>
        
                <div id="bg"></div>
                <div class="background">
                    <div class="name">
                        <h4>Achem Samuel - Web | UI/UX | Android Developer</h4>
                        <hr>
                        <div id="outside-container">
                            <section id="artcenter">
                                <section id="carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <figure class="item active" role="option">
                                            <p>
                                                I am a tech enthusiast, dedicated to learning and improving on my skills on a daily basis. I believe that hard and dedication
                                                to the completion of a project should not be forced on anyone. </br>
                                                A person should be willing to choose to work hard because of the vision and goals of a project.
        
        
                                                </br>
                                                Some Quotes I love </br>
                                                "The price of success is hard work, dedication to the job at hand, and the determination that whether we win or lose, we
                                                have applied the best of ourselves to the task at hand." </br>
                                                -
                                                <em>Vince Lombardi</em>
                                                </br>
        
        
                                            </p>
                                        </figure>
                                        <figure class="item" role="option">
                                            <p>
                                                "I'm proud of my hard work. Working hard won't always lead to the exact things we desire. There are many things I've wanted
                                                that I haven't always gotten. But, I have a great satisfaction in the blessings from
                                                my mother and father, who instilled a great work ethic in me both personally and
                                                professionally." </br>
                                                -
                                                <em>Tamron Hall</em>
                                                </br>
                                                A major strong point for me in the design process is that the designer must clearly understand the mind og the client and
                                                work around the clock to help the client achieve this dream. It's in this that the
                                                designer should derive satisfaction.
                                            </p>
                                        </figure>
                                    </div>
                                </section>
        
                        </div>
                    </div>
                    <div>
                        <img id="center" class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523621000/sam1.jpg" alt="I am Achem Samuel"
                            height="250" width="210" />
        
                        <div id="like">
                            <h5 style="text-align: justify">What I like</h5>
                            <hr>
                            <li>
                                Music
                            </li>
                            <li>
                                Coding
                            </li>
                            <li>
                                Reading
                            </li>
                            <li>
                                Swimming
                            </li>
                            <li>
                                Traveling
                            </li>
                        </div>
                    </div>
        
                </div>
        
                <footer id="foot-container">
                    <div id="footer">
                        Copyright &copy; 2018 Achem Samuel. All rights reserved.
                    </div>
                </footer>
            </div>
        </div>
   </div>


<div id="cent">

    <?php
    
    $result = $conn->query("Select * from secret_word LIMIT 1");
      $result = $result->fetch(PDO::FETCH_OBJ);
      $secret_word = $result->secret_word;
    
      $result2 = $conn->query("Select * from interns_data where username = 'olubori'");
      $user = $result2->fetch(PDO::FETCH_OBJ);
      
      try {
          $sql = "SELECT secret_word FROM secret_word";
          $q = $conn->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC);
          $data = $q->fetch();
          $secret_word = $data['secret_word'];
      } catch (PDOException $e) {
          throw $e;
      }
    
    ?>
</div>

</body>

</html>