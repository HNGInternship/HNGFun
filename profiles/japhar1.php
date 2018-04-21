<?php
require_once('config.php');
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'japhar1'");
if($result) $my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
?>

<!doctype html>

<html>
	<head>
		<title>HNG Internship 4.0</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">

#bodypage {
    font-family: 'Varela Round', sans-serif;
    font-size: 100%;
    background: url("https://res.cloudinary.com/dnx217f5z/image/upload/v1523182907/pc-1207834_1280.jpg") no-repeat;
}
#profileavatar img {
	width: 20%;
	border-radius: 50%;
	margin: auto;
	margin-top: 10%;
}
#innercontent {
    background-color: rgba(255,255,255,0.2);
    width: 60%;
    margin: auto;
}
#innercontent p{
    text-align: center;
    line-height: 2em;
    color: #8E143D;
    font-size: 3.5em;
    font-weight: 600;
}

        </style>
	</head>

	<body id="bodypage">
        	<figure id="profileavatar">
        		<img class="img-responsive text-center" src="https://res.cloudinary.com/dnx217f5z/image/upload/v1523621896/IMG-20180410-WA0000.jpg">
        	</figure>
            <div id="innercontent">
                <p>Hi! I'm <?php if(isset($my_data['name'])) echo $my_data['name']; ?> | @japhar1</p>
                <p>HNG 4.0 Intern | Web/Front-End Dev</p>
                <p><a href="https://www.facebook.com/balowtelly"><span class="fa fa-facebook"></span></a> | <a href="#"><span class="fa fa-instagram"></span></a> | <a href="https//www.twitter.com/balo_telly"><span class="fa fa-twitter"></a> </p>
                <?php
                $time = time();
                $actual_time = date('F jS Y h:i:s a' );
                ?>
               <p><?php //echo $actual_time;?></p>
               <p id="date_time"></p>
            </div>
       <script type="text/javascript" src="https://cdn.rawgit.com/japhar1/japhar1.github.io/95e8eb17/date_time.js"></script>
       <script type="text/javascript">window.onload = date_time('date_time');</script>
	</body>
</html>
