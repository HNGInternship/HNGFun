<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'justiceotuya'");
   $user = $result2->fetch(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html>

<head>
	<title>Justice Otuya</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<style>
		body {
			/* background-image: url("http://res.cloudinary.com/justiceotuya/image/upload/v1523611901/IMG_2183.jpg"); */
			background-size: cover;
		}

		.fa:hover {
			color: #536DFE;
		}

		.fa {
			float: left;
			font-size: 25px;
			color: #000;
			padding: 10px;
		}

		header {
			margin: 200px;
			float: right;
		}

		#name {
			font-family: cursive;
			font-size: 44px;
		}
		.flex {
			display: flex;
		}

		.time-box {
			justify-content: space-between;
			margin-top: 3rem;
		}
	</style>
</head>

<body>


	<header>
		<div>
			<h1 id="name"><?php echo $user->name ?></h1>
		<small>(@<?php echo $user->username ?>)</small>


<div class="flex time-box">
	  	<img src="<?php echo $user->image_filename ?>" />
	  </div>
			<a href="https://github.com/justiceotuya">
				<i class="fa fa-github"></i>
				</i>
			</a>
			<a href="https://twitter.com/justiceotuya">
				<i class="fa fa-twitter"></i>
				</i>
			</a>
			<a href="https://facebook.com/justiceotuya">
				<i class="fa fa-facebook"></i>
				</i>
			</a>
		</div>

	</header>



</body>