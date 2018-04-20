<?php
error_reporting(0);
if (empty($conn)) {
    include("../db.php");

    define('DB_CHARSET', 'utf8mb4');
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET;

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);
}

$intern_details_query = $conn->query(
    "SELECT     interns_data.name, 
                interns_data.username, 
                interns_data.image_filename
    FROM        interns_data
    WHERE       interns_data.username = 'chisom5' LIMIT 1");

$secret_word_query = $conn->query(
    "SELECT     secret_word.secret_word 
    FROM        secret_word LIMIT 1");

$intern_detail = $intern_details_query->fetch();
$secret_word = $secret_word_query->fetch();

// Secret Word
$secret_word = $secret_word['secret_word'];

// Profile Details
$name = $intern_detail['name'];
$username = $intern_detail['username'];
$filename = $intern_detail['image_filename'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$name;?></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .card {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			}
            .profile-img img {
              margin-left: auto;
              margin-right: auto;
              display: block;
              width: 300px;
            }
          .profile-name {
             font-size: 25px;
             font-weight: 600;
             margin-top: 20px;
             }

			.title {
			  color: grey;
			  font-size: 18px;
			}
            #twitter{
                color:#00aced;
            }
            #facebook{
                color:#3b5998;
            }
            #github{
            	color:#333;
            }
          
            footer{
                background:#000000;
/*                height:40px;
*/            }
            footer p{
                color:#ffffff;
                line-height:40px;
                font-size:13px;
            }
    </style>
</head>
<body>
    	<h2 style="text-align:center">My Profile Card</h2>

	<div class="card">

	<div class="profile-img">
    	  
        <img src="<?=$filename;?>" alt="Chisom HNG Intern">

    </div>

        <p class="text-center profile-name">
            <?=$name;?> (@<?=$username;?>)
        </p>
        
	  <p style="margin:10px 0px"><span class="title">FrontEnd Developer</span> <br>
	  		 
            Angular and anything JS

	  </p>
	  
      <p> connect with me <br>
	    <a href="https://twitter.com/chisom_code"><i class="fa fa-twitter" id="twitter"></i></a>  
	    <a href="https://web.facebook.com/chisom.okoye.108"><i class="fa fa-facebook" id="facebook"></i></a> 
	    <a href="https://github.com/chisom5"><i class="fa fa-github" id="github"></i></a>
        </p>
	 

     <footer style="padding:0px">
    <p>coptright&copy; HNGInternship 2018</p>
    </footer>
	</div>

    
</body>
</html>