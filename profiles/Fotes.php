<!doctype html>
<html>
    <head>
    <title>HNG INTERNSHIP #1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="icon" href="worldtime.jpg" type="image/png" sizes="16x16">
		<style>
		body{
background: #1A3D45;
    padding: 0px;
}
h1{
font-family: Cursive ;
font-size: 100px;
text-align: center;
padding-top: 150px;
padding-left: 100px;
padding-right: 100px;
}

h1{
	animation: blink 1s 1s ease-in-out forwards infinite;
}
@keyframes blink {
	0% {
		color: #802D72;
		opacity: 1;
	}
	100% {
		color: transparent;
		opacity: 0;
	}
}
.time{
	padding-top: 0px;
    font-size: 48px;
    font-family: cursive;
    color: balck;
	text-align: center;
}
</style>
    </head>

<body>
<h1>HNG Internship 4.0</h1>
 
 <div class="time">
 <?php date_default_timezone_set("Africa/Lagos");
   echo 'The future is now_'  . date("h:i:sa") ;
   ?>
</div>
</body>
</html>