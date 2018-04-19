<?php 
	function getUserInfo($username="BjAfam"){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT intern_id, name, username, image_filename FROM interns_data WHERE username =:username");
		    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    if(!empty($result)){
		    	return $result[0];
		    }
		    
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

	$user_info = getUserInfo();

	function getSecretWord(){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT * FROM secret_word");
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    if(!empty($result)){
		    	return $result[0]['secret_word'];
		    }
		    
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

	$secret_word = getSecretWord($user_info['intern_id']);
?>


<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<style>
      body {
				margin: 0;
				padding: 0;
			}

		 .wrapper{
			 width: 800px;
			 background: inherit;
			 padding: 40px;
			 text-align: center;
			 margin: auto;
			 margin-top: 5%;
			 font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;
		 }

		 .wrapper-img{
			 width: 300px;
			 height: 300px;
			 border-radius: 50%;
			 margin-bottom: 20px;
		 }

		 .wrapper h1{
			 font-size: 40px;
			 letter-spacing: 4px;
			 font-weight: 100;
		 }

		 .wrapper h5{
			 font-size: 20px;
			 letter-spacing: 3px;
			 font-weight: 100;
		 }

		 .wrapper p{
			 text-align: justify;
		 }

		 .wrapper ul{
			 margin: 0;
			 padding: 0;
		 }

		 .wrapper li{
			 display: inline-block;
			 margin: 6px;
			 list-style: none;
		 }

		 .wrapper li a{
			 text-decoration: none;
			 font-size: 60px;
			 color: #007bff;
			 transition: all ease-in-out 250ms;
		 }	

		 .wrapper li a:hover{
			 color: #000000;
		 }	 

		@media only screen and (max-width: 992px) {
			.wrapper {
				width: 95%;
				margin: auto;
				margin-top: 5%;
			}

			.wrapper-img{
				width: 250px;
				height: 250px;
			}
		}



		</style>
		
	</head>
	<body>
		<div class="wrapper">
      <img src=<?php echo $user_info['image_filename']?> alt="Afam Jude picture" class="wrapper-img">
      <h3>NAME: <?php echo $user_info['name']?></h3>
      <h3>USERNAME: <?php echo $user_info['username'];?></h3>
      <h5>WEB DEVELOPER</h5>
      <p>A Chemical engineeer during the day and a budding web developer at Night. I have a good knowledge of HTML5, CSS, JavaScript and currently learning PHP. Hoping to make a career switch into full stack Web developement.</p>

      <ul>
        <li><a href="https://twitter.com/bobjayafam" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
        <li><a href="https://github.com/bobjayafam" target="_blank"><i class="fa fa-github-square"></i></a></li>
        <li><a href="https://facebook.com/bobjayafam" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
      </ul>
    </div>
	</body>
</html>