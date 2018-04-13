<!doctype html>

<html>
	<head>
		<title>HNG Internship 4.0</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
        	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Varela Round', sans-serif;
    font-size: 100%;
}
.container {
    background: url("https://res.cloudinary.com/dnx217f5z/image/upload/v1523182907/pc-1207834_1280.jpg") no-repeat;
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 0;
    background-position: 50% 50%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.personal img {
	width: 20%;
	border-radius: 50%;
	margin: auto;
	margin-top: 10%;
}
.content {
    background-color: rgba(255,255,255,0.2);
    width: 60%;
    margin: auto;
    /*margin-top: 25%;*/
}
.content p{
    text-align: center;
    line-height: 2em;
    color: #fff;
    font-size: 3.5em;
    font-weight: 600;
}

        </style>
	</head>

	<body>
        <div class="container">
        	<figure class="personal">
        		<img class="img-responsive text-center" src="https://res.cloudinary.com/dnx217f5z/image/upload/v1523621896/IMG-20180410-WA0000.jpg">
        	</figure>
            <div class="content">
                <p>User - @japhar1 | Name: Balogun Olusegun</p>
                <p>HNG Internship 4.0 - Web Dev Intern</p>
                <?php
                $time = time();
                $actual_time = date('F jS Y h:i:s a' );
                ?>
               <p><?php //echo $actual_time;?></p>
               <p id="date_time"></p>
                <p>Task - Stage 4</p>
            </div>
        </div>
       <script type="text/javascript" src="http://yourjavascript.com/02113087411/date-time.js"></script>
       <script type="text/javascript">window.onload = date_time('date_time');</script>
	</body>
</html>
