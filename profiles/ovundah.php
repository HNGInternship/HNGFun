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

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "ovundah";
		$image_filename = 'http://res.cloudinary.com/ovu/image/upload/c_scale,o_100,r_100,w_200/a_349/v1523814132/Ovundah.png';

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

    $stmt = $conn->prepare("SELECT * FROM chatbot");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
        $json = json_encode($rows);
?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Ovundah King</title>
        <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    </head>
    
    <body style='margin-bottom: 200px;'>
        
        <div style='margin-bottom: 200px; padding-top: 10px'>
            <iframe src="https://hng.fun/profiles/ovundah/web/index.html"
                scrolling='no'
                frameborder='0'
                width="70%" 
                height="70%"
                style='position: absolute;
                       z-index: 1'>
            </iframe>

        </div>
    </body>
</html>

