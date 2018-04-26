<!doctype html>
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
<html>
    <head>
        <meta charset="utf-8">
        <title>dautX | Profile</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,700" rel="stylesheet">

        <style>

            #content{
                background-color: aliceblue;
                min-height: 40px;
                padding: 2px;
                width: 30%;
                border-radius: 5px;
                margin-left: auto;
                margin-right: auto;
            }

            #pix{
                background-color: #c4c4c4;
                margin: 5px;
                border-radius: 4px;
                height: 400px;
                width: 30%;
                margin-left: auto;
                margin-right: auto;
            }
            
            #content p{
                margin-left: 5px;
                text-align: justify;
                font-family: serif, sans-serif;
            }
            
            a:link, a:visited, a:hover{
                color: normal;
            }

        </style>
    </head>

    <body>
        <div id="heading" style="clear: both;">

        </div>

        <div id="pix">
            <img src="<?php echo $image_addr ?>" height="400px" width="100%" alt="Profile image">
        </div>

        <!-- profile info display -->
        <div id="content">
            <p><h3><?php echo $name; ?></h3> <?php echo '@'.$username; ?> </p>
            <p>I am a passionate learner who loves to code. A born tinkerer I like to take stuff
               apart to understand what makes them tick. I am on my way to becoming a full-stack
               web developer. I also have special interest in data analytics because the data we leave
               can tell so much about us.
            </p>
            
            <div id="socials" style="margin-left: 50px;">
                <p style="word-spacing: 50px;"><a href="https://github.com/patrex"><i class="fab fa-github"></i></a> <a href="https://twitter.com/patman4real"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/patsoks.sokari"> <i class="fab fa-facebook"></i></p>
            </div>
        </div>

    </body>
</html>
