<?php
function getSecretWord(){
    $stmt =  "SELECT * FROM secret_word LIMIT 1";

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if($connection){
        $results = mysqli_query($connection, $stmt);

        if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){
                return $row['secret_word'];
            }
        }

    }else{
        die('Could not connect: ' . mysqli_error($connection));
    }
}
function getProfile($data){
    $username = 'osinakayah';
    $stmt =  "SELECT * FROM interns_data WHERE username = '$username' LIMIT 1";

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if($connection){
        $results = mysqli_query($connection, $stmt);

        if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){

                return $row[$data];
            }
        }

    }else{
        die('Could not connect: ' . mysqli_error($connection));
    }
}
//Scret Word
$secret_word = getSecretWord();
?>
<html>
    <head>
        <title>Ifeanyi Osinakayah</title>
        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
            }

            .title {
                color: grey;
                font-size: 18px;
            }

            button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            a {
                text-decoration: none;
                font-size: 22px;
                color: black;
            }

            button:hover, a:hover {
                opacity: 0.7;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="card">
        <img src="<?php echo getProfile('image_filename')?>" alt="John" style="width:100%">
        <h3><?php echo getProfile('name')?></h3>
        <p class="title"><?php echo getProfile('username')?></p>
        <p>Java, Javascript and Php Developer</p>
        <div style="display: inline !important;">
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
        </div>
    </div>
    </body>
</html>


