<?php 

		require 'db.php';
        
        $secret_word = "1n73rn@Hng";
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'ovundah'");
		$user = $result2->fetch(PDO::FETCH_OBJ);


     //stage 4
     

      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("SELECT * FROM chatbot");
		$stmt->execute();

        $secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
        print_r($rows);



/*
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}
        */
   


?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Ovundah King</title>
        <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    </head>
    <body style="padding: 100px; font-size: 120%" >
        <div style="text-align:center; padding: 50px; background-color: white">
            <div style='padding-bottom: 20px'>
                <img src="http://res.cloudinary.com/ovu/image/upload/c_scale,e_grayscale,o_100,r_100,w_200/a_349/v1523814132/Ovundah.png" alt="Ovundah King" >
            </div>
            <div style="font-family: 'Exo 2', sans-serif;'">
                <h1><strong>Ovundah King</strong></h1>
                <p>Tech Enthusiast</p>
                <p>Figma, HTML, CSS, JS, MEAN</p>
	               <a href="https://twitter.com/OvundahKing" style='color: #5697ff'>
                       <i class="fa fa-twitter fa-3x"></i>
                    </a>
            </div>
        </div>
    </body>
</html>
