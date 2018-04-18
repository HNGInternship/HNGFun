<!doctype html>
<html lang="en">
<head>
	<?php
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

	$result2 = $conn->query("Select * from interns_data where username = 'justin'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
    <title>Justin's Profile</title>
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">    
	<style>
		#header{position: absolute;
		width: 852px;
		height: 95px;
		left: 98px;
		top: 10px;

		font-family: 'Reem Kufi', sans-serif;		
		font-style: normal;
		font-weight: normal;
		line-height: normal;
		font-size: 48px;
		text-align: center;

		color: #000000;}

		#image{
			position: absolute;
			width: 200px;
			height: 200px;
			left: 275px;
			top: 135px;

			background: #E7E4E4;
		}
		#social-header{
			position: absolute;
			width: 322px;
			height: 71px;
			left: 275px;
			top: 322px;
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 48px;
			color: #000000;
		}

		#slack{
			position: absolute;
			width: 50px;
			height: 50px;
			left: 275px;
			top: 450px;
		}

		#fb{
			position: absolute;
			width: 50px;
			height: 50px;
			left: 275px;
			top: 536px;
		}

		#twitter{
			position: absolute;
			width: 50px;
			height: 50px;
			left: 275px;
			top: 622px;
		}

		#insta{
			position: absolute;
			width: 50px;
			height: 50px;
			left: 275px;
			top: 708px;

		}
		#slack_handle{
			position: absolute;
			width: 230px;
			height: 50px;
			left: 367px;
			top: 450px;
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px
		}

		#fb_handle{
			position: absolute;
			width: 230px;
			height: 50px;
			left: 367px;
			top: 536px;
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px;
		}

		#twitter_handle{
			position: absolute;
			width: 230px;
			height: 50px;
			left: 361px;
			top: 622px;
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px;
		}

		#insta_handle{
			position: absolute;
			width: 230px;
			height: 50px;
			left: 367px;
			top: 708px;

			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px;

		}
	</style>
</head>  
<div id="header">
	<p>HNG INTERN PROFILE</p>
</div>
<div id="image">
	<img src="<?php echo $user->image_filename; ?>" alt="Justin's picture">
</div>
<div id="social-header">
	<P><?php echo $user->name; ?></P>
</div>
<div id="slack">
	<img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523986719/download.jpg" alt="slack icon">
</div>
<div id="fb">
		<img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523986958/fbimage.png" alt="fb icon">
	</div>
<div id="twitter">
	<img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523987124/twitterimage.png" alt="twitter icon">
</div>
<div id="insta">
	<img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523987390/insta.jpg" alt="inta icon">
</div>
<div id="slack_handle"><p style="margin: 0">@justin</p></div>
<div id="fb_handle"><p style="margin: 0">Justin Wainaina</p></div>
<div id="twitter_handle"><p style="margin: 0">@justin_that_guy</p></div>
<div id="insta_handle"><p style="margin: 0">@justo_ke</p></div>
<body>
    
</body>
</html>