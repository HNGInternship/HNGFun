<?php  include('../config.php'); ?>
<?php  include('header.php');  ?>
<?php  include('../db.php'); ?>


<?php

    try {
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
    } catch (PDOException $e) {

        throw $e;
    }


?>


   <?php

                try {
                $sql = "SELECT * FROM interns_data WHERE username= 'genius' ";
                $q = $conn->query($sql);
                $q->setFetchMode(PDO::FETCH_ASSOC);
                $data = $q->fetch();
                $name = $data['name'];
                $username = $data['username'];
                $image_file = $data['image_filename'];
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
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    
    <style>
        html {font-family: arial; margin: 0; padding: 0 }
        .jumbotron{background-color: darkred; color: gray; font-size: 17px}
        .col-sm-4>img{border-radius: 250px}
        .col-sm-8>div{padding-top: 120px; padding-left: 50px}
        a{text-decoration: none}

    </style>
</head>
<body>
<div class="jumbotron">
    <div class="row">
        <div class="col-sm-4">
            <img src="<?php echo $image_file;  ?>" class="img-fluid max-width: 100%; height: auto">
        </div>
        <div class="col-sm-8">

            <div>
                <p>Hi, My name is <b><?php echo $name;  ?></b> with Slack Username <b><i><?php echo $username;  ?></i></b></p>
                <p>I'm a Ghanaian based Designer, Creative Thinker, Web Developer <br>and a Professional Instructor</p>
            </div>

            <div>
                <h4>Get in Touch</h4>
                <span>
                    <a href="https://web.facebook.com/muhsin.ismail1988">
                        <img src="http://res.cloudinary.com/muhsingenius/image/upload/v1524445836/f.png" width="30px">
                    </a>
                    <a href="https://www.linkedin.com/in/muhsingenius/">
                        <img src="http://res.cloudinary.com/muhsingenius/image/upload/v1524445836/in.png" width="30px">
                    </a>
                    <a href="https://twitter.com/muhsingenius">
                        <img src="http://res.cloudinary.com/muhsingenius/image/upload/v1524445836/t.png" width="30px">
                    </a>
                    <a href="https://github.com/muhsingenius">
                        <img src="http://res.cloudinary.com/muhsingenius/image/upload/v1524445837/git.png" width="30px">
                    </a>
                </span>
            </div>

        
        </div>
    </div>
</div>



<?php  include('../footer.php'); ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        
    </script>    
</body>
</html>