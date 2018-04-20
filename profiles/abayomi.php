    <?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;

        $result2 = $conn->query("Select * from interns_data where username = 'abayomi'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
		
		$username = $user['username'];
		$name = $user['name'];
		$image_filename = $user['image_filename'];

    ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abayomi</title>

    <!-- jQuery library -->

    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
       
        body {
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333333;
            background-color: #ffffff;
            background-image: url("http://res.cloudinary.com/abayomijohn273/image/upload/v1524099224/abayomi.jpg");
            background-repeat: no-repeat;
            background-size: 1420px;
            background-attachment: fixed;
            background-position: center;
            margin-top: 4px;
            font-family: 'Lato', sans-serif;
            color: rgb(68, 64, 64);
        }
        
        p {
            font-size: 18px;
        }
        
        legend {
            font-size: 19px;
        }
        
        #mainav {
            display: flex;
        }
        
        img {
            /* opacity: 0.4;
    filter: alpha(opacity=40); */
            /* For IE8 and earlier */
        }
        
        roundimg {
            border-radius: 50%;
        }
        
        #name {
            text-align: center;
            margin-bottom: 5px;
        }
        
        #int {
            text-transform: uppercase;
            font-size: 55px;
            color: rgb(78, 131, 230);
            margin-top: 105px;
            font-weight: 650;
            font-family: Calibri, 'Trebuchet MS', sans-serif;
            text-shadow: 4px 4px 5px rgb(184, 178, 178);
        }
        
        #intro {
            font-size: 25px;
            color: rgb(68, 64, 64);
            font-family: 'Crimson Text', serif;
            margin-bottom: 45px;
        }
        
        #roundimage {
            margin-top: 20px;
            margin-bottom: 120px;
        }
        
        #myNavbar {
            color: rgb(68, 64, 64);
        }
        
        #ido {
            color: rgb(68, 64, 64);
            font-size: 18px;
            font-weight: 500;
            font-family: 'Lato', sans-serif;
        }
        
        #horline {
            padding: top 0px;
            margin-top: -9px;
            margin-bottom: 0px;
            border-width: 2px;
            border-color: rgb(78, 131, 230);
        }
        
        #me {
            text-align: center;
        }
        
        #search {
            align-self: auto;
        }
        
        .navbar-inverse {
            background: transparent;
            border-color: rgb(255, 255, 255);
            border-width: 1px;
            box-shadow: 2px 2px rgb(105, 99, 99);
            font-size: 16px;
            font-weight: 500;
        }
        
        #site {
            font-size: 19px;
        }
        
        .sticky {
            position: fixed;
            top: 0;
            width: 90%;
        }
        
        #siten {
            font-size: 57px;
            font-family:  Calibri, 'Trebuchet MS', sans-serif;
            color: rgb(78, 131, 230);
            text-shadow: 4px 4px 5px rgb(184, 178, 178);
        }
        
        .no-space {
            padding-right: 0;
            padding-left: 0;
        }
        
        .lightblue {
            /* font-size: 57px; */
            font-family: Calibri, 'Trebuchet MS', sans-serif;
            color: rgb(78, 131, 230);
            text-shadow: 4px 4px 5px rgb(184, 178, 178);
        }
        
        #socialicons {
            margin-top: 30px;
        }
        /* reducing margin between social icons */
        
        .socicons {
            margin-left: -130px;
        }
        
        @media only screen and (max-width: 700px) {
            .socicons,
            .facebook {
                margin: 10px;
            }
        }
        
        .socicons:hover {
            opacity: 0.8;
        }
        
        .facebook:hover {
            opacity: 0.8;
        }
        /* awesome fonts styling */
        
        .fa {
            padding: 20px;
            font-size: 30px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%
        }
        
        .fa:hover {
            opacity: 0.7;
        }
        
        .fa-facebook {
            background: #3B5998;
            color: white;
        }
        
        .fa-twitter {
            background: #55ACEE;
            color:
        }
        
        .fa-github {
            background: rgb(50, 73, 90);
            color:
        }
        
        .fa-linkedin {
            background: rgb(47, 136, 204);
            color:
        }
        
        #imgmodal {
            border-radius: 50%;
            cursor: pointer;
            transition: 0.5s;
        }
        
        #imgmodal:hover {
            opacity: 0.7;
        }
        
        .modal {
            display: block;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9)
        }
        
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        
        #modalcaption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        
        .modal-content,
        #modalcaption {
            animation-name: zoom;
            animation-duration: 0.8s;
        }
        
        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }
        
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font: 40px;
            font-weight: bold;
            transition: 0.6s;
        }
        
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
        /* center picture  */
        
        .footer {
            margin-top: 15px;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            opacity: 0.8;
            color: white;
            text-align: center;
        }
        
        #social {}
        
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        
        #formset {
            margin-top: 250px;
            margin-bottom: 50px;
        }
        
        #formset>input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 4px rgb(184, 178, 178);
            border-radius: 4px;
        }
        
        form {
            border: 6px rgb(184, 178, 178);
            border-radius: 6px;
        }
        
        #request {
            background-color: rgb(78, 131, 230);
            border-radius: 6px;
            box-sizing: border-box;
            border: none;
            padding: 10px 16px;
        }
        
        #webdev {
            position: left;
        }
        
        select {
            width: 100%;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>

    <header>
        <div class="container ">
            <div class="row">
                <div class="col-md-12" id="name" text-uppercase>
                    <h1 id="siten">Abayomi</h1>
                    <h4 id="ido">Web Design and Development</h4>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-inverse" data-spy="" id="">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span> 
                                      </button>
                                <a class="navbar-brand" href="#" id="site">AbayomiCode</a>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="home.html">Home</a></li>
                                    <li><a href="portfolio.html">My Portfolio</a></li>
                                    <li><a href="contact.html">Contact Me</a></li>
                                    <li><a href="about.html">About Me</a></li>
                                </ul>

                                <form class="navbar-form navbar-right" action="http://www.google.com/search?g=[value from input-field]" id="search" name="q" target="_blank" method="get">
                                    <div class=" input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input input-group-btn">
                                            <button class=" btn btn-default" type="submit"><i class=" glyphicon glyphicon-search">
                                        </i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </nav>

                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <hr id="horline">
                </div>
            </div>
        </div>

    </header>

    <main>
        <div class="container">
            <div class="row" id="me">
                <div class="col-md-12">
                    <h1 id="int">Web Designer and Developer</h1>
                    <p id="intro">
                        <em>Hello, I am <?php echo $user->name?> with username @<?php echo $user->username?>, Specializing in Web Design and Development.
                             </em>
                    </p>
                </div>
            </div>

            <div class="row" id="roundimage">
                <div class="col-md-4"></div>

                <div class="col-md-4 ">
                  <img src="<?php echo $user->image_filename ?>" alt="This is my picture" class="img-circle center " id="imgmodal" title="I am a cool web developer">

                </div>
                <div class="col-md-4"></div>


                <!-- <div class="modal fade" id="roundModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Curious to know Me?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                            <div class="modal-body">
                                <img src="http://res.cloudinary.com/abayomijohn273/image/upload/v1524099224/abayomi.jpg" alt="Content Solutions" class="img-responsive img-rounded">
                                <p>I am Abayomi</p><a href="about.html">read more..</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div> -->


            </div>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="lightblue">CONTACT ME</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>You can contact me on the following social media platforms:</p>


                </div>
            </div>


        </div>
        <div class="container" id="socialicons">
            <div class="row">

                <div class="col-md-2 facebook">
                    <a href="http://www.facebook.com/abayomijohn1670" target="_blank" id="facebook">
                        <img src="https://res.cloudinary.com/i-code/image/upload/v1523993879/facebook.png" width="50px" height="50px" title="Click to check my facebook profile" alt="facebook icon"></a>
                </div>
                <div class="col-md-2 socicons">
                    <a href="http://www.twitter.com/abayomijohn273" target="_blank" id="twitter">
                        <img src="https://res.cloudinary.com/i-code/image/upload/v1523993880/twitter.png" width="50px" height="50px" title="Click to check my twitter profile" alt="twitter icon"></a>
                </div>
                <div class="col-md-2 socicons">
                    <a href="http://github.com/abayomijohn273" target="_blank" id="github">
                        <img src="https://res.cloudinary.com/i-code/image/upload/v1523993879/GitHub-Mark-120px-plus.png" width="50px" height="50px" title="Click to check my github profile" alt="github icon"></a>
                </div>
                <div class="col-md-2 socicons">
                    <a href="http://www.linkedin.com/in/abayomi-olatunji-a60766b2" target="_blank" id="linkedin">
                        <img src="https://res.cloudinary.com/i-code/image/upload/v1523993880/linkedin.png" width="50px" height="50px" title="Click to check my linkedin profile" alt="linkedin icon"></a>
                </div>
                <div class="col-md-2 socicons">
                    <a href="" target="_blank" id="badoo">
                        <img src="https://res.cloudinary.com/i-code/image/upload/v1523993879/badoo.png" width="50px" height="50px" alt=""></a>
                </div>
                <div class="col-md-2 socicons">
                    <a href="" target="_blank" id="instagram">
                        <img src="https://res.cloudinary.com/i-code/image/upload/v1523993879/instagram.png" width="50px" height="50px" title="Click to check my instagram account" alt=" instagram icon"></a>
                </div>




            </div>
        </div>







    </main>
    <div class="container footer">
        <p>Copyright &copy; HNG FUN
            <?php echo date("Y"); ?>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery3.2.1.min.js"></script>


</body>

</html>