<?php
	
	if(!defined('DB_USER')){
		require "../config.php";
	}

	try {
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("select secret_word from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "thekinglaolu";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];	
			$image_filename = $row['image_filename'];	
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Lato');
		@import url('https://fonts.googleapis.com/css?family=Work+Sans');

		.about{
		  font-size: 62.5%;
		  display: grid;
		  box-sizing: border-box;
		}

		h1 {
			color: #383838;
			font-size: 5em;
			font-family: 'Work Sans', sans-serif;
			font-weight: normal;
			margin-bottom: 0;
		}
		h2 {
		  font-family: 'Work Sans', sans-serif;
			color: #383838;
			font-size: 1.8em;
			margin-top: 0;
		}
		.about-me {
			max-width: 50em;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
		}

		.bio {
		  color: #383838;
		  font-family: 'Lato', sans-serif;
		  font-size: 1.8em;
		  padding: .5em 1em;
		}
		.profile {
			height: 15em;
			margin-top: 4em;
			border-radius: 100%;
		}
		.grey {
			height: .3em;
			background-color: #7A7A7A;
			border: none;
			width: 5em;
		}
	</style>
	<title>David Afolayan | thekinglaolu</title>
</head>
<body>
	<main class="about">
		<div class="about-me">
			<img src="<?php echo $image_filename; ?>" alt="profile-picture" class="profile" />
			<h1> David Afolayan </h1>
			<h2>FRONTEND MAGICIAN</h2>
			<hr class="grey"/>
			<p class="bio">David Afolayan is a young and passionate ninja geek. He has interests in javascript technologies, UI/UX design and building things that crawl on the web. He's aspiring tech influencer who's trying to get his feet steady in the sands of coding. And did I mention he's a sucker for graphics design, phtography and art? Well, He is!</p>
		</div>
	</main>
</body>
</html>