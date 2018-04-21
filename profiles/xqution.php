<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Emeka's Profile</title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <style>
    body {
      background-color: #02422F;
    }

	.txt {
		position:absolute;
		top:220px;
		left:300px;
		color: #ffffff;
		font-size: 45px;
	}
	
    #main {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #about {
      color: #02422F;
    }

    #hello {
      font-size: 80px;
      color: #ffffff;
      font-family: 'Arial';
	  position:absolute;
	  align: center;
	  top:100px;
    }

    #h4 {
      font-size: 40px;
      font-weight: bold;
	  color: #ffffff;
    }


  </style>
</head>

<body>
  <div id="main">
    <div id="about">
      <div>
        <h1 id="hello">Greetings..... </br>
		</div>
		<div class="txt">
		<?php
			require 'db.php';
			
			$result = $conn->query("Select * from secret_word LIMIT 1");
			$result = $result->fetch(PDO::FETCH_OBJ);
			$secret_word = $result->secret_word;

			$result2 = $conn->query("Select * from interns_data where username = 'xqution'");
			$user = $result2->fetch(PDO::FETCH_OBJ);
			
			echo 'My name is: ' .$user->name . '</br>';
			echo 'My Slack username is: ' .$user->username . '</br>';
		
		?> 
		</div>
		</br>
		</h1>
        <h4 id="h4">Currently on the Hotels.ng Internship Program</h4>
      </div>
    </div>
</body>

</html>