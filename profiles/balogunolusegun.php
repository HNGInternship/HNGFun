<!doctype html>

<html>
	<head>
		<title>HNG Internship 4.0</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
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
.content {
    background-color: rgba(255,255,255,0.2);
    width: 60%;
    margin: auto;
    margin-top: 25%;
}
.content p{
    text-align: center;
    line-height: 2em;
    color: #fff;
    font-size: 2em;
    font-weight: 600;
}
        </style>
	</head>

	<body>
        <div class="container">
            <div class="content">
                <p>User - @japhar1</p>
		<p>Name: Balogun Olusegun</p>
                <p>HNG Internship 4.0 Intern</p>
                <?php
                $time = time();
                $actual_time = date('F jS Y h:i a' );
                ?>
               <p><?php echo 'Date/Time: '.$actual_time;?></p>
                <p>Task - Stage 4</p>
            </div>
        </div>

	</body>
</html>
