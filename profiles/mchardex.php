<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
=======

<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
		if(!defined('DB_USER')){
			require "../../config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("select secret_word from secret_word limit 1");
		$stmt->execute();

		$secret_word = '1n73rn@Hng';

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "mchardex";
		$image_filename = 'http://res.cloudinary.com/mchardex/image/upload/v1523618086/bukunmi.jpg';
	

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
?>

>>>>>>> d744e865974ff0d28c5208c96359eebc4142a5c6
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
        .card {
        box-shadow: 0 19px 17px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        margin-top: 10px;
        text-align: center;
        font-family: arial;
    }
        .header {
        text-align: center;
        font-family: sans-serif;
        font-size: 20px;
        text-shadow: 2px 2px 6px grey;
        }

        .title {
            margin-top: auto;
        color: #d69999;
        font-size: 18px;
    }
        .name {
            margin-top: 28px;
            font-size: 24px;
        }

        a {
        text-decoration: none;
        font-size: 22px;
        color: black;
    }

        a:hover {
        opacity: 0.7;
    }

    img {
        width:100%; height: 350px;
    }

    .skills {
        margin-top: auto;
    }

    </style>
</head>
<body>


	<div class="card">
<<<<<<< HEAD
	  <img src="http://res.cloudinary.com/mchardex/image/upload/v1523618086/bukunmi.jpg" alt="mchardex" style="width:100%; height: 350px">
	  <h1 style="font-size: 24px;">Adebisi Oluwabukunmi J</h1>
=======
	<h2 class="header">My Profile Card</h2>
	  <img src="<?php echo $image_filename; ?>" alt="mchardex">
	  <h1 class="name">Adebisi Oluwabukunmi J</h1>
>>>>>>> d744e865974ff0d28c5208c96359eebc4142a5c6
	  <p class="title">Web Developer</p>
	  <p class="skills">Javascript, NodeJs and jquery</p>
	  <div class="social">
	    <a href="https://twitter.com/mchardex"><i class="fa fa-twitter"></i></a>  
	    <a href="https://www.linkedin.com/in/adebisi-oluwabukunmi-13159474/"><i class="fa fa-linkedin"></i></a>  
	    <a href="https://www.facebook.com/bhukunmie.hardehbc.5"><i class="fa fa-facebook"></i></a> 
	    <a href="https://github.com/McHardex"><i class="fa fa-github"></i></a>
	 </div>
	</div>

</body>
</html>
