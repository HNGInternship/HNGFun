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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <style>
            body{
                padding: 100px;
                font-size: 120%; 
                background: linear-gradient(#93164f, #19133e);
            }
            .bot{
                width: 60%;
            }
            .info{
                padding: 50px;
                margin-left: 50px;
                text-align: center; 
                background: linear-gradient(#761742, #19133e)
            }
            @media only screen and (max-width: 1100px){
                body {
                    display: block;
                }
                
                .bot{
                    width: 200%;
                    margin-right: -200px;
                }
            }
        </style>
    </head>
    
    <body>
        <div class="row">
            <div class='info'>
            <img src="http://res.cloudinary.com/ovu/image/upload/c_scale,o_100,r_100,w_200/a_349/v1523814132/Ovundah.png" alt="Ovundah King" >
            
            <div style="font-family: 'Exo 2', sans-serif;'">
                <div style='color: #ffb72d'>
                    <h1><strong>Ovundah King</strong></h1>
                    <p>Tech Enthusiast</p>
                    <p>Figma, HTML, CSS, JS, MEAN</p>
                    </div>
	               <a href="https://twitter.com/OvundahKing" style='color: #5697ff'>
                       <i class="fa fa-twitter fa-3x"></i>
                    </a>
            </div>
            
        </div>
        <div class='bot embed-responsive embed-responsive-4by3'>
            <iframe name='bot' class="embed-responsive-item" src="https://hng.fun/profiles/ovundah/"
                        width="100%" 
                        height="100%">
            </iframe>
        </div>
        </div>
    </body>
</html>
<script>
    function send(){window.frames['bot'].set(<?php echo $json; ?>)}
    
    
    sessionStorage.setItem('answers', JSON.stringify(<?php echo $json; ?>));
</script>
