<<<<<<< HEAD
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SpaghettiThots</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="css/spag.css"> -->

		<style type="text/css">
			*{
				padding: 0;
				margin: 0;
				font-family: "Verdana";
			}

			.contain{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin-top: 2%;
			}

			h3{
				font-family: "Roboto Slab";
				color: rgba(227, 0, 116, 1);
			}

			p{
				font-family: "Verdana";
				opacity: 0.7;
			}
			/*
			.biopic-wrapper{
				border: 1px solid rgb(255, 255, 255, 1);
				border-radius: 50%;
			}*/
			.biopic{
				width: 100px;
				height: 100px;
				border: 1px solid rgb(255, 255, 255, 1);
				border-radius: 0.7em;
				margin-bottom: 1em;

			}

			.gray-bkgd{
				background-color: rgba(200, 200, 200, 1);
			}

			.gray-bkgd:hover{
				background-color: rgba(255, 255, 255, 1);
			}

			.white-bkgd:hover{
				background-color: rgba(200, 200, 200, 1);
			}

			.top-list-item{
				border-top: 2px solid rgba(80, 80, 80, 1);
				margin-top: 1em;
			}

			.list-item{
				border-bottom: 2px solid rgba(80, 80, 80, 1);
				padding-top: 0.3em;
				width: 300px;
				height: 35px;
				list-style-type: none;
				font-family: "Raleway";
				font-style: italic;
				font-size: 0.8em;
				opacity: 0.9;
				padding-left: 1em;
			}

			.social-icons{
				width: 32px;
				height: 32px;
			}

			.social{
				display: flex;
				flex-direction: row;
				justify-content: center;
			}

			.social-icons:first-child{
				margin-right: 2em;
			}

			.social-icons:last-child{
				margin-left: 2em;
			}

			img{
				padding-bottom: 0.2em;
			}
		</style>
	</head>
	<body>
		<?php

			require_once '../config.php';

			try 
			{
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			    $sql = "SELECT * FROM interns_data WHERE username = 'spaghettithots'";
			}
			catch (PDOException $pe) 
			{
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}


			try
			{
			    $sql = "SELECT * FROM secret_word";
			    $q = $conn->query($sql);
			    $q->setFetchMode(PDO::FETCH_ASSOC);
			    $data = $q->fetch();
			}
			catch(PDOException $e)
			{
			    throw $e;
			}

			$secret_word = $data['secret_word'];

			// var_dump($secret_word);
		?>

		<!-- Main HTML content -->
		<div class="contain">
			<div class="biopic-wrapper">

				<?php
					try
					{
						$imgSelect = "SELECT image_filename FROM interns_data WHERE username = 'spaghettithots'";

						$result = $conn->query($imgSelect);
					}

					catch(PDOException $e)
					{
						echo "Please check your link: " . $e->getMessage();

						exit();
					}

					while ($row = $result->fetch(PDO::FETCH_NUM))
					{
						$img[] = $row[0];
					}
				?>
				<img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523626836/hng/biopic.jpg" class="biopic" alt="Yeah, that's how I look!!!">
			</div>
			<h3>I am Alexandrix Ikechukwu</h3>
			<p>In one breath, I am a...</p>
			<ul class="ul">
				<li class="list-item top-list-item white-bkgd">Software Engineer.</li>
				<li class="list-item gray-bkgd">Dataphile.</li>
				<li class="list-item white-bkgd">Writer [of all sorts of things].</li>
				<li class="list-item gray-bkgd">Poet.</li>
				<li class="list-item white-bkgd">[Virtuous] Husband to one woman.</li>
				<li class="list-item gray-bkgd">[Ever-improving] father.</li>
				<li class="list-item white-bkgd">Most significantly, Disciple of Christ.</li>
				<li class="list-item social"><a href="https://facebook.com/alexandrix.ikechukwu"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/facebook.png" class="social-icons"></a>&nbsp;<a href="https://twitter.com/SpaghettiThots"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/twitter.png" class="social-icons"></a></li>
			</ul>
		</div>
	</body>
=======
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SpaghettiThots</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/spag.css">
	</head>
	<body>
		<div class="contain">
			<div class="biopic-wrapper">
				<img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523626836/hng/biopic.jpg" class="biopic" alt="Yeah, that's how I look!!!">
			</div>
			<h3>I am Alexandrix Ikechukwu</h3>
			<p>In one breath, I am a...</p>
			<ul class="ul">
				<li class="list-item top-list-item white-bkgd">Software Engineer.</li>
				<li class="list-item gray-bkgd">Dataphile.</li>
				<li class="list-item white-bkgd">Writer [of all sorts of things].</li>
				<li class="list-item gray-bkgd">Poet.</li>
				<li class="list-item white-bkgd">[Virtuous] Husband to one woman.</li>
				<li class="list-item gray-bkgd">[Ever-improving] father.</li>
				<li class="list-item white-bkgd">Most significantly, Disciple of Jesus Christ.</li>
				<li class="list-item social"><a href="https://facebook.com/alexandrix.ikechukwu"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/facebook.png" class="social-icons"></a>&nbsp;<a href="https://twitter.com/SpaghettiThots"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/twitter.png" class="social-icons"></a></li>
			</ul>
		</div>
	</body>
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
=======
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SpaghettiThots</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="css/spag.css"> -->

		<style type="text/css">
			*{
				padding: 0;
				margin: 0;
				font-family: "Verdana";
			}

			.contain{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin-top: 2%;
			}

			h3{
				font-family: "Roboto Slab";
				color: rgba(227, 0, 116, 1);
			}

			p{
				font-family: "Verdana";
				opacity: 0.7;
			}
			/*
			.biopic-wrapper{
				border: 1px solid rgb(255, 255, 255, 1);
				border-radius: 50%;
			}*/
			.biopic{
				width: 100px;
				height: 100px;
				border: 1px solid rgb(255, 255, 255, 1);
				border-radius: 0.7em;
				margin-bottom: 1em;

			}

			.gray-bkgd{
				background-color: rgba(200, 200, 200, 1);
			}

			.gray-bkgd:hover{
				background-color: rgba(255, 255, 255, 1);
			}

			.white-bkgd:hover{
				background-color: rgba(200, 200, 200, 1);
			}

			.top-list-item{
				border-top: 2px solid rgba(80, 80, 80, 1);
				margin-top: 1em;
			}

			.list-item{
				border-bottom: 2px solid rgba(80, 80, 80, 1);
				padding-top: 0.3em;
				width: 300px;
				height: 35px;
				list-style-type: none;
				font-family: "Raleway";
				font-style: italic;
				font-size: 0.8em;
				opacity: 0.9;
				padding-left: 1em;
			}

			.social-icons{
				width: 32px;
				height: 32px;
			}

			.social{
				display: flex;
				flex-direction: row;
				justify-content: center;
			}

			.social-icons:first-child{
				margin-right: 2em;
			}

			.social-icons:last-child{
				margin-left: 2em;
			}

			img{
				padding-bottom: 0.2em;
			}
		</style>
	</head>
	<body>
		<?php

			require_once '../config.php';

			try 
			{
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			    $sql = "SELECT * FROM interns_data WHERE username = 'spaghettithots'";
			}
			catch (PDOException $pe) 
			{
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}


			try
			{
			    $sql = "SELECT * FROM secret_word";
			    $q = $conn->query($sql);
			    $q->setFetchMode(PDO::FETCH_ASSOC);
			    $data = $q->fetch();
			}
			catch(PDOException $e)
			{
			    throw $e;
			}

			$secret_word = $data['secret_word'];

			// var_dump($secret_word);
		?>

		<!-- Main HTML content -->
		<div class="contain">
			<div class="biopic-wrapper">

				<?php
					try
					{
						$imgSelect = "SELECT image_filename FROM interns_data WHERE username = 'spaghettithots'";

						$result = $conn->query($imgSelect);
					}

					catch(PDOException $e)
					{
						echo "Please check your link: " . $e->getMessage();

						exit();
					}

					while ($row = $result->fetch(PDO::FETCH_NUM))
					{
						$img[] = $row[0];
					}
				?>
				<img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523626836/hng/biopic.jpg" class="biopic" alt="Yeah, that's how I look!!!">
			</div>
			<h3>I am Alexandrix Ikechukwu</h3>
			<p>In one breath, I am a...</p>
			<ul class="ul">
				<li class="list-item top-list-item white-bkgd">Software Engineer.</li>
				<li class="list-item gray-bkgd">Dataphile.</li>
				<li class="list-item white-bkgd">Writer [of all sorts of things].</li>
				<li class="list-item gray-bkgd">Poet.</li>
				<li class="list-item white-bkgd">[Virtuous] Husband to one woman.</li>
				<li class="list-item gray-bkgd">[Ever-improving] father.</li>
				<li class="list-item white-bkgd">Most significantly, Disciple of Christ.</li>
				<li class="list-item social"><a href="https://facebook.com/alexandrix.ikechukwu"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/facebook.png" class="social-icons"></a>&nbsp;<a href="https://twitter.com/SpaghettiThots"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/twitter.png" class="social-icons"></a></li>
			</ul>
		</div>
	</body>
=======
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SpaghettiThots</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/spag.css">
	</head>
	<body>
		<div class="contain">
			<div class="biopic-wrapper">
				<img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523626836/hng/biopic.jpg" class="biopic" alt="Yeah, that's how I look!!!">
			</div>
			<h3>I am Alexandrix Ikechukwu</h3>
			<p>In one breath, I am a...</p>
			<ul class="ul">
				<li class="list-item top-list-item white-bkgd">Software Engineer.</li>
				<li class="list-item gray-bkgd">Dataphile.</li>
				<li class="list-item white-bkgd">Writer [of all sorts of things].</li>
				<li class="list-item gray-bkgd">Poet.</li>
				<li class="list-item white-bkgd">[Virtuous] Husband to one woman.</li>
				<li class="list-item gray-bkgd">[Ever-improving] father.</li>
				<li class="list-item white-bkgd">Most significantly, Disciple of Jesus Christ.</li>
				<li class="list-item social"><a href="https://facebook.com/alexandrix.ikechukwu"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/facebook.png" class="social-icons"></a>&nbsp;<a href="https://twitter.com/SpaghettiThots"><img src="http://res.cloudinary.com/spaghettithots/image/upload/v1523625226/hng/twitter.png" class="social-icons"></a></li>
			</ul>
		</div>
	</body>
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
</html>