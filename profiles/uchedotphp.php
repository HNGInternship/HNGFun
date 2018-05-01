<?php
require 'db.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UcheDotPhp Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: #FF9000;
            box-sizing: border-box;
            font-family: "Space Mono", Arial, serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.7;
            color: #4d4d4d;
        }

        .main{
            margin: 180px auto;
            width: 500px;
        }

        img{
            height: 200px;
            width: 200px;
            margin: 0 auto;
            margin-bottom: 30px;
        }

        .take{

        }

        h1, h2, h3, h4, h5, h6{
            line-height: 1.1;
        }

        h1 {
            font-family: "Kaushan Script", cursive;
            margin-bottom: 30px;
            font-size: 50px;
            line-height: 1.3;
            font-weight: 300;
            -webkit-transform: rotate(-5deg);
            -moz-transform: rotate(-5deg);
            -ms-transform: rotate(-5deg);
            -o-transform: rotate(-5deg);
            transform: rotate(-5deg);
            color: white;
        }

        h1 span {
            padding: 4px 15px;
            position: relative;
        }

        h1 span:before {
            position: absolute;
            top: 40px;
            left: 0;
            width: 30px;
            height: 4px;
            content: '';
            background: #fff;
            margin-left: -30px;
        }

        h1 span:after {
            position: absolute;
            top: 40px;
            right: 0;
            width: 30px;
            height: 4px;
            content: '';
            background: #fff;
            margin-right: -30px;
        }

        h3 {
            font-size: 16px;
            margin: 0;
            padding: 0;
            color: white;
        }


    </style>

</head>
<body>

<div class="container-fluid">
    <div class="row main">
        <div class="col text-center">
            <div class="take">
                <?php
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
                $result = mysqli_query($conn, "SELECT * FROM secret_word");
                $secret_word = mysqli_fetch_assoc($result)['secret_word'];
                $sql = "SELECT * FROM interns_data WHERE username ='uchedotphp'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<img class='rounded-circle' src=" . $row['image_filename'] . ">";
                echo "<h1><span>" . $row["name"] . "</span></h1>";
                ?>

                <h3><span>Web Developer / Slack Handle: <?php echo $row["username"]?></span></h3>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>