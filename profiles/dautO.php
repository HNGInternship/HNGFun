<!doctype html>

<!-- php here -->
<?php

    //fetch-store results
    try {
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_query = 'SELECT * FROM interns_data WHERE username="dautX"';
        $query_my_intern_db = $conn->query($sql_query);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
    }
    catch (PDOException $exceptionError) {
        throw $exceptionError;
   }

        $secret_word = $query_result['secret_word'];
        $name = $intern_db_result['name'];
        $username = $intern_db_result['username'];
        $image_addr = $intern_db_result['image_filename'];
?>
<!-- html begins here -->
<html>
    <head>
        <meta charset="utf-8">
        <title>daut.X | Profile</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,700" rel="stylesheet">
        <style type="text/css">

            #main{

                width: 45%;
                margin-left: auto;
                margin-right: auto;
                border: 1px solid grey;
                border-radius: 5px;
                background-color: #bdbdbd;

            }

            #top{
                margin-top: 2px;
                width: 240px;
                height: 237px;
                top: 5px;
                left: 155px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            #bottom{
                width: 300px;
                float: left;
                background-color: grey;
            }

            #content{
                background-color: grey;
            }

            #content p{
                margin-left: 5px;
                text-align: justify;
                font-family: serif, sans-serif;
            }

            #name_plate{
                background-color: #ffffff;
            }

            #name_plate h2{
                margin-left: 200px;
            }
            #name_plate h3{
                word-spacing: 40px;
                margin-left: 220px;
            }

            #socials{
                background-color: white;
            }

            #socials p{
                margin-left: 230px;
            }

            a:link, a:visited, a:hover{
                color: normal;
            }

        </style>
    </head>

    <body>

        <div id="main">
            <div id="top">
                <img src=<?php echo $image_addr; ?> alt="Profile picture">

            </div>

            <div id="content">
                <div id="name_plate">
                    <p> <h2> <?php echo $name; ?> </h2> <?php echo '@'.$username; ?> </p>
                    <p> <h3><i class="fab fa-css3-alt"></i> <i class="fab fa-php"> </i> <i class="fab fa-js-square"></i></h3> </p>
                </div>

                <p> I am a passionate learner who loves to code. A born tinkerer I like to take stuff<br />
                    apart to understand what makes them tick. I am on my way to becoming a full-stack <br />
                    web developer. I also have special interest in data analytics because the data we leave <br />
                    can tell so much about us.
                </p>

            </div>

            <div id="socials">
                <p style="word-spacing: 50px;"><a href="https://github.com/patrex"><i class="fab fa-github"></i></a> <a href="https://twitter.com/patman4real"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/patsoks.sokari"> <i class="fab fa-facebook"></i></p>
            </div>

        </div>

    </body>
</html>
