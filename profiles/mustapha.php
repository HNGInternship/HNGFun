<?php
date_default_timezone_set('Africa/Lagos');
if (!defined('DB_USER'))
	{
	require "../../config.php";
	}
try
	{
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	}
catch(PDOException $pe)
	{
	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mustapha Yusuff</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        var clicks =0 ;
        function onClick() {
            clicks += 1;
            document.getElementById("clicks").innerHTML = clicks;
        };
        </script>
    <style type="text/css">
        body {
            background-image: url(https://res.cloudinary.com/macspace/image/upload/v1524240795/1.jpg);
            background-size : cover;
        }
       
        .card {
            background-color:white;
            box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.2);
            max-width: 400px;
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


</head>
<body>
        <h1 style="text-align:center; color: springgreen; " >Who is this?</h1>
        <div class="card">
                <img src="<?php echo $image; ?>" alt="Yusuff_Mustapha" style="width:98%">
                <h1><?php echo $name; ?></h1>
                <p class="title">Mediocre Developer & Python Evangelist</p>
                <p>Of course, I'm Social!</p>
                <a href="https://www.facebook.com/mustaphee94"><i class="fa fa-facebook"></i></a>
                <a href="https://www.twitter.com/iam_oluwamusty"><i class="fa fa-twitter"></i></a> 
                <a href="https://www.linkedin.com/in/yusuff-mustapha/"><i class="fa fa-linkedin"></i></a> 
                <a href="https://www.instagram.com/iam_oluwamusty"><i class="fa fa-instagram"></i></a> 
                <p><button type="button" onClick="onClick()"><i class="fa fa-thumbs-up">Rate My Design</i></button></p>
                <p><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span></p>
              </div>
