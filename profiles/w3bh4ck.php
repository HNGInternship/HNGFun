<!DOCTYPE html>
<html>

<head>
    <title>W3BH4CK || HotelNG Intern</title>
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Concert+One|Patua+One|Righteous|Russo+One|Shrikhand" rel="stylesheet">
</head>
<style type="text/css">
    /*
font-family: 'Patua One', cursive;
font-family: 'Concert One', cursive;
font-family: 'Cinzel', serif;
font-family: 'Righteous', cursive;
font-family: 'Shrikhand', cursive;
font-family: 'Russo One', sans-serif;
        */

    html,
    body {
        margin: 0 auto;
    }

    #header {
        font-family: 'Russo One', sans-serif;
        color: white
    }

    body {
        background-image: url('http://res.cloudinary.com/w3bh4ck/image/upload/v1523849170/web-wallpaper.jpg');
    }

    img {
        margin-top: 10px;
        border: 2px dashed white;
    }
    .skills{
        margin-top: 20px;
        border: 2px solid grey;
        background-color: grey;
        font-family: 'Patua One', cursive;
        border-radius: 8px;
        box-shadow: 1px 1px 2px grey;
        opacity: 0.8;
    }
    .intro{
        margin-top: 20px;
        color: aliceblue;
        padding-top: 30px;
        font-family: 'Cinzel', serif;
    }
</style>

<body>

    <?php 
        require 'db.php';
    ?>

    <div class="container">

        <div id="header" class="section text-center">
            <img alt="photo" class="img-circle" src="http://res.cloudinary.com/w3bh4ck/image/upload/v1523793277/23658800_1730371916975943_5091116093810420678_n.jpg" height="300px" width="300px">
            <h2>AMADI LUCKY SAMPSON</h2>
            <h3>Software developer</h3>
        </div>
        <div class="row">
            <div class="col-md-6 intro">
                <h2>Hello, I am <strong>W3bh4ck</strong> A software developer with eyes for intuitive designs. I'm fascinated by technology and always ready to build and learn anything that works on the web.
                </h2>
            </div>

            <div class="col-md-6 skills">
                <h2 class="text-center">SKILLS</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        JavaScript
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                        jQuery
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
                        React.js
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                        PHP
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        Java
                    </div>
                </div>
            </div>

        </div>

    </div>
    
    <!-- chatbot section -->
    <div>
    
    
    </div>
    <!-- end chatbot ->

    <?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'w3bh4ck'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>


</body>

</html>