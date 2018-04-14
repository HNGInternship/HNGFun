<?php
require_once '../db.php';
	try {
		//Your username here
        $sql2 = "SELECT * FROM interns_data WHERE username = 'Jeremiah'";
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $data2 = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
	
	$name = $data2['name'];
	$username = $data2['username'];
	$image = $data2['image_filename'];

    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
	// this is for the secret key on tHNG server
    $secret_word = $data['secret_word'];
    ?>
<!DOCTYPE html>
<html>

<head>
	<title>Hello Site</title>
	<!--This site is sample project for HNG internship 4.0 for stage1.
	It contains a little of my interests. by Jeremiah Righteous -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

	<style type="text/css">
		
		body{
			padding:0;
			margin:0;
			font-family: 'Roboto', sans-serif;
			font-size: 100%;
			background-color: #DBE1E1;
		}

		section.content{
			margin: auto;
			position: relative;
			text-align: center;
			top: 100px;
		}
		.content h1 {
			font-size: 40px;
			font-style: bold;
			line-height: 45px;
		}
		.about{
			font-size: 23px;
			line-height: 30px;
			letter-spacing: 20%;
		}
		.link{
			margin-bottom: 100px;

		}

	</style>


</head>
<body>
	<section class="content">
		<img class="circle_img" src="<?php echo $image;?>" atl="Jeremiah Photo" style="border-radius:50%;
		border:6px solid black;width:170px">				
		
		<h1>HELLO THERE,</h1>
		<p class="about">My name is <?php echo $name ?>, a tech guy from Delta, NG.<br>
		I'm a web developer and creative UI/UX designer.</p>
		<div class="link">
				<p style="font-style: bold; color: blue;">Follow me:</p>
			<a href="https://github.com/jeremiahriz"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631643/Hello-img/GitHub.png" style="width:40px"></a>
			<a href="https://twitter.com/jeremiahriz"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/twitter.png" style="width:40px"></a>
			<a href="https://www.instagram.com/jeremiahriz/"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/instagram.png" style="width:40px" ></a>		
		</div>
	</section>

		
</body>
</html>
