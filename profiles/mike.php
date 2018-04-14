<!DOCTYPE html>
<?php 
		
			
		
    $stmt = $conn->prepare("SELECT * FROM secret_word");
	$stmt->execute();	
	$count	= $stmt->rowCount();
	
	 //Get all users	
	
  
	
	//get the secret word
	
	 if($count >0){
				
				
				
				 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   
                    $id = $row['id'];
					$secret_word= $row['secret_word']; 
					
 				
				 }
				 
		
			} else {
				
				echo 'No records found';
			}



	
	$stmt= $conn->prepare("SELECT * FROM interns_data_");
	$stmt->execute();	
	$count2	= $stmt->rowCount();
	
	
	
	
	
			//Get intern data
			
      if($count2 >0){
				
				
				
				 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   
                    $intern_id = $row['intern_id'];
					$name= $row['name']; 
					$username= $row['username'];
					$image_filename= $row['image_filename'];
 				
				 }
				 
		
			} else {
				
				echo 'No records found';
			}			
						
					
						
					
					
					?>
					
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mike's Profile</title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <style>
    body {
      background-color: #41C3DE;;
      font-family: 'Roboto';
    }

    #container {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #me {
      color: #ffffff;
    }

    #welcome {
      font-size: 100px;
      color: #ffffff;
      font-family: 'Alfa Slab One';
    }

    

  </style>
</head>

<body>

  <div id="container">
    <div id="me">
      <div class="text-center">
        <h2 id="welcome">My Space</h2>
        <h3><?php //echo $secret_word ?></h3>
		<h3>Name: <?php echo $name ?></h3>
		<h3>Username: <?php echo $username ?></h3>
		<img src="http://res.cloudinary.com/weezyval/image/upload/v1523620464/mikeetta.jpg" alt="Intern name" Width="300px"></h3>
        <h4>Currently on the Hotels.ng Internship Program</h4>
          
      </div>
    </div>
  </div>
</body>

</html>