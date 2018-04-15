
<?php
require'db.php';
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username='joat'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Justine Philip</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style type="text/css">
		body{
            background-image: url(http://res.cloudinary.com/worldclassdev/image/upload/v1523643996/topography.svg),
                    linear-gradient(110deg,  #F7DF1E, #FF9020);
            background-size: 340px, auto;
            background-position: fixed;
			font-family: 'Poppins';
            width: 100%;
            height: 100vh;
		}
        ::selection {
          background:  #ffc600; /* WebKit/Blink Browsers */
         }
         ::-moz-selection {
         background:  #ffc600; /* Gecko Browsers */
         }
		.container{
			width: 100%;
			padding: 20px;
		}
		h1{
			color: #828282;
		}
		.name{
			text-align: center;
		}
		.profile{
			width: 350px;
			border: 1px solid #848484;
			border-radius: 50%;
			margin: 30px auto;
			height: 340px;
		}
		.profile-img{
			width: 350px;
			border-radius: 50%;
			height: 340px;
		}
		.about{
            width: 800px;
			margin: 30px auto;
			text-align: center;
			line-height: 1.5;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="name">
			<h1>Justine Philip</h1>
		</div>
		<div class="profile">
			<img class="profile-img" src="http://res.cloudinary.com/worldclassdev/image/upload/v1523643285/16845555.png" alt="my-profile">
		</div>
		<div class="about">
        I like to call myself a developer of all things JS. But basically i love to build stuff that solves a problem irrespective of the technology involved. I'm more about the impact than the money, but somehow i find both. When im not coding, i write, game and play the guitar.
		</div>
	</div>
</body>
</html>
