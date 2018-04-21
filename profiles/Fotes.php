<!doctype html>
<html>
    <head>
    <title>HNG INTERNSHIP #1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <link rel="icon" href="worldtime.jpg" type="image/png" sizes="16x16">
					<?php 
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'Fotes'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
		<style>

		body{
background-image: url('https://res.cloudinary.com/tolueek/image/upload/v1523743200/mac.jpg');

    padding: 0px;
}
h1{
font-family: Cursive ;
font-size: 85px;
text-align: center;

}
h3{
	color:white;
font-family: Cursive ;
font-size: 50px;
text-align: center;	
}
h2{
	color:white;
	font-family: forte ;
font-size: 50px;
padding-top:100px;
text-align: center;	
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
	color:white;
	padding-top: 0px;
    font-size: 50px;
    font-family: cursive;
    color: balck;
	text-align: center;

}
img{
			width: 15rem;
			height: 15rem;
			border-radius: 50%;
			float: center;
		 }
</style>
    </head>

<body>
<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2>Welcome to</h2>
<h1>HNG Internship 4.0</h1>
  <img src="<?php echo $user->image_filename ?>" />
<h3>I am <?php echo $user->name ?> <small>(@<?php echo $user->username ?>)</small></h3>
</div>
</div>


 <div class="time">
 <?php date_default_timezone_set("Africa/Lagos");
   echo 'The future is now_'  . date("h:i:sa") ;
   ?>
 
</div>

</div>
</div>
</body>
</html>
