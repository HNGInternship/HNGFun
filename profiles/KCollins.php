<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kcollins Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            color: white;
            font-weight: 600;
            font-family: sans-serif;
        }

        .fa {
            padding: 20px;
            font-size: 30px;
            width: 70px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 100%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            font-size: 30px !important;
            background: black;
            color: white;
        }

        .fa-twitter {
            font-size: 30px !important;
            background: black;
            color: white;
        }

        .fa-github {
            font-size: 30px !important;
            background: #000000;
            color: white;
        }

    </style>



</head>

<body class="bg-dark container-fluid">

    <?php 
       require 'db.php';
    ?>
    <div class="container text-center">

        <br>

        <h2>Collins Kelechi</h2>

        <div class="card mx-auto" style="width:400px">
            <img class="card-img-top" src="http://res.cloudinary.com/kcollins/image/upload/v1524076130/kcollins.jpg" alt="collins kelechi" alt="Card image" style="width:100%">
            <div class="card-body" style="height : 200px">
                <h4 class="card-title">Collins Kelechi</h4>
                <p class="card-text" style="color: black">My name is Collins Kelechi and i am a web developer</p>
            </div>
        </div>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-github"></a>

    </div>

    <!--<div class="container text-center">
    
    </div>-->


    <?php
           $result = $conn->query("Select * from secret_word LIMIT 1");
           $result = $result->fetch(PDO::FETCH_OBJ);
           $secret_word = $result->secret_word;

           $result2 = $conn->query("Select * from interns_data where username = 'KCollins'");
           $user = $result2->fetch(PDO::FETCH_OBJ);
         ?>







        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>
